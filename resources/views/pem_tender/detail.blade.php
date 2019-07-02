<!DOCTYPE html>
<title>REVIEW PENJUALAN (TENDER)</title>
@include('partials/header2')
  <!-- Left side column. contains the logo and sidebar --> 
  <!-- Content Wrapper. Contains page content -->
<body>
      <section class="wrapper" style="background-color: white;">
                       @if(checkPermission(['admin','superadmin']))
        <a href="/pem_tender" style="color: blue;" title="Klik Untuk Melihat Detail">
      <button class="btn-sm btn-success"><i class="fa fa-arrow-left"></i> Back To List</button></a>
                      @endif
                      <br><br>
      @include('alert.flash-message')
      @php ($date_now = date('Y-m-d'))
      @php(
          $no = 1 {{-- buat nomor urut --}}
          )
        {{-- loop all pem_tender --}}
        @foreach ($post as $data)
                        @if (empty($data->tgl_pengambilan_doc))
        @php  ( $tgl_pengambilan_doc = '')
        @else
        @php  ( $tgl_pengambilan_doc = date('d M Y', strtotime($data->tgl_pengambilan_doc)))
        @endif
        @if (empty($data->tgl_kak))
        @php  ( $tgl_kak = '')
        @else
        @php  ( $tgl_kak = date('d M Y', strtotime($data->tgl_kak)))
        @endif
        @if (empty($data->tgl_canvasing))
        @php  ( $tgl_canvasing = '')
        @else
        @php  ( $tgl_canvasing = date('d M Y', strtotime($data->tgl_canvasing)))
        @endif
                @if (empty($data->tgl_pendaftaran))
        @php  ( $tgl_pendaftaran = '')
        @else
        @php  ( $tgl_pendaftaran = date('d M Y', strtotime($data->tgl_pendaftaran)))
        @endif
                @if (empty($data->tgl_pemasukan_doc))
        @php  ( $tgl_pemasukan_doc = '')
        @else
        @php  ( $tgl_pemasukan_doc = date('d M Y', strtotime($data->tgl_pemasukan_doc)))
        @endif
              @if (empty($data->tgl_ambil))
        @php  ( $tgl_ambil = '')
        @else
        @php  ( $tgl_ambil = date('d M Y', strtotime($data->tgl_ambil)))
        @endif
              @if (empty($data->tgl_submit))
        @php  ( $tgl_submit = '')
        @else
        @php  ( $tgl_submit = date('d M Y', strtotime($data->tgl_submit)))
        @endif
              @if (empty($data->tgl_pembuktian))
        @php  ( $tgl_pembuktian = '')
        @else
        @php  ( $tgl_pembuktian = date('d M Y', strtotime($data->tgl_pembuktian)))
        @endif
                      @if (empty($data->tgl_aanwijzing))
        @php  ( $tgl_aanwijzing = '')
        @else
        @php  ( $tgl_aanwijzing = date('d M Y', strtotime($data->tgl_aanwijzing)))
        @endif
                      @if (empty($data->tgl_sampul1))
        @php  ( $tgl_sampul1 = '')
        @else
        @php  ( $tgl_sampul1 = date('d M Y', strtotime($data->tgl_sampul1)))
        @endif
                 @if (empty($data->tgl_klarifikasi_teknis))
        @php  ( $tgl_klarifikasi_teknis = '')
        @else
        @php  ( $tgl_klarifikasi_teknis = date('d M Y', strtotime($data->tgl_klarifikasi_teknis)))
        @endif
                 @if (empty($data->tgl_contest))
        @php  ( $tgl_contest = '')
        @else
        @php  ( $tgl_contest = date('d M Y', strtotime($data->tgl_contest)))
        @endif
              @if (empty($data->tgl_sampul2))
        @php  ( $tgl_sampul2 = '')
        @else
        @php  ( $tgl_sampul2 = date('d M Y', strtotime($data->tgl_sampul2)))
        @endif
               @if (empty($data->tgl_evaluasi_teknis))
        @php  ( $tgl_evaluasi_teknis = '')
        @else
        @php  ( $tgl_evaluasi_teknis = date('d M Y', strtotime($data->tgl_evaluasi_teknis)))
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
        @if (empty($data->harga_penawaran))
        @php  ( $harga_penawaran = '')
        @else
        @php ($harga_penawaran = (number_format($data->harga_penawaran,0,",",".").""))
        @endif
<header class="bg-primary" style="color: white; padding-left: 5px; padding: 5px;">
<strong>REVIEW PENJUALAN (TENDER) {{ $data->kd_pn_tender }}</strong></header>
        <div class="panel-body" style="margin-left:10px; margin-right: 10px; ">
          <div class="col-xs-6" style="font-size: 12px;">
            <address>           
              <div ><strong><u>GRUP JASA</u></strong></div>
             <div style="color: blue; margin-left: 10px; font-size: 14px;">
              <p style="font-family: Helvetica;">{{$data->kelompok_jasa}}</p></div>
             <div><strong><u>SUB JASA</u></strong></div>
             <div style="color: blue; margin-left: 10px; font-size: 14px;">
              <p style="font-family: Helvetica;">{{$data->sub_jasa}}</p></div>
             <div> <strong><u>NAMA PEKERJAAN</u></strong></div>
             <div style="color: blue; margin-left: 10px; font-size: 14px;">
              <p style="font-family: Helvetica;">{{$data->nama_pekerjaan}}</p></div>
             <div> <strong><u>BIDANG / SUB BIDANG PEKERJAAN</u> </strong></div>
             <div style="color: blue; margin-left: 10px; font-size: 14px;">
              <p style="font-family: Helvetica;">{{$data->sub_pekerjaan}}</p></div>
            </address>
            </div>
            <div  style="font-size: 12px;" class="col-xs-6 text-right">
            <address>
              <div style="color: blue; font-size: 14px;"><text style="background-color: blue; color: white; padding: 5px;">{{$data->status_tender}}</div><br>
              <div><strong><u>CP SPRINT</u></strong></div>
              <div style="color: blue; margin-right: 10px; font-size: 14px;">
                <p style="font-family: Helvetica;">{{$data->cp_internal}}</p></div>
              <div><strong><u>CP EMAIL</u></strong></div>
              <div style="color: blue; margin-right: 10px; font-size: 14px;">
                <p style="font-family: Helvetica;">{{$data->cp_internal_email}}</p></div>
              </address>
          </div>
        </div>
        <div class="row" style="margin-left:10px; margin-right: 10px;">
          <div class="col-lg-6" style="font-size: 12px;">
            <div class="panel panel-info">
           <div class="panel-heading" style="margin-top: 5px;">KLIEN ({{ $data->kd_klien }})</div>
              <div class="panel-content  " style="height: 250px; font-size:14px; background-color: #eee ">
              <i class="fa fa-building-o"></i><text style="color:  #eee">__</text><strong>{{$data->nama_klien}}</strong><br>
              <i class="fa fa-phone"></i><text style="color:  #eee">__</text><strong>{{$data->telp_fax}}</strong><br>
              <i class="fa fa-envelope"></i><text style="color:  #eee">__</text><strong>{{$data->email}}</strong><br>
              <i class="fa fa-globe"></i><text style="color:  #eee">__</text><strong>{{$data->website}}</strong><br>
              <br>
              <strong><u>Alamat</u></strong><br>{{$data->alamat}}
            </div>
          </div>
        </div>
        <div class="col-lg-3" style="font-size: 12px;">
            <div class="panel panel-info">
           <div class="panel-heading" style="margin-top: 5px;">CONTACT PERSON</div>
               <div class="panel-content  " style="height: 250px; background-color: #eee ">
                   <div><strong><u>NAMA</u></strong></div><div><i>{{$data->cp_ops_nama1}}</i></div><br>
                  <div><strong><u>TELP</u></strong></div><div><i>{{$data->cp_ops_telp1}}</i></div><br>
                  <div><strong><u>EMAIL</u></strong></div><div><i>{{$data->cp_ops_email1}}</i></div><br>
            </div>
          </div>
          </div>
          <div class="col-lg-3" style="font-size: 12px; " >
          <div class="panel panel-info">
          <div class="panel-heading" style="margin-top: 5px;">SUMBER INFORMASI</div>
          <div class="panel-content " style="height: 250px; background-color: #eee ">
                  <div><strong><u>NAMA</u></strong></div><div><i>{{$data->informasi_nama}}</i></div><br>
                  <div><strong><u>ENTITAS</u></strong></div><div><i>{{$data->informasi_entitas}}</i></div><br>
                  <div><strong><u>TELP</u></strong></div><div><i>{{$data->informasi_telp}}</i></div><br>
                  <div><strong><u>EMAIL</u></strong></div><div><i>{{$data->informasi_email}}</i></div><br>
          </div>
          </div>
          </div>
        </div>
        <header class="bg-primary" style="color: white; padding-left: 5px; padding: 5px;">
<strong>ALUR PENJUALAN (TENDER) {{ $data->kd_pn_tender }}</strong></header>
<br>
        <div>
          <i class="fa fa-arrow-right"></i>
        </div>
          <div class="col-lg-2" style="font-size: 12px;">
          <div class="panel panel-info">
          <div class="panel-heading" style="margin-top: 5px; background-color: #  ; color: black;">CANVASSING</div>
               <div class="panel-content bg-success" style="height: 200px; background-color: # ">
                   <div><strong><u>Tanggal</u></strong></div><div>{{$tgl_canvasing}}</div><br>
                   <div><a href="#hasil1" data-toggle="modal"><small style="color : blue;">Lihat Hasil</small></a></div>
        </div>
        </div>
        </div>
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="hasil1" class="modal fade">
                  <div class="modal-dialog" style="width: 70%;">
                    <div class="modal-content">
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
            <div class="panel panel-info bg-success">
           <div class="panel-heading" style="margin-top: 5px; background-color: #  ; color: black;">PROSES KAK & RAB</div>
               <div class="panel-content bg-success" style="height: 200px; background-color: # ">
                   <div><strong><u>Tanggal</u></strong></div><div>{{$tgl_kak}}</div><br>
                   <div><strong><u>Nilai</u></strong></div><div>{{$nilai_kak}}</div>
            </div>
          </div>
          </div>
          <div>
          <i class="fa fa-arrow-right"></i>
        </div>
          <div class="col-lg-2" style="font-size: 12px;">
            <div class="panel panel-info">
     <div class="panel-heading" style="margin-top: 5px; background-color: #  ; color: black;">PROSES PENDAFTARAN</div>
               <div class="panel-content bg-success" style="height: 200px; background-color: # " >
                   <div><strong><u>Tanggal</u></strong></div><div>{{$tgl_pendaftaran}}</div><br>
                   <div><a href="#hasil2" data-toggle="modal"><small style="color : blue;">Lihat Hasil</small></a></div>
            </div>
          </div>
          </div>
        <div>
          <i class="fa fa-arrow-right"></i>
        </div>
      <div class="col-lg-2" style="font-size: 12px;">
            <div class="panel panel-info" >
          <div class="panel-heading" style="margin-top: 5px; background-color: #  ; color: black;">HARGA PENAWARAN</div>
               <div class="panel-content bg-success" style="height: 200px; background-color: # ">                                  
            <div><strong><u>Nilai</u></strong></div><div>{{$harga_penawaran}}</div><br>
            </div>
          </div>
      </div>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="hasil2" class="modal fade">
                  <div class="modal-dialog" style="width: 70%;">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 class="modal-title"> HASIL PENDAFTARAN</h4>
                      </div>
                      <pre>
{{$data->hasil_pendaftaran}}
                      </pre>
                    </div>
                  </div>
                </div>
          <div>
          <i class="fa fa-arrow-right"></i>
        </div>
          <div class="col-lg-4" style="font-size: 12px;">
            <div class="panel panel-info">
         <div class="panel-heading" style="margin-top: 5px; background-color: #  ; color: black;">
         PROSES PRAKUALIFIKASI (PQ)</div>
               <div class="panel-content bg-success" style="height: 200px; background-color: # ">
                  <div><strong><u>Tanggal Ambil</u> </strong></div><div>{{$tgl_ambil}}</div><br>
                <div><strong><u>Tanggal Submit</u> </strong></div><div>{{$tgl_submit}}</div><br>
            <div><strong><u>Tanggal Pembuktian</u> </strong></div><div>{{$tgl_pembuktian}}</div><br>
             <div><a href="#hasil3" data-toggle="modal"><small style="color : blue;">Lihat Hasil</small></a></div>
            </div>
          </div>
          </div>
 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="hasil3" class="modal fade">
                  <div class="modal-dialog" style="width: 70%;">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 class="modal-title">HASIL PQ</h4>
                      </div>
                      <pre>
{{$data->hasil_pq}}
                      </pre>
                    </div>
                  </div>
                </div>
        <div>
          <i class="fa fa-arrow-right"></i>
        </div>
          <div class="col-lg-2" style="font-size: 12px; ">
            <div class="panel panel-info">
        <div class="panel-heading" style="margin-top: 5px; background-color: #  ; color: black;">PROSES AANWIJZING</div>
               <div class="panel-content bg-success" style="height: 150px; background-color: # ">
                <div><strong><u>Tanggal</u> </strong></div><div>{{$tgl_aanwijzing}}</div><br>
                   <div><strong><u>Personil</u></strong></div><div>{{$data->personil_aanwijzing}}</div>
            </div>
          </div>
          </div>
        <div>
          <i class="fa fa-arrow-right"></i>
        </div>
         <div class="col-lg-2" style="font-size: 12px;">
            <div class="panel panel-info">
    <div class="panel-heading" style="margin-top: 5px; background-color: #  ; color: black;">PEMBUKAAN SAMPUL I</div>
               <div class="panel-content bg-success" style="height: 150px; background-color: # ">
                         <div><strong><u>Tanggal</u></strong></div><div>{{$tgl_sampul1}}</div><br>
            <div><a href="#hasil4" data-toggle="modal"><small style="color : blue;">Lihat Hasil</small></a></div>
            </div>
          </div>
          </div>
        <div>
          <i class="fa fa-arrow-right"></i>
        </div>
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="hasil4" class="modal fade">
                  <div class="modal-dialog" style="width: 70%;">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 class="modal-title"> HASIL PEMBUKAAN SAMPUL I</h4>
                      </div>
                      <pre>
{{$data->hasil_sampul1}}
                      </pre>
                    </div>
                  </div>
                </div>
          <div class="col-lg-2" style="font-size: 12px;">
            <div class="panel panel-info">
       <div class="panel-heading" style="margin-top: 5px; background-color: #  ; color: black;">BEAUTY CONTEST</div>
               <div class="panel-content bg-success" style="height: 150px; background-color: # ">
               <div><strong><u>Tanggal</u></strong></div><div>{{$tgl_contest}}</div><br>
                   <div><strong><u>Personil</u></strong></div><div>{{$data->personil_contest}}</div>
            </div>
          </div>
          </div>
        <div>
          <i class="fa fa-arrow-right"></i>
        </div>
       <div class="col-lg-2" style="font-size: 12px;">
            <div class="panel panel-info">
       <div class="panel-heading" style="margin-top: 5px; background-color: #  ; color: black;">KLARIFIKASI TEKNIS</div>
               <div class="panel-content bg-success" style="height: 150px; background-color: # ">
                         <div><strong><u>Tanggal</u></strong></div><div>{{$tgl_klarifikasi_teknis}}</div><br>
                    <div><a href="#hasil5" data-toggle="modal"><small style="color : blue;">Lihat Hasil</small></a></div>
            </div>
          </div>
          </div>
       <div>
          <i class="fa fa-arrow-right"></i>
        </div>
      <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="hasil5" class="modal fade">
                  <div class="modal-dialog" style="width: 70%;">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 class="modal-title"> HASIL KLARIFIKASI TEKNIS</h4>
                      </div>
                      <pre>
{{$data->hasil_klarifikasi_teknis}}
                      </pre>
                    </div>
                  </div>
                </div>
                         <div class="col-lg-2" style="font-size: 12px;">
            <div class="panel panel-info">
         <div class="panel-heading" style="margin-top: 5px; background-color: #  ; color: black;">EVALUASI TEKNIS</div>
               <div class="panel-content bg-success" style="height: 150px; background-color: # ">
                         <div><strong><u>Tanggal</u></strong></div><div>{{$tgl_evaluasi_teknis}}</div><br>
               <div><a href="#hasil6" data-toggle="modal"><small style="color : blue;">Lihat Hasil</small></a></div>
            </div>
          </div>
          </div>
       <div>
          <i class="fa fa-arrow-right"></i>
        </div>
       <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="hasil6" class="modal fade">
                  <div class="modal-dialog" style="width: 70%;">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 class="modal-title"> HASIL EVALUASI TEKNIS</h4>
                      </div>
                      <pre>
{{$data->hasil_evaluasi_teknis}}
                      </pre>
                    </div>
                  </div>
                </div>
      <div class="col-lg-2" style="font-size: 12px;">
            <div class="panel panel-info">
   <div class="panel-heading" style="margin-top: 5px; background-color: #  ; color: black;">INFORMASI TENDER</div>
               <div class="panel-content bg-success" style="height: 150px; background-color: # ">
            <div><strong><u>Pengambilan</u></strong></div><div>{{$tgl_pengambilan_doc}}</div><br>
            <div><strong><u>Pemasukan</u> </strong></div><div>{{$tgl_pemasukan_doc}}</div>
            </div>
          </div>
      </div>
              <div>
          <i class="fa fa-arrow-right"></i>
        </div>
      <div class="col-lg-2" style="font-size: 12px;">
            <div class="panel panel-info ">
   <div class="panel-heading" style="margin-top: 5px; background-color: #  ; color: black;">PEMBUKAAN SAMPUL II</div>
               <div class="panel-content bg-success" style="height: 150px; background-color: # ">
            <div><strong><u>Tanggal</u></strong></div><div>{{$tgl_sampul2}}</div><br>
               <div><a href="#hasil7" data-toggle="modal"><small style="color : blue;">Lihat Hasil</small></a></div>
            </div>
          </div>
      </div>
        <div>
          <i class="fa fa-arrow-right"></i>
        </div>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="hasil7" class="modal fade">
                  <div class="modal-dialog" style="width: 70%;">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 class="modal-title"> HASIL PEMBUKAAN SAMPUL II</h4>
                      </div>
                      <pre>
{{$data->hasil_sampul2}}
                      </pre>
                    </div>
                  </div>
                </div>
             <div class="col-lg-2" style="font-size: 12px;">
            <div class="panel panel-info ">
<div class="panel-heading" style="margin-top: 5px; background-color: #  ; color: black;">NEGOSIASI / KLARIFIKASI</div>
        <div class="panel-content bg-success" style="height: 150px; background-color: # ">
            <div><strong><u>Tanggal</u></strong></div><div>{{$tgl_negosiasi}}</div><br>
            <div><a href="#hasil8" data-toggle="modal"><small style="color : blue;">Lihat Hasil</small></a></div>
            </div>
          </div>
          </div>
        <div>
          <i class="fa fa-arrow-right"></i>
        </div>
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="hasil8" class="modal fade">
                  <div class="modal-dialog" style="width: 70%;">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 class="modal-title"> HASIL NEGOSIASI & KLARIFIKASI</h4>
                      </div>
                      <pre>
{{$data->hasil_negosiasi}}
                      </pre>
                    </div>
                  </div>
                </div>
       <div class="col-lg-2" style="font-size: 12px;">
       <div class="panel panel-info">
       <div class="panel-heading" style="margin-top: 5px; background-color: #  ; color: black;">HISTORY FOLLOW UP</div>
          <div class="panel-content bg-success" style="height: 150px; background-color: # ">
            <div><strong><u>Tanggal</u></strong></div><div>{{$tgl_followup}}</div><br>
                    <div><a href="#status" data-toggle="modal"><small style="color : blue;">Lihat Status</small></a></div>
            </div>
          </div>
          </div>
                 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="status" class="modal fade">
                  <div class="modal-dialog bg-success" style="width: 70%;">
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
       <div class="panel-heading" style="margin-top: 5px; background-color: #  ; color: black;">PELUANG DAPAT (%)</div>
               <div class="panel-content bg-success" style="height: 150px; background-color: # ">
      <h2 align="center"><strong>{{ $data->peluang }} %</strong></h2>
            </div>
          </div>
          </div>
        <div>
          <i class="fa fa-arrow-right"></i>
        </div>
        <div class="col-lg-2" style="font-size: 12px;">
          <div class="panel panel-info">
   <div class="panel-heading" style="margin-top: 5px; background-color: #  ; color: black;">KOMPETITOR</div>
          <div class="panel-content bg-success" style="height: 150px; background-color: # ">
          <div>{{$data->kompetitor}}</div>
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
        <a href="{{ URL('pem_tender/show') }}/{{ $data->kd_pn_tender }}" >
        <button style="margin-right: 5px;" class="btn btn-sm btn-raised btn-info" onclick="return" title="Update" confirm('Yakin mau ubah data ?')"
        type="submit">
        <i class="fa fa-edit"></i></button></a>
      </td>
      <td >
        <div class="tools">
        @if(checkPermission(['admin','superadmin']))
        <a href="{{ URL('pem_tender/close_menang') }}/{{ $data->kd_pn_tender }}" >
        <button style="margin-right: 5px;" class="btn btn-sm btn-raised btn-success" onclick="return" title="Proses" onclick="return confirm('Yakin ?')" 
        type="submit">
      <i class="fa fa-check" aria-hidden="true"></i></button></a>
      @endif
      </td>
      <td>
        @if(checkPermission(['superadmin']))
        <form action="{{action('Pem_tenderController@destroy', $data->kd_pn_tender)}}" method="post">
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
