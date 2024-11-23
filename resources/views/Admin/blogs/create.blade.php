<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>priceindanger - Create Blog</title>
    <link rel="stylesheet" href="{{ url('admin/assets/modules/summernote/summernote-bs4.css') }}">
    <!-- General CSS Files -->
    @include('Admin.components.css-links')
    @include('Admin.components.css-forms')

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ url('admin/assets/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ url('admin/assets/css/components.min.css') }}">

</head>

<body class="layout-4">
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            @include('Admin.components.nav')
            @include('Admin.components.side-bar')

            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Add Blog</h1>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Add Blog</h4>
                                </div>
                                <form action="{{ route('admin.blogs.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Title:</label>
                                            <input type="text" name="title" class="form-control"
                                                value="{{ old('title') }}">
                                            @error('title')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror

                                            <label>Image:</label>
                                            <input type="file" name="image" class="form-control">
                                            @error('image')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror

                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <textarea class="summernote" name="description">{{ old('description', $blog->description ?? '') }}</textarea>
                                                </div>
                                            </div>
                                            @error('description')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror

                                            <label>Meta Description:</label>
                                            <textarea name="meta_desc" class="form-control">{{ old('meta_desc') }}</textarea>
                                            @error('meta_desc')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror

                                            <label>Writter:</label>
                                            <input type="text" name="writter" class="form-control"
                                                value="{{ old('writter') }}">
                                            @error('writter')
                                                <p class="text-danger">{{ $message }}</p>
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
                </section>
            </div>
        </div>
    </div>

    @include('Admin.components.js-scripts')
    @include('Admin.components.js-forms')
    <script src="{{ url('admin/assets/modules/summernote/summernote-bs4.js') }}"></script>
</body>

</html>
