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
    @include('components.breadcrums', ['current_page' => "Coupons"])
    <!-- Breadcrums end -->


    <div class="container my-10">

        <h3 class="text-[26px] font-semibold mb-5" style="border-bottom: 3px solid var(--secondary); width:fit-content; line-height:55px">Allgemeine Fragen</h3>
        <!-- Accordion Item 1 -->
        <div class="border-b border-slate-200">
            <button onclick="toggleAccordion(1)" class="w-full flex justify-between items-center py-5 text-slate-800 font-semibold hover:text-[var(--primary)] transition-all">
                <span class="text-left">Was ist Price in Danger?</span>
                <span id="icon-1" class=" transition-transform duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                        <path d="M8.75 3.75a.75.75 0 0 0-1.5 0v3.5h-3.5a.75.75 0 0 0 0 1.5h3.5v3.5a.75.75 0 0 0 1.5 0v-3.5h3.5a.75.75 0 0 0 0-1.5h-3.5v-3.5Z" />
                    </svg>
                </span>
            </button>
            <div id="content-1" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                <div class="pb-5 text-sm text-slate-500">
                    Price in Danger ist eine Website, auf der Sie Gutscheincodes für verschiedene Online-Shops in Deutschland finden können.
                </div>
            </div>
        </div>

        <!-- Accordion Item 2 -->
        <div class="border-b border-slate-200">
            <button onclick="toggleAccordion(2)" class="w-full flex justify-between items-center py-5 text-slate-800 font-semibold hover:text-[var(--primary)] transition-all">
                <span class="text-left">Wie funktionieren Gutscheincodes?</span>
                <span id="icon-2" class="transition-transform duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                        <path d="M8.75 3.75a.75.75 0 0 0-1.5 0v3.5h-3.5a.75.75 0 0 0 0 1.5h3.5v3.5a.75.75 0 0 0 1.5 0v-3.5h3.5a.75.75 0 0 0 0-1.5h-3.5v-3.5Z" />
                    </svg>
                </span>
            </button>
            <div id="content-2" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                <div class="pb-5 text-sm text-slate-500">
                    Gutscheincodes bieten einen Rabatt auf verschiedene Produkte und Dienstleistungen, wenn Sie sie beim Online-Einkauf verwenden.
                </div>
            </div>
        </div>

        <!-- Accordion Item 3 -->
        <div class="border-b border-slate-200">
            <button onclick="toggleAccordion(3)" class="w-full flex justify-between items-center py-5 text-slate-800 font-semibold hover:text-[var(--primary)] transition-all">
                <span class="text-left">Welche Marken bieten Gutscheincodes auf Price in Danger an?</span>
                <span id="icon-3" class="transition-transform duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                        <path d="M8.75 3.75a.75.75 0 0 0-1.5 0v3.5h-3.5a.75.75 0 0 0 0 1.5h3.5v3.5a.75.75 0 0 0 1.5 0v-3.5h3.5a.75.75 0 0 0 0-1.5h-3.5v-3.5Z" />
                    </svg>
                </span>
            </button>
            <div id="content-3" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                <div class="pb-5 text-sm text-slate-500">
                    Price in Danger bietet Gutscheincodes für eine Vielzahl von Marken an, darunter Zalando, Otto, MediaMarkt, Douglas, Lidl, Adidas, H&M und viele mehr.
                </div>
            </div>
        </div>

        <!-- Accordion Item 4 -->
        <div class="border-b border-slate-200">
            <button onclick="toggleAccordion(4)" class="w-full flex justify-between items-center py-5 text-slate-800 font-semibold hover:text-[var(--primary)] transition-all">
                <span class="text-left">Kann ich auf meiner Lieblingsmarke bei Price in Danger sparen?</span>
                <span id="icon-4" class="transition-transform duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                        <path d="M8.75 3.75a.75.75 0 0 0-1.5 0v3.5h-3.5a.75.75 0 0 0 0 1.5h3.5v3.5a.75.75 0 0 0 1.5 0v-3.5h3.5a.75.75 0 0 0 0-1.5h-3.5v-3.5Z" />
                    </svg>
                </span>
            </button>
            <div id="content-4" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                <div class="pb-5 text-sm text-slate-500">
                    Ja, auf Price in Danger finden Sie Gutscheincodes für viele beliebte Marken.
                </div>
            </div>
        </div>

        <!-- Accordion Item 5 -->
        <div class="border-b border-slate-200">
            <button onclick="toggleAccordion(5)" class="w-full flex justify-between items-center py-5 text-slate-800 font-semibold hover:text-[var(--primary)] transition-all">
                <span class="text-left">Wie verwende ich Gutscheincodes auf Price in Danger?</span>
                <span id="icon-5" class="transition-transform duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                        <path d="M8.75 3.75a.75.75 0 0 0-1.5 0v3.5h-3.5a.75.75 0 0 0 0 1.5h3.5v3.5a.75.75 0 0 0 1.5 0v-3.5h3.5a.75.75 0 0 0 0-1.5h-3.5v-3.5Z" />
                    </svg>
                </span>
            </button>
            <div id="content-5" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                <div class="pb-5 text-sm text-slate-500">
                    Suchen Sie einfach den Shop oder die Kategorie, für die Sie sich interessieren, stöbern Sie durch die verfügbaren Gutscheincodes und verwenden Sie sie beim Checkout, um Ihre Ersparnisse zu genießen.
                </div>
            </div>
        </div>

        <!-- Accordion Item 6 -->
        <div class="border-b border-slate-200">
            <button onclick="toggleAccordion(6)" class="w-full flex justify-between items-center py-5 text-slate-800 font-semibold hover:text-[var(--primary)] transition-all">
                <span class="text-left">Kann ich meine Lieblings-Gutscheincodes speichern?</span>
                <span id="icon-6" class="transition-transform duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                        <path d="M8.75 3.75a.75.75 0 0 0-1.5 0v3.5h-3.5a.75.75 0 0 0 0 1.5h3.5v3.5a.75.75 0 0 0 1.5 0v-3.5h3.5a.75.75 0 0 0 0-1.5h-3.5v-3.5Z" />
                    </svg>
                </span>
            </button>
            <div id="content-6" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                <div class="pb-5 text-sm text-slate-500">
                    Ja, Sie können Ihre Lieblings-Gutscheincodes für zukünftige Verwendung speichern.
                </div>
            </div>
        </div>

        <!-- Accordion Item 7 -->
        <div class="border-b border-slate-200">
            <button onclick="toggleAccordion(7)" class="w-full flex justify-between items-center py-5 text-slate-800 font-semibold hover:text-[var(--primary)] transition-all">
                <span class="text-left">Bietet Price in Danger exklusive Rabatte?</span>
                <span id="icon-7" class="transition-transform duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                        <path d="M8.75 3.75a.75.75 0 0 0-1.5 0v3.5h-3.5a.75.75 0 0 0 0 1.5h3.5v3.5a.75.75 0 0 0 1.5 0v-3.5h3.5a.75.75 0 0 0 0-1.5h-3.5v-3.5Z" />
                    </svg>
                </span>
            </button>
            <div id="content-7" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                <div class="pb-5 text-sm text-slate-500">
                    Ja, Price in Danger bietet exklusive Rabatte und Deals, die nirgendwo anders erhältlich sind.
                </div>
            </div>
        </div>

        <!-- Accordion Item 8 -->
        <div class="border-b border-slate-200">
            <button onclick="toggleAccordion(8)" class="w-full flex justify-between items-center py-5 text-slate-800 font-semibold hover:text-[var(--primary)] transition-all">
                <span class="text-left">Wie kann ich den Kundensupport von Price in Danger erreichen?</span>
                <span id="icon-8" class="transition-transform duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                        <path d="M8.75 3.75a.75.75 0 0 0-1.5 0v3.5h-3.5a.75.75 0 0 0 0 1.5h3.5v3.5a.75.75 0 0 0 1.5 0v-3.5h3.5a.75.75 0 0 0 0-1.5h-3.5v-3.5Z" />
                    </svg>
                </span>
            </button>
            <div id="content-8" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                <div class="pb-5 text-sm text-slate-500">
                    Der Kundensupport von Price in Danger ist immer verfügbar und kann über die Website kontaktiert werden.
                </div>
            </div>
        </div>

        <!-- Accordion Item 9 -->
        <div class="border-b border-slate-200">
            <button onclick="toggleAccordion(9)" class="w-full flex justify-between items-center py-5 text-slate-800 font-semibold hover:text-[var(--primary)] transition-all">
                <span class="text-left">Warum soll ich Gutscheincodes auf Price in Danger verwenden?</span>
                <span id="icon-9" class="transition-transform duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                        <path d="M8.75 3.75a.75.75 0 0 0-1.5 0v3.5h-3.5a.75.75 0 0 0 0 1.5h3.5v3.5a.75.75 0 0 0 1.5 0v-3.5h3.5a.75.75 0 0 0 0-1.5h-3.5v-3.5Z" />
                    </svg>
                </span>
            </button>
            <div id="content-9" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                <div class="pb-5 text-sm text-slate-500">
                    Durch die Verwendung von Gutscheincodes auf Price in Danger können Sie viel Geld bei Ihren Online-Einkäufen sparen.
                </div>
            </div>
        </div>

        <!-- Accordion Item 10 -->
        <div class="border-b border-slate-200">
            <button onclick="toggleAccordion(10)" class="w-full flex justify-between items-center py-5 text-slate-800 font-semibold hover:text-[var(--primary)] transition-all">
                <span class="text-left">Ist Price in Danger vertrauenswürdig?</span>
                <span id="icon-10" class="transition-transform duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                        <path d="M8.75 3.75a.75.75 0 0 0-1.5 0v3.5h-3.5a.75.75 0 0 0 0 1.5h3.5v3.5a.75.75 0 0 0 1.5 0v-3.5h3.5a.75.75 0 0 0 0-1.5h-3.5v-3.5Z" />
                    </svg>
                </span>
            </button>
            <div id="content-10" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                <div class="pb-5 text-sm text-slate-500">
                    Ja, Price in Danger ist eine vertrauenswürdige Website, die sich auf Gutscheincodes für Online-Shops in Deutschland spezialisiert hat.
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