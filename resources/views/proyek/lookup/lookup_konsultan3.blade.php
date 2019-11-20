 <body>
    @include('partials/header3')
          <div class="col-lg-12 bg-aqua" style="padding : 20px;">
                @include('alert.flash-message')
            <section class="panel">
                <div class="panel-heading bg-primary" style="margin-left:10px; margin-right: 10px; ">Lookup Consultant</div>
                <div class="panel-body" style="margin-left:10px; margin-right: 10px; ">
    <table class="table table-bordered table-hover" style="font-size:12px; color: black;">
<td colspan="5">
  <form class="navbar-form" action="{{ url('/proyek/lookup/lookup_konsultan2') }}" method="GET"  >
<input type="text" class="form-control" style="width: 100%" placeholder="Filter Nama.." name="nama" onChange="form.submit()" style="margin-top: 5px; margin-bottom: 5px;"></input>
</form>
</td>
    <tbody class="bg-info">
<tr>    
            <td rowspan="2"><strong> Id</strong></td>
            <td rowspan="2"><strong> Nama</strong></td>
            <td rowspan="2"><strong> Email </strong></td>
            <tr>
    </tbody>
        @php(   $no = 1 {{-- buat nomor urut --}}  )
        {{-- loop all legalitas --}}
        @foreach ($lookup as $data)
<tr onclick="javascript:pilih(this)">
            <td>{{ $data->kode }}</td>
            <td>{{ $data->nama }}</td>
            <td>{{ $data->email }}</td>           
</tr >
@endforeach
<tr onclick="javascript:pilih(this)">
<td></td><td></td><td></td>
<tr>
</table>
<script>
    function pilih(row){

        var konsultan3=row.cells[0].innerHTML;
        window.opener.parent.document.getElementById("konsultan3").value = konsultan3;
        var nama_konsultan3=row.cells[1].innerHTML;
        window.opener.parent.document.getElementById("nama_konsultan3").value = nama_konsultan3;
        var email_konsultan3=row.cells[2].innerHTML;
        window.opener.parent.document.getElementById("email_konsultan3").value = email_konsultan3;    

 window.close();
    }
</script>
