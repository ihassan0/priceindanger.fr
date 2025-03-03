<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>priceindanger - Create Coupons</title>

    <!-- General CSS Files -->
    @include('Admin.components.css-links')

    <!-- CSS Libraries -->
    @include('Admin.components.css-forms')

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ url('admin/assets/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ url('admin/assets/css/components.min.css') }}">
</head>

<body class="layout-4">
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            {{-- START OF NAV --}}
            @include('Admin.components.nav')

            <!-- Start main left sidebar menu -->
            @include('Admin.components.side-bar')

            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Create Coupons</h1>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Create Coupons ({{$storeName}}) </h4>
                                </div>
                                <form action="{{ route('admin.coupons.store') }}" method="POST">
                                    @csrf
                                    <div class="card-body" id="couponForms">
                                        <div class="form-group coupon-form">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Coupon Name:</label>
                                                    <input type="text" name="name[]" class="form-control"
                                                        value="{{ old('name.0') }}">
                                                    @error('name.0')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Redirect Url:</label>
                                                    <input type="text" name="redirect_url[]" class="form-control"
                                                        value="{{ old('redirect_url.0') }}">
                                                    @error('redirect_url.0')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Code:</label>
                                                    <input type="text" name="code[]" class="form-control"
                                                        value="{{ old('code.0') }}">
                                                    @error('code.0')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Discount (%):</label>
                                                    <input type="text" name="discount[]" class="form-control"
                                                        value="{{ old('discount.0') }}">
                                                    @error('discount.0')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Start Date:</label>
                                                    <input type="date" name="start_date[]" class="form-control"
                                                        value="{{ old('start_date.0') }}">
                                                    @error('start_date.0')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Expire Date:</label>
                                                    <input type="date" name="expire_date[]" class="form-control"
                                                        value="{{ old('expire_date.0') }}">
                                                    @error('expire_date.0')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Category:</label>
                                                    <select name="category_id[]" class="form-control">
                                                        <option value="">Select Category</option>
                                                        @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    @error('category_id.0')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                
                                                
                                                <div class="col-md-6">
                                                    <label>Event:</label>
                                                    <select name="event_id[]" class="form-control">
                                                        <option value="">Select Event</option>
                                                        @foreach ($events as $event)
                                                        <option value="{{ $event->id }}">{{ $event->title }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                   
                                                </div>
                                                <input type="hidden" name="store[]" value="{{ $id }}">

                                                {{-- <div class="col-md-6">
                                                    <label>Store:</label>
                                                    <select name="store_id[]" class="form-control">
                                                        <option value="">Select Store</option>
                                                        @foreach ($stores as $store)
                                                        <option value="{{ $store->id }}">{{ $store->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('store_id.0')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div> --}}
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Status:</label>
                                                    <select name="status[]" class="form-control">
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>
                                                    </select>
                                                    @error('status.0')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Description:</label>
                                                    <textarea name="description[]"
                                                        class="form-control">{{ old('description.0') }}</textarea>
                                                    @error('description.0')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col-md-4">
                                                    <label>Exclusive Coupon:</label>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="exclusive_coupons[]"
                                                            class="custom-control-input exclusive-checkbox"
                                                            id="exclusiveCoupon_0" value="1">
                                                        <label class="custom-control-label"
                                                            for="exclusiveCoupon_0">Exclusive</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Popular Coupon:</label>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="popular_coupons[]"
                                                            class="custom-control-input popular-checkbox"
                                                            id="popularCoupon_0" value="1">
                                                        <label class="custom-control-label"
                                                            for="popularCoupon_0">Popular</label>
                                                    </div>
                                                </div>
                                                
                                                 <div class="col-md-4">
                                                    <label>Position:</label>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="number" name="position[]"
                                                            class="form-control"
                                                            id="position_0">
                                                      
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 text-right">
                                                    <button type="button"
                                                        class="btn btn-success add-coupon-btn">+</button>
                                                    <button type="button"
                                                        class="btn btn-danger remove-coupon-btn">-</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary mr-1" type="submit">Create Coupons</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    @include('Admin.partials.alerts')

    <!-- General JS Scripts -->
    @include('Admin.components.js-scripts')

    <!-- JS Libraries -->
    @include('Admin.components.js-forms')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let couponForms = document.getElementById('couponForms');
            let formCount = 0; // start count at 0 for new forms

            // Function to create a new coupon form with cleared fields
            function createNewCouponForm() {
                formCount++;
                let newForm = document.querySelector('.coupon-form').cloneNode(true);

                // Reset the form inputs and update names with the new formCount
                newForm.querySelectorAll('input, select, textarea').forEach(input => {
                    if (input.type === 'checkbox') {
                        input.checked = false;
                    } else {
                        input.value = '';
                    }
                    input.name = input.name.replace(/\[\d+\]/, `[${formCount}]`);
                });

                // Ensure the exclusive and popular checkboxes have unique IDs and labels
                newForm.querySelector('.custom-control-input[id^="exclusiveCoupon_"]').id =
                    `exclusiveCoupon_${formCount}`;
                newForm.querySelector('.custom-control-label[for^="exclusiveCoupon_"]').htmlFor =
                    `exclusiveCoupon_${formCount}`;
                newForm.querySelector('.custom-control-input[id^="popularCoupon_"]').id =
                    `popularCoupon_${formCount}`;
                newForm.querySelector('.custom-control-label[for^="popularCoupon_"]').htmlFor =
                    `popularCoupon_${formCount}`;

                // Set "Active" as the default option for Status
                newForm.querySelector('select[name^="status"]').value = '1';
                newForm.querySelector('input[name^="store"]').value = {{ $id }};


                couponForms.appendChild(newForm);
            }

            // Add a click event listener for the buttons
            document.addEventListener('click', function(event) {
                if (event.target && event.target.classList.contains('add-coupon-btn')) {
                    createNewCouponForm();
                }

                if (event.target && event.target.classList.contains('remove-coupon-btn')) {
                    let form = event.target.closest('.coupon-form');
                    if (document.querySelectorAll('.coupon-form').length > 1) {
                        form.remove();
                    }
                }
            });
        });
    </script>


</body>

</html>