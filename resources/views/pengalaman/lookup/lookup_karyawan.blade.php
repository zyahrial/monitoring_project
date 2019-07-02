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
<form class="navbar-form" action="{{ url('/pem_tender/lookup/lookup_karyawan') }}" method="GET"  >
<input type="text" class="form-control" placeholder="Cari Karyawan.." name="nama" onChange="form.submit()" style="margin-top: 5px; margin-bottom: 5px; margin-left: 20px;"></input>
</form>
<table class="table table-bordered table-hover" style="font-size:12px">
    <tbody>
        <tr >
      <tr>
            <th rowspan="2" ><strong>No.</strong></td>
            <th rowspan="2"><strong> NAMA KARYAWAN</strong></td>
                          <th rowspan="2"><strong>DIVISI</strong></td>
            <th rowspan="2"><strong>JABATAN</strong></td>

            <tr>
        @php(   $no = 1 {{-- buat nomor urut --}}  )
        {{-- loop all legalitas --}}
        @foreach ($lookup as $data)
<tr onclick="javascript:pilih(this)">
              <td>{{ $no++ }}</td>
            <td>{{ $data->nama }}</td>
            <td>{{ $data->divisi }}</td>
             <td>{{ $data->jabatan }}</td>
            
</tr >
@endforeach
    </tbody>
</table>
<script>
    function pilih(row){

        var nama=row.cells[1].innerHTML;
        window.opener.parent.document.getElementById("nama").value = nama;
            
 window.close();
    }
</script>
