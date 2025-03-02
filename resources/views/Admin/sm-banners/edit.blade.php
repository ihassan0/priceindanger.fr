<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>priceindanger-Banners</title>

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
                        <h1>Edit Banner</h1>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Edit Banner</h4>
                                </div>
                                <form action="{{ route('admin.banners.update', $banner->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Current Banner Image:</label>
                                            <div>
                                                <img src="{{ asset('storage/' . $banner->banner) }}" alt="Banner Image"
                                                    width="200">
                                            </div>
                                            <label>Change Banner Image:</label>
                                            <input type="file" name="banner" class="form-control">
                                            @error('banner')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror

                                            <label>Store:</label>
                                            <select name="store_id" class="form-control">
                                                @foreach ($stores as $store)
                                                <option value="{{ $store->id }}" {{ old('store_id', $banner->store_id)
                                                    == $store->id ? 'selected' : '' }}>
                                                    {{ $store->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('store_id')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror

                                            <label>Link:</label>
                                            <input type="text" name="link" class="form-control"
                                                value="{{ old('link', $banner->link) }}">
                                            @error('link')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror

                                            <label>Status:</label>
                                            <select name="status" class="form-control">
                                                <option value="1" {{ old('status', $banner->status) == 1 ? 'selected' :
                                                    '' }}>Active
                                                </option>
                                                <option value="0" {{ old('status', $banner->status) == 0 ? 'selected' :
                                                    '' }}>
                                                    Inactive</option>
                                            </select>
                                            @error('status')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
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