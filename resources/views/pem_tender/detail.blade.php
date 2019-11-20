<!DOCTYPE html>
<title>REVIEW PENJUALAN (TENDER)</title>
<body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
      <section class="wrapper" style="background-color: white;">
                @include('partials/header2')
          @include('partials.sidebar')
       <div class="content-wrapper">
    <section class="content" style="background-color: white;">
                       @if(checkPermission(['admin','superadmin']))
  <div class="box-body" style="text-align: left;">
      <a href="/pem_tender" class="btn btn-app">
                <i class="fa fa-arrow-circle-left" title="BACK" style="font-size: 32px;"></i> </a>
           </div>
                      @endif
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
<header class="bg-primary detail" >
<strong>REVIEW PENJUALAN (TENDER) {{ $data->kd_pn_tender }}</strong></header>
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
              <span class="info-box-text"><strong>STATUS :</strong> </span>
              <span class="info-box-number" style="font-size: 12px;">{{$data->status}}</span>
                            <span class="info-box-text"><strong>CP SPRINT :</strong></span>
                                          <span class="info-box-number" style="font-size: 12px;">{{$data->cp_internal}}<br>{{$data->cp_internal_email}}</span>
                                          <hr>
                            <span class="info-box-text"><strong>CONTACT PERSON :</strong></span>
                                          <span class="info-box-number" style="font-size: 12px;"><br>{{$data->cp_ops_nama1}}<br>{{$data->cp_ops_telp1}}<br>{{$data->cp_ops_email1}}</span>
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
        <div class="row" style="margin-left:10px; margin-right: 10px;">
        </div>
        <header class="bg-primary detail">
<strong>ALUR PENJUALAN (TENDER) {{ $data->kd_pn_tender }}</strong></header>
<br>
        <div>
          <i class="fa fa-arrow-right"></i>
        </div>
          <div class="col-lg-2" style="font-size: 12px;">
          <div class="panel panel-info">
          <div class=" detail-header bg-primary " style="margin-top: 5px; ">CANVASSING</div>
               <div class="detail-body panel-content bg-success" style="height: 200px; background-color: # ">
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
           <div class=" detail-header bg-primary " style="margin-top: 5px; ">PROSES KAK & RAB</div>
               <div class="detail-body panel-content bg-success" style="height: 200px; background-color: # ">
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
     <div class=" detail-header bg-primary " style="margin-top: 5px; ">PROSES PENDAFTARAN</div>
               <div class="detail-body panel-content bg-success" style="height: 200px; background-color: # " >
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
          <div class=" detail-header bg-primary " style="margin-top: 5px; ">HARGA PENAWARAN</div>
               <div class="detail-body panel-content bg-success" style="height: 200px; background-color: # ">                                  
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
         <div class=" detail-header bg-primary " style="margin-top: 5px; ">
         PROSES PRAKUALIFIKASI (PQ)</div>
               <div class="detail-body panel-content bg-success" style="height: 200px; background-color: # ">
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
        <div class=" detail-header bg-primary " style="margin-top: 5px; ">PROSES AANWIJZING</div>
               <div class="detail-body panel-content bg-success" style="height: 150px; background-color: # ">
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
    <div class=" detail-header bg-primary " style="margin-top: 5px; ">PEMBUKAAN SAMPUL I</div>
               <div class="detail-body panel-content bg-success" style="height: 150px; background-color: # ">
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
       <div class=" detail-header bg-primary " style="margin-top: 5px; ">BEAUTY CONTEST</div>
               <div class="detail-body panel-content bg-success" style="height: 150px; background-color: # ">
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
       <div class=" detail-header bg-primary " style="margin-top: 5px; ">KLARIFIKASI TEKNIS</div>
               <div class="detail-body panel-content bg-success" style="height: 150px; background-color: # ">
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
         <div class=" detail-header bg-primary " style="margin-top: 5px; ">EVALUASI TEKNIS</div>
               <div class="detail-body panel-content bg-success" style="height: 150px; background-color: # ">
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
   <div class=" detail-header bg-primary " style="margin-top: 5px; ">INFORMASI TENDER</div>
               <div class="detail-body panel-content bg-success" style="height: 150px; background-color: # ">
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
   <div class=" detail-header bg-primary " style="margin-top: 5px; ">PEMBUKAAN SAMPUL II</div>
               <div class="detail-body panel-content bg-success" style="height: 150px; background-color: # ">
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
<div class=" detail-header bg-primary " style="margin-top: 5px; ">NEGOSIASI / KLARIFIKASI</div>
        <div class="detail-body panel-content bg-success" style="height: 150px; background-color: # ">
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
       <div class=" detail-header bg-primary " style="margin-top: 5px; ">HISTORY FOLLOW UP</div>
          <div class="detail-body panel-content bg-success" style="height: 150px; background-color: # ">
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
       <div class=" detail-header bg-primary " style="margin-top: 5px; ">PELUANG DAPAT (%)</div>
               <div class="detail-body panel-content bg-success" style="height: 150px; background-color: # ">
      <h2 align="center"><strong>{{ $data->peluang }} %</strong></h2>
            </div>
          </div>
          </div>
        <div>
          <i class="fa fa-arrow-right"></i>
        </div>
        <div class="col-lg-2" style="font-size: 12px;">
          <div class="panel panel-info">
   <div class=" detail-header bg-primary " style="margin-top: 5px; ">KOMPETITOR</div>
          <div class="detail-body panel-content bg-success" style="height: 150px; background-color: # ">
          <div>{{$data->kompetitor}}</div>
          </div>
          </div>
          </div>
        <div>
          <i class="fa fa-arrow-right"></i>
        </div>
          <div class="col-lg-2" style="font-size: 12px;">
            <div class="panel panel-info">
           <div class=" detail-header bg-primary " style="margin-top: 5px;">ACTION</div>
               <div class="detail-body panel-content  " >
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
@endforeach
             </div>
            </section>
          </div>
        <!-- page end-->
      </section>
    <!--main content end-->
@include('partials/footer')
</body>
</html>
