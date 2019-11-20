<body>
    @include('partials/header3') 
          <div class="col-lg-12 bg-aqua" style="padding : 20px;">
                @include('alert.flash-message')
            <section class="panel">
                <div class="panel-heading bg-primary" style="margin-left:10px; margin-right: 10px; ">Add / Select</div>
                <div class="panel-body" style="margin-left:10px; margin-right: 10px; ">
    <table class="table table-bordered table-hover" style="font-size:12px; color: black;">
    <tbody>
      <tr>
            <td rowspan="2" ><strong>KD IB</strong></td>
            <td rowspan="2" hidden="hidden"><strong>KD PRJ</strong></td>
            <td rowspan="2" hidden="hidden"><strong>KD ACT</strong></td>
            <td rowspan="2"><strong>KEGIATAN</strong></td>
            <td rowspan="2"><strong>SUB KEGIATAN</strong></td>
            <td rowspan="2" style="width: 10%;"><strong>DUE<text style="color: white;">_</text>DATE</strong></td>

            <th></th>
            <tr>
        @php(   $no = 1 {{-- buat nomor urut --}}  )
        {{-- loop all legalitas --}}
        @foreach ($data as $datas)
<tr onclick="javascript:pilih(this)">
            <td>{{ $datas->kode_ib }} </td>
            <td hidden="hidden">{{ $datas->kd_proyek }} </td>
            <td hidden="hidden">{{ $datas->kd_activity}} </td>
            <td>{{ $datas->activity }} </td>
            <td>{{ $datas->sub_activity }}</td>
            <td>{{ $datas->date }}</td>
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

        var kd_activity=row.cells[0].innerHTML;
        window.opener.parent.document.getElementById("kode_ib").value = kd_activity;

        var kd_proyek=row.cells[1].innerHTML;
        window.opener.parent.document.getElementById("kd_proyek").value = kd_proyek;

        var kd_activity=row.cells[2].innerHTML;
        window.opener.parent.document.getElementById("kd_activity").value = kd_activity;

        var activity=row.cells[3].innerHTML;
        window.opener.parent.document.getElementById("activity").value = activity;

        var sub_activity=row.cells[4].innerHTML;
        window.opener.parent.document.getElementById("sub_activity").value = sub_activity;

        var date=row.cells[5].innerHTML;
        window.opener.parent.document.getElementById("date").value = date;
    
    }
</script>
