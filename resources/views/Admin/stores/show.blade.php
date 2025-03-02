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
                        <h1>{{ $store->name }}</h1>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Coupons</h4>
                                </div>
                                <div class="card-body">
                                    <div class="mt-3">
                                        <button type="button" id="updatePositionsButton" class="btn btn-success">Update
                                            All Positions</button>
                                    </div>
                                    <form method="POST" action="{{ route('admin.coupon.updatePositions') }}"
                                        id="updatePositionsForm">
                                        @csrf

                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Coupon Name</th>
                                                    <th scope="col">Position</th>
                                                    <th scope="col">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($store->coupons as $coupon)
                                                <tr style="{{ $coupon->status == 0 ? 'background-color: #ffcccc;' : '' }}">
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $coupon->name }}</td>
                                                    <td> <input type="number" name="positions[{{ $coupon->id }}]"
                                                            value="{{ $coupon->position ?? '' }}"
                                                            class="form-control" />

                                                    </td>

                                                    <td>
                                                        <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip"
                                                            href="{{ route('admin.coupons.edit', $coupon->id) }}"
                                                            title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                        <button type="button"
                                                            class="btn btn-danger btn-action delete-btn"
                                                            data-coupon-id="{{ $coupon->id }}" data-toggle="tooltip"
                                                            title="Delete">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                    </form>
                                    </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                    </table>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    @foreach ($store->coupons as $coupon)
    <form action="{{ route('admin.coupons.destroy', $coupon->id) }}" method="POST" id="delete-form-{{ $coupon->id }}"
        style="display:none;">
        @csrf
        @method('DELETE')
    </form>
    @endforeach

    @include('Admin.partials.alerts')

    <!-- General JS Scripts -->
    @include('Admin.components.js-scripts')
    @include('Admin.components.js-forms')
    <script src="{{ url('admin/js/delete-modal.js') }}"></script>

    <script>
        document.getElementById('updatePositionsButton').addEventListener('click', function() {
        // Optionally, you can add any validation logic here if needed
        document.getElementById('updatePositionsForm').submit();
    });


    document.querySelectorAll('.delete-btn').forEach(function(button) {
        button.addEventListener('click', function() {
            var couponId = button.getAttribute('data-coupon-id');
            var deleteForm = document.getElementById('delete-form-' + couponId);
            
            // Confirm before deletion
            if (confirm('Are you sure you want to delete this coupon? This action cannot be undone.')) {
                deleteForm.submit(); // Submit the form to delete the coupon
            }
        });
    });
    </script>

</body>

</html>