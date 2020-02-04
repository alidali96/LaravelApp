<html>
<head>
    <title>@yield('title', 'Laravel App')</title>
    <link type="text/css" rel="stylesheet" href="{{asset('css/app.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('css/style.css')}}"/>
</head>
<body class=" text-dark">
<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-3">
        <a class="navbar-brand" href="{{route('home.index')}}">{{config('app.name')}}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{action('ArticleController@index')}}">Articles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{action('CategoryController@index')}}">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('about.show')}}">About me</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('langs.show')}}">Things I know</a>
                </li>
            </ul>
            {{--            <form class="form-inline mt-2 mt-md-0">--}}
            {{--                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">--}}
            {{--                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>--}}
            {{--            </form>--}}
        </div>
    </nav>
</header>

<div class="container">@yield('content')</div>
</body>
</html>
