<?php
namespace App\Http\Controllers;

use Auth;
use App\Pem_non_tender;
use App\Klien;
use App\His_pem_non_tender;
use App\Notif_penjualan;
use App\Pengalaman;
use App\Exports\Non_tenderExport;
use Excel; 

use Illuminate\Http\Request;
class Pem_non_tenderController extends Controller
    {   
   function index(Request $request )
{
    $year = date('Y');
    $year_loop = $year-1;
    if ($request->has('nama_klien')) 
    {        
    $query = ($request->input('nama_klien'));
    $post = Klien::join('mkt_pem_non_tender', 'mkt_klien.kd_klien', '=', 'mkt_pem_non_tender.kd_klien')
    ->where('nama_klien', 'LIKE', '%' . $query . '%')
    ->orderBy('nama_klien', 'asc')->paginate();
    }elseif ($request->has('cp_internal')) 
    {        
    $query = ($request->input('cp_internal'));
    $post = Klien::join('mkt_pem_non_tender', 'mkt_klien.kd_klien', '=', 'mkt_pem_non_tender.kd_klien')
    ->where('cp_internal', 'LIKE', '%' . $query . '%')
    ->orderBy('cp_internal', 'asc')->paginate();
    }elseif ($request->has('status'))
    {        
    $query = ($request->input('status'));
    $post = Klien::join('mkt_pem_non_tender', 'mkt_klien.kd_klien', '=', 'mkt_pem_non_tender.kd_klien')
    ->where('status', 'LIKE', '%' . $query . '%')
    ->orderBy('status', 'asc')->paginate();
    }elseif ($request->has('user')) 
    {        
    $email = (Auth::user()->email);
    $post = Klien::join('mkt_pem_non_tender', 'mkt_klien.kd_klien', '=', 'mkt_pem_non_tender.kd_klien')
    ->where('cp_internal_email', '=',$email )
    ->orderBy('created_at', 'asc')->paginate();
    }else{
    $post = Klien::join('mkt_pem_non_tender', 'mkt_klien.kd_klien', '=', 'mkt_pem_non_tender.kd_klien')
    ->select('mkt_klien.nama_klien', 'mkt_pem_non_tender.*')
    ->OrWhere('status', 'OPEN')
    ->OrWhere('status', 'PROSPEK')
    ->OrWhere('status', 'RETENDER')
    ->OrWhereYear('mkt_pem_non_tender.updated_at',$year_loop)
    ->paginate(10);
    }
    return view('pem_non_tender.index',['post' => $post]);
}

        public function export() 
    {
        return Excel::download(new Non_tenderExport, 'Non-tender.xlsx');
    }

    function user(Request $request)
    {
    $email = (Auth::user()->email);
    $post = Klien::join('mkt_pem_non_tender', 'mkt_klien.kd_klien', '=', 'mkt_pem_non_tender.kd_klien')
    ->where('cp_internal_email', '=',$email )
    ->orderBy('kd_pn_non_tender', 'asc')->get();

    return view('pem_non_tender.index',['post' => $post]);
}


 function detail($kd_pn_non_tender)
{
    $pem_non_tender = Klien::join('mkt_pem_non_tender', 'mkt_klien.kd_klien', '=', 'mkt_pem_non_tender.kd_klien')
    ->select('mkt_klien.*', 'mkt_pem_non_tender.*')
    ->where('kd_pn_non_tender',$kd_pn_non_tender)
    ->get();
    return view('pem_non_tender.detail',['pem_non_tender' => $pem_non_tender]);
}

function create()
    {
$kode = \DB::table('mkt_pem_non_tender')->where('kd_pn_non_tender', \DB::raw("(select max(kd_pn_non_tender) from mkt_pem_non_tender)"))->get();
       return view('pem_non_tender/insert',compact('kode'));
    } 


function user_create()
    {
       return view('pem_non_tender/insert');
    } 
  
    function store(Request $request)
    {
 $validatedData = $request->validate([
'kelompok_jasa'  => ' max:1000',
'sub_jasa'  => ' max:1000',
'nama_pekerjaan'  => ' max:1000',
'sub_pekerjaan'  => ' max:1000',
'kd_klien'  => ' max:50',
'informasi_nama'  => ' max:200',
'informasi_telp'  => ' max:50',
'informasi_email'  => ' max:200',
'hasil_canvasing'  => ' max:1000',
'status_followup'  => ' max:1000',
'status'  => ' max:200',
'cp_internal'  => ' max:200',
'cp_internal_email'  => 'required|max:200',
 ]);

$kode = \DB::table('mkt_pem_non_tender')->where('kd_pn_non_tender', \DB::raw("(select max(kd_pn_non_tender) from mkt_pem_non_tender)"))->get();

    if (count($kode)){
    foreach ($kode as $data){
        $d = ((int)substr($data->kd_pn_non_tender,3)+1);
        $kd = "PN".sprintf("%03s",$d);
}
}else{
        $kd = "PN001";
}

    $pem_non_tender = new Pem_non_tender();
    $pem_non_tender->kd_pn_non_tender = $kd;
    $pem_non_tender->kelompok_jasa = $request->get('kelompok_jasa');
    $pem_non_tender->sub_jasa = $request->get('sub_jasa');
    $pem_non_tender->nama_pekerjaan = $request->get('nama_pekerjaan');
     $pem_non_tender->sub_pekerjaan = $request->get('sub_pekerjaan');
    $pem_non_tender->kd_klien = $request->get('kd_klien');
    $pem_non_tender->informasi_nama = $request->get('informasi_nama');
    $pem_non_tender->informasi_telp = $request->get('informasi_telp');   
    $pem_non_tender->informasi_email = $request->get('informasi_email');
        $pem_non_tender->tgl_permintaan = $request->get('tgl_permintaan');
    $pem_non_tender->tgl_canvasing = $request->get('tgl_canvasing');   
    $pem_non_tender->hasil_canvasing = $request->get('hasil_canvasing');
            $pem_non_tender->tgl_kak = $request->get('tgl_kak');
    $pem_non_tender->nilai_kak = $request->get('nilai_kak');   
    $pem_non_tender->tgl_proposal = $request->get('tgl_proposal');
            $pem_non_tender->nilai_penawaran = $request->get('nilai_penawaran');
    $pem_non_tender->tgl_presentasi = $request->get('tgl_presentasi');   
    $pem_non_tender->tgl_negosiasi = $request->get('tgl_negosiasi');
    $pem_non_tender->nilai_negosiasi = $request->get('nilai_negosiasi');
    $pem_non_tender->tgl_followup = $request->get('tgl_followup');   
    $pem_non_tender->status_followup = $request->get('status_followup');
    $pem_non_tender->peluang = $request->get('peluang');   
    $pem_non_tender->status = $request->get('status');
    $pem_non_tender->cp_internal = $request->get('cp_internal');
    $pem_non_tender->cp_internal_email = $request->get('cp_internal_email');
    $pem_non_tender->save();

    \Session::flash('success','Data Berhasil Di Tambahkan');
    return redirect('pem_non_tender'); 
    }
    
function user_store(Request $request)
{
 $validatedData = $request->validate([
'kelompok_jasa'  => ' max:1000',
'sub_jasa'  => ' max:1000',
'nama_pekerjaan'  => ' max:1000',
'sub_pekerjaan'  => ' max:1000',
'kd_klien'  => ' max:50',
'informasi_nama'  => ' max:200',
'informasi_telp'  => ' max:50',
'informasi_email'  => ' max:200',
'hasil_canvasing'  => ' max:1000',
'status_followup'  => ' max:1000',
'status'  => ' max:200',
'cp_internal'  => ' max:200',
'cp_internal_email'  => 'required|max:200',
 ]);

$kode = \DB::table('mkt_pem_non_tender')->where('kd_pn_non_tender', \DB::raw("(select max(kd_pn_non_tender) from mkt_pem_non_tender)"))->get();

    if (count($kode)){
    foreach ($kode as $data){
        $d = ((int)substr($data->kd_pn_non_tender,3)+1);
        $kd = "PN".sprintf("%03s",$d);
}
}else{
        $kd = "PN001";
}

    $pem_non_tender = new Pem_non_tender();
    $pem_non_tender->kd_pn_non_tender = $kd;
    $pem_non_tender->kelompok_jasa = $request->get('kelompok_jasa');
    $pem_non_tender->sub_jasa = $request->get('sub_jasa');
    $pem_non_tender->nama_pekerjaan = $request->get('nama_pekerjaan');
     $pem_non_tender->sub_pekerjaan = $request->get('sub_pekerjaan');
    $pem_non_tender->kd_klien = $request->get('kd_klien');
    $pem_non_tender->informasi_nama = $request->get('informasi_nama');
    $pem_non_tender->informasi_telp = $request->get('informasi_telp');   
    $pem_non_tender->informasi_email = $request->get('informasi_email');
        $pem_non_tender->tgl_permintaan = $request->get('tgl_permintaan');
    $pem_non_tender->tgl_canvasing = $request->get('tgl_canvasing');   
    $pem_non_tender->hasil_canvasing = $request->get('hasil_canvasing');
            $pem_non_tender->tgl_kak = $request->get('tgl_kak');
    $pem_non_tender->nilai_kak = $request->get('nilai_kak');   
    $pem_non_tender->tgl_proposal = $request->get('tgl_proposal');
            $pem_non_tender->nilai_penawaran = $request->get('nilai_penawaran');
    $pem_non_tender->tgl_presentasi = $request->get('tgl_presentasi');   
    $pem_non_tender->tgl_negosiasi = $request->get('tgl_negosiasi');
    $pem_non_tender->nilai_negosiasi = $request->get('nilai_negosiasi');
    $pem_non_tender->tgl_followup = $request->get('tgl_followup');   
    $pem_non_tender->status_followup = $request->get('status_followup');
    $pem_non_tender->peluang = $request->get('peluang');   
    $pem_non_tender->status = $request->get('status');
    $pem_non_tender->cp_internal = $request->get('cp_internal');
    $pem_non_tender->cp_internal_email = $request->get('cp_internal_email');
    $pem_non_tender->save();

    \Session::flash('success','Data Berhasil Di Tambahkan');
    return redirect('pem_non_tender_user');
    
    }

    function show($kd_pn_non_tender)
    {
    $data = Klien::join('mkt_pem_non_tender', 'mkt_klien.kd_klien', '=', 'mkt_pem_non_tender.kd_klien')
    ->select('mkt_klien.*', 'mkt_pem_non_tender.*')
    ->where('kd_pn_non_tender',$kd_pn_non_tender)
    ->get();
        return view('pem_non_tender/edit',compact('data'));
    }

    function update(Request $request, $kd_pn_non_tender)
    { 

 $validatedData = $request->validate([

'kd_pn_non_tender'  => 'required|max:50',
'kelompok_jasa'  => ' max:1000',
'sub_jasa'  => ' max:1000',
'nama_pekerjaan'  => ' max:1000',
'sub_pekerjaan'  => ' max:1000',
'kd_klien'  => ' max:50',
'informasi_nama'  => ' max:200',
'informasi_telp'  => ' max:50',
'informasi_email'  => ' max:200',
'hasil_canvasing'  => ' max:1000',
'status_followup'  => ' max:1000',
'status'  => ' max:200',
'cp_internal'  => ' max:200',
'cp_internal_email'  => 'required|max:200',
 ]);

    $pem_non_tender = Pem_non_tender::find($kd_pn_non_tender);
    $pem_non_tender->kd_pn_non_tender = $request->get('kd_pn_non_tender');
    $pem_non_tender->kelompok_jasa = $request->get('kelompok_jasa');
    $pem_non_tender->sub_jasa = $request->get('sub_jasa');
    $pem_non_tender->nama_pekerjaan = $request->get('nama_pekerjaan');
    $pem_non_tender->sub_pekerjaan = $request->get('sub_pekerjaan');
    $pem_non_tender->kd_klien = $request->get('kd_klien');
    $pem_non_tender->informasi_nama = $request->get('informasi_nama');
    $pem_non_tender->informasi_telp = $request->get('informasi_telp');   
    $pem_non_tender->informasi_email = $request->get('informasi_email');
        $pem_non_tender->tgl_permintaan = $request->get('tgl_permintaan');
    $pem_non_tender->tgl_canvasing = $request->get('tgl_canvasing');   
    $pem_non_tender->hasil_canvasing = $request->get('hasil_canvasing');
            $pem_non_tender->tgl_kak = $request->get('tgl_kak');
    $pem_non_tender->nilai_kak = $request->get('nilai_kak');   
    $pem_non_tender->tgl_proposal = $request->get('tgl_proposal');
            $pem_non_tender->nilai_penawaran = $request->get('nilai_penawaran');
    $pem_non_tender->tgl_presentasi = $request->get('tgl_presentasi');   
    $pem_non_tender->tgl_negosiasi = $request->get('tgl_negosiasi');
    $pem_non_tender->nilai_negosiasi = $request->get('nilai_negosiasi');
    $pem_non_tender->tgl_followup = $request->get('tgl_followup');   
    $pem_non_tender->status_followup = $request->get('status_followup');
    $pem_non_tender->peluang = $request->get('peluang');   
    $pem_non_tender->status = $request->get('status');
    $pem_non_tender->cp_internal = $request->get('cp_internal');
    $pem_non_tender->cp_internal_email = $request->get('cp_internal_email');
    $pem_non_tender->save();
    
    \Session::flash('success','Data Penjualan Berhasil Di Ubah');
    return redirect('pem_non_tender/detail/'.$kd_pn_non_tender);   
    }

        function close_menang($kd_pn_non_tender)
    {
    $pen_non_tender = Klien::join('mkt_pem_non_tender', 'mkt_klien.kd_klien', '=', 'mkt_pem_non_tender.kd_klien')
    ->select('mkt_klien.*', 'mkt_pem_non_tender.*')
    ->where('kd_pn_non_tender',$kd_pn_non_tender)
    ->get();
    return view('pem_non_tender/close-menang',compact('pen_non_tender'));
    }
    
    function close_kalah($kd_pn_non_tender)
    {

$pen_non_tender = Klien::join('mkt_pem_non_tender', 'mkt_klien.kd_klien', '=', 'mkt_pem_non_tender.kd_klien')
    ->select('mkt_klien.*', 'mkt_pem_non_tender.*')
    ->where('kd_pn_non_tender',$kd_pn_non_tender)
    ->get();
        return view('pem_non_tender/close-kalah',compact('pen_non_tender'));
    }

        function proses_close_menang(Request $request, $kd_pn_non_tender)
    {
       $this->validate($request, [
            'file_kontrak' => 'mimes:pdf',
            'kd_klien' => ' required|max:50',
            'cp_internal_email' => ' required|max:200', 
            'pm' => 'max:200', 
            'konsultan' => 'max:1000', 
        ]);
    $kode = Pengalaman::where('kd_pengalaman', \DB::raw("(select max(kd_pengalaman) from mkt_pengalaman)"))->get();

if (count($kode)){
foreach ($kode as $data){
    $d = ((int)substr($data->kd_pengalaman,3)+1);
    $kd = "PGN".sprintf("%03s",$d);
}
}else{
    $kd = "PGN001";
}

    $pengalaman = new Pengalaman();
    $pengalaman->kd_pengalaman  = $kd;
    $pengalaman->kd_klien = $request->get('kd_klien');
    $pengalaman->kelompok_jasa = $request->get('kelompok_jasa');
    $pengalaman->sub_jasa = $request->get('sub_jasa');
     $pengalaman->cp_internal = $request->get('cp_internal');
    $pengalaman->cp_internal_email = $request->get('cp_internal_email');
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
    $pengalaman->save();


$klien = $request->get('nama_klien');
$keterangan = $request->get('status_closing');

$notif = new Notif_penjualan();
$notif->jenis = "NON-TENDER";
$notif->kd_penjualan = "".$kd."";
$notif->klien = "".$klien."" ;
$notif->keterangan = "".$keterangan."" ;
$notif->save();

$data = Pem_non_tender::find($kd_pn_non_tender);
$data->delete();

    \Session::flash('success','Selamat status proses menang, Silahkan periksa daftar pengalaman');
    return redirect('pem_non_tender');
    }

    function proses_close_kalah(Request $request, $kd_pn_non_tender)
    {
    $validatedData = $request->validate([
   'status_closing' => ' required|max:200',
   'kategori' => ' required|max:1000', 
   'keterangan' => ' max:1000', ]);


$kd_close = \DB::table('mkt_his_pem_non_tender')->where('kd_his_pn_non_tender', \DB::raw("(select max(kd_his_pn_non_tender) from mkt_his_pem_non_tender)"))->get();
    if (count($kd_close)){
    foreach ($kd_close as $data){
        $d = ((int)substr($data->kd_his_pn_non_tender,3)+1);
        $kd = "HPN".sprintf("%03s",$d);
    }
    }else{
        $kd = "HPN001";
    }

    $pem_non_tender = new His_pem_non_tender();
    $pem_non_tender->kd_his_pn_non_tender = $kd;
    $pem_non_tender->kd_pn_non_tender = $request->get('kd_pn_non_tender');
    $pem_non_tender->kelompok_jasa = $request->get('kelompok_jasa');
    $pem_non_tender->sub_jasa = $request->get('sub_jasa');
    $pem_non_tender->nama_pekerjaan = $request->get('nama_pekerjaan');
    $pem_non_tender->sub_pekerjaan = $request->get('sub_pekerjaan');
    $pem_non_tender->kd_klien = $request->get('kd_klien');
    $pem_non_tender->nama_klien = $request->get('nama_klien');
    $pem_non_tender->informasi_nama = $request->get('informasi_nama');
    $pem_non_tender->informasi_telp = $request->get('informasi_telp');   
    $pem_non_tender->informasi_email = $request->get('informasi_email');
    $pem_non_tender->tgl_permintaan = $request->get('tgl_permintaan');
    $pem_non_tender->tgl_canvasing = $request->get('tgl_canvasing');   
    $pem_non_tender->hasil_canvasing = $request->get('hasil_canvasing');
    $pem_non_tender->tgl_kak = $request->get('tgl_kak');
    $pem_non_tender->nilai_kak = $request->get('nilai_kak');   
    $pem_non_tender->tgl_proposal = $request->get('tgl_proposal');
    $pem_non_tender->nilai_penawaran = $request->get('nilai_penawaran');
    $pem_non_tender->tgl_presentasi = $request->get('tgl_presentasi');   
    $pem_non_tender->tgl_negosiasi = $request->get('tgl_negosiasi');
    $pem_non_tender->nilai_negosiasi = $request->get('nilai_negosiasi');
    $pem_non_tender->tgl_followup = $request->get('tgl_followup');   
    $pem_non_tender->status_followup = $request->get('status_followup');
    $pem_non_tender->peluang = $request->get('peluang');   
    $pem_non_tender->status_closing = $request->get('status_closing');
    $pem_non_tender->cp_internal = $request->get('cp_internal');
    $pem_non_tender->kategori = $request->get('kategori');
    $pem_non_tender->keterangan = $request->get('keterangan');
    $pem_non_tender->save();

$klien = $request->get('nama_klien');
$keterangan = $request->get('status_closing');

$notif = new Notif_penjualan();
$notif->jenis = "NON-TENDER";
$notif->kd_penjualan = "".$kd."";
$notif->klien = "".$klien."" ;
$notif->keterangan = "".$keterangan."" ;
$notif->save();

        $data = Pem_non_tender::find($kd_pn_non_tender);
        $data->delete();

    \Session::flash('success','Status Closing Kalah, Silahkan Periksa Daftar History Penjualan Non Tender');
    return redirect('pem_non_tender');
    }

    function history_pem_non_tender(Request $request)
    {       
    if ($request->has('nama_klien')) 
    {        
    $query = ($request->input('nama_klien'));
    $history = His_pem_non_tender::where('nama_klien', 'LIKE', '%' . $query . '%')
    ->orderBy('status_closing', 'desc')->paginate();
    }elseif ($request->has('cp_internal')) 
    {
    $query = ($request->input('cp_internal'));
    $history = His_pem_non_tender::where('cp_internal', 'LIKE', '%' . $query . '%')
    ->orderBy('cp_internal', 'desc')->paginate();
    }elseif ($request->has('tahun')) 
    {
    $query = ($request->input('tahun'));
    $history = His_pem_non_tender::WhereYear('created_at', 'LIKE', '%' . $query . '%')
    ->orderBy('created_at', 'desc')->paginate();
    }elseif ($request->has('kode')) 
    {
    $query = ($request->input('kode'));
    $history = His_pem_non_tender::where('kd_his_pn_non_tender', 'LIKE', '%' . $query . '%')
    ->orderBy('nama_klien', 'desc')->paginate();
    }else{
      $history = His_pem_non_tender::orderBy('status_closing', 'desc')->paginate(20);
    } 
    return view('/pem_non_tender/history/index',compact('history'));
    }

        function detail_history($kd_his_pn_non_tender)
    {
    $history_tender = His_pem_non_tender::where('kd_his_pn_non_tender',$kd_his_pn_non_tender)->get();
        return view('pem_non_tender/history/detail',compact('history_tender'));
    }

    function destroy(Request $request, $kd_pn_non_tender)
    {
        $data = Pem_non_tender::find($kd_pn_non_tender);
        $data->delete();
        \Session::flash('success','Data Berhasil Di Hapus');
        return redirect('pem_non_tender');
    }

            function reminder(Request $request)
    {       
    return view('reminder/non_tender/index');
    }
}