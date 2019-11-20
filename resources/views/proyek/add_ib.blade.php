 <!DOCTYPE html>
<title>ADD IB</title>

<body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
      <section class="wrapper">
        @include('partials/header2')
          @include('partials.sidebar')
  <div class="content-wrapper">
           @if (count($errors) > 0)
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
        @include('alert.flash-message')
            <section class="panel">
              <div style="width: 100%" style="padding-bottom: 100px;">
                      @foreach ($proyek as $data)
                  <div class="box-body" style="text-align: left;">
            <a href="{{ URL('/proyek/detail/') }}/{{ $data->kd_proyek }}" class="btn btn-app" >
                <i class="fa fa-arrow-circle-left" title="BACK TO BASE" style="font-size: 32px;"></i> </a>
                </div>
                <div class="panel-body" style="padding-top: 35px; margin-left:10px; margin-right: 10px; width: 45%; float: left;">
  <div class="panel-heading bg-primary">Tambah Kegiatan</div><br>
     <form action="{{ action('Prj_ibController@store', $data->kd_proyek) }}" method="post" class="form" align="left"> 
              {{ csrf_field() }}      
                  <div class="form-group">
                     <label for="exampleInputEmail1">ID PROYEK :<span style="color: red; font-size: 24px;">*</span></label>
                    <input type="text" class="form-control" name="kd_proyek" id="kd_proyek" value="{{ $data->kd_proyek}}" readonly="readonly">
                    <label for="exampleInputEmail1">ID :<span style="color: red; font-size: 24px;">*</span></label>
<div class='input-group date' style="margin-top: 5px;">
 <input type="text" class="form-control" name="kd_activity" id="kd_activity" autocomplete="off" readonly="readonly" value="{{ old('kd_activity') }}">
 <span class="input-group-addon" onclick="open_child('/add_ib/lookup_activity','Look Up','800','500'); return false;">
<span class="fa fa-ellipsis-h "></span>
</span>
</div>
                    <label for="exampleInputEmail1">KEGIATAN :</label>
                    <input type="text" class="form-control" name="activity" id="activity" readonly="readonly" value="{{ old('activity') }}">
                    <label for="exampleInputEmail1">SUB KEGIATAN :</label>
                    <input type="text" class="form-control" name="sub_activity" id="sub_activity" readonly="readonly" value="{{ old('sub_activity') }}">
                    <label for="exampleInputEmail1">DUE DATE:<span style="color: red; font-size: 24px;">*</span></label>
<div class='input-group date' style="width: 70%; margin-top: 5px">
<input name="date" class="input-group datepicker form-control" date="" data-date-format="yyyy-mm-dd" type="text"  placeholder="Target Activity" autocomplete="off" value="{{ old('date') }}" id="date" readonly >
<span class="input-group-addon" id="date">
<span class="fa fa-calendar"></span></span>
</div>
<label for="exampleInputEmail1">STATUS :<span style="color: red; font-size: 24px;">*</span></label>
<div class='input-group date' >
          <select  name="status" class="form-control" value="{{ old('status') }}">
            <option value="" class="bg-aqua">---</option>
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
          @foreach ($proyek as $data)
                <div class="panel-body" style=" margin-left:10px; margin-right: 10px; width: 45%; float: left;">
  <div class="panel-heading bg-primary"">Tambah Budget</div>
  <br>    
     <form action="{{ action('Prj_ibController@store_cost', $data->kd_proyek) }}" method="post" class="form" align="left"> 
              {{ csrf_field() }}      
                  <div class="form-group">
                    <label for="exampleInputEmail1">ID IB :<span style="color: red; font-size: 24px;">*</span></label>
<div class='input-group date' style="margin-top: 5px;">
 <input type="text" class="form-control" name="kode_ib" id="l_kode_ib" autocomplete="off" readonly="readonly" value="{{ old('kode_ib') }}">
 <span class="input-group-addon" onclick="open_child('/add_ib/lookup_cost_ib/{{ $data->kd_proyek }}','Look Up','800','500'); return false;">
<span class="fa fa-ellipsis-h "></span>
</span>
</div>
                    <label for="exampleInputEmail1">KEGIATAN :</label>
                    <input type="text" class="form-control"  id="l_activity" readonly="readonly" value="{{ old('activity') }}">
                    <label for="exampleInputEmail1">SUB KEGIATAN :</label>
                    <input type="text" class="form-control"  id="l_sub_activity" readonly="readonly" value="{{ old('sub_activity') }}">
<label for="exampleInputEmail1">ITEM BIAYA :<span style="color: red; font-size: 24px;">*</span></label>
<div class='input-group date' style="margin-top: 5px;">
 <input type="text" class="form-control" name="cost_activity" id="cost_activity" autocomplete="off" readonly="readonly" value="{{ old('cost_activity') }}">
 <span class="input-group-addon" onclick="open_child('/proyek/lib/lookup_item_biaya','Look Up','800','500'); return false;">
<span class="fa fa-ellipsis-h "></span>
</span>
</div>
<label for="exampleInputEmail1">BIAYA :<span style="color: red; font-size: 24px;">*</span></label>
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
<input class="form-control" type="number" name="cost" value="{{ old('cost') }}"
onkeyup="document.getElementById('format').innerHTML = formatCurrency(this.value);"  />
<span class="input-group-addon" style="background-color: black; color: white; font-weight: bold;  font-family:'digital-clock-font';">
<span  id="format"></span></span>
</div>

                  <label for="exampleInputEmail1">VOLUME :<span style="color: red; font-size: 24px;">*</span></label>
<input type="text" style="width: 10%;" maxlength="3" class="form-control" name="volume" id="volume" value="{{ old('volume') }}">
<input type="hidden" class="form-control" name="cost_status" id="volume" value="Pending">
                  </div>
                  <button type="submit" class="btn btn-sm btn-raised btn-primary">Save</button>
                </form>
</div>
</div>
          @endforeach
<br>
<div class="panel-body">
<table class="table table-bordered table-hover" style="font-size:12px; color: black; padding-top: 20px;">
      <tr>
        <thead class="bg-aqua" style=" color: white;">
        <th colspan="10" class="bg-primary">DAFTAR KEGIATAN </th><tr></tr>
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
        <button class="btn btn-sm btn-raised bg-green" onclick="return" title="update" style="margin-bottom: 5px;" onclick="return confirm('Yakin mau update data ?')"  type="submit">
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
          <br>
<table class="table table-bordered table-hover" style="font-size:12px; color: black;">
    <thead class="bg-aqua">
      <th colspan="15" class="bg-primary">BUDGET</th>
      <tr>
      <td rowspan="2" ><strong>NO</strong></td>
                    <td rowspan="2" ><strong>KD COST</strong></td>
            <td rowspan="2" ><strong>ID IB</strong></td>
            <td rowspan="2" ><strong>ID PRJ</strong></td>
            <td rowspan="2" ><strong>ID ACT</strong></td>
            <td rowspan="2"><strong>KEGIATAN</strong></td>
            <td rowspan="2"><strong>SUB KEGIATAN</strong></td>
            <td rowspan="2"><strong>ITEM BIAYA</strong></td>
                        <td rowspan="2"><strong>BIAYA</strong></td>
            <td rowspan="2"><strong>VOLUME</strong></td>
                         <td rowspan="2"><strong>TAMBAHAN BIAYA</strong></td>
                         <td rowspan="2"><strong>KETERANGAN</strong></td>
                        <td rowspan="2"><strong>STATUS</strong></td>
            <tr>
            </thead>
        @php(   $no = 1 {{-- buat nomor urut --}}  )
        {{-- loop all legalitas --}}
        @foreach ($data_cost as $datas)

                    <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $datas->kd_cost }} </td>
            <td>{{ $datas->kode_ib }} </td>
            <td>{{ $datas->kd_proyek }} </td>
            <td>{{ $datas->kd_activity }} </td>
            <td>{{ $datas->activity }} </td>
            <td>{{ $datas->sub_activity }} </td>
                                    <td>{{ $datas->cost_activity }} </td>
                                                                        <td>{{ $datas->cost }} </td>
                                    <td>{{ $datas->volume }} </td>
            <td>{{ $datas->cost_extend }} </td>
            <td>{{ $datas->note }} </td>
            @if ( $datas->cost_status == "Approved" )
  <td class="bg-success"></i> Disetujui</td>
@elseif ( $datas->cost_status == "Pending" )
  <td class="bg-warning"> Belum Disetujui</td>
  @else
  <td class="bg-danger" ><i class="bg-danger" style="font-size: 16px;"></i> {{ $datas->cost_status }}</td>
@endif
@if(checkPermission(['superadmin']))
<td align="center"><a href="{{ URL('/proyek/edit_ib_cost/') }}/{{ $datas->kd_proyek }}/{{ $datas->kode_ib }}/{{ $datas->kd_cost }}" >
        <button class="btn btn-sm btn-raised bg-green" onclick="return" title="update" style="margin-bottom: 5px;" confirm('Yakin mau update data ?')"  type="submit">
        <i class="fa fa-edit"></i></button></a></td>
        <td align="center">
        <form action="{{action('Prj_ibController@destroy_cost',['kd_cost' => $datas->kd_cost])}}" method="post">
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