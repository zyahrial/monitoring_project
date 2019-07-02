<!DOCTYPE html>
<title>PENJUALAN (NON TENDER) | INSERT</title>

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
      <section class="wrapper" style="width: 70%;">
      @if (count($errors) > 0)
      <div class="alert alert-danger">
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
               <i>TAMBAH PENJUALAN (NON TENDER)</i>
              </header>
          @if(checkPermission(['admin','superadmin']))
     <a href="{{ URL('/pem_non_tender/create') }}" class="btn-sm pull-left" style="margin-left: 5px;  margin-top: 5px; 
     margin-bottom: 10px; ">
      <i class="fa fa-refresh"></i> Refresh</a>
      @endif
       @if(checkPermission(['user']))
     <a href="{{ URL('/pem_non_tender_user/create') }}" class="btn-sm pull-left" style="margin-left: 5px;  margin-top: 5px; 
     margin-bottom: 10px; ">
      <i class="fa fa-refresh"></i> Refresh</a>
      @endif
                @if(checkPermission(['admin','superadmin']))
      <form action="{{ URL('pem_non_tender/store') }}" method="post" class="form" align="left">
                @endif
                 @if(checkPermission(['user']))
      <form action="{{ URL('pem_non_tender_user/store') }}" method="post" class="form" align="left">
                @endif
{{ csrf_field() }}      
<table class="table" style="font-size: 12px;">
<tr>
    <td ><strong>JENIS JASA<text style="color: red; size: 15px;">*</text></strong></td>
    <td>
<div>
<div class='input-group date' style="margin-top: 5px;">
<input  class="form-control" type="text" name="kelompok_jasa" id="kelompok_jasa"  readonly placeholder="Kelompok Jasa" 
 value="{{ old('kelompok_jasa') }}" />
<span class="input-group-addon" onclick="open_child('/pem_tender/lookup/lookup_jasa','Look Up','800','500'); return false;"
><span class="fa fa-file"></span></span>
</div>
<div style="margin-top: 5px;">
<input placeholder="Sub Jasa" name="sub_jasa" id="sub_jasa" class="form-control"  readonly type="text" value="{{ old('sub_jasa') }}"   /> 
</div>
</tr>
<tr>
<td ><strong>NAMA PEKERJAAN</strong></td>
<td>
<div>
<textarea name="nama_pekerjaan" class="form-control" type="text" id="nama_pekerjaan" value="{{ old('nama_pekerjaan') }}">
</textarea>
</div>
  </tr>
<tr>
<td ><strong>BIDANG / SUB BIDANG PEKERJAAN</strong></td>
<td>
<div>
<input name="sub_pekerjaan" class="form-control" type="text" id="sub_pekerjaan" value="{{ old('sub_pekerjaan') }}" /> 
</div>
</td>
</tr>
  <tr>
<td ><strong>KLIEN<text style="color: red; size: 15px;">*</text></strong></td>
<td>
<div class='input-group date' style="margin-top: 5px;">
<input name="nama_klien" class="form-control" type="text" id="nama_klien" readonly placeholder="Nama Klien"  value="{{ old('nama_klien') }}" />
<span class="input-group-addon" onclick="open_child('/pem_tender/lookup/lookup_klien','Look Up','800','500'); return false;"
><span class="fa fa-file"></span></span>
<span class="input-group-addon">
<a href="{{ URL('/klien/create') }}" target="blank"><span class="glyphicon glyphicon-plus"></span></a></span>
</div>
<div style="margin-top: 5px;">
<input name="kd_klien" class="form-control" type="text" id="kd_klien" readonly placeholder="Kode Klien" value="{{ old('kd_klien') }}" />
</div>
</td>
</tr>
<tr>
<td><strong>SUMBER INFORMASI</strong></td>
<td>
<div style="margin-top: 5px;">
<input  class="form-control" type="text" name="informasi_nama" id="informasi_nama" value="{{ old('informasi_nama') }}" placeholder="NAMA"  /> 
</div>
<div style="margin-top: 5px;">
<input class="form-control" type="text" name="informasi_telp" id="informasi_telp" value="{{ old('informasi_telp') }}" placeholder="TELP" /> 
</div>
<div style="margin-top: 5px;">
<input  class="form-control" type="text" name="informasi_email" id="informasi_email" value="{{ old('informasi_email') }}" placeholder="EMAIL"  />
<small class="bg-info">Gunakan spasi jika email lebih dari satu</small>
</div>
</tr>
  <tr>
  <td><strong>TGL PERMINTAAN</strong></td>
    <td>
<div class='input-group date' >
<input  class="form-control" type="text" name="tgl_permintaan" id="tgl_permintaan" value="{{ old('tgl_permintaan') }}" placeholder="TANGGAL" data-date-format="yyyy-mm-dd" autocomplete="off" readonly/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
  </tr>
  <tr>
  <td><strong>CANVASSING</strong></td>
    <td>
<div class='input-group date' >
<input  class="form-control" type="text" name="tgl_canvasing" id="tgl_canvasing" value="{{ old('tgl_canvasing') }}"  placeholder="TANGGAL" data-date-format="yyyy-mm-dd" autocomplete="off" readonly />
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div style="margin-top: 5px;">
<textarea  class="form-control" type="text" name="hasil_canvasing" id="hasil_canvasing"  placeholder="HASIL" />
{{ old('hasil_canvasing') }}
</textarea> 
</div>
  </tr>
<tr>
<td><strong>PROSES KAK & RAB</strong></td>
<td>
<script>function formatCurrency(num) {
num = num.toString().replace(/\$|\,/g,'');
if(isNaN(num))
num = "0";
sign = (num == (num = Math.abs(num)));
num = Math.floor(num*100+0.50000000001);
cents = num%100;
num = Math.floor(num/100).toString();
if(cents<10)
cents = "0" + cents;
for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
num = num.substring(0,num.length-(4*i+3))+'.'+
num.substring(num.length-(4*i+3));
return (((sign)?'':'-') + 'Rp ' + num );
}</script>
<div class='input-group date' >
<input  class="form-control" type="text" name="tgl_kak" id="tgl_kak"  placeholder="TANGGAL" data-date-format="yyyy-mm-dd" autocomplete="off" value="{{ old('tgl_kak') }}" readonly>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div class='input-group date' style="width: 50%; margin-top: 5px">
<input class="form-control" type="text" name="nilai_kak"
onkeyup="document.getElementById('format').innerHTML = formatCurrency(this.value);" value="{{ old('nilai_kak') }}" placeholder="NILAI" />
<span class="input-group-addon">
<span style="background-color: black; color: white;" id="format"></span></span>
</div>
  </tr>
  <tr>
  <td><strong>TGL PROPOSAL</strong></td>
    <td>
<div class='input-group date' >
<input  class="form-control" type="text" name="tgl_proposal" id="tgl_proposal" placeholder="TANGGAL" data-date-format="yyyy-mm-dd" autocomplete="off"  value="{{ old('tgl_proposal') }}" readonly/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
  </tr>
  <tr>
<td><strong>HARGA PENAWARAN</strong></td>
<td>
<script>function format2Currency(num) {
num = num.toString().replace(/\$|\,/g,'');
if(isNaN(num))
num = "0";
sign = (num == (num = Math.abs(num)));
num = Math.floor(num*100+0.50000000001);
cents = num%100;
num = Math.floor(num/100).toString();
if(cents<10)
cents = "0" + cents;
for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
num = num.substring(0,num.length-(4*i+3))+'.'+
num.substring(num.length-(4*i+3));
return (((sign)?'':'-') + 'Rp ' + num );
}</script>
<div class='input-group date' style="width: 50%;">
<input class="form-control" type="text" name="nilai_penawaran"
onkeyup="document.getElementById('format2').innerHTML = formatCurrency(this.value);"  placeholder="NILAI PENAWARAN" value="{{ old('nilai_penawaran') }}"/>
<span class="input-group-addon">
<span style="background-color: black; color: white;" id="format2"></span></span>
</div>
  </tr>
   <tr>
  <td><strong>TGL PRESENTASI / KLARIFIKASI</strong></td>
    <td>
<div class='input-group date' style="margin-top: 5px;">
<input  class="form-control" type="text" name="tgl_presentasi" id="tgl_presentasi" placeholder="TANGGAL PENGAMBILAN" data-date-format="yyyy-mm-dd" autocomplete="off" value="{{ old('tgl_presentasi') }}" readonly/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
  </tr>
      <tr>
  <td><strong>PROSES NEGOSIASI</strong></td>
    <td>
<div class='input-group date' style="margin-bottom: 5px;" >
<input class="form-control" type="text" name="tgl_negosiasi" id="tgl_negosiasi" placeholder="TANGGAL" data-date-format="yyyy-mm-dd" autocomplete="off" value="{{ old('tgl_negosiasi') }}" readonly/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<script>function format3Currency(num) {
num = num.toString().replace(/\$|\,/g,'');
if(isNaN(num))
num = "0";
sign = (num == (num = Math.abs(num)));
num = Math.floor(num*100+0.50000000001);
cents = num%100;
num = Math.floor(num/100).toString();
if(cents<10)
cents = "0" + cents;
for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
num = num.substring(0,num.length-(4*i+3))+'.'+
num.substring(num.length-(4*i+3));
return (((sign)?'':'-') + 'Rp ' + num );
}</script>
<div class='input-group date' style="width: 50%;">
<input class="form-control" type="text" name="nilai_negosiasi"
onkeyup="document.getElementById('format3').innerHTML = formatCurrency(this.value);"  placeholder="HASIL" value="{{ old('nilai_negosiasi') }}">
<span class="input-group-addon">
<span style="background-color: black; color: white;" id="format3"></span></span>
</div>
      <tr>
  <td><strong>HISTORY FOLLOW UP</strong></td>
    <td>
<div class='input-group date' >
<input class="form-control" type="text" name="tgl_followup" id="tgl_followup" placeholder="TANGGAL" data-date-format="yyyy-mm-dd" autocomplete="off" value="{{ old('tgl_followup') }}" readonly>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div style="margin-top: 5px;">
<textarea  class="form-control" type="text" name="status_followup" id="status_followup"  placeholder="STATUS" >
{{ old('status_followup') }}
</textarea>  
</div>
  </tr>
     <tr>
  <td><strong>PELUANG DAPAT (%)</strong></td>
<td>
<div class='input-group date' style="width: 50%;">
<input class="form-control" type="number" name="peluang" id="peluang" value="{{ old('peluang') }}" />
<span class="input-group-addon"><strong>%</strong></span> 
</div>
  </tr>
<tr>
  <td><strong>STATUS PROPOSAL</strong></td>
<td>
<div class='input-group date' >
<input  class="form-control" type="text" name="status" readonly value="OPEN" placeholder="OPEN" value="{{ old('status') }}"/>
<span class="input-group-addon"><i class="fa fa-flag"></i></span> 
</div>
  </tr>
    @if(checkPermission(['admin','superadmin']))
  <tr>
  <td><strong>CONTACT PERSON SPRINT  <text style="color: red; size: 15px;">*</text>
</strong></td>
<td>
<div class='input-group date' >
<input class="form-control" type="text" name="cp_internal" id="nama" readonly placeholder="PILIH PERSONIL" value="{{ old('cp_internal') }}" />
<span class="input-group-addon" onclick="open_child('/pem_non_tender/lookup/lookup_karyawan','Look Up','800','500'); return false;" >
<i class="fa fa-user"></i></span>
</div>
<div style="margin-top: 5px;">
<input  class="form-control" type="email" name="cp_internal_email" id="email" readonly value="{{ old('cp_internal_email') }}"/>
</div>
</tr>
    @endif

        @if(checkPermission(['user']))
  <tr>
  <td><strong>CONTACT PERSON SPRINT  <text style="color: red; size: 15px;">*</text>
</strong></td>
<td>
<div class='input-group date' >
<input class="form-control" type="text" name="cp_internal" id="nama" value="{{ Auth::user()->name }}" readonly />
<span class="input-group-addon" onclick="open_child('/pem_non_tender/lookup/lookup_karyawan','Look Up','800','500'); return false;">
<i class="fa fa-user"></i></span>
</div>
<div style="margin-top: 5px;">
<input  class="form-control" type="email" name="cp_internal_email" value="{{ Auth::user()->email }}" readonly/>
</div>
</tr>
    @endif
  <td>
            <input type="submit" name="add"  class="btn btn-sm btn-raised btn-primary" value="SIMPAN" title="SIMPAN">
            <a href="{{ URL('pem_non_tender') }}" class="btn btn-sm btn-raised btn-danger" width="20px">BATAL</a>
  </td>
</tr>

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
$("#tgl_permintaan").datepicker();
$("#tgl_canvasing").datepicker();
$("#tgl_kak" ).datepicker();
$("#tgl_proposal" ).datepicker();
$("#tgl_presentasi").datepicker();
$("#tgl_negosiasi" ).datepicker();
$("#tgl_followup" ).datepicker();
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
