<!DOCTYPE html>
<title>Alur Reminder Rekanan</title> 
<body class="hold-transition skin-blue sidebar-mini">
      <section class="wrapper">
        @include('partials/header2')
          @include('partials.sidebar')
  <div class="content-wrapper">
    <section class="content">
                   @include('alert.flash-message')
    <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading bg-primary">Alur Reminder Rekanan
              </header>
              <div class="panel-body">
               <div class="panel-heading" style="margin-left:10px; margin-right: 10px; ">Logic
               </div>
              <div class="panel-body" style="margin-left:10px; margin-right: 10px; "> 
                      <div  align="center"><img src="/image/rekanan.png" ></div>
              </div>
<br>
              @if (count($datas))
               <div class="panel-heading" style="margin-left:10px; margin-right: 10px; ">Update
                                Mail Address
               </div>
              @foreach ($datas as $data)
              <div class="panel-body" style="margin-left:10px; margin-right: 10px; ">
<form method="post" action="{{ URL('mail/update', $data->id) }}"  >
{{ csrf_field() }}  
<input name="_method" type="hidden" value="PATCH">    
                  <div class="form-group">
                    <label for="exampleInputEmail1">Primary Mail :</label>
                     <input type="text" class="form-control" autocomplete="off" name="primary_mail" id="primary_mail" 
                     value="{{ $data->primary_mail}}">
                     <label for="exampleInputEmail1">Secondary Mail :</label>
                    <input type="text" class="form-control" name="secondary_mail" autocomplete="off" id="secondary_mail" 
                    value="{{ $data->secondary_mail}}">
                  </div>
                  <button type="submit" class="btn btn-sm btn-raised btn-primary">Simpan</button>
                </form>
              </div>
              @endforeach
              @else

             <div class="panel-heading" style="margin-left:10px; margin-right: 10px; ">Add Mail Address
                             </div>
                <div class="panel-body" style="margin-left:10px; margin-right: 10px; ">
               <form action="{{ URL('mail/store') }}" method="post" class="form" align="left"> 
              {{ csrf_field() }}      
                  <div class="form-group">
                    <label for="exampleInputEmail1">Primary Mail :</label>
                     <input type="text" class="form-control" autocomplete="off" name="primary_mail" id="primary_mail" placeholder="">
                     <label for="exampleInputEmail1">Secondary Mail :</label>
                    <input type="text" class="form-control" name="secondary_mail" autocomplete="off" id="secondary_mail" placeholder="">
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
            <td align="center" rowspan="2"><strong>Primary Mail</strong></td>
            <td align="center" rowspan="2"><strong>Secondary Mail</strong></td>
            <td colspan="2"></th>
            <tr>
        @php(   $no = 1 {{-- buat nomor urut --}}  )
        {{-- loop all legalitas --}}
        @foreach ($datas as $data)
<tr onclick="javascript:pilih(this)">
            <td align="center">{{ $data->primary_mail }} </td>
            <td align="center">{{ $data->secondary_mail }}</td>
<td align="center">
        @if(checkPermission(['superadmin']))
        <form action="{{action('Mail_rekananController@destroy', $data['id'])}}" method="post">
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
