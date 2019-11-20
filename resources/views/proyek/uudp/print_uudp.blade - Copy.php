<!DOCTYPE html>
<html>
<head>
TEST PDF
@php ($date = date('m/Y'))
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style>
    *{
    
     font-family: Arial;
    font-size: 12px;

    }
  .mytable tf{
        background-color: white ;
    }
    .mytable th{
    background-color: #0B6FA4 ;color: white;
    font-size: 12px;
    }

    .mytable td, th{
  height: 50px;
  padding-left: 10px;
  padding-right: 10px;
    border-bottom: 1px solid #eee;
      }
  
        @page { margin: 30px 10px 10px 10px; }
        .header { position: fixed; left: 0px; top: -100px; right: 0px; height: 100px; text-align: center; }
        .footer { position: fixed; left: 0px; bottom: -50px; right: 0px; height: 50px;text-align: center;}
        .footer .pagenum:before { content: counter(page); }
</style>
</head><body >
<div style="width: 100%; padding-left: 20px; padding-right: 20px;">
<div style="width: 15%; float: left; height: 30px; font-size: 32px; font-weight: 20px; border: 1px solid black; padding-bottom: 15px;  text-align: center;" >UUDP</div>
<div style="width: 80%; float: right; height: 30px; font-size: 22px; font-weight: 20px; padding-top: 5px; padding-bottom: 10px; padding-left: 35px;  border: 1px solid black;">PT. SUCOFINDO PRIMA INTERNASIONAL KONSULTAN</div>
<div style="width: 100%; border: 1px solid black; width: 100%; font-size: 18px; font-weight: 10px; text-align: center; padding-top: 10px; padding-bottom: 10px;">UANG UNTUK DIPERTANGGUNGJAWABKAN (UUDP)</div></div>
    <div style="width: 12%; float: left; font-size: 14px;  padding-left: 25px; padding-top: 10px;">Kode Proyek  <br>Nama Proyek <br>Beban </div><div style="width: 55%; float: left; font-size: 14px; padding-top: 10px;">: ..................................... <br>: @foreach ($proyek as $data)
{{$data->nama_klien}}
@endforeach <br> : .....................................
</div>   
<div style="width: 25%; float: left; font-size: 14px;  padding-left: 25px; padding-top: 10px;">TGL       
@foreach ($uudp1 as $data)
: {{ $data->date }}
@endforeach <br>NO.   : .....................................</div>
<div style="width: 100%; padding-top: 50px;">
<table class="mytable" style="font-size:14px; ">
<tr><td><text style="font-size: 14px; font-weight: 10px;"><strong>Keperluan</strong></text></td>
</tr><tr><td ><strong>No</strong></td>
            <td ><strong>Aktifitas</strong></td>
            <td ><strong>Sub Aktifitas</td>
            <td ><strong>Biaya Aktifitas</strong></td>
            <td ><strong>Volume</strong></td>
            <td ><strong>Biaya</strong></td>
            <td ><strong>Biaya Tambahan</strong></td>
            <td ><strong>Total Biaya</strong></td>
        </tr>
          @php ($date_now = date('Y-m-d'))
        @php(
          $no = 1 {{-- buat nomor urut --}}
          )
        {{-- loop all legalitas --}}
        @foreach ($uudp1 as $data)
@php ( $fcost = (number_format($data->cost,0,",",".").""))
@php ( $fcost_extend = (number_format($data->cost_extend,0,",",".").""))
@php ( $total_cost1 = ($data->cost + $data->cost_extend) * $data->volume))
@php ( $ftotal_cost = (number_format($total_cost1,0,",",".").""))

            <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $data->activity }} </td>
            <td>{{ $data->sub_activity }}</td>
            <td>{{ $data->cost_activity }} </td>
            <td>{{ $fcost }} </td>     
            <td>{{ $data->volume }} </td>     
            <td>{{ $fcost_extend }} </td>
            <td>{{ $ftotal_cost }} </td>        
        @endforeach
        @foreach ($uudp2 as $data)
@php ( $fcost = (number_format($data->cost,0,",",".").""))
@php ( $fcost_extend = (number_format($data->cost_extend,0,",",".").""))
      @php ( $total_cost2 = ($data->cost + $data->cost_extend) * $data->volume))
@php ( $ftotal_cost = (number_format($total_cost2,0,",",".").""))
            <tr>
            <td>{{ $no++ }}</td>
                        <td>{{ $data->activity }} </td>
            <td>{{ $data->sub_activity }}</td>
            <td>{{ $data->cost_activity }} </td>
           <td>{{ $fcost }} </td>     
            <td>{{ $data->volume }} </td>     
            <td>{{ $fcost_extend }} </td>
            <td>{{ $ftotal_cost }} </td>        
        @endforeach
  @foreach ($uudp3 as $data)
  @php ( $fcost = (number_format($data->cost,0,",",".").""))
@php ( $fcost_extend = (number_format($data->cost_extend,0,",",".").""))
      @php ( $total_cost3 = ($data->cost + $data->cost_extend) * $data->volume))
  @php ( $ftotal_cost = (number_format($total_cost3,0,",",".").""))
            <tr>
            <td>{{ $no++ }}</td>
                        <td>{{ $data->activity }} </td>
            <td>{{ $data->sub_activity }}</td>
            <td>{{ $data->cost_activity }} </td>
           <td>{{ $fcost }} </td>     
            <td>{{ $data->volume }} </td>     
            <td>{{ $fcost_extend }} </td>
            <td>{{ $ftotal_cost }} </td>        
        @endforeach
   @foreach ($uudp4 as $data)
  @php ( $fcost = (number_format($data->cost,0,",",".").""))
@php ( $fcost_extend = (number_format($data->cost_extend,0,",",".").""))
      @php ( $total_cost4 = ($data->cost + $data->cost_extend) * $data->volume))
  @php ( $ftotal_cost = (number_format($total_cost4,0,",",".").""))
            <tr>
            <td>{{ $no++ }}</td>
                        <td>{{ $data->activity }} </td>
            <td>{{ $data->sub_activity }}</td>
            <td>{{ $data->cost_activity }} </td>
           <td>{{ $fcost }} </td>     
            <td>{{ $data->volume }} </td>     
            <td>{{ $fcost_extend }} </td>
            <td>{{ $ftotal_cost }} </td>        
        @endforeach
          @foreach ($uudp5 as $data)
            @php ( $fcost = (number_format($data->cost,0,",",".").""))
@php ( $fcost_extend = (number_format($data->cost_extend,0,",",".").""))
      @php ( $total_cost5 = ($data->cost + $data->cost_extend) * $data->volume))
  @php ( $ftotal_cost = (number_format($total_cost5,0,",",".").""))
            <tr>
            <td>{{ $no++ }}</td>
                        <td>{{ $data->activity }} </td>
            <td>{{ $data->sub_activity }}</td>
            <td>{{ $data->cost_activity }} </td>
           <td>{{ $fcost }} </td>     
            <td>{{ $data->volume }} </td>     
            <td>{{ $fcost_extend }} </td>
            <td>{{ $ftotal_cost }} </td>        
        @endforeach
@php(@$grand = $total_cost1 + $total_cost2  + $total_cost3 + $total_cost4 + $total_cost5)
@php ( $fgrand = (number_format($grand,0,",",".").""))

                    <tr>
        <td colspan="7"><strong>Jumlah Permintaan UUDP</strong></td><td>{{$fgrand}}</td>
        </tr>
      </tbody> 
    </table>
  </div>
</div>
</div>
</body>
</html>
