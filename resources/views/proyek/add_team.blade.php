<!DOCTYPE html>
<title>MANAGE PERSONIL</title>

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
                      @foreach ($proyek as $data)
                  <div class="box-body" style="text-align: left;">
            <a href="{{ URL('/proyek/detail/') }}/{{ $data->kd_proyek }}" class="btn btn-app" >
                <i class="fa fa-arrow-circle-left" title="BACK TO BASE" style="font-size: 32px;"></i> </a>
                          </div>
                <div class="panel-heading bg-primary" style="margin-left:10px; margin-right: 10px; ">Add Personnel</div>
<div class="panel-body" style="padding-left:20px; padding-right: 20px; width: 100%;">
<form action="{{ action('PrjController@update_personil', $data->kd_proyek) }}"  method="post" enctype="multipart/form-data" class="form" align="left"> 
{{ csrf_field() }} 
<input name="_method" type="hidden" value="PATCH">        
                  <div  style="width: 40%;">
                     <label for="exampleInputEmail1">KD PROYEK :</label>
<input type="text" class="form-control" name="kd_proyek" id="kd_proyek" value="{{ $data->kd_proyek}}" readonly="readonly">
<label for="exampleInputEmail1">PROJECT MANAGER :<span style="color: red; font-size: 24px;">*</span></label>
<div class='input-group date' style="margin-top: 5px;">
     @foreach ($data_pm as $datas)
@php (@$id_pm = $datas->kode)
@php (@$nama_pm = $datas->nama)
@php (@$email_pm = $datas->email)
    @endforeach
<input type="text" class="form-control" name="pm" id="pm" autocomplete="off" readonly="readonly" value="{{ @$id_pm }}">
<input type="text" class="form-control" id="pm_name"  autocomplete="off" readonly="readonly" value="{{ @$nama_pm }}">
<input type="text" class="form-control"  id="pm_email" readonly="readonly" value="{{ @$email_pm }}">
<span class="input-group-addon" onclick="open_child('/proyek/lookup/lookup_pm','Look Up','1000','700'); return false;">
<span class="fa fa-ellipsis-h "></span>
</span>
</div>
<label for="exampleInputEmail1">KONSULTAN 1 :</label>
<div class='input-group date' style="margin-top: 5px;">
    @foreach ($data_konsultan1 as $datas)
@php (@$id_konsultan1 = $datas->kode)
@php (@$nama_konsultan1 = $datas->nama)
@php (@$email_konsultan1 = $datas->email)
    @endforeach
<input type="text" class="form-control" name="konsultan1" id="konsultan1" autocomplete="off" readonly="readonly" value="{{ @$id_konsultan1 }}">
<input type="text" class="form-control" id="nama_konsultan1"  autocomplete="off" readonly="readonly" value="{{ @$nama_konsultan1 }}">
<input type="text" class="form-control"  id="email_konsultan1" readonly="readonly" value="{{ @$email_konsultan1 }}">
<span class="input-group-addon" onclick="open_child('/proyek/lookup/lookup_konsultan1/','Look Up','1000','700'); return false;">
<span class="fa fa-ellipsis-h "></span>
</span>
</div>
<label for="exampleInputEmail1">KONSULTAN 2 :</label>
<div class='input-group date' style="margin-top: 5px;">
    @foreach ($data_konsultan2 as $datas)
@php (@$id_konsultan2 = $datas->kode)
@php (@$nama_konsultan2 = $datas->nama)
@php (@$email_konsultan2 = $datas->email)
    @endforeach
<input type="text" class="form-control" name="konsultan2" id="konsultan2" autocomplete="off" readonly="readonly" value="{{ @$id_konsultan2 }}">
<input type="text" class="form-control" id="nama_konsultan2"  autocomplete="off" readonly="readonly" value="{{ @$nama_konsultan2 }}">
<input type="text" class="form-control"  id="email_konsultan2" readonly="readonly" value="{{ @$email_konsultan2 }}">
<span class="input-group-addon" onclick="open_child('/proyek/lookup/lookup_konsultan2/','Look Up','1000','700'); return false;">
<span class="fa fa-ellipsis-h "></span>
</span>
</div>
<label for="exampleInputEmail1">KONSULTAN 3 :</label>
<div class='input-group date' style="margin-top: 5px;">
    @foreach ($data_konsultan3 as $datas)
@php (@$id_konsultan3 = $datas->kode)
@php (@$nama_konsultan3 = $datas->nama)
@php (@$email_konsultan3 = $datas->email)
    @endforeach
<input type="text" class="form-control" name="konsultan3" id="konsultan3" autocomplete="off" readonly="readonly" value="{{ @$id_konsultan3 }}">
<input type="text" class="form-control" id="nama_konsultan3"  autocomplete="off" readonly="readonly" value="{{ @$nama_konsultan3 }}">
<input type="text" class="form-control"  id="email_konsultan3" readonly="readonly" value="{{ @$email_konsultan3 }}">
<span class="input-group-addon" onclick="open_child('/proyek/lookup/lookup_konsultan3/','Look Up','1000','700'); return false;">
<span class="fa fa-ellipsis-h "></span>
</span>
</div>
<label for="exampleInputEmail1">KONSULTAN 4 :</label>
<div class='input-group date' style="margin-top: 5px;">
    @foreach ($data_konsultan4 as $datas)
@php (@$id_konsultan4 = $datas->kode)
@php (@$nama_konsultan4 = $datas->nama)
@php (@$email_konsultan4 = $datas->email)
    @endforeach
<input type="text" class="form-control" name="konsultan4" id="konsultan4" autocomplete="off" readonly="readonly" value="{{ @$id_konsultan4 }}">
<input type="text" class="form-control" id="nama_konsultan4"  autocomplete="off" readonly="readonly" value="{{ @$nama_konsultan4 }}">
<input type="text" class="form-control"  id="email_konsultan4" readonly="readonly" value="{{ @$email_konsultan4 }}">
<span class="input-group-addon" onclick="open_child('/proyek/lookup/lookup_konsultan4/','Look Up','1000','700'); return false;">
<span class="fa fa-ellipsis-h "></span>
</span>
</div>
<label for="exampleInputEmail1">KONSULTAN 5 :</label>
<div class='input-group date' style="margin-top: 5px;">
    @foreach ($data_konsultan5 as $datas)
@php (@$id_konsultan5 = $datas->kode)
@php (@$nama_konsultan5 = $datas->nama)
@php (@$email_konsultan5 = $datas->email)
    @endforeach
<input type="text" class="form-control" name="konsultan5" id="konsultan5" autocomplete="off" readonly="readonly" value="{{ @$id_konsultan5 }}">
<input type="text" class="form-control" id="nama_konsultan5"  autocomplete="off" readonly="readonly" value="{{ @$nama_konsultan5 }}">
<input type="text" class="form-control"  id="email_konsultan5" readonly="readonly" value="{{ @$email_konsultan5 }}">
<span class="input-group-addon" onclick="open_child('/proyek/lookup/lookup_konsultan5/','Look Up','1000','700'); return false;">
<span class="fa fa-ellipsis-h "></span>
</span>
</div>
</div>
<div  style="width: 40%; float: right; margin-top: -850px;">
<label for="exampleInputEmail1">TA 1  :</label>
<div class='input-group date' style="margin-top: 5px;">
    @foreach ($data_ta1 as $datas)
@php (@$id_ta1 = $datas->kd_ta)
@php (@$nama_ta1 = $datas->nama)
@php (@$email_ta1 = $datas->email)
    @endforeach
<input type="text" class="form-control" name="ta1" id="ta1" autocomplete="off" readonly="readonly" value="{{ @$id_ta1 }}">
<input type="text" class="form-control" id="nama_ta1"  autocomplete="off" readonly="readonly" value="{{ @$nama_ta1 }}">
<input type="text" class="form-control"  id="email_ta1" readonly="readonly" value="{{ @$email_ta1 }}">
<span class="input-group-addon" onclick="open_child('/proyek/lookup/lookup_ta1/','Look Up','1000','700'); return false;">
<span class="fa fa-ellipsis-h "></span>
</span>
</div>
<label for="exampleInputEmail1">TA 2  :</label>
<div class='input-group date' style="margin-top: 5px;">
    @foreach ($data_ta2 as $datas)
@php (@$id_ta2 = $datas->kd_ta)
@php (@$nama_ta2 = $datas->nama)
@php (@$email_ta2 = $datas->email)
    @endforeach
<input type="text" class="form-control" name="ta2" id="ta2" autocomplete="off" readonly="readonly" value="{{ @$id_ta2 }}">
<input type="text" class="form-control" id="nama_ta2"  autocomplete="off" readonly="readonly" value="{{ @$nama_ta2 }}">
<input type="text" class="form-control"  id="email_ta2" readonly="readonly" value="{{ @$email_ta2 }}">
<span class="input-group-addon" onclick="open_child('/proyek/lookup/lookup_ta2/','Look Up','1000','700'); return false;">
<span class="fa fa-ellipsis-h "></span>
</span>
</div>
<label for="exampleInputEmail3">TA 3  :</label>
<div class='input-group date' style="margin-top: 5px;">
    @foreach ($data_ta3 as $datas)
@php (@$id_ta3 = $datas->kd_ta)
@php (@$nama_ta3 = $datas->nama)
@php (@$email_ta3 = $datas->email)
    @endforeach
<input type="text" class="form-control" name="ta3" id="ta3" autocomplete="off" readonly="readonly" value="{{ @$id_ta3 }}">
<input type="text" class="form-control" id="nama_ta3"  autocomplete="off" readonly="readonly" value="{{ @$nama_ta3 }}">
<input type="text" class="form-control"  id="email_ta3" readonly="readonly" value="{{ @$email_ta3 }}">
<span class="input-group-addon" onclick="open_child('/proyek/lookup/lookup_ta3/','Look Up','1000','700'); return false;">
<span class="fa fa-ellipsis-h "></span>
</span>
</div>
<label for="exampleInputEmail4">TA 4  :</label>
<div class='input-group date' style="margin-top: 5px;">
    @foreach ($data_ta4 as $datas)
@php (@$id_ta4 = $datas->kd_ta)
@php (@$nama_ta4 = $datas->nama)
@php (@$email_ta4 = $datas->email)
    @endforeach
<input type="text" class="form-control" name="ta4" id="ta4" autocomplete="off" readonly="readonly" value="{{ @$id_ta4 }}">
<input type="text" class="form-control" id="nama_ta4"  autocomplete="off" readonly="readonly" value="{{ @$nama_ta4 }}">
<input type="text" class="form-control"  id="email_ta4" readonly="readonly" value="{{ @$email_ta4 }}">
<span class="input-group-addon" onclick="open_child('/proyek/lookup/lookup_ta4/','Look Up','3000','700'); return false;">
<span class="fa fa-ellipsis-h "></span>
</span>
</div>
<label for="exampleInputEmail5">TA 5  :</label>
<div class='input-group date' style="margin-top: 5px;">
    @foreach ($data_ta5 as $datas)
@php (@$id_ta5 = $datas->kd_ta)
@php (@$nama_ta5 = $datas->nama)
@php (@$email_ta5 = $datas->email)
    @endforeach
<input type="text" class="form-control" name="ta5" id="ta5" autocomplete="off" readonly="readonly" value="{{ @$id_ta5 }}">
<input type="text" class="form-control" id="nama_ta5"  autocomplete="off" readonly="readonly" value="{{ @$nama_ta5 }}">
<input type="text" class="form-control"  id="email_ta5" readonly="readonly" value="{{ @$email_ta5 }}">
<span class="input-group-addon" onclick="open_child('/proyek/lookup/lookup_ta5/','Look Up','5000','700'); return false;">
<span class="fa fa-ellipsis-h "></span>
</span>
</div>
</div>
<br>
                  <button type="submit" class="btn btn-sm btn-raised btn-primary">Save</button>
                </form>
</div>
          @endforeach
            </section>
          </div>
</body>
 <script type="text/javascript">
  $(function() {
$("#date").datepicker();
  });
  </script>