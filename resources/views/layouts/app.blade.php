<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="turbolinks-visit-control" content="reload">
    {{-- <meta name="turbolinks-cache-control" content="no-cache"> --}}
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@hasSection('title') @yield('title') | @endif {{ websiteName() }}
    </title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ Storage::url(websiteFavicon()) }}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="/path/to/chosen.min.css">
    @livewireStyles
    @stack('css')
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="/path/to/chosen.jquery.min.js"></script>



<body>

    <div id="db-wrapper">
        @if (request()->is('login') || request()->is('register'))
        @yield('content')
        @else
        @include('layouts.parts.sidebar')
        <div id="page-content">
            @include('layouts.parts.nav')
            <!-- Container fluid -->
            <div class="bg-primary pt-10 pb-21"></div>
            <div class="container-fluid mt-n22 px-6">
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </div>
        @endif
    </div>
    @include('layouts.parts.script')
<script>

        $(document).ready(function () {
        $('.chosen-select').chosen({
            search_contains: true,
            allow_single_deselect: true,
            max_shown_results: 5,
            no_results_text: "Không tìm thấy kết quả"
        });
    });


</script>


</script>
</script>
</body>

</html>
