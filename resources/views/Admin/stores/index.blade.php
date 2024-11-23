<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>priceindanger - Stores</title>

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

            <!-- START OF NAV -->
            @include('Admin.components.nav')

            <!-- Start main left sidebar menu -->
            @include('Admin.components.side-bar')

            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Stores</h1>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>All Stores</h4>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Store Name</th>
                                                <th scope="col">Network</th>
                                                <th scope="col">Add Coupons</th>
                                                <th scope="col">View/Edit Coupons</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($stores as $store)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $store->name }}</td>
                                                    <td>{{ $store->networks->name ?? 'N/A' }}</td>
                                                    <td><a href="{{ route('admin.addCouponsView', $store->id) }}"
                                                            class="btn btn-primary">Add Coupons</a></td>


                                                    <td><a href="{{ route('admin.stores.show', $store->id) }}"
                                                            class="btn btn-secondary">View Coupons</a></td>

                                                    <td>
                                                        <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip"
                                                            href="{{ route('admin.stores.edit', $store->id) }}"
                                                            title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                        <form action="{{ route('admin.stores.destroy', $store->id) }}"
                                                            method="POST" id="delete-form-{{ $store->id }}"
                                                            style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a class="btn btn-danger btn-action" data-toggle="tooltip"
                                                                title="Delete"
                                                                data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?"
                                                                data-confirm-yes="deleteModal({{ $store->id }})">
                                                                <i class="fas fa-trash"></i>
                                                            </a>
                                                        </form>
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
