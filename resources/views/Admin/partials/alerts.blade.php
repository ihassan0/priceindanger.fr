<script src="{{ asset('admin/js/flash-messages-sweet-alert.js') }}"></script>
<script src="{{ asset('admin/js/sweetalert.min.js') }}"></script>
@if (session('success'))
    <script>
        console.log("success");
        flashMessage('success', "{{ session('success') }}", 'success');
    </script>
@endif
@if (session('error'))
    <script>
        console.log("danger");
        flashMessage('failure', "{{ session('danger') }}", 'error');
    </script>
@endif
@if (session('status'))
    <script>
        console.log("info");
        flashMessage('success', "{{ session('status') }}", 'info');
    </script>
@endif
