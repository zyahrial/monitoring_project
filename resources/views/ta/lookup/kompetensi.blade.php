<body>
    @include('partials/header3') 
          <div class="col-lg-12 bg-aqua" style="padding : 20px;">
                @include('alert.flash-message')
            <section class="panel">
                <div class="panel-heading bg-primary" style="margin-left:10px; margin-right: 10px; ">Add / Select</div>
                <div class="panel-body" style="margin-left:10px; margin-right: 10px; ">
                        <div class="panel-body" style="margin-left:10px; margin-right: 10px; ">
               <form action="{{ URL('ta/store_kompetensi') }}" method="post" class="form" align="left"> 
              {{ csrf_field() }}      
                  <div class="form-group">
                     <label for="exampleInputEmail1">Kompetensi :</label>
                    <input type="text" class="form-control" name="kompetensi" id="kompetensi" placeholder="">
                  </div>
                  <button type="submit" class="btn btn-sm btn-raised btn-primary">Tambah</button>
                </form>
              </div>
<script language="javascript">
function selValue()
{
  var val = '';
  for(i=1;i<=frmPopup.hdnLine.value;i++)
  {
    if(eval("frmPopup.Chk"+i+".checked")==true)
    {
      val = val + eval("frmPopup.Chk"+i+".value") + ' ';
    }
  }
  window.opener.document.getElementById("kompetensi").value = val;
  window.close();
}
</script>
<form action="" method="post" name="frmPopup" id="frmPopup">
          <div class="panel-body" style="margin-left:10px; margin-right: 10px; ">
<table class="table table-bordered table-hover" style="font-size:14px; color: black;">
    <tbody>
      <tr>
            <td rowspan="2" ><strong>NO.</strong></td>
            <td align="center" rowspan="2"><strong>KOMPETENSI</strong></td>
            <td align="center"><strong>PILIH</strong></td>
              <td colspan="2"></th>
            <tr>
        @php( $no = 1 {{-- buat nomor urut --}} )
        @php($i = 0)
        @foreach ($lookup as $data)
        @php($i++)
<tr onclick="javascript:pilih(this)">
<td>{{ $no++ }}</td>
            <td >{{ $data->kompetensi }}</td>
             <td align="center"><input type="checkbox" name="Chk{{$i}}" id="Chk{{$i}}" value="-{{ $data->kompetensi }}"></td>
<td align="center">
        @if(checkPermission(['superadmin']))
        <form action="{{action('LookupController@destroy_kompetensi', $data['id'])}}" method="post">
         {{ csrf_field() }}
        <input name="_method" type="hidden" value="PATCH">
        <button class="btn btn-sm btn-raised btn-danger" title="Hapus" onclick="return confirm('Yakin mau hapus data ?')" type="submit">
        <i class="fa fa-trash-o"></i>
        </button>
        </form>
        @endif
</td>
</tr>
</tbody>
@php ($max = $i)
  @endforeach
</table>

  <input name="hdnLine" type="hidden" value="{{$max}}">
  <input class="btn btn-sm btn-raised btn-success" name="btnSelect" type="button" value="Simpan" onClick="JavaScript:selValue();">
  </div>
</form>
              </div>
            </section>
          </div>
</body>