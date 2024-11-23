<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>priceindanger-Networks</title>

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
                        <h1>Edit Network</h1>
                        <div class="section-header-breadcrumb">

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4></h4>
                                    <div class="card-header-form">
                                        <form>
                                            <div class="input-group">
                                                <div class="input-group-btn">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Edit Network</h4>
                                    </div>
                                    <form action="{{ route('admin.networks.update', $network->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Network Name:</label>
                                                <input type="text" name="name" class="form-control"
                                                    value="{{ old('name', $network->name) }}">
                                                @error('name')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror

                                                <label>Affiliate URL:</label>
                                                <input type="text" name="affiliate_url" class="form-control"
                                                    value="{{ old('affiliate_url', $network->affiliate_url) }}">
                                                @error('affiliate_url')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="card-footer text-right">
                                                <button class="btn btn-primary mr-1" type="submit">Update</button>
                                                <!-- Change button text to 'Update' -->
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

</body>

</html>
