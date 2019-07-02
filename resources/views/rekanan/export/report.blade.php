<html>
<table style="font-size: 10px; ">
        <tr>
        <td style="background-color: #FFFF00;" colspan="9"></td>
        <td align="center" style="background-color: #FFFF00;" colspan="4"> CONTACT PERSON </td>
        <td style="background-color: #FFFF00;" colspan="2"></td>
        </tr>
        <tr> 
            <td style="background-color: #FFFF00;" > NO </td>
            <td style="background-color: #FFFF00;" > NAMA KLIEN </td>
            <td style="background-color: #FFFF00;" > ALAMAT URL</td>
            <td style="background-color: #FFFF00;" > USERNAME </td>
            <td style="background-color: #FFFF00;" > PASSWORD </td>
            <td style="background-color: #FFFF00;" > EMAIL TERDAFTAR </td>
            <td style="background-color: #FFFF00;"> TANGGAL MULAI </td>
            <td style="background-color: #FFFF00;" > TANGGAL BERAKHIR </td>
            <td style="background-color: #FFFF00;" > STATUS REKANAN </td>                     
        <td style="background-color: #FFFF00;"> NAMA </td>
        <td style="background-color: #FFFF00;"> JABATAN </td>
        <td style="background-color: #FFFF00;"> BAGIAN </td>
        <td style="background-color: #FFFF00;"> TELP  </td>
        <td style="background-color: #FFFF00;"> EMAIL </td> 
        <td style="background-color: #FFFF00;"> KETERANGAN </td>         
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
                @php  ( $status = " " )
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
            <tr>
            <td >{{ $no++ }}</td>
            <td >{{ $data->nama_klien }}</td>
            <td >{{ $data->url}}</td>
            <td >{{ $data->username }}</td>
            <td >{{ $data->password }}</td>
            <td >{{ $data->email }}</td>
            <td >{{ $tanggal_mulai }}</td>           
            <td >{{ $tanggal_berakhir }}</td>
            <td >{{ $status }}</td>        
            <td >{{ $data->cp_nama }}</td>
            <td >{{ $data->cp_jabatan }}</td>
            <td >{{ $data->cp_bagian }}</td>
            <td >{{ $data->cp_telp }} </td>
            <td >{{ $data->cp_email }}</td>         
            <td >{{$data->keterangan}}</td>
        </tr>      
        @endforeach
    </table>
</html>