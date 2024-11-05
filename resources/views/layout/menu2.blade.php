<!DOCTYPE html>
<html dir="ltr" lang="en" class="no-outlines">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Digital SK</title>
   <meta name="author" content="">
   <meta name="description" content="">
   <meta name="keywords" content="">

   <link rel="icon" href="favicon.png" type="image/png">

   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700%7CMontserrat:400,500">

   <!-- Stylesheets -->
   <link rel="stylesheet" href="{{asset('assets2/css/bootstrap.min.css') }}">
   <link rel="stylesheet" href="{{asset('assets2/css/fontawesome-all.min.css') }}">
   <link rel="stylesheet" href="{{asset('assets2/css/jquery-ui.min.css') }}">
   <link rel="stylesheet" href="{{asset('assets2/css/perfect-scrollbar.min.css') }}">
   <link rel="stylesheet" href="{{asset('assets2/css/morris.min.css') }}">
   <link rel="stylesheet" href="{{asset('assets2/css/select2.min.css') }}">
   <link rel="stylesheet" href="{{asset('assets2/css/jquery-jvectormap.min.css') }}">
   <link rel="stylesheet" href="{{asset('assets2/css/horizontal-timeline.min.css') }}">
   <link rel="stylesheet" href="{{asset('assets2/css/weather-icons.min.css') }}">
   <link rel="stylesheet" href="{{asset('assets2/css/dropzone.min.css') }}">
   <link rel="stylesheet" href="{{asset('assets2/css/ion.rangeSlider.min.css') }}">
   <link rel="stylesheet" href="{{asset('assets2/css/ion.rangeSlider.skinFlat.min.css') }}">
   <link rel="stylesheet" href="{{asset('assets2/css/datatables.min.css') }}">
   <link rel="stylesheet" href="{{asset('assets2/css/fullcalendar.min.css') }}">
   <link rel="stylesheet" href="{{asset('assets2/css/style.css') }}">

   <link href="https://cdn.datatables.net/2.1.3/css/dataTables.dataTables.css" rel="stylesheet">

   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   
</head>

<body>
   <div class="wrapper">
      <header class="navbar navbar-fixed">
         <div class="navbar--header">
            <a href="#" class="logo">
               <h3>Disbunnak</h3>
            </a>
         </div>

         <a href="#" class="navbar--btn" data-toggle="sidebar" title="Toggle Sidebar">
            <i class="fa fa-bars"></i>
         </a>

         <div class="navbar--nav ml-auto">
            <ul class="nav">
               <li class="nav-item dropdown nav--user online">
                  <a href="#" class="nav-link" data-toggle="dropdown">
                     <span>Username</span>
                     <i class="fa fa-angle-down"></i>
                  </a>
                  <ul class="dropdown-menu">
                     <li><a href="profile.html"><i class="far fa-user"></i>Profile</a></li>
                     <li><a href="{{ route('logout')}}"><i class="fa fa-power-off"></i>Logout</a></li>
                  </ul>
               </li>
            </ul>
         </div>
      </header>

      <aside class="sidebar" data-trigger="scrollbar">
         <div class="sidebar--nav">
            <ul>
               <li>
                  <ul>
                     <li class="active">
                        <a href="{{ route('home')}}" title="Dashboard">
                           <i class="fa fa-home"></i>
                           <span>Dashboard</span>
                        </a>
                     </li>
                     
                     <li>
                        <a href="{{route('digitalsk2.index')}}">
                           <i class="far fa-calendar-alt"></i>
                           <span>Digital SK</span>
                        </a>
                     </li>
                    
                  </ul>
               </li>
         </div>
      </aside>

      <!-- Main Container Start -->
      <main class="main--container">
         <section class="main--content">
            <div class="panel">
               <div class="panel-content">

                @yield('konten2')

               </div>
            </div>
         </section>
         <footer class="main--footer main--footer-light">
            SMK Telkom Banjarbaru 2024
         </footer>
      </main>
   </div>

   <!-- Scripts -->
   <script src="{{asset('assets2/js/jquery.min.js') }}"></script>
   <script src="{{asset('assets2/js/jquery-ui.min.js') }}"></script>
   <script src="{{asset('assets2/js/bootstrap.bundle.min.js') }}"></script>
   <script src="{{asset('assets2/js/perfect-scrollbar.min.js') }}"></script>
   <script src="{{asset('assets2/js/jquery.sparkline.min.js') }}"></script>
   <script src="{{asset('assets2/js/raphael.min.js') }}"></script>
   <script src="{{asset('assets2/js/morris.min.js') }}"></script>
   <script src="{{asset('assets2/js/select2.min.js') }}"></script>
   <script src="{{asset('assets2/js/jquery-jvectormap.min.js') }}"></script>
   <script src="{{asset('assets2/js/jquery-jvectormap-world-mill.min.js') }}"></script>
   <script src="{{asset('assets2/js/horizontal-timeline.min.js') }}"></script>
   <script src="{{asset('assets2/js/jquery.validate.min.js') }}"></script>
   <script src="{{asset('assets2/js/jquery.steps.min.js') }}"></script>
   <script src="{{asset('assets2/js/dropzone.min.js') }}"></script>
   <script src="{{asset('assets2/js/ion.rangeSlider.min.js') }}"></script>
   <script src="{{asset('assets2/js/datatables.min.js') }}"></script>
   <script src="{{asset('assets2/js/main.js') }}"></script>

   <script src="//code.jquery.com/jquery-3.7.1.js"></script>
   <script src="https://cdn.datatables.net/2.1.3/js/dataTables.js"></script>
   <!-- Page Level Scripts -->
</body>

</html>

<script>
   new DataTable('#example');
</script>
