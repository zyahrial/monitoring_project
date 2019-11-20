<!DOCTYPE html>
<body >
@foreach ($data_termin as $datas)

<div style="width: 100%; padding-left: 5px; padding-right: 20px; margin-top: -40px;">
<div style="width: 100%; width: 100%; font-size: 24px; font-weight: 100px; text-align: center;">MEDIA INVOICE</div></div>
<div style="width: 100%; width: 100%; font-size: 18px; font-weight: 10px; text-align: center; padding-top: 2px; padding-bottom: 2px;"> No. {{ $datas->kd_mdi }}</div></div>

<div style="border-top: 1px solid black; padding-top: 10px; border-left: 1px solid black; border-right: 1px solid black; padding-top: 10px; ">
<div style="width: 30%; padding-left: 5px; font-size: 14px; "> KEPADA</div>
<div style="width: 70%; float: right; padding-top: -20px; font-size: 14px; ">: DIVISI PENUNJANG BISNIS</div>
</div>

<div style="border-right: 1px solid black; border-top: 1px solid black; padding-top: 10px; border-left: 1px solid black; padding-top: 10px; ">
<div style="width: 30%; padding-left: 5px; font-size: 14px; "> DARI</div>
<div style="width: 70%; float: right; padding-top: -20px; font-size: 14px; ">: DIVISI DKO</div>
</div>

<div style="border-right: 1px solid black; border-top: 1px solid black; padding-top: 10px; border-left: 1px solid black; padding-top: 10px; ">
<div style="width: 30%; padding-left: 5px; font-size: 14px; "> PERIHAL</div>
<div style="width: 70%; float: right; padding-top: -20px; font-size: 14px; ">: DATA INVOICE</div>
</div>

<div style="border-right: 1px solid black; border-top: 1px solid black; padding-top: 10px; border-left: 1px solid black; padding-top: 10px; ">
<div style="width: 30%; padding-left: 5px;font-size: 14px;">1. NOMOR ORDER</div>
<div style="width: 70%; float: right; padding-top: -20px; font-size: 14px;">: {{ $datas->no_order }}</div>
</div>
@endforeach
<div style="border-right: 1px solid black; border-right: 1px solid black; border-top: 1px solid black; padding-top: 10px; border-left: 1px solid black; padding-top: 10px; ">
<div style="width: 30%; padding-left: 5px; font-size: 14px;">2. UNIT PELAKSANA</div>
<div style="width: 70%; float: right; padding-top: -20px; font-size: 14px; ">: DIVISI DKO</div>
</div>

<div style="border-right: 1px solid black; border-top: 1px solid black; padding-top: 10px; border-left: 1px solid black; padding-top: 10px; ">
<div style="width: 30%; padding-left: 5px; font-size: 14px;">3. PELANGGAN</div>
<div style="width: 70%; float: right; padding-top: -20px; font-size: 14px; ">: </div>
</div>
@foreach ($proyek as $data)

<div style="border-right: 1px solid black; border-top: 1px solid black; padding-top: 10px; border-left: 1px solid black; padding-top: 10px; ">
	@php(@$nama_klien = str_limit($data->nama_klien ,75))

<div style="width: 30%; padding-left: 50px; font-size: 14px;">3.1. NAMA</div>
<div style="width: 70%; float: right; padding-top: -20px; font-size: 14px; ">: {{$nama_klien}}</div>
</div>

<div style="border-right: 1px solid black; border-top: 1px solid black; padding-top: 10px; border-left: 1px solid black; padding-top: 10px; ">
<div style="width: 30%; padding-left: 50px; font-size: 14px;">3.2. ALAMAT</div>

@php(@$alamat = str_limit($data->alamat ,75))
<div style="width: 70%; float: right; padding-top: -20px; font-size: 14px; ">: {{$alamat}}</div>
</div>

<div style="border-right: 1px solid black; border-top: 1px solid black; padding-top: 10px; border-left: 1px solid black; padding-top: 10px; ">
<div style="width: 30%; padding-left: 50px; font-size: 14px;">3.3. TELEPON</div>
<div style="width: 70%; float: right; padding-top: -20px; font-size: 14px; ">: {{$data->telp_fax}}</div>
</div>

<div style="border-right: 1px solid black; border-top: 1px solid black; padding-top: 10px; border-bottom: 5px solid black; padding-top: 10px; border-left: 1px solid black; padding-top: 10px; ">
<div style="width: 30%; padding-left: 50px; font-size: 14px;">3.4. NPWP</div>
<div style="width: 70%; float: right; padding-top: -20px; font-size: 14px; ">: {{$data->no_npwp}}</div>
</div>

<div style="border-right: 1px solid black; border-top: 1px solid black; padding-top: 10px; border-left: 1px solid black; padding-top: 10px; ">
<div style="width: 30%; padding-left: 5px; font-size: 14px;">4. NO/TGL KONTRAK/ORDER</div>
<div style="width: 70%; float: right; padding-top: -20px; font-size: 14px; ">: {{ $data->no_kontrak }}</div>
</div>
@endforeach
@foreach ($data_termin as $data)
<div style="border-right: 1px solid black; border-top: 1px solid black; border-left: 1px solid black; padding-top: 10px; ">
<div style="width: 30%; padding-left: 5px; font-size: 14px;">5. NO/TGL SERT/LAP</div>
<div style="width: 70%; float: right; padding-top: -20px; font-size: 14px; ">: {{ $data->no_sertifikat }} / {{ $data->tgl_sertifikat }} </div>
</div>
@endforeach
@foreach ($proyek as $data)
<div style="border-right: 1px solid black; border-top: 1px solid black; padding-top: 5px; border-left: 1px solid black; padding-top: 10px; ">
<div style="width: 30%;  padding-left: 5px; font-size: 14px;">6. JENIS PEKERJAAN / KODE</div>
<div style="width: 70%; float: right; padding-top: -20px; font-size: 14px; ">: {{ $data->sub_jasa}}</div>
</div>
@endforeach
@foreach ($data_termin as $data)
<div style="border-right: 1px solid black; border-top: 1px solid black; padding-top: 5px; border-left: 1px solid black; padding-top: 10px; ">
<div style="width: 30%; padding-left: 5px; font-size: 14px;">7. JENIS/JUMLAH KOMODITI</div>
<div style="width: 70%; float: right; padding-top: -20px; font-size: 14px; ">: {{ $data->jml_komoditi }}</div>
</div>
<div style="border-right: 1px solid black; border-bottom: 5px solid black; border-top: 1px solid black; padding-top: 10px; border-left: 1px solid black; padding-top: 10px; ">
<div style="width: 30%; padding-left: 5px; font-size: 14px;">8. KETERANGAN </div>
<div style="width: 70%; float: right; padding-top: -20px; font-size: 14px; ">: Tagihan {{ $data->termin_ke }} 
({{ $data->revenue_percent }} %)</div>
</div>
<div style="border-right: 1px solid black; border-top: 1px solid black; padding-top: 10px; padding-top: 10px; border-left: 1px solid black; padding-top: 10px; padding-bottom: 20px; ">
	@php(@$activity = str_limit($data->activity ,75))
	@php(@$sub_activity = str_limit($data->sub_activity ,75))

<div style="width: 30%; padding-left: 5px; font-size: 14px;">9. TANGGAL PELAKSANAAN</div>
<div style="width: 70%; float: right; padding-top: -20px; font-size: 14px; ">: {{ $activity }} -<br>{{ $sub_activity }}</div>
</div>
@endforeach
@foreach ($proyek as $data)
@php(@$kontrak = ($data->nilai_addendum) + (($data->nilai_kontrak)))

@php(@$percent = $datas->revenue_percent)
@php(@$percent_kontrak =  ($kontrak * $percent / 100))

@php ($fpercent = (number_format($percent_kontrak,0,",",".").""))

@php(@$ppn = $percent_kontrak * 10 / 100)
@php ($fppn = (number_format($ppn,0,",",".").""))
@endforeach

@foreach ( $data_termin as $data)
@php (@$ftarip_unit = (number_format($datas->tarip_unit,0,",",".").""))
@php (@$fbiaya_analisa = (number_format($datas->biaya_analisa,0,",",".").""))
@php (@$fmaterai = (number_format($datas->materai,0,",",".").""))
@php (@$flain_lain = (number_format($datas->lain_lain,0,",",".").""))
@php (@$fpotongan = (number_format($datas->potongan,0,",",".").""))

@php(@$tagihan = ($percent_kontrak + $ppn + $datas->tarip_unit + $datas->biaya_analisa + $datas->materai + $datas->lain_lain) - $datas->potongan)
@php (@$ftagihan = (number_format($tagihan,0,",",".").""))
<div style="border-right: 1px solid black; border-top: 1px solid black; padding-top: 10px; padding-top: 10px; border-left: 1px solid black; padding-top: 10px; ">
<div style="width: 30%; padding-left: 5px; font-size: 14px;">10. TAGIHAN</div>
<div style="width: 70%; float: right; padding-top: -20px; font-size: 14px; ">: Rp. {{ $ftagihan }} </div>
</div>
<div style="border-right: 1px solid black; border-top: 1px solid black; padding-top: 10px;  padding-top: 10px; border-left: 1px solid black; padding-top: 10px; ">
<div style="width: 30%; padding-left: 50px; font-size: 14px;">10.1. TARIP PER UNIT</div>
<div style="width: 70%; float: right; padding-top: -20px; font-size: 14px; ">: Rp. {{ $ftarip_unit }} </div>
</div>
<div style="border-right: 1px solid black; border-top: 1px solid black; padding-top: 10px;  padding-top: 10px; border-left: 1px solid black; padding-top: 10px; ">
<div style="width: 30%; padding-left: 50px; font-size: 14px;">10.2. FEE</div>
<div style="width: 70%; float: right; padding-top: -20px; font-size: 14px; ">: Rp. {{ $fpercent }} </div>
</div>
<div style="border-right: 1px solid black; border-top: 1px solid black; padding-top: 10px;  padding-top: 10px; border-left: 1px solid black; padding-top: 10px; ">
<div style="width: 30%; padding-left: 50px; font-size: 14px;">10.3. BIAYA ANALISA</div>
<div style="width: 70%; float: right; padding-top: -20px; font-size: 14px; ">: Rp. {{ $fbiaya_analisa }} </div>
</div>
<div style="border-right: 1px solid black; border-top: 1px solid black; padding-top: 10px;  padding-top: 10px; border-left: 1px solid black; padding-top: 10px; ">
<div style="width: 30%; padding-left: 50px; font-size: 14px;">10.4. METERAI</div>
<div style="width: 70%; float: right; padding-top: -20px; font-size: 14px; ">: Rp. {{ $fmaterai }} </div>
</div>
<div style="border-right: 1px solid black; border-top: 1px solid black; padding-top: 10px;  padding-top: 10px; border-left: 1px solid black; padding-top: 10px; ">
<div style="width: 30%; padding-left: 50px; font-size: 14px;">10.5. PPN (10%)</div>
<div style="width: 70%; float: right; padding-top: -20px; font-size: 14px; ">: Rp. {{ $fppn }} </div>
</div>
<div style="border-right: 1px solid black; border-top: 1px solid black; padding-top: 10px;  padding-top: 10px; border-left: 1px solid black; padding-top: 10px; ">
<div style="width: 30%; padding-left: 50px; font-size: 14px;">10.6. LAIN-LAIN</div>
<div style="width: 70%; float: right; padding-top: -20px; font-size: 14px; ">: Rp. {{ $flain_lain }} </div>
</div>
<div style="border-right: 1px solid black; border-top: 1px solid black; padding-top: 10px;  padding-top: 10px; border-left: 1px solid black; padding-top: 10px; border-bottom: 1px solid black; ">
<div style="width: 30%; padding-left: 5px; font-size: 14px;">11. POTONGAN</div>
<div style="width: 70%; float: right; padding-top: -20px; font-size: 14px; ">: Rp. {{ $fpotongan }} </div>
</div>

<div style="padding-top: 2px; ">
<div style="width: 70%; padding-top: 10px; padding-left: 25px; font-size: 14px;"><br>ADM.OPERASI<br><br><br><br>
( {{$data->nama }} )</div>

<div style="width: 30%; float: right; margin-top: -120px; font-size: 12px; ">JAKARTA, {{ $tgl_termin_indo }}<br>
@endforeach
<br>
@foreach ($data_gm as $data)
KEPALA BAGIAN OPERASI<br><br><br><br><br><span style="color: white">_____</span>( {{ $data->nama}} )</div>
</div>
@endforeach
<div style="padding-top: 120px;" >
<div style="width: 100%; padding-left: 5px; font-size: 10px;">
<div style="width: 20%; float: left; padding: 5px; border: 1px solid black; text-align: center;">DITERIMA DIVISI/BAGIAN KEUANGAN</div><div style="width: 20%; float: left; padding: 5px; border: 1px solid black;text-align: center;">SELESAI<br><br></div><div style="width: 20%; float: left; padding: 5px; border: 1px solid black;text-align: center;">COPY UNTUK OPERASI<br><br>
</div>
</div>
</div>
<br>
<div style="padding-top: 147px; margin-top: -10px; ">
<div style="width: 100%; padding-left: 5px; font-size: 10px;">
<div style="width: 20%; float: left; padding: 5px; border: 1px solid black; text-align: left;"><br><br><br>TGL :</div><div style="width: 20%; float: left; padding: 5px; border: 1px solid black;text-align: left;"><br><br><br>TGL :</div><div style="width: 20%; float: left; padding: 5px; border: 1px solid black;text-align: left;"><br><br><br>TGL :
</div>
</div>
</div>
<div style="padding-top: 200px; ">
<div style="width: 100%; padding-left: 5px; font-size: 10px;">
<div style="width: 100%; text-align: left;">NOTE : KELENGKAPAN DATA PENDUKUNG SUPAYA DILAMPIRKAN
</div>
</div>
</div>
</body>
</html>