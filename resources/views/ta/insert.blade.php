<!DOCTYPE html>
<title>TA | TAMBAH</title>

<body class="hold-transition skin-blue sidebar-mini">
      <section class="wrapper">
        @include('partials/header2')
          @include('partials.sidebar')
  <div class="content-wrapper">
    <section class="content">

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
               TAMBAH TA
              </header>
     <a href="{{ URL('/ta/create') }}" class="btn btn-default pull-left" style="margin-left: 5px;  margin-top: 5px; 
     margin-bottom: 10px; ">
      <i class="fa fa-refresh"></i> Refresh</a>
      <form action="{{ URL('ta/store') }}" enctype="multipart/form-data" method="post" class="form" align="left"> 
{{ csrf_field() }}      
<table class="table" style="font-size: 12px;">
  <tr>
  <td ><strong>STATUS <text style="color: red;">*</text> </strong></td>
    <td>
<div>
          <select  name="status" class="form-control"  value="{{ old('status') }}" required >
            <option value=""  style="background-color: silver;">-PILIH STATUS-</option>
            <option value="INTERNAL" >INTERNAL</option>
            <option value="EXTERNAL" >EXTERNAL</option>
          </select>
</div>
  </tr>
    <tr>
    <td ><strong>NAMA <text style="color: red;">*</text> </strong></td>
    <td>
<div>
<input name="nama" class="form-control" type="text" id="nama"  value="{{ old('nama') }}" required> 
</div>
  </tr>
<tr>
<td><strong>TEMPAT & TGL LAHIR</strong></td>
<td>

<input  name="tempat_lahir" class="form-control" type="text" id="tempat_lahir" placeholder="Tempat lahir"  value="{{ old('tempat_lahir') }}"/><br>
<div class='input-group date' >
<input name="tanggal_lahir" class="input-group datepicker form-control" date="" data-date-format="yyyy-mm-dd" type="text" id="tanggal_lahir" placeholder="Tanggal Lahir" autocomplete="off" value="{{ old('tanggal_lahir') }}" readonly />
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
</tr>
  <tr>
  <td><strong>ALAMAT</strong></td>
    <td>
<div>
<textarea name="alamat" class="form-control" type="text" id="alamat" >{{ old('alamat') }}</textarea> 
</div>
  </tr>
    <tr>
  <td><strong>TELP</strong></td>
    <td>
<div>
<input  name="telp" class="form-control" type="text" id="telp" value="{{ old('telp') }}"/> 
</div>
  </tr>
      <tr>
  <td><strong>EMAIL</strong></td>
    <td>
<div>
<input  name="email" class="form-control" type="email" id="email"  value="{{ old('email') }}"> 
</div>
  </tr>
   <tr>
  <td><strong>No-KTP</strong></td>
    <td>
                <div class="form-group">
                  <input type="text" id="no_ktp" name="no_ktp" placeholder="No-KTP"  class="form-control form-control-sm" 
                  value="{{ old('no_ktp') }}"><br>
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
                  <input type="text" id="no_npwp" name="no_npwp" placeholder="No-NPWP" class="form-control form-control-sm"  value="{{ old('no_npwp') }}"><br>
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
<input name="s1_univ" class="form-control" type="text" id="s1_univ" placeholder="Universitas"  value="{{ old('s1_univ') }}" required/><br>
<input name="s1_jurusan" class="form-control" type="text" id="s1_jurusan" placeholder="Jurusan"  value="{{ old('s1_jurusan') }}" required /><br>
<div class='input-group date' >
<input name="s1_tanggal_lulus" type="text" id="s1_tanggal_lulus" placeholder="Tanggal Lulus"  value="{{ old('s1_tanggal_lulus') }}" autocomplete="off" class="input-group datepicker form-control" date="" data-date-format="yyyy-mm-dd" readonly  required>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<br>
<input type="text" class="form-control form-control-sm" id="s1_no_ijazah" name="s1_no_ijazah"  value="{{ old('s1_no_ijazah') }}" placeholder="No-Ijazah"  ><br>
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
<input name="s2_univ" class="form-control" type="text" id="s2_univ" placeholder="Universitas"   value="{{ old('s2_univ') }}"/><br>
<input name="s2_jurusan" class="form-control" type="text" id="s2_jurusan" placeholder="Jurusan"  value="{{ old('s2_jurusan') }}" /><br>
<div class='input-group date' >
<input name="s2_tanggal_lulus" type="text" id="s2_tanggal_lulus" placeholder="Tanggal Lulus" autocomplete="off" class="input-group datepicker form-control" date="" data-date-format="yyyy-mm-dd"  value="{{ old('s2_tanggal_lulus') }}" readonly />
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<br>
<input type="text" class="form-control form-control-sm" id="s2_no_ijazah" name="s2_no_ijazah" placeholder="No-Ijazah"  value="{{ old('s2_no_ijazah') }}" ><br>
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
<input  name="s3_univ" class="form-control" type="text" id="s3_univ" placeholder="Universitas"  value="{{ old('s3_univ') }}" /><br>
<input name="s3_jurusan" class="form-control" type="text" id="s3_jurusan" placeholder="Jurusan"  value="{{ old('s3_jurusan') }}" /><br>
<div class='input-group date' >
<input name="s3_tanggal_lulus" type="text" id="s3_tanggal_lulus" placeholder="Tanggal Lulus" autocomplete="off" class="input-group datepicker form-control" date="" data-date-format="yyyy-mm-dd"  value="{{ old('s3_tanggal_lulus') }}" readonly/>
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<br>
<input class="form-control form-control-sm" type="text" id="s3_no_ijazah" name="s3_no_ijazah" placeholder="No-Ijazah"  value="{{ old('s3_no_ijazah') }}" ><br>
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
  <textarea name="keahlian" class="form-control" type="text" id="kompetensi" readonly>{{ old('keahlian') }}</textarea>
  <span onclick="open_child('/ta/lookup/kompetensi','Look Up','800','500'); return false;" class="input-group-addon">
<span class="fa fa-file"></span></span>
</div>
  </tr>
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
<small style="color: red;">Format file harus PDF / Doc</small>
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
                  <input type="file" class="form-control" id="file_sertifikat_keahlian" name="file_sertifikat_keahlian">
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
            <a href="{{ URL('ta') }}" class="btn btn-sm btn-raised btn-danger" width="20px">BATAL</a>
  </td>
</tr>

 </table >
</form>
            </section>
          </div>
        <!-- page end-->
      </section>
    <!--main content end-->
@include('partials/footer')
  </section>           

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
<!-- Date -->
</body>
</html>
