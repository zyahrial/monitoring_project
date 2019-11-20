<body>
    @include('partials/header3') 
          <div class="col-lg-12 bg-aqua" style="padding : 20px;">
                @include('alert.flash-message')
            <section class="panel">
                <div class="panel-heading bg-primary" style="margin-left:10px; margin-right: 10px; ">Add / Select</div>
                <div class="panel-body" style="margin-left:10px; margin-right: 10px; ">
    <table class="table table-bordered table-hover" style="font-size:12px; color: black;">
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
