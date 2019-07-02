<!DOCTYPE html>
<html lang="en">
<head>
  <?php  
    if (empty(Auth::user()->name))
    {  header('location:/');
    exit();   } ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>DASHBOARD</title>

  <!-- Bootstrap CSS -->
  <link href="/NiceAdmin/css/bootstrap.min.css" rel="stylesheet">
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
  <style type="text/css">
.scrollbar
{
  float: left;
  min-height: 300px;
  width: 65px;
  background: #F5F5F5;
  overflow-y: scroll;
  margin-bottom: 25px;
}
#style-1::-webkit-scrollbar
{
  width: 12px;
  background-color: #F5F5F5;
}
.force-overflow
{
}
  </style>
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
      <div class="top-nav notification-row" >
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">
          <!-- alert notification start-->
                                  @if(checkPermission(['admin','superadmin']))
          <li id="alert_notificatoin_bar" class="dropdown" >
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="icon-bell-l"></i>
                                            @if ($count_notif > 0)
                            <span class="badge bg-important" > </span>
                                            @else
                                            <span class="badge bg-important"></span>
                                            @endif
                        </a>
            <ul class="dropdown-menu extended notification" >
              <div class="bg-info" ></div>
              <li style="width: 365px;">
                                @if ($count_notif > 0)
                <p class="red">You have {{$count_notif}} notifications</p>
                                @else
                                <p class="red">
You have no notifications</p>
                                @endif
              </li>
               <div class="scrollbar" id="style-1" style="width: 365px; min-height: 10px; max-height: 300px;">
                      @foreach($notifikasi as $data)
              <li style="width:348px; padding-right: 5px;" class="force-overflow bg-warning" >
               
                @if  ($data->keterangan == 'KALAH' and $data->jenis == 'TENDER') 
                <a href="{{ URL('history/pem_tender?kode=') }}{{$data->kd_penjualan}}">
                @elseif ($data->keterangan == 'KALAH' and $data->jenis == 'NON-TENDER') 
                <a href="{{ URL('history/pem_non_tender?kode=') }}{{$data->kd_penjualan}}">
                @elseif ($data->keterangan == 'MENANG' and $data->jenis == 'TENDER') 
                <a href="{{ URL('pengalaman?kode=') }}{{$data->kd_penjualan}}">
                @elseif ($data->keterangan == 'MENANG' and $data->jenis == 'NON-TENDER') 
                <a href="{{ URL('pengalaman?kode=') }}{{$data->kd_penjualan}}">
                @else
                <a href="#">
                @endif
                  @php  ( $date_notif = date('d-M-Y', strtotime($data->created_at)))
                                <span class="label label-primary"><i class="fa fa-shopping-cart"></i>
                                   {{ $data->jenis}}</span><br>
                                  {{ $data->klien}}
                                <br><span class="small italic " style="color:silver;"> {{$date_notif}}
                                  <div class="pull-right" style="margin-top: 3px;">
                                    @if ($data->keterangan == 'KALAH')
                                  <text style="background-color:red; color: white; padding: 2px;">
                                  {{ $data->keterangan}}</text></div>
                                    @elseif ($data->keterangan == 'MENANG')                                  
                                  <text style="background-color:green; color: white; padding: 2px;
                                  margin-top: 2px;"> 
                                     {{ $data->keterangan}}</text></div>
                                    @endif
                                  </a>
              </li>@endforeach
            </div>
        @if(checkPermission(['admin','user']))
         <li style="width: 365px; background-color: #eee;" align="center" >
                  <button type="submit" class="red"><i class="fa fa-trash-o" style="color: black;"><small>Clear Notification</small></i></button>
        </li>
         @endif
         @if(checkPermission(['superadmin']))
        <form action="{{ URL('notif/destroy') }}" method="post" class="form" align="left">
         {{ csrf_field() }}
        <input name="_method" type="hidden" value="PATCH">
         <li style="width: 365px; background-color: #eee;" align="center" >
        <button type="submit" class="red"><i class="fa fa-trash-o" style="color: black;"><small>Clear Notification</small></i></button></li>
            </form>
                @endif
</li>
            </ul>
          </li>
          @endif
          <!-- alert notification end-->
          <!-- user login dropdown start-->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                           <?php  
                          if (empty(Auth::user()->name))
                            {  header('location:/');
                            exit();   } ?>
                            <span class="username" > {{ Auth::user()->name }} </span>
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
 @include('partials.sidebar')
  @if(checkPermission(['admin','superadmin']))
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <a href="/pengalaman">
            <div class="info-box green-bg">
              <i class="fa fa-briefcase"></i>
              <div class="count">{{$pengalaman }}</div>
              <div class="title" ><text style="color: white; padding: 5px;">PENGALAMAN</text></div>
            </div>
            <!--/.info-box-->
            </a>
          </div>
          <!--/.col-->
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <a class="" href="/pem_tender">
            <div class="info-box blue-bg">
              <i class="fa fa-external-link"></i>
              <div class="count">{{$tender}}</div>
              <div class="title">TENDER</div>
            </div>
            <!--/.info-box-->
            </a>
          </div>
          <!--/.col-->
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <a class="" href="/pem_non_tender">
            <div class="info-box dark-bg">
              <i class="fa fa-external-link-square"></i>
              <div class="count">{{$non_tender }}</div>
              <div class="title">NON TENDER</div>
            </div>
            <!--/.info-box-->
          </a>
          </div>
          <!--/.col-->

    @php ($date_pending = (date('Y'))+'1')
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <a class="" href="/pem_non_tender?status=pending">
            <div class="info-box orange-bg">
              <i class="fa fa-cubes"></i>
              <div class="count">{{$pending }}</div>
              <div class="title">PENDING TO {{$date_pending }}</div>
            </div>
            <!--/.info-box-->
                  </a>
          </div>
          <!--/.col-->
        </div>
@endif
         @if(checkPermission(['user']))
    <section id="main-content">
      <section class="wrapper">
      <div class="row">
          <div class="col-lg-12">
            <ol class="breadcrumb">
              <li><i class="fa fa-laptop"></i>Dashboard</li>
            </ol>
          </div>
        </div><br>
<div class="row">
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box green-bg">
              <i class="fa fa-briefcase"></i>
              <div class="count">{{$pengalaman }}</div>
              <div class="title">PENGALAMAN</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box blue-bg">
              <i class="fa fa-external-link"></i>
              <div class="count">{{$tender}}</div>
              <div class="title">TENDER</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box dark-bg">
              <i class="fa fa-external-link-square"></i>
              <div class="count">{{$non_tender }}</div>
              <div class="title">NON TENDER</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->
    @php ($date_pending = (date('Y'))+'1')
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box orange-bg">
              <i class="fa fa-cubes"></i>
              <div class="count">{{$pending }}</div>
              <div class="title">PENDING TO {{$date_pending }}</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->
        </div>
             </section>
      </section>
    @endif
             @if(checkPermission(['admin','superadmin']))
        @php ($year = (date('Y')))
        <!--/.row-->
          <div class="row" >
            <!-- chart morris start -->
            <div class="col-lg-12" >
              <section class="panel">
                <header class="panel-heading">
                  <h3></Char>
                      </header>
                      <div class="panel-body">
                        <div class="tab-pane" id="chartjs">
                      <div class="row">
                          <!-- Line -->
                          <div class="col-lg-7">
                              <section class="panel">
                                  <header class="panel-heading">
                                    <i class="fa fa-shopping-cart" style=" margin-right: -15px;"></i>
                                  <text> Sales in the last five years </header>
                                  <div class="panel-body text-center">
                                      <canvas id="canvas" height="300" width="500"></canvas>
                                  <div>
    @php ($year = (date('Y')))
    @php ($year1 = (date('Y')-1))
    @php ($year2 = (date('Y')-2))
    @php ($year3 = (date('Y')-3))
    @php ($year4 = (date('Y')-4))
        <br><br>
                                    <table class="table table-advance table-bordered">
                                      <tbody class="panel-heading">
                                      <td colspan="5" align="left"><i>Summary</i></td><tr>
                                      <td width="15%;"><text><strong>{{ $year4 }}</strong></text></td>
                                      <td width="15%;"><text><strong>{{ $year3 }}</text></td>
                                      <td width="15%;"><text><strong>{{ $year2 }}</text></td>
                                      <td width="15%;"><text><strong>{{ $year1 }}</text></td>
                                      <td width="15%;"><text><strong>{{ $year }}</text></td>
                                      </tbody>
                                      <tr>
        @if (empty($q4))
        <td width="15%;"><small></small></td>
        @else
        @php ( $qq4 = (number_format($q4,0,",",".").""))
        <td width="15%;"><small style="color: blue;"><strong>{{ $qq4 }}</strong></small></td>
        @endif

        @if (empty($q3))
        <td width="15%;"><small></small></td>
        @else
        @php ( $qq3 = (number_format($q3,0,",",".").""))
        <td width="15%;"><small style="color: blue;"><strong>{{ $qq3 }}</strong></small></td>
        @endif

        @if (empty($q2))
        <td width="15%;"><small></small></td>
        @else
        @php ( $qq2 = (number_format($q2,0,",",".").""))
        <td width="15%;"><small style="color: blue;"><strong>{{ $qq2 }}</strong></small></td>
        @endif
        
        @if (empty($q1))
        <td width="15%;"><small></small></td>
        @else
        @php ( $qq1 = (number_format($q1,0,",",".").""))
        <td width="15%;"><small style="color: blue;"><strong>{{ $qq1 }}</strong></small></td>
        @endif
       
        @if (empty($q))
        <td width="15%;"><small></small></td>
        @else
        @php ( $qq = (number_format($q,0,",",".").""))
        <td width="15%;"><small style="color: blue;"><strong>{{ $qq }}</strong></small></td>
        @endif
                                    </table>
                                  </div>
                                  </div>
                              </section>
                          </div>
                            @php ($k_ratio = $k_ratio1 + $k_ratio2)
                          <div class="col-lg-5">
                              <section class="panel">
                                  <header class="panel-heading">
                                      <small>
                                      <i class="fa fa-calendar" style=" margin-right: -15px;"></i>
                                     <text >Sales Activity {{$year}}</text></small>

                                  </header>
                                  <div class="panel-body text-center">
<canvas id="pie" height="250" width="400"></canvas>
<div class="pull-center"><i class="fa fa-circle" style="color : red;"></i>
<a class="" href="/history/pem_tender?tahun={{$year}}" title="Tender Kalah Tahun {{$year}}">
<text style="color: black; padding: 3px; margin-left: -3px;">Tender Lose : {{$k_ratio1}}</text></a>
<i class="fa fa-circle" style="color : red;"></i>
<a class="" href="history/pem_non_tender?tahun={{$year}}" title="Non-Tender Kalah Tahun {{$year}}">
<text style="color: black; padding: 3px; margin-left: -3px;">Non-Tender Lose : {{$k_ratio2}}</text></a>
<i class="fa fa-circle" style="color: green; "></i>
<a class="" href="pengalaman?tahun={{$year}}" title="Pengalaman Tahun {{$year}}">
<text style="color: black; padding: 3px; margin-left: -3px;"> Win : {{$p_ratio}}</text></a></div>
                                  </div>
                              </section>
                          </div>
                      </div>
            </div>
      </section>
<div class="modal fade" id="ModalKlien" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Laporan Klien</h4>
                      </div>
                      <div class="modal-body">
<div class="btn-group" role="group">
    <style>
  /* Style the input field */
  #myInput {
    padding: 20px;
    margin-top: -6px;
    border: 0;
    border-radius: 0;
    background: #f1f1f1;
  }
  </style>
<form class="navbar-form" action="{{ url('klien_export/') }}" method="GET"  >
<input type="hidden" name="jenis_sektor" value="-">
<select title="Pilih Jenis Sektor" class="selectpicker" multiple data-max-options="1" data-live-search="true" 
name="jenis_sektor">
    <optgroup label="Jenis Sektor">
        @foreach ($sektor as $data)
            <option value="{{ $data->nama_sektor }}" >{{ $data->nama_sektor }}</option>
        @endforeach
    </optgroup>
  </select>
</div>
</div>
                      <div class="modal-footer">
                        <button class="btn-sm btn-success" type="button" onclick="form.submit()">
                          <i class="fa fa-file-excel-o"> </i> Export To Excel</button>
</form>
                      </div>
                    </div>
                  </div>
                </div>

  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/css/bootstrap-select.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/js/bootstrap-select.min.js"></script>
  @endif
  <!-- container section start -->
    @php ($year = (date('Y')))
    @php ($year1 = (date('Y')-1))
    @php ($year2 = (date('Y')-2))
    @php ($year3 = (date('Y')-3))
    @php ($year4 = (date('Y')-4))

@include('partials/footer')
</body>
  <script>
   var barChartData = {
      labels : [{{ $year4 }},{{ $year3 }},{{ $year2 }},{{ $year1 }},{{ $year }}],
      datasets : [
        {
          fillColor : "rgba(151,187,205,0.5)",
          strokeColor : "rgba(151,187,205,1)",
          data : [{{$q4}},{{$q3}},{{$q2}},{{$q1}},{{$q}}]
        }
      ]
      
    }

  var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Bar(barChartData);
  
  </script>
    @php ($k_ratio = $k_ratio1 + $k_ratio2)
    <script>

    var pieData = [
    
        {
          value: {{$p_ratio}},
          color:"green"
        },
        {
          value : {{$k_ratio}},
          color : "red"
        }
      
      ];

  var myPie = new Chart(document.getElementById("pie").getContext("2d")).Pie(pieData);
  
  </script>
    <!-- nice scroll -->
    <script src="/NiceAdmin/js/jquery.scrollTo.min.js"></script>
    <script src="/NiceAdmin/js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- chartjs -->
    <script src="/NiceAdmin/assets/chart-master/Chart.js"></script>
    <!-- custom chart script for this page only-->
    <script src="/NiceAdmin/js/chartjs-custom.js"></script>
    <!--custome script for all page-->

</html>
</html>
