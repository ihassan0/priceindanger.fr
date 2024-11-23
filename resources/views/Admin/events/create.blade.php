<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>priceindanger-Events</title>

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
                        <h1>Add Event</h1>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Add Event</h4>
                                </div>
                                <form action="{{ route('admin.events.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Title:</label>
                                            <input type="text" name="title" class="form-control">
                                            @error('title')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror

                                            <label>Image:</label>
                                            <input type="file" name="image" class="form-control">
                                            @error('image')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror

                                            <label>Description:</label>
                                            <textarea name="description" class="form-control"></textarea>
                                            @error('description')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror

                                            <label>Status:</label>
                                            <select name="status" class="form-control">
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                            @error('status')
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
</body>

</html>
