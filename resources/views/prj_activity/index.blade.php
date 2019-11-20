<!DOCTYPE html>
<title>ACTIVITY</title>

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
                <div class="panel-heading bg-primary" style="margin-left:10px; margin-right: 10px; ">Add Activity</div>
                <div class="panel-body" style="margin-left:10px; margin-right: 10px; ">
               <form action="{{ URL('activity/store') }}" method="post" class="form" align="left"> 
              {{ csrf_field() }}      
                  <div class="form-group">

                    <label for="exampleInputEmail1">Activity :</label>
                     <input type="text" class="form-control" name="activity" id="activity" placeholder="">
                     <label for="exampleInputEmail1">Sub Activity :</label>
                    <input type="text" class="form-control" name="sub_activity" id="sub_activity" placeholder="">
                    <label for="exampleInputEmail1">Cost Activity :</label>
                    <input type="text" class="form-control" name="cost_activity" id="cost_activity" placeholder="">
                  </div>
                  <button type="submit" class="btn btn-sm btn-raised btn-primary">Save</button>
                </form>
</div>
<br>
                <div class="panel-heading bg-primary" style="margin-left:10px; margin-right: 10px; ">Select Activity</div>
                <div class="panel-body" style="margin-left:10px; margin-right: 10px; ">
<table class="table table-bordered table-hover" style="font-size:12px; color: black;">
    <tbody>
      <tr>
            <td rowspan="2" ><strong></strong></td>
                        <td rowspan="2"><strong>ID ACTIVITY</strong></td>
            <td rowspan="2"><strong>ACTIVITY</strong></td>
            <td rowspan="2"><strong>SUB ACTIVITY</strong></td>

            <td colspan="2"></th>
            <tr>
        @php(   $no = 1 {{-- buat nomor urut --}}  )
        {{-- loop all legalitas --}}
        @foreach ($data as $datas)
<tr onclick="javascript:pilih(this)">
<td>{{ $no++ }}</td>
            <td>{{ $datas->kd_activity }} </td>
            <td>{{ $datas->activity }} </td>
            <td>{{ $datas->sub_activity }}</td>
            <td align="center"><a href="{{ URL('activity') }}/{{ $datas->kd_activity }}" >
        <button class="btn btn-sm btn-raised btn-info" onclick="return" title="Ubah" style="margin-bottom: 5px;" confirm('Yakin mau ubah data ?')"  type="submit">
          <i class="fa fa-edit"></i></button></a></td>
<td align="center">
        @if(checkPermission(['superadmin']))
        <form action="{{action('Prj_activityController@destroy', $datas['kd_activity'])}}" method="post">
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
<!-- jQuery 3 -->
    <script>  function open_child(url,title,w,h){
        var left = (screen.width/2)-(w/2);
        var top = (screen.height/2)-(h/2);
        w = window.open(url, title, 'toolbar=no, location=no, directories=no, \n\
        status=no, menubar=no, scrollbar=no, resizabel=no, copyhistory=no,\n\
        width='+w+',height='+h+',top='+top+',left='+left);
    };
  </script>

