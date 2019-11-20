 <!DOCTYPE html>
<title>ALL UUDP ACTIVE</title>
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
  <div class="panel-heading bg-primary">UUDP BELUM PERTANGGUNGJAWABAN</div>
 
</div>
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