<!DOCTYPE html>
<html lang="en">

<!-- forms-advanced-form.html  Tue, 07 Jan 2020 03:37:13 GMT -->

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

            {{-- Modal end --}}
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Network</h1>
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
                                        <h4>Add Network</h4>
                                    </div>
                                    <form action="{{ route('admin.networks.store') }}" method="POST">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Network Name:</label>
                                                <input type="text" name="name" class="form-control">
                                                @error('name')
                                                    <p class="text-danger">{{ $message }} </p>
                                                @enderror

                                                <label>Affiliate Url:</label>
                                                <input type="text" name="affiliate_url" class="form-control">
                                                @error('affiliate_url')
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
            </div>
            </section>
        </div>
    </div>
    </div>


    <!-- General JS Scripts -->
    @include('Admin.components.js-scripts')

    <!-- JS Libraies -->
    @include('Admin.components.js-forms')


</body>

</html>
