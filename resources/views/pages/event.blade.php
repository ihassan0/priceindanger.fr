<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Navbar</title>
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
        <img src="{{ url('storage/' . $event->image) }}" class="w-full h-[45dvh] object-cover">
    </div>


    <!-- Description   -->
    <div class="relative -mt-16">
        <p class="md:w-[60%] w-[95%] mx-auto bg-white p-4 shadow-xl rounded-sm" style="left: calc(50% - 30%);">{{ $event->description }}</p>
    </div>

    <main class="container my-20">
        <div class="flex flex-col lg:flex-row gap-3">
            <div class="lg:w-1/4 relative">
                <div class="sticky top-0">
                    <h3 class="font-semibold text-xl">Top-Kategorien</h3>
                    <ul class="flex flex-col gap-2 mt-4">
                        <li class="text-sm">
                            <a href="#"><i class="fa-solid fa-chevron-right mr-1 text-xs"></i> Électronique</a>
                        </li>
                        <li class="text-sm">
                            <a href="#"><i class="fa-solid fa-chevron-right mr-1 text-xs"></i> Voyage</a>
                        </li>
                        <li class="text-sm">
                            <a href="#"><i class="fa-solid fa-chevron-right mr-1 text-xs"></i> Maison et jardin</a>
                        </li>
                        <li class="text-sm">
                            <a href="#"><i class="fa-solid fa-chevron-right mr-1 text-xs"></i> Mode</a>
                        </li>
                        <li class="text-sm">
                            <a href="#"><i class="fa-solid fa-chevron-right mr-1 text-xs"></i> Beauté et soins de la peau</a>
                        </li>
                        <li class="text-sm">
                            <a href="#"><i class="fa-solid fa-chevron-right mr-1 text-xs"></i> Grand magasin</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="lg:w-3/4">
                <div class="flex items-center gap-3 overflow-auto">
                    <button class="active border border-[var(--secondary)] uppercase px-7 py-2 rounded-md text-sm whitespace-nowrap hover:bg-[var(--secondary)] hover:text-white transition-all duration-300">All (34)</button>
                    <button class="border border-[var(--secondary)] uppercase px-7 py-2 rounded-md text-sm whitespace-nowrap hover:bg-[var(--secondary)] hover:text-white transition-all duration-300">Guteschein (18)</button>
                    <button class="border border-[var(--secondary)] uppercase px-7 py-2 rounded-md text-sm whitespace-nowrap hover:bg-[var(--secondary)] hover:text-white transition-all duration-300">Angebote (16)</button>
                    <button class="border border-[var(--secondary)] uppercase px-7 py-2 rounded-md text-sm whitespace-nowrap hover:bg-[var(--secondary)] hover:text-white transition-all duration-300">Cashback (0)</button>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 md:gap-y-7 md:gap-x-4 gap-4 mt-10">
                    @foreach ($event->coupons as $coupon)
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
    const dropdownButton = document.getElementById('dropdownButton');
    const dropdownList = document.getElementById('dropdownList');

    dropdownButton.addEventListener('click', () => {
        dropdownList.classList.toggle('show');
    });
</script>

</html>