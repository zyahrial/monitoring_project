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
               Pilih Klien
              </header>
              <div class="panel-body">

<table class="table table-bordered" style="font-size:12px; color: black;">
<td colspan="4">
  <form class="navbar-form" action="{{ url('/rekanan/lookup/lookup_klien') }}" method="GET"  >
<input type="text" class="form-control" placeholder="Filter.." name="nama_klien" onChange="form.submit()" style="width: 100%"></input>
</form>
</td>
    <tbody class="bg-info">
      <tr>
            <td rowspan="2" ><strong>No.</strong></td>
            <td rowspan="2" ><strong>KODE KLIEN</strong></td>
            <td rowspan="2"><strong> NAMA KLIEN</strong></td>
            <tr>
    </tbody>
        @php(   $no = 1 {{-- buat nomor urut --}}  )
        {{-- loop all legalitas --}}
        @foreach ($lookup as $data)
<tr onclick="javascript:pilih(this)">
              <td>{{ $no++ }}</td>
              <td>{{ $data->kd_klien }}</td>
            <td>{{ $data->nama_klien }}</td>
            
</tr >
@endforeach
</table>
<script>
    function pilih(row){

        var kd_klien=row.cells[1].innerHTML;
        window.opener.parent.document.getElementById("kd_klien").value = kd_klien;

        var nama_klien=row.cells[2].innerHTML;
        window.opener.parent.document.getElementById("nama_klien").value = nama_klien;
            
 window.close();
    }
</script>
