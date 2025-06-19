{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

{{-- <x-guest-layout>
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
</x-guest-layout> --}}

<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>FBIndustries Login</title>

 <!-- Tailwind CSS -->
 <script src="https://cdn.tailwindcss.com"></script>

 <!-- Font Awesome CDN -->
 <script src="https://kit.fontawesome.com/186e38f7e9.js" crossorigin="anonymous"></script>

</head>

<body class="bg-white font-sans text-gray-900 antialiased">
 <div class="flex min-h-screen flex-col lg:flex-row">
  <!-- Left Section -->
  <div class="relative hidden lg:block lg:w-1/2">
   <img src="https://img.antaranews.com/cache/1200x800/2020/03/03/handshake-3298455_1280.jpg.webp" alt="Background"
    class="h-full w-full object-cover opacity-80">
   <div class="absolute left-6 top-6">
    <img src="{{ asset('img') }}/fbjlogos.png" alt="Logo" class="my-8 ml-12 h-16">
   </div>
  </div>

  <!-- Right Section -->
  <div class="flex w-full items-center justify-center p-8 lg:w-1/2">
   <div class="w-full max-w-2xl space-y-6">
    <h2 class="text-2xl font-bold">Check your newest <br> orders on <span class="text-gray-600">FBIndustries</span></h2>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
     @csrf

     <!-- Name -->
     <div class="flex w-full flex-col gap-4 md:flex-row md:gap-6">
      <!-- First Name -->
      <div class="w-full md:w-1/2">
       <label for="first_name" class="mb-1 block text-sm font-medium">
        First Name <span class="text-red-500">*</span>
       </label>
       <div class="flex">
        <select name="salutation" class="border border-gray-300 bg-red-100 py-4 pl-4 pr-4">
         <option value="mr">Mr.</option>
         <option value="ms">Ms.</option>
         <option value="mrs">Mrs.</option>
        </select>
        <input type="text" id="first_name" name="first_name" required
         class="w-full border border-gray-300 py-4 pl-4 pr-4 focus:outline-none focus:ring-2 focus:ring-red-500"
         value="{{ old('first_name') }}">
       </div>
      </div>

      <!-- Last Name -->
      <div class="w-full md:w-1/2">
       <label for="last_name" class="mb-1 block text-sm font-medium">
        Last Name <span class="text-red-500">*</span>
       </label>
       <input type="text" id="last_name" name="last_name" required
        class="w-full border border-gray-300 py-4 pl-4 pr-4 focus:outline-none focus:ring-2 focus:ring-red-500"
        value="{{ old('last_name') }}">
      </div>
     </div>

     <!-- Email -->
     <div>
      <label for="email" class="block text-sm font-medium">Email <span class="text-red-500">*</span></label>
      <input type="email" id="email" name="email" required
       class="w-full border border-gray-300 py-4 pl-4 pr-4 focus:outline-none focus:ring-2 focus:ring-red-500"
       value="{{ old('email') }}">
     </div>

     <!-- Password -->
     <div>
      <label for="password" class="block text-sm font-medium">Password <span class="text-red-500">*</span></label>
      <input type="password" id="password" name="password" required
       class="w-full border border-gray-300 py-4 pl-4 pr-4 focus:outline-none focus:ring-2 focus:ring-red-500">
     </div>

     <!-- Confirm Password -->
     <div>
      <label for="password_confirmation" class="block text-sm font-medium">Confirm Password <span
        class="text-red-500">*</span></label>
      <input type="password" id="password_confirmation" name="password_confirmation" required
       class="w-full border border-gray-300 py-4 pl-4 pr-4 focus:outline-none focus:ring-2 focus:ring-red-500">
     </div>

     <!-- Submit -->
     <div>
      <button type="submit" class="w-full bg-red-700 py-2 font-semibold text-white hover:bg-red-800">
       Register
      </button>
     </div>
    </form>

    <div class="text-center text-sm">
     Already have an account?
     <a href="{{ route('login') }}" class="text-red-700 hover:underline">Login</a>
    </div>>

   </div>
  </div>
 </div>

 <!-- Script untuk toggle password -->
 <script>
  function togglePassword() {
   const passwordInput = document.getElementById('password');
   const icon = document.getElementById('togglePasswordIcon');

   if (passwordInput.type === 'password') {
    passwordInput.type = 'text';
    icon.classList.remove('fa-eye');
    icon.classList.add('fa-eye-slash');
   } else {
    passwordInput.type = 'password';
    icon.classList.remove('fa-eye-slash');
    icon.classList.add('fa-eye');
   }
  }
 </script>
</body>

</html>
