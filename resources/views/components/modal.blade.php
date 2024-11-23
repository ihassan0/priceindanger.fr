{{-- <div id="myModal" class="modal bg-gray-800 bg-opacity-50 hide" onclick="closeModal()">
    <div class="bg-white rounded-lg md:w-2/4 absolute top-10" onclick="event.stopPropagation()">

        <!-- Modal Header -->
        <div class="flex items-center justify-between p-4 border-b border-gray-200 relative">
            <h2 class="font-semibold sm:text-xl opacity-85">Exklusiver 10% Akko Rabattcode</h2>
            <button onclick="closeModal()" class="absolute top-2 right-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3.5"
                    stroke="currentColor" class="size-5 opacity-75">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Modal Body -->

        <div class="md:w-3/4 mx-auto py-8 text-center">
            <h3 class="text-center text-xl mb-5">Kopiere diesen Code</h3>
            <div class="flex items-center justify-between border border-gray-300 rounded-md px-3 py-2">
                <p class="font-semibold">PRICEINDANGER10</p>
                <button class="btn px-3 py-2 rounded-full overflow-hidden">kopieren und los</button>
            </div>
            <div class="text-center my-5 flex items-center justify-center">
                <h4 class="text-lg">Hat es funktioniert?</h4>
                <span class="ms-4 flex items-center gap-2">
                    <i
                        class="fa-regular fa-thumbs-up hover:text-[var(--primary)] cursor-pointer text-lg transition-all"></i>
                    <i
                        class="fa-regular fa-thumbs-down hover:text-[var(--primary)] cursor-pointer text-lg transition-all"></i>
                </span>
            </div>

            <button class="btn px-8 py-3 text-[17px] rounded-full overflow-hidden mx-auto mt-7">Go to Store</button>
        </div>
    </div>
</div> --}}




<div id="myModal" class="modal bg-gray-800 bg-opacity-50 hide" onclick="closeModal()">
    <div class="bg-white rounded-lg md:w-2/4 absolute top-10" onclick="event.stopPropagation()">

        <!-- Modal Header -->
        <div class="flex items-center justify-between p-4 border-b border-gray-200 relative">
            <h2 id="modalTitle" class="font-semibold sm:text-xl opacity-85">Coupon Title</h2>
            <button onclick="closeModal()" class="absolute top-2 right-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3.5"
                    stroke="currentColor" class="size-5 opacity-75">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Modal Body -->
        <div class="md:w-3/4 mx-auto py-8 text-center">
            <h3 id="modalSubtitle" class="text-center text-xl mb-5">Coupon Details</h3>
            <div class="flex items-center justify-between border border-gray-300 rounded-md px-3 py-2">
                <p id="modalCode" class="font-semibold">CODE</p>
                <button class="btn px-3 py-2 rounded-full overflow-hidden" onclick="copyCode()">Copy Code</button>
            </div>
            <div class="text-center my-5 flex items-center justify-center">
                <h4 class="text-lg">Did it work?</h4>
                <span class="ms-4 flex items-center gap-2">
                    <i
                        class="fa-regular fa-thumbs-up hover:text-[var(--primary)] cursor-pointer text-lg transition-all"></i>
                    <i
                        class="fa-regular fa-thumbs-down hover:text-[var(--primary)] cursor-pointer text-lg transition-all"></i>
                </span>
            </div>

            <button id="modalStoreButton" class="btn px-8 py-3 text-[17px] rounded-full overflow-hidden mx-auto mt-7">
                Go to Store
            </button>
        </div>
    </div>
</div>


<style>
    .modal {
        display: flex;
        align-items: center;
        justify-content: center;
        position: fixed;
        inset: 0;
        z-index: 10;
        transition: all 0.2s;
    }

    .modal.show {
        opacity: 100;
        transform: translateY(0px);
        visibility: visible;
    }

    .modal.hide {
        opacity: 0;
        visibility: hidden;
        transform: translateY(-20px);
    }
</style>


<script>
    function openModal() {
        document.getElementById("myModal").classList.remove('hide');
        document.getElementById("myModal").classList.add('show');
    }

    function closeModal() {
        document.getElementById("myModal").classList.remove('show');
        document.getElementById("myModal").classList.add('hide');
    }
</script>

<script>
    function openModal(button) {
    // Extract coupon data from the button's data attributes
    localStorage.removeItem('newTab');
    localStorage.removeItem('couponId');
    const couponTitle = button.getAttribute('data-title');
    const couponSubtitle = button.getAttribute('data-subtitle');
    const couponCode = button.getAttribute('data-code');
    const storeLink = button.getAttribute('data-store-link');

    // Populate the modal with the data
    document.getElementById('modalTitle').textContent = couponTitle;
    document.getElementById('modalSubtitle').textContent = couponSubtitle;
    document.getElementById('modalCode').textContent = couponCode;

    // Set the Go to Store button link
    const storeButton = document.getElementById('modalStoreButton');
    storeButton.textContent = "Go to Store";
    storeButton.onclick = () => window.location.href = storeLink;

    // Show the modal
    const modal = document.getElementById("myModal");
    modal.classList.remove('hide');
    modal.classList.add('show');
}

function closeModal() {
    const modal = document.getElementById("myModal");
    modal.classList.remove('show');
    modal.classList.add('hide');
}

function copyCode() {
    const code = document.getElementById('modalCode').textContent;
    navigator.clipboard.writeText(code).then(() => {
        alert('Coupon code copied!');
    });
}

</script>