<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>priceindanger - Edit Store</title>

    <link rel="stylesheet" href="{{ url('admin/assets/modules/summernote/summernote-bs4.css') }}">

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

            <!-- START OF NAV -->
            @include('Admin.components.nav')

            <!-- Start main left sidebar menu -->
            @include('Admin.components.side-bar')

            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Edit Store</h1>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Edit Store</h4>
                                </div>
                                <form action="{{ route('admin.stores.update', $store->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Store Name:</label>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ old('name', $store->name) }}">
                                            @error('name')
                                                <p class="text-danger">{{ $message }} </p>
                                            @enderror

                                            <label>Store URL:</label>
                                            <input type="text" name="url" class="form-control"
                                                value="{{ old('url', $store->url) }}">
                                            @error('url')
                                                <p class="text-danger">{{ $message }} </p>
                                            @enderror

                                            <label>Logo:</label>
                                            <input type="file" name="logo" class="form-control">
                                            <p>Current Logo: <img src="{{ asset('storage/' . $store->store_logo) }}"
                                                    alt="Store Logo" style="width: 100px; height: auto;"></p>
                                            @error('store_logo')
                                                <p class="text-danger">{{ $message }} </p>
                                            @enderror

                                            <label>Meta Title:</label>
                                            <input type="text" name="meta_title" class="form-control"
                                                value="{{ old('meta_title', $store->meta_title) }}">
                                            @error('meta_title')
                                                <p class="text-danger">{{ $message }} </p>
                                            @enderror

                                            <label>Meta Description:</label>
                                            <textarea name="meta_desc" class="form-control">{{ old('meta_desc', $store->meta_desc) }}</textarea>
                                            @error('meta_desc')
                                                <p class="text-danger">{{ $message }} </p>
                                            @enderror


                                            <label>Merchant Id:</label>
                                            <input type="text" name="merchant" class="form-control"
                                                value="{{ old('merchant', $store->merchant) }}">
                                            @error('merchant')
                                                <p class="text-danger">{{ $message }} </p>
                                            @enderror

                                            <div class="form-group">
                                                <label>Network:</label>
                                                <select class="form-control select2" name="network_id">
                                                    <option value="">Select Network</option>
                                                    @foreach ($networks as $network)
                                                        <option value="{{ $network->id }}"
                                                            {{ old('network_id', $store->network_id) == $network->id ? 'selected' : '' }}>
                                                            {{ $network->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('network_id')
                                                <p class="text-danger">{{ $message }} </p>
                                            @enderror

                                            <div class="form-group">
                                                <label>Category:</label>
                                                <select class="form-control select2" name="category_id[]"
                                                    multiple="">
                                                    <option value="">Select Category</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            {{ in_array($category->id, old('category_id', $store->categories->pluck('id')->toArray())) ? 'selected' : '' }}>
                                                            {{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            @error('category_id')
                                                <p class="text-danger">{{ $message }} </p>
                                            @enderror

                                            <div class="form-group">
                                                <label>Description:</label>
                                                <textarea class="summernote" name="description">{{ old('description', $store->description) }}</textarea>
                                                @error('description')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <label>Added By:</label>
                                            <input type="text" name="Added_by" class="form-control"
                                                value="{{ old('Added_by', $store->Added_by) }}">
                                            @error('Added_by')
                                                <p class="text-danger">{{ $message }} </p>
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

    <!-- General JS Scripts -->
    @include('Admin.components.js-scripts')
    <!-- JS Libraries -->

    @include('Admin.components.js-forms')

    <script src="{{ url('admin/assets/modules/summernote/summernote-bs4.js') }}"></script>

    <!-- Initialize Summernote -->
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 300, // Set the height of the editor
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
    </script>
</body>

</html>
