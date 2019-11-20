<!DOCTYPE html>
<html>
<head>
  <div style="width: 100%">
<div style="text-align: left;"><img src="{{url('image/logo.png')}}" style="width: 250px; height: 50px; "></div>
<div style="text-align: right; padding-bottom: 5px; padding-right: 10px;">FM-DPB-17 / Revisi : 00</div>
</div>
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
<div style="width: 15%; float: left; height: 30px; font-size: 32px; font-weight: 20px; border: 1px solid black; padding-bottom: 15px;  text-align: center;" >SPPD</div>
<div style="width: 80%; float: right; height: 30px; font-size: 22px; font-weight: 20px; padding-top: 5px; padding-bottom: 10px; padding-left: 35px;  border: 1px solid black;">PT. SUCOFINDO PRIMA INTERNASIONAL KONSULTAN</div>
<div style="width: 100%;  border: 1px solid black; width: 100%; font-size: 18px; font-weight: 10px; text-align: center; padding-top: 10px; padding-bottom: 20px;">SURAT PERINTAH PERJALANAN DINAS (SPPD)</div></div>
    <div style="width: 12%; float: left; font-size: 14px;  padding-left: 25px; padding-top: 10px;">Kode Proyek  <br>Nama Proyek <br>Beban </div><div style="width: 55%; float: left; font-size: 14px; padding-top: 10px;">: ............................................. <br>: @foreach ($proyek as $data)
{{$data->nama_klien}}
@endforeach <br> : DKO
</div>   
<div style="width: 25%; float: left; font-size: 14px;  padding-left: 25px; padding-top: 10px;">TGL       
: {{ $tgl_sppd_indo }} <br>NO <span style="color: white">_</span> : 
@foreach ($sppd1 as $data)
{{ $data->no_sppd }}</div>
<div style="width: 100%; padding-top: 50px; margin-top: 10px;">
  <div style="width: 100%; padding-top: 30px; padding-left: 25px;  ">
    <div style="font-size: 14px; width: 40%; float: left;">1. Memerintahkan Kepada <br> <span style="padding-left: 15px; font-size: 14px">Nama</span> <br><span style="padding-left: 15px; font-size: 14px">Jabatan</span> <br>
      <span style="padding-left: 15px; font-size: 14px">Golongan</span> </div><div style="font-size: 14px; width: 60%; float: left;">
<br>
: {{ $data->nama}}
@endforeach
<br>@foreach ($sppd1 as $data)
: {{ $data->jabatan}}
@endforeach</div>
<div style="padding-top: 50px;">
<div style="font-size: 14px; width: 40%;  ">2. Untuk Melakukan Perjalanan Dinas <br> <span style="padding-left: 15px; font-size: 14px">Tujuan</span> <br> <span style="padding-left: 15px; font-size: 14px">Keperluan</span> <br> <span style="padding-left: 15px; font-size: 14px">Berangkat Tanggal</span><br> <span style="padding-left: 15px; font-size: 14px">Kembali Tanggal</span></div>
<div style="font-size: 14px; width: 60%; float: right; padding-top: -70px;">
  @foreach ($sppd1 as $data)
: {{ $data->tujuan}}
@endforeach<br>
  @foreach ($sppd1 as $data)
: {{ $data->keperluan}}
@endforeach <br>
@foreach ($sppd1 as $data)
        @if (empty($data->tanggal_berangkat))
        @php  ( $tanggal_berangkat = '')
        @else
        @php  ( $tanggal_berangkat = date('d M Y', strtotime($data->tanggal_berangkat)))
        @endif
: {{ $tanggal_berangkat}}
@endforeach <br>
@foreach ($sppd1 as $data)
        @if (empty($data->tanggal_kembali))
        @php  ( $tanggal_kembali = '')
        @else
        @php  ( $tanggal_kembali = date('d M Y', strtotime($data->tanggal_kembali)))
        @endif
: {{ $tanggal_kembali}}
@endforeach
</div>
</div>
        @foreach ($sppd1 as $data)
@php( @$total_cost1 = ($data->cost * $data->volume) + $data->cost_extend )
        @endforeach
       @foreach ($sppd2 as $data)
@php( @$total_cost2 = ($data->cost * $data->volume) + $data->cost_extend )
        @endforeach
        @foreach ($sppd3 as $data)
@php( @$total_cost3 = ($data->cost * $data->volume) + $data->cost_extend )
        @endforeach
        @foreach ($sppd4 as $data)
@php( @$total_cost4 = ($data->cost * $data->volume) + $data->cost_extend )
        @endforeach
        @foreach ($sppd5 as $data)
@php( @$total_cost5 = ($data->cost * $data->volume) + $data->cost_extend )
        @endforeach
@php(@$grand = $total_cost1 + $total_cost2  + $total_cost3 + $total_cost4 + $total_cost5)
@php ( $fgrand = (number_format($grand,0,",",".").""))
<div style="padding-top: 10px; ">
<div style="font-size: 14px; width: 40%;   ">3. Perhitungan Biaya (Base On Budget)</div>
<div style="font-size: 14px; width: 60%; float: right; padding-top: -15px; padding-bottom: 0px;" >      
</div>
</div>
<div style="font-size: 14px; width: 30%; ">
<span style="color: white;">---</span>@foreach ($sppd1 as $data)
a. {{ $data->cost_activity }}
@endforeach
<br>
<span style="color: white;">---</span>@foreach ($sppd2 as $data)
b. {{ $data->cost_activity }}
@endforeach
<br>
<span style="color: white;">---</span>@foreach ($sppd3 as $data)
c. {{ $data->cost_activity }}
@endforeach
<br>
<span style="color: white;">---</span>@foreach ($sppd4 as $data)
d. {{ $data->cost_activity }}
@endforeach
<br>
<span style="color: white;">---</span>@foreach ($sppd5 as $data)
e. {{ $data->cost_activity }}
@endforeach
<br>
<br>
<span style="color: white;">---</span>Jumlah Permintaan SPPD
</div>
<div style="font-size: 14px; width: 30%; float: right; margin-top: -105px; ">      
@foreach ($sppd1 as $data)
@php( @$total_cost1 = ($data->cost * $data->volume) + $data->cost_extend )
@php ( @$ftotal_cost1 = (number_format($total_cost1,0,",",".").""))
: Rp. {{ @$ftotal_cost1 }}
@endforeach 
<br>
@foreach ($sppd2 as $data)
@php( @$total_cost1 = ($data->cost * $data->volume) + $data->cost_extend )
@php ( @$ftotal_cost1 = (number_format($total_cost1,0,",",".").""))
: Rp. {{ @$ftotal_cost1 }}
@endforeach 
<br>
@foreach ($sppd3 as $data)
@php( @$total_cost1 = ($data->cost * $data->volume) + $data->cost_extend )
@php ( @$ftotal_cost1 = (number_format($total_cost1,0,",",".").""))
: Rp. {{ @$ftotal_cost1 }}
@endforeach 
<br>
@foreach ($sppd4 as $data)
@php( @$total_cost1 = ($data->cost * $data->volume) + $data->cost_extend )
@php ( @$ftotal_cost1 = (number_format($total_cost1,0,",",".").""))
: Rp. {{ @$ftotal_cost1 }}
@endforeach 
<br>
@foreach ($sppd5 as $data)
@php( @$total_cost1 = ($data->cost * $data->volume) + $data->cost_extend )
@php ( @$ftotal_cost1 = (number_format($total_cost1,0,",",".").""))
: Rp. {{ @$ftotal_cost1 }}
@endforeach 
<br><br>
@php ( @$fnilai_sppd = (number_format($data->nilai_sppd,0,",",".").""))

:<u><strong><text style="font-size: 14px;" > Rp. {{ $fnilai_sppd }}</text> </strong></u>
</div>
<div style="font-size: 14px; width: 30%; float: right; "> 
@foreach ($sppd1 as $data)
: {{ $data->volume }} X
@endforeach 
@foreach ($sppd1 as $data)
        @if (empty($data->cost_extend))
        @php  ( $cost_extend = '')
        @else
        @php ( $cost_extend = (number_format($data->cost_extend,0,",",".").""))
        @endif
@php ( $fcost = (number_format($data->cost,0,",",".").""))
Rp. {{ $fcost }} 
+
Rp. {{ $cost_extend}}
@endforeach       
<br>@foreach ($sppd2 as $data)
: {{ $data->volume }} X
@endforeach 
@foreach ($sppd2 as $data)
        @if (empty($data->cost_extend))
        @php  ( $cost_extend = '')
        @else
        @php ( $cost_extend = (number_format($data->cost_extend,0,",",".").""))
        @endif
@php ( $fcost = (number_format($data->cost,0,",",".").""))
Rp. {{ $fcost }} 
+
Rp. {{ $cost_extend}}
@endforeach <br>
@foreach ($sppd3 as $data)
: {{ $data->volume }} X
@endforeach 
@foreach ($sppd3 as $data)
        @if (empty($data->cost_extend))
        @php  ( $cost_extend = '')
        @else
        @php ( $cost_extend = (number_format($data->cost_extend,0,",",".").""))
        @endif
@php ( $fcost = (number_format($data->cost,0,",",".").""))
Rp. {{ $fcost }} 
+
Rp. {{ $cost_extend}}
@endforeach
<br>
@foreach ($sppd4 as $data)
: {{ $data->volume }} X
@endforeach 
@foreach ($sppd4 as $data)
        @if (empty($data->cost_extend))
        @php  ( $cost_extend = '')
        @else
        @php ( $cost_extend = (number_format($data->cost_extend,0,",",".").""))
        @endif
@php ( $fcost = (number_format($data->cost,0,",",".").""))
Rp. {{ $fcost }} 
+
Rp. {{ $cost_extend}}
@endforeach
<br>
@foreach ($sppd5 as $data)
: {{ $data->volume }} X
@endforeach 
@foreach ($sppd5 as $data)
        @if (empty($data->cost_extend))
        @php  ( $cost_extend = '')
        @else
        @php ( $cost_extend = (number_format($data->cost_extend,0,",",".").""))
        @endif
@php ( $fcost = (number_format($data->cost,0,",",".").""))
Rp. {{ $fcost }} 
+
Rp. {{ $cost_extend}}
@endforeach
</div>
<div style="padding-top: 120px;">
<div style="font-size: 14px; width: 30%;  "><span style="padding-left: 15px; font-size: 14px">Terbilang :</span>
  <span style="padding-left: 15px; font-size: 14px;">...................................................................................................................................................................................................</span><br><span style="padding-left: 15px; font-size: 14px;">...................................................................................................................................................................................................</span>
</div>
<div style="font-size: 14px; width: 60%; float: right; padding-top: -70px;"></div>
</div>
<div style="font-size: 14px; width: 100%;  margin-top: 40px; border-top: 1px solid black; padding-top: 10px;">4. Persetujuan Dan Tanda Tangan</div><div style="font-size: 14px; width: 60%; float: right; padding-top: -15px">
</div>
<div style="padding-top: 20px;">
<div style="font-size: 14px; width: 40%;  "><span style="color: white;">--</span> 1. Pemohon</div>
<div style="font-size: 14px; width: 30%; float: right; padding-top: -15px;">.............................................  
</div><div style="font-size: 14px; width: 30%; float: right; padding-top: -10px">     
   @foreach ($sppd1  as $data)
: {{ $data->nama }}  
  @endforeach
</div>
</div>
<div style="padding-top: 40px;">
<div style="font-size: 14px; width: 40%;  "><span style="color: white;">--</span> 2. Manajer Proyek</div>
<div style="font-size: 14px; width: 30%; float: right; padding-top: -15px;">.............................................  
</div><div style="font-size: 14px; width: 30%; float: right; padding-top: -15px">     
   @foreach ($data_pm as $data)
: {{ $data->nama }}  
  @endforeach
</div>
</div>
<div style="padding-top: 40px;">
<div style="font-size: 14px; width: 40%;  "><span style="color: white;">--</span>3. Manajer</div>
<div style="font-size: 14px; width: 30%; float: right; padding-top: -15px;">.............................................  
</div><div style="font-size: 14px; width: 30%; float: right; padding-top: -15px">     
   @foreach ($data_manager as $data)
: {{ $data->nama }}  
  @endforeach
</div>
</div>
<div style="padding-top: 40px;">
<div style="font-size: 14px; width: 40%;  "><span style="color: white;">--</span> 4. General Manager</div>
<div style="font-size: 14px; width: 30%; float: right; padding-top: -15px;">.............................................  
</div><div style="font-size: 14px; width: 30%; float: right; padding-top: -15px">     
   @foreach ($data_gm as $data)
: {{ $data->nama }}  
  @endforeach
</div>
</div>
<div style="margin-top: 40px; padding-top: 10px; border-top: 1px solid black;">
<div style="font-size: 14px; width: 20%;  "><span style="color: white;">--</span>Catatan</div>
<div style="font-size: 14px; width: 80%; float: right; padding-top: -15px;">1. Harap di pertanggungjawabkan maksimal 6 (enam) hari setelah selesai pelaksanaan tugas.<br>
2. Apabila butir (1) di atas tidak dilaksanakan, maka akan dipotong dari gaji atau penghasilan lainya.<br>
3. Untuk proyek agar di lampiri dengan "Internal  Budget".</div>
</div>
</div>
  </div>
</div>
</body>
</html>
