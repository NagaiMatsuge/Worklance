@extends('layouts.navAndFooter')
@section('content')
@include('layouts.message')
    {{-- <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <h2>Settings</h2>
            <form action="{{ route('personalInfo') }}" method="POST" enctype="multipart/form-data" class="w-100">
                @csrf
                
                <p>Personal Info</p>

                <input id="fileinput" name="avatar" type="file" style="display:none;"/>

                <button name="avatar" id="falseinput" type="button" class="custom-input">Choose avatar</button>
                <span id="selected_filename">No file selected</span>

                <input name="name" type="text" class="custom-input mt-4" value="{{Auth::user()->name}}" placeholder="Full Name">
                <select name="role" id="" class="custom-input mt-2">
                    @if(Auth::user()->role != null)
                        <option value="{{Auth::user()->role}}">{{Auth::user()->role}}</option>
                    @endif
                    <option value="Design">Design</option>
                    <option value="Front-end">Front-end</option>
                    <option value="Back-end">Back-end</option>
                </select>
                <input name="contact" type="tel" value="{{Auth::user()->contact}}" placeholder="Phone number" pattern="[0-9]{2}[0-9]{3}[0-9]{4}" class="custom-input mt-2">
                <small>Format: 998403546</small>
                <input type="submit" class="custom-btn mt-2 float-right" value="Save">
            </form>
            <form action="{{ route('changePassword') }}" method="POST" class="w-100">
                @csrf
                <p class="mt-5">Privacy</p>

                <input name="currentPassword" type="password" class="custom-input mt-2 @error('currentPassword') is-invalid @enderror" required autocomplete="new-password" placeholder="Current password">
                @error('currentPassword')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input name="password" type="password" class="custom-input mt-2 @error('password') is-invalid @enderror" required placeholder="New password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input name="confirm" type="password" class="custom-input mt-2 @error('confirm') is-invalid @enderror" required placeholder="Confirm Password">
                @error('confirm')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input type="submit" class="custom-btn mt-2 float-right" value="Save">
            </form>


        </div>
        <div class="offset-1 col-xl-7 col-lg-7 col-md-7 col-sm-12 col-xs-12">
        <h2>Extra Information</h2>
        <p>About <span class="text-small">(160 symbols)</span></p>
        <form action="{{route('about')}}" method="POST">
            @csrf
            @method('PUT')
        <textarea name="about" rows="5" class="w-100 custom-input" placeholder="Type about yourself" maxlength="160">{{Auth::user()->about}}</textarea>
            <input type="submit" class="custom-btn mt-2 float-right" value="Save">
        </form>
        <div class="publication-list mt-5">
            <a href="post/create" class="custom-btn custom-btn-accent">Add publication</a>
            @foreach ($userPosts as $post)
                <div class="publication-list-block mt-3">
                    <h5>{{$post->name}}</h5>
                    <a href="/post/{{$post->id}}/edit" class="btn-edit mr-2">Edit</a>
                    <a class="btn-delete" href="post/{{ $post->id }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('del{{$post->id}}').submit();">
                                        {{ __('Delete') }}
                          </a>
							<form id="del{{$post->id}}" action="post/{{ $post->id }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE') 
							</form>
                </div> 
            @endforeach
        </div>
        </div>
    </div> --}}




    {{-- <div class="row settings mt-4"> --}}
        <div class="col-12">
            <h6 class="title">Настройки</h6>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <div class="inner-blocks">
                <h6><img src="{{ asset('data/img/contact.svg') }}" alt=""> Общая информация</h6>
                <form action="{{ route('personalInfo') }}" method="POST" enctype="multipart/form-data">
                    <div class="text-center user-image-block">
                        <img src="{{ Auth::user()->avatar ? asset(Auth::user()->avatar) : asset('ext2/images/user-avatar.jpg')}}" class="user-image" alt="">
                        <input name="avatar" type="file" name="" id="userimage">
                        <label for="userimage" class="userimage-label">
                            <img src="{{ asset('data/img/camera.svg') }} " alt="">
                        </label>
                    </div>
                    <input name="name" type="text" value="{{Auth::user()->name}}" class="input-style" placeholder="Полное имя">
        
                    <select name="role" id="" class="input-style">
                        @if(Auth::user()->role != null)
                            <option value="{{Auth::user()->role}}">{{Auth::user()->role}}</option>
                        @endif
                        <option value="Design">Design</option>
                        <option value="Front-end">Front-end</option>
                        <option value="Back-end">Back-end</option>
                    </select>
                    <input name="contact" type="text" class="input-style" value="{{Auth::user()->contact}}" pattern="[0-9]{2}[0-9]{3}[0-9]{4}" placeholder="Имя пользователя в Telegram">
                    <div class="text-right">
                        <button class="save-btn back-btn">Сохранить</button>
                    </div>
                </form>
            </div>
            {{-- <button class="delete-btn" data-toggle="modal" data-target="#myModal" type="button">Удалить аккаунт</button> --}}
        </div>
        <div class="col-lg-4">
            <div class="inner-blocks">
                <h6>
                    <img src="{{ asset('data/img/lock.svg') }}" alt=""> Безопасность</h6>
                <form action="{{ route('changePassword') }}" method="POST">
                    @csrf
                    {{-- <input type="email" class="input-style" placeholder="Эл. почта"> --}}
                    
                    <div class="my-input-group">
                        <input name="currentPassword" type="password" placeholder="Текущий пароль" class="input-style @error('password') is-invalid @enderror" required>
                        @error('currentPassword')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <button type="button" class="show-password">
                            <img width="17" src="{{ asset('data/img/eye.svg') }}" alt="">
                        </button>
                    </div>

                    <div class="my-input-group">
                        <input name="password" type="password" class="input-style @error('password') is-invalid @enderror" required placeholder="Новый пароль">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <button type="button" class="show-password">
                            <img width="17" src="{{ asset('data/img/eye.svg') }}" alt="">
                        </button>
                    </div>

                    <div class="my-input-group">
                        <input name="confirm" type="password" class="input-style" placeholder="Подтвердите пароль">
                        @error('confirm')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <button type="button" class="show-password">
                            <img width="17" src="{{ asset('data/img/eye.svg') }}" alt="">
                        </button>
                    </div>
                    
                    <div class="text-right">
                        <button type="submit" class="save-btn back-btn">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-5 mt-sm-4">
            <div class="inner-blocks">
                <h6>
                <img src="{{ asset('data/img/add.svg') }}" alt=""> Дополнительно</h6>
                <?php $num = count($userSkills) ?>
                <h6>Мои навыки: 
                    @for ($i = 0; $i < $num; $i++)
                        {{ $userSkills[$i]->name }}   
                        @if($i != $num-1)
                            ,
                        @endif
                    @endfor
                    
                </h6>
                <form action="{{route('about')}}" method="POST">
                    @csrf
                    @method('PUT')
                    {{-- <input type="text" class="input-style" placeholder="Ссылка на портфолио"> --}}

                    <select name="skills[]" class="selectpicker select-input multiselect1" multiple data-live-search="true">
                        @foreach ($skills as $skill)
                            <option>{{ $skill->name }}</option>
                        @endforeach
                    </select>
                    
                    <textarea name="about" id="" cols="30" rows="5" class="input-style" placeholder="О себе">{{Auth::user()->about}}</textarea>
                    <div class="text-right">
                        <button class="save-btn back-btn">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- </div>   --}}

<!-- The Modal -->
{{-- <div class="modal fade" id="myModal">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <form action="">
            <div class="modal-header">
                <h4 class="modal-title">Удалить аккаунт</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <h6>Чтобы удалить аккаунт, введите пароль.</h6>
                <div class="my-input-group">
                    <input type="password" id="delete-input" placeholder="Пароль" class="input-style"> 
                    <button type="button" class="show-password"><img width="17" src="{{ asset('data/img/eye.svg') }}" alt=""></button>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn" data-dismiss="modal">Закрыть</button>
                <button class="btn btn-danger modal-delete-btn" data-dismiss="modal">Удалить</button>
            </div>
        </form>
    </div> --}}
@endsection