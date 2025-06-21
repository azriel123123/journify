<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="cache-control" content="no-cache">

    <title>Warung Kebunqu</title>
    <link rel="shortcut icon" href="{{ asset('frontend/homepage1/Logo.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Meta Tags -->
    <meta name="description"
        content="Warung Kebunqu - Tempat makan keluarga dengan suasana alam di Bogor. Nikmati kuliner khas seperti nasi liwet, gurame, dan kopi terbaik.">
    <meta name="keywords" content="Warung Kebunqu, restoran keluarga Bogor, kuliner tradisional, wisata kuliner Bogor">
    <meta name="author" content="Warung Kebunqu">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
    <meta name="revisit-after" content="7 days">
    <meta name="language" content="Indonesia">
    <meta name="distribution" content="Global">
    <meta name="rating" content="General">
    <meta name="classification" content="Restaurant, Family Dining, Tourist Spot">
    <meta name="url" content="https://warungkebunqu.com">
    <meta name="geo.region" content="ID-JB">
    <meta name="geo.placename" content="Babakan Madang, Kabupaten Bogor, Jawa Barat">
    <meta name="geo.position" content="-6.564923;106.836544">
    <meta name="ICBM" content="-6.564923, 106.836544">
    <meta name="address"
        content="Jl. Gunung Batu Meter 500, Bojong Koneng, Cijayanti, Kabupaten Bogor, Jawa Barat 16810">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="Warung Kebunqu - Restoran Keluarga di Bogor">
    <meta property="og:description"
        content="Nikmati kuliner khas Indonesia di Warung Kebunqu dengan suasana alam dan area bermain anak.">
    <meta property="og:url" content="https://warungkebunqu.com">
    <meta property="og:image" content="https://warungkebunqu.com/images/warung-kebunqu-cover.jpg">
    <meta property="og:locale" content="id_ID">
    <meta property="og:site_name" content="Warung Kebunqu">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Warung Kebunqu - Restoran Keluarga di Bogor">
    <meta name="twitter:description"
        content="Kuliner khas Indonesia di Warung Kebunqu, lengkap dengan suasana asri dan fasilitas anak.">
    <meta name="twitter:image" content="https://warungkebunqu.com/images/warung-kebunqu-cover.jpg">
</head>

<body class="font-body">

    <!-- home section -->
    <section class="bg-white mb-20 md:mb-52 xl:mb-72">

        <div class="container max-w-screen-xl mx-auto px-4">

            <nav class="flex-wrap lg:flex items-center py-14 xl:relative z-10" x-data="{ navbarOpen: false }">
                <div class="flex items-center justify-start mb-10 lg:mb-0">
                    <img src="{{ asset('img/frontend/homepage1/Logo.png') }}" alt="Logo img"
                        class="w-24 md:w-24 lg:w-24">

                    <button
                        class="lg:hidden w-10 h-10 ml-auto flex items-center justify-center text-green-700 border border-green-700 rounded-md"
                        @click="navbarOpen = !navbarOpen">
                        <i data-feather="menu"></i>
                    </button>
                </div>

                <ul class="lg:flex flex-col lg:flex-row lg:items-center lg:mx-auto lg:space-x-8 xl:space-x-16"
                    :class="{ 'hidden': !navbarOpen, 'flex': navbarOpen }">

                    <li class="font-semibold text-gray-900 text-lg hover:text-gray-400 transition mb-5 lg:mb-0">
                        <a href="#">Home</a>
                    </li>
                    <li class="font-semibold text-gray-900 text-lg hover:text-gray-400 transition mb-5 lg:mb-0">
                        <a href="#villa-list">Villa</a>
                    </li>
                    <li class="font-semibold text-gray-900 text-lg hover:text-gray-400 transition mb-5 lg:mb-0">
                        <a href="#menu">Menu</a>
                    </li>
                    <li class="font-semibold text-gray-900 text-lg hover:text-gray-400 transition mb-5 lg:mb-0">
                        <a href="#testimoni">Testimoni</a>
                    </li>
                    <li class="font-semibold text-gray-900 text-lg hover:text-gray-400 transition mb-5 lg:mb-0">
                        <a href="#booking">Booking</a>
                    </li>
                    @auth
                    @if (auth()->user()->hasRole('admin'))
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard Admin</a></li>
                        <li><a href="{{ route('journal') }}">Journal</a></li>
                    @else
                        <li><a href="{{ route('journal') }}">Journal</a></li>
                    @endif

                    <!-- Tombol Logout sementara -->
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="text-red-600 font-semibold hover:underline">Logout</button>
                        </form>
                    </li>
                @else
                    <li><a href="{{ route('login') }}">Login</a></li>
                @endauth



            </ul>
        </nav>


        <div class="flex items-center justify-center xl:justify-start">

            <div class="mt-28 text-center xl:text-left">
                <h1 class="font-semibold text-4xl md:text-6xl lg:text-7xl text-gray-900 leading-normal mb-6">
                    Warung
                    Kebunqu</h1>

                <p class="font-normal text-xl text-gray-400 leading-relaxed mb-12"> Nikmati Kopi dan Villa mu
                    dengan
                    bahagia
                </p>

                <!-- Wrapper untuk tombol -->
            </div>


            <div class="hidden xl:block z-0 right-0">
                <img src="img/frontend/homepage1/fried-rice.jpg" alt="Home img"
                    style="float: right; width: 50%; height: 50%; z-index: 10;">
            </div>

        </div>

    </div>
    <!-- container.// -->

</section>
<!-- home section //nd -->

<!-- feature section -->
<section class="bg-white py-10 md:py-16 xl:relative" id="villa-list">

    <div class="container max-w-screen-xl mx-auto px-4">

        <div class="flex flex-col xl:flex-row items-center justify-between">

            <div class="hidden xl:block w-1/2">
                <img src="img/frontend/homepage1/IMG_7106.jpeg" alt="Feature img"
                    style="width: 80%; height: 80%; z-index: 10;">
            </div>

            <div class="w-full xl:w-1/2">

                <h1
                    class="font-semibold text-gray-900 text-xl md:text-4xl text-center xl:text-left leading-normal mb-6">
                    Pilih Villa Kebunqu Untuk <br> Villa andalan mu
                </h1>

                <p class="font-normal text-gray-400 text-md md:text-xl text-center xl:text-left mb-16">
                    Kami hadir untuk menghadirkan pengalaman menginap tak terlupakan di Villa Kebunqu. Nikmati
                    fasilitas eksklusif yang kami sediakan, dan rasakan liburan penuh kebahagiaan bersama keluarga
                    tercinta
                </p>

                <div class="flex flex-col md:flex-row justify-center xl:justify-start space-x-4 mb-20">
                    <div
                        class="px-8 h-20 mx-auto md:mx-0 bg-gray-200 rounded-lg flex items-center justify-center mb-5 md:mb-0">
                        <i data-feather="check-circle" class=" text-green-900"></i>
                    </div>

                    <div class="text-center md:text-left">
                        <h4 class="font-semibold text-gray-900 text-2xl mb-2">Kamar Premium, Fasilitas Maksimal
                        </h4>
                        <p class="font-normal text-gray-400 text-xl leading-relaxed">
                            Kami meniamin kenyamanan keluarga Anda dengan kamar terbaik yang dilengkapi fasilitas
                            mewah. Rasakan suasana yang menenangkan dan nikmati setiar, momen istimewa di Villa
                            Kebunqu.
                        </p>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row justify-center xl:justify-start space-x-4 mb-20">
                    <div
                        class="px-8 h-20 mx-auto md:mx-0 bg-gray-200 rounded-lg flex items-center justify-center mb-5 md:mb-0">
                        <i data-feather="lock" class=" text-green-900"></i>
                    </div>

                    <div class="text-center md:text-left">
                        <h4 class="font-semibold text-gray-900 text-2xl mb-2">Keamanan dan Privasi Dijamin 100%
                        </h4>
                        <p class="font-normal text-gray-400 text-xl leading-relaxed">
                            Nikmati kemudahan transaksi dan privasi yang teriaga sepenuhnya. Kami menawarkan
                            keamanan transaksi yang terjamin serta diskon menarik yang bisa Anda dapatkan.
                        </p>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row justify-center xl:justify-start space-x-4">
                    <div
                        class="px-8 h-20 mx-auto md:mx-0 bg-gray-200 rounded-lg flex items-center justify-center mb-5 md:mb-0">
                        <i data-feather="credit-card" class=" text-green-900"></i>
                    </div>

                    <div class="text-center md:text-left">
                        <h4 class="font-semibold text-gray-900 text-2xl mb-2">Harga Terjangkau, Pemandangan Memukau
                        </h4>
                        <p class="font-normal text-gray-400 text-xl leading-relaxed">
                            Dapatkan villa dengan harga bersahabat dan view alam yang memukau. Cocok untuk liburan
                            akhir pekan yang hangat bersama keluarga. Pesan sekarang dan rasakan sensasi liburan
                            berkualitas di Villa Kebunqu!
                        </p>
                    </div>
                </div>

            </div>

        </div>


    </div>
    <!-- container.// -->

</section>
<!-- feature section //end -->

<div class="container mx-auto px-2 pt-3" id="menu">
    <h1 class="text-3xl font-bold text-center mb-4">Price List</h1>

    <div class="flex flex-col md:flex-row justify-center gap-6">

        <!-- Starter Plan Card -->
        <div
            class="bg-white shadow-md rounded-2xl p-6 w-full md:w-96 border border-gray-200 hover:shadow-xl transition">
            <div class="flex items-center space-x-3 mb-4">
                <div class="bg-gray-100 rounded-full w-10 h-10 flex items-center justify-center">
                    <i class="fa-solid fa-user text-gray-400"></i>
                </div>
                <div>
                    <h2 class="text-xl font-semibold text-gray-900">Starter</h2>
                    <p class="text-gray-500 text-sm">Perfect for new users</p>
                </div>
            </div>
            <ul class="text-gray-700 mb-6 space-y-2">
                <li class="flex items-center"><i class="fa-solid fa-check-circle text-green-600 mr-2"></i> 1,000
                    Search Credits</li>
                <li class="flex items-center"><i class="fa-solid fa-check-circle text-green-600 mr-2"></i> No
                    Commitment</li>
                <li class="flex items-center"><i class="fa-solid fa-check-circle text-green-600 mr-2"></i> Full
                    Access</li>
            </ul>
            <div class="text-3xl font-bold text-gray-900 mb-2">$0<span class="text-base font-normal">/mo</span>
            </div>
            <button
                class="w-full py-3 bg-white border border-gray-300 text-gray-800 rounded-xl hover:bg-gray-100 transition">
                Start Trial
            </button>
        </div>

        <!-- Unlimited Plan Card -->
        <div
            class="bg-white shadow-md rounded-2xl p-6 w-full md:w-96 border-2 border-blue-500 hover:shadow-xl transition">
            <div class="flex items-center space-x-3 mb-4">
                <div class="bg-blue-100 rounded-full w-10 h-10 flex items-center justify-center">
                    <i class="fa-solid fa-star text-blue-500"></i>
                </div>
                <div>
                    <h2 class="text-xl font-semibold text-gray-900">Unlimited</h2>
                    <p class="text-gray-500 text-sm">Perfect for seasoned advertisers</p>
                </div>
            </div>
            <ul class="text-gray-700 mb-6 space-y-2">
                <li class="flex items-center"><i class="fa-solid fa-check-circle text-green-600 mr-2"></i> 160+
                    Million Ads</li>
                <li class="flex items-center"><i class="fa-solid fa-check-circle text-green-600 mr-2"></i>
                    Demographics</li>
                <li class="flex items-center"><i class="fa-solid fa-check-circle text-green-600 mr-2"></i>
                    Enhanced
                    Search</li>
            </ul>
            <div class="text-3xl font-bold text-gray-900 mb-2">$149<span class="text-base font-normal">/mo</span>
            </div>
            <button class="w-full py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition">
                Subscribe
            </button>
        </div>

    </div>
</div>


<!-- book section //end -->

<!-- footer -->
<footer class="bg-white py-10 md:py-16 ">

    <div class="container max-w-screen-xl mx-auto px-4 ">

        <div class="flex flex-col lg:flex-row justify-between ">
            <div class="text-center lg:text-left mb-10 lg:mb-0 ">
                <div class="flex justify-center lg:justify-start mb-5 ">
                    <img src="img/frontend/homepage1/Logo.png " alt="Logo img " class="w-32 md:w-48 lg:w-56 ">
                </div>

                <p class="font-light text-gray-400 text-xl mb-10 ">Temukan Villa nyaman dan Kopi terbaik di <br>
                    Warung Kebunqu</p>

                <div class="flex items-center justify-center lg:justify-start space-x-5 ">
                    <a href="# "
                        class="px-3 py-3 bg-gray-200 text-gray-700 rounded-full hover:bg-green-800 hover:text-white transition ease-in-out duration-500 ">
                        <i data-feather="facebook "></i>
                    </a>

                    <a href="# "
                        class="px-3 py-3 bg-gray-200 text-gray-700 rounded-full hover:bg-green-800 hover:text-white transition ease-in-out duration-500 ">
                        <i data-feather="twitter "></i>
                    </a>

                    <a href="# "
                        class="px-3 py-3 bg-gray-200 text-gray-700 rounded-full hover:bg-green-800 hover:text-white transition ease-in-out duration-500 ">
                        <i data-feather="linkedin "></i>
                    </a>
                </div>
            </div>

            <div class="text-center lg:text-left mb-10 lg:mb-0 ">
                <h4 class="font-semibold text-gray-900 text-2xl mb-6 ">Sitemap</h4>

                <a href="# "
                    class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300 ">Home</a>

                <a href="#villa-list"
                    class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300 ">Villa</a>

                <a href="#menu"
                    class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300 ">Menu</a>

                <a href="#testimoni"
                    class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300 ">Testimoni</a>

                <a href="#booking"
                    class="block font-light text-gray-400 text-xl mb-6 hover:text-gray-800 transition ease-in-out duration-300 ">About</a>
            </div>
        </div>

    </div>
    <!-- container.// -->

</footer>
<!-- footer //end -->

<script>
    // Get the button
    const backToTopBtn = document.getElementById("backToTopBtn");

    // When the user scrolls down 100px from the top of the document, show the button
    window.onscroll = function() {
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            backToTopBtn.classList.remove("hidden");
        } else {
            backToTopBtn.classList.add("hidden");
        }
    };

    // When the user clicks on the button, scroll to the top of the document
    backToTopBtn.addEventListener("click", function() {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    });
</script>

<script>
    feather.replace()
</script>
</body>

</html>
