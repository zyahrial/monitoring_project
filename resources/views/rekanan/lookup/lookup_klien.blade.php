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

<table class="table table-bordered" style="font-size:12px; color: black; width: 100%;">
        <tr >
          <td colspan="6">
            <form class="navbar-form" action="{{ url('/rekanan/lookup/lookup_klien') }}" method="GET"  >
<input type="text" class="form-control" placeholder="Filter.." name="nama_klien" onChange="form.submit()" style="width: 100%"></input>
</form>
</td>
			<tr>
            <tbody class="bg-info"> 
            <td rowspan="2" ><strong>No.</strong></td>
              <td rowspan="2"><strong> KODE<text style="color:#F7F7F7 ">_</text>KLIEN</strong></td>
            <td rowspan="2"><strong> NAMA<text style="color:#F7F7F7 ">_</text>KLIEN</strong></td>
            <td rowspan="2"><strong>JENIS<text style="color:#F7F7F7 ">_</text>USAHA</td>
            <td rowspan="2"><strong>JENIS<text style="color:#F7F7F7 ">_</text>SEKTOR</strong></td>
            <td rowspan="2"><strong> ALAMAT</strong></td>
			<tr>
            </tbody>
        @php(   $no = 1 {{-- buat nomor urut --}}  )
        {{-- loop all legalitas --}}
        @foreach ($lookup as $data)
<tr onclick="javascript:pilih(this)">
	            <td>{{ $no++ }}</td>
              <td>{{ $data->kd_klien }}</td>
            <td>{{ $data->nama_klien }}</td>
            <td>{{ $data->jenis_usaha}}</td>
            <td>{{ $data->jenis_sektor }}</td>
            <td>{{ $data->alamat }}</td>
</tr >
@endforeach
</table>
</body>
<script>
    function pilih(row){

        var kd_klien=row.cells[1].innerHTML;
        window.opener.parent.document.getElementById("kd_klien").value = kd_klien;

        var nama=row.cells[2].innerHTML;
        window.opener.parent.document.getElementById("nama_klien").value = nama;
        		
 window.close();
    }
</script>
