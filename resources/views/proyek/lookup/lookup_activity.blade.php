<body>
    @include('partials/header3') 
          <div class="col-lg-12 bg-aqua" style="padding : 20px;">
                @include('alert.flash-message')
            <section class="panel">
                <div class="panel-heading bg-primary" style="margin-left:10px; margin-right: 10px; ">Add / Select</div>
                <div class="panel-body" style="margin-left:10px; margin-right: 10px; ">
               <form action="{{ URL('/add_ib/lookup_activity/store') }}" method="post" class="form" align="left"> 
              {{ csrf_field() }}      
                  <div class="form-group">
                    <label for="exampleInputEmail1">KEGIATAN :</label>
                     <input type="text" class="form-control" name="activity" id="activity" placeholder="Activity">
                     <label for="exampleInputEmail1">SUB KEGIATAN :</label>
                    <input type="text" class="form-control" name="sub_activity" id="sub_activity" placeholder="Sub Activity">
                  </div>
                  <button type="submit" class="btn btn-sm btn-raised btn-primary">Save</button>
                </form>
</div>
                <div class="panel-heading bg-primary" style="margin-left:10px; margin-right: 10px; ">Pilih Kegiatan</div>

    <table class="table table-bordered table-hover" style="font-size:12px; color: black;">
          <td colspan="6">
            <form class="navbar-form" action="{{ url('/add_ib/lookup_activity') }}" method="GET"  >
<input type="text" class="form-control" placeholder="Filter.." name="activity" onChange="form.submit()" style="width: 100%"></input>
</form>
</td>
    <tbody>
      <tr>
            <td rowspan="2"><strong>KODE</strong></td>
            <td rowspan="2"><strong>ACTIVITY</strong></td>
            <td rowspan="2"><strong>SUB ACTIVITY</strong></td>

            <th></th>
            <tr>
        @php(   $no = 1 {{-- buat nomor urut --}}  )
        {{-- loop all legalitas --}}
        @foreach ($data as $datas)
<tr onclick="javascript:pilih(this)">
            <td>{{ $datas->kd_activity }} </td>
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

        var kelompok_jasa=row.cells[0].innerHTML;
        window.opener.parent.document.getElementById("kd_activity").value = kelompok_jasa;

        var kelompok_jasa=row.cells[1].innerHTML;
        window.opener.parent.document.getElementById("activity").value = kelompok_jasa;

        var sub_jasa=row.cells[2].innerHTML;
        window.opener.parent.document.getElementById("sub_activity").value = sub_jasa;

    
    }
</script>
