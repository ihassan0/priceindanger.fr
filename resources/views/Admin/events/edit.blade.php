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
                        <h1>Edit Event</h1>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Edit Event</h4>
                                </div>
                                <form action="{{ route('admin.events.update', $event->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Title:</label>
                                            <input type="text" name="title" class="form-control"
                                                value="{{ old('title', $event->title) }}">
                                            @error('title')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror

                                            <label>Image:</label>
                                            <input type="file" name="image" class="form-control">
                                            @if ($event->image)
                                                <img src="{{ $event->image }}" alt="{{ $event->title }}" width="100">
                                            @endif
                                            @error('image')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror

                                            <label>Description:</label>
                                            <textarea name="description" class="form-control">{{ old('description', $event->description) }}</textarea>
                                            @error('description')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror

                                            <label>Status:</label>
                                            <select name="status" class="form-control">
                                                <option value="1"
                                                    {{ old('status', $event->status) == '1' ? 'selected' : '' }}>
                                                    Active</option>
                                                <option value="0"
                                                    {{ old('status', $event->status) == '0' ? 'selected' : '' }}>
                                                    Inactive</option>
                                            </select>
                                            @error('status')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="card-footer text-right">
                                            <button class="btn btn-primary mr-1" type="submit">Update</button>
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
