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
    @include('components.breadcrums', ['current_page' => "Blogs"])
    <!-- Breadcrums end -->

    <!-- Recent Posts  -->
    <section class="container">
        <div class="lg:flex gap-5">
            <aside class="lg:w-[30%]">

                <!-- Search -->
                <div class="flex-1 relative h-12 hidden md:block mt-5">
                    <input type="text" class="border border-1 rounded-sm w-full h-full p-3 focus-visible:outline-none text-sm"
                        placeholder="Trouvez des codes promo et des offres de vos marques préférées Blog...">
                    <i class="fa-solid fa-magnifying-glass absolute right-3 top-[30%] bg-white pl-3"></i>
                </div>

                <!-- Recent Posts -->
                <h3 class="font-semibold text-xl my-5">Messages récents</h3>
                <div class="border-b border-gray-200 pb-5">
                    @foreach ($blogs->take(3) as $blog )
                    <div class="flex gap-3 my-4">
                        <img src="{{ asset('storage/'. $blog->image) }}" class="w-24 h-16 object-cover">
                        <span>
                            <a href="{{ route('blogView',$blog->id) }}" class="font-semibold text-sm text-black opacity-75 cursor-pointer">{{ $blog->title }} </a>
                            <p class="text-sm">{{ $blog->created_at->format('M d,Y') }}</p>
                        </span>
                    </div>
                    @endforeach
                </div>

                <!-- Popular Shops -->
                <div>
                    <h3 class="font-semibold text-xl my-5">Magasins populaires</h3>
                    <ul>
                        @foreach ($shops->take(10) as $shop )
                        <a href="#" class="mb-2 block font-medium">
                            <li>{{ $shop->name }}</li>
                        </a>
                        @endforeach
                    </ul>
                </div>
            </aside>

            <!-- Blogs -->

            <div class="lg:w-[70%]">
                @foreach ($blogs as $blog )
                <div class="md:flex gap-3 border-b border-gray-200 py-5">
                    <a href="{{ route('blogView',$blog->id) }}" class="md:w-[40%]">
                        <img src="{{ asset('storage/'. $blog->image) }}" class="w-full h-full object-cover rounded-sm">
                    </a>
                    <div class="md:w-[60%] mt-5 md:mt-0">
                        <a href="{{ route('blogView',$blog->id) }}" class="text-xl font-semibold">
                            {{ $blog->title }}
                        </a>
                        <p class="my-1"> <i class="fa-solid fa-calendar-days text-[var(--primary)] me-2"></i> {{ $blog->created_at->format('M d,Y') }}</p>
                        <p class="my-1"> <i class="fa-solid fa-pencil text-[var(--primary)] me-2"></i> {{ $blog->writter }}</p>
                        <a href="{{ route('blogView',$blog->id) }}" class="mt-5 block"><button class="btn px-10 py-1 rounded-sm overflow-hidden">View</button></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>



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