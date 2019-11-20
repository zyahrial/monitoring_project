<!DOCTYPE html>
<html>
<head>
  <div style="width: 100%">
<div style="text-align: left;"><img src="{{url('/image/logo.png')}}" style="width: 250px; height: 50px; "></div>
<div style="text-align: right; padding-bottom: 5px; padding-right: 10px;">FM-DPB-17 / Revisi : 00</div>
</div>
@php ($date = date('m/Y'))
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body >
<div style="width: 100%; padding-left: 20px; padding-right: 20px;">
<div style="width: 15%; float: left; height: 30px; font-size: 32px; font-weight: 20px; border: 1px solid black; padding-bottom: 15px;  text-align: center;" >UUDP</div>
<div style="width: 80%; float: right; height: 30px; font-size: 20px; font-weight: 20px; padding-top: 5px; padding-bottom: 10px; padding-left: 33px;  border: 1px solid black;">PT. SUCOFINDO PRIMA INTERNASIONAL KONSULTAN</div>
<div style="width: 100%;  border: 1px solid black; width: 100%; font-size: 18px; font-weight: 10px; text-align: center; padding-top: 10px; padding-bottom: 20px;">UANG UNTUK DIPERTANGGUNGJAWABKAN (UUDP)</div></div>
    <div style="width: 12%; float: left; font-size: 14px;  padding-left: 25px; padding-top: 10px;">Kode Proyek  <br>Nama Proyek <br>Beban </div><div style="width: 55%; float: left; font-size: 14px; padding-top: 10px;">: ............................................. <br>: @foreach ($proyek as $data)
{{$data->nama_klien}}
@endforeach <br> : DKO
</div>   
<div style="width: 25%; float: left; font-size: 14px;  padding-left: 25px; padding-top: 10px;">TGL       
@foreach ($uudp1 as $data)
        @if (empty($data->date))
        @php  ( $date_uudp = '')
        @else
        @php  ( $date_uudp = date('d M Y', strtotime($data->date)))
        @endif
: {{ $tgl_uudp_indo }}
@endforeach <br>NO<span style="color: white;">_</span> : {{$data->no_uudp}}</div>
<div style="width: 100%; padding-top: 50px; margin-top: 20px;">
  <div style="width: 100%; padding-top: 30px; padding-left: 25px;  ">
    <div style="font-size: 14px; width: 40%; float: left;">1. Keperluan</div><div style="font-size: 14px; width: 60%; float: left;">    
@foreach ($uudp1 as $data)
: {{ $data->activity }} -
{{ $data->sub_activity }}
@endforeach
<br>Biaya
@foreach ($uudp1 as $data)
(
{{ $data->cost_activity }} ,
@endforeach @foreach ($uudp2 as $data)
{{ $data->cost_activity }} , 
@endforeach @foreach ($uudp3 as $data)
{{ $data->cost_activity }} ,
@endforeach @foreach ($uudp4 as $data)
{{ $data->cost_activity }} ,
@endforeach @foreach ($uudp5 as $data)
{{ $data->cost_activity }} 
@endforeach )<br>...............................................................................................................................</div>

        @foreach ($uudp1 as $data)
@php ( $total_cost1 = ($data->cost + $data->cost_extend) * $data->volume)
        @endforeach
       @foreach ($uudp2 as $data)
@php ( $total_cost2 = ($data->cost + $data->cost_extend) * $data->volume)
        @endforeach
        @foreach ($uudp3 as $data)
@php ( $total_cost3 = ($data->cost + $data->cost_extend) * $data->volume)
        @endforeach
        @foreach ($uudp4 as $data)
@php ( $total_cost4 = ($data->cost + $data->cost_extend) * $data->volume)
        @endforeach
        @foreach ($uudp5 as $data)
@php ( $total_cost5 = ($data->cost + $data->cost_extend) * $data->volume)
        @endforeach
@php(@$grand = $total_cost1 + $total_cost2  + $total_cost3 + $total_cost4 + $total_cost5)
@php ( $fgrand = (number_format($grand,0,",",".").""))
@php ( $nilai_uudp = (number_format($data->nilai_uudp,0,",",".").""))

<div style="padding-top: 10px;">
<div style="font-size: 14px; width: 40%;   ">2. Jumlah Permintaan UUDP</div><div style="font-size: 14px; width: 60%; float: right; padding-top: -15px">      
: Rp. {{ $nilai_uudp }}
</div>
</div>
<div style="font-size: 14px; width: 40%;  "><span style="color: white;">--</span> Terbilang</div><div style="font-size: 14px; width: 60%; float: right; padding-top: -15px">      
...............................................................................................................................<br>...............................................................................................................................<br>...............................................................................................................................
</div>
<div style="margin-top: 50px; border-top: 1px solid black; padding-top: 10px;">
<div style="font-size: 14px; width: 40%;  ">3. Persetujuan Dan Tanda Tangan</div><div style="font-size: 14px; width: 60%; float: right; padding-top: -15px">
</div>
<div style="padding-top: 50px;">
<div style="font-size: 14px; width: 40%;  "><span style="color: white;">--</span> 1. Pemohon</div>
<div style="font-size: 14px; width: 30%; float: right; padding-top: -15px;">.............................................  
</div><div style="font-size: 14px; width: 30%; float: right; padding-top: -15px">     
   @foreach ($uudp1 as $data)
: {{ $data->nama }}  
  @endforeach
</div>
</div>
<div style="padding-top: 50px;">
<div style="font-size: 14px; width: 40%;  "><span style="color: white;">--</span> 2. Manajer Proyek</div>
<div style="font-size: 14px; width: 30%; float: right; padding-top: -15px;">.............................................  
</div><div style="font-size: 14px; width: 30%; float: right; padding-top: -15px">     
   @foreach ($data_pm as $data)
: {{ $data->nama }}  
  @endforeach
</div>
</div>
</div>
<div style="padding-top: 50px;">
<div style="font-size: 14px; width: 40%;  "><span style="color: white;">--</span> 3. Manajer</div>
<div style="font-size: 14px; width: 30%; float: right; padding-top: -15px;">.............................................  
</div><div style="font-size: 14px; width: 30%; float: right; padding-top: -15px">     
   @foreach ($data_manager as $data)
: {{ $data->nama }}  
  @endforeach
</div>
</div>
<div style="padding-top: 50px;">
<div style="font-size: 14px; width: 40%;  "><span style="color: white;">--</span> 4. General Manager</div>
<div style="font-size: 14px; width: 30%; float: right; padding-top: -15px;">.............................................  
</div><div style="font-size: 14px; width: 30%; float: right; padding-top: -15px">     
   @foreach ($data_gm as $data)
: {{ $data->nama }}  
  @endforeach
</div>
</div>
<div style="margin-top: 50px; padding-top: 10px; border-top: 1px solid black;">
<div style="font-size: 14px; width: 20%;  "><span style="color: white;">--</span>Catatan</div>
<div style="font-size: 14px; width: 80%; float: right; padding-top: -15px;">1. Harap di pertanggungjawabkan maksimal 6 (enam) hari setelah selesai pelaksanaan tugas.<br>
2. Apabila butir (1) di atas tidak dilaksanakan, maka akan dipotong dari gaji atau penghasilan lainya.<br>
3. Untuk proyek agar di lampiri dengan "Internal Budget".</div>
</div>
</div>
  </div>
</div>
</div>
</body>
</html>
