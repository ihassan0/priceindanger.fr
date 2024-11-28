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
    @include('components.breadcrums', ['current_page' => "Coupons"])
    <!-- Breadcrums end -->



    <main class="container my-20">
        <div class="flex flex-col lg:flex-row gap-3">
            <div class="lg:w-1/4 relative">
                <div class="sticky top-0">
                    <div class="mb-5">
                        <h3 class="font-semibold text-xl">Trier par</h3>
                        <ul class="flex flex-col gap-2 mt-4">
                            <li class="flex items-center gap-2">
                                <input type="checkbox" name="select" id="category-1" class="cursor-pointer">
                                <label for="category-1" class="cursor-pointer whitespace-nowrap overflow-hidden">Dernier</label>
                            </li>
                            <li class="flex items-center gap-2">
                                <input type="checkbox" name="select" id="category-2" class="cursor-pointer">
                                <label for="category-2" class="cursor-pointer whitespace-nowrap overflow-hidden">Populaire</label>
                            </li>
                            <li class="flex items-center gap-2">
                                <input type="checkbox" name="select" id="category-3" class="cursor-pointer">
                                <label for="category-3" class="cursor-pointer whitespace-nowrap overflow-hidden">Bon d'évènement</label>
                            </li>
                            <li class="flex items-center gap-2">
                                <input type="checkbox" name="select" id="category-4" class="cursor-pointer">
                                <label for="category-4" class="cursor-pointer whitespace-nowrap overflow-hidden">Tous les bons</label>
                            </li>
                        </ul>
                    </div>
                    <div class="mb-5">
                        <h3 class="font-semibold text-xl">Top-Kategorien</h3>
                        <ul class="flex flex-col gap-2 mt-4">
                            @foreach($topCategories as $topcat)
                            <li>
                                <a href="#"><i class="fa-solid fa-chevron-right mr-1 text-xs"></i> {{ $topcat->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>


            <div class="lg:w-3/4">
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


    <script src="https://kit.fontawesome.com/35b4de642d.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        const categoryDropdownButton = document.getElementById('categoryDropdownButton');
        const categoryDropdownList = document.getElementById('categoryDropdownList');

        categoryDropdownButton.addEventListener('click', () => {
            categoryDropdownList.classList.toggle('show');
        });
    </script>
</body>


</html>