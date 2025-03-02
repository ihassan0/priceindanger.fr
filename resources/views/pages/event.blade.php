<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('logos/favicon.png') }}" type="image/x-icon">
    <title>{{$event->title}}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">


    <style>
        .active {
            background-color: var(--secondary);
            color: white;
        }
    </style>
</head>

<body>

    <!-- Navbar  -->
    @include('components.navbar')
    <!-- Navbar Ends  -->


    <!-- Breadcrums start -->
    @include('components.breadcrums', ['current_page' => $event->title])
    <!-- Breadcrums end -->


    <!-- Banner Image  -->
    <div>
        <img src="{{ url('storage/' . $event->image) }}" class="w-full md:h-[45dvh] object-cover">
    </div>


    <!-- Description   -->
    <div class="relative md:-mt-16 -mt-3">
        <p class="md:w-[50%] w-[95%] mx-auto bg-white p-4 shadow-xl rounded-sm text-center"
            style="left: calc(50% - 30%);">{{ $event->description }}</p>
    </div>

    <main class="container md:my-20 my-10">
        <div class="flex flex-col lg:flex-row gap-3">
            <div class="lg:w-1/4 relative">
                <div class="sticky top-0">
                    <div class="sm:mb-6">
                        <div
                            class="flex items-center justify-between text-[var(--secondary)] border-b lg:border-0 pb-2 cursor-pointer toggle-header">
                            <h3 class="font-semibold text-xl">Principales catégories</h3>
                            <i class="fa-solid fa-plus toggle-icon transition-transform duration-300 lg:!hidden"></i>
                        </div>

                        <!-- Categories List -->
                      
                                                           <ul
    class="flex flex-col gap-2 mt-4 transition-all duration-300 overflow-hidden toggle-content max-h-0 lg:max-h-none">
    @foreach($topCategories->take(6) as $topcat)
    <li class="flex items-center gap-2 min-w-[200px] whitespace-nowrap">
        <i class="fa-solid fa-chevron-right text-xs w-4 text-center"></i> 
        <a href="{{ route('categoryView', $topcat->id)}}">{{ $topcat->name }}</a>
    </li>
    @endforeach
</ul>
                    </div>
                </div>
            </div>

            <div class="lg:w-3/4">
                <!-- Buttons -->
                <div class="flex items-center md:gap-3 gap-1 overflow-auto no-scrollbar">
                    <a href="{{ route('event', ['id' => $event->id, 'filter' => 'all']) }}">
                        <button
                            class="border border-[var(--secondary)] uppercase md:px-3 px-2 sm:py-2 py-1 rounded-md text-xs sm:text-sm whitespace-nowrap hover:bg-[var(--secondary)] hover:text-white transition-all duration-300 {{ $filter === 'all' ? 'bg-[var(--secondary)] text-white' : 'text-black' }}">
                            Tous ({{ $allCouponsCount }})
                        </button>
                    </a>

                    <a href="{{ route('event', ['id' => $event->id, 'filter' => 'guteschein']) }}">
                        <button
                            class="border border-[var(--secondary)] uppercase md:px-3 px-2 sm:py-2 py-1 rounded-md text-xs sm:text-sm whitespace-nowrap hover:bg-[var(--secondary)] hover:text-white transition-all duration-300 {{ $filter === 'guteschein' ? 'bg-[var(--secondary)] text-white' : 'text-black' }}">
                            Codes ({{ $gutescheinCount }})
                        </button>
                    </a>

                    <a href="{{ route('event', ['id' => $event->id, 'filter' => 'angebote']) }}">
                        <button
                            class="border border-[var(--secondary)] uppercase md:px-3 px-2 sm:py-2 py-1 rounded-md text-xs sm:text-sm whitespace-nowrap hover:bg-[var(--secondary)] hover:text-white transition-all duration-300 {{ $filter === 'angebote' ? 'bg-[var(--secondary)] text-white' : 'text-black' }}">
                            Offres ({{ $angeboteCount }})
                        </button>
                    </a>

                    <a href="{{ route('event', ['id' => $event->id, 'filter' => 'cashback']) }}">
                    <button
                        class="border border-[var(--secondary)] uppercase md:px-3 px-2 sm:py-2 py-1 rounded-md text-xs sm:text-sm whitespace-nowrap hover:bg-[var(--secondary)] hover:text-white transition-all duration-300 {{ $filter === 'cashback' ? 'bg-[var(--secondary)] text-white' : 'text-black' }}">
                        Cashback ({{$cashbackCount}})
                    </button>
                    </a>
                </div>


                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 md:gap-y-7 md:gap-x-4 gap-4 mt-10">
                    @foreach ($coupons as $coupon)
                    <div>
                        @include('components.couponCard', ['coupon' => $coupon])
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>

    <!-- Footer  -->
    @include('components.footer')
    <!-- Footer Ends -->

</body>

<script src="https://kit.fontawesome.com/35b4de642d.js" crossorigin="anonymous"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    // const dropdownButton = document.getElementById('dropdownButton');
    // const dropdownList = document.getElementById('dropdownList');

    // dropdownButton.addEventListener('click', () => {
    //     dropdownList.classList.toggle('show');
    // });

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
</script>

</html>