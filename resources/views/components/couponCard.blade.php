<div
    class="relative flex flex-col justify-between swiper-slide border rounded-lg shadow bg-[#F5F5F5] hover:shadow-lg transition duration-200">
    <div class="flex justify-center sm:mb-2 mb-1 cursor-pointer" onclick="document.getElementById('couponModal-{{ $coupon->id }}').click();">
        <img src="{{ asset('storage/'. $coupon->store->logo) }}" alt="{{ $coupon->store->store_name }}"
            class="object-cover w-full h-40 rounded-t-lg">
    </div>

    @if ($coupon->exclusive_coupons == 1)
    <div class="bagde-flag-wrap ">
        <span class="bagde-flag">Exclusif</span>
    </div>
    @endif

    <!-- Expiring soon -->
    <div class="bg-[var(--secondary)] text-white px-2 py-1 absolute top-0 right-0 rounded-tr-lg rounded-bl-lg text-xs font-medium">
        <span>Expire bientôt</span>
    </div>

    <div class="p-3 pt-2">
        <h3 class="text-lg font-semibold overflow-hidden text-ellipsis whitespace-nowrap cursor-pointer" onclick="document.getElementById('couponModal-{{ $coupon->id }}').click();">{{ $coupon->name }}</h3>

        <!-- Description -->
        <div>
            <div class="description-content transition-all duration-300" style="max-height: 0; overflow: hidden;">
                <p style="color:black;" class="text-sm">{{$coupon->description}}</p>
            </div>
            <button class="toggleButton p-0 text-[10px] sm:text-sm" style="color: #DA3737;">
                <i class="fa-solid fa-chevron-down"></i> &nbsp;
                Plus d'informations
            </button>
        </div>



        <div class="flex justify-end items-center sm:mt-2 text-gray-500 text-sm min-h-[20px] text-xs sm:text-sm">
            @if ($coupon->expire_date)
            <i class="far fa-calendar-alt mr-1 text-[var(--secondary)]"></i>{{ $coupon->expire_date }}
            @endif
        </div>

        <button onclick="buttonClick('{{ $coupon->id }}', '{{ $coupon->code }}', this);"
            class="btn w-full py-2 rounded mt-4 sm:text-sm text-xs" data-title="{{ $coupon->name }}"
            data-subtitle="{{ $coupon->description }}" data-code="{{ $coupon->code }}" data-url="{{ $coupon->redirect_url ?: $coupon->store->url }}" data-store-link="{{ route('storeView',[$coupon->store->id,  'name' => Str::slug($coupon->store->name).'-codes-promo']) }}" id="couponModal-{{ $coupon->id }}">
            @if($coupon->code !==null) Afficher le code @else Afficher l'offre @endif
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
        }

        document.querySelectorAll('.toggleButton').forEach(button => {
            button.addEventListener('click', function() {
                const description = this.previousElementSibling;
                const isCollapsed = description.style.maxHeight === "0px";

                if (isCollapsed) {
                    description.style.maxHeight = description.scrollHeight + "px";
                    this.innerHTML = `<i class="fa-solid fa-chevron-up mr-1"></i> Moins d'informations`;
                } else {
                    description.style.maxHeight = "0px";
                    this.innerHTML = `<i class="fa-solid fa-chevron-down mr-1"></i> Plus d'informations`;
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

        } else {
            localStorage.setItem("couponId", couponId);
            localStorage.setItem("couponCode", couponCode);
            localStorage.setItem("newTab", 1);
            window.open(window.location.href, "_blank");
            document.getElementById(`open-store-${couponId}`).click();

        }
    }
</script>