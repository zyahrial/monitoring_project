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
 <nav >
      <!-- Sidebar toggle button-->
    <a href="{{ URL('/history/pem_tender') }}" >
     <button class="btn-sm btn-success pull-left" style="margin-left: 5px; margin-top: 5px; margin-bottom: 5px;">
 <i class="fa fa-refresh"></i> Refresh</button></a>          
   <div class="btn-group" role="group">
<form class="navbar-form" action="{{ url('/history/pem_tender') }}" method="GET"  >
<input type="text" class="form-control" placeholder="Filter Klien.." name="nama_klien" onChange="form.submit()" style="margin-left: 20px; margin-top: 5px; margin-bottom: 5px;"></input>
</form> 
</div> 
   <div class="btn-group" role="group">
<form class="navbar-form" action="{{ url('/history/pem_tender') }}" method="GET"  >
<input type="text" class="form-control" placeholder="Filter Pic.." name="cp_internal" onChange="form.submit()" style="margin-left: 1px; margin-top: 5px; margin-bottom: 5px;"></input>
</form> 
</div>
    </nav> 
      </header>
<table class="table table-advance table-bordered table-hover" style="font-size: 11px; ">
                <thead class="bg-info">
                   <th colspan="4"></th>
                   <td colspan="2" align="center" style="width:15%;"><strong>PROSES<text style="color:#d9edf7;" >_</text>KAK/RAB</strong></th>
                   <td colspan="2" align="center" style="width:15%;" ><strong>PROSES<text style="color:#d9edf7;" >_</text>TENDER</strong></th>
                   <th colspan="2"></th>
                   <tr>

                <th style="border-right-color:#d9edf7; width: 7%"><strong>CLOSE</strong></th>
                <th style="border-right-color:#d9edf7; width:15%;" ><strong>KLIEN</strong><i> </i></th>
               <th style="border-right-color:#d9edf7; width:15%;"><strong>JENIS JASA</strong></th>
               <th ><strong>NAMA PEKERJAAN</strong></th>
              
               
               <th style="border-right-color:#d9edf7  "><strong>TGL.</strong></th>
               <th ><strong>NILAI</strong></th>
                <th style="border-right-color:#d9edf7  "><strong>TGL.</strong></th>
               <th ><strong>NILAI</strong></th>
               <th style="border-right-color:#d9edf7; width:10%;" ><strong>PIC<text style="color:#d9edf7;" >_</text>SPRINT</strong></th>
               <td align="center" ><strong>STATUS</strong></th>
        </tr>
        @php ($date_now = date('Y-m-d'))
        @php(
          $no = 1 {{-- buat nomor urut --}}
          )
        {{-- loop all post --}}
        @foreach ($history as $data)
                        @if (empty($data->tgl_pengambilan_doc))
        @php  ( $tgl_pengambilan_doc = '')
        @else
        @php  ( $tgl_pengambilan_doc = date('d M Y', strtotime($data->tgl_pengambilan_doc)))
        @endif
        @if (empty($data->tgl_kak))
        @php  ( $tgl_kak = '')
        @else
        @php  ( $tgl_kak = date('d M Y', strtotime($data->tgl_kak)))
        @endif
        @php  ( $date = date('d M Y', strtotime($data->created_at)))

        @if (empty($data->nilai_kak))
        @php  ( $nilai_kak = '')
        @else
        @php ($nilai_kak = (number_format($data->nilai_kak,0,",",".").""))
        @endif
        @if (empty($data->harga_penawaran))
        @php  ( $harga_penawaran = '')
        @else
        @php ($harga_penawaran = (number_format($data->harga_penawaran,0,",",".").""))
        @endif

        </thead>
<tbody  style="background-color: #eeeeee">
  <tr >
        <td style="border-right-color:#eeeeee  "><strong ><small>{{$date}}</small>
          <br><a href="/history/pem_tender/{{ $data->kd_his_tender }}" style="color: blue;" title="Klik Untuk Melihat Detail">{{$data->kd_his_tender}} </a></strong></td>
         <td style="border-right-color:#eeeeee "><strong > {{$data->nama_klien}} </strong></td>      
           <td style="border-right-color:#eeeeee  "><strong >{{$data->sub_jasa}}</strong></td>
            <td ><strong >{{$data->nama_pekerjaan}}</strong></td>         
            <td style="border-right-color:#eeeeee  "><strong >{{$tgl_kak}}</strong></td>
          <td><strong >{{ $nilai_kak }}</strong></td>
            <td style="border-right-color:#eeeeee  "><strong >{{$tgl_pengambilan_doc}}</strong></td>
              <td ><strong>{{ $harga_penawaran}} </strong></td>
              <td style="border-right-color:#eeeeee  "><strong>{{ $data->cp_internal}} </strong></td>
              @if ( $data->status_closing == 'MENANG')
             <td align="center" style="background-color: green; color: white;"><strong>MENANG<strong></td>
              @else
             <td align="center"><strong><text  style="background-color: red; color: white; padding: 5px;">KALAH</text><strong></td>
              @endif          
            </tr>
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

</body>
</html>
