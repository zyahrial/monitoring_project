  <body>
           @include('partials/header3')
    @include('alert.flash-message')
    <div class="row">
          <div style="padding: 10px;">
            <section class="panel">
              <header class="bg-primary" style="padding: 10px">
Daftar Biaya
              </header>
              <div class="panel-body" style="margin-left:20px; margin-right: 20px; ">
               <form action="{{ URL('/proyek/store_lib_cost/') }}" method="post" class="form" align="left"> 
              {{ csrf_field() }}      
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tambah Biaya</labael>
                    <input type="text" class="form-control" name="cost_activity" id="cost_activity" placeholder="">
                  </div>
                  <button type="submit" class="btn btn-sm btn-raised btn-primary">Simpan</button>
                </form>
              </div>
<br>
                <div class="panel-body" style="margin-left:10px; margin-right: 10px; ">
    <table class="table table-bordered table-hover" style="font-size:12px; color: black;">
<td colspan="5">
  <form class="navbar-form" action="{{ url('/proyek/lib/lib_cost_activity') }}" method="GET"  >
<input type="text" class="form-control" style="width: 100%" placeholder="Filter.." name="cost_activity" onChange="form.submit()" style="margin-top: 5px; margin-bottom: 5px;"></input>
</form>
</td>
<tbody class="bg-info">
<tr>
            <td rowspan="2"><strong>No.</strong></td>    
            <td rowspan="2"><strong>Biaya</strong></td>
            <tr>
    </tbody>
        @php(   $no = 1 {{-- buat nomor urut --}}  )
        {{-- loop all legalitas --}}
@foreach ($datas as $data)
<tr onclick="javascript:pilih(this)">
              <td>{{ $no++ }}</td>
            <td>{{ $data->cost_activity }}</td>
</tr >
 @endforeach           
</table>
<script>
    function pilih(row){

        var cost_activity=row.cells[1].innerHTML;
        window.opener.parent.document.getElementById("cost_activity").value = cost_activity;
                 
 window.close();
    }
</script>
</body>