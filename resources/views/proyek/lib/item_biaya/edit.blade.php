<!DOCTYPE html>
<title>UPDATE ITEM BIAYA</title>

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
                <div class="panel-heading bg-primary" style="margin-left:10px; margin-right: 10px; ">Tambah Item Biaya</div>
@foreach ( $edit as $dta)
                <div class="panel-body" style="margin-left:10px; margin-right: 10px; ">
<form action="{{ action('Prj_ibController@update_lib_item_biaya', $dta->kd_cost) }}"  method="post" enctype="multipart/form-data">
{{ csrf_field() }}     
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kode</labael>
  <input readonly="readonly" type="text" class="form-control" name="kd_cost" id="kd_cost" value="{{ $dta->kd_cost}}">
  <br>
                      <label for="exampleInputEmail1">Item Biaya</labael>
     <input type="text" class="form-control" name="cost_activity" id="cost_activity" value="{{ $dta->cost_activity}}">
                  </div>
                  <button type="submit" class="btn btn-sm btn-raised btn-primary">Simpan</button>
                </form>
@endforeach
</div>
<div class="panel-body" style="margin-left:10px; margin-right: 10px; ">
<table class="table table-bordered table-striped" style="font-size:12px; color: black;">
<thead class="bg-aqua">
<tr>
            <td rowspan="2"><strong>No.</strong></td> 
            <td rowspan="2"><strong>Id.</strong></td>    
  
            <td rowspan="2"><strong>Item Biaya</strong></td>
            <tr>
</thead>
    </tbody>
        @php(   $no = 1 {{-- buat nomor urut --}}  )
        {{-- loop all legalitas --}}
@foreach ($datas as $data)
<tr>
              <td>{{ $no++ }}</td>
                          <td>{{ $data->kd_cost }}</td>
            <td>{{ $data->cost_activity }}</td>
<td align="center"><a href="{{ URL('/ib/lib/update') }}/{{ $data->kd_cost }}" >
        <button class="btn btn-sm btn-raised btn-info" onclick="return" title="Ubah" style="margin-bottom: 5px;" onclick="return confirm('Yakin mau ubah data ?')"  type="submit">
          <i class="fa fa-edit"></i></button></a></td>
<td>
        @if(checkPermission(['superadmin']))
        <form action="{{action('Prj_ibController@destroy_lib_item_biaya', $data['kd_cost'])}}" method="post">
         {{ csrf_field() }}
        <input name="_method" type="hidden" value="PATCH">
        <button class="btn btn-sm btn-raised btn-danger" title="Hapus" onclick="return confirm('Yakin mau hapus data ?')" type="submit">
        <i class="fa fa-trash-o"></i> 
        </button>
        </form>
        @endif
</td>
 @endforeach           
</table>
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

