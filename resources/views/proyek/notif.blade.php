<!DOCTYPE html>
<title>PROJECT NOTIFICATION</title>

<body class="hold-transition skin-blue sidebar-mini">
      <section class="wrapper">
        @include('partials/header2')
          @include('partials.sidebar')
  <div class="content-wrapper" >
    <section class="content">
           @if (count($errors) > 0)
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    <div class="row" >
       @include('alert.flash-message')
          <div class="col-lg-12">
            <section class="panel" style="border: 1px solid black;">
                <div class="panel-heading bg-primary" style="margin-left:10px; margin-right: 10px; ">Notif Kegiatan Proyek</div>
@foreach ($act as $datas)
@php (@$act_id = $datas->id)
@php (@$act_notif = $datas->notif)
@php (@$act_interval = $datas->interval)
@php (@$act_status = $datas->status)
@endforeach
     <div class="panel-body" style="margin-left:10px; margin-right: 10px; ">
                    <div style="padding: 10px; border: 1px solid black; width: 50%;">Ini adalah email notifikasi kegiatan / pekerjaan yang sudah di rencanakan tanggal penyelesaianya, Interval adalah batas toleransi setelah melebihi tanggal yang di tetapkan<i>(due date)</i>, Penerima email notif ini adalah :<br>
                      1. Project Manager<br>2. Manajer Operasi<br>3. GM Operasi</div><br>
@if(@$act_id > 0)
<form action="{{ action('PrjController@update_notif', @$act_id) }}"  method="post" enctype="multipart/form-data" class="form" align="left"> 
{{ csrf_field() }} 
<input name="_method" type="hidden" value="PATCH">
@else
     <form action="{{ action('PrjController@store_notif') }}" method="post" class="form" align="left"> 
{{ csrf_field() }}     
@endif 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Grup Notifikasi :</label>
                     <input type="text" class="form-control" name="notif" id="kelompok_jasa" value="activity" readonly="readonly" value="{{ @$act_notif }}">
                     <label for="exampleInputEmail1">Interval :</label>
                    <input type="number" style="width: 10%;" class="form-control" name="interval" id="interval" value="{{ @$act_interval }}"><span>Interval > H</span>
                  </div>
                  <div class='input-group date' >
           <label for="exampleInputEmail1">Status :</label>
          <select  name="status" class="form-control" value="{{ @$act_status }}">
            <option value="" class="bg-aqua">{{ @$act_status }}</option>
            <option value="disable" >Disable</option>
            <option value="enable" >Enable</option>
          </select>
</div>
<br>
                  <button type="submit" class="btn btn-sm btn-raised btn-primary">Simpan</button>
                </form>
</div>
<br>
<div class="panel-body" style="margin-left:10px; margin-right: 10px; ">

<table id="example1" class="table table-bordered table-striped" style="background-color: white; color: black; padding-top: 30px;">
<thead class="bg-aqua">
      <tr>
            <td rowspan="2" ><strong>Id</strong></td>
            <td rowspan="2"><strong>Kategori Notif</strong></td>
            <td rowspan="2"><strong>Interval</strong></td>
            <td rowspan="2"><strong>Status</strong></td>

</thead>
            <tr>
        @php(   $no = 1 {{-- buat nomor urut --}}  )
        {{-- loop all legalitas --}}
        @foreach ($act as $datas)
<tr onclick="javascript:pilih(this)">
<td>{{ $datas->id }}</td>
            <td>{{ $datas->notif }} </td>
            <td>{{ $datas->interval }}</td>
            <td>{{ $datas->status }}</td>

<td>
        @if(checkPermission(['superadmin']))
        <form action="{{action('PrjController@destroy_notif', $datas['id'])}}" method="post">
         {{ csrf_field() }}
        <input name="_method" type="hidden" value="PATCH">
        <button class="btn btn-sm btn-raised btn-danger" title="Hapus" onclick="return confirm('Yakin mau hapus data ?')" type="submit">
        <i class="fa fa-trash-o"></i> 
        </button>
        </form>
        @endif
</td>
</tr>
@endforeach
    </tbody>
</table>
              </div>
            </section>
<br><br>
<section class="panel" style="border: 1px solid black;">
                <div class="panel-heading bg-primary" style="margin-left:10px; margin-right: 10px; ">Notif Pertanggungjawaban</div>
@foreach ($prt as $datas)
@php (@$id = $datas->id)
@php (@$notif = $datas->notif)
@php (@$interval = $datas->interval)
@php (@$status = $datas->status)
@endforeach

                <div class="panel-body" style="margin-left:10px; margin-right: 10px; ">
                    <div style="padding: 10px; border: 1px solid black; width: 50%;">Ini adalah email notifikasi Pertanggungjawaban permintaan UUDP & SPPD, Interval adalah batas toleransi setelah tanggal permintaan, Penerima email notif ini adalah :<br>
                      1. Pemohon<br>2. Manajer Operasi<br>3. GM Operasi</div><br>
@if(@$id > 0)
<form action="{{ action('PrjController@update_notif', @$id) }}"  method="post" enctype="multipart/form-data" class="form" align="left"> 
{{ csrf_field() }} 
<input name="_method" type="hidden" value="PATCH">
@else
     <form action="{{ action('PrjController@store_notif') }}" method="post" class="form" align="left"> 
{{ csrf_field() }}     
@endif 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Grup Notifikasi :</label>
                     <input type="text" class="form-control" name="notif" id="kelompok_jasa" value="pertanggungjawaban" readonly="readonly" value="{{ @$notif }}">
                     <label for="exampleInputEmail1">Interval :</label>
                    <input type="number" style="width: 10%;" class="form-control" name="interval" id="interval" value="{{ @$interval }}"><span>Interval > H</span>
                  </div>
                  <div class='input-group date' >
           <label for="exampleInputEmail1">Status :</label>
          <select  name="status" class="form-control" value="{{ @$act_status }}" >
            <option value="" class="bg-aqua">{{ @$status }}</option>
            <option value="disable" >Disable</option>
            <option value="enable" >Enable</option>
          </select>
</div>
<br>
                  <button type="submit" class="btn btn-sm btn-raised btn-primary">Simpan</button>
                </form>
</div>
<br>
                <div class="panel-body" style="margin-left:10px; margin-right: 10px; ">
<table id="example1" class="table table-bordered table-striped" style="background-color: white; color: black; padding-top: 30px;">
<thead class="bg-aqua">
      <tr>
            <td rowspan="2" ><strong>Id</strong></td>
            <td rowspan="2"><strong>Kategori Notif</strong></td>
            <td rowspan="2"><strong>Interval</strong></td>
            <td rowspan="2"><strong>Status</strong></td>

</thead>
            <tr>
        @php(   $no = 1 {{-- buat nomor urut --}}  )
        {{-- loop all legalitas --}}
        @foreach ($prt as $datas)
<tr onclick="javascript:pilih(this)">
<td>{{ $datas->id }}</td>
            <td>{{ $datas->notif }} </td>
            <td>{{ $datas->interval }}</td>
            <td>{{ $datas->status }}</td>

<td>
        @if(checkPermission(['superadmin']))
        <form action="{{action('PrjController@destroy_notif', $datas['id'])}}" method="post">
         {{ csrf_field() }}
        <input name="_method" type="hidden" value="PATCH">
        <button class="btn btn-sm btn-raised btn-danger" title="Hapus" onclick="return confirm('Yakin mau hapus data ?')" type="submit">
        <i class="fa fa-trash-o"></i> 
        </button>
        </form>
        @endif
</td>
</tr>
@endforeach
    </tbody>
</table>
              </div>
            </section>
          </div>
</body>
<!-- jQuery 3 -->
    <script>  function open_child(url,title,w,h){
        var left = (screen.width/2)-(w/2);
        var top = (screen.height/2)-(h/2);
        w = window.open(url, title, 'toolbar=no, location=no, directories=no, \n\
        status=no, menubar=no, scrollbar=no, resizabel=no, copyhistory=no,\n\
        width='+w+',height='+h+',top='+top+',left='+left);
    };
  </script>

