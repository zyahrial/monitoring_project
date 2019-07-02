<!DOCTYPE html>
<html>
<head>
@php ($date = date('m/Y'))
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style>
    *{
    
     font-family: Roboto;
    font-size: 11px;
    border: 0px solid black;
  
    }
  .mytable tf{
        background-color: white ;
    }
    .mytable th{
        background-color: #0B6FA4 ;color: white;
    font-size: 12px;
    border-radius : 3px 3px;
    }

    .mytable td, th{
       padding:3px;
     height : 3px;
    }
  
  style=" width:250; height:30; border-radius: 5px 5px 5px 5px;"
  #table tr:nth-child(odd){
text-decoration: underline;
  background-color: #ffffff;
  font-family: Tahoma, Helvetica;
  font-size: 13px;
  -moz-user-select: none;
  
}
table tr:nth-child(even){
  background:#D0E4F5;
}
        @page { margin: 30px 10px 10px 10px; }
        .header { position: fixed; left: 0px; top: -100px; right: 0px; height: 100px; text-align: center; }
        .footer { position: fixed; left: 0px; bottom: -50px; right: 0px; height: 50px;text-align: center;}
        .footer .pagenum:before { content: counter(page); }
        </style>
</head>
<body >
    R.001/LEG/{{ $date }}
<div class="wrapper">
      <table class="mytable" style="font-size:10px; ">
        <tr>
            <th><strong>No.</strong></td>
            <th><strong>NAMA DOK </strong></td>
            <th><strong>PENANGGUNG JAWAB</strong>/<strong>EMAIL</strong></td>
            <th ><strong>DITERBITKAN</strong></td>
            <th><strong>PERINGATAN</strong></td>
            <th><strong>KADALUARSA</strong></td>
            <th><strong>TAHAP PENGERJAAN</strong></td>                        
            <th><strong>BIAYA</strong></td>
            <th><strong>STATUS LEGALITAS</strong></td>
        </tr>
          @php ($date_now = date('Y-m-d'))
        @php(
          $no = 1 {{-- buat nomor urut --}}
          )
        {{-- loop all legalitas --}}
        @foreach ($legalitas as $data)
        @php ($nilai = (number_format($data->nilai,0,",",".").""))                                     

                @if(($date_now) < $data->tgl_warning)
                @php  ( $status = "AKTIF" )
                @else (($date_now) > $data->tgl_warning <  $data->tgl_expired)
                @php  ( $status = "WARNING" )
                @endif
                @if(($date_now) > $data->tgl_expired)
                @php  ( $status = "EXPIRED" )
                @endif

            <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $data->nama_dok }}</td>
            <td>{{ $data->penanggung_jawab}} / {{ $data->email2}}</td>
            <td>{{ $data->tgl_terbit }}</td>
            <td>{{ $data->tgl_warning }}</td>           
            <td>{{ $data->tgl_expired }}</td>
            <td>{{ $data->progres }}</td>
            <td>{{ $nilai }}</td>
            <td>{{ $status }}</td>
        </tr>      
        @endforeach
      </tbody>
    </table>
  </div>
</div>
</div>
</body>
</html>
