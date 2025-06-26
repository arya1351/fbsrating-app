<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>FBIndustries | Register</title>

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
