<?php
namespace App\Http\Controllers;

use App\Prj;
use App\Klien;
use App\Karyawan;
use App\Prj_ib;
use App\Prj_termin;
use App\Ta;
use App\Prj_uudp;
use App\Prj_sppd;
use App\Prj_ib_cost;

use Illuminate\Http\Request;

class Prj_PrintController extends Controller
{

    public function print_uudp(Request $request,$kd_uudp)
    
    {
    $uudp = Prj_uudp::select('kd_proyek')->where('kd_uudp', $kd_uudp)->get();
    foreach($uudp as $value){
    $kd_proyek = $value->kd_proyek;
}


    $proyek = Prj::join('mkt_pengalaman', 'prj.kd_pengalaman', '=', 'mkt_pengalaman.kd_pengalaman')
    ->join('mkt_klien', 'mkt_klien.kd_klien', '=', 'mkt_pengalaman.kd_klien')
    ->select('mkt_klien.nama_klien', 'mkt_pengalaman.*','prj.*')->
    where('kd_proyek',$kd_proyek)->get(); 

    foreach ($proyek as $data){

$pm = $data->pm;
$konsultan1 = $data->konsultan1;
$ta1 = $data->ta1;

}

$data_pm = Karyawan::where('kode',$pm)->get();
$data_manager = Karyawan::where('jabatan',"Manajer")->where('divisi',"DKO")->get(); 
$data_gm = Karyawan::where('jabatan',"General Manajer")->where('divisi',"DKO")->get(); 


    $uudp1 = Prj_uudp::join('sdm_karyawan', 'sdm_karyawan.kode', '=', 'prj_uudp.pemohon')
    ->join('prj_ib_cost', 'Prj_uudp.kd_cost1', '=', 'prj_ib_cost.kd_cost')
    ->join('prj_ib', 'prj_ib.kode_ib', '=', 'prj_ib_cost.kode_ib')
    ->join('prj_activity', 'prj_ib.kd_activity', '=', 'prj_activity.kd_activity')
    ->orderBy('kd_cost', 'asc')->where('prj_uudp.kd_uudp',$kd_uudp)->get();


$uudp2 = Prj_uudp::join('prj_ib_cost', 'Prj_uudp.kd_cost2', '=', 'prj_ib_cost.kd_cost')
    ->join('prj_ib', 'prj_ib.kode_ib', '=', 'prj_ib_cost.kode_ib')
        ->join('prj_activity', 'prj_ib.kd_activity', '=', 'prj_activity.kd_activity')
    ->orderBy('kd_cost', 'asc')->where('prj_uudp.kd_uudp',$kd_uudp)->get();


 $uudp3 = Prj_uudp::join('prj_ib_cost', 'Prj_uudp.kd_cost3', '=', 'prj_ib_cost.kd_cost')
    ->join('prj_ib', 'prj_ib.kode_ib', '=', 'prj_ib_cost.kode_ib')
        ->join('prj_activity', 'prj_ib.kd_activity', '=', 'prj_activity.kd_activity')
    ->orderBy('kd_cost', 'asc')->where('prj_uudp.kd_uudp',$kd_uudp)->get();


  $uudp4 = Prj_uudp::join('prj_ib_cost', 'Prj_uudp.kd_cost4', '=', 'prj_ib_cost.kd_cost')
    ->join('prj_ib', 'prj_ib.kode_ib', '=', 'prj_ib_cost.kode_ib')
        ->join('prj_activity', 'prj_ib.kd_activity', '=', 'prj_activity.kd_activity')
    ->orderBy('kd_cost', 'asc')->where('prj_uudp.kd_uudp',$kd_uudp)->get();

   $uudp5 = Prj_uudp::join('prj_ib_cost', 'Prj_uudp.kd_cost5', '=', 'prj_ib_cost.kd_cost')
    ->join('prj_ib', 'prj_ib.kode_ib', '=', 'prj_ib_cost.kode_ib')
        ->join('prj_activity', 'prj_ib.kd_activity', '=', 'prj_activity.kd_activity')
    ->orderBy('kd_cost', 'asc')->where('prj_uudp.kd_uudp',$kd_uudp)->get();

  function tanggal_indo($tanggal)
{
  $bulan = array (1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
      );
  $split = explode('-', $tanggal);
  return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
}
        foreach ($uudp1 as $data) {
        $tgl_uudp = $data->date;
    }

        $tgl_uudp_indo = tanggal_indo($tgl_uudp);


        if($request->view_type === 'download') {
$pdf = PDF::loadView('proyek/uudp/print_uudp',compact('uudp1','uudp2','uudp3','uudp4','uudp5','proyek','data_pm','data_manager','data_gm','tgl_uudp_indo'));
    return $pdf->download('uudp.pdf');        
} else {
$view = view('proyek/uudp/print_uudp',compact('uudp1','uudp2','uudp3','uudp4','uudp5','proyek','data_pm','data_manager','data_gm','tgl_uudp_indo'));

            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($view->render());
            return $pdf->stream();
        }
    }

    public function print_sppd(Request $request,$kd_sppd)
    
    {

    $sppd = Prj_sppd::select('kd_proyek')->where('kd_sppd', $kd_sppd)->get();
    foreach($sppd as $value){
    $kd_proyek = $value->kd_proyek;
}
    $proyek = Prj::join('mkt_pengalaman', 'prj.kd_pengalaman', '=', 'mkt_pengalaman.kd_pengalaman')
    ->join('mkt_klien', 'mkt_klien.kd_klien', '=', 'mkt_pengalaman.kd_klien')
    ->select('mkt_klien.nama_klien', 'mkt_pengalaman.*','prj.*')->
    where('kd_proyek',$kd_proyek)->get(); 

    foreach ($proyek as $data){

$pm = $data->pm;
$konsultan1 = $data->konsultan1;
$ta1 = $data->ta1;

}
$data_pm = Karyawan::where('kode',$pm)->get();
$data_manager = Karyawan::where('jabatan',"Manajer")->where('divisi',"DKO")->get(); 
$data_gm = Karyawan::where('jabatan',"General Manajer")->where('divisi',"DKO")->get(); 


    $sppd1 = Prj_sppd::join('sdm_karyawan', 'sdm_karyawan.kode', '=', 'prj_sppd.pemohon')
    ->join('prj_ib_cost', 'prj_sppd.kd_cost1', '=', 'prj_ib_cost.kd_cost')
    ->join('prj_ib', 'prj_ib.kode_ib', '=', 'prj_ib_cost.kode_ib')
    ->join('prj_activity', 'prj_ib.kd_activity', '=', 'prj_activity.kd_activity')
    ->orderBy('kd_cost', 'asc')->where('prj_sppd.kd_sppd',$kd_sppd)->get();

$sppd2 = Prj_sppd::join('prj_ib_cost', 'prj_sppd.kd_cost2', '=', 'prj_ib_cost.kd_cost')
    ->join('prj_ib', 'prj_ib.kode_ib', '=', 'prj_ib_cost.kode_ib')
        ->join('prj_activity', 'prj_ib.kd_activity', '=', 'prj_activity.kd_activity')
    ->orderBy('kd_cost', 'asc')->where('prj_sppd.kd_sppd',$kd_sppd)->get();


 $sppd3 = Prj_sppd::join('prj_ib_cost', 'prj_sppd.kd_cost3', '=', 'prj_ib_cost.kd_cost')
    ->join('prj_ib', 'prj_ib.kode_ib', '=', 'prj_ib_cost.kode_ib')
        ->join('prj_activity', 'prj_ib.kd_activity', '=', 'prj_activity.kd_activity')
    ->orderBy('kd_cost', 'asc')->where('prj_sppd.kd_sppd',$kd_sppd)->get();


  $sppd4 = Prj_sppd::join('prj_ib_cost', 'prj_sppd.kd_cost4', '=', 'prj_ib_cost.kd_cost')
    ->join('prj_ib', 'prj_ib.kode_ib', '=', 'prj_ib_cost.kode_ib')
        ->join('prj_activity', 'prj_ib.kd_activity', '=', 'prj_activity.kd_activity')
    ->orderBy('kd_cost', 'asc')->where('prj_sppd.kd_sppd',$kd_sppd)->get();

   $sppd5 = Prj_sppd::join('prj_ib_cost', 'prj_sppd.kd_cost5', '=', 'prj_ib_cost.kd_cost')
    ->join('prj_ib', 'prj_ib.kode_ib', '=', 'prj_ib_cost.kode_ib')
        ->join('prj_activity', 'prj_ib.kd_activity', '=', 'prj_activity.kd_activity')
    ->orderBy('kd_cost', 'asc')->where('prj_sppd.kd_sppd',$kd_sppd)->get();


 function tanggal_indo($tanggal)
{
  $bulan = array (1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
      );
  $split = explode('-', $tanggal);
  return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
}
        foreach ($sppd1 as $data) {
        $tgl_sppd = $data->date;
    }

        $tgl_sppd_indo = tanggal_indo($tgl_sppd);


        if($request->view_type === 'download') {
$pdf = PDF::loadView('proyek/sppd/print_sppd',compact('sppd1','sppd2','sppd3','sppd4','sppd5','proyek','data_pm','data_manager','data_gm','tgl_sppd_indo'));
    return $pdf->download('sppd.pdf');        
} else {
$view = view('proyek/sppd/print_sppd',compact('sppd1','sppd2','sppd3','sppd4','sppd5','proyek','data_pm','data_manager','data_gm','tgl_sppd_indo'));

            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($view->render());
            return $pdf->stream();
        }
    }


    public function print_termin(Request $request,$kd_termin,$kd_proyek)
    
    {

    $proyek = Prj::join('mkt_pengalaman', 'prj.kd_pengalaman', '=', 'mkt_pengalaman.kd_pengalaman')
    ->join('mkt_klien', 'mkt_klien.kd_klien', '=', 'mkt_pengalaman.kd_klien')
    ->select('mkt_klien.*', 'mkt_pengalaman.*','prj.*')->
    where('kd_proyek',$kd_proyek)->get(); 

        foreach ($proyek as $data){

$pm = $data->pm;
$konsultan1 = $data->konsultan1;
$ta1 = $data->ta1;

}

$data_pm = Karyawan::where('kode',$pm)->get();
$data_manager = Karyawan::where('jabatan',"Manajer")->where('divisi',"DKO")->get(); 
$data_gm = Karyawan::where('jabatan',"General Manajer")->where('divisi',"DKO")->get(); 


    $data_termin = Prj_termin::join('sdm_karyawan', 'sdm_karyawan.kode', '=', 'prj_termin.admin')
    ->join('prj_ib', 'prj_termin.kode_ib', '=', 'prj_ib.kode_ib')
    ->join('prj_activity', 'prj_activity.kd_activity', '=', 'prj_ib.kd_activity')
    ->select('prj_termin.*','prj_ib.*','prj_activity.*','sdm_karyawan.*')
    ->orderBy('termin_ke', 'asc')
    ->where('prj_termin.kd_termin',$kd_termin)
    ->where('prj_termin.kd_proyek',$kd_proyek)->get();

     function tanggal_indo($tanggal)
{
  $bulan = array (1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
      );
  $split = explode('-', $tanggal);
  return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
}

        $tgl_termin_indo = tanggal_indo(date("Y-m-d"));


    if($request->view_type === 'download') {
$pdf = PDF::loadView('proyek/termin/print_termin',compact('proyek','data_termin','data_pm','data_manager','data_gm','tgl_termin_indo'));
    return $pdf->download('sppd.pdf');        
}   else {
$view = view('proyek/termin/print_termin',compact('proyek','data_termin','data_pm','data_manager','data_gm','tgl_termin_indo'));

            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($view->render());
            return $pdf->stream();
        }
}
}
