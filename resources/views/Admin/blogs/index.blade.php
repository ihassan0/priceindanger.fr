<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>priceindanger - Blogs</title>

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
            @include('Admin.components.nav')
            @include('Admin.components.side-bar')

            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Blogs</h1>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>All Blogs</h4>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Image</th>
                                                <th scope="col">Writter</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($blogs as $blog)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $blog->title }}</td>
                                                    <td>
                                                        @if ($blog->image)
                                                            <img src="{{ asset('storage/' . $blog->image) }}"
                                                                alt="{{ $blog->title }}" width="50">
                                                        @else
                                                            <p>No image available</p>
                                                        @endif
                                                    </td>
                                                    <td>{{ $blog->writter }}</td>
                                                    <td>
                                                        <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip"
                                                            href="{{ route('admin.blogs.edit', $blog->id) }}"
                                                            title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                        <form action="{{ route('admin.blogs.destroy', $blog->id) }}"
                                                            method="POST" id="delete-form-{{ $blog->id }}"
                                                            style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a class="btn btn-danger btn-action" data-toggle="tooltip"
                                                                title="Delete"
                                                                data-confirm="Are You Sure?|This action cannot be undone. Do you want to continue?"
                                                                data-confirm-yes="deleteModal({{ $blog->id }})">
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

    @include('Admin.components.js-scripts')
    @include('Admin.components.js-forms')
    <script src="{{ url('admin/js/delete-modal.js') }}"></script>
</body>

</html>
