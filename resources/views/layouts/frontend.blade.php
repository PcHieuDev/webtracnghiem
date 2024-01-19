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
    <link rel="stylesheet" href="/path/to/chosen.min.css">
    <link rel="stylesheet" href="{{ asset('css/frontend.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
          rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>


    @livewireStyles
    @stack('css')
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="/path/to/chosen.jquery.min.js"></script>

</head>


<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        {{--        @if(Auth::check())--}}
        {{--            @if(Auth::user()->hasRole('teacher'))--}}
        {{--                <img alt="" src='https://gcdnb.pbrd.co/images/noObK2BuNYbj.jpg?o=1'--}}
        {{--                     class="rounded-circle" height="60px" width="60px"/>--}}
        {{--            @elseif(Auth::user()->hasRole('student'))--}}
        {{--                <img alt="" src='https://gcdnb.pbrd.co/images/noObK2BuNYbj.png?o=1'--}}
        {{--                     class="rounded-circle" height="60px" width="60px"/>--}}
        {{--            @elseif(Auth::user()->hasRole('admin'))--}}
        {{--                <img alt="" src='https://gcdnb.pbrd.co/images/noObK2BuNYbj.jpg?o=1'--}}
        {{--                     class="rounded-circle" height="60px" width="60px"/>--}}
        {{--            @else--}}
        {{--                <img alt="" src='https://gcdnb.pbrd.co/images/noObK2BuNYbj.png?o=1'--}}
        {{--                     class="rounded-circle" height="60px" width="60px"/>--}}
        {{--            @endif--}}
        {{--        @endif--}}
        @if(Auth::check())
            <img alt="" src='https://i.postimg.cc/HWFZCk8X/307344524-6115994245096713-1424891674421054499-n-copy.jpg'
                 class="rounded-circle" height="60px" width="60px"/>
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
                    @if(Auth::user()->hasRole('student'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{asset('classroom/list')}}">Danh Sách Lớp</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{asset('student/profile')}}">Thông Tin Cá Nhân</a>

                    @endif
                    <li class="nav-item">
                        @if(Auth::user()->hasRole('admin'))
                            <a class="nav-link" href="{{asset('/dashboard')}}">Trang Quản Lý</a>
                        @elseif(Auth::user()->hasRole('teacher'))
                            <a class="nav-link" href="{{asset('/dashboard')}}">Trang Quản Lý</a>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{ asset('logout') }}">Đăng Xuất | {{ Auth::user()->name }}</a>
                </li>
                {{--                <li class="nav-item">--}}
                {{--                    @if(Auth::check())--}}
                {{--                        @if(Auth::user()->hasRole('teacher'))--}}
                {{--                            <a class="nav-link">Giáo Viên {{ Auth::user()->name }}</a>--}}
                {{--                        @elseif(Auth::user()->hasRole('student'))--}}
                {{--                            <a class="nav-link">Học Sinh {{ Auth::user()->name }}</a>--}}
                {{--                        @elseif(Auth::user()->hasRole('admin'))--}}
                {{--                            <a class="nav-link">nGài {{ Auth::user()->name }}</a>--}}
                {{--                        @else--}}
                {{--                            <a class="nav-link">{{ Auth::user()->name }}</a>--}}
                {{--                        @endif--}}
                {{--                    @endif--}}
                {{--                </li>--}}

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
            </div>
        </div>
    </div>
</footer>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js'></script>
<script src="/path/to/chosen.jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


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

{{--<script>--}}
{{--    $(document).ready(function () {--}}
{{--        $('.select2').select2();--}}
{{--    });--}}
{{--</script>--}}
{{--<script>--}}
{{--    $(document).ready(function () {--}}
{{--        $('.select2--large').select2({--}}
{{--            dropdownParent: $('#classroomCreateModal')--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}

{{--<script>--}}
{{--    $(document).ready(function () {--}}
{{--        // Cấu hình cơ bản--}}
{{--        $('.select2--large').select2();--}}

{{--        // Cấu hình với tùy chọn thêm mới--}}
{{--        $('.select2-with-tags').select2({--}}
{{--            tags: true,--}}
{{--            tokenSeparators: [',', ' '],--}}
{{--        });--}}

{{--        // Cấu hình với tùy chọn tìm kiếm từ xa (ajax)--}}
{{--        $('.select2-remote').select2({--}}
{{--            ajax: {--}}
{{--                url: 'https://example.com/api/data',--}}
{{--                processResults: function (data) {--}}
{{--                    return {--}}
{{--                        results: data.items,--}}
{{--                    };--}}
{{--                },--}}
{{--            },--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}

{{--<script>--}}
{{--    $(document).ready(function() {--}}
{{--        $('.js-example-basic-multiple').select2();--}}
{{--    });--}}
{{--</script>--}}
{{--<script>--}}
{{--    var currentURL = window.location.href;--}}
{{--    // Sử dụng biểu thức chính quy để tìm ID từ URL--}}
{{--    var regex = /\/classroom\/(\d+)\/quiz/;--}}
{{--    var match = currentURL.match(regex);--}}
{{--    if (match && match[1]) {--}}
{{--        var quizID = match[1];--}}

{{--        // Thay thế phần xác định studentID bằng cách sử dụng dữ liệu từ Laravel--}}
{{--        var studentID = @json(auth()->id());--}}

{{--        var localStorageKey = 'quiz-' + quizID + '-student-' + studentID;--}}
{{--        var storedTime = localStorage.getItem(localStorageKey);--}}
{{--    }--}}

{{--    // Lấy phút và giây từ các phần tử span--}}
{{--    var minutesElement = document.getElementById('minutes');--}}
{{--    var secondsElement = document.getElementById('seconds');--}}

{{--    var minutes = parseInt(minutesElement.textContent);--}}
{{--    var seconds = parseInt(secondsElement.textContent);--}}

{{--    if (storedTime) {--}}
{{--        var parsedTime = JSON.parse(storedTime);--}}
{{--        minutes = parsedTime.minutes;--}}
{{--        seconds = parsedTime.seconds;--}}
{{--    }--}}

{{--    document.addEventListener('DOMContentLoaded', function () {--}}
{{--        var countdown = document.getElementById('timer');--}}

{{--        function updateCountdown() {--}}
{{--            countdown.textContent = minutes + ' phút ' + seconds + ' giây';--}}

{{--            if (minutes === 0 && seconds === 0) {--}}
{{--                // Thời gian đếm ngược đã kết thúc, gọi hàm ansStore()--}}
{{--                ansStore();--}}
{{--            } else {--}}
{{--                if (seconds === 0) {--}}
{{--                    minutes--;--}}
{{--                    seconds = 59;--}}
{{--                } else {--}}
{{--                    seconds--;--}}
{{--                }--}}
{{--                saveTime(); // Lưu thời gian đếm ngược vào localStorage--}}
{{--                setTimeout(updateCountdown, 1000); // Cập nhật mỗi giây--}}
{{--            }--}}
{{--        }--}}

{{--        // Bắt đầu đếm ngược khi trang tải--}}
{{--        updateCountdown();--}}
{{--    });--}}

{{--    function saveTime() {--}}
{{--        var timeToStore = {--}}
{{--            minutes: minutes,--}}
{{--            seconds: seconds--}}
{{--        };--}}
{{--        localStorage.setItem(localStorageKey, JSON.stringify(timeToStore));--}}
{{--    }--}}

{{--    function ansStore() {--}}
{{--        var quizForm = document.getElementById('submit-form-js');--}}
{{--        if (quizForm) {--}}
{{--            // Xóa thời gian từ localStorage sau khi nộp bài--}}
{{--            localStorage.removeItem(localStorageKey);--}}
{{--            quizForm.submit();--}}
{{--        }--}}
{{--    }--}}
{{--</script>--}}
<script>
    // Lấy URL hiện tại
    var currentURL = window.location.href;

    // Sử dụng biểu thức chính quy để tìm ID từ URL
    var regex = /\/classroom\/(\d+)\/quiz/;
    var match = currentURL.match(regex);

    if (match && match[1]) {
        // Lấy ID của bài kiểm tra từ URL
        var quizID = match[1];

        // Thay thế phần xác định studentID bằng cách sử dụng dữ liệu từ Laravel
        var studentID = @json(auth()->id());

        // Tạo key để lưu trữ thời gian đếm ngược vào localStorage
        var localStorageKey = 'quiz-' + quizID + '-student-' + studentID;

        // Lấy thời gian đã lưu từ localStorage (nếu có)
        var storedTime = localStorage.getItem(localStorageKey);
    }

    // Lấy phút và giây từ các phần tử trên trang web
    var minutesElement = document.getElementById('minutes');
    var secondsElement = document.getElementById('seconds');

    var minutes = parseInt(minutesElement.textContent);
    var seconds = parseInt(secondsElement.textContent);

    if (storedTime) {
        // Nếu có thời gian đã lưu, sử dụng nó để thiết lập thời gian đếm ngược
        var parsedTime = JSON.parse(storedTime);
        minutes = parsedTime.minutes;
        seconds = parsedTime.seconds;
    }
    // Đợi cho trang tải hoàn chỉnh
    document.addEventListener('DOMContentLoaded', function () {
        var countdown = document.getElementById('timer');

        function updateCountdown() {
            // Hiển thị và cập nhật thời gian đếm ngược trên trang web
            countdown.textContent = minutes + ' phút ' + seconds + ' giây';

            if (minutes === 0 && seconds === 0) {
                // Nếu thời gian đếm ngược đã kết thúc, gọi hàm ansStore()
                ansStore();
            } else {
                if (seconds === 0) {
                    minutes--;
                    seconds = 59;
                } else {
                    seconds--;
                }
                // Lưu thời gian đếm ngược vào localStorage và cập nhật lại sau mỗi giây
                saveTime();
                setTimeout(updateCountdown, 1000);
            }
        }

        // Bắt đầu đếm ngược khi trang tải
        updateCountdown();
    });
    window.addEventListener('beforeunload', function (event) {
        // Lưu thời gian đếm ngược vào localStorage khi người dùng rời trang
        saveTime();
        var confirmationMessage = 'Bạn có chắc muốn rời khỏi trang này?';
        (event || window.event).returnValue = confirmationMessage;
        return confirmationMessage;
    });

    // Lưu thời gian đếm ngược (phút và giây) vào localStorage
    function saveTime() {
        var timeToStore = {
            minutes: minutes,
            seconds: seconds
        };
        localStorage.setItem(localStorageKey, JSON.stringify(timeToStore));
    }

    // Xử lý khi thời gian đếm ngược kết thúc (ví dụ: nộp bài)
    function ansStore() {
        var quizForm = document.getElementById('submit-form-js');
        if (quizForm) {
            // Xóa thời gian từ localStorage sau khi nộp bài và gửi form
            localStorage.removeItem(localStorageKey);
            quizForm.submit();
        }
    }
</script>
<script>
    // Khi tài liệu đã tải hoàn toàn
    $(document).ready(function () {
        // Áp dụng Bootstrap-datepicker vào ô nhập thời gian
        $('#appt').datepicker({
            format: 'dd-mm-yyyy', // Định dạng ngày tháng năm (d-m-y)
            autoclose: true // Tự động đóng khi chọn ngày
        });
    });
</script>

</body>
</html>
