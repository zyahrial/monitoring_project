<!DOCTYPE html>
<title>KLIEN | INSERT</title>

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

<header class="bg-primary" style="color: white; padding-left: 5px; padding: 5px;">TAMBAH KLIEN
              </header>
     <a href="{{ URL('/klien/create') }}" class="btn btn-default pull-left" style="margin-left: 5px;  margin-top: 10px; 
     margin-bottom: 10px; ">
      <i class="fa fa-refresh"></i> Refresh</a>
            <form action="{{ URL('klien/store') }}" enctype="multipart/form-data" method="post" class="form" align="left"> 
{{ csrf_field() }}      
<table class="table borderless">
  <tr>
  <td ><strong>NAMA KLIEN<text style="color: red;">*</text> :</strong>
<div>
<input  name="nama_klien" class="form-control" type="text" id="nama_klien" value="{{ old('nama_klien') }}" required> 
</div>
  </tr>
    <tr>
    <td ><strong>JENIS USAHA<text style="color: red;">*</text> :</strong>
<div>
<input  name="jenis_usaha" class="form-control" type="text" id="jenis_usaha" value="{{ old('jenis_usaha') }}" required> 
</div>
  </tr>
<tr>
<td><strong>JENIS SEKTOR<text style="color: red;">*</text> :</strong>
<div class='input-group date'  >
<input  name="jenis_sektor" readonly class="form-control" type="text" id="nama_sektor" value="{{ old('jenis_sektor') }}" required>
  <span onclick="open_child('/klien/library/sektor','Look Up','800','500'); return false;"  class="input-group-addon" >
<span class="fa fa-file"></span></span>
</div>
</tr>
  </tr>
<tr>
<td><strong>SUB SEKTOR :</strong>
<div class='input-group date'  >
<input name="sub_sektor" readonly class="form-control" type="text" id="sub_sektor" value="{{ old('sub_sektor') }}"/>
  <span onclick="open_child('/klien/library/sub_sektor','Look Up','800','500'); return false;"  class="input-group-addon">
<span class="fa fa-file"></span></span>
</div>
</tr>
  <tr>
  <td><strong>ALAMAT :</strong>
<div>
<textarea name="alamat" class="form-control" type="text" id="alamat">{{ old('alamat') }}</textarea>
</div>
  </tr>
    <tr>
  <td><strong>TLP & FAX :</strong>
<div>
<input name="telp_fax" class="form-control" type="text" id="telp_fax" value="{{ old('telp_fax') }}"/> 
</div>
  </tr>
      <tr>
  <td><strong>EMAIL :</strong>
<div>
<input name="email" class="form-control" type="email" id="email" value="{{ old('email') }}" /> 
</div>
  </tr>
    <tr>
  <td><strong>WEBSITE</strong>
<div>
<input name="website" value="https://" class="form-control" type="text" id="website" value="{{ old('website') }}" /> 
<small style="color: red;">Tambahkan HTTPS:// Pada awal url website</small>
</div>
  </tr>
<tr data-toggle="collapse" data-target="#cp_ops1" class="accordion-toggle">
  <td ><i class="fa fa-arrow-down"></i> Contact Person Operasional 1</td></tr>
<tr class="hiddenRow">
<td class="hiddenRow">
    <div id="cp_ops1" class="accordian-body collapse">
       <strong>NAMA :</strong>
  <input  name="cp_ops_nama1" class="form-control" type="text" id="cp_ops_nama1" value="{{ old('cp_ops_nama1') }}"> 
  <strong>JABATAN :</strong>
  <input name="cp_ops_jabatan1" class="form-control" type="text" id="cp_ops_jabatan1" value="{{ old('cp_ops_jabatan1') }}"/> 
<strong>BAGIAN :</strong>
<div class='input-group date' >
          <select  name="cp_ops_bagian1" class="form-control" >
            <option value="" style="background-color: blue;">-PILIH BAGIAN-</option>
             @foreach ($cp_ops_bagian as $data)
            <option value="{{ $data->nama_bagian }}" >{{ $data->nama_bagian }}</option>
            @endforeach
          </select>
<span class="input-group-addon" onclick="open_child('library/ops_bagian','Look Up','800','500'); return false;">
<span class="glyphicon glyphicon-plus"></span>
</span>
</div>  
<strong>TLP / HP</strong>
<input  name="cp_ops_telp1" class="form-control" type="text" id="cp_ops_telp1" value="{{ old('cp_ops_telp1') }}" />
<strong>EMAIL</strong>
<input  name="cp_ops_email1" class="form-control" type="email" id="cp_ops_email1" value="{{ old('cp_ops_email1') }}"/> 
</div>
</td>
</tr>
<tr data-toggle="collapse" data-target="#cp_ops2" class="accordion-toggle">
  <td > <i class="fa fa-arrow-down"></i> Contact Person Operasional 2</td>
</tr>
  <tr>
<td class="hiddenRow" >
    <div id="cp_ops2" class="accordian-body collapse">
       <strong>NAMA :</strong>
  <input name="cp_ops_nama2" class="form-control" type="text" id="cp_ops_nama2"  value="{{ old('cp_ops_nama2') }}"/> 
  <strong>JABATAN :</strong>
  <input name="cp_ops_jabatan2" class="form-control" type="text" id="cp_ops_jabatan2" value="{{ old('cp_ops_jabatan2') }}" /> 
<strong>BAGIAN :</strong>
<div class='input-group date' >
          <select  name="cp_ops_bagian2" class="form-control" >
            <option value="" style="background-color: blue;">-PILIH BAGIAN-</option>
             @foreach ($cp_ops_bagian as $data)
            <option value="{{ $data->nama_bagian }}" >{{ $data->nama_bagian }}</option>
            @endforeach
          </select>
<span class="input-group-addon" onclick="open_child('library/ops_bagian','Look Up','800','500'); return false;">
<span class="glyphicon glyphicon-plus"></span>
</span>
</div>
<strong>TLP / HP</strong>
<input name="cp_ops_telp2" class="form-control" type="text" id="cp_ops_telp2" value="{{ old('cp_ops_telp2') }}" />
<strong>EMAIL</strong>
<input name="cp_ops_email2" class="form-control" type="email" id="cp_ops_email2" value="{{ old('cp_ops_email2') }}" /> 
</div>
</td>
</tr>
<tr>
</tr>
<tr data-toggle="collapse" data-target="#cp_ops3" class="accordion-toggle">
  <td > <i class="fa fa-arrow-down"></i> Contact Person Operasional 3</td>
</span></tr>
<tr class="hiddenRow">
<td class="hiddenRow">
    <div id="cp_ops3" class="accordian-body collapse">
       <strong>NAMA :</strong>
       <input name="cp_ops_nama3" class="form-control" type="text" id="cp_ops_nama3" value="{{ old('cp_ops_nama3') }}" /> 
  <strong>JABATAN :</strong>
  <input  name="cp_ops_jabatan3" class="form-control" type="text" id="cp_ops_jabatan3" value="{{ old('cp_ops_jabatan3') }}" /> 
<strong>BAGIAN :</strong>
<div class='input-group date' >
          <select  name="cp_ops_bagian3" class="form-control" >
            <option value="" style="background-color: blue;">-PILIH BAGIAN-</option>
             @foreach ($cp_ops_bagian as $data)
            <option value="{{ $data->nama_bagian }}" >{{ $data->nama_bagian }}</option>
            @endforeach
          </select>
<span class="input-group-addon" onclick="open_child('library/ops_bagian','Look Up','800','500'); return false;">
<span class="glyphicon glyphicon-plus"></span>
</span>
</div>
<strong>TLP / HP</strong>
<input name="cp_ops_telp3" class="form-control" type="text" id="cp_ops_telp3" value="{{ old('cp_ops_telp3') }}" />
<strong>EMAIL</strong>
<input name="cp_ops_email3" class="form-control" type="email" id="cp_ops_email3" value="{{ old('cp_ops_email3') }}" /> 
</div>
</td>
</tr>
<tr>
</tr>
<tr data-toggle="collapse" data-target="#cp_ops4" class="accordion-toggle">
  <td > <i class="fa fa-arrow-down"></i> Contact Person Operasional 4</td>
</tr>
<tr class="hiddenRow">
<td class="hiddenRow">
    <div id="cp_ops4" class="accordian-body collapse">
       <strong>NAMA :</strong>
       <input name="cp_ops_nama4" class="form-control" type="text" id="cp_ops_nama" value="{{ old('cp_ops_jabatan3') }}"  /> 
  <strong>JABATAN :</strong>
  <input name="cp_ops_jabatan4" class="form-control" type="text" id="cp_ops_jabatan" value="{{ old('cp_ops_jabatan3') }}"  /> 
<strong>BAGIAN :</strong>
<div class='input-group date' >
          <select  name="cp_ops_bagian4" class="form-control" >
            <option value="" style="background-color: blue;">-PILIH BAGIAN-</option>
             @foreach ($cp_ops_bagian as $data)
            <option value="{{ $data->nama_bagian }}" >{{ $data->nama_bagian }}</option>
            @endforeach
          </select>
<span class="input-group-addon" onclick="open_child('library/ops_bagian','Look Up','800','500'); return false;">
<span class="glyphicon glyphicon-plus"></span>
</span>
</div>
<strong>TLP / HP</strong>
<input  name="cp_ops_telp4" class="form-control" type="text" id="cp_ops_telp4" value="{{ old('cp_ops_telp4') }}"/>
<strong>EMAIL</strong>
<input name="cp_ops_email4" class="form-control" type="email" id="cp_ops_email4" value="{{ old('cp_ops_email4') }}" /> 
</div>
</td>
</tr>
<tr data-toggle="collapse" data-target="#cp_ops5" class="accordion-toggle">
  <td > <i class="fa fa-arrow-down"></i> Contact Person Operasional 5</td>
</tr>
<tr class="hiddenRow">
<td class="hiddenRow" >
<div id="cp_ops5" class="accordian-body collapse">
<strong>NAMA :</strong>
<input name="cp_ops_nama5" class="form-control" type="text" id="cp_ops_nama5"  value="{{ old('cp_ops_nama5') }}"/> 
  <strong>JABATAN :</strong>
  <input name="cp_ops_jabatan5" class="form-control" type="text" id="cp_ops_jabatan5" value="{{ old('cp_ops_jabatan5') }}"  /> 
<strong>BAGIAN :</strong>
<div class='input-group date' >
          <select  name="cp_ops_bagian5" class="form-control" >
            <option value="" style="background-color: blue;">-PILIH BAGIAN-</option>
             @foreach ($cp_ops_bagian as $data)
            <option value="{{ $data->nama_bagian }}" >{{ $data->nama_bagian }}</option>
            @endforeach
          </select>
<span class="input-group-addon" onclick="open_child('library/ops_bagian','Look Up','800','500'); return false;">
<span class="glyphicon glyphicon-plus"></span>
</span>
</div>
<strong>TLP / HP</strong>
<input name="cp_ops_telp5" class="form-control" type="text" id="cp_ops_telp5" value="{{ old('cp_ops_telp5') }}" />
<strong>EMAIL</strong>
<input name="cp_ops_email5" class="form-control" type="email" id="cp_ops_email5" value="{{ old('cp_ops_email5') }}" />
</div>
</td>
</tr>
<tr >
  <td data-toggle="collapse" data-target="#cp_adm1" class="accordion-toggle"> <i class="fa fa-arrow-down"></i> Contact Person Administrasi 1</td>
</tr>
<tr class="hiddenRow">
<td  class="hiddenRow" >
    <div id="cp_adm1" class="accordian-body collapse">
       <strong>NAMA :</strong>
       <input name="cp_adm_nama1" class="form-control" type="text" id="cp_adm_nama1" value="{{ old('cp_adm_nama1') }}" /> 
  <strong>JABATAN :</strong>
  <input name="cp_adm_jabatan1" class="form-control" type="text" id="cp_adm_jabatan1" value="{{ old('cp_adm_jabatan1') }}"> 
<strong>BAGIAN :</strong>
<div class='input-group date' >
          <select  name="cp_adm_bagian1" class="form-control" >
            <option value="" style="background-color: blue;">-PILIH BAGIAN-</option>
             @foreach ($cp_adm_bagian as $data)
            <option value="{{ $data->nama_bagian }}" >{{ $data->nama_bagian }}</option>
            @endforeach
          </select>
<span class="input-group-addon" onclick="open_child('library/adm_bagian','Look Up','800','500'); return false;">
<span class="glyphicon glyphicon-plus"></span>
</span>
</div>
<strong>TLP / HP</strong>
<input name="cp_adm_telp1" class="form-control" type="text" id="cp_adm_telp1" value="{{ old('cp_adm_telp1') }}"/>
<strong>EMAIL</strong>
<input name="cp_adm_email1" class="form-control" type="email" id="cp_adm_email1" value="{{ old('cp_adm_email1') }}"/>
</div>
</td>
</tr>
<tr >
  <td data-toggle="collapse" data-target="#cp_adm2" class="accordion-toggle">
    <i class="fa fa-arrow-down"></i> Contact Person Administrasi 2</td>
</tr>
<tr class="hiddenRow">
  <td class="hiddenRow" >
    <div id="cp_adm2" class="accordian-body collapse">
       <strong>NAMA :</strong>
       <input name="cp_adm_nama2" class="form-control" type="text" id="cp_adm_nama2"  value="{{ old('cp_adm_nama2') }}"  /> 
  <strong>JABATAN :</strong>
  <input name="cp_adm_jabatan2" class="form-control" type="text" id="cp_adm_jabatan2" value="{{ old('cp_adm_jabatan2') }}" /> 
<strong>BAGIAN :</strong>
<div class='input-group date' >
          <select  name="cp_adm_bagian2" class="form-control" >
            <option value="" style="background-color: blue;">-PILIH BAGIAN-</option>
             @foreach ($cp_adm_bagian as $data)
            <option value="{{ $data->nama_bagian }}" >{{ $data->nama_bagian }}</option>
            @endforeach
          </select>
<span class="input-group-addon" onclick="open_child('library/adm_bagian','Look Up','800','500'); return false;">
<span class="glyphicon glyphicon-plus"></span>
</span>
</div>
<strong>TLP / HP</strong>
<input  name="cp_adm_telp2" class="form-control" type="text" id="cp_adm_telp2" value="{{ old('cp_adm_telp2') }}"/>
<strong>EMAIL</strong>
<input  name="cp_adm_email2" class="form-control" type="email" id="cp_adm_email2" value="{{ old('cp_adm_email2') }}"/> 
</div>
</td>
</tr>
<tr >
  <td data-toggle="collapse" data-target="#cp_adm3" class="accordion-toggle"> <i class="fa fa-arrow-down"></i> Contact Person Administrasi 3</td>
</tr>
<tr class="hiddenRow">
<td class="hiddenRow" >
    <div id="cp_adm3" class="accordian-body collapse">
       <strong>NAMA :</strong>
       <input name="cp_adm_nama3" class="form-control" type="text" id="cp_adm_nama3" value="{{ old('cp_adm_nama3') }}"/> 
  <strong>JABATAN :</strong>
  <input name="cp_adm_jabatan3" class="form-control" type="text" id="cp_adm_jabatan3" value="{{ old('cp_adm_jabatan3') }}"  /> 
<strong>BAGIAN :</strong>
<div class='input-group date' >
          <select  name="cp_adm_bagian3" class="form-control" >
            <option value="" style="background-color: blue;">-PILIH BAGIAN-</option>
             @foreach ($cp_adm_bagian as $data)
            <option value="{{ $data->nama_bagian }}" >{{ $data->nama_bagian }}</option>
            @endforeach
          </select>
<span class="input-group-addon" onclick="open_child('library/adm_bagian','Look Up','800','500'); return false;">
<span class="glyphicon glyphicon-plus"></span>
</span>
</div>
<strong>TLP / HP</strong>
<input name="cp_adm_telp3" class="form-control" type="text" id="cp_adm_telp3" value="{{ old('cp_adm_telp3') }}" />
<strong>EMAIL</strong>
<input name="cp_adm_email3" class="form-control" type="email" id="cp_adm_email3" value="{{ old('cp_adm_email3') }}"  /> 
</div>
</td>
</tr>
<tr>
</tr>

<tr>
  <td  data-toggle="collapse" data-target="#cp_adm4" class="accordion-toggle"> <i class="fa fa-arrow-down"></i> Contact Person Administrasi 4</td>
</tr>
<tr class="hiddenRow">
<td class="hiddenRow" >
    <div id="cp_adm4" class="accordian-body collapse">
       <strong>NAMA :</strong><input name="cp_adm_nama4" class="form-control" type="text" id="cp_adm_nama4" value="{{ old('cp_adm_nama4') }}"  /> 
  <strong>JABATAN :</strong><input name="cp_adm_jabatan4" class="form-control" type="text" id="cp_adm_jabatan4" value="{{ old('cp_adm_jabatan4') }}"/> 
<strong>BAGIAN :</strong>
<div class='input-group date' >
          <select  name="cp_adm_bagian4" class="form-control" >
            <option value="" style="background-color: blue;">-PILIH BAGIAN-</option>
             @foreach ($cp_adm_bagian as $data)
            <option value="{{ $data->nama_bagian }}" >{{ $data->nama_bagian }}</option>
            @endforeach
          </select>
<span class="input-group-addon" onclick="open_child('library/adm_bagian','Look Up','800','500'); return false;">
<span class="glyphicon glyphicon-plus"></span>
</span>
</div>
<strong>TLP / HP</strong>
<input name="cp_adm_telp4" class="form-control" type="text" id="cp_adm_telp4" value="{{ old('cp_adm_telp4') }}"/>
<strong>EMAIL</strong>
<input name="cp_adm_email4" class="form-control" type="email" id="cp_adm_email4" value="{{ old('cp_adm_email4') }}"> 
</div>
</td>
</tr>
<tr>
  <td  data-toggle="collapse" data-target="#cp_adm5" class="accordion-toggle"> <i class="fa fa-arrow-down"></i> Contact Person Administrasi 5</td>
</tr>
<tr>
 <td class="hiddenRow">
    <div id="cp_adm5" class="accordian-body collapse">
       <strong>NAMA :</strong>
       <input name="cp_adm_nama5" class="form-control" type="text" id="cp_adm_nama5" value="{{ old('cp_adm_nama5') }}"  /> 
  <strong>JABATAN :</strong>
  <input name="cp_adm_jabatan5" class="form-control" type="text" id="cp_adm_jabatan5" value="{{ old('cp_adm_jabatan5') }}"/> 
<strong>BAGIAN :</strong>
<div class='input-group date' >
          <select  name="cp_adm_bagian5" class="form-control" >
            <option value="" style="background-color: blue;">-PILIH BAGIAN-</option>
             @foreach ($cp_adm_bagian as $data)
            <option value="{{ $data->nama_bagian }}" >{{ $data->nama_bagian }}</option>
            @endforeach
          </select>
<span class="input-group-addon" onclick="open_child('library/adm_bagian','Look Up','800','500'); return false;" >
<span class="glyphicon glyphicon-plus"></span></a>
</span>
</div>
<strong>TLP / HP</strong>
<input name="cp_adm_telp5" class="form-control" type="text" id="cp_adm_telp5" value="{{ old('cp_adm_telp5') }}" />
<strong>EMAIL</strong>
<input name="cp_adm_email5" class="form-control" type="email" id="cp_adm_email5" value="{{ old('cp_adm_email5') }}" /> 
</div>
</td>
</tr>
<tr>
</tr>

 <tr>
  <td><strong>NPWP :</strong>
                <div class="form-group">
                  <input size="50" name="no_npwp" class="form-control" type="text" id="no_npwp" value="{{ old('npwp') }}" placeholder="No NPWP" />
                    <input type="file" class="form-control" id="file" name="file" >
                   <small style="color: red;">Format File Harus PDF </small>
   </div>
  </tr>
  <td>
            <input type="submit" name="add"  class="btn btn-sm btn-raised btn-primary" value="SIMPAN" title="SIMPAN">
            <a href="{{ URL('klien') }}" class="btn btn-sm btn-raised btn-danger" width="20px">BATAL</a>
  </td>
 </table >
</form>
            </section>
          </div>
@include('partials/footer')
  </section>           

    <!-- javascripts -->
  <script src="/NiceAdmin/js/jquery.min.js"></script>

<script src="/NiceAdmin/js/jquery-ui.min.js"></script>
 <script type="text/javascript">
  $(function() {
$("#tgl_pinjam").datepicker();
 $("#est_tgl_kembali").datepicker();
    $( "#tgl_expired" ).datepicker();
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
<!-- Date -->
</body>
</html>
