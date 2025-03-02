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
    @include('components.breadcrums', ['current_page' => $category->name])
    <!-- Breadcrums end -->



    <main class="container md:my-16 my-5">
        <div class="flex flex-col lg:flex-row gap-3">
            <div class="lg:w-1/4 relative">
                <div class="sticky top-0">
                    <div class="md:mb-6">
                        <div
                            class="flex items-center justify-between text-[var(--secondary)] border-b lg:border-0 pb-2 cursor-pointer toggle-header">
                            <h3 class="font-semibold sm:text-xl text-lg">Top-Kategorien</h3>
                            <i class="fa-solid fa-plus toggle-icon transition-transform duration-300 lg:!hidden"></i>
                        </div>

                        <!-- Categories List -->
                        <ul
                            class="flex flex-col gap-2 mt-4 transition-all duration-300 overflow-hidden toggle-content max-h-0 lg:max-h-none">
                            @foreach ($topCategories as $topcat)
                            <li>
                                <a href="#" class="md:text-[17px]"><i class="fa-solid fa-chevron-right mr-1 text-xs"></i> {{ $topcat->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>


            <div class="lg:w-3/4">
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

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 md:gap-y-7 md:gap-x-4 gap-4 mt-10">
                    @foreach ($category->coupons as $coupon)
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
        // const categoryDropdownButton = document.getElementById('categoryDropdownButton');
        // const categoryDropdownList = document.getElementById('categoryDropdownList');

        // categoryDropdownButton.addEventListener('click', () => {
        //     categoryDropdownList.classList.toggle('show');
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
</body>


</html>