 <!DOCTYPE html>
<title>UUDP</title>
</head>
<body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
<section chlass="wrapper">
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
      <section class="panel">
                @foreach ($proyek as $data)
                          <div class="box-body" style="text-align: left;">
            <a href="{{ URL('/proyek/detail/') }}/{{ $data->kd_proyek }}" class="btn btn-app" >
                <i class="fa fa-arrow-circle-left" title="BACK" style="font-size: 32px;"></i> </a>
                          </div>
          <div class="panel-body" style="width: 80%;">
  <div class="panel-heading bg-primary">TAMBAH UUDP</div>
  <br>    
     <form action="{{ action('Prj_uudpController@store', $data->kd_proyek) }}" method="post" class="form" align="left"> 
              {{ csrf_field() }} 

   <input type="hidden" style="width: 10%" class="form-control"  name="kd_proyek" autocomplete="off" readonly="readonly" value="{{ $data->kd_proyek }}">     
                  <div class="form-group">
<label for="exampleInputEmail1">COST 1:<span style="color: red; font-size: 24px;">*</span></label>
<div class='input-group date' style="margin-top: 5px;">
   <input type="text" style="width: 10%" class="form-control" placeholder="Id Cost" name="kd_cost1"  id="l_kd_cost1" autocomplete="off" readonly="readonly" value="{{ old('kd_cost1') }}" >
  <input type="text" class="form-control" style="width: 20%; " placeholder="Cost Activity" name="cost_activity1" id="cost_activity1" readonly="readonly" value="{{ old('cost_activity1') }}">
  <input type="text" readonly="readonly" value="{{ old('cost1') }}" class="form-control" style="width: 20%; " placeholder="Biaya" name="cost1" id="cost1" >
  <input type="text" class="form-control"style="width: 10%; " placeholder="Volume" name="volume1" id="volume1" readonly="readonly" value="{{ old('volume1') }}">
    <input type="text" class="form-control" style="width: 20%; " placeholder="Biaya Tambahan" name="cost_extend1"  id="cost_extend1" readonly="readonly" value="{{ old('cost_extend1') }}">
  <input type="text" class="form-control" style="width: 20%;" placeholder="Total Biaya" name="total_cost1"  id="total_cost1" readonly="readonly" value="{{ old('total_cost1') }} ">
 <span class="input-group-addon" onclick="open_child('/uudp/lookup1/cost/{{ $data->kd_proyek }}','Look Up','1500','500'); return false;">
<span class="fa fa-ellipsis-h "></span>
</span>
</div>
<br>
   <label for="exampleInputEmail1">COST 2:</label>
   <div class='input-group date' style="margin-top: 5px;">
   <input type="text" style="width: 10%" class="form-control" placeholder="Id Cost" name="kd_cost2" id="l_kd_cost2" autocomplete="off" readonly="readonly" value="{{ old('kd_cost2') }}">
  <input type="text" class="form-control" style="width: 20%; " placeholder="Cost Activity" name="cost_activity2" id="cost_activity2" readonly="readonly" value="{{ old('cost_activity2') }}">
  <input type="text" readonly="readonly" class="form-control" style="width: 20%; " placeholder="Biaya" name="cost2" id="cost2" value="{{ old('cost2') }}">
  <input type="text" class="form-control"style="width: 10%; " placeholder="Volume" name="volume2" id="volume2" readonly="readonly" value="{{ old('volume2') }}">
    <input type="text" class="form-control"style="width: 20%; " placeholder="Biaya Tambahan" name="cost_extend2" id="cost_extend2" readonly="readonly" value="{{ old('cost_extend2') }}">
  <input type="text" class="form-control" style="width: 20%; " placeholder="Total Biaya" name="total_cost2" id="total_cost2" readonly="readonly" value="{{ old('total_cost2') }}">
   <span class="input-group-addon" onclick="open_child('/uudp/lookup2/cost/{{ $data->kd_proyek }}','Look Up','1500','500'); return false;">
<span class="fa fa-ellipsis-h "></span>
</span>
</div>
<br>
   <label for="exampleInputEmail1">COST 3:</label>
   <div class='input-group date' style="margin-top: 5px;">
       <input type="text" style="width: 10%" class="form-control" placeholder="Id Cost" name="kd_cost3" id="l_kd_cost3" autocomplete="off" readonly="readonly" value="{{ old('kd_cost3') }}">
  <input type="text" class="form-control"style="width: 20%; " placeholder="Cost Activity" id="cost_activity3" name="cost_activity3"  readonly="readonly" value="{{ old('cost_activity3') }}">
  <input type="text" class="form-control"style="width: 20%; " placeholder="Biaya" id="cost3" name="cost3" readonly="readonly" value="{{ old('cost3') }}">
  <input type="text" class="form-control"style="width: 10%; " placeholder="Volume" name="volume3" id="volume3" readonly="readonly" value="{{ old('volume3') }}">
    <input type="text" class="form-control"style="width: 20%; " placeholder="Biaya Tambahan" name="cost_extend3" id="cost_extend3" readonly="readonly" value="{{ old('cost_extend3') }}">
  <input type="text" class="form-control"style="width: 20%; " placeholder="Total Biaya" name="total_cost3" id="total_cost3" readonly="readonly" value="{{ old('total_cost3') }}">   
  <span class="input-group-addon" onclick="open_child('/uudp/lookup3/cost/{{ $data->kd_proyek }}','Look Up','1500','500'); return false;">
<span class="fa fa-ellipsis-h "></span>
</span>
</div>
<br>
   <label for="exampleInputEmail1">COST 4:</label>
   <div class='input-group date' style="margin-top: 5px;">
       <input type="text" style="width: 10%" class="form-control" placeholder="Id Cost" name="kd_cost4" id="l_kd_cost4" autocomplete="off" readonly="readonly" value="{{ old('kd_cost4') }}">
  <input type="text" class="form-control"style="width: 20%; " placeholder="Cost Activity" name="cost_activity4" id="cost_activity4" readonly="readonly" value="{{ old('cost_activity4') }}">
  <input type="text" class="form-control"style="width: 20%; " placeholder="Biaya" name="cost4" id="cost4" readonly="readonly" value="{{ old('cost4') }}">
  <input type="text" class="form-control"style="width: 10%; " placeholder="Volume" name="volume4" id="volume4" readonly="readonly" value="{{ old('volume4') }}">
    <input type="text" class="form-control"style="width: 20%; " placeholder="Biaya Tambahan" name="cost_extend4" id="cost_extend4" readonly="readonly" value="{{ old('cost_extend4') }}">
  <input type="text" class="form-control"style="width: 20%; " placeholder="Total Biaya" name="total_cost4" id="total_cost4" readonly="readonly" value="{{ old('total_cost4') }}">
  <span class="input-group-addon" onclick="open_child('/uudp/lookup4/cost/{{ $data->kd_proyek }}','Look Up','1500','500'); return false;">
<span class="fa fa-ellipsis-h "></span>
</span>
</div>
  <br>
   <label for="exampleInputEmail1">COST 5:</label>
   <div class='input-group date' style="margin-top: 5px;">
   <input type="text" style="width: 10%" class="form-control" placeholder="Id Cost" name="kd_cost5" id="l_kd_cost5" autocomplete="off" readonly="readonly" value="{{ old('kd_cost5') }}">
  <input type="text" class="form-control"style="width: 20%; " placeholder="Cost Activity" name="cost_activity5" id="cost_activity5" readonly="readonly" value="{{ old('cost_activity5') }}">
  <input type="text" class="form-control"style="width: 20%; " placeholder="Biaya" name="cost5" id="cost5" readonly="readonly" value="{{ old('cost5') }}">
  <input type="text" class="form-control"style="width: 10%; " placeholder="Volume" name="volume5" id="volume5" readonly="readonly" value="{{ old('volume5') }}">
    <input type="text" class="form-control"style="width: 20%; " placeholder="Biaya Tambahan" name="cost_extend5" id="cost_extend5" readonly="readonly" value="{{ old('cost_extend5') }}">
  <input type="text" class="form-control"style="width: 20%; " placeholder="Total Biaya" name="total_cost5" id="total_cost5" readonly="readonly" value="{{ old('total_cost5') }}">
      <span class="input-group-addon" onclick="open_child('/uudp/lookup5/cost/{{ $data->kd_proyek }}','Look Up','1500','500'); return false;">
<span class="fa fa-ellipsis-h "></span>
</span>
</div>
<br>
<label for="exampleInputEmail1">NAMA PEMOHON :<span style="color: red; font-size: 24px;">*</span></label>
   <div class='input-group date' style="width: 30%; margin-top: 5px">
    <input type="hidden" class="form-control"  id="kode" name="pemohon" readonly="readonly" >
<input type="text" class="form-control"  id="nama" readonly="readonly" >
 <span class="input-group-addon" onclick="open_child('/pem_tender/lookup/lookup_karyawan','Look Up','1500','500'); return false;">
<span class="fa fa-ellipsis-h "></span>
</span>
</div>
<input type="text" class="form-control" style="width: 30%;" id="email" readonly="readonly"  placeholder="">
<input type="text" class="form-control" style="width: 30%;" id="jabatan" readonly="readonly" placeholder="">
<br>
    <label for="exampleInputEmail1">NOMOR UUDP :<span style="color: red; font-size: 24px;">*</span></label>
    <input type="text" class="form-control"style="width: 30%; " placeholder="Nomor UUDP" name="no_uudp" id="no_uudp" value="{{ old('no_uudp') }}">
<br>
    <label for="exampleInputEmail1">TANGGAL UUDP :<span style="color: red; font-size: 24px;">*</span></label>
<div class='input-group date' style="width: 30%; margin-top: 5px">
<input name="date" class="input-group datepicker form-control" date=""  data-date-format="yyyy-mm-dd" type="text"  placeholder="Target Activity" autocomplete="off" value="{{ old('date')}} "  id="date" readonly >
<span class="input-group-addon" id="date">
<span class="fa fa-calendar"></span></span>
</div>
<br>
 <label for="exampleInputEmail1">NILAI UUDP : <span style="color: red; font-size: 24px;">*</span></label>
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
<div class='input-group date' style="width: 30%; margin-top: 5px">
<input class="form-control" type="number" name="nilai_uudp" value="{{ old('nilai_uudp') }}"
onkeyup="document.getElementById('nilai_uudp').innerHTML = formatCurrency(this.value);"  />
<span class="input-group-addon" style="background-color: black; color: white; font-weight: bold;  font-family:'digital-clock-font';">
<span  id="nilai_uudp"></span></span>
</div>
<br>
<label for="exampleInputEmail1">KETERANGAN :</label>
<textarea type="text" class="form-control" name="note" id="note"  value="{{ old('note') }}"></textarea>
</div>
<button type="submit" class="btn btn-sm btn-raised btn-primary">Save</button>
                </form>
</div>
          @endforeach
<br>
<br>
        @foreach ($proyek as $data)
        @php(@$kd_proyek = $data->kd_proyek)
          @endforeach
        @foreach ($budget as $datas)
@php( @$cost_total = ($datas->cost * $datas->volume) + $datas->cost_extend )
@php( @$total_budget += $cost_total )
  @php (@$ftotal_budget = (number_format($total_budget,0,",",".").""))
  @endforeach

<div class="panel-heading bg-primary" style="margin-left:10px; margin-right: 10px; ">
UUDP : {{ @$kd_proyek }}<br>
TOTAL BUDGET : {{ @$ftotal_budget }}
</div>
<div class="panel-body">
<table class="table table-bordered table-hover" style="font-size:12px; color: black;">
    <thead class="bg-aqua">

      <tr>
                    <td rowspan="2" ><strong>NO</strong></td>
                    <td rowspan="2" ><strong>ID</strong></td>
            <td rowspan="2" ><strong>PEMOHON</strong></td>
            <td rowspan="2" ><strong>ID PRJ</strong></td>
            <td rowspan="2" ><strong>ID COST</strong></td>
<td rowspan="2" style="width: 10%"><strong>UUDP</strong></td>
          <td rowspan="2" style="width: 10%;"><strong>UUPJ</strong></td>
                        <td rowspan="2"><strong>STATUS</strong></td>
            <td rowspan="2"><strong>KETERANGAN</strong></td>

            <tr>
            </thead>
        @php(   $no = 1 {{-- buat nomor urut --}}  )
        {{-- loop all legalitas --}}
        @foreach ($data_uudp as $datas)
  @php (@$fnilai_uudp = (number_format($datas->nilai_uudp,0,",",".").""))
    @php (@$fnilai_upj = (number_format($datas->nilai_upj,0,",",".").""))

@php( @$total_uudp += $datas->nilai_uudp )

@php($date1=date_create($datas->date))
@php($today = date("Y-m-d"))
@php($date2=date_create($today))
@php($diff=date_diff($date1,$date2))

            <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $datas->kd_uudp }} </td>
            <td>{{ $datas->nama }} <br> {{ $datas->email }}</td>
            <td>{{ $datas->kd_proyek }} </td>
            <td>{{ $datas->kd_cost1 }}, {{ $datas->kd_cost2 }}, {{ $datas->kd_cost3 }}, {{ $datas->kd_cost4 }}, {{ $datas->kd_cost5 }}  </td>
            <td><strong>No. {{ $datas->no_uudp }}<br>{{ $datas->date }}<br>Rp. {{ $fnilai_uudp }}</strong></td>
            <td><strong>No. {{ $datas->no_upj }}<br>{{ $datas->date_upj }}<br>Rp. {{ $fnilai_upj }}</strong></td>
            @if ( $datas->status_uudp == "open" AND $diff->format("%R%a") > 14 )
          <td class="bg-danger" align="center" style="width: 20px;">Belum Pertanggungjawaban {{ $diff->format("%R%a") }} Hari</td>
            @elseif ( $datas->status_uudp == "open" )
            <td class="bg-warning" align="center" style="width: 20px;">Belum Pertanggungjawaban<br>
            @elseif ( $datas->status_uudp == "close" )
            <td class="bg-success" align="center" style="width: 20px;">Sudah Pertanggungjawaban<br>
            @endif
            <td>{{ $datas->note }} </td>
           </td>

                      <td align="center"><a href="{{ URL('/proyek/pertanggungjawaban_uudp/') }}/{{ $datas->kd_proyek }}/{{ $datas->kd_uudp }}" >
        <button class="btn btn-sm btn-raised btn-info" onclick="return" title="Pertanggungjawaban" style="margin-bottom: 5px;" onclick="return confirm('Yakin mau ubah data ?')"  type="submit">
        <i class="fa fa-edit"></i></button></a>
        @if(checkPermission(['superadmin']))

        <br>
        <form action="{{action('Prj_uudpController@destroy',['kd_uudp' => $datas->kd_uudp])}}" method="post">
         {{ csrf_field() }}
        <input name="_method" type="hidden" value="PATCH">
        <button class="btn btn-sm btn-raised btn-danger" title="delete"  onclick="return confirm('Yakin mau delete data ?')" type="submit">
        <i class="fa fa-trash-o"></i> 
        </button>
        </form>
<td>
<a href="{{ URL('/uudp/print/') }}/{{ $datas->kd_uudp }}" target="_blank">
   <button class="btn btn-sm btn-raised bg-blue" onclick="return" title="Print" style="margin-bottom: 5px;"type="submit">
        <i class="fa fa-print"></i></button></a></td>
</td>
        @endif
@endforeach
   </tbody>
</table>
              </div>
            </section>
          </div>
   </section>
             </div>
</section>

</body>
   <script type="text/javascript">
  $(function() {
$("#date").datepicker();
  });
  </script>
</html>