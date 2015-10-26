<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" type="text/css" href="../css/simptip.min.css">
        <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <title>Blog World</title>
    </head>
    <body>
    <div class="container">
        <div class="page-header" id="website-title">
            <h1 style="color:black;">Blog World</h1>
        </div>
        <nav class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="/">Blog World</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="/about">About</a></li>
                @if(Auth::user())
                    <li><a href="/account">Account</a></li>
                    <li><a href="/newpost">New Post</a></li>
                    <li><a href="/view-blog/{{ Auth::user()->blog()->first()->id }}">My Blog</a></li>
                    <li><a href="/logout">Log Out</a></li>
                @else
                    <li><a href="/login">Log In</a></li>
                    <li><a href="/register">Register</a></li>
                @endif
            </ul>
        </nav>
    </div>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
