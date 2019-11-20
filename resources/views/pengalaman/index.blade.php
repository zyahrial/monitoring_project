<!DOCTYPE html>
<title>PENGALAMAN</title>
<body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
      <section class="wrapper">
        @include('partials/header2')
          @include('partials.sidebar')
  <div class="content-wrapper">
    <section class="content"> 
             @include('alert.flash-message')
      <header class="bg-primary" style="color: white; padding-left: 5px; padding: 5px;">
      <nav >
                     @if(checkPermission(['admin','superadmin']))
      <!-- Sidebar toggle button-->
    <a href="{{ URL('/pengalaman/create') }}"  >
 <button class="btn-sm btn-success pull-left" style="margin-top: 5px; margin-bottom: 5px;"> 
    <i class="fa fa-plus-square"></i> Tambah</button></a>
    <a href="{{ URL('/pengalaman') }}" >
 <button class="btn-sm btn-success pull-left" style="margin-left: 5px; margin-top: 5px; margin-bottom: 5px;">
 <i class="fa fa-refresh"></i> Refresh</button></a>
 <div style="text-align: right;">
   <div class="btn-group" role="group">
<form class="navbar-form" action="{{ url('pengalaman/') }}" method="GET"  >
<input type="text" class="form-control" placeholder="Filter Klien.." name="nama_klien"  style="margin-left: 20px; margin-top: 5px; margin-bottom: 5px;"></input>
<button class="btn btn-sm btn-raised btn-success" onChange="form.submit()">Cari</button>
</form> 
</div>
<div class="btn-group" role="group">
<form class="navbar-form" action="{{ url('pengalaman/') }}" method="GET"  >
<input type="text" class="form-control" placeholder="Filter PIC.." name="cp_internal" style="margin-left: 1px; margin-top: 5px; margin-bottom: 5px;"></input>
<button class="btn btn-sm btn-raised btn-success" onChange="form.submit()">Cari</button>
</form> 
</div>
   <div class="btn-group" role="group">
<form class="navbar-form" action="{{ url('pengalaman/') }}" method="GET"  >
<div class='input-group date' >
<input  class="form-control" style="width: 150px; margin-left: 30px;" type="text" name="start" id="awal" placeholder="yyyy-mm-dd" data-date-format="yyyy-mm-dd" autocomplete="off" />
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<div class='input-group date' >
<input  class="form-control" style="width: 150px;" type="text" name="end" id="akhir" placeholder="yyyy-mm-dd" data-date-format="yyyy-mm-dd" autocomplete="off"/ >
<span class="input-group-addon">
<span class="fa fa-calendar"></span></span>
</div>
<button class="btn btn-sm btn-raised btn-success" onChange="form.submit()">Cari</button>
</form> 
</div>
</div>
          @endif
    </nav> 
    </header>
              <table id="example2" class="table table-bordered table-hover" style="background-color: white;">
    <thead class="bg-info">
    <th ><strong>KODE</strong></td>
      <th style="border-right-color:#d9edf7; width: 15%;"><strong>KLIEN</strong></td>
      <th style="border-right-color:#d9edf7; width: 20%;"><strong>JASA</strong></td>
      <th style="border-right-color:#d9edf7; width: 25%;"><strong>RUANG LINGKUP</strong></td>
            <th style="border-right-color:#d9edf7; width: 10%; "><strong>LOKASI</strong></td>
            <th style="border-right-color:#d9edf7; width: 10%;"><strong>NO.KONTRAK</strong></td>
            <th ><strong>NILAI</strong></td>
            <td align="center" style="border-right-color:#d9edf7; width: 7%; "><strong>MULAI/SELESAI</strong></td>
        </tr>

          @php ($date_now = date('Y-m-d'))
        @php(
          $no = 1 {{-- buat nomor urut --}}
          )
        {{-- loop all klien --}}
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
</thead>
<tbody >
  <td ><a href="/pengalaman/detail/{{ $data->kd_pengalaman }}" style="color: blue;" title="Klik untuk melihat detail ">{{ $data->kd_pengalaman}}</a></td>
          <td  style="border-right-color:white  "><strong>{{ $data->nama_klien}}</strong></td>
          <td style="border-right-color:white  ">- {{ $data->kelompok_jasa}}<br>- {{ $data->sub_jasa}}</td>
          <td style="border-right-color:white  ">{{ $data->ringkasan_lingkup}}</td>
          <td style="border-right-color:white  ">{{ $data->lokasi_pekerjaan}}</td>
          <td  style="border-right-color:white  ">{{ $data->no_kontrak}}</td>
          @php ($nilai_kontrak = (number_format($data->nilai_kontrak,0,",",".").""))
          <td  ><strong>{{ $nilai_kontrak }}</strong></td>
           @if ($data->kontrak_selesai < $data->kontrak_mulai)
           <td align="center"><text style="color: red;" title="Tanggal kontrak tidak valid">Tidak valid</text></td>
           @else
          <td  style="border-right-color:white  ">
         {{ $kontrak_mulai}}<hr>
         {{ $kontrak_selesai }}</td>
          @endif
   </tbody> 
   </tr>
      </div>
      @endforeach
    </table>
                <div>
                                   @if(checkPermission(['admin','superadmin']))
                  <ul class="pagination pagination-sm pull-left">
                    {{ $pengalaman->fragment('foo')->links() }}
                  </ul>
                  @endif
                </div>
            </section>
          </div>
        </div>
</div>
        <!-- page end-->
      </section>
    <!--main content end-->
@include('partials/footer')
  </section>
</body>
    <!-- javascripts -->
  <script src="/NiceAdmin/js/jquery.min.js"></script>
<script src="/NiceAdmin/js/jquery-ui.min.js"></script>
 <script type="text/javascript">
  $(function() {
$("#awal").datepicker();
$("#akhir").datepicker();
  });
  </script>
      <!-- bootstrap-wysiwyg -->
  <script src="/NiceAdmin/js/jquery.hotkeys.js"></script>
  <script src="/NiceAdmin/js/bootstrap-wysiwyg.js"></script>
  <script src="/NiceAdmin/js/bootstrap-wysiwyg-custom.js"></script>
  <script src="/NiceAdmin/js/moment.js"></script>
  <script src="/NiceAdmin/js/bootstrap-colorpicker.js"></script>
  <script src="/NiceAdmin/js/daterangepicker.js"></script>
  <script src="/NiceAdmin/js/bootstrap-datepicker.js"></script>
</html>
