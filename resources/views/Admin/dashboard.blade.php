<!DOCTYPE html>
<html lang="en">

<!-- index-0.html  Tue, 07 Jan 2020 03:35:33 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Analytics &mdash; CodiePie</title>

    <!-- General CSS Files -->

    @include('Admin.components.css-links')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ url('admin/assets/modules/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ url('admin/assets/modules/weather-icon/css/weather-icons.min.css') }}">
    <link rel="stylesheet" href="{{ url('admin/assets/modules/weather-icon/css/weather-icons-wind.min.css') }}">
    <link rel="stylesheet" href="{{ url('admin/assets/modules/summernote/summernote-bs4.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ url('admin/assets/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ url('admin/assets/css/components.min.css') }}">


</head>

<body class="layout-4">
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            <!-- Start app top navbar -->
            @include('Admin.components.nav')

            <!-- Start main left sidebar menu -->

            @include('Admin.components.side-bar')
            <!-- Start app main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Dashboard</h1>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-primary">
                                    <i class="fas fa-network-wired"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Total Networks</h4>
                                    </div>
                                    <div class="card-body">
                                        10
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-danger">
                                    <i class="fas fa-store"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Stores</h4>
                                    </div>
                                    <div class="card-body">
                                        42
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-warning">
                                    <i class="fas fa-tag"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Coupons</h4>
                                    </div>
                                    <div class="card-body">
                                        1,201
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-success">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Active Coupons</h4>
                                    </div>
                                    <div class="card-body">
                                        47
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Statistics</h4>
                                    <div class="card-header-action">
                                        <button class="btn btn-sm btn-outline-secondary mr-1" id="one_month">1M</button>
                                        <button class="btn btn-sm btn-outline-secondary mr-1"
                                            id="six_months">6M</button>
                                        <button class="btn btn-sm btn-outline-secondary mr-1" id="one_year"
                                            class="active">1Y</button>
                                        <button class="btn btn-sm btn-outline-secondary mr-1"
                                            id="ytd">YTD</button>
                                        <button class="btn btn-sm btn-outline-secondary" id="all">ALL</button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="statistic-details mb-sm-4">
                                        <div class="statistic-details-item">
                                            <span class="text-muted"><span class="text-primary"><i
                                                        class="fas fa-caret-up"></i></span> 7%</span>
                                            <div class="detail-value">$243</div>
                                            <div class="detail-name">Today's Sales</div>
                                        </div>
                                        <div class="statistic-details-item">
                                            <span class="text-muted"><span class="text-danger"><i
                                                        class="fas fa-caret-down"></i></span> 23%</span>
                                            <div class="detail-value">$2,902</div>
                                            <div class="detail-name">This Week's Sales</div>
                                        </div>
                                        <div class="statistic-details-item">
                                            <span class="text-muted"><span class="text-primary"><i
                                                        class="fas fa-caret-up"></i></span>9%</span>
                                            <div class="detail-value">$12,821</div>
                                            <div class="detail-name">This Month's Sales</div>
                                        </div>
                                        <div class="statistic-details-item">
                                            <span class="text-muted"><span class="text-primary"><i
                                                        class="fas fa-caret-up"></i></span> 19%</span>
                                            <div class="detail-value">$92,142</div>
                                            <div class="detail-name">This Year's Sales</div>
                                        </div>
                                    </div>
                                    <div id="apex-timeline-chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Start app Footer part -->
            <footer class="main-footer">
                <div class="footer-left">
                    <div class="bullet"></div> <a href="templateshub.net">Templates Hub</a>
                </div>
                <div class="footer-right">

                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    @include('Admin.components.js-scripts')
    <!-- JS Libraies -->
    <script src="{{ url('admin/assets/modules/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ url('admin/assets/modules/simple-weather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ url('admin/assets/modules/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ url('admin/assets/modules/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ url('admin/assets/modules/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ url('admin/assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ url('admin/js/page/index-0.js') }}"></script>


</body>

</html>
