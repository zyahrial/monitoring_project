<?php
namespace App\Http\Controllers;

use Auth;
use App\Pem_tender;
use App\Klien;
use App\His_pem_tender;
use App\Notif_penjualan;
use App\Pengalaman;


use Illuminate\Http\Request;
class Pem_tenderController extends Controller
{	
       function index(Request $request)
    {
    
    if ($request->has('nama_klien')) 
    {        
    $query = ($request->input('nama_klien'));
    $post = Klien::join('mkt_pem_tender', 'mkt_klien.kd_klien', '=', 'mkt_pem_tender.kd_klien')
    ->where('nama_klien', 'LIKE', '%' . $query . '%')
    ->orderBy('nama_klien', 'asc')->paginate();
    }elseif ($request->has('cp_internal')) 
    {        
    $query = ($request->input('cp_internal'));
    $post = Klien::join('mkt_pem_tender', 'mkt_klien.kd_klien', '=', 'mkt_pem_tender.kd_klien')
    ->where('cp_internal', 'LIKE', '%' . $query . '%')
    ->orderBy('cp_internal', 'asc')->paginate();
    }elseif ($request->has('user')) 
    {        
    $email = (Auth::user()->email);
    $post = Klien::join('mkt_pem_tender', 'mkt_klien.kd_klien', '=', 'mkt_pem_tender.kd_klien')
    ->where('cp_internal_email', '=',$email )
    ->orderBy('created_at', 'asc')->paginate();
    }else{
    $post = Klien::join('mkt_pem_tender', 'mkt_klien.kd_klien', '=', 'mkt_pem_tender.kd_klien')
    ->select('mkt_klien.nama_klien', 'mkt_pem_tender.*')->paginate(10);
    }
    return view('pem_tender.index',['post' => $post]);
    }

        function user(Request $request)
    {
    $email = (Auth::user()->email);
    $post = Klien::join('mkt_pem_tender', 'mkt_klien.kd_klien', '=', 'mkt_pem_tender.kd_klien')
    ->where('cp_internal_email', '=',$email )
    ->orderBy('kd_pn_tender', 'asc')->get();

    return view('pem_tender.index',['post' => $post]);
    }

 function detail($kd_pn_tender)
    {
    $post = Klien::join('mkt_pem_tender', 'mkt_klien.kd_klien', '=', 'mkt_pem_tender.kd_klien')
    ->select('mkt_klien.*', 'mkt_pem_tender.*')
    ->where('kd_pn_tender',$kd_pn_tender)
    ->get();
    return view('pem_tender.detail',['post' => $post]);
    }

    function create()
    {
       return view('pem_tender/insert');
    } 

        function user_create()
    {

       return view('pem_tender/insert');
    } 
  
    function store(Request $request)
    {
         $validatedData = $request->validate([

        'kelompok_jasa'  => ' max:1000', 
        'kelompok_jasa'  => ' max:1000',
        'sub_jasa'   => ' max:1000',
        'nama_pekerjaan'  => ' max:1000', 
        'sub_pekerjaan'  => ' max:1000', 
        'kd_klien'  => 'required|max:50', 
        'nama_klien'  => ' max:200', 
        'informasi_nama'  => ' max:200', 
        'informasi_entitas' => ' max:200', 
        'informasi_telp'  => ' max:50', 
        'informasi_email' => ' max:200', 
        'hasil_canvasing' => ' max:1000', 
        'hasil_pendaftaran'  => ' max:1000', 
        'hasil_pq'   => ' max:1000', 
        'personil_aanwijzing' => ' max:200', 
        'kompetitor' => ' max:200', 
        'hasil_sampul1'   => ' max:1000', 
        'personil_contest' => ' max:200',
        'hasil_klarifikasi_teknis'  => ' max:1000', 
        'hasil_evaluasi_teknis'  => ' max:1000',
        'hasil_sampul2'   => ' max:1000', 
        'hasil_negosiasi'  => ' max:1000', 
        'status_followup' => ' max:1000',
        'status_tender'  => ' max:200', 
        'cp_internal' => ' max:200',
        'cp_internal_email' => 'required|max:200',  ]);

         $posts = \DB::table('mkt_pem_tender')->where('kd_pn_tender', \DB::raw("(select max(kd_pn_tender) from mkt_pem_tender)"))->get();

    if (count($posts)){
    foreach ($posts as $data){
    $d = ((int)substr($data->kd_pn_tender,3)+1);
    $kd = "PT".sprintf("%03s",$d);
}
}else{
    $kd = "PT001";
}

    $pem_tender = new Pem_tender();
    $pem_tender->kd_pn_tender = $kd;
    $pem_tender->kelompok_jasa = $request->get('kelompok_jasa');
    $pem_tender->sub_jasa = $request->get('sub_jasa');
    $pem_tender->nama_pekerjaan = $request->get('nama_pekerjaan');
     $pem_tender->sub_pekerjaan = $request->get('sub_pekerjaan');
    $pem_tender->kd_klien = $request->get('kd_klien');
    $pem_tender->informasi_tgl = $request->get('informasi_tgl');
    $pem_tender->informasi_nama = $request->get('informasi_nama');
    $pem_tender->informasi_entitas = $request->get('informasi_entitas');
    $pem_tender->informasi_telp = $request->get('informasi_telp');   
    $pem_tender->informasi_email = $request->get('informasi_email');
    $pem_tender->tgl_canvasing = $request->get('tgl_canvasing');
    $pem_tender->hasil_canvasing = $request->get('hasil_canvasing');
    $pem_tender->tgl_kak = $request->get('tgl_kak');
    $pem_tender->nilai_kak = $request->get('nilai_kak');
    $pem_tender->tgl_pendaftaran = $request->get('tgl_pendaftaran');
    $pem_tender->hasil_pendaftaran = $request->get('hasil_pendaftaran');
    $pem_tender->tgl_ambil= $request->get('tgl_ambil');
    $pem_tender->tgl_submit = $request->get('tgl_submit');
    $pem_tender->tgl_pembuktian = $request->get('tgl_pembuktian');
    $pem_tender->hasil_pq = $request->get('hasil_pq');
    $pem_tender->tgl_pengambilan_doc = $request->get('tgl_pengambilan_doc');
    $pem_tender->tgl_aanwijzing = $request->get('tgl_aanwijzing');
    $pem_tender->personil_aanwijzing = $request->get('personil_aanwijzing');
    $pem_tender->kompetitor = $request->get('kompetitor');
    $pem_tender->tgl_pemasukan_doc = $request->get('tgl_pemasukan_doc');
    $pem_tender->harga_penawaran = $request->get('harga_penawaran');
    $pem_tender->tgl_sampul1 = $request->get('tgl_sampul1');
    $pem_tender->hasil_sampul1 = $request->get('hasil_sampul1');
    $pem_tender->tgl_contest = $request->get('tgl_contest');
    $pem_tender->personil_contest = $request->get('personil_contest');
    $pem_tender->tgl_klarifikasi_teknis = $request->get('tgl_klarifikasi_teknis');
    $pem_tender->hasil_klarifikasi_teknis = $request->get('hasil_klarifikasi_teknis');
    $pem_tender->tgl_evaluasi_teknis = $request->get('tgl_evaluasi_teknis');
    $pem_tender->hasil_evaluasi_teknis = $request->get('hasil_evaluasi_teknis');
    $pem_tender->tgl_sampul2 = $request->get('tgl_sampul2');
    $pem_tender->hasil_sampul2 = $request->get('hasil_sampul2');
    $pem_tender->tgl_negosiasi = $request->get('tgl_negosiasi');
    $pem_tender->hasil_negosiasi = $request->get('hasil_negosiasi');
    $pem_tender->tgl_followup = $request->get('tgl_followup');
    $pem_tender->status_followup = $request->get('status_followup');
    $pem_tender->peluang = $request->get('peluang');
    $pem_tender->status_tender = $request->get('status_tender');
    $pem_tender->cp_internal = $request->get('cp_internal');
    $pem_tender->cp_internal_email = $request->get('cp_internal_email');
    $pem_tender->save();

    \Session::flash('success','Data Penjualan Berhasil Di Tambahkan');
    return redirect('pem_tender');
    
    }

    function user_store(Request $request)
    {
        $validatedData = $request->validate([

        'kelompok_jasa'  => ' max:1000', 
        'kelompok_jasa'  => ' max:1000',
        'sub_jasa'   => ' max:1000',
        'nama_pekerjaan'  => ' max:1000', 
        'sub_pekerjaan'  => ' max:1000', 
        'kd_klien'  => 'required|max:50', 
        'nama_klien'  => ' max:200', 
        'informasi_nama'  => ' max:200', 
        'informasi_entitas' => ' max:200', 
        'informasi_telp'  => ' max:50', 
        'informasi_email' => ' max:200', 
        'hasil_canvasing' => ' max:1000', 
        'hasil_pendaftaran'  => ' max:1000', 
        'hasil_pq'   => ' max:1000', 
        'personil_aanwijzing' => ' max:200', 
        'kompetitor' => ' max:200', 
        'hasil_sampul1'   => ' max:1000', 
        'personil_contest' => ' max:200',
        'hasil_klarifikasi_teknis'  => ' max:1000', 
        'hasil_evaluasi_teknis'  => ' max:1000',
        'hasil_sampul2'   => ' max:1000', 
        'hasil_negosiasi'  => ' max:1000', 
        'status_followup' => ' max:1000',
        'status_tender'  => ' max:200', 
        'cp_internal' => ' max:200',
        'cp_internal_email' => 'required|max:200',  ]);

        $posts = \DB::table('mkt_pem_tender')->where('kd_pn_tender', \DB::raw("(select max(kd_pn_tender) from mkt_pem_tender)"))->get();

        if (count($posts)){
        foreach ($posts as $data){
        $d = ((int)substr($data->kd_pn_tender,3)+1);
        $kd = "PT".sprintf("%03s",$d);
    }
    }else{
    $kd = "PT001";
    }

    $pem_tender = new Pem_tender();
    $pem_tender->kd_pn_tender = $kd;
    $pem_tender->kelompok_jasa = $request->get('kelompok_jasa');
    $pem_tender->sub_jasa = $request->get('sub_jasa');
    $pem_tender->nama_pekerjaan = $request->get('nama_pekerjaan');
    $pem_tender->sub_pekerjaan = $request->get('sub_pekerjaan');
    $pem_tender->kd_klien = $request->get('kd_klien');
    $pem_tender->informasi_tgl = $request->get('informasi_tgl');
    $pem_tender->informasi_nama = $request->get('informasi_nama');
    $pem_tender->informasi_entitas = $request->get('informasi_entitas');
    $pem_tender->informasi_telp = $request->get('informasi_telp');   
    $pem_tender->informasi_email = $request->get('informasi_email');
    $pem_tender->tgl_canvasing = $request->get('tgl_canvasing');
    $pem_tender->hasil_canvasing = $request->get('hasil_canvasing');
    $pem_tender->tgl_kak = $request->get('tgl_kak');
    $pem_tender->nilai_kak = $request->get('nilai_kak');
    $pem_tender->tgl_pendaftaran = $request->get('tgl_pendaftaran');
    $pem_tender->hasil_pendaftaran = $request->get('hasil_pendaftaran');
    $pem_tender->tgl_ambil= $request->get('tgl_ambil');
    $pem_tender->tgl_submit = $request->get('tgl_submit');
    $pem_tender->tgl_pembuktian = $request->get('tgl_pembuktian');
    $pem_tender->hasil_pq = $request->get('hasil_pq');
    $pem_tender->tgl_pengambilan_doc = $request->get('tgl_pengambilan_doc');
    $pem_tender->tgl_aanwijzing = $request->get('tgl_aanwijzing');
    $pem_tender->personil_aanwijzing = $request->get('personil_aanwijzing');
    $pem_tender->kompetitor = $request->get('kompetitor');
    $pem_tender->tgl_pemasukan_doc = $request->get('tgl_pemasukan_doc');
    $pem_tender->harga_penawaran = $request->get('harga_penawaran');
    $pem_tender->tgl_sampul1 = $request->get('tgl_sampul1');
    $pem_tender->hasil_sampul1 = $request->get('hasil_sampul1');
    $pem_tender->tgl_contest = $request->get('tgl_contest');
    $pem_tender->personil_contest = $request->get('personil_contest');
    $pem_tender->tgl_klarifikasi_teknis = $request->get('tgl_klarifikasi_teknis');
    $pem_tender->hasil_klarifikasi_teknis = $request->get('hasil_klarifikasi_teknis');
    $pem_tender->tgl_evaluasi_teknis = $request->get('tgl_evaluasi_teknis');
    $pem_tender->hasil_evaluasi_teknis = $request->get('hasil_evaluasi_teknis');
    $pem_tender->tgl_sampul2 = $request->get('tgl_sampul2');
    $pem_tender->hasil_sampul2 = $request->get('hasil_sampul2');
    $pem_tender->tgl_negosiasi = $request->get('tgl_negosiasi');
    $pem_tender->hasil_negosiasi = $request->get('hasil_negosiasi');
    $pem_tender->tgl_followup = $request->get('tgl_followup');
    $pem_tender->status_followup = $request->get('status_followup');
    $pem_tender->peluang = $request->get('peluang');
    $pem_tender->status_tender = $request->get('status_tender');
    $pem_tender->cp_internal = $request->get('cp_internal');
    $pem_tender->cp_internal_email = $request->get('cp_internal_email');
    $pem_tender->save();

    \Session::flash('success','Data Penjualan Berhasil Di Tambahkan');
    return redirect('pem_tender_user');
    }
	
    function show($kd_pn_tender)
    {
    $data = Klien::join('mkt_pem_tender', 'mkt_klien.kd_klien', '=', 'mkt_pem_tender.kd_klien')
    ->select('mkt_klien.*', 'mkt_pem_tender.*')
    ->where('kd_pn_tender',$kd_pn_tender)
    ->get();
        return view('pem_tender/edit',compact('data'));
    }

    function update(Request $request, $kd_pn_tender)
    { 
        $validatedData = $request->validate([

        'kd_pn_tender' => ' required|max:50', 
        'kelompok_jasa'  => ' max:1000', 
        'kelompok_jasa'  => ' max:1000',
        'sub_jasa'   => ' max:1000',
        'nama_pekerjaan'  => ' max:1000', 
        'sub_pekerjaan'  => ' max:1000', 
        'kd_klien'  => 'required|max:50', 
        'nama_klien'  => ' max:200', 
        'informasi_nama'  => ' max:200', 
        'informasi_entitas' => ' max:200', 
        'informasi_telp'  => ' max:50', 
        'informasi_email' => ' max:200', 
        'hasil_canvasing' => ' max:1000', 
        'hasil_pendaftaran'  => ' max:1000', 
        'hasil_pq'   => ' max:1000', 
        'personil_aanwijzing' => ' max:200', 
        'kompetitor' => ' max:200', 
        'hasil_sampul1'   => ' max:1000', 
        'personil_contest' => ' max:200',
        'hasil_klarifikasi_teknis'  => ' max:1000', 
        'hasil_evaluasi_teknis'  => ' max:1000',
        'hasil_sampul2'   => ' max:1000', 
        'hasil_negosiasi'  => ' max:1000', 
        'status_followup' => ' max:1000',
        'status_tender'  => ' max:200', 
        'cp_internal' => ' max:200',
        'cp_internal_email' => 'required|max:200',  ]);

        $pem_tender = Pem_tender::find($kd_pn_tender);
        $pem_tender->kelompok_jasa = $request->get('kelompok_jasa');
        $pem_tender->sub_jasa = $request->get('sub_jasa');
        $pem_tender->nama_pekerjaan = $request->get('nama_pekerjaan');
         $pem_tender->sub_pekerjaan = $request->get('sub_pekerjaan');
        $pem_tender->kd_klien = $request->get('kd_klien');
        $pem_tender->informasi_tgl = $request->get('informasi_tgl');
        $pem_tender->informasi_nama = $request->get('informasi_nama');
        $pem_tender->informasi_entitas = $request->get('informasi_entitas');
        $pem_tender->informasi_telp = $request->get('informasi_telp');   
        $pem_tender->informasi_email = $request->get('informasi_email');
        $pem_tender->tgl_canvasing = $request->get('tgl_canvasing');
        $pem_tender->hasil_canvasing = $request->get('hasil_canvasing');
        $pem_tender->tgl_kak = $request->get('tgl_kak');
        $pem_tender->nilai_kak = $request->get('nilai_kak');
        $pem_tender->tgl_pendaftaran = $request->get('tgl_pendaftaran');
        $pem_tender->hasil_pendaftaran = $request->get('hasil_pendaftaran');
        $pem_tender->tgl_ambil= $request->get('tgl_ambil');
        $pem_tender->tgl_submit = $request->get('tgl_submit');
        $pem_tender->tgl_pembuktian = $request->get('tgl_pembuktian');
        $pem_tender->hasil_pq = $request->get('hasil_pq');
        $pem_tender->tgl_pengambilan_doc = $request->get('tgl_pengambilan_doc');
        $pem_tender->tgl_aanwijzing = $request->get('tgl_aanwijzing');
        $pem_tender->personil_aanwijzing = $request->get('personil_aanwijzing');
        $pem_tender->kompetitor = $request->get('kompetitor');
        $pem_tender->tgl_pemasukan_doc = $request->get('tgl_pemasukan_doc');
        $pem_tender->harga_penawaran = $request->get('harga_penawaran');
        $pem_tender->tgl_sampul1 = $request->get('tgl_sampul1');
        $pem_tender->hasil_sampul1 = $request->get('hasil_sampul1');
        $pem_tender->tgl_contest = $request->get('tgl_contest');
        $pem_tender->personil_contest = $request->get('personil_contest');
        $pem_tender->tgl_klarifikasi_teknis = $request->get('tgl_klarifikasi_teknis');
        $pem_tender->hasil_klarifikasi_teknis = $request->get('hasil_klarifikasi_teknis');
        $pem_tender->tgl_evaluasi_teknis = $request->get('tgl_evaluasi_teknis');
        $pem_tender->hasil_evaluasi_teknis = $request->get('hasil_evaluasi_teknis');
        $pem_tender->tgl_sampul2 = $request->get('tgl_sampul2');
        $pem_tender->hasil_sampul2 = $request->get('hasil_sampul2');
        $pem_tender->tgl_negosiasi = $request->get('tgl_negosiasi');
        $pem_tender->hasil_negosiasi = $request->get('hasil_negosiasi');
        $pem_tender->tgl_followup = $request->get('tgl_followup');
        $pem_tender->status_followup = $request->get('status_followup');
        $pem_tender->peluang = $request->get('peluang');
        $pem_tender->status_tender = $request->get('status_tender');
        $pem_tender->cp_internal = $request->get('cp_internal');
        $pem_tender->cp_internal_email = $request->get('cp_internal_email');
        $pem_tender->save();
    
    \Session::flash('success','Data Penjualan Berhasil Di Ubah');
    return redirect('pem_tender/detail/'.$kd_pn_tender);   
    }
    
    function close_menang($kd_pn_tender)
    {

    $pen_tender = Klien::join('mkt_pem_tender', 'mkt_klien.kd_klien', '=', 'mkt_pem_tender.kd_klien')
    ->select('mkt_klien.*', 'mkt_pem_tender.*')
    ->where('kd_pn_tender',$kd_pn_tender)
    ->get();
        return view('pem_tender/close-menang',compact('pen_tender'));
    }

        function close_kalah($kd_pn_tender)
    {

    $pen_tender = Klien::join('mkt_pem_tender', 'mkt_klien.kd_klien', '=', 'mkt_pem_tender.kd_klien')
    ->select('mkt_klien.*', 'mkt_pem_tender.*')
    ->where('kd_pn_tender',$kd_pn_tender)
    ->get();
        return view('pem_tender/close-kalah',compact('pen_tender'));
    }

    function proses_close_menang(Request $request, $kd_pn_tender)
    {
       $this->validate($request, [
            'file_kontrak' => 'mimes:pdf',
        ]);

$kd_pengalaman = Pengalaman::where('kd_pengalaman', \DB::raw("(select max(kd_pengalaman) from mkt_pengalaman)"))->get();

if (count($kd_pengalaman)){
foreach ($kd_pengalaman as $data){
    $d = ((int)substr($data->kd_pengalaman,3)+1);
    $kd = "PGN".sprintf("%03s",$d);
}
}else{
    $kd = "PGN001";
}

    $pengalaman = new Pengalaman();
    $pengalaman->kd_pengalaman  =  $kd;
    $pengalaman->kd_klien = $request->get('kd_klien');
    $pengalaman->kelompok_jasa = $request->get('kelompok_jasa');
    $pengalaman->sub_jasa = $request->get('sub_jasa');
    $pengalaman->nama_pekerjaan = $request->get('nama_pekerjaan');
    $pengalaman->sub_pekerjaan = $request->get('sub_pekerjaan');
    $pengalaman->ringkasan_lingkup = $request->get('ringkasan_lingkup');
    $pengalaman->lokasi_pekerjaan = $request->get('lokasi_pekerjaan');
    $pengalaman->no_kontrak = $request->get('no_kontrak');
    $kontrak = "KONTRAK-";
if (empty($request->file('file_kontrak'))){
        }else{
        $file_kontrak = $request->file('file_kontrak');
        $ext =  $file_kontrak->getClientOriginalExtension();      
        $newName = $kontrak.$pengalaman->kd_pengalaman.".".$ext;
        $file_kontrak->move('file/pengalaman/kontrak',$newName);
}
    $pengalaman->nilai_kontrak = $request->get('nilai_kontrak');
    $pengalaman->kontrak_mulai = $request->get('kontrak_mulai');
    $pengalaman->kontrak_selesai = $request->get('kontrak_selesai');
    $pengalaman->pm = $request->get('pm');
    $pengalaman->konsultan = $request->get('konsultan');
    $pengalaman->cp_internal = $request->get('cp_internal');
    $pengalaman->cp_internal_email = $request->get('cp_internal_email');
    $pengalaman->save();

$klien = $request->get('nama_klien');
$keterangan = $request->get('status_closing');

$notif = new Notif_penjualan();
$notif->jenis = "TENDER";
$notif->kd_penjualan = "".$kd."";
$notif->klien = "".$klien."" ;
$notif->keterangan = "".$keterangan."" ;
$notif->save();

        $data = Pem_tender::find($kd_pn_tender);
        $data->delete();

    \Session::flash('success','Selamat Proses Tender Menang,Silahkan Periksa Daftar Pengalaman');
    return redirect('pem_tender');
    }

    function proses_close_kalah(Request $request, $kd_pn_tender)
    {

      $this->validate($request, [
            'status_closing' => 'required|max:200',
            'kategori' => 'required|max:1000', 
            'keterangan' => 'max:1000', 
        ]);

    $kd_close = \DB::table('mkt_his_pem_tender')->where('kd_his_tender', \DB::raw("(select max(kd_his_tender) from mkt_his_pem_tender)"))->get();

      if (count($kd_close)){
      foreach ($kd_close as $data){
            $d = ((int)substr($data->kd_his_tender,3)+1);
            $kd = "HPT".sprintf("%03s",$d);
      }
    }else{
            $kd = "HPT001";
         }

    $pem_tender = new His_pem_tender();
    $pem_tender->kd_his_tender = $kd ;
    $pem_tender->kd_pn_tender = $request->get('kd_pn_tender');
    $pem_tender->kelompok_jasa = $request->get('kelompok_jasa');
    $pem_tender->sub_jasa = $request->get('sub_jasa');
    $pem_tender->nama_pekerjaan = $request->get('nama_pekerjaan');
     $pem_tender->sub_pekerjaan = $request->get('sub_pekerjaan');
    $pem_tender->kd_klien = $request->get('kd_klien');
    $pem_tender->nama_klien = $request->get('nama_klien');
    $pem_tender->informasi_tgl = $request->get('informasi_tgl');
    $pem_tender->informasi_nama = $request->get('informasi_nama');
    $pem_tender->informasi_entitas = $request->get('informasi_entitas');
    $pem_tender->informasi_telp = $request->get('informasi_telp');   
    $pem_tender->informasi_email = $request->get('informasi_email');
    $pem_tender->tgl_canvasing = $request->get('tgl_canvasing');
    $pem_tender->hasil_canvasing = $request->get('hasil_canvasing');
    $pem_tender->tgl_kak = $request->get('tgl_kak');
    $pem_tender->nilai_kak = $request->get('nilai_kak');
    $pem_tender->tgl_pendaftaran = $request->get('tgl_pendaftaran');
    $pem_tender->hasil_pendaftaran = $request->get('hasil_pendaftaran');
    $pem_tender->tgl_ambil= $request->get('tgl_ambil');
    $pem_tender->tgl_submit = $request->get('tgl_submit');
    $pem_tender->tgl_pembuktian = $request->get('tgl_pembuktian');
    $pem_tender->hasil_pq = $request->get('hasil_pq');
    $pem_tender->tgl_pengambilan_doc = $request->get('tgl_pengambilan_doc');
    $pem_tender->tgl_aanwijzing = $request->get('tgl_aanwijzing');
    $pem_tender->personil_aanwijzing = $request->get('personil_aanwijzing');
    $pem_tender->kompetitor = $request->get('kompetitor');
    $pem_tender->tgl_pemasukan_doc = $request->get('tgl_pemasukan_doc');
    $pem_tender->harga_penawaran = $request->get('harga_penawaran');
    $pem_tender->tgl_sampul1 = $request->get('tgl_sampul1');
    $pem_tender->hasil_sampul1 = $request->get('hasil_sampul1');
    $pem_tender->tgl_contest = $request->get('tgl_contest');
    $pem_tender->personil_contest = $request->get('personil_contest');
    $pem_tender->tgl_klarifikasi_teknis = $request->get('tgl_klarifikasi_teknis');
    $pem_tender->hasil_klarifikasi_teknis = $request->get('hasil_klarifikasi_teknis');
    $pem_tender->tgl_evaluasi_teknis = $request->get('tgl_evaluasi_teknis');
    $pem_tender->hasil_evaluasi_teknis = $request->get('hasil_evaluasi_teknis');
    $pem_tender->tgl_sampul2 = $request->get('tgl_sampul2');
    $pem_tender->hasil_sampul2 = $request->get('hasil_sampul2');
    $pem_tender->tgl_negosiasi = $request->get('tgl_negosiasi');
    $pem_tender->hasil_negosiasi = $request->get('hasil_negosiasi');
    $pem_tender->tgl_followup = $request->get('tgl_followup');
    $pem_tender->status_followup = $request->get('status_followup');
    $pem_tender->peluang = $request->get('peluang');
    $pem_tender->status_closing = $request->get('status_closing');
    $pem_tender->kategori = $request->get('kategori');
    $pem_tender->keterangan = $request->get('keterangan');
    $pem_tender->cp_internal = $request->get('cp_internal');
    $pem_tender->save();

$klien = $request->get('nama_klien');
$keterangan = $request->get('status_closing');

$notif = new Notif_penjualan();
$notif->jenis = "TENDER";
$notif->kd_penjualan = "".$kd ."";
$notif->klien = "".$klien."" ;
$notif->keterangan = "".$keterangan."" ;
$notif->save();

        $data = Pem_tender::find($kd_pn_tender);
        $data->delete();

    \Session::flash('success','Tender Proses Kalah, Silahkan Periksa Daftar History Tender');
    return redirect('pem_tender');
    }

    function history_pem_tender(Request $request)
    {       
    if ($request->has('nama_klien')) 
    {        
    $query = ($request->input('nama_klien'));
    $history = His_pem_tender::where('nama_klien', 'LIKE', '%' . $query . '%')
    ->orderBy('status_closing', 'desc')->paginate();
    }elseif ($request->has('cp_internal')) 
    {
    $query = ($request->input('cp_internal'));
    $history = His_pem_tender::where('cp_internal', 'LIKE', '%' . $query . '%')
    ->orderBy('cp_internal', 'desc')->paginate();
    }elseif ($request->has('tahun')) 
    {
    $query = ($request->input('tahun'));
    $history = His_pem_tender::whereYear('created_at', 'LIKE', '%' . $query . '%')
    ->orderBy('created_at', 'desc')->paginate();
    }elseif ($request->has('kode')) 
    {
    $query = ($request->input('kode'));
    $history = His_pem_tender::where('kd_his_tender', 'LIKE', '%' . $query . '%')
    ->orderBy('kd_his_tender', 'desc')->paginate();
    }else{
      $history = His_pem_tender::orderBy('status_closing', 'desc')->paginate(20);
    } 
    return view('/pem_tender/history/index',compact('history'));
    }

        function detail_history($kd_his_tender)
    {
    $history_tender = His_pem_tender::where('kd_his_tender',$kd_his_tender)->get();
        return view('pem_tender/history/detail',compact('history_tender'));
    }

    function destroy(Request $request, $kd_pn_tender)
    {
        $data = Pem_tender::find($kd_pn_tender);
        $data->delete();
        \Session::flash('success','Data Penjualan Berhasil Di Hapus');
        return redirect('pem_tender');
    }

        function reminder(Request $request)
    {       
    return view('reminder/tender/index');
    }
}