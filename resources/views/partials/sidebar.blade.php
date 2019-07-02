  <link href="/NiceAdmin/css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="/NiceAdmin/css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="/NiceAdmin/css/elegant-icons-style.css" rel="stylesheet" />
  <link href="/NiceAdmin/css/font-awesome.min.css" rel="stylesheet" />
  <link href="/NiceAdmin/css/daterangepicker.css" rel="stylesheet" />
  <link href="/NiceAdmin/css/bootstrap-datepicker.css" rel="stylesheet" />
  <link href="/NiceAdmin/css/bootstrap-colorpicker.css" rel="stylesheet" />
  <!-- date picker -->

  <!-- color picker -->

  <!-- Custom styles -->
  <link href="/NiceAdmin/css/style.css" rel="stylesheet">
  <link href="/NiceAdmin/css/style-responsive.css" rel="stylesheet" />
<!--sidebar start-->
    <aside>
      <div id="sidebar" class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="active">
            <a class="" href="/home">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
            </a>
          </li>
                   @if(checkPermission(['admin','superadmin']))
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Master</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="/klien">Klien</a></li>
              <li><a class="" href="/ta">Tenaga Ahli</a></li>
               <li><a class="" href="/rekanan">Rekanan</a></li>
               <li><a class="" href="/pem_tender">Tender</a></li>
               <li><a class="" href="/pem_non_tender">Non Tender</a></li>
               <li><a class="" href="/pengalaman">Pengalaman</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="fa fa-archive"></i>
                          <span>History</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
             </a>
            <ul class="sub">
            <li><a class="" href="/history/pem_tender">History Tender</a></li>
            <li><a class="" href="/history/pem_non_tender">History Non Tender</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_genius"></i>
                          <span>WS</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
             </a>
            <ul class="sub">
             <li><a class="" href="/mail">Reminder Rekanan</a></li>
             <li><a class="" href="/reminder_pengalaman">Reminder Pengalaman</a></li>
             <li><a class="" href="/reminder_tender">Reminder (Tender)</a></li>
             <li><a class="" href="/reminder_non_tender">Reminder (Non Tender)</a></li>
            </ul>
          </li>
                    <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="fa fa-user"></i>
                          <span>User</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
             </a>
            <ul class="sub">
             <li><a class="" href="/user">Setting</a></li>
            </ul>
          </li>
          <li class="sub-menu">
          <a href="javascript:;" class="">
                          <i class="fa fa-file-excel-o"> </i>
                          <span>Report</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
          </a>
            <ul class="sub">
             <li><a class="" data-toggle="modal" href="#ModalUser">User</a></li></li>
             <li><a class="" data-toggle="modal" href="#ModalKlien">Klien</a></li>
             <li><a class="" data-toggle="modal" href="#ModalTa">Tenaga Ahli</a></li>
             <li><a class="" data-toggle="modal" href="#ModalRekanan">Rekanan</a></li>
              <li><a class="" data-toggle="modal" href="#ModalPengalaman">Pengalaman</a></li>
            </ul>
          </li>
            @endif
             @if(checkPermission(['user']))
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Master</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
               <li><a class="" href="/klien">Klien</a></li>
              <li><a class="" href="/ta">Tenaga Ahli</a></li>
               <li><a class="" href="/rekanan">Rekanan</a></li>
               <li><a class="" href="/pem_tender_user">Penjualan (Tender)</a></li>
               <li><a class="" href="/pem_non_tender_user">Penjualan Non (Tender)</a></li>
               <li><a class="" href="/pengalaman_user">Pengalaman</a></li>
            </ul>
          </li>
            <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="fa fa-user"></i>
                          <span>User</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
             </a>
            <ul class="sub">
             <li><a class="" href="/profile">Password</a></li>
            </ul>
          </li>
           @endif
        </ul>
        <!-- sidebar menu end-->
      </div>
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

<script src="/NiceAdmin/js/jquery.min.js"></script>
<script src="/NiceAdmin/js/jquery-ui.min.js"></script>
     <script type="text/javascript">
  $(function() {
$("#mulai").datepicker();
$("#selesai").datepicker();
  });
  </script>
    <!-- bootstrap-wysiwyg -->
  <script src="/NiceAdmin/js/jquery.hotkeys.js"></script>
  <script src="/NiceAdmin/js/bootstrap-wysiwyg.js"></script>
  <script src="/NiceAdmin/js/bootstrap-wysiwyg-custom.js"></script>
  <script src="/NiceAdmin/js/moment.js"></script>
  <script src="/NiceAdmin/js/bootstrap-colorpicker.js"></script>
  <script src="/NiceAdmin/js/daterangepicker.js"></script>
  <script src="/NiceAdmin/js/bootstrap-datepicker.js"></script>
    <!--sidebar end-->