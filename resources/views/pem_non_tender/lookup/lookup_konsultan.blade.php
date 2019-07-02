  <head>
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

  <!-- Custom styles -->
  <link href="/NiceAdmin/css/style.css" rel="stylesheet">
  <link href="/NiceAdmin/css/style-responsive.css" rel="stylesheet" />
</head>
  <body>
    @include('alert.flash-message')
    <div class="row">
          <div class="col-lg-6">
            <section class="panel">
              <header class="panel-heading">
               Pilih Karyawan
              </header>
              <div class="panel-body">
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
  window.opener.document.getElementById("txtSel").value = val;
  window.close();
}
</script>
<form action="" method="post" name="frmPopup" id="frmPopup">
<table class="table table-bordered table-hover" style="font-size:12px; color: black;">
    <tbody>
        <tr >
      <tr>
            <th rowspan="2"><strong> NAMA KARYAWAN</strong></td>
            <th rowspan="2"><strong>DIVISI</strong></td>
            <th rowspan="2"><strong>JABATAN</strong></td>
            <th rowspan="2" ><strong></strong></td>
            <tr>
        @php($i = 0)
        @foreach ($lookup as $data)
        @php($i++)

<tr >
            <td>{{ $data->nama }}</td>
            <td>{{ $data->divisi }}</td>
             <td>{{ $data->jabatan }}</td>
       <td ><input type="checkbox" name="Chk{{$i}}" id="Chk{{$i}}" value="-{{ $data->nama }}"></td>       
</tr >
</tbody>
@php ($max = $i)
  @endforeach
</table>
  <input name="hdnLine" type="hidden" value="{{$max}}">
  <br>
  <input class="btn btn-sm btn-raised btn-success" name="btnSelect" type="button" value="Pilih" onClick="JavaScript:selValue();">
</form>
</div>
</section>
</div>
</div>
</body>