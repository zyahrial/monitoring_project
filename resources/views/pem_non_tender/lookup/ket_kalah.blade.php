  <head>
  <link href="/NiceAdmin/css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="/NiceAdmin/css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="/NiceAdmin/css/elegant-icons-style.css" rel="stylesheet" />
  <link href="/NiceAdmin/css/font-awesome.min.css" rel="stylesheet" />
  <link href="/NiceAdmin/css/daterangepicker.css" rel="stylesheet" />
  <link href="/NiceAdmin/css/bootstrap-datepicker.css" rel="stylesheet" />
  <link href="/NiceAdmin/css/bootstrap-colorpicker.css" rel="stylesheet" />
  <!-- date picker -->
</head> 
  <!-- color picker -->

  <!-- Custom styles -->
  <link href="/NiceAdmin/css/style.css" rel="stylesheet">
  <link href="/NiceAdmin/css/style-responsive.css" rel="stylesheet" />
  <body>
    @include('alert.flash-message')
    <div class="row">
          <div class="col-lg-6">
            <section class="panel">
              <header class="panel-heading">
               Add / Select
              </header>
              <div class="panel-body">
               <form action="{{ URL('pem_tender/lookup/store_ket_kalah') }}" method="post" class="form" align="left"> 
              {{ csrf_field() }}      
                  <div class="form-group">
                    <label for="exampleInputEmail1">Keterangan</label>
                    <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="">
                  </div>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
             
<table class="table table-bordered table-hover" style="font-size:12px; width: 50%;">
    <tbody>
      <tr>
         <th rowspan="2"><strong>NO.</strong></td>
            <th rowspan="2"><strong>KETERANGAN KALAH</strong></td>
            <tr>
        @php(   $no = 1 {{-- buat nomor urut --}}  )
        {{-- loop all legalitas --}}
        @foreach ($lookup as $data)
<tr onclick="javascript:pilih(this)">
  <td>{{ $no++ }}</td>
            <td>{{ $data->keterangan }}</td>
</tr>
@endforeach
    </tbody>
</table>
 </div>
 </div>
            </section>
          </div>
</body>
<script>
    function pilih(row){

        var ket_kalah=row.cells[1].innerHTML;
        window.opener.parent.document.getElementById("ket_kalah").value = ket_kalah;
            
 window.close();
    }
</script>