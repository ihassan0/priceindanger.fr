<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactez-nous | Priceindanger.fr</title>
     <link rel="icon" href="{{ asset('logos/favicon.png') }}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <style>
        .contact_icon::before {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            background-color: var(--secondary);
            transition: all 0.5s ease-in-out;
            -moz-transform: scale(0);
            -webkit-transform: scale(0);
            transform: scale(0);
            border-radius: 100%;
            z-index: -1;
        }

        .contact_icon {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 8px auto;
            border: 1px solid var(--secondary);
            height: 80px;
            width: 80px;
            text-align: center;
            overflow: hidden;
            border-radius: 100%;
            position: relative;
            z-index: 1;
        }

        .contact-wrapper:hover .contact_icon::before {
            -moz-transform: scale(1);
            -webkit-transform: scale(1);
            transform: scale(1);
        }

        .contact_icon svg {
            transition: all 0.5s ease-in-out;
        }

        .contact-wrapper:hover .contact_icon svg {
            color: white;
        }
    </style>
</head>

<body>
    <!-- Navbar  -->
    @include('components.navbar')
    <!-- Navbar Ends  -->


    <!-- Breadcrums start -->
    @include('components.breadcrums', ['current_page' => "Contactez-nous"])
    <!-- Breadcrums end -->

    <section class="container">
        <div class="grid md:grid-cols gap-3 my-10">
            <!--<div class="contact-wrapper text-center shadow-lg py-14 rounded-md">-->
            <!--    <div class="contact_icon text-[var(--secondary)]">-->
            <!--        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"-->
            <!--            stroke="currentColor" class="size-10">-->
            <!--            <path stroke-linecap="round" stroke-linejoin="round"-->
            <!--                d="M9 6.75V15m6-6v8.25m.503 3.498 4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 0 0-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0Z" />-->
            <!--        </svg>-->
            <!--    </div>-->
            <!--    <div class="contact_text">-->
            <!--        <span class="font-semibold text-[17px] opacity-80">Adresse</span>-->
            <!--        <p class="text-dark text-sm">Lahore, Pakistan</p>-->
            <!--    </div>-->
            <!--</div>-->
            <div class="contact-wrapper text-center shadow-lg py-14 rounded-md">
                <div class="contact_icon text-[var(--secondary)]">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-10">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21.75 9v.906a2.25 2.25 0 0 1-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 0 0 1.183 1.981l6.478 3.488m8.839 2.51-4.66-2.51m0 0-1.023-.55a2.25 2.25 0 0 0-2.134 0l-1.022.55m0 0-4.661 2.51m16.5 1.615a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V8.844a2.25 2.25 0 0 1 1.183-1.981l7.5-4.039a2.25 2.25 0 0 1 2.134 0l7.5 4.039a2.25 2.25 0 0 1 1.183 1.98V19.5Z" />
                    </svg>
                </div>
                <div class="contact_text">
                    <span class="font-semibold text-[17px] opacity-80">Adresse email</span> <br>
                    <a href="mailto:info@sitename.com" class="text-dark">admin@priceindanger.com</a>
                </div>
            </div>
        </div>

        <div class="relative py-14 p-10 mb-10">
            <div class="lg:w-2/4 mx-auto text-center">
                <div class="mb-6">
                    <h2 class="text-white text-3xl font-semibold">Entrer en contact</h2>
                </div>
                <p class="mb-6 text-sm leading-6" style="color: #cbcbcb ;">Nous sommes toujours là pour vous ! Si vous avez des questions,
                    Si vous avez des suggestions ou des problèmes, n'hésitez pas à nous contacter. Nous l'attendons avec impatience
                    Pour vous écouter et vous aider.</p>
                <div class="field_form">
                    <form>
                        <div class="flex flex-col md:flex-row gap-4">
                            <input type="text" name="name" placeholder="Ton Nom"
                                class="border border-gray-300 p-3 rounded-md flex-1 focus-within:outline-none">
                            <input type="email" name="name" placeholder="Votre email"
                                class="border border-gray-300 p-3 rounded-md flex-1 focus-within:outline-none">
                        </div>
                        <textarea name="message" rows="4" placeholder="Votre commentaire"
                            class="border border-gray-300 p-3 rounded-md w-full mt-4 focus-within:outline-none"></textarea>
                        <button class="btn rounded-full text-xl w-full overflow-hidden py-2 mt-5">Soumettre</button>
                    </form>
                </div>
            </div>
            <div class="h-full w-full absolute" style="inset: 0; filter:brightness(0.2);z-index:-1;border-radius: 12px;
    background: linear-gradient(315deg, black, #DB3637);">
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