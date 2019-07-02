<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/css/bootstrap-select.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/js/bootstrap-select.min.js"></script>

  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link href="/NiceAdmin/css/bootstrap.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="/NiceAdmin/css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="/NiceAdmin/css/elegant-icons-style.css" rel="stylesheet" />
  <link href="/NiceAdmin/css/font-awesome.min.css" rel="stylesheet" />
  <!-- full calendar css-->
  <link href="/NiceAdmin/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
  <link href="/NiceAdmin/assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
  <!-- easy pie chart-->
  <link href="/NiceAdmin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
  <!-- owl carousel -->
  <link href="/NiceAdmin/stylesheet" href="css/owl.carousel.css" type="text/css">
  <link href="/NiceAdmin/css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
  <!-- Custom styles -->
  <link rel="/NiceAdmin/css/fullcalendar.css">
  <link href="/NiceAdmin/css/widgets.css" rel="stylesheet">
  <link href="/NiceAdmin/css/style.css" rel="stylesheet">
  <link href="/NiceAdmin/css/style-responsive.css" rel="stylesheet" />
  <link href="/NiceAdmin/css/xcharts.min.css" rel=" stylesheet">
  <link href="/NiceAdmin/css/jquery-ui-1.10.4.min.css" rel="stylesheet">
  <!-- =======================================================
    Theme Name: NiceAdmin
    Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>
  <!-- container section start -->
  <section id="container" class="">


    <header class="header dark-bg">
      <div class="toggle-nav">
      <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <span class="lite" style="color: green;"><a href="/home" class="logo" style="color: green;">SPRINT</a></span>
      <!--logo end-->
      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">

      
          <!-- user login dropdown start-->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                          <?php  
                          if (empty(Auth::user()->name))
                            {  header('location:/');
                            exit();   } ?>
                            <span class="username" >{{ Auth::user()->name }} </span>
                            <b class="caret"></b>
                        </a>
            <ul class="dropdown-menu extended ">
              <div class="log-arrow-up"></div>        
              <li><a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                   </a>
                   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
             </li>
            </ul>
          </li>
          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>
    <!--header end-->

    <!-- javascripts -->
  <script src="{{asset('NiceAdmin/js/jquery.js')}}"></script>
  <script src="{{asset('NiceAdmin/js/jquery-ui-1.10.4.min.js')}}"></script>
  <script src="{{asset('NiceAdmin/js/jquery-1.8.3.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('NiceAdmin/js/jquery-ui-1.9.2.custom.min.js')}}"></script>
  <!-- bootstrap -->
  <script src="{{asset('NiceAdmin/js/bootstrap.min.js')}}"></script>
  <!-- nice scroll -->
  <script src="{{asset('NiceAdmin/js/jquery.scrollTo.min.js')}}"></script>
  <script src="{{asset('NiceAdmin/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
  <!-- charts scripts -->
  <script src="{{asset('NiceAdmin/assets/jquery-knob/js/jquery.knob.js')}}"></script>
  <script src="{{asset('NiceAdmin/js/jquery.sparkline.js')}}" type="text/javascript"></script>
  <script src="{{asset('NiceAdmin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js')}}"></script>
  <script src="{{asset('NiceAdmin/js/owl.carousel.js')}}"></script>
  <!-- jQuery full calendar -->
  <<script src="{{asset('NiceAdmin/js/fullcalendar.min.js')}}"></script>
    <!-- Full Google Calendar - Calendar -->
    <script src="{{asset('NiceAdmin/assets/fullcalendar/fullcalendar/fullcalendar.js')}}"></script>
    <!--script for this page only-->
    <script src="{{asset('NiceAdmin/js/calendar-custom.js')}}"></script>
    <script src="{{asset('NiceAdmin/js/jquery.rateit.min.js')}}"></script>
    <!-- custom select -->
    <script src="{{asset('NiceAdmin/js/jquery.customSelect.min.js')}}"></script>
    <script src="{{asset('NiceAdmin/assets/chart-master/Chart.js')}}"></script>

    <!--custome script for all page-->
    <script src="{{asset('NiceAdmin/js/scripts.js')}}"></script>
    <!-- custom script for this page-->
    <script src="{{asset('NiceAdmin/js/sparkline-chart.js')}}"></script>
    <script src="{{asset('NiceAdmin/js/easy-pie-chart.js')}}"></script>
    <script src="{{asset('NiceAdmin/js/jquery-jvectormap-1.2.2.min.js')}}"></script>
    <script src="{{asset('NiceAdmin/js/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('NiceAdmin/js/xcharts.min.js')}}"></script>
    <script src="{{asset('NiceAdmin/js/jquery.autosize.min.js')}}"></script>
    <script src="{{asset('NiceAdmin/js/jquery.placeholder.min.js')}}"></script>
    <script src="{{asset('NiceAdmin/js/gdp-data.js')}}"></script>
    <script src="{{asset('NiceAdmin/js/morris.min.js')}}"></script>
    <script src="{{asset('NiceAdmin/js/sparklines.js')}}"></script>
    <script src="{{asset('NiceAdmin/js/charts.js')}}"></script>
    <script src="{{asset('NiceAdmin/js/jquery.slimscroll.min.js')}}"></script>
    <script>
      //knob
      $(function() {
        $(".knob").knob({
          'draw': function() {
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
        $("#owl-slider").owlCarousel({
          navigation: true,
          slideSpeed: 300,
          paginationSpeed: 400,
          singleItem: true
        });
      });

      //custom select box

      $(function() {
        $('select.styled').customSelect();
      });

      /* ---------- Map ---------- */
      $(function() {
        $('#map').vectorMap({
          map: 'world_mill_en',
          series: {
            regions: [{
              values: gdpData,
              scale: ['#000', '#000'],
              normalizeFunction: 'polynomial'
            }]
          },
          backgroundColor: '#eef3f7',
          onLabelShow: function(e, el, code) {
            el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
          }
        });
      });
    </script>
