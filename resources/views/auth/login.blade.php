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

<body class="font-sans antialiased bg-white text-gray-900">
 <div class="min-h-screen flex flex-col lg:flex-row">
  <!-- Left Section -->
  <div class="hidden lg:block lg:w-1/2 relative">
   <img src="https://img.antaranews.com/cache/1200x800/2020/03/03/handshake-3298455_1280.jpg.webp" alt="Background"
    class="w-full h-full object-cover opacity-80">
   <div class="absolute top-6 left-6">
    <img src="{{ asset('img') }}/fbjlogos.png" alt="Logo" class="h-16 my-8 ml-12">
   </div>
  </div>

  <!-- Right Section -->
  <div class="w-full lg:w-1/2 flex items-center justify-center p-8">
   <div class="w-full max-w-2xl space-y-6">
    <h2 class="text-2xl font-bold">Check your newest <br> orders on <span class="text-gray-600">FBIndustries</span></h2>

    <form class="space-y-4">
     <!-- Email -->
     <div>
      <label for="email" class="block text-sm font-medium">Email<span class="text-red-500">*</span></label>
      <div class="relative mt-1">
       <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
        <i class="fa-xl fas fa-envelope"></i>
       </span>
       <input type="email" id="email" required
        class="w-full pl-12 pr-4 py-4 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-red-500">
      </div>
     </div>

     <!-- Password -->
     <div>
      <label for="password" class="block text-sm font-medium">Password<span class="text-red-500">*</span></label>
      <div class="relative mt-1">
       <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
        <i class="fa-xl fas fa-lock"></i>
       </span>
       <input type="password" id="password" required
        class="w-full pl-12 pr-10 py-4 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-red-500">
       <button type="button" onclick="togglePassword()"
        class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 focus:outline-none">
        <i id="togglePasswordIcon" class="fas fa-eye"></i>
       </button>
      </div>
     </div>

     <!-- Links -->
     <div class="flex justify-end text-sm">
      <a href="#" class="text-red-700 hover:underline">Forgot Password?</a>
     </div>

     <!-- Login Button -->
     <div>
      <button type="submit" class="w-full bg-red-700 hover:bg-red-800 text-white font-semibold py-2 rounded-md">
       Login
      </button>
     </div>
    </form>

    <div class="text-center text-sm">
     Don't have an account?
     <a href="{{ route('register') }}" class="text-red-700 hover:underline">Create an Account</a>
    </div>


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
