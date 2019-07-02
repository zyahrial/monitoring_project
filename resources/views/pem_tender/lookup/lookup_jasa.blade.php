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

  <!-- Custom styles -->
  <link href="/NiceAdmin/css/style.css" rel="stylesheet">
  <link href="/NiceAdmin/css/style-responsive.css" rel="stylesheet" />
</head>
  <body>
    @include('alert.flash-message')
    <div class="row">
          <div class="col-lg-6">
            <section class="panel">
                <div class="panel-heading" style="margin-left:10px; margin-right: 10px; ">Tambah Jasa</div>
                <div class="panel-body" style="margin-left:10px; margin-right: 10px; ">
               <form action="{{ URL('pem_tender/store_jasa') }}" method="post" class="form" align="left"> 
              {{ csrf_field() }}      
                  <div class="form-group">

                    <label for="exampleInputEmail1">Kelompok Jasa :</label>
                     <input type="text" class="form-control" name="kelompok_jasa" id="kelompok_jasa" placeholder="">
                     <label for="exampleInputEmail1">Sub Jasa :</label>
                    <input type="text" class="form-control" name="sub_jasa" id="sub_jasa" placeholder="">
                  </div>
                  <button type="submit" class="btn btn-sm btn-raised btn-primary">Simpan</button>
                </form>
</div>
<br>
                <div class="panel-heading" style="margin-left:10px; margin-right: 10px; ">Pilih Jasa</div>
                <div class="panel-body" style="margin-left:10px; margin-right: 10px; ">
<table class="table table-bordered table-hover" style="font-size:12px; color: black;">
    <tbody>
      <tr>
            <td rowspan="2" ><strong></strong></td>
            <td rowspan="2"><strong>KELOMPOK JASA</strong></td>
            <td rowspan="2"><strong>SUB JASA</strong></td>
              <td colspan="2"></th>
            <tr>
        @php(   $no = 1 {{-- buat nomor urut --}}  )
        {{-- loop all legalitas --}}
        @foreach ($lookup as $data)
<tr onclick="javascript:pilih(this)">
<td>{{ $no++ }}</td>
            <td>{{ $data->kelompok_jasa }} </td>
            <td>{{ $data->sub_jasa }}</td>
            <td align="center"><button class="btn btn-sm btn-raised btn-info" onclick="window.close();" style="color: white;">
            <i class="fa fa-check" aria-hidden="true" ></i> </button> </td>
<td>
        @if(checkPermission(['superadmin']))
        <form action="{{action('LookupController@destroy_jasa', $data['kd_jasa'])}}" method="post">
         {{ csrf_field() }}
        <input name="_method" type="hidden" value="PATCH">
        <button class="btn btn-sm btn-raised btn-danger" title="Hapus" onclick="return confirm('Yakin mau hapus data ?')" type="submit">
        <i class="fa fa-trash-o"></i> 
        </button>
        </form>
        @endif
</td>
</tr>
@endforeach
    </tbody>
</table>
              </div>
            </section>
          </div>
</body>
<script>
    function pilih(row){

        var kelompok_jasa=row.cells[1].innerHTML;
        window.opener.parent.document.getElementById("kelompok_jasa").value = kelompok_jasa;

        var sub_jasa=row.cells[2].innerHTML;
        window.opener.parent.document.getElementById("sub_jasa").value = sub_jasa;
            
    }
</script>
