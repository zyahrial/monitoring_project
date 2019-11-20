<?php
namespace App\Http\Controllers;

use App\Prj_termin;
use App\Prj_ib;

use Illuminate\Http\Request;

class Prj_terminController extends Controller
{


function store(Request $request ,$kd_proyek)
    {

$this->validate($request, [
'kode_ib' => 'required|max:50',
'kd_proyek' => 'required|max:50',
'revenue_percent' => 'required|max:50',
'termin_ke' => 'required',
'kd_mdi' => 'required|unique:prj_termin,kd_mdi',


 ]);

$kd_termin = Prj_termin::where('kd_termin', \DB::raw("(select max(kd_termin) from prj_termin)"))->get();
if (count($kd_termin)){
foreach ($kd_termin as $kode){
    $d = ((int)substr($kode->kd_termin,3)+1);
    $kd = "TRM".sprintf("%03s",$d);
}
}else{
    $kd = "TRM001";
}
    $data = new Prj_termin();
    $data->kd_termin = $kd;
    $data->kd_proyek = $request->get('kd_proyek');
    $data->kode_ib = $request->get('kode_ib');
    $data->revenue_percent = $request->get('revenue_percent');
    $data->termin_status = "open";
        $data->termin_ke = $request->get('termin_ke');
        $data->kd_mdi = $request->get('kd_mdi');
        $data->no_order = $request->get('no_order');
        $data->no_sertifikat = $request->get('no_sertifikat');
        $data->tgl_sertifikat = $request->get('tgl_sertifikat');
        $data->jml_komoditi = $request->get('jml_komoditi');
        $data->tarip_unit = $request->get('tarip_unit');
        $data->biaya_analisa = $request->get('biaya_analisa');
        $data->materai = $request->get('materai');
        $data->lain_lain = $request->get('lain_lain');
        $data->potongan = $request->get('potongan');
        $data->admin = $request->get('admin');

    $data->save();
    \Session::flash('success','Data Successfully Added');
    return redirect('proyek/add_termin/'.$kd_proyek);

    }

    public function update(Request $request, $kd_termin) 
{
    $this->validate($request, [
'kode_ib' => 'required|max:50',
'revenue_percent' => 'required|max:50',
'termin_status' => 'required',
'termin_ke' => 'required',
'admin' => 'required',
'kd_mdi' => 'required',

 ]);

    $kode_ib = $request->get('kode_ib');

    $proyek = Prj_ib::select('kd_proyek')->where('kode_ib', $kode_ib)->get();
    foreach($proyek as $value){
    $kd_proyek = $value->kd_proyek;
}
    $data = Prj_termin::find($kd_termin);
    $data->kode_ib = $request->get('kode_ib');
    $data->revenue_percent = $request->get('revenue_percent');
    $data->termin_status = $request->get('termin_status');
        $data->termin_ke = $request->get('termin_ke');
        $data->kd_mdi = $request->get('kd_mdi');
        $data->no_order = $request->get('no_order');
        $data->no_sertifikat = $request->get('no_sertifikat');
        $data->tgl_sertifikat = $request->get('tgl_sertifikat');
        $data->jml_komoditi = $request->get('jml_komoditi');
        $data->tarip_unit = $request->get('tarip_unit');
        $data->biaya_analisa = $request->get('biaya_analisa');
        $data->materai = $request->get('materai');
        $data->lain_lain = $request->get('lain_lain');
        $data->potongan = $request->get('potongan');
        $data->admin = $request->get('admin');
    $data->save();

    \Session::flash('success','Data Successfully Updated');
    return redirect('proyek/add_termin/'.$kd_proyek); 
    }

    public function destroy(Request $request, $kode_ib)
    {

    $proyek = Prj_ib::select('kd_proyek')->where('kode_ib', $kode_ib)->get();
    foreach($proyek as $value){
    $kd_proyek = $value->kd_proyek;
}
    $termin = Prj_termin::select('kd_termin')->where('kode_ib', $kode_ib)->get();
    foreach($termin as $data){
    $kd_termin = $data->kd_termin;
}
    $data = Prj_termin::findOrFail($kd_termin);
    $data->delete();
    \Session::flash('success','Data Successfully Deleted');
    return redirect('proyek/termin/add_termin/'.$kd_proyek);
}

       function lookup_ib(Request $request)
    {

    $data = Prj_ib::join('prj_activity', 'prj_ib.kd_activity', '=', 'prj_activity.kd_activity')
    ->select('prj_ib.*','prj_activity.*')
    ->orderBy('activity', 'asc')->orderBy('sub_activity', 'asc')->get();

    return view('proyek.lookup.lookup_ib', compact('data'));
}

}

