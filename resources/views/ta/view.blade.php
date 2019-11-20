<!DOCTYPE html>
<title>REVIEW TENAGA AHLI</title>
<body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
      <section class="wrapper" style="background-color: white;">
                @include('partials/header2')
          @include('partials.sidebar')
       <div class="content-wrapper">
    <section class="content">
                <div class="box-body" style="text-align: left;">
      <a  href="/ta" class="btn btn-app">
                <i class="fa fa-arrow-circle-left" title="BACK" style="font-size: 32px;"></i> </a>
           </div>
      @include('alert.flash-message')
        @php ($date_now = date('Y-m-d'))
        @php(
          $no = 1 {{-- buat nomor urut --}}
          )
        {{-- loop all ta --}}
        @foreach ($ta as $data)
                @if (empty($data->tanggal_lahir))
        @php  ( $tanggal_lahir = '')
        @else
        @php  ( $tanggal_lahir = date('d M Y', strtotime($data->tanggal_lahir)))
        @endif
        @if (empty($data->s1_tanggal_lulus))
        @php  ( $s1_tanggal_lulus = '')
        @else
        @php  ( $s1_tanggal_lulus = date('d M Y', strtotime($data->s1_tanggal_lulus)))
        @endif
                @if (empty($data->s2_tanggal_lulus))
        @php  ( $s2_tanggal_lulus = '')
        @else
        @php  ( $s2_tanggal_lulus = date('d M Y', strtotime($data->s2_tanggal_lulus)))
        @endif
                @if (empty($data->s3_tanggal_lulus))
        @php  ( $s3_tanggal_lulus = '')
        @else
        @php  ( $s3_tanggal_lulus = date('d M Y', strtotime($data->s3_tanggal_lulus)))
        @endif
       <header class="bg-primary" style="color: white; padding-left: 5px; padding: 5px;"><strong>
        <i>REVIEW TENAGA AHLI  ({{ $data->kd_ta }})</i></strong></header>
               <div class="panel-body bg-default" style="margin-left:10px; margin-right: 10px; ">
          <div class="col-xs-6">
            <address>           
             <div ><i class="fa fa-user"></i><text style="color: white";>_</text><text style="color: blue;">{{$data->nama}}</text></div>
            <div ><i class="fa fa-phone"></i><text style="color: white";>_</text><text style="color: blue;">{{$data->telp}}</text></div>
  <div ><i class="fa fa-envelope"></i><text style="color: white";>_</text><text style="color: blue;">{{$data->email}}</text></div>
              <br>
              <strong><u>Tempat Lahir</u></strong><div style="color: blue; margin-bottom: 5px;">
                {{$data->tempat_lahir}}</div>
              <strong><u>Tgl.Lahir</u></strong><div style="color: blue; margin-bottom: 5px;">
              {{$tanggal_lahir}}</div>
              <strong><u>Alamat</u></strong><div style="color: blue;">{{$data->alamat}}</div>
            </address>
          </div>
            <div class="col-xs-6 text-right">
            <address>
              <div style="color: blue;"><text style="background-color: blue; color: white; padding: 3px;">{{$data->status}}</text></div><br>
              <strong><u>Kompetensi</u></strong><br>
              <div  style="color: blue; margin-bottom: 5px;">{{$data->keahlian}}</div>
              <strong><u>No.Ktp</u></strong><br>
              <div style="color: blue; margin-bottom: 5px;""><a href="/file/ktp/{{ $data->no_ktp }}.pdf" target="_blank" title="Download KTP">
                {{$data->no_ktp}}</a></div>
              <strong><u>No.Npwp</u></strong><br>
              <div style="color: blue;"><a href="/file/npwp_ta/{{ $data->no_npwp }}.pdf" target="_blank" title="Download NPWP">{{$data->no_npwp}}</a></div>
              </address>
          </div>
              <table id="example2" class="table table-bordered " style="background-color: white;">
                <thead class="bg-primary">
               <th style="border-right-color:#d9edf7  "></th> <th style="border-right-color:#d9edf7  "><strong>UNIVERSITAS</strong></th>
               <th style="border-right-color:#d9edf7; "><strong>JURUSAN</strong></th>
<th style="border-right-color:#d9edf7; width:8%;"><strong>TGL LULUS</strong></th>
<th style="border-right-color:#d9edf7  "><strong>NO.IJAZAH</strong></th><th rowspan="2" >
<strong>ATTACH FILE</strong></td>          
<td rowspan="2" align="center"><strong>PENGALAMAN</strong></td>
                
<!-- IJAZAH s1-->
<!-- IJAZAH s2-->
<!-- IJAZAH s3-->
<!-- SPT-->
<!-- CV-->
        </tr>
</thead>
<tbody >
            <td  style="border-right-color:white;"><strong>S1</strong></td>
            <td  style="border-right-color:white;"><strong >{{$data->s1_univ}}</strong></td>
            <td  style="border-right-color:white;"><strong >{{$data->s1_jurusan}}</strong></td>
            <td  style="border-right-color:white;"><strong >{{$s1_tanggal_lulus}}</strong></td>
            <td  style="border-right-color:white;"><a href="/file/ijazah-s1/{{ $data->file_ijazah_s1 }}" target="_blank" ><strong>{{$data->s1_no_ijazah}}</strong></a>
            </td><td >
@if ($data->sertifikat_keahlian > '0' )
 <a href="/file/sertifikat_ta/{{ $data->sertifikat_keahlian }}" target="_blank" ><strong>SERTIFIKAT<text style="color: white";>_</text>KEAHLIAN</strong></a>
        @else
        <small style="color: red;">Crt Keahlian Tidak Di Temukan</small>
        @endif
        </td> 
@php(  $lulus = new DateTime($data->s1_tanggal_lulus)    )
@php(  $today = new DateTime() )
@php(  $diff = $today->diff($lulus))
@php( $tahun = $diff->y )
@php( $bulan = $diff->m )
            <td align="center" style="color: blue;"><text style="background-color: silver; color: black; padding: 3px;">{{ $tahun." Thn"}} {{ $bulan." Bln"}}</text></strong></td>        
              <tr>
           <td  style="border-right-color:white;"><strong>S2</strong></td>
           <td  style="border-right-color:white;"><strong >{{$data->s2_univ}}</strong></td>
            <td  style="border-right-color:white;"><strong >{{$data->s2_jurusan}}</strong></td>
            <td  style="border-right-color:white;"><strong >{{$s2_tanggal_lulus}}</strong></td>
            <td  style="border-right-color:white;"><a href="/file/ijazah-s2/{{ $data->file_ijazah_s2 }}" target="_blank" ><strong>{{$data->s2_no_ijazah}}</strong></a></td>            
            </td><td rowspan="1">
        @if ($data->sertifikat_pelatihan > '0' )
<strong><a href="/file/sertifikat_ta/{{ $data->sertifikat_pelatihan }}" target="_blank" >SERTIFIKAT<text style="color: white";>_</text>PELATIHAN</a></strong>
        @else
        <small style="color: red;">Crt Pelatihan Tidak Di Temukan</small>
        @endif
              </td> <tr>
            <td  style="border-right-color:white;"><strong>S3</strong></td>
            <td  style="border-right-color:white;"><strong >{{$data->s3_univ}}</strong></td>
            <td  style="border-right-color:white;"><strong >{{$data->s3_jurusan}}</strong></td>
            <td  style="border-right-color:white;"><strong >{{$s3_tanggal_lulus}}</strong></td>
            <td  style="border-right-color:white;"><a href="/file/ijazah-s3/{{ $data->file_ijazah_s3 }}" target="_blank" ><strong>{{$data->s3_no_ijazah}}</strong></a>        
            </td><td rowspan="1">
        @if ($data->spt > '0' )
        <strong><a href="/file/spt/{{ $data->spt }}" target="_blank" >SPT PAJAK</a></strong></td> 
        @else
        <small style="color: red;">Spt Pajak Tidak Di Temukan</small>
        @endif
        </td></tr>
      <tr>      
      <td colspan="5"  style="border-right-color:white;"> <td colspan="1" >
        @if ($data->cv > '0' )
        <strong><a href="/file/cv/{{ $data->cv }}" target="_blank" >CURICULUM VITAE</a></strong>
        @else
        <small style="color: red;">Cv Tidak Di Temukan</small>
        @endif
      </td><tr>
      </tbody>
      </div>
    </table>
       <div  class="panel-body" >
       <div class="col-xs-1" >
        @if(checkPermission(['admin','superadmin']))
        <a href="{{ URL('ta/show') }}/{{ $data->kd_ta }}" >
        <button class="btn btn-sm btn-raised btn-info" style="margin-bottom:5px;" onclick="return" title="Ubah" confirm('Yakin mau ubah data ?')"
        type="submit">
        <i class="fa fa-edit"></i></button></a>
        @endif
        @if(checkPermission(['superadmin']))
        <form action="{{action('TaController@destroy', $data['kd_ta'])}}" method="post">
         {{ csrf_field() }}
        <input name="_method" type="hidden" value="PATCH">
        <button class="btn btn-sm btn-raised btn-danger"  title="Hapus" onclick="return confirm('Yakin mau hapus data ?')" type="submit">
        <i class="fa fa-trash-o" style="font-size: 15px;"></i>
        </button>
        </form>
        @endif
      </div>
    </div>
</div>
@endforeach
            </section>
</div>
        <!-- page end-->
      </section>
@include('partials/footer')
  </section>

</body>
</html>
