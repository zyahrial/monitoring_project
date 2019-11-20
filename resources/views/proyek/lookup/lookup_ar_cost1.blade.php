<body>
    @include('partials/header3') 
          <div class="col-lg-12 bg-aqua" style="padding : 20px;">
                @include('alert.flash-message')
            <section class="panel">
                <div class="panel-heading bg-primary" >Budget Cost List</div>
                <div class="panel-body" style="margin-left:10px; margin-right: 10px; ">
 <table class="table table-bordered table-hover" style="font-size:12px; color: black;">
          <td colspan="6">
</td>
    <thead class="bg-aqua">
      <tr>
             <td rowspan="2" ><strong>NO</strong></td>
            <td rowspan="2" ><strong>KD COST</strong></td>
            <td rowspan="2"><strong>KEGIATAN</strong></td>
            <td rowspan="2"><strong>SUB KEGIATAN</strong></td>
            <td rowspan="2"><strong>ITEM BIAYA</strong></td>
                        <td rowspan="2"><strong>BIAYA</strong></td>
            <td rowspan="2"><strong>VOL</strong></td>
            <td rowspan="2"><strong>TAMBAHAN BIAYA</strong></td>
            <td rowspan="2"><strong>TOTAL BIAYA</strong></td>
            <td colspan="2"></td>
    </tr>
      <thead>
                  <tr>
        @php(   $no = 1 {{-- buat nomor urut --}}  )
        {{-- loop all legalitas --}}
        @foreach ($cost_approved as $datas)
          @php (@$cost = (number_format($datas->cost,0,",",".").""))
  @php (@$cost_extend = (number_format($datas->cost_extend,0,",",".").""))
@php( @$cost_total = ($datas->cost * $datas->volume) + $datas->cost_extend )
  @php (@$fcost_total = (number_format($cost_total,0,",",".").""))

<tr onclick="javascript:pilih(this)">
            <td>{{ $no++ }}</td>
            <td>{{ $datas->kd_cost }} </td>
            <td>{{ $datas->activity }} </td>
            <td>{{ $datas->sub_activity }} </td>
                                    <td>{{ $datas->cost_activity }} </td>
                                    <td>{{ $cost }} </td>
                                    <td>{{ $datas->volume }} </td>
            <td>{{ $cost_extend }} </td>
  <td class="bg-success"></i> {{ $fcost_total }}</td>
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

        var l_kd_cost1=row.cells[1].innerHTML;
        window.opener.parent.document.getElementById("l_kd_cost1").value = l_kd_cost1;

        var cost_activity1=row.cells[4].innerHTML;
        window.opener.parent.document.getElementById("cost_activity1").value = cost_activity1;

        var cost1=row.cells[5].innerHTML;
        window.opener.parent.document.getElementById("cost1").value = cost1;

        var volume1=row.cells[6].innerHTML;
        window.opener.parent.document.getElementById("volume1").value = volume1;

        var cost_extend1=row.cells[7].innerHTML;
        window.opener.parent.document.getElementById("cost_extend1").value = cost_extend1;

        var total_cost1=row.cells[8].innerHTML;
        window.opener.parent.document.getElementById("total_cost1").value = total_cost1;
    
    }
</script>
