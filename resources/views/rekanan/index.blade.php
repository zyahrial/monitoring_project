<!DOCTYPE html>
<title>REKANAN</title>
 <!-- Left side column. contains the logo and sidebar --> 
  <!-- Content Wrapper. Contains page content -->
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
    <a href="{{ URL('/rekanan/create') }}"  >
      <button class="btn-sm btn-success pull-left" style="margin-top: 5px; margin-bottom: 5px; margin-left: 5px;"> 
    <i class="fa fa-plus"></i> Tambah</button></a>
                    @endif
    <a href="{{ URL('/rekanan') }}"   >
       <button class="btn-sm btn-success pull-left" style="margin-top: 5px; margin-bottom: 5px; margin-left: 5px;">
 <i class="fa fa-refresh"></i> Refresh</button></a>
<div style="text-align: right;">
<form class="navbar-form" action="{{ url('rekanan/') }}" method="GET"  >
<input type="text" class="form-control" placeholder="Filter Klien.." name="nama_klien" onChange="form.submit()" style="margin-top: 5px; margin-bottom: 5px; margin-left: 20px;"></input>
</form> 
</div>
    </nav>
      </header>
              <table id="example2" class="table table-bordered table-hover" style="background-color: white;">
                <thead class="bg-info">
                  <tr>
            <th align="center" rowspan="2" style="border-right-color:#d9edf7; "></td>
            <th rowspan="2" style="border-right-color:#d9edf7; width: 15%;"><strong> NAMA KLIEN / URL</strong></td>
            <th rowspan="2" style="border-right-color:#d9edf7  "><strong>USERNAME</strong>/<br><strong>PASSWORD</strong></td>
            <th rowspan="2"><strong >EMAIL<text style="color:#d9edf7;">_</text>TERDAFTAR</strong></td>
                <td></td>       
                <td align="center" colspan="5" ><strong >CONTACT PERSON</strong></td>
                  <th colspan="3"></th><tr>                      
            <td align="center" style="width: 6%;"><strong >MULAI/SELESAI</strong></td> 
            <th rowspan="2" style="border-right-color:#d9edf7; width: 7%; "><strong>NAMA</strong>
            <th rowspan="2" style="border-right-color:#d9edf7  "><strong>JABATAN</strong></td>
            <th rowspan="2" style="border-right-color:#d9edf7  "><strong>BAGIAN</strong></td>
            <th rowspan="2" style="border-right-color:#d9edf7  "><strong>TELP </strong></td>
              <th rowspan="2" style=" width:7%;"><strong>EMAIL</strong></td>
            <td style="width: 12%;" align="center"><strong>KETERANGAN</strong></th>          
            <th colspan="3"></td>
        </tr>
        @php ($date_now = date('Y-m-d'))
        @php(
          $no = 1 {{-- buat nomor urut --}}
            )
        {{-- loop all rekanan --}}
        @foreach ($rekanan as $data)
                @if(($date_now) > $data->tanggal_berakhir)
                @php  ( $status = "KADALUARSA" )
                @else (($date_now) < $data->tanggal_berakhir)
                @php  ( $status = "AKTIF" )
                @endif
                @if (empty($data->tanggal_berakhir))
                @php  ( $status = "empty" )
                @endif

        @if (empty($data->tanggal_mulai))
        @php  ( $tanggal_mulai = '')
        @else
        @php  ( $tanggal_mulai = date('d M Y', strtotime($data->tanggal_mulai)))
        @endif
        @if (empty($data->tanggal_berakhir))
        @php  ( $tanggal_berakhir = '')
        @else
        @php  ( $tanggal_berakhir = date('d M Y', strtotime($data->tanggal_berakhir)))
        @endif     
</thead>
<tbody>
            <tr>
            <td style="border-right-color:white  ">
            @if ( $status == 'AKTIF')
             <i class="fa fa-circle-o" style="background-color: green; color: white;"></i>
              @elseif ( $status == 'KADALUARSA')
             <i class="fa fa-circle-o" style="background-color: red; color: white;"></i>
              @elseif ( $status == 'empty')
             <i class="fa fa-circle-o" style="background-color: silver; color: white;"></i>
              @endif</td>
            <td style="border-right-color:white; width: 15%;"><strong>{{ $data->nama_klien }}</strong><br>
            <a href="{{ $data->url}}" target="_blank"> {{ $data->url}}</a></td>
            <td style="border-right-color:white  ">{{ $data->username }}<br>{{ $data->password }}</td>
            <td >{{ $data->email }}</td>
            <td align="center">{{ $tanggal_mulai }} <hr>{{ $tanggal_berakhir }} </td>          
            <td style="border-right-color:white  ">{{ $data->cp_nama }}</td>
            <td style="border-right-color:white  ">{{ $data->cp_jabatan }}</td>
            <td style="border-right-color:white  ">{{ $data->cp_bagian }}</td>
            <td style="border-right-color:white  ">{{ $data->cp_telp }}</td>
            <td>{{ $data->cp_email }}</td>
            <td>{{$data->keterangan}}</td>         
                  @if(checkPermission(['admin','superadmin']))
        <td>
        <div class="tools">
        <a href="{{ URL('rekanan/show') }}/{{ $data->kd_rekanan }}" >
        <button class="btn btn-sm btn-raised btn-info" onclick="return" title="Ubah" style="margin-bottom: 5px;" confirm('Yakin mau ubah data ?')"  type="submit">
        <i class="fa fa-edit"></i></button></a>
        </div>
        </td>
                @endif
                          @if(checkPermission(['superadmin']))
      <td>
        <form action="{{action('RekananController@destroy', $data['kd_rekanan'])}}" method="post">
         {{ csrf_field() }}
        <input name="_method" type="hidden" value="PATCH">
        <button class="btn btn-sm btn-raised btn-danger" title="Hapus" onclick="return confirm('Yakin mau hapus data ?')" type="submit">
        <i class="fa fa-trash-o" style="font-size: 15px;"></i>
        </button>
        </form>
        </td>
                @endif
        </tr>      
        @endforeach
      </tbody>
    </table>
                <div>
                  <ul class="pagination pagination-sm pull-left">
                    {{ $rekanan->fragment('foo')->links() }}
                  </ul>
                </div>
            </section>
          </div>
        </div>
        <!-- page end-->
      </section>
@include('partials/footer')

</body>
</html>
