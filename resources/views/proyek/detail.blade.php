<!DOCTYPE html>
<title>DETAIL</title>
<body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
      <section class="wrapper" style="background-color: white;">
                @include('partials/header2')
          @include('partials.sidebar')
       <div class="content-wrapper">
    <section class="content" style="background-color: white;">

      @include('alert.flash-message')
        @php ($date_now = date('Y-m-d'))
        @php(
          $no = 1 {{-- buat nomor urut --}}
          )
        {{-- loop all pengalaman --}}
        @foreach ($proyek as $data)
        @php(@$kd_proyek = $data->kd_proyek)
        @if (empty($data->kontrak_mulai))
        @php  ( $kontrak_mulai = '')
        @else
        @php  ( $kontrak_mulai = date('d M Y', strtotime($data->kontrak_mulai)))
        @endif
        @if (empty($data->kontrak_selesai))
        @php  ( $kontrak_selesai = '')
        @else
        @php  ( $kontrak_selesai = date('d M Y', strtotime($data->kontrak_selesai)))
        @endif
                @if (empty($data->addedum_mulai))
        @php  ( $addendum_mulai = '')
        @else
        @php  ( $addendum_mulai = date('d M Y', strtotime($data->addedum_mulai)))
        @endif
                        @if (empty($data->addendum_selesai))
        @php  ( $addendum_selesai = '')
        @else
        @php  ( $addendum_selesai = date('d M Y', strtotime($data->addendum_selesai)))
        @endif

        @if (empty($data->nilai_kontrak))
        @php  ( $nilai_kontrak = '')
        @else
        @php ($nilai_kontrak = (number_format($data->nilai_kontrak,0,",",".").""))
        @endif

        @if (empty($data->nilai_addendum))
        @php  ( $nilai_addendum = '')
        @else
        @php ( $nilai_addendum = (number_format($data->nilai_addendum,0,",",".").""))
        @endif
          <div class="box-body" style="text-align: left;">
            <a href="{{ URL('/proyek') }}" class="btn btn-app" >
                <i class="fa fa-arrow-circle-left" title="BACK TO LIST" style="font-size: 32px;"></i></a>
<div style="float: right;">
<a href="#hasil1" data-toggle="modal" class="btn btn-app">
   <i class="fa fa-users"></i> Team
</a>
</div>
<div style="float: right;">

<div class="Update_Proyek">

@if(checkPermission(['admin','superadmin']))
              <a data-toggle="modal" href="#Update_Proyek" class="btn btn-app" >
                <i class="fa fa-edit"  title="EDIT PROYEK"></i> Edit
              </a>
@endif
</div>
</div>
<div style="float: right;">
        @foreach ($proyek as $datas)
@if(checkPermission(['superadmin']))
        <form action="{{action('PrjController@destroy',['kd_proyek' => $datas->kd_proyek])}}" method="post">
         {{ csrf_field() }}
        <input name="_method" type="hidden" value="PATCH">
        <button class="btn btn-app" title="delete" onclick="return confirm('Yakin mau hapus data project ini, Seluruh data yang terhubung dengan project ini juga akan di hapus!!')" type="submit">
        <i class="fa fa-trash-o"></i> Delete
        </button>
        </form>
        @endif
@endforeach
</div>

<header class="bg-primary detail" >
        <strong>DETAIL PROYEK -   {{ $kd_proyek}}       
         @php ($today = date('Y-m-d'))
          @if ($data->proyek_status == "open" AND $today > $data->kontrak_selesai )
          <span style="padding: 5px; border-radius: 3px; float: right; font-size: 24px;" class="bg-yellow">Berjalan </span>
          @elseif ($data->proyek_status == "open")
          <span style="padding: 5px; border-radius: 3px; float: right; font-size: 24px;" class="bg-green">Berjalan </span>
          @elseif ($data->proyek_status == "close")
          <span style="padding: 5px; border-radius: 3px; float: right; font-size: 24px;" class="bg-red">Selesai </span>
          @endif<br>
          <i><a href="{{ URL('/pengalaman/detail') }}/{{ $data->kd_pengalaman}}" target="_blank" style="color: white;"> Lihat Pengalaman</a></i></strong></header>
<div style="padding: 10px;"></div>
         <div class="info-box " style="width: 90%;">
            <span class="info-box-icon" style="background-color: white;"><i class="fa fa-building"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">NAMA KLIEN</span>
              <span class="info-box-number">{{$data->nama_klien}}</span>
                <div class="progress">
                <div class="progress-bar"></div>
              </div>
                             <span class="info-box-text">ALAMAT</span>
              <span class="info-box-number">{{ $data->alamat }}</span>
              <div class="progress">
                <div class="progress-bar"></div>
              </div>
                             <span class="info-box-text">TELP</span>
              <span class="info-box-number">{{ $data->telp_fax }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
       <div class="col-md-3">
                  <!-- /.info-box -->
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fa fa-tasks"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><strong>NAMA PEKERJAAN :</strong> </span>
              <span class="info-box-number" style="font-size: 12px;">{{$data->nama_pekerjaan}}</span>
              <hr>
                            <span class="info-box-text"><strong>SUB PEKERJAAN :</strong></span>
                                          <span class="info-box-number" style="font-size: 12px;">{{$data->sub_pekerjaan}}</span>


            </div>
            <!-- /.info-box-content -->
          </div>
                   <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fa fa-exchange"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><strong>RINGKASAN RUANG LINGKUP</strong></span>
              <hr>
              <span class="info-box-number" style="font-size: 12px;">{{$data->ringkasan_lingkup}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
        </div>
              <div class="col-md-3">
                  <!-- /.info-box -->
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fa fa-location-arrow"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><strong>LOKASI PEKERJAAN</strong></span>
              <hr>
              <span class="info-box-number" style="font-size: 12px;"> {{ $data->lokasi_pekerjaan }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fa fa-handshake-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><strong>GRUP JASA :</strong></span>
              <span class="info-box-number" style="font-size: 12px;">{{$data->kelompok_jasa}}</span>
              <hr>
               <span class="info-box-text"><strong>SUB JASA :</strong></span>
              <span class="info-box-number" style="font-size: 12px;">{{$data->sub_jasa}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
        </div>
                <div class="col-md-3" >
                  <!-- /.info-box -->
          <div class="info-box bg-blue">
            <span class="info-box-icon"><i class="fa fa-money"></i></span>
@foreach ($proyek as $data)
@php(@$kontrak = ($data->nilai_addendum) + (($data->nilai_kontrak)))
@php ( @$fkontrak = (number_format($kontrak,0,",",".").""))
@endforeach
            <div class="info-box-content">
              <span class="info-box-text"><strong>NILAI KONTRAK :</strong></span>
              <span class="info-box-number" style="font-size: 12px;"> {{$nilai_kontrak}}</span>
               <span class="info-box-text"><strong>NILAI ADDENDUM :</strong></span>
              <span class="info-box-number" style="font-size: 12px;"> {{$nilai_addendum}}</span>
              <span class="info-box-text"><strong>TOTAL NILAI :</strong></span>
              <span class="info-box-number" style="font-size: 12px;"> {{$fkontrak}}</span>
                            <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
              <span class="progress-description">
                    <i>Sebelum PPN</i>
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <div class="info-box bg-blue">
            <span class="info-box-icon"><i class="fa fa-file"></i></span>

<div class="info-box-content">
              <span class="info-box-text"><strong>TANGGAL KONTAK:<strong></span>
              <span class="info-box-number" style="font-size: 12px;"> {{ $kontrak_mulai }} <i class="fa fa-arrow-right"></i> {{ $kontrak_selesai }}</span>
        <span class="info-box-text"><strong>TANGGAL ADDENDUM:</strong></span>
  <span class="info-box-number" style="font-size: 12px;"> {{$addendum_mulai}} <i class="fa fa-arrow-right"></i> {{$addendum_selesai}}
                            </span>

@php(  $mulai = new DateTime($data->kontrak_mulai) )
@php(  $selesai = new DateTime($data->addendum_selesai) )
@php(  $diff = $selesai->diff($mulai))
@php(  $tahun = $diff->y )
@php(  $bulan = $diff->m )  
@php(  $hari = $diff->d )  
            <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
              @if ($data->kontrak_mulai > 0)
              <span class="progress-description" style="font-size: 12px;"><i>{{ $tahun." Tahun"}} {{ $bulan." Bulan"}} {{ $hari." Hari"}}</i></span>
                 @else
                <div></div>
                 @endif
            </div>
            <!-- /.info-box-content -->
          </div>
</div>
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="hasil1" class="modal fade">
                <div class="col-md-12" style="margin-top: 50px; background-color: #eeeeee">
       <span class="info-box-icon"><i class="fa fa-users"></i></span>
<div style="text-align: right; padding: 10PX;" >
        @if(checkPermission(['admin','superadmin']))
 <a href="{{ URL('proyek/add_team') }}/{{ $data->kd_proyek }}" class="btn btn-app"onclick="return confirm('Yakin mau Ubah data ?')"   title="MANAGE TEAM" confirm('Yakin mau ubah data ?')" type="submit">
                                <i class="fa fa-gear"></i> Setting
</a>
        @endif
</div>

<table id="example1" class="table table-bordered table-striped" style="background-color: white; color: black; padding-top: 30px;">
<thead class="bg-aqua">
<td>No.</td>
<td style="width: 30%; text-align: center;"><text style="font-weight : bold;">PROJECT MANAGER</text></td><td style="width: 30%;text-align: center;"><text style="font-weight : bold;">KONSULTAN</text></td><td style="width: 30%;text-align: center;"><text style="font-weight : bold;">TENAGA AHLI</text></td>
</thead>
<tr></tr>
<td>1</td>@foreach ($data_pm as $data) <td>{{ $data->nama }}  / {{ $data->email }}</td> @endforeach @foreach ($data_konsultan1 as $data) <td>{{ $data->nama }} / {{ $data->email }}</td> @endforeach @foreach ($data_ta1 as $data) <td>{{ $data->nama }} / {{ $data->email }} / {{ $data->status }} </td> @endforeach
<tr></tr>
<td>2</td>@foreach ($data_pm as $data) <td></td> @endforeach @foreach ($data_konsultan2 as $data) <td>{{ $data->nama }} / {{ $data->email }}</td> @endforeach @foreach ($data_ta2 as $data) <td>{{ $data->nama }} / {{ $data->email }} / {{ $data->status }} </td> @endforeach
<tr></tr>
<td>3</td>@foreach ($data_pm as $data) <td></td> @endforeach @foreach ($data_konsultan3 as $data) <td>{{ $data->nama }} / {{ $data->email }}</td> @endforeach @foreach ($data_ta3 as $data) <td>{{ $data->nama }} / {{ $data->email }} / {{ $data->status }} </td> @endforeach
<tr></tr>
<td>4</td><td></td>@foreach ($data_konsultan4 as $data) <td>{{ $data->nama }} / {{ $data->email }}</td> @endforeach @foreach ($data_ta4 as $data) <td>{{ $data->nama }} / {{ $data->email }} / {{ $data->status }} </td> @endforeach
<tr></tr>
<td>5</td><td></td>@foreach ($data_konsultan5 as $data) <td>{{ $data->nama }} / {{ $data->email }}</td> @endforeach @foreach ($data_ta5 as $data) <td>{{ $data->nama }} / {{ $data->email }} / {{ $data->status }} </td> @endforeach
</table>
</div>
</div>
<div style="height: 50px; padding-top: 50px;">
                <div class="col-md-12 " style="margin-top: 50px; background-color: #eeeeee;">
                            <span class="info-box-icon"><i class="fa fa-bar-chart" style="color: white;"></i></span>
<div style="text-align: right; padding: 10PX;" >
  @foreach ($proyek as $data)
 <a href="{{ URL('proyek/add_termin') }}/{{ $data->kd_proyek }}" class="btn btn-app"onclick="return confirm('Yakin mau Ubah data ?')"   title="Manage Media Invoice" confirm('Yakin mau ubah data ?')" type="submit">
                                <i class="fa fa-barcode"></i> Tagihan
</a>
@endforeach
</div>

@endforeach
<table class="table table-bordered table-striped" style="font-size:12px; color: black; background-color: white;">
  <thead class="bg-aqua">
  <th class="bg-primary" colspan="12" style="text-align: center;"><text>DAFTAR TAGIHAN</text></th></tr>
      <tr>
            <td rowspan="2" ><strong>NO</strong></td>
            <td rowspan="2" ><strong>ID</strong></td>
                        <td rowspan="2" ><strong>ADMIN</strong></td>

            <td rowspan="2"  align="center"><strong>PELAKSANAAN SETELAH</strong></td>
            <td rowspan="2" align="center"><strong>PERSENTASE<br>TAGIHAN(%)</strong></td>
                        <td rowspan="2" ="center"><strong>KE-</strong></td>
            <td rowspan="2" align="center"><strong>STATUS</strong></td>
                        <td rowspan="2" align="center"><strong>NO.MDI</strong></td>
                        <td rowspan="2" align="center"><strong>NO.ORDER</strong></td>
                        <td rowspan="2" align="center"><strong>NO.SERTIFIKAT</strong></td>
                        <td rowspan="2" align="center"><strong>JENIS/JUMLAH<br>KOMODITI</strong></td>

<td>RINCIAN</td>
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

@php(@$today  = date("Y-m-d"))

<tr>
<td>{{ $no++ }}</td>
            <td>{{ $datas->kd_termin }}<br>{{ $datas->kode_ib }}<br> {{ $datas->kd_activity }}</td>
            <td>{{ @$datas->admin }} </td>
            <td style="width: 15%;">{{ $datas->activity }} -<br>{{ $datas->sub_activity }}<br>            @if ($today > $datas->date)<span style="padding: 5px;" class="bg-danger">Due Date : {{ $datas->date }}</span>
            @else
            <span style="padding: 5px" class="bg-success">Due Date : {{ $datas->date }}</span>
            @endif</td>
            <td align="center">{{ $datas->revenue_percent }} % </td>
            <td>{{ $datas->termin_ke }} </td>
@if ($datas->termin_status == "close")
@php ($termin_status = "Sudah Ditagihkan")
@elseif ($datas->termin_status == "open")
@php ($termin_status = "Belum Ditagihkan")
@endif
<td>{{ $termin_status }}</td>
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

</tr>
@endforeach
    </tbody>
</table>
<div style="text-align: right; padding: 10PX;" >
@if(checkPermission(['admin','superadmin']))
              <a href="{{ URL('proyek/add_ib') }}/{{ $data->kd_proyek }}" class="btn btn-app"onclick="return confirm('Yakin mau Ubah data ?')"  title="MANAGE INTERNAL BUDGET" confirm('Yakin mau ubah data ?')" type="submit">
           <i class="fa fa-money"></i> Budgeting
</a>
        @endif
            <a href="{{ URL('proyek/uudp') }}/{{ $data->kd_proyek }}" target="_blank" class="btn btn-app"onclick="return confirm('Yakin mau Ubah data ?')"  title="MANAGE INTERNAL BUDGET" confirm('Yakin mau ubah data ?')" type="submit" ><i class="fa fa-calculator"></i> UUDP
            </a>
              <a href="{{ URL('proyek/sppd') }}/{{ $data->kd_proyek }}" target="_blank" class="btn btn-app"onclick="return confirm('Yakin mau Ubah data ?')"  title="Ubah" confirm('Yakin mau ubah data ?')" type="submit">
                <i class="fa fa-ship"></i> SPPD
              </a>
      </div>

<table class="table table-bordered table-striped" style="font-size:12px; color: black; background-color: white;">
  <thead class="bg-aqua">
<tr>
<th class="bg-primary" colspan="13" style="text-align: center;"><text>IB PERLU PERSETUJUAN</text></th></tr>
<tr>
                            <td rowspan="2" ><strong>NO</strong></td>
                    <td rowspan="2" ><strong>ID COST</strong></td>
            <td rowspan="2" ><strong>ID IB</strong></td>
            <td rowspan="2" ><strong>ID ACT</strong></td>
            <td rowspan="2"><strong>KEGIATAN</strong></td>
            <td rowspan="2"><strong>SUB KEGIATAN</strong></td>
            <td rowspan="2"><strong>ITEM BIAYA</strong></td>
            <td rowspan="2"><strong>BIAYA</strong></td>
            <td rowspan="2"><strong>VOL</strong></td>
                         <td rowspan="2"><strong>TAMBAHAN BIAYA</strong></td>
                         <td rowspan="2"><strong>KETERANGAN</strong></td>
                        <td rowspan="2"><strong>STATUS</strong></td>
            <tr>
            </thead>
        @php(   $no = 1 {{-- buat nomor urut --}}  )
        {{-- loop all legalitas --}}
        @foreach ($cost_need_approve as $datas)

                    <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $datas->kd_cost }} </td>
            <td>{{ $datas->kode_ib }} </td>
            <td>{{ $datas->kd_activity }} </td>
            <td>{{ $datas->activity }} </td>
            <td>{{ $datas->sub_activity }} </td>
                                    <td>{{ $datas->cost_activity }} </td>
                                                                        <td>{{ $datas->cost }} </td>
                                    <td>{{ $datas->volume }} </td>
            <td>{{ $datas->cost_extend }} </td>
            <td>{{ $datas->note }} </td>
@if ( $datas->cost_status == "Approved" )
  <td class="bg-success"></i> {{ $datas->cost_status }}</td>
@elseif ( $datas->cost_status == "Pending" )
  <td class="bg-warning"> Need Approve</td>
@else 
  <td class="bg-danger" ><i class="bg-danger" style="font-size: 16px;"></i> {{ $datas->cost_status }}</td>
@endif
</tr>
@endforeach
    </tbody>
</table>
<table class="table table-bordered table-striped" style="font-size:12px; color: black; background-color: white;">

<thead class="bg-aqua">
<th colspan="20" style="text-align: center;" colspan="9" class="bg-primary"><text style="font-weight : bold;">BUDGET & ACTUAL REVENUE</text></th><tr></tr>
<td rowspan="2">No</td>
<td style="text-align: center;" rowspan="2" colspan="3"><text style="font-weight : bold;">KEGIATAN</text></td>
<td style="text-align: center;" rowspan="2"><text style="font-weight : bold;">VOL</text></td>
<td style="text-align: center;"rowspan="2"><text style="font-weight : bold;">BIAYA</text></td>
<td rowspan="2" style="width: 7%;"><strong>DUE DATE</strong></td>

<td colspan="10" style="text-align: center;"><text style="font-weight : bold;">PERSENTASE % DARI {{ $fkontrak }}</text></td>
<td style="text-align: center; width: 7%;" rowspan="2"><text style="font-weight : bold;">BUDGET</text></td>
<td style="text-align: center; width: 5%;" rowspan="2" ><text style="font-weight : bold;">OVER BUDGET</text></td>
<td style="text-align: center; width: 3%;" rowspan="2" ><text style="font-weight : bold;">STATUS</text></td><tr>

@foreach ($data_termin2 as $datas)
@php  ($newDate = date("M / Y", strtotime($datas->date)))
<td>{{ $newDate }}</td>
  @endforeach
    <td><text style="font-weight : bold;">TOTAL PENDAPATAN </text></td>

<tr>
<td colspan="7"></td>
  @foreach ($data_termin2 as $datas)
<td >{{ $datas->revenue_percent }} %</td>
  @endforeach
   </thead>
<tr>
          @php(   $no = 1 {{-- buat nomor urut --}}  )
        {{-- loop all legalitas --}}
@foreach ($cost_approved as $datas)
@php ($fcost = (number_format($datas->cost,0,",",".").""))

@php ( $total_cost = ($datas->volume * $datas->cost))
@php ( $ftotal_cost = (number_format($total_cost,0,",",".").""))

@php (@$grand_total_cost += ($total_cost))
@php ( @$fgrand_total_cost = (number_format($grand_total_cost,0,",",".").""))


<td style="width: 2%">{{ $no++ }}</td>
<td style="width: 10%">{{ $datas->activity }} </td>
<td style="width: 10%">{{ $datas->sub_activity }} </td>
                                    <td style="width: 10%">{{ $datas->cost_activity }} </td>
                                    <td style="width: 2%; text-align: center;">{{ $datas->volume }} </td>
                                    <td style="width: 7%; text-align: center;">{{ $fcost}} </td>
            @if (@$today > $datas->date)
                                    <td style="width : 6%" ><span style="padding: 5px" class="bg-danger">{{ $datas->date }}</span> </td>
            @else
                                    <td style="width : 6%" ><span style="padding: 5px" class="bg-success">{{ $datas->date }}</span> </td>
            @endif

<td colspan="10"></td>
<td >{{ $ftotal_cost }}</td>

@php ( @$cost_extend = (number_format($datas->cost_extend,0,",",".").""))
@php ( @$total_cost_extend += ($datas->cost_extend))
@php ( @$ftotal_cost_extend = (number_format($total_cost_extend,0,",",".").""))
<td > {{ $cost_extend }} </td>

  @if ( $datas->cost_status == "Approved" )
  <td class="bg-success"></i> {{ $datas->cost_status }}</td>
@elseif ( $datas->cost_status == "Pending" )
  <td class="bg-warning"> Need Approve</td>
  @else 
  <td class="bg-danger" ><i class="bg-danger" style="font-size: 16px;"></i> {{ $datas->cost_status }}</td>
@endif
<tr></tr>
@endforeach
<td colspan="7" align="left"><text style="font-weight: bold;"> TOTAL REVENUE </text></td>
@foreach ($data_termin2 as $datas)
@php(@$percent = $datas->revenue_percent)
@php(@$percent_kontrak =  ($kontrak * $percent / 100))
@php ($fpercent = (number_format($percent_kontrak,0,",",".").""))


@if ($percent_kontrak >= 0)
@php (@$total_percent_kontrak += ($percent_kontrak))
@php (@$ftotal_percent_kontrak = (number_format($total_percent_kontrak,0,",",".").""))
@else 
@php (@$ftotal_percent_kontrak = 0 )
@php (@$total_percent_kontrak = 0 )
@endif

<td >{{ $fpercent }}</td>
  @endforeach

    @php ( @$grand_total = ($total_percent_kontrak - $grand_total_cost ))


  @php ($fgrand_total = (number_format(@$grand_total,0,",",".").""))

<td class="bg-info"><text style="font-weight : bold; ">{{@$ftotal_percent_kontrak}}</text></td><tr>
<td colspan="7"><text style="font-weight: bold;">TOTAL BUDGET</text></td><td colspan="10"></td>
<td style="font-weight : bold;" class="bg-warning"> {{ @$fgrand_total_cost}} </td><tr>
<td colspan="7" align="left"><text style="font-weight: bold;">OVER BUDGET</text></td><td colspan="10"></td>
<td  style="font-weight : bold;" class="bg-"></td><td  style="font-weight : bold;" class="bg-danger"> {{ @$ftotal_cost_extend }}</td><td ></td>
<tr>

  @php ( @$all_cost = ($grand_total_cost + $total_cost_extend))
@php ( @$profit = (($total_percent_kontrak) - ($all_cost)))
  @php ($fprofit = (number_format(@$profit,0,",",".").""))

  @php (@$profit_percent = $profit / $kontrak * 100)
    @php (@$profit_percent_exc = $grand_total / $kontrak * 100)


<td colspan="7" align="left"><text style="font-weight: bold;">ESTIMASI PROFIT : {{ $profit_percent_exc }} % <small style="color: red;"> Exclude Over Budget </small></text></td><td colspan="10"></td>
<td >  </td><td ></td>

<td style="font-weight : bold;" class="bg-success"> {{ $fgrand_total}} </td>
<tr></tr>
<td colspan="7" align="left"><text style="font-weight: bold;">ESTIMASI PROFIT : {{ $profit_percent }} % <small style="color: red;"> Include Over Budget </small></text></td><td colspan="10"></td>
<td  style="font-weight : bold;" > </td><td></td>

<td style="font-weight : bold;" class="bg-success">{{ $fprofit }} </td>
<tr>
</tbody>
</table>

<br>
        @foreach ($data_uudp as $datas)
@php( @$total_uudp += $datas->nilai_uudp )
      @endforeach

        @foreach ($data_sppd as $datas)
@php( @$total_sppd += $datas->nilai_uudp )
      @endforeach

@php($total_biaya = (@$total_uudp + @$total_sppd))

@php( @$total_uudp += $datas->nilai_uudp )
@foreach ($budget as $datas)
@php( @$cost_total = ($datas->cost * $datas->volume) + $datas->cost_extend )

@php( @$total_budget += $cost_total )


  @php ($ftotal_biaya = (number_format(@$total_biaya,0,",",".").""))


@php( @$sisa_budget = ($total_budget - $total_biaya))
  @php ($fsisa_budget = (number_format(@$sisa_budget,0,",",".").""))


  @php (@$ftotal_budget = (number_format($total_budget,0,",",".").""))
  @endforeach
<div class="panel-heading bg-primary" style="width: 100%">
<div style="width: 20%">TOTAL BUDGET : Rp. {{ @$ftotal_budget }}</div>
<div style="width: 20%">BUDGET TERPAKAI  : Rp. {{ @$ftotal_biaya }}</div>
<hr>
<div style="width: 20%">SISA BUDGET : Rp. {{ @$fsisa_budget }}</div>
</div>
<table class="table table-bordered table-hover" style="font-size:12px; color: black;">
    <thead class="bg-aqua">

      <tr>
                    <td rowspan="2" ><strong>NO</strong></td>
                    <td rowspan="2" ><strong>ID UUDP</strong></td>
            <td rowspan="2" ><strong>PEMOHON</strong></td>
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
@endforeach
   </tbody>
</table>
<br>
<table class="table table-bordered table-hover" style="font-size:12px; color: black;">
    <thead class="bg-aqua">
      <tr>
                            <td rowspan="2" ><strong>NO</strong></td>
                    <td rowspan="2" ><strong>ID SPPD</strong></td>
            <td rowspan="2" ><strong>PEMOHON</strong></td>
                        <td rowspan="2" ><strong>BERANGKAT/<br>KEMBALI</strong></td>
                                                <td rowspan="2" ><strong>KEPERLUAN</strong></td>

            <td rowspan="2" ><strong>ID COST</strong></td>
            <td rowspan="2" style="width: 10%;"><strong>SPPD</strong></td>
            <td rowspan="2" style="width: 10%;"><strong>PJPD</strong></td>
            <td rowspan="2"><strong>STATUS</strong></td>
            <td rowspan="2"><strong>KETERANGAN</strong></td>

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
            <td>{{ $datas->tanggal_berangkat }} <br>{{ $datas->tanggal_kembali }} </td>
                        <td>{{ $datas->keperluan }} </td>

          <td>{{ $datas->kd_cost1 }}, {{ $datas->kd_cost2 }}, {{ $datas->kd_cost3 }}, {{ $datas->kd_cost4 }}, {{ $datas->kd_cost5 }} </td>
                    @php (@$fnilai_sppd = (number_format($datas->nilai_sppd,0,",",".").""))
            <td><strong>No. {{ $datas->no_sppd }}<br>{{ $datas->date }}<br>Rp. {{ $fnilai_sppd  }}</strong></td>
            <td><strong>No. {{ $datas->no_pjpd }}<br>{{ $datas->date_pjpd }}<br>Rp. {{ $fnilai_pjpd }}</strong><br></td>
                        @if ( $datas->status_sppd == "open" AND $diff->format("%R%a") > 14 )
          <td class="bg-danger" align="center" style="width: 20px;">Belum Pertanggungjawaban {{ $diff->format("%R%a") }} Hari</td>
            @elseif ( $datas->status_sppd == "open" )
            <td class="bg-warning" align="center" style="width: 20px;">Belum Pertanggungjawaban<br>
            @elseif ( $datas->status_sppd == "close" )
            <td class="bg-success" align="center" style="width: 20px;">Sudah Pertanggungjawaban<br>
            @endif
        <td>{{ $datas->note }}  </td>

</tr>

@endforeach
    </tbody>
</table>
</div>
</div>

            </section>
          </div>
        <!-- page end-->
      </section>
@include('partials/footer')

<div class="modal fade" id="Update_Proyek" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Update Informasi Proyek</h4>
                      </div>
<div class="modal-body">
 <form action="{{ action('PrjController@update',$data->kd_proyek) }}"  method="post" enctype="multipart/form-data">
{{ csrf_field() }}  
<div class="form-group">
<div><strong>PAJAK%</strong></div>
<div class='input-group date' style="width: 30%; margin-top: 5px">
<input class="form-control" type="number" name="tax_value" value="{{ old('tax_value') }}">
<span class="input-group-addon">
<span class="fa fa-percent"></span>
</span></div>
<div><strong>STATUS PAJAK</strong></div>
<div class='input-group date' style="width: 30%; margin-top: 5px">
          <select  name="tax_status" class="form-control" value="{{ old('tax_status') }}">
            <option value="" class="bg-aqua">---</option>
            <option value="include" >Include</option>
            <option value="exclude" >Exclude</option>
          </select>
  </tr>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-sm btn-raised btn-primary">Simpan</button>
</form>
                      </div>
                    </div>
                  </div>
                </div>
  </body>
</html>
