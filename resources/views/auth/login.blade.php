@extends('layouts.app')
@section('content')
    <div style="height: 100vh" class="login">
        <div class="container sm:px-10">
            <div class="block xl:grid grid-cols-2 gap-4">
                <div class="hidden xl:flex flex-col min-h-screen">
                    <div class="my-auto">
                        <img alt="Royal" class="-intro-x w-1/2 -mt-16" src="/svgexport-1.svg">
                    </div>
                </div>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-4">
                        <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                            <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left ">Sign In</h2>
                            <div class="intro-x mt-2 text-slate-400 xl:hidden text-center">A few more clicks to sign in to your
                                account. Manage all your e-commerce accounts in one place</div>
                            <div class="intro-x mt-8">
                                <input id="email" type="email"
                                       class="intro-x login__input form-control py-3 px-4 block {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                       required autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}"
                                       name="email" value="{{ old('email', null) }}">
                                @if ($errors->has('email'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                                <input type="password" id="password"
                                       class="intro-x login__input form-control py-3 px-4 block mt-4 {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       name="password" required placeholder="{{ trans('global.login_password') }}">
                                @if ($errors->has('password'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('password') }}
                                    </div>
                                @endif
                            </div>
                            <div class="intro-x flex text-slate-600 dark:text-slate-500 text-xs sm:text-sm mt-4">
                                <div class="flex items-center mr-auto">
                                    <input name="remember" id="remember" type="checkbox" class="form-check-input border mr-2">
                                    <label class="cursor-pointer select-none"
                                           for="remember">Remember me</label>
                                </div>
                            </div>
                            <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                                <button type="submit"
                                        class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Login</button>
                            </div>
                        </div>
                    </div>
                </form>

                <!-- END: Login Form -->
            </div>
        </div>
    </div>
@endsection
