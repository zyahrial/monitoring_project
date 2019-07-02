<!DOCTYPE html>
<title>PENGALAMAN | UPDATE</title>
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
@foreach ($pengalaman as $data)

       <header class="bg-primary" style="color: white; padding-left: 5px; padding: 5px;">
               UPDATE DATA PENGALAMAN
              </header>
     <a href="{{ URL('/pengalaman/show') }}/{{ $data->kd_pengalaman }}" class="btn btn-default pull-left" style="margin-left: 5px;  margin-top: 5px; 
     margin-bottom: 10px;"  enctype="multipart/form-data" >
      <i class="fa fa-refresh"></i> Refresh</a>
<form action="{{ action('PengalamanController@update', $data->kd_pengalaman) }}"  method="post" enctype="multipart/form-data" class="form" align="left"> 
{{ csrf_field() }} 
<input name="_method" type="hidden" value="PATCH">       
<table class="table" style="font-size: 12px;">
  <tr><td ><strong>KD PENGALAMAN<text style="color: red; size: 15px;">*</text></strong></td>
    <td ><input name="kd_pengalaman" class="form-control" style="color: blue" readonly="readonly" type="text" id="kd_pengalaman" value="{{ $data->kd_pengalaman }}"></td>
    <tr>
<tr>
    <tr>
<td ><strong>KLIEN<text style="color: red; size: 15px;">*</text></strong></td>
<td>
<div class='input-group date' style="margin-top: 5px;">
<input class="form-control" type="text" id="nama_klien" readonly placeholder="Nama klien" value="{{ $data->nama_klien }}" />
<span class="input-group-addon" onclick="open_child('/pem_tender/lookup/lookup_klien','Look Up','800','500'); return false;"
><span class="fa fa-file"></span></span>
<span class="input-group-addon">
<a href="{{ URL('/klien/create') }}" target="blank"><span class="glyphicon glyphicon-plus"></span></a></span>
</div>
<div style="margin-top: 5px;">
<input name="kd_klien" class="form-control" type="text" id="kd_klien" readonly placeholder="Kode Klien" value="{{ $data->kd_klien}}" >
</div>
</td>
</tr>
    <td ><strong>JENIS JASA<text style="color: red; size: 15px;">*</text></strong></td>
    <td>
<div>
<div class='input-group date' style="margin-top: 5px;">
<input  class="form-control" type="text" name="kelompok_jasa" id="kelompok_jasa"  readonly placeholder="-PILIH JASA-" 
value="{{ $data->kelompok_jasa }}" />
<span class="input-group-addon" onclick="open_child('/pem_tender/lookup/lookup_jasa','Look Up','800','500'); return false;"
><span class="fa fa-file"></span></span>
</div>
<div style="margin-top: 5px;">
<input size="50" name="sub_jasa" id="sub_jasa" class="form-control"  readonly type="text" value="{{ $data->sub_jasa }}"/> 
</div>
</tr>
<tr>
<td><strong>CONTACT PERSON SPRINT</strong></td>
<td>
<div class='input-group date' >
<input class="form-control" type="text" name="cp_internal" id="nama" readonly value="{{ $data->cp_internal }}" />
<span class="input-group-addon" onclick="open_child('/pem_tender/lookup/lookup_karyawan','Look Up','800','500'); return false;">
<i class="fa fa-user"></i></span>
</div>
<div style="margin-top: 5px;">
<input readonly class="form-control" type="email" name="cp_internal_email" id="email" value="{{ $data->cp_internal_email }}"/>
</div>
</tr>
<tr>
<td ><strong>NAMA PEKERJAAN</strong></td>
<td>
<div>
<input size="50" name="nama_pekerjaan" class="form-control" type="text" id="nama_pekerjaan" size="30" value="{{ $data->nama_pekerjaan }}" /> 
</div>
  </tr>
<tr>
<td ><strong>BIDANG / SUB BIDANG PEKERJAAN</strong></td>
<td>
<div>
<input size="50" name="sub_pekerjaan" class="form-control" type="text" id="sub_pekerjaan" size="30" value="{{ $data->sub_pekerjaan }}" /> 
</div>
  </tr>
  <tr>
<td ><strong>RINGKASAN RUANG LINGKUP</strong></td>
<td>
<div>
<textarea  name="ringkasan_lingkup" class="form-control" type="text" id="ringkasan_lingkup" >{{ $data->ringkasan_lingkup }}</textarea>
</div>
  </tr>
<tr>
<td ><strong>LOKASI PEKERJAAN</strong></td>
<td>
<div>
<input size="50" name="lokasi_pekerjaan" class="form-control" type="text" id="lokasi_pekerjaan" value="{{ $data->lokasi_pekerjaan }}"/> 
</div>
  </tr>
<tr>
<td ><strong>NO-KONTRAK</strong></td>
<td>
       <input size="50" name="no_kontrak" id="no_kontrak" class="form-control" type="text"  style="width: 70%; margin-top: 5px" value="{{ $data->no_kontrak }}" /> 
<small style="color: red;">Format file hanya pdf</small>
        <div class="form-group">
                    <input type="file" class="form-control" id="file_kontrak" name="file_kontrak">
                </div>
<td>
</tr>
<tr>
<td><strong>NILAI KONTRAK (SEBELUM PPN 10%)</strong></td>
<td>
<script>function format1Currency(num) {
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
<div class='input-group date' style="width: 70%; margin-top: 5px">
<input class="form-control" type="text" name="nilai_kontrak" value="{{ $data->nilai_kontrak }}"
onkeyup="document.getElementById('format1').innerHTML = formatCurrency(this.value);"  placeholder="NILAI" />
<span class="input-group-addon">
<span style="background-color: black; color: white;" id="format1"></span></span>
</div>
  </tr>
  <tr>
  <td><strong>JANGKA WAKTU</strong></td>
    <td>
<div class='input-group date' >
<input size="50"  class="form-control" type="text" readonly name="kontrak_mulai" id="kontrak_mulai" size="30"  placeholder="MULAI" data-date-format="yyyy-mm-dd" autocomplete="off" value="{{ $data->kontrak_mulai }}"/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div class='input-group date' style="margin-top: 5px;" >
<input size="50"  class="form-control" type="text" readonly name="kontrak_selesai" id="kontrak_selesai" size="30"  placeholder="SELESAI" data-date-format="yyyy-mm-dd" autocomplete="off" value="{{ $data->kontrak_selesai }}"/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
  </tr>

<tr >
  <td colspan="2" data-toggle="collapse" data-target="#adendum1" class="accordion-toggle"><strong>
   <span class="fa fa-arrow-down"></span>No-Adendum 1</strong></td>
</tr>
<tr class="hiddenRow">
 <td colspan="2" class="hiddenRow" >
<div id="adendum1" class="accordian-body collapse">
  <input  name="no_addendum1" class="form-control" type="text" id="no_addendum1" value="{{ $data->no_addendum1 }}"/>
<small style="color: red;">Format file hanya pdf</small>
   <div class="form-group">
   <input type="file" class="form-control" id="file_addendum1" name="file_addendum1">             </div>
</div>
</td>
</tr>
<tr >
  <td colspan="2" data-toggle="collapse" data-target="#adendum2" class="accordion-toggle"><strong>
    <span class="fa fa-arrow-down"></span>No-Adendum 2</strong></td>
</tr>
<tr class="hiddenRow">
  <td colspan="2" class="hiddenRow" >
    <div id="adendum2" class="accordian-body collapse">
       <input size="50" name="no_addendum2" class="form-control" type="text" id="no_addendum2"  value="{{ $data->no_addendum2 }}" /> 
<small style="color: red;">Format file hanya pdf</small>
        <div class="form-group">
                    <input type="file" class="form-control" id="file_addendum2" name="file_addendum2">
                </div>
</td>
</tr>
<tr >
  <td colspan="2" data-toggle="collapse" data-target="#adendum3" class="accordion-toggle"><strong>
   <span class="fa fa-arrow-down"></span>No-Adendum 3</strong></td>
</tr>
<tr class="hiddenRow">
  <td colspan="2" class="hiddenRow" >
    <div id="adendum3" class="accordian-body collapse">
       <input size="50" name="no_addendum3" class="form-control" type="text" id="no_addendum3" value="{{ $data->no_addendum3 }}" /> 
<small style="color: red;">Format file hanya pdf</small>
        <div class="form-group">
                    <input type="file" class="form-control" id="file_addendum3" name="file_addendum3">
                </div>
</td>
</tr>
<tr >
  <td colspan="2" data-toggle="collapse" data-target="#adendum4" class="accordion-toggle"><strong>
   <span class="fa fa-arrow-down"></span>No-Adendum 4</strong></td>
</tr>
<tr class="hiddenRow">
  <td colspan="2" class="hiddenRow" >
    <div id="adendum4" class="accordian-body collapse">
       <input size="50" name="no_addendum4" class="form-control" type="text" id="no_addendum4" value="{{ $data->no_addendum4 }}" /> 
<small style="color: red;">Format file hanya pdf</small>
        <div class="form-group">
                    <input type="file" class="form-control" id="file_addendum4" name="file_addendum4">
                </div>
</td>
</tr>
<tr >
  <td colspan="2" data-toggle="collapse" data-target="#adendum5" class="accordion-toggle"><strong>
   <span class="fa fa-arrow-down"></span>No-Adendum 5</strong></td>
</tr>
<tr class="hiddenRow">
  <td colspan="2" class="hiddenRow" >
    <div id="adendum5" class="accordian-body collapse">
<input name="no_addendum5" class="form-control" type="text" id="no_addendum5" value="{{ $data->no_addendum5 }}" /> 
<small style="color: red;">Format file hanya pdf</small>
        <div class="form-group">
                    <input type="file" class="form-control" id="file_addendum5" name="file_addendum5">
                </div>
</td>
</tr>
<tr>
<td><strong>NILAI ADDENDUM KONTRAK</strong></td>
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
<div class='input-group date' style="width: 70%; margin-top: 5px">
<input class="form-control" type="text" name="nilai_addendum" value="{{ $data->nilai_addendum }}"
onkeyup="document.getElementById('format').innerHTML = formatCurrency(this.value);"  placeholder="NILAI ADDENDUM" />
<span class="input-group-addon">
<span style="background-color: black; color: white;" id="format"></span></span>
</div>
  </tr>
  <tr>
  <td><strong>JANGKA WAKTU ADDENDUM</strong></td>
    <td>
<div class='input-group date' >
<input readonly  class="form-control" type="text" name="addedum_mulai" id="addedum_mulai" value="{{ $data->addedum_mulai }}"  data-date-format="yyyy-mm-dd" autocomplete="off"/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div class='input-group date' style="margin-top: 5px;" >
<input readonly  class="form-control" type="text" name="addendum_selesai" id="addendum_selesai" value="{{ $data->addendum_selesai }}"data-date-format="yyyy-mm-dd" autocomplete="off"/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
  </tr>
  <tr>
  <td><strong>PERSONIL TERLIBAT</strong></td>
<td>
<div class='input-group date' >
<input  class="form-control" type="text" name="pm" id="pm" value="{{ $data->pm }}" placeholder="PM" />
<span class="input-group-addon" onclick="open_child('/pem_tender/lookup/lookup_pm','Look Up','800','500'); return false;"><i class="fa fa-user"></i></span> 
</div>
<div class='input-group date' style="padding-top: 5px;" >
<textarea class="form-control" type="text" name="konsultan" id="konsultan" 
 placeholder="KONSULTAN" />
{{ $data->konsultan }}
</textarea>
<span class="input-group-addon" onclick="open_child('/pem_tender/lookup/lookup_konsultan','Look Up','800','500'); return false;"><i class="fa fa-users"></i></span> 
</div>
  </tr>
<tr>
<td ><strong>DOKUMEN FINAL BAST</strong></td>
<td>
        <div class="form-group">
<small style="color: red;">Format file hanya pdf</small>
                    <input type="file" class="form-control" id="file_bast" name="file_bast">
                </div>
<td>
</tr>
<tr>
<td ><strong>DOKUMEN FINAL REFERENSI</strong></td>
<td>
        <div class="form-group">
<small style="color: red;">Format file hanya pdf</small>
                    <input type="file" class="form-control" id="file_referensi" name="file_referensi">
                </div>
<td>
</tr>
  <td>
            <input type="submit" name="add"  class="btn btn-sm btn-raised btn-primary" value="SIMPAN" title="SIMPAN">
            <a href="{{ URL('/pengalaman/detail') }}/{{ $data->kd_pengalaman }}" class="btn btn-sm btn-raised btn-danger" width="20px">BATAL</a>
  </td>
</tr>

 </table >
</form>
@endforeach
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
$("#kontrak_mulai").datepicker();
$("#kontrak_selesai").datepicker();
$("#addedum_mulai" ).datepicker();
$("#addendum_selesai" ).datepicker();
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
