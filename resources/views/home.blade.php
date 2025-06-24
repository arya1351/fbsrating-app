<!DOCTYPE html>
<html lang="id">

<head>
 <meta charset="UTF-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 <title>PT. Jeil Fajar Indonesia</title>
 <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
 @vite(entrypoints: ['resources/css/app.css', 'resources/js/app.js'])
 <style>
  [x-cloak] {
   display: none !important;
  }
 </style>

</head>

<body class="font-sans">
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

 <!-- Sticky Navbar -->
 <nav class="sticky top-0 z-50 bg-white shadow">
  <!-- Main Navbar -->
  <div class="container mx-auto flex items-center justify-between px-6 py-3">
   <!-- Kiri: Logo -->
   <div class="flex items-center space-x-4">
    <img src="{{ asset('img') }}/fbjlogos.png" alt="Logo" class="h-10" />
   </div>

   <div class="ml-6 flex items-center space-x-4">

    @if (Route::has('login'))
     @auth
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
             <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 rotate-45" fill="currentColor" viewBox="0 0 20 20">
              <path
               d="M10.293 15.707a1 1 0 010-1.414L13.586 11H4a1 1 0 110-2h9.586l-3.293-3.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" />
             </svg>
            </button>
           </div>

           <!-- Produk Placeholder -->
           <input type="text" name="product"
            class="w-full rounded bg-red-600 px-4 py-2 text-white placeholder:text-white"
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
            <button type="submit" class="rounded bg-red-600 px-4 py-2 text-white transition hover:bg-red-700">
             Kirim Ulasan
            </button>
           </div>
          </form>

         </div>
        </div>
       </div>
      @else
       <!-- Kanan: Cart + Auth -->
       <button class="rounded border border-gray-400 px-4 py-2 text-sm font-medium">
        <a class="text-black hover:text-gray-400 hover:underline" href="{{ route('login') }}">SIGN IN</a> /
        <a class="text-black hover:text-gray-400 hover:underline" href="{{ route('register') }}">REGISTER</a>
       </button>
       <div x-data="{ modalOpen: false, images: [''] }">
        <button @click="modalOpen = !modalOpen"
         class="rounded bg-blue-500 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-600">
         <span>Berikan Ulasan</span>
        </button>

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
             class="mx-auto w-full rounded bg-red-600 px-4 py-2 text-center text-sm font-bold text-white hover:bg-red-900">Kamu
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
   $firstFive = $ratings->take(4);
   $remaining = $ratings->slice(4);
  @endphp

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
  }" x-init="init()" class="w-full bg-gray-500 p-4 text-white md:w-1/2">
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
       <img :src="img" class="h-12 w-12 object-cover" />
      </template>
     </div>
    </div>
   </template>

   <template x-if="filteredRatings.length > 4">
    <div class="flex w-full justify-end">
     <button @click="openMore = true" class="rounded bg-transparent px-4 py-2 text-blue-700">Lihat semua
      ulasan</button>
    </div>
   </template>

   <template x-if="openMore">
    <div class="fixed inset-0 z-50 flex items-center justify-center bg-gray-800 bg-opacity-80">
     <div class="relative max-h-[80vh] w-full max-w-2xl overflow-y-auto rounded bg-white p-6 text-black">
      <button @click="openMore = false"
       class="absolute right-2 top-2 text-2xl text-gray-600 md:text-xl lg:text-xl">&times;</button>
      <h2 class="mb-4 text-lg font-bold">Semua Ulasan</h2>

      <template x-for="(rating, index) in filteredRatings.slice(4)" :key="index">
       <div class="mb-4 border-b pb-2">
        <p><strong x-text="rating.user_name"></strong>: <span x-text="rating.rating_desc"></span></p>
        <p>pembelian barang: <span x-text="rating.product"></span></p>
        <div x-text="'⭐'.repeat(rating.stars)"></div>
        <div class="flex gap-2 py-2">
         <template x-for="img in rating.images" :key="img">
          <img :src="img" class="h-12 w-12 object-cover" />
         </template>
        </div>
       </div>
      </template>
     </div>
    </div>
   </template>

  </div>
 </div>

 </div>

 <!-- Best Seller Section -->
 <section class="bg-red-600 py-8 text-center text-white">
  <h2 class="text-3xl font-bold">Best Seller Produk</h2>
 </section>

 <div class="flex flex-col justify-center gap-8 p-8 md:flex-row">
  <!-- Product 1 -->
  <div class="text-center">
   <img src="https://picsum.photos/300/150" alt="Produk 1" class="mx-auto" />
   <p class="mt-2 text-sm">
    Brand 3Star, Artus Series, ANSI #1500, 24 Inch <br />with Inner SS304L
    and Outer Ring Sealing Element SS304L-Graphite
   </p>
   <p class="mt-2 text-xl font-bold">Terjual 100.000</p>
  </div>
  <!-- Product 2 -->
  <div class="text-center">
   <img src="https://picsum.photos/300/150" alt="Produk 2" class="mx-auto" />
   <p class="mt-2 text-sm">
    Brand 3Star, Artus Series, ANSI #900, 24 Inch <br />with Inner SS304L
    and Outer Ring Sealing Element SS304L-Graphite
   </p>
   <p class="mt-2 text-xl font-bold">Terjual 100.000</p>
  </div>
  <!-- Product 3 -->
  <div class="text-center">
   <img src="https://picsum.photos/300/150" alt="Produk 3" class="mx-auto" />
   <p class="mt-2 text-sm">
    Brand 3Star, Artus Series, ANSI #150, 0.5 Inch <br />with Inner SS316L
    and Outer Ring CRS Sealing Element SS316L-Graphite
   </p>
   <p class="mt-2 text-xl font-bold">Terjual 100.000</p>
  </div>
 </div>

 <!-- Footer -->
 <footer class="grid grid-cols-1 gap-8 bg-gray-500 p-8 text-white md:grid-cols-3">
  <!-- Lokasi -->
  <div>
   <h3 class="mb-2 text-lg font-bold">Lokasi Kami</h3>
   <p class="font-bold">
    Indonesia <span class="ml-2 inline-block">🇮🇩</span>
   </p>
   <p>Jeil Fajar Indonesia</p>
   <p>Jl. Mayor Oking Jayaatmaja</p>
   <p>No. 88 Cibinong 16911 Jawa Barat, Indonesia</p>
  </div>
  <!-- Tentang Kami -->
  <div>
   <h3 class="mb-2 text-lg font-bold">Tentang Kami</h3>
   <p>Fajar Benua Store</p>
   <p>Tim Ahli Kami</p>
   <p>Ruang Engineer</p>
  </div>
  <!-- Metode Pembayaran -->
  <div>
   <h3 class="mb-2 text-lg font-bold">Metode Pembayaran</h3>
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
 <div class="bg-gray-500 py-4 text-center text-white">
  <h3 class="mb-2 text-lg font-bold">Ikuti Kami</h3>
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
 const barCtx = document.getElementById('barChart').getContext('2d');

 // Label tiap bar
 const labels = ['1 Star', '2 Star', '3 Star', '4 Star', '5 Star'];
 const values = [
  {{ $starCounts[1] ?? 0 }},
  {{ $starCounts[2] ?? 0 }},
  {{ $starCounts[3] ?? 0 }},
  {{ $starCounts[4] ?? 0 }},
  {{ $starCounts[5] ?? 0 }},
 ];

 new Chart(barCtx, {
  type: 'bar',
  data: {
   labels: labels,
   datasets: [{
    label: 'Jumlah Kasus Claim Masuk',
    data: values,
    backgroundColor: 'rgba(75, 192, 192, 0.5)',
    borderColor: 'rgba(75, 192, 192, 1)',
    borderWidth: 1
   }]
  },
  options: {
   responsive: true,
   maintainAspectRatio: false,
   plugins: {
    legend: {
     display: true,
     labels: {
      usePointStyle: true
     }
    }
   },
   scales: {
    x: {
     beginAtZero: true,
     grid: {
      offset: true
     }
    },
    y: {
     beginAtZero: true
    }
   }

  }
 });
</script>

{{-- <script>
 const barCtx = document.getElementById('barChart').getContext('2d');

 const allData = {
  labels: ['1 Star', '2 Star', '3 Star', '4 Star', '5 Star'],
  values: [
   {{ $starCounts[1] ?? 0 }},
   {{ $starCounts[2] ?? 0 }},
   {{ $starCounts[3] ?? 0 }},
   {{ $starCounts[4] ?? 0 }},
   {{ $starCounts[5] ?? 0 }},
  ]
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
</script> --}}
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
