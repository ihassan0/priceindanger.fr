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
            <div class="lg:w-[70%] mt-5">
                <!-- <h2>{{ $blog->title }}</h2> -->

                <img src={{ asset('storage/'. $blog->image) }} class="w-full h-64 object-cover">
                {!! $blog->description !!}
                <div class="flex mt-4 md:mt-0 space-x-5 rtl:space-x-reverse">
                    <a href="https://www.facebook.com/priceindanger/" target="_blank" class="text-4xl hover:opacity-70 transition !text-[#0866FF]">
                        <i class="fa-brands fa-square-facebook"></i>
                    </a>
                    <a href="https://x.com/priceindanger" target="_blank" class="text-4xl hover:opacity-70 transition !text-black">
                        <i class="fa-brands fa-square-x-twitter"></i>
                    </a>
                    <a href="https://www.pinterest.com/priceindanger/" target="_blank" class="text-4xl hover:opacity-70 transition !text-[#E60023]">
                        <i class="fa-brands fa-square-pinterest"></i>
                    </a>
                    <a href="https://www.instagram.com/priceindanger/" target="_blank" class="text-4xl hover:opacity-70 transition ">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Instagram_icon.png/2048px-Instagram_icon.png" alt="" class="size-8 mt-[3px]">
                    </a>
                </div>
                <div>
                    <h3 class="font-semibold text-xl my-5">Commentaires</h3>
                    <h3 class="font-semibold text-xl my-5">Écrivez un commentaire</h3>

                    <form>
                        <div class="flex gap-4">
                            <input type="text" name="name" placeholder="Ton Nom" class="border border-gray-300 p-3 rounded-sm flex-1">
                            <input type="email" name="name" placeholder="Votre email" class="border border-gray-300 p-3 rounded-sm flex-1">
                        </div>
                        <textarea name="message" cols="30" placeholder="Votre commentaire" class="border border-gray-300 p-3 rounded-sm w-full mt-4"></textarea>
                        <button class="btn rounded-full text-xl px-10 overflow-hidden py-2 mt-5">Soumettre</button>
                    </form>
                </div>
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