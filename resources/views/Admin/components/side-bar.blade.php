<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/">Priceindanger.fr</a>
        </div>
        <!--<div class="sidebar-brand sidebar-brand-sm">-->
        <!--    <a href="index-2.html">CP</a>-->
        <!--</div>-->
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <!--<li class="dropdown active">-->
                <li><a href="{{route('admin.dashboard')}}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a></li>
              
            <!--</li>-->
            <li class="menu-header">Features</li>

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-store"></i>
                    <span>Stores</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.stores.index') }}">All Stores</a></li>

                    <li><a class="nav-link" href="{{ route('admin.stores.create') }}">Add Store</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Networks</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.networks.index') }}">All Networks</a></li>

                    <li><a class="nav-link" href="{{ route('admin.networks.create') }}">Add Network</a></li>
                </ul>
            </li>


            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-stream"></i>
                    <span>Categories</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.categories.index') }}">All Categories</a></li>

                    <li><a class="nav-link" href="{{ route('admin.categories.create') }}">Add Category</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-calendar-alt"></i>
                    <span>Events</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.events.index') }}">All Events</a></li>

                    <li><a class="nav-link" href="{{ route('admin.events.create') }}">Add Event</a></li>
                </ul>
            </li>


            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-pen-alt"></i>
                    <span>Blogs</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.blogs.index') }}">All Blogs</a></li>

                    <li><a class="nav-link" href="{{ route('admin.blogs.create') }}">Add Blog</a></li>
                </ul>
            </li>




            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-tag"></i>
                    <span>Coupons</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.bulkUpload') }}">Bulk Upload</a></li>

                    <li><a class="nav-link" href="{{ route('admin.coupons.create') }}">Add Coupon</a></li>
                </ul>
            </li>
            <li class="menu-header">Extra</li>

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-gear"></i>
                    <span>HomeSettings</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.home-settings.index') }}">All HomeSettings</a></li>
                </ul>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.banners.index') }}">All Main Banners</a></li>
                </ul>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.smallBanners') }}">All Small Banners</a></li>
                </ul>
            </li>
            
            
              <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-message"></i>
                    <span>Comments/Emails</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.storeComments') }}">Store Comments</a></li>
                </ul>
                 <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.emails') }}">All Emails</a></li>
                </ul>
                <!--<ul class="dropdown-menu">-->
                <!--    <li><a class="nav-link" href="{{ route('admin.banners.index') }}">All Main Banners</a></li>-->
                <!--</ul>-->
                <!--<ul class="dropdown-menu">-->
                <!--    <li><a class="nav-link" href="{{ route('admin.smallBanners') }}">All Small Banners</a></li>-->
                <!--</ul>-->
            </li>
        </ul>


        <!--<div class="mt-4 mb-4 p-3 hide-sidebar-mini">-->
        <!--    <a href="https://getcodiepie.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split"><i-->
        <!--            class="fas fa-rocket"></i>-->
        <!--        Documentation</a>-->
        <!--</div>-->
    </aside>
</div>