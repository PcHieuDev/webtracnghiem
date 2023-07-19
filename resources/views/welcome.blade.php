@extends('layouts.app')
@section('title', __('Welcome'))
@section('content')
<div class="container-fluid">
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><h5><span class="text-center fa fa-home"></span> @yield('title')</h5></div>
            <div class="card-body">
              <h5>
            @guest

				{{ __('Welcome to') }} {{ config('app.name', 'Laravel') }} !!! </br>
                      Vui lòng liên hệ với quản trị viên để nhận Thông tin xác thực đăng nhập của bạn hoặc nhấp vào "Đăng nhập" để truy cập Dashboard của bạn.
			@else
					Chào {{ Auth::user()->name }}, Chào mừng tới {{ config('app.name', 'Laravel') }}.
            @endif
				</h5>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
