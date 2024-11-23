<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>priceindanger - Add Store</title>

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
                        <h1>Add Store</h1>
                    </div>
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Add Store</h4>
                                    </div>
                                    <form action="{{ route('admin.stores.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Store Name:</label>
                                                <input type="text" name="name" class="form-control">
                                                @error('name')
                                                    <p class="text-danger">{{ $message }} </p>
                                                @enderror

                                                <label>Store URL:</label>
                                                <input type="text" name="url" class="form-control">
                                                @error('url')
                                                    <p class="text-danger">{{ $message }} </p>
                                                @enderror

                                                <label>Logo:</label>
                                                <input type="file" name="logo" class="form-control">
                                                @error('logo')
                                                    <p class="text-danger">{{ $message }} </p>
                                                @enderror

                                                <label>Meta Title:</label>
                                                <input type="text" name="meta_title" class="form-control">
                                                @error('meta_title')
                                                    <p class="text-danger">{{ $message }} </p>
                                                @enderror

                                                <label>Meta Description:</label>
                                                <textarea name="meta_desc" class="form-control"></textarea>
                                                @error('meta_desc')
                                                    <p class="text-danger">{{ $message }} </p>
                                                @enderror

                                                <label>Merchant Id:</label>
                                                <input type="text" name="merchant" class="form-control">
                                                @error('merchant')
                                                    <p class="text-danger">{{ $message }} </p>
                                                @enderror


                                                <div class="form-group">
                                                    <label>Network:</label>
                                                    <select class="form-control select2" name="network_id">
                                                        <option value="">Select Network</option>
                                                        @foreach ($networks as $network)
                                                            <option value="{{ $network->id }}">{{ $network->name }}
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
                                                            <option value="{{ $category->id }}">{{ $category->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                @error('category_id')
                                                    <p class="text-danger">{{ $message }} </p>
                                                @enderror

                                                <div class="form-group">
                                                    <label>Description:</label>
                                                    <textarea class="summernote" name="description">{{ old('description') }}</textarea>
                                                    @error('description')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <label>Added By:</label>
                                                <input type="text" name="Added_by" class="form-control">
                                                @error('Added_by')
                                                    <p class="text-danger">{{ $message }} </p>
                                                @enderror
                                            </div>
                                            <div class="card-footer text-right">
                                                <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
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
