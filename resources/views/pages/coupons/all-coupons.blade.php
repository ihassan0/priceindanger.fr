
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Codes Promo @php
        \Carbon\Carbon::setLocale('fr'); // Set locale to French
        $currentDate = \Carbon\Carbon::now();
        $formattedDate = ucfirst($currentDate->translatedFormat('F Y'));
        @endphp

        {{ $formattedDate }}
        | Priceindanger.fr</title>
         <link rel="icon" href="{{ asset('logos/favicon.png') }}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <!-- Navbar  -->
    @include('components.navbar')
    <!-- Navbar Ends  -->

    <!-- Breadcrums start -->
    @include('components.breadcrums', ['current_page' => "Codes Promo"])
    <!-- Breadcrums end -->

    <main class="container mb-16 mt-10">
        <div class="flex flex-col lg:flex-row gap-3">
            <div class="lg:w-1/4 relative">
                <div class="sticky top-0">

                    <div class="mb-5">
                        <div
                            class="flex items-center justify-between text-[var(--secondary)] border-b lg:border-0 pb-2 cursor-pointer toggle-header">
                            <h3 class="font-semibold sm:text-xl text-lg">Trier par</h3>
                            <i class="fa-solid fa-plus toggle-icon transition-transform duration-300 lg:!hidden"></i>
                        </div>

                        <!-- Filter Options -->
                        <ul
                            class="flex flex-col gap-2 mt-4 transition-all duration-300 overflow-hidden toggle-content max-h-0 lg:max-h-none">
                            <li class="flex items-center gap-2">
                                <input type="checkbox" name="select" id="category-1"
                                    class="cursor-pointer filter-checkbox" data-filter="latest">
                                <label for="category-1"
                                    class="cursor-pointer whitespace-nowrap overflow-hidden">Dernier</label>
                            </li>
                            <li class="flex items-center gap-2">
                                <input type="checkbox" name="select" id="category-2"
                                    class="cursor-pointer filter-checkbox" data-filter="popular">
                                <label for="category-2"
                                    class="cursor-pointer whitespace-nowrap overflow-hidden">Populaire</label>
                            </li>
                            <li class="flex items-center gap-2">
                                <input type="checkbox" name="select" id="category-3"
                                    class="cursor-pointer filter-checkbox" data-filter="event">
                                <label for="category-3" class="cursor-pointer whitespace-nowrap overflow-hidden">Bon
                                    d'évènement</label>
                            </li>
                            <li class="flex items-center gap-2">
                                <input type="checkbox" name="select" id="category-4"
                                    class="cursor-pointer filter-checkbox" data-filter="all">
                                <label for="category-4" class="cursor-pointer whitespace-nowrap overflow-hidden">Tous</label>
                            </li>
                        </ul>
                    </div>

                    <div class="mb-5">
                        <div
                            class="flex items-center justify-between text-[var(--secondary)] border-b lg:border-0 pb-2 cursor-pointer toggle-header">
                            <h3 class="font-semibold sm:text-xl text-lg">Principales catégories</h3>
                            <i class="fa-solid fa-plus toggle-icon transition-transform duration-300 lg:!hidden"></i>
                        </div>

                        <!-- List -->
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
            </div>

            <div class="lg:w-3/4">
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 md:gap-y-7 md:gap-x-4 gap-4"
                    id="coupon-container">
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
        document.addEventListener('DOMContentLoaded', function () {
    const checkboxes = document.querySelectorAll('.filter-checkbox');

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            // Collect all selected filters
            const selectedFilters = Array.from(checkboxes)
                .filter(checkbox => checkbox.checked)
                .map(checkbox => checkbox.dataset.filter);

            // Fetch filtered coupons
            fetchFilteredCoupons(selectedFilters);
        });
    });

    function fetchFilteredCoupons(filters) {
        const currentEndpoint = window.location.pathname;
        fetch('{{ route("filter.coupons") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ filters,currentEndpoint  })
        })
        .then(response => response.json())
        .then(data => {
            const couponContainer = document.getElementById('coupon-container');

            // Update the coupon container with the server-rendered HTML
            couponContainer.innerHTML = data.html;

            // Reset all checkboxes and reapply the correct checked state
            checkboxes.forEach(checkbox => {
                checkbox.checked = data.filters.includes(checkbox.dataset.filter);
            });
        })
        .catch(error => console.error('Error fetching coupons:', error));
    }
});



    </script>

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
                content.classList.add("max-h-0");
            });
        }
    });
    </script>
</body>

</html>