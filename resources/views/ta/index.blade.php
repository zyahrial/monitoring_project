<!DOCTYPE html>
<title>TENAGA AHLI</title>
<body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
      <section class="wrapper">
        @include('partials/header2')
          @include('partials.sidebar')
  <div class="content-wrapper">
    <section class="content">
             @include('alert.flash-message')
       <header class="bg-primary" style="color: white; padding-left: 5px; padding: 5px;">
 <nav >
        @if(checkPermission(['admin','superadmin']))
      <!-- Sidebar toggle button-->
    <a href="{{ URL('/ta/create') }}"  >
      <button class="btn-sm btn-success pull-left" style="margin-top: 5px; margin-bottom: 5px;">
    <i class="fa fa-plus-square"></i> Tambah</button></a>
    @endif
    <a href="{{ URL('/ta') }}" >
     <button class="btn-sm btn-success pull-left"  style="margin-left: 5px; margin-top: 5px; margin-bottom: 5px;">
 <i class="fa fa-refresh"></i> Refresh</button></a>

 <div style="text-align: right;">
   <div class="btn-group" role="group">
<form class="navbar-form" action="{{ url('ta/') }}" method="GET"  >
<input type="text" class="form-control" placeholder="Filter Nama.." name="nama" onChange="form.submit()" style="margin-left: 20px; margin-top: 5px; margin-bottom: 5px;"></input>
</form> 
</div>
  <div class="btn-group" role="group">
<form class="navbar-form" action="{{ url('ta/') }}" method="GET"  >
<input type="text" class="form-control" placeholder="Filter Universitas.." name="universitas" onChange="form.submit()" style="margin-left: 2px; margin-top: 5px; margin-bottom: 5px;"></input>
</form>
</div>
</div>
    </nav> 
      </header>
              <table id="example2" class="table table-bordered table-hover" style="background-color: white;">
                <thead class="bg-info">                   
               <tr>
               <th style="border-right-color:#d9edf7  "><strong>NO</strong></th>
               <th style="border-right-color:#d9edf7  "><strong>NAMA</strong></th>
                <th  style="border-right-color:#d9edf7  " ><strong>STATUS</strong></th>
                <td align="center" style="width: 20%"><strong>KOMPETENSI</strong></td><td>
               <th style="border-right-color:#d9edf7  "><strong>NAMA UNIVERSITAS</strong></th>
               <th><strong>JURUSAN</strong><i> </i></th>
        </tr>

        @php ($date_now = date('d M Y'))
        @php(
          $no = 1 {{-- buat nomor urut --}}
          )
        {{-- loop all ta --}}
        @foreach ($ta as $data)
        </thead>
<tbody >
        <td style="border-right-color:white;"><strong >{{$no++}}</strong></td>
        <td style="border-right-color:white;"><a href="/ta/view/{{ $data->kd_ta }}" style="color: blue;" 
          title="Klik Untuk Melihat Detail"><strong >{{$data->nama}}</strong></a></td>
        <td style="border-right-color:white;"><strong>{{$data->status}} </strong></td>
        <td ><strong>{{$data->keahlian}} </strong></td>
        <td align="center"><i class="fa fa-graduation-cap"><strong>S1</strong></th>
           <td style="border-right-color:white;"><strong >{{$data->s1_univ}}</strong></td>
            <td><strong >{{$data->s1_jurusan}}</strong></td><tr><td colspan="4">
              <td align="center"><i class="fa fa-graduation-cap"><strong>S2</strong></th>
           <td style="border-right-color:white;"><strong >{{$data->s2_univ}}</strong></td>
            <td><strong >{{$data->s2_jurusan}}</strong></td><tr><td colspan="4">
           <td align="center"><i class="fa fa-graduation-cap"><strong>S3</strong></th>
          <td style="border-right-color:white;"><strong >{{$data->s3_univ}}</strong></td>
            <td><strong >{{$data->s3_jurusan}}</strong></td>            
@endforeach      
    </table>
                  <div>
                  <ul class="pagination pagination-sm pull-left">
                    {{ $ta->fragment('foo')->links() }}
                  </ul>
                </div>
            </section>
          </div>
</div>
        <!-- page end-->
      </section>
    <!--main content end-->
@include('partials/footer')
  </section>

</body>
</html>
