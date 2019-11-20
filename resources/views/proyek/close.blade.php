<!DOCTYPE html>
<title>PROYEK CLOSE</title>
<body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
      <section class="wrapper">
        @include('partials/header2')
          @include('partials.sidebar')
  <div class="content-wrapper">
    <section class="content"> 
             @include('alert.flash-message')
      <header class="bg-red" style="color: white; padding-left: 5px; padding: 5px;">
      <nav >
                     @if(checkPermission(['admin','superadmin']))
      <!-- Sidebar toggle button-->
    <a href="{{ URL('/proyek') }}" >
 <button class="btn-sm btn-success pull-left" style="margin-left: 5px; margin-top: 5px; margin-bottom: 5px;">
 <i class="fa fa-refresh"></i> Refresh</button></a>
 <div style="text-align: right;">
   <div class="btn-group" role="group">
<form class="navbar-form" action="{{ url('proyek/') }}" method="GET"  >
<input type="text" class="form-control" placeholder="Filter Klien.." name="nama_klien"  style="margin-left: 20px; margin-top: 5px; margin-bottom: 5px;"></input>
<button class="btn btn-sm btn-raised btn-success" onChange="form.submit()">Cari</button>
</form> 
</div>
   <div class="btn-group" role="group">
<form class="navbar-form" action="{{ url('proyek/') }}" method="GET"  >
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
    <thead class="bg-default">
    <th style="border-right-color:#; width: 5%;"><strong>KODE</strong></td>
    <th style="border-right-color:#; width: 5%;"><strong>MULAI/SELESAI</strong></td>
      <th style="border-right-color:#d9edf7; width: 15%;"><strong>KLIEN</strong></td>
      <th style="border-right-color:#; width: 15%;"><strong>JASA</strong></td>
            <th style="border-right-color:#; width: 15%; "><strong>PEKERJAAN</strong></td>
            <th ><strong>NILAI KONTRAK</strong> <text style="font-size: 7px; color: red; width: 7%; ">SEBELUM PAJAK</text></td>
            <th style="border-right-color:#; width: 5%;"><strong>PAJAK</strong></td>
            <th ><strong>TOTAL NILAI</strong> <text style="font-size: 7px; color: red; width: 7%;">SETELAH PAJAK</text></td>
                  <th style="border-right-color:#; width: 5%;"><strong>STATUS</strong></td>


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

        @php (@$total_nilai = ($data->nilai_kontrak + $data->nilai_addendum))
        @php ( @$a_tax = @$total_nilai * $data->tax_value / 100  )
        @php ( @$b_tax = @$a_tax +  @$total_nilai )

        @php (@$fa_tax = (number_format(@$a_tax,0,",",".").""))

        @php(@$include_nilai = (@$b_tax - @$a_tax))
        @php (@$finclude_nilai = (number_format(@$include_nilai,0,",",".").""))


</thead>
<tbody >
  <td ><a href="/proyek/detail/{{ $data->kd_proyek }}" style="color: blue;" title="Klik untuk melihat detail ">{{ $data->kd_proyek}}</a></td>
             @if ($data->kontrak_selesai < $data->kontrak_mulai)
           <td align="center"><text style="color: red;" title="Tanggal kontrak tidak valid">Tidak valid</text></td>
           @else
          <td  style="border-right-color:  ">
         {{ $kontrak_mulai}}<hr>
         {{ $kontrak_selesai }}</td>
          @endif
          <td  style="border-right-color:white  "><strong>{{ $data->nama_klien}}</strong></td>
          <td style="border-right-color:  ">- {{ $data->kelompok_jasa}}<br>- {{ $data->sub_jasa}}</td>
          <td style="border-right-color:  ">{{ $data->nama_pekerjaan}}</td>
          @php (@$nilai_kontrak = (number_format($data->nilai_kontrak,0,",",".").""))
                    @php (@$nilai_addendum = (number_format($data->nilai_addendum,0,",",".").""))
          @php ($b_tax = (number_format($b_tax,0,",",".").""))
          <td  ><strong>Rp. {{ $nilai_kontrak }}</strong><br><strong>Rp. {{ $nilai_addendum }}</strong></td>
                    <td  style="border-right-color:  ">  
          {{ $data->tax_status}}<hr>
         {{ $data->tax_value }} %</td></td>
          <td  ><strong>Rp. {{ $b_tax }}</strong>
          @if ($data->tax_status == "include")
<br><strong>Rp. {{ @$fa_tax }} -</strong><hr>
<strong>Rp. {{ @$finclude_nilai }}</strong>
                    @endif
</td>
          
          @if ($data->proyek_status == "close")
          <td  ><span style="padding: 5px; border-radius: 3px;" class="bg-red">Close </span></td>
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
