<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Worklance</title>
    <link rel="shortcut icon" href="{{ asset('data/img/favicon.png') }}" type="image/png">
    <link rel="stylesheet" href="data/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('data/css/style.css') }}">
    <meta property="og:image" content="{{asset('ext2/img/dest/preview.jpg')}}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="{{ asset('data/js/index.js') }}"></script>
</head>

<body>
<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="{{ route('home') }}">
        <img src="{{ asset('data/img/WorklanceLogo.svg') }}" alt="">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <img src="{{ asset('data/img/menu.svg') }}" alt="">
    </button>


    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav w-100 align-items-lg-center">
            <li class="nav-item">
                <a class="nav-link dr" href="{{ route('home') }}">Публикации</a>
            </li>
            <li class="nav-item">
                <a class="nav-link dr" href="{{ route('users') }}">Люди</a>
            </li>

            <li class="nav-item ml-lg-auto">
                <a class="nav-link" href="{{ route('post.create') }}">
                    <button class="add-project-btn">+ <span>Добавить проект</span></button>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <span class="username">{{Auth::user()->name}}</span>
                            <p class="subdropdown">{{Auth::user()->profileType}}</p>
                        </div>
                        <div class="col-4 text-md-center">
                            <img class="nav-user-image" src="{{ Auth::user()->avatar ? asset(Auth::user()->avatar) : asset('ext2/images/user-avatar.jpg')}}" alt="User image">
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('dashboard') }}">Мои проекты</a>
                    <a class="dropdown-item" href="{{ route('dashboard') }}">Настройки</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                        Выход
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
<div class="wrapper">
    <div class="container-fluid">
            @yield('content')
    </div>
</div>

<script>
    $(function(){
    	$('.dr').each(function(){
    		if ($(this).prop('href') == window.location.href) {
    			$(this).addClass('active'); $(this).parents('li').addClass('active');
    		}
    	});
    });
</script>
</body>
</html>
