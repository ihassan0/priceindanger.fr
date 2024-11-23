<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Navbar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <style>
        .heading h2::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0px;
            border-radius: 100px;
            width: 100px;
            height: 2px;
            background-color: var(--secondary);
            transition: all 0.5s;
        }

        .heading h2:hover::after {
            width: 100%;
        }
    </style>
</head>

<body>
    <!-- Navbar  -->
    @include('components.navbar')
    <!-- Navbar Ends  -->


    <!-- Breadcrums start -->
    @include('components.breadcrums', ['current_page' => "Coupons"])
    <!-- Breadcrums end -->

    <section>
        
        <div class="banner relative overflow-hidden">
            <div class="md:absolute inset-0 mb-4 mb-lg-0">
                <img src="{{ asset('assets/images/about.webp') }}" alt="about_img" class="w-full brightness-[0.4]">
            </div>
            <div class="content relative z-[2] px-4 md:px-14 md:py-28 md:w-3/4 text-sm tracking-wider leading-6">
                <p class="md:text-white">Willkommen bei Price in Danger
                    Herzlich willkommen bei Price in Danger, Ihrer Anlaufstelle für Gutschein-Codes für alle Online-Shops in Deutschland. Wir verstehen den Wert des Geldes und des Sparens bei steigenden Lebenshaltungskosten.
                    Deshalb haben wir uns darauf spezialisiert, unseren Nutzern bei ihren Einkäufen Geld zu sparen, ohne dabei auf Qualität oder Bequemlichkeit verzichten zu müssen. Bei uns finden Sie eine breite Auswahl an Gutschein-Codes, die speziell auf Ihre Bedürfnisse zugeschnitten sind.
                </p>
            </div>
        </div>

        <div class="container my-10 mt-14">
            <div class="mb-8">
                <div class="heading mb-6">
                    <h2 class="w-fit relative font-bold text-3xl ">Unsere Mission</h2>
                </div>
                <p class="text-dark leading-7 text-sm opacity-75 tracking-wider">Unsere Mission bei Price in Danger ist es, unseren Nutzern dabei zu helfen, beim Online-Einkauf Geld zu sparen, ohne dabei auf Qualität oder Bequemlichkeit verzichten zu müssen. Wir arbeiten hart daran, unseren Kunden eine breite Palette von Gutschein-Codes für alle Online-Shops in Deutschland anzubieten.
                    Wir sind davon überzeugt, dass jeder Mensch das Recht hat, beim Online-Shopping Geld zu sparen, und wir setzen uns dafür ein, dass unsere Nutzer die besten Angebote erhalten.
                </p>
            </div>
            <div class="mb-8">
                <div class="heading mb-6">
                    <h2 class="w-fit relative font-bold text-3xl ">Unsere Vision</h2>
                </div>
                <p class="text-dark leading-7 text-sm opacity-75 tracking-wider">Unsere Vision bei Price in Danger ist es, der führende Anbieter von Gutschein-Codes für Online-Shops in Deutschland zu werden. Wir möchten unseren Nutzern die Möglichkeit geben, beim Online-Einkauf Geld zu sparen, ohne dabei auf Qualität oder Bequemlichkeit verzichten zu müssen. Wir sind bestrebt, unsere Plattform kontinuierlich zu verbessern und unseren Kunden die bestmögliche Erfahrung zu bieten.
                </p>
            </div>
            <div class="mb-8">
                <div class="heading mb-6">
                    <h2 class="w-fit relative font-bold text-3xl ">Wie wir arbeiten</h2>
                </div>
                <p class="text-dark leading-7 text-sm opacity-75 tracking-wider">Bei Price in Danger arbeiten wir hart daran, unseren Nutzern die besten Gutschein-Codes für alle Online-Shops in Deutschland anzubieten. Unser Team arbeitet eng mit den führenden Online-Shops in Deutschland zusammen, um sicherzustellen, dass wir die besten Angebote für unsere Nutzer haben. Wir sind immer auf der Suche nach neuen Online-Shops, um unser Angebot zu erweitern und unseren Nutzern eine breitere Auswahl an Gutschein-Codes anzubieten.
                </p>
            </div>
            <div class="mb-8">
                <div class="heading mb-6">
                    <h2 class="w-fit relative font-bold text-3xl ">Unser Angebot</h2>
                </div>
                <p class="text-dark leading-7 text-sm opacity-75 tracking-wider">Bei Price in Danger bieten wir Gutschein-Codes für eine breite Palette von Online-Shops in Deutschland an. Wir arbeiten eng mit den führenden Online-Shops zusammen, um sicherzustellen, dass wir die besten Angebote für unsere Nutzer haben. Wir bieten Gutschein-Codes für alle Arten von Produkten und Dienstleistungen, darunter Kleidung, Elektronik, Reisen, Unterhaltung und vieles mehr. Bei uns finden Sie immer einen Gutschein-Code, der auf Ihre Bedürfnisse zugeschnitten ist.
                </p>
            </div>
            <div class="mb-8">
                <div class="heading mb-6">
                    <h2 class="w-fit relative font-bold text-3xl ">Unser Kundenservice</h2>
                </div>
                <p class="text-dark leading-7 text-sm opacity-75 tracking-wider">Bei Price in Danger legen wir großen Wert auf Kundenzufriedenheit. Unser Kundenservice-Team ist immer für Sie da und unterstützt Sie bei allen Fragen oder Problemen, die Sie haben könnten. Wir sind bestrebt, unseren Kunden die bestmögliche Erfahrung zu bieten, und wir arbeiten hart daran, sicherzustellen, dass alle Anfragen schnell und effektiv bearbeitet werden.
                </p>
            </div>
            <div class="mb-8">
                <div class="heading mb-6">
                    <h2 class="w-fit relative font-bold text-3xl ">Unsere Garantie</h2>
                </div>
                <p class="text-dark leading-7 text-sm opacity-75 tracking-wider">Bei Price in Danger garantieren wir unseren Nutzern, dass alle Gutschein-Codes auf unserer Website gültig und aktuell sind. Wir aktualisieren unsere Gutschein-Codes regelmäßig, um sicherzustellen, dass sie immer funktionieren und unsere Nutzer die besten Angebote erhalten. Wir sind bestrebt, unseren Nutzern die bestmögliche Erfahrung beim Einkaufen zu bieten, indem wir sicherstellen, dass unsere Gutschein-Codes leicht zu verwenden sind und dass unsere Website einfach zu navigieren ist.
                </p>
            </div>
            <div class="mb-8">
                <div class="heading mb-6">
                    <h2 class="w-fit relative font-bold text-3xl ">Was uns von anderen Gutschein-Anbietern unterscheidet</h2>
                </div>
                <p class="text-dark leading-7 text-sm opacity-75 tracking-wider mb-5">Es gibt viele Gutschein-Websites, aber bei Price in Danger sind wir der Meinung, dass wir uns durch unsere einzigartigen Vorteile von anderen abheben. Hier sind einige Gründe, warum Sie Price in Danger wählen sollten:
                </p>

                <div class="mb-5">
                    <h3 class="font-semibold text-2xl mb-4">Eine breite Auswahl an Gutscheinen</h3>
                    <p class="text-dark leading-7 text-sm opacity-75 tracking-wider">Wir bieten Gutscheine für eine Vielzahl von Online-Shops in Deutschland an, von Mode und Schönheit bis hin zu Elektronik und Haushaltsgeräten. Unsere Nutzer können sicher sein, dass sie bei uns Gutscheine für ihre bevorzugten Marken finden werden.
                    </p>
                </div>
                <div class="mb-5">
                    <h3 class="font-semibold text-2xl mb-4">Garantiert gültige Gutscheine</h3>
                    <p class="text-dark leading-7 text-sm opacity-75 tracking-wider">Wir aktualisieren unsere Gutscheine regelmäßig, um sicherzustellen, dass sie immer gültig und aktuell sind. Unsere Nutzer können sich darauf verlassen, dass sie beim Einkauf mit unseren Gutscheinen immer Geld sparen werden.
                    </p>
                </div>
                <div class="mb-5">
                    <h3 class="font-semibold text-2xl mb-4">Einfache Nutzung</h3>
                    <p class="text-dark leading-7 text-sm opacity-75 tracking-wider">Unsere Website ist benutzerfreundlich und einfach zu navigieren. Nutzer können einfach nach ihrem bevorzugten Online-Shop suchen, den Gutschein-Code kopieren und beim Kauf anwenden, um sofort zu sparen.
                    </p>
                </div>
                <div class="mb-5">
                    <h3 class="font-semibold text-2xl mb-4">Zuverlässiger Kundenservice</h3>
                    <p class="text-dark leading-7 text-sm opacity-75 tracking-wider">Unser Kundenservice-Team steht unseren Nutzern jederzeit zur Verfügung, um Fragen zu beantworten oder Probleme zu lösen. Wir sind bestrebt, sicherzustellen, dass unsere Nutzer die bestmögliche Erfahrung mit Price in Danger haben.
                    </p>
                </div>
                <div class="mb-5">
                    <h3 class="font-semibold text-2xl mb-4">Exklusive Angebote</h3>
                    <p class="text-dark leading-7 text-sm opacity-75 tracking-wider">Wir bieten unseren Nutzern exklusive Angebote und Gutscheine, die auf anderen Gutschein-Websites nicht verfügbar sind. So können unsere Nutzer noch mehr sparen und die besten Deals erhalten. Insgesamt glauben wir, dass Price in Danger die beste Wahl für Nutzer ist, die nach Gutscheinen und Rabatten für ihre bevorzugten Online-Shops suchen. Unsere breite Auswahl an Gutscheinen, garantiert gültigen Codes, einfache Nutzung, zuverlässiger Kundenservice und exklusiven Angebote setzen uns von anderen Gutschein-Websites ab. Probieren Sie uns heute aus und lassen Sie uns Ihnen helfen, Geld zu sparen.
                    </p>
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