<!DOCTYPE html>
<title>REKANAN | INSERT</title>

<html>
  <!-- Bootstrap CSS -->
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
@include('partials/header')
@include('partials/sidebar')

  <!-- Left side column. contains the logo and sidebar --> 
  <!-- Content Wrapper. Contains page content -->
<body>

      <section id="main-content">
      <section class="wrapper" style="width: 70%">
      @if (count($errors) > 0)
      <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
    <!-- Content Header (Page header) -->
        <div class="row">

          <div class="col-lg-12">

            <section class="panel">
  <header class="bg-primary" style="color: white; padding-left: 5px; padding: 5px;">
               TAMBAH REKANAN
              </header>
     <a href="{{ URL('/rekanan/create') }}" class="btn btn-sm pull-left" style="margin-left: 5px;  margin-top: 5px; 
     margin-bottom: 10px; ">
      <i class="fa fa-refresh"></i> Refresh</a>
                 <form action="{{ URL('rekanan/store') }}" method="post" class="form" align="left"> 
{{ csrf_field() }}      
<table class="table">
  <tr>
  <td ><strong>NAMA KLIEN</strong><text style="color: red;">*</text></td>
    <td>
<div class='input-group date' >
<input name="nama_klien" placeholder="Pilih klien" readonly class="form-control" type="text" id="nama_klien" value="{{ old('nama_klien') }}" required>
<span class="input-group-addon" onclick="open_child('lookup/lookup_klien','Look Up','800','500'); return false;">
<span class="fa fa-file"></span></span>
<span class="input-group-addon" ><a href="{{ URL('/klien/create') }}" target="_blank" >
<span class="fa fa-plus"></span></span></a>
</div>
  </tr>
      <tr>
  <td ><strong>KODE KLIEN</strong><text style="color: red;">*</text></td>
    <td>
<div>
<input name="kd_klien" class="form-control" type="text" id="kd_klien" readonly value="{{ old('kd_klien') }}" required> 
</div>
  </tr>
    <tr>
  <td ><strong>URL</strong></td>
    <td>
<div>
<input  name="url" class="form-control" type="text" id="url" value="http://" value="{{ old('url') }}" />
<small style="color: red">Tambahkan http / https pada awal url</small>
</div>
  </tr>
    <tr>
    <td ><strong>USERNAME</strong></td>
    <td>
<div>
<input  value="{{ old('username') }}" name="username" class="form-control" type="text" id="username" /> 
</div>
  </tr>
<tr>
  <td><strong>PASSWORD</strong></td>
    <td>
<div>
<input  name="password" class="form-control" type="text" id="password"  value="{{ old('password') }}"/> 
</div>
  </tr>
    <tr>
  <td><strong>EMAIL TERDAFTAR</strong></td>
    <td>
<div>
<input value="{{ old('email') }}" name="email" class="form-control" type="text" id="email" size="30"  /> 
</div>
  </tr>
        <tr>
  <td><strong>TANGGAL MULAI</strong></td>
    <td>
<div class='input-group date' >
<input name="tanggal_mulai" type="text" id="tanggal_mulai" placeholder="Tanggal Mulai" autocomplete="off" class="input-group datepicker form-control" date="" data-date-format="yyyy-mm-dd"  value="{{ old('tanggal_mulai') }}" readonly />
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
  </tr>
          <tr>
  <td><strong>TANGGAL BERAKHIR</strong></td>
    <td>
<div class='input-group date' >
<input name="tanggal_berakhir" type="text" id="tanggal_berakhir" placeholder="Tanggal Berakhir" autocomplete="off" class="input-group datepicker form-control" date="" data-date-format="yyyy-mm-dd"  value="{{ old('tanggal_berakhir') }}" readonly/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
  </tr>
  <tr>
  <td style="background-color: silver;"><strong><i>CONTACT PERSON</i> </strong></td>
  <tr>
  <td><strong>NAMA</strong></td>
    <td>
<div>
<input name="cp_nama" class="form-control" type="text" id="cp_nama" value="{{ old('cp_nama') }}" /> 
</div>
  </tr>
    <tr>
  <td><strong>JABATAN</strong></td>
    <td>
<div>
<input name="cp_jabatan" class="form-control" type="text" id="cp_jabatan" value="{{ old('cp_jabatan') }}" /> 
</div>
  </tr>
<tr>
<td><strong>*BAGIAN</strong></td>
<td>
<div class='input-group date' >
          <select  name="cp_bagian" class="form-control"  value="{{ old('cp_bagian') }}">
            <option value="" style="background-color: black;">-PILIH BAGIAN-</option>         
            <option value="PENGADAAN" >PENGADAAN</option>
            <option value="PENGADAAN" >REKANAN</option>
            
          </select>
</div>
</tr>
      <tr>
  <td><strong>TLP / HP</strong></td>
    <td>
<div>
<input name="cp_telp" class="form-control" type="text" id="cp_ops_telp" value="{{ old('cp_telp') }}" /> 
</div>
  </tr>
  <tr>
  <td><strong>EMAIL</strong></td>
    <td>
<div>
<input name="cp_email" class="form-control" type="email" id="cp_ops_email" value="{{ old('cp_email') }}"/> 
</div>
</td>
</tr>
      <tr>
  <td><strong>KETERANGAN</strong></td>
    <td>
<div>
<textarea  name="keterangan" class="form-control" type="text" id="keterangan" value="{{ old('keterangan') }}" />  </textarea> 
</div>
  </tr>
  <td>
            <input type="submit" name="add"  class="btn btn-sm btn-raised btn-primary" value="SIMPAN" title="SIMPAN">
            <a href="{{ URL('rekanan') }}" class="btn btn-sm btn-raised btn-danger" width="20px">BATAL</a>
  </td>
 </table >
</form>
            </section>
          </div>
        </div>
        <!-- page end-->
      </section>
    </section>
    <!--main content end-->
@include('partials/footer')
  </section>           

    <!-- javascripts -->
  <script src="/NiceAdmin/js/jquery.min.js"></script>

<script src="/NiceAdmin/js/jquery-ui.min.js"></script>
 <script type="text/javascript">
  $(function() {
$("#tanggal_mulai").datepicker();
$("#tanggal_berakhir").datepicker();
  });
  </script>
<!-- jQuery 3 -->
    <script>  function open_child(url,title,w,h){
        var left = (screen.width/2)-(w/2);
        var top = (screen.height/2)-(h/2);
        w = window.open(url, title, 'toolbar=no, location=no, directories=no, \n\
        status=no, menubar=no, scrollbar=no, resizabel=no, copyhistory=no,\n\
        width='+w+',height='+h+',top='+top+',left='+left);
    };
  </script>
    <!-- bootstrap-wysiwyg -->
  <script src="/NiceAdmin/js/jquery.hotkeys.js"></script>
  <script src="/NiceAdmin/js/bootstrap-wysiwyg.js"></script>
  <script src="/NiceAdmin/js/bootstrap-wysiwyg-custom.js"></script>
  <script src="/NiceAdmin/js/moment.js"></script>
  <script src="/NiceAdmin/js/bootstrap-colorpicker.js"></script>
  <script src="/NiceAdmin/js/daterangepicker.js"></script>
  <script src="/NiceAdmin/js/bootstrap-datepicker.js"></script>
<!-- Date -->
</body>
</html>
