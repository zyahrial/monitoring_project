<!DOCTYPE html>
<title>USER SETTING</title>

<html>
  <!-- Bootstrap CSS -->
  <link href="/NiceAdmin/css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="/NiceAdmin/css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="/NiceAdmin/css/elegant-icons-style.css" rel="stylesheet" />
  <link href="/NiceAdmin/css/font-awesome.min.css" rel="stylesheet" />
  <link href="/NiceAdmin/css/daterangepicker.css" rel="stylesheet" />
  <link href="/NiceAdmin/css/bootstrap-datepicker.css" rel="stylesheet" />
  <link href="/NiceAdmin/css/bootstrap-colorpicker.css" rel="stylesheet" />
  <!-- date picker -->

  <!-- color picker -->

  <!-- Custom styles -->
  <link href="/NiceAdmin/css/style.css" rel="stylesheet">
  <link href="/NiceAdmin/css/style-responsive.css" rel="stylesheet" />
@include('partials/header')
@include('partials/sidebar')
<body>
      <section id="main-content">
      <section class="wrapper" >
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
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                User Setting
              </header>
              <br>
                      @if(checkPermission(['superadmin','admin']))
             <div class="panel-heading" style="margin-left:10px; margin-right: 10px; ">Tambah
                             </div>
                <div class="panel-body" style="margin-left:10px; margin-right: 10px; ">
               <form action="{{ URL('user/store') }}" method="post" class="form" align="left"> 
              {{ csrf_field() }}      
                  <div class="form-group">
                    <label for="exampleInputEmail1">NAMA :</label>
                    <div class='input-group date' >
                     <input type="text" class="form-control" autocomplete="off" readonly name="name" id="nama" readonly>
<span class="input-group-addon" onclick="open_child('/pem_tender/lookup/lookup_karyawan','Look Up','800','500'); return false;">
<i class="fa fa-user"></i></span>
</div>
                     <label for="exampleInputEmail1">EMAIL :</label>
                    <input type="email" class="form-control" name="email" readonly autocomplete="off" id="email" placeholder="">
                    <label for="exampleInputEmail1">ROLE :</label>
          <select  name="is_permission" class="form-control" >
            <option value="" style="background-color: silver;">-SELECT ROLE-</option>
            <option value="0" >USER</option>
            <option value="1" >ADMIN</option>
            @if(checkPermission(['superadmin']))
            <option value="2" >SUPERADMIN</option>
            @endif
          </select>                    
                     <label for="exampleInputEmail1">PASSWORD :</label>
                    <input type="password" class="form-control" name="password" autocomplete="off" id="password"
                     placeholder="">
                  </div>
                  <button type="submit" class="btn btn-sm btn-raised btn-primary">Simpan</button>
                </form>
              </div>
              @endif
<br>
             <div class="panel-heading" style="margin-left:10px; margin-right: 10px; ">
                             </div>
                <div class="panel-body" style="margin-left:10px; margin-right: 10px; ">
<table class="table table-bordered table-hover" style="font-size:12px; color: black;">
    <tbody>
      <tr>
        <td><strong>NO</strong></td>
            <td  rowspan="2"><strong>NAMA</strong></td>
            <td  rowspan="2"><strong>ROLE</strong></td>
            <td  rowspan="2"><strong>EMAIL</strong></td>
            <tr>
        @php(   $no = 1 {{-- buat nomor urut --}}  )
        {{-- loop all legalitas --}}
        @foreach ($user as $data)
<tr >
            <td>{{$no++}}</td>
            <td >{{ $data->name }} </td>
            @if ($data->is_permission == '2')
@php ($role = "SUPERADMIN")
            @elseif ($data->is_permission == '1')
@php ($role = "ADMIN")
            @else
@php ($role = "USER")
            @endif
            <td>{{ $role }}</td>
            <td >{{ $data->email }}</td>
      @if ($data->is_permission == '2' and checkPermission(['admin']) )
             <td align="center"><button class="btn btn-sm btn-raised btn-warning"><i class="fa fa-warning"></i>
             </button></td>
      @else
<td align="center">
          <a href="{{ URL('user/show') }}/{{ $data->id }}" >
        <button class="btn btn-sm btn-raised btn-info" onclick="return" title="Ubah" style="margin-bottom: 5px;" confirm('Yakin mau ubah data ?')"  type="submit">
          <i class="fa fa-edit"></i></button></a>
</td>
@endif
           @if(checkPermission(['superadmin']))
<td align="center">
        <form action="{{action('UserController@destroy', $data['id'])}}" method="post">
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
