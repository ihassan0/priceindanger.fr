<nav>

    <div class="container  mx-auto md:flex items-center justify-between md:gap-16 gap-8 md:px-5 px-3 py-5">

        <!-- Logo -->
        <div class="flex items-center justify-between">
            <a href="/">
                <img src="{{url('logos/priceindanger.webp')}}" class="sm:w-[230px] w-[128px]" />
            </a>
            <div class="items-center border-l-2 md:pl-10 pl-5 gap-3 cursor-pointer flex md:hidden">
                <img src="https://cdn.britannica.com/82/682-004-F0B47FCB/Flag-France.jpg" alt="" class="w-[32px]">
                <p class="font-semibold text-[#333]">French &nbsp;<i class="fa-solid fa-caret-down"></i></p>
            </div>
        </div>

        <!-- Search -->
        <div class="flex-1 relative h-12 my-4">
            <input type="text" class="border border-1 rounded-sm w-full h-full p-3 focus-visible:outline-none text-sm"
                id="search-bar" placeholder="Trouvez des codes promo et des offres de vos marques préférées">
            <i class="fa-solid fa-magnifying-glass absolute right-3 top-[30%] bg-white pl-3"></i>

            <!-- Suggestions Dropdown -->
            <ul id="suggestions" class="absolute bg-white w-full hidden mt-1 overflow-auto text-sm z-10 rounded-sm">
            </ul>
        </div>

        <!-- Flag -->
        <div class="items-center border-l-2 md:pl-10 pl-5 gap-3 cursor-pointer hidden md:flex">
            <img src="https://cdn.britannica.com/82/682-004-F0B47FCB/Flag-France.jpg" alt="" class="w-[32px]">
            <p class="font-semibold text-[#333]">French &nbsp;<i class="fa-solid fa-caret-down"></i></p>
        </div>

    </div>

    <!-- Desktop Navigation  -->

    <section class="bg-[var(--secondary)] hidden lg:block">
        <ul class="text-white flex items-center justify-center  xl:gap-5 gap-3">
            <!-- Categories Menus -->
            @if (Request::is('/'))
            <li class="bg-[var(--primary)] p-5 cursor-pointer relative w-60">
                <span class="uppercase text-[16px] font-medium">
                    <i class="fa-solid fa-bars mr-2"></i>
                    Catégories
                </span>

                <!-- Menus -->
                <ul class="absolute left-0 bg-white top-16 text-black w-full shadow-lg list rounded-b-md">
                    @foreach ($categories as $category)
                    <li class="p-[11px] text-sm text-[#292b2c]"><a href="#"
                            class="whitespace-nowrap text-ellipsis overflow-hidden w-full block">
                            {{ $category->name }} </a></li>
                    @endforeach
                    <li class="p-[10px] text-[var(--primary)] border-t-[1px] border-gray-300">
                        <a href="#">
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

            <!-- Navigation Menus -->
            <li class="py-5 w-20  whitespace-nowrap text-center"><a href="/" class="!text-white">Maison</a></li>
            <li class="py-5 w-20  whitespace-nowrap text-center"><a href="{{ route('allCategories') }}" class="!text-white">Catégories</a></li>
            <li class="py-5 w-20  whitespace-nowrap text-center"><a href="{{ route('allStores') }}" class="!text-white">Magasins</a></li>
            <!-- Dropdown -->
            <li class="group relative cursor-pointer">
                <!-- Button -->
                <span class="block w-40  whitespace-nowrap text-center">
                    <a class="menu-hover !text-white">
                        Occasions spéciales
                    </a>
                    <i class="fa-solid fa-caret-down text-xs"></i>
                </span>

                <!-- Dropdown List  -->

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
            <li class="py-5 w-[120px]  whitespace-nowrap text-center"><a href="{{ route('allCoupons') }}" class="!text-white">Tous les bons</a></li>
            <li class="py-5 w-[120px]  whitespace-nowrap text-center"><a href="{{ route('allOffres') }}" class="!text-white">Toutes les offres</a>
            </li>
            <li class="py-5 w-20  whitespace-nowrap text-center"><a href="{{ route('allBlogs') }}" class="!text-white">Blogs</a></li>
        </ul>
    </section>

    <!-- Mobile Navigation  -->

    <section class="bg-[var(--secondary)] text-white lg:hidden">

        <!-- Buttons to Open the Drawers -->
        <div class="flex justify-between items-center sm:mx-16 mx-6">
            @if (Request::is('/'))
            <button id="openCategories">
                <span class="bg-[var(--primary)] p-4 cursor-pointer relative sm:w-60 w-36 block">
                    <i class="fa-solid fa-bars mr-2"></i>
                    Catégories
                </span>
            </button>
            @endif

            <button id="openMenus" class="p-4 ml-auto" onclick="openRightDrawer()">Menu <i
                    class="fa-solid fa-bars ml-2"></i></button>
        </div>


        @if (Request::is('/'))
        <!-- Categories Drawer Overlay and Drawer -->
        <div id="categoriesOverlay" class="fixed inset-0 z-10 bg-black bg-opacity-50 hidden"></div>
        <div id="categoriesDrawer"
            class="fixed left-0 top-0 z-10 h-full w-64 bg-white shadow-lg transform -translate-x-full transition-transform duration-300">
            <ul class="bg-white text-black w-full list">
                @foreach ($categories as $category)
                <li class="text-sm p-4 text-[#292b2c]"><a href="#"
                        class="whitespace-nowrap text-ellipsis overflow-hidden w-full block"> {{ $category->name }}
                    </a></li>
                @endforeach
                <li class="p-[10px] text-[var(--primary)] border-t-[1px] border-gray-300 ">
                    <a href="#">
                        <div class="flex items-center justify-between"> Plus de catégories <i
                                class="fa-solid fa-plus"></i> </div>
                    </a>
                </li>
            </ul>
        </div>
        @endif

        <!-- Menus Drawer Overlay and Drawer -->
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
                    <!-- Dropdown -->
                    <li class="group relative cursor-pointer ">
                        <!-- Button -->
                        <span class="block p-3 py-4 text-sm font-medium text-white toggle-header">
                            Occasions spéciales
                            <i class="fa-solid fa-caret-down text-xs"></i>
                        </span>

                        <!-- Dropdown List  -->

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
                            class="!text-white">Tous les bons</a></li>
                    <li class="p-3 py-4 text-sm font-medium"><a href="{{ route('allOffres') }}"
                            class="!text-white">Toutes les offres</a></li>
                    <li class="p-3 py-4 text-sm font-medium"><a href="{{ route('allBlogs') }}"
                            class="!text-white">Blogs</a></li>
                </ul>
            </div>
        </div>
    </section>


</nav>

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
        $('#search-bar').on('input', function() {
            let query = $(this).val();
            if (query.length > 0) {
                $.ajax({
                    url: "{{ route('search.suggestions') }}", // Route for search suggestions
                    method: "GET",
                    data: {
                        q: query
                    },
                    success: function(data) {
                        $('#suggestions').empty().removeClass('hidden');
                        if (data.length) {
                            data.forEach(item => {
                                const routeUrl = `{{ route('storeView', ':id') }}`.replace(':id', item.id);
                                $('#suggestions').append(`<a href="${routeUrl}"><li class="flex gap-4 items-center p-2 border border-gray-200 mb-2 rounded-sm transition-all duration-300 hover:bg-gray-200 cursor-pointer"><img src="{{ asset('storage/${item.logo}') }}" class="size-12 object-cover"> <p class="text-lg text-[#292b2c] "> ${item.name} </p> </li></a>`);
                            });
                        } else {
                            $('#suggestions').append('<li class="p-2 text-gray-500">No results found</li>');
                        }
                    },
                    error: function() {
                        $('#suggestions').addClass('hidden');
                    }
                });
            } else {
                $('#suggestions').addClass('hidden');
            }
        });

        // Hide suggestions when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('#search-bar, #suggestions').length) {
                $('#suggestions').addClass('hidden');
            }
        });
    });
</script>