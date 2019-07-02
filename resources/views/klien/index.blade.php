<!DOCTYPE html>
<title>KLIEN</title>
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
        @if(checkPermission(['admin','superadmin']))
      <!-- Sidebar toggle button-->
    <a href="{{ URL('/klien/create') }}"  >
   <button class="btn-sm btn-success pull-left" style="margin-top: 5px; margin-bottom: 5px; margin-left: 5px;"> 
    <i class="fa fa-plus"></i> Tambah</button></a>
        @endif
    <a href="{{ URL('/klien') }}" >
<button class="btn-sm btn-success pull-left" style="margin-top: 5px; margin-bottom: 5px; margin-left: 5px;">
 <i class="fa fa-refresh"></i> Refresh</button></a>
   <div class="btn-group" role="group">
<form class="navbar-form" action="{{ url('klien/') }}" method="GET"  >
<input type="text" class="form-control" placeholder="Filter Klien.." name="nama_klien" onChange="form.submit()" 
style="margin-top: 5px; margin-bottom: 5px; margin-left: 20px;"></input>
</form>
</div>
<div class="btn-group" role="group">
<form class="navbar-form" action="{{ url('klien/') }}" method="GET"  >
<input type="text" class="form-control" placeholder="Filter Jenis Usaha.." name="jenis_usaha" onChange="form.submit()" 
style="margin-top: 5px; margin-bottom: 5px; "></input>
</form>
</div>
<div class="btn-group" role="group">
<form class="navbar-form" action="{{ url('klien/') }}" method="GET"  >
<input type="text" class="form-control" placeholder="Filter Jenis Sektor.." name="jenis_sektor" onChange="form.submit()" 
style="margin-top: 5px; margin-bottom: 5px; "></input>
</form>
</div>
    </nav>
      </header>

              <table  class="table table-advance table-hover" style="font-size: 11px;">
                <thead class="bg-info">
                  <tr>
            <th ><strong>KODE</strong></td>
            <th style="width: 25%;"><strong>NAMA</strong></td>
            <th style="width: 10%;"><strong>JENIS<text style="color: #eeeeee";>_</text>USAHA</strong></td>
            <th style="width: 10%;"><strong>SEKTOR</strong></td>
            <th style="width: 10%;" ><strong>SUB SEKTOR</strong></td>
            <th style="width: 10%;"><strong>TELP/FAX</strong></td>
            <th ><strong>EMAIL</strong></td>
            <th ><strong>WEBSITE</strong></td>
            <th ><strong>ATTACH<text style="color: #eeeeee";>_</text>FILE</strong></td>
        </tr>
          @php ($date_now = date('Y-m-d'))
        @php(
          $no = 1 {{-- buat nomor urut --}}
          )
        {{-- loop all klien --}}
        @foreach ($datas as $data)
</thead>
<tbody >
            <tr>
            <td><strong ><a href="{{ URL('klien/detail') }}/{{ $data->kd_klien }}" style="color: blue;" title="Klik Untuk Melihat Detail" >{{ $data->kd_klien }}</a></strong ></td>
            <td><strong >{{ $data->nama_klien }}</strong ></td>
            <td><strong >{{ $data->jenis_usaha}}</strong ></td>
            <td><strong >{{ $data->jenis_sektor }}</strong ></td>
            <td><strong >{{ $data->sub_sektor }}</strong ></td>
            <td><strong >{{ $data->telp_fax }}</strong ></td>
            <td><strong >{{ $data->email }}</strong ></td>
            <td><strong ><a href="{{ $data->website }}" target="_blank">{{ $data->website }}</strong ></td>
            <td >
                    @if ($data->npwp > '0' )
        <a href="file/npwp/{{ $data->npwp }}" target="_blank" title="Download NPWP">NPWP</a>
        @else
        <small style="color: red;">Tidak Di Temukan</small>
        @endif
        </td> 
        @endforeach
      </tbody>
    </table>
                    <div>
                  <ul class="pagination pagination-sm pull-left">
                      {{ $datas->fragment('foo')->links() }}
                  </ul>
                </div>
            </section>
          </div>
        </div>
        <!-- page end-->
      </section>
    <!--main content end-->
@include('partials/footer')

</body>
</html>
