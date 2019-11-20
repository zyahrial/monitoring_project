<!DOCTYPE html>
<title>UPDATE BUDGET ACTIVITY</title>
<body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
      <section class="wrapper">
        @include('partials/header2')
          @include('partials.sidebar')
  <div class="content-wrapper">
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
    <div class="row">
        @include('alert.flash-message')
          <div class="col-lg-12">
            <section class="panel">
                     @foreach ($edit_ib as $data)
                          <div class="box-body" style="text-align: left;">
            <a href="{{ URL('/proyek/add_ib/') }}/{{ $data->kd_proyek }}" class="btn btn-app" >
                <i class="fa fa-arrow-circle-left" title="BACK" style="font-size: 32px;"></i> </a>
                          </div>
                <div class="panel-heading bg-primary" style="margin-left:10px; margin-right: 10px; ">UPDATE KEGIATAN</div>
 
                <div class="panel-body" style="margin-left:10px; margin-right: 10px; width: 50%;">
<form action="{{ action('Prj_ibController@update',$data->kode_ib) }}"  method="post" enctype="multipart/form-data">
{{ csrf_field() }}      
                  <div class="form-group">
                    <label for="exampleInputEmail1">KD IB :<span style="color: red; font-size: 24px;">*</span></label>
                    <input type="text" class="form-control" name="kode_ib" id="kode_ib" value="{{ $data->kode_ib}}" readonly="readonly">
                     <label for="exampleInputEmail1">KD PROYEK :<span style="color: red; font-size: 24px;">*</span></label>
                    <input type="text" class="form-control" name="kd_proyek" id="kd_proyek" value="{{ $data->kd_proyek}}" readonly="readonly">
                    <label for="exampleInputEmail1">KD KEGIATAN :<span style="color: red; font-size: 24px;">*</span></label>
<div class='input-group date' style="margin-top: 5px;">
 <input type="text" class="form-control" name="kd_activity" id="kd_activity" autocomplete="off" " value="{{ $data->kd_activity}}" readonly="readonly">
</div>
                    <label for="exampleInputEmail1">KEGIATAN :</label>
                    <input type="text" class="form-control" name="activity" id="activity" value="{{ $data->activity}}" readonly="readonly">
                    <label for="exampleInputEmail1">SUB KEGIATAN :</label>
<input type="text" class="form-control" name="sub_activity" id="sub_activity" value="{{ $data->sub_activity}}"  readonly="readonly">
<label for="exampleInputEmail1">DUE DATE :<span style="color: red; font-size: 24px;">*</span></label>
<div class='input-group date' style="width: 70%; margin-top: 5px">
<input name="date" class="input-group datepicker form-control" date="" data-date-format="yyyy-mm-dd" type="text"  placeholder="Target Activity" autocomplete="off" value="{{ $data->date }}" id="date" readonly >
<span class="input-group-addon" id="date">
<span class="fa fa-calendar"></span></span>
</div>
<label for="exampleInputEmail1">STATUS :<span style="color: red; font-size: 24px;">*</span></label>
<div class='input-group date' >
          <select  name="status" class="form-control" >
            <option value="{{ $data->status }}" class="bg-aqua">---</option>
            <option value="persiapan" >Persiapan</option>
            <option value="berjalan" >Berjalan</option>
            <option value="selesai" >Selesai</option>
          </select>
</div>
                  </div>
                  <button type="submit" class="btn btn-sm btn-raised btn-primary">Save</button>
                </form>
</div>
          @endforeach
          <br>
          <br>
<div class="panel-body">
<table class="table table-bordered table-hover" style="font-size:12px; color: black; padding-top: 20px;">
      <tr>
        <thead class="bg-aqua" style=" color: white;">
        <th colspan="10" class="bg-primary"> ACTIVITY </th><tr></tr>
                    <td rowspan="2" ><strong>NO</strong></td>
            <td rowspan="2" ><strong>ID IB</strong></td>
            <td rowspan="2" ><strong>ID PRJ</strong></td>
            <td rowspan="2" ><strong>ID ACT</strong></td>
            <td rowspan="2"><strong>KEGIATAN</strong></td>
            <td rowspan="2"><strong>SUB KEGIATAN</strong></td>
                        <td rowspan="2"><strong>DUE DATE</strong></td>
                        <td rowspan="2"><strong>STATUS</strong></td>
              </thead>
            <tr>
        @php(   $no = 1 {{-- buat nomor urut --}}  )
        {{-- loop all legalitas --}}
@php($today  = date("Y-m-d"))
        @foreach ($data_ib as $datas)
                    <tr>
<td>{{ $no++ }}</td>
            <td>{{ $datas->kode_ib }} </td>
            <td>{{ $datas->kd_proyek }} </td>
            <td>{{ $datas->kd_activity }} </td>
            <td>{{ $datas->activity }} </td>
            <td>{{ $datas->sub_activity }} </td>
            @if ($today > $datas->date)
                                    <td style="width : 7%" ><span style="padding: 5px" class="bg-danger">{{ $datas->date }}</span> </td>
            @else
                                    <td style="width : 7%" ><span style="padding: 5px" class="bg-success">{{ $datas->date }}</span> </td>
            @endif
@if ( $datas->status == "selesai" )
  <td ><span class="bg-black" style="padding: 5px; border-radius: 5px;"><i class="fa fa-check-square" style="padding: 5px;" style="font-size: 16px;"></i>Selesai</span></td>
@elseif ( $datas->status == "berjalan" )
  <td ><span class="bg-green" style="padding: 5px; border-radius: 5px;">Sedang Berjalan</span></td>
  @elseif ( $datas->status == "persiapan" )
  <td ><span class="bg-yellow" style="padding: 5px; border-radius: 5px;">Persiapan</span></td>
@else
  <td > {{ $datas->status }}</td>
@endif
@if(checkPermission(['superadmin']))
            <td align="center">
<a href="{{ URL('/proyek/edit_ib/') }}/{{ $datas->kd_proyek }}/{{ $datas->kode_ib }}" >
        <button class="btn btn-sm btn-raised bg-green" onclick="return" title="update" style="margin-bottom: 5px;" confirm('Yakin mau update data ?')"  type="submit">
        <i class="fa fa-edit"></i></button></a></td>
        <td align="center">
        <form action="{{action('Prj_ibController@destroy',['kode_ib' => $datas->kode_ib])}}" method="post">
         {{ csrf_field() }}
        <input name="_method" type="hidden" value="PATCH">
        <button class="btn btn-sm btn-raised btn-danger" title="delete" onclick="return confirm('Yakin mau delete data ?')" type="submit">
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
              </div>
            </section>
          </div>
</body>
 <script type="text/javascript">
  $(function() {
$("#date").datepicker();
  });
  </script>