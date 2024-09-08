<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-6 text-lg text-primary" :status="session('status')" />

    <!-- Welcome Message -->
    <div class="text-center mb-8">
        <h1 class="text-4xl font-extrabold text-gray-900 mb-2">Welcome Back!</h1>
        <p class="text-lg text-gray-600">We’re glad to see you again. Please log in to continue.</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="max-w-md mx-auto p-8 bg-white rounded-lg shadow-lg">
        @csrf

        <!-- Email Address -->
        <div class="mb-6">
            <x-input-label for="email" :value="__('Email')" class="text-gray-800 text-lg font-medium" />
            <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                class="w-full mt-1 p-3 border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
            />
            <x-input-error :messages="$errors->get('email')" class="text-red-500 text-sm mt-1" />
        </div>

        <!-- Password -->
        <div class="mb-6">
            <x-input-label for="password" :value="__('Password')" class="text-gray-800 text-lg font-medium" />
            <x-text-input id="password" type="password" name="password" required autocomplete="current-password"
                class="w-full mt-1 p-3 border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
            />
            <x-input-error :messages="$errors->get('password')" class="text-red-500 text-sm mt-1" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center mb-6">
            <input id="remember_me" type="checkbox" name="remember" class="h-5 w-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500" />
            <label for="remember_me" class="ml-2 text-gray-700">{{ __('Remember me') }}</label>
        </div>

        <!-- Forgot Password Link -->
        @if (Route::has('password.request'))
            <div class="mb-6 text-center">
                <a href="{{ route('password.request') }}" class=" hover:underline" style="color: #e1a682">
                    {{ __('Forgot your password?') }}
                </a>
            </div>
        @endif

        <!-- Submit Button -->
        <div class="flex items-center justify-center">
            <x-primary-button class="w-full py-2  text-white rounded-md shadow-md hover:bg-blue-700 transition-colors" style="background-color: #693E27">
                LOGIN
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
