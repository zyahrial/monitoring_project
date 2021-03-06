<body>
    @include('partials/header3') 
          <div class="col-lg-12 bg-aqua" style="padding : 20px;">
                @include('alert.flash-message')
            <section class="panel">
                <div class="panel-heading bg-primary" style="margin-left:10px; margin-right: 10px; ">Add / Select</div>
                <div class="panel-body" style="margin-left:10px; margin-right: 10px; ">
               <form action="{{ URL('pem_tender/store_jasa') }}" method="post" class="form" align="left"> 
              {{ csrf_field() }}      
                  <div class="form-group">

                    <label for="exampleInputEmail1">Kelompok Jasa :</label>
                     <input type="text" class="form-control" name="kelompok_jasa" id="kelompok_jasa" placeholder="">
                     <label for="exampleInputEmail1">Sub Jasa :</label>
                    <input type="text" class="form-control" name="sub_jasa" id="sub_jasa" placeholder="">
                  </div>
                  <button type="submit" class="btn btn-sm btn-raised btn-primary">Simpan</button>
                </form>
</div>
<br>
                <div class="panel-body" style="margin-left:10px; margin-right: 10px; ">
    <table class="table table-bordered table-hover" style="font-size:12px; color: black;">
    <tbody>
      <tr>
            <td rowspan="2" ><strong></strong></td>
            <td rowspan="2"><strong>KELOMPOK JASA</strong></td>
            <td rowspan="2"><strong>SUB JASA</strong></td>
              <td colspan="2"></th>
            <tr>
        @php(   $no = 1 {{-- buat nomor urut --}}  )
        {{-- loop all legalitas --}}
        @foreach ($lookup as $data)
<tr onclick="javascript:pilih(this)">
<td>{{ $no++ }}</td>
            <td>{{ $data->kelompok_jasa }} </td>
            <td>{{ $data->sub_jasa }}</td>
            <td align="center"><button class="btn btn-sm btn-raised btn-info" onclick="window.close();" style="color: white;">
            <i class="fa fa-check" aria-hidden="true" ></i> </button> </td>
<td>
        @if(checkPermission(['superadmin']))
        <form action="{{action('LookupController@destroy_jasa', $data['kd_jasa'])}}" method="post">
         {{ csrf_field() }}
        <input name="_method" type="hidden" value="PATCH">
        <button class="btn btn-sm btn-raised btn-danger" title="Hapus" onclick="return confirm('Yakin mau hapus data ?')" type="submit">
        <i class="fa fa-trash-o"></i> 
        </button>
        </form>
        @endif
</td>
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

        var kelompok_jasa=row.cells[1].innerHTML;
        window.opener.parent.document.getElementById("kelompok_jasa").value = kelompok_jasa;

        var sub_jasa=row.cells[2].innerHTML;
        window.opener.parent.document.getElementById("sub_jasa").value = sub_jasa;
            
    }
</script>
