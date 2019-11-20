<!DOCTYPE html>
<title>HISTORY PENJUALAN (NON TENDER)</title>
<body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
      <section class="wrapper" style="background-color: white;">
                @include('partials/header2')
          @include('partials.sidebar')
       <div class="content-wrapper">
    <section class="content" style="background-color: white;">
      @if(checkPermission(['admin','superadmin']))
        <a href="/history/pem_non_tender/" style="color: blue;" title="Klik Untuk Melihat Detail">
      <button class="btn-sm btn-default"><i class="fa fa-arrow-left"></i> Back To List</button></a>
      @endif
      <br><br>
      @include('alert.flash-message')
        @php ($date_now = date('Y-m-d'))
        @php(
          $no = 1 {{-- buat nomor urut --}}
          )
        {{-- loop all pem_non_tender --}}
        @foreach ($history_tender as $data)
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
        <div class="panel-heading bg-red bg-red bg-red detail" ><strong>
<strong><i>HISTORY PENJUALAN (NON TENDER) {{ $data->kd_pn_non_tender }} </i></strong></div>
        <div class="panel-body" style="margin-left:10px; margin-right: 10px; ">
          <div class="col-xs-6" style="font-size: 12px;">
            <address>           
              <div><strong><u>GRUP JASA</u> </strong></div>
             <div style="color: blue;  font-size: 14px;"> {{$data->kelompok_jasa}}</div> <br>
             <div><strong><u>SUB JASA </u></strong></div>
             <div style="color: blue;  font-size: 14px;"> {{$data->sub_jasa}}</div> <br>
             <div> <strong><u>NAMA PEKERJAAN</u> </strong></div>
             <div style="color: blue;  font-size: 14px;">{{$data->nama_pekerjaan}}</div><br>
             <div> <strong><u>NAMA KLIEN </u></strong></div>
             <div style="color: blue;  font-size: 14px;">{{$data->nama_klien}}</div>
            </address>
          </div>
            <div  style="font-size: 12px;" class="col-xs-6 text-right">
            <address>
              
              @if ( $data->status_closing == 'MENANG')
               <div ><strong><u>STATUS</u></strong></div>
             <text style="color: blue; font-size: 14px;"><strong>MENANG<strong></text>
              @else
             <text style="background-color: red; color: white; padding: 5px;"><strong>KALAH<strong></text>
              @endif
              <br><br>
              <div ><strong><u>TANGGAL PROSES</u></strong></div>
               @php  ( $date = date('d M Y', strtotime($data->created_at)))
              <div style="color: blue;  font-size: 14px;"><text class="bg-success">{{$date}}</text></div><br>
              <div ><strong><u>KATEGORI</u></strong></div>
              <div style="color: blue; font-size: 14px;">{{$data->kategori}}</div>
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
              <div class="panel-content detail-body" style="height: 250px; background-color: #F5F5F5">
                  <div><strong><u>NAMA</u></strong></div><div><i>{{$data->informasi_nama}}</i></div><br>
                  <div><strong><u>TELP</u></strong></div><div><i>{{$data->informasi_telp}}</i></div><br>
                  <div><strong><u>EMAIL</u></strong></div><div><i>{{$data->informasi_email}}</i></div><br>
            </div>
          </div>
        </div>   
          <div class="col-lg-2" style="font-size: 12px;">
            <div class="panel panel-default">
           <div class="panel-heading bg-red" style="margin-top: 5px; ">CANVASSING</div>
               <div class="panel-content detail-body" style="height: 150px; background-color: #eee">
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
<text>{{$data->hasil_canvasing}}</text>
                      </pre>
                    </div>
                  </div>
          </div>
          <div class="col-lg-2" style="font-size: 12px;">
            <div class="panel panel-default">
           <div class="panel-heading bg-red" style="margin-top: 5px;">PROSES KAK & RAB</div>
               <div class="panel-content detail-body" style="height: 150px; background-color: #eee">
                   <div><strong><u>Tanggal</u></strong></div><div>{{$tgl_kak}}</div><br>
                   <div><strong><u>Hasil</u></strong></div><div>{{$nilai_kak}}</div>
            </div>
          </div>
          </div>
          <div class="col-lg-2" style="font-size: 12px;">
            <div class="panel panel-default">
           <div class="panel-heading bg-red" style="margin-top: 5px;">TANGGAL PROPOSAL</div>
               <div class="panel-content detail-body" style="height: 150px; background-color: #eee" >
                   <div><strong><u>Tanggal</u></strong></div><div>{{$tgl_proposal}}</div><br>                                  
                   <div><strong><u>Harga Penawaran</u></strong></div><div>{{$nilai_penawaran}}</div>
            </div>
          </div>
          </div>
      <div class="col-lg-2" style="font-size: 12px;">
            <div class="panel panel-default">
           <div class="panel-heading bg-red" style="margin-top: 5px;">TANGGAL PRESENTASI</div>
               <div class="panel-content detail-body" style="height: 150px; background-color: #eee">
                  <div><strong><u>Tanggal</u></strong></div><div>{{$tgl_presentasi}}</div><br>
            </div>
          </div>
      </div>
          <div class="col-lg-2" style="font-size: 12px;">
            <div class="panel panel-default">
           <div class="panel-heading bg-red" style="margin-top: 5px;">PROSES NEGOSIASI</div>
               <div class="panel-content detail-body" style="height: 150px; background-color: #eee" >
                   <div><strong><u>Tanggal</u></strong></div><div>{{$tgl_negosiasi}}</div><br>                                
                   <div><strong><u>Hasil</u></strong></div><div>{{$nilai_negosiasi}}</div>
            </div>
          </div>
          </div>
         <div class="col-lg-2" style="font-size: 12px;">
            <div class="panel panel-default">
           <div class="panel-heading bg-red" style="margin-top: 5px;">HISTORY FOLLOW UP</div>
               <div class="panel-content detail-body" style="height: 150px; background-color: #eee">
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
           <div class="panel-heading bg-red" style="margin-top: 5px;">PELUANG DAPAT (%)</div>
               <div class="panel-content detail-body" style="height: 150px; background-color: #eee">
      <h1 align="center"><strong>{{ $data->peluang }} %</strong></h1>
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
