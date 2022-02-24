@extends('layouts.navAndFooter')
@section('content')
@include('layouts.message')
<div class="row mt-4">
    <div class="col-lg-8 order-lg-1 order-2">
        <form action="{{ route('search') }}" method="POST" class="search-form">
            @csrf
            <input name="search" type="text" placeholder="Поиск">
            <button class="search-btn"><img src="{{ asset('data/img/search.svg') }}" alt="search image"></button>
        </form>
        <ul class="w-list">
            @foreach($users as $user)
                <li class="w-list-item">
                    <a href="{{ route('user', ['id' => $user->id]) }}">
                        <div class="d-flex media-flex">
                            <div class="mr-3 rounded-image" style="background-image: url('{{$user->avatar ? asset($user->avatar) : asset('data/img/Ellipse.png')}}')">
                                <!-- <img src="{{$user->avatar ? asset($user->avatar) : asset('data/img/Ellipse.png')}}" alt="user image"> -->
                            </div>
                            <div class="user-info">
                                <h6>{{ $user->name }}</h6>
                                <p>{{$user->role ? $user->role : "Not entered yet"}}</p>
                                <p>
                                    {{ $user->about ? $user->about : "Looking forward to accomplish the tasks" }}
                                </p>
                                <div class="tags">
                                    @if(isset($user->skills))
                                        @foreach ($user->skills as $skill)
                                            <button onclick="location.href='#'">{{ $skill->name }}</button>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
        {{ $users->onEachSide(1)->links() }}
    </div>
    @include('layouts.messageToUser')
</div>
@endsection
