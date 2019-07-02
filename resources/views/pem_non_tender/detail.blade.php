<!DOCTYPE html>
<title>REVIEW PENJUALAN (NON TENDER)</title>
@include('partials/header2')
  <!-- Left side column. contains the logo and sidebar --> 
  <!-- Content Wrapper. Contains page content -->
<body>
      <section class="wrapper" style="background-color: white;">
      @if(checkPermission(['admin','superadmin']))
      <a href="/pem_non_tender" style="color: blue;" title="Klik Untuk Melihat Detail">
      <button class="btn-sm btn-success"><i class="fa fa-arrow-left"></i> Back To List</button></a>
      @endif
      <br><br>
      @include('alert.flash-message')
        @php ($date_now = date('Y-m-d'))
        @php(
          $no = 1 {{-- buat nomor urut --}}
          )
        {{-- loop all pem_non_tender --}}
        @foreach ($pem_non_tender as $data)

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

<header class="bg-primary" style="color: white; padding-left: 5px; padding: 5px;">
<strong><i>REVIEW PENJUALAN (NON TENDER) {{ $data->kd_pn_non_tender }}</i></strong></header>
        <div class="panel-body" style="margin-left:10px; margin-right: 10px; ">
          <div class="col-xs-6" style="font-size: 12px;">
            <address>           
              <div><strong><u>GRUP JASA</u></strong></div>
             <div style="color: blue; margin-left: 10px; font-size: 14px;"><p style="font-family: Helvetica;">{{$data->kelompok_jasa}}</p></div>
             <div><strong><u>SUB JASA</u> </strong></div>
             <div style="color: blue; margin-left: 10px; font-size: 14px;">
              <p style="font-family: Helvetica;">{{$data->sub_jasa}}</p></div>
             <div> <strong><u>NAMA PEKERJAAN</u> </strong></div>
             <div style="color: blue; margin-left: 10px; font-size: 14px;">
              <p style="font-family: Helvetica;">{{$data->nama_pekerjaan}}</p></div>
             <div> <strong><u>BIDANG / SUB BIDANG PEKERJAAN </u></strong></div>
             <div style="color: blue; margin-left: 10px; font-size: 14px;">
              <p style="font-family: Helvetica;">{{$data->sub_pekerjaan}}</p></div>
            </address>
          </div>
            <div  style="font-size: 12px;" class="col-xs-6 text-right">
            <address>
          <div style="color: blue; font-size: 14px;"><text style="background-color: blue; color: white; padding: 5px;">{{$data->status}}</div><br>
              <div><strong><u>CP SPRINT</u></strong></div>
              <div style="color: blue;margin-right: 10px; font-size: 14px;">
                <p style="font-family: Helvetica;">{{$data->cp_internal}}</p></div>
              <div><strong><u>CP EMAIL</u></strong></div>
              <div style="color: blue;margin-right: 10px; font-size: 14px;">
                <p style="font-family: Helvetica;">{{$data->cp_internal_email}}</p></div>
              <div><strong><u>PERMINTAAN</u></strong></div>
              <div style="color: blue;margin-right: 10px; font-size: 14px;">
                <p style="font-family: Helvetica;">{{$tgl_permintaan}}</p></div>
              </address>
          </div>
        </div>
        <div class="row" style="margin-left:10px; margin-right: 10px;">
          <div class="col-lg-6" style="font-size: 12px;">
            <div class="panel panel-info">
           <div class="panel-heading" style="margin-top: 5px;">KLIEN ({{ $data->kd_klien }})</div>
              <div class="panel-content" style="height: 250px; font-size:14px; background-color: #F5F5F5">
              <i class="fa fa-building-o"></i><text style="color: white">__</text><strong>{{$data->nama_klien}}</strong><br>
              <i class="fa fa-phone"></i><text style="color: white">__</text><strong>{{$data->telp_fax}}</strong><br>
              <i class="fa fa-envelope"></i><text style="color: white">__</text><strong>{{$data->email}}</strong><br>
              <i class="fa fa-globe"></i><text style="color: white">__</text><strong>{{$data->website}}</strong><br>
              <br>
              <strong><u>Alamat</u></strong><br><i>{{$data->alamat}}</i>
            </div>
          </div>
        </div>
        <div class="col-lg-3 fadein" style="font-size: 12px;">
            <div class="panel panel-info">
           <div class="panel-heading" style="margin-top: 5px;">CONTACT PERSON</div>
               <div class="panel-content " style="height: 250px; background-color: #F5F5F5">
                   <div><strong><u>NAMA</u></strong></div><div><i>{{$data->cp_ops_nama1}}</i></div><br>
                  <div><strong><u>TELP</u></strong></div><div><i>{{$data->cp_ops_telp1}}</i></div><br>
                  <div><strong><u>EMAIL</u></strong></div><div><i>{{$data->cp_ops_email1}}</i></div><br>
            </div>
          </div>
          </div>
          <div class="col-lg-3" style="font-size: 12px; " >
            <div class="panel panel-info">
            <div class="panel-heading" style="margin-top: 5px;">SUMBER INFORMASI</div>
               <div class="panel-content" style="height: 250px; background-color: #F5F5F5">
                   <div><strong><u>NAMA</u></strong></div><div><i>{{$data->informasi_nama}}</i></div><br>
                  <div><strong><u>TELP</u></strong></div><div><i>{{$data->informasi_telp}}</i></div><br>
                  <div><strong><u>EMAIL</u></strong></div><div><i>{{$data->informasi_email}}</i></div><br>
            </div>
          </div>
          </div>
        </div>
        <header class="bg-primary" style="color: white; padding-left: 5px; padding: 5px;">
<strong><i>ALUR PENJUALAN (NON TENDER) {{ $data->kd_pn_non_tender }}</i></strong></header>
<br>
           <div>
          <i class="fa fa-arrow-right"></i>
        </div>
          <div class="col-lg-2" style="font-size: 12px;">
            <div class="panel panel-info">
           <div class="panel-heading" style="margin-top: 5px; ">CANVASSING</div>
               <div class="panel-content bg-success " style="height: 150px;">
                   <div><strong><u>Tanggal</u></strong></div><div>{{$tgl_canvasing}}</div><br>
                   <div><a href="#hasil1" data-toggle="modal"><text style="color: blue;">Lihat Hasil</text></a></div>
            </div>
          </div>
        </div>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="hasil1" class="modal fade" >
                  <div class="modal-dialog" style="width: 70%;">
                    <div class="modal-content  ">
                      <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 class="modal-title"> HASIL CANVASSING</h4>
                      </div>                   
                      <pre>
{{$data->hasil_canvasing}}
                      </pre>
                    </div>
                  </div>
                </div>
           <div>
          <i class="fa fa-arrow-right"></i>
        </div>
          <div class="col-lg-2" style="font-size: 12px;">
            <div class="panel panel-info">
           <div class="panel-heading" style="margin-top: 5px;">PROSES KAK & RAB</div>
               <div class="panel-content bg-success " style="height: 150px;">
                   <div><strong><u>Tanggal</u></strong></div><div>{{$tgl_kak}}</div><br>                                   
                   <div><strong><u>Nilai</u></strong></div><div> {{$nilai_kak}}</div>
            </div>
          </div>
          </div>
                  <div>
          <i class="fa fa-arrow-right"></i>
        </div>
          <div class="col-lg-2" style="font-size: 12px;">
            <div class="panel panel-info">
           <div class="panel-heading" style="margin-top: 5px;">PROPOSAL</div>
               <div class="panel-content bg-success " style="height: 150px;" >
                   <div><strong><u>Tanggal</u></strong></div><div>{{$tgl_proposal}}</div><br>                                    
                   <div><strong><u>Harga Penawaran</u></strong></div><div>{{$nilai_penawaran}}</div>
            </div>
          </div>
          </div>
                  <div>
          <i class="fa fa-arrow-right"></i>
        </div>
      <div class="col-lg-2" style="font-size: 12px;">
            <div class="panel panel-info">
           <div class="panel-heading" style="margin-top: 5px;">PRESENTASI</div>
               <div class="panel-content bg-success " style="height: 150px;">
                  <div><strong><u>Tanggal</u></strong></div><div>{{$tgl_presentasi}}</div><br>
            </div>
          </div>
      </div>
              <div>
          <i class="fa fa-arrow-right"></i>
        </div>
          <div class="col-lg-2" style="font-size: 12px;">
            <div class="panel panel-info">
           <div class="panel-heading" style="margin-top: 5px;">PROSES NEGOSIASI</div>
               <div class="panel-content bg-success " style="height: 150px;" >
                   <div><strong><u>Tanggal</u></strong></div><div>{{$tgl_negosiasi}}</div><br>                                     
                   <div><strong><u>Hasil Nilai</u></strong></div><div>{{$nilai_negosiasi}}</div>
            </div>
          </div>
          </div>
                  <div>
          <i class="fa fa-arrow-right"></i>
        </div>
         <div class="col-lg-2" style="font-size: 12px;">
            <div class="panel panel-info">
           <div class="panel-heading" style="margin-top: 5px;">FOLLOW UP</div>
               <div class="panel-content bg-success " style="height: 150px;">
                         <div><strong><u>Tanggal</u></strong></div><div>{{$tgl_followup}}</div><br>
                    <div><a href="#status" data-toggle="modal"><text style="color: blue;">Lihat Status</text></a></div>
            </div>
          </div>
          </div>
                 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="status" class="modal fade">
                  <div class="modal-dialog" style="width: 70%;">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 class="modal-title"> STATUS FOLLOWUP</h4>
                      </div>
                      <pre>
{{$data->status_followup}}
                    </pre>
                    </div>
                  </div>
                </div>
                 <div>
          <i class="fa fa-arrow-right"></i>
        </div>  
        <div class="col-lg-2" style="font-size: 12px;">
            <div class="panel panel-info">
           <div class="panel-heading" style="margin-top: 5px;">PELUANG DAPAT (%)</div>
               <div class="panel-content bg-success " style="height: 150px;">
      <h1 align="center"><strong>{{ $data->peluang }} %</strong></h2>
            </div>
          </div>
          </div>
                           <div>
          <i class="fa fa-arrow-right"></i>
        </div>  
                    <div class="col-lg-2" style="font-size: 12px;">
            <div class="panel panel-info">
           <div class="panel-heading" style="margin-top: 5px;">ACTION</div>
               <div class="panel-content  " >
                <table>
             <td >
        <div class="tools">
        <a href="{{ URL('pem_non_tender/show') }}/{{ $data->kd_pn_non_tender }}" >
        <button style="margin-right: 5px;" class="btn btn-sm btn-raised btn-info" onclick="return" title="Ubah" confirm('Yakin mau ubah data ?')"
        type="submit">
        <i class="fa fa-edit"></i></button></a>
      </td>
      <td >
        <div class="tools">
        @if(checkPermission(['admin','superadmin']))
        <a href="{{ URL('pem_non_tender/close_menang') }}/{{ $data->kd_pn_non_tender }}" >
        <button style="margin-right: 5px;" class="btn btn-sm btn-raised btn-success" onclick="return" title="Proses" onclick="return confirm('Yakin ?')" 
        type="submit">
      <i class="fa fa-check" aria-hidden="true"></i></button></a>
      @endif
      </td>
      <td>
        @if(checkPermission(['superadmin']))
        <form action="{{action('Pem_non_tenderController@destroy', $data->kd_pn_non_tender)}}" method="post">
         {{ csrf_field() }}
        <input name="_method" type="hidden" value="PATCH">
        <button style="margin-right: 5px;" class="btn btn-sm btn-raised btn-danger" title="Hapus" onclick="return confirm('Yakin mau hapus data ?')" type="submit">
        <i class="fa fa-trash-o" style="font-size: 15px;"></i>
        </button>
        </form>
        @endif
        </td></table>
        </div>
        </div>
        </div>            
@endforeach
            </section>
        <!-- page end-->
      </section>
    <!--main content end-->
@include('partials/footer')
  </section>

</body>
</html>
