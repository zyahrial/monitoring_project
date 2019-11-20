 <!DOCTYPE html>
<title>PERTANGGUNGJAWABAN SPPD</title>

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
      @foreach ($edit_sppd as $data)
      <div class="box-body" style="text-align: left;">
      <a href="{{ URL('/proyek/sppd/') }}/{{ $data->kd_proyek }}" class="btn btn-app" >
      <i class="fa fa-arrow-circle-left" title="BACK" style="font-size: 32px;"></i> </a>
                          </div>
          <div class="panel-body" style="width: 80%;">
  <div class="panel-heading bg-primary">PERTANGGUNGJAWABAN SPPD</div>
  <br>    
 <form action="{{ action('Prj_sppdController@update',$data->kd_sppd) }}"  method="post" enctype="multipart/form-data">
{{ csrf_field() }}  
<div class="form-group">
 <br>
 <div style="border: 1px solid black; padding: 5px;">
    <label for="exampleInputEmail1">ID PROYEK :<span style="color: red; font-size: 24px;">*</span></label>
    <input type="text" class="form-control"style="width: 30%; " placeholder="" name="kd_proyek" id="kd_proyek" value="{{ $data->kd_proyek }}" readonly="readonly">
    <label for="exampleInputEmail1">ID SPPD :<span style="color: red; font-size: 24px;">*</span></label>
    <input type="text" class="form-control"style="width: 30%; " placeholder="" value="{{ $data->kd_sppd }}" readonly="readonly">
     <label for="exampleInputEmail1">NAMA PEMOHON :<span style="color: red; font-size: 24px;">*</span></label>
    <input type="text" class="form-control"style="width: 30%; " placeholder="" value="{{ $data->nama }}" readonly="readonly">
    <input type="text" class="form-control"style="width: 30%; " placeholder="" value="{{ $data->email}}" readonly="readonly">
</div>
   <br>
<div style="border: 1px solid black; padding: 5px;">
    <label for="exampleInputEmail1">SPPD :<span style="color: red; font-size: 24px;">*</span></label>
    <input type="text" class="form-control"style="width: 30%; " placeholder="Nomor SPPD" name="no_sppd" id="no_sppd" value="{{ $data->no_sppd }}" readonly="readonly">

<div class='input-group date' style="width: 30%; margin-top: 5px; padding-bottom: 5px; ">
<input name="date" class="input-group datepicker form-control"  data-date-format="yyyy-mm-dd" type="text"  placeholder="Target Activity" autocomplete="off" value="{{ $data->date }}"  id="date" readonly >
<span class="input-group-addon" >
<span class="fa fa-calendar"></span></span>
</div>
@php(@$fnilai_sppd = (number_format($data->nilai_sppd,0,",",".").""))
<input name="date" class="input-group datepicker form-control" style="width: 30%;" data-date-format="yyyy-mm-dd" type="text" autocomplete="off" value="{{ $fnilai_sppd }}"  readonly >
</div>
   <br>
<div style="border: 1px solid black; padding: 5px;">
    <label for="exampleInputEmail1">PJPD :<span style="color: red; font-size: 24px;">*</span></label>
    <input type="text" class="form-control"style="width: 30%; " placeholder="Nomor PJPD" name="no_pjpd" id="no_pjpd" value="{{ $data->no_pjpd }}" >

<div class='input-group date' style="width: 30%; margin-top: 5px">
<input name="date_pjpd" class="input-group datepicker form-control" date=""  data-date-format="yyyy-mm-dd" type="text"  placeholder="Tanggal" autocomplete="off" value="{{ $data->date_pjpd }}"  id="date_pjpd" readonly >
<span class="input-group-addon" >
<span class="fa fa-calendar"></span></span>
</div>
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
<input class="form-control" type="number" name="nilai_pjpd" placeholder="JUMLAH TERPAKAI"  value="{{ $data->nilai_pjpd }}"
onkeyup="document.getElementById('nilai_pjpd').innerHTML = formatCurrency(this.value);"  />
<span class="input-group-addon" style="background-color: black; color: white; font-weight: bold;  font-family:'digital-clock-font';">
<span  id="nilai_pjpd"></span></span>
</div>
</div>

<label for="exampleInputEmail1">KETERANGAN :</label>
<textarea type="text" class="form-control" name="note" id="note"  value="{{ old('note') }}"></textarea>
</div>
<button type="submit" class="btn btn-sm btn-raised btn-primary">Save</button>
</form>
</div>
          @endforeach
<br>
<br>

        @php(   $no = 1 {{-- buat nomor urut --}}  )
        {{-- loop all legalitas --}}
        @foreach ($budget as $datas)
        @php($kd_proyek = $datas->kd_proyek)
@php( @$cost_total = ($datas->cost * $datas->volume) + $datas->cost_extend )
@php( @$total_budget += $cost_total )
  @php (@$ftotal_budget = (number_format($total_budget,0,",",".").""))
  @endforeach

<div class="panel-heading bg-primary" style="margin-left:10px; margin-right: 10px; ">
SPPD : {{ $kd_proyek }}<br>
TOTAL BUDGET : {{ $ftotal_budget }}
</div>
<div class="panel-body">
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
        @endif
</td>
<td align="center"><a href="{{ URL('/sppd/print/') }}/{{ $datas->kd_sppd }}" target="_blank">
        <button class="btn btn-sm btn-raised bg-blue" onclick="return" title="Print" style="margin-bottom: 5px;" confirm('Yakin mau update data ?')"  type="submit">
        <i class="fa fa-print"></i></button></a></td>

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
$("#date_pjpd").datepicker();
  });
  </script>

<script type="text/javascript">
   function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                var errorMsg = document.getElementById("errorMsg");
                errorMsg.style.display = "block";
                document.getElementById("errorMsg").innerHTML = "  Please enter only Numbers.  ";
                return false;
            }
           
            return true;
        }

        function ValidateNo() {
            var kd_cost1 = document.getElementById('kd_cost1');
            var kd_cost2 = document.getElementById('kd_cost2');
            var kd_cost3 = document.getElementById('kd_cost3');
            var kd_cost4 = document.getElementById('kd_cost4');
            var kd_cost5 = document.getElementById('kd_cost5');

            var errorMsg = document.getElementById("errorMsg");
            var successMsg = document.getElementById("successMsg");

            if (kd_cost1.value == kd_cost2.value && kd_cost1.value == kd_cost3.value) {
                errorMsg.style.display = "block";
                successMsg.style.display = "none";
                document.getElementById("errorMsg").innerHTML = " False";
                return false;
            }
            
                if (kd_cost1.value == kd_cost3.value ) {
                errorMsg.style.display = "block";
                successMsg.style.display = "none";
                document.getElementById("errorMsg").innerHTML = " False";
                return false;
            }
            
                if (kd_cost1.value == kd_cost4.value ) {
                errorMsg.style.display = "block";
                successMsg.style.display = "none";
                document.getElementById("errorMsg").innerHTML = " False";
                return false;
            }
            
                if (kd_cost1.value == kd_cost5.value ) {
                errorMsg.style.display = "block";
                successMsg.style.display = "none";
                document.getElementById("errorMsg").innerHTML = " False";
                return false;
            }
  

            successMsg.style.display = "block";
            document.getElementById("successMsg").innerHTML = " Success ";
            errorMsg.style.display = "none";
            return true;
            }
           
</script>