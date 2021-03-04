<x-guest-layout>
{{--    <x-auth-card>--}}
{{--        <x-slot name="logo">--}}
{{--            <a href="/">--}}
{{--                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />--}}
{{--            </a>--}}
{{--        </x-slot>--}}

{{--        <!-- Validation Errors -->--}}
{{--        <x-auth-validation-errors class="mb-4" :errors="$errors" />--}}


{{--    </x-auth-card>--}}
    <section class="min-h-screen flex flex-col sm:justify-center items-center pt-6 bg-gray-900" style="background-image: url('{{ asset('/images/Auth/register_bg_2.png') }}'); background-size: 100%; background-repeat: no-repeat;">
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
                                <h6 class="text-gray-600 text-lg font-bold">Sign Up With</h6>
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
                                <small>Or sign up with credentials</small>
                            </div>

                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                            <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- Name -->
                                <div>
                                    <x-label for="name" :value="__('Name')" />

                                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                                </div>

                                <!-- Email Address -->
                                <div class="mt-1">
                                    <x-label for="email" :value="__('Email')" />

                                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                                </div>

                                <!-- Password -->
                                <div class="mt-1">
                                    <x-label for="password" :value="__('Password')" />

                                    <x-input id="password" class="block mt-1 w-full"
                                             type="password"
                                             name="password"
                                             required autocomplete="new-password" />
                                </div>

                                <!-- Confirm Password -->
                                <div class="mt-1">
                                    <x-label for="password_confirmation" :value="__('Confirm Password')" />

                                    <x-input id="password_confirmation" class="block mt-1 w-full"
                                             type="password"
                                             name="password_confirmation" required />
                                </div>

                                <div class="flex items-center justify-end mt-4">
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                        {{ __('Already registered?') }}
                                    </a>

                                    <x-button class="ml-4">
                                        {{ __('Register') }}
                                    </x-button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
