<!DOCTYPE html>
<html lang="en">
<head>
  <?php  
    if (empty(Auth::user()->name))
    {  header('location:/');
    exit();   } ?>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>DASHBOARD</title>
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
  <script src="{{asset('NiceAdmin/js/fullcalendar.min.js')}}"></script>
    <!-- Full Google Calendar - Calendar -->
    <script src="{{asset('NiceAdmin/assets/fullcalendar/fullcalendar/fullcalendar.js')}}"></script>
    <!--script for this page only-->
    <script src="{{asset('NiceAdmin/js/calendar-custom.js')}}"></script>
    <script src="{{asset('NiceAdmin/js/jquery.rateit.min.js')}}"></script>
    <!-- custom select -->
    <script src="{{asset('NiceAdmin/js/jquery.customSelect.min.js')}}"></script>
    <script src="{{asset('NiceAdmin/assets/chart-master/Chart.js')}}"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/css/bootstrap-select.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/js/bootstrap-select.min.js"></script>

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
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  @include('partials.header')

  @include('partials.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Version 2.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">

    @if(checkPermission(['admin','superadmin']))
        @php ($year = (date('Y')))
        <!--/.row-->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>
          <div class="row" >
            <!-- chart morris start -->
            <div class="col-lg-12" >
              <section class="panel">
                        <div class="tab-pane" id="chartjs">
                      <div class="row">
                          <!-- Line -->
                                  <div class="col-sm-3">
          <div class="info-box">
                                  <a href="/pengalaman">
            <span class="info-box-icon bg-aqua"><i class="fa fa-briefcase"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">PENGALAMAN</span>
              <span class="info-box-number">{{$pengalaman }}</span>
            </div>
          </a>
            <!-- /.info-box-content -->
          </div>
            <!-- /.col -->
          <div class="info-box">
                        <a class="" href="/pem_tender">
            <span class="info-box-icon bg-red"><i class="fa fa-external-link"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">TENDER</span>
              <span class="info-box-number">{{$tender}}</span>
            </div>
          </a>
            <!-- /.info-box-content -->
          <!-- /.info-box -->
        </div>
          <div class="info-box">
                        <a class="" href="/pem_non_tender">
            <span class="info-box-icon bg-green"><i class="fa fa-external-link-square"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">NON TENDER</span>
              <span class="info-box-number">{{$non_tender }}</span>
            </div>
          </a>
            <!-- /.info-box-content -->
          </div>
          <div class="info-box">
          <a class="" href="/pem_non_tender?status=pending">
            <span class="info-box-icon bg-yellow"><i class="fa fa-cubes"></i></span>
    @php ($date_pending = (date('Y'))+'1')
            <div class="info-box-content">
              <span class="info-box-text">PENDING {{$date_pending }}</span>
              <span class="info-box-number">{{$pending }}</span>
            </div>
            <!-- /.info-box-content -->
          </a>
          </div>
                  <div class="info-box">
          <a class="" href="/proyek">
            <span class="info-box-icon bg-orange"><i class="fa fa-arrow-up"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">PROYEK AKTIF</span>
              <span class="info-box-number">{{$project_active }}</span>
            </div>
            <!-- /.info-box-content -->
          </a>
          </div>
       <div class="info-box">
          <a class="" href="/proyek/close">
            <span class="info-box-icon bg-grey"><i class="fa fa-arrow-down"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">PROYEK NON AKTIF</span>
              <span class="info-box-number">{{$project_non_active }}</span>
            </div>
            <!-- /.info-box-content -->
          </a>
          </div>
                 <div class="info-box">
          <a class="" href="/uudp">
            <span class="info-box-icon bg-purple"><i class="fa fa-calculator"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">UUDP AKTIF</span>
              <span class="info-box-number">{{$uudp }}</span>
            </div>
            <!-- /.info-box-content -->
          </a>
          </div>

                 <div class="info-box">
          <a class="" href="/sppd">
            <span class="info-box-icon bg-black"><i class="fa fa-ship"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">SPPD AKTIF</span>
              <span class="info-box-number">{{$sppd }}</span>
            </div>
            <!-- /.info-box-content -->
          </a>
          </div>                 <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="fa fa-barcode"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">TAGIHAN AKTIF</span>
              <span class="info-box-number">{{$tagihan }}</span>
            </div>
          </div>
        </div>
                          <div class="col-sm-3">
                              <section class="panel">
                                  <header class="panel-heading">
                                    <i class="fa fa-shopping-cart" ></i>
                                  <text> Sales Comparison </header>
                                  <div class="panel-body text-center">
                                      <canvas id="canvas" height="300" width="300"></canvas>
                                  </div>
                              </section>
                          </div>
                            @php ($k_ratio = $k_ratio1 + $k_ratio2)
<div>
    @php ($year = (date('Y')))
    @php ($year1 = (date('Y')-1))
    @php ($year2 = (date('Y')-2))
    @php ($year3 = (date('Y')-3))
    @php ($year4 = (date('Y')-4))
        <br><br>
                          <div class="col-sm-3" style="padding-bottom: 220px;">
                                    <table class="table table-advance table-bordered">
                                      <tbody class="panel-heading">
                                      <td colspan="5" align="left"><i>Sales Breakdown</i></td><tr>
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
                          <div class="col-sm-4" style="float: right; padding-right: 20px;">
                              <section class="panel">
                                  <header class="panel-heading">
                                      <i class="fa fa-calendar" ></i>
                                     <text >Sales Activity {{$year}}</text>
                                  </header>
<canvas id="pie" height="350" width="350"></canvas>
<div class="pull-center">
<i class="fa fa-circle" style="color : #E0E4CC;"></i>
<a class="" href="/history/pem_tender?tahun={{$year}}" title="Tender Kalah Tahun {{$year}}">
<text style="text-align: left;">Tender Kalah : {{$k_ratio1}}</text></a>
<br>
<i class="fa fa-circle" style="color : #69D2E7;"></i>
<a class="" href="history/pem_non_tender?tahun={{$year}}" title="Non-Tender Kalah Tahun {{$year}}">
<text style="text-align: left;">Non-Tender Kalah : {{$k_ratio2}}</text></a>
<br>
<i class="fa fa-circle" style="color: #F38630; "></i>
<a class="" href="pengalaman?tahun={{$year}}" title="Pengalaman Tahun {{$year}}">
<text style="text-align: left;"> Menang : {{$p_ratio}}</text></a><br>
</div>
                              </section>
                          </div>
@foreach ($nilai_tagihan as $datas)
@php(@$kontrak = ($datas->nilai_addendum) + (($datas->nilai_kontrak)))

@php($percent = $datas->revenue_percent)
@php($percent_kontrak =  ($kontrak * $percent / 100))
@php(@$ppn = $percent_kontrak * 10 / 100)
@php(@$tagihan = ($percent_kontrak + $ppn + $datas->tarip_unit + $datas->biaya_analisa + $datas->materai + $datas->lain_lain) - $datas->potongan)
@endforeach 
@if (@tagihan > '0')
@php(@$total_tagihan = @$tagihan )
@else
@php(@$total_tagihan = '0' )
@endif

@foreach ($budget as $datas)
@php( @$cost_total = ($datas->cost * $datas->volume) + $datas->cost_extend )

@php( @$total_budget += $cost_total )
@endforeach

          @php (@$factual_cost = (number_format($actual_cost,0,",",".").""))
          @php (@$ftotal_budget = (number_format(@$total_budget,0,",",".").""))
          @php (@$ftotal_tagihan = (number_format($total_tagihan,0,",",".").""))


             <div class="col-sm-4">
                                  <header class="panel-heading">
                                    <i class="fa fa-dollar" ></i>
                                  <text> Tagihan Aktif vs Budget vs Actual Cost</header>
            <canvas id="radar" height="350" width="350"></canvas>
<div class="pull-center">
<i class="fa fa-circle" style="color : #F7464A;"></i>
<a class="" href="/history/pem_tender?tahun={{$year}}" title="Total Biaya UUDP dan SPPD">
<text style="text-align: left;">Permintaan Biaya: {{$factual_cost}}</text></a>
<br>
<i class="fa fa-circle" style="color : #46BFBD;"></i>
<a class="" href="history/pem_non_tender?tahun={{$year}}" title="Total Budget yang sudah di setujui">
<text style="text-align: left;">Total Budget : {{$ftotal_budget}}</text></a>
<br>
<i class="fa fa-circle" style="color: #FDB45C; "></i>
<a class="" href="pengalaman?tahun={{$year}}" title="Total Tagihan yang belum di tagihkan">
<text style="text-align: left;">Tagihan Aktif: {{$ftotal_tagihan}}</text></a><br>
</div>
</div>

                      </div>
            </div>
      </section>

                          <!-- Line -->
@foreach ($t1 as $datas)
@php(@$kontrak = ($datas->nilai_addendum) + (($datas->nilai_kontrak)))

@php($percent = $datas->revenue_percent)
@php($percent_kontrak =  ($kontrak * $percent / 100))
@php(@$ppn = $percent_kontrak * 10 / 100)
@php(@$tagihan1 = ($percent_kontrak + $ppn + $datas->tarip_unit + $datas->biaya_analisa + $datas->materai + $datas->lain_lain) - $datas->potongan)
@endforeach 
@if (@tagihan1 > '0')
@php(@$total_tagihan1 = @$tagihan1 )
@else
@php(@$total_tagihan1 = '0' )
@endif

@foreach ($t2 as $datas)
@php(@$kontrak = ($datas->nilai_addendum) + (($datas->nilai_kontrak)))

@php($percent = $datas->revenue_percent)
@php($percent_kontrak =  ($kontrak * $percent / 100))
@php(@$ppn = $percent_kontrak * 10 / 100)
@php(@$tagihan2 = ($percent_kontrak + $ppn + $datas->tarip_unit + $datas->biaya_analisa + $datas->materai + $datas->lain_lain) - $datas->potongan)
@endforeach 
@if (@tagihan2 > '0')
@php(@$total_tagihan2 = @$tagihan2 )
@else
@php(@$total_tagihan2 = '0' )
@endif

@foreach ($t3 as $datas)
@php(@$kontrak = ($datas->nilai_addendum) + (($datas->nilai_kontrak)))
@php($percent = $datas->revenue_percent)
@php($percent_kontrak =  ($kontrak * $percent / 100))
@php(@$ppn = $percent_kontrak * 10 / 100)
@php(@$tagihan3 = ($percent_kontrak + $ppn + $datas->tarip_unit + $datas->biaya_analisa + $datas->materai + $datas->lain_lain) - $datas->potongan)
@endforeach 
@if (@tagihan3 > '0')
@php(@$total_tagihan3 = @$tagihan3 )
@else
@php(@$total_tagihan3 = '0' )
@endif

@foreach ($t4 as $datas)
@php(@$kontrak = ($datas->nilai_addendum) + (($datas->nilai_kontrak)))

@php($percent = $datas->revenue_percent)
@php($percent_kontrak =  ($kontrak * $percent / 100))
@php(@$ppn = $percent_kontrak * 10 / 100)
@php(@$tagihan4 = ($percent_kontrak + $ppn + $datas->tarip_unit + $datas->biaya_analisa + $datas->materai + $datas->lain_lain) - $datas->potongan)
@endforeach 
@if (@tagihan4 > '0')
@php(@@$total_tagihan4 = @$tagihan4 )
@else
@php(@$total_tagihan4 = '0' )
@endif

@foreach ($t5 as $datas)
@php(@$kontrak = ($datas->nilai_addendum) + (($datas->nilai_kontrak)))

@php($percent = $datas->revenue_percent)
@php($percent_kontrak =  ($kontrak * $percent / 100))
@php(@$ppn = $percent_kontrak * 10 / 100)
@php(@$tagihan5 = ($percent_kontrak + $ppn + $datas->tarip_unit + $datas->biaya_analisa + $datas->materai + $datas->lain_lain) - $datas->potongan)
@endforeach 
@if (@tagihan5 > '0')
@php(@$total_tagihan5 = @$tagihan5 )
@else
@php(@$total_tagihan5 = '0' )
@endif

@foreach ($t6 as $datas)
@php(@$kontrak = ($datas->nilai_addendum) + (($datas->nilai_kontrak)))

@php($percent = $datas->revenue_percent)
@php($percent_kontrak =  ($kontrak * $percent / 100))
@php(@$ppn = $percent_kontrak * 10 / 100)
@php(@$tagihan6 = ($percent_kontrak + $ppn + $datas->tarip_unit + $datas->biaya_analisa + $datas->materai + $datas->lain_lain) - $datas->potongan)
@endforeach 
@if (@tagihan6 > '0')
@php(@$total_tagihan6 = @$tagihan6 )
@else
@php(@$total_tagihan6 = '0' )
@endif

@foreach ($t7 as $datas)
@php(@$kontrak = ($datas->nilai_addendum) + (($datas->nilai_kontrak)))

@php($percent = $datas->revenue_percent)
@php($percent_kontrak =  ($kontrak * $percent / 100))
@php(@$ppn = $percent_kontrak * 10 / 100)
@php(@$tagihan7 = ($percent_kontrak + $ppn + $datas->tarip_unit + $datas->biaya_analisa + $datas->materai + $datas->lain_lain) - $datas->potongan)
@endforeach 
@if (@tagihan7 > '0')
@php($total_tagihan7 = @$tagihan7 )
@else
@php($total_tagihan7 = '0' )
@endif

@foreach ($t8 as $datas)
@php(@$kontrak = ($datas->nilai_addendum) + (($datas->nilai_kontrak)))

@php($percent = $datas->revenue_percent)
@php($percent_kontrak =  ($kontrak * $percent / 100))
@php(@$ppn = $percent_kontrak * 10 / 100)
@php(@$tagihan8 = ($percent_kontrak + $ppn + $datas->tarip_unit + $datas->biaya_analisa + $datas->materai + $datas->lain_lain) - $datas->potongan)
@endforeach 
@if (@tagihan8 > '0')
@php($total_tagihan8 = @$tagihan8 )
@else
@php($total_tagihan8 = '0' )
@endif

@foreach ($t9 as $datas)
@php(@$kontrak = ($datas->nilai_addendum) + (($datas->nilai_kontrak)))

@php($percent = $datas->revenue_percent)
@php($percent_kontrak =  ($kontrak * $percent / 100))
@php(@$ppn = $percent_kontrak * 10 / 100)
@php(@$tagihan9 = ($percent_kontrak + $ppn + $datas->tarip_unit + $datas->biaya_analisa + $datas->materai + $datas->lain_lain) - $datas->potongan)
@endforeach 
@if (@tagihan9 > '0')
@php($total_tagihan9 = @$tagihan9 )
@else
@php($total_tagihan9 = '0' )
@endif

@foreach ($t10 as $datas)
@php(@$kontrak = ($datas->nilai_addendum) + (($datas->nilai_kontrak)))

@php($percent = $datas->revenue_percent)
@php($percent_kontrak =  ($kontrak * $percent / 100))
@php(@$ppn = $percent_kontrak * 10 / 100)
@php(@$tagihan10 = ($percent_kontrak + $ppn + $datas->tarip_unit + $datas->biaya_analisa + $datas->materai + $datas->lain_lain) - $datas->potongan)
@endforeach 
@if (@tagihan10 > '0')
@php($total_tagihan10 = @$tagihan10 )
@else
@php($total_tagihan10 = '0' )
@endif

@foreach ($t11 as $datas)
@php(@$kontrak = ($datas->nilai_addendum) + (($datas->nilai_kontrak)))

@php($percent = $datas->revenue_percent)
@php($percent_kontrak =  ($kontrak * $percent / 100))
@php(@$ppn = $percent_kontrak * 10 / 100)
@php(@$tagihan11 = ($percent_kontrak + $ppn + $datas->tarip_unit + $datas->biaya_analisa + $datas->materai + $datas->lain_lain) - $datas->potongan)
@endforeach 
@if (@tagihan11 > '0')
@php($total_tagihan11 = @$tagihan11 )
@else
@php($total_tagihan11 = '0' )
@endif

@foreach ($t12 as $datas)
@php(@$kontrak = ($datas->nilai_addendum) + (($datas->nilai_kontrak)))

@php($percent = $datas->revenue_percent)
@php($percent_kontrak =  ($kontrak * $percent / 100))
@php(@$ppn = $percent_kontrak * 10 / 100)
@php(@$tagihan12 = ($percent_kontrak + $ppn + $datas->tarip_unit + $datas->biaya_analisa + $datas->materai + $datas->lain_lain) - $datas->potongan)
@endforeach 
@if (@tagihan12 > '0')
@php($total_tagihan12 = @$tagihan12 )
@else
@php($total_tagihan12 = '0' )
@endif
                          <div class="col-sm-12">
                              <section class="panel">
                                  <header class="panel-heading">
                                    <i class="fa fa-dollar" ></i>
                                  <text> Sales vs Actual Revenue {{$year}}</header>
    <canvas id="line" height="450" width="1000"></canvas>
<br>
<table class="table table-advance table-bordered">
                                      <tbody class="panel-heading">
                                      <td colspan="5" align="left"><i>Breakdown</i></td><tr>
                                        <td></td>
                                      <td width="15%;"><text><strong>Januari</strong></text></td>
                                      <td width="15%;"><text><strong>Februari</text></td>
                                      <td width="15%;"><text><strong>Maret</text></td>
                                      <td width="15%;"><text><strong>April</text></td>
                                      <td width="15%;"><text><strong>Mei</text></td>
                                      <td width="15%;"><text><strong>Juni</text></td>
                                      <td width="15%;"><text><strong>Juli</text></td>
                                      <td width="15%;"><text><strong>Agustus</text></td>
                                      <td width="15%;"><text><strong>September</text></td>
                                      <td width="15%;"><text><strong>Oktober</text></td>
                                      <td width="15%;"><text><strong>November</text></td>
                                      <td width="15%;"><text><strong>Desember</text></td>
                                      </tbody>
                                      <tr>
        <td><strong>Sales</strong></td>
                 @php ( $fp1 = (number_format($p1,0,",",".").""))
        <td width="15%;"><small style="color: blue;"><strong>{{ $fp1 }}</strong></small></td>     
        @php ( $fp2 = (number_format($p2,0,",",".").""))
        <td width="15%;"><small style="color: blue;"><strong>{{ $fp2 }}</strong></small></td>    
        @php ( $fp3 = (number_format($p3,0,",",".").""))
        <td width="15%;"><small style="color: blue;"><strong>{{ $fp3 }}</strong></small></td>        
        @php ( $fp4 = (number_format($p4,0,",",".").""))
        <td width="15%;"><small style="color: blue;"><strong>{{ $fp4 }}</strong></small></td>   
        @php ( $fp5 = (number_format($p5,0,",",".").""))
        <td width="15%;"><small style="color: blue;"><strong>{{ $fp5 }}</strong></small></td>
        @php ( $fp6 = (number_format($p6,0,",",".").""))
        <td width="15%;"><small style="color: blue;"><strong>{{ $fp6 }}</strong></small></td>                              @php ( $fp7 = (number_format($p7,0,",",".").""))
        <td width="15%;"><small style="color: blue;"><strong>{{ $fp7 }}</strong></small></td>                @php ( $fp8 = (number_format($p8,0,",",".").""))
        <td width="15%;"><small style="color: blue;"><strong>{{ $fp8 }}</strong></small></td>                    @php ( $fp9 = (number_format($p9,0,",",".").""))
        <td width="15%;"><small style="color: blue;"><strong>{{ $fp9 }}</strong></small></td>     
        @php ( $fp10  = (number_format($p10,0,",",".").""))
        <td width="15%;"><small style="color: blue;"><strong>{{ $fp10 }}</strong></small></td> 
        @php ( $fp11 = (number_format($p11,0,",",".").""))
        <td width="15%;"><small style="color: blue;"><strong>{{ $fp11 }}</strong></small></td>                         @php ( $fp12 = (number_format($p12,0,",",".").""))
        <td width="15%;"><small style="color: blue;"><strong>{{ $fp12 }}</strong></small></td>                                       
                                      <tr>
                <td><strong>Actual Revenue</strong></td>
                @php ( $ftotal_tagihan1 = (number_format($total_tagihan1,0,",",".").""))
        <td width="15%;"><small style="color: blue;"><strong>{{ $ftotal_tagihan1 }}</strong></small></td>
                @php ( $ftotal_tagihan2 = (number_format($total_tagihan2,0,",",".").""))
        <td width="15%;"><small style="color: blue;"><strong>{{ $ftotal_tagihan2 }}</strong></small></td>
                @php ( $ftotal_tagihan3 = (number_format($total_tagihan3,0,",",".").""))
        <td width="15%;"><small style="color: blue;"><strong>{{ $ftotal_tagihan3 }}</strong></small></td>
                @php ( $ftotal_tagihan4 = (number_format($total_tagihan4,0,",",".").""))
        <td width="15%;"><small style="color: blue;"><strong>{{ $ftotal_tagihan4 }}</strong></small></td>
                @php ( $ftotal_tagihan5 = (number_format($total_tagihan5,0,",",".").""))
        <td width="15%;"><small style="color: blue;"><strong>{{ $ftotal_tagihan5 }}</strong></small></td>
                 @php ( $ftotal_tagihan6 = (number_format($total_tagihan6,0,",",".").""))
        <td width="15%;"><small style="color: blue;"><strong>{{ $ftotal_tagihan6 }}</strong></small></td>
                  @php ( $ftotal_tagihan7 = (number_format($total_tagihan7,0,",",".").""))
        <td width="15%;"><small style="color: blue;"><strong>{{ $ftotal_tagihan7 }}</strong></small></td>
                  @php ( $ftotal_tagihan8 = (number_format($total_tagihan8,0,",",".").""))
        <td width="15%;"><small style="color: blue;"><strong>{{ $ftotal_tagihan8 }}</strong></small></td>
                          @php ( $ftotal_tagihan9 = (number_format($total_tagihan9,0,",",".").""))
        <td width="15%;"><small style="color: blue;"><strong>{{ $ftotal_tagihan9 }}</strong></small></td>
                          @php ( $ftotal_tagihan10 = (number_format($total_tagihan10,0,",",".").""))
        <td width="15%;"><small style="color: blue;"><strong>{{ $ftotal_tagihan10 }}</strong></small></td>
              @php ( $ftotal_tagihan11 = (number_format($total_tagihan11,0,",",".").""))
        <td width="15%;"><small style="color: blue;"><strong>{{ $ftotal_tagihan11 }}</strong></small></td>
                          @php ( $ftotal_tagihan12 = (number_format($total_tagihan12,0,",",".").""))
        <td width="15%;"><small style="color: blue;"><strong>{{ $ftotal_tagihan12 }}</strong></small></td></table>
                                  </div>
                              </section>
                          </div>

  @endif
  <!-- container section start -->
    @php ($year = (date('Y')))
    @php ($year1 = (date('Y')-1))
    @php ($year2 = (date('Y')-2))
    @php ($year3 = (date('Y')-3))
    @php ($year4 = (date('Y')-4))

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
          color:"#F38630"
        },        {
          value: {{$k_ratio1}},
          color:"#E0E4CC"
        },
        {
          value : {{$k_ratio2}},
          color : "#69D2E7"
        }
      
      ];

  var myPie = new Chart(document.getElementById("pie").getContext("2d")).Pie(pieData);
  </script>

    <script>

    var lineChartData = {
      labels : ["January","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"],
        datasets : [
        {
          fillColor : "rgba(220,220,220,0.5)",
          strokeColor : "rgba(220,220,220,1)",
          pointColor : "rgba(220,220,220,1)",
          pointStrokeColor : "#fff",
data : [{{$p1}},{{$p1}},{{$p3}},{{$p4}},{{$p5}},{{$p7}},{{$p8}},{{$p9}},{{$p10}},{{$p11}},{{$p12}}]
        },
        {
          fillColor : "rgba(226,106,106,1)",
          strokeColor : "rgba(226,106,106,1)",
          pointColor : "rgba(240,52,52,1)",
          pointStrokeColor : "#fff",
          data : [{{@$total_tagihan1}},{{@$total_tagihan2}},{{@$total_tagihan3}},{{@$total_tagihan4}},{{@$total_tagihan5}},{{@$total_tagihan6}},{{@$total_tagihan7}},{{@$total_tagihan8}},{{@$total_tagihan9}},{{@$total_tagihan10}},{{@$total_tagihan11}},{{@$total_tagihan12}}]
        }
      ]
      
    }

  var myLine = new Chart(document.getElementById("line").getContext("2d")).Line(lineChartData);
  
  </script>

  <script>

    var doughnutData = [
        {
          value: {{@$actual_cost}},
          color:"#F7464A"
        },
        {
          value : {{@$total_budget}},
          color : "#46BFBD"
        },
        {
          value : {{@$total_tagihan}},
          color : "#FDB45C"
        }
      
      ];

  var myDoughnut = new Chart(document.getElementById("radar").getContext("2d")).Doughnut(doughnutData);
  
  </script>
</div>
</div>
@include('partials/footer')
</body>

</html>
