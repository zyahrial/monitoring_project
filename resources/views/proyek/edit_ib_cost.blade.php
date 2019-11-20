<!DOCTYPE html>
<title>UPDATE BUDGET</title>
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
                     @foreach ($edit_ib_cost as $data)
                          <div class="box-body" style="text-align: left;">
            <a href="{{ URL('/proyek/add_ib/') }}/{{ $data->kd_proyek }}" class="btn btn-app" >
                <i class="fa fa-arrow-circle-left" title="BACK" style="font-size: 32px;"></i> </a>
                          </div>
                <div class="panel-heading bg-primary" style="margin-left:10px; margin-right: 10px; ">UPDATE BUDGET </div>
 
                <div class="panel-body" style="margin-left:10px; margin-right: 10px; width: 50%;">
<form action="{{ action('Prj_ibController@update_ib_cost',$data->kd_cost) }}"  method="post" enctype="multipart/form-data">
{{ csrf_field() }}      
<div class="form-group">
<input type="hidden" class="form-control" name="kd_proyek" value="{{ $data->kd_proyek }}">
<label for="exampleInputEmail1">ID COST :<span style="color: red; font-size: 24px;">*</span></label>
<input type="text" class="form-control"  id="l_activity" readonly="readonly" value="{{ $data->kd_cost }}">
<label for="exampleInputEmail1">ID IB :<span style="color: red; font-size: 24px;">*</span></label>
<div class='input-group date' style="margin-top: 5px;">
 <input type="text" class="form-control" name="kode_ib" id="l_kode_ib" autocomplete="off" readonly="readonly" value="{{ $data->kode_ib }}">
 <span class="input-group-addon" onclick="open_child('/add_ib/lookup_cost_ib/{{ $data->kd_proyek }}','Look Up','800','500'); return false;">
<span class="fa fa-ellipsis-h "></span>
</span>
</div>
                    <label for="exampleInputEmail1">KEGIATAN :</label>
<input type="text" class="form-control"  id="l_activity" readonly="readonly" value="{{ $data->activity }}">
                    <label for="exampleInputEmail1">SUB KEGIATAN :</label>
 <input type="text" class="form-control"  id="l_sub_activity" readonly="readonly" value="{{ $data->sub_activity }}">
                    <label for="exampleInputEmail1">ITEM BIAYA :</label>
<div class='input-group date' style="margin-top: 5px;">
 <input type="text" class="form-control" name="cost_activity" id="cost_activity" autocomplete="off" readonly="readonly" value="{{ $data->cost_activity }}">
</div>
                    <label for="exampleInputEmail1">BIAYA :</label>
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
<input class="form-control" type="number" name="cost" value="{{ $data->cost }}"
onkeyup="document.getElementById('format').innerHTML = formatCurrency(this.value);"  />
<span class="input-group-addon" style="background-color: black; color: white; font-weight: bold;  font-family:'digital-clock-font';">
<span  id="format"></span></span>
</div>
                   <label for="exampleInputEmail1">VOLUME :</label>
<input type="text" style="width: 10%;" maxlength="3" class="form-control" name="volume" id="volume" value="{{ $data->volume }}">
<br>
                    <label for="exampleInputEmail1">TAMBAHAN BUDGET: <text style="color : red; font-size: 10px;">( Over Budget )</text>
</label>
<script>function cost_extendCurrency(num) {
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
<input class="form-control" type="number" name="cost_extend" value="{{ $data->cost_extend }}"
onkeyup="document.getElementById('cost_extend').innerHTML = formatCurrency(this.value);"  />
<span class="input-group-addon" style="background-color: black; color: white; font-weight: bold;  font-family:'digital-clock-font';">
<span  id="cost_extend"></span></span>
</div>
                    <label for="exampleInputEmail1">KETERANGAN :</label>
                    <input type="text" class="form-control" name="note" id="note"  value="{{ $data->note }}">
                  </div>
<label for="exampleInputEmail1"> STATUS :<span style="color: red; font-size: 24px;">*</span></label>
<div class='input-group date' >
          <select  name="cost_status" class="form-control" value="{{ old('cost_status') }}">
            <option value="" class="bg-aqua">---</option>
            <option value="Approved" >Disetujui</option>
            <option value="Pending" >Pending</option>
            <option value="Not Approved" >Tidak Disetujui</option>
          </select>
</div>
          <br>
                  <button type="submit" class="btn btn-sm btn-raised btn-primary">Save</button>
                </form>
          @endforeach
                  </div>
          <br>

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
                         <td rowspan="2"><strong>TAMBAHAN BUDGET</strong></td>
                         <td rowspan="2"><strong>KETERANGAN</strong></td>
                        <td rowspan="2"><strong>STATUS</strong></td>
            <td colspan="2"></th>
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
            </section>
          </div>
</body>
 <script type="text/javascript">
  $(function() {
$("#date").datepicker();
  });
  </script>