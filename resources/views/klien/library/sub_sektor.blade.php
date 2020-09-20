   <body>
               @include('partials/header3')
    @include('alert.flash-message')
    <div class="row">
          <div class="col-lg-6">
            <section class="panel">
             <header class="bg-primary"> Tambah Sub Sektor</header>
      <div class="panel-body" style="margin-left:10px; margin-right: 10px; ">
               <form action="{{ URL('klien/store_sub_sektor') }}" method="post" class="form" align="left"> 
              {{ csrf_field() }}      
                  <div class="form-group">
                    <label for="exampleInputEmail1">Sub Sektor</label>
                    <input type="text" class="form-control" name="sub_sektor" id="sub_sektor" placeholder="">
                  </div>
                  <button type="submit" class="btn btn-sm btn-raised btn-primary">Simpan</button>
                </form>
      </div>
               <header class="bg-primary">Pilih Sub Sektor</header>
      <div class="panel-body" style="margin-left:10px; margin-right: 10px; ">       
<table class="table table-bordered table-hover" style="font-size:12px; color: black;">
    <tbody>
      <tr>
         <td rowspan="2"><strong>NO.</strong></td>
            <td rowspan="2"><strong>NAMA SUB SEKTOR</strong></td>
              <td colspan="2"></td>
            <tr>
        @php(   $no = 1 {{-- buat nomor urut --}}  )
        {{-- loop all legalitas --}}
        @foreach ($lookup as $data)
<tr onclick="javascript:pilih(this)">
  <td>{{ $no++ }}</td>
    <td>{{ $data->sub_sektor }}</td>
    <td align="center"><button class="btn btn-sm btn-raised btn-info" onclick="window.close();" style="color: white;">
                <i class="fa fa-check" aria-hidden="true" ></i></button> </td>
  <td align="center">
        @if(checkPermission(['superadmin']))
        <form action="{{action('LookupController@destroy_sub_sektor', $data['id'])}}" method="post">
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
 </div>
 </div>
            </section>
          </div>
</body>
<script>
    function pilih(row){

        var sub_sektor=row.cells[1].innerHTML;
        window.opener.parent.document.getElementById("sub_sektor").value = sub_sektor;
    }
</script>