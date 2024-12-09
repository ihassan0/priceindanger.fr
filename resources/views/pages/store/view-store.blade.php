<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Navbar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>

<body>
    <!-- Navbar  -->
    @include('components.navbar')
    <!-- Navbar Ends  -->


    <!-- Breadcrums start -->
    @include('components.breadcrums', ['current_page' => $store->name])
    <!-- Breadcrums end -->

    <main class="container mt-10 mb-16">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Review , Shops, Categories -->
            <div class="lg:w-1/4 relative order-2 lg:order-1">
                <!-- ratings -->
                <div class="mb-6">
                    <a href="#" class="w-full block rounded-lg mb-5 overflow-hidden p-4" style="box-shadow:0px 0px 16px rgb(0 0 0 / 13%);">
                        <img src="{{ asset('storage/'. $store->logo) }}" class="w-full mx-auto h-[120px] object-cover scale-100 hover:scale-[1.1] transition-all duration-500">
                    </a>
                    <p class="pt-5 border-t text-[20px] font-bold">ALBERTO</p>
                    <p class="mt-5">Évaluation: 4.3 sur 5</p>
                    <p class="mt-3">Notes globales: 3</p>
                    <div class="flex flex-row-reverse justify-end gap-2 my-6">
                        <i class="fa-solid fa-star text-[#CCCCCC] peer peer-hover:text-yellow-500 hover:text-yellow-500 text-lg cursor-pointer"></i>
                        <i class="fa-solid fa-star text-[#CCCCCC] peer peer-hover:text-yellow-500 hover:text-yellow-500 text-lg cursor-pointer"></i>
                        <i class="fa-solid fa-star text-[#CCCCCC] peer peer-hover:text-yellow-500 hover:text-yellow-500 text-lg cursor-pointer"></i>
                        <i class="fa-solid fa-star text-[#CCCCCC] peer peer-hover:text-yellow-500 hover:text-yellow-500 text-lg cursor-pointer"></i>
                        <i class="fa-solid fa-star text-[#CCCCCC] peer peer-hover:text-yellow-500 hover:text-yellow-500 text-lg cursor-pointer"></i>
                    </div>

                    <button class="btn py-3 px-5 rounded-full overflow-hidden">Donner une évaluation</button>
                </div>
                <!-- Shops -->
                <div class="mb-6">
                    <div
                        class="flex items-center justify-between text-[var(--secondary)] border-b lg:border-0 pb-2 cursor-pointer toggle-header ">
                        <h3 class="font-semibold sm:text-xl text-lg">Magasins similaires</h3>
                        <i class="fa-solid fa-plus toggle-icon transition-transform duration-300 lg:!hidden"></i>
                    </div>

                    <!-- Categories List -->
                    <ul
                        class="flex flex-col gap-2 mt-4 transition-all duration-300 overflow-hidden toggle-content max-h-0 lg:max-h-none">
                        @foreach ($shops->take(6) as $shop )
                        <li>
                            <a href="#" class="md:text-[17px]"><i class="fa-solid fa-chevron-right mr-1 text-xs"></i> {{ $shop->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!-- Categories -->
                <div class="mb-6">
                    <div
                        class="flex items-center justify-between text-[var(--secondary)] border-b lg:border-0 pb-2 cursor-pointer toggle-header ">
                        <h3 class="font-semibold sm:text-xl text-lg">Top-Kategorien</h3>
                        <i class="fa-solid fa-plus toggle-icon transition-transform duration-300 lg:!hidden"></i>
                    </div>

                    <!-- Categories List -->
                    <ul
                        class="flex flex-col gap-2 mt-4 transition-all duration-300 overflow-hidden toggle-content max-h-0 lg:max-h-none">
                        @foreach ($topCategories->take(6) as $category)
                        <li>
                            <a href="#" class="md:text-[17px]"><i class="fa-solid fa-chevron-right mr-1 text-xs"></i> {{ $category->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>

            </div>

            <!-- Buttons , Coupons -->
            <div class="lg:w-3/4 order-1 lg:order-2">
                <!-- Buttons -->
                <div class="flex items-center md:gap-3 gap-1 overflow-auto no-scrollbar">
                    <button
                        class="active border border-[var(--secondary)] uppercase md:px-3 px-2 sm:py-2 py-1 rounded-md text-xs sm:text-sm whitespace-nowrap hover:bg-[var(--secondary)] hover:text-white transition-all duration-300">All
                        (34)</button>
                    <button
                        class="border border-[var(--secondary)] uppercase md:px-3 px-2 sm:py-2 py-1 rounded-md text-xs sm:text-sm whitespace-nowrap hover:bg-[var(--secondary)] hover:text-white transition-all duration-300">Guteschein
                        (18)</button>
                    <button
                        class="border border-[var(--secondary)] uppercase md:px-3 px-2 sm:py-2 py-1 rounded-md text-xs sm:text-sm whitespace-nowrap hover:bg-[var(--secondary)] hover:text-white transition-all duration-300">Angebote
                        (16)</button>
                    <button
                        class="border border-[var(--secondary)] uppercase md:px-3 px-2 sm:py-2 py-1 rounded-md text-xs sm:text-sm whitespace-nowrap hover:bg-[var(--secondary)] hover:text-white transition-all duration-300">Cashback
                        (0)</button>
                </div>
                <!-- Coupons -->
                <div class="sm:mt-10 mt-5">
                    @foreach ($store->coupons as $coupon)
                    <div>
                        <div class="flex flex-col md:flex-row items-center gap-3 border-b transition duration-200 py-4 relative ">
                            <div class="mb-4 h-fit w-[30%] md:block hidden">
                                <p class="flex items-center justify-center w-full text-center p-3 text-pretty overflow-hidden sm:min-h-[80px] h-auto h-[80px] font-semibold text-[var(--secondary)] bg-[#00265450] md:bg-transparent rounded-md border-2 md:border-0 border-[var(--secondary)]" style="font-size: clamp(24px ,50%, 35px );">
                                    {{$coupon->discount}}%
                                </p>
                            </div>

                            @if ($coupon -> exclusive_coupons == 1)
                            <div class="text-end absolute right-0 top-[5px]">
                                <span class="bg-[var(--primary)] text-white text-xs shadow-lg rounded-l-full px-3 py-1 ml-auto">Exclusive</span>
                            </div>
                            @endif
                            <div class="sm:p-3 pt-3  flex-1 w-full">
                                <div class="flex  gap-4">
                                    <div class="w-[35%] min-h-[51px] md:hidden">
                                        <p class="flex items-center justify-center p-1 text-[13px] text-center h-full text-pretty overflow-hidden font-semibold text-[var(--secondary)] bg-[#00265433] rounded-sm border-2 border-[var(--secondary)] ">
                                            {{$coupon->discount}}%
                                        </p>
                                    </div>
                                    <div class="w-full">
                                        <h3 class="md:text-[22px] text-lg  font-semibold ">{{ $coupon->name }}</h3>

                                        <div class="description-content transition-all duration-300 lg:block hidden">
                                            <p class="w-[80%]" style="color:black;">{{$coupon->description}}</p>
                                        </div>
                                        <!-- Description -->
                                        <div class="lg:hidden">
                                            <div id="description-{{ $coupon->id }}" class="description-content transition-all duration-300" style="max-height: 0; overflow: hidden;">
                                                <p class="text-sm" style="color:black;">{{$coupon->description}}</p>
                                            </div>
                                            <button id="toggleButton-{{ $coupon->id }}" class="p-0 text-[12px] sm:text-sm" style="color: #DA3737;"><i class="fa-solid fa-chevron-down"></i> Plus d'informations</button>
                                        </div>
                                    </div>
                                </div>

                                <p class="mt-3 text-black md:block hidden"><span>Date d'expiration :</span></p>
                                <div class="flex gap-1 items-center justify-end md:justify-start mt-[0.4rem] text-gray-500 text-sm sm:text-base">
                                    <i class="far fa-calendar-alt mr-1 text-[var(--secondary)]"></i>{{ $coupon->expiry_date?$coupon->expiry_date : "Pas de date d'expiration" }}
                                </div>

                                <button onclick="openModal()"
                                    class="btn w-full md:w-auto px-10 py-3 overflow-hidden md:rounded-full rounded-lg mt-4 md:text-sm text-xs">
                                    CODE ANZEIGEN
                                </button>
                            </div>
                        </div>

                        @include('components.modal')
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Table -->
        <div class="w-full rounded-md sm:p-7 p-4 mt-10" style="box-shadow: rgba(0,0,0,0.4) 0px 0px 10px;">
            <h2 class="text-xl md:text-3xl font-semibold mb-2">Aktuell Apimanu Gutscheincodes Nov 2024</h2>
            <div class="mt-4">
                <table class="min-w-full table-auto border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="w-1/5 px-4 py-2 text-left md:text-lg font-semibold text-gray-700">Rabatt</th>
                            <th class="w-3/5 px-4 py-2 text-left md:text-lg font-semibold text-gray-700 ">Beschreibung</th>
                            <th class="w-1/5 px-4 py-2 text-center md:text-lg font-semibold text-gray-700">Ablauf</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr>
                            <td class="px-4 py-2 text-xs md:text-base text-gray-800">7-tägiges Rückgaberecht</td>
                            <td class="px-4 py-2 text-xs md:text-base text-gray-800 ">Sie können Ihre Bestellung innerhalb von 7 Tagen
                                nach Erhalt zurückgeben </td>
                            <td class="px-4 py-2 text-xs md:text-base text-center text-gray-800"></td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 text-xs md:text-base text-gray-800">10% Gutscheincode</td>
                            <td class="px-4 py-2 text-xs md:text-base text-gray-800 ">10% Rabatt auf alle mit Gutscheincode bei Apimanu
                            </td>
                            <td class="px-4 py-2 text-xs md:text-base text-center text-gray-800">2024-12-31</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- Description -->
    <section class="bg-[#F7F7F7] my-10">
        <div class="container px-3 py-10">
            <div class="border-b-[1px] border-gray-200 mb-7 pb-5">
                <h1 class="lg:text-[32px] leading-snug text-xl font-bold text-center">ABOUT YOU Gutscheine und Rabattcodes 2024</h1>
            </div>
            {!! $store->description !!}
        </div>
    </section>
    <!-- Comment -->
    <div class="container mb-10">
        <h3 class="font-semibold text-2xl my-5">Commentaires</h3>
        <h3 class="font-semibold text-2xl my-5">Écrivez un commentaire</h3>

        <form>
            <div class="flex flex-col md:flex-row gap-4">
                <input type="text" name="name" placeholder="Ton Nom"
                    class="border border-gray-300 p-3 rounded-md flex-1">
                <input type="email" name="name" placeholder="Votre email"
                    class="border border-gray-300 p-3 rounded-md flex-1">
            </div>
            <textarea name="message" cols="30" placeholder="Votre commentaire"
                class="border border-gray-300 p-3 rounded-md w-full mt-4"></textarea>
            <button class="btn rounded-full text-xl px-10 overflow-hidden py-2 mt-5">Soumettre</button>
        </form>
    </div>

    <!--  Footer  -->
    @include('components.footer')
    <!--  Footer Ends  -->


</body>

<script src="https://kit.fontawesome.com/35b4de642d.js" crossorigin="anonymous"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    // Toggle categories and store height at small device
    document.addEventListener('DOMContentLoaded', function() {
        const toggleHeaders = document.querySelectorAll('.toggle-header');

        if (window.innerWidth < 1025) {
            toggleHeaders.forEach(header => {
                header.addEventListener('click', () => {
                    const content = header.nextElementSibling;
                    const icon = header.querySelector('.toggle-icon');
                    if (content.classList.contains("max-h-0")) {
                        content.classList.replace("max-h-0", "max-h-[500px]");
                        icon.classList.replace('fa-plus', 'fa-minus');
                    } else {
                        content.classList.replace("max-h-[500px]", "max-h-0");
                        icon.classList.replace('fa-minus', 'fa-plus');
                    }
                });
            });
        } else {
            const contents = document.querySelectorAll('.toggle-content');
            contents.forEach(content => {
                content.style.maxHeight = 'none';
            });

            const icons = document.querySelectorAll('.toggle-icon');
            icons.forEach(icon => {
                icon.classList.add('hidden');
            });
        }
    });


    window.onload = function() {
        const toggleButtons = document.querySelectorAll('[id^="toggleButton-"]');

        toggleButtons.forEach(button => {
            button.addEventListener('click', function() {
                const couponId = this.id.split('-')[1];
                const description = document.getElementById(`description-${couponId}`);
                const isCollapsed = description.style.maxHeight === "0px";

                if (isCollapsed) {
                    description.style.maxHeight = description.scrollHeight + "px";
                    this.innerHTML = `<i class="fa-solid fa-chevron-up"></i> Moins d'informations`;
                } else {
                    description.style.maxHeight = "0px";
                    this.innerHTML = `<i class="fa-solid fa-chevron-down"></i> Plus d'informations`;
                }
            });
        });
    }
</script>

</html>