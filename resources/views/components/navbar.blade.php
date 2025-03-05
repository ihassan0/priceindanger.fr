<nav>

    <div class="container  mx-auto md:flex items-center justify-between md:gap-16 gap-8 md:px-5 px-3 py-5">

        <!--Logo -->
        <div class="flex items-center justify-between">
            <a href="/">
                <img src="{{url('logos/priceindanger.webp')}}" class="sm:w-[230px] w-[128px]" />
            </a>
            <div class="relative">
                <div id="languageToggle"
                    class="items-center border-l-2 md:pl-10 pl-5 gap-3 cursor-pointer flex md:hidden">
                    <img src="https://cdn.britannica.com/82/682-004-F0B47FCB/Flag-France.jpg" alt="French Flag"
                        class="w-[32px]">
                    <p class="font-semibold text-[#333]">French &nbsp;<i class="fa-solid fa-caret-down"></i></p>
                </div>
                <div id="dropdownMenu" class="absolute left-0 mt-2 bg-white shadow-md rounded-lg w-36 z-50 hidden">
                    <a href="https://priceindanger.com/" target="_blank"
                        class="flex items-center gap-3 p-2 hover:bg-gray-100">
                        <img src="https://upload.wikimedia.org/wikipedia/en/b/ba/Flag_of_Germany.svg" alt="German Flag"
                            class="w-[32px]">
                        <span>German</span>
                    </a>
                </div>
            </div>
        </div>

        <!--Search -->
        <div class="flex-1 relative h-12 my-4 hidden lg:block">
            <input type="text"
                class="border border-1 rounded-sm w-full h-full p-3 focus-visible:outline-none text-sm search-bar"
                id="search-bar" placeholder="Trouvez des codes promo et des offres de vos marques préférées">
            <i class="fa-solid fa-magnifying-glass absolute right-3 top-[30%] bg-white pl-3"></i>

            <!--Suggestions Dropdown -->
            <ul id="suggestions"
                class="suggestions absolute bg-white w-full hidden mt-1 overflow-auto text-sm z-10 rounded-sm">
            </ul>
        </div>

        @if (Request::is('/'))
        <!--Search -->
        <div class="flex-1 relative h-12 my-4 lg:hidden">
            <input type="text"
                class="border border-1 rounded-sm w-full h-full p-3 focus-visible:outline-none text-sm search-bar"
                id="search-bar" placeholder="Trouvez des codes promo et des offres de vos marques préférées">
            <i class="fa-solid fa-magnifying-glass absolute right-3 top-[30%] bg-white pl-3"></i>

            <!--Suggestions Dropdown -->
            <ul id="suggestions"
                class="suggestions absolute bg-white w-full hidden mt-1 overflow-auto text-sm z-10 rounded-sm">
            </ul>
        </div>
        @endif

        <!--Flag -->
        <div class="relative">
            <!--Main Flag Section -->
            <div onclick="toggleDropdown()"
                class="items-center border-l-2 md:pl-10 pl-5 gap-3 cursor-pointer hidden md:flex">
                <img src="https://cdn.britannica.com/82/682-004-F0B47FCB/Flag-France.jpg" alt="French Flag"
                    class="w-[32px]">
                <p class="font-semibold text-[#333]">French &nbsp;<i class="fa-solid fa-caret-down"></i></p>
            </div>

            <!--Dropdown with German Flag -->
            <ul id="languageDropdown" class="absolute left-0 top-12 bg-white shadow-md rounded-md w-48 hidden">
                <li class="flex items-center gap-3 p-2 hover:bg-gray-100">
                    <a href="https://priceindanger.com/" target="_blank" class="flex items-center gap-3 w-full">
                        <img src="https://upload.wikimedia.org/wikipedia/en/b/ba/Flag_of_Germany.svg" alt="German Flag"
                            class="w-[24px]">
                        <span>German</span>
                    </a>
                </li>
            </ul>
        </div>

    </div>


    <!--Desktop Navigation  -->

    <section class="bg-[var(--secondary)] bg-[url('https://imgde.shoppingspout.de/event_images/womenday-theme3XioVnArrkK-hbg_img.png')] bg-no-repeat bg-center bg-cover hidden lg:block">
        <ul class="text-white flex items-center justify-center xl:gap-5 gap-3">
            <!--Categories Menus -->
            @if (Request::is('/'))
            <li class="bg-[var(--primary)] p-5 cursor-pointer relative w-60">
                <span class="uppercase text-[16px] font-medium">
                    <i class="fa-solid fa-bars mr-2"></i>
                    Catégories
                </span>

                <!--Menus -->
                <ul class="absolute left-0 bg-white top-16 text-black w-full shadow-lg list rounded-b-md">
                    @foreach ($categories as $category)
                    <li class="p-[11px] text-sm text-[#292b2c]"><a href="{{ route('categoryView', $category->id)}}"
                            class="whitespace-nowrap text-ellipsis overflow-hidden w-full block">
                            {{ $category->name }} </a></li>
                    @endforeach
                    <li class="p-[10px] text-[var(--primary)] border-t-[1px] border-gray-300">
                        <a href="{{ route('allCategories') }}">
                            <div class="flex items-center justify-between"> Plus de catégories <i
                                    class="fa-solid fa-plus"></i> </div>
                        </a>
                    </li>
                </ul>
                <style>
                    .list li:nth-child(even) {
                        background-color: #F9F9F9;
                    }
                </style>

            </li>
            @endif

            <!--Navigation Menus -->
            <li class="py-5  whitespace-nowrap text-center"><a href="/" class="!text-white">Maison</a></li>
            <li class="py-5  whitespace-nowrap text-center"><a href="{{ route('allCategories') }}"
                    class="!text-white">Catégories</a></li>
            <li class="py-5  whitespace-nowrap text-center"><a href="{{ route('allStores') }}"
                    class="!text-white">Magasins</a></li>
            <!--Dropdown -->
            <li class="group relative cursor-pointer">
                <!--Button -->
                <span class="block   whitespace-nowrap text-center">
                    <a class="menu-hover !text-white">
                        Occasions spéciales
                    </a>
                    <i class="fa-solid fa-caret-down text-xs"></i>
                </span>

                <!--Dropdown List  -->

                <ul
                    class="bg-[var(--secondary)] rounded-[3px] p-2 absolute top-9 z-50 transition-all duration-200 opacity-0 translate-y-7 group-hover:opacity-100 group-hover:translate-y-0 delayed-invisible">
                    <li>
                        @foreach ($events as $event)
                        <a class="whitespace-nowrap text-sm p-2 block border-b border-gray-600 !text-white"
                            href="{{ route('event', $event->id) }}">
                            {{ $event->title }}
                        </a>
                        @endforeach
                    </li>
                </ul>
            </li>
            <li class="py-5  whitespace-nowrap text-center"><a href="{{ route('allCoupons') }}"
                    class="!text-white">Codes Promo</a></li>
            <li class="py-5 whitespace-nowrap text-center"><a href="{{ route('allOffres') }}"
                    class="!text-white">Offres de reduction</a>
            </li>
            <li class="py-5  whitespace-nowrap text-center"><a href="{{ route('allBlogs') }}"
                    class="!text-white">Blogs</a></li>
            <li class="openModal py-5 whitespace-nowrap text-center cursor-pointer"><a
                    class="!text-white">Submit Code</a></li>
        </ul>
    </section>


    <!--Mobile Navigation  -->

    <section class="bg-[var(--secondary)] bg-[url('https://imgde.shoppingspout.de/event_images/womenday-theme3XioVnArrkK-hbg_img.png')] bg-no-repeat bg-center bg-cover text-white lg:hidden">

        <!--Buttons to Open the Drawers -->
        <div class="flex justify-between items-center sm:mx-16 mx-6 relative">
            @if (Request::is('/'))
            <button id="openCategories">
                <span class="bg-[var(--primary)] p-4 cursor-pointer relative sm:w-60 w-fit block">
                    <i class="fa-solid fa-bars mr-2"></i>
                    Catégories
                </span>
            </button>
            @else
            <button id="toggle-search">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
            </button>

            <div id="search-container"
                class="w-full absolute my-4 top-7 max-h-0 overflow-hidden transition-all duration-300">
                <input type="text"
                    class="text-black border border-1 rounded-sm w-full h-12 p-3 focus-visible:outline-none text-sm search-bar"
                    id="search-bar" placeholder="Trouvez des codes promo et des offres de vos marques préférées">
                <i class="fa-solid fa-magnifying-glass absolute right-3 top-[30%] bg-white pl-3"></i>

                <!-- Suggestions Dropdown -->
                <ul id="suggestions"
                    class="suggestions absolute bg-white w-full hidden mt-1 overflow-auto text-sm z-10 rounded-sm"></ul>
            </div>
            @endif

            <button id="openMenus" class="p-4 ml-auto" onclick="openRightDrawer()">Menu <i
                    class="fa-solid fa-bars ml-2"></i></button>
        </div>


        @if (Request::is('/'))
        <!--Categories Drawer Overlay and Drawer -->
        <div id="categoriesOverlay" class="fixed inset-0 z-10 bg-black bg-opacity-50 hidden"></div>
        <div id="categoriesDrawer"
            class="fixed left-0 top-0 z-50 h-full w-64 bg-white shadow-lg transform -translate-x-full transition-transform duration-300">
            <ul class="bg-white text-black w-full list">
                @foreach ($categories as $category)
                <li class="text-sm p-4 text-[#292b2c]"><a href="{{ route('categoryView', $category->id)}}"
                        class="whitespace-nowrap text-ellipsis overflow-hidden w-full block"> {{ $category->name }}
                    </a></li>
                @endforeach
                <li class="p-[10px] text-[var(--primary)] border-t-[1px] border-gray-300 ">
                    <a href="{{ route('allCategories') }}">
                        <div class="flex items-center justify-between"> Plus de catégories <i
                                class="fa-solid fa-plus"></i> </div>
                    </a>
                </li>
            </ul>
        </div>
        @endif

        <!--Menus Drawer Overlay and Drawer -->
        <div id="menuOverlay" class="fixed inset-0 z-10 bg-black bg-opacity-50 hidden" onclick="closeRightDrawer()">
        </div>
        <div id="menuDrawer"
            class="fixed right-0 top-0 z-20 h-full w-64 bg-white shadow-lg transform translate-x-full transition-transform duration-300">

            <div class="bg-[var(--secondary)] h-full">
                <ul>
                    <li class="p-3 py-4 text-sm font-medium"><a href="/" class="!text-white">Maison</a></li>
                    <li class="p-3 py-4 text-sm font-medium"><a href="{{ route('allCategories') }}"
                            class="!text-white">Catégories</a></li>
                    <li class="p-3 py-4 text-sm font-medium"><a href="{{ route('allStores') }}"
                            class="!text-white">Magasins</a></li>
                    <!--Dropdown -->
                    <li class="group relative cursor-pointer ">
                        <!--Button -->
                        <span
                            class="flex items-center justify-between p-3 py-4 text-sm font-medium text-white toggle-header">
                            Occasions spéciales
                            <i class="fa-solid fa-caret-down text-xs"></i>
                        </span>

                        <!--Dropdown List  -->

                        <ul class="max-h-0 ml-3 overflow-hidden transition-all duration-300 ease-in-out">
                            <li>
                                @foreach ($events as $event)
                                <a href="{{ route('event', $event->id) }}"
                                    class="whitespace-nowrap text-sm p-2 block border-b border-gray-600 !text-white">
                                    {{ $event->title }}
                                </a>
                                @endforeach
                            </li>
                        </ul>
                    </li>
                    <li class="p-3 py-4 text-sm font-medium"><a href="{{ route('allCoupons') }}"
                            class="!text-white">Codes Promo</a></li>
                    <li class="p-3 py-4 text-sm font-medium"><a href="{{ route('allOffres') }}"
                            class="!text-white">Offres de reduction</a></li>
                    <li class="p-3 py-4 text-sm font-medium"><a href="{{ route('allBlogs') }}"
                            class="!text-white">Blogs</a></li>
                    <li class="openModal p-3 py-4 text-sm font-medium cursor-pointer"><a
                            class="!text-white">Submit Code</a></li>

                </ul>
            </div>
        </div>
    </section>


</nav>

<!-- Modal Container -->
<div id="modal" class="z-20 fixed inset-0 flex items-center justify-center hidden bg-black bg-opacity-50 transition-opacity duration-300">
    <div id="modalContent" class="bg-white min-w-[30%] overflow-hidden rounded-lg shadow-lg transform scale-95 transition-transform duration-300">
        <div class="submit-box w-content mx-auto">
            <h1 class="text-2xl text-white py-3 font-medium poppins text-center bg-[var(--primary)]">Want to submit a code?</h1>
            <div class="mt-5 relative p-6">
                <img class="absolute w-3/4 h-full object-contain z-[-1] -translate-x-2/4 left-2/4 opacity-10" alt="" src="{{url('logos/favicon.png')}}">
                <label class="opacity-60">Website*</label>
                <div class="input-wrapper">
                    <input type="text" class="border border-[#00000080] bg-transparent rounded-sm w-full py-1 px-3 focus-visible:outline-none" placeholder="E.g. Amazon.com">
                </div>
                <form id="submit-code-form">
                    <div class="mt-4">
                        <label class="opacity-60">Coupon code*</label>
                        <div class="input-wrapper">
                            <input type="text" name="coupon" class="border border-[#00000080] bg-transparent rounded-sm w-full py-1 px-3 focus-visible:outline-none" placeholder="E.g. SAVE10">
                        </div>
                    </div>
                    <div class="mt-4">
                        <label class="opacity-60">Describe the offer*</label>
                        <div class="input-wrapper">
                            <textarea name="description" class="border border-[#00000080] bg-transparent rounded-sm w-full py-1 px-3 focus-visible:outline-none" placeholder="E.g. 10% off all dog treats, excluding cat toys" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="mt-4">
                        <label class="opacity-60">Expiration date (optional)</label>
                        <div class="input-wrapper">
                            <input type="date" id="exp-date" name="expirationDate" class="border border-[#00000080] bg-transparent rounded-sm w-full py-1 px-3 focus-visible:outline-none" placeholder="Pick date">
                        </div>
                    </div>
                    <p class="text-sm opacity-50 mt-4">*Indicates required</p>
                    <div class="text-center mt-3">
                        <button class="btn rounded-full overflow-hidden mx-auto py-2 px-8">Submit code</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<script>
    // document.addEventListener('DOMContentLoaded', () => {
    // Categories Drawer
    const openCategories = document.getElementById('openCategories');
    const categoriesDrawer = document.getElementById('categoriesDrawer');
    const categoriesOverlay = document.getElementById('categoriesOverlay');

    // Menus Drawer
    const openMenus = document.getElementById('openMenus');
    const menuDrawer = document.getElementById('menuDrawer');
    const menuOverlay = document.getElementById('menuOverlay');

    const openLeftDrawer = () => {
        categoriesDrawer.classList.remove('-translate-x-full');
        categoriesOverlay.classList.remove('hidden');
    };

    const closeLeftDrawer = () => {
        categoriesDrawer.classList.add('-translate-x-full');
        categoriesOverlay.classList.add('hidden');
    };

    const openRightDrawer = () => {
        menuDrawer.classList.remove('translate-x-full');
        menuOverlay.classList.remove('hidden');
    };

    const closeRightDrawer = () => {
        menuDrawer.classList.add('translate-x-full');
        menuOverlay.classList.add('hidden');
    };

    // Event listeners for Category Drawer
    openCategories.addEventListener('click', openLeftDrawer);
    categoriesOverlay.addEventListener('click', closeLeftDrawer);

    // Event listeners for Menu Drawer
    openMenus.addEventListener('click', openRightDrawer);
    menuOverlay.addEventListener('click', closeRightDrawer);

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            closeLeftDrawer();
            closeRightDrawer();
        }
    });
    // const dropdownButton = document.getElementById('dropdownButton');
    // const dropdownList = document.getElementById('dropdownList');

    // dropdownButton.addEventListener('click', () => {
    //     dropdownList.classList.toggle('show');
    // });
    // });


    // Toggle categories and store height at small device
    document.addEventListener('DOMContentLoaded', function() {
        const toggleHeaders = document.querySelectorAll('.toggle-header');

        if (window.innerWidth < 1025) {
            toggleHeaders.forEach(header => {
                header.addEventListener('click', () => {
                    const content = header.nextElementSibling;
                    if (content.classList.contains("max-h-0")) {
                        content.classList.replace("max-h-0", "max-h-[500px]");
                    } else {
                        content.classList.replace("max-h-[500px]", "max-h-0");
                    }
                });
            });
        } else {
            const contents = document.querySelectorAll('.toggle-content');
            contents.forEach(content => {
                content.style.maxHeight = 'none';
            });
        }
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.search-bar').on('input', function() {
            let query = $(this).val();
            if (query.length > 0) {
                $.ajax({
                    url: "{{ route('search.suggestions') }}", // Route for search suggestions
                    method: "GET",
                    data: {
                        q: query
                    },
                    success: function(data) {
                        $('.suggestions').empty().removeClass('hidden');
                        if (data.length) {
                            data.forEach(item => {
                                const storeSlug = item.name.toLowerCase().replace(/\s+/g, '-'); // Converts "My Store Name" to "my-store-name"

                                // Append '-codes-promo' to the slug
                                const fullSlug = `${storeSlug}-codes-promo`;

                                // Generate the URL with ID and store name
                                const routeUrlTemplate = `{{ route('storeView', ['__ID__', '__NAME__']) }}`;

                                const routeUrl = routeUrlTemplate
                                    .replace('__ID__', item.id)
                                    .replace('__NAME__', encodeURIComponent(fullSlug)); // Encode to avoid special characters breaking the URL

                                // Hide suggestions when clicking outside
                                $(document).on('click', function(e) {
                                    if (!$(e.target).closest('.search-bar, .suggestions').length) {
                                        $('.suggestions').addClass('hidden');
                                    }
                                });


                                let searchContainer = $("#search-container");

                                $("#toggle-search").click(function(event) {
                                    event.stopPropagation(); // Prevents click from closing immediately

                                    if (searchContainer.hasClass("max-h-0")) {
                                        searchContainer.removeClass("max-h-0").addClass("max-h-40").css("overflow", "visible").hide().slideDown(300);
                                    } else {
                                        searchContainer.slideUp(300, function() {
                                            searchContainer.removeClass("max-h-40").addClass("max-h-0").css("overflow", "hidden");
                                        });
                                    }
                                });

                                // Close when clicking outside
                                $(document).click(function(event) {
                                    if (!$(event.target).closest("#search-container, #toggle-search").length) {
                                        searchContainer.slideUp(300, function() {
                                            searchContainer.removeClass("max-h-40").addClass("max-h-0").css("overflow", "hidden");
                                        });
                                    }
                                });

                            });
                        }
                    }
                });
            }
        });
    });
</script>

<script>
    document.getElementById("languageToggle").addEventListener("click", function() {
        var dropdown = document.getElementById("dropdownMenu");
        dropdown.classList.toggle("hidden");
    });
</script>


<script>
    function toggleDropdown() {
        const dropdown = document.getElementById("languageDropdown");
        dropdown.classList.toggle("hidden");
    }

    document.addEventListener("click", (e) => {
        const dropdown = document.getElementById("languageDropdown");
        const mainDiv = document.querySelector('.items-center');

        if (!mainDiv.contains(e.target)) {
            dropdown.classList.add("hidden");
        }
    });

    const modal = $("#modal");
    const modalContent = $("#modalContent");

    $(".openModal").click(function() {
        modal.removeClass("hidden");
        setTimeout(() => {
            modal.addClass("opacity-100");
            modalContent.removeClass("scale-95").addClass("scale-100");
        }, 10);
    });

    $("#closeModal").click(function() {
        closeCouponModal();
    });

    modal.click(function(e) {
        if (!modalContent.is(e.target) && modalContent.has(e.target).length === 0) {
            closeCouponModal();
        }
    });

    function closeCouponModal() {
        modalContent.removeClass("scale-100").addClass("scale-95");
        modal.removeClass("opacity-100");

        setTimeout(() => {
            modal.addClass("hidden");
        }, 300);
    }
</script>