<!DOCTYPE html>
<title>REVIEW HISTORY PENJUALAN (TENDER)</title>
<body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
      <section class="wrapper" style="background-color: white;">
                @include('partials/header2')
          @include('partials.sidebar')
       <div class="content-wrapper">
    <section class="content" style="background-color: white;">
      @if(checkPermission(['admin','superadmin']))
<a href="/history/pem_tender" style="color: blue;" title="Klik Untuk Melihat Detail">
      <button class="btn-sm btn-default"><i class="fa fa-arrow-left"></i> Back To List</button></a>
      @endif
      <br><br>
      @include('alert.flash-message')
        @php ($date_now = date('Y-m-d'))
        @php(
          $no = 1 {{-- buat nomor urut --}}
          )
        {{-- loop all pem_tender --}}
        @foreach ($history_tender as $data)
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
        @php  ( $date = date('d M Y', strtotime($data->created_at)))
        
        
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
        <div class="panel-heading bg-red bg-red" ><strong>
          <i>REVIEW HISTORY PENJUALAN (TENDER) {{ $data->kd_his_tender }}</i></strong></div>
        <div class="panel-body"  style="margin-left:10px; margin-right: 10px; ">
          <div class="col-xs-6" style="font-size: 12px;">
            <address>           
              <div><strong><u>GRUP JASA</u></strong></div>
             <div style="color: blue;  font-size: 14px;"> {{$data->kelompok_jasa}}</div> <br>
             <div><strong><u>SUB JASA</u> </strong></div>
             <div style="color: blue;  font-size: 14px;"> {{$data->sub_jasa}}</div> <br>
             <div> <strong><u>NAMA PEKERJAAN</u> </strong></div>
             <div style="color: blue; font-size: 14px;">{{$data->nama_pekerjaan}}</div><br>
              <div> <strong><u>NAMA KLIEN </u></strong></div>
             <div style="color: blue;  font-size: 14px;">{{$data->nama_klien}}</div>
            </address>
          </div>
            <div  style="font-size: 12px;" class="col-xs-6 text-right">
            <address>
            
              @if ( $data->status_closing == 'MENANG')
            <div ><strong><u>STATUS</u></strong></div>
             <text class="bg-success" style="color: blue; font-size: 14px;"><strong>MENANG<strong></text>
              @else
            <text style="background-color: red; color: white; padding: 5px;"><strong>KALAH<strong></text>
              @endif
              <br><br>
              <div ><strong><u>TGL.PROSES</u></strong></div>
            <div style="color: blue; font-size: 14px;">{{$date}}</div><br>
              <div st><strong><u>KATEGORI</u></strong></div>
              <div style="color: blue;  font-size: 14px;">{{$data->kategori}}</div>
<div><a href="#keterangan" class="" data-toggle="modal"><small class="bg-info">Lihat Detail</small></a></div>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="keterangan" class="modal fade">
                  <div class="modal-dialog" style="width: 70%;">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 class="modal-title" align="center">KETERANGAN</h4>
                      </div>
                      <pre align="left">
{{$data->keterangan}}
                      </pre>
                    </div>
                  </div>
          </div><br>
              <div ><strong><u>CP.SPRINT</u></strong></div>
              <div style="color: blue; font-size: 14px;">{{$data->cp_internal}}</div>
              </address>
          </div>
        </div>
        <div class="row" style="margin-left:10px; margin-right: 10px;">
          <div class="col-lg-12" style="font-size: 12px;">
            <div class="panel panel-default">
           <div class="panel-heading bg-red" style="margin-top: 5px;">SUMBER INFORMASI</div>
              <div class="panel-content detail-body detail-body" style="height: 250px; background-color: #F5F5F5">
                  <div><strong><u>NAMA</u></strong></div><div><i>{{$data->informasi_nama}}</i></div><br>
                  <div><strong><u>TELP</u></strong></div><div><i>{{$data->informasi_telp}}</i></div><br>
                  <div><strong><u>ENTITAS</u></strong></div><div><i>{{$data->informasi_entitas}}</i></div><br>
                  <div><strong><u>EMAIL</u></strong></div><div><i>{{$data->informasi_email}}</i></div><br>
            </div>
          </div>
        </div>
          <div class="col-lg-2" style="font-size: 12px;">
            <div class="panel panel-default">
          <div class="panel-heading bg-red" style="margin-top: 5px; background-color: #eee; color: black;">CANVASSING</div>
               <div class="panel-content detail-body" style="height: 200px; background-color: #F5F5F5">
                   <div><strong><u>Tanggal</u></strong></div><div>{{$tgl_canvasing}}</div><br>
                   <div><a href="#hasil1" data-toggle="modal"><small class="bg-info">Lihat Hasil</small></a></div>
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
          <div class="col-lg-2" style="font-size: 12px;">
            <div class="panel panel-default">
           <div class="panel-heading bg-red" style="margin-top: 5px; background-color: #eee; color: black;">PROSES KAK & RAB</div>
               <div class="panel-content detail-body" style="height: 200px; background-color: #F5F5F5">
                   <div><strong><u>Tanggal</u></strong></div><div>{{$tgl_kak}}</div><br>                                    
                   <div><strong><u>Nilai</u></strong></div><div>{{$nilai_kak}}</div>
            </div>
          </div>
          </div>
          <div class="col-lg-2" style="font-size: 12px;">
            <div class="panel panel-default">
     <div class="panel-heading bg-red" style="margin-top: 5px; background-color: #eee; color: black;">PROSES PENDAFTARAN</div>
               <div class="panel-content detail-body" style="height: 200px; background-color: #F5F5F5" >
                   <div><strong><u>Tanggal</u></strong></div><div>{{$tgl_pendaftaran}}</div><br>
                   <div><a href="#hasil2" data-toggle="modal"><small class="bg-info">Lihat Hasil</small></a></div>
            </div>
          </div>
          </div>
      <div class="col-lg-2" style="font-size: 12px;">
            <div class="panel panel-default" >
          <div class="panel-heading bg-red" style="margin-top: 5px; background-color: #eee; color: black;">HARGA PENAWARAN</div>
               <div class="panel-content detail-body" style="height: 200px; background-color: #F5F5F5">                                
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

          <div class="col-lg-4" style="font-size: 12px;">
            <div class="panel panel-default">
         <div class="panel-heading bg-red" style="margin-top: 5px; background-color: #eee; color: black;">
         PROSES PRAKUALIFIKASI (PQ)</div>
               <div class="panel-content detail-body" style="height: 200px; background-color: #F5F5F5">
                  <div><strong><u>Tanggal Ambil </u></strong></div><div>{{$tgl_ambil}}</div><br>
                <div><strong><u>Tanggal Submit </u></strong></div><div>{{$tgl_submit}}</div><br>
            <div><strong><u>Tanggal Pembuktian </u></strong></div><div>{{$tgl_pembuktian}}</div><br>
             <div><a href="#hasil3" data-toggle="modal"><small class="bg-info">Lihat Hasil</small></a></div>
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
          <div class="col-lg-2" style="font-size: 12px; ">
            <div class="panel panel-default">
        <div class="panel-heading bg-red" style="margin-top: 5px; background-color: #eee; color: black;">PROSES AANWIJZING</div>
               <div class="panel-content detail-body" style="height: 150px; background-color: #F5F5F5">
                <div><strong><u>Tanggal</u> </strong></div><div>{{$tgl_aanwijzing}}</div><br>
                   <div><strong><u>Personil</u></strong></div><div>{{$data->personil_aanwijzing}}</div>
            </div>
          </div>
          </div>

         <div class="col-lg-2" style="font-size: 12px;">
            <div class="panel panel-default">
    <div class="panel-heading bg-red" style="margin-top: 5px; background-color: #eee; color: black;">PEMBUKAAN SAMPUL I</div>
               <div class="panel-content detail-body" style="height: 150px; background-color: #F5F5F5">
                         <div><strong><u>Tanggal</u></strong></div><div>{{$tgl_sampul1}}</div><br>
            <div><a href="#hasil4" data-toggle="modal"><small class="bg-info">Lihat Hasil</small></a></div>
            </div>
          </div>
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
            <div class="panel panel-default">
       <div class="panel-heading bg-red" style="margin-top: 5px; background-color: #eee; color: black;">BEAUTY CONTEST</div>
               <div class="panel-content detail-body" style="height: 150px; background-color: #F5F5F5">
               <div><strong><u>Tanggal</u></strong></div><div>{{$tgl_contest}}</div><br>
                   <div><strong><u>Personil</u></strong></div><div>{{$data->personil_contest}}</div>
            </div>
          </div>
          </div>
         <div class="col-lg-2" style="font-size: 12px;">
            <div class="panel panel-default">
          <div class="panel-heading bg-red" style="margin-top: 5px; background-color: #eee; color: black;">KLARIFIKASI TEKNIS</div>
               <div class="panel-content detail-body" style="height: 150px; background-color: #F5F5F5">
                         <div><strong><u>Tanggal</u></strong></div><div>{{$tgl_klarifikasi_teknis}}</div><br>
                    <div><a href="#hasil5" data-toggle="modal"><small class="bg-info">Lihat Hasil</small></a></div>
            </div>
          </div>
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
            <div class="panel panel-default">
         <div class="panel-heading bg-red" style="margin-top: 5px; background-color: #eee; color: black;">EVALUASI TEKNIS</div>
               <div class="panel-content detail-body" style="height: 150px; background-color: #F5F5F5">
                         <div><strong><u>Tanggal</u></strong></div><div>{{$tgl_evaluasi_teknis}}</div><br>
               <div><a href="#hasil6" data-toggle="modal"><small class="bg-info">Lihat Hasil</small></a></div>
            </div>
          </div>
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
            <div class="panel panel-default">
   <div class="panel-heading bg-red" style="margin-top: 5px; background-color: #eee; color: black;">INFORMASI TENDER</div>
               <div class="panel-content detail-body" style="height: 150px; background-color: #F5F5F5">
            <div><strong><u>Pengambilan</u></strong></div><div>{{$tgl_pengambilan_doc}}</div><br>
            <div><strong><u>Pemasukan</u> </strong></div><div>{{$tgl_pemasukan_doc}}</div>
            </div>
          </div>
      </div>
      <div class="col-lg-2" style="font-size: 12px;">
            <div class="panel panel-default ">
   <div class="panel-heading bg-red" style="margin-top: 5px; background-color: #eee; color: black;">PEMBUKAAN SAMPUL II</div>
               <div class="panel-content detail-body" style="height: 150px; background-color: #F5F5F5">
            <div><strong><u>Tanggal</u></strong></div><div>{{$tgl_sampul2}}</div><br>
               <div><a href="#hasil7" data-toggle="modal"><small class="bg-info">Lihat Hasil</small></a></div>
            </div>
          </div>
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
            <div class="panel panel-default ">
     <div class="panel-heading bg-red" style="margin-top: 5px; background-color: #eee; color: black;">NEGOSIASI / KLARIFIKASI</div>
        <div class="panel-content detail-body" style="height: 150px; background-color: #F5F5F5">
            <div><strong><u>Tanggal</u></strong></div><div>{{$tgl_negosiasi}}</div><br>
            <div><a href="#hasil8" data-toggle="modal"><small class="bg-info">Lihat Hasil</small></a></div>
            </div>
          </div>
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
       <div class="panel panel-default">
       <div class="panel-heading bg-red" style="margin-top: 5px; background-color: #eee; color: black;">HISTORY FOLLOW UP</div>
          <div class="panel-content detail-body" style="height: 150px; background-color: #F5F5F5">
            <div><strong><u>Tanggal</u></strong></div><div>{{$tgl_followup}}</div><br>
                    <div><a href="#status" data-toggle="modal"><small class="bg-info">Lihat Status</small></a></div>
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
        <div class="col-lg-2" style="font-size: 12px;">
            <div class="panel panel-default">
       <div class="panel-heading bg-red" style="margin-top: 5px; background-color: #eee; color: black;">PELUANG DAPAT (%)</div>
               <div class="panel-content detail-body detail-body" style="height: 150px; background-color: #F5F5F5">
      <h1 align="center"><strong>{{ $data->peluang }} %</strong></h1>
            </div>
          </div>
          </div>
                    <div class="col-lg-2" style="font-size: 12px;">
          <div class="panel panel-default">
   <div class="panel-heading bg-red" style="margin-top: 5px; background-color: #eee; color: black;">KOMPETITOR</div>
          <div class="panel-content detail-body" style="height: 150px; background-color: #F5F5F5">
          <div>{{$data->kompetitor}}</div>
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
