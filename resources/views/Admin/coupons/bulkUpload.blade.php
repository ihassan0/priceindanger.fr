<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>priceindanger-coupons</title>

    <!-- General CSS Files -->
    @include('Admin.components.css-links')

    <!-- CSS Libraries -->
    @include('Admin.components.css-forms')

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ url('admin/assets/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ url('admin/assets/css/components.min.css') }}">

</head>

<body class="layout-4">
    <!-- Page Loader -->
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            <!-- Navbar -->
            @include('Admin.components.nav')

            <!-- Sidebar -->
            @include('Admin.components.side-bar')

            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Coupons</h1>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Bulk Upload</h4>
                                </div>
                                <form action="{{ route('admin.bulkUploadPost') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Csv Upload:</label>
                                            <input name="csv_file" id="csv_file" type="file" required
                                                class="form-control" value="{{ old('csv_file') }}">
                                            {{-- @error('csv_file')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror --}}
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
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
