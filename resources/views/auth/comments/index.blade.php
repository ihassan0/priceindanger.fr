
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ela Admin - HTML5 Admin Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="stylesheet" href="{{  url('./assets/css/table.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{  url('assets/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{ url('assets/css/style.css')}}">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />
</head>
<aside id="left-panel" class="left-panel" style="background-color: #111827 !important;">
    @include('components.dashboard-left')
</aside>
<div id="right-panel" class="right-panel">
    <!-- Header-->
    <header id="header" class="header">
        @include('components.dashboard-header')
    </header>
   {{-- <a href="{{ route('homesettings.create') }}">Add a Setting</a>  --}}
   <div class="content">
       <div class="animated fadeIn">
           <div class="row">
               <div class="col-lg-12">
                   <div class="card">
                       <div class="card-header">
                           <strong class="card-title">All Comments</strong>
                       </div>
                       <div class="card-body">
                           <table class="table">
                               <thead>
                                   <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                       <th>Comment</th>
                                        <th>Action</th>
                                     </tr>
                             </thead>
                             <tbody>
                               @foreach ($comments as $email )
                               <tr>
                                 <td>{{$email->name }}</td>
                                 <td>{{$email->email }}</td>
                                 <td>{{$email->comment}}</td>
                                 <td class="text-center">
                        @if($email->status ==0)
                          <button class="badge badge-danger"  style="border:none; cursor: pointer;" value="1" id="unblock-id" onclick="document.getElementById('status_value-{{ $email->id }}').value = this.value;   document.getElementById('block-form.{{ $email->id }}').submit();">Approve</button>
                          @else
                           <span><button class="badge badge-success" style="border:none; cursor: pointer;" id="block-id" value="0"  onclick=" document.getElementById('status_value-{{ $email->id }}').value = this.value; document.getElementById('block-form.{{ $email->id }}').submit();">Dismiss</button></span> 
                        @endif

                        <form action="{{ route('commentStatus') }}" hidden method="POST" id="block-form.{{ $email->id }}">
                            @csrf
                            <input type="text"  value="{{ $email->id }}" name="comment">
                            <input type="value" name="value" id="status_value-{{ $email->id }}">
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
</div><!-- .animated -->
<script src="{{  url('index.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="{{  url('assets/js/main.js')}}"></script>
<!--  Chart js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>
<!--Chartist Chart-->
<script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
<script src="{{  url('assets/js/init/weather-init.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
<script src="{{  url('assets/js/init/fullcalendar-init.js')}}"></script>

</body>
</html>
