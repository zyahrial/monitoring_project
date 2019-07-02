<!DOCTYPE html>
<title>PENJUALAN (NON TENDER) | UPDATE</title>

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
@foreach ($data as $datas)
       <header class="bg-primary" style="color: white; padding-left: 5px; padding: 5px;">
               <i>UPDATE PENJUALAN (NON TENDER)</i>
              </header>
 <a href="{{ URL('/pem_non_tender/show') }}/{{ $datas->kd_pn_non_tender }}" class="btn-sm pull-left" style="margin-left: 5px; margin-top: 5px; margin-bottom: 5px;">
      <i class="fa fa-refresh"></i> Refresh</a>
<form method="post" action="{{ URL('pem_non_tender/update', $datas->kd_pn_non_tender) }}">
{{ csrf_field() }}  
<input name="_method" type="hidden" value="PATCH">     
<table class="table" style="font-size: 12px;">
<tr><td ><strong>KD PENJUALAN<text style="color: red; size: 15px;">*</text></strong></td> 
    <td ><input style="color: blue" name="kd_pn_non_tender" class="form-control" readonly="readonly" type="text" value="{{ $datas->kd_pn_non_tender }}"></td>
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
<textarea name="nama_pekerjaan" class="form-control" type="text" id="nama_pekerjaan" >{{ $datas->nama_pekerjaan }}</textarea>
</div>
  </tr>
  <tr>
    <tr>
<td ><strong>BIDANG / SUB BIDANG PEKERJAAN</strong></td>
<td>
<div>
<input name="sub_pekerjaan" class="form-control" type="text" id="sub_pekerjaan" value="{{ $datas->sub_pekerjaan }}" /> 
</div>
</td>
</tr>
  <tr>
<td ><strong>KLIEN<text style="color: red; size: 15px;">*</text></strong></td>
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
<input style="color: blue;" name="kd_klien" class="form-control" type="text" id="kd_klien" readonly placeholder="KODE KLIEN" value="{{ $datas->kd_klien }}" />
</div>
</td>
</tr>
<tr>
<td><strong>SUMBER INFORMASI</strong></td>
<td>
<div style="margin-top: 5px;">
<input size="50"  class="form-control" type="text" name="informasi_nama" id="informasi_nama" value="{{ $datas->informasi_nama }}"   /> 
</div>
<div style="margin-top: 5px;">
<input size="50"  class="form-control" type="text" name="informasi_telp" id="informasi_telp" value="{{ $datas->informasi_telp }}"  /> 
</div>
<div style="margin-top: 5px;">
<input class="form-control" type="text" name="informasi_email" id="informasi_email" value="{{ $datas->informasi_email }}"  />
<small class="bg-info" style="color: red;">Gunakan spasi jika email lebih dari satu</small>
</div>
</tr>
  <tr>
  <td><strong>TGL PERMINTAAN</strong></td>
    <td>
<div class='input-group date' >
<input  class="form-control" type="text" name="tgl_permintaan" id="tgl_permintaan" value="{{ $datas->tgl_permintaan }}" data-date-format="yyyy-mm-dd" autocomplete="off" readonly />
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
  </tr>
  <tr>
  <td><strong>CANVASSING</strong></td>
    <td>
<div class='input-group date' >
<input size="50"  class="form-control" type="text" name="tgl_canvasing" id="tgl_canvasing" value="{{ $datas->tgl_canvasing }}"  data-date-format="yyyy-mm-dd" autocomplete="off" readonly/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div style="margin-top: 5px;">
<textarea class="form-control" type="text" name="hasil_canvasing" id="hasil_canvasing"  /> {{ $datas->hasil_canvasing }}
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
<input size="50"  class="form-control" type="text" name="tgl_kak" id="tgl_kak" value="{{ $datas->tgl_kak }}"  data-date-format="yyyy-mm-dd" autocomplete="off" readonly/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div class='input-group date' style="width: 50%; margin-top: 5px">
<input class="form-control" type="text" name="nilai_kak" placeholder="NILAI" 
onkeyup="document.getElementById('format').innerHTML = formatCurrency(this.value);"  value="{{ $datas->nilai_kak }}"  />
<span class="input-group-addon">
<span style="background-color: black; color: white;" id="format"></span></span>
</div
  </tr>
  <tr>
  <td><strong>TGL PROPOSAL</strong></td>
    <td>
<div class='input-group date' >
<input  class="form-control" type="text" name="tgl_proposal" id="tgl_proposal" value="{{ $datas->tgl_proposal }}"  data-date-format="yyyy-mm-dd" autocomplete="off"/>
<span class="input-group-addon" readonly>
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
<input class="form-control" type="text" name="nilai_penawaran"  placeholder="NILAI" 
onkeyup="document.getElementById('format2').innerHTML = formatCurrency(this.value);"  value="{{ $datas->nilai_penawaran }}"  />
<span class="input-group-addon">
<span style="background-color: black; color: white;" id="format2"></span></span>
</div>
  </tr>
   <tr>
  <td><strong>TGL PRESENTASI / KLARIFIKASI</strong></td>
    <td>
<div class='input-group date' style="margin-top: 5px;">
<input  class="form-control" type="text" name="tgl_presentasi" id="tgl_presentasi" value="{{ $datas->tgl_presentasi }}"  data-date-format="yyyy-mm-dd" autocomplete="off" readonly/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
  </tr>
      <tr>
  <td><strong>PROSES NEGOSIASI</strong></td>
    <td>
<div class='input-group date' style="margin-bottom: 5px;" >
<input class="form-control" type="text" name="tgl_negosiasi" id="tgl_negosiasi" value="{{ $datas->tgl_negosiasi }}"  data-date-format="yyyy-mm-dd" autocomplete="off" readonly/>
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
onkeyup="document.getElementById('format3').innerHTML = formatCurrency(this.value);"  placeholder="NILAI"  value="{{ $datas->nilai_negosiasi }}"  />
<span class="input-group-addon">
<span style="background-color: black; color: white;" id="format3"></span></span>
</div>
     
      <tr>
  <td><strong>HISTORY FOLLOW UP</strong></td>
    <td>
<div class='input-group date' >
<input class="form-control" type="text" name="tgl_followup" id="tgl_followup" value="{{ $datas->tgl_followup }}"  data-date-format="yyyy-mm-dd" autocomplete="off" readonly/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div style="margin-top: 5px;">
<textarea  class="form-control" type="text" name="status_followup" id="status_followup"  >{{ $datas->status_followup }}</textarea>  
</div>
  </tr>
     <tr>
  <td><strong>PELUANG DAPAT (%)</strong></td>
<td>
<div class='input-group date' style="width: 50%;">
<input size="50"  class="form-control" type="number" name="peluang" id="peluang" value="{{ $datas->peluang }}" />
<span class="input-group-addon"><strong>%</strong></span> 
</div>
  </tr>
<tr>
  <td><strong>STATUS PROPOSAL</strong></td>
<td>
<div class='input-group date' >
          <select  name="status" class="form-control" >
          <option value="{{ $datas->status }}" style="background-color: #eee; color: #eee;">{{ $datas->status }}</option>
          <option value="OPEN" >OPEN</option>
          <option value="PROSPEK" >PROSPEK</option>
          <option value="RETENDER" >RETENDER</option>
          <option value="PENDING" >PENDING</option>
          </select>
<span class="input-group-addon"><i class="fa fa-flag"></i></span> 
</div>
  </tr>
        @if(checkPermission(['admin','superadmin']))
  <tr>
  <td><strong>CONTACT PERSON SPRINT  <text style="color: red; size: 15px;">*</text>
</strong></td>
<td>
<div class='input-group date' >
<input class="form-control" type="text" name="cp_internal" id="nama" readonly value="{{ $datas->cp_internal }}" />
<span class="input-group-addon" onclick="open_child('/pem_non_tender/lookup/lookup_karyawan','Look Up','800','500'); return false;">
<i class="fa fa-user"></i></span>
</div>
<div style="margin-top: 5px;">
<input  class="form-control" type="text" name="cp_internal_email" id="email" readonly value="{{ $datas->cp_internal_email }}"/>
</div>
</tr>
  @endif
          @if(checkPermission(['user']))
  <tr>
  <td><strong>CONTACT PERSON SPRINT  <text style="color: red; size: 15px;">*</text>
</strong></td>
<td>
<div class='input-group date' >
<input class="form-control" type="text" name="cp_internal" id="nama" readonly value="{{ $datas->cp_internal }}" />
<span class="input-group-addon" onclick="open_child('/pem_non_tender/lookup/lookup_karyawan','Look Up','800','500'); return false;">
<i class="fa fa-user"></i></span>
</div>
<div style="margin-top: 5px;">
<input  class="form-control" type="text" name="cp_internal_email" readonly value="{{ $datas->cp_internal_email }}"/>
</div>
</tr>
  @endif
  <td>
            <input type="submit" name="add"  class="btn btn-sm btn-raised btn-primary" value="SIMPAN" title="SIMPAN">
            <a href="{{ URL('pem_non_tender/detail') }}/{{$datas->kd_pn_non_tender}}" class="btn btn-sm btn-raised btn-danger" width="20px">BATAL</a>
  </td>
</tr>
 </table >
@endforeach
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
