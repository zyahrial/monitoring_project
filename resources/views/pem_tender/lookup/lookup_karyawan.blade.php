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
              <header class="panel-heading">
               Pilih Karyawan
              </header>
              <div class="panel-body">

<table class="table table-bordered " style="font-size:12px; color: black;">
<td colspan="5">
  <form class="navbar-form" action="{{ url('/pem_tender/lookup/lookup_karyawan') }}" method="GET"  >
<input type="text" class="form-control" style="width: 100%" placeholder="Filter Nama.." name="nama" onChange="form.submit()" style="margin-top: 5px; margin-bottom: 5px;"></input>
</form>
</td>
    <tbody class="bg-info">
<tr>        <td rowspan="2" ><strong>No.</strong></td>
            <td rowspan="2"><strong> NAMA</strong></td>
            <td rowspan="2"><strong> EMAIL PERUSAHAAN</strong></td>
            <td rowspan="2"><strong>DIVISI</strong></td>
            <td rowspan="2"><strong>JABATAN</strong></td>
            <tr>
    </tbody>
        @php(   $no = 1 {{-- buat nomor urut --}}  )
        {{-- loop all legalitas --}}
        @foreach ($lookup as $data)
<tr onclick="javascript:pilih(this)">
              <td>{{ $no++ }}</td>
            <td>{{ $data->nama }}</td>
                        <td>{{ $data->email }}</td>
            <td>{{ $data->divisi }}</td>
             <td>{{ $data->jabatan }}</td>
            
</tr >
@endforeach
</table>
<script>
    function pilih(row){

        var nama=row.cells[1].innerHTML;
        window.opener.parent.document.getElementById("nama").value = nama;
        var email=row.cells[2].innerHTML;
        window.opener.parent.document.getElementById("email").value = email;
            
 window.close();
    }
</script>
