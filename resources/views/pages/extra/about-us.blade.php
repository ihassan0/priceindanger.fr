<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>À propos de nous | Priceindanger.fr</title>
     <link rel="icon" href="{{ asset('logos/favicon.png') }}" type="image/x-icon">
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
    @include('components.breadcrums', ['current_page' => "À propos de nous"])
    <!-- Breadcrums end -->

   <section>
    <div class="banner relative overflow-hidden">
        <div class="md:absolute inset-0 mb-4 mb-lg-0">
            <img src="{{ asset('assets/images/about.webp') }}" alt="about_img" class="w-full brightness-[0.4]">
        </div>
        <div class="content relative z-[2] px-4 md:px-14 md:py-28 md:w-3/4 text-sm tracking-wider leading-6">
            <p class="md:text-white">Bienvenue chez Price in Danger
                Bienvenue chez Price in Danger, votre destination pour les codes promo pour toutes les boutiques en ligne en Allemagne. Nous comprenons l'importance de l'argent et des économies face à la hausse du coût de la vie.
                C'est pourquoi nous nous spécialisons dans l'aide à nos utilisateurs pour économiser de l'argent lors de leurs achats, sans compromettre la qualité ou le confort. Chez nous, vous trouverez une large sélection de codes promo adaptés à vos besoins.
            </p>
        </div>
    </div>

    <div class="container my-10 mt-14">
        <div class="mb-8">
            <div class="heading mb-6">
                <h2 class="w-fit relative font-bold text-3xl ">Notre mission</h2>
            </div>
            <p class="text-dark leading-7 text-sm opacity-75 tracking-wider">Notre mission chez Price in Danger est d'aider nos utilisateurs à économiser de l'argent lors de leurs achats en ligne, sans compromettre la qualité ou le confort. Nous travaillons dur pour offrir une large gamme de codes promo pour toutes les boutiques en ligne en Allemagne.
                Nous sommes convaincus que tout le monde a le droit d'économiser de l'argent en faisant du shopping en ligne, et nous nous engageons à garantir les meilleures offres pour nos utilisateurs.
            </p>
        </div>
        <div class="mb-8">
            <div class="heading mb-6">
                <h2 class="w-fit relative font-bold text-3xl ">Notre vision</h2>
            </div>
            <p class="text-dark leading-7 text-sm opacity-75 tracking-wider">Notre vision chez Price in Danger est de devenir le principal fournisseur de codes promo pour les boutiques en ligne en Allemagne. Nous voulons donner à nos utilisateurs la possibilité d'économiser de l'argent sur leurs achats en ligne sans sacrifier la qualité ou le confort. Nous nous efforçons d'améliorer continuellement notre plateforme et d'offrir la meilleure expérience possible à nos clients.
            </p>
        </div>
        <div class="mb-8">
            <div class="heading mb-6">
                <h2 class="w-fit relative font-bold text-3xl ">Comment nous travaillons</h2>
            </div>
            <p class="text-dark leading-7 text-sm opacity-75 tracking-wider">Chez Price in Danger, nous travaillons dur pour offrir les meilleurs codes promo pour toutes les boutiques en ligne en Allemagne. Notre équipe collabore étroitement avec les principales boutiques en ligne pour garantir que nous avons les meilleures offres pour nos utilisateurs. Nous sommes toujours à la recherche de nouvelles boutiques en ligne pour élargir notre offre et proposer une sélection encore plus large de codes promo.
            </p>
        </div>
        <div class="mb-8">
            <div class="heading mb-6">
                <h2 class="w-fit relative font-bold text-3xl ">Notre offre</h2>
            </div>
            <p class="text-dark leading-7 text-sm opacity-75 tracking-wider">Chez Price in Danger, nous proposons des codes promo pour un large éventail de boutiques en ligne en Allemagne. Nous collaborons étroitement avec les leaders du marché pour garantir les meilleures offres à nos utilisateurs. Nous offrons des codes promo pour divers produits et services, y compris la mode, l'électronique, les voyages, les loisirs, et bien plus encore. Vous trouverez toujours un code promo adapté à vos besoins.
            </p>
        </div>
        <div class="mb-8">
            <div class="heading mb-6">
                <h2 class="w-fit relative font-bold text-3xl ">Notre service client</h2>
            </div>
            <p class="text-dark leading-7 text-sm opacity-75 tracking-wider">Chez Price in Danger, la satisfaction client est notre priorité. Notre équipe de service client est toujours disponible pour répondre à vos questions ou résoudre vos problèmes. Nous nous engageons à offrir la meilleure expérience possible à nos utilisateurs en traitant toutes les demandes de manière rapide et efficace.
            </p>
        </div>
        <div class="mb-8">
            <div class="heading mb-6">
                <h2 class="w-fit relative font-bold text-3xl ">Notre garantie</h2>
            </div>
            <p class="text-dark leading-7 text-sm opacity-75 tracking-wider">Chez Price in Danger, nous garantissons que tous les codes promo présents sur notre site sont valides et à jour. Nous mettons régulièrement à jour nos codes pour nous assurer qu'ils fonctionnent et que nos utilisateurs obtiennent les meilleures offres. Nous nous engageons à offrir une expérience d'achat optimale en garantissant que nos codes promo sont faciles à utiliser et que notre site est simple à naviguer.
            </p>
        </div>
        <div class="mb-8">
            <div class="heading mb-6">
                <h2 class="w-fit relative font-bold text-3xl ">Ce qui nous distingue des autres sites de coupons</h2>
            </div>
            <p class="text-dark leading-7 text-sm opacity-75 tracking-wider mb-5">Il existe de nombreux sites de coupons, mais chez Price in Danger, nous pensons que nous nous démarquons grâce à nos avantages uniques. Voici quelques raisons pour lesquelles vous devriez choisir Price in Danger :
            </p>

            <div class="mb-5">
                <h3 class="font-semibold text-2xl mb-4">Une large sélection de coupons</h3>
                <p class="text-dark leading-7 text-sm opacity-75 tracking-wider">Nous proposons des coupons pour une multitude de boutiques en ligne en Allemagne, couvrant la mode, la beauté, l'électronique et les appareils ménagers. Nos utilisateurs peuvent être certains de trouver des réductions pour leurs marques préférées.
                </p>
            </div>
            <div class="mb-5">
                <h3 class="font-semibold text-2xl mb-4">Des coupons garantis valides</h3>
                <p class="text-dark leading-7 text-sm opacity-75 tracking-wider">Nous mettons régulièrement à jour nos coupons pour nous assurer qu'ils sont toujours valides et utilisables. Nos utilisateurs peuvent être sûrs d'économiser de l'argent en utilisant nos coupons.
                </p>
            </div>
            <div class="mb-5">
                <h3 class="font-semibold text-2xl mb-4">Utilisation simple</h3>
                <p class="text-dark leading-7 text-sm opacity-75 tracking-wider">Notre site est convivial et facile à naviguer. Les utilisateurs peuvent simplement rechercher leur boutique en ligne préférée, copier le code promo et l'appliquer lors de l'achat pour économiser immédiatement.
                </p>
            </div>
            <div class="mb-5">
                <h3 class="font-semibold text-2xl mb-4">Service client fiable</h3>
                <p class="text-dark leading-7 text-sm opacity-75 tracking-wider">Notre équipe de service client est toujours disponible pour répondre aux questions ou résoudre les problèmes. Nous nous engageons à offrir la meilleure expérience possible avec Price in Danger.
                </p>
            </div>
            <div class="mb-5">
                <h3 class="font-semibold text-2xl mb-4">Offres exclusives</h3>
                <p class="text-dark leading-7 text-sm opacity-75 tracking-wider">Nous proposons à nos utilisateurs des offres exclusives et des codes promo introuvables sur d'autres sites de coupons. Cela leur permet d'économiser encore plus et de bénéficier des meilleures offres. Essayez Price in Danger dès aujourd'hui et laissez-nous vous aider à économiser de l'argent !
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