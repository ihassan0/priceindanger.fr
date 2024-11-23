<div
    class="flex flex-col justify-between swiper-slide border rounded-lg overflow-hidden shadow bg-[#F5F5F5] hover:shadow-lg transition duration-200">
    <div class="flex justify-center sm:mb-4 mb-1">
        <img src="{{ asset('storage/'. $coupon->store->logo) }}" alt="{{ $coupon->store->store_name }}"
            class="object-cover w-full h-40">
    </div>

    <div class="p-3 relative">
        @if ($coupon->exclusive_coupons == 1)
        <div class="text-end absolute right-0 -top-4">
            <span
                class="bg-[var(--primary)] text-white text-xs shadow-lg rounded-l-full px-3 py-1 ml-auto">Exclusive</span>
        </div>
        @endif
        <h3 class="text-lg font-semibold ">{{ $coupon->name }}</h3>

        <!-- Description -->
        <div>
            <div id="description-{{ $coupon->id }}" class="description-content transition-all duration-300"
                style="max-height: 0; overflow: hidden;">
                <p style="color:black;">{{$coupon->description}}</p>
            </div>
            <button id="toggleButton-{{ $coupon->id }}" class="p-0 text-[12px] sm:text-sm" style="color: #DA3737;"><i
                    class="fa-solid fa-chevron-down"></i> Plus d'informations</button>
        </div>


        <div class="flex justify-between items-center sm:mt-4 text-gray-500 text-sm">
            <span>Weitere Details</span>
            <span class="flex items-center">
                <i class="far fa-calendar-alt mr-1"></i>{{ $coupon->expiry_date }}
            </span>
        </div>
        <button onclick="buttonClick('{{ $coupon->id }}', '{{ $coupon->code }}', this);"
            class="btn w-full py-2 rounded mt-4 text-sm" data-title="{{ $coupon->name }}"
            data-subtitle="{{ $coupon->description }}" data-code="{{ $coupon->code }}"
            data-store-link="{{ route('storeView',$coupon->store->id) }}" id="couponModal-{{ $coupon->id }}">
            CODE ANZEIGEN
        </button>

    </div>
</div>
<a href="{{ $coupon->store->url }}" hidden id="open-store-{{ $coupon->id }}" target="_self"></a>
@include('components.modal')


<script>
    window.onload = function() {

        const newTabValue = localStorage.getItem('newTab');
        const couponId = localStorage.getItem('couponId');


        if (newTabValue === '1') {
            const button = document.getElementById(`couponModal-${couponId}`);
        if (button) {
            button.click();
        }
            // console.log(data);
            // openModal(data);

        // Call the function directly if newTab value is 1
        }  
        const toggleButtons = document.querySelectorAll('[id^="toggleButton-"]');

        toggleButtons.forEach(button => {
            button.addEventListener('click', function() {
                const couponId = this.id.split('-')[1];
                const description = document.getElementById(`description-${couponId}`);
                const isCollapsed = description.style.maxHeight === "0px";

                if (isCollapsed) {
                    description.style.maxHeight = description.scrollHeight + "px";
                    this.innerHTML = `<i class="fa-solid fa-chevron-up"></i> Moins d'informations`;
                } else {
                    description.style.maxHeight = "0px";
                    this.innerHTML = `<i class="fa-solid fa-chevron-down"></i> Plus d'informations`;
                }
            });
        });
    }

    function openCurrentPageInNewTab(couponId, couponCode) {
    localStorage.setItem("couponId", couponId);
    localStorage.setItem("couponCode", couponCode);
    localStorage.setItem("newTab", 1);
    window.open(window.location.href, "_blank");
    document.getElementById(`open-store-${couponId}`).click();
}


function buttonClick(couponId, couponCode, data) {
    const newTabValue = localStorage.getItem('newTab');

    if (newTabValue === '1') {
        openModal(data);
    
    }else{
        localStorage.setItem("couponId", couponId);
    localStorage.setItem("couponCode", couponCode);
    localStorage.setItem("newTab", 1);
    window.open(window.location.href, "_blank");
    document.getElementById(`open-store-${couponId}`).click();

    }
}
</script>