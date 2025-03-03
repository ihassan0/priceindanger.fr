@if(!Cookie::has('cookie_consent'))
<div id="cookie-banner" class="fixed bottom-0 w-full bg-gray-900 text-white p-4 text-center">
    <p>We use cookies to improve your experience. Do you accept cookies?</p>
    <button onclick="setCookieConsent(true)" class="bg-green-500 px-4 py-2 rounded">Accept</button>
    <button onclick="setCookieConsent(false)" class="bg-red-500 px-4 py-2 rounded">Reject</button>
</div>

<script>
    function setCookieConsent(consent) {
        fetch("{{ route('cookie.consent') }}", {
            method: "POST",
            headers: { "Content-Type": "application/json", "X-CSRF-TOKEN": "{{ csrf_token() }}" },
            body: JSON.stringify({ consent: consent ? 'accepted' : 'rejected' })
        })
        .then(response => response.json())
        .then(data => {
            document.getElementById("cookie-banner").style.display = "none";
        });
    }
</script>
@endif



<footer class="bg-[#F7F8FB] text-black">
    <div class="mx-auto w-full max-w-6xl">
        <div class="grid sm:grid-cols-2 gap-4 px-4 pt-10 lg:pt-16 lg:grid-cols-6">
            <div class="lg:col-span-2">
                <a href="/">
                    <img src="{{url('logos/priceindanger.webp')}}" class="w-[180px]" />
                </a>
                <p class="sm:my-4 my-2 text-sm md: w-[95%] leading-7 text-[#292b2c]">Toutes les offres, codes de
                    réduction et offres Brands sont disponibles ici!
                </p>
                <a href="mailto:admin@priceindanger.com" class="flex items-center gap-2 text-[#292b2c]">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                    </svg>
                    <p class="text-sm">admin@priceindanger.com</p>
                </a>
            </div>
            <div>
                <h2 class="mb-4 font-semibold uppercase">Liens utiles</h2>
                <ul>
                    <li class="sm:mb-2 mb-1">
                        <a href="{{ route('allCategories') }}" class="text-sm">Catégories</a>
                    </li>
                    <li class="sm:mb-2 mb-1">
                        <a href="{{ route('aboutUs') }}" class="text-sm">À propos de nous</a>
                    </li>
                    <li class="sm:mb-2 mb-1">
                        <a href="{{ route('allBlogs') }}" class="text-sm">Blog</a>
                    </li>
                    <li class="sm:mb-2 mb-1">
                        <a href="{{ route('faqs') }}" class="text-sm">Faq</a>
                    </li>
                    <li class="sm:mb-2 mb-1">
                        <a href="{{ route('contactUs') }}" class="text-sm">Contactez-nous</a>
                    </li>
                    <li class="sm:mb-2 mb-1">
                        <a href="{{ route('privacy') }}" class="text-sm">Politique de confidentialité</a>
                    </li>
                    <li class="sm:mb-2 mb-1">
                        <a href="{{ route('imprint') }}" class="text-sm">Imprimer</a>
                    </li>
                </ul>
            </div>
            <div>
                <h2 class="mb-4 font-semibold uppercase">Catégories</h2>
                <ul>
                    @foreach($topCategories as $topcat)
                    <li class="sm:mb-2 mb-1">
                        <a href="{{ route('categoryView', $topcat->id)}}" class="text-sm">{{ $topcat->name }}</a>
                    </li>
                    @endforeach
                    <!--<li class="sm:mb-2 mb-1">-->
                    <!--    <a href="#" class="text-sm">Surfbretter</a>-->
                    <!--</li>-->
                    <!--<li class="sm:mb-2 mb-1">-->
                    <!--    <a href="#" class="text-sm">Montres pour femmes</a>-->
                    <!--</li>-->
                    <!--<li class="sm:mb-2 mb-1">-->
                    <!--    <a href="#" class="text-sm">Sacs</a>-->
                    <!--</li>-->
                    <!--<li class="sm:mb-2 mb-1">-->
                    <!--    <a href="#" class="text-sm">Accessoires de cuisine</a>-->
                    <!--</li>-->
                    <!--<li class="sm:mb-2 mb-1">-->
                    <!--    <a href="#" class="text-sm">Chaussures pour enfants</a>-->
                    <!--</li>-->
                </ul>
            </div>
            <div class="lg:col-span-2">
                <h2 class="mb-4 font-semibold uppercase">Magasins</h2>
                <div class="grid grid-cols-4 gap-1">
                    @foreach ($shops->take(12) as $shop)
                    <a href="{{ route('storeView', [
    'id' => $shop->id,
    'name' => Str::slug($shop->name) . '-codes-promo',
])}}" class="h-16 hover:brightness-50 transition-all duration-300">
                        <img src="{{ asset('storage/' . $shop->logo) }}" class="w-full h-full object-cover rounded-md"
                            alt="Shop Image">
                    </a>
                    @endforeach
                </div>

            </div>
        </div>
        <div class="px-4 py-6 md:flex md:items-center md:justify-between">

            <div class="flex md:mt-4 sm:justify-center md:mt-0 space-x-5 rtl:space-x-reverse mb-2 md:mb-0">
                <a href="https://www.facebook.com/priceindanger/" target="_blank"
                    class="text-4xl hover:opacity-70 transition !text-[#0866FF]">
                    <i class="fa-brands fa-square-facebook"></i>
                </a>
                <a href="https://x.com/priceindanger" target="_blank"
                    class="text-4xl hover:opacity-70 transition !text-black">
                    <i class="fa-brands fa-square-x-twitter"></i>
                </a>
                <a href="https://www.pinterest.com/priceindanger/" target="_blank"
                    class="text-4xl hover:opacity-70 transition !text-[#E60023]">
                    <i class="fa-brands fa-square-pinterest"></i>
                </a>
                <a href="https://www.instagram.com/priceindanger/" target="_blank"
                    class="text-4xl hover:opacity-70 transition ">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Instagram_icon.png/2048px-Instagram_icon.png"
                        alt="" class="size-8 mt-[3px]">
                </a>
            </div>
            <span class="text-sm sm:text-center">© {{ \Carbon\Carbon::now()->format('Y') }} Priceindanger. Tous droits
                réservés.</span>
        </div>
    </div>
</footer>