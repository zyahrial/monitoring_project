<?php
namespace App\Http\Controllers;
use App\Notif_penjualan;
use App\Pengalaman;
use App\Pem_tender;
use App\Pem_non_tender;
use App\His_Pem_non_tender;
use App\His_Pem_tender;


use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function home(Request $request)
    {      
    $notifikasi = Notif_penjualan::orderBy('created_at', 'asc')->get();
    $count_notif = Notif_penjualan::count(); 
    $pengalaman = Pengalaman::count(); 
    $tender = Pem_tender::count(); 
    $non_tender = Pem_non_tender::count();
    $pending = Pem_non_tender::where('status','PENDING')->count();
    $yq = date('Y');
    $yq1 = date('Y')-'1';
    $yq2 = date('Y')-'2';
    $yq3 = date('Y')-'3';
    $yq4 = date('Y')-'4';
    $q = Pengalaman::WhereYear('kontrak_mulai', '=',$yq)->sum('nilai_kontrak');
    $q1 = Pengalaman::WhereYear('kontrak_mulai', '=',$yq1)->sum('nilai_kontrak');
    $q2 = Pengalaman::WhereYear('kontrak_mulai', '=',$yq2)->sum('nilai_kontrak');
    $q3 = Pengalaman::WhereYear('kontrak_mulai', '=',$yq3)->sum('nilai_kontrak');
    $q4 = Pengalaman::WhereYear('kontrak_mulai', '=',$yq4)->sum('nilai_kontrak');
    $p_ratio = Pengalaman::WhereYear('kontrak_mulai',$yq)->count();
    $k_ratio1 = His_Pem_tender::WhereYear('created_at',$yq)->count();
    $k_ratio2 = His_Pem_non_tender::WhereYear('created_at',$yq)->count();
    $sektor = \DB::table('mkt_lib_sektor')->get(); 



	//->limit(10)
    //>get();
    //$notif = Notif_penjualan::orderBy('created_at', 'asc')->get();
    //$count_notif = Notif_penjualan::count(); 
    $date_now = date('Y-m-d');
    return view('home',compact('pengalaman','count_notif','notifikasi','tender','non_tender','pending','q','q1','q2','q3','q4','p_ratio','k_ratio1','k_ratio2','sektor'));
    }
}
