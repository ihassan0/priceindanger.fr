<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>priceindanger - Home Settings</title>

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

            <!-- Navigation Bar -->
            @include('Admin.components.nav')

            <!-- Start main left sidebar menu -->
            @include('Admin.components.side-bar')

            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Home Settings</h1>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>All Home Settings</h4>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Contact Us</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($homeSetting)
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>{{ Str::limit($homeSetting->description, 50) }}</td>
                                                    <td>{{ Str::limit($homeSetting->contact_us, 50) }}</td>
                                                    <td>
                                                        <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip"
                                                            href="{{ route('admin.home-settings.edit', $homeSetting->id) }}"
                                                            title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                    </td>
                                                </tr>
                                            @else
                                                <tr>
                                                    <td colspan="4">No Home Settings available. Please add them.</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
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
    @include('Admin.components.js-forms')

</body>

</html>
