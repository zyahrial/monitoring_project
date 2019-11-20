<body>
    @include('partials/header3') 
          <div class="col-lg-12 bg-aqua" style="padding : 20px;">
                @include('alert.flash-message')
            <section class="panel">
                <div class="panel-heading bg-primary" style="margin-left:10px; margin-right: 10px; ">Add / Select</div>
                <div class="panel-body" style="margin-left:10px; margin-right: 10px; ">
<form class="navbar-form" action="{{ url('/pem_tender/lookup/lookup_karyawan') }}" method="GET"  >
<input type="text" class="form-control" placeholder="Cari Karyawan.." name="nama" onChange="form.submit()" style="margin-top: 5px; margin-bottom: 5px; margin-left: 20px;"></input>
</form>
    <table class="table table-bordered table-hover" style="font-size:12px; color: black;">
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
