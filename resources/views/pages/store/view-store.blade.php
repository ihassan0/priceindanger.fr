<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Codes Promo {{ $store->name }} | {{ $discount }}
        @php
        \Carbon\Carbon::setLocale('fr'); // Set locale to French
        $currentDate = \Carbon\Carbon::now();
        $formattedDate = ucfirst($currentDate->translatedFormat('F Y'));
        @endphp

        {{ $formattedDate }}
    </title>
    <link rel="icon" href="{{ asset('logos/favicon.png') }}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>

<body>
    <!-- Navbar  -->
    @include('components.navbar')
    <!-- Navbar Ends  -->


    <!-- Breadcrums start -->
   <section class="bg-[#F7F8FB]">
        <div class="container sm:flex items-center justify-between py-4">
            <h1 class="lg:text-3xl text-xl font-bold text-[#002654]">Codes Promo {{ $store->name }} | {{ $formattedDate  
                }}  </h1>
            <span class="flex items-center mt-2 sm:mt-0">
                <a href="/">
                    <p>Heim</p>
                </a>
                <i class="fa-solid fa-chevron-right mx-2 text-xs text-[#6c757d]"></i>
                <p class="text-[#6c757d]">{{$store->name}}</p>
            </span>
        </div>
    </section>
    <!-- Breadcrums end -->

    <main class="container mt-10 mb-16">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Review , Shops, Categories -->
            <div class="lg:w-1/4 relative order-2 lg:order-1">
                <!-- ratings -->
                <div class="mb-6">
                    <a href="{{$store->url}}" target="_blank" class="w-full block rounded-lg mb-5 overflow-hidden p-4"
                        style="box-shadow:0px 0px 16px rgb(0 0 0 / 13%);">
                        <img src="{{ asset('storage/'. $store->logo) }}"
                            class="w-full mx-auto h-[120px] object-cover scale-100 hover:scale-[1.1] transition-all duration-500">
                    </a>
                    <p class="pt-5 border-t text-[20px] font-bold">{{ $store->name }}
                    </p>
                    <div class="mt-5">
                        @if ($totalRatings > 0)
                        <p>Évaluation: {{ number_format($averageRating, 1) }} sur 5</p>
                        <p class="mt-3">Notes globales: {{ $totalRatings }}</p>
                        @else
                        <p>Évaluation: Pas encore évalué</p>
                        @endif
                    </div>
                    <div id="stars" class="flex flex-row-reverse justify-end gap-2 my-6">
                        @for ($i = 5; $i >= 1; $i--)
                        <i data-value="{{ $i }}"
                            class="fa-solid fa-star text-[#CCCCCC] text-lg cursor-pointer  @if ($userRating && $userRating->rating >= $i) text-yellow-500 @endif"></i>
                        @endfor
                    </div>

                    <button class="btn py-3 px-5 rounded-full overflow-hidden" @if ($userRating) style="display: none;"
                        @endif id="submitRating">Donner une
                        évaluation</button>

                    <!-- Hidden message for already rated users -->
                    <p id="ratingMessage" class="text-green-500 hidden">
                        Vous avez déjà évalué ce magasin !
                    </p>
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
                        @foreach ($relevantStores->take(6) as $shop )
                             <li class="flex items-center gap-2 min-w-[200px] whitespace-nowrap">
        <i class="fa-solid fa-chevron-right text-xs w-4 text-center"></i> 
        <a href="{{ route('storeView',['id' => $shop->id,  'name' => Str::slug($shop->name).'-codes-promo'])}}"> {{$shop->name }}</a>
    </li>
                        @endforeach
                    </ul>
                </div>
                <!-- Categories -->
                <div class="mb-6">
                    <div
                        class="flex items-center justify-between text-[var(--secondary)] border-b lg:border-0 pb-2 cursor-pointer toggle-header ">
                        <h3 class="font-semibold sm:text-xl text-lg">Principales catégories</h3>
                        <i class="fa-solid fa-plus toggle-icon transition-transform duration-300 lg:!hidden"></i>
                    </div>

                    <!-- Categories List -->
                     <ul
    class="flex flex-col gap-2 mt-4 transition-all duration-300 overflow-hidden toggle-content max-h-0 lg:max-h-none">
    @foreach($topCategories as $topcat)
    <li class="flex items-center gap-2 min-w-[200px] whitespace-nowrap">
        <i class="fa-solid fa-chevron-right text-xs w-4 text-center"></i> 
        <a href="{{ route('categoryView', $topcat->id)}}">{{ $topcat->name }}</a>
    </li>
    @endforeach
</ul>
                </div>

            </div>

            <!-- Buttons , Coupons -->
            <div class="lg:w-3/4 order-1 lg:order-2">
                <!-- Buttons -->
                <div class="flex items-center md:gap-3 gap-1 overflow-auto no-scrollbar">
                    <a href="{{ route('storeView', ['id' => $store->id,  'name' => Str::slug($store->name).'-codes-promo', 'filter' => 'all']) }}"> <button class="border border-[var(--secondary)] uppercase md:px-3 px-2 sm:py-2 py-1 rounded-md
                            text-xs
                            sm:text-sm whitespace-nowrap hover:bg-[var(--secondary)] hover:text-white transition-all
                            duration-300 {{ $filter === 'all' ? 'bg-[var(--secondary)] text-white' : 'text-black' }}">
                            Tous ({{ $allCouponsCount }}) </button>
                    </a>

                    <a href="{{ route('storeView', ['id' => $store->id, 'name' => Str::slug($store->name).'-codes-promo', 'filter' => 'guteschein']) }}">
                        <button
                            class="uppercase md:px-3 px-2 sm:py-2 py-1 rounded-md text-xs sm:text-sm whitespace-nowrap border border-[var(--secondary)] hover:bg-[var(--secondary)] hover:text-white transition-all duration-300 {{ $filter === 'guteschein' ? 'bg-[var(--secondary)] text-white' : 'text-black' }}">
                            Codes ({{ $gutescheinCount }})</button>
                    </a>

                    <a href="{{ route('storeView', ['id' => $store->id,  'name' => Str::slug($store->name).'-codes-promo','filter' => 'angebote']) }}">
                        <button
                            class="uppercase md:px-3 px-2 sm:py-2 py-1 rounded-md text-xs sm:text-sm whitespace-nowrap border border-[var(--secondary)] hover:bg-[var(--secondary)] hover:text-white transition-all duration-300 {{ $filter === 'angebote' ? 'bg-[var(--secondary)] text-white' : 'text-black' }}">
                            Offres ({{ $angeboteCount }}) </button>
                    </a>

                    <a href="{{ route('storeView', ['id' => $store->id,  'name' => Str::slug($store->name).'-codes-promo','filter' => 'cashback']) }}">
                        <button 
                        class="uppercase md:px-3 px-2 sm:py-2 py-1 rounded-md text-xs sm:text-sm whitespace-nowrap border border-[var(--secondary)] hover:bg-[var(--secondary)] hover:text-white transition-all duration-300 {{ $filter === 'cashback' ? 'bg-[var(--secondary)] text-white' : 'text-black' }}">
                        Cashback ({{$cashbackCount}}) </button>
                    </a>
                </div>



                <!-- Coupons -->
                <div class="sm:mt-10 mt-5">
                    @foreach ($coupons as $coupon)
                    <div>
                        <div
                            class="flex flex-col md:flex-row items-center gap-3 border-b transition duration-200 py-4 relative ">
                            <div class="mb-4 h-fit w-[30%] md:block hidden cursor-pointer" onclick="document.getElementById('couponModal-{{ $coupon->id }}').click();">
                                <p class="flex items-center justify-center w-full text-center p-3 text-pretty overflow-hidden sm:min-h-[80px] h-auto h-[80px] font-semibold text-[var(--secondary)] bg-[#00265450] md:bg-transparent rounded-md border-2 md:border-0 border-[var(--secondary)]"
                                    style="font-size: clamp(24px ,50%, 35px ); line-height: 1.2;">
                                    @foreach(explode(' ', $coupon->discount) as $word)
            @if(strlen($word) >= 3)
                {{ $word }} <br>
            @else
                {{ $word }}
            @endif
        @endforeach
                                </p>
                            </div>

                           @if ($coupon->exclusive_coupons == 1)
    <div class="text-end absolute right-0 top-[5px]">
        <span class="bg-[var(--primary)] text-white text-[10px] sm:text-xs shadow-lg rounded-l-full px-2 sm:px-3 py-0.5 sm:py-1 ml-auto">
            Exclusif
        </span>
    </div>
@endif

                            <div class="sm:p-3 pt-3  flex-1 w-full">
                                <div class="flex  gap-4">
                                    <div class="w-[35%] min-h-[51px] md:hidden">
                                        <p
                                            class="flex items-center justify-center p-1 text-[13px] text-center h-auto text-pretty overflow-hidden font-semibold text-[var(--secondary)] bg-[#0026541A] rounded-sm border-2 border-[var(--secondary)] ">
                                            {{$coupon->discount}}
                                        </p>
                                    </div>
                                    <div class="w-full">
                                        <h3 class="md:text-[24px] text-lg  font-semibold cursor-pointer" onclick="document.getElementById('couponModal-{{ $coupon->id }}').click();">{{ $coupon->name }}</h3>

                                        <div class="description-content transition-all duration-300 lg:block hidden mt-2">
                                            <p class="w-[80%] text-[16px]" style="color:black;">{{$coupon->description}}</p>
                                        </div>
                                        <!-- Description -->
                                        <div class="lg:hidden">
                                            <div id="description-{{ $coupon->id }}"
                                                class="description-content transition-all duration-300"
                                                style="max-height: 0; overflow: hidden;">
                                                <p class="text-sm" style="color:black;">{{$coupon->description}}</p>
                                            </div>
                                            <button id="toggleButton-{{ $coupon->id }}"
                                                class="p-0 text-[12px] sm:text-sm" style="color: #DA3737;"><i
                                                    class="fa-solid fa-chevron-down"></i> Plus d'informations</button>
                                        </div>
                                    </div>
                                </div>

                                <p class="mt-3 text-sm text-black md:block hidden"><span>Date d'expiration :</span></p>
                                <div
                                    class="flex gap-1 items-center justify-end md:justify-start mt-[0.4rem] text-gray-500 text-sm sm:text-base">
                                    <i class="far fa-calendar-alt mr-1 text-[var(--secondary)]"></i>{{
                                    $coupon->expire_date?$coupon->expire_date : "Pas de date d'expiration" }}
                                </div>

                                <button onclick="buttonClick('{{ $coupon->id }}', '{{ $coupon->code }}', this);"
                                    class="btn w-full md:w-auto px-10 py-3 overflow-hidden md:rounded-full rounded-lg mt-4 md:text-sm text-xs"
                                    data-subtitle="{{ $coupon->description }}" data-code="{{ $coupon->code }}" data-url="{{ $coupon->redirect_url ?: $coupon->store->url }}"
                                    data-store-link="{{ route('storeView',[$coupon->store->id,   'name' => Str::slug($store->name).'-codes-promo']) }}"
                                    id="couponModal-{{ $coupon->id }}">
                                    @if($coupon->code !==null) Afficher le code @else Afficher l'offre @endif
                                </button>
                            </div>
                        </div>


                    </div>
                    <a href="{{ $coupon->store->url }}" hidden id="open-store-{{ $coupon->id }}" target="_self"></a>

                    @include('components.modal')
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Table -->
        <div class="w-full rounded-md sm:p-7 p-4 mt-10" style="box-shadow: rgba(0,0,0,0.4) 0px 0px 10px;">
            <h2 class="text-xl md:text-3xl font-semibold mb-2">Meilleurs Codes Promo et Réductions {{ $store->name." ".
                $formattedDate }}</h2>
            <div class="mt-4">
                <table class="min-w-full table-auto border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="w-1/5 px-4 py-2 text-left md:text-lg font-semibold text-gray-700">Rabais</th>
                            <th class="w-3/5 px-4 py-2 text-left md:text-lg font-semibold text-gray-700 ">Description
                            </th>
                            <th class="w-1/5 px-4 py-2 text-center md:text-lg font-semibold text-gray-700">Séquence</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($coupons->take(5) as $coupon )
                        <tr>
                            <td class="px-4 py-2 text-xs md:text-base text-gray-800">{{ $coupon->discount }}</td>
                            <td class="px-4 py-2 text-xs md:text-base text-gray-800 ">{{ $coupon->description }} </td>
                            <td class="px-4 py-2 text-xs md:text-base text-center text-gray-800">{{ $coupon->expire_date
                                }}
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- Description -->
    <section class="bg-[#F7F7F7] my-10">
        <div class="container px-3 py-10">
            <div class="border-b-[1px] border-gray-200 mb-7 pb-5">
                <h1 class="lg:text-[32px] leading-snug text-xl font-bold text-center">Codes Promo et réductions de {{$store->name}} @php
                    echo date("Y"); @endphp
                </h1>
            </div>
            {!! $store->description !!}
        </div>
    </section>
    <!-- Comment -->
 <div class="container mb-10">
    <h3 class="font-semibold text-2xl my-5">Écrivez un commentaire</h3>

    <form action="{{ route('comments.store') }}" method="POST">
        @csrf
        <input type="hidden" name="store_id" value={{$store->id}}> <!-- Replace with dynamic store_id -->
        
        <div class="flex flex-col md:flex-row gap-4">
            <input type="text" name="name" placeholder="Ton Nom"
                class="border border-gray-300 p-3 rounded-md flex-1" required>
            <input type="email" name="email" placeholder="Votre email"
                class="border border-gray-300 p-3 rounded-md flex-1" required>
        </div>
        
        <textarea name="comment" cols="30" placeholder="Votre commentaire"
            class="border border-gray-300 p-3 rounded-md w-full mt-4" required></textarea>
        
        <button type="submit" class="btn rounded-full text-xl px-10 overflow-hidden py-2 mt-5">
            Soumettre
        </button>
    </form>
</div>



<!-- Comments Section -->
<div class="container mb-10"> <!-- Added margin-bottom to create space -->
    <h3 class="font-semibold text-2xl my-5">Commentaires récents</h3>

    @php
        $approvedComments = $store->comments->where('status', 1);
    @endphp

    @if($approvedComments->isEmpty())
        <p class="text-gray-500">Aucun commentaire pour l'instant. Soyez le premier à commenter !</p>
    @else
        <div class="space-y-5">
            @foreach ($approvedComments as $comment)
                <div class="bg-white p-5 rounded-lg shadow-md flex items-start gap-4">
                    <!-- Avatar -->
                    <div class="w-10 h-10 bg-gray-300 flex items-center justify-center rounded-full text-gray-600 font-bold">
                        {{ strtoupper(substr($comment->name, 0, 1)) }}
                    </div>

                    <!-- Comment Content -->
                    <div class="flex-1">
                        <div class="flex justify-between items-center">
                            <h4 class="font-semibold text-md">{{ $comment->name }}</h4>
                            <span class="text-sm text-gray-400">{{ $comment->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="text-gray-700 mt-1">{{ $comment->comment }}</p>
                        <!--<p class="text-sm text-gray-500 mt-1">Posté sur: <span class="font-medium">{{ $comment->store->name }}</span></p>-->
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

<!-- Footer -->
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

        const newTabValue = localStorage.getItem('newTab');
        const couponId = localStorage.getItem('couponId');


        if (newTabValue === '1') {
            const button = document.getElementById(`couponModal-${couponId}`);
            if (button) {
                button.click();
            }
        }
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


<script>
    document.addEventListener('DOMContentLoaded', function () {
    const stars = document.querySelectorAll('#stars i');
    const submitButton = document.getElementById('submitRating');
    const ratingMessage = document.getElementById('ratingMessage');
    let ratingValue = null; // Variable to store the rating value

    // Handle star hover and click
    stars.forEach(star => {
        star.addEventListener('mouseover', function () {
            // Highlight stars on hover
            const value = this.getAttribute('data-value');
            updateStars(value);
        });

        star.addEventListener('click', function () {
            // Store rating value on click, but don't submit yet
            ratingValue = this.getAttribute('data-value');
            updateStars(ratingValue);
        });
    });

    // Update stars UI based on rating
    function updateStars(rating) {
        stars.forEach(star => {
            if (parseInt(star.getAttribute('data-value')) <= parseInt(rating)) {
                star.classList.add('text-yellow-500');
                star.classList.remove('text-[#CCCCCC]');
            } else {
                star.classList.remove('text-yellow-500');
                star.classList.add('text-[#CCCCCC]');
            }
        });
    }


    submitButton.addEventListener('click', function () {
    if (!ratingValue) {
        Swal.fire({
            icon: 'warning',
            title: 'No Rating Selected!',
            text: 'Please select a rating before submitting.',
            confirmButtonText: 'Okay',
            confirmButtonColor: '#3085d6',
        });
        return;
    }

    // AJAX request to submit rating
    fetch('{{ route('store.rate') }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            store_id: {{ $store->id }},
            rating: ratingValue
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Show success message
            Swal.fire({
                icon: 'success',
                title: 'Merci!',
                text: 'Votre évaluation a été soumise.',
                confirmButtonText: 'Fermer',
                confirmButtonColor: '#28a745',
            });

            // Hide the button and show the already-rated message
            submitButton.style.display = 'none';
            ratingMessage.classList.remove('hidden');
            updateStars(ratingValue);
        } else {
            // Show error message
            Swal.fire({
                icon: 'erreur',
                title: 'Oups!',
                text: data.message,
                confirmButtonText: 'Essayer à nouveau',
                confirmButtonColor: '#d33',
            });
        }
    })
    .catch(error => {
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Something went wrong while submitting your rating.',
            confirmButtonText: 'Close',
            confirmButtonColor: '#d33',
        });
        console.error('Error:', error);
    });
});
});




function openCurrentPageInNewTab(couponId, couponCode) {
        localStorage.setItem("couponId", couponId);
        localStorage.setItem("couponCode", couponCode);
        localStorage.setItem("newTab", 1);
        window.open(window.location.href, "_blank");
        document.getElementById(`open-store-${couponId}`).click();
    }


    function buttonClick(couponId, couponCode, data) {
        const newTabValue = localStorage.getItem('newTab');

        if (newTabValue === '1') {
            openModal(data);

        } else {
            localStorage.setItem("couponId", couponId);
            localStorage.setItem("couponCode", couponCode);
            localStorage.setItem("newTab", 1);
            window.open(window.location.href, "_blank");
            document.getElementById(`open-store-${couponId}`).click();

        }
    }


</script>

</html>