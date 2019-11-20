<body>
    @include('partials/header3') 
          <div class="col-lg-12 bg-aqua" style="padding : 20px;">
                @include('alert.flash-message')
            <section class="panel">
                <div class="panel-heading bg-primary" style="margin-left:10px; margin-right: 10px; ">Add / Select</div>
                <div class="panel-body" style="margin-left:10px; margin-right: 10px; ">
               <form action="{{ URL('pem_tender/lookup/store_ket_kalah') }}" method="post" class="form" align="left"> 
              {{ csrf_field() }}      
                  <div class="form-group">
                    <label for="exampleInputEmail1">Keterangan</label>
                    <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="">
                  </div>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </form>           
    <table class="table table-bordered table-hover" style="font-size:12px; color: black;">
    <tbody>
      <tr>
         <th rowspan="2"><strong>NO.</strong></td>
            <th rowspan="2"><strong>KETERANGAN KALAH</strong></td>
            <tr>
        @php(   $no = 1 {{-- buat nomor urut --}}  )
        {{-- loop all legalitas --}}
        @foreach ($lookup as $data)
<tr onclick="javascript:pilih(this)">
  <td>{{ $no++ }}</td>
            <td>{{ $data->keterangan }}</td>
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
            
 window.close();
    }
</script>