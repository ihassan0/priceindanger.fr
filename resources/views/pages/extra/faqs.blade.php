<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faqs | Priceindanger.fr</title>
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
    @include('components.breadcrums', ['current_page' => "Allgemeine Fragen"])
    <!-- Breadcrums end -->


    <div class="container my-10">

        <!--<h3 class="text-[26px] font-semibold mb-5"-->
        <!--    style="border-bottom: 3px solid var(--secondary); width:fit-content; line-height:55px">Allgemeine Fragen-->
        <!--</h3>-->
        <!-- Accordion Item 1 -->
        <div class="border-b border-slate-200">
            <button onclick="toggleAccordion(1)"
                class="w-full flex justify-between items-center py-5 text-slate-800 font-semibold hover:text-[var(--primary)] transition-all">
                <span class="text-left">Qu’est-ce que le prix en danger ?</span>
                <span id="icon-1" class=" transition-transform duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                        <path
                            d="M8.75 3.75a.75.75 0 0 0-1.5 0v3.5h-3.5a.75.75 0 0 0 0 1.5h3.5v3.5a.75.75 0 0 0 1.5 0v-3.5h3.5a.75.75 0 0 0 0-1.5h-3.5v-3.5Z" />
                    </svg>
                </span>
            </button>
            <div id="content-1" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                <div class="pb-5 text-sm text-slate-500">
                   Price in Danger est un site Web sur lequel vous pouvez obtenir des codes de réduction pour diverses boutiques en ligne en
                    peut trouver l'Allemagne.
                </div>
            </div>
        </div>

        <!-- Accordion Item 2 -->
        <div class="border-b border-slate-200">
            <button onclick="toggleAccordion(2)"
                class="w-full flex justify-between items-center py-5 text-slate-800 font-semibold hover:text-[var(--primary)] transition-all">
                <span class="text-left">Comment fonctionnent les codes promo ?</span>
                <span id="icon-2" class="transition-transform duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                        <path
                            d="M8.75 3.75a.75.75 0 0 0-1.5 0v3.5h-3.5a.75.75 0 0 0 0 1.5h3.5v3.5a.75.75 0 0 0 1.5 0v-3.5h3.5a.75.75 0 0 0 0-1.5h-3.5v-3.5Z" />
                    </svg>
                </span>
            </button>
            <div id="content-2" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                <div class="pb-5 text-sm text-slate-500">
                   Les codes promo offrent une réduction sur divers produits et services lorsque vous les utilisez sur
                    Utilisez les achats en ligne.
                </div>
            </div>
        </div>

        <!-- Accordion Item 3 -->
        <div class="border-b border-slate-200">
            <button onclick="toggleAccordion(3)"
                class="w-full flex justify-between items-center py-5 text-slate-800 font-semibold hover:text-[var(--primary)] transition-all">
                <span class="text-left">Quelles marques proposent des codes promo sur Priceindanger ?</span>
                <span id="icon-3" class="transition-transform duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                        <path
                            d="M8.75 3.75a.75.75 0 0 0-1.5 0v3.5h-3.5a.75.75 0 0 0 0 1.5h3.5v3.5a.75.75 0 0 0 1.5 0v-3.5h3.5a.75.75 0 0 0 0-1.5h-3.5v-3.5Z" />
                    </svg>
                </span>
            </button>
            <div id="content-3" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                <div class="pb-5 text-sm text-slate-500">
                  Priceindanger propose des codes promotionnels pour diverses marques, notamment Zalando, Otto,
                    MediaMarkt, Douglas, Lidl, Adidas, H&M et bien d'autres.
                </div>
            </div>
        </div>

        <!-- Accordion Item 4 -->
        <div class="border-b border-slate-200">
            <button onclick="toggleAccordion(4)"
                class="w-full flex justify-between items-center py-5 text-slate-800 font-semibold hover:text-[var(--primary)] transition-all">
                <span class="text-left">Puis-je économiser sur ma marque préférée chez Priceindanger ?</span>
                <span id="icon-4" class="transition-transform duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                        <path
                            d="M8.75 3.75a.75.75 0 0 0-1.5 0v3.5h-3.5a.75.75 0 0 0 0 1.5h3.5v3.5a.75.75 0 0 0 1.5 0v-3.5h3.5a.75.75 0 0 0 0-1.5h-3.5v-3.5Z" />
                    </svg>
                </span>
            </button>
            <div id="content-4" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                <div class="pb-5 text-sm text-slate-500">
                   Oui, vous pouvez trouver des codes promotionnels pour de nombreuses marques populaires sur Priceindanger.
                </div>
            </div>
        </div>

        <!-- Accordion Item 5 -->
        <div class="border-b border-slate-200">
            <button onclick="toggleAccordion(5)"
                class="w-full flex justify-between items-center py-5 text-slate-800 font-semibold hover:text-[var(--primary)] transition-all">
                <span class="text-left">Comment utiliser les codes promo sur Priceindanger ?</span>
                <span id="icon-5" class="transition-transform duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                        <path
                            d="M8.75 3.75a.75.75 0 0 0-1.5 0v3.5h-3.5a.75.75 0 0 0 0 1.5h3.5v3.5a.75.75 0 0 0 1.5 0v-3.5h3.5a.75.75 0 0 0 0-1.5h-3.5v-3.5Z" />
                    </svg>
                </span>
            </button>
            <div id="content-5" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                <div class="pb-5 text-sm text-slate-500">
                   Trouvez simplement la boutique ou la catégorie qui vous intéresse et parcourez
                    les codes promo disponibles et utilisez-les à la caisse pour profiter de vos économies.
                </div>
            </div>
        </div>

        <!-- Accordion Item 6 -->
        <div class="border-b border-slate-200">
            <button onclick="toggleAccordion(6)"
                class="w-full flex justify-between items-center py-5 text-slate-800 font-semibold hover:text-[var(--primary)] transition-all">
                <span class="text-left">Puis-je enregistrer mes codes promo préférés ?</span>
                <span id="icon-6" class="transition-transform duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                        <path
                            d="M8.75 3.75a.75.75 0 0 0-1.5 0v3.5h-3.5a.75.75 0 0 0 0 1.5h3.5v3.5a.75.75 0 0 0 1.5 0v-3.5h3.5a.75.75 0 0 0 0-1.5h-3.5v-3.5Z" />
                    </svg>
                </span>
            </button>
            <div id="content-6" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                <div class="pb-5 text-sm text-slate-500">
                    Oui, vous pouvez enregistrer vos codes promo préférés pour une utilisation future.
                </div>
            </div>
        </div>

        <!-- Accordion Item 7 -->
        <div class="border-b border-slate-200">
            <button onclick="toggleAccordion(7)"
                class="w-full flex justify-between items-center py-5 text-slate-800 font-semibold hover:text-[var(--primary)] transition-all">
                <span class="text-left">Priceindanger propose-t-il des réductions exclusives ?</span>
                <span id="icon-7" class="transition-transform duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                        <path
                            d="M8.75 3.75a.75.75 0 0 0-1.5 0v3.5h-3.5a.75.75 0 0 0 0 1.5h3.5v3.5a.75.75 0 0 0 1.5 0v-3.5h3.5a.75.75 0 0 0 0-1.5h-3.5v-3.5Z" />
                    </svg>
                </span>
            </button>
            <div id="content-7" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                <div class="pb-5 text-sm text-slate-500">
                   Oui, Priceindanger propose des remises exclusives et des offres qui ne sont disponibles nulle part ailleurs.
                </div>
            </div>
        </div>

        <!-- Accordion Item 8 -->
        <div class="border-b border-slate-200">
            <button onclick="toggleAccordion(8)"
                class="w-full flex justify-between items-center py-5 text-slate-800 font-semibold hover:text-[var(--primary)] transition-all">
                <span class="text-left">Comment puis-je contacter le service client de Priceindanger ?</span>
                <span id="icon-8" class="transition-transform duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                        <path
                            d="M8.75 3.75a.75.75 0 0 0-1.5 0v3.5h-3.5a.75.75 0 0 0 0 1.5h3.5v3.5a.75.75 0 0 0 1.5 0v-3.5h3.5a.75.75 0 0 0 0-1.5h-3.5v-3.5Z" />
                    </svg>
                </span>
            </button>
            <div id="content-8" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                <div class="pb-5 text-sm text-slate-500">
                   Le support client de Priceindanger est toujours disponible et peut être contacté via le site Web.
                    devenir.
                </div>
            </div>
        </div>

        <!-- Accordion Item 9 -->
        <div class="border-b border-slate-200">
            <button onclick="toggleAccordion(9)"
                class="w-full flex justify-between items-center py-5 text-slate-800 font-semibold hover:text-[var(--primary)] transition-all">
                <span class="text-left">Pourquoi devrais-je utiliser des codes promo sur Priceindanger ?</span>
                <span id="icon-9" class="transition-transform duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                        <path
                            d="M8.75 3.75a.75.75 0 0 0-1.5 0v3.5h-3.5a.75.75 0 0 0 0 1.5h3.5v3.5a.75.75 0 0 0 1.5 0v-3.5h3.5a.75.75 0 0 0 0-1.5h-3.5v-3.5Z" />
                    </svg>
                </span>
            </button>
            <div id="content-9" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                <div class="pb-5 text-sm text-slate-500">
                   En utilisant des codes promo sur Priceindanger, vous pouvez économiser beaucoup d'argent sur votre
                    Économisez sur les achats en ligne.
                </div>
            </div>
        </div>

        <!-- Accordion Item 10 -->
        <div class="border-b border-slate-200">
            <button onclick="toggleAccordion(10)"
                class="w-full flex justify-between items-center py-5 text-slate-800 font-semibold hover:text-[var(--primary)] transition-all">
                <span class="text-left">Priceindanger est-il digne de confiance ?</span>
                <span id="icon-10" class="transition-transform duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                        <path
                            d="M8.75 3.75a.75.75 0 0 0-1.5 0v3.5h-3.5a.75.75 0 0 0 0 1.5h3.5v3.5a.75.75 0 0 0 1.5 0v-3.5h3.5a.75.75 0 0 0 0-1.5h-3.5v-3.5Z" />
                    </svg>
                </span>
            </button>
            <div id="content-10" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                <div class="pb-5 text-sm text-slate-500">
                    Oui, Priceindanger est un site Web digne de confiance, spécialisé dans les codes promo pour les boutiques en ligne.
                    spécialisé en Allemagne.
                </div>
            </div>
        </div>

    </div>


    <!-- Footer  -->
    @include('components.footer')
    <!-- Footer Ends -->


    <script src="https://kit.fontawesome.com/35b4de642d.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script>
        function toggleAccordion(index) {
            const content = document.getElementById(`content-${index}`);
            const icon = document.getElementById(`icon-${index}`);

            // SVG for Minus icon
            const minusSVG = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                             <path d="M3.75 7.25a.75.75 0 0 0 0 1.5h8.5a.75.75 0 0 0 0-1.5h-8.5Z" />
                         </svg>
                     `;

            // SVG for Plus icon
            const plusSVG = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                            <path d="M8.75 3.75a.75.75 0 0 0-1.5 0v3.5h-3.5a.75.75 0 0 0 0 1.5h3.5v3.5a.75.75 0 0 0 1.5 0v-3.5h3.5a.75.75 0 0 0 0-1.5h-3.5v-3.5Z" />
                            </svg>
                            `;

            if (content.style.maxHeight && content.style.maxHeight !== '0px') {
                content.style.maxHeight = '0';
                icon.innerHTML = plusSVG;
            } else {
                content.style.maxHeight = content.scrollHeight + 'px';
                icon.innerHTML = minusSVG;
            }
        }
    </script>
    <script>
        const categoryDropdownButton = document.getElementById('categoryDropdownButton');
        const categoryDropdownList = document.getElementById('categoryDropdownList');

        categoryDropdownButton.addEventListener('click', () => {
            categoryDropdownList.classList.toggle('show');
        });
    </script>
</body>


</html>