<html>
<table>
            <tr>
            <td style="background-color: #FFFF00;"><strong>KODE</strong></td>
            <td style="background-color: #FFFF00;"><strong>NAMA</strong></td>
            <td style="background-color: #FFFF00;"><strong>JENIS USAHA</strong></td>
            <td style="background-color: #FFFF00;"><strong>SEKTOR</strong></td>
            <td style="background-color: #FFFF00;"><strong>ALAMAT</strong></td>
            <td style="background-color: #FFFF00;"><strong>TELP/FAX</strong></td>
            <td style="background-color: #FFFF00;"><strong>EMAIL</strong></td>
            <td style="background-color: #FFFF00;"><strong>WEBSITE</strong></td>
            <td style="background-color: #FFFF00;" colspan="5" align="center"><strong>CONTACT PERSON - OPERASIONAL</strong></td>
            <td style="background-color: #FFFF00;" colspan="5" align="center"><strong>CONTACT PERSON - PENAGIHAN / ADM</strong></td>
            </tr>
            <tr>
            <td style="background-color: #FFFF00;" colspan="8"></td>
            <td style="background-color: #FFFF00;"><strong>NAMA</strong></td>
            <td style="background-color: #FFFF00;"><strong>JABATAN</strong></td>
            <td style="background-color: #FFFF00;"><strong>*BAGIAN</strong></td>
            <td style="background-color: #FFFF00;"><strong>TLP / HP</strong></td>
            <td style="background-color: #FFFF00;"><strong>EMAIL</strong></td>
            <td style="background-color: #FFFF00;"><strong>NAMA</strong></td>
            <td style="background-color: #FFFF00;"><strong>JABATAN</strong></td>
            <td style="background-color: #FFFF00;"><strong>*BAGIAN</strong></td>
            <td style="background-color: #FFFF00;"><strong>TLP / HP</strong></td>
            <td style="background-color: #FFFF00;"><strong>EMAIL</strong></td>
            </tr>
          @php ($date_now = date('Y-m-d'))
                  @php(   $no = 1 {{-- buat nomor urut --}}  )
        @foreach ($klien as $data)
            <tr>
            <td><strong >{{ $data->kd_klien }}</strong ></td>
            <td><strong >{{ $data->nama_klien }}</strong ></td>
            <td><strong >{{ $data->jenis_usaha}}</strong ></td>
            <td><strong >{{ $data->jenis_sektor }}</strong ></td>
            <td><strong >{{ $data->alamat}}</strong ></td>
            <td><strong >{{ $data->telp_fax }}</strong ></td>
            <td><strong >{{ $data->email }}</strong ></td>
            <td><strong >{{ $data->website }}</strong ></td>

            <td><strong >{{ $data->cp_ops_nama1 }}</strong ></td>
            <td><strong >{{ $data->cp_ops_jabatan1}}</strong ></td>
            <td><strong >{{ $data->cp_ops_bagian1 }}</strong ></td>
            <td><strong >{{ $data->cp_ops_telp1 }}</strong ></td>
            <td><strong >{{ $data->cp_ops_email1 }}</strong ></td>
            <td><strong >{{ $data->cp_adm_nama1 }}</strong ></td>
            <td><strong >{{ $data->cp_adm_jabatan1}}</strong ></td>
            <td><strong >{{ $data->cp_adm_bagian1 }}</strong ></td>
            <td><strong >{{ $data->cp_adm_telp1 }}</strong ></td>
            <td><strong >{{ $data->cp_adm_email1 }}</strong ></td>
        </tr>
      @endforeach
    </table>
</html>