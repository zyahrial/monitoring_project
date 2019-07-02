<?php
namespace App\Http\Controllers;
use App\Ta;
use App\Barang;
use File;
use App\Exports\taExport; 

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class TaController extends Controller
    {   

    function index(Request $request)
    {       
    if ($request->has('nama')) 
    {        
    $query = ($request->input('nama'));
    $ta = Ta::where('nama', 'LIKE', '%' . $query . '%')
            ->orderBy('nama', 'asc')
            ->paginate();
    }
    elseif ($request->has('universitas'))  
    {        
    $query = ($request->input('universitas'));
    $ta = Ta::where('s1_univ', 'LIKE', '%' . $query . '%')
            ->orWhere( 's2_univ', 'LIKE', '%' . $query . '%')
            ->orWhere( 's3_univ', 'LIKE', '%' . $query . '%')
            ->orderBy('nama', 'asc')
            ->paginate();
    }else{ 
    $ta = Ta::orderBy('nama', 'asc')->paginate(10);    
    } 
    return view('ta.index',['ta' => $ta]);
    }

    function export(Request $request) 
    {
        return Excel::download(new TaExport($request->keahlian), 'Tenaga_Ahli.xlsx');
    }

    function view($kd_ta)
    {
    $ta = Ta::where('kd_ta',$kd_ta)->get(); 
    return view('ta/view',compact('ta'));
    }

    function create()
    {
       $sektor = \DB::table('mkt_lib_sektor')->orderBy('nama_sektor', 'desc')->get(); 
       $cp_ops_bagian = \DB::table('mkt_ops_bagian')->orderBy('nama_bagian', 'desc')->get(); 
       $cp_adm_bagian = \DB::table('mkt_adm_bagian')->orderBy('nama_bagian', 'desc')->get();
       return view('ta/insert',compact('cp_ops_bagian','cp_adm_bagian','sektor'));
    } 
    
    function store(Request $request)
    {

        $this->validate($request, [
            's1_tanggal_lulus' => ' required', 
            'file_ktp' => 'mimes:pdf',
             'file_npwp' => 'mimes:pdf',
             'file_ijazah_s1' => 'mimes:pdf',
             'file_ijazah_s2' => 'mimes:pdf',
             'file_ijazah_s3' => 'mimes:pdf', //only allow this type extension file.
             'file_spt' => 'mimes:pdf',
             'file_cv' => 'mimes:pdf,doc,docx',
             'file_sertifikat_keahlian' => 'mimes:pdf',
             'file_sertifikat_pelatihan' => 'mimes:pdf',
        ]);

       $post_kode = \DB::table('mkt_ta')->where('kd_ta', \DB::raw("(select max(kd_ta) from mkt_ta)"))->get();

if (count($post_kode)){
foreach ($post_kode as $data)
{
    $d = ((int)substr($data->kd_ta,2)+1);
    $kd = "TA".sprintf("%03s",$d);
}
}else{
    $kd = "TA001";
}

$ta = new Ta();
$ta->kd_ta  = $kd;
$ta->status = $request->get('status');
$ta->nama = $request->get('nama');
$ta->tempat_lahir = $request->get('tempat_lahir');
$ta->tanggal_lahir = $request->get('tanggal_lahir');
$ta->alamat = $request->get('alamat');
$ta->telp = $request->get('telp');
$ta->email = $request->get('email');

//$ta->no_ktp = $request->get('no_ktp');
//$ta->no_npwp = $request->get('no_npwp');
$ta->s1_univ = $request->get('s1_univ');
$ta->s1_jurusan = $request->get('s1_jurusan');
$ta->s1_tanggal_lulus = $request->get('s1_tanggal_lulus');

$ta->s2_univ = $request->get('s2_univ');
$ta->s2_jurusan = $request->get('s2_jurusan');
$ta->s2_tanggal_lulus = $request->get('s2_tanggal_lulus');

$ta->s3_univ = $request->get('s3_univ');
$ta->s3_jurusan = $request->get('s3_jurusan');
$ta->s3_tanggal_lulus = $request->get('s3_tanggal_lulus');

$ta->keahlian = $request->get('keahlian');
$ta->pengalaman = $request->get('pengalaman');


        $ktp = $request->get('no_ktp');
if (empty($request->file('file_ktp'))){
        }else{
        $file_ktp = $request->file('file_ktp');
        $ext = $file_ktp->getClientOriginalExtension();      
        $newName = $ktp.".".$ext;
        $file_ktp->move('file/ktp',$newName);
}
        $ta->no_ktp = $ktp;

        $npwp = $request->get('no_npwp');  
if (empty($request->file('file_npwp'))){
        }else{
        $file_npwp = $request->file('file_npwp'); 
        $ext = $file_npwp->getClientOriginalExtension();         
        $newName = $npwp.".".$ext;
        $file_npwp->move('file/npwp_ta',$newName);
}
        $ta->no_npwp = $npwp;

        $ta->s1_no_ijazah = $request->get('s1_no_ijazah');
if (empty($request->file('file_ijazah_s1'))){
        }else{
        $ijazah_s1 =  "ijazah-s1";
        $file_ijazah_s1 = $request->file('file_ijazah_s1');
        $ext = $file_ijazah_s1->getClientOriginalExtension(); 
        $newName = $ta->kd_ta."-".$ijazah_s1.".".$ext;
        $file_ijazah_s1->move('file/ijazah-s1',$newName);
        $ta->file_ijazah_s1 = $newName;
}
        $ta->s2_no_ijazah = $request->get('s2_no_ijazah');
if (empty($request->file('file_ijazah_s2'))){
        }else{
        $ijazah_s2 = "ijazah-s2";
        $file_ijazah_s2 = $request->file('file_ijazah_s2');
        $ext = $file_ijazah_s2->getClientOriginalExtension(); 
        $newName = $ta->kd_ta."-".$ijazah_s2.".".$ext;
        $file_ijazah_s2->move('file/ijazah-s2',$newName);
        $ta->file_ijazah_s2 = $newName;
}
        
        $ta->s3_no_ijazah = $request->get('s3_no_ijazah');
if (empty($request->file('file_ijazah_s3'))){
        }else{
        $ijazah_s3 = "ijazah-s3";
        $file_ijazah_s3 = $request->file('file_ijazah_s3');
        $ext = $file_ijazah_s3->getClientOriginalExtension(); 
        $newName = $ta->kd_ta."-".$ijazah_s3.".".$ext;
        $file_ijazah_s3->move('file/ijazah-s3',$newName);
        $ta->file_ijazah_s3 = $newName;
}    

if (empty($request->file('file_sertifikat_keahlian'))){
        }else{
        $sertifikat_keahlian ="cert-kln";
        $file_sertifikat_keahlian = $request->file('file_sertifikat_keahlian');
        $ext = $file_sertifikat_keahlian->getClientOriginalExtension(); 
        $newName = $ta->kd_ta."-".$sertifikat_keahlian.".".$ext;
        $file_sertifikat_keahlian->move('file/sertifikat_ta',$newName);
        $ta->sertifikat_keahlian = $newName;
}
if (empty($request->file('file_sertifikat_pelatihan'))){
        }else{
        $sertifikat_pelatihan ="cert-plt";
        $file_sertifikat_pelatihan = $request->file('file_sertifikat_pelatihan');
        $ext = $file_sertifikat_pelatihan->getClientOriginalExtension(); 
        $newName = $ta->kd_ta."-".$sertifikat_pelatihan.".".$ext;
        $file_sertifikat_pelatihan->move('file/sertifikat_ta',$newName);
        $ta->sertifikat_pelatihan = $newName;
}     
if (empty($request->file('file_spt'))){
        }else{
        $spt = "spt";
        $file_spt = $request->file('file_spt');
        $ext = $file_spt->getClientOriginalExtension(); 
        $newName = $ta->kd_ta."-".$spt.".".$ext;
        $file_spt->move('file/spt',$newName);
        $ta->spt = $newName;
}
if (empty($request->file('file_cv'))){
        }else{
        $cv = "cv";
        $file_cv = $request->file('file_cv');
        $ext = $file_cv->getClientOriginalExtension(); 
        $newName = $ta->kd_ta."-".$cv.".".$ext;
        $file_cv->move('file/cv',$newName);
        $ta->cv = $newName;
}
        $ta->save();

    \Session::flash('success','Data Ta Berhasil Di Tambahkan');
    return redirect('ta');    
    }
    
    function show($kd_ta)
    {
    $ta = Ta::where('kd_ta',$kd_ta)->get(); 
    return view('ta/edit',compact('ta'));
    }
 
    function update(Request $request, $kd_ta)
    {
        $this->validate($request, [
            's1_tanggal_lulus' => ' required',
            'file_ktp' => 'mimes:pdf',
             'file_npwp' => 'mimes:pdf',

             'file_ijazah_s1' => 'mimes:pdf',
             'file_ijazah_s2' => 'mimes:pdf',
             'file_ijazah_s3' => 'mimes:pdf', //only allow this type extension file.
             'file_spt' => 'mimes:pdf',
             'file_cv' => 'mimes:pdf,doc,docx',
             'file_sertifikat_keahlian' => 'mimes:pdf',
             'file_sertifikat_pelatihan' => 'mimes:pdf',
        ]);

$ta = Ta::find($kd_ta);
$ta->kd_ta = $request->get('kd_ta');
$ta->status = $request->get('status');
$ta->nama = $request->get('nama');
$ta->tempat_lahir = $request->get('tempat_lahir');
$ta->tanggal_lahir = $request->get('tanggal_lahir');
$ta->alamat = $request->get('alamat');
$ta->telp = $request->get('telp');
$ta->email = $request->get('email');

//$ta->no_ktp = $request->get('no_ktp');
//$ta->no_npwp = $request->get('no_npwp');
$ta->s1_univ = $request->get('s1_univ');
$ta->s1_jurusan = $request->get('s1_jurusan');
$ta->s1_tanggal_lulus = $request->get('s1_tanggal_lulus');

$ta->s2_univ = $request->get('s2_univ');
$ta->s2_jurusan = $request->get('s2_jurusan');
$ta->s2_tanggal_lulus = $request->get('s2_tanggal_lulus');

$ta->s3_univ = $request->get('s3_univ');
$ta->s3_jurusan = $request->get('s3_jurusan');
$ta->s3_tanggal_lulus = $request->get('s3_tanggal_lulus');

$ta->keahlian = $request->get('keahlian');
$ta->pengalaman = $request->get('pengalaman');

$pdf = ".pdf";

        $ktp = $request->get('no_ktp');
if (empty($request->file('file_ktp'))){
        }else{
     $path = public_path().'/file/ktp/'.$ta->no_ktp.$pdf;
     File::delete($path );
        $file_ktp = $request->file('file_ktp');
        $ext = $file_ktp->getClientOriginalExtension();      
        $newName = $ktp.".".$ext;
        $file_ktp->move('file/ktp',$newName);
}
        $ta->no_ktp = $ktp;

        $npwp = $request->get('no_npwp');  
if (empty($request->file('file_npwp'))){
        }else{
    $path = public_path().'/file/npwp_ta/'.$ta->no_npwp.$pdf;
    File::delete($path );
        $file_npwp = $request->file('file_npwp'); 
        $ext = $file_npwp->getClientOriginalExtension();         
        $newName = $npwp.".".$ext;
        $file_npwp->move('file/npwp_ta',$newName);
}
        $ta->no_npwp = $npwp;

        $ta->s1_no_ijazah = $request->get('s1_no_ijazah');
if (empty($request->file('file_ijazah_s1'))){
        }else{
    $path = public_path().'/file/ijazah-s1/'.$ta->file_ijazah_s1;
    File::delete($path );
        $ijazah_s1 =  "ijazah-s1";
        $file_ijazah_s1 = $request->file('file_ijazah_s1');
        $ext = $file_ijazah_s1->getClientOriginalExtension(); 
        $newName = $ta->kd_ta."-".$ijazah_s1.".".$ext;
        $file_ijazah_s1->move('file/ijazah-s1',$newName);
        $ta->file_ijazah_s1 = $newName;
}
        $ta->s2_no_ijazah = $request->get('s2_no_ijazah');
if (empty($request->file('file_ijazah_s2'))){
        }else{
    $path = public_path().'/file/ijazah-s2/'.$ta->file_ijazah_s2;
    File::delete($path );
        $ijazah_s2 = "ijazah-s2";
        $file_ijazah_s2 = $request->file('file_ijazah_s2');
        $ext = $file_ijazah_s2->getClientOriginalExtension(); 
        $newName = $ta->kd_ta."-".$ijazah_s2.".".$ext;
        $file_ijazah_s2->move('file/ijazah-s2',$newName);
        $ta->file_ijazah_s2 = $newName;
}
        
        $ta->s3_no_ijazah = $request->get('s3_no_ijazah');
if (empty($request->file('file_ijazah_s3'))){
        }else{
    $path = public_path().'/file/ijazah-s3/'.$ta->file_ijazah_s3;
    File::delete($path );
        $ijazah_s3 = "ijazah-s3";
        $file_ijazah_s3 = $request->file('file_ijazah_s3');
        $ext = $file_ijazah_s3->getClientOriginalExtension(); 
        $newName = $ta->kd_ta."-".$ijazah_s3.".".$ext;
        $file_ijazah_s3->move('file/ijazah-s3',$newName);
        $ta->file_ijazah_s3 = $newName;
}    

if (empty($request->file('file_sertifikat_keahlian'))){
        }else{
    $path = public_path().'/file/sertifikat_ta/'.$ta->sertifikat_keahlian;
    File::delete($path );
        $sertifikat_keahlian ="cert-kln";
        $file_sertifikat_keahlian = $request->file('file_sertifikat_keahlian');
        $ext = $file_sertifikat_keahlian->getClientOriginalExtension(); 
        $newName = $ta->kd_ta."-".$sertifikat_keahlian.".".$ext;
        $file_sertifikat_keahlian->move('file/sertifikat_ta',$newName);
        $ta->sertifikat_keahlian = $newName;
}
if (empty($request->file('file_sertifikat_pelatihan'))){
        }else{
    $path = public_path().'/file/sertifikat_ta/'.$ta->sertifikat_pelatihan;
    File::delete($path );        
        $sertifikat_pelatihan ="cert-plt";
        $file_sertifikat_pelatihan = $request->file('file_sertifikat_pelatihan');
        $ext = $file_sertifikat_pelatihan->getClientOriginalExtension(); 
        $newName = $ta->kd_ta."-".$sertifikat_pelatihan.".".$ext;
        $file_sertifikat_pelatihan->move('file/sertifikat_ta',$newName);
        $ta->sertifikat_pelatihan = $newName;
}     
if (empty($request->file('file_spt'))){
        }else{
     $path = public_path().'/file/spt/'.$ta->spt;
     File::delete($path );     
        $spt = "spt";
        $file_spt = $request->file('file_spt');
        $ext = $file_spt->getClientOriginalExtension(); 
        $newName = $ta->kd_ta."-".$spt.".".$ext;
        $file_spt->move('file/spt',$newName);
        $ta->spt = $newName;
}
if (empty($request->file('file_cv'))){
        }else{
    $path = public_path().'/file/cv/'.$ta->cv;
    File::delete($path);     
        $cv = "cv";
        $file_cv = $request->file('file_cv');
        $ext = $file_cv->getClientOriginalExtension(); 
        $newName = $ta->kd_ta."-".$cv.".".$ext;
        $file_cv->move('file/cv',$newName);
        $ta->cv = $newName;
}
        $ta->save();

    \Session::flash('success','Data Ta Berhasil Di Edit');
    return redirect('ta/view/'.$kd_ta);    
}   
    
    function destroy(Request $request, $kd_ta)
    {
        $data = Ta::find($kd_ta); 
        $ext = ".pdf";
        $file_no_ktp = public_path().'/file/ktp/'.$data->no_ktp.$ext;
        $file_no_npwp = public_path().'/file/npwp_ta/'.$data->no_npwp.$ext;
        $file_ijazah_s1 = public_path().'/file/ijazah-s1/'.$data->file_ijazah_s1;
        $file_ijazah_s2 = public_path().'/file/ijazah-s2/'.$data->file_ijazah_s2;
        $file_ijazah_s3 = public_path().'/file/ijazah-s3/'.$data->file_ijazah_s3;
        $file_sertifikat_keahlian = public_path().'/file/sertifikat_ta/'.$data->sertifikat_keahlian;
        $file_sertifikat_pelatihan = public_path().'/file/sertifikat_ta/'.$data->sertifikat_pelatihan;
        $file_spt = public_path().'/file/spt/'.$data->spt;
        $file_cv = public_path().'/file/cv/'.$data->cv;

File::delete($file_no_ktp,$file_no_npwp,$file_ijazah_s1,$file_ijazah_s2,$file_ijazah_s3,$file_sertifikat_keahlian, 
    $file_sertifikat_pelatihan,$file_spt,$file_cv );
        //Storage::delete('file/npwp/'.$klien->npwp);
        Ta::where('kd_ta', $kd_ta)->delete();
        \Session::flash('success','Data Ta Berhasil Di Hapus');
        return redirect('ta');
    }
}