<?php
namespace App\Http\Controllers;

use App\Prj_sppd;
use App\Prj_ib;
use App\Prj_ib_cost;


use Illuminate\Http\Request;

class Prj_sppdController extends Controller
{

      function index(request $request)
    {

    $data_sppd = Prj_sppd::join('sdm_karyawan', 'sdm_karyawan.kode', '=', 'prj_sppd.pemohon')
    ->where('status_sppd','open')->get();

    return view('proyek/sppd/index',compact('data_sppd'));
    }

function store(Request $request ,$kd_proyek)
    {

$this->validate($request, [
'pemohon' => 'required|max:100',
'date' => 'required',
'tujuan' => 'required',
'keperluan' => 'required',
'tanggal_kembali' => 'required',
'tanggal_berangkat' => 'required',
'no_sppd' => 'required|unique:prj_sppd,no_sppd',

'kd_cost1' => 'required|unique:prj_sppd,kd_cost1|unique:prj_sppd,kd_cost2|unique:prj_sppd,kd_cost3|unique:prj_sppd,kd_cost4|unique:prj_sppd,kd_cost5|unique:prj_uudp,kd_cost1|unique:prj_uudp,kd_cost2|unique:prj_uudp,kd_cost3|unique:prj_uudp,kd_cost4|unique:prj_uudp,kd_cost5',
'kd_cost2' => 'unique:prj_sppd,kd_cost1|unique:prj_sppd,kd_cost2|unique:prj_sppd,kd_cost3|unique:prj_sppd,kd_cost4|unique:prj_sppd,kd_cost5|unique:prj_uudp,kd_cost1|unique:prj_uudp,kd_cost2|unique:prj_uudp,kd_cost3|unique:prj_uudp,kd_cost4|unique:prj_uudp,kd_cost5',
'kd_cost3' => 'unique:prj_sppd,kd_cost1|unique:prj_sppd,kd_cost2|unique:prj_sppd,kd_cost3|unique:prj_sppd,kd_cost4|unique:prj_sppd,kd_cost5|unique:prj_uudp,kd_cost1|unique:prj_uudp,kd_cost2|unique:prj_uudp,kd_cost3|unique:prj_uudp,kd_cost4|unique:prj_uudp,kd_cost5',
'kd_cost4' => 'unique:prj_sppd,kd_cost1|unique:prj_sppd,kd_cost2|unique:prj_sppd,kd_cost3|unique:prj_sppd,kd_cost4|unique:prj_sppd,kd_cost5|unique:prj_uudp,kd_cost1|unique:prj_uudp,kd_cost2|unique:prj_uudp,kd_cost3|unique:prj_uudp,kd_cost4|unique:prj_uudp,kd_cost5',
'kd_cost5' => 'unique:prj_sppd,kd_cost1|unique:prj_sppd,kd_cost2|unique:prj_sppd,kd_cost3|unique:prj_sppd,kd_cost4|unique:prj_sppd,kd_cost5|unique:prj_uudp,kd_cost1|unique:prj_uudp,kd_cost2|unique:prj_uudp,kd_cost3|unique:prj_uudp,kd_cost4|unique:prj_uudp,kd_cost5', ]);

$kd_sppd = Prj_sppd::where('kd_sppd', \DB::raw("(select max(kd_sppd) from prj_sppd)"))->get();
if (count($kd_sppd)){
foreach ($kd_sppd as $kode){
    $d = ((int)substr($kode->kd_sppd,3)+1);
    $kd = "SPD".sprintf("%03s",$d);
}
}else{
    $kd = "SPD001";
}
    $data = new Prj_sppd();
    $data->kd_sppd = $kd;
    $data->kd_proyek = $request->get('kd_proyek');
    $data->kd_cost1 = $request->get('kd_cost1');
    $data->kd_cost2 = $request->get('kd_cost2');
    $data->kd_cost3 = $request->get('kd_cost3');
    $data->kd_cost4 = $request->get('kd_cost4');
    $data->kd_cost5 = $request->get('kd_cost5');


    $data->pemohon = $request->get('pemohon');
        $data->tujuan = $request->get('tujuan');
        $data->keperluan = $request->get('keperluan');
        $data->tanggal_berangkat = $request->get('tanggal_berangkat');
        $data->tanggal_kembali = $request->get('tanggal_kembali');

    $data->no_sppd = $request->get('no_sppd');
    $data->status_sppd = "open";

    $data->date = $request->get('date');
    $data->note = $request->get('note');

if (($data->kd_cost1) == ''){
$data->kd_cost1 = '0';
}
if (($data->kd_cost2) == ''){
$data->kd_cost2 = '0';
}
if (($data->kd_cost3) == ''){
$data->kd_cost3 = '0';
}
if (($data->kd_cost4) == ''){
$data->kd_cost4 = '0';
}
if (($data->kd_cost5) == ''){
$data->kd_cost5 = '0';
}

 $data_sppd1 = Prj_ib_cost::where('prj_ib_cost.kd_cost',$data->kd_cost1)
    ->where('prj_ib_cost.kd_proyek',$kd_proyek)->get();

        $data_sppd2 = Prj_ib_cost::where('prj_ib_cost.kd_cost',$data->kd_cost2)
    ->where('prj_ib_cost.kd_proyek',$kd_proyek)->get();

           $data_sppd3 = Prj_ib_cost::where('prj_ib_cost.kd_cost',$data->kd_cost3)
    ->where('prj_ib_cost.kd_proyek',$kd_proyek)->get();

           $data_sppd4 = Prj_ib_cost::where('prj_ib_cost.kd_cost',$data->kd_cost4)
    ->where('prj_ib_cost.kd_proyek',$kd_proyek)->get();

           $data_sppd5 = Prj_ib_cost::where('prj_ib_cost.kd_cost',$data->kd_cost5)
    ->where('prj_ib_cost.kd_proyek',$kd_proyek)->get();


foreach ($data_sppd1 as $datas){
    @$vol = $datas->volume;
       @$cost = $datas->cost;
              @$extends = $datas->cost_extend;
   @$total1 = ($cost * $vol) + $extends ;
}

foreach ($data_sppd2 as $datas){
    @$vol = $datas->volume;
       @$cost = $datas->cost;
              @$extends = $datas->cost_extend;
   @$total2 = ($cost * $vol) + $extends ;
}

foreach ($data_sppd3 as $datas){
    @$vol = $datas->volume;
       @$cost = $datas->cost;
              @$extends = $datas->cost_extend;
   @$total3 = ($cost * $vol) + $extends ;
}

foreach ($data_sppd4 as $datas){
    @$vol = $datas->volume;
       @$cost = $datas->cost;
              @$extends = $datas->cost_extend;
   @$total4 = ($cost * $vol) + $extends ;
}

foreach ($data_sppd5 as $datas){
    @$vol = $datas->volume;
       @$cost = $datas->cost;
              @$extends = $datas->cost_extend;
   @$total5 = ($cost * $vol) + $extends ;
}

 @$total = ($total1 + $total2 + $total3 + $total4 + $total5);

 $ftotal = (number_format($total,0,",",".")."");


$data->nilai_sppd = $request->get('nilai_sppd');

    if ($data->nilai_sppd > $total){
    \Session::flash('warning','Nilai UUDP tidak boleh melebihi budget : Rp. '.$ftotal);
    return redirect('proyek/sppd/'.$kd_proyek);
    }else{

    $data->save();
    \Session::flash('success','Data Berhasil Di Tambahkan');
    return redirect('/sppd/print/'.$kd);
 }
}

public function update(Request $request, $kd_sppd) 
{
    $this->validate($request, [
'no_pjpd' => 'required|unique:prj_sppd,no_pjpd',

 ]);

    $proyek = Prj_sppd::select('kd_proyek')->where('kd_sppd', $kd_sppd)->get();
    foreach($proyek as $value){
    $kd_proyek = $value->kd_proyek;
}

    $data = Prj_sppd::find($kd_sppd);
    $data->note = $request->get('note');
    $data->date_pjpd = $request->get('date_pjpd');
    $data->no_pjpd = $request->get('no_pjpd');
    $data->nilai_pjpd = $request->get('nilai_pjpd');
    $status =  $request->get('no_upj');

if (is_null($data->no_pjpd)) {
  @$status = "open";
}else{
  @$status = "close";
}

    $data->status_sppd = @$status;

    $data->save();

    \Session::flash('success','Data Berhasil Di Simpan');
    return redirect('proyek/sppd/'.$kd_proyek);
    }

    public function destroy(Request $request, $kd_sppd )
{
$proyek = Prj_sppd::select('kd_proyek')->where('kd_sppd', $kd_sppd)->get();
    foreach($proyek as $value){
    $kd_proyek = $value->kd_proyek;
}

    $data = Prj_sppd::findOrFail($kd_sppd);
    $data->delete();
    \Session::flash('success','Data Berhasil Di Hapus');
    return redirect('/proyek/sppd/'.$kd_proyek);

}

    function lookup_cost1($kd_proyek)
{

$approved = "Approved";

     $cost_approved = Prj_ib_cost::join('prj_ib', 'prj_ib.kode_ib', '=', 'prj_ib_cost.kode_ib')
    ->join('prj_activity', 'prj_ib.kd_activity', '=', 'prj_activity.kd_activity')
    ->select('prj_ib.*','prj_activity.*','prj_ib_cost.*')
    ->orderBy('prj_ib.date', 'asc')
    ->where('prj_ib.kd_proyek',$kd_proyek)
    ->where('prj_ib_cost.cost_status',$approved)->get();

    return view('proyek/lookup/lookup_ar_cost1',compact('cost_approved'));
    }

       function lookup_cost2($kd_proyek)
    {

$approved = "Approved";

     $cost_approved = Prj_ib_cost::join('prj_ib', 'prj_ib.kode_ib', '=', 'prj_ib_cost.kode_ib')
    ->join('prj_activity', 'prj_ib.kd_activity', '=', 'prj_activity.kd_activity')
    ->select('prj_ib.*','prj_activity.*','prj_ib_cost.*')
    ->orderBy('prj_ib.date', 'asc')
    ->where('prj_ib.kd_proyek',$kd_proyek)
    ->where('prj_ib_cost.cost_status',$approved)->get();

    return view('proyek/lookup/lookup_ar_cost2',compact('cost_approved'));
    }

           function lookup_cost3($kd_proyek)
    {
$approved = "Approved";

     $cost_approved = Prj_ib_cost::join('prj_ib', 'prj_ib.kode_ib', '=', 'prj_ib_cost.kode_ib')
    ->join('prj_activity', 'prj_ib.kd_activity', '=', 'prj_activity.kd_activity')
    ->select('prj_ib.*','prj_activity.*','prj_ib_cost.*')
    ->orderBy('prj_ib.date', 'asc')
    ->where('prj_ib.kd_proyek',$kd_proyek)
    ->where('prj_ib_cost.cost_status',$approved)->get();

    return view('proyek/lookup/lookup_ar_cost3',compact('cost_approved'));
    }

           function lookup_cost4($kd_proyek)
    {

$approved = "Approved";

     $cost_approved = Prj_ib_cost::join('prj_ib', 'prj_ib.kode_ib', '=', 'prj_ib_cost.kode_ib')
    ->join('prj_activity', 'prj_ib.kd_activity', '=', 'prj_activity.kd_activity')
    ->select('prj_ib.*','prj_activity.*','prj_ib_cost.*')
    ->orderBy('prj_ib.date', 'asc')
    ->where('prj_ib.kd_proyek',$kd_proyek)
    ->where('prj_ib_cost.cost_status',$approved)->get();

    return view('proyek/lookup/lookup_ar_cost4',compact('cost_approved'));
    }

        function lookup_cost5($kd_proyek)
    {

$approved = "Approved";

     $cost_approved = Prj_ib_cost::join('prj_ib', 'prj_ib.kode_ib', '=', 'prj_ib_cost.kode_ib')
    ->join('prj_activity', 'prj_ib.kd_activity', '=', 'prj_activity.kd_activity')
    ->select('prj_ib.*','prj_activity.*','prj_ib_cost.*')
    ->orderBy('prj_ib.date', 'asc')
    ->where('prj_ib.kd_proyek',$kd_proyek)
    ->where('prj_ib_cost.cost_status',$approved)->get();

    return view('proyek/lookup/lookup_ar_cost5',compact('cost_approved'));
    }

}



