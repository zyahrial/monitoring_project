  <table >
  <tr>
  <th style="background-color: #FFFF00;"><strong>NO</strong></th>
  <th style="background-color: #FFFF00;"><strong>KLIEN</strong></th>
  <th style="background-color: #FFFF00;"><strong>NAMA PAKET PEKERJAAN</strong></th>
  <th style="background-color: #FFFF00;"><strong>KELOMPOK JASA</strong></th>
  <th style="background-color: #FFFF00;"><strong>SUB JASA</strong></th>
  <th style="background-color: #FFFF00;"><strong>BIDANG / SUB BIDANG PEKERJAAN</strong></th>
  <th style="background-color: #FFFF00;"><strong>RUANG LINGKUP</strong></th>
            <th style="background-color: #FFFF00;"><strong>LOKASI</strong></th>
            <th style="background-color: #FFFF00;"><strong>NO.KONTRAK</strong></th>
            <th style="background-color: #FFFF00;"><strong>NILAI KONTRAK</strong></th>
            <th style="background-color: #FFFF00;"><strong>KONTRAK MULAI</strong></th>
            <th style="background-color: #FFFF00;"><strong>KONTRAK SELESAI</strong></th>
            <th style="background-color: #FFFF00;"><strong>NO ADDENDUM KONTRAK</strong></th>
            <th style="background-color: #FFFF00;"><strong>NILAI ADDENDUM KONTRAK</strong></th>
            <th style="background-color: #FFFF00;"><strong>ADDENDUM MULAI</strong></th>
            <th style="background-color: #FFFF00;"><strong>ADDENDUM SELESAI</strong></th>
            <th style="background-color: #FFFF00;"><strong>PM</strong></th>
            <th style="background-color: #FFFF00;"><strong>KONSULTAN</strong></th>
            </tr>
          @php ($date_now = date('Y-m-d'))
        @php(
          $no = 1 {{-- buat nomor urut --}}
          )
        {{-- loop all klien --}}
        @foreach ($pengalaman as $data)

        @if (empty($data->kontrak_mulai))
        @php  ( $kontrak_mulai = '')
        @else
        @php  ( $kontrak_mulai = date('d M Y', strtotime($data->kontrak_mulai)))
        @endif
        
        @if (empty($data->kontrak_selesai))
        @php  ( $kontrak_selesai = '')
        @else
        @php  ( $kontrak_selesai = date('d M Y', strtotime($data->kontrak_selesai)))
        @endif
        

        @if (empty($data->nilai_kontrak))
        @php  ( $nilai_kontrak = '')
        @else
        @php ($nilai_kontrak = (number_format($data->nilai_kontrak,0,",",".").""))
        @endif

        @if (empty($data->nilai_addendum))
        @php  ( $nilai_addendum = '')
        @else
        @php ( $nilai_addendum = (number_format($data->nilai_addendum,0,",",".").""))
        @endif
  <tr>
          <td >{{ $no++ }}</td>
          <td >{{ $data->nama_klien}}</td>
          <td >{{ $data->nama_pekerjaan}}</td>
          <td >{{ $data->kelompok_jasa}}</td>
          <td >{{ $data->sub_jasa}}</td>
          <td >{{ $data->sub_pekerjaan}}</td>
          <td >{{ $data->ringkasan_lingkup}}</td>
          <td >{{ $data->lokasi_pekerjaan}}</td>
          <td >{{ $data->no_kontrak}}</td>
          <td >{{ $nilai_kontrak }}</td>
          <td >{{ $data->kontrak_mulai}}</td>
          <td>{{ $data->kontrak_selesai }}</td>
          <td >{{ $data->no_addendum1}}</td>
          <td >{{ $nilai_addendum }}</td>
          <td >{{ $data->addedum_mulai}}</td>
          <td>{{ $data->addendum_selesai }}</td>
          <td >{{ $data->pm}}</td>
          <td>{{ $data->konsultan }}</td>


        </tr>
      @endforeach
    </table>