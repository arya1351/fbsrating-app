{{-- <!doctype html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
  </head>
  <body>
    <h1 class="text-3xl text-red-900 font-bold underline">
      Hello world!
    </h1>
  </body>
</html> --}}

<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PT. Jeil Fajar Indonesia</title>
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
            @vite(['resources/css/app.css', 'resources/js/app.js'])
      
        </head>
  <body class="font-sans">
  <!-- Sticky Navbar -->

    <nav class="sticky top-0 z-50 bg-white shadow">
  <!-- Main Navbar -->
  <div class="flex items-center justify-between px-6 py-3">
    <!-- Kiri: Logo -->
    <div class="flex items-center space-x-4">
      <img src="{{ asset('img') }}/fbjlogos.png" alt="Logo" class="h-10" />
    </div>


    <!-- Kanan: Cart + Auth -->
    <div class="flex items-center space-x-4 ml-6">
      <button class="border border-gray-400 px-4 py-2 rounded text-sm font-medium">
        <a class="text-black hover:text-gray-400 hover:underline" href="{{ route('login') }}">SIGN IN</a> / 
        <a class="text-black hover:text-gray-400 hover:underline" href="{{ route('register') }}">REGISTER</a>
      </button>

      <div class="">
        <div x-data="{ modelOpen: false }">
          <button
            @click="modelOpen =!modelOpen"
      class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded text-sm font-semibold">
            <span>BERI ULASAN</span>
          </button>

          <div
            x-show="modelOpen"
            class="fixed inset-0 z-50 overflow-y-auto"
            aria-labelledby="modal-title"
            role="dialog"
            aria-modal="true"
          >
            <div
              class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0"
            >
              <div
                x-cloak
                @click="modelOpen = false"
                x-show="modelOpen"
                x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200 transform"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40"
                aria-hidden="true"
              ></div>

              <div
                x-cloak
                x-show="modelOpen"
                x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="transition ease-in duration-200 transform"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl"
              >
                <div class="flex items-center justify-between space-x-4">
                  <h1 class="text-xl font-medium text-gray-800">
                    Invite team memebr
                  </h1>

                  <button
                    @click="modelOpen = false"
                    class="text-gray-600 focus:outline-none hover:text-gray-700"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="w-6 h-6"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"
                      />
                    </svg>
                  </button>
                </div>

                <p class="mt-2 text-sm text-gray-500">
                  Add your teammate to your team and start work to get things
                  done
                </p>

                <form class="mt-5">
                  <div>
                    <label
                      for="user name"
                      class="block text-sm text-gray-700 capitalize dark:text-gray-200"
                      >Teammate name</label
                    >
                    <input
                      placeholder="Arthur Melo"
                      type="text"
                      class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40"
                    />
                  </div>

                  <div class="mt-4">
                    <label
                      for="email"
                      class="block text-sm text-gray-700 capitalize dark:text-gray-200"
                      >Teammate email</label
                    >
                    <input
                      placeholder="arthurmelo@example.app"
                      type="email"
                      class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40"
                    />
                  </div>

                  <div class="mt-4">
                    <h1 class="text-xs font-medium text-gray-400 uppercase">
                      Permissions
                    </h1>

                    <div class="mt-4 space-y-5">
                      <div
                        class="flex items-center space-x-3 cursor-pointer"
                        x-data="{ show: true }"
                        @click="show =!show"
                      >
                        <div
                          class="relative w-10 h-5 transition duration-200 ease-linear rounded-full"
                          :class="[show ? 'bg-indigo-500' : 'bg-gray-300']"
                        >
                          <label
                            for="show"
                            @click="show =!show"
                            class="absolute left-0 w-5 h-5 mb-2 transition duration-100 ease-linear transform bg-white border-2 rounded-full cursor-pointer"
                            :class="[show ? 'translate-x-full border-indigo-500' : 'translate-x-0 border-gray-300']"
                          ></label>
                          <input
                            type="checkbox"
                            name="show"
                            class="hidden w-full h-full rounded-full appearance-none active:outline-none focus:outline-none"
                          />
                        </div>

                        <p class="text-gray-500">Can make task</p>
                      </div>

                      <div
                        class="flex items-center space-x-3 cursor-pointer"
                        x-data="{ show: false }"
                        @click="show =!show"
                      >
                        <div
                          class="relative w-10 h-5 transition duration-200 ease-linear rounded-full"
                          :class="[show ? 'bg-indigo-500' : 'bg-gray-300']"
                        >
                          <label
                            for="show"
                            @click="show =!show"
                            class="absolute left-0 w-5 h-5 mb-2 transition duration-100 ease-linear transform bg-white border-2 rounded-full cursor-pointer"
                            :class="[show ? 'translate-x-full border-indigo-500' : 'translate-x-0 border-gray-300']"
                          ></label>
                          <input
                            type="checkbox"
                            name="show"
                            class="hidden w-full h-full rounded-full appearance-none active:outline-none focus:outline-none"
                          />
                        </div>

                        <p class="text-gray-500">Can delete task</p>
                      </div>

                      <div
                        class="flex items-center space-x-3 cursor-pointer"
                        x-data="{ show: true }"
                        @click="show =!show"
                      >
                        <div
                          class="relative w-10 h-5 transition duration-200 ease-linear rounded-full"
                          :class="[show ? 'bg-indigo-500' : 'bg-gray-300']"
                        >
                          <label
                            for="show"
                            @click="show =!show"
                            class="absolute left-0 w-5 h-5 mb-2 transition duration-100 ease-linear transform bg-white border-2 rounded-full cursor-pointer"
                            :class="[show ? 'translate-x-full border-indigo-500' : 'translate-x-0 border-gray-300']"
                          ></label>
                          <input
                            type="checkbox"
                            name="show"
                            class="hidden w-full h-full rounded-full appearance-none active:outline-none focus:outline-none"
                          />
                        </div>

                        <p class="text-gray-500">Can edit task</p>
                      </div>
                    </div>
                  </div>

                  <div class="flex justify-end mt-6">
                    <button
                      type="button"
                      class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50"
                    >
                      Invite Member
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      {{-- <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded text-sm font-semibold">
        BERI ULASAN
      </button> --}}
    </div>
  </div>
</nav>

    <!-- Chart & Ratings -->
    <div class="flex flex-col md:flex-row justify-center items-start gap-8 p-8">
      <!-- Chart Placeholder -->
      <div class="w-full md:w-1/2 bg-gray-100 p-4">
        <img src="https://picsum.photos/500/400" alt="Chart" class="w-full" />
      </div>
      <!-- Ratings -->
      <div class="w-full md:w-1/2 bg-gray-500 text-white p-4 space-y-4">
        <div>
          <p>Nadya: respon cepat</p>
          <p>pembelian barang: gasket swg</p>
          ⭐⭐⭐⭐⭐
        </div>
        <div>
          <p>Nadya: respon cepat</p>
          ⭐⭐⭐⭐
        </div>
        <div>
          <p>Nadya: respon cepat</p>
          ⭐⭐⭐
        </div>
        <div>
          <p>Nadya: respon cepat</p>
          ⭐⭐
        </div>
        <div>
          <p>Nadya: respon cepat</p>
          ⭐
        </div>
      </div>
    </div>

    <!-- Best Seller Section -->
    <section class="bg-red-600 text-white text-center py-8">
      <h2 class="text-3xl font-bold">Best Seller Produk</h2>
    </section>

    <div class="flex flex-col md:flex-row justify-center gap-8 p-8">
      <!-- Product 1 -->
      <div class="text-center">
        <img
          src="https://picsum.photos/300/150"
          alt="Produk 1"
          class="mx-auto"
        />
        <p class="text-sm mt-2">
          Brand 3Star, Artus Series, ANSI #1500, 24 Inch <br />with Inner SS304L
          and Outer Ring Sealing Element SS304L-Graphite
        </p>
        <p class="text-xl font-bold mt-2">Terjual 100.000</p>
      </div>
      <!-- Product 2 -->
      <div class="text-center">
        <img
          src="https://picsum.photos/300/150"
          alt="Produk 2"
          class="mx-auto"
        />
        <p class="text-sm mt-2">
          Brand 3Star, Artus Series, ANSI #900, 24 Inch <br />with Inner SS304L
          and Outer Ring Sealing Element SS304L-Graphite
        </p>
        <p class="text-xl font-bold mt-2">Terjual 100.000</p>
      </div>
      <!-- Product 3 -->
      <div class="text-center">
        <img
          src="https://picsum.photos/300/150"
          alt="Produk 3"
          class="mx-auto"
        />
        <p class="text-sm mt-2">
          Brand 3Star, Artus Series, ANSI #150, 0.5 Inch <br />with Inner SS316L
          and Outer Ring CRS Sealing Element SS316L-Graphite
        </p>
        <p class="text-xl font-bold mt-2">Terjual 100.000</p>
      </div>
    </div>

    <!-- Footer -->
    <footer
      class="bg-gray-500 text-white p-8 grid grid-cols-1 md:grid-cols-3 gap-8"
    >
      <!-- Lokasi -->
      <div>
        <h3 class="font-bold text-lg mb-2">Lokasi Kami</h3>
        <p class="font-bold">
          Indonesia <span class="inline-block ml-2">🇮🇩</span>
        </p>
        <p>Jeil Fajar Indonesia</p>
        <p>Jl. Mayor Oking Jayaatmaja</p>
        <p>No. 88 Cibinong 16911 Jawa Barat, Indonesia</p>
      </div>
      <!-- Tentang Kami -->
      <div>
        <h3 class="font-bold text-lg mb-2">Tentang Kami</h3>
        <p>Fajar Benua Store</p>
        <p>Tim Ahli Kami</p>
        <p>Ruang Engineer</p>
      </div>
      <!-- Metode Pembayaran -->
      <div>
        <h3 class="font-bold text-lg mb-2">Metode Pembayaran</h3>
        <div class="flex flex-wrap gap-2">
          <img src="https://via.placeholder.com/50x30?text=Visa" alt="Visa" />
          <img
            src="https://via.placeholder.com/50x30?text=Master"
            alt="MasterCard"
          />
          <img src="https://via.placeholder.com/50x30?text=BNI" alt="BNI" />
          <img src="https://via.placeholder.com/50x30?text=BCA" alt="BCA" />
          <img
            src="https://via.placeholder.com/50x30?text=Mandiri"
            alt="Mandiri"
          />
          <img src="https://via.placeholder.com/50x30?text=Alto" alt="Alto" />
        </div>
      </div>
    </footer>

    <!-- Ikuti Kami -->
    <div class="bg-gray-500 text-white text-center py-4">
      <h3 class="font-bold text-lg mb-2">Ikuti Kami</h3>
      <div class="flex justify-center space-x-4 text-2xl">
        <a href="#"><span>📘</span></a>
        <a href="#"><span>📷</span></a>
        <a href="#"><span>🐦</span></a>
        <a href="#"><span>▶️</span></a>
        <a href="#"><span>💼</span></a>
      </div>
    </div>
  </body>
</html>
