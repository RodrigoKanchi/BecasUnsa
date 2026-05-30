<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Becas Unsa</title>
    <script src="https://kit.fontawesome.com/0763a21c1e.js" crossorigin="anonymous"></script>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body>
    <div class="adm-root" >
        @include('parts.sidebar')
        <div class="adm-main">
            @include('parts.topnav')
            @yield('content')
        </div>
    </div>    
</body>
</html>