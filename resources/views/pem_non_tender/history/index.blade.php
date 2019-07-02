<!DOCTYPE html>
<title>HISTORY PENJUALAN (TENDER)</title>
@include('partials/header2')
  <!-- Left side column. contains the logo and sidebar --> 
  <!-- Content Wrapper. Contains page content -->
<body>
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
             @include('alert.flash-message')
       <header class="bg-primary" style="color: white; padding-left: 5px; padding: 5px;">
        <i>HISTORY PENJUALAN (TENDER)</i>
 <nav >
      <!-- Sidebar toggle button-->
    <a href="{{ URL('/history/pem_non_tender') }}" >
    <button class="btn-sm btn-success pull-left" style="margin-left: 5px; margin-top: 5px; margin-bottom: 5px;">
 <i class="fa fa-refresh"></i> Refresh</button></a>          
   <div class="btn-group" role="group">
<form class="navbar-form" action="{{ url('/history/pem_non_tender') }}" method="GET"  >
<input type="text" class="form-control" placeholder="Cari Klien.." name="nama_klien" onChange="form.submit()" style="margin-left: 20px; margin-top: 5px; margin-bottom: 5px;"></input>
</form> 
</div> 
   <div class="btn-group" role="group">
<form class="navbar-form" action="{{ url('/history/pem_non_tender') }}" method="GET"  >
<input type="text" class="form-control" placeholder="Filter Pic.." name="cp_internal" onChange="form.submit()" style="margin-left: 1px; margin-top: 5px; margin-bottom: 5px;"></input>
</form> 
</div>
    </nav> 
      </header>
<table class="table table-advance table-bordered " style="font-size: 11px; ">
                <thead class="bg-info">
                   <th colspan="5"></th>
                   <td colspan="2" align="center"><strong>PROSES KAK RAB</strong></th>
                   <td colspan="4" align="center"></th>
                   <tr>
                    <th style="border-right-color:#d9edf7; width: 6%;" ><strong>CLOSE</strong></th>
               <th style="border-right-color:#d9edf7; width: 15%;"><strong>KLIEN</strong></th>
               <th style="border-right-color:#d9edf7 ;width: 15%;"><strong>KELOMPOK/SUB JASA</strong></th>
               <th style="border-right-color:#d9edf7  "><strong>NAMA PEKERJAAN</strong></th>
               <td align="center"><strong>PERMINTAAN</strong></th>
               <td align="center" style="border-right-color:#d9edf7  "><strong>TGL.KAK/RAB</strong></th>
               <td align="center" ><strong>NILAI</strong></th>
                <td align="center" style="border-right-color:#d9edf7  "><strong>TGL.PROPOSAL</strong></th>
               <td align="center" ><strong>HARGA </strong></th>
               <th><strong>PIC<text style="color:#d9edf7 ;">_</text>SPRINT</strong></th>
               <th><strong>STATUS</strong></th>
        </tr>
        @php ($date_now = date('Y-m-d'))
        @php(
          $no = 1 {{-- buat nomor urut --}}
          )
        {{-- loop all history --}}
        @foreach ($history as $data)

        @if (empty($data->tgl_permintaan))
        @php  ( $tgl_permintaan = '')
        @else
        @php  ( $tgl_permintaan = date('d M Y', strtotime($data->tgl_permintaan)))
        @endif
        @if (empty($data->tgl_kak))
        @php  ( $tgl_kak = '')
        @else
        @php  ( $tgl_kak = date('d M Y', strtotime($data->tgl_kak)))
        @endif
        @if (empty($data->tgl_proposal))
        @php  ( $tgl_proposal = '')
        @else
        @php  ( $tgl_proposal = date('d M Y', strtotime($data->tgl_proposal)))
        @endif
        @php  ( $date = date('d M Y', strtotime($data->created_at)))

        @if (empty($data->nilai_kak))
        @php  ( $nilai_kak = '')
        @else
        @php ($nilai_kak = (number_format($data->nilai_kak,0,",",".").""))
        @endif
        @if (empty($data->nilai_penawaran))
        @php  ( $nilai_penawaran = '')
        @else
        @php ($nilai_penawaran = (number_format($data->nilai_penawaran,0,",",".").""))
        @endif
        </thead>
<tbody >
        <td style="border-right-color:#eeeeee  "><strong ><small>{{$date}}</small><br>
<a href="/history/pem_non_tender/{{ $data->kd_his_pn_non_tender }}" style="color: blue;" title="Klik Untuk Melihat Detail" >{{ $data->kd_his_pn_non_tender }}</a></strong></td>
        <td style="border-right-color:white  ">
  <strong >{{ $data->nama_klien }}</strong></td>
           <td style="border-right-color:white  "><strong >-{{$data->kelompok_jasa}}</strong><br><strong >-{{$data->sub_jasa}}</strong></td>
            <td style="border-right-color:white  "><strong >{{$data->nama_pekerjaan}}</strong></td>
           <td align="center"><strong >{{$tgl_permintaan}}</strong></td>
            <td align="center" style="border-right-color:white  "><strong >{{$tgl_kak}}</strong></td>
          <td align="center"><strong >{{ $nilai_kak }}</strong></td>
            <td align="center" style="border-right-color:white  "><strong >{{$tgl_proposal}}</strong></td>
              <td align="center" ><strong>{{ $nilai_penawaran}} </strong></td>
              <td ><strong>{{ $data->cp_internal}} </strong></td>
            @if ( $data->status_closing == 'MENANG')
             <td align="center" style="background-color: green; color: white;"><strong>MENANG</strong></td>
              @else
             <td align="center" ><text style="background-color: red; color: white; padding: 5px;"> <strong>KALAH</strong></text></td>
              @endif 
    @endforeach      
    </table>
          <div>
                 @if(checkPermission(['admin','superadmin']))
                  <ul class="pagination pagination-sm pull-left">
                    {{ $history->fragment('foo')->links() }}
                  </ul>
                 @endif
          </div>
          </section>
          </div>
        </div>
</div>
        <!-- page end-->
      </section>
    <!--main content end-->
@include('partials/footer')
  </section>

</body>
</html>
