<!DOCTYPE html>
<title>DETAIL</title>
<body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
      <section class="wrapper" style="background-color: white;">
                @include('partials/header2')
          @include('partials.sidebar')
       <div class="content-wrapper">
    <section class="content" style="background-color: white;">
                   @if(checkPermission(['admin','superadmin']))
                       <div class="box-body" style="text-align: left;">
            <a href="{{ URL('/pengalaman') }}" class="btn btn-app" >
                <i class="fa fa-arrow-circle-left" title="BACK" style="font-size: 32px;"></i> </a>
    </div>
                  @endif
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

<header class="bg-primary detail" >
        <strong><i>REVIEW PENGALAMAN - {{ $data->kd_pengalaman }}</i></strong></header>
<div class="info-box " style="width: 90%;">
<span class="info-box-icon" style="background-color: white;"><i class="fa fa-building"></i></span>

            <div class="info-box-content">
           <span class="info-box-text">NAMA KLIEN</span>
              <span class="info-box-number">{{$data->nama_klien}}</span>
                <div class="progress">
                <div class="progress-bar"></div>
              </div>
                             <span class="info-box-text">ALAMAT</span>
              <span class="info-box-number">{{ $data->alamat }}</span>
              <div class="progress">
                <div class="progress-bar"></div>
              </div>
                             <span class="info-box-text">TELP</span>
              <span class="info-box-number">{{ $data->telp_fax }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
              <div class="panel-body" style="margin-left:10px; margin-right: 10px; ">
      <div class="col-md-3">
                  <!-- /.info-box -->
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fa fa-location-arrow"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><strong>LOKASI PEKERJAAN :</strong></span>
              <span class="info-box-number" style="font-size: 12px;"> {{ $data->lokasi_pekerjaan }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fa fa-handshake-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><strong>GRUP JASA :</strong></span>
              <span class="info-box-number" style="font-size: 12px;">{{$data->kelompok_jasa}}</span>
              <hr>
               <span class="info-box-text"><strong>SUB JASA :</strong></span>
              <span class="info-box-number" style="font-size: 12px;">{{$data->sub_jasa}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
        </div>
          <div class="col-md-3">
                  <!-- /.info-box -->
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fa fa-tasks"></i></span>
            <div class="info-box-content">
              <span class="info-box-text"><strong>NAMA PEKERJAAN :</strong> </span>
              <span class="info-box-number" style="font-size: 12px;">{{$data->nama_pekerjaan}}</span>
              <hr>
                            <span class="info-box-text"><strong>SUB PEKERJAAN :</strong></span>
                                          <span class="info-box-number" style="font-size: 12px;">{{$data->sub_pekerjaan}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
                   <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fa fa-exchange"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><strong>RINGKASAN RUANG LINGKUP</strong></span>
              <hr>
              <span class="info-box-number" style="font-size: 12px;">{{$data->ringkasan_lingkup}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
        </div>
        <div class="col-md-3">
                  <!-- /.info-box -->
          <div class="info-box bg-blue">
            <span class="info-box-icon"><i class="fa fa-users"></i></span>
            <div class="info-box-content">
                            <span class="info-box-text"><strong>CP SPRINT :</strong></span>
                                          <span class="info-box-number" style="font-size: 12px;">{{$data->cp_internal}}<br>{{$data->cp_internal_email}}</span>
                                          <hr>
                            <span class="info-box-text"><strong>CONTACT PERSON :</strong></span>
                                          <span class="info-box-number" style="font-size: 12px;">{{$data->cp_ops_nama1}}<br>{{$data->cp_ops_telp1}}<br>{{$data->cp_ops_email1}}</span>
                                          <hr>
                                          <span class="info-box-text"><strong>SUMBER INFORMASI :</strong></span>
                                          <span class="info-box-number" style="font-size: 12px;">{{$data->informasi_nama}}<br>{{$data->informasi_telp}}<br>{{$data->informasi_email}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
        </div>
            <div  style="font-size: 12px;" class="col-xs-6 text-right">
          </div>
        </div>
        <div class="info-box " style="width: 90%; padding-left: 20px; padding-top: 20px;">
          <div class="col-lg-3" style="font-size: 12px;">
            <div class="panel panel-info">
           <div class="bg-primary detail-header">KONTRAK</div>
               <div class="detail-body panel-content" style="height: 200px; ">
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
                <div style="padding: 10px; text-align: center;" >
                <text class="bg-aqua" style="padding: 10px;">
                 <i>{{ $tahun." Tahun"}} {{ $bulan." Bulan"}} {{ $hari." Hari"}}</i></text></div>
                  @else
                <div></div>
                 @endif
          </div>
        </div>
</div>
          <div class="col-lg-2" style="font-size: 12px;">
            <div class="panel panel-info">
           <div class="bg-primary detail-header">PERSONIL TERLIBAT</div>
               <div class="detail-body panel-content" style="height: 200px; ">
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
           <div class="bg-primary detail-header"> DOKUMEN FINAL</div>
               <div class="detail-body panel-content" style="height: 200px; ">
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
<table id="example1" class="table table-bordered table-striped" style="background-color: white; color: black; padding-top: 30px;">
                <thead class="bg-aqua">
               <th style="border-right-color:#d9edf7  ">
                <strong>NO-ADDENDUM</strong></th>
               <th ><strong>NILAI ADDENDUM </strong></th>
               <td align="center" style="border-right-color:#d9edf7  "><strong>TANGGAL ADDENDUM</strong></th>
               <td align="center" ><strong>JANGKA WAKTU<strong></td>                
</tr>
</thead>
<tbody >
            <td  style="border-right-color:white;">
          <a target="_blank" href="/file/pengalaman/addendum/ADDENDUM1-{{ $data->kd_pengalaman }}.pdf"  ><strong >{{$data->no_addendum1}}</strong></a></td>
            <td  ><strong >{{$nilai_addendum}}</strong></td>
            <td align="center" style="border-right-color:white;"><strong >{{$data->addedum_mulai}}</strong> s.d <strong> {{$data->addendum_selesai}}</strong></td>
            @php(  $mulai = new DateTime($data->addedum_mulai) )
@php(  $selesai = new DateTime($data->addendum_selesai) )
@php(  $diff = $selesai->diff($mulai))
@php(  $tahun = $diff->y )
@php(  $bulan = $diff->m )  
@php(  $hari = $diff->d )           
            <td align="center">
              @if ($data->addedum_mulai > 0)
              <div align="center"><text class="bg-aqua" style="padding: 10px;">
              <small>{{ $tahun." Tahun"}} {{ $bulan." Bulan"}} {{ $hari." Hari"}}</small></text></div>
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
<div></div>
    @endif
          @if(checkPermission(['admin','superadmin']))
            <div class="col-lg-2" style="font-size: 12px;">
            <div class="panel panel-info">
           <div class=" detail-header bg-primary " style="margin-top: 5px;">ACTION</div>
               <div class="detail-body panel-content  " >
        <a href="{{ URL('pengalaman/show') }}/{{ $data->kd_pengalaman }}" >
        <button class="btn btn-sm btn-raised btn-info" style="margin-bottom: 5px;" title="Ubah" onclick="return confirm('Yakin mau ubah data ?')"
        type="submit">
        <i class="fa fa-edit"></i> Edit</button></a>
        @endif
        @if(checkPermission(['superadmin']))
        <form action="{{action('PengalamanController@destroy', $data['kd_pengalaman'])}}" method="post">
         {{ csrf_field() }}
        <input name="_method" type="hidden" value="PATCH">
        <button class="btn btn-sm btn-raised btn-danger" title="Hapus" style="margin-bottom: 5px;" onclick="return confirm('Yakin mau hapus data ?')" type="submit">
        <i class="fa fa-trash-o" style="font-size: 15px;"></i> Delete
        </button>
        </form>
        @endif
        @if(checkPermission(['admin','superadmin']))
        <a href="{{ URL('pengalaman/generate') }}/{{ $data->kd_pengalaman }}" >
        <button class="btn btn-sm btn-raised btn-success" style="margin-bottom: 5px;" title="Generate Project" onclick="return confirm('Yakin mau generate data ?')"
        type="submit">
        <i class="fa fa-dot-circle-o "></i> Generate</button></a>
      </div>
    </div>
  </div>
        @endif  
@endforeach
            </section>
          </div>
        <!-- page end-->
      </section>
@include('partials/footer')
  </body>
</html>
