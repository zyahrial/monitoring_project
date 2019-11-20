<body>
    @include('partials/header3') 
          <div class="col-lg-12 bg-aqua" style="padding : 20px;">
                @include('alert.flash-message')
            <section class="panel">
                <div class="panel-heading bg-primary" style="margin-left:10px; margin-right: 10px; ">Add / Select</div>
                <div class="panel-body" style="margin-left:10px; margin-right: 10px; ">
<form class="navbar-form" action="{{ url('/rekanan/lookup/lookup_klien') }}" method="GET"  >
<input type="text" class="form-control" placeholder="Cari KLien.." name="nama_klien" onChange="form.submit()" style="margin-top: 5px; margin-bottom: 5px; margin-left: 20px;"></input>
</form>
    <table class="table table-bordered table-hover" style="font-size:12px; color: black;">
    <tbody>
        <tr >
      <tr>
            <th rowspan="2" ><strong>No.</strong></td>
            <th rowspan="2" ><strong>KODE KLIEN</strong></td>
            <th rowspan="2"><strong> NAMA KLIEN</strong></td>
            <tr>
        @php(   $no = 1 {{-- buat nomor urut --}}  )
        {{-- loop all legalitas --}}
        @foreach ($lookup as $data)
<tr onclick="javascript:pilih(this)">
              <td>{{ $no++ }}</td>
              <td>{{ $data->kd_klien }}</td>
            <td>{{ $data->nama_klien }}</td>
            
</tr >
@endforeach
    </tbody>
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
