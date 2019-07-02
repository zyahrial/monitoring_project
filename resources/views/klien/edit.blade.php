<!DOCTYPE html>
<title>KLIEN | UPDATE</title>

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
<header class="bg-primary" style="color: white; padding-left: 5px; padding: 5px;">UPDATE DATA KLIEN</header>
@php ($date_now = date('Y-m-d'))
        @php(
          $no = 1 
          )
        {{-- loop all klien --}}
@foreach($klien as $datas)
<a href="{{ URL('/klien/show') }}/{{ $datas->kd_klien }}" class="btn btn-default pull-left" style="margin-left: 5px; color:blue; margin-top: 5px; margin-bottom: 5px;">
      <i class="fa fa-refresh"></i> Refresh</a>
<form action="{{ action('KlienController@update', $datas->kd_klien) }}"  method="post" enctype="multipart/form-data">
{{ csrf_field() }}  
<input name="_method" type="hidden" value="PATCH">        
<table class="table">
  <tr><td ><strong>KD KLIEN<text style="color: red;">*</text></strong>
    <input name="kd_klien" class="form-control" readonly="readonly" type="text" id="kd_klien" style="color: blue;" 
      value="{{ $datas->kd_klien }}" required></td>
  <tr>
  <td ><strong>NAMA KLIEN<text style="color: red;">*</text></strong>
<div>
<input name="nama_klien" class="form-control" type="text" id="nama_klien" value="{{ $datas->nama_klien }}" required> 
</div>
  </tr>
    <tr>
    <td ><strong>JENIS USAHA <text style="color: red;">*</text> :</strong>
<div>
<input name="jenis_usaha" class="form-control" type="text" id="jenis_usaha" value="{{ $datas->jenis_usaha }}" required> 
</div>
  </tr>
<tr>
<td><strong> JENIS SEKTOR<text style="color: red;">*</text> :</strong>
<div class='input-group date'  >
<input  name="jenis_sektor" readonly class="form-control" type="text" id="nama_sektor"  value="{{ $datas->jenis_sektor }}" required>
  <span onclick="open_child('/klien/library/sektor','Look Up','800','500'); return false;" class="input-group-addon">
<span class="fa fa-file"></span></span>
</div>
</tr>
<tr>
<td><strong>SUB SEKTOR :</strong>
<div class='input-group date'  >
<input name="sub_sektor" readonly class="form-control" type="text" id="sub_sektor" value="{{ $datas->sub_sektor }}"/>
  <span onclick="open_child('/klien/library/sub_sektor','Look Up','800','500'); return false;" class="input-group-addon">
<span class="fa fa-file"></span></span>
</div>
</tr>
  <tr>
  <td><strong>ALAMAT</strong>
<div>
<textarea name="alamat" class="form-control" type="text" id="alamat" size="30" >{{ $datas->alamat }}</textarea>
</div>
  </tr>
    <tr>
  <td><strong>TLP & FAX</strong>
<div>
<input size="50" name="telp_fax" class="form-control" type="text" id="telp_fax" size="30" value="{{ $datas->telp_fax }}" /> 
</div>
  </tr>
      <tr>
  <td><strong>EMAIL</strong>
<div>
<input name="email" class="form-control" type="email" id="email" value="{{ $datas->email }}" /> 
</div>
  </tr>
        <tr>
  <td><strong>WEBSITE</strong>
<div>
<input name="website" class="form-control" type="text" id="website" size="30" value="{{ $datas->website }}" />
<small style="color: red;">Tambahkan HTTPS:// Pada awal url website</small>
</div>
  </tr>
<tr data-toggle="collapse" data-target="#cp_ops1" class="accordion-toggle">
  <td > <i class="fa fa-arrow-down"></i> Contact Person Operasional 1</td></tr>
<tr class="hiddenRow">
<td class="hiddenRow">
    <div id="cp_ops1" class="accordian-body collapse">
       <strong>NAMA :</strong><input size="50" name="cp_ops_nama1" class="form-control" type="text"  id="cp_ops_nama"  size="30"  value="{{ $datas->cp_ops_nama1 }}"/> 
  <strong>JABATAN :</strong><input size="50" name="cp_ops_jabatan1" class="form-control" type="text" id="cp_ops_jabatan" size="30"     value="{{ $datas->cp_ops_jabatan1 }}"/> 
<strong>BAGIAN :</strong>
<div class='input-group date' >
          <select  name="cp_ops_bagian1" class="form-control" >
            <option style="background-color: blue;">{{ $datas->cp_ops_bagian1 }}</option>
             @foreach ($cp_ops_bagian as $data)
            <option value="{{ $data->nama_bagian }}" >{{ $data->nama_bagian }}</option>
            @endforeach
          </select>
<span class="input-group-addon">
<a onclick="open_child('/klien/lookup/create_ops_bagian','Look Up','800','500'); return false;" ><span class="glyphicon glyphicon-plus"></span></a>
</span>
</div>  
<strong>TLP / HP</strong>
<input size="50" name="cp_ops_telp1" class="form-control" type="text" id="cp_ops_telp1" size="30"  value="{{ $datas->cp_ops_telp1 }}"/>
<strong>EMAIL</strong>
<input size="50" name="cp_ops_email1" class="form-control" type="email" id="cp_ops_email1" size="30" 
value="{{ $datas->cp_ops_email1 }}"  /> 
</div>
</td>
</tr>
<tr data-toggle="collapse" data-target="#cp_ops2" class="accordion-toggle">
  <td > <i class="fa fa-arrow-down"></i> Contact Person Operasional 2</td>
</tr>
  <tr>
<td class="hiddenRow" >
    <div id="cp_ops2" class="accordian-body collapse">
       <strong>NAMA :</strong><input size="50" name="cp_ops_nama2" class="form-control" type="text" id="cp_ops_nama2"  size="30"  value="{{ $datas->cp_ops_nama2 }}"/> 
  <strong>JABATAN :</strong><input size="50" name="cp_ops_jabatan2" class="form-control" type="text" id="cp_ops_jabatan2" size="30"   value="{{ $datas->cp_ops_jabatan2 }}"/> 
<strong>BAGIAN :</strong>
<div class='input-group date' >
          <select  name="cp_ops_bagian2" class="form-control" >
            <option style="background-color: blue;">{{ $datas->cp_ops_bagian2 }}</option>
             @foreach ($cp_ops_bagian as $data)
            <option value="{{ $data->nama_bagian }}" >{{ $data->nama_bagian }}</option>
            @endforeach
          </select>
<span class="input-group-addon">
<a onclick="open_child('/klien/lookup/create_ops_bagian','Look Up','800','500'); return false;" ><span class="glyphicon glyphicon-plus"></span></a>
</span>
</div>
<strong>TLP / HP</strong>
<input size="50" name="cp_ops_telp2" class="form-control" type="text" id="cp_ops_telp" size="30"  value="{{ $datas->cp_ops_telp2}}"/>
<strong>EMAIL</strong>
<input size="50" name="cp_ops_email2" class="form-control" type="email" id="cp_ops_email" size="30"  value="{{ $datas->cp_ops_email2}}" /> 
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
       <strong>NAMA :</strong><input size="50" name="cp_ops_nama3" class="form-control" type="text" id="cp_ops_nama3"  size="30" value="{{ $datas->cp_ops_nama3 }}" /> 
  <strong>JABATAN :</strong><input size="50" name="cp_ops_jabatan3" class="form-control" type="text" id="cp_ops_jabatan3" size="30" value="{{ $datas->cp_ops_jabatan3 }}" /> 
<strong>BAGIAN :</strong>
<div class='input-group date' >
          <select  name="cp_ops_bagian3" class="form-control" >
            <option style="background-color: blue;">{{ $datas->cp_ops_bagian3 }}</option>
             @foreach ($cp_ops_bagian as $data)
            <option value="{{ $data->nama_bagian }}" >{{ $data->nama_bagian }}</option>
            @endforeach
          </select>
<span class="input-group-addon">
<a onclick="open_child('/klien/lookup/create_ops_bagian','Look Up','800','500'); return false;" ><span class="glyphicon glyphicon-plus"></span></a>
</span>
</div>
<strong>TLP / HP</strong>
<input size="50" name="cp_ops_telp3" class="form-control" type="text" id="cp_ops_telp" size="30" value="{{ $datas->cp_ops_telp3 }}"  />
<strong>EMAIL</strong>
<input size="50" name="cp_ops_email3" class="form-control" type="email" id="cp_ops_email" size="30"  value="{{ $datas->cp_ops_email3 }}"/> 
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
       <strong>NAMA :</strong><input size="50" name="cp_ops_nama4" class="form-control" type="text" id="cp_ops_nama4"  size="30" 
       value="{{ $datas->cp_ops_nama4 }}" /> 
  <strong>JABATAN :</strong><input size="50" name="cp_ops_jabatan4" class="form-control" type="text" id="cp_ops_jabatan4" size="30" value="{{ $datas->cp_ops_jabatan4 }}" /> 
<strong>BAGIAN :</strong>
<div class='input-group date' >
          <select  name="cp_ops_bagian4" class="form-control" >
            <option style="background-color: blue;">{{ $datas->cp_ops_bagian4 }}</option>
             @foreach ($cp_ops_bagian as $data)
            <option value="{{ $data->nama_bagian }}" >{{ $data->nama_bagian }}</option>
            @endforeach
          </select>
<span class="input-group-addon">
<a onclick="open_child('/klien/lookup/create_ops_bagian','Look Up','800','500'); return false;" ><span class="glyphicon glyphicon-plus"></span></a>
</span>
</div>
<strong>TLP / HP</strong>
<input size="50" name="cp_ops_telp4" class="form-control" type="text" id="cp_ops_telp4" size="30" value="{{ $datas->cp_ops_telp4}}">
<strong>EMAIL</strong>
<input size="50" name="cp_ops_email4" class="form-control" type="email" id="cp_ops_email4" size="30" value="{{ $datas->cp_ops_email4}}">
</div>
</td>
</tr>
<tr data-toggle="collapse" data-target="#cp_ops5" class="accordion-toggle">
  <td > <i class="fa fa-arrow-down"></i> Contact Person Operasional 5 </td>
</tr>
<tr class="hiddenRow">
<td class="hiddenRow" >
    <div id="cp_ops5" class="accordian-body collapse">
       <strong>NAMA :</strong><input size="50" name="cp_ops_nama5" class="form-control" type="text" id="cp_ops_nama"  size="30" value="{{ $datas->cp_ops_nama5 }}" /> 
  <strong>JABATAN :</strong><input size="50" name="cp_ops_jabatan5" class="form-control" type="text" id="cp_ops_jabatan" size="30" value="{{ $datas->cp_ops_jabatan5}}" /> 
<strong>BAGIAN :</strong>
<div class='input-group date' >
          <select  name="cp_ops_bagian5" class="form-control" >
            <option style="background-color: blue;">{{ $datas->cp_ops_bagian5}}</option>
             @foreach ($cp_ops_bagian as $data)
            <option value="{{ $data->nama_bagian }}" >{{ $data->nama_bagian }}</option>
            @endforeach
          </select>
<span class="input-group-addon">
<a onclick="open_child('/klien/lookup/create_ops_bagian','Look Up','800','500'); return false;" ><span class="glyphicon glyphicon-plus"></span></a>
</span>
</div>
<strong>TLP / HP</strong>
<input size="50" name="cp_ops_telp5" class="form-control" type="text" id="cp_ops_telp" size="30" value="{{ $datas->cp_ops_telp5 }}" />
<strong>EMAIL</strong>
<input size="50" name="cp_ops_email5" class="form-control" type="email" id="cp_ops_email" size="30" value="{{ $datas->cp_ops_email5 }}" /> 
</div>
</td>
</tr>
<tr >
  <td data-toggle="collapse" data-target="#cp_adm1" class="accordion-toggle"> <i class="fa fa-arrow-down"></i > Contact Person Administrasi 1</td>
</tr>
<tr class="hiddenRow">
<td  class="hiddenRow" >
    <div id="cp_adm1" class="accordian-body collapse">
       <strong>NAMA :</strong><input size="50" name="cp_adm_nama1" class="form-control" type="text" id="cp_adm_nama1"  size="30" value="{{$datas->cp_adm_nama1}}" /> 
  <strong>JABATAN :</strong><input size="50" name="cp_adm_jabatan1" class="form-control" type="text" id="cp_adm_jabatan1" size="30" value="{{$datas->cp_adm_jabatan1}}"  /> 
<strong>BAGIAN :</strong>
<div class='input-group date' >
          <select  name="cp_adm_bagian1" class="form-control" >
            <option style="background-color: blue;">{{$datas->cp_adm_bagian1}}</option>
             @foreach ($cp_adm_bagian as $data)
            <option value="{{ $data->nama_bagian }}" >{{ $data->nama_bagian }}</option>
            @endforeach
          </select>
<span class="input-group-addon">
<a onclick="open_child('/klien/lookup/create_adm_bagian','Look Up','800','500'); return false;" ><span class="glyphicon glyphicon-plus"></span></a>
</span>
</div>
<strong>TLP / HP</strong>
<input size="50" name="cp_adm_telp1" class="form-control" type="text" id="cp_adm_telp1" size="30" value="{{$datas->cp_adm_telp1}}" />
<strong>EMAIL</strong>
<input size="50" name="cp_adm_email1" class="form-control" type="email" id="cp_adm_email1" size="30" value="{{$datas->cp_adm_email1}}" /> 
</div>
</td>
</tr>
<tr >
  <td data-toggle="collapse" data-target="#cp_adm2" class="accordion-toggle"> <i class="fa fa-arrow-down"></i> Contact Person Administrasi 2</td>
</tr>
<tr class="hiddenRow">
  <td class="hiddenRow" >
    <div id="cp_adm2" class="accordian-body collapse">
       <strong>NAMA :</strong><input size="50" name="cp_adm_nama2" class="form-control" type="text" id="cp_adm_nama2"  size="30" value="{{$datas->cp_adm_nama2}}"  /> 
  <strong>JABATAN :</strong><input size="50" name="cp_adm_jabatan2" class="form-control" type="text" id="cp_adm_jabatan2" size="30"  value="{{$datas->cp_adm_jabatan2}}" /> 
<strong>BAGIAN :</strong>
<div class='input-group date' >
          <select  name="cp_adm_bagian2" class="form-control" >
            <option  style="background-color: blue;">{{$datas->cp_adm_bagian2}}</option>
             @foreach ($cp_adm_bagian as $data)
            <option value="{{ $data->nama_bagian }}" >{{ $data->nama_bagian }}</option>
            @endforeach
          </select>
<span class="input-group-addon">
<a onclick="open_child('/klien/lookup/create_adm_bagian','Look Up','800','500'); return false;" ><span class="glyphicon glyphicon-plus"></span></a>
</span>
</div>
<strong>TLP / HP</strong>
<input size="50" name="cp_adm_telp2" class="form-control" type="text" id="cp_adm_telp2" size="30" value="{{$datas->cp_adm_telp2}}" />
<strong>EMAIL</strong>
<input size="50" name="cp_adm_email2" class="form-control" type="email" id="cp_adm_email2" size="30" value="{{$datas->cp_adm_email2}}" /> 
</div>
</td>
</tr>
<tr >
  <td data-toggle="collapse" data-target="#cp_adm3" class="accordion-toggle"> <i class="fa fa-arrow-down"></i> Contact Person Administrasi 3</td>
</tr>
<tr class="hiddenRow">
<td class="hiddenRow" >
    <div id="cp_adm3" class="accordian-body collapse">
       <strong>NAMA :</strong><input size="50" name="cp_adm_nama3" class="form-control" type="text" id="cp_adm_nama3"  size="30" value="{{$datas->cp_adm_nama3}}" /> 
  <strong>JABATAN :</strong><input size="50" name="cp_adm_jabatan3" class="form-control" type="text" id="cp_adm_jabatan3" size="30" value="{{$datas->cp_adm_jabatan3}}" /> 
<strong>BAGIAN :</strong>
<div class='input-group date' >
          <select  name="cp_adm_bagian3" class="form-control" >
            <option style="background-color: blue;">{{$datas->cp_adm_bagian3}}</option>
             @foreach ($cp_adm_bagian as $data)
            <option value="{{ $data->nama_bagian }}" >{{ $data->nama_bagian }}</option>
            @endforeach
          </select>
<span class="input-group-addon">
<a onclick="open_child('/klien/lookup/create_adm_bagian','Look Up','800','500'); return false;" ><span class="glyphicon glyphicon-plus"></span></a>
</span>
</div>
<strong>TLP / HP</strong>
<input size="50" name="cp_adm_telp3" class="form-control" type="text" id="cp_adm_telp3" size="30" value="{{$datas->cp_adm_telp3 }}" />
<strong>EMAIL</strong>
<input size="50" name="cp_adm_email3" class="form-control" type="email" id="cp_adm_email3" size="30" value="{{$datas->cp_adm_email3 }}" /> 
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
       <strong>NAMA :</strong><input size="50" name="cp_adm_nama4" class="form-control" type="text" id="cp_adm_nama4"  size="30" value="{{$datas->cp_adm_nama4}}"  /> 
  <strong>JABATAN :</strong><input size="50" name="cp_adm_jabatan4" class="form-control" type="text" id="cp_adm_jabatan4" size="30"  value="{{$datas->cp_adm_jabatan4}}" /> 
<strong>BAGIAN :</strong>
<div class='input-group date' >
          <select  name="cp_adm_bagian4" class="form-control" >
            <option style="background-color: blue;">{{$datas->cp_adm_bagian4}}</option>
             @foreach ($cp_adm_bagian as $data)
            <option value="{{ $data->nama_bagian }}" >{{ $data->nama_bagian }}</option>
            @endforeach
          </select>
<span class="input-group-addon">
<a onclick="open_child('/klien/lookup/create_adm_bagian','Look Up','800','500'); return false;" ><span class="glyphicon glyphicon-plus"></span></a>
</span>
</div>
<strong>TLP / HP</strong>
<input size="50" name="cp_adm_telp4" class="form-control" type="text" id="cp_adm_telp4" size="30" value="{{$datas->cp_adm_telp4}}"  />
<strong>EMAIL</strong>
<input size="50" name="cp_adm_email4" class="form-control" type="email" id="cp_adm_email4" size="30" value="{{$datas->cp_adm_email4}}"  /> 
</div>
</td>
</tr>


<tr>
  <td  data-toggle="collapse" data-target="#cp_adm5" class="accordion-toggle"> <i class="fa fa-arrow-down"></i> Contact Person Administrasi 5</td>
</tr>
<tr>
 <td class="hiddenRow">
    <div id="cp_adm5" class="accordian-body collapse">
       <strong>NAMA :</strong><input size="50" name="cp_adm_nama5" class="form-control" type="text" id="cp_adm_nama5"  size="30" value="{{$datas->cp_adm_nama5}}" /> 
  <strong>JABATAN :</strong><input size="50" name="cp_adm_jabatan5" class="form-control" type="text" id="cp_adm_jabatan5" size="30" value="{{$datas->cp_adm_jabatan5}}" /> 
<strong>BAGIAN :</strong>
<div class='input-group date' >
          <select  name="cp_adm_bagian5" class="form-control" >
            <option style="background-color: blue;">{{$datas->cp_adm_bagian5}}</option>
             @foreach ($cp_adm_bagian as $data)
            <option value="{{ $data->nama_bagian }}" >{{ $data->nama_bagian }}</option>
            @endforeach
          </select>
<span class="input-group-addon">
<a onclick="open_child('/klien/lookup/create_adm_bagian','Look Up','800','500'); return false;" ><span class="glyphicon glyphicon-plus"></span></a>
</span>
</div>
<strong>TLP / HP</strong>
<input size="50" name="cp_adm_telp5" class="form-control" type="text" id="cp_adm_telp5" size="30" value="{{$datas->cp_adm_telp5}}" />
<strong>EMAIL</strong>
<input size="50" name="cp_adm_email5" class="form-control" type="email" id="cp_adm_email5" size="30" value="{{$datas->cp_adm_email5}}" /> 
</div>
</td>
</tr>
 <tr>
  <td><strong>NPWP :</strong>
                <div class="form-group">
                <input type="file" class="form-control" id="file" name="file">
                <small style="color: red;">Format File Harus PDF </small>
                </div>
  </tr>
  <td>
            <input type="submit" name="add"  class="btn btn-sm btn-raised btn-primary" value="SIMPAN" title="SIMPAN">
            <a href="{{ URL('/klien/detail') }}/{{ $datas->kd_klien }}" class="btn btn-sm btn-raised btn-danger" width="20px">BATAL</a>
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
