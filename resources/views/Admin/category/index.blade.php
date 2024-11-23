<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>priceindanger-categories</title>

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
                        <h1>Categories</h1>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>All Categories</h4>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Category Name</th>
                                                <th scope="col">Meta Title</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($categories as $category)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $category->name }}</td>
                                                    <td>{{ $category->meta_title }}</td>
                                                    <td>
                                                        <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip"
                                                            href="{{ route('admin.categories.edit', $category->id) }}"
                                                            title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                        <form
                                                            action="{{ route('admin.categories.destroy', $category->id) }}"
                                                            method="POST" id="delete-form-{{ $category->id }}"
                                                            style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a class="btn btn-danger btn-action" data-toggle="tooltip"
                                                                title="Delete"
                                                                data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?"
                                                                data-confirm-yes="deleteModal({{ $category->id }})">
                                                                <i class="fas fa-trash"></i>
                                                            </a>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{-- Pagination --}}
                                    <div class="mt-4">
                                        @include('Admin.components.pagination', [
                                            'paginator' => $categories,
                                        ])

                                    </div>

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
