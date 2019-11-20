<!DOCTYPE html>
<title>EDIT TERMIN</title>
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
                      @foreach ($edit_termin as $data)
<div class="box-body" style="text-align: left;">
<a href="{{ URL('/proyek/add_termin/') }}/{{ $data->kd_proyek }}" class="btn btn-app" >
<i class="fa fa-arrow-circle-left" title="BACK" style="font-size: 32px;"></i> </a></div>
<div class="panel-heading bg-primary" style="margin-left:10px; margin-right: 10px; ">Ubah Media Invoice</div>
<div class="panel-body" style="margin-left:10px; margin-right: 10px; width: 50%;">
<form action="{{ action('Prj_terminController@update',$data->kd_termin) }}"  method="post" enctype="multipart/form-data">
{{ csrf_field() }}  
<div class="form-group">
<label for="exampleInputEmail1">ID IB :<span style="color: red; font-size: 24px;">*</span></label>
<div class='input-group date' style="margin-top: 5px;">
<input type="text" class="form-control" name="kode_ib" id="kode_ib" autocomplete="off" readonly="readonly" value="{{ $data->kode_ib}}">
<span class="input-group-addon" onclick="open_child('/add_termin/lookup_ib/{{ $data->kd_proyek }}','Look Up','1000','700'); return false;">
<span class="fa fa-ellipsis-h "></span>
</span>
</div>
<label for="exampleInputEmail1">ID PROYEK :</label>
<input type="text" class="form-control" name="kd_proyek" id="kd_proyek" readonly="readonly" value="{{ $data->kd_proyek}}">
<label for="exampleInputEmail1">ID ACTIVITY :</label>
    <input type="text" class="form-control" name="kd_activity" id="kd_activity" readonly="readonly" value="{{ $data->activity}}">
    <br>
    <div style="padding: 5px; border: 1px solid black; ">
    <label for="exampleInputEmail1"> TANGGAL PELAKSANAAN SETELAH :</label><br>
        <label for="exampleInputEmail1"> KEGIATAN</label>
                    <input type="text" class="form-control" name="activity" id="activity" readonly="readonly" value="{{ $data->activity}}">
                    <label for="exampleInputEmail1">SUB KEGIATAN :</label>
                    <input type="text" class="form-control" name="sub_activity" id="sub_activity" readonly="readonly" value="{{ $data->sub_activity}}">
                    <label for="exampleInputEmail1">DUE DATE:</label>
                    <input type="text" class="form-control" name="date" id="date" readonly="readonly" value="{{ $data->date}}">
                  </div>
@foreach ($proyek as $data)
@php(@$kontrak = ($data->nilai_addendum) + (($data->nilai_kontrak)))
@endforeach
                      @php ($nilai_kontrak = (number_format($data->nilai_kontrak,0,",",".").""))
                      @php ($nilai_addendum = (number_format($data->nilai_addendum,0,",",".").""))
                      @php ($fkontrak = (number_format($kontrak,0,",",".").""))
                    <text style="color: blue;">Nilai Kontrak</text><input type="text" class="form-control" readonly="readonly" value="{{ $nilai_kontrak }}" style="width: 30%;">
                    <text style="color: blue;">Nilai Addendum</text><input type="text" class="form-control" readonly="readonly" value="{{ $nilai_addendum }}" style="width: 30%;">
                    <text style="color: blue;">Total Nilai</text><input type="text" class="form-control" readonly="readonly" value="{{ $fkontrak }}" style="width: 30%;">
@foreach( $edit_termin as $data )
<label for="exampleInputEmail1">PERSENTASE TAGIHAN :<span style="color: red; font-size: 24px;">*</span></label>
<div class='input-group date' style="width: 20%; margin-top: 5px">
<input type="number" class="form-control" name="revenue_percent" id="revenue_percent"  value="{{ $data->revenue_percent }}">
<span class="input-group-addon" id="date">
<span class="fa fa-percent"></span></span>
</div>

<label for="exampleInputEmail1">TERMIN KE :<span style="color: red; font-size: 24px;">*</span></label>
<div class='input-group date' >
          <select  name="termin_ke" class="form-control" >
            <option value="{{ $data->termin_ke }}" class="bg-aqua">{{ $data->termin_ke }}</option>
            <option value="1" >1</option>
            <option value="2" >2</option>
            <option value="3" >3</option>
            <option value="4" >4</option>
            <option value="5" >5</option>
            <option value="6" >6</option>
            <option value="7" >7</option>
            <option value="8" >8</option>
            <option value="9" >9</option>
            <option value="10" >10</option>
          </select>
</div>

<label for="exampleInputEmail1">NOMOR MEDIA INVOICE :<span style="color: red; font-size: 24px;">*</span></label>
<input type="text" class="form-control" name="kd_mdi" id="kd_mdi" value="{{ $data->kd_mdi }}">

<label for="exampleInputEmail1">NOMOR ORDER :</label>
<input type="text" class="form-control" name="no_order" id="no_order" value="{{ $data->no_order }}">
<label for="exampleInputEmail1">NOMOR SERTIFIKAT/LAPORAN :</label>
<input type="text" class="form-control" name="no_sertifikat" id="no_sertifikat" value="{{ $data->no_sertifikat}}">
                    <label for="exampleInputEmail1">TANGGAL SERTIFIKAT/LAPORAN:</label>
<div class='input-group date' style="width: 70%; margin-top: 5px">
<input name="tgl_sertifikat" id="tgl_sertifikat" class="input-group datepicker form-control" date="" data-date-format="yyyy-mm-dd" type="text"  placeholder="Target Activity" autocomplete="off" value="{{ $data->tgl_sertifikat}}" id="date" readonly >
<span class="input-group-addon" id="tgl_sertifikat">
<span class="fa fa-calendar"></span></span>
</div>
<label for="exampleInputEmail1">JENIS/JUMLAH KOMODITI :</label>
<input type="text" class="form-control" name="jml_komoditi" id="jml_komoditi" value="{{ $data->jml_komoditi}}">
<br>
<div style="border: 1px solid black; padding: 10px;">
 <label for="exampleInputEmail1">TARIP PER UNIT :</label>
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
<input class="form-control" type="number" name="tarip_unit" value="{{ $data->tarip_unit}}"
onkeyup="document.getElementById('tarip_unit').innerHTML = formatCurrency(this.value);"  />
<span class="input-group-addon" style="background-color: black; color: white; font-weight: bold;  font-family:'digital-clock-font';">
<span  id="tarip_unit"></span></span>
</div>
 <label for="exampleInputEmail1">BIAYA ANALISA :</label>
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
<input class="form-control" type="number" name="biaya_analisa" value="{{ $data->biaya_analisa}}"
onkeyup="document.getElementById('biaya_analisa').innerHTML = formatCurrency(this.value);"  />
<span class="input-group-addon" style="background-color: black; color: white; font-weight: bold;  font-family:'digital-clock-font';">
<span  id="biaya_analisa"></span></span>
</div>
<label for="exampleInputEmail1">METERAI :</label>
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
<input class="form-control" type="number" name="materai" value="{{ $data->materai}}"
onkeyup="document.getElementById('materai').innerHTML = formatCurrency(this.value);"  />
<span class="input-group-addon" style="background-color: black; color: white; font-weight: bold;  font-family:'digital-clock-font';">
<span  id="materai"></span></span>
</div>
<label for="exampleInputEmail1">LAIN-LAIN :</label>
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
<input class="form-control" type="number" name="lain_lain" value="{{ $data->lain_lain}}"
onkeyup="document.getElementById('lain_lain').innerHTML = formatCurrency(this.value);"  />
<span class="input-group-addon" style="background-color: black; color: white; font-weight: bold;  font-family:'digital-clock-font';">
<span  id="lain_lain"></span></span>
</div>
</div>
<div style="border: 1px solid red; padding: 10px;">
<label for="exampleInputEmail1" style="color: red;">POTONGAN :</label>
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
<input class="form-control" type="number" name="potongan" value="{{ $data->potongan}}"
onkeyup="document.getElementById('potongan').innerHTML = formatCurrency(this.value);"  />
<span class="input-group-addon" style="background-color: black; color: white; font-weight: bold;  font-family:'digital-clock-font';">
<span  id="potongan"></span></span>
</div>
</div>
<br>
<label for="exampleInputEmail1">ADMIN :<span style="color: red; font-size: 24px;">*</span></label>
<div class='input-group date' style="width: 50%; margin-top: 5px">
<input type="hidden" name="admin" id="kode" value="{{ $data->admin }}">
<input type="text" class="form-control"  id="nama" value="{{ $data->nama }}" readonly="readonly" >
 <span class="input-group-addon" onclick="open_child('/pem_tender/lookup/lookup_karyawan','Look Up','1500','500'); return false;">
<span class="fa fa-ellipsis-h "></span>
</span>
</div>
<input type="text" class="form-control" style="width: 50%; padding-top: 5px;" id="email" readonly="readonly" value="{{ $data->email }}" placeholder="">
<input type="text" class="form-control" style="width: 50%; padding-top: 5px;" id="jabatan" readonly="readonly" value="{{ $data->jabatan }}" placeholder="">
<br>
<label for="exampleInputEmail1">TERMIN STATUS :<span style="color: red; font-size: 24px;">*</span></label>
<div class='input-group date' >
          <select  name="termin_status" class="form-control" value="{{ $data->termin_status}}">
            <option value="{{ $data->termin_status }}" class="bg-aqua">---</option>
            <option value="close" >Sudah Ditagihkan</option>
            <option value="open" >Belum Ditagihkan</option>
          </select>
</div>
<br>
     <button type="submit" class="btn btn-sm btn-raised btn-primary">Simpan</button>
    </form>
</div>
</div>
@endforeach
@endforeach
<br>

<div class="panel-heading bg-primary" style="margin-left:10px; margin-right: 10px; ">Daftar Media Invoice</div><div class="panel-body" style="margin-left:10px; margin-right: 10px; ">
<table class="table table-bordered table-hover" style="font-size:12px; color: black;">
<thead class="bg-aqua">
      <tr>
            <td rowspan="2" ><strong>NO</strong></td>
            <td rowspan="2" ><strong>ID</strong></td>
            <td rowspan="2"  align="center"><strong>PELAKSANAAN SETELAH</strong></td>
            <td rowspan="2" align="center"><strong>PERSENTASE<br>TAGIHAN(%)</strong></td>
                        <td rowspan="2" align="center"><strong>KE-</strong></td>
            <td rowspan="2" align="center"><strong>STATUS</strong></td>
                        <td rowspan="2" align="center"><strong>NO.MDI</strong></td>
                        <td rowspan="2" align="center"><strong>NO.ORDER</strong></td>
                        <td rowspan="2" align="center"><strong>NO.SERTIFIKAT</strong></td>
                        <td rowspan="2" align="center"><strong>JENIS/JUMLAH<br>KOMODITI</strong></td>

 <td rowspan="2" align="center"><strong>RINCIAN</strong></td>
            <td ></td>
      <tr>
</thead>


        @php(   $no = 1 {{-- buat nomor urut --}}  )
        {{-- loop all legalitas --}}
        @foreach ($data_termin as $datas)
@php($percent = $datas->revenue_percent)
@php($percent_kontrak =  ($kontrak * $percent / 100))

@php ($fpercent = (number_format($percent_kontrak,0,",",".").""))

@php(@$ppn = $percent_kontrak * 10 / 100)
@php ($fppn = (number_format($ppn,0,",",".").""))

@php (@$ftarip_unit = (number_format($datas->tarip_unit,0,",",".").""))
@php (@$fbiaya_analisa = (number_format($datas->biaya_analisa,0,",",".").""))
@php (@$fmaterai = (number_format($datas->materai,0,",",".").""))
@php (@$flain_lain = (number_format($datas->lain_lain,0,",",".").""))
@php (@$fpotongan = (number_format($datas->potongan,0,",",".").""))

@php(@$tagihan = ($percent_kontrak + $ppn + $datas->tarip_unit + $datas->biaya_analisa + $datas->materai + $datas->lain_lain) - $datas->potongan)
@php (@$ftagihan = (number_format($tagihan,0,",",".").""))
@php($today  = date("Y-m-d"))
<tr>
<td>{{ $no++ }}</td>

            <td>{{ $datas->kd_termin }}<br>{{ $datas->kode_ib }}<br> {{ $datas->kd_activity }}</td>
            <td style="width: 15%;">{{ $datas->activity }} -<br>{{ $datas->sub_activity }}<br>            @if ($today > $datas->date)<hr><span style="padding: 5px" class="bg-danger">Due Date : {{ $datas->date }}</span>
            @else
            <hr><span style="padding: 5px" class="bg-success">Due Date : {{ $datas->date }}</span>
            @endif</td>
            <td align="center">{{ $datas->revenue_percent }} % </td>
            <td>{{ $datas->termin_ke }} </td>
@if ($datas->termin_status == "close")
@php ($termin_status = "Sudah Ditagihkan")
@elseif ($datas->termin_status == 'open')
@php ($termin_status = "Belum Ditagihkan")
@endif
            <td><span style="padding: 5px;">{{ $termin_status }} </span></td>
            <td>{{ $datas->kd_mdi }}</td>
            <td>{{ $datas->no_order }}</td>
            <td>{{ $datas->no_sertifikat }}<br>{{ $datas->tgl_sertifikat }}</td>
                        <td>{{ $datas->jml_komoditi }}</td>

            <td><span class="btn-success" style="padding: 5px;"> TAGIHAN : {{ $ftagihan }} </span><br>
            <span class="btn-info" style="padding: 5px;"> 1.TARIP PER UNIT : {{ $ftarip_unit }} </span>
            <br>
            <span class="btn-info" style="padding: 5px;"> 2.FEE : {{ $fpercent }} </span>
            <br>
            <span class="btn-info" style="padding: 5px;"> 3.BIAYA ANALISA : {{ $fbiaya_analisa }} </span>
            <br>
            <span class="btn-info" style="padding: 5px;"> 4.METERAI : {{ $fmaterai }} </span>
            <br>
            <span class="btn-info" style="padding: 5px;"> 5.PPN (10%) : {{ $fppn }} </span>
            <br>
             <span class="btn-info" style="padding: 5px;"> 6.LAIN-LAIN :  {{ $flain_lain }} </span>
            <br>
            <span class="btn-danger" style="padding: 5px;"> POTONGAN : {{ $fpotongan }} </span>
            </td>

            <td align="center"><a href="{{ URL('/proyek/edit_termin/') }}/{{ $datas->kd_proyek }}/{{ $datas->kode_ib }}/{{ $datas->kd_termin }}" >
        <button class="btn btn-sm btn-raised btn-info" onclick="return" title="Ubah" style="margin-bottom: 5px;" confirm('Yakin mau ubah data ?')"  type="submit">
        <i class="fa fa-edit"></i></button></a>
        @if(checkPermission(['superadmin']))
        <br>
        <form action="{{action('Prj_terminController@destroy',['kode_ib' => $datas->kode_ib])}}" method="post">
         {{ csrf_field() }}
        <input name="_method" type="hidden" value="PATCH">
        <button class="btn btn-sm btn-raised btn-danger" title="Hapus" onclick="return confirm('Yakin mau hapus data ?')" type="submit">
        <i class="fa fa-trash-o"></i> 
        </button>
        </form>
                        @endif
<br>
<a href="{{ URL('/termin/print/') }}/{{ $datas->kd_termin }}/{{ $datas->kd_proyek }}" target="_blank">
        <button class="btn btn-sm btn-raised bg-blue" onclick="return" title="Cetak Media Invoice" style="margin-bottom: 5px;" confirm('Yakin mau update data ?')"  type="submit">
        <i class="fa fa-print"></i></button></a></td>
@endforeach
</tr>

    </tbody>
</table>
    </div>
</section>
    </div>
</body>
 <script type="text/javascript">
  $(function() {
$("#tgl_sertifikat").datepicker();
  });
  </script>