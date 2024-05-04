<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>


{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}

{{--<head>--}}

{{--    <meta charset="utf-8">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="IE=edge">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">--}}
{{--    <meta name="description" content="">--}}
{{--    <meta name="author" content="">--}}

{{--    <title>SB Admin 2 - Login</title>--}}

{{--    <!-- Custom fonts for this template-->--}}
{{--    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">--}}
{{--    <link--}}
{{--        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"--}}
{{--        rel="stylesheet">--}}

{{--    <!-- Custom styles for this template-->--}}
{{--    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">--}}

{{--</head>--}}

{{--<body class="bg-gradient-primary">--}}

{{--<div class="container">--}}

{{--    <!-- Outer Row -->--}}
{{--    <div class="row justify-content-center">--}}

{{--        <div class="col-xl-10 col-lg-12 col-md-9">--}}

{{--            <div class="card o-hidden border-0 shadow-lg my-5">--}}
{{--                <div class="card-body p-0">--}}
{{--                    <!-- Nested Row within Card Body -->--}}
{{--                    <div class="row">--}}

{{--                        <div class="col-lg-6 mx-auto">--}}
{{--                            <div class="p-5">--}}
{{--                                <div class="text-center">--}}
{{--                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>--}}
{{--                                </div>--}}
{{--                                <form method="POST" action="{{ route('login') }}">--}}
{{--                                    @csrf--}}
{{--                                    <div class="form-group">--}}
{{--                                        <input type="email" class="form-control form-control-user"--}}
{{--                                               id="exampleInputEmail" aria-describedby="emailHelp"--}}
{{--                                               placeholder="Enter Email Address..." name="name">--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <input type="password" class="form-control form-control-user"--}}
{{--                                               id="exampleInputPassword" placeholder="Password" name="password">--}}
{{--                                    </div>--}}

{{--                                    <input type="submit" class="btn btn-success" value="Submit">--}}
{{--                                </form>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}

{{--    </div>--}}

{{--</div>--}}

{{--<!-- Bootstrap core JavaScript-->--}}
{{--<script src="assets/vendor/jquery/jquery.min.js"></script>--}}
{{--<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>--}}

{{--<!-- Core plugin JavaScript-->--}}
{{--<script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>--}}

{{--<!-- Custom scripts for all pages-->--}}
{{--<script src="assets/js/sb-admin-2.min.js"></script>--}}

{{--</body>--}}

{{--</html>--}}
