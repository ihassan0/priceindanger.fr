<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Stores | Priceindanger.fr</title>
        <link rel="icon" href="{{ asset('logos/favicon.png') }}" type="image/x-icon">
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>

<body>
        <!-- Navbar  -->
        @include('components.navbar')
        <!-- Navbar Ends  -->

        @include('components.breadcrums', ['current_page' => "Magasins"])

        <!-- Categories Start -->
        <section class="my-5 md:my-0 mb-16">

                <!-- Desktop filters -->
                <ul class="sm:flex hidden container items-center justify-center flex-wrap mt-16 gap-2">
                        @foreach(range('A', 'Z') as $char)
                        <li>
                                <button class="hover:border-b-[3px] hover:border-[var(--secondary)] size-8 text-[#8f8f8f] hover:text-[var(--secondary)] hover:font-semibold transition-all duration-300 
                                {{ request('letter') === $char ? 'border-b-[3px] border-[var(--secondary)] text-[var(--secondary)] font-semibold' : '' }}"
                                        data-letter="{{ $char }}">

                                        {{ $char }}
                                </button>
                                <a href="{{ url()->current() }}?letter={{ $char }}" id="link-{{ $char }}"
                                        style="display: none;">
                                </a>
                        </li>
                        @endforeach
                        <li>
                                <button class="hover:border-b-[3px] hover:border-[var(--secondary)] h-8 px-2  text-[#8f8f8f] hover:text-[var(--secondary)] hover:font-semibold transition-all duration-300
                                 {{ request('letter') === '0-9' ? 'border-b-[3px] border-[var(--secondary)] text-[var(--secondary)] font-semibold' : '' }}"
                                        data-letter="0-9">
                                        0 - 9
                                </button>
                                <a href="{{ url()->current() }}?letter=0-9" id="link-0-9" style="display: none;">
                                </a>
                        </li>
                </ul>


                <!-- Small Device filters -->
                <div class="sm:hidden container sticky top-0 z-[1]">
                        <!-- Button -->
                        <button id="categoryDropdownButton"
                                class="flex justify-between bg-white p-3 py-4 text-sm font-medium border w-full ">
                                Commencez par {{ request('letter')? request('letter'): 'A' }}
                                <i class="fa-solid fa-caret-down text-xs"></i>
                        </button>

                        <!-- Dropdown List  -->

                        <ul id="categoryDropdownList"
                                class="border max-h-0 mb-3 overflow-hidden transition-all duration-300 ease-in-out">
                                @foreach(range('A', 'Z') as $char)
                                <li><button class="p-3 text-sm" data-char="{{ $char }}">Commencez par {{ $char
                                                }}</button>
                                        <a href="{{ url()->current() }}?letter={{ $char }}" id="link-{{ $char }}"
                                                style="display: none;"></a>
                                </li>
                                @endforeach
                                <li><button class="p-3 text-sm" data-char="0-9">0 - 9</button>
                                        <a href="{{ url()->current() }}?letter=0-9" id="link-0-9"
                                                style="display: none;">
                                        </a>
                                </li>

                        </ul>
                </div>


                <!-- Categories -->
                <div class="bg-gray-50 py-8">
                        <div class="container grid lg:grid-cols-4 gap-x-6 gap-y-4">
                                @foreach ($stores as $store )


                                <div>
                                        <a href="{{ route('storeView', [ 'id' => $store->id, 'name' => Str::slug($store->name).'-codes-promo',]) }}"
                                                class="hidden category relative opacity-80 font-medium w-full sm:block text-left px-4 py-1 rounded-sm">
                                                {{ $store->name }}
                                        </a>
                                        <a href="{{ route('storeView', [ 'id' => $store->id, 'name' => Str::slug($store->name).'-codes-promo',]) }}"
                                                class="flex sm:hidden items-center gap-2 border border-[#cbcbcb] w-full text-left px-4 py-3 rounded-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                        stroke-width="4" stroke="currentColor"
                                                        class="size-[16px] bg-black text-white rounded-full text-[10px] p-[3px]">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                                </svg>
                                                {{ $store->name }}
                                        </a>
                                </div>
                                @endforeach
                        </div>
                </div>
        </section>
        <!-- Categories end -->


        <!--  Footer  -->
        @include('components.footer')
        <!--  Footer Ends  -->


</body>

<script>
        // Dropdown toggle functionality
        const dropdownButton = document.getElementById('categoryDropdownButton');
        const dropdownList = document.getElementById('categoryDropdownList');

        dropdownButton.addEventListener('click', () => {
                // Toggle max-height for dropdown visibility
                if (dropdownList.style.maxHeight === '0px' || !dropdownList.style.maxHeight) {
                        dropdownList.style.maxHeight = `${dropdownList.scrollHeight}px`;
                } else {
                        dropdownList.style.maxHeight = '0px';
                }
        });

        // Button click to trigger anchor links
        document.querySelectorAll('button[data-char]').forEach(button => {
                button.addEventListener('click', () => {
                        const char = button.getAttribute('data-char');
                        const anchor = document.getElementById(`link-${char}`);
                        if (anchor) {
                                anchor.click(); // Trigger the anchor link
                        }
                });
        });
</script>
<script>
        document.querySelectorAll('button[data-letter]').forEach(button => {
                button.addEventListener('click', () => {
                        const letter = button.getAttribute('data-letter');
                        const anchor = document.getElementById(`link-${letter}`);
                        if (anchor) {
                                anchor.click();
                        }
                });
        });
</script>

<script src="https://kit.fontawesome.com/35b4de642d.js" crossorigin="anonymous"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
        const categoryDropdownButton = document.getElementById('categoryDropdownButton');
        const categoryDropdownList = document.getElementById('categoryDropdownList');

        categoryDropdownButton.addEventListener('click', () => {
                categoryDropdownList.classList.toggle('show');
        });
</script>

</html>