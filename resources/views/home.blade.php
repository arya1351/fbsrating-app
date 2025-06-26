<!DOCTYPE html>
<html lang="id">

<head>
 <meta charset="UTF-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 <title>FBIndustries </title>
 <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
 @vite(entrypoints: ['resources/css/app.css', 'resources/js/app.js'])
 <style>
  [x-cloak] {
   display: none !important;
  }
 </style>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

</head>

<body class="font-sans" x-data="{ mobileOpen: false, modalOpen: false }">
 @if ($errors->any())
  <div id="error-toast"
   class="fixed bottom-4 right-1 z-10 transform rounded bg-red-500 px-6 py-3 text-white opacity-100 shadow-lg transition-opacity duration-500">
   <ul class="list-inside list-disc text-sm">
    @foreach ($errors->all() as $error)
     <li>{{ $error }}</li>
    @endforeach
   </ul>
  </div>

  <script>
   // Hilangkan alert otomatis setelah 5 detik
   setTimeout(() => {
    const toast = document.getElementById('error-toast');
    if (toast) {
     toast.style.opacity = 0;
     setTimeout(() => toast.remove(), 5000); // hapus elemen setelah fade out
    }
   }, 5000);
  </script>
 @endif

 @if (session('success'))
  <div id="success-toast"
   class="fixed bottom-4 right-1 z-50 transform rounded bg-green-500 px-6 py-3 text-white opacity-100 shadow-lg transition-opacity duration-500">
   {{ session('success') }}
  </div>

  <script>
   // Auto-hide setelah 4 detik
   setTimeout(() => {
    const toast = document.getElementById('success-toast');
    if (toast) {
     toast.style.opacity = 0;
     setTimeout(() => toast.remove(), 5000); // hilangkan setelah animasi
    }
   }, 4000);
  </script>
 @endif

 <!-- LIST MERAH (TIDAK sticky) -->
 <div class="bg-fbsred py-2 text-xs text-white md:py-1.5 md:text-sm">
  <div class="container mx-auto flex justify-center space-x-6 md:justify-end md:space-x-4">
   <!-- Dropdown -->
   <div x-data="{ open: false }" class="relative">
    <button @click="open = !open" class="flex items-center gap-1 hover:underline">
     Tentang Fajar Benua
     <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
      <path fill-rule="evenodd"
       d="M5.23 7.21a.75.75 0 011.06.02L10 11.293l3.71-4.06a.75.75 0 111.08 1.04l-4.25 4.65a.75.75 0 01-1.08 0L5.21 8.27a.75.75 0 01.02-1.06z"
       clip-rule="evenodd" />
     </svg>
    </button>
    <div x-show="open" x-cloak @click.outside="open = false" x-transition:enter="transition ease-out duration-200"
     x-transition:enter-start="opacity-0 scale-100" x-transition:enter-end="opacity-100 scale-100"
     x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100"
     x-transition:leave-end="opacity-0 scale-100"
     class="absolute right-0 z-50 mt-1 w-48 rounded bg-white text-sm text-black shadow">
     <a href="https://store.fajarbenua.co.id/fajar-benua-group/" class="block px-4 py-2 hover:bg-gray-100">Fajar Benua
      Group</a>
     <a href="https://store.fajarbenua.co.id/fajar-benua-store/" class="block px-4 py-2 hover:bg-gray-100">Fajar Benua
      Store</a>
     <a href="https://store.fajarbenua.co.id/tim-ahli-kami/" class="block px-4 py-2 hover:bg-gray-100">Tim Ahli Kami</a>
     <a href="https://ruangengineer.id/" class="block px-4 py-2 hover:bg-gray-100">Ruang Engineer</a>
    </div>
   </div>

   <a href="https://store.fajarbenua.co.id/blog/" class="hover:underline">Artikel</a>
   <a href="https://store.fajarbenua.co.id/panduan/" class="hover:underline">Panduan</a>
  </div>
 </div>

 <!-- Sticky Navbar -->
 {{-- <nav class="sticky top-0 z-40 bg-white shadow">
  <!-- Main Navbar -->
  <div class="container mx-auto flex items-center justify-between px-6 py-3">
   <!-- Kiri: Logo -->
   <div class="flex items-center space-x-4">
    <img src="{{ asset('img') }}/fbjlogos.png" alt="Logo" class="h-10" />
   </div>

   <div class="ml-6 flex items-center space-x-4">

    @if (Route::has('login'))
     @auth
        <!-- ✅ Hamburger Button (Mobile only) -->
    <div class="md:hidden">
      <button @click="mobileOpen = !mobileOpen">
        <svg class="h-6 w-6 text-gray-700" fill="none" stroke="currentColor" stroke-width="2"
          viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
    </div>


    
      <div x-data="{ open: false }" class="relative inline-block text-left">
       <!-- Button -->
       <button @click="open = !open"
        class="inline-flex items-center justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium shadow-sm hover:bg-gray-50 focus:outline-none">
        <svg class="h-5 w-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M5.121 17.804A13.937 13.937 0 0112 15c3.866 0 7.325 1.582 9.879 4.146M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
       </button>

       <!-- Dropdown -->
       <div x-show="open" @click.outside="open = false"
        class="absolute right-0 z-50 mt-2 w-40 rounded border border-gray-200 bg-white shadow-md">
        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>

        <form method="POST" action="{{ route('logout') }}">
         @csrf
         <button type="submit"
          class="w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100">Logout</button>
        </form>
       </div>
      </div>
      <div x-data="{ modelOpen: false, images: [''] }">
       <button @click="modelOpen = !modelOpen"
        class="rounded bg-blue-500 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-600">
        <span>BERI ULASAN</span>
       </button>

       <div x-data="{ images: [''] }" x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto"
        aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex min-h-screen items-center justify-center px-4 text-center">
         <!-- Overlay -->
         <div x-cloak @click="modelOpen = false" x-show="modelOpen"
          x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0"
          x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200 transform"
          x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
          class="fixed inset-0 bg-gray-700 bg-opacity-80" aria-hidden="true"></div>

         <!-- Modal -->
         <div x-cloak x-show="modelOpen" x-transition:enter="transition ease-out duration-300 transform"
          x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
          x-transition:leave="transition ease-in duration-200 transform"
          x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
          x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          class="my-20 inline-block w-full max-w-lg transform overflow-hidden rounded-lg bg-white p-6 text-left shadow-xl transition-all">

          <!-- Header -->
          <div class="flex justify-end">
           <button @click="modelOpen = false" class="mb-2 rounded-full p-1 text-black">
            ✕
           </button>
          </div>

          <!-- Form -->
          <form action="{{ route('ratings.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4"
           id="ratingForm">
           @csrf

           <!-- Input Ulasan -->
           <div class="flex items-center overflow-hidden rounded-full bg-gray-400">
            <input type="text" name="rating_desc" placeholder="Berikan ulasan"
             class="w-full bg-transparent px-4 py-2 text-white placeholder-white focus:outline-none" required>
            <button type="submit" class="px-4 text-red-500">
             <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 rotate-45" fill="currentColor"
              viewBox="0 0 20 20">
              <path
               d="M10.293 15.707a1 1 0 010-1.414L13.586 11H4a1 1 0 110-2h9.586l-3.293-3.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" />
             </svg>
            </button>
           </div>

           <!-- Produk Placeholder -->
           <input type="text" name="product"
            class="bg-fbsred w-full rounded px-4 py-2 text-white placeholder:text-white"
            placeholder="Produk yang dibeli">

           <!-- Rating Bintang -->
           <div class="flex cursor-pointer justify-center space-x-1 text-3xl text-gray-300" id="starRating">
            @for ($i = 1; $i <= 5; $i++)
             <span class="star" data-value="{{ $i }}">★</span>
            @endfor
            <input type="hidden" name="stars" id="starsInput" value="0">
           </div>

           <!-- Upload Gambar -->
           <div id="imageFields">
            <div class="mb-2">
             <input type="file" name="images[]" class="block w-full text-sm text-gray-600" />
            </div>
           </div>
           <button type="button" onclick="addImageField()"
            class="rounded bg-gray-200 px-3 py-2 text-sm transition hover:bg-gray-300">
            + Tambah Gambar
           </button>

           <!-- Tombol Kirim -->
           <div class="flex justify-end">
            <button type="submit" class="bg-fbsred rounded px-4 py-2 text-white transition hover:bg-red-700">
             Kirim Ulasan
            </button>
           </div>
          </form>

         </div>
        </div>
       </div>

      @else
       <!-- Kanan: Cart + Auth -->

       <!-- Kanan: Tombol (desktop) -->
       <div class="hidden items-center space-x-4 md:flex">
        <button class="rounded border border-gray-400 px-4 py-2 text-xs font-medium">
         <a class="text-black hover:text-gray-400 hover:underline" href="{{ route('login') }}">SIGN IN</a> /
         <a class="text-black hover:text-gray-400 hover:underline" href="{{ route('register') }}">REGISTER</a>
        </button>
        <button @click="modalOpen = true"
         class="rounded bg-blue-500 px-4 py-2 text-xs font-semibold text-white hover:bg-blue-600">
         Berikan Ulasan
        </button>
       </div>

       <!-- Hamburger (mobile only) -->
       <div class="md:hidden">
        <button @click="mobileOpen = true">
         <svg class="h-6 w-6 text-gray-700" fill="none" stroke="currentColor" stroke-width="2"
          viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
         </svg>
        </button>
       </div>

       <div x-data="{ images: [''] }" x-show="modalOpen" class="fixed inset-0 z-50 overflow-y-auto"
        aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex min-h-screen items-center justify-center px-4 text-center">
         <!-- Overlay -->
         <div x-cloak @click="modalOpen = false" x-show="modalOpen"
          x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0"
          x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200 transform"
          x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
          class="fixed inset-0 bg-gray-700 bg-opacity-80" aria-hidden="true"></div>

         <!-- Modal -->
         <div x-cloak x-show="modalOpen" x-transition:enter="transition ease-out duration-300 transform"
          x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
          x-transition:leave="transition ease-in duration-200 transform"
          x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
          x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          class="my-20 inline-block w-full max-w-lg transform overflow-hidden rounded-lg bg-white p-6 text-left shadow-xl transition-all">

          <!-- Header -->
          <div class="flex justify-end">
           <button @click="modalOpen = false" class="mb-2 rounded-full p-1 text-black">
            ✕
           </button>
          </div>
          <div class="flex">
           <a href="{{ route('login') }}"
            class="bg-fbsred mx-auto w-full rounded px-4 py-2 text-center text-sm font-bold text-white hover:bg-red-900">Kamu
            harus login terlebih dahulu</a>
          </div>

         </div>
        </div>
       </div>
     @endif
    @endauth

   </div>
  </div>
  </div>
  </div>
  @auth
   <!-- Mobile Slide Menu -->
   <div x-show="mobileOpen" x-transition:enter="transition transform duration-300"
    x-transition:enter-start="-translate-x-full opacity-0" x-transition:enter-end="translate-x-0 opacity-100"
    x-transition:leave="transition transform duration-200" x-transition:leave-start="translate-x-0 opacity-100"
    x-transition:leave-end="-translate-x-full opacity-0"
    class="fixed inset-y-0 left-0 z-50 w-64 bg-white p-6 shadow-lg md:hidden">

    <button @click="mobileOpen = false" class="mb-4 w-full text-right text-xl text-gray-700">&times;</button>

    <a href="{{ route('profile.edit') }}" class="block px-2 py-2 text-sm text-black hover:bg-gray-100">Profile</a>

    <form method="POST" action="{{ route('logout') }}" class="mt-2">
     @csrf
     <button type="submit"
      class="block w-full px-2 py-2 text-left text-sm text-black hover:bg-gray-100">Logout</button>
    </form>

    <!-- Tombol Ulasan -->
    <button @click="modelOpen = true" class="mt-4 w-full rounded bg-blue-500 px-4 py-2 text-white hover:bg-blue-600">
     Berikan Ulasan
    </button>
   </div>
  @endauth
 </nav>

 <!-- Drawer Mobile -->
 <div x-show="mobileOpen" x-transition:enter="transition ease-out duration-300"
  x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
  x-transition:leave="transition ease-in duration-200" x-transition:leave-start="translate-x-0"
  x-transition:leave-end="-translate-x-full" x-cloak class="fixed inset-0 z-50 flex">
  <!-- Overlay -->
  <div class="fixed inset-0 bg-opacity-50" @click="mobileOpen = false"></div>

  <!-- Sidebar -->
  <div class="relative z-50 w-full transform bg-white p-6 text-sm text-black transition-transform duration-300"
   x-transition:enter="translate-x-[-100%]" x-transition:enter-end="translate-x-0" x-transition:leave="translate-x-0"
   x-transition:leave-end="translate-x-[-100%]">
   <button @click="mobileOpen = false" class="absolute right-2 top-2 text-xl">&times;</button>

   <img src="{{ asset('img/fbjlogos.png') }}" alt="Logo" class="mb-6 h-10">

   <a href="{{ route('login') }}"
    class="mb-2 block w-full rounded border px-4 py-2 text-center hover:bg-gray-100">SIGN IN</a>
   <a href="{{ route('register') }}"
    class="mb-4 block w-full rounded border px-4 py-2 text-center hover:bg-gray-100">REGISTER</a>

   <button @click="modalOpen = true; mobileOpen = false"
    class="w-full rounded bg-blue-500 px-4 py-2 text-white hover:bg-blue-600">Berikan Ulasan</button>
  </div>
 </div> --}}

 <nav x-data="{ mobileOpen: false, modalOpen: false, modelOpen: false }" class="sticky top-0 z-40 bg-white shadow">
  <div class="container mx-auto flex items-center justify-between px-6 py-3">
   <!-- Logo -->
   <div class="flex items-center space-x-4">
    <img src="{{ asset('img/fbjlogos.png') }}" alt="Logo" class="h-10" />
   </div>

   <!-- Kanan (Desktop + Mobile) -->
   <div class="flex items-center space-x-4">
    @if (Route::has('login'))
     @auth
      <!-- Desktop -->
      <div class="hidden space-x-2 md:flex">
       <!-- Dropdown -->
       <div x-data="{ open: false }" class="relative">
        <button @click="open = !open" class="rounded border px-3 py-2 text-sm hover:bg-gray-100">👤</button>
        <div x-show="open" @click.outside="open = false"
         class="absolute right-0 mt-2 w-40 rounded border bg-white shadow">
         <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="w-full px-4 py-2 text-left text-sm hover:bg-gray-100">Logout</button>
         </form>
        </div>
       </div>
       <!-- Tombol Ulasan -->
       <button @click="modalOpen = true" class="rounded bg-blue-500 px-4 py-2 text-white hover:bg-blue-600">Beri
        Ulasan</button>
      </div>

      <!-- Hamburger (Mobile only) -->
      <div class="md:hidden">
       <button @click="mobileOpen = !mobileOpen">
        <svg class="h-6 w-6 text-gray-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
         <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
       </button>
      </div>
     @else
      <!-- Desktop non-login -->
      <div class="hidden space-x-2 md:flex">
         <button class="rounded border border-gray-400 px-4 py-2 text-xs font-medium">
         <a class="text-black hover:text-gray-400 hover:underline" href="{{ route('login') }}">SIGN IN</a> /
         <a class="text-black hover:text-gray-400 hover:underline" href="{{ route('register') }}">REGISTER</a>
        </button>
       <button @click="modelOpen = true" class="rounded bg-blue-500 px-4 py-2 text-white hover:bg-blue-600">Beri
        Ulasan</button>
      </div>

      <div x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
       aria-modal="true">
       <div class="flex min-h-screen items-center justify-center px-4 text-center">
        <!-- Overlay -->
        <div x-cloak @click="modelOpen = false" x-show="modelOpen"
         x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200 transform"
         x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
         class="bg-fbsgray fixed inset-0 bg-opacity-80" aria-hidden="true"></div>

        <!-- Modal -->
        <div x-cloak x-show="modelOpen" x-transition:enter="transition ease-out duration-300 transform"
         x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave="transition ease-in duration-200 transform"
         x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         class="my-20 inline-block w-full max-w-lg transform overflow-hidden rounded-lg bg-white p-6 text-left shadow-xl transition-all">

         <!-- Header -->
         <div class="flex justify-between">
          <p class="text-xl font-semibold text-black">Beri Ulasan</p>
          <button @click="modelOpen = false" class="mb-2 rounded-full p-1 text-black">
           ✕
          </button>
         </div>
         <div class="flex">
          <a href="{{ route('login') }}"
           class="bg-fbsred mx-auto w-full rounded px-4 py-2 text-center text-sm font-bold text-white hover:bg-red-900">Kamu
           harus login terlebih dahulu</a>
         </div>

        </div>
       </div>
      </div>
      <!-- Hamburger (Mobile only) -->
      <div class="md:hidden">
       <button @click="mobileOpen = !mobileOpen">
        <svg class="h-6 w-6 text-gray-700" fill="none" stroke="currentColor" stroke-width="2"
         viewBox="0 0 24 24">
         <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
       </button>
      </div>
     @endauth
    @endif
   </div>
  </div>

  <!-- Drawer Mobile -->
  <div x-show="mobileOpen" x-cloak x-transition
   class="fixed inset-y-0 left-0 z-50 w-full bg-white p-6 shadow-lg md:hidden">
   <button @click="mobileOpen = false" class="mb-4 w-full text-right text-xl text-gray-700">&times;</button>
   @auth
    <form method="POST" action="{{ route('logout') }}"
     class="hover:bg-fbsred mb-2 block w-full rounded border px-4 py-2 text-center transition-all ease-in hover:text-white">
     @csrf
     <button type="submit" class="block w-full px-2 py-2 text-left text-sm">Logout</button>
    </form>
   @else

    <a href="{{ route('login') }}"
     class="mb-2 block w-full rounded border px-4 py-2 text-center hover:bg-gray-100">Sign In</a>
    <a href="{{ route('register') }}"
     class="mb-4 block w-full rounded border px-4 py-2 text-center hover:bg-gray-100">Register</a>
   @endauth
   <button @click="modelOpen = true; mobileOpen = false"
    class="w-full rounded bg-blue-500 px-4 py-2 text-white hover:bg-blue-600">Beri Ulasan</button>
  </div>

  <!-- Modal Ulasan (Global) -->
  <div x-show="modalOpen" x-cloak class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title"
   role="dialog" aria-modal="true" x-transition:enter="transition ease-out duration-300 transform"
   x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
   x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
   x-transition:leave="transition ease-in duration-200 transform"
   x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
   x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
   <div class="flex min-h-screen items-center justify-center px-4 text-center">
    <!-- Overlay -->
    <div x-cloak @click="modalOpen = false" x-show="modalOpen"
     x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200 transform"
     x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
     class="bg-fbsgray fixed inset-0 bg-opacity-80" aria-hidden="true"></div>

    <!-- Modal -->
    <div
     class="relative z-50 my-20 inline-block w-full max-w-lg transform overflow-hidden rounded-lg bg-white p-6 text-left shadow-xl">
     <div class="flex justify-end">
      <button @click="modalOpen = false" class="mb-2 rounded-full p-1 text-black">✕</button>
     </div>

     <!-- Form -->
     <form action="{{ route('ratings.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
      @csrf
      <div class="flex items-center overflow-hidden rounded-full bg-gray-400">
       <input type="text" name="rating_desc" placeholder="Berikan ulasan"
        class="w-full bg-transparent px-4 py-2 text-white placeholder-white focus:outline-none" required>
       <button type="submit" class="px-4 text-red-500">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 rotate-45" fill="currentColor" viewBox="0 0 20 20">
         <path
          d="M10.293 15.707a1 1 0 010-1.414L13.586 11H4a1 1 0 110-2h9.586l-3.293-3.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" />
        </svg>
       </button>
      </div>

      <input type="text" name="product"
       class="bg-fbsred w-full rounded px-4 py-2 text-white placeholder:text-white" placeholder="Produk yang dibeli">

      <div class="flex cursor-pointer justify-center space-x-1 text-3xl text-gray-300" id="starRating">
       @for ($i = 1; $i <= 5; $i++)
        <span class="star" data-value="{{ $i }}">★</span>
       @endfor
       <input type="hidden" name="stars" id="starsInput" value="0">
      </div>

      <div id="imageFields">
       <div class="mb-2">
        <input type="file" name="images[]" class="block w-full text-sm text-gray-600" />
       </div>
      </div>
      <button type="button" onclick="addImageField()"
       class="rounded bg-gray-200 px-3 py-2 text-sm transition hover:bg-gray-300">
       + Tambah Gambar
      </button>

      <div class="flex justify-end">
       <button type="submit" class="bg-fbsred rounded px-4 py-2 text-white transition hover:bg-red-700">Kirim
        Ulasan</button>
      </div>
     </form>
    </div>
   </div>
  </div>
 </nav>

 <!-- Chart & Ratings -->
 <div class="flex flex-col items-start justify-center gap-8 p-8 md:flex-row">
  <!-- Chart Placeholder -->
  <div class="w-full bg-gray-100 p-4 md:w-1/2">
   <div style="position: relative; height:400px; width:100%;">
    <canvas id="barChart"></canvas>
   </div>
  </div>
  <!-- Ratings -->

  @php
   $ratingsJson = $ratings->map(function ($r) {
       return [
           'user_name' => $r->user->name,
           'rating_desc' => $r->rating_desc,
           'product' => $r->product,
           'stars' => $r->stars,
           'images' => $r->images->map(fn($img) => asset('storage/' . $img->img_path)),
       ];
   });
  @endphp

  <!-- Bungkus tombol dan modal dalam 1 elemen x-data -->
  <div x-data="{
      openMore: false,
      selectedStar: '',
      allRatings: {{ $ratingsJson }},
      get filteredRatings() {
          if (!this.selectedStar) return this.allRatings;
          return this.allRatings.filter(r => r.stars == this.selectedStar);
      },
      selectedImageIndex: 0,
      imageGallery: [],
      imageModalOpen: false,
      openImageModal(images, index) {
          this.imageGallery = images;
          this.selectedImageIndex = index;
          this.imageModalOpen = true;
      },
      closeImageModal() {
          this.imageModalOpen = false;
      },
      nextImage() {
          if (this.selectedImageIndex < this.imageGallery.length - 1) {
              this.selectedImageIndex++;
          }
      },
      prevImage() {
          if (this.selectedImageIndex > 0) {
              this.selectedImageIndex--;
          }
      },
  
  }" x-init="init()" class="bg-fbsgray w-full p-4 text-white md:w-1/2">
   <div class="mb-4">
    <select x-model="selectedStar" @change="updateChart()" class="rounded px-12 py-1 pl-2 text-black">
     <option value="">⭐ All</option>
     <option value="1">⭐ 1</option>
     <option value="2">⭐ 2</option>
     <option value="3">⭐ 3</option>
     <option value="4">⭐ 4</option>
     <option value="5">⭐ 5</option>
    </select>
   </div>

   <template x-for="(rating, index) in filteredRatings.slice(0, 4)" :key="index">
    <div class="mb-4">
     <p><strong x-text="rating.user_name"></strong>: <span x-text="rating.rating_desc"></span></p>
     <p>pembelian barang: <span x-text="rating.product"></span></p>
     <div x-text="'⭐'.repeat(rating.stars)"></div>
     <div class="flex gap-2 py-2">
      <template x-for="img in rating.images" :key="img">
       <img :src="img" class="h-12 w-12 cursor-pointer object-cover"
        @click="openImageModal(rating.images, rating.images.indexOf(img))" />
      </template>
     </div>
    </div>
   </template>

   <template x-if="filteredRatings.length > 4">
    <div class="flex w-full justify-end">
     <button @click="openMore = true" class="rounded bg-transparent px-4 py-2 text-blue-400">Lihat semua
      ulasan</button>
    </div>
   </template>

   <template x-if="openMore">
    <div class="fixed inset-0 z-50 flex items-center justify-center bg-gray-800 bg-opacity-80">
     <div class="relative max-h-[80vh] w-full max-w-2xl overflow-y-auto rounded bg-white p-6 text-black">
      <button @click="openMore = false"
       class="absolute right-2 top-2 text-2xl text-gray-600 md:text-xl lg:text-xl">&times;</button>
      <h2 class="mb-4 text-lg font-bold">Semua Ulasan</h2>

      <template x-for="(rating, index) in filteredRatings.slice(0)" :key="index">
       <div class="mb-4 border-b pb-2">
        <p><strong x-text="rating.user_name"></strong>: <span x-text="rating.rating_desc"></span></p>
        <p>pembelian barang: <span x-text="rating.product"></span></p>
        <div x-text="'⭐'.repeat(rating.stars)"></div>
        <div class="flex gap-2 py-2">
         <template x-for="img in rating.images" :key="img">
          <img :src="img" class="h-12 w-12 cursor-pointer object-cover"
           @click="openImageModal(rating.images, rating.images.indexOf(img))" /> </template>
        </div>
       </div>
      </template>
     </div>
    </div>
   </template>

   <!-- Modal Gambar Fullscreen -->
   <template x-if="imageModalOpen">
    <div class="fixed inset-0 z-[999] flex items-center justify-center bg-black bg-opacity-80 px-4">
     <div class="relative mx-auto w-full max-w-3xl">
      <!-- Tombol Close -->
      <button @click="closeImageModal"
       class="absolute right-2 top-2 z-50 text-3xl text-white hover:text-red-400">&times;</button>

      <!-- Gambar Aktif -->
      <img :src="imageGallery[selectedImageIndex]" class="mx-auto max-h-[80vh] rounded shadow-lg" />

      <!-- Tombol Navigasi -->
      <div class="absolute inset-y-0 left-0 flex items-center">
       <button @click="prevImage" class="px-4 text-4xl text-white hover:text-gray-400"
        :disabled="selectedImageIndex === 0">
        ‹
       </button>
      </div>
      <div class="absolute inset-y-0 right-0 flex items-center">
       <button @click="nextImage" class="px-4 text-4xl text-white hover:text-gray-400"
        :disabled="selectedImageIndex === imageGallery.length - 1">
        ›
       </button>
      </div>
     </div>
    </div>
   </template>

  </div>
 </div>

 </div>

 <!-- Best Seller Section -->
 <section class="bg-fbsred py-8 text-center text-white">
  <h2 class="text-2xl font-bold md:text-4xl">Best Seller Produk</h2>
 </section>

 <div class="flex flex-col justify-center gap-8 p-8 md:flex-row">
  <!-- Product 1 -->
  <div class="text-center">
   <img src="{{ asset('img') }}/gasket-sheet.png" width="300" height="150" alt="Produk 1" class="mx-auto" />
   <p class="mt-2 text-sm">
    Brand 3Star, Artus Series, ANSI #1500, 24 Inch <br />with Inner SS304L
    and Outer Ring Sealing Element SS304L-Graphite
   </p>
   <p class="mt-2 text-xl font-bold">Terjual 100.000</p>
  </div>
  <!-- Product 2 -->
  <div class="text-center">
   <img src="{{ asset('img') }}/heat-exchanger.jpg" width="300" height="150" alt="Produk 2" class="mx-auto" />
   <p class="mt-2 text-sm">
    Brand 3Star, Artus Series, ANSI #900, 24 Inch <br />with Inner SS304L
    and Outer Ring Sealing Element SS304L-Graphite
   </p>
   <p class="mt-2 text-xl font-bold">Terjual 100.000</p>
  </div>
  <!-- Product 3 -->
  <div class="text-center">
   <img src="{{ asset('img') }}/raw-materials-1.png" width="300" height="150" alt="Produk 3" class="mx-auto" />
   <p class="mt-2 text-sm">
    Brand 3Star, Artus Series, ANSI #150, 0.5 Inch <br />with Inner SS316L
    and Outer Ring CRS Sealing Element SS316L-Graphite
   </p>
   <p class="mt-2 text-xl font-bold">Terjual 100.000</p>
  </div>
 </div>

 <!-- Footer -->
 <footer class="bg-fbsgray text-white">
  <div class="grid grid-cols-1 gap-8 p-8 md:grid-cols-3">
   <!-- Lokasi -->
   <div>
    <h3 class="pb-4 text-lg font-bold">Lokasi Kami</h3>
    <p class="flex gap-2 font-bold">
     Indonesia <img src="https://flagicons.lipis.dev/flags/4x3/id.svg" width="20px" alt="">
    </p>
    <p>Jeil Fajar Indonesia</p>
    <p>Jl. Mayor Oking Jayaatmaja</p>
    <p>No. 88 Cibinong 16911 Jawa Barat, Indonesia</p>
   </div>
   <!-- Tentang Kami -->
   <div>
    <h3 class="pb-4 text-lg font-bold">Tentang Kami</h3>
    <p><a href="https://store.fajarbenua.co.id/fajar-benua-group/" class="text-md text-white hover:underline">Fajar
      Benua
      Group</a></p>
    <p class="pt-1"><a href="https://store.fajarbenua.co.id/fajar-benua-store/"
      class="text-md text-white hover:underline">Fajar Benua Store</a></p>
    <p class="pt-1"><a href="https://store.fajarbenua.co.id/tim-ahli-kami/"
      class="text-md text-white hover:underline">Tim
      Ahli Kami</a></p>
    <p class="pt-1"><a href="https://ruangengineer.id/" class="text-md text-white hover:underline">Ruang
      Engineer</a></p>
   </div>
   <!-- Metode Pembayaran -->
   <div>
    <h3 class="pb-4 text-lg font-bold">Informasi</h3>
    <div class="grid gap-1 pb-4">
     <p><a href="https://store.fajarbenua.co.id/vendor-registration/"
       class="text-md hover:underline text-white">Menjadi Vendor Kami</a>
     </p>
     <p>
      <a href="https://store.fajarbenua.co.id/syarat-dan-ketentuan/"
       class="text-md hover:underline text-white">Syarat dan Ketentuan</a>
     </p>
    </div>
    <h3 class="pb-4 text-lg font-bold">Metode Pembayaran</h3>
    <div>
     <img src="{{ asset('img') }}/metode-pembayaran.png" class="w-36" alt="">
    </div>
    <h3 class="py-4 text-lg font-bold">Ikuti Kami</h3>
    <div class="flex justify-start space-x-4 text-white">
     <!-- Facebook -->
     <a href="https://www.facebook.com/share/1JzH8VFXWc/?mibextid=wwXIfr" class="flex h-10 w-10 items-center justify-center rounded-full bg-[#1877F2] hover:opacity-80">
      <i class="fab fa-facebook-f text-base"></i>
     </a>
     <!-- Instagram -->
     <a href="https://www.instagram.com/fajarbenuaindustries?igsh=Zzg3eW4wNnhreThv" class="flex h-10 w-10 items-center justify-center rounded-full bg-[#E1306C] hover:opacity-80">
      <i class="fab fa-instagram text-base"></i>
     </a>
     <!-- Twitter -->
     <a href="https://www.twitter.com/FajarBenua" class="flex h-10 w-10 items-center justify-center rounded-full bg-[#1DA1F2] hover:opacity-80">
      <i class="fab fa-twitter text-base"></i>
     </a>
     <!-- YouTube -->
     <a href="https://youtube.com/@fajarbenuaindustries?si=uz8lQ5C89CmesCNb" class="flex h-10 w-10 items-center justify-center rounded-full bg-[#FF0000] hover:opacity-80">
      <i class="fab fa-youtube text-base"></i>
     </a>
     <!-- LinkedIn -->
     <a href="https://id.linkedin.com/company/fajarbenuaindustries" class="flex h-10 w-10 items-center justify-center rounded-full bg-[#0A66C2] hover:opacity-80">
      <i class="fab fa-linkedin-in text-base"></i>
     </a>
    </div>

   </div>
  </div>
 </footer>

 <!-- Copyright -->
 <div class="bg-black py-4 text-center text-sm text-white">
  <p>
   &copy; 2021 - 2025 <span class="font-semibold">Fajar Benua Group</span>. All rights reserved.
  </p>
 </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-trendline@2.0.0"></script>
<script>
 const barCtx = document.getElementById('barChart').getContext('2d');

 const labels = ['1 Bintang', '2 Bintang', '3 Bintang', '4 Bintang', '5 Bintang'];
 const values = [
  {{ $starCounts[1] ?? 0 }},
  {{ $starCounts[2] ?? 0 }},
  {{ $starCounts[3] ?? 0 }},
  {{ $starCounts[4] ?? 0 }},
  {{ $starCounts[5] ?? 0 }},
 ];

 // Array warna untuk setiap bintang
 const backgroundColors = [
  'rgba(255, 99, 132, 0.7)',
  'rgba(255, 159, 64, 0.7)',
  'rgba(255, 205, 86, 0.7)',
  'rgba(75, 192, 192, 0.7)',
  'rgba(54, 162, 235, 0.7)'
 ];


 // 1. KEMBALI KE STRUKTUR MULTI-DATASET
 const datasets = values.map((val, i) => {
  const dataArr = Array(labels.length).fill(null);
  dataArr[i] = val;

  return {
   label: labels[i], // Setiap dataset punya label sendiri (1 Bintang, 2 Bintang, dst)
   data: dataArr,
   backgroundColor: backgroundColors[i], // Berikan warna unik
   borderWidth: 1
  };
 });

 new Chart(barCtx, {
  type: 'bar',
  data: {
   labels: labels,
   datasets: datasets
  },
  options: {
   responsive: true,
   maintainAspectRatio: false,
   plugins: {
    // 2. AKTIFKAN KEMBALI LEGEND-NYA
    legend: {
     display: true,
     position: 'top', // Posisi legenda (bisa 'top', 'bottom', 'left', 'right')
    },
    tooltip: {
     // Tooltip ini akan menampilkan info saat hover
     callbacks: {
      label: function(context) {
       // Menampilkan label dan nilai dari dataset yang di-hover
       return `${context.dataset.label}: ${context.raw}`;
      }
     }
    }
   },
   // 3. KUNCI UTAMA ADA DI SINI
   scales: {
    x: {
     stacked: true, // Tumpuk bar di sumbu X
    },
    y: {
     stacked: true, // Tumpuk bar di sumbu Y
     beginAtZero: true,
     ticks: {
      precision: 0
     }
    }
   }
  }
 });
</script>

<script>
 const stars = document.querySelectorAll('#starRating .star');
 const starsInput = document.getElementById('starsInput');

 stars.forEach((star, index) => {
  star.addEventListener('click', () => {
   let value = star.getAttribute('data-value');
   starsInput.value = value;

   // Update warna bintang
   stars.forEach((s, i) => {
    s.classList.toggle('text-yellow-400', i < value);
    s.classList.toggle('text-gray-300', i >= value);
   });
  });

  star.addEventListener('mouseover', () => {
   let value = star.getAttribute('data-value');
   stars.forEach((s, i) => {
    s.classList.toggle('text-yellow-400', i < value);
    s.classList.toggle('text-gray-300', i >= value);
   });
  });

  star.addEventListener('mouseleave', () => {
   let value = starsInput.value;
   stars.forEach((s, i) => {
    s.classList.toggle('text-yellow-400', i < value);
    s.classList.toggle('text-gray-300', i >= value);
   });
  });
 });

 function addImageField() {
  const container = document.getElementById('imageFields');
  const input = document.createElement('input');
  input.type = 'file';
  input.name = 'images[]';
  input.className = 'block w-full text-sm text-gray-600 mb-2';
  container.appendChild(input);
 }
</script>

</html>
