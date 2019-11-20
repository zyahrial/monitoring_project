<!DOCTYPE html>
<html>
<head>
    <?php  
    if (empty(Auth::user()->name))
    {  header('location:/');
    exit();   } ?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SPM | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
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
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
        <div class="col-md-3 col-sm-6 col-xs-12">
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
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
                        <a class="" href="/pem_tender">
            <span class="info-box-icon bg-red"><i class="fa fa-external-link"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">TENDER</span>
              <span class="info-box-number">{{$tender}}</span>
            </div>
          </a>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
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
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <a class="" href="/pem_non_tender?status=pending">
            <span class="info-box-icon bg-yellow"><i class="fa fa-cubes"></i></span>
    @php ($date_pending = (date('Y'))+'1')
            <div class="info-box-content">
              <span class="info-box-text">PENDING TO {{$date_pending }}</span>
              <span class="info-box-number">{{$pending }}</span>
            </div>
            <!-- /.info-box-content -->
          </a>
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
    @endif
         @if(checkPermission(['user']))
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-briefcase"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">PENGALAMAN</span>
              <span class="info-box-number">{{$pengalaman }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-external-link"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">TENDER</span>
              <span class="info-box-number">{{$tender}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-external-link-square"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">NON TENDER</span>
              <span class="info-box-number">{{$non_tender }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
    @php ($date_pending = (date('Y'))+'1')
            <div class="info-box-content">
              <span class="info-box-text">PENDING TO {{$date_pending }}</span>
              <span class="info-box-number">{{$pending }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        @endif
        <!-- /.col -->
      </div>
    </section>

      
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>

@include('partials/footer')
</body>
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
  <script type="text/javascript">
  $(function() {
$("#mulai").datepicker();
$("#selesai").datepicker();
  });
  </script>
</body>
</html>
