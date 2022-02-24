{{-- This layout is for register and login pages --}}


<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<title>Worklance | Freelance marketplace</title>
	<meta name="description" content="Freelance projects">
	<meta name="viewport" content="width=device-width">
	<link rel="icon" href="{{asset('ext2/images/favicon.png')}}">
	<meta property="og:image" content="{{asset('ext2img/dest/preview.jpg')}}">
	<link rel="stylesheet" href="{{asset('ext2/css/app.min.css')}}">

</head>

<body>

    <!-- CUSTOM HTML -->
    <div class="container">
        @yield('content')
    </div>

	<script src="{{asset('ext2/js/app.min.js')}}"></script>

</body>
</html>
