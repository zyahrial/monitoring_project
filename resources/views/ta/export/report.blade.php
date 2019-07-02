<!DOCTYPE html>
<table >
               <tr>
               <td style="background-color: #FFFF00;"><strong>NO</strong></td>            
               <td style="background-color: #FFFF00;"><strong>STATUS</strong></td>
               <td style="background-color: #FFFF00;"><strong>NAMA</strong></td>
               <td style="background-color: #FFFF00;"><strong>TEMPAT / TGL LAHIR</strong></td>
               <td style="background-color: #FFFF00;"><strong>ALAMAT</strong></td>
               <td style="background-color: #FFFF00;"><strong>NO.HP</strong></td>
               <td style="background-color: #FFFF00;"><strong>EMAIL</strong></td>
               <td style="background-color: #FFFF00;"><strong>NO.KTP</strong></td>
               <td style="background-color: #FFFF00;"><strong>NO.NPWP</strong></td>
               
               <td style="background-color: #FFFF00;"><strong>S1 UNIVERSITAS</strong></td>
               <td style="background-color: #FFFF00;"><strong>S1 JURUSAN</strong></td>
               <td style="background-color: #FFFF00;"><strong>S1 TAHUN LULUS</strong></td>
               <td style="background-color: #FFFF00;"><strong>S1 NO.IJAZAH</strong></td>

               <td style="background-color: #FFFF00;"><strong>S2 UNIVERSITAS</strong></td>
               <td style="background-color: #FFFF00;"><strong>S2 JURUSAN</strong></td>
               <td style="background-color: #FFFF00;"><strong>S2 TAHUN LULUS</strong></td>
               <td style="background-color: #FFFF00;"><strong>S2 NO.IJAZAH</strong></td>

               <td style="background-color: #FFFF00;"><strong>S3 UNIVERSITAS</strong></td>
               <td style="background-color: #FFFF00;"><strong>S3 JURUSAN</strong></td>
               <td style="background-color: #FFFF00;"><strong>S3 TAHUN LULUS</strong></td>
               <td style="background-color: #FFFF00;"><strong>S3 NO.IJAZAH</strong></td>

               <td style="background-color: #FFFF00;"><strong>KOMPETENSI / KEAHLIAN</strong></td>
               <td style="background-color: #FFFF00;"><strong>PENGALAMAN KERJA (TH)</strong></td>
               </tr>
        @php ($date_now = date('d M Y'))
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

@php(  $lulus = new DateTime($data->s1_tanggal_lulus)    )
@php(  $today = new DateTime() )
@php(  $diff = $today->diff($lulus))
@php( $tahun = $diff->y )
@php( $bulan = $diff->m )
        <tr >
        <td ><strong >{{$no++}}</strong></td>     
        <td ><strong>{{$data->status}} </strong></td>
        <td ><strong >{{$data->nama}}</strong> </td>
        <td ><strong >{{$data->tempat_lahir}} / {{$tanggal_lahir}}</strong></td>
        <td ><strong >{{$data->alamat}}</strong> </td>
        <td ><strong >{{$data->telp}}</strong> </td>
         <td ><strong >{{$data->email}}</strong> </td>
         <td ><strong >{{$data->no_ktp}}</strong> </td>
         <td ><strong >{{$data->no_npwp}}</strong> </td>

        <td ><strong >{{$data->s1_univ}}</strong></td>
        <td ><strong >{{$data->s1_jurusan}}</strong></td>
        <td ><strong >{{$s1_tanggal_lulus}}</strong></td>
         <td ><strong >{{$data->s1_no_ijazah}}</strong></td>

        <td ><strong >{{$data->s2_univ}}</strong></td>
        <td ><strong >{{$data->s2_jurusan}}</strong></td>
        <td ><strong >{{$s2_tanggal_lulus}}</strong></td>
         <td ><strong >{{$data->s2_no_ijazah}}</strong></td>

        <td ><strong >{{$data->s3_univ}}</strong></td>
        <td ><strong >{{$data->s3_jurusan}}</strong></td>
        <td ><strong >{{$s3_tanggal_lulus}}</strong></td>
         <td ><strong >{{$data->s3_no_ijazah}}</strong></td>

        <td ><strong>{{$data->keahlian}} </strong></td>
         <td ><strong>{{ $tahun." Tahun"}} {{ $bulan." Bulan"}}</strong></td>
</tr>          
@endforeach      
</table>
</html>