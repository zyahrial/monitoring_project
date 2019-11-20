  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="/assets/bower_components/jvectormap/jquery-jvectormap.css">

  <link rel="stylesheet" href="/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/assets/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="/assets/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="/assets/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

<style type="text/css">
input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none; 
    margin: 0; 
}
input[type=number] {
    -moz-appearance:textfield;
}
</style>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">  <!--sidebar start-->
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
                   @if(checkPermission(['admin','superadmin']))
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview menu-open">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
                    <ul class="treeview-menu">
            <li><a href="/home"><i class="fa fa-circle-o"></i>Dashboard</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li><a  href="/klien">  Klien</a></li>
              <li><a  href="/ta">  Tenaga Ahli</a></li>
               <li><a  href="/rekanan">   Rekanan</a></li>
               <li><a  href="/pem_tender">   Tender</a></li>
               <li><a  href="/pem_non_tender">   Non Tender</a></li>
               <li><a  href="/pengalaman">   Pengalaman</a></li>
               <li><a  href="/proyek">   Proyek</a></li>
              <li><a  href="/uudp"> -UUDP</a></li>
                            <li><a  href="/sppd"> -SPPD</a></li>

          </ul>
        </li>
      
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>History</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a  href="/history/pem_tender">  History Tender</a></li>
            <li><a  href="/history/pem_non_tender">  History Non Tender</a></li>
            <li><a  href="/proyek/close">  Project Close</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Notif Set</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li><a  href="/mail"> Notif Rekanan</a></li>
             <li><a  href="/reminder_pengalaman"> Notif Pengalaman</a></li>
             <li><a  href="/reminder_tender"> Notif (Tender)</a></li>
             <li><a  href="/reminder_non_tender"> Notif (Non Tender)</a></li>
             <li><a  href="/proyek/notif"> Notif Proyek</a></li>
          </ul>
        </li>

                <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li><a  href="/user"> Setting</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-file-excel-o"></i> <span>Report</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a  data-toggle="modal" href="#ModalUser"> User</a></li></li>
             <li><a  data-toggle="modal" href="#ModalKlien"> Klien</a></li>
             <li><a  data-toggle="modal" href="#ModalTa"> Tenaga Ahli</a></li>
             <li><a  data-toggle="modal" href="#ModalRekanan"> Rekanan</a></li>
              <li><a  data-toggle="modal" href="#ModalPengalaman"> Pengalaman</a></li>          
          </ul>
        </li>

                <li class="treeview">
          <a href="#">
            <i class="fa fa-cogs"></i> <span>Library</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li><a  data-toggle="modal" href="/jasa"> Lib Jasa</a></li></li>
             <li><a  data-toggle="modal" href="/activity"> Lib Kegiatan</a></li>
             <li><a  data-toggle="modal" href="/ib/lib/lib_item_biaya"> Lib Item Biaya</a></li>

          </ul>
        </li>
      </ul>
      @endif
             @if(checkPermission(['user']))
           <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview menu-open">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li><a class="" href="/klien"> Klien</a></li>
              <li><a class="" href="/ta"> Tenaga Ahli</a></li>
               <li><a class="" href="/rekanan"> Rekanan</a></li>
               <li><a class="" href="/pem_tender_user"> Penjualan (Tender)</a></li>
               <li><a class="" href="/pem_non_tender_user"> Penjualan Non (Tender)</a></li>
               <li><a class="" href="/pengalaman_user"> Pengalaman</a></li>
                <li><a class="" href="/proyek/index_user"> Proyek</a></li>

          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span> User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li><a class="" href="/profile"> Password</a></li>
          </ul>
        </li>
      </ul>
           @endif
     </section>
    <!-- /.sidebar -->
  </aside>

{{--modal pengalaman--}}
<div class="modal fade" id="ModalPengalaman" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Laporan Pengalaman</h4>
                      </div>
                      <div class="modal-body">
                        <small>Filter Kontrak Mulai:</small>
<div class="btn-group" role="group">
<form class="navbar-form" action="{{ url('pengalaman_export/') }}" method="GET" id="myform" class="form" >
<div class='input-group date' >
<input  required="true" class="form-control" style="width: 150px; margin-left: 30px;" type="text" name="mulai" id="mulai" placeholder="yyyy-mm-dd" data-date-format="yyyy-mm-dd" autocomplete="off" >
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div class='input-group date' >
<input required="true" class="form-control" style="width: 150px;" type="text" name="selesai" id="selesai" placeholder="yyyy-mm-dd" data-date-format="yyyy-mm-dd" autocomplete="off" >
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
</div>
</div>
<div class="modal-footer">
 <button class="btn-sm btn-success" id="form-submit" type="submit">
                          <i class="fa fa-file-excel-o"> </i> Export To Excel</button>
</form>
                      </div>
                    </div>
                  </div>
                </div>

                {{--modal tenaga ahli--}}
<div class="modal fade" id="ModalTa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Laporan Tenaga Ahli</h4>
                      </div>
                      <div class="modal-body">
<div class="btn-group" role="group">
<form class="navbar-form" action="{{ url('ta_export/') }}" method="GET" id="myform" class="form" >
<input type="hidden" class="form-control" placeholder="Filter Kompetensi.." name="keahlian" value="-">
</div>
</div>
<div class="modal-footer">
<button class="btn-sm btn-success" id="form-submit" type="submit">
<i class="fa fa-file-excel-o"> </i> Export To Excel</button>
</form>
                      </div>
                    </div>
                  </div>
                </div>

                {{--modal Klien--}}
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

                {{--modal Rekanan--}}
                 <div class="modal fade" id="ModalRekanan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Laporan Rekanan</h4>
</div>
<div class="modal-body">
</div>
                      <div class="modal-footer">
                        <a href="rekanan_export" class="btn btn-sm btn-success" type="button" >
                          <i class="fa fa-file-excel-o"> </i> Export To Excel</a>
</form>
                      </div>
                    </div>
                  </div>
                </div>

                {{--modal user--}}
 <div class="modal fade" id="ModalUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Laporan User</h4>
                      </div>
<div class="modal-body">
</div>
                      <div class="modal-footer">
                        <a href="user_export" class="btn btn-sm btn-success" type="button" >
                          <i class="fa fa-file-excel-o"> </i> Export To Excel</a>
</form>
                      </div>
                    </div>
                  </div>
                </div>
<script>
// just for the demos, avoids form submit
jQuery.validator.setDefaults({
  debug: true,
  success: "valid"
});
$( "#myform" ).validate({
  rules: {
    field: {
      required: true
    }
  }
});
</script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

  <script type="text/javascript">
  $(function() {
$("#mulai").datepicker();
$("#selesai").datepicker();
  });
  </script>

