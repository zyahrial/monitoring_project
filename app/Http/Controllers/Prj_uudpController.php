<?php
namespace App\Http\Controllers;

use App\Prj_uudp;
use App\Prj_ib;
use App\Prj_ib_cost;


use Illuminate\Http\Request;

class Prj_uudpController extends Controller
{

function store(Request $request ,$kd_proyek)
    {

$this->validate($request, [
'pemohon' => 'required|max:100',
'date' => 'required',
'nilai_uudp' => 'required',
'no_uudp' => 'required|unique:prj_uudp,no_uudp',

'kd_cost1' => 'unique:prj_uudp,kd_cost1|unique:prj_uudp,kd_cost2|unique:prj_uudp,kd_cost3|unique:prj_uudp,kd_cost4|unique:prj_uudp,kd_cost5|unique:prj_sppd,kd_cost1|unique:prj_sppd,kd_cost2|unique:prj_sppd,kd_cost3|unique:prj_sppd,kd_cost4|unique:prj_sppd,kd_cost5',
'kd_cost2' => 'unique:prj_uudp,kd_cost1|unique:prj_uudp,kd_cost2|unique:prj_uudp,kd_cost3|unique:prj_uudp,kd_cost4|unique:prj_uudp,kd_cost5|unique:prj_sppd,kd_cost1|unique:prj_sppd,kd_cost2|unique:prj_sppd,kd_cost3|unique:prj_sppd,kd_cost4|unique:prj_sppd,kd_cost5',
'kd_cost3' => 'unique:prj_uudp,kd_cost1|unique:prj_uudp,kd_cost2|unique:prj_uudp,kd_cost3|unique:prj_uudp,kd_cost4|unique:prj_uudp,kd_cost5|unique:prj_sppd,kd_cost1|unique:prj_sppd,kd_cost2|unique:prj_sppd,kd_cost3|unique:prj_sppd,kd_cost4|unique:prj_sppd,kd_cost5',
'kd_cost4' => 'unique:prj_uudp,kd_cost1|unique:prj_uudp,kd_cost2|unique:prj_uudp,kd_cost3|unique:prj_uudp,kd_cost4|unique:prj_uudp,kd_cost5|unique:prj_sppd,kd_cost1|unique:prj_sppd,kd_cost2|unique:prj_sppd,kd_cost3|unique:prj_sppd,kd_cost4|unique:prj_sppd,kd_cost5',
'kd_cost5' => 'unique:prj_uudp,kd_cost1|unique:prj_uudp,kd_cost2|unique:prj_uudp,kd_cost3|unique:prj_uudp,kd_cost4|unique:prj_uudp,kd_cost5|unique:prj_sppd,kd_cost1|unique:prj_sppd,kd_cost2|unique:prj_sppd,kd_cost3|unique:prj_sppd,kd_cost4|unique:prj_sppd,kd_cost5',
 ]);

$kd_uudp = Prj_uudp::where('kd_uudp', \DB::raw("(select max(kd_uudp) from Prj_uudp)"))->get();
if (count($kd_uudp)){
foreach ($kd_uudp as $kode){
    $d = ((int)substr($kode->kd_uudp,3)+1);
    $kd = "UDP".sprintf("%03s",$d);
}
}else{
    $kd = "UDP001";
}

$status = "open";
    $data = new Prj_uudp();
    $data->kd_uudp = $kd;
    $data->kd_proyek = $request->get('kd_proyek');
    $data->no_uudp = $request->get('no_uudp');
    $data->kd_cost1 = $request->get('kd_cost1');
    $data->kd_cost2 = $request->get('kd_cost2');
    $data->kd_cost3 = $request->get('kd_cost3');
    $data->kd_cost4 = $request->get('kd_cost4');
    $data->kd_cost5 = $request->get('kd_cost5');

    $data->pemohon = $request->get('pemohon');
    $data->date = $request->get('date');
    $data->note = $request->get('note');

    $data->status_uudp = $status;
    $data->nilai_uudp = $request->get('nilai_uudp');
    $data->date_upj = $request->get('date_upj');
    $data->no_upj = $request->get('no_upj');
    $data->nilai_upj = $request->get('nilai_upj');

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

    $data_uudp1 = Prj_ib_cost::where('prj_ib_cost.kd_cost',$data->kd_cost1)
    ->where('prj_ib_cost.kd_proyek',$kd_proyek)->get();

        $data_uudp2 = Prj_ib_cost::where('prj_ib_cost.kd_cost',$data->kd_cost2)
    ->where('prj_ib_cost.kd_proyek',$kd_proyek)->get();

           $data_uudp3 = Prj_ib_cost::where('prj_ib_cost.kd_cost',$data->kd_cost3)
    ->where('prj_ib_cost.kd_proyek',$kd_proyek)->get();

           $data_uudp4 = Prj_ib_cost::where('prj_ib_cost.kd_cost',$data->kd_cost4)
    ->where('prj_ib_cost.kd_proyek',$kd_proyek)->get();

           $data_uudp5 = Prj_ib_cost::where('prj_ib_cost.kd_cost',$data->kd_cost5)
    ->where('prj_ib_cost.kd_proyek',$kd_proyek)->get();



foreach ($data_uudp1 as $datas){
    @$vol = $datas->volume;
       @$cost = $datas->cost;
              @$extends = $datas->cost_extend;
   @$total1 = ($cost * $vol) + $extends ;
}

foreach ($data_uudp2 as $datas){
    @$vol = $datas->volume;
       @$cost = $datas->cost;
              @$extends = $datas->cost_extend;
   @$total2 = ($cost * $vol) + $extends ;
}

foreach ($data_uudp3 as $datas){
    @$vol = $datas->volume;
       @$cost = $datas->cost;
              @$extends = $datas->cost_extend;
   @$total3 = ($cost * $vol) + $extends ;
}

foreach ($data_uudp4 as $datas){
    @$vol = $datas->volume;
       @$cost = $datas->cost;
              @$extends = $datas->cost_extend;
   @$total4 = ($cost * $vol) + $extends ;
}

foreach ($data_uudp5 as $datas){
    @$vol = $datas->volume;
       @$cost = $datas->cost;
              @$extends = $datas->cost_extend;
   @$total5 = ($cost * $vol) + $extends ;
}

 @$total = ($total1 + $total2 + $total3 + $total4 + $total5);

 $ftotal = (number_format($total,0,",",".")."");


    $data->nilai_uudp = $request->get('nilai_uudp');

    if ($data->nilai_uudp > $total){
    \Session::flash('warning','Nilai UUDP tidak boleh melebihi budget : Rp. '.$ftotal);
    return redirect('proyek/uudp/'.$kd_proyek);
    }else{

    $data->save().
    \Session::flash('success','Data Berhasil Di Tambahkan');
    return redirect('/uudp/print/'.$kd);
 }
}

public function update(Request $request, $kd_uudp) 
{
    $this->validate($request, [
'no_upj' => 'required|max:50',

 ]);

    $proyek = Prj_uudp::select('kd_proyek')->where('kd_uudp', $kd_uudp)->get();
    foreach($proyek as $value){
    $kd_proyek = $value->kd_proyek;
}

    $data = Prj_uudp::find($kd_uudp);
    $data->note = $request->get('note');
    $data->date_upj = $request->get('date_upj');
    $data->no_upj = $request->get('no_upj');
    $data->nilai_upj = $request->get('nilai_upj');
    $status_no =  $request->get('no_upj');

if (is_null($data->no_upj)) {
  @$status = "open";
}else{
  @$status = "close";
}

    $data->status_uudp = @$status;

      $data->save();

    \Session::flash('success','Data Berhasil Di Simpan');
    return redirect('proyek/uudp/'.$kd_proyek);
    }

    public function destroy(Request $request, $kd_uudp )
    {
$proyek = Prj_uudp::select('kd_proyek')->where('kd_uudp', $kd_uudp)->get();
    foreach($proyek as $value){
    $kd_proyek = $value->kd_proyek;
}

    $data = Prj_uudp::findOrFail($kd_uudp);
    $data->delete();
    \Session::flash('success','Data Berhasil Di Hapus');
    return redirect('/proyek/uudp/'.$kd_proyek);

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

    function index(request $request)
    {

    $data_uudp = Prj_uudp::join('sdm_karyawan', 'sdm_karyawan.kode', '=', 'prj_uudp.pemohon')
    ->where('status_uudp','open')
    ->orderBy('date', 'asc')->get();

    return view('proyek/uudp/index',compact('proyek','data_uudp','budget'));
    }

}

