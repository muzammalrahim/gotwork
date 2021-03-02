<x-guest-layout>
{{--    <x-auth-card>--}}
{{--        <x-slot name="logo">--}}

{{--        </x-slot>--}}
{{--    </x-auth-card>--}}
    <section class="absolute w-full h-full">
        <div class="absolute top-0 w-full h-full bg-gray-900" style="background-image: url('{{ asset("/images/Auth/register_bg_2.png") }}'); background-size: 100%; background-repeat: no-repeat;">
        </div>
        <div class="container mx-auto px-4 h-full">
            <div class="flex content-center items-center justify-center h-full">
                <div class="w-full lg:w-4/12 px-4">
                    <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-300 border-0">
                        <div class="rounded-t mb-0 px-6 py-6">
                            <div class="w-48 mx-auto pb-4">
                                <a href="/">
                                    <img src="{{ asset('/images/cropped-gotWorkLogoGreyOrange-1.png') }}" class="fill-current text-gray-500">
                                    {{--                                                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />--}}
                                </a>
                            </div>
                            <div class="text-center mb-3">
                                <h6 class="text-gray-600 text-lg font-bold">Sign in with</h6>
                            </div>
                            <div class="btn-wrapper text-center">
                                <a href="{{ url('auth/google') }}" class="bg-white active:bg-gray-100 text-gray-800 font-normal px-4 py-2 rounded outline-none focus:outline-none mr-2 mb-1 uppercase shadow hover:shadow-md inline-flex items-center font-bold text-xs"
                                    style="transition: all 0.15s ease 0s;">
                                    <img alt="Google" class="w-5 mr-1" src="{{ asset('/images/Auth/google.svg') }}"/>
                                    Google
                                </a>
                            </div>
                            <hr class="mt-6 border-b-1 border-gray-400" />
                        </div>
                        <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                            <div class="text-gray-500 text-center mb-3 font-bold">
                                <small>Or sign in with credentials</small>
                            </div>
                            <!-- Session Status -->
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                            <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email Address -->
                                <div>
                                    <x-label for="email" :value="__('Email')" />

                                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                                </div>

                                <!-- Password -->
                                <div class="mt-4">
                                    <x-label for="password" :value="__('Password')" />

                                    <x-input id="password" class="block mt-1 w-full"
                                             type="password"
                                             name="password"
                                             required autocomplete="current-password" />
                                </div>

                                <!-- Remember Me -->
                                <div class="block mt-4">
                                    <label for="remember_me" class="inline-flex items-center">
                                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                    </label>
                                </div>



                                <div class="flex items-center justify-end mt-4">
                                    @if (Route::has('password.request'))
                                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                            {{ __('Forgot your password?') }}
                                        </a>
                                    @endif

                                    <x-button class="ml-3">
                                        {{ __('Login') }}
                                    </x-button>
                                </div>

{{--                                <div class="flex items-center justify-center mt-4">--}}
{{--                                    <a href="{{ url('auth/google') }}">--}}
{{--                                        <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png" style="margin-left: 3em;">--}}
{{--                                    </a>--}}
{{--                                </div>--}}
                            </form>
                            <!-- Register Page Link -->
                            <div class="text-center mt-3">
                                @if(Route::has('register'))
                                    <a href="{{ route('register') }}">
                                        {{ __("Don't have an account?") }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
