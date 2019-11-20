<!DOCTYPE html>
<title>PENJUALAN (TENDER) | INSERT</title>
  <!-- Left side column. contains the logo and sidebar --> 
  <!-- Content Wrapper. Contains page content -->

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
       <header class="bg-primary" style="color: white; padding-left: 5px; padding: 5px;">
               TAMBAH PENJUALAN (TENDER)
              </header>
  @if(checkPermission(['admin','superadmin']))
     <a href="{{ URL('/pem_tender/create') }}" class="btn-sm pull-left" style="margin-left: 5px;  margin-top: 5px; 
     margin-bottom: 10px; ">
      <i class="fa fa-refresh"></i> Refresh</a>
  @endif
    @if(checkPermission(['user']))
     <a href="{{ URL('/pem_tender_user/create') }}" class="btn-sm pull-left" style="margin-left: 5px;  margin-top: 5px; 
     margin-bottom: 10px; ">
      <i class="fa fa-refresh"></i> Refresh</a>
  @endif
    @if(checkPermission(['admin','superadmin']))
      <form action="{{ URL('pem_tender/store') }}" method="post" class="form" align="left">
    @endif
    @if(checkPermission(['user']))
      <form action="{{ URL('pem_tender_user/store') }}" method="post" class="form" align="left">
    @endif
{{ csrf_field() }}      
<table class="table" style="font-size: 12px;">
<tr>
    <td  style="width: 30%;"><strong>JENIS JASA<text style="color: red; size: 15px;">*</text></strong></td>
    <td>
<div>
<div class='input-group date' style="margin-top: 5px;">
<input  class="form-control" type="text" name="kelompok_jasa" id="kelompok_jasa" readonly placeholder="Kelompok Jasa" 
 value="{{ old('kelompok_jasa') }}" >
<span class="input-group-addon" onclick="open_child('/pem_tender/lookup/lookup_jasa','Look Up','800','500'); return false;"
><span class="fa fa-file"></span></span>
</div>
<div style="margin-top: 5px;">
<input name="sub_jasa" id="sub_jasa" class="form-control" placeholder="Sub Jasa" readonly type="text" value="{{ old('sub_jasa') }}"  /> 
</div>
</tr>
<tr>
<td ><strong>NAMA PEKERJAAN</strong></td>
<td>
<div>
<textarea name="nama_pekerjaan" class="form-control" type="text" id="nama_pekerjaan" value="{{ old('nama_pekerjaan') }}" ></textarea>
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
<td ><strong>KLIEN</strong></td>
<td>
<div class='input-group date' style="margin-top: 5px;">
<input class="form-control" type="text" id="nama_klien" readonly placeholder="Nama klien"  value="{{ old('nama_klien') }}" />
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
<td><strong>SUMBER INFORMASI</strong></td>
<td>
<div class='input-group date' >
<input name="informasi_tgl" class="input-group datepicker form-control"  data-date-format="yyyy-mm-dd" type="text" id="informasi_tgl" placeholder="TANGGAL" autocomplete="off"  value="{{ old('informasi_tgl') }}" readonly />
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div style="margin-top: 5px;">
<input class="form-control" type="text" name="informasi_nama" id="informasi_nama" value="{{ old('informasi_nama') }}"  placeholder="NAMA"  /> 
</div>
<div style="margin-top: 5px;">
<input  class="form-control" type="text" name="informasi_entitas" id="informasi_entitas"value="{{ old('informasi_entitas') }}"   placeholder="ENTITAS" /> 
</div>
<div style="margin-top: 5px;">
<input  class="form-control" type="text" name="informasi_telp" id="informasi_telp" value="{{ old('informasi_telp') }}"   placeholder="TELP" /> 
</div>
<div style="margin-top: 5px;">
<input  class="form-control" type="email" name="informasi_email" id="informasi_email" value="{{ old('informasi_email') }}"  placeholder="EMAIL"  /> 
</div>
</tr>
  <tr>
  <td><strong>CANVASSING</strong></td>
    <td>
<div class='input-group date' >
<input class="form-control" type="text" name="tgl_canvasing" id="tgl_canvasing" value="{{ old('tgl_canvasing') }}"   placeholder="TANGGAL" data-date-format="yyyy-mm-dd" autocomplete="off" readonly/>
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
<input class="form-control" type="text" name="tgl_kak" id="tgl_kak"  placeholder="TANGGAL" data-date-format="yyyy-mm-dd" autocomplete="off" value="{{ old('tgl_kak') }}" readonly>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div class='input-group date' style="width: 50%; margin-top: 5px">
<input class="form-control" type="text" name="nilai_kak" value="{{ old('nilai_kak') }}" 
onkeyup="document.getElementById('format').innerHTML = formatCurrency(this.value);"  placeholder="NILAI" />
<span class="input-group-addon">
<span style="background-color: black; color: white;" id="format"></span></span>
</div
  </tr>
  <tr>
  <td><strong>PROSES PENDAFTARAN</strong></td>
    <td>
<div class='input-group date' >
<input class="form-control" type="text" name="tgl_pendaftaran" id="tgl_pendaftaran" value="{{ old('tgl_pendaftaran') }}"  placeholder="TANGGAL" data-date-format="yyyy-mm-dd" autocomplete="off" readonly/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div style="margin-top: 5px;">
<textarea class="form-control" type="text" name="hasil_pendaftaran" id="hasil_pendaftaran" placeholder="HASIL" >{{ old('hasil_pendaftaran') }}</textarea>
</div>
  </tr>
   <tr>
  <td><strong>PROSES PRAKUALIFIKASI (PQ)</strong></td>
    <td>
<div class='input-group date' style="margin-top: 5px;">
<input class="form-control" type="text" name="tgl_ambil" id="tgl_ambil" value="{{ old('tgl_ambil') }}"  placeholder="TANGGAL AMBIL" data-date-format="yyyy-mm-dd" autocomplete="off" readonly/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div class='input-group date' style="margin-top: 5px;">
<input class="form-control" type="text" name="tgl_submit" id="tgl_submit" value="{{ old('tgl_submit') }}"  placeholder="TANGGAL SUBMIT" data-date-format="yyyy-mm-dd" autocomplete="off" readonly/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div class='input-group date' style="margin-top: 5px;" >
<input class="form-control" type="text" name="tgl_pembuktian" id="tgl_pembuktian" value="{{ old('tgl_pembuktian') }}"  placeholder="TANGGAL PEMBUKTIAN" data-date-format="yyyy-mm-dd" autocomplete="off" readonly/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div style="margin-top: 5px;" style="margin-top: 5px;">
<textarea  class="form-control" type="text" name="hasil_pq" id="hasil_pq" placeholder="HASIL PQ" >{{ old('hasil_pq') }}</textarea>
</div>
  </tr>
   <tr>
  <td><strong>TANGGAL PENGAMBILAN DOKUMEN TENDER</strong></td>
    <td>
<div class='input-group date' style="margin-top: 5px;">
<input  class="form-control" type="text" name="tgl_pengambilan_doc" id="tgl_pengambilan_doc" value="{{ old('tgl_pengambilan_doc') }}"  placeholder="TANGGAL PENGAMBILAN" data-date-format="yyyy-mm-dd" autocomplete="off" readonly/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
  </tr>
      <tr>
  <td><strong>PROSES AANWIJZING / PREBID MEETING</strong></td>
    <td>
<div class='input-group date' >
<input  class="form-control" type="text" name="tgl_aanwijzing" id="tgl_aanwijzing" value="{{ old('tgl_aanwijzing') }}"  placeholder="TANGGAL" data-date-format="yyyy-mm-dd" autocomplete="off" readonly/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div style="margin-top: 5px;">
<input class="form-control" type="text" name="personil_aanwijzing" id="personil_aanwijzing" value="{{ old('personil_aanwijzing') }}"  placeholder="PERSONIL" /> 
</div>
      <tr>
  <td><strong>KOMPETITOR</strong></td>
    <td>
<div style="margin-top: 5px;">
<input class="form-control" type="text" name="kompetitor" id="kompetitor" value="{{ old('kompetitor') }}"  placeholder="KOMPETITOR" /> 
</div>
  </tr>
        <tr>
  <td><strong>TANGGAL PEMASUKAN DOKUMEN TENDER</strong></td>
    <td>
<div class='input-group date' style="margin-top: 5px;">
<input  class="form-control" type="text" name="tgl_pemasukan_doc" id="tgl_pemasukan_doc" placeholder="TANGGAL" data-date-format="yyyy-mm-dd" autocomplete="off" value="{{ old('tgl_pemasukan_doc') }}" readonly >
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
<input class="form-control" type="text" name="harga_penawaran" value="{{ old('harga_penawaran') }}" 
onkeyup="document.getElementById('format2').innerHTML = formatCurrency(this.value);"  placeholder="NILAI PENAWARAN" />
<span class="input-group-addon">
<span style="background-color: black; color: white;" id="format2"></span></span>
</div>
  </tr>
      <tr>
  <td><strong>HASIL PEMBUKAAN SAMPUL I</strong></td>
    <td>
<div class='input-group date' >
<input class="form-control" type="text" name="tgl_sampul1" id="tgl_sampul1" value="{{ old('tgl_sampul1') }}"  placeholder="TANGGAL" data-date-format="yyyy-mm-dd" autocomplete="off" readonly/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div style="margin-top: 5px;">
<textarea class="form-control" type="text" name="hasil_sampul1" id="hasil_sampul1" placeholder="HASIL" >{{ old('hasil_sampul1') }}
</textarea>  
</div>
  </tr>
 <tr>
  <td><strong>PROSES BEAUTY CONTEST</strong></td>
    <td>
<div class='input-group date' >
<input class="form-control" type="text" name="tgl_contest" id="tgl_contest" value="{{ old('tgl_contest') }}"  placeholder="TANGGAL" data-date-format="yyyy-mm-dd" autocomplete="off" readonly/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div style="margin-top: 5px;">
<input  class="form-control" type="text" name="personil_contest" id="personil_contest" value="{{ old('personil_contest') }}"  placeholder="PERSONIL" /> 
</div>
  </tr>
<tr>
  <td><strong>PROSES KLARIFIKASI TEKNIS</strong></td>
    <td>
<div class='input-group date' >
<input class="form-control" type="text" name="tgl_klarifikasi_teknis" id="tgl_klarifikasi_teknis" value="{{ old('tgl_klarifikasi_teknis') }}" placeholder="TANGGAL" data-date-format="yyyy-mm-dd" autocomplete="off" readonly/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div style="margin-top: 5px;">
<textarea class="form-control" type="text" name="hasil_klarifikasi_teknis" id="hasil_klarifikasi_teknis" placeholder="HASIL" >
  {{ old('hasil_klarifikasi_teknis') }}
</textarea>
</div>
</tr>
<tr>
  <td><strong>PENGUMUMAN EVALUASI TEKNIS</strong></td>
    <td>
<div class='input-group date' >
<input class="form-control" type="text" name="tgl_evaluasi_teknis" id="tgl_evaluasi_teknis" value="{{ old('tgl_evaluasi_teknis') }}"  placeholder="TANGGAL" data-date-format="yyyy-mm-dd" autocomplete="off" readonly/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div style="margin-top: 5px;">
<textarea  class="form-control" type="text" name="hasil_evaluasi_teknis" id="hasil_evaluasi_teknis" placeholder="HASIL" >
  {{ old('hasil_evaluasi_teknis') }}
</textarea> 
</div>
</tr>
 <tr>
  <td><strong>HASIL PEMBUKAAN SAMPUL II</strong></td>
    <td>
<div class='input-group date' >
<input  class="form-control" type="text" name="tgl_sampul2" id="tgl_sampul2" value="{{ old('tgl_sampul2') }}"  placeholder="TANGGAL" data-date-format="yyyy-mm-dd" autocomplete="off" readonly/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div style="margin-top: 5px;">
<textarea class="form-control" type="text" name="hasil_sampul2" id="hasil_sampul2" placeholder="HASIL" >{{ old('hasil_sampul2') }}</textarea> 
</div>
  </tr>
   <tr>
  <td><strong>PROSES NEGOSIASI DAN KLARIFIKASI</strong></td>
    <td>
<div class='input-group date' >
<input  class="form-control" type="text" name="tgl_negosiasi" id="tgl_negosiasi" value="{{ old('tgl_negosiasi') }}"   placeholder="TANGGAL" data-date-format="yyyy-mm-dd" autocomplete="off" readonly/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div style="margin-top: 5px;">
<textarea  class="form-control" type="text" name="hasil_negosiasi" id="hasil_negosiasi" placeholder="HASIL" >
  {{ old('hasil_negosiasi') }}
</textarea> 
</div>
  </tr>
   <tr>
  <td><strong>HISTORY FOLLOW UP</strong></td>
    <td>
<div class='input-group date' >
<input class="form-control" type="text" name="tgl_followup" id="tgl_followup" value="{{ old('tgl_followup') }}" placeholder="TANGGAL" data-date-format="yyyy-mm-dd" autocomplete="off" readonly/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div style="margin-top: 5px;">
<textarea  class="form-control" type="text" name="status_followup" id="status_followup" value="{{ old('status_followup') }}" placeholder="STATUS" ></textarea>
</div>
  </tr>
     <tr>
  <td><strong>PELUANG DAPAT (%)</strong></td>
<td>
<div class='input-group date' style="width: 50%;">
<input  class="form-control" type="number" name="peluang" id="peluang" value="{{ old('peluang') }}"  />
<span class="input-group-addon"><strong>%</strong></span> 
</div>
  </tr>
<tr>
  <td><strong>STATUS TENDER</strong></td>
<td>
<div class='input-group date' >
<input class="form-control" type="text" name="status_tender" readonly value="OPEN" placeholder="OPEN" />
<span class="input-group-addon"><i class="fa fa-flag"></i></span> 
</div>
  </tr>
  @if(checkPermission(['admin','superadmin']))
  <tr>
  <td><strong>CONTACT PERSON SPRINT<text style="color: red; size: 15px;">*</text></strong></td>
<td>
<div class='input-group date' >
  <input type="hidden" id="kode">
<input class="form-control" type="text" name="cp_internal" readonly id="nama" placeholder="PILIH PERSONIL"  value="{{ old('cp_internal') }}" />
<span class="input-group-addon" onclick="open_child('/pem_tender/lookup/lookup_karyawan','Look Up','800','500'); return false;">
<i class="fa fa-user"></i></span>
</div>
<div style="margin-top: 5px;">
<input  class="form-control" type="email" name="cp_internal_email" id="email" readonly value="{{ old('cp_internal_email') }}" />
</div>
  <input type="hidden" id="jabatan">
</tr>
    @endif
    @if(checkPermission(['user']))
  <tr>
  <td><strong>CONTACT PERSON SPRINT<text style="color: red; size: 15px;">*</text></strong></td>
<td>
<div class='input-group date' >
<input type="hidden" id="kode">
<input class="form-control" type="text" name="cp_internal" readonly id="nama" placeholder="Your Name" readonly value="{{ Auth::user()->name }}"/>
<span class="input-group-addon" onclick="open_child('/pem_tender/lookup/lookup_karyawan','Look Up','800','500'); return false;">
<i class="fa fa-user"></i></span>
</div>
<div style="margin-top: 5px;">
<input style="color: blue" class="form-control" type="email" readonly name="cp_internal_email" value="{{ Auth::user()->email }}" />
</div>
  <input type="hidden" id="jabatan">
</tr>
    @endif
<td>
            <input type="submit" name="add"  class="btn btn-sm btn-raised btn-primary" value="SIMPAN" title="SIMPAN">
                @if(checkPermission(['admin','superadmin']))
            <a href="{{ URL('pem_tender') }}" class="btn btn-sm btn-raised btn-danger" width="20px">BATAL</a>
                @endif
               @if(checkPermission(['user']))
            <a href="{{ URL('pem_tender_user') }}" class="btn btn-sm btn-raised btn-danger" width="20px">BATAL</a>
                @endif
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
