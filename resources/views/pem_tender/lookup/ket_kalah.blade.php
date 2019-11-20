<body>
    @include('partials/header3')
    @include('alert.flash-message')
          <div class="col-lg-6">
            <section class="panel">

                              <div class="panel-body" style="margin-left:10px; margin-right: 10px; ">
               <form action="{{ URL('pem_tender/lookup/store_ket_kalah') }}" method="post" class="form" align="left"> 
              {{ csrf_field() }}      
                  <div class="form-group">
                    <label for="exampleInputEmail1">Keterangan</label>
                    <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="">
                  </div>
                  <button type="submit" class="btn btn-sm btn-raised btn-primary">Tambah</button>
                </form>
                      <header class="bg-primary"> 
              </header>            
<table class="table table-bordered table-hover" style="font-size:14px; color: black;">
    <tbody>
            <tr>
        @php(   $no = 1 {{-- buat nomor urut --}}  )
        {{-- loop all legalitas --}}
        @foreach ($lookup as $data)
<tr onclick="javascript:pilih(this)">
  <td>{{ $no++ }}</td>
  <td>{{ $data->keterangan }}</td>
  <td align="center"><button class="btn btn-sm btn-raised btn-info" onclick="window.close();" style="color: white;">
                <i class="fa fa-check" aria-hidden="true" ></i> </button> </td>
  <td align="center">
        @if(checkPermission(['superadmin']))
        <form action="{{action('LookupController@destroy_ket_kalah', $data['id'])}}" method="post">
         {{ csrf_field() }}
        <input name="_method" type="hidden" value="PATCH">
        <button class="btn btn-sm btn-raised btn-danger" title="Hapus" onclick="return confirm('Yakin mau hapus data ?')" type="submit">
        <i class="fa fa-trash-o" ></i>
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
            </section>
          </div>
</body>
<script>
    function pilih(row){

        var ket_kalah=row.cells[1].innerHTML;
        window.opener.parent.document.getElementById("ket_kalah").value = ket_kalah;            
    }
</script>