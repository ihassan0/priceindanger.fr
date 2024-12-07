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

        @include('components.breadcrums', ['current_page' => "Magasin"])

        <!-- Categories Start -->
        <section class="container my-10 mb-16">

                <!-- Desktop filters -->
                <ul class="sm:flex hidden items-center justify-center flex-wrap mb-10  gap-2">
                        <li><button
                                        class="border border-[#cbcbcb] size-8 text-[#8f8f8f] hover:bg-[var(--secondary)] hover:text-white transition-all duration-300">A</button>
                        </li>
                        <li><button
                                        class="border border-[#cbcbcb] size-8 text-[#8f8f8f] hover:bg-[var(--secondary)] hover:text-white transition-all duration-300">B</button>
                        </li>
                        <li><button
                                        class="border border-[#cbcbcb] size-8 text-[#8f8f8f] hover:bg-[var(--secondary)] hover:text-white transition-all duration-300">C</button>
                        </li>
                        <li><button
                                        class="border border-[#cbcbcb] size-8 text-[#8f8f8f] hover:bg-[var(--secondary)] hover:text-white transition-all duration-300">D</button>
                        </li>
                        <li><button
                                        class="border border-[#cbcbcb] size-8 text-[#8f8f8f] hover:bg-[var(--secondary)] hover:text-white transition-all duration-300">E</button>
                        </li>
                        <li><button
                                        class="border border-[#cbcbcb] size-8 text-[#8f8f8f] hover:bg-[var(--secondary)] hover:text-white transition-all duration-300">F</button>
                        </li>
                        <li><button
                                        class="border border-[#cbcbcb] size-8 text-[#8f8f8f] hover:bg-[var(--secondary)] hover:text-white transition-all duration-300">G</button>
                        </li>
                        <li><button
                                        class="border border-[#cbcbcb] size-8 text-[#8f8f8f] hover:bg-[var(--secondary)] hover:text-white transition-all duration-300">H</button>
                        </li>
                        <li><button
                                        class="border border-[#cbcbcb] size-8 text-[#8f8f8f] hover:bg-[var(--secondary)] hover:text-white transition-all duration-300">I</button>
                        </li>
                        <li><button
                                        class="border border-[#cbcbcb] size-8 text-[#8f8f8f] hover:bg-[var(--secondary)] hover:text-white transition-all duration-300">J</button>
                        </li>
                        <li><button
                                        class="border border-[#cbcbcb] size-8 text-[#8f8f8f] hover:bg-[var(--secondary)] hover:text-white transition-all duration-300">K</button>
                        </li>
                        <li><button
                                        class="border border-[#cbcbcb] size-8 text-[#8f8f8f] hover:bg-[var(--secondary)] hover:text-white transition-all duration-300">L</button>
                        </li>
                        <li><button
                                        class="border border-[#cbcbcb] size-8 text-[#8f8f8f] hover:bg-[var(--secondary)] hover:text-white transition-all duration-300">M</button>
                        </li>
                        <li><button
                                        class="border border-[#cbcbcb] size-8 text-[#8f8f8f] hover:bg-[var(--secondary)] hover:text-white transition-all duration-300">N</button>
                        </li>
                        <li><button
                                        class="border border-[#cbcbcb] size-8 text-[#8f8f8f] hover:bg-[var(--secondary)] hover:text-white transition-all duration-300">O</button>
                        </li>
                        <li><button
                                        class="border border-[#cbcbcb] size-8 text-[#8f8f8f] hover:bg-[var(--secondary)] hover:text-white transition-all duration-300">P</button>
                        </li>
                        <li><button
                                        class="border border-[#cbcbcb] size-8 text-[#8f8f8f] hover:bg-[var(--secondary)] hover:text-white transition-all duration-300">Q</button>
                        </li>
                        <li><button
                                        class="border border-[#cbcbcb] size-8 text-[#8f8f8f] hover:bg-[var(--secondary)] hover:text-white transition-all duration-300">R</button>
                        </li>
                        <li><button
                                        class="border border-[#cbcbcb] size-8 text-[#8f8f8f] hover:bg-[var(--secondary)] hover:text-white transition-all duration-300">S</button>
                        </li>
                        <li><button
                                        class="border border-[#cbcbcb] size-8 text-[#8f8f8f] hover:bg-[var(--secondary)] hover:text-white transition-all duration-300">T</button>
                        </li>
                        <li><button
                                        class="border border-[#cbcbcb] size-8 text-[#8f8f8f] hover:bg-[var(--secondary)] hover:text-white transition-all duration-300">U</button>
                        </li>
                        <li><button
                                        class="border border-[#cbcbcb] size-8 text-[#8f8f8f] hover:bg-[var(--secondary)] hover:text-white transition-all duration-300">V</button>
                        </li>
                        <li><button
                                        class="border border-[#cbcbcb] size-8 text-[#8f8f8f] hover:bg-[var(--secondary)] hover:text-white transition-all duration-300">W</button>
                        </li>
                        <li><button
                                        class="border border-[#cbcbcb] size-8 text-[#8f8f8f] hover:bg-[var(--secondary)] hover:text-white transition-all duration-300">X</button>
                        </li>
                        <li><button
                                        class="border border-[#cbcbcb] size-8 text-[#8f8f8f] hover:bg-[var(--secondary)] hover:text-white transition-all duration-300">Y</button>
                        </li>
                        <li><button
                                        class="border border-[#cbcbcb] size-8 text-[#8f8f8f] hover:bg-[var(--secondary)] hover:text-white transition-all duration-300">Z</button>
                        </li>
                        <li><button
                                        class="border border-[#cbcbcb] h-8 px-2 text-[#8f8f8f] hover:bg-[var(--secondary)] hover:text-white transition-all duration-300">0
                                        - 9</button></li>
                </ul>


                <!-- Small Device filters -->
                <div class="sm:hidden">
                        <!-- Button -->
                        <button id="categoryDropdownButton"
                                class="flex justify-between p-3 py-4 text-sm font-medium border w-full ">
                                Commencez par A
                                <i class="fa-solid fa-caret-down text-xs"></i>
                        </button>

                        <!-- Dropdown List  -->

                        <ul id="categoryDropdownList"
                                class="border max-h-0 mb-3 overflow-hidden transition-all duration-300 ease-in-out">
                                <li><button class="p-3 text-sm">Commencez par A</button></li>
                                <li><button class="p-3 text-sm">Commencez par B</button></li>
                                <li><button class="p-3 text-sm">Commencez par C</button></li>
                                <li><button class="p-3 text-sm">Commencez par D</button></li>
                                <li><button class="p-3 text-sm">Commencez par E</button></li>
                                <li><button class="p-3 text-sm">Commencez par F</button></li>
                                <li><button class="p-3 text-sm">Commencez par G</button></li>
                                <li><button class="p-3 text-sm">Commencez par H</button></li>
                                <li><button class="p-3 text-sm">Commencez par I</button></li>
                                <li><button class="p-3 text-sm">Commencez par J</button></li>
                                <li><button class="p-3 text-sm">Commencez par K</button></li>
                                <li><button class="p-3 text-sm">Commencez par L</button></li>
                                <li><button class="p-3 text-sm">Commencez par M</button></li>
                                <li><button class="p-3 text-sm">Commencez par N</button></li>
                                <li><button class="p-3 text-sm">Commencez par O</button></li>
                                <li><button class="p-3 text-sm">Commencez par P</button></li>
                                <li><button class="p-3 text-sm">Commencez par Q</button></li>
                                <li><button class="p-3 text-sm">Commencez par R</button></li>
                                <li><button class="p-3 text-sm">Commencez par S</button></li>
                                <li><button class="p-3 text-sm">Commencez par T</button></li>
                                <li><button class="p-3 text-sm">Commencez par U</button></li>
                                <li><button class="p-3 text-sm">Commencez par V</button></li>
                                <li><button class="p-3 text-sm">Commencez par W</button></li>
                                <li><button class="p-3 text-sm">Commencez par X</button></li>
                                <li><button class="p-3 text-sm">Commencez par Y</button></li>
                                <li><button class="p-3 text-sm">Commencez par Z</button></li>
                                <li><button class="p-3 text-sm">0 - 9</button></li>

                        </ul>
                </div>


                <!-- Categories -->

                <div class="grid lg:grid-cols-4 gap-x-6 gap-y-4">
                        @foreach ($stores as $store )


                        <div>
                                <a href="{{ route('storeView',$store->id) }}" class="flex items-center gap-2 border border-[#cbcbcb] w-full text-left px-4 py-3 rounded-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="4"
                                                stroke="currentColor" class="size-[16px] bg-black text-white rounded-full text-[10px] p-[3px]">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                        </svg>
                                        {{ $store->name }}
                                </a>
                        </div>
                        @endforeach
                </div>
        </section>
        <!-- Categories end -->


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

</html>