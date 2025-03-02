<!--<section class="bg-[var(--secondary)] text-white">-->
<!--    <div class="flex flex-col md:flex-row items-center justify-center py-10 px-5 md:px-10 gap-5 max-w-6xl mx-auto">-->
<!--        <div class="flex items-center gap-5 flex-1">-->
<!--            <i class="fa-regular fa-paper-plane opacity-30 text-5xl"></i>-->
<!--            <span>-->
<!--                <h1 class="md:text-3xl text-xl font-semibold text-white">Abonnez-vous et économisez!</h1>-->
<!--                <p class="text-sm">Trouvez les meilleures offres en un seul endroit.</p>-->
<!--            </span>-->
<!--        </div>-->
<!--        <div class="relative flex-1 flex items-center w-full md:w-auto">-->
<!--            <input type="email" name="email" placeholder="Entrez l'adresse e-mail" class="bg-white text-black w-full md:h-16 h-12 py-3 px-6 rounded-full focus-visible:outline-none placeholder:opacity-95 ">-->
<!--            <button class="absolute right-1 md:py-4 py-2 md:px-16 px-5 rounded-full bg-[#343A40] hover:bg-[#23272B]">S'abonner</button>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->



@if(session('success'))
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: "success",
                title: "Succès",
                text: "{{ session('success') }}",
                confirmButtonColor: "#343A40",
            });
        });
    </script>
@endif


@if(session('error'))
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: "error",
                title: "Désolé",
                text: "{{ session('error') }}",
                confirmButtonColor: "#343A40",
            });
        });
    </script>
@endif

<section class="bg-[var(--secondary)] text-white">
    <div class="flex flex-col md:flex-row items-center justify-center py-10 px-5 md:px-10 gap-5 max-w-6xl mx-auto">
        <div class="flex items-center gap-5 flex-1">
            <i class="fa-regular fa-paper-plane opacity-30 text-5xl"></i>
            <span>
                <h1 class="md:text-3xl text-xl font-semibold text-white">Abonnez-vous et économisez!</h1>
                <p class="text-sm">Trouvez les meilleures offres en un seul endroit.</p>
            </span>
        </div>
        <div class="relative flex-1 flex items-center w-full md:w-auto">
            <form action="{{ route('newsletter.subscribe') }}" method="POST" class="w-full flex relative">
                @csrf
                <input type="email" name="email" required placeholder="Entrez l'adresse e-mail" class="bg-white text-black w-full md:h-16 h-12 py-3 px-6 rounded-full focus-visible:outline-none placeholder:opacity-95">
                <button type="submit" class="absolute right-1 top-1/2 transform -translate-y-1/2 md:py-4 py-2 md:px-16 px-5 rounded-full bg-[#343A40] hover:bg-[#23272B] focus:outline-none">S'abonner</button>
            </form>
        </div>
    </div>
</section>


