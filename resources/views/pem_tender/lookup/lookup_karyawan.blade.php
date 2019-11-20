<body>
    @include('partials/header3') 
          <div class="col-lg-12 bg-aqua" style="padding : 20px;">
                @include('alert.flash-message')
            <section class="panel">
                <div class="panel-heading bg-primary" style="margin-left:10px; margin-right: 10px; ">Add / Select</div>
                <div class="panel-body" style="margin-left:10px; margin-right: 10px; ">
    <table class="table table-bordered table-hover" style="font-size:12px; color: black;">
<td colspan="5">
  <form class="navbar-form" action="{{ url('/pem_tender/lookup/lookup_karyawan') }}" method="GET"  >
<input type="text" class="form-control" style="width: 100%" placeholder="Filter Nama.." name="nama" onChange="form.submit()" style="margin-top: 5px; margin-bottom: 5px;"></input>
</form>
</td>
    <tbody class="bg-info">
<tr>        <td rowspan="2" ><strong>ID.</strong></td>
            <td rowspan="2"><strong> NAMA</strong></td>
            <td rowspan="2"><strong> EMAIL PERUSAHAAN</strong></td>
            <td rowspan="2"><strong>DIVISI</strong></td>
            <td rowspan="2"><strong>JABATAN</strong></td>
            <tr>
    </tbody>
        {{-- loop all legalitas --}}
        @foreach ($lookup as $data)
<tr onclick="javascript:pilih(this)">
              <td>{{ $data->kode }}</td>
            <td>{{ $data->nama }}</td>
                        <td>{{ $data->email }}</td>
            <td>{{ $data->divisi }}</td>
             <td>{{ $data->jabatan }}</td>
            
</tr >
@endforeach
</table>
<script>
    function pilih(row){
        var kode=row.cells[0].innerHTML;
        window.opener.parent.document.getElementById("kode").value = kode;
        var nama=row.cells[1].innerHTML;
        window.opener.parent.document.getElementById("nama").value = nama;
        var email=row.cells[2].innerHTML;
        window.opener.parent.document.getElementById("email").value = email;
        var jabatan=row.cells[4].innerHTML;
        window.opener.parent.document.getElementById("jabatan").value = jabatan;
            
 window.close();
    }
</script>
