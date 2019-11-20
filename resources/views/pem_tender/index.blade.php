<!DOCTYPE html>
<title>PENJUALAN (TENDER)</title>
<body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
      <section class="wrapper">
        @include('partials/header2')
          @include('partials.sidebar')
  <div class="content-wrapper">
    <section class="content">
             @include('alert.flash-message')
       <header class="bg-primary" style="color: white; padding-left: 5px; padding: 5px;">
  <nav  style="font-size: 12px;" >
<strong><i>PENJUALAN (TENDER)</i></strong>
</nav>
 <nav >

           @if(checkPermission(['user']))
    <a href="{{ URL('/pem_tender_user/create') }}"  >
       <button class="btn-sm btn-success pull-left" style="margin-top: 10px; margin-bottom: 5px;"> 
    <i class="fa fa-plus-square"></i> Tambah</button></a>
            @endif
      <!-- Sidebar toggle button-->
           @if(checkPermission(['admin','superadmin']))
    <a href="{{ URL('/pem_tender/create') }}"  >
       <button class="btn-sm btn-success pull-left" style="margin-top: 5px; margin-bottom: 5px;"> 
    <i class="fa fa-plus-square"></i> Tambah</button></a>
    <a href="{{ URL('/pem_tender') }}" >
     <button class="btn-sm btn-success pull-left" style="margin-left: 5px; margin-top: 5px; margin-bottom: 5px;">
 <i class="fa fa-refresh"></i> Refresh</button></a>
 <div style="text-align: right;">
   <div class="btn-group" role="group">
<form class="navbar-form" action="{{ url('pem_tender/') }}" method="GET"  >
<input type="text" class="form-control" placeholder="Filter Klien.." name="nama_klien" onChange="form.submit()" style="margin-left: 20px; margin-top: 5px; margin-bottom: 5px;"></input>
</form> 
</div>
<div class="btn-group" role="group">
<form class="navbar-form" action="{{ url('pem_tender/') }}" method="GET"  >
<input type="text" class="form-control" placeholder="Filter PIC.." name="cp_internal" onChange="form.submit()" style="margin-left: 1px; margin-top: 5px; margin-bottom: 5px;"></input>
</form> 
</div>
</div>
          @endif
    </nav> 
      </header>
              <table id="example2" class="table table-bordered table-hover" style="background-color: white;">
                <thead class="bg-info">
                   <td colspan="5"></th>
                   <td colspan="2" align="center"><strong>PROSES KAK RAB</strong></th>
                   <td colspan="2" align="center"><strong>PROSES TENDER</strong></th>
                   <td colspan="2"></th>
                   <tr>
  <td style="border-right-color:#d9edf7  "><strong>KODE</strong></th>
  <td style="border-right-color:#d9edf7;width:15%;"><strong>NAMA<text style="color:#d9edf7">_</text>KLIEN</strong></th>
               <td style="border-right-color:#d9edf7; width: 20%;"><strong>KELOMPOK/SUB JASA</strong></th>
               <td style="border-right-color:#d9edf7  "><strong>NAMA PEKERJAAN</strong></th>
               <td align="center" ><strong>STATUS</strong></th>
               <td align="center" style="border-right-color:#d9edf7  "><strong>TGL.KAK/RAB</strong></th>
               <td align="center" ><strong>NILAI</strong></th>
                <td align="center" style="border-right-color:#d9edf7  "><strong>TGL.TENDER</strong></th>
               <td align="center" ><strong>NILAI</strong></th>
               <td><strong>PIC<text style="color:#d9edf7">_</text>SPRINT</strong></th>
        </tr>
        @php ($date_now = date('Y-m-d'))
        @php(
          $no = 1 {{-- buat nomor urut --}}
          )
        {{-- loop all post --}}
        @foreach ($post as $data)
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
<tbody >
        <td style="border-right-color:white  "><strong ><a href="/pem_tender/detail/{{ $data->kd_pn_tender }}" 
          style="color: blue;" title="Klik Untuk Melihat Detail">{{$data->kd_pn_tender}}</a></strong></td>
        <td style="border-right-color:white  ">
          <strong >{{$data->nama_klien}}</strong></td>
           <td style="border-right-color:white  "><strong >-{{$data->kelompok_jasa}}</strong><br><strong >-{{$data->sub_jasa}}</strong></td>
            <td style="border-right-color:white  "><strong >{{$data->nama_pekerjaan}}</strong></td>
             <td align="center"><strong ><text style="background-color: green; color: white; padding: 5px;">{{$data->status_tender}}</text></strong></td>
            <td align="center" style="border-right-color:white  "><strong >{{$tgl_kak}}</strong></td>
            
          <td align="center"><strong >{{ $nilai_kak }}</strong></td>
            <td align="center" style="border-right-color:white  "><strong >{{$tgl_pengambilan_doc}}</strong></td>
            
              <td align="center" ><strong>{{ $harga_penawaran}} </strong></td>
              <td ><strong>{{ $data->cp_internal}} </strong></td>
@endforeach      
    </table>
                <div>
                             @if(checkPermission(['admin','superadmin']))
                  <ul class="pagination pagination-sm pull-left">
                    {{ $post->fragment('foo')->links() }}
                 </ul>
                            @endif
                </div>
            </section>
          </div>
        <!-- page end-->
      </section>
    <!--main content end-->
@include('partials/footer')
</body>
</html>
