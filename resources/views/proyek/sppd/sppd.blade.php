 <!DOCTYPE html>
<title>SPPD</title>
<head>

</head>
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
      <section class="panel">
                @foreach ($proyek as $data)
                          <div class="box-body" style="text-align: left;">
            <a href="{{ URL('/proyek/detail/') }}/{{ $data->kd_proyek }}" class="btn btn-app" >
                <i class="fa fa-arrow-circle-left" title="BACK" style="font-size: 32px;"></i> </a>
                          </div>
          <div class="panel-body" style="width: 80%;">
  <div class="panel-heading bg-primary">SPPD</div>
  <br>   
  <form action="{{ action('Prj_sppdController@store', $data->kd_proyek) }}" method="post" class="form" align="left"> 
              {{ csrf_field() }} 

   <input type="hidden" style="width: 10%" class="form-control"  name="kd_proyek" autocomplete="off" readonly="readonly" value="{{ $data->kd_proyek }}">     
                  <div class="form-group">
                    <label for="exampleInputEmail1">COST 1:<span style="color: red; font-size: 24px;">*</span></label>
<div class='input-group date' style="margin-top: 5px;">
   <input type="text" style="width: 10%" class="form-control" placeholder="Id Cost" name="kd_cost1" id="l_kd_cost1" autocomplete="off" readonly="readonly" value="{{ old('kd_cost1') }}">
  <input type="text" class="form-control"style="width: 20%; " placeholder="Cost Activity" name="cost_activity1" id="cost_activity1" readonly="readonly" value="{{ old('cost_activity1') }}">
  <input type="text" class="form-control"style="width: 20%; " placeholder="Biaya" name="cost1" id="cost1" readonly="readonly" value="{{ old('cost1') }}">
  <input type="text" class="form-control"style="width: 10%; " placeholder="Volume" name="volume1" id="volume1" readonly="readonly" value="{{ old('volume1') }}">
    <input type="text" class="form-control"style="width: 20%; " placeholder="Biaya Tambahan" name="cost_extend1"  id="cost_extend1" readonly="readonly" value="{{ old('cost_extend1') }}">
  <input type="text" class="form-control"style="width: 20%; " placeholder="Total Biaya" name="total_cost1"  id="total_cost1" readonly="readonly" value="{{ old('total_cost1') }}">

 <span class="input-group-addon" onclick="open_child('/sppd/lookup1/cost/{{ $data->kd_proyek }}','Look Up','1500','500'); return false;">
<span class="fa fa-ellipsis-h "></span>
</span>
</div>
<br>
   <label for="exampleInputEmail1">COST 2:</label>
   <div class='input-group date' style="margin-top: 5px;">
   <input type="text" style="width: 10%" class="form-control" placeholder="Id Cost" name="kd_cost2" id="l_kd_cost2" autocomplete="off" readonly="readonly" value="{{ old('kd_cost2') }}">
  <input type="text" class="form-control"style="width: 20%; " placeholder="Cost Activity" name="cost_activity2" id="cost_activity2" readonly="readonly" value="{{ old('cost_activity2') }}">
  <input type="text" class="form-control"style="width: 20%; " placeholder="Biaya" name="cost2" id="cost2" readonly="readonly" value="{{ old('cost2') }}">
  <input type="text" class="form-control"style="width: 10%; " placeholder="Volume" name="volume2" id="volume2" readonly="readonly" value="{{ old('volume2') }}">
    <input type="text" class="form-control"style="width: 20%; " placeholder="Biaya Tambahan" name="cost_extend2" id="cost_extend2" readonly="readonly" value="{{ old('cost_extend2') }}">
  <input type="text" class="form-control"style="width: 20%; " placeholder="Total Biaya" name="total_cost2" id="total_cost2" readonly="readonly" value="{{ old('total_cost2') }}">
   <span class="input-group-addon" onclick="open_child('/sppd/lookup2/cost/{{ $data->kd_proyek }}','Look Up','1500','500'); return false;">
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
  <span class="input-group-addon" onclick="open_child('/sppd/lookup3/cost/{{ $data->kd_proyek }}','Look Up','1500','500'); return false;">
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
  <span class="input-group-addon" onclick="open_child('/sppd/lookup4/cost/{{ $data->kd_proyek }}','Look Up','1500','500'); return false;">
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
      <span class="input-group-addon" onclick="open_child('/sppd/lookup5/cost/{{ $data->kd_proyek }}','Look Up','1500','500'); return false;">
<span class="fa fa-ellipsis-h "></span>
</span>
</div>
<br>
<label for="exampleInputEmail1">NOMOR SPPD :<span style="color: red; font-size: 24px;">*</span></label>
<input type="text" class="form-control" style="width: 30%; margin-top: 5px;" id="no_sppd" name="no_sppd"  value="{{ old('no_sppd')}}">
<br>
 <label for="exampleInputEmail1">NILAI SPPD : <span style="color: red; font-size: 24px;">*</span></label>
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
<input class="form-control" type="number" name="nilai_sppd" value="{{ old('nilai_sppd') }}"
onkeyup="document.getElementById('nilai_sppd').innerHTML = formatCurrency(this.value);"  />
<span class="input-group-addon" style="background-color: black; color: white; font-weight: bold;  font-family:'digital-clock-font';">
<span  id="nilai_sppd"></span></span>
</div>
<br>
   <label for="exampleInputEmail1">TANGGAL PENGAJUAN SPPD:<span style="color: red; font-size: 24px;">*</span></label>
<div class='input-group date' style="width: 30%; margin-top: 5px">
<input name="date" class="input-group datepicker form-control" date=""  data-date-format="yyyy-mm-dd" type="text"  placeholder="Target Activity" autocomplete="off" value="{{ old('date')}}"  id="date" readonly >
<span class="input-group-addon" id="date">
<span class="fa fa-calendar"></span></span>
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
<label for="exampleInputEmail1">TUJUAN :<span style="color: red; font-size: 24px;">*</span></label>
<input type="text" class="form-control"  id="tujuan" name="tujuan"  value="{{ old('tujuan')}}">
<br>
<label for="exampleInputEmail1">KEPERLUAN :<span style="color: red; font-size: 24px;">*</span></label>
<input type="text" class="form-control"  id="keperluan" name="keperluan"  value="{{ old('keperluan')}}">
<br>
<label for="exampleInputEmail1">TANGGAL BERANGKAT:<span style="color: red; font-size: 24px;">*</span></label>
<div class='input-group date' style="width: 30%; margin-top: 5px">
<input name="tanggal_berangkat" class="input-group datepicker form-control" date=""  data-date-format="yyyy-mm-dd" type="text"  placeholder="Target Activity" autocomplete="off" value="{{ old('tanggal_berangkat')}} "  id="tanggal_berangkat"  readonly >
<span class="input-group-addon" id="tanggal_berangkat">
<span class="fa fa-calendar"></span></span>
</div>
<br>
<label for="exampleInputEmail1">TANGGAL KEMBALI:<span style="color: red; font-size: 24px;">*</span></label>
<div class='input-group date' style="width: 30%; margin-top: 5px">
<input name="tanggal_kembali" class="input-group datepicker form-control" date=""  data-date-format="yyyy-mm-dd" type="text"  placeholder="Target Activity" autocomplete="off" value="{{ old('tanggal_kembali')}} "  id="tanggal_kambali" readonly >
<span class="input-group-addon" id="tanggal_berangkat">
<span class="fa fa-calendar"></span></span>
</div>
<label for="exampleInputEmail1">KETERANGAN :</label>
<textarea type="text" class="form-control" name="note" id="note"  value="{{ old('note') }}"></textarea>
</div>
<button type="submit" class="btn btn-sm btn-raised btn-primary">Save</button>
                </form>
</div>
          @endforeach
<br>
<div class="panel-heading bg-primary" style="margin-left:10px; margin-right: 10px; ">
          @foreach ($proyek as $datas)

          @php(@$kd_proyek = $datas->kd_proyek)
          @endforeach

       @php(   $no = 1 {{-- buat nomor urut --}}  )
        {{-- loop all legalitas --}}
        @foreach ($budget as $datas)
        @php($kd_proyek = $datas->kd_proyek)
@php( @$cost_total = ($datas->cost * $datas->volume) + $datas->cost_extend )
@php( @$total_budget += $cost_total )
  @php (@$ftotal_budget = (number_format($total_budget,0,",",".").""))
  @endforeach
  
SPPD : {{ $kd_proyek }}<br>
TOTAL BUDGET : {{ $ftotal_budget }}
</div><div class="panel-body">
<table class="table table-bordered table-hover" style="font-size:12px; color: black;">
    <thead class="bg-aqua">
      <tr>
                            <td rowspan="2" ><strong>NO</strong></td>
                    <td rowspan="2" ><strong>ID SPPD</strong></td>
            <td rowspan="2" ><strong>PEMOHON</strong></td>
                        <td rowspan="2" ><strong>TUJUAN</strong></td>
                        <td rowspan="2" ><strong>BERANGKAT/<br>KEMBALI</strong></td>
            <td rowspan="2" ><strong>KEPERLUAN</strong></td>
            <td rowspan="2" ><strong>ID COST</strong></td>
            <td rowspan="2" style="width: 10%;"><strong>SPPD</strong></td>
            <td rowspan="2" style="width: 10%;"><strong>PJPD</strong></td>
            <td rowspan="2"><strong>KETERANGAN</strong></td>
            <td rowspan="2"><strong>STATUS</strong></td>

            <tr>
            </thead>
        @php(   $no = 1 {{-- buat nomor urut --}}  )
        {{-- loop all legalitas --}}
        @foreach ($data_sppd as $datas)
@php (@$fnilai_pjpd = (number_format($datas->nilai_pjpd,0,",",".").""))

@php( @$total_sppd += $datas->nilai_sppd )

@php($date1=date_create($datas->date))
@php($today = date("Y-m-d"))
@php($date2=date_create($today))
@php($diff=date_diff($date1,$date2))

                    <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $datas->kd_sppd }} </td>
            <td>{{ $datas->nama }} <br>{{ $datas->email }}<br>{{ $datas->jabatan }} </td>
                      <td>{{ $datas->tujuan }} </td>

            <td>{{ $datas->tanggal_berangkat }} <br>{{ $datas->tanggal_kembali }} </td>
          <td>{{ $datas->keperluan }} </td>
          <td>{{ $datas->kd_cost1 }}, {{ $datas->kd_cost2 }}, {{ $datas->kd_cost3 }}, {{ $datas->kd_cost4 }}, {{ $datas->kd_cost5 }} </td>
                    @php (@$fnilai_sppd = (number_format($datas->nilai_sppd,0,",",".").""))
            <td><strong>No. {{ $datas->no_sppd }}<br>{{ $datas->date }}<br>Rp. {{ $fnilai_sppd  }}</strong></td>
            <td><strong>No. {{ $datas->no_pjpd }}<br>{{ $datas->date_pjpd }}<br>Rp. {{ $fnilai_pjpd }}</strong><br></td>

            <td>{{ $datas->note }}  </td>

                        @if ( $datas->status_sppd == "open" AND $diff->format("%R%a") > 14 )
          <td class="bg-danger" align="center" style="width: 20px;">Belum Pertanggungjawaban {{ $diff->format("%R%a") }} Hari</td>
            @elseif ( $datas->status_sppd == "open" )
            <td class="bg-warning" align="center" style="width: 20px;">Belum Pertanggungjawaban<br>
            @elseif ( $datas->status_sppd == "close" )
            <td class="bg-success" align="center" style="width: 20px;">Sudah Pertanggungjawaban<br>
            @endif

        <td align="center"><a href="{{ URL('/proyek/pertanggungjawaban_sppd/') }}/{{ $datas->kd_proyek }}/{{ $datas->kd_sppd }}" >
        <button class="btn btn-sm btn-raised btn-info" onclick="return" title="Pertanggungjawaban" style="margin-bottom: 5px;" confirm('Yakin mau ubah data ?')"  type="submit">
        <i class="fa fa-edit"></i></button></a>
        @if(checkPermission(['superadmin']))
        <br>
        <form action="{{action('Prj_sppdController@destroy',['kd_sppd' => $datas->kd_sppd])}}" method="post">
         {{ csrf_field() }}
        <input name="_method" type="hidden" value="PATCH">
        <button class="btn btn-sm btn-raised btn-danger" title="delete"  onclick="return confirm('Yakin mau delete data ?')" type="submit">
        <i class="fa fa-trash-o"></i> 
        </button>
        </form>
</td>
<td align="center"><a href="{{ URL('/sppd/print/') }}/{{ $datas->kd_sppd }}" target="_blank">
        <button class="btn btn-sm btn-raised bg-blue" onclick="return" title="Print" style="margin-bottom: 5px;" confirm('Yakin mau update data ?')"  type="submit">
        <i class="fa fa-print"></i></button></a></td>
        @endif
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
   <script type="text/javascript">
  $(function() {
$("#tanggal_berangkat").datepicker();
  });
  </script>
   <script type="text/javascript">
  $(function() {
$("#tanggal_kambali").datepicker();
  });
  </script>