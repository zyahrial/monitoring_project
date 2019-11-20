<?php
namespace App\Http\Controllers;
//use Auth;
use App\Prj;
use App\Klien;
use App\Karyawan;
use App\Prj_ib;
use App\Prj_termin;
use App\Ta;
use App\Prj_uudp;
use App\Prj_ib_cost;
use App\Prj_sppd;
use App\Prj_notif;
use Auth;


//use App\Exports\PrjExport;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Excel;


class PrjController extends Controller
    {   

function index(Request $request)
    {       

$open = "open";

if ($request->has('nama_klien'))
    {        
    $query = ($request->input('nama_klien'));
    $pengalaman = Prj::join('mkt_pengalaman', 'prj.kd_pengalaman', '=', 'mkt_pengalaman.kd_pengalaman')
    ->join('mkt_klien', 'mkt_klien.kd_klien', '=', 'mkt_pengalaman.kd_klien')
    ->select('mkt_klien.nama_klien', 'mkt_pengalaman.*','prj.*')
        ->where('proyek_status',$open)
    ->where('nama_klien', 'LIKE', '%' . $query . '%')
    ->orderBy('kontrak_mulai', 'desc')->paginate();
    }elseif ($request->has('nama_klien'))
    {        
    $start = ($request->input('start'));
    $end = ($request->input('end'));
    $pengalaman = Prj::join('mkt_pengalaman', 'prj.kd_pengalaman', '=', 'mkt_pengalaman.kd_pengalaman')
    ->join('mkt_klien', 'mkt_klien.kd_klien', '=', 'mkt_pengalaman.kd_klien')
    ->select('mkt_klien.nama_klien', 'mkt_pengalaman.*','prj.*')
        ->where('proyek_status',$open)
    ->whereBetween('kontrak_mulai', array($start, $end))
     ->orderBy('kontrak_mulai', 'desc')->paginate();
    }else{
    $pengalaman = Prj::join('mkt_pengalaman', 'prj.kd_pengalaman', '=', 'mkt_pengalaman.kd_pengalaman')
    ->join('mkt_klien', 'mkt_klien.kd_klien', '=', 'mkt_pengalaman.kd_klien')
    ->select('mkt_klien.nama_klien', 'mkt_pengalaman.*','prj.*')
    ->where('proyek_status',$open)
     ->orderBy('kontrak_mulai', 'desc')->paginate(20);
    }
    return view('proyek.index',['pengalaman' => $pengalaman]);
    }

    function user(Request $request)

{
    $open = "open";
    $email = (Auth::user()->email);
    $data_pm_convert = Karyawan::where('email',$email)->get();
    foreach ($data_pm_convert as $data) {
        $pm_email = $data->email;
        $kode = $data->kode;

    $pengalaman = Prj::join('mkt_pengalaman', 'prj.kd_pengalaman', '=', 'mkt_pengalaman.kd_pengalaman')
    ->join('mkt_klien', 'mkt_klien.kd_klien', '=', 'mkt_pengalaman.kd_klien')
    ->select('mkt_klien.nama_klien', 'mkt_pengalaman.*','prj.*')
    ->where('proyek_status',$open)
    ->where('prj.pm',$kode)
    ->OrWhere('prj.konsultan1',$kode)
    ->OrWhere('prj.konsultan2',$kode)
    ->OrWhere('prj.konsultan3',$kode)
    ->OrWhere('prj.konsultan4',$kode)
    ->OrWhere('prj.konsultan5',$kode)
    ->orderBy('kontrak_mulai', 'desc')->paginate();

    return view('proyek.index',compact('pengalaman','pm_email'));
 }
}

function close(Request $request)
    {       

$close = "close";

if ($request->has('nama_klien'))
    {        
    $query = ($request->input('nama_klien'));
    $pengalaman = Prj::join('mkt_pengalaman', 'prj.kd_pengalaman', '=', 'mkt_pengalaman.kd_pengalaman')
    ->join('mkt_klien', 'mkt_klien.kd_klien', '=', 'mkt_pengalaman.kd_klien')
    ->select('mkt_klien.nama_klien', 'mkt_pengalaman.*','prj.*')
        ->where('proyek_status',$close)
    ->where('nama_klien', 'LIKE', '%' . $query . '%')
    ->orderBy('kontrak_mulai', 'desc')->paginate();
    }elseif ($request->has('nama_klien'))
    {        
    $start = ($request->input('start'));
    $end = ($request->input('end'));
    $pengalaman = Prj::join('mkt_pengalaman', 'prj.kd_pengalaman', '=', 'mkt_pengalaman.kd_pengalaman')
    ->join('mkt_klien', 'mkt_klien.kd_klien', '=', 'mkt_pengalaman.kd_klien')
    ->select('mkt_klien.nama_klien', 'mkt_pengalaman.*','prj.*')
        ->where('proyek_status',$close)
    ->whereBetween('kontrak_mulai', array($start, $end))
     ->orderBy('kontrak_mulai', 'desc')->paginate();
    }else{
    $pengalaman = Prj::join('mkt_pengalaman', 'prj.kd_pengalaman', '=', 'mkt_pengalaman.kd_pengalaman')
    ->join('mkt_klien', 'mkt_klien.kd_klien', '=', 'mkt_pengalaman.kd_klien')
    ->select('mkt_klien.nama_klien', 'mkt_pengalaman.*','prj.*')
    ->where('proyek_status',$close)
     ->orderBy('kontrak_mulai', 'desc')->paginate(20);
    }
    return view('proyek.close',['pengalaman' => $pengalaman]);
    }

        public function export(Request $request) 
    {
        return Excel::download(new PrjExport($request->mulai, $request->selesai), 'Prj.xlsx');
    }

    function detail($kd_proyek)
    {

    $proyek = Prj::join('mkt_pengalaman', 'prj.kd_pengalaman', '=', 'mkt_pengalaman.kd_pengalaman')
    ->join('mkt_klien', 'mkt_klien.kd_klien', '=', 'mkt_pengalaman.kd_klien')
    ->select('mkt_klien.nama_klien', 'mkt_pengalaman.*','prj.*')->
    where('prj.kd_proyek',$kd_proyek)->get();

    $data_ib = Prj_ib::join('prj_activity', 'prj_ib.kd_activity', '=', 'prj_activity.kd_activity')
    ->select('prj_ib.*','prj_activity.*')
    ->orderBy('status', 'asc')
    ->where('prj_ib.kd_proyek',$kd_proyek)->get(); 

    $data_termin = Prj_termin::join('prj_ib', 'prj_termin.kode_ib', '=', 'prj_ib.kode_ib')
    ->join('prj_activity', 'prj_activity.kd_activity', '=', 'prj_ib.kd_activity')
    ->select('prj_termin.*','prj_ib.*','prj_activity.*')
    ->orderBy('termin_date', 'asc')
    ->where('prj_ib.kd_proyek',$kd_proyek)->get();

    $data_termin2 = Prj_termin::join('prj_ib', 'prj_termin.kode_ib', '=', 'prj_ib.kode_ib')
    ->join('prj_activity', 'prj_activity.kd_activity', '=', 'prj_ib.kd_activity')
    ->select('prj_termin.*','prj_ib.*','prj_activity.*')
    ->where('termin_status', 'close')
    ->where('prj_ib.kd_proyek',$kd_proyek)->get();

$pending = "pending";
$approved = "Approved";

       $cost_need_approve = Prj_ib_cost::join('prj_ib', 'prj_ib.kode_ib', '=', 'prj_ib_cost.kode_ib')
    ->join('prj_activity', 'prj_ib.kd_activity', '=', 'prj_activity.kd_activity')
    ->select('prj_ib.*','prj_activity.*','prj_ib_cost.*')
    ->orderBy('prj_ib.date', 'asc')
    ->where('prj_ib.kd_proyek',$kd_proyek)->where('prj_ib_cost.cost_status',$pending)->get();

     $cost_approved = Prj_ib_cost::join('prj_ib', 'prj_ib.kode_ib', '=', 'prj_ib_cost.kode_ib')
    ->join('prj_activity', 'prj_ib.kd_activity', '=', 'prj_activity.kd_activity')
    ->select('prj_ib.*','prj_activity.*','prj_ib_cost.*')
    ->orderBy('prj_ib.date', 'asc')
    ->where('prj_ib.kd_proyek',$kd_proyek)
    ->where('prj_ib_cost.cost_status',$approved)->get();

    $data_uudp = Prj_uudp::join('sdm_karyawan', 'prj_uudp.pemohon', '=', 'sdm_karyawan.kode')
    ->orderBy('date', 'asc')->where('prj_uudp.kd_proyek',$kd_proyek)->get();


foreach ($proyek as $data){

$pm = $data->pm;
$konsultan1 = $data->konsultan1;
$konsultan2 = $data->konsultan2;
$konsultan3 = $data->konsultan3;
$konsultan4 = $data->konsultan4;
$konsultan5 = $data->konsultan5;

$ta1 = $data->ta1;
$ta2 = $data->ta2;
$ta3 = $data->ta3;
$ta4 = $data->ta4;
$ta5 = $data->ta5;

}

$data_pm = Karyawan::where('kode',$pm)->get();
$data_konsultan1 = Karyawan::where('kode',$konsultan1)->get(); 
$data_konsultan2 = Karyawan::where('kode',$konsultan2)->get(); 
$data_konsultan3 = Karyawan::where('kode',$konsultan3)->get(); 
$data_konsultan4 = Karyawan::where('kode',$konsultan4)->get(); 
$data_konsultan5 = Karyawan::where('kode',$konsultan5)->get(); 

$data_ta1 = Ta::where('kd_ta',$ta1)->get(); 
$data_ta2 = Ta::where('kd_ta',$ta2)->get(); 
$data_ta3 = Ta::where('kd_ta',$ta3)->get(); 
$data_ta4 = Ta::where('kd_ta',$ta4)->get(); 
$data_ta5 = Ta::where('kd_ta',$ta5)->get(); 

     $budget = Prj_ib_cost::join('prj_ib', 'prj_ib.kode_ib', '=', 'prj_ib_cost.kode_ib')
    ->join('prj_activity', 'prj_ib.kd_activity', '=', 'prj_activity.kd_activity')
    ->select('prj_ib.*','prj_activity.*','prj_ib_cost.*')
    ->orderBy('prj_ib.date', 'asc')
    ->where('prj_ib.kd_proyek',$kd_proyek)
    ->where('prj_ib_cost.cost_status',$approved)->get();

     $data_sppd = Prj_sppd::join('sdm_karyawan', 'sdm_karyawan.kode', '=', 'prj_sppd.pemohon')
    ->orderBy('date', 'asc')->where('kd_proyek',$kd_proyek)->get();

return view('proyek/detail',compact('proyek','data_ib','data_termin','data_pm','data_konsultan1','data_konsultan2','data_konsultan3','data_konsultan4','data_konsultan5','data_ta1','data_ta2','data_ta3','data_ta4','data_ta5','cost_need_approve','cost_approved','data_uudp','budget','data_sppd','data_termin2'));

    }

//manage ib
        function add_ib($kd_proyek)
    {
    $proyek = Prj::join('mkt_pengalaman', 'prj.kd_pengalaman', '=', 'mkt_pengalaman.kd_pengalaman')
    ->join('mkt_klien', 'mkt_klien.kd_klien', '=', 'mkt_pengalaman.kd_klien')
    ->select('mkt_klien.nama_klien', 'mkt_pengalaman.*','prj.*')->
    where('kd_proyek',$kd_proyek)->get(); 

    $data_ib = Prj_ib::join('prj_activity', 'prj_ib.kd_activity', '=', 'prj_activity.kd_activity')
    ->select('prj_ib.*','prj_activity.*')
    ->orderBy('status', 'asc')
    ->where('kd_proyek',$kd_proyek)->get();

    $data_cost = Prj_ib_cost::join('prj_ib', 'prj_ib.kode_ib', '=', 'prj_ib_cost.kode_ib')
    ->join('prj_activity', 'prj_ib.kd_activity', '=', 'prj_activity.kd_activity')
    ->select('prj_ib.*','prj_activity.*','prj_ib_cost.*')
    ->orderBy('prj_ib.date', 'asc')
    ->where('prj_ib.kd_proyek',$kd_proyek)->get();

    return view('proyek/add_ib',compact('proyek','data_ib','data_cost'));
    }

              function edit_ib($kd_proyek, $kode_ib)
    {
    $edit_ib = Prj_ib::join('prj_activity', 'prj_ib.kd_activity', '=', 'prj_activity.kd_activity')
    ->select('prj_ib.*','prj_activity.*')
    ->orderBy('activity', 'asc')->orderBy('sub_activity', 'asc')
    ->where('kd_proyek',$kd_proyek)
    ->where('prj_ib.kode_ib',$kode_ib)->get(); 

    $data_ib = Prj_ib::join('prj_activity', 'prj_ib.kd_activity', '=', 'prj_activity.kd_activity')
    ->select('prj_ib.*','prj_activity.*')
    ->orderBy('activity', 'asc')->orderBy('sub_activity', 'asc')
    ->where('prj_ib.kd_proyek',$kd_proyek)->get();

    $data_cost = Prj_ib_cost::join('prj_ib', 'prj_ib.kode_ib', '=', 'prj_ib_cost.kode_ib')
    ->join('prj_activity', 'prj_ib.kd_activity', '=', 'prj_activity.kd_activity')
    ->select('prj_ib.*','prj_activity.*','prj_ib_cost.*')
    ->orderBy('prj_ib.date', 'asc')
    ->where('prj_ib.kd_proyek',$kd_proyek)->get();
    return view('proyek/edit_ib',compact('edit_ib','data_ib','data_cost'));
    }

        function edit_ib_cost($kd_proyek, $kode_ib, $kd_cost)
    {
    $edit_ib_cost = Prj_ib_cost::join('prj_ib', 'prj_ib.kode_ib', '=', 'prj_ib_cost.kode_ib')
    ->join('prj_activity', 'prj_ib.kd_activity', '=', 'prj_activity.kd_activity')
    ->select('prj_ib.*','prj_activity.*','prj_ib_cost.*')
    ->orderBy('activity', 'asc')->orderBy('sub_activity', 'asc')
    ->where('kd_cost',$kd_cost)->get(); 

    $data_cost = Prj_ib_cost::join('prj_ib', 'prj_ib.kode_ib', '=', 'prj_ib_cost.kode_ib')
    ->join('prj_activity', 'prj_ib.kd_activity', '=', 'prj_activity.kd_activity')
    ->select('prj_ib.*','prj_activity.*','prj_ib_cost.*')
    ->orderBy('prj_ib.date', 'asc')
    ->where('prj_ib.kd_proyek',$kd_proyek)->get();

        return view('proyek/edit_ib_cost',compact('edit_ib_cost','data_cost'));
    }

        function add_termin($kd_proyek)
    {

    $proyek = Prj::join('mkt_pengalaman', 'prj.kd_pengalaman', '=', 'mkt_pengalaman.kd_pengalaman')
    ->join('mkt_klien', 'mkt_klien.kd_klien', '=', 'mkt_pengalaman.kd_klien')
    ->select('mkt_klien.nama_klien', 'mkt_pengalaman.*','prj.*')->
    where('prj.kd_proyek',$kd_proyek)->get(); 

    $data_termin = Prj_termin::join('prj_ib', 'prj_termin.kode_ib', '=', 'prj_ib.kode_ib')
    ->join('prj_activity', 'prj_activity.kd_activity', '=', 'prj_ib.kd_activity')
    ->select('prj_termin.*','prj_ib.*','prj_activity.*')
    ->orderBy('termin_date', 'asc')
    ->where('prj_ib.kd_proyek',$kd_proyek)->paginate(20);

    return view('proyek/termin/add_termin',compact('proyek','data_termin'));
    }

       function edit_termin($kd_proyek, $kode_ib, $kd_termin)
    {

    $edit_termin = Prj_termin::join('sdm_karyawan', 'prj_termin.admin', '=', 'sdm_karyawan.kode')
    ->join('prj_ib', 'prj_termin.kode_ib', '=', 'prj_ib.kode_ib')
    ->join('prj_activity', 'prj_activity.kd_activity', '=', 'prj_ib.kd_activity')
    ->select('prj_termin.*','prj_ib.*','prj_activity.*','sdm_karyawan.*')
    ->orderBy('termin_ke', 'asc')
    ->where('prj_termin.kd_termin',$kd_termin)
    ->where('prj_termin.kd_proyek',$kd_proyek)->get();

    $data_termin = Prj_termin::join('prj_ib', 'prj_termin.kode_ib', '=', 'prj_ib.kode_ib')
    ->join('prj_activity', 'prj_activity.kd_activity', '=', 'prj_ib.kd_activity')
    ->select('prj_termin.*','prj_ib.*','prj_activity.*')
    ->orderBy('termin_ke', 'asc')
    ->where('prj_termin.kd_proyek',$kd_proyek)->get();

    $test = Prj_termin::where('kd_proyek',$kd_proyek)->where('kd_termin',$kd_termin)->get();

    $proyek = Prj::join('mkt_pengalaman', 'prj.kd_pengalaman', '=', 'mkt_pengalaman.kd_pengalaman')
    ->join('mkt_klien', 'mkt_klien.kd_klien', '=', 'mkt_pengalaman.kd_klien')
    ->select('mkt_klien.nama_klien', 'mkt_pengalaman.*','prj.*')->
    where('kd_proyek',$kd_proyek)->get();

    return view('proyek/termin/edit_termin',compact('edit_termin','data_termin','proyek','test'));
    }

//manage team
       function add_team($kd_proyek)
    {

    $proyek = Prj::join('mkt_pengalaman', 'prj.kd_pengalaman', '=', 'mkt_pengalaman.kd_pengalaman')
    ->join('mkt_klien', 'mkt_klien.kd_klien', '=', 'mkt_pengalaman.kd_klien')
    ->select('mkt_klien.nama_klien', 'mkt_pengalaman.*','prj.*')->where('kd_proyek',$kd_proyek)->get(); 

foreach ($proyek as $data){

$pm = $data->pm;
$konsultan1 = $data->konsultan1;
$konsultan2 = $data->konsultan2;
$konsultan3 = $data->konsultan3;
$konsultan4 = $data->konsultan4;
$konsultan5 = $data->konsultan5;

$ta1 = $data->ta1;
$ta2 = $data->ta2;
$ta3 = $data->ta3;
$ta4 = $data->ta4;
$ta5 = $data->ta5;
}

$data_pm = Karyawan::where('kode',$pm)->get();
$data_konsultan1 = Karyawan::where('kode',$konsultan1)->get(); 
$data_konsultan2 = Karyawan::where('kode',$konsultan2)->get(); 
$data_konsultan3 = Karyawan::where('kode',$konsultan3)->get(); 
$data_konsultan4 = Karyawan::where('kode',$konsultan4)->get(); 
$data_konsultan5 = Karyawan::where('kode',$konsultan5)->get(); 

$data_ta1 = Ta::where('kd_ta',$ta1)->get(); 
$data_ta2 = Ta::where('kd_ta',$ta2)->get(); 
$data_ta3 = Ta::where('kd_ta',$ta3)->get(); 
$data_ta4 = Ta::where('kd_ta',$ta4)->get(); 
$data_ta5 = Ta::where('kd_ta',$ta5)->get(); 

return view('proyek/add_team',compact('proyek','data_pm','data_konsultan1','data_konsultan2','data_konsultan3','data_konsultan4','data_konsultan5','data_ta1','data_ta2','data_ta3','data_ta4','data_ta5'));
    }

    //manage UUDP
         function uudp($kd_proyek)
    {

    $proyek = Prj::join('mkt_pengalaman', 'prj.kd_pengalaman', '=', 'mkt_pengalaman.kd_pengalaman')
    ->join('mkt_klien', 'mkt_klien.kd_klien', '=', 'mkt_pengalaman.kd_klien')
    ->select('mkt_klien.nama_klien', 'mkt_pengalaman.*','prj.*')->
    where('kd_proyek',$kd_proyek)->get(); 

    $uudp = Prj_uudp::where('kd_proyek',$kd_proyek)->get();

foreach ($uudp as $data ) {
$cost1 = $data->kd_cost1;
$cost2 = $data->kd_cost2;

}
$approved = "Approved";
 
     $budget = Prj_ib_cost::join('prj_ib', 'prj_ib.kode_ib', '=', 'prj_ib_cost.kode_ib')
    ->join('prj_activity', 'prj_ib.kd_activity', '=', 'prj_activity.kd_activity')
    ->select('prj_ib.*','prj_activity.*','prj_ib_cost.*')
    ->orderBy('prj_ib.date', 'asc')
    ->where('prj_ib.kd_proyek',$kd_proyek)
    ->where('prj_ib_cost.cost_status',$approved)->get();

    $data_uudp = Prj_uudp::join('sdm_karyawan', 'sdm_karyawan.kode', '=', 'prj_uudp.pemohon')
    ->where('kd_proyek',$kd_proyek)
    ->orderBy('date', 'asc')->get();

    return view('proyek/uudp/uudp',compact('proyek','data_uudp','budget'));
    }

        function edit_uudp($kd_proyek, $kd_uudp)
    {

        $approved = "Approved";

    $data_uudp = Prj_uudp::join('sdm_karyawan', 'sdm_karyawan.kode', '=', 'prj_uudp.pemohon')
    ->where('kd_proyek',$kd_proyek)
    ->orderBy('date', 'asc')->get();
    
    $edit_uudp = Prj_uudp::join('sdm_karyawan', 'sdm_karyawan.kode', '=', 'prj_uudp.pemohon')
    ->where('kd_proyek',$kd_proyek)
    ->where('kd_uudp',$kd_uudp)->get();

    $proyek = Prj::join('mkt_pengalaman', 'prj.kd_pengalaman', '=', 'mkt_pengalaman.kd_pengalaman')
    ->join('mkt_klien', 'mkt_klien.kd_klien', '=', 'mkt_pengalaman.kd_klien')
    ->select('mkt_klien.nama_klien', 'mkt_pengalaman.*','prj.*')->
    where('kd_proyek',$kd_proyek)->get(); 

    $budget = Prj_ib_cost::join('prj_ib', 'prj_ib.kode_ib', '=', 'prj_ib_cost.kode_ib')
    ->join('prj_activity', 'prj_ib.kd_activity', '=', 'prj_activity.kd_activity')
    ->select('prj_ib.*','prj_activity.*','prj_ib_cost.*')
    ->orderBy('prj_ib.date', 'asc')
    ->where('prj_ib.kd_proyek',$kd_proyek)
    ->where('prj_ib_cost.cost_status',$approved)->get();

    foreach ($data_uudp as $datas){
    @$vol1 = $datas->volume;
       @$cost1 = $datas->cost;
   @$total1 = $cost1 * $vol1 ;
}

    return view('proyek/uudp/edit_uudp',compact('proyek','edit_uudp','budget','data_uudp'));
    }

        function sppd($kd_proyek)
    {
    $approved = "Approved";

     $budget = Prj_ib_cost::join('prj_ib', 'prj_ib.kode_ib', '=', 'prj_ib_cost.kode_ib')
    ->join('prj_activity', 'prj_ib.kd_activity', '=', 'prj_activity.kd_activity')
    ->select('prj_ib.*','prj_activity.*','prj_ib_cost.*')
    ->orderBy('prj_ib.date', 'asc')
    ->where('prj_ib.kd_proyek',$kd_proyek)
    ->where('prj_ib_cost.cost_status',$approved)->get();

    $proyek = Prj::join('mkt_pengalaman', 'prj.kd_pengalaman', '=', 'mkt_pengalaman.kd_pengalaman')
    ->join('mkt_klien', 'mkt_klien.kd_klien', '=', 'mkt_pengalaman.kd_klien')
    ->select('mkt_klien.nama_klien', 'mkt_pengalaman.*','prj.*')->
    where('kd_proyek',$kd_proyek)->get(); 

    $data_sppd = Prj_sppd::join('sdm_karyawan', 'sdm_karyawan.kode', '=', 'prj_sppd.pemohon')
    ->orderBy('date', 'asc')->where('kd_proyek',$kd_proyek)->get();

    return view('proyek/sppd/sppd',compact('proyek','data_sppd','budget'));
    }

 function edit_sppd($kd_proyek, $kd_sppd)
    {

    $approved = "Approved";

    $data_sppd = Prj_sppd::join('sdm_karyawan', 'sdm_karyawan.kode', '=', 'prj_sppd.pemohon')
    ->join('prj_ib_cost', 'prj_ib_cost.kd_cost', '=', 'prj_sppd.kd_cost1')
    ->select('prj_ib_cost.*', 'prj_sppd.*', 'sdm_karyawan.*')
    ->where('prj_ib_cost.kd_proyek',$kd_proyek)
    ->orderBy('date', 'asc')->get();
    
    $edit_sppd = Prj_sppd::join('sdm_karyawan', 'sdm_karyawan.kode', '=', 'prj_sppd.pemohon')
    ->where('kd_proyek',$kd_proyek)
    ->where('kd_sppd',$kd_sppd)->get();

    $proyek = Prj::join('mkt_pengalaman', 'prj.kd_pengalaman', '=', 'mkt_pengalaman.kd_pengalaman')
    ->join('mkt_klien', 'mkt_klien.kd_klien', '=', 'mkt_pengalaman.kd_klien')
    ->select('mkt_klien.nama_klien', 'mkt_pengalaman.*','prj.*')->
    where('kd_proyek',$kd_proyek)->get();

    $budget = Prj_ib_cost::join('prj_ib', 'prj_ib.kode_ib', '=', 'prj_ib_cost.kode_ib')
    ->join('prj_activity', 'prj_ib.kd_activity', '=', 'prj_activity.kd_activity')
    ->select('prj_ib.*','prj_activity.*','prj_ib_cost.*')
    ->orderBy('prj_ib.date', 'asc')
    ->where('prj_ib.kd_proyek',$kd_proyek)
    ->where('prj_ib_cost.cost_status',$approved)->get();

    foreach ($data_sppd as $datas){
    @$vol1 = $datas->volume;
    @$cost1 = $datas->cost;
   @$total1 = $cost1 * $vol1 ;
}
    return view('proyek/sppd/edit_sppd',compact('proyek','edit_sppd','budget','data_sppd'));
}

    //manage project
    function create()
    {
       return view('proyek/insert');
    } 
    
    function store(Request $request)
    {
        $this->validate($request, [
'kd_pengalaman' => 'required|unique:prj,kd_pengalaman',

'tax_status' => 'required|max:50',
'tax_value' => 'required|max:50',
'pm' => 'required',

 ]);

$kd_proyek = Prj::where('kd_proyek', \DB::raw("(select max(kd_proyek) from prj)"))->get();
if (count($kd_proyek)){
foreach ($kd_proyek as $data){
    $d = ((int)substr($data->kd_proyek,3)+1);
    $kd = "PRJ".sprintf("%03s",$d);
}
}else{
    $kd = "PRJ001";
}

$prj = new Prj();
$prj->kd_proyek  = $kd;
    $prj->kd_pengalaman = $request->get('kd_pengalaman');
    $prj->tax_status = $request->get('tax_status');
    $prj->tax_value = $request->get('tax_value');
    $prj->pm = $request->get('pm');
    $prj->konsultan1 = $request->get('konsultan1');
    $prj->konsultan2 = $request->get('konsultan2');
    $prj->konsultan3 = $request->get('konsultan3');
    $prj->konsultan4 = $request->get('konsultan4');
    $prj->konsultan5 = $request->get('konsultan5');
    $prj->konsultan6 = $request->get('konsultan6');
    $prj->konsultan7 = $request->get('konsultan7');
    $prj->konsultan8 = $request->get('konsultan8');
    $prj->konsultan9 = $request->get('konsultan9');
    $prj->konsultan10 = $request->get('konsultan10');
    $prj->ta1 = $request->get('ta1');
    $prj->ta2 = $request->get('ta2');
    $prj->ta3 = $request->get('ta3');
    $prj->ta4 = $request->get('ta4');
    $prj->ta5 = $request->get('ta5');
    $prj->ta6 = $request->get('ta6');
    $prj->ta7 = $request->get('ta7');
    $prj->ta8 = $request->get('ta8');
    $prj->ta9 = $request->get('ta9');
    $prj->ta10 = $request->get('ta10');
    $prj->proyek_status = "open";

    $prj->save();

    \Session::flash('success','Data Successfully Added');
    return redirect('proyek');    
    }


 function destroy(Request $request, $kd_proyek)
    {

    $data1 = Prj_termin::where('kd_proyek', $kd_proyek);
    $data2 = Prj_ib::where('kd_proyek', $kd_proyek);
    $data3 = Prj_ib_cost::where('kd_proyek', $kd_proyek);
    $data4 = Prj::where('kd_proyek', $kd_proyek);
    $data5 = Prj_uudp::where('kd_proyek', $kd_proyek);
    $data6 = Prj_sppd::where('kd_proyek', $kd_proyek);
    $data1->delete();
    $data2->delete();
    $data3->delete();
    $data4->delete();
    $data5->delete();
    $data6->delete();
    \Session::flash('success','Data Proyek & Relations Berhasil Dihapus');
    return redirect('/proyek');
}


function update(Request $request, $kd_proyek) 
{
$this->validate($request, [
'tax_status' => 'required|max:50',
'tax_value' => 'required|max:50',

 ]);
    $data = Prj::find($kd_proyek);
    $data->tax_status = $request->get('tax_status');
    $data->tax_value = $request->get('tax_value');
    $data->save();  
    \Session::flash('success','Data Successfully Updated');
    return redirect('/proyek/detail/'.$kd_proyek);
    }

function update_personil(Request $request, $kd_proyek) 
{

        $this->validate($request, [
'kd_proyek' => 'required',
'pm' => 'required',

 ]);

    $data = Prj::find($kd_proyek);
    $data->kd_proyek = $request->get('kd_proyek');
    $data->pm = $request->get('pm');
    $data->konsultan1 = $request->get('konsultan1');
    $data->konsultan2 = $request->get('konsultan2');
    $data->konsultan3 = $request->get('konsultan3');
    $data->konsultan4 = $request->get('konsultan4');
    $data->konsultan5 = $request->get('konsultan5');
    $data->ta1 = $request->get('ta1');
    $data->ta2 = $request->get('ta2');
    $data->ta3 = $request->get('ta3');
    $data->ta4 = $request->get('ta4');
    $data->ta5 = $request->get('ta5');
    $data->save();  
    \Session::flash('success','Data Successfully Updated');
    return redirect('/proyek/add_team/'.$kd_proyek);
    }

        public function lookup_pm(Request $request)
    {
    if ($request->has('nama')) 
    {        
    $query = ($request->input('nama'));
    $lookup = Karyawan::where('nama', 'LIKE', '%' . $query . '%')
            ->orderBy('nama', 'asc')
            ->get();
    }else{ 
    $lookup = Karyawan::orderBy('nama', 'asc')->get();  
    } 
    return view('proyek.lookup.lookup_pm', compact('lookup'));   
    }

        public function lookup_konsultan1(Request $request)
    {
    if ($request->has('nama')) 
    {        
    $query = ($request->input('nama'));
    $lookup = Karyawan::where('nama', 'LIKE', '%' . $query . '%')
            ->orderBy('nama', 'asc')
            ->get();
    }else{ 
    $lookup = Karyawan::orderBy('nama', 'asc')->get();  
    } 
    return view('proyek.lookup.lookup_konsultan1', compact('lookup'));   
    }

            public function lookup_konsultan2(Request $request)
    {
    if ($request->has('nama')) 
    {        
    $query = ($request->input('nama'));
    $lookup = Karyawan::where('nama', 'LIKE', '%' . $query . '%')
            ->orderBy('nama', 'asc')
            ->get();
    }else{ 
    $lookup = Karyawan::orderBy('nama', 'asc')->get();  
    } 
    return view('proyek.lookup.lookup_konsultan2', compact('lookup'));   
    }

         public function lookup_konsultan3(Request $request)
    {
    if ($request->has('nama')) 
    {        
    $query = ($request->input('nama'));
    $lookup = Karyawan::where('nama', 'LIKE', '%' . $query . '%')
            ->orderBy('nama', 'asc')
            ->get();
    }else{ 
    $lookup = Karyawan::orderBy('nama', 'asc')->get();  
    } 
    return view('proyek.lookup.lookup_konsultan3', compact('lookup'));   
    }

       public function lookup_konsultan4(Request $request)
    {
    if ($request->has('nama')) 
    {        
    $query = ($request->input('nama'));
    $lookup = Karyawan::where('nama', 'LIKE', '%' . $query . '%')
            ->orderBy('nama', 'asc')
            ->get();
    }else{ 
    $lookup = Karyawan::orderBy('nama', 'asc')->get();  
    } 
    return view('proyek.lookup.lookup_konsultan4', compact('lookup'));   
    }

   public function lookup_konsultan5(Request $request)
    {
    if ($request->has('nama')) 
    {        
    $query = ($request->input('nama'));
    $lookup = Karyawan::where('nama', 'LIKE', '%' . $query . '%')
            ->orderBy('nama', 'asc')
            ->get();
    }else{ 
    $lookup = Karyawan::orderBy('nama', 'asc')->get();  
    } 
    return view('proyek.lookup.lookup_konsultan5', compact('lookup'));   
    }

        public function lookup_ta1(Request $request)
    {
    if ($request->has('nama')) 
    {        
    $query = ($request->input('nama'));
    $lookup = Ta::where('nama', 'LIKE', '%' . $query . '%')
            ->orderBy('nama', 'asc')
            ->get();
    }else{ 
    $lookup = Ta::orderBy('nama', 'asc')->get();  
    } 
    return view('proyek.lookup.lookup_ta1', compact('lookup'));   
    }

        public function lookup_ta2(Request $request)
    {
    if ($request->has('nama')) 
    {        
    $query = ($request->input('nama'));
    $lookup = Ta::where('nama', 'LIKE', '%' . $query . '%')
            ->orderBy('nama', 'asc')
            ->get();
    }else{ 
    $lookup = Ta::orderBy('nama', 'asc')->get();  
    } 
    return view('proyek.lookup.lookup_ta2', compact('lookup'));   
    }

        public function lookup_ta3(Request $request)
    {
    if ($request->has('nama')) 
    {        
    $query = ($request->input('nama'));
    $lookup = Ta::where('nama', 'LIKE', '%' . $query . '%')
            ->orderBy('nama', 'asc')
            ->get();
    }else{ 
    $lookup = Ta::orderBy('nama', 'asc')->get();  
    } 
    return view('proyek.lookup.lookup_ta3', compact('lookup'));   
    }

            public function lookup_ta4(Request $request)
    {
    if ($request->has('nama')) 
    {        
    $query = ($request->input('nama'));
    $lookup = Ta::where('nama', 'LIKE', '%' . $query . '%')
            ->orderBy('nama', 'asc')
            ->get();
    }else{ 
    $lookup = Ta::orderBy('nama', 'asc')->get();  
    } 
    return view('proyek.lookup.lookup_ta4', compact('lookup'));   
    }

        public function lookup_ta5(Request $request)
    {
    if ($request->has('nama')) 
    {        
    $query = ($request->input('nama'));
    $lookup = Ta::where('nama', 'LIKE', '%' . $query . '%')
            ->orderBy('nama', 'asc')
            ->get();
    }else{ 
    $lookup = Ta::orderBy('nama', 'asc')->get();  
    } 
    return view('proyek.lookup.lookup_ta5', compact('lookup'));   
    }

    function notif(Request $request)

    {

    $pertanggungjawaban = "pertanggungjawaban";
    $activity = "activity";

    $prt = Prj_notif::where('notif',$pertanggungjawaban)->get();

    $act = Prj_notif::where('notif',$activity)->get();

    return view('proyek.notif', compact('prt','act'));
    }

        function update_notif(Request $request, $id) 
{

    $this->validate($request,[
    'notif' => 'required',
    'interval' => 'required',
    'status' => 'required',
    ]);

    $data = Prj_notif::find($id);
    $data->notif = $request->get('notif');
    $data->interval = $request->get('interval');
    $data->status = $request->get('status');
    $data->save();  
    \Session::flash('success','Data Notif Berhasil Di Ubah');
    return redirect('/proyek/notif');   
    }

    function store_notif(request $request)
{
    $this->validate($request,[
    'notif' => 'required',
    'interval' => 'required',
    'status' => 'required',
    ]);

    $data = new Prj_notif();
    $data->notif = $request->get('notif');
    $data->interval = $request->get('interval');
    $data->status = $request->get('status');
    $data->save();  
    \Session::flash('success','Data Notif Berhasil Di Tambah');
    return redirect('/proyek/notif');   
}

 function destroy_notif(Request $request, $id)
    {
        $data = Prj_notif::findorfail($id);
        $data->delete();

    \Session::flash('success','Data Berhasil Dihapus');
    return redirect('/proyek/notif');
        }
}