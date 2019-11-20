<!DOCTYPE html>
<title>PENJUALAN (NON TENDER) | CLOSING</title>
<body class="hold-transition skin-blue sidebar-mini">
      <section class="wrapper">
        @include('partials/header2')
          @include('partials.sidebar')
  <div class="content-wrapper">
    <section class="content" style="width: 70%;">

@foreach ($pen_non_tender as $datas)
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
                      <a href="/pem_non_tender/close_menang/{{ $datas->kd_pn_non_tender}}" style="color: black;">MENANG</a>
                  </li>
                  <li class="active">
                      <a data-toggle="tab" href="#home" style="color: white; background-color: red;"><strong>KALAH</strong></a>
                  </li>
                </ul>
              </header>

    <!-- Content Header (Page header) -->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">

 <header class="bg-danger" style="color: blue; padding-left: 5px; padding: 5px;">
              </header>
<form method="post" action="{{ URL('pem_non_tender/proses_close_kalah', $datas->kd_pn_non_tender) }}">
{{ csrf_field() }}  
<input name="_method" type="hidden" value="PATCH">            
<table class="table" style="font-size: 12px;">
<tr><td style="width: 30%;"><strong>KD.PENJUALAN<text style="color: red; size: 15px;">*</text></strong></td>
      <td>
<input style="width: 30%; color: blue;" name="kd_pn_non_tender" class="form-control" readonly="readonly" type="text" id="kd_pn_non_tender" value="{{ $datas->kd_pn_non_tender }}"></td><tr>
    <td ><strong>JENIS JASA<text style="color: red; size: 15px;">*</text></strong></td>
    <td>
<div>
<div  style="margin-top: 5px;">
<input  class="form-control" type="text" name="kelompok_jasa" id="kelompok_jasa" 
value="{{ $datas->sub_jasa }}" readonly placeholder="-PILIH JASA-"  />
</div>
<div style="margin-top: 5px;">
<input name="sub_jasa" id="sub_jasa" class="form-control" readonly type="text" value="{{ $datas->sub_jasa }}" /> 
</div>
</tr>
<tr>
<td ><strong>NAMA PEKERJAAN</strong></td>
<td>
<div>
<textarea name="nama_pekerjaan" class="form-control" type="text" readonly id="nama_pekerjaan">{{ $datas->nama_pekerjaan }}</textarea>
</div>
  </tr>
<tr>
<td ><strong>BIDANG / SUB BIDANG PEKERJAAN</strong></td>
<td>
<div>
<input name="sub_pekerjaan" class="form-control" type="text" readonly id="sub_pekerjaan" value="{{ $datas->sub_pekerjaan }}"/> 
</div>
</td>
</tr>
  <tr>
<td ><strong>KLIEN<text style="color: red; size: 15px;">*</text></strong></td><td>
<div  style="margin-top: 5px;">
<input  class="form-control" type="text" name="nama_klien" id="nama_klien" readonly  value="{{ $datas->nama_klien }}" />
</div>
<div style="margin-top: 5px;">
<input name="kd_klien" class="form-control" type="text" id="kd_klien" readonly  value="{{ $datas->kd_klien }}" />
</div>
</td>
</tr>
<tr>
<td><strong>SUMBER INFORMASI</strong></td>
<td>
<div style="margin-top: 5px;">
<input size="50"  class="form-control" type="text" name="informasi_nama" readonly id="informasi_nama" value="{{ $datas->informasi_nama }}"   /> 
</div>
<div style="margin-top: 5px;">
<input size="50"  class="form-control" type="text" name="informasi_telp" readonly id="informasi_telp" value="{{ $datas->informasi_telp }}"  /> 
</div>
<div style="margin-top: 5px;">
<input size="50"  class="form-control" type="text" name="informasi_email" readonly id="informasi_email" value="{{ $datas->informasi_email }}"  /> 
</div>
</tr>
  <tr>
  <td><strong>TGL PERMINTAAN</strong></td>
    <td>
<div class='input-group date' >
<input  class="form-control" type="text" name="tgl_permintaan" id="tgl_permintaan" readonly value="{{ $datas->tgl_permintaan }}" data-date-format="yyyy-mm-dd" autocomplete="off"/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
  </tr>
  <tr>
  <td><strong>CANVASSING</strong></td>
    <td>
<div class='input-group date' >
<input size="50"  class="form-control" type="text" name="tgl_canvasing"  readonly value="{{ $datas->tgl_canvasing }}"  data-date-format="yyyy-mm-dd" autocomplete="off"/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div style="margin-top: 5px;">
<textarea size="50"  class="form-control" type="text" name="hasil_canvasing"  readonly /> {{ $datas->hasil_canvasing }}
</textarea> 
</div>
  </tr>
<tr>
<td><strong>PROSES KAK & RAB</strong></td>
<td>
<div class='input-group date' >
<input readonly class="form-control" type="text" name="tgl_kak" id="tgl_kak" value="{{ $datas->tgl_kak }}"  data-date-format="yyyy-mm-dd" autocomplete="off"/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div class='input-group date' style="width: 50%; margin-top: 5px">
<input class="form-control" type="text" name="nilai_kak" placeholder="NILAI" 
onkeyup="document.getElementById('format').innerHTML = formatCurrency(this.value);" readonly value="{{ $datas->nilai_kak }}"  />
</div
  </tr>
  <tr>
  <td><strong>TGL PROPOSAL</strong></td>
    <td>
<div class='input-group date' >
<input  class="form-control" type="text" readonly name="tgl_proposal" value="{{ $datas->tgl_proposal }}"  data-date-format="yyyy-mm-dd" autocomplete="off"/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
</tr>
<tr>
<td><strong>HARGA PENAWARAN</strong></td>
<td>
<div class='input-group date' style="width: 50%;">
<input class="form-control" type="text" name="nilai_penawaran" readonly placeholder="NILAI" 
onkeyup="document.getElementById('format2').innerHTML = formatCurrency(this.value);"  value="{{ $datas->nilai_penawaran }}"  />
</div>
  </tr>
   <tr>
  <td><strong>TGL PRESENTASI / KLARIFIKASI</strong></td>
    <td>
<div class='input-group date' style="margin-top: 5px;">
<input  class="form-control" type="text" name="tgl_presentasi" value="{{ $datas->tgl_presentasi }}" readonly data-date-format="yyyy-mm-dd" autocomplete="off"/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
  </tr>
      <tr>
  <td><strong>PROSES NEGOSIASI</strong></td>
    <td>
<div class='input-group date' style="margin-bottom: 5px;" >
<input class="form-control" type="text" name="tgl_negosiasi" id="tgl_negosiasi" value="{{ $datas->tgl_negosiasi }}" readonly data-date-format="yyyy-mm-dd" autocomplete="off"/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div class='input-group date' style="width: 50%;">
<input class="form-control" type="text" name="nilai_negosiasi" readonly placeholder="NILAI" value="{{ $datas->nilai_negosiasi }}"  />
</div>
     
      <tr>
  <td><strong>HISTORY FOLLOW UP</strong></td>
    <td>
<div class='input-group date' >
<input class="form-control" type="text" name="tgl_followup" readonly id="tgl_followup" value="{{ $datas->tgl_followup }}"  data-date-format="yyyy-mm-dd" autocomplete="off"/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div style="margin-top: 5px;">
<textarea  class="form-control" type="text" name="status_followup" id="status_followup" readonly >{{ $datas->status_followup }}</textarea>
</div>
  </tr>
     <tr>
  <td><strong>PELUANG DAPAT (%)</strong></td>
<td>
<div class='input-group date' style="width: 50%;">
<input readonly class="form-control" type="number" name="peluang" id="peluang" value="{{ $datas->peluang }}" />
<span class="input-group-addon"><strong>%</strong></span> 
</div>
  </tr>
  <tr>
  <td><strong>CONTACT PERSON SPRINT</strong></td>
<td>
<div class='input-group date' >
<input size="50"  class="form-control" type="text" name="cp_internal" value="{{ $datas->cp_internal }}" readonly>
<span class="input-group-addon"><i class="fa fa-user"></i></span> 
</div>
  </tr>
</div>
    <tr>
  <td><strong>STATUS<text style="color: red; size: 15px;">*</text></strong></td>
  <td><div class='input-group date' >
<input style="color: red;" name="status_closing" class="form-control" type="text" id="status_closing" readonly  value="KALAH" placeholder="KALAH" /> 
<span class="input-group-addon"><i class="fa fa-times" style="color: red;" aria-hidden="true"></i></span> 
</div>
<tr>
<td>
  <strong>PILIH KATEGORI KALAH<text style="color: red; size: 15px;">*</text></strong></td><td>
    <div class='input-group date' >
<input  class="form-control" type="text" 
name="kategori" id="ket_kalah" readonly placeholder="-Pilih-" value="{{ $datas->ket_kalah }}"/>
<span class="input-group-addon" onclick="open_child('/pem_tender/lookup/ket_kalah','Look Up','800','500'); return false;">
  <i class="fa fa-file"></i></span> 
</div>
</td>
<tr>
<td>
    <strong>KETERANGAN</strong></td><td>
<div style="margin-top: 5px;">
<textarea  class="form-control" type="text" name="keterangan" id="keterangan2" ></textarea>
</td>
</div>
</tr>
<td>
            <input type="submit" name="add"  class="btn btn-sm btn-raised btn-primary" value="SUBMIT" title="SUBMIT">
            <a href="{{ URL('pem_non_tender/detail') }}/{{ $datas->kd_pn_non_tender }}" class="btn btn-sm btn-raised btn-danger" width="20px">CANCEL</a>
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
