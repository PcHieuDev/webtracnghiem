@extends('layouts.frontend')
@section('title', __('Đăng Nhập'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6 col-xxl-4 py-8 py-xl-0">
            <div class="card shadow">
                <!-- Card body -->
                <div class="card-body p-6">
                    <div class="mb-4">
                        <a href="/"><img src="{{ Storage::url(websiteLog()) }}" class="mb-2" style="    height: 200px;"
                                         alt=""></a>
                        <h5 style="text-align: center" class="mb-6">Nhập đầy đủ thông tin của bạn.</h5>
                    </div>
                    @include('layouts.parts.validation-message')
                    <!-- Form -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <!-- Username -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" class="form-control" value="{{old('email')}}" name="email"
                                   placeholder="Email" required="">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Mật khẩu</label>
                            <input type="password" id="password" class="form-control" value="{{old('password')}}"
                                   name="password" placeholder="**************" required="">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                        <!-- Checkbox -->
                        <div class="d-lg-flex justify-content-between align-items-center
                  mb-4">
                            <div class="form-check custom-checkbox">
                                <input type="checkbox" class="form-check-input" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="rememberme">Lưu thông tin dăng nhập</label>
                            </div>

                        </div>
                        <div>
                            <!-- Button -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Đăng nhập</button>
                            </div>

{{--                            <div class="d-md-flex justify-content-between mt-4">--}}
{{--                                <div class="mb-2 mb-md-0">--}}
{{--                                    <a style="text-decoration: none" href="{{ asset('register') }}" class="">Tạo tài--}}
{{--                                        khoản </a>--}}
{{--                                </div>--}}
{{--                                @if (Route::has('password.request'))--}}
{{--                                    <div>--}}
{{--                                        <a style="text-decoration: none" href="{{ route('password.request') }}"--}}
{{--                                           class="text-inherit">--}}
{{--                                            {{ __('Quên mật khẩu?') }}--}}
{{--                                        </a>--}}

{{--                                    </div>--}}
{{--                                @endif--}}

{{--                            </div>--}}
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
