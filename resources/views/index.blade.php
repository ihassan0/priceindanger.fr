<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('logos/favicon.png') }}" type="image/x-icon">
    <title>Tous les Codes Promo de Priceindanger.fr {{ \Carbon\Carbon::now()->format('M Y') }}
    </title>
    <meta name="description"
        content="Tous les Codes Promo et offres de réduction sur Priceindanger.fr {{ \Carbon\Carbon::now()->format('Y') }}">
    <link rel="canonical" href="https://www.priceindanger.fr/" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.0/dist/cdn.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta name="google-site-verification" content="kIiGzRxa25UtT0WMf6xbrfJZe6AJ7v1ermPx8YqzzQ8" />
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-499DV89L0M"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-499DV89L0M');
    </script>
    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "Organization",
            "name": "Price in Danger",
            "url": "https://www.priceindanger.fr/",
            "description": "Trouvez les meilleurs codes promo et réductions 100% vérifiés. Économisez sur vos marques préférées avec Price in Danger Fr",
            "logo": "https://www.priceindanger.fr/logos/priceindanger.webp",
            "contactPoint": [{
                "@type": "ContactPoint",
                "telephone": "+49 1522 5110114",
                "email": "admin@priceindanger.fr",
                "contactType": "customer service"
            }],
            "sameAs": [
                "https://twitter.com/priceindanger",
                "https://www.pinterest.com/priceindangerfr/",
                "https://www.facebook.com/Priceindangerfr/",
                "https://www.linkedin.com/company/pricein-danger-fr/"
            ]
        }
    </script>

    <style>
        .swiper-pagination-bullet-active {
            background: var(--primary);
        }

        .swiper-pagination-bullet {
            position: relative;
            border-radius: 2px;
        }

        .swiper-pagination-bullet::before {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            top: 0;
            border: 2px solid #333;
            border-radius: 2px;
            margin: -4px;
        }

        .swiper-pagination-bullet-active::before {
            border-color: var(--primary);
        }

        .swiper-horizontal>.swiper-pagination-bullets .swiper-pagination-bullet,
        .swiper-pagination-horizontal.swiper-pagination-bullets .swiper-pagination-bullet {
            margin: 0px 7px;
        }
    </style>
</head>

<body>
    <!-- Navbar  -->
    @include('components.navbar')
    <!-- Navbar Ends  -->

    <!-- Banner Section -->
    <section class="container">
        <div class="swiper-container md:h-[450px] mx-auto xl:ml-[24%] lg:ml-[28%] mt-5 overflow-hidden relative">
            <div class="swiper-wrapper ">
                @foreach ($banners as $banner)
                <div class="swiper-slide rounded-md overflow-hidden">
                    <a href="{{ route('storeView', [$banner->store->id,  'name' => Str::slug($banner->store->name).'-codes-promo'])}}" target="_blank">
                        <img src="{{ asset('storage/' . $banner->banner) }}" class="w-full h-auto" alt="Banner Image">
                    </a>
                </div>
                @endforeach
            </div>
            <div class="swiper-pagination "></div>
        </div>
    </section>




    <!--    <section class="container">-->
    <!--    <div class="swiper-container md:h-[450px] mx-auto xl:ml-[24%] lg:ml-[28%] mt-5 overflow-hidden relative w-[72%]">-->
    <!--        <div class="swiper-wrapper">-->
    <!--            @foreach ($banners as $banner)-->
    <!--            <div class="swiper-slide rounded-md overflow-hidden">-->
    <!--                <a href="{{ route('storeView', [$banner->store->id,  'name' => Str::slug($banner->store->name).'-codes-promo'])}}" target="_blank">-->
    <!--                    <img src="{{ asset('storage/' . $banner->banner) }}" class="w-full h-auto" alt="Banner Image">-->
    <!--                </a>-->
    <!--            </div>-->
    <!--            @endforeach-->
    <!--        </div>-->
    <!--        <div class="swiper-pagination"></div>-->
    <!--    </div>-->
    <!--</section>-->



    <!-- End Banner Section  -->


    <!--  Shops section   -->

    <section class="container overflow-hidden">
        <p class="text-[15px] text-center opacity-85 my-4 mt-6">Lorsque vous achetez via des liens sur
            priceindanger.fr, nous
            pouvons gagner une commission</p>
        <div class="border-b-[1px] border-gray-200 my-7 pb-5 flex items-center justify-between">

            <h1 class="lg:text-[40px] text-xl font-bold leading-snug">Obtenez toutes sortes de bons d'achat et de codes
                de réduction
            </h1>
            <span class="text-lg font-bold flex items-center">
                <i class="fa-solid fa-chevron-left shop-swiper-button-prev"></i>
                <i class="fa-solid fa-chevron-right shop-swiper-button-next ml-2"></i>
            </span>
        </div>

        <div class="swiper-container-shop py-5">
            <div class="swiper-wrapper">
                @foreach ($shops as $shop)
                <div class="swiper-slide bg-white hover:shadow-xl transition duration-300 rounded group overflow-hidden"
                    style="box-shadow: rgba(0, 0, 0, 0.4) 0px 0px 7px">
                    <a href="{{ route('storeView', [$shop->id,  'name' => Str::slug($shop->name).'-codes-promo'])}}">
                        <img src="{{ asset('storage/' . $shop->logo) }}" alt="Shop Logo"
                            class="h-28 w-full object-cover group-hover:scale-[1.15] transition-all duration-300">
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        <div class="text-center my-14">
            <a href="{{route('allStores')}}">
                <button class="btn rounded-full overflow-hidden mx-auto uppercase py-3 px-8">Aller dans les
                    magasins</button></a>
        </div>
    </section>

    <!-- End Shops section  -->



    <!--  Exclusive coupons   -->
    <section class="container overflow-hidden">
        <div class="border-b-[1px] border-gray-200 mb-5 pb-5 flex items-center justify-between">
            <h1 class="lg:text-[32px] leading-snug text-xl font-bold ">Codes promo exclusifs</h1>
        </div>

        <div class="py-5">
            <div class="grid lg:grid-cols-5 md:grid-cols-3 grid-cols-2 gap-5">
                @foreach ($exclusives as $coupon)
                @include('components.couponCard', ['coupon' => $coupon])
                @endforeach
            </div>
        </div>
    </section>

    <!-- End Exclusive coupons -->


    <!-- Mid Banner Start  -->

    <section class="container">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 ">
            @foreach ($sm_banners as $banner)
            <a href="{{ route('storeView', [$banner->store->id,  'name' => Str::slug($banner->store->name).'-codes-promo'])}}" target="_blank" class=" rounded-md drop-shadow-[2px_2px_5px_#00000090]">
                <img src="{{ asset('storage/' . $banner->banner) }}"
                    class="w-full h-auto object-cover rounded-md"
                    alt="Banner Image">
            </a>
            @endforeach
        </div>
    </section>

    <!-- Mid Banner end  -->


    <!--  Popular coupons   -->

    <section class="container overflow-hidden">
        <div class="border-b-[1px] border-gray-200 mt-10 mb-5 pb-5 flex items-center justify-between">

            <h1 class="lg:text-[32px] leading-snug text-xl font-bold ">Bons populaires</h1>
        </div>

        <div class="py-5">
            <div class="grid lg:grid-cols-5 md:grid-cols-3 grid-cols-2 gap-5">

                @foreach ($populars as $coupon)
                @include('components.couponCard', ['coupon' => $coupon])
                @endforeach
            </div>
        </div>
    </section>

    <!-- End Popular coupons -->



    <!-- Stores Section-->

    <section class="container overflow-hidden">
        <div class="border-b-[1px] border-gray-200 my-10 pb-5 flex items-center justify-between">
            <h1 class="lg:text-[32px] leading-snug text-xl font-bold ">Codes de réduction de marques célèbres</h1>
            <span class="text-lg font-bold flex items-center">
                <i class="fa-solid fa-chevron-left store-swiper-button-prev"></i>
                <i class="fa-solid fa-chevron-right store-swiper-button-next ml-2"></i>
            </span>
        </div>

        <div class="swiper-container-store py-5">
            <div class="swiper-wrapper">
                @foreach ($endShops as $store)
                <a href="{{ route('storeView', [$store->id,  'name' => Str::slug($store->name).'-codes-promo'])}}"
                    class="swiper-slide bg-white hover:shadow-xl transition duration-300 rounded group overflow-hidden"
                    style="box-shadow: rgba(0, 0, 0, 0.4) 0px 0px 7px">
                    <img src="{{ asset('storage/' . $store->logo) }}" alt="Shop Logo"
                        class="h-28 w-full object-cover group-hover:scale-[1.15] transition-all duration-300">
                </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- End Shops section  -->



    {{-- description --}}
    <section class="bg-[#F7F7F7]">
        <div class="container description px-3 pb-10 pt-5">
            <div class="border-b-[1px] border-gray-200 my-5 pb-5">
                <h1 class="lg:text-[32px] leading-snug text-xl font-bold text-center">La destination ultime des bons
                    d'achat</h1>
            </div>
            {!! $homesettings->description !!}
        </div>
    </section>


    @include('components.modal')


    {{-- Newsletter Section --}}
    @include('components.newsletter')
    {{-- Newsletter Section Ends --}}

    {{-- Footer --}}
    @include('components.footer')
    {{-- Footer Ends --}}


</body>
<script src="https://kit.fontawesome.com/35b4de642d.js" crossorigin="anonymous"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const swiper = new Swiper('.swiper-container', {
            loop: true,
            slidesPerView: 1,
            spaceBetween: 0,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                // dynamicBullets: true,
            },
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
        });

        const shopSwiper = new Swiper('.swiper-container-shop', {
            loop: true,
            slidesPerView: 2,
            spaceBetween: 10,

            navigation: {
                nextEl: '.shop-swiper-button-next',
                prevEl: '.shop-swiper-button-prev',
            },
            breakpoints: {
                400: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
                800: {
                    slidesPerView: 5,
                    spaceBetween: 20,
                },
            },
        });
        const storeSwiper = new Swiper('.swiper-container-store', {
            loop: true,
            slidesPerView: 2,
            spaceBetween: 10,
            navigation: {
                nextEl: '.store-swiper-button-next',
                prevEl: '.store-swiper-button-prev',
            },
            breakpoints: {
                400: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
                800: {
                    slidesPerView: 5,
                    spaceBetween: 20,
                },
            },
        });
    });
</script>



</html>