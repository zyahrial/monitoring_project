<!DOCTYPE html>
<title>TENAGA AHLI | UPDATE</title>

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
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
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
               UPDATE DATA TA
              </header>
        @php ($date_now = date('Y-m-d'))
        @php(
          $no = 1 {{-- buat nomor urut --}}
          )
        {{-- loop all ta --}}
        @foreach ($ta as $datas)
     <a href="{{ URL('/ta/show') }}/{{ $datas->kd_ta }}" class="btn btn-default pull-left" style="margin-left: 5px;  margin-top: 5px; 
     margin-bottom: 10px; ">
      <i class="fa fa-refresh"></i> Refresh</a>
      <form action="{{ action('TaController@update', $datas->kd_ta) }}"  method="post" enctype="multipart/form-data">
{{ csrf_field() }}  
<input name="_method" type="hidden" value="PATCH">     
<table class="table" style="font-size: 12px;">
  <tr><td ><strong>KD TA <text style="color: red;">*</text></strong></td>
    <td ><input name="kd_ta" class="form-control" readonly="readonly" type="text" id="kd_ta" style="color: blue;" value="{{ $datas->kd_ta }}"></td>
  <tr>
  <td ><strong>STATUS <text style="color: red;">*</text></strong></td>
    <td>
<div>
          <select  name="status" class="form-control" required>
            <option value="{{ $datas->status }}" style="background-color: silver;">{{ $datas->status }}</option>
            <option value="INTERNAL" >INTERNAL</option>
            <option value="EXTERNAL" >EXTERNAL</option>
          </select>
</div>
  </tr>
    <tr>
    <td ><strong>NAMA <text style="color: red;">*</text></strong></td>
    <td>
<div>
<input name="nama" class="form-control" type="text" id="nama" value="{{ $datas->nama }}" required> 
</div>
  </tr>
<tr>
<td><strong>TEMPAT & TGL LAHIR</strong></td>
<td>

<input  name="tempat_lahir" class="form-control" type="text" id="tempat_lahir" size="30" placeholder="Kota" value="{{ $datas->tempat_lahir }}"/><br>
<div class='input-group date' >
<input name="tanggal_lahir" class="input-group datepicker form-control" date="" data-date-format="yyyy-mm-dd" type="text" id="tanggal_lahir" placeholder="Tanggal Lahir" autocomplete="off" value="{{ $datas->tanggal_lahir }}" readonly/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
</tr>
  <tr>
  <td><strong>ALAMAT</strong></td>
    <td>
<div>
<textarea name="alamat" class="form-control" type="text" id="alamat" >{{ $datas->alamat }}</textarea>
</div>
  </tr>
    <tr>
  <td><strong>TELP</strong></td>
    <td>
<div>
<input name="telp" class="form-control" type="text" id="telp" size="30" value="{{ $datas->telp }}" /> 
</div>
  </tr>
      <tr>
  <td><strong>EMAIL</strong></td>
    <td>
<div>
<input size="50" name="email" class="form-control" type="email" id="email" size="30" value="{{ $datas->email }}" /> 
</div>
  </tr>
   <tr>
  <td><strong>No-KTP</strong></td>
    <td>
                <div class="form-group">
                  <input type="text" class="form-control form-control-sm" id="no_ktp" name="no_ktp" placeholder="No-KTP" value="{{ $datas->no_ktp }}" ><br>
<small style="color: red;">Format file harus PDF</small>
                  <input type="file" class="form-control" id="file_ktp" name="file_ktp">
                  @if ($errors->has('file_ktp'))
                <span class="help-block">
                    <strong>{{ $errors->first('file_ktp') }}</strong>
                </span>
            @endif
                </div>
  </tr>
   <tr>
  <td><strong>No-NPWP</strong></td>
    <td><div class="form-group">
                  <input type="text" id="no_npwp" class="form-control form-control-sm" name="no_npwp" placeholder="No-NPWP" value="{{ $datas->no_npwp }}" ><br>
<small style="color: red;">Format file harus PDF</small>
                  <input type="file" class="form-control" id="file_npwp" name="file_npwp" >
           @if ($errors->has('file_ktp'))
                <span class="help-block">
                    <strong>{{ $errors->first('file_npwp') }}</strong>
                </span>
            @endif
                </div>
  </tr>
      <tr>
  <td><strong>PENDIDIKAN S1<text style="color: red;">*</text></strong></td>
    <td>
<div>
<input name="s1_univ" class="form-control" type="text" id="s1_univ" placeholder="Nama Universitas" value="{{ $datas->s1_univ }}" required><br>
<input name="s1_jurusan" class="form-control" type="text" id="s1_jurusan" placeholder="Jurusan" value="{{ $datas->s1_jurusan }}" required><br>
<div class='input-group date' >
<input name="s1_tanggal_lulus" type="text" id="s1_tanggal_lulus" placeholder="Tanggal Lulus" autocomplete="off" class="input-group datepicker form-control" date="" data-date-format="yyyy-mm-dd" value="{{ $datas->s1_tanggal_lulus }}" readonly required>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<br>
<input type="text" id="s1_no_ijazah" name="s1_no_ijazah" class="form-control form-control-sm" placeholder="No-Ijazah" value="{{ $datas->s1_no_ijazah }}" ><br>
<small style="color: red;">Format file harus PDF</small>
<input type="file" class="form-control" id="file_ijazah_s1" name="file_ijazah_s1">
           @if ($errors->has('file_ijazah_s1'))
                <span class="help-block">
                    <strong>{{ $errors->first('file_ijazah_s1') }}</strong>
                </span>
            @endif
</div>
</tr>
      <tr>
  <td><strong>PENDIDIKAN S2</strong></td>
    <td>
<div>
<input size="50" name="s2_univ" class="form-control" type="text" id="s2_univ" placeholder="Nama Universitas" value="{{ $datas->s2_univ }}" /><br>
<input size="50" name="s2_jurusan" class="form-control" type="text" id="s2_jurusan" placeholder="Jurusan" value="{{ $datas->s2_jurusan }}" /><br>
<div class='input-group date' >
<input name="s2_tanggal_lulus" type="text" id="s2_tanggal_lulus" placeholder="Tanggal Lulus" autocomplete="off" class="input-group datepicker form-control" date="" data-date-format="yyyy-mm-dd" value="{{ $datas->s2_tanggal_lulus }}" readonly />
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<br>
<input type="text" id="s2_no_ijazah" name="s2_no_ijazah" placeholder="No-Ijazah" class="form-control form-control-sm" value="{{ $datas->s2_no_ijazah }}" ><br>
<small style="color: red;">Format file harus PDF</small>
<input type="file" class="form-control" id="file_ijazah_s2" name="file_ijazah_s2">
           @if ($errors->has('file_ijazah_s2'))
                <span class="help-block">
                    <strong>{{ $errors->first('file_ijazah_s2') }}</strong>
                </span>
            @endif
</div>
  </tr>
  <tr>
  <td><strong>PENDIDIKAN S3</strong></td>
    <td>
<div>
<input size="50" name="s3_univ" class="form-control"  type="text" id="s3_univ" placeholder="Nama Universitas" value="{{ $datas->s3_univ }}" /><br>
<input size="50" name="s3_jurusan" class="form-control" type="text" id="s3_jurusan" placeholder="Jurusan" value="{{ $datas->s3_jurusan }}"  /><br>
<div class='input-group date'  >
<input name="s3_tanggal_lulus" type="text" id="s3_tanggal_lulus" placeholder="Tanggal Lulus" autocomplete="off" class="input-group datepicker form-control" date="" data-date-format="yyyy-mm-dd"  value="{{ $datas->s3_tanggal_lulus }}" readonly/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<br>
<input type="text" id="s3_no_ijazah" name="s3_no_ijazah" class="form-control form-control-sm" placeholder="No-Ijazah" value="{{ $datas->s3_no_ijazah }}" ><br>
<small style="color: red;">Format file harus PDF</small>
<input type="file" class="form-control" id="file_ijazah_s3" name="file_ijazah_s3">
           @if ($errors->has('file_ijazah_s3'))
                <span class="help-block">
                    <strong>{{ $errors->first('file_ijazah_s3') }}</strong>
                </span>
            @endif
</div>
  </tr>
      <tr>
  <td><strong>KOMPETENSI / KEAHLIAN</strong></td>
    <td>
<div class='input-group date'  >
  <textarea name="keahlian" class="form-control" type="text" id="kompetensi" readonly />{{ $datas->keahlian }}</textarea>
  <span onclick="open_child('/ta/lookup/kompetensi','Look Up','800','500'); return false;" class="input-group-addon">
<span class="fa fa-file"></span></span>
</div>
  </tr>
<tr>
  <td><strong>SPT</strong></td>
    <td>
      <div class="form-group">
<small style="color: red;">Format file harus PDF</small>
                  <input type="file" class="form-control" id="file_spt" name="file_spt">
            @if ($errors->has('file_spt'))
                <span class="help-block">
                    <strong>{{ $errors->first('file_spt') }}</strong>
                </span>
            @endif
      </div>
</tr>
<tr>
  <td><strong>CV</strong></td>
    <td>
      <div class="form-group">
<small style="color: red;">Format file harus PDF</small>
                  <input type="file" class="form-control" id="file_cv" name="file_cv">
           @if ($errors->has('file_spt'))
                <span class="help-block">
                    <strong>{{ $errors->first('file_spt') }}</strong>
                </span>
            @endif
      </div>
</tr>
 <tr>
  <td><strong>SERTIFIKAT KEAHLIAN</strong></td>
    <td>
                <div class="form-group">
<small style="color: red;">Format file harus PDF</small>
                  <input type="file" class="form-control" id="file_sertifikat_keahlian" name="file_sertifikat_keahlian" >
                             @if ($errors->has('file_sertifikat_keahlian'))
                <span class="help-block">
                    <strong>{{ $errors->first('file_sertifikat_keahlian') }}</strong>
                </span>
            @endif
                  
                </div>
  </tr>
   <tr>
  <td><strong>SERTIFIKAT PELATIHAN</strong></td>
    <td>
                <div class="form-group">
<small style="color: red;">Format file harus PDF</small>
                  <input type="file" class="form-control" id="file_sertifikat_pelatihan" 
                   name="file_sertifikat_pelatihan">
            @if ($errors->has('file_sertifikat_pelatihan'))
                <span class="help-block">
                    <strong>{{ $errors->first('file_sertifikat_pelatihan') }}</strong>
                </span>
            @endif
                </div>
  </tr>

  <td>
       <input type="submit" name="add"  class="btn btn-sm btn-raised btn-primary" value="SIMPAN" title="SUBMIT">
            <a href="{{ URL('/ta/view') }}/{{ $datas->kd_ta }}" class="btn btn-sm btn-raised btn-danger" width="20px">BATAL</a>
  </td>
</tr>
@endforeach
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
$("#tanggal_lahir").datepicker();
$("#s1_tanggal_lulus").datepicker();
$("#s2_tanggal_lulus" ).datepicker();
$("#s3_tanggal_lulus" ).datepicker();
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
