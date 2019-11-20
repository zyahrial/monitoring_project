<!DOCTYPE html>
<title>LIBRARY JASA</title>

<body class="hold-transition skin-blue sidebar-mini">
      <section class="wrapper">
        @include('partials/header2')
          @include('partials.sidebar')
  <div class="content-wrapper">
    <section class="content">
           @if (count($errors) > 0)
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
    <div class="row">
            @include('alert.flash-message')
          <div class="col-lg-12">
            <section class="panel">
                <div class="panel-heading bg-primary" style="margin-left:10px; margin-right: 10px; ">Tambah Jasa</div>
                <div class="panel-body" style="margin-left:10px; margin-right: 10px; ">
               <form action="{{ URL('jasa/store') }}" method="post" class="form" align="left"> 
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
<table id="example1" class="table table-bordered table-striped" style="background-color: white; color: black; padding-top: 30px;">
<thead class="bg-aqua">
      <tr>
            <td rowspan="2" ><strong></strong></td>
            <td rowspan="2"><strong>KELOMPOK JASA</strong></td>
            <td rowspan="2"><strong>SUB JASA</strong></td>
              <td colspan="2"></th>
</thead>
            <tr>
        @php(   $no = 1 {{-- buat nomor urut --}}  )
        {{-- loop all legalitas --}}
        @foreach ($data as $datas)
<tr onclick="javascript:pilih(this)">
<td>{{ $no++ }}</td>
            <td>{{ $datas->kelompok_jasa }} </td>
            <td>{{ $datas->sub_jasa }}</td>
            <td align="center"><a href="{{ URL('jasa') }}/{{ $datas->kd_jasa }}" >
        <button class="btn btn-sm btn-raised btn-info" onclick="return" title="Ubah" style="margin-bottom: 5px;" onclick="return confirm('Yakin mau ubah data ?')"  type="submit">
          <i class="fa fa-edit"></i></button></a></td>
<td>
        @if(checkPermission(['superadmin']))
        <form action="{{action('JasaController@destroy', $datas['kd_jasa'])}}" method="post">
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
            <div>
                  <ul class="pagination pagination-sm pull-left">
                    {{ $data->fragment('foo')->links() }}
                  </ul>
                </div>
              </div>
            </section>
          </div>
</body>
<!-- jQuery 3 -->
    <script>  function open_child(url,title,w,h){
        var left = (screen.width/2)-(w/2);
        var top = (screen.height/2)-(h/2);
        w = window.open(url, title, 'toolbar=no, location=no, directories=no, \n\
        status=no, menubar=no, scrollbar=no, resizabel=no, copyhistory=no,\n\
        width='+w+',height='+h+',top='+top+',left='+left);
    };
  </script>

