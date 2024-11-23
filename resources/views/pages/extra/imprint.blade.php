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


    <section class="container my-10">

        <h3 class="text-2xl font-semibold my-5">Gründerinnen:</h3>

        <div class="flex flex-col md:flex-row gap-6 mb-10">
            <div class="flex-1 rounded-xl p-6" style="box-shadow: rgba(0, 0, 0, 0.2) 0px 0px 10px;">
                <h5 class="text-[26px] border-b-[2px] border-[var(--secondary)] w-fit my-4"><b>Mohsin Aftab</b></h5>
                <ul style="list-style-type:none;">
                    <li class="my-3 text-[#000000a8]"><i class="fa-solid fa-house text-[var(--secondary)] me-2"></i>Via Corticella 2, Verona Italien.</li>
                    <li class="my-3 text-[#000000a8]"><i class="fa-solid fa-envelope text-[var(--secondary)] me-2"></i> admin@priceindanger.com</li>
                    <li class="my-3 text-[#000000a8]"><i class="fa-solid fa-phone text-[var(--secondary)] me-2"></i> +393889506917</li>
                    <li class="my-3 text-[#000000a8]"><b class="text-black">Steuer-ID-Code</b>: FTBMSN84A01Z236L</li>
                </ul>
            </div>
            <div class="flex-1 flex-col md:flex-row rounded-xl p-6" style="box-shadow: rgba(0, 0, 0, 0.2) 0px 0px 10px;">
                <h5 class="text-[26px] border-b-[2px] border-[var(--secondary)] w-fit my-4"><b>Saif ur Rehman</b></h5>
                <ul style="list-style-type:none;">
                    <li class="my-3 text-[#000000a8]"><i class="fa-solid fa-house text-[var(--secondary)] me-2"></i></i> Jandiala Road, Sheikhupura, Pakistan.</li>
                    <li class="my-3 text-[#000000a8]"><i class="fa-solid fa-envelope text-[var(--secondary)] me-2"></i> admin@priceindanger.com</li>
                    <li class="my-3 text-[#000000a8]"><i class="fa-solid fa-phone text-[var(--secondary)] me-2"></i> +923234371366</li>
                    <li class="my-3 text-[#000000a8]"><b class="text-black">NTN</b>: 5659606</li>
                </ul>
            </div>

        </div>

        <h3 class="text-2xl font-semibold my-5">Finanzvorstand:</h3>
        <div class="md:w-2/4 rounded-xl p-6" style="box-shadow: rgba(0, 0, 0, 0.2) 0px 0px 10px;">
            <h5 class="text-[26px] border-b-[2px] border-[var(--secondary)] w-fit my-4"><b>Maham Shuakat</b></h5>
            <ul style="list-style-type:none;">
                <li class="my-3 text-[#000000a8]"><i class="fa-solid fa-user text-[var(--secondary)] me-2"></i>CFO (Chief Financial Officer)</li>
                <li class="my-3 text-[#000000a8]"><i class="fa-solid fa-envelope text-[var(--secondary)] me-2"></i> mahamshuakat@priceindanger.com</li>
            </ul>
        </div>

        <p class="mt-8 text-sm tracking-wider leading-7 text-pretty">Priceindanger.com lehnt jegliche Haftung für Verluste oder Schäden ab, die sich aus der Nutzung dieser Website ergeben, sei es direkt, indirekt, zufällig, als Folge oder anderweitig. Dazu gehören unter anderem entgangener Gewinn, Datenverlust oder Verlust des Firmenwerts. Priceindanger.com gibt keine Zusicherungen oder Gewährleistungen hinsichtlich der Richtigkeit, Vollständigkeit oder Aktualität der Informationen auf dieser Website. Die Informationen werden ohne Mängelgewähr bereitgestellt und Priceindanger.com lehnt jegliche Haftung für etwaige Fehler oder Auslassungen in den Informationen ab. Priceindanger.com ist nicht verantwortlich für den Inhalt externer Links. Die Inhalte dieser Website sind urheberrechtlich geschützt. Ohne die ausdrückliche Genehmigung von Priceindanger.com ist es Ihnen nicht gestattet, die Website oder ihren Inhalt zu reproduzieren, zu verbreiten oder daraus abgeleitete Werke zu erstellen.</p>
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