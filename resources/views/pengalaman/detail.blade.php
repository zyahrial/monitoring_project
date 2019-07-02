<!DOCTYPE html>
<title>DETAIL</title>
@include('partials/header2')
  <!-- Left side column. contains the logo and sidebar --> 
  <!-- Content Wrapper. Contains page content -->
<body>
      <section class="wrapper" style="background-color: white; color: black;">
                   @if(checkPermission(['admin','superadmin']))
      <a href="/pengalaman" style="color: blue;" >
      <button class="btn-sm btn-success"><i class="fa fa-arrow-left"></i> Back To List</button></a>
                  @endif
                  <br><br>
      @include('alert.flash-message')
        @php ($date_now = date('Y-m-d'))
        @php(
          $no = 1 {{-- buat nomor urut --}}
          )
        {{-- loop all pengalaman --}}
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

       <header class="bg-primary" style="color: white; padding-left: 5px; padding: 5px; font-size: 12px;">
        <strong><i>REVIEW PENGALAMAN - {{ $data->kd_pengalaman }}</i></strong></header>
        <div class="panel-body " style="margin-left:10px; margin-right: 10px; ">
          <div class="col-xs-6" style="font-size: 12px;">
            <address>           
             <div> <strong><u>NAMA PEKERJAAN</u> </strong></div>
             <div style="color: blue; margin-left: 10px; font-size: 14px; width: 90%;">
              <p style="font-family: Helvetica;">{{$data->nama_pekerjaan}}</p></div><br>
             <div> <strong><u>BIDANG / SUB BIDANG PEKERJAAN</u></strong></div>
             <div style="color: blue; margin-left: 10px; font-size: 14px; width: 90%;">
              <p style="font-family: Helvetica;">{{$data->sub_pekerjaan}}</p></div><br>
             <div><strong><u>RINGKASAN RUANG LINGKUP </u></strong></div>
              <div style="color: blue; margin-left: 10px; font-size: 14px; width: 90%;" >
                <p style="font-family: Helvetica;">{{$data->ringkasan_lingkup}}</p></div><br>
              <div><strong><u>LOKASI PEKERJAAN </u></strong></div>
              <div style="color: blue; margin-left: 10px; font-size: 14px; width: 90%;">
                <p style="font-family: Helvetica;">{{$data->lokasi_pekerjaan}}</p></div>
            </address>
          </div>
            <div  style="font-size: 12px;" class="col-xs-6 text-right">
            <address>
              <div><strong><u>GRUP JASA</u></strong></div>
             <div style="color: blue; margin-right: 10px; font-size: 14px; ">
              <p style="font-family: Helvetica;">{{$data->kelompok_jasa}}</p></div> <br>
             <div><strong><u>SUB JASA</u></strong></div>
             <div style="color: blue; margin-right: 10px; font-size: 14px;">
              <p style="font-family: Helvetica;">{{$data->sub_jasa}}</p></div> <br>
             <div><strong><u>CP SPRINT</u></strong></div>
              <div style="color: blue; margin-right: 10px; font-size: 14px;">
                <p style="font-family: Helvetica;">{{$data->cp_internal}}</p></div><br>
              <div><strong><u>CP EMAIL</u></strong></div>
              <div style="color: blue; margin-right: 10px; font-size: 14px;">
                <p style="font-family: Helvetica;">{{$data->cp_internal_email}}</p></div>
              </address>
          </div>
        </div>
<div class="panel-body" style="margin-left:10px; margin-right: 10px;">
          <div class="col-lg-5" style="font-size: 12px;">
            <div class="panel panel-info">
           <div class="panel-heading" style="margin-top: 5px;">KLIEN ({{ $data->kd_klien }})</div>
               <div class="panel-content" style="height: 200px; background-color: #F5F5F5">
                  <div><strong><u>NAMA KLIEN</u></strong></div>
              <text style="font-family: Helvetica; color: blue;">
                  {{ $data->nama_klien }}</text><br><br>
                  <div ><strong><u>ALAMAT</u></strong></div>
                  <text style="font-family: Helvetica; color: blue;">{{$data->alamat}}</text><br><br>
                  <div style="margin-top: 5px;"><strong><u>TLP/FAX</u></strong></div>
                 <text style="font-family: Helvetica; color: blue;">{{ $data->telp_fax }}</text>
            </div>
          </div>
        </div>
          <div class="col-lg-3" style="font-size: 12px;">
            <div class="panel panel-info">
           <div class="panel-heading" style="margin-top: 5px;">KONTRAK</div>
               <div class="panel-content" style="height: 200px; background-color: #F5F5F5">
                  <div><a target="_blank" href="/file/pengalaman/kontrak/KONTRAK-{{ $data->kd_pengalaman }}.pdf" 
                  title="Lihat File" >
                    <i class="fa fa-file"></i><text style="font-family: Helvetica; color: blue;">
                      {{ $data->no_kontrak }}</text></a></div><br>
                  <div ><strong><u>NILAI</u></strong></div><div><text style="font-family: Helvetica; color: blue;">{{$nilai_kontrak}}</text></div><br>
                  <div ><strong><u>MULAI/SELESAI</u></strong></div>
@php(  $mulai = new DateTime($data->kontrak_mulai)    )
@php(  $selesai = new DateTime($data->kontrak_selesai)    )
@php(  $diff = $selesai->diff($mulai))
@php(  $tahun = $diff->y )
@php(  $bulan = $diff->m )
@php(  $hari = $diff->d )
                <div><i class="fa fa-circle" style="color: green"></i>
                  <text style="font-family: Helvetica; color: blue;">{{ $kontrak_mulai }}</text>
                <br><i class="fa fa-circle" style="color: red"></i>
                <text style="font-family: Helvetica; color: blue;">{{ $kontrak_selesai }}</text></div><br>
                  @if ($data->kontrak_mulai > 0)
                <div align="center"><text style="background-color: silver; color:black; padding: 3px;">
                <text style="font-family: Helvetica; color: blue;">
                 <i>{{ $tahun." Tahun"}} {{ $bulan." Bulan"}} {{ $hari." Hari"}}</i></text></div>
                  @else
                <div></div>
                 @endif
          </div>
        </div>
</div>
          <div class="col-lg-2" style="font-size: 12px;">
            <div class="panel panel-info">
           <div class="panel-heading" style="margin-top: 5px;">PERSONIL TERLIBAT</div>
               <div class="panel-content" style="height: 200px; background-color: #F5F5F5">
                  <div><strong><i class="fa fa-user"></i>
PM</strong></div>
<text style="font-family: Helvetica; color: blue;"><i>{{ $data->pm }}</i></text><br><br>
                  <div ><strong><i class="fa fa-users"></i>
                  KONSULTAN</strong></div>
                  <p style="font-family: Helvetica;"><text style="font-family: Helvetica; color: blue;"><i>{{$data->konsultan}}</i></text><br>
          </div>
        </div>
</div>

          <div class="col-lg-2" style="font-size: 12px;">
            <div class="panel panel-info">
           <div class="panel-heading" style="margin-top: 5px;"> DOKUMEN FINAL</div>
               <div class="panel-content" style="height: 200px; background-color: #F5F5F5">
                  <div></div>
        <div>
        @if ($data->bast_doc > '0' )
<a target="_blank" href="/file/pengalaman/bast/{{ $data->bast_doc }}" > <strong><i class="fa fa-file"></i> BAST</strong></a>
        @else
         <strong><small style="color: red;"><i>Tidak Ada File Bast</i></small></strong>
        @endif
</div><br>
<div ></div><div>
        @if ($data->referensi_doc > '0' )
<a target="_blank" href="/file/pengalaman/ref/{{ $data->referensi_doc }}" ><strong><i class="fa fa-file"></i> REFERENSI </strong></a>
        @else
        <strong><small style="color: red;"><i>Tidak Ada File Referensi</i></small></strong>
        @endif
            </div><br>
          </div>
        </div>
</div>
                  @if ($data->nilai_addendum > 0)
<div class="panel-body">
<table class=" bg-warning table table-advance table-bordered" style="font-size: 12px;">
                <thead class="bg-info">
               <th style="border-right-color:#d9edf7  ">
                <strong>NO-ADDENDUM</strong></th>
               <th ><strong>NILAI ADDENDUM </strong></th>
               <td align="center" style="border-right-color:#d9edf7  "><strong>TGL.</strong></th>
               <td align="center" ><strong>JANGKA WAKTU<strong></td>                
</tr>
</thead>
<tbody >
            <td  style="border-right-color:white;">
          <a target="_blank" href="/file/pengalaman/addendum/ADDENDUM1-{{ $data->kd_pengalaman }}.pdf"  ><strong >{{$data->no_addendum1}}</strong></a></td>
            <td  ><strong >{{$nilai_addendum}}</strong></td>
            <td align="center" style="border-right-color:white;"><strong >{{$data->addedum_mulai}}</strong> / <strong> {{$data->addendum_selesai}}</strong></td>
            @php(  $mulai = new DateTime($data->addedum_mulai) )
@php(  $selesai = new DateTime($data->addendum_selesai) )
@php(  $diff = $selesai->diff($mulai))
@php(  $tahun = $diff->y )
@php(  $bulan = $diff->m )  
@php(  $hari = $diff->d )           
            <td align="center">
              @if ($data->addedum_mulai > 0)
              <div align="center"><text style="background-color: silver; color:black; padding: 3px;">
              <small>{{ $tahun." Tahun"}} {{ $bulan." Bulan"}} {{ $hari." Hari"}}</small></div>
              @else
              <div></div>
            @endif</td>
              <tr>
           <td colspan="2" >
             <a target="_blank" href="/file/pengalaman/addendum/ADDENDUM2-{{ $data->kd_pengalaman }}.pdf"  ><strong>{{$data->no_addendum2}}</strong></a></td><td colspan="2"></td>
            <tr>
            <td  colspan="2" >
             <a target="_blank" href="/file/pengalaman/addendum/ADDENDUM3-{{ $data->kd_pengalaman }}.pdf"  ><strong>{{$data->no_addendum3}}</strong></a></td><td colspan="2"></td>
            <tr>         
           <td  colspan="2" >
            <a target="_blank" href="/file/pengalaman/addendum/ADDENDUM4-{{ $data->kd_pengalaman }}.pdf"  ><strong>{{$data->no_addendum4}}</strong></a></td><td colspan="2"></td>
           <tr> 
           <td  colspan="2" >
           <a target="_blank" href="/file/pengalaman/addendum/ADDENDUM5-{{ $data->kd_pengalaman }}.pdf"  ><strong>{{$data->no_addendum5}}</strong></a></td> <td colspan="2"></td>
         </tr>
         <tr>
      </tbody>
      </div>
    </table>
    @else
    <div><small style="color: red;"><i>TIDAK ADA ADDENDUM</i></small></div>
    @endif
    <div  class="panel-body" >
          @if(checkPermission(['admin','superadmin']))
        <a href="{{ URL('pengalaman/show') }}/{{ $data->kd_pengalaman }}" >
        <button class="btn btn-sm btn-raised btn-info" style="margin-bottom: 5px;" onclick="return" title="Ubah" confirm('Yakin mau ubah data ?')"
        type="submit">
        <i class="fa fa-edit"></i></button></a>
        @endif
        @if(checkPermission(['superadmin']))
        <form action="{{action('PengalamanController@destroy', $data['kd_pengalaman'])}}" method="post">
         {{ csrf_field() }}
        <input name="_method" type="hidden" value="PATCH">
        <button class="btn btn-sm btn-raised btn-danger" title="Hapus" onclick="return confirm('Yakin mau hapus data ?')" type="submit">
        <i class="fa fa-trash-o" style="font-size: 15px;"></i>
        </button>
        </form>
        @endif
  </div>
@endforeach
            </section>
          </div>
        <!-- page end-->
      </section>
@include('partials/footer')
  </body>
</html>
