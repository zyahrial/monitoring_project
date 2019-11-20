<body>
    @include('partials/header3') 
          <div class="col-lg-12 bg-aqua" style="padding : 20px;">
                @include('alert.flash-message')
            <section class="panel">
                <div class="panel-heading bg-primary" style="margin-left:10px; margin-right: 10px; ">Daftar Activity</div>
                <div class="panel-body" style="margin-left:10px; margin-right: 10px; ">
              <table class="table table-bordered table-hover" style="background-color: white; font-size: 12px;">
          <td colspan="6">
            <form class="navbar-form" action="{{ url('/add_ib/lookup_activity') }}" method="GET"  >
</form>
</td>
    <tbody>
      <tr>
            <td rowspan="2" ><strong>ID IB</strong></td>
            <td rowspan="2"><strong>KEGIATAN</strong></td>
            <td rowspan="2"><strong>SUB KEGIATAN</strong></td>

            <th></th>
            <tr>
        @php(   $no = 1 {{-- buat nomor urut --}}  )
        {{-- loop all legalitas --}}
        @foreach ($data as $datas)
<tr onclick="javascript:pilih(this)">
            <td>{{ $datas->kode_ib }} </td>
            <td>{{ $datas->activity }} </td>
            <td>{{ $datas->sub_activity }}</td>
        <td align="center"><button class="btn btn-sm btn-raised btn-info" onclick="window.close();" style="color: white;">
                <i class="fa fa-check" aria-hidden="true" ></i></button> </td>
</tr>
@endforeach
    </tbody>
</table>
              </div>
            </section>
          </div>
</body>
<script>
    function pilih(row){

        var l_kode_ib=row.cells[0].innerHTML;
        window.opener.parent.document.getElementById("l_kode_ib").value = l_kode_ib;

        var l_activity=row.cells[1].innerHTML;
        window.opener.parent.document.getElementById("l_activity").value = l_activity;

        var l_sub_activity=row.cells[2].innerHTML;
        window.opener.parent.document.getElementById("l_sub_activity").value = l_sub_activity;
    
    }
</script>
