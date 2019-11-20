<!DOCTYPE html>
<title>PENGALAMAN | INSERT</title>
<body class="hold-transition skin-blue sidebar-mini">
      <section class="wrapper">
        @include('partials/header2')
          @include('partials.sidebar')
  <div class="content-wrapper">
    <section class="content" style="width: 70%;">
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
       <header class="bg-primary" style="color: white; padding-left: 5px; padding: 5px;" >
               TAMBAH PENGALAMAN
              </header>
     <a href="{{ URL('/pengalaman/create') }}" class="btn btn-default pull-left" style="margin-left: 5px;  margin-top: 5px; 
     margin-bottom: 10px;"  enctype="multipart/form-data" >
      <i class="fa fa-refresh"></i> Refresh</a>
            <form action="{{ URL('pengalaman/store') }}" enctype="multipart/form-data" method="post" class="form" align="left"> 
{{ csrf_field() }}      
<table class="table" style="font-size: 12px;">
  <tr>
<td ><strong>KLIEN<text style="color: red; size: 15px;">*</text></strong></td>
<td>
<div class='input-group date' style="margin-top: 5px;">
<input class="form-control" type="text" id="nama_klien"  name="nama_klien" readonly placeholder="Nama klien"  value="{{ old('nama_klien') }}"/>
<span class="input-group-addon" onclick="open_child('/pem_tender/lookup/lookup_klien','Look Up','800','500'); return false;"
><span class="fa fa-file"></span></span>
<span class="input-group-addon">
<a href="{{ URL('/klien/create') }}" target="blank"><span class="glyphicon glyphicon-plus"></span></a></span>
</div>
<div style="margin-top: 5px;">
<input name="kd_klien" class="form-control" type="text" id="kd_klien" readonly placeholder="Kode Klien" value="{{ old('kd_klien') }}" >
</div>
</td>
</tr>
<tr>
    <td ><strong>JENIS JASA<text style="color: red; size: 15px;">*</text></strong></td>
    <td>
<div>
<div class='input-group date' style="margin-top: 5px;">
<input  class="form-control" type="text" name="kelompok_jasa" id="kelompok_jasa" value="{{ old('kelompok_jasa') }}" readonly placeholder="-PILIH JASA-" 
 />
<span class="input-group-addon" onclick="open_child('/pem_tender/lookup/lookup_jasa','Look Up','800','500'); return false;"
><span class="fa fa-file"></span></span>
</div>
<div style="margin-top: 5px;">
<input name="sub_jasa" id="sub_jasa" class="form-control" readonly type="text" value="{{ old('sub_jasa') }}"  /> 
</div>
</tr>
<tr>
<td><strong>CONTACT PERSON SPRINT<text style="color: red; size: 15px;">*</text></strong></td>
<td>
<div class='input-group date' >
<input class="form-control" type="text" name="cp_internal" id="nama" readonly value="{{ old('cp_internal') }}">
<span class="input-group-addon" onclick="open_child('/pem_tender/lookup/lookup_karyawan','Look Up','800','500'); return false;">
<i class="fa fa-user"></i></span>
</div>
<div style="margin-top: 5px;">
<input class="form-control" type="email" name="cp_internal_email" id="email" readonly value="{{ old('cp_internal_email') }}"/>
</div>
</tr>
<tr>
<td ><strong>NAMA PEKERJAAN</strong></td>
<td>
<div>
<input name="nama_pekerjaan" class="form-control" type="text" id="nama_pekerjaan" value="{{ old('nama_pekerjaan') }}"/> 
</div>
  </tr>
<tr>
<td ><strong>BIDANG / SUB BIDANG PEKERJAAN</strong></td>
<td>
<div>
<input  name="sub_pekerjaan" class="form-control" type="text" id="sub_pekerjaan" value="{{ old('sub_pekerjaan') }}"/> 
</div>
  </tr>
  <tr>
<td ><strong>RINGKASAN RUANG LINGKUP</strong></td>
<td>
<div>
<textarea  name="ringkasan_lingkup" class="form-control" type="text" id="ringkasan_lingkup"  >
{{ old('ringkasan_lingkup') }}
</textarea>
</div>
  </tr>
<tr>
<td ><strong>LOKASI PEKERJAAN</strong></td>
<td>
<div>
<input name="lokasi_pekerjaan" class="form-control" type="text" id="lokasi_pekerjaan" value="{{ old('lokasi_pekerjaan') }}"/> 
</div>
  </tr>
<tr>
<td ><strong>NO KONTRAK</strong></td>
<td>
<input name="no_kontrak" id="no_kontrak" class="form-control" type="text"  style="width: 70%; margin-top: 5px" value="{{ old('no_kontrak') }}" /> 
<small style="color: red;">Format file hanya pdf</small>
<div class="form-group">
<input type="file" class="form-control" id="file_kontrak" name="file_kontrak"></div>
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
<input class="form-control" type="text" name="nilai_kontrak" value="{{ old('nilai_kontrak') }}"
onkeyup="document.getElementById('format1').innerHTML = formatCurrency(this.value);"  placeholder="NILAI" />
<span class="input-group-addon">
<span style="background-color: black; color: white;" id="format1"></span></span>
</div>
  </tr>
  <tr>
  <td><strong>JANGKA WAKTU</strong></td>
    <td>
<div class='input-group date' >
<input class="form-control" readonly type="text"  id="kontrak_mulai" name="kontrak_mulai" placeholder="MULAI" data-date-format="yyyy-mm-dd" autocomplete="off" value="{{ old('kontrak_mulai') }}"/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div class='input-group date' style="margin-top: 5px;" >
<input class="form-control" readonly type="text" id="kontrak_selesai" name="kontrak_selesai" placeholder="SELESAI" data-date-format="yyyy-mm-dd" autocomplete="off" value="{{ old('kontrak_selesai') }}"/>
<span class="input-group-addon">
<span class="fa fa-calendar" ></span></span>
</div>
  </tr>

<tr >
  <td colspan="2" data-toggle="collapse" data-target="#adendum1" class="accordion-toggle"><strong><span class="fa fa-arrow-down"></span>No Adendum 1</strong></td>
</tr>
<tr class="hiddenRow">
 <td colspan="2" class="hiddenRow" >
<div id="adendum1" class="accordian-body collapse">
  <input name="no_addendum1" class="form-control" type="text" id="no_addendum1" value="{{ old('no_addendum1') }}"/> 
<small style="color: red;">Format file hanya pdf</small>
   <div class="form-group">
<input type="file" class="form-control" id="file_addendum1" name="file_addendum1"></div>
</div>
</td>
</tr>
<tr >
  <td colspan="2" data-toggle="collapse" data-target="#adendum2" class="accordion-toggle"><strong><span class="fa fa-arrow-down"></span>No Adendum 2</strong></td>
</tr>
<tr class="hiddenRow">
  <td colspan="2" class="hiddenRow" >
    <div id="adendum2" class="accordian-body collapse">
       <input name="no_addendum2" class="form-control" type="text" id="no_addendum2" value="{{ old('no_addendum2') }}" /> 
<small style="color: red;">Format file hanya pdf</small>
<div class="form-group">
<input type="file" class="form-control" id="file_addendum2" name="file_addendum2">
                </div>
</td>
</tr>
<tr >
  <td colspan="2" data-toggle="collapse" data-target="#adendum3" class="accordion-toggle"><strong><span class="fa fa-arrow-down"></span>No Adendum 3</strong></td>
</tr>
<tr class="hiddenRow">
  <td colspan="2" class="hiddenRow" >
    <div id="adendum3" class="accordian-body collapse">
   <input name="no_addendum3" class="form-control" type="text" id="no_addendum3" value="{{ old('no_addendum3') }}" /> 
<small style="color: red;">Format file hanya pdf</small>
        <div class="form-group">
       <input type="file" class="form-control" id="file_addendum3" name="file_addendum3"></div>
</td>
</tr>
<tr >
  <td colspan="2" data-toggle="collapse" data-target="#adendum4" class="accordion-toggle"><strong><span class="fa fa-arrow-down"></span>No Adendum 4</strong></td>
</tr>
<tr class="hiddenRow">
  <td colspan="2" class="hiddenRow" >
    <div id="adendum4" class="accordian-body collapse">
       <input name="no_addendum4" class="form-control" type="text" id="no_addendum4" value="{{ old('no_addendum4') }}"  /> 
<small style="color: red;">Format file hanya pdf</small>
        <div class="form-group"><input type="file" class="form-control" id="file_addendum4" name="file_addendum4"></div>
</td>
</tr>
<tr >
  <td colspan="2" data-toggle="collapse" data-target="#adendum5" class="accordion-toggle"><strong><span class="fa fa-arrow-down"></span>No Adendum 5</strong></td>
</tr>
<tr class="hiddenRow">
  <td colspan="2" class="hiddenRow" >
    <div id="adendum5" class="accordian-body collapse">
       <input name="no_addendum5" class="form-control" type="text" id="no_addendum5"  value="{{ old('no_addendum5') }}"/> 
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
<input class="form-control" type="text" name="nilai_addendum" value="{{ old('nilai_addendum') }}"
onkeyup="document.getElementById('format').innerHTML = formatCurrency(this.value);"  placeholder="NILAI ADDENDUM" />
<span class="input-group-addon">
<span style="background-color: black; color: white;" id="format"></span></span>
</div>
  </tr>
  <tr>
  <td><strong>JANGKA WAKTU ADDENDUM</strong></td>
    <td>
<div class='input-group date' >
<input class="form-control" readonly type="text" name="addedum_mulai" id="addedum_mulai"  placeholder="MULAI" data-date-format="yyyy-mm-dd" autocomplete="off" value="{{ old('addedum_mulai') }}"/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div class='input-group date' style="margin-top: 5px;" >
<input  class="form-control" readonly type="text" name="addendum_selesai" id="addendum_selesai" placeholder="SELESAI" data-date-format="yyyy-mm-dd" autocomplete="off" value="{{ old('addendum_selesai') }}"/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
  </tr>
  <tr>
  <td><strong>PERSONIL TERLIBAT<text style="color: red; size: 15px;">*</text></strong></td>
<td>
<div class='input-group date'  >
<input  class="form-control" type="text" name="pm" id="pm" placeholder="PM" value="{{ old('pm') }}" required>
<span class="input-group-addon" onclick="open_child('/pem_tender/lookup/lookup_pm','Look Up','800','500'); return false;"
><i class="fa fa-user"></i></span> 
</div>
<div class='input-group date' style="padding-top: 5px;" >
<textarea class="form-control" type="text" name="konsultan" id="konsultan" placeholder="KONSULTAN" required />
{{ old('konsultan') }}
</textarea>
<span class="input-group-addon" onclick="open_child('/pem_tender/lookup/lookup_konsultan','Look Up','800','500'); return false;"><i class="fa fa-users"></i></span> 
</div>
</tr>
<tr>
<td ><strong>DOKUMEN FINAL BAST</strong></td>
<td>
        <div class="form-group">
<small style="color: red;">Format file hanya pdf</small>
                    <input type="file" class="form-control" id="file_bast" name="file_bast"></div>
<td>
</tr>
<tr>
<td ><strong>DOKUMEN FINAL REFERENSI</strong></td>
<td> <div class="form-group">
<small style="color: red;">Format file hanya pdf</small>
                    <input type="file" class="form-control" id="file_referensi" name="file_referensi"></div>
<td>
</tr>
  <td>
            <input type="submit" name="add"  class="btn btn-sm btn-raised btn-primary" value="SIMPAN" title="SIMPAN">
            <a href="{{ URL('pengalaman') }}" class="btn btn-sm btn-raised btn-danger" width="20px">BATAL</a>
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
