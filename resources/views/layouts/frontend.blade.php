<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="turbolinks-visit-control" content="reload">
    {{-- <meta name="turbolinks-cache-control" content="no-cache"> --}}
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@hasSection('title')
            @yield('title') |
        @endif {{ websiteName() }}
    </title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ Storage::url(websiteFavicon()) }}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/frontend.css') }}">
    @livewireStyles
    @stack('css')
    <script src="{{ asset('js/app.js') }}"></script>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        @if(Auth::check())
            <img alt="" src='https://gcdnb.pbrd.co/images/noObK2BuNYbj.jpg?o=1'
                 class="rounded-circle" height="60px" width="60px" />

        @endif

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain"
                aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMain">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Trang Chủ</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{asset('classroom/list')}}">Danh Sách Lớp</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ asset('logout') }}">Đăng Xuất</a>
                    </li>
                    <li class="nav-item">
                        @if(Auth::check())
                            @if(Auth::user()->hasRole('teacher'))
                                <a class="nav-link">Giáo Viên {{ Auth::user()->name }}</a>
                            @elseif(Auth::user()->hasRole('student'))
                                <a class="nav-link">Học Sinh {{ Auth::user()->name }}</a>
                            @elseif(Auth::user()->hasRole('Admin'))
                                <a class="nav-link">nGài {{ Auth::user()->name }}</a>
                            @else
                                <a class="nav-link">{{ Auth::user()->name }}</a>
                            @endif
                        @endif
                    </li>

                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ asset('login') }}">Đăng Nhập</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{asset('register')}}">Đăng Ký</a>
                    </li>
                @endauth
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</nav>
<div class="container jumbo">
    @yield('content')
</div>

<footer class="footer bg-dark text-white p-3">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p>&copy; {{ date('Y') }} {{ websiteName() }}</p>
            </div>        </div>
    </div>
</footer>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js'></script>
@livewireScripts
<script>
    (function ($) {
        $(window).scroll(function () {
            if ($(document).scrollTop() > 300) {
                // Navigation Bar
                $('.navbar').removeClass('fadeIn');
                $('body').addClass('shrink');
                $('.navbar').addClass('fixed-top animated fadeInDown');
            } else {
                $('.navbar').removeClass('fadeInDown');
                $('.navbar').removeClass('fixed-top');
                $('body').removeClass('shrink');
                $('.navbar').addClass('animated fadeIn');
            }
        });
    })(jQuery);
</script>

</body>

</html>
