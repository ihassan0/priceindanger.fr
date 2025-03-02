<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>priceindanger-Edit Coupon</title>

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
                        <h1>Edit Coupon</h1>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Edit Coupon</h4>
                                </div>
                                <form action="{{ route('admin.coupons.update', $coupon->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="row">
                                                <!-- Coupon Name -->
                                                <div class="col-md-6">
                                                    <label>Coupon Name:</label>
                                                    <input type="text" name="name" class="form-control"
                                                        value="{{ old('name', $coupon->name) }}">
                                                    @error('name')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <!-- Redirect URL -->
                                                <div class="col-md-6">
                                                    <label>Redirect Url:</label>
                                                    <input type="text" name="redirect_url" class="form-control"
                                                        value="{{ old('redirect_url', $coupon->redirect_url) }}">
                                                    @error('redirect_url')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <!-- Code -->
                                                <div class="col-md-6">
                                                    <label>Code:</label>
                                                    <input type="text" name="code" class="form-control"
                                                        value="{{ old('code', $coupon->code) }}">
                                                    @error('code')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <!-- Discount -->
                                                <div class="col-md-6">
                                                    <label>Discount (%):</label>
                                                    <input type="text" name="discount" class="form-control"
                                                        value="{{ old('discount', $coupon->discount) }}">
                                                    @error('discount')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <!-- Start Date -->
                                                <div class="col-md-6">
                                                    <label>Start Date:</label>
                                                    <input type="date" name="start_date" class="form-control"
                                                        value="{{ old('start_date', $coupon->start_date) }}">
                                                    @error('start_date')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <!-- Expire Date -->
                                                <div class="col-md-6">
                                                    <label>Expire Date:</label>
                                                    <input type="date" name="expire_date" class="form-control"
                                                        value="{{ old('expire_date', $coupon->expire_date) }}">
                                                    @error('expire_date')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <!-- Category -->
                                                <div class="col-md-6">
                                                    <label>Category:</label>
                                                    <select name="category_id" class="form-control">
                                                        <option value="">Select Category</option>
                                                        @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}" {{ old('category_id',
                                                            $coupon->category_id) == $category->id ? 'selected' : '' }}>
                                                            {{ $category->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    @error('category_id')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                
                                                
                                                
                                                
                                                 <div class="col-md-6">
                                                    <label>Events:</label>
                                                    <select name="event_id" class="form-control">
                                                        <option value="">Select Event</option>
                                                        @foreach ($events as $event)
                                                        <option value="{{ $event->id }}" {{ old('event_id',
                                                            $coupon->event_id) == $event->id ? 'selected' : '' }}>
                                                            {{ $event->title }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    @error('category_id')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <!-- Store -->
                                                <div class="col-md-6">
                                                    <label>Store:</label>
                                                    <select name="store_id" class="form-control">
                                                        <option value="">Select Store</option>
                                                        @foreach ($stores as $store)
                                                        <option value="{{ $store->id }}" {{ old('store_id', $coupon->
                                                            store_id) == $store->id ? 'selected' : '' }}>
                                                            {{ $store->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    @error('store_id')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <!-- Event -->
                            
                                                <!-- Status -->
                                                <div class="col-md-6">
                                                    <label>Status:</label>
                                                    <select name="status" class="form-control">
                                                        <option value="1" {{ old('status', $coupon->status) == 1 ?
                                                            'selected' : '' }}>Active</option>
                                                        <option value="0" {{ old('status', $coupon->status) == 0 ?
                                                            'selected' : '' }}>Inactive</option>
                                                    </select>
                                                    @error('status')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <!-- Description -->
                                                <div class="col-md-12">
                                                    <label>Description:</label>
                                                    <textarea name="description"
                                                        class="form-control">{{ old('description', $coupon->description) }}</textarea>
                                                    @error('description')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <!-- Exclusive Coupon -->
                                                <div class="col-md-6">
                                                    <label>Exclusive Coupon:</label>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="exclusive_coupons"
                                                            class="custom-control-input" id="exclusiveCoupon" value="1"
                                                            {{ old('exclusive_coupons', $coupon->exclusive_coupons) ?
                                                        'checked' : '' }}>
                                                        <label class="custom-control-label"
                                                            for="exclusiveCoupon">Exclusive</label>
                                                    </div>
                                                </div>
                                                <!-- Popular Coupon -->
                                                <div class="col-md-6">
                                                    <label>Popular Coupon:</label>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="popular_coupons"
                                                            class="custom-control-input" id="popularCoupon" value="1" {{
                                                            old('popular_coupons', $coupon->popular_coupons) ? 'checked'
                                                        : '' }}>
                                                        <label class="custom-control-label"
                                                            for="popularCoupon">Popular</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-right">
                                            <button class="btn btn-primary mr-1" type="submit">Update</button>
                                        </div>
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

</body>

</html>