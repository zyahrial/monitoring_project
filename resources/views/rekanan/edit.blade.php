<!DOCTYPE html>
<title>REKANAN | UPDATE</title>

<body class="hold-transition skin-blue sidebar-mini">
      <section class="wrapper">
        @include('partials/header2')
          @include('partials.sidebar')
  <div class="content-wrapper">
    <section class="content" style="width: 70%">
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
                Update data Rekanan
              </header>
@foreach($data as $datas)
<a href="{{ URL('/rekanan/show') }}/{{ $datas->kd_rekanan }}" class="btn-sm pull-left" style="margin-left: 5px; margin-top: 5px; margin-bottom: 5px;">
      <i class="fa fa-refresh"></i> Refresh</a>

<form method="post" action="{{ URL('rekanan/update', $datas->kd_rekanan) }}"  >
{{ csrf_field() }}  
<input name="_method" type="hidden" value="PATCH">       
<table class="table">
  <tr><td ><strong>KD REKANAN<text style="color: red;">*</text></strong></td>
    <td ><input name="kd_rekanan" class="form-control" readonly="readonly" type="text" id="kd_rekanan" value="{{ $datas->kd_rekanan }}"></td></tr><tr>
  <td ><strong>NAMA KLIEN</strong><text style="color: red;">*</text></td>
    <td>
<div class='input-group date' >
<input name="nama_klien" placeholder="Pilih klien" readonly class="form-control" type="text" id="nama_klien" value="{{ $datas->nama_klien }}" required>
<span class="input-group-addon" onclick="open_child('/rekanan/lookup/lookup_klien','Look Up','800','500'); return false;">
<span class="fa fa-file"></span></span>
<span class="input-group-addon" ><a href="{{ URL('/klien/create') }}" target="_blank" >
<span class="fa fa-plus"></span></span></a>
</div>
  </tr>
      <tr>
  <td ><strong>KODE KLIEN<text style="color: red;">*</text></strong></td>
    <td>
<div>
<input size="50" name="kd_klien" class="form-control" type="text" id="kd_klien" readonly value="{{ $datas->kd_klien }}" /> 
</div>
  </tr>
    <tr>
  <td ><strong>URL</strong></td>
    <td>
<div>
<input size="50" name="url" class="form-control" type="text" id="url" value="{{ $datas->url }}" />
<small style="color: red">Tambahkan http / https pada awal url</small>
</div>
  </tr>
    <tr>
    <td ><strong>USERNAME</strong></td>
    <td>
<div>
<input size="50" name="username" class="form-control" type="text" id="username" value="{{ $datas->username }}"> 
</div>
  </tr>
<tr>
  <td><strong>PASSWORD</strong></td>
    <td>
<div>
<input size="50" name="password" class="form-control" type="text" id="password" size="30"  value="{{ $datas->password }}"/> 
</div>
  </tr>
    <tr>
  <td><strong>EMAIL TERDAFTAR</strong></td>
    <td>
<div>
<input size="50" name="email" class="form-control" type="email" id="email" size="30" value="{{ $datas->email }}" /> 
</div>
  </tr>
        <tr>
  <td><strong>TANGGAL MULAI</strong></td>
    <td>
<div class='input-group date' >
<input name="tanggal_mulai" type="text" id="tanggal_mulai" placeholder="Tanggal Mulai" autocomplete="off" value="{{ $datas->tanggal_mulai }}" class="input-group datepicker form-control" readonly data-date-format="yyyy-mm-dd"  />
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
  </tr>
          <tr>
  <td><strong>TANGGAL BERAKHIR</strong></td>
    <td>
<div class='input-group date' >
<input name="tanggal_berakhir" type="text" id="tanggal_berakhir" placeholder="Tanggal Berakhir" autocomplete="off" value="{{ $datas->tanggal_berakhir }}" class="input-group datepicker form-control" readonly data-date-format="yyyy-mm-dd"  />
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
  </tr>
  <tr>
  <td  style=" background-color: silver;"><strong><i>CONTACT PERSON</i></strong></td>
  <tr>
  <td><strong>NAMA</strong></td>
    <td>
<div>
<input size="50" name="cp_nama" class="form-control" type="text" id="cp_nama" value="{{ $datas->cp_nama }}" /> 
</div>
  </tr>
    <tr>
  <td><strong>JABATAN</strong></td>
    <td>
<div>
<input size="50" name="cp_jabatan" class="form-control" type="text" id="cp_jabatan" value="{{ $datas->cp_jabatan }}"/> 
</div>
  </tr>
<tr>
<td><strong>*BAGIAN</strong></td>
<td>
<div class='input-group date' >
          <select  name="cp_bagian" class="form-control" >
            <option value="{{ $datas->cp_bagian }}" style="background-color: silver;">{{ $datas->cp_bagian }}</option>         
            <option value="PENGADAAN" >PENGADAAN</option>
            <option value="PENGADAAN" >REKANAN</option>
            
          </select>
</div>
</tr>
      <tr>
  <td><strong>TLP / HP</strong></td>
    <td>
<div>
<input size="50" name="cp_telp" class="form-control" type="text" id="cp_ops_telp"  value="{{ $datas->cp_telp }}" /> 
</div>
  </tr>
  <tr>
  <td><strong>EMAIL</strong></td>
    <td>
<div>
<input size="50" name="cp_email" class="form-control" type="email" id="cp_ops_email" value="{{ $datas->cp_email }}" /> 
</div>
</td>
</tr>
      <tr>
  <td><strong>KETERANGAN</strong></td>
    <td>
<div>
<textarea size="50" name="keterangan" class="form-control" type="text" id="keterangan"/>
{{ $datas->keterangan }}</textarea>
</div>
  </tr>
  <td>
            <input type="submit" name="add"  class="btn btn-sm btn-raised btn-primary" value="SIMPAN" title="SIMPAN">
            <a href="{{ URL('rekanan') }}" class="btn btn-sm btn-raised btn-danger" width="20px">BATAL</a>
  </td>
 </table >
</form>
@endforeach
@include('partials/footer')
            </section>  
            </div>
            </section>                
 <script type="text/javascript">
  $(function() {
$("#tanggal_mulai").datepicker();
$("#tanggal_berakhir").datepicker();
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
</body>
</html>
