<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}" class="justify-content-center text-center">
            @csrf

            <!-- Name -->
            <div class="form-group">
                <label for="name" :value="__('Name')" style="margin-right: 85px;">Name</label>
                <input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>
            <!-- Email Address -->
            <div class="form-group">
                <label for="email" :value="__('Email')" style="margin-right: 90px;">Email</label>
                <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>
            <!-- Password -->
            <div class="form-group">
                <label for="password" :value="__('Password')" style="margin-right: 60px;">Password</label>
                <input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" >
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <label for="password_confirmation" :value="__('Confirm Password')" > Confirm Password</label>
                <input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-3" style="color: white; background-color: #007bff!important;">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>