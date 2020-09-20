<?php
namespace App\Http\Controllers;
use App\Notif_penjualan;
use App\Pengalaman;
use App\Pem_tender;
use App\Pem_non_tender;
use App\His_Pem_non_tender;
use App\His_Pem_tender;
use App\Prj;
use App\Prj_uudp;
use App\Prj_sppd;
use App\Prj_termin;
use App\Prj_ib_cost;

use Illuminate\Http\Request;

class DashboardController extends Controller
{


function home2(Request $request)
    {      
            $notifikasi = Notif_penjualan::orderBy('created_at', 'desc')->get();
            $count_notif = Notif_penjualan::count(); 
            $pengalaman = Pengalaman::count(); 
            $tender = Pem_tender::count(); 
            $non_tender = Pem_non_tender::count();
            $pending = Pem_non_tender::where('status','PENDING')->count();
            $yq = date("Y");
            $yq1 = date("Y")-1;
            $yq2 = date("Y")-2;
            $yq3 = date("Y")-3;
            $yq4 = date("Y")-4;
            $q = Pengalaman::WhereYear('kontrak_mulai', '=',$yq)->sum('nilai_kontrak','nilai_addendum');
            $q1 = Pengalaman::WhereYear('kontrak_mulai', '=',$yq1)->sum('nilai_kontrak','nilai_addendum');
            $q2 = Pengalaman::WhereYear('kontrak_mulai', '=',$yq2)->sum('nilai_kontrak','nilai_addendum');
            $q3 = Pengalaman::WhereYear('kontrak_mulai', '=',$yq3)->sum('nilai_kontrak','nilai_addendum');
            $q4 = Pengalaman::WhereYear('kontrak_mulai', '=',$yq4)->sum('nilai_kontrak','nilai_addendum');
            $p_ratio = Pengalaman::WhereYear('kontrak_mulai',$yq)->count();
            $k_ratio1 = His_Pem_tender::WhereYear('created_at',$yq)->count();
            $k_ratio2 = His_Pem_non_tender::WhereYear('created_at',$yq)->count();
            $sektor = \DB::table('mkt_lib_sektor')->get(); 

            $project_active = Prj::where('proyek_status','open')->count();
            $project_non_active = Prj::where('proyek_status','close')->count();
            //->limit(10)
            //>get();
            //$notif = Notif_penjualan::orderBy('created_at', 'asc')->get();
            //$count_notif = Notif_penjualan::count(); 

            $p1 = Pengalaman::WhereYear('kontrak_mulai', '=',$yq)
            ->WhereMonth('kontrak_mulai', '=',1)->sum('nilai_kontrak','nilai_addendum');

            $p2 = Pengalaman::WhereYear('kontrak_mulai', '=',$yq)
            ->WhereMonth('kontrak_mulai', '=',2)->sum('nilai_kontrak','nilai_addendum');

            $p3 = Pengalaman::WhereYear('kontrak_mulai', '=',$yq)
            ->WhereMonth('kontrak_mulai', '=',3)->sum('nilai_kontrak','nilai_addendum');
            $p4 = Pengalaman::WhereYear('kontrak_mulai', '=',$yq)
            ->WhereMonth('kontrak_mulai', '=',4)->sum('nilai_kontrak','nilai_addendum');
            $p5 = Pengalaman::WhereYear('kontrak_mulai', '=',$yq)
            ->WhereMonth('kontrak_mulai', '=',5)->sum('nilai_kontrak','nilai_addendum');

            $p6 = Pengalaman::WhereYear('kontrak_mulai', '=',$yq)
            ->WhereMonth('kontrak_mulai', '=',6)->sum('nilai_kontrak','nilai_addendum');

            $p7 = Pengalaman::WhereYear('kontrak_mulai', '=',$yq)
            ->WhereMonth('kontrak_mulai', '=',7)->sum('nilai_kontrak','nilai_addendum');    

            $p8 = Pengalaman::WhereYear('kontrak_mulai', '=',$yq)
            ->WhereMonth('kontrak_mulai', '=',8)->sum('nilai_kontrak','nilai_addendum');

            $p9 = Pengalaman::WhereYear('kontrak_mulai', '=',$yq)
            ->WhereMonth('kontrak_mulai', '=',9)->sum('nilai_kontrak','nilai_addendum');

            $p10 = Pengalaman::WhereYear('kontrak_mulai', '=',$yq)
            ->WhereMonth('kontrak_mulai', '=',10)->sum('nilai_kontrak','nilai_addendum');

            $p11 = Pengalaman::WhereYear('kontrak_mulai', '=',$yq)
            ->WhereMonth('kontrak_mulai', '=',11)->sum('nilai_kontrak','nilai_addendum');

            $p12 = Pengalaman::WhereYear('kontrak_mulai', '=',$yq)
            ->WhereMonth('kontrak_mulai', '=',12)->sum('nilai_kontrak','nilai_addendum');
//cost

            $t1 = Prj::join('mkt_pengalaman', 'prj.kd_pengalaman', '=', 'mkt_pengalaman.kd_pengalaman')
            ->join('prj_termin', 'prj.kd_proyek', '=', 'prj_termin.kd_proyek')
            ->join('prj_ib', 'prj_termin.kode_ib', '=', 'prj_ib.kode_ib')
            ->select('prj_termin.*','prj.*','mkt_pengalaman.*','prj_ib.*')
            ->where('proyek_status','open')
            ->where('termin_status','close')
            ->WhereYear('prj_ib.date', '=',$yq)
            ->WhereMonth('prj_ib.date', '=',1)->get('');

            $t2 = Prj::join('mkt_pengalaman', 'prj.kd_pengalaman', '=', 'mkt_pengalaman.kd_pengalaman')
            ->join('prj_termin', 'prj.kd_proyek', '=', 'prj_termin.kd_proyek')
            ->join('prj_ib', 'prj_termin.kode_ib', '=', 'prj_ib.kode_ib')
            ->select('prj_termin.*','prj.*','mkt_pengalaman.*','prj_ib.*')
            ->where('proyek_status','open')
                ->where('termin_status','close')
            ->WhereYear('prj_ib.date', '=',$yq)
            ->WhereMonth('prj_ib.date', '=',2)->get('');

            $t3 = Prj::join('mkt_pengalaman', 'prj.kd_pengalaman', '=', 'mkt_pengalaman.kd_pengalaman')
            ->join('prj_termin', 'prj.kd_proyek', '=', 'prj_termin.kd_proyek')
            ->join('prj_ib', 'prj_termin.kode_ib', '=', 'prj_ib.kode_ib')
            ->select('prj_termin.*','prj.*','mkt_pengalaman.*','prj_ib.*')
                ->where('termin_status','close')
            ->where('proyek_status','open')
            ->WhereYear('prj_ib.date', '=',$yq)
            ->WhereMonth('prj_ib.date', '=',3)->get('');

            $t4 = Prj::join('mkt_pengalaman', 'prj.kd_pengalaman', '=', 'mkt_pengalaman.kd_pengalaman')
            ->join('prj_termin', 'prj.kd_proyek', '=', 'prj_termin.kd_proyek')
            ->join('prj_ib', 'prj_termin.kode_ib', '=', 'prj_ib.kode_ib')
            ->select('prj_termin.*','prj.*','mkt_pengalaman.*','prj_ib.*')
                ->where('termin_status','close')
            ->where('proyek_status','open')
            ->WhereYear('prj_ib.date', '=',$yq)
            ->WhereMonth('prj_ib.date', '=',4)->get('');

            $t5 = Prj::join('mkt_pengalaman', 'prj.kd_pengalaman', '=', 'mkt_pengalaman.kd_pengalaman')
            ->join('prj_termin', 'prj.kd_proyek', '=', 'prj_termin.kd_proyek')
            ->join('prj_ib', 'prj_termin.kode_ib', '=', 'prj_ib.kode_ib')
            ->select('prj_termin.*','prj.*','mkt_pengalaman.*','prj_ib.*')
                ->where('termin_status','close')
            ->where('proyek_status','open')
            ->WhereYear('prj_ib.date', '=',$yq)
            ->WhereMonth('prj_ib.date', '=',5)->get('');

            $t6 = Prj::join('mkt_pengalaman', 'prj.kd_pengalaman', '=', 'mkt_pengalaman.kd_pengalaman')
            ->join('prj_termin', 'prj.kd_proyek', '=', 'prj_termin.kd_proyek')
            ->join('prj_ib', 'prj_termin.kode_ib', '=', 'prj_ib.kode_ib')
            ->select('prj_termin.*','prj.*','mkt_pengalaman.*','prj_ib.*')
                ->where('termin_status','close')
            ->where('proyek_status','open')
            ->WhereYear('prj_ib.date', '=',$yq)
            ->WhereMonth('prj_ib.date', '=',6)->get('');
            
            $t7 = Prj::join('mkt_pengalaman', 'prj.kd_pengalaman', '=', 'mkt_pengalaman.kd_pengalaman')
            ->join('prj_termin', 'prj.kd_proyek', '=', 'prj_termin.kd_proyek')
            ->join('prj_ib', 'prj_termin.kode_ib', '=', 'prj_ib.kode_ib')
            ->select('prj_termin.*','prj.*','mkt_pengalaman.*','prj_ib.*')
                ->where('termin_status','close')
            ->where('proyek_status','open')
            ->WhereYear('prj_ib.date', '=',$yq)
            ->WhereMonth('prj_ib.date', '=',7)->get('');

            $t8 = Prj::join('mkt_pengalaman', 'prj.kd_pengalaman', '=', 'mkt_pengalaman.kd_pengalaman')
            ->join('prj_termin', 'prj.kd_proyek', '=', 'prj_termin.kd_proyek')
            ->join('prj_ib', 'prj_termin.kode_ib', '=', 'prj_ib.kode_ib')
            ->select('prj_termin.*','prj.*','mkt_pengalaman.*','prj_ib.*')
                ->where('termin_status','close')
            ->where('proyek_status','open')
            ->WhereYear('prj_ib.date', '=',$yq)
            ->WhereMonth('prj_ib.date', '=',8)->get('');

            $t9 = Prj::join('mkt_pengalaman', 'prj.kd_pengalaman', '=', 'mkt_pengalaman.kd_pengalaman')
            ->join('prj_termin', 'prj.kd_proyek', '=', 'prj_termin.kd_proyek')
            ->join('prj_ib', 'prj_termin.kode_ib', '=', 'prj_ib.kode_ib')
            ->select('prj_termin.*','prj.*','mkt_pengalaman.*','prj_ib.*')
                ->where('termin_status','close')
            ->where('proyek_status','open')
            ->WhereYear('prj_ib.date', '=',$yq)
            ->WhereMonth('prj_ib.date', '=',9)->get('');
            
            $t10   = Prj::join('mkt_pengalaman', 'prj.kd_pengalaman', '=', 'mkt_pengalaman.kd_pengalaman')
            ->join('prj_termin', 'prj.kd_proyek', '=', 'prj_termin.kd_proyek')
            ->join('prj_ib', 'prj_termin.kode_ib', '=', 'prj_ib.kode_ib')
            ->select('prj_termin.*','prj.*','mkt_pengalaman.*','prj_ib.*')
                ->where('termin_status','close')
            ->where('proyek_status','open')
            ->WhereYear('prj_ib.date', '=',$yq)
            ->WhereMonth('prj_ib.date', '=',10)->get('');

            $t11 = Prj::join('mkt_pengalaman', 'prj.kd_pengalaman', '=', 'mkt_pengalaman.kd_pengalaman')
            ->join('prj_termin', 'prj.kd_proyek', '=', 'prj_termin.kd_proyek')
            ->join('prj_ib', 'prj_termin.kode_ib', '=', 'prj_ib.kode_ib')
            ->select('prj_termin.*','prj.*','mkt_pengalaman.*','prj_ib.*')
                ->where('termin_status','close')
            ->where('proyek_status','open')
            ->WhereYear('prj_ib.date', '=',$yq)
            ->WhereMonth('prj_ib.date', '=',11)->get('');
            
            $t12 = Prj::join('mkt_pengalaman', 'prj.kd_pengalaman', '=', 'mkt_pengalaman.kd_pengalaman')
            ->join('prj_termin', 'prj.kd_proyek', '=', 'prj_termin.kd_proyek')
            ->join('prj_ib', 'prj_termin.kode_ib', '=', 'prj_ib.kode_ib')
            ->select('prj_termin.*','prj.*','mkt_pengalaman.*','prj_ib.*')
                ->where('termin_status','close')
            ->where('proyek_status','open')
            ->WhereYear('prj_ib.date', '=',$yq)
            ->WhereMonth('prj_ib.date', '=',12)->get('');    

            $uudp = Prj_uudp::where('status_uudp','open')->count();

            $nilai_uudp = Prj_uudp::sum('nilai_uudp');

            $sppd = Prj_sppd::where('status_sppd','open')->count();

            $nilai_sppd = Prj_sppd::sum('nilai_sppd');

            @$actual_cost = $nilai_sppd + $nilai_uudp;

            $tagihan = prj_termin::where('termin_status','open')->count();

            $nilai_tagihan = Prj::join('mkt_pengalaman', 'prj.kd_pengalaman', '=', 'mkt_pengalaman.kd_pengalaman')
            ->join('prj_termin', 'prj.kd_proyek', '=', 'prj_termin.kd_proyek')
            ->join('prj_ib', 'prj_termin.kode_ib', '=', 'prj_ib.kode_ib')
            ->select('prj_termin.*','prj.*','mkt_pengalaman.*','prj_ib.*')
            ->where('proyek_status','open')
            ->where('prj_termin.termin_status','open')->get('');

            $approved = "Approved";

            $budget = Prj_ib_cost::join('prj_ib', 'prj_ib.kode_ib', '=', 'prj_ib_cost.kode_ib')
            ->join('prj_activity', 'prj_ib.kd_activity', '=', 'prj_activity.kd_activity')
            ->select('prj_ib.*','prj_activity.*','prj_ib_cost.*')
            ->where('prj_ib_cost.cost_status',$approved)->get();

            return view('home2',compact('pengalaman','count_notif','notifikasi','tender','non_tender','pending','q','q1','q2','q3','q4','p_ratio','k_ratio1','k_ratio2','sektor','project_active','project_non_active','p1','p2','p3','p4','p5','p6','p7','p8','p9','p10','p11','p12','t1','t2','t3','t4','t5','t6','t7','t8','t9','t10','t11','t12','uudp','sppd','tagihan','nilai_tagihan','actual_cost','budget'));
    }
}
