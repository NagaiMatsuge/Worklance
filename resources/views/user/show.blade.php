@extends('layouts.navAndFooter')
@section('content')
@include('layouts.message')
{{-- 
<div class="row">
    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <form action="" class="search-field d-flex">
            <input type="text" placeholder="Search" class="search-field-input">
            <input type="submit" value="🔍" class="search-field-submit">
        </form>
  </div>
</div>
<div class="row mt-4">
    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <div class="user-block">
            <div class="d-flex">
                <div class="user-image mr-4 ">
                    <img class="w-100" src="{{$user->avatar ? asset($user->avatar) : asset('ext/img/no-image.webp')}}" alt="">
                </div>

                <div class="user-info mt-4">
                    <h5 class="user-block-name">{{$user->name}}</h5>
                    <p class="user-block-stack">{{$user->role}}</p>
                </div>
            </div>
            <div class="publication-block-description mt-4">
                <span><b>About me</b></span>
                <p>{{$user->about}}</p> --}}

                {{-- <span><b>About Stack</b></span>
                <p> Исчисление предикатов дискредитирует конфликт, ломая рамки привычных представлений. Вероятностная логика контролирует гений. Здравый смысл трансформирует закон исключённого третьего, однако Зигварт считал критерием истинности необходимость и общезначимость, для которых нет никакой опоры в объективном мире. Мир философски контролирует онтологический гедонизм, не учитывая мнения авторитетов. Интересно отметить, что гений реально принимает во внимание типичный позитивизм, изменяя привычную реальность.</p> --}}

                {{-- <span class="w-100 float-left"><b>Protfolio</b></span>
                <a href="#" class="w-100 float-left mb-4">https://claire-murphy.co</a> --}}

                {{-- <span class="w-100 float-left"><b>Contacts</b></span>
                <a href="tel:+998 {{$user->contact}} ">+998 {{$user->contact}}</a>
            </div>
            <div class="publication-block-footer mt-4 w-100 d-flex justify-content-between">
                <!-- <a href="#" class="custom-btn">Send a message</a> -->
                <a href="{{url()->previous()}}" class="custom-btn">Back</a>
            </div>

        </div>
    </div>
</div> --}}
<div class="row mt-4">
    <div class="col-lg-8 order-lg-1 order-2">
        <div class="freelancer">
            <div class="top d-flex justify-content-between flex-column flex-sm-row">
                <div class="user-info d-flex">
                        <div class="mr-3 rounded-image" style="background-image: url('{{$user->avatar ? asset($user->avatar) : asset('data/img/Ellipse.png')}}')">
                        
                        </div>
                    <!-- <img src="{{$user->avatar ? asset($user->avatar) : asset('ext/img/no-image.webp')}}" alt=""> -->
                    <div>
                        <h6>{{$user->name}}</h6>
                        <p>{{$user->role}}</p>
                    </div>
                </div>
                <button data-toggle="modal" data-target="#messageModal" type="button" class="sent-message-btn"><img src="{{ asset('data/img/mail.svg') }}" alt="mail"> Отправить сообщение</button>
            </div>
            <div class="mid mt-3">
                <h6 class="mt-3">О себе</h6>
                <p class="about-text">{{$user->about}}</p>
                {{-- <h6 class="mt-3">Портфолио</h6>
                <a href="#">behance.com</a> --}}
                <h6 class="mt-3">Навыки</h6>
                <div class="tags">
                    @foreach ($user->skills as $skill)
                        <button onclick="location.href='#'">{{ $skill->name }}</button>
                    @endforeach
                </div>
                <h6 class="mt-3">Контакты: <a class="telegram-username" href="tel:+998{{$user->contact}}"> +998 
                <!-- <img src="{{ asset('data/img/telegram.svg') }}" alt="telegram image">  -->
                {{ $user->contact }}</a></h6>
            </div>
            <div class="d-flex justify-content-end">
                <a href="{{url()->previous()}}" class="back-btn">Назад</a>
            </div>
        </div>
    </div>
    @include('layouts.messageToUser')
</div>
<!-- The Modal -->
<div class="modal fade" id="messageModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('sendMessage') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Отправить сообщение</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    
                    <textarea name="text" id="" cols="30" rows="10" class="input-style" placeholder="Напишите ваще сообщение сюда"></textarea>
                    <input type="hidden" name="user_id" value="{{$user->id}}">
                    <input type="hidden" name="from_user_id" value="{{ Auth()->user()->id }}">
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">Закрыть</button>
                    <button type="submit" class="active-btn" >Отправить</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection