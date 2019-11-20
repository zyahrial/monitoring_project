<!DOCTYPE html>
<title>REVIEW PENJUALAN (NON TENDER)</title>
<body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
      <section class="wrapper" style="background-color: white;">
                @include('partials/header2')
          @include('partials.sidebar')
       <div class="content-wrapper">
    <section class="content" style="background-color: white;">
      @if(checkPermission(['admin','superadmin']))
          <div class="box-body" style="text-align: left;">
      <a href="/pem_non_tender" class="btn btn-app">
                <i class="fa fa-arrow-circle-left" title="BACK" style="font-size: 32px;"></i> </a>
           </div>
      @endif
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

<header class="bg-primary detail" >
<strong><i>REVIEW PENJUALAN (NON TENDER) {{ $data->kd_pn_non_tender }}</i></strong>
</header>
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
                                                        <hr>
                            <span class="info-box-text"><strong>PERMINTAAN :</strong></span>
                                          <span class="info-box-number" style="font-size: 12px;">{{$tgl_permintaan}}</span>
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
        <div class="row" style="margin-left:10px; margin-right: 10px;">
        </div>
<header class="bg-primary detail" >
<strong><i>ALUR PENJUALAN (NON TENDER) {{ $data->kd_pn_non_tender }}</i></strong></header>
<br>
           <div>
          <i class="fa fa-arrow-right"></i>
        </div>
          <div class="col-lg-2" style="font-size: 12px;">
            <div class="panel panel-info">
           <div class="bg-primary detail-header"> CANVASSING</div>
               <div class="detail-body panel-content " style="height: 150px;">
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
          <div class="bg-primary detail-header">PROSES KAK & RAB</div>
               <div class="detail-body panel-content " style="height: 150px;">
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
          <div class="bg-primary detail-header">PROPOSAL</div>
               <div class="detail-body panel-content " style="height: 150px;" >
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
          <div class="bg-primary detail-header">PRESENTASI</div>
               <div class="detail-body panel-content " style="height: 150px;">
                  <div><strong><u>Tanggal</u></strong></div><div>{{$tgl_presentasi}}</div><br>
            </div>
          </div>
      </div>
              <div>
          <i class="fa fa-arrow-right"></i>
        </div>
          <div class="col-lg-2" style="font-size: 12px;">
            <div class="panel panel-info">
          <div class="bg-primary detail-header">PROSES NEGOSIASI</div>
               <div class="detail-body panel-content " style="height: 150px;" >
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
          <div class="bg-primary detail-header">FOLLOW UP</div>
               <div class="detail-body panel-content " style="height: 150px;">
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
          <div class="bg-primary detail-header">PELUANG DAPAT (%)</div>
               <div class="detail-body panel-content " style="height: 150px;">
      <h1 align="center"><strong>{{ $data->peluang }} %</strong></h2>
            </div>
          </div>
          </div>
                           <div>
          <i class="fa fa-arrow-right"></i>
        </div>  
                    <div class="col-lg-2" style="font-size: 12px;">
            <div class="panel panel-info">
          <div class="bg-primary detail-header">ACTION</div>
               <div class="detail-body panel-content" >
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
