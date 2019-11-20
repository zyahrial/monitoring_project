<!DOCTYPE html>
<title>PENGALAMAN | GENERATE</title>
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
@foreach ($pengalaman as $data)

       <header class="bg-primary" style="color: white; padding-left: 5px; padding: 5px;">
GENERATE TO PROJECT
</header>
<form action="{{ URL('proyek/store') }}" method="post" class="form" align="left"> 
              {{ csrf_field() }}      
<table class="table" style="font-size: 12px;">
  <tr><td ><strong>KD PENGALAMAN<text style="color: red; size: 15px;">*</text></strong></td>
    <td ><input name="kd_pengalaman" class="form-control" style="color: blue" readonly="readonly" type="text" id="kd_pengalaman" value="{{ $data->kd_pengalaman }}"></td>
    </tr>
    <tr>
<td ><strong>KLIEN<text style="color: red; size: 15px;">*</text></strong></td>
<td>
<div class='input-group date' style="width: 100%; margin-top: 5px">
<input class="form-control" type="text" id="nama_klien" readonly placeholder="Nama klien" value="{{ $data->nama_klien }}" />
</div>
<div style="width: 100%; margin-top: 5px">
<input name="kd_klien" class="form-control" type="text" id="kd_klien" readonly placeholder="Kode Klien" value="{{ $data->kd_klien}}" >
</div>
</td>
</tr>
    <td ><strong>JENIS JASA<text style="color: red; size: 15px;">*</text></strong></td>
    <td>
<div>
<div class='input-group date' style="width: 100%; margin-top: 5px">
<input  class="form-control" type="text" name="kelompok_jasa" id="kelompok_jasa"  readonly placeholder="-PILIH JASA-" 
value="{{ $data->kelompok_jasa }}" />
</div>
<div style="width: 100%; margin-top: 5px">
<input size="50" name="sub_jasa" id="sub_jasa" class="form-control"  readonly type="text" value="{{ $data->sub_jasa }}"/> 
</div>
</tr>
<tr>
<td><strong>CONTACT PERSON SPRINT</strong></td>
<td>
<div class='input-group date' style="width: 100%; margin-top: 5px">
<input class="form-control" type="text" name="cp_internal" id="nama" readonly value="{{ $data->cp_internal }}" />
</div>
<div style="width: 100%; margin-top: 5px">
<input readonly class="form-control" type="email" name="cp_internal_email" id="email" value="{{ $data->cp_internal_email }}"/>
</div>
</tr>
<tr>
<td ><strong>NAMA PEKERJAAN</strong></td>
<td>
<div>
<textarea name="nama_pekerjaan"  readonly class="form-control" type="text" id="nama_pekerjaan" size="30" value= >{{ $data->nama_pekerjaan }}</textarea> 
</div>
  </tr>
<tr>
<td ><strong>BIDANG / SUB BIDANG PEKERJAAN</strong></td>
<td>
<div>
<input size="50" name="sub_pekerjaan"  readonly class="form-control" type="text" id="sub_pekerjaan" size="30" value="{{ $data->sub_pekerjaan }}" /> 
</div>
  </tr>
  <tr>
<td ><strong>RINGKASAN RUANG LINGKUP</strong></td>
<td>
<div>
<textarea  name="ringkasan_lingkup" readonly class="form-control" type="text" id="ringkasan_lingkup" >{{ $data->ringkasan_lingkup }}</textarea>
</div>
  </tr>
<tr>
<td ><strong>LOKASI PEKERJAAN</strong></td>
<td>
<div>
<input size="50" name="lokasi_pekerjaan" class="form-control" type="text" id="lokasi_pekerjaan" value="{{ $data->lokasi_pekerjaan }}" readonly style="width: 70%; margin-top: 5px"/> 
</div>
  </tr>
<tr>
<td ><strong>NO-KONTRAK</strong></td>
<td>
       <input size="50" name="no_kontrak" id="no_kontrak" class="form-control" type="text"  style="width: 70%; margin-top: 5px" value="{{ $data->no_kontrak }}" readonly/> 
<td>
</tr>
<tr>
<td><strong>NILAI KONTRAK (SEBELUM PPN PAJAK)</strong></td>
<td>
<div class='input-group date' style="width: 70%; margin-top: 5px">
<input class="form-control" type="text" name="nilai_kontrak" value="{{ $data->nilai_kontrak }}" readonly></div>
<tr>
<td><strong>PAJAK%</strong></td>
<td>
<div class='input-group date' style="width: 30%; margin-top: 5px">
<input class="form-control" type="number" name="tax_value" value="{{ old('tax_value') }}">
<span class="input-group-addon">
<span class="fa fa-percent"></span>
</span></div>
  </tr>
  <tr>
<td><strong>STATUS PAJAK</strong></td>
<td>
<div class='input-group date' style="width: 30%; margin-top: 5px">
          <select  name="tax_status" class="form-control" value="{{ old('tax_status') }}">
            <option value="" class="bg-aqua">---</option>
            <option value="include" >Include</option>
            <option value="exclude" >Exclude</option>
          </select>
  </tr>
</tr>
  <tr>
<td><strong>PROJECT MANAGER</strong></td>
<td>
<div class='input-group date' style="margin-top: 5px;">
<input type="text" class="form-control" name="pm" id="pm" autocomplete="off" readonly="readonly" >
<input type="text" class="form-control" id="pm_name"  autocomplete="off" readonly="readonly" >
<input type="text" class="form-control"  id="pm_email" readonly="readonly" >
<span class="input-group-addon" onclick="open_child('/proyek/lookup/lookup_pm','Look Up','1000','700'); return false;">
<span class="fa fa-ellipsis-h "></span>
</span>
</div>
</td>
<tr></tr>
  <td>
            <input type="submit" name="add"  class="btn btn-sm btn-raised btn-primary" value="PROSES" title="PROSES" onclick="return confirm('Yakin mau generate data ini ?')">
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
