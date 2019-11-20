<?php
namespace App\Http\Controllers;

use App\Prj_ib;
use App\Prj_termin;
use App\Prj_ib_cost;
use App\Prj_lib_cost;
//use App\Prj_cost_activity;


use Illuminate\Http\Request;

class Prj_ibController extends Controller
{

function store(Request $request ,$kd_proyek)
    {

$this->validate($request, [
'kd_proyek' => 'required|max:50',
'kd_activity' => 'required|max:50',
'date' => 'required',
'status' => 'required',
 ]);

$kode_ib = Prj_ib::where('kode_ib', \DB::raw("(select max(kode_ib) from prj_ib)"))->get();
if (count($kode_ib)){
foreach ($kode_ib as $kode){
    $d = ((int)substr($kode->kode_ib,3)+1);
    $kd = "PIB".sprintf("%03s",$d);
}
}else{
    $kd = "PIB001";
}

    $data = new Prj_ib();
    $data->kode_ib = $kd;
    $data->kd_proyek = $request->get('kd_proyek');
    $data->kd_activity = $request->get('kd_activity');
    $data->date = $request->get('date');
    $data->status = $request->get('status');

    $kd_activity = $data->kd_activity;
    $kd_proyek = $data->kd_proyek;
    $ib = Prj_ib::where('kd_proyek',$kd_proyek)->where('kd_activity',$kd_activity)->count();
if (($ib) == 1){
\Session::flash('warning','Maaf data ini sudah ada');
    return redirect('proyek/add_ib/'.$kd_proyek);
}else{ 
    $data->save();
    \Session::flash('success','Data Berhasil Disimpan');
    return redirect('proyek/add_ib/'.$kd_proyek);
    }
}
    public function update(Request $request, $kode_ib) 
{

    $this->validate($request, [
'kd_proyek' => 'required|max:50',
'kd_activity' => 'required|max:50',
'date' => 'required',
'status' => 'required',

 ]);

    $data = Prj_ib::find($kode_ib);
    $data->kd_proyek = $request->get('kd_proyek');
    $data->kd_activity = $request->get('kd_activity');
    $data->date = $request->get('date');
    $data->status = $request->get('status');
    $data->save();

    $kd_proyek = $data->kd_proyek;
    \Session::flash('success','Data Berhasil Diubah');
    return redirect('proyek/add_ib/'.$kd_proyek); 
}


 function destroy(Request $request, $kode_ib)
    {

    $proyek = Prj_ib::select('kd_proyek')->where('kode_ib', $kode_ib)->get();
    foreach($proyek as $value){
    $kd_proyek = $value->kd_proyek;
}

$termin = Prj_termin::where('kode_ib',$kode_ib)->count();
$cost = Prj_ib_cost::where('kode_ib',$kode_ib)->count();

if (($termin) > 0){
\Session::flash('warning','Tidak bisa dihapus karena data ini ada di module termin');
    return redirect('proyek/add_ib/'.$kd_proyek);
}
else if (($cost) > 0){
\Session::flash('warning','Tidak bisa dihapus karena data ini ada di module IB');
    return redirect('proyek/add_ib/'.$kd_proyek);
}else{
    $data = Prj_ib::findOrFail($kode_ib);
    $data->delete();
    \Session::flash('success','Data Berhasil Dihapus');
    return redirect('proyek/add_ib/'.$kd_proyek);
}
}

function store_cost(Request $request ,$kd_proyek)
{
$this->validate($request, [
'cost_activity' => 'required|max:50',
'cost' => 'required',
 ]);

    $data = new Prj_ib_cost();
    $data->kd_proyek =  $kd_proyek;
    $data->kode_ib =  $request->get('kode_ib');
    $data->cost_activity = $request->get('cost_activity');
    $data->cost = $request->get('cost');
    $data->volume = $request->get('volume');
    $data->note = $request->get('note');
    $data->cost_extend = $request->get('cost_extend');
    $data->cost_status = $request->get('cost_status');

    $existing_cost = Prj_ib_cost::where('kode_ib',$data->kode_ib)->where('cost_activity',$data->cost_activity)->count();
if (($existing_cost) > 0){
\Session::flash('warning','Maaf data sudah ada');
    return redirect('proyek/add_ib/'.$kd_proyek);
}else{ 
    $data->save();
    \Session::flash('success','Data Berhasil Disimpan');
    return redirect('proyek/add_ib/'.$kd_proyek);
    }
}
 function update_ib_cost(Request $request ,$kd_cost) 
{

$this->validate($request, [
'cost_activity' => 'required|max:50',
'cost' => 'required',
'cost_status' => 'required',

 ]);

    $data = Prj_ib_cost::find($kd_cost);
    $data->kode_ib =  $request->get('kode_ib');
    $data->cost_activity = $request->get('cost_activity');
    $data->cost = $request->get('cost');
    $data->volume = $request->get('volume');
    $data->note = $request->get('note');
    $data->cost_extend = $request->get('cost_extend');
    $data->cost_status = $request->get('cost_status');
    $data->kd_proyek =  $request->get('kd_proyek');
    $data->save();

    $kd_proyek = $data->kd_proyek;

    \Session::flash('success','Data Berhasil Diubah');
    return redirect('proyek/add_ib/'.$kd_proyek); 
    
}

        public function destroy_cost(Request $request, $kd_cost)
    {

    $ib = Prj_ib_cost::select('kode_ib')->where('kd_cost', $kd_cost)->get();
    foreach($ib as $value){
    $kode_ib = $value->kode_ib;
}

    $proyek = Prj_ib::select('kd_proyek')->where('kode_ib', $kode_ib)->get();
    foreach($proyek as $value){
    $kd_proyek = $value->kd_proyek;
}

    $data = Prj_ib_cost::findOrFail($kd_cost);
    $data->delete();
    \Session::flash('success','Data Berhasil Dihapus');
    return redirect('proyek/add_ib/'.$kd_proyek);
}

       function lookup_ib($kd_proyek)
    {
    $data = Prj_ib::join('prj_activity', 'prj_ib.kd_activity', '=', 'prj_activity.kd_activity')
    ->select('prj_ib.*','prj_activity.*')
    ->orderBy('activity', 'asc')->orderBy('sub_activity', 'asc')
    ->where('kd_proyek',$kd_proyek)->get();

    return view('proyek.lookup.lookup_ib', compact('data'));
}

       function lookup_cost_ib($kd_proyek)
    {

    $data = Prj_ib::join('prj_activity', 'prj_ib.kd_activity', '=', 'prj_activity.kd_activity')
    ->select('prj_ib.*','prj_activity.*')
    ->orderBy('activity', 'asc')->orderBy('sub_activity', 'asc')
    ->where('kd_proyek',$kd_proyek)->get();

    return view('proyek.lookup.lookup_cost_ib', compact('data'));
}

function lookup_item_biaya(Request $request)
    {  
    if ($request->has('cost_activity')) 
    {        
    $query = ($request->input('cost_activity'));
    $datas = Prj_lib_cost::where('cost_activity', 'LIKE', '%' . $query . '%')
    ->orderBy('cost_activity', 'asc')->get();
    }else{
    $datas = Prj_lib_cost::orderBy('kd_cost', 'asc')->get();
    } 
    return view('proyek.lookup.lookup_item_biaya',['datas' => $datas]);
    }

    function store_item_biaya(Request $request)
{
$this->validate($request, [
'cost_activity' => 'required',
 ]);

    $data = new Prj_lib_cost();
    $data->cost_activity =  $request->get('cost_activity');
    $data->save();
    \Session::flash('success','Data Berhasil Disimpan');
    return redirect('/proyek/lib/lookup_item_biaya');
    }

function destroy_lib_item_biaya(Request $request, $kd_cost)
    {
        $data = Prj_lib_cost::find($kd_cost);
        $data->delete();
    \Session::flash('success','Data Berhasil Dihapus');
    return redirect('/ib/lib/lib_item_biaya');
    }

    function lib_item_biaya(Request $request)
    {  
    if ($request->has('cost_activity')) 
    {        
    $query = ($request->input('cost_activity'));
    $datas = Prj_lib_cost::where('cost_activity', 'LIKE', '%' . $query . '%')
    ->orderBy('cost_activity', 'asc')->get();
    }else{
    $datas = Prj_lib_cost::orderBy('kd_cost', 'asc')->get();
    }     return view('proyek.lib.item_biaya.index',['datas' => $datas]);
    }

    function store_lib_item_biaya(Request $request)
{
$this->validate($request, [
'cost_activity' => 'required',
 ]);

    $data = new Prj_lib_cost();
    $data->cost_activity =  $request->get('cost_activity');
    $data->save();
    \Session::flash('success','Data Berhasil Disimpan');
    return redirect('/ib/lib/lib_item_biaya');
    }

    function show_lib_item_biaya($kd_cost)
    {
        $datas = Prj_lib_cost::orderBy('kd_cost', 'asc')->get();  
        $edit = Prj_lib_cost::where('kd_cost',$kd_cost)->get();
        return view('proyek.lib.item_biaya.edit',compact('datas','edit'));
    }

        function update_lib_item_biaya(Request $request, $kd_cost)
{

$this->validate($request, [
'cost_activity' => 'required',
 ]);

    $data = Prj_lib_cost::find($kd_cost);
    $data->cost_activity =  $request->get('cost_activity');
    $data->save();
    \Session::flash('success','Data Berhasil Diubah');
    return redirect('/ib/lib/lib_item_biaya');
    }

}