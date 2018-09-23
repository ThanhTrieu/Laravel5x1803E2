<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Demo view laravel</title>
    <link rel="stylesheet" href="{{ asset('css/mycss.css') }}">
</head>
<body>
    <div class="container">
        <div class="header">
            <h3 style="color: white;">This is header</h3>
        </div>
        <div class="menu">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="{{ route('student') }}">Students</a></li>
                <li><a href="{{ route('mypd') }}">Product</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">About</a></li>
            </ul>
        </div>
        <div class="content">
            @yield('content')
        </div>
        <br><br>
        <div class="footer">
            <h3>This is footer</h3>
        </div>
    </div>
</body>
</html>