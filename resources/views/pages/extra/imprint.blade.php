<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imprimer | Priceindanger.fr</title>
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
    @include('components.breadcrums', ['current_page' => "Imprimer"])
    <!-- Breadcrums end -->


    <section class="container my-10">

        <h3 class="text-2xl font-semibold my-5">Fondateur:</h3>

        <div class="flex flex-col md:flex-row gap-6 mb-10">
            <div class="flex-1 flex-col md:flex-row rounded-xl p-6"
                style="box-shadow: rgba(0, 0, 0, 0.2) 0px 0px 10px;">
                <h5 class="text-[26px] border-b-[2px] border-[var(--secondary)] w-fit my-4"><b>Saif ur Rehman</b></h5>
                <ul style="list-style-type:none;">
                    <li class="my-3 text-[#000000a8]"><i class="fa-solid fa-house text-[var(--secondary)] me-2"></i></i>
                        Jandiala Road, Sheikhupura, Pakistan.</li>
                    <li class="my-3 text-[#000000a8]"><i class="fa-solid fa-envelope text-[var(--secondary)] me-2"></i>
                        admin@priceindanger.com</li>
                    <li class="my-3 text-[#000000a8]"><i class="fa-solid fa-phone text-[var(--secondary)] me-2"></i>
                        +923234371366</li>
                    <li class="my-3 text-[#000000a8]"><b class="text-black">NTN</b>: 5659606</li>
                </ul>
            </div>

        </div>

        <h3 class="text-2xl font-semibold my-5">Directeur financier:</h3>
        <div class="md:w-2/4 rounded-xl p-6" style="box-shadow: rgba(0, 0, 0, 0.2) 0px 0px 10px;">
            <h5 class="text-[26px] border-b-[2px] border-[var(--secondary)] w-fit my-4"><b>Maham Shuakat</b></h5>
            <ul style="list-style-type:none;">
                <li class="my-3 text-[#000000a8]"><i class="fa-solid fa-user text-[var(--secondary)] me-2"></i>CFO
                    (Chief Financial Officer)</li>
                <li class="my-3 text-[#000000a8]"><i class="fa-solid fa-envelope text-[var(--secondary)] me-2"></i>
                    mahamshuakat@priceindanger.com</li>
            </ul>
        </div>

        <p class="mt-8 text-sm tracking-wider leading-7 text-pretty">Priceindanger.fr décline toute responsabilité pour toute perte ou dommage résultant de l'utilisation de ce site Web, qu'il soit direct, indirect, accidentel, consécutif ou autre. Celles-ci incluent, sans toutefois s'y limiter, la perte de profits, la perte de données ou la perte de clientèle. Priceindanger.com ne fait aucune déclaration ou garantie quant à l'exactitude, l'exhaustivité ou l'actualité des informations contenues dans ce site Web. Les informations sont fournies « telles quelles » et Priceindanger.com décline toute responsabilité pour toute erreur ou omission dans les informations. Priceindanger.com n'est pas responsable du contenu des liens externes. Le contenu de ce site Web est protégé par le droit d'auteur. Vous ne pouvez pas reproduire, distribuer ou créer des œuvres dérivées du site ou de son contenu sans l'autorisation expresse de Priceindanger.fr.</p>
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