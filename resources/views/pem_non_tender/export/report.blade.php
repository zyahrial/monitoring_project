<html>
<table>
               <tr>
               <td colspan="6" style="background-color: #FFFF00;"></td>
               <td colspan="3" align="center" style="background-color: #FFFF00;"><strong>SUMBER INFORMASI</strong></td>
               <td style="background-color: #FFFF00;"></td>
               <td colspan="2" align="center" style="background-color: #FFFF00;"><strong>CANVASSING</strong></td>
               <td colspan="2" align="center" style="background-color: #FFFF00;"><strong>PROSES KAK RAB</strong></td>
               <td colspan="2" align="center" style="background-color: #FFFF00;"><strong>PROPOSAL</strong></td>
               <td colspan="3" style="background-color: #FFFF00;"></td>
               </tr>
               <tr>
               <td style="background-color: #FFFF00;">NO</td>
               <td style="background-color: #FFFF00;"><strong>KODE</strong></td>
               <td style="background-color: #FFFF00;"><strong>KELOMPOK JASA</strong></td>
               <td style="background-color: #FFFF00;"><strong>SUB JASA</strong></td>
               <td style="background-color: #FFFF00;"><strong>NAMA PEKERJAAN</strong></td>
               <td style="background-color: #FFFF00;"><strong>NAMA KLIEN</strong></td>
               <td align="center" style="background-color: #FFFF00;"><strong>NAMA</strong></td>
               <td style="background-color: #FFFF00;"><strong>TELP</strong></td>
               <td style="background-color: #FFFF00;"><strong>EMAIL</strong></td>
               <td align="center" style="background-color: #FFFF00;"><strong>TGL PERMINTAAN</strong></td>
               <td style="background-color: #FFFF00;"><strong>TANGGAL</strong></td>
               <td style="background-color: #FFFF00; width: 300px;"><strong>HASIL</strong></td>
               <td align="center" style="background-color: #FFFF00;"><strong>TGL.KAK/RAB</strong></td>
               <td align="center" style="background-color: #FFFF00;"><strong>NILAI</strong></td>
               <td align="center" style="background-color: #FFFF00;"><strong>TGL.PROPOSAL</strong></td>
               <td align="center" style="background-color: #FFFF00;"><strong>HARGA PENAWARAN </strong></td>
               <td align="center" style="background-color: #FFFF00;"><strong>TGL PRESENTASI</strong></td>
               <td align="center" style="background-color: #FFFF00;"><strong>STATUS</strong></td>
               <td style="background-color: #FFFF00;"><strong>PIC SPRINT</strong></td>
               </tr>
        @php ($date_now = date('Y-m-d'))
        @php  ( $no = 1)

        {{-- loop all non_tender --}}
        @foreach ($non_tender as $data)
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
                @if (empty($data->tgl_canvasing))
        @php  ( $tgl_canvasing = '')
        @else
        @php  ( $tgl_canvasing = date('d M Y', strtotime($data->tgl_canvasing)))
        @endif
                @if (empty($data->tgl_presentasi))
        @php  ( $tgl_presentasi = '')
        @else
        @php  ( $tgl_presentasi = date('d M Y', strtotime($data->tgl_presentasi)))
        @endif
                @if (empty($data->tgl_negosiasi))
        @php  ( $tgl_negosiasi = '')
        @else
        @php  ( $tgl_negosiasi = date('d M Y', strtotime($data->tgl_negosiasi)))
        @endif
                @if (empty($data->tgl_followup))
        @php  ( $tgl_followup = '')
        @else
        @php  ( $tgl_followup = date('d M Y', strtotime($data->tgl_followup)))
        @endif

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
        @if (empty($data->nilai_negosiasi))
        @php  ( $nilai_negosiasi = '')
        @else
        @php ($nilai_negosiasi = (number_format($data->nilai_negosiasi,0,",",".").""))
        @endif
       <tr>
        <td ><strong >{{$no++}}</strong></td>
       <td ><strong >{{$data->kd_pn_non_tender}}</strong></td>
       <td ><strong >-{{$data->kelompok_jasa}}</strong></td>
       <td ><strong >-{{$data->sub_jasa}}</strong></td>
       <td ><strong >{{$data->nama_pekerjaan}}</strong></td>
       <td ><strong >{{ $data->nama_klien }}</strong></td>
       <td align="center" ><strong >{{$data->informasi_nama}}</strong></td>
       <td align="center" ><strong >{{$data->informasi_telp}}</strong></td>
       <td align="center" ><strong >{{$data->informasi_email}}</strong></td>
       <td align="center" ><strong >{{$tgl_permintaan}}</strong></td>
       <td align="center" ><strong >{{$tgl_canvasing}}</strong></td>
       <td align="center" ><strong >{{$data->hasil_canvasing}}</strong></td>
       <td align="center"><strong >{{$tgl_kak}}</strong></td>       
            <td align="center"><strong >{{ $nilai_kak }}</strong></td>
            <td align="center"><strong >{{ $tgl_proposal }}</strong></td>
            <td align="center"><strong >{{ $nilai_penawaran }} </strong></td>
            <td align="center"><strong >{{ $data->tgl_presentasi }} </strong></td>
            <td align="center"><strong >{{ $data->status}}</strong></td>
            <td ><strong>{{ $data->cp_internal}} </strong></td>
          </tr>
@endforeach      
</table>
</html>