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
                        <h1>Comments</h1>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>All Store Comments</h4>
                                </div>
                                <div class="card-body">
                                 <table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Comment</th>
            <th scope="col">StoreName</th>
            <th scope="col">Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($comments as $comment)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $comment->name }}</td>
                <td>{{ $comment->email ?? 'N/A' }}</td>
                <td>{{ $comment->comment }}</td>
                <td>{{ $comment->store->name }}</td>
                <td>
                    <span 
                        class="badge status-badge {{ $comment->status == 0 ? 'bg-success' : 'bg-danger' }}" 
                        data-id="{{ $comment->id }}" 
                        data-status="{{ $comment->status }}" 
                        style="cursor: pointer;">
                        {{ $comment->status == 0 ? 'Approve' : 'Decline' }}
                    </span>
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
    
    
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.status-badge').click(function() {
            let badge = $(this);
            let commentId = badge.data('id');
            let currentStatus = badge.data('status');

            // Toggle status (0 -> 1 or 1 -> 0)
            let newStatus = currentStatus == 0 ? 1 : 0;

            $.ajax({
                url: "{{ route('admin.comment.updateStatus') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: commentId,
                    status: newStatus
                },
                success: function(response) {
                    if (response.success) {
                        // Update the badge text and color
                        badge.text(newStatus == 0 ? 'Approve' : 'Decline');
                        badge.removeClass('bg-success bg-danger')
                            .addClass(newStatus == 0 ? 'bg-success' : 'bg-danger');
                        badge.data('status', newStatus);
                    }
                }
            });
        });
    });
</script>

</body>

</html>
