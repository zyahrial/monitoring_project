<?php
namespace App\Http\Controllers;
use Auth;
use App\Pengalaman;
use App\Klien;
use App\Exports\PengalamanExport;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Excel;


class PengalamanController extends Controller
    {   
    function index(Request $request)
    {       
    if ($request->has('nama_klien'))
    {        
    $query = ($request->input('nama_klien'));
    $pengalaman = Klien::join('mkt_pengalaman', 'mkt_klien.kd_klien', '=', 'mkt_pengalaman.kd_klien')
    ->where('nama_klien', 'LIKE', '%' . $query . '%')
    ->orderBy('nama_klien', 'asc')->paginate();
    }elseif ($request->has('end')) 
    {        
    $start = ($request->input('start'));
    $end = ($request->input('end'));
    $pengalaman = Klien::join('mkt_pengalaman', 'mkt_klien.kd_klien', '=', 'mkt_pengalaman.kd_klien')
    ->whereBetween('kontrak_mulai', array($start, $end))
    ->orderBy('nama_klien', 'asc')->paginate();
    }elseif ($request->has('kode'))
    {        
    $query = ($request->input('kode'));
    $pengalaman = Klien::join('mkt_pengalaman', 'mkt_klien.kd_klien', '=', 'mkt_pengalaman.kd_klien')
    ->where('kd_pengalaman', 'LIKE', '%' . $query . '%')
    ->orderBy('nama_klien', 'asc')->paginate();
    }elseif ($request->has('cp_internal')) 
    {        
    $query = ($request->input('cp_internal'));
    $pengalaman = Klien::join('mkt_pengalaman', 'mkt_klien.kd_klien', '=', 'mkt_pengalaman.kd_klien')
    ->where('cp_internal', 'LIKE', '%' . $query . '%')
    ->orderBy('cp_internal', 'asc')->paginate();
    }elseif ($request->has('tahun')) 
    {        
    $query = ($request->input('tahun'));
    $pengalaman = Klien::join('mkt_pengalaman', 'mkt_klien.kd_klien', '=', 'mkt_pengalaman.kd_klien')
    ->WhereYear('kontrak_mulai', 'LIKE', '%' . $query . '%')->orderBy('kontrak_mulai', 'asc')->paginate();
    }else{
    $pengalaman = Klien::join('mkt_pengalaman', 'mkt_klien.kd_klien', '=', 'mkt_pengalaman.kd_klien')
    ->select('mkt_klien.nama_klien', 'mkt_pengalaman.*')
     ->orderBy('kontrak_mulai', 'desc')->paginate(20);
    }
    return view('pengalaman.index',['pengalaman' => $pengalaman]);
    }

        public function export(Request $request) 
    {
        return Excel::download(new PengalamanExport($request->mulai, $request->selesai), 'Pengalaman.xlsx');
    }

    function user(Request $request)
{
    $email = (Auth::user()->email);
    $pengalaman = Klien::join('mkt_pengalaman', 'mkt_klien.kd_klien', '=', 'mkt_pengalaman.kd_klien')
    ->where('cp_internal_email', '=',$email )
    ->orderBy('kd_pengalaman', 'asc')->get();
    return view('pengalaman.index',['pengalaman' => $pengalaman]);
}

    function detail($kd_pengalaman)
    {
    $pengalaman = Klien::join('mkt_pengalaman', 'mkt_klien.kd_klien', '=', 'mkt_pengalaman.kd_klien')->
    where('kd_pengalaman',$kd_pengalaman)->get(); 
    return view('pengalaman/detail',compact('pengalaman'));
    }

    function create()
    {
       return view('pengalaman/insert');
    } 
    
    function store(Request $request)
    {
        $this->validate($request, [
            'file_kontrak' => 'mimes:pdf',
            'file_addendum1' => 'mimes:pdf',
            'file_addendum2' => 'mimes:pdf',
            'file_addendum3' => 'mimes:pdf',
            'file_addendum4' => 'mimes:pdf',
            'file_addendum5' => 'mimes:pdf',
            'file_bast' => 'mimes:pdf',
            'file_referensi' => 'mimes:pdf',

'kd_klien' => 'required|max:50',
'kelompok_jasa' => 'max:1000',
'sub_jasa' => 'max:1000',
'sub_pekerjaan' => 'max:1000',
'nama_pekerjaan' => 'max:1000',
'ringkasan_lingkup' => 'max:1000',
'lokasi_pekerjaan' => 'max:1000',
'no_kontrak' => 'max:200',
'no_addendum1' => 'max:200',
'no_addendum2' => 'max:200',
'no_addendum3' => 'max:200',
'no_addendum4' => 'max:200',
'no_addendum5' => 'max:200',
'pm' => 'max:200',
'konsultan' => 'max:1000',
'bast_doc' => 'max:200',
'referensi_doc' => 'max:200',
'cp_internal' => 'max:200',
'cp_internal_email' => 'max:200',
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


   $pengalaman->no_addendum1 = $request->get('no_addendum1');
   $addendum1 = 'ADDENDUM1-';
     if (empty($request->file('file_addendum1'))){
        }else{
        $file_addendum1 = $request->file('file_addendum1');
        $ext =  $file_addendum1->getClientOriginalExtension();      
        $newName = $addendum1.$pengalaman->kd_pengalaman.".".$ext;
        $file_addendum1->move('file/pengalaman/addendum',$newName);
}

   $pengalaman->no_addendum2 = $request->get('no_addendum2');
   $addendum2 = 'ADDENDUM2-';
     if (empty($request->file('file_addendum2'))){
        }else{
        $file_addendum2 = $request->file('file_addendum2');
        $ext =  $file_addendum2->getClientOriginalExtension();      
        $newName = $addendum2.$pengalaman->kd_pengalaman.".".$ext;
        $file_addendum2->move('file/pengalaman/addendum',$newName);
}

   $pengalaman->no_addendum3 = $request->get('no_addendum3');
   $addendum3 = 'ADDENDUM3-';
     if (empty($request->file('file_addendum3'))){
        }else{
        $file_addendum3 = $request->file('file_addendum3');
        $ext =  $file_addendum3->getClientOriginalExtension();      
        $newName = $addendum3.$pengalaman->kd_pengalaman.".".$ext;
        $file_addendum3->move('file/pengalaman/addendum',$newName);
}
   $pengalaman->no_addendum4 = $request->get('no_addendum4');
   $addendum4 = 'ADDENDUM4-';
     if (empty($request->file('file_addendum4'))){
        }else{
        $file_addendum4 = $request->file('file_addendum4');
        $ext =  $file_addendum4->getClientOriginalExtension();      
        $newName = $addendum4.$pengalaman->kd_pengalaman.".".$ext;
        $file_addendum4->move('file/pengalaman/addendum',$newName);
}

   $pengalaman->no_addendum5 = $request->get('no_addendum5');
   $addendum5 = 'ADDENDUM5-';
     if (empty($request->file('file_addendum5'))){
        }else{
        $file_addendum5 = $request->file('file_addendum5');
        $ext =  $file_addendum5->getClientOriginalExtension();      
        $newName = $addendum5.$pengalaman->kd_pengalaman.".".$ext;
        $file_addendum5->move('file/pengalaman/addendum',$newName);
}

    $pengalaman->nilai_addendum = $request->get('nilai_addendum');
    $pengalaman->addedum_mulai = $request->get('addedum_mulai');
    $pengalaman->addendum_selesai = $request->get('addendum_selesai');
    $pengalaman->pm = $request->get('pm');
    $pengalaman->konsultan = $request->get('konsultan');

$bast = '-BAST';
     if (empty($request->file('file_bast'))){
        }else{
        $file_bast = $request->file('file_bast');
        $ext =  $file_bast->getClientOriginalExtension();      
        $newName = $pengalaman->kd_pengalaman.$bast.".".$ext;
        $file_bast->move('file/pengalaman/bast',$newName);
        $pengalaman->bast_doc = $newName;
}
    
$ref = '-REF';
     if (empty($request->file('file_referensi'))){
        }else{
        $file_referensi = $request->file('file_referensi');
        $ext =  $file_referensi->getClientOriginalExtension();      
        $newName = $pengalaman->kd_pengalaman.$ref.".".$ext;
        $file_referensi->move('file/pengalaman/ref',$newName);
        $pengalaman->referensi_doc = $newName;
}
    
    $pengalaman->save();

    \Session::flash('success','Data Pengalaman Berhasil Tambahkan');
    return redirect('pengalaman');    
    }
    
    function show($kd_pengalaman)
    {
    $pengalaman = Klien::join('mkt_pengalaman', 'mkt_klien.kd_klien', '=', 'mkt_pengalaman.kd_klien')->
    where('kd_pengalaman',$kd_pengalaman)->get(); 
    return view('pengalaman/edit',compact('pengalaman'));
    }

    function generate($kd_pengalaman)
    {
    $pengalaman = Klien::join('mkt_pengalaman', 'mkt_klien.kd_klien', '=', 'mkt_pengalaman.kd_klien')->
    where('kd_pengalaman',$kd_pengalaman)->get(); 
    return view('pengalaman/generate_proyek',compact('pengalaman'));
    }
 
    function update(Request $request, $kd_pengalaman)
    {
        $this->validate($request, [
            'file_kontrak' => 'mimes:pdf',
            'file_addendum1' => 'mimes:pdf',
            'file_addendum2' => 'mimes:pdf',
            'file_addendum3' => 'mimes:pdf',
            'file_addendum4' => 'mimes:pdf',
            'file_addendum5' => 'mimes:pdf',
            'file_bast' => 'mimes:pdf',
            'file_referensi' => 'mimes:pdf',

'kd_pengalaman' => 'required|max:50',
'kd_klien' => 'required|max:50',
'kelompok_jasa' => 'max:1000',
'sub_jasa' => 'max:1000',
'sub_pekerjaan' => 'max:1000',
'nama_pekerjaan' => 'max:1000',
'ringkasan_lingkup' => 'max:1000',
'lokasi_pekerjaan' => 'max:1000',
'no_kontrak' => 'max:200',
'no_addendum1' => 'max:200',
'no_addendum2' => 'max:200',
'no_addendum3' => 'max:200',
'no_addendum4' => 'max:200',
'no_addendum5' => 'max:200',
'pm' => 'max:200',
'konsultan' => 'max:1000',
'bast_doc' => 'max:200',
'referensi_doc' => 'max:200',
'cp_internal' => 'max:200',
'cp_internal_email' => 'max:200',
 ]);

    $pengalaman = Pengalaman::find($kd_pengalaman);
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
        $file_path = public_path().'/file/pengalaman/kontrak/'.$kontrak.$pengalaman->kd_pengalaman.".".$ext;
        File::delete($file_path);
        $file_kontrak = $request->file('file_kontrak');
            
        $newName = $kontrak.$pengalaman->kd_pengalaman.".".$ext;
        $file_kontrak->move('file/pengalaman/kontrak',$newName);
}

    $pengalaman->nilai_kontrak = $request->get('nilai_kontrak');
    $pengalaman->kontrak_mulai = $request->get('kontrak_mulai');
    $pengalaman->kontrak_selesai = $request->get('kontrak_selesai');


   $pengalaman->no_addendum1 = $request->get('no_addendum1');
   $addendum1 = 'ADDENDUM1-';
     if (empty($request->file('file_addendum1'))){
        }else{
                    $file_addendum1 = $request->file('file_addendum1');
        $ext =  $file_addendum1->getClientOriginalExtension();  
        $file_path = public_path().'/file/pengalaman/addendum/'.$addendum1.$pengalaman->kd_pengalaman.".".$ext;
        File::delete($file_path);
                   $file_addendum1 = $request->file('file_addendum1');
        $newName = $addendum1.$pengalaman->kd_pengalaman.".".$ext;
        $file_addendum1->move('file/pengalaman/addendum',$newName);
}

   $pengalaman->no_addendum2 = $request->get('no_addendum2');
   $addendum2 = 'ADDENDUM2-';
     if (empty($request->file('file_addendum2'))){
        }else{
                    $file_addendum2 = $request->file('file_addendum2');
            $ext =  $file_addendum2->getClientOriginalExtension(); 
        $file_path = public_path().'/file/pengalaman/addendum/'.$addendum2.$pengalaman->kd_pengalaman.".".$ext;
        File::delete($file_path);
        $file_addendum2 = $request->file('file_addendum2');         
        $newName = $addendum2.$pengalaman->kd_pengalaman.".".$ext;
        $file_addendum2->move('file/pengalaman/addendum',$newName);
}

   $pengalaman->no_addendum3 = $request->get('no_addendum3');
   $addendum3 = 'ADDENDUM3-';
     if (empty($request->file('file_addendum3'))){
        }else{
                    $file_addendum3 = $request->file('file_addendum3');
            $ext =  $file_addendum3->getClientOriginalExtension();    
        $file_path = public_path().'/file/pengalaman/addendum/'.$addendum3.$pengalaman->kd_pengalaman.".".$ext;
        File::delete($file_path);
        $file_addendum3 = $request->file('file_addendum3');        
        $newName = $addendum3.$pengalaman->kd_pengalaman.".".$ext;
        $file_addendum3->move('file/pengalaman/addendum',$newName);
}
   $pengalaman->no_addendum4 = $request->get('no_addendum4');
   $addendum4 = 'ADDENDUM4-';
     if (empty($request->file('file_addendum4'))){
        }else{
                    $file_addendum4 = $request->file('file_addendum4');
             $ext =  $file_addendum4->getClientOriginalExtension();  
        $file_path = public_path().'/file/pengalaman/addendum/'.$addendum4.$pengalaman->kd_pengalaman.".".$ext;
        File::delete($file_path);   
        $file_addendum4 = $request->file('file_addendum4');
           
        $newName = $addendum4.$pengalaman->kd_pengalaman.".".$ext;
        $file_addendum4->move('file/pengalaman/addendum',$newName);
}

   $pengalaman->no_addendum5 = $request->get('no_addendum5');
   $addendum5 = 'ADDENDUM5-';
     if (empty($request->file('file_addendum5'))){
        }else{
                    $file_addendum5 = $request->file('file_addendum5');
             $ext =  $file_addendum5->getClientOriginalExtension(); 
        $file_path = public_path().'/file/pengalaman/addendum/'.$addendum5.$pengalaman->kd_pengalaman.".".$ext;
        File::delete($file_path);
        $file_addendum5 = $request->file('file_addendum5');
            
        $newName = $addendum5.$pengalaman->kd_pengalaman.".".$ext;
        $file_addendum5->move('file/pengalaman/addendum',$newName);
}

    $pengalaman->nilai_addendum = $request->get('nilai_addendum');
    $pengalaman->addedum_mulai = $request->get('addedum_mulai');
    $pengalaman->addendum_selesai = $request->get('addendum_selesai');
    $pengalaman->pm = $request->get('pm');
    $pengalaman->konsultan = $request->get('konsultan');

$bast = '-BAST';
     if (empty($request->file('file_bast'))){
        }else{
        $file_path = public_path().'/file/pengalaman/bast/'.$pengalaman->bast_doc;
        File::delete($file_path);
        $file_bast = $request->file('file_bast');
        $ext =  $file_bast->getClientOriginalExtension();      
        $newName = $pengalaman->kd_pengalaman.$bast.".".$ext;
        $file_bast->move('file/pengalaman/bast',$newName);
        $pengalaman->bast_doc = $newName;
}
    
$ref = '-REF';
     if (empty($request->file('file_referensi'))){
        }else{
        $file_path = public_path().'/file/pengalaman/ref/'.$pengalaman->referensi_doc;
        File::delete($file_path);
        $file_referensi = $request->file('file_referensi');
        $ext =  $file_referensi->getClientOriginalExtension();      
        $newName = $pengalaman->kd_pengalaman.$ref.".".$ext;
        $file_referensi->move('file/pengalaman/ref',$newName);
        $pengalaman->referensi_doc = $newName;
}
    
    $pengalaman->save();
    \Session::flash('success','Dapengalaman Pengalaman Berhasil Di Ubah');
    return redirect('pengalaman/detail/'.$kd_pengalaman);    
}   
    
    function destroy(Request $request, $kd_pengalaman)
    {
        $pengalaman = Pengalaman::find($kd_pengalaman);
        $ext = ".pdf";
        $kontrak = "KONTRAK-";
        $addendum1 = "ADDENDUM1-";
        $addendum2 = "ADDENDUM2-";
        $addendum3 = "ADDENDUM3-";
        $addendum4 = "ADDENDUM4-";
        $addendum5 = "ADDENDUM5-";
        $ref = "-REF";
        $bast = "-BAST";
        $file_kontrak   = public_path().'/file/pengalaman/kontrak/'.$kontrak.$pengalaman->kd_pengalaman.$ext;
        $file_addendum1 = public_path().'/file/pengalaman/addendum/'.$addendum1.$pengalaman->kd_pengalaman.$ext;
        $file_addendum2 = public_path().'/file/pengalaman/addendum/'.$addendum2.$pengalaman->kd_pengalaman.$ext;
        $file_addendum3 = public_path().'/file/pengalaman/addendum/'.$addendum3.$pengalaman->kd_pengalaman.$ext;
        $file_addendum4 = public_path().'/file/pengalaman/addendum/'.$addendum4.$pengalaman->kd_pengalaman.$ext;
        $file_addendum5 = public_path().'/file/pengalaman/addendum/'.$addendum5.$pengalaman->kd_pengalaman.$ext;

       $file_ref = public_path().'/file/pengalaman/ref/'.$pengalaman->kd_pengalaman.$ref.$ext;
       $file_bast = public_path().'/file/pengalaman/bast/'.$pengalaman->kd_pengalaman.$bast.$ext;

File::delete($file_kontrak,$file_addendum1,$file_addendum2,$file_addendum3,$file_addendum4,$file_addendum5,$file_ref,$file_bast);
        //Storage::delete('file/npwp/'.$klien->npwp);
        Pengalaman::where('kd_pengalaman', $kd_pengalaman)->delete();
        \Session::flash('success','Data Pengalaman Pengalaman Berhasil Di Hapus');
        return redirect('pengalaman');
    }

    function reminder(Request $request)
    {       
    return view('reminder/pengalaman/index');
    }
}