<x-guest-layout>
    <x-auth-card class="text text-center justify-content-center">
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}" class="justify-content-center text-center" >
            @csrf  
                <div class="form-group">
                    <label for="email" :value="__('Email')" class="" style="margin-right: 27px;">Email</label>
                    <input type="email"  id="email" name="email" :value="old('email')" required autofocus />
                </div>
                <div class="form-group">
                    <label for="password" :value="__('Password')" class="">Password</label>
                    <input type="password"  id="password" name="password" required autocomplete="current-password" />
                </div>
                <div class="form-group form-check">
                    <input class="form-check-input" type="checkbox" id="remember_me">
                    <label class="form-check-label" for="autoSizingCheck">
                        {{ __('Remember me') }}
                    </label>
                </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
                @endif

                <x-button class="ml-3" style="color: white; background-color: #007bff!important;">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>