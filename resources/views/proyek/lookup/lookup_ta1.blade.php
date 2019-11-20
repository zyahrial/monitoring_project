<body>
    @include('partials/header3') 
          <div class="col-lg-12 bg-aqua" style="padding : 20px;">
                @include('alert.flash-message')
            <section class="panel">
                <div class="panel-heading bg-primary" style="margin-left:10px; margin-right: 10px; ">Add / Select</div>
                <div class="panel-body" style="margin-left:10px; margin-right: 10px; ">
    <table class="table table-bordered table-hover" style="font-size:12px; color: black;">
<td colspan="5">
  <form class="navbar-form" action="{{ url('/proyek/lookup/lookup_ta1/') }}" method="GET"  >
<input type="text" class="form-control" style="width: 100%" placeholder="Filter Nama.." name="nama" onChange="form.submit()" style="margin-top: 5px; margin-bottom: 5px;"></input>
</form>
</td>
    <tbody class="bg-info">
<tr>        <td rowspan="2" ><strong>KODE</strong></td>
            <td rowspan="2"><strong> NAME</strong></td>
            <td rowspan="2"><strong> EMAIL </strong></td>
            <td rowspan="2"><strong>STATUS</strong></td>
            <tr>
    </tbody>
        @php(   $no = 1 {{-- buat nomor urut --}}  )
        {{-- loop all legalitas --}}
        @foreach ($lookup as $data)
<tr onclick="javascript:pilih(this)">
              <td>{{ $data->kd_ta }}</td>
            <td>{{ $data->nama }}</td>
                        <td>{{ $data->email }}</td>
            <td>{{ $data->status }}</td>
            
</tr >
@endforeach
<tr onclick="javascript:pilih(this)">
<td></td><td></td><td></td>
<tr>
</table>
<script>
    function pilih(row){

        var ta1=row.cells[0].innerHTML;
        window.opener.parent.document.getElementById("ta1").value = ta1;
        var nama_ta1=row.cells[1].innerHTML;
        window.opener.parent.document.getElementById("nama_ta1").value = nama_ta1;
var email_ta1=row.cells[2].innerHTML;
        window.opener.parent.document.getElementById("email_ta1").value = email_ta1;            
 window.close();
    }
</script>
