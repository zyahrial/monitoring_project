<!DOCTYPE html>
<title>DETAIL KLIEN</title>
        @php ($date_now = date('Y-m-d'))
        @php(
          $no = 1 {{-- buat nomor urut --}}
          )
        {{-- loop all klien --}}
        @foreach ($klien as $data)
  <!-- Left side column. contains the logo and sidebar --> 
  <!-- Content Wrapper. Contains page content -->
<body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
      <section class="wrapper" style="background-color: white;">
                @include('partials/header2')
          @include('partials.sidebar')
       <div class="content-wrapper">
    <section class="content">
                <div class="box-body" style="text-align: left;">
      <a  href="/klien" class="btn btn-app">
                <i class="fa fa-arrow-circle-left" title="BACK" style="font-size: 32px;"></i> </a>
           </div>
            @include('alert.flash-message')    
<div class="panel-body " style="background-color: #F5F5F5; margin-left:5px; margin-right: 5px; ">
            <header class="bg-primary" style="color: white; padding-left: 5px; padding: 5px;"><strong>
              <i>REVIEW KLIEN ({{ $data->kd_klien }})</i></strong></header>
          <div class="col-xs-6" style="font-size: 12px; font-size: 14px; margin-top: 5px;">
            <address>           
             <div ><i class="fa fa-building-o"></i><text style="color: #F5F5F5">__</text><strong>
              <text style="color: blue;">{{$data->nama_klien}}</text></strong></div>
             <div ><i class="fa fa-phone"></i><text style="color: #F5F5F5">__</text><strong>
              <text style="color: blue;"> {{$data->telp_fax}}</text></strong></div>
              <div ><i class="fa fa-envelope"></i><text style="color: #F5F5F5">__</text><strong>
                <text style="color: blue;"> {{$data->email}}</text></strong></div>
              <div ><i class="fa fa-globe"></i><text style="color: #F5F5F5">__</text><strong>
                <text style="color: blue;">{{$data->website}}</text></strong></div><br>
              <strong><u>Alamat</u></strong><br><div style="color: blue;">{{$data->alamat}}</div><br>
              <strong><u>No.NPWP</u></strong><br><div style="color: blue;">{{$data->no_npwp}}</div>

            </address>
          </div>
            <div  style="font-size: 12px;  font-size: 14px; margin-top: 5px;" class="col-xs-6 text-right">
            <address>
             <strong><u>Jenis Usaha</u></strong><br><div style="color: blue;">{{$data->jenis_usaha}}</div><br>
             <strong><u>Jenis Sektor</u></strong><br><div style="color: blue;">{{$data->jenis_sektor}}</div><br>
             <strong><u>Sub Sektor</u></strong><br><div style="color: blue;">{{$data->sub_sektor}}</div><br>
             <strong><u>Attach File</u></strong><br>            
                    @if ($data->npwp > '0' )
        <a href="/file/npwp/{{ $data->npwp }}" target="_blank" title="Download NPWP" style="color: blue;" title="Klik Untuk Melihat File">NPWP</a>
        @else
        <small style="color: red;">Tidak di temukan</small>
        @endif
              </address>
          </div>
           <table class="table table-advance table-bordered " style="font-size: 11px; background-color: white;">
                <thead class="bg-primary">
             <td colspan="5" align="center" ><strong >CONTACT PERSON - OPERASIONAL</strong></td>
             <td colspan="5" align="center"><strong >CONTACT PERSON - PENAGIHAN/ADMINISTRASI</strong></td><tr>
            <th style="border-right-color:#F0F8FF  "><strong>NAMA</strong></td>
            <th style="border-right-color:#F0F8FF  "><strong>JABATAN</strong></td>
            <th style="border-right-color:#F0F8FF  "><strong>BAGIAN</strong></td>
             <th style="border-right-color:#F0F8FF  "><strong>TELP</strong></td>
              <th ><strong>EMAIL</strong></td>

             <th style="border-right-color:#F0F8FF  "><strong>NAMA</strong></td>
            <th style="border-right-color:#F0F8FF  "><strong>JABATAN</strong></td>
            <th style="border-right-color:#F0F8FF  "><strong>BAGIAN</strong></td>
             <th style="border-right-color:#F0F8FF  "><strong>TELP</strong></td>
              <th ><strong>EMAIL</strong></th>
        </tr>
</thead>

<tbody>
          <td style="border-right-color: #F5F5F5  ">{{ $data->cp_ops_nama1 }}</td>
          <td  style="border-right-color:#F5F5F5  ">{{ $data->cp_ops_jabatan1 }}</td>
          <td  style="border-right-color:#F5F5F5  ">{{ $data->cp_ops_bagian1 }}</td>
          <td  style="border-right-color:#F5F5F5  ">{{ $data->cp_ops_telp1 }}</td>
          <td>{{ $data->cp_ops_email1 }}</td>

          <td  style="border-right-color:#F5F5F5  ">{{ $data->cp_adm_nama1 }}</td>
          <td  style="border-right-color:#F5F5F5  ">{{ $data->cp_adm_jabatan1 }}</td>
          <td  style="border-right-color:#F5F5F5  ">{{ $data->cp_adm_bagian1 }}</td>
          <td  style="border-right-color:#F5F5F5  ">{{ $data->cp_adm_telp1 }}</td>
          <td>{{ $data->cp_adm_email1 }}</td><tr>

          <td  style="border-right-color:#F5F5F5  ">{{ $data->cp_ops_nama2 }}</td>
          <td  style="border-right-color:#F5F5F5  ">{{ $data->cp_ops_jabatan2 }}</td>
          <td  style="border-right-color:#F5F5F5  ">{{ $data->cp_ops_bagian2 }}</td>
          <td  style="border-right-color:#F5F5F5  ">{{ $data->cp_ops_telp2 }}</td>
          <td>{{ $data->cp_ops_email2 }}</td>

          <td  style="border-right-color:#F5F5F5  ">{{ $data->cp_adm_nama2 }}</td>
          <td  style="border-right-color:#F5F5F5  ">{{ $data->cp_adm_jabatan2 }}</td>
          <td  style="border-right-color:#F5F5F5  ">{{ $data->cp_adm_bagian2 }}</td>
          <td  style="border-right-color:#F5F5F5  ">{{ $data->cp_adm_telp2 }}</td>
          <td>{{ $data->cp_adm_email2 }}</td><tr>

          <td  style="border-right-color:#F5F5F5  ">{{ $data->cp_ops_nama3 }}</td>
          <td  style="border-right-color:#F5F5F5  ">{{ $data->cp_ops_jabatan3 }}</td>
          <td  style="border-right-color:#F5F5F5  ">{{ $data->cp_ops_bagian3 }}</td>
          <td  style="border-right-color:#F5F5F5  ">{{ $data->cp_ops_telp3 }}</td>
          <td>{{ $data->cp_ops_email3 }}</td>
          <td  style="border-right-color:#F5F5F5  ">{{ $data->cp_adm_nama3 }}</td>
          <td  style="border-right-color:#F5F5F5  ">{{ $data->cp_adm_jabatan3 }}</td>
          <td  style="border-right-color:#F5F5F5  ">{{ $data->cp_adm_bagian3 }}</td>
          <td  style="border-right-color:#F5F5F5  ">{{ $data->cp_adm_telp3 }}</td>
          <td>{{ $data->cp_adm_email3 }}</td><tr>

          <td  style="border-right-color:#F5F5F5  ">{{ $data->cp_ops_nama4 }}</td>
          <td  style="border-right-color:#F5F5F5  ">{{ $data->cp_ops_jabatan4 }}</td>
          <td  style="border-right-color:#F5F5F5  ">{{ $data->cp_ops_bagian4 }}</td>
          <td  style="border-right-color:#F5F5F5  ">{{ $data->cp_ops_telp4 }}</td>
          <td>{{ $data->cp_ops_email4 }}</td>

          <td  style="border-right-color:#F5F5F5  ">{{ $data->cp_adm_nama4 }}</td>
          <td  style="border-right-color:#F5F5F5  ">{{ $data->cp_adm_jabatan4 }}</td>
          <td  style="border-right-color:#F5F5F5  ">{{ $data->cp_adm_bagian4 }}</td>
          <td  style="border-right-color:#F5F5F5  ">{{ $data->cp_adm_telp4 }}</td>
          <td>{{ $data->cp_adm_email4 }}</td><tr>

          <td  style="border-right-color:#F5F5F5  ">{{ $data->cp_ops_nama5 }}</td>
          <td  style="border-right-color:#F5F5F5  ">{{ $data->cp_ops_jabatan5 }}</td>
          <td  style="border-right-color:#F5F5F5  ">{{ $data->cp_ops_bagian5 }}</td>
          <td  style="border-right-color:#F5F5F5  ">{{ $data->cp_ops_telp5 }}</td>
          <td>{{ $data->cp_ops_email5 }}</td>

          <td  style="border-right-color:#F5F5F5  ">{{ $data->cp_adm_nama5 }}</td>
          <td  style="border-right-color:#F5F5F5  ">{{ $data->cp_adm_jabatan5 }}</td>
          <td  style="border-right-color:#F5F5F5  ">{{ $data->cp_adm_bagian5 }}</td>
          <td  style="border-right-color:#F5F5F5  ">{{ $data->cp_adm_telp5 }}</td>
          <td>{{ $data->cp_adm_email5 }}</td><tr>
   </tbody>   
      </div>
    </table>
        <div  class="panel-body" >
      @if(checkPermission(['admin','superadmin']))
        <a href="{{ URL('klien/show') }}/{{ $data->kd_klien }}"  >
        <button class="btn btn-sm btn-raised btn-info" onclick="return" title="Ubah" confirm('Yakin mau ubah data ?')"
          type="submit" style="margin-bottom: 5px;">
          <i class="fa fa-edit"></i></button></a>
      @endif
      @if(checkPermission(['superadmin']))
        <form action="{{url('/klien/destroy', $data->kd_klien)}}" method="post">
         {{ csrf_field() }}
        <input name="_method" type="hidden" value="PATCH">
        <button class="btn btn-sm btn-raised btn-danger" title="Hapus" onclick="return confirm('Yakin mau hapus data ?')" type="submit">
        <i class="fa fa-trash-o" style="font-size: 15px;"></i>
         </button></form>
      @endif
         </div>
        </div>
        <br>
   <header  class="bg-primary" style="margin-top: 5px; padding: 5px"><strong>PENGALAMAN  - {{ $data->nama_klien }}</strong></header>
  @endforeach
     <table class="table table-advance table-bordered" style=" font-size: 11px; background-color: white;">

            <thead class="bg-info">
            <td ><strong>KODE</strong></td>
            <td style="border-right-color:#d9edf7; width: 20%;  "><strong>KELOMPOK/SUB<text style="color:#d9edf7; ">_</text>JASA</strong></td>
             <td style="border-right-color:#d9edf7; width: 20%;  "><strong>NAMA<text style="color:#d9edf7">_</text>PEKERJAAN</strong></td>
              <td style="border-right-color:#d9edf7; width: 20%;"><strong>RUANG LINGKUP</strong></td>
             <td style="border-right-color:#d9edf7 "><strong>LOKASI<text style="color:#d9edf7">_</text>PEKERJAAN</strong></td>
            <td style="border-right-color:#d9edf7  "><strong>NO.KONTRAK</strong></td>
            <td ><strong>NILAI</strong></td>
             <td style="border-right-color:#d9edf7  "><strong>MULAI/SELESAI</strong></td>
        </tr>
</thead>
        @php(
          $no = 1 {{-- buat nomor urut --}}
          )
        {{-- loop all klien --}}
        @foreach ($pengalaman as $data_pengalaman)
                @if (empty($data_pengalaman->kontrak_mulai))
        @php  ( $kontrak_mulai = '')
        @else
        @php  ( $kontrak_mulai = date('d M Y', strtotime($data_pengalaman->kontrak_mulai)))
        @endif
        @if (empty($data_pengalaman->kontrak_selesai))
        @php  ( $kontrak_selesai = '')
        @else
        @php  ( $kontrak_selesai = date('d M Y', strtotime($data_pengalaman->kontrak_selesai)))
        @endif

        @if (empty($data_pengalaman->nilai_kontrak))
        @php  ( $nilai_kontrak = '')
        @else
        @php ($nilai_kontrak = (number_format($data_pengalaman->nilai_kontrak,0,",",".").""))
        @endif
<tbody >
          <td  ><a href="/pengalaman/detail/{{ $data_pengalaman->kd_pengalaman }}" target="blank" style="color: blue;" title="Klik Untuk Melihat Detail" ><strong >{{ $data_pengalaman->kd_pengalaman}}</strong></a></td>
          <td style="border-right-color:white;  "><strong >- {{ $data_pengalaman->kelompok_jasa}}<br>
          - {{ $data_pengalaman->sub_jasa}}</strong></td>
          <td  style="border-right-color:white  "><strong >{{ $data_pengalaman->nama_pekerjaan}}</strong></td>
          <td style="border-right-color:white  "><strong >{{ $data_pengalaman->ringkasan_lingkup}}</strong></td>
          <td style="border-right-color:white  "><strong >{{ $data_pengalaman->lokasi_pekerjaan}}</strong></td>
          <td  style="border-right-color:white  "><strong >{{ $data_pengalaman->no_kontrak}}</strong></td>
          <td  ><strong >{{ $nilai_kontrak }}</strong></td>
          <td  style="border-right-color:white  "><strong >{{ $kontrak_mulai}}<br>{{ $kontrak_selesai }}</strong></td>
          @endforeach
<tr>
   </tbody></div></table>
        {{ $pengalaman->fragment('foo')->links() }}
    <br>
   <table class="table table-advance table-bordered" style="font-size: 11px; font-color:black; background-color: white;">
       <header class="bg-primary" style="margin-top: 5px; padding: 5px"><strong> TENDER KALAH  - {{ $data->nama_klien }}</strong></header>
                <thead class="bg-info">
                   <th colspan="3"></th>
                   <td colspan="2" align="center"><strong>PROSES KAK RAB</strong></th>
                   <td colspan="2" align="center"><strong>PROSES TENDER</strong></th>
                   <th colspan="2"></th>
                   <tr>
                <th style="border-right-color:#d9edf7; width: 7%"><strong>CLOSE</strong></th>
               <th style="border-right-color:#d9edf7; width: 20%; "><strong>KELOMPOK/SUB JASA</strong></th>
               <th style=" width: 20%;"><strong>NAMA PEKERJAAN</strong></th>
              
               
               <th style="border-right-color:#d9edf7  "><strong>TGL.</strong></th>
               <th ><strong>NILAI</strong></th>
                <th style="border-right-color:#d9edf7  "><strong>TGL.</strong></th>
               <th ><strong>NILAI</strong></th>
               <th style="border-right-color:#d9edf7  "><strong>PIC SPRINT</strong></th>
               <td align="center" ><strong>STATUS</strong></th>
        </tr>
        </thead>
        @php(
          $no = 1 {{-- buat nomor urut --}}
          )
        {{-- loop all klien --}}
        @foreach ($his_pem_tender as $data_history)
                        @if (empty($data_history->tgl_pengambilan_doc))
        @php  ( $tgl_pengambilan_doc = '')
        @else
        @php  ( $tgl_pengambilan_doc = date('d M Y', strtotime($data_history->tgl_pengambilan_doc)))
        @endif
        @if (empty($data_history->tgl_kak))
        @php  ( $tgl_kak = '')
        @else
        @php  ( $tgl_kak = date('d M Y', strtotime($data_history->tgl_kak)))
        @endif

        @if (empty($data_history->nilai_kak))
        @php  ( $nilai_kak = '')
        @else
        @php ($nilai_kak = (number_format($data_history->nilai_kak,0,",",".").""))
        @endif
        @if (empty($data_history->harga_penawaran))
        @php  ( $harga_penawaran = '')
        @else
        @php ($harga_penawaran = (number_format($data_history->harga_penawaran,0,",",".").""))
        @endif
<tbody >
  <tr >
         @php  ( $date = date('d M Y', strtotime($data_history->created_at)))
        <td style="border-right-color:white  "><strong ><small>{{$date}}</small><br>
<strong ><a href="/history/pem_tender/{{ $data_history->kd_his_tender }}" target="blank" style="color: blue;" title="Klik Untuk Melihat Detail" >{{$data_history->kd_his_tender}}</a></strong></strong></a></td>
           <td style="border-right-color:white  "><strong >- {{$data_history->kelompok_jasa}}<br>
            - {{$data_history->sub_jasa}}</strong></td>
            <td ><strong >{{$data_history->nama_pekerjaan}}</strong></td>       
            <td style="border-right-color:white "><strong >{{$tgl_kak}}</strong></td>
          <td><strong >{{ $nilai_kak }}</strong></td>
          <td style="border-right-color:white "><strong >{{$tgl_pengambilan_doc}}</strong></td>
          <td ><strong>{{ $harga_penawaran}} </strong></td>
              <td style="border-right-color:white "><strong>{{ $data_history->cp_internal}} </strong></td>
              @if ( $data_history->status_closing == 'MENANG')
             <td align="center" style="background-color: green; color: white;"><strong>MENANG<strong></td>
              @else
             <td align="center" ><strong>
              <text style="background-color: red; color: white; padding: 5px;">KALAH</text><strong></td>
              @endif          
            </tr>
              @endforeach
         </table>
    {{ $his_pem_tender->fragment('foo')->links() }}
    <br>
   <table class="table table-advance table-bordered" style="font-size: 11px; font-color:black; background-color: white;">
   <header class="bg-primary" style="margin-top: 5px; padding: 5px">
    <strong>NON TENDER KALAH - {{ $data->nama_klien }}</strong></header>
    <thead class="bg-info"> <tr>
               <th style="border-right-color:#d9edf7  "><strong>CLOSE</strong></th>
               <th style="border-right-color:#d9edf7;width: 20%;"><strong>KELOMPOK/SUB JASA</strong></th>
               <th style="border-right-color:#d9edf7;width: 20%;"><strong>NAMA PEKERJAAN</strong></th>
               <td align="center"><strong>PERMINTAAN</strong></th>
               <td align="center" style="border-right-color:#d9edf7  "><strong>TGL.KAK RAB</strong></th>
               <td align="center" ><strong>NILAI</strong></th>
                <td align="center" style="border-right-color:#d9edf7  "><strong>TGL.PROPOSAL</strong></th>
               <td align="center" ><strong>HARGA </strong></th>
               <th><strong>PIC SPRINT</strong></th>
               <th><strong>STATUS</strong></th>
        </tr>
        @php(
          $no = 1 {{-- buat nomor urut --}}
          )
        {{-- loop all klien --}}
        @foreach ($his_pem_non_tender as $data)
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
        </thead>
<tbody >
        @php  ( $date = date('d M Y', strtotime($data->created_at)))
        <td style="border-right-color:white"><strong ><small>{{$date}} <br>
<a href="/history/pem_non_tender/{{ $data->kd_his_pn_non_tender }}" target="blank" style="color: blue;" title="Klik Untuk Melihat Detail" ><strong>{{$data->kd_his_pn_non_tender}}</strong></a></small></td>
           <td style="border-right-color:white  "><strong >-{{$data->kelompok_jasa}}</strong><br><strong >-{{$data->sub_jasa}}</strong></td>
            <td style="border-right-color:white  "><strong >{{$data->nama_pekerjaan}}</strong></td>
           <td align="center"><strong >{{$tgl_permintaan}}</strong></td>
            <td align="center" style="border-right-color:white  "><strong >{{$tgl_kak}}</strong></td>
          <td align="center"><strong >{{ $nilai_kak }}</strong></td>
            <td align="center" style="border-right-color:white  "><strong >{{$tgl_proposal}}</strong></td>
              <td align="center" ><strong>{{ $nilai_penawaran}} </strong></td>
              <td ><strong>{{ $data->cp_internal}} </strong></td>
            @if ( $data->status_closing == 'MENANG')
             <td align="center" style="background-color: green; color: white;"><strong>MENANG<strong></td>
              @else
             <td align="center" ><strong><text style="background-color: red; color: white; padding: 5px;">KALAH
             </text><strong></td>
              @endif 
    @endforeach      
    </table>
        {{ $his_pem_non_tender->fragment('foo')->links() }}
            </section>
</div>
        <!-- page end-->
@include('partials/footer')
  </section>
</body>
</html>
