<body>
         @include('partials/header3')
    @include('alert.flash-message')
    <div class="row">
          <div class="col-lg-6">
            <section class="panel">
        <header class="bg-primary"> 
                TAMBAH BAGIAN CONTACT PERSON - ADMINISTRASI
              </header>
                             <div class="panel-body" style="margin-left:20px; margin-right: 20px; ">
               <form action="{{ URL('klien/store_adm_bagian') }}" method="post" class="form" align="left"> 
              {{ csrf_field() }}      
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Bagian</label>
                    <input type="text" class="form-control" name="nama_bagian" id="nama_bagian" placeholder="">
                  </div>
                  <button type="submit" class="btn btn-sm btn-raised btn-primary">SIMPAN</button>
                </form>
              </div>
<br>
                             <div class="panel-body" style="margin-left:20px; margin-right: 20px; ">
<table class="table table-bordered table-hover" style="font-size:12px; color: black;">
    <tbody>
      <tr>
            <td rowspan="2" ><strong>NO</strong></td>
            <td rowspan="2"><strong>NAMA BAGIAN</strong></td>
              <td colspan="2"></th>
            <tr>
        @php(   $no = 1 {{-- buat nomor urut --}}  )
        {{-- loop all legalitas --}}
        @foreach ($lookup as $data)
<tr onclick="javascript:pilih(this)">
<td>{{ $no++ }}</td>
            <td>{{ $data->nama_bagian }} </td>
<td align="center">
        @if(checkPermission(['superadmin']))
        <form action="{{action('LookupController@destroy_adm', $data['id'])}}" method="post">
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