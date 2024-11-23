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

    <main class="container my-20">
        <div class="flex flex-col lg:flex-row gap-3">
            <!-- Review , Shops, Categories -->
            <div class="lg:w-1/4 relative">
                <!-- ratings -->
                <div class="mb-6">
                    <img src="{{ asset('storage/'. $store->logo) }}" class="w-2/4 ">
                    <p>Évaluation: 4.3 sur 5</p>
                    <p class="mt-3">Notes globales: 3</p>
                    <div class="flex flex-row-reverse justify-end gap-2 my-6">
                        <i class="fa-solid fa-star text-[#CCCCCC] peer peer-hover:text-yellow-500 hover:text-yellow-500 text-lg cursor-pointer"></i>
                        <i class="fa-solid fa-star text-[#CCCCCC] peer peer-hover:text-yellow-500 hover:text-yellow-500 text-lg cursor-pointer"></i>
                        <i class="fa-solid fa-star text-[#CCCCCC] peer peer-hover:text-yellow-500 hover:text-yellow-500 text-lg cursor-pointer"></i>
                        <i class="fa-solid fa-star text-[#CCCCCC] peer peer-hover:text-yellow-500 hover:text-yellow-500 text-lg cursor-pointer"></i>
                        <i class="fa-solid fa-star text-[#CCCCCC] peer peer-hover:text-yellow-500 hover:text-yellow-500 text-lg cursor-pointer"></i>
                    </div>

                    <button class="btn py-2 px-5 rounded-full overflow-hidden">Donner une évaluation</button>
                </div>
                <!-- Shops -->
                <div class="mb-6">
                    <h3 class="font-semibold text-xl">Magasins similaires</h3>
                    <ul class="flex flex-col gap-2 mt-4">
                        @foreach ($shops->take(6) as $shop )
                        <li class="text-sm">
                            <a href="#" class="md:text-[17px]"><i class="fa-solid fa-chevron-right mr-1 text-xs"></i> {{ $shop->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!-- Categories -->
                <div class="mb-6">
                    <h3 class="font-semibold text-xl">Top-Kategorien</h3>
                    <ul class="flex flex-col gap-2 mt-4">
                        @foreach ($topCategories->take(6) as $category )
                        <li class="text-sm">
                            <a href="#" class="md:text-[17px]"><i class="fa-solid fa-chevron-right mr-1 text-xs"></i> {{ $category->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Buttons , Coupons -->
            <div class="lg:w-3/4">
                <!-- Buttons -->
                <div class="flex items-center gap-3 overflow-auto">
                    <button
                        class="active border border-[var(--secondary)] uppercase md:px-7 px-5 py-2 rounded-md text-sm whitespace-nowrap hover:bg-[var(--secondary)] hover:text-white transition-all duration-300">All
                        (34)</button>
                    <button
                        class="border border-[var(--secondary)] uppercase md:px-7 px-5 py-2 rounded-md text-sm whitespace-nowrap hover:bg-[var(--secondary)] hover:text-white transition-all duration-300">Guteschein
                        (18)</button>
                    <button
                        class="border border-[var(--secondary)] uppercase md:px-7 px-5 py-2 rounded-md text-sm whitespace-nowrap hover:bg-[var(--secondary)] hover:text-white transition-all duration-300">Angebote
                        (16)</button>
                    <button
                        class="border border-[var(--secondary)] uppercase md:px-7 px-5 py-2 rounded-md text-sm whitespace-nowrap hover:bg-[var(--secondary)] hover:text-white transition-all duration-300">Cashback
                        (0)</button>
                </div>
                <!-- Coupons -->
                <div class="mt-10">
                    @foreach ($store->coupons as $coupon)
                    <div>
                        <div class="flex flex-col md:flex-row gap-3 border-b transition duration-200 py-5 relative ">
                            <div class="sm:mb-4 mb-1">
                                <p class="text-2xl md:px-10 md:py-8 font-semibold text-[var(--secondary)] bg-[#00265450] text-center py-3 rounded-md border-2 border-[var(--secondary)]">
                                    {{$coupon->discount}}%
                                </p>
                            </div>

                            @if ($coupon -> exclusive_coupons == 1)
                            <div class="text-end absolute right-0 top-[17px]">
                                <span class="bg-[var(--primary)] text-white text-xs shadow-lg rounded-l-full px-3 py-1 ml-auto">Exclusive</span>
                            </div>
                            @endif
                            <div class="p-3  flex-1">
                                <h3 class="md:text-[22px]  font-semibold ">{{ $coupon->name }}</h3>

                                <div class="description-content transition-all duration-300 lg:block hidden">
                                    <p style="color:black;">{{$coupon->description}}</p>
                                </div>
                                <!-- Description -->
                                <div class="lg:hidden">
                                    <div id="description-{{ $coupon->id }}" class="description-content transition-all duration-300" style="max-height: 0; overflow: hidden;">
                                        <p style="color:black;">{{$coupon->description}}</p>
                                    </div>
                                    <button id="toggleButton-{{ $coupon->id }}" class="p-0 text-[12px] sm:text-sm" style="color: #DA3737;"><i class="fa-solid fa-chevron-down"></i> Plus d'informations</button>
                                </div>

                                <p class="mt-4 text-sm" style="color:black;"><span>Date d'expiration :</span></p>
                                <div class="flex gap-3 items-center mt-2 text-gray-500 text-sm">
                                    <span>Weitere Details</span>
                                    <span class="flex items-center">
                                        <i class="far fa-calendar-alt mr-1"></i>{{ $coupon->expiry_date }}
                                    </span>
                                </div>

                                <button onclick="openModal()"
                                    class="btn px-10 py-2 overflow-hidden rounded-full mt-4 text-sm">
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
        <div class="w-full rounded-md p-7 mt-10" style="box-shadow: rgba(0,0,0,0.4) 0px 0px 10px;">
            <h2 class="text-3xl font-semibold mb-2">Aktuell Apimanu Gutscheincodes Nov 2024</h2>
            <div class="mt-4 overflow-x-auto">
                <table class="min-w-full table-auto border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="w-1/3 px-4 py-2 text-left text-lg font-semibold text-gray-700">Rabatt</th>
                            <th class="w-2/5 px-4 py-2 text-left text-lg font-semibold text-gray-700">Beschreibung</th>
                            <th class="w-1/3 px-4 py-2 text-center text-lg font-semibold text-gray-700">Ablauf</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr>
                            <td class="px-4 py-2 whitespace-nowrap text-gray-800">7-tägiges Rückgaberecht</td>
                            <td class="px-4 py-2 whitespace-nowrap text-gray-800">Sie können Ihre Bestellung innerhalb von 7 Tagen
                                nach Erhalt zurückgeben </td>
                            <td class="px-4 py-2 whitespace-nowrap text-center text-gray-800"></td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 whitespace-nowrap text-gray-800">10% Gutscheincode</td>
                            <td class="px-4 py-2 whitespace-nowrap text-gray-800">10% Rabatt auf alle mit Gutscheincode bei Apimanu
                            </td>
                            <td class="px-4 py-2 whitespace-nowrap text-center text-gray-800">2024-12-31</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Description -->
        <section class="bg-[#F7F7F7] my-10">
            <div class="px-3 py-10">
                {!! $store->description !!}
            </div>
        </section>
        <!-- Comment -->
        <div>
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
    </main>

    <!--  Footer  -->
    @include('components.footer')
    <!--  Footer Ends  -->


</body>

<script src="https://kit.fontawesome.com/35b4de642d.js" crossorigin="anonymous"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    const categoryDropdownButton = document.getElementById('categoryDropdownButton');
    const categoryDropdownList = document.getElementById('categoryDropdownList');

    categoryDropdownButton.addEventListener('click', () => {
        categoryDropdownList.classList.toggle('show');
    });
</script>
<script>
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