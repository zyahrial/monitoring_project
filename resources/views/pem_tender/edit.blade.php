<!DOCTYPE html>
<title>PENJUALAN (TENDER) | UPDATE</title>

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
@foreach ($data as $datas)
       <header class="bg-primary" style="color: white; padding-left: 5px; padding: 5px;">
               UPDATE DATA PENJUALAN (TENDER)
              </header>
 <a href="{{ URL('/pem_tender/show') }}/{{ $datas->kd_pn_tender }}" class="btn-sm pull-left" style="margin-left: 5px; margin-top: 5px; margin-bottom: 5px;">
      <i class="fa fa-refresh"></i> Refresh</a>
<form method="post" action="{{ URL('pem_tender/update', $datas->kd_pn_tender) }}">
{{ csrf_field() }}  
<input name="_method" type="hidden" value="PATCH">            
<table class="table" style="font-size: 12px;">
  <tr>
    <td style="width: 30%"><strong>KD PENJUALAN<text style="color: red; size: 15px;">*</text></strong></td>
    <td ><input name="kd_pn_tender" class="form-control" readonly="readonly" type="text" id="kd_pn_tender" style="color: blue" value="{{ $datas->kd_pn_tender }}"></td>
<tr>
    <td ><strong>JENIS JASA<text style="color: red; size: 15px;">*</text></strong></td>
    <td>
<div>
<div class='input-group date' style="margin-top: 5px;">
<input  class="form-control" type="text" name="kelompok_jasa" id="kelompok_jasa" value="{{ $datas->kelompok_jasa }}"  readonly placeholder="-PILIH JASA-" 
 />
<span class="input-group-addon" onclick="open_child('/pem_tender/lookup/lookup_jasa','Look Up','800','500'); return false;"
><span class="fa fa-file"></span></span>
</div>
<div style="margin-top: 5px;">
<input size="50" name="sub_jasa" id="sub_jasa" class="form-control" value="{{ $datas->sub_jasa }}" readonly type="text" size="30"  /> 
</div>
</tr>

<tr>
<td ><strong>NAMA PEKERJAAN</strong></td>
<td>
<div>
<textarea name="nama_pekerjaan" class="form-control" type="text" id="nama_pekerjaan">{{ $datas->nama_pekerjaan }}</textarea>
</div>
  </tr>
  <tr>
<td ><strong>BIDANG / SUB BIDANG PEKERJAAN</strong></td>
<td>
<div>
<input name="sub_pekerjaan" class="form-control" type="text" id="sub_pekerjaan" value="{{ $datas->sub_pekerjaan }}"/> 
</div>
</td>
</tr>
  <tr>
<td ><strong>KLIEN</strong><text style="color: red; size: 15px;">*</text></td>
<td>
<div class='input-group date' style="margin-top: 5px;">
<input class="form-control" type="text" id="nama_klien" readonly placeholder="-PILIH KLIEN-" 
value="{{ $datas->nama_klien }}" />
<span class="input-group-addon" onclick="open_child('/pem_tender/lookup/lookup_klien','Look Up','800','500'); return false;"
><span class="fa fa-file"></span></span>
<span class="input-group-addon">
<a href="{{ URL('/klien/create') }}" target="blank"><span class="glyphicon glyphicon-plus"></span></a></span>
</div>
<div style="margin-top: 5px;">
<input size="50" name="kd_klien" class="form-control" type="text" id="kd_klien" readonly placeholder="KODE KLIEN" value="{{ $datas->kd_klien }}" />
</div>
</td>
</tr>
<tr>
<td><strong>SUMBER INFORMASI</strong></td>
<td>

<div class='input-group date' >
<input name="informasi_tgl" class="input-group datepicker form-control"  data-date-format="yyyy-mm-dd" type="text" id="informasi_tgl" placeholder="TANGGAL" autocomplete="off" value="{{ $datas->informasi_tgl }}" readonly />
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div style="margin-top: 5px;">
<input size="50"  class="form-control" type="text" name="informasi_nama" id="informasi_nama" size="30"  placeholder="NAMA" value="{{ $datas->informasi_nama }}" /> 
</div>
<div style="margin-top: 5px;">
<input size="50"  class="form-control" type="text" name="informasi_entitas" id="informasi_entitas" size="30"  placeholder="ENTITAS" value="{{ $datas->informasi_entitas }}"/> 
</div>
<div style="margin-top: 5px;">
<input size="50"  class="form-control" type="text" name="informasi_telp" id="informasi_telp" size="30"  placeholder="TELP" value="{{ $datas->informasi_telp }}" /> 
</div>
<div style="margin-top: 5px;">
<input size="50"  class="form-control" type="email" name="informasi_email" id="informasi_email"  size="30"  placeholder="EMAIL" value="{{ $datas->informasi_email }}" /> 
</div>
</tr>
  <tr>
  <td><strong>CANVASSING</strong></td>
    <td>
<div class='input-group date' >
<input size="50"  class="form-control" type="text" name="tgl_canvasing" id="tgl_canvasing" size="30"  placeholder="TANGGAL" data-date-format="yyyy-mm-dd" autocomplete="off" value="{{ $datas->tgl_canvasing }}" readonly/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div style="margin-top: 5px;">
<textarea size="50"  class="form-control" type="text" name="hasil_canvasing" id="hasil_canvasing" size="30"  placeholder="HASIL"/>{{ $datas->hasil_canvasing }} 
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
<input class="form-control" type="text" name="tgl_kak" id="tgl_kak"  placeholder="TANGGAL" data-date-format="yyyy-mm-dd" autocomplete="off" value="{{ $datas->tgl_kak }}" readonly/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div class='input-group date' style="width: 50%; margin-top: 5px">
<input class="form-control" type="text" name="nilai_kak"
onkeyup="document.getElementById('format').innerHTML = formatCurrency(this.value);"  placeholder="NILAI" value="{{ $datas->nilai_kak }}" />
<span class="input-group-addon">
<span style="background-color: black; color: white;" id="format"></span></span>
</div
  </tr>
  <tr>
  <td><strong>PROSES PENDAFTARAN</strong></td>
    <td>
<div class='input-group date' >
<input  class="form-control" type="text" name="tgl_pendaftaran" id="tgl_pendaftaran" placeholder="TANGGAL" data-date-format="yyyy-mm-dd" autocomplete="off"  value="{{ $datas->tgl_pendaftaran }}" readonly/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div style="margin-top: 5px;">
<textarea size="50"  class="form-control" type="text" name="hasil_pendaftaran" id="hasil_pendaftaran" size="30"  placeholder="HASIL" >{{ $datas->hasil_pendaftaran }}</textarea>
</div>
  </tr>
   <tr>
  <td><strong>PROSES PRAKUALIFIKASI (PQ)</strong></td>
    <td>
<div class='input-group date' style="margin-top: 5px;">
<input class="form-control" type="text" name="tgl_ambil" id="tgl_ambil"  placeholder="TANGGAL AMBIL" data-date-format="yyyy-mm-dd" autocomplete="off" value="{{ $datas->tgl_ambil }}" readonly/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div class='input-group date' style="margin-top: 5px;">
<input class="form-control" type="text" name="tgl_submit" id="tgl_submit" placeholder="TANGGAL SUBMIT" data-date-format="yyyy-mm-dd" autocomplete="off" value="{{ $datas->tgl_submit }}" readonly/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div class='input-group date' style="margin-top: 5px;" >
<input class="form-control" type="text" name="tgl_pembuktian" id="tgl_pembuktian"  placeholder="TANGGAL PEMBUKTIAN" data-date-format="yyyy-mm-dd" autocomplete="off" value="{{ $datas->tgl_pembuktian }}" readonly/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div style="margin-top: 5px;" style="margin-top: 5px;">
<textarea size="50"  class="form-control" type="text" name="hasil_pq" id="hasil_pq"  size="30"  placeholder="HASIL PQ" >{{ $datas->hasil_pq }}</textarea>
</div>
  </tr>
   <tr>
  <td><strong>TANGGAL PENGAMBILAN DOKUMEN TENDER</strong></td>
    <td>
<div class='input-group date' style="margin-top: 5px;">
<input class="form-control" type="text" name="tgl_pengambilan_doc" id="tgl_pengambilan_doc" placeholder="TANGGAL PENGAMBILAN" data-date-format="yyyy-mm-dd" autocomplete="off" value="{{ $datas->tgl_pengambilan_doc }}" readonly/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
  </tr>
      <tr>
  <td><strong>PROSES AANWIJZING / PREBID MEETING</strong></td>
    <td>
<div class='input-group date' >
<input size="50"  class="form-control" type="text" name="tgl_aanwijzing" id="tgl_aanwijzing" size="30"  placeholder="TANGGAL" data-date-format="yyyy-mm-dd" autocomplete="off" value="{{ $datas->tgl_aanwijzing }}"/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div style="margin-top: 5px;">
<input size="50"  class="form-control" type="text" name="personil_aanwijzing" id="personil_aanwijzing" size="30"  placeholder="PERSONIL" value="{{ $datas->personil_aanwijzing }}"/> 
</div>
      <tr>
  <td><strong>KOMPETITOR</strong></td>
    <td>
<div style="margin-top: 5px;">
<input size="50"  class="form-control" type="text" name="kompetitor" id="kompetitor" size="30"  placeholder="KOMPETITOR" value="{{ $datas->kompetitor }}" /> 
</div>
  </tr>
        <tr>
  <td><strong>TANGGAL PEMASUKAN DOKUMEN TENDER</strong></td>
    <td>
<div class='input-group date' style="margin-top: 5px;">
<input size="50"  class="form-control" type="text" name="tgl_pemasukan_doc" id="tgl_pemasukan_doc" placeholder="TANGGAL" data-date-format="yyyy-mm-dd" autocomplete="off" value="{{ $datas->tgl_pemasukan_doc }}" readonly/>
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
<input class="form-control" type="text" name="harga_penawaran"
onkeyup="document.getElementById('format2').innerHTML = formatCurrency(this.value);"  placeholder="NILAI PENAWARAN" value="{{ $datas->harga_penawaran }}"/>
<span class="input-group-addon">
<span style="background-color: black; color: white;" id="format2"></span></span>
</div>
  </tr>
      <tr>
  <td><strong>HASIL PEMBUKAAN SAMPUL I</strong></td>
    <td>
<div class='input-group date' >
<input size="50"  class="form-control" type="text" name="tgl_sampul1" id="tgl_sampul1"  placeholder="TANGGAL" data-date-format="yyyy-mm-dd" autocomplete="off" value="{{ $datas->tgl_sampul1 }}" readonly/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div style="margin-top: 5px;">
<textarea size="50"  class="form-control" type="text" name="hasil_sampul1" id="hasil_sampul1" size="30"  placeholder="HASIL" >{{ $datas->hasil_sampul1 }}</textarea>  
</div>
  </tr>
 <tr>
  <td><strong>PROSES BEAUTY CONTEST</strong></td>
    <td>
<div class='input-group date' >
<input size="50"  class="form-control" type="text" name="tgl_contest" id="tgl_contest"  placeholder="TANGGAL" data-date-format="yyyy-mm-dd" autocomplete="off" value="{{ $datas->tgl_contest }}" readonly/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div style="margin-top: 5px;">
<input size="50"  class="form-control" type="text" name="personil_contest" id="personil_contest" size="30"  placeholder="PERSONIL" value="{{ $datas->personil_contest }}"/> 
</div>
  </tr>
<tr>
  <td><strong>PROSES KLARIFIKASI TEKNIS</strong></td>
    <td>
<div class='input-group date' >
<input  class="form-control" type="text" name="tgl_klarifikasi_teknis" id="tgl_klarifikasi_teknis"  placeholder="TANGGAL" data-date-format="yyyy-mm-dd" autocomplete="off" value="{{ $datas->tgl_klarifikasi_teknis }}" readonly/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div style="margin-top: 5px;">
<textarea size="50"  class="form-control" type="text" name="hasil_klarifikasi_teknis" id="hasil_klarifikasi_teknis" size="30"  placeholder="HASIL" >
{{ $datas->hasil_klarifikasi_teknis }}</textarea>
</div>
</tr>
<tr>
  <td><strong>PENGUMUMAN EVALUASI TEKNIS</strong></td>
    <td>
<div class='input-group date' >
<input size="50"  class="form-control" type="text" name="tgl_evaluasi_teknis" id="tgl_evaluasi_teknis" placeholder="TANGGAL" data-date-format="yyyy-mm-dd" autocomplete="off" value="{{ $datas->tgl_evaluasi_teknis }}" readonly/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div style="margin-top: 5px;">
<textarea size="50"  class="form-control" type="text" name="hasil_evaluasi_teknis" id="hasil_evaluasi_teknis" size="30"  placeholder="HASIL" >
{{ $datas->hasil_evaluasi_teknis }}</textarea></div>
</tr>
 <tr>
  <td><strong>HASIL PEMBUKAAN SAMPUL II</strong></td>
    <td>
<div class='input-group date' >
<input size="50"  class="form-control" type="text" name="tgl_sampul2" id="tgl_sampul2" placeholder="TANGGAL" data-date-format="yyyy-mm-dd" autocomplete="off" value="{{ $datas->tgl_sampul2 }}" readonly/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div style="margin-top: 5px;">
<textarea size="50"  class="form-control" type="text" name="hasil_sampul2" id="hasil_sampul2" size="30"  placeholder="HASIL" >{{ $datas->hasil_sampul2 }}</textarea> 
</div>
  </tr>
   <tr>
  <td><strong>PROSES NEGOSIASI DAN KLARIFIKASI</strong></td>
    <td>
<div class='input-group date' >
<input size="50"  class="form-control" type="text" name="tgl_negosiasi" id="tgl_negosiasi" placeholder="TANGGAL" data-date-format="yyyy-mm-dd" autocomplete="off" value="{{ $datas->tgl_negosiasi }}" readonly/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div style="margin-top: 5px;">
<textarea size="50"  class="form-control" type="text" name="hasil_negosiasi" id="hasil_negosiasi" size="30"  placeholder="HASIL" >{{ $datas->hasil_negosiasi }}</textarea> 
</div>
  </tr>
   <tr>
  <td><strong>HISTORY FOLLOW UP</strong></td>
    <td>
<div class='input-group date' >
<input  class="form-control" type="text" name="tgl_followup" id="tgl_followup" placeholder="TANGGAL" data-date-format="yyyy-mm-dd" autocomplete="off" value="{{ $datas->tgl_followup }}" readonly/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div style="margin-top: 5px;">
<input class="form-control" type="text" name="status_followup" id="status_followup"  placeholder="STATUS" value="{{ $datas->status_followup }}" /> 
</div>
  </tr>
     <tr>
  <td><strong>PELUANG DAPAT (%)</strong></td>
<td>
<div class='input-group date' style="width: 50%;">
<input size="50"  class="form-control" type="number" name="peluang" id="peluang" size="30"  value="{{ $datas->peluang }}"/>
<span class="input-group-addon"><strong>%</strong></span> 
</div>
  </tr>
<tr>
  <td><strong>STATUS TENDER</strong></td>
<td>
<div class='input-group date' >
          <select  name="status_tender" class="form-control" required>
            <option value="{{ $datas->status_tender }}" style="background-color: #eee; color: #eee;">{{ $datas->status_tender }}</option>
           <option value="OPEN" >OPEN</option>
            <option value="PROSPEK" >PROSPEK</option>
             <option value="RETENDER" >RETENDER</option>
          </select>
<span class="input-group-addon"><i class="fa fa-flag"></i></span> 
</div>
  </tr>
    @if(checkPermission(['admin','superadmin']))
  <tr>
  <td><strong>CONTACT PERSON SPRINT<text style="color: red; size: 15px;">*</text></strong></td>
<td>
<div class='input-group date' >
<input class="form-control" type="text" readonly name="cp_internal" id="nama" placeholder="PILIH PERSONIL" value="{{ $datas->cp_internal }}"/>
<span class="input-group-addon" onclick="open_child('/pem_tender/lookup/lookup_karyawan','Look Up','800','500'); return false;">
<i class="fa fa-user"></i></span>
</div>
<div style="margin-top: 5px;">
<input  class="form-control" type="email" readonly name="cp_internal_email" id="email" value="{{ $datas->cp_internal_email }}"/>
</div>
</tr>
@endif
@if(checkPermission(['user']))
  <tr>
  <td><strong>CONTACT PERSON SPRINT<text style="color: red; size: 15px;">*</text></strong></td>
<td>
<div class='input-group date' >
<input class="form-control" readonly type="text" name="cp_internal" id="nama" placeholder="PILIH PERSONIL" value="{{ $datas->cp_internal }}"/>
<span class="input-group-addon" onclick="open_child('/pem_tender/lookup/lookup_karyawan','Look Up','800','500'); return false;">
<i class="fa fa-user"></i></span>
</div>
<div style="margin-top: 5px;">
<input  class="form-control" readonly type="email" name="cp_internal_email" readonly value="{{ $datas->cp_internal_email }}"/>
</div>
</tr>
@endif
  <td>
            <input type="submit" name="add"  class="btn btn-sm btn-raised btn-primary" value="SIMPAN" title="SIMPAN">
            <a href="{{ URL('pem_tender/detail') }}/{{ $datas->kd_pn_tender }}" class="btn btn-sm btn-raised btn-danger" width="20px">BATAL</a>
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

    @include('partials/footer')
  </section>           

    <!-- javascripts -->
  <script src="/NiceAdmin/js/jquery.min.js"></script>

<script src="/NiceAdmin/js/jquery-ui.min.js"></script>
 <script type="text/javascript">
  $(function() {
$("#informasi_tgl").datepicker();
$("#tgl_canvasing").datepicker();
$("#tgl_kak" ).datepicker();
$("#tgl_pendaftaran" ).datepicker();

$("#tgl_ambil").datepicker();
$("#tgl_submit" ).datepicker();
$("#tgl_pembuktian" ).datepicker();

$("#tgl_pengambilan_doc").datepicker();
$("#tgl_aanwijzing").datepicker();
$("#tgl_pemasukan_doc").datepicker();
$("#tgl_sampul1").datepicker();
$("#tgl_contest").datepicker();
$("#tgl_klarifikasi_teknis").datepicker();
$("#tgl_evaluasi_teknis").datepicker();
$("#tgl_sampul2").datepicker();
$("#tgl_negosiasi").datepicker();
$("#tgl_followup").datepicker();
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
