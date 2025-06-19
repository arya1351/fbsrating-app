<!DOCTYPE html>
<html lang="id">

<head>
 <meta charset="UTF-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 <title>PT. Jeil Fajar Indonesia</title>
 <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
 @vite(entrypoints: ['resources/css/app.css', 'resources/js/app.js'])
<style>
  [x-cloak] { display: none !important; }
</style>

</head>

<body class="font-sans">
 <!-- Sticky Navbar -->
 <nav class="sticky top-0 z-50 bg-white shadow">
  <!-- Main Navbar -->
  <div class="container mx-auto flex items-center justify-between px-6 py-3">
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


    @if (Route::has('login'))
     @auth
      <div x-data="{ modelOpen: false, images: [''] }">
       <button @click="modelOpen = !modelOpen"
        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded text-sm font-semibold">
        <span>BERI ULASAN</span>
       </button>

       <div x-data="{ images: [''] }" x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto"
        aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-center justify-center min-h-screen px-4 text-center">
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
          class="inline-block w-full max-w-lg p-6 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl">

          <!-- Header -->
          <div class="flex justify-end">
           <button @click="modelOpen = false" class="text-black mb-2 rounded-full p-1">
            ✕
           </button>
          </div>

          <!-- Form -->
          <form class="space-y-4">
           <!-- Input ulasan -->
           <div class="flex items-center bg-gray-400 rounded-full overflow-hidden">
            <input type="text" placeholder="Berikan ulasan"
             class="w-full bg-transparent px-4 py-2 text-white placeholder-white focus:outline-none" />
            <button type="button" class="px-4 text-red-500">
             <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 rotate-45" fill="currentColor" viewBox="0 0 20 20">
              <path
               d="M10.293 15.707a1 1 0 010-1.414L13.586 11H4a1 1 0 110-2h9.586l-3.293-3.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" />
             </svg>
            </button>
           </div>

           <!-- Produk yang dibeli -->
           <input class="bg-red-600 text-white px-4 py-2 rounded w-full placeholder:text-white "
            placeholder=" Produk yang di beli :">


           <!-- Rating -->
           <div x-data="{ rating: 0, hover: 0 }" class="flex justify-center space-x-1 text-3xl cursor-pointer text-gray-300">
            <span @click="rating = 1" @mouseover="hover = 1" @mouseleave="hover = rating"
             :class="(hover >= 1 || rating >= 1) ? 'text-yellow-400' : 'text-gray-300'">★</span>
            <span @click="rating = 2" @mouseover="hover = 2" @mouseleave="hover = rating"
             :class="(hover >= 2 || rating >= 2) ? 'text-yellow-400' : 'text-gray-300'">★</span>
            <span @click="rating = 3" @mouseover="hover = 3" @mouseleave="hover = rating"
             :class="(hover >= 3 || rating >= 3) ? 'text-yellow-400' : 'text-gray-300'">★</span>
            <span @click="rating = 4" @mouseover="hover = 4" @mouseleave="hover = rating"
             :class="(hover >= 4 || rating >= 4) ? 'text-yellow-400' : 'text-gray-300'">★</span>
            <span @click="rating = 5" @mouseover="hover = 5" @mouseleave="hover = rating"
             :class="(hover >= 5 || rating >= 5) ? 'text-yellow-400' : 'text-gray-300'">★</span>

            <!-- Input tersembunyi -->
            <input type="hidden" name="rating" :value="rating">
           </div>


           <!-- Upload gambar -->
           <div>
            <template x-for="(img, index) in images" :key="index">
             <div class="mb-2">
              <input type="file" :name="'gambar[' + index + ']'" class="block w-full text-sm text-gray-600" />
             </div>
            </template>
            <button type="button" @click="images.push('')"
             class="px-3 py-2 bg-gray-200 text-sm rounded hover:bg-gray-300 transition">
             + Tambah Gambar
            </button>
           </div>

           <!-- Tombol kirim -->
           <div class="flex justify-end">
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
             Kirim Ulasan
            </button>
           </div>
          </form>
         </div>
        </div>
       </div>
      @else
       <div x-data="{ modalOpen: false, images: [''] }">
        <button @click="modalOpen = !modalOpen"
         class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded text-sm font-semibold">
         <span>Berikan Ulasan</span>
        </button>

        <div x-data="{ images: [''] }" x-show="modalOpen" class="fixed inset-0 z-50 overflow-y-auto"
         aria-labelledby="modal-title" role="dialog" aria-modal="true">
         <div class="flex items-center justify-center min-h-screen px-4 text-center">
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
           class="inline-block w-full max-w-lg p-6 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl">

           <!-- Header -->
           <div class="flex justify-end">
            <button @click="modalOpen = false" class="text-black mb-2 rounded-full p-1">
             ✕
            </button>
           </div>
           <div class="flex ">
            <a href="{{ route('login') }}" class="text-center w-full mx-auto bg-red-600 hover:bg-red-900 text-white px-4 py-2 rounded text-sm font-bold">Kamu harus login terlebih dahulu</a>
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
 </nav>

 <!-- Chart & Ratings -->
 <div class="flex flex-col md:flex-row justify-center items-start gap-8 p-8">
  <!-- Chart Placeholder -->
  <div class="w-full md:w-1/2 bg-gray-100 p-4">
   <canvas class="mx-2" id="barChart" height="300" width="1200"
    style="height: 450px; width: 250px;"></canvas>
  </div>
  <!-- Ratings -->
  <div class="w-full md:w-1/2 bg-gray-500 text-white p-4 space-y-4">
   <div>
    <p>Nadya: respon cepat</p>
    <p>pembelian barang: gasket swg</p>
    ⭐⭐⭐⭐⭐
    <div class="flex gap-2 py-2">
     <img src="https://picsum.photos/50/50" alt="">
     <img src="https://picsum.photos/50/50" alt="">
     <img src="https://picsum.photos/50/50" alt="">

    </div>
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
   <img src="https://picsum.photos/300/150" alt="Produk 1" class="mx-auto" />
   <p class="text-sm mt-2">
    Brand 3Star, Artus Series, ANSI #1500, 24 Inch <br />with Inner SS304L
    and Outer Ring Sealing Element SS304L-Graphite
   </p>
   <p class="text-xl font-bold mt-2">Terjual 100.000</p>
  </div>
  <!-- Product 2 -->
  <div class="text-center">
   <img src="https://picsum.photos/300/150" alt="Produk 2" class="mx-auto" />
   <p class="text-sm mt-2">
    Brand 3Star, Artus Series, ANSI #900, 24 Inch <br />with Inner SS304L
    and Outer Ring Sealing Element SS304L-Graphite
   </p>
   <p class="text-xl font-bold mt-2">Terjual 100.000</p>
  </div>
  <!-- Product 3 -->
  <div class="text-center">
   <img src="https://picsum.photos/300/150" alt="Produk 3" class="mx-auto" />
   <p class="text-sm mt-2">
    Brand 3Star, Artus Series, ANSI #150, 0.5 Inch <br />with Inner SS316L
    and Outer Ring CRS Sealing Element SS316L-Graphite
   </p>
   <p class="text-xl font-bold mt-2">Terjual 100.000</p>
  </div>
 </div>

 <!-- Footer -->
 <footer class="bg-gray-500 text-white p-8 grid grid-cols-1 md:grid-cols-3 gap-8">
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
    <img src="https://via.placeholder.com/50x30?text=Master" alt="MasterCard" />
    <img src="https://via.placeholder.com/50x30?text=BNI" alt="BNI" />
    <img src="https://via.placeholder.com/50x30?text=BCA" alt="BCA" />
    <img src="https://via.placeholder.com/50x30?text=Mandiri" alt="Mandiri" />
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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-trendline@2.0.0"></script>
<script>
 const barCtx = document.getElementById('barChart').getContext('2d');

 const allData = {
  labels: ['2012', '2013', '2014', '2015', '2016', '2017', '2018', '2019', '2020', '2021', '2022', '2023', '2024',
   '2025'
  ],
  values: [45, 65, 85, 102, 54, 78, 86, 120, 101, 101, 114, 116, 120, 155]
 };

 let barDatasets = [{
  label: 'Jumlah Kasus Claim Masuk',
  data: allData.values,
  backgroundColor: 'rgba(75, 192, 192, 0.5)',
  borderColor: 'rgba(75, 192, 192, 1)',
  borderWidth: 1
 }];

 // Tambahkan trendline jika datanya mencukupi (>= 2)
 if (allData.values.length >= 2) {
  barDatasets.push({
   label: 'Trendline',
   data: allData.values,
   borderColor: 'rgba(255, 99, 132, 1)',
   borderWidth: 2,
   type: 'line', // penting! supaya trendline tetap garis
   fill: false,
   trendlineLinear: {
    style: 'rgba(255, 99, 132, .8)',
    lineStyle: 'dotted',
    width: 3
   },
   pointRadius: 0,
   order: 0
  });
 }

 let barChart = new Chart(barCtx, {
  type: 'bar',
  data: {
   labels: allData.labels,
   datasets: barDatasets
  },
  options: {
   responsive: true,
   maintainAspectRatio: false,
   scales: {
    y: {
     beginAtZero: true
    }
   }
  }
 });
</script>

</html>
