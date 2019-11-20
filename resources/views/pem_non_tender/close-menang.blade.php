<!DOCTYPE html>
<title>PENJUALAN (NON TENDER) | CLOSING</title>
<html>
<body class="hold-transition skin-blue sidebar-mini">
      <section class="wrapper">
        @include('partials/header2')
          @include('partials.sidebar')
  <div class="content-wrapper">
    <section class="content" style="width: 70%;">
    <script language="JavaScript">
  function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features).focus();
  }
  </script>
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
              <header class="panel-heading " style="background-color: #eee;">
                <ul class="nav nav-tabs">
                  <li class="active" >
                    <a data-toggle="tab" href="#home" style="background-color: green; color: white;"><strong>MENANG</strong></a>
                  </li>
                  <li style="background-color: #eee;">
                    <a href="/pem_non_tender/close_kalah/{{ $datas->kd_pn_non_tender}}" style="color: black;">KALAH</a>
                  </li>
                </ul>
              </header>
    <!-- Content Header (Page header) -->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">

 <header class="bg-success" style="color: blue; padding-left: 5px; padding: 5px;">
              </header>
<form action="{{ URL('pem_non_tender/proses_close_menang', $datas->kd_pn_non_tender) }}" enctype="multipart/form-data" method="post" class="form" align="left"> 
{{ csrf_field() }}  
<input name="_method" type="hidden" value="PATCH">            
<table class="table" style="font-size: 12px;">
<tr><td style="width: 30%;"><strong>JENIS JASA<text style="color: red; size: 15px;">*</text></strong>
</td>
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
<td ><strong>KLIEN<text style="color: red; size: 15px;">*</text></strong></td>
<td>
<div  style="margin-top: 5px;">
<input   class="form-control" type="text" id="nama_klien" name="nama_klien" readonly placeholder="-PILIH KLIEN-" value="{{ $datas->nama_klien }}"/>
</div>
<div style="margin-top: 5px;">
<input name="kd_klien" class="form-control" type="text" id="kd_klien" readonly value="{{ $datas->kd_klien }}" />
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
<div class='input-group date' style="margin-bottom: 5px;">
<input  class="form-control" type="text" name="cp_internal" value="{{ $datas->cp_internal }}" readonly>
<span class="input-group-addon"><i class="fa fa-user"></i></span>
</div>
<input class="form-control" type="text" name="cp_internal_email" value="{{ $datas->cp_internal_email }}" readonly>
  </tr>
  <tr>
<td ><strong>RINGKASAN RUANG LINGKUP</strong></td><td>
<div>
<textarea  name="ringkasan_lingkup" class="form-control" type="text" id="ringkasan_lingkup" >
  {{ old('ringkasan_lingkup') }}
</textarea>
</div>
</td>
</tr>
<tr>
<td ><strong>LOKASI PEKERJAAN</strong></td><td>
<div>
<input name="lokasi_pekerjaan" class="form-control" type="text" id="lokasi_pekerjaan" value="{{ old('lokasi_pekerjaan') }}" /> 
</div>
</td>
  </tr>
<tr>
<td ><strong>KONTRAK</strong></td><td>
  <div class='input-group date' >
<input class="form-control" type="text" name="tgl_kontrak" id="tgl_kontrak" data-date-format="yyyy-mm-dd" autocomplete="off" placeholder="TGL.KONTRAK" value="{{ old('tgl_kontrak') }}" readonly />
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
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
<input class="form-control" type="text" name="nilai_kontrak"
onkeyup="document.getElementById('format').innerHTML = formatCurrency(this.value);"  placeholder="NILAI KONTRAK (SEBELUM PPN 10%)" value="{{ old('nilai_kontrak') }}" >
<span class="input-group-addon">
<span style="background-color: black; color: white;" id="format"></span></span>
</div>
<input name="no_kontrak" id="no_kontrak" class="form-control" type="text"  style="width: 70%; margin-top: 5px" placeholder="NO.KONTRAK" value="{{ old('no_kontrak') }}" >
<small style="color: red;">Format file hanya pdf</small><div class="form-group">
<input type="file" class="form-control" id="file_kontrak" name="file_kontrak"></div>
</td>
</tr>
<tr>
  <td><strong>JANGKA WAKTU</strong></td><td>
<div class='input-group date' >
<input class="form-control" type="text" name="kontrak_mulai" id="kontrak_mulai"  placeholder="MULAI" data-date-format="yyyy-mm-dd" autocomplete="off" value="{{ old('kontrak_mulai') }}" readonly/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div class='input-group date' style="margin-top: 5px;" >
<input class="form-control" type="text" name="kontrak_selesai" id="kontrak_selesai"  placeholder="SELESAI" data-date-format="yyyy-mm-dd" autocomplete="off" value="{{ old('kontrak_selesai') }}" readonly/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
</td>
  </tr>
  <tr>
  <td><strong>PERSONIL TERLIBAT<text style="color: red; size: 15px;">*</text></strong></td><td>
<div class='input-group date' >
<input class="form-control" type="text" name="pm" id="pm" placeholder="PM" value="{{ old('pm') }}" required>
<span class="input-group-addon" onclick="open_child('/pem_non_tender/lookup/lookup_pm','Look Up','800','500'); return false;"><i class="fa fa-user"></i></span> 
</div>
<div class='input-group date' style="padding-top: 5px;" >
<textarea class="form-control" type="text" name="konsultan" id="konsultan" required>
  {{ old('konsultan') }}
</textarea>
<span class="input-group-addon" onclick="open_child('/pem_non_tender/lookup/lookup_konsultan','Look Up','800','500'); return false;"><i class="fa fa-users"></i></span> 
</div>
</td>
</tr>
<tr>
<td><strong>STATUS<text style="color: red; size: 15px;">*</text></strong></td><td>
<div class='input-group date' >
<input style="color: green;" name="status_closing" class="form-control" type="text" id="status_closing" readonly  value="MENANG" placeholder="MENANG" />
<span class="input-group-addon" style="color: green"><i class="fa fa-check" aria-hidden="true" ></i></span> 
</div>
</tr>
<tr>
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
$("#tgl_kontrak").datepicker();
$("#kontrak_mulai").datepicker();
$("#kontrak_selesai" ).datepicker();

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
