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
                        <h1>Banners</h1>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>All Banners</h4>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Banner</th>
                                                <th scope="col">Store Name</th>
                                                {{-- <th scope="col">Link</th> --}}
                                                <th scope="col">Status</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($banners as $banner)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $banner->banner }}</td>
                                                    <td>{{ $banner->store->name ?? 'N/A' }}</td>
                                                    {{-- <td><a href="{{ $banner->link }}"
                                                            target="_blank">{{ $banner->link }}</a></td> --}}
                                                    <td>
                                                        <span
                                                            class="badge {{ $banner->status ? 'badge-success' : 'badge-danger' }}">
                                                            {{ $banner->status ? 'Active' : 'Inactive' }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip"
                                                            href="{{ route('admin.banners.edit', $banner->id) }}"
                                                            title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                        <form action="{{ route('admin.banners.destroy', $banner->id) }}"
                                                            method="POST" id="delete-form-{{ $banner->id }}"
                                                            style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a class="btn btn-danger btn-action" data-toggle="tooltip"
                                                                title="Delete"
                                                                data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?"
                                                                data-confirm-yes="deleteModal({{ $banner->id }})">
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
