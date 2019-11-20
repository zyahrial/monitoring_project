 <!DOCTYPE html>
<title>ALL SPPD ACTIVE</title>
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
  <div class="panel-heading bg-primary">SPPD BELUM PERTANGGUNGJAWABAN</div>
 
</div>
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
            <td>{{ $datas->kd_proyek }}<br>{{ $datas->kd_sppd }} </td>
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
            <tr></tr>
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