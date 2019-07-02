<!DOCTYPE html>
<title>PENJUALAN (TENDER) | CLOSING</title>

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
@foreach ($pen_tender as $datas)
      <section id="main-content">
      <section class="wrapper" style="width: 100%">
              @if (count($errors) > 0)
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
              <!--tab nav start-->
            <section class="panel">
              <header class="panel-heading" style="background-color: #eee;">
                <ul class="nav nav-tabs">
                  <li class="">
                      <a href="/pem_tender/close_menang/{{ $datas->kd_pn_tender}}" style="color: black;">MENANG</a>
                  </li>
                  <li class="active">
                      <a data-toggle="tab" href="#home" style="background-color: red; color: white;">KALAH</a>
                  </li>
                </ul>
              </header>

    <!-- Content Header (Page header) -->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">

 <header class="bg-danger" style="color: blue; padding-left: 5px; padding: 5px;">
              </header>
<form method="post" action="{{ URL('pem_tender/proses_close_kalah', $datas->kd_pn_tender) }}">
{{ csrf_field() }}  
<input name="_method" type="hidden" value="PATCH">            
<table class="table" style="font-size: 12px;">
    <tr><td ><strong>KD PENJUALAN<text style="color: red; size: 15px;">*</text></strong><br>
<input style="width: 30%" name="kd_pn_tender" class="form-control" readonly="readonly" type="text" id="kd_pn_tender" 
value="{{ $datas->kd_pn_tender }}"></td>    
<td ><strong>JENIS JASA</strong><br>
<input name="kelompok_jasa" id="kelompok_jasa" class="form-control" type="text"  readonly value="{{ $datas->kelompok_jasa }}" />
<div style="margin-top: 5px;">
<input name="sub_jasa" id="sub_jasa" class="form-control" readonly type="text" value="{{ $datas->sub_jasa }}" /> 
</div>
</tr>
  <tr>
<td ><strong>KLIEN</strong><br>
<div  style="margin-top: 5px;">
<input  class="form-control" type="text" name="nama_klien" id="nama_klien" readonly  value="{{ $datas->nama_klien }}" />
</div>
<div style="margin-top: 5px;">
<input size="50" name="kd_klien" class="form-control" type="text" id="kd_klien" readonly value="{{ $datas->kd_klien }}" />
</div>
</td>
<td><strong>SUMBER INFORMASI</strong><br>
<div class='input-group date' >
<input class="form-control" name="informasi_tgl"  type="text" readonly autocomplete="off" value="{{ $datas->informasi_tgl }}" />
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div style="margin-top: 5px;">
<input size="50"  class="form-control" type="text" name="informasi_nama" id="informasi_nama" readonly value="{{ $datas->informasi_nama }}" /> 
</div>
<div style="margin-top: 5px;">
<input class="form-control" type="text" name="informasi_entitas" id="informasi_entitas" readonly value="{{ $datas->informasi_entitas }}"/> 
</div>
<div style="margin-top: 5px;">
<input size="50"  class="form-control" type="text" name="informasi_telp" id="informasi_telp" readonly value="{{ $datas->informasi_telp }}" /> 
</div>
<div style="margin-top: 5px;">
<input size="50"  class="form-control" type="text" name="informasi_email" id="informasi_email"  readonly value="{{ $datas->informasi_email }}" /> 
</div>
</tr>
  <tr>
  <td><strong>CANVASSING</strong><br>
<div class='input-group date' >
<input  class="form-control" type="text" name="tgl_canvasing" readonly data-date-format="yyyy-mm-dd" autocomplete="off" value="{{ $datas->tgl_canvasing }}"/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div style="margin-top: 5px;">
<textarea  class="form-control" type="text" name="hasil_canvasing" id="hasil_canvasing" readonly />{{ $datas->hasil_canvasing }} 
</textarea> 
</div>
<td><strong>PROSES KAK & RAB</strong><br>
<div class='input-group date' >
<input class="form-control" type="text" name="tgl_kak" readonly autocomplete="off" value="{{ $datas->tgl_kak }}"/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
@php ($nilai_kak = (number_format($datas->nilai_kak,0,",",".").""))  
<div class='input-group date' style="width: 50%; margin-top: 5px">
<input class="form-control" type="text" readonly name="nilai_kak" value="{{ $datas->nilai_kak }}" />
</div>
  </tr>
  <tr>
  <td><strong>PROSES PENDAFTARAN</strong><br>
<div class='input-group date' >
<input class="form-control" type="text" name="tgl_pendaftaran"  readonly autocomplete="off"  value="{{ $datas->tgl_pendaftaran }}"/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div style="margin-top: 5px;">
<textarea class="form-control" type="text" name="hasil_pendaftaran" id="hasil_pendaftaran" readonly >{{ $datas->hasil_pendaftaran }}</textarea>
</div>
  <td><strong>PROSES PRAKUALIFIKASI (PQ)</strong><br>
<div class='input-group date' style="margin-top: 5px;">
<input size="50" class="form-control" type="text" name="tgl_ambil" readonly autocomplete="off" value="{{ $datas->tgl_ambil }}"/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div class='input-group date' style="margin-top: 5px;">
<input size="50"  class="form-control" type="text" name="tgl_submit" size="30"  readonly value="{{ $datas->tgl_submit }}"/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div class='input-group date' style="margin-top: 5px;" >
<input size="50"  class="form-control" type="text" name="tgl_pembuktian" readonly autocomplete="off" value="{{ $datas->tgl_pembuktian }}"/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div style="margin-top: 5px;" style="margin-top: 5px;">
<textarea class="form-control" type="text" name="hasil_pq" readonly >{{ $datas->hasil_pq }}</textarea>
</div>
  </tr>
   <tr>
  <td><strong>TGL.PENGAMBILAN DOKUMEN TENDER</strong><br>
<div class='input-group date' style="margin-top: 5px;">
<input class="form-control" type="text" name="tgl_pengambilan_doc" readonly autocomplete="off" value="{{ $datas->tgl_pengambilan_doc }}"/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
  <td><strong>PROSES AANWIJZING / PREBID MEETING</strong><br>
<div class='input-group date' >
<input class="form-control" type="text" name="tgl_aanwijzing" readonly autocomplete="off" value="{{ $datas->tgl_aanwijzing }}"/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div style="margin-top: 5px;">
<input class="form-control" type="text" name="personil_aanwijzing" readonly value="{{ $datas->personil_aanwijzing }}"/> 
</div>
      <tr>
  <td><strong>KOMPETITOR</strong><br>
<div style="margin-top: 5px;">
<input size="50"  class="form-control" type="text" name="kompetitor" readonly value="{{ $datas->kompetitor }}" /> 
</div>
  <td><strong>TANGGAL PEMASUKAN DOKUMEN TENDER</strong><br>
<div class='input-group date' style="margin-top: 5px;">
<input size="50"  class="form-control" type="text" name="tgl_pemasukan_doc" readonly autocomplete="off" value="{{ $datas->tgl_pemasukan_doc }}"/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
  </tr>
<tr>
<td><strong>HARGA PENAWARAN</strong><br>
<div class='input-group date' style="width: 50%;">
  @php ($harga_penawaran = (number_format($datas->harga_penawaran,0,",",".").""))  
<input class="form-control" type="text" name="harga_penawaran" readonly value="{{ $datas->harga_penawaran }}" /></input>
</div>
  <td><strong>HASIL PEMBUKAAN SAMPUL I</strong><br>
<div class='input-group date' >
<input class="form-control" type="text" name="tgl_sampul1" readonly autocomplete="off" value="{{ $datas->tgl_sampul1 }}"/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div style="margin-top: 5px;">
<textarea size="50"  class="form-control" type="text" name="hasil_sampul1" readonly >{{ $datas->hasil_sampul1 }}</textarea>  
</div>
  </tr>
 <tr>
  <td><strong>PROSES BEAUTY CONTEST</strong><br>
<div class='input-group date' >
<input  class="form-control" type="text" name="tgl_contest" readonly autocomplete="off" value="{{ $datas->tgl_contest }}"/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div style="margin-top: 5px;">
<input  class="form-control" type="text" name="personil_contest" readonly value="{{ $datas->personil_contest }}"/> 
</div>
  <td><strong>PROSES KLARIFIKASI TEKNIS</strong><br>
<div class='input-group date' >
<input class="form-control" type="text" name="tgl_klarifikasi_teknis" readonly autocomplete="off" value="{{ $datas->tgl_klarifikasi_teknis }}"/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div style="margin-top: 5px;">
<textarea class="form-control" type="text" name="hasil_klarifikasi_teknis" readonly>
{{ $datas->hasil_klarifikasi_teknis }}</textarea>
</div>
</tr>
<tr>
  <td><strong>PENGUMUMAN EVALUASI TEKNIS</strong><br>
<div class='input-group date' >
<input class="form-control" type="text" name="tgl_evaluasi_teknis" readonly autocomplete="off" value="{{ $datas->tgl_evaluasi_teknis }}"/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div style="margin-top: 5px;">
<textarea class="form-control" type="text" name="hasil_evaluasi_teknis" readonly >
{{ $datas->hasil_evaluasi_teknis }}</textarea></div>
  <td><strong>HASIL PEMBUKAAN SAMPUL II</strong><br>
<div class='input-group date' >
<input class="form-control" type="text" name="tgl_sampul2" readonly autocomplete="off" value="{{ $datas->tgl_sampul2 }}"/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div style="margin-top: 5px;">
<textarea class="form-control" type="text" name="hasil_sampul2" readonly >{{ $datas->hasil_sampul2 }}</textarea> 
</div>
  </tr>
   <tr>
  <td><strong>PROSES NEGOSIASI DAN KLARIFIKASI</strong><br>
<div class='input-group date' >
<input class="form-control" type="text" name="tgl_negosiasi" readonly autocomplete="off" value="{{ $datas->tgl_negosiasi }}"/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div style="margin-top: 5px;">
<textarea size="50"  class="form-control" type="text" name="hasil_negosiasi" readonly >{{ $datas->hasil_negosiasi }}</textarea> 
</div>
  <td><strong>HISTORY FOLLOW UP</strong><br>
<div class='input-group date' >
<input class="form-control" type="text" name="tgl_followup" readonly autocomplete="off" value="{{ $datas->tgl_followup }}"/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div style="margin-top: 5px;">
<input class="form-control" type="text" name="status_followup" readonly value="{{ $datas->status_followup }}" /> 
</div>
  </tr>
     <tr>
  <td><strong>PELUANG DAPAT (%)</strong><br>
<div class='input-group date' style="width: 50%;">
<input class="form-control" type="number" name="peluang" readonly value="{{ $datas->peluang }}"/>
<span class="input-group-addon"><strong>%</strong></span> 
</div>
  <td><strong>CONTACT PERSON INTERNAL</strong><br>
<div class='input-group date' >
<input class="form-control" type="text" name="cp_internal" readonly value="{{ $datas->cp_internal }}"/>
<span class="input-group-addon"><i class="fa fa-user"></i></span> 
</div>
  </tr>
<tr>
<td ><strong>NAMA PEKERJAAN</strong><br>
<div>
<input name="nama_pekerjaan" class="form-control" type="text" id="nama_pekerjaan" readonly  value="{{ $datas->nama_pekerjaan }}" /> 
</div>
    <tr>
  <td><strong>STATUS<text style="color: red; size: 15px;">*</text></strong><br>
<div class='input-group date' >
<input style="color: red;" name="status_closing" class="form-control" type="text" id="status_closing" readonly  value="KALAH" placeholder="KALAH" /> 
<span class="input-group-addon"><i class="fa fa-times" style="color: red;" aria-hidden="true"></i></span> 
</div>
  <tr>
<td><strong>PILIH KATEGORI KALAH<text style="color: red; size: 15px;">*</text></strong><br>
  <div class='input-group date' >
<input  class="form-control" type="text" 
name="kategori" id="ket_kalah" readonly placeholder="-Pilih-" />
<span class="input-group-addon" onclick="open_child('/pem_tender/lookup/ket_kalah','Look Up','800','500'); return false;">
  <i class="fa fa-file"></i></span> 
</div>
  </tr>
  <tr>
    <td>
<strong>KETERANGAN</strong>
<div style="margin-top: 5px;">
<textarea  class="form-control" type="text" name="keterangan" id="keterangan2" ></textarea>
</td>
  <tr>
  <td>
            <input type="submit" name="add"  class="btn btn-sm btn-raised btn-primary" value="SUBMIT" title="SUBMIT">
            <a href="{{ URL('pem_tender/detail') }}/{{ $datas->kd_pn_tender }}" class="btn btn-sm btn-raised btn-danger" width="20px">CANCEL</a>
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
