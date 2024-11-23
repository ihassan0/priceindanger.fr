<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Forgot Password &mdash; priceindanger</title>

    @include('Admin.components.css-links')
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ url('admin/assets/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ url('admin/assets/css/components.min.css') }}">
</head>

<body class="layout-4">

    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <img src="{{ url('logos/priceindanger.webp') }}" alt="logo" width="150"
                                class="shadow-light rounded-circle">
                        </div>
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Forgot Password</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('password.email') }}" method="POST">
                                    @csrf
                                    @if (session('status'))
                                        <span class="text-primary">{{ session('status') }}</span>
                                    @elseif(session('email'))
                                        <span class="text-danger">{{ session('email') }}</span>
                                    @endif
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control" name="email"
                                            tabindex="1" required autofocus>
                                        @error('email')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Forgot Password
                                        </button>
                                    </div>
                                </form>
                                <div class="simple-footer">
                                    Copyright &copy; priceindanger.fr {{ Date('Y') }}
                                </div>
                            </div>
                        </div>
                    </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    @include('Admin.components.js-scripts')
</body>

<!-- auth-login.html  Tue, 07 Jan 2020 03:39:47 GMT -->

</html>
