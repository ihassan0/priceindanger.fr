<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>priceindanger-banners</title>

    <!-- General CSS Files -->
    @include('Admin.components.css-links')
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ url('admin/assets/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ url('admin/assets/css/components.min.css') }}">

</head>

<body class="layout-4">
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            <!-- Navbar -->
            @include('Admin.components.nav')

            <!-- Sidebar -->
            @include('Admin.components.side-bar')

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Emails</h1>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>All Emails</h4>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Email</th>
                                               
                                                <!--<th scope="col">Actions</th>-->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($emails as $email)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $email->email ?? 'N/A' }}</td>
                                                    <td>
                                                    
                                                    </td>
                                                </tr>
                                            @endforeach
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

    <script src="{{ url('admin/js/delete-modal.js') }}"></script>
</body>

</html>
