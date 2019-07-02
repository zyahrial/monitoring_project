<?php
namespace App\Http\Controllers;
use App\Klien;
use App\Legalitas_notif;
use App\Karyawan;
use App\Sektor;
use App\Librarysubsektor;
use App\Bagian_ops;
use App\Bagian_adm;
use App\Pem_tender;
use App\Pem_non_tender;
use App\Pengalaman; 
use App\His_pem_tender;
use App\Exports\KlienExport; 
use File;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class KlienController extends Controller
{
    function index(Request $request)
    {  
    if ($request->has('nama_klien')) 
    {        
    $query = ($request->input('nama_klien'));
    $datas = Klien::where('nama_klien', 'LIKE', '%' . $query . '%')
    ->orderBy('nama_klien', 'asc')->paginate();
    }elseif  ($request->has('jenis_usaha'))
    {        
    $query = ($request->input('jenis_usaha'));
    $datas = Klien::where('jenis_usaha', 'LIKE', '%' . $query . '%')
    ->orderBy('jenis_usaha', 'asc')->paginate();
    }elseif  ($request->has('jenis_sektor'))
    { 
    $query = ($request->input('jenis_sektor'));
    $datas = Klien::where('jenis_sektor', 'LIKE', '%' . $query . '%')
    ->orderBy('jenis_sektor', 'asc')->paginate();
    }else{
      $datas = Klien::orderBy('kd_klien', 'asc')->paginate(20);
    } 
    return view('klien.index',['datas' => $datas]);
    }

    function export(Request $request) 
    {
        return Excel::download(new KlienExport($request->jenis_sektor), 'klien.xlsx');
    }

    function create()
    {
       $posts = \DB::table('mkt_klien')->where('kd_klien', \DB::raw("(select max(kd_klien) from mkt_klien)"))->get();
       $cp_ops_bagian = \DB::table('mkt_ops_bagian')->orderBy('nama_bagian', 'desc')->get(); 
       $cp_adm_bagian = \DB::table('mkt_adm_bagian')->orderBy('nama_bagian', 'desc')->get();
       return view('klien/insert',compact('posts','cp_ops_bagian','cp_adm_bagian','sektor'));
    }
  
    function store(Request $request)
    {
        $this->validate($request, [
            'file' => 'mimes:pdf',
            'nama_klien' => 'max:200|unique:mkt_klien', 
            'jenis_sektor' => 'max:1000', 
            'jenis_usaha' => 'max:1000',
            'sub_sektor' => 'max:1000', 
            'alamat' => 'max:1000',
            'telp_fax' => 'max:200',
            'email' => 'max:200', 
            'website' => 'max:200',
'npwp' => 'max:200', 
'cp_adm_nama1' => 'max:200', 
'cp_adm_jabatan1' => 'max:200', 
'cp_adm_bagian1' => 'max:200', 
'cp_adm_telp1' => 'max:200', 
'cp_adm_email1' => 'max:200', 
'cp_adm_nama2' => 'max:200', 
'cp_adm_jabatan2' => 'max:200', 
'cp_adm_bagian2' => 'max:200', 
'cp_adm_telp2' => 'max:200', 
'cp_adm_email2' => 'max:200', 
'cp_adm_nama3' => 'max:200', 
'cp_adm_jabatan3' => 'max:200', 
'cp_adm_bagian3' => 'max:200', 
'cp_adm_telp3' => 'max:200', 
'cp_adm_email3' => 'max:200', 
'cp_adm_nama4' => 'max:200', 
'cp_adm_jabatan4' => 'max:200', 
'cp_adm_bagian4' => 'max:200', 
'cp_adm_telp4' => 'max:200', 
'cp_adm_email4' => 'max:200', 
'cp_adm_nama5' => 'max:200', 
'cp_adm_jabatan5' => 'max:200', 
'cp_adm_bagian5' => 'max:200', 
'cp_adm_telp5' => 'max:200', 
'cp_adm_email5' => 'max:200', 
'cp_ops_nama1' => 'max:200', 
'cp_ops_jabatan1' => 'max:200', 
'cp_ops_bagian1' => 'max:200', 
'cp_ops_telp1' => 'max:200', 
'cp_ops_email1' => 'max:200', 
'cp_ops_nama2' => 'max:200', 
'cp_ops_jabatan2' => 'max:200', 
'cp_ops_bagian2' => 'max:200', 
'cp_ops_telp2' => 'max:200', 
'cp_ops_email2' => 'max:200', 
'cp_ops_nama3' => 'max:200', 
'cp_ops_jabatan3' => 'max:200', 
'cp_ops_bagian3' => 'max:200', 
'cp_ops_telp3' => 'max:200', 
'cp_ops_email3' => 'max:200', 
'cp_ops_nama4' => 'max:200',
'cp_ops_nama4' => 'max:200',
'cp_ops_jabatan4' => 'max:200',
'cp_ops_bagian4' => 'max:200',
'cp_ops_telp4' => 'max:200',
'cp_ops_email4' => 'max:200',
'cp_ops_nama5' => 'max:200',
'cp_ops_jabatan5' => 'max:200',
'cp_ops_bagian5' => 'max:200',
'cp_ops_telp5' => 'max:200',
'cp_ops_email5' => 'max:200',
        ]);

    $posts = \DB::table('mkt_klien')->where('kd_klien', \DB::raw("(select max(kd_klien) from mkt_klien)"))->get();

    if (count($posts))
    {
    foreach ($posts as $data){
    $d = ((int)substr($data->kd_klien,2)+1);
    $kd = "KL".sprintf("%03s",$d);
    $kd_klien = $kd;
    }
    }else{
    $kd = "KL001";
    }

    $data = new Klien();
    $data->kd_klien = ($kd);
    $data->nama_klien = $request->get('nama_klien');
    $data->jenis_usaha = $request->get('jenis_usaha');
    $data->jenis_sektor = $request->get('jenis_sektor');
    $data->sub_sektor = $request->get('sub_sektor');
    $data->alamat = $request->get('alamat');
    $data->telp_fax = $request->get('telp_fax');
    $data->email = $request->get('email');
    $data->website = $request->get('website'); 

    if (empty($request->file('file'))){
        }else{
        $npwp = "npwp";
        $file = $request->file('file');
        $ext = $file->getClientOriginalExtension();
        $newName = $data->kd_klien.$npwp.".".$ext;
        $file->move('file/npwp',$newName);
        $data->npwp = $newName;
    }
 
    $data->cp_ops_nama1 = $request->get('cp_ops_nama1');
    $data->cp_ops_jabatan1 = $request->get('cp_ops_jabatan1');
    $data->cp_ops_bagian1 = $request->get('cp_ops_bagian1');
    $data->cp_ops_telp1 = $request->get('cp_ops_telp1');
    $data->cp_ops_email1 = $request->get('cp_ops_email1');
    $data->cp_ops_nama2 = $request->get('cp_ops_nama2');
    $data->cp_ops_jabatan2 = $request->get('cp_ops_jabatan2');
    $data->cp_ops_bagian2 = $request->get('cp_ops_bagian2');
    $data->cp_ops_telp2 = $request->get('cp_ops_telp2');
    $data->cp_ops_email2 = $request->get('cp_ops_email2');
        $data->cp_ops_nama3 = $request->get('cp_ops_nama3');
    $data->cp_ops_jabatan3 = $request->get('cp_ops_jabatan3');
    $data->cp_ops_bagian3 = $request->get('cp_ops_bagian3');
    $data->cp_ops_telp3 = $request->get('cp_ops_telp3');
    $data->cp_ops_email3 = $request->get('cp_ops_email3');
        $data->cp_ops_nama4 = $request->get('cp_ops_nama4');
    $data->cp_ops_jabatan4 = $request->get('cp_ops_jabatan4');
    $data->cp_ops_bagian4 = $request->get('cp_ops_bagian4');
    $data->cp_ops_telp4 = $request->get('cp_ops_telp4');
    $data->cp_ops_email4 = $request->get('cp_ops_email4');
            $data->cp_ops_nama5 = $request->get('cp_ops_nama5');
    $data->cp_ops_jabatan5 = $request->get('cp_ops_jabatan5');
    $data->cp_ops_bagian5 = $request->get('cp_ops_bagian5');
    $data->cp_ops_telp5 = $request->get('cp_ops_telp5');
    $data->cp_ops_email5 = $request->get('cp_ops_email5');

    $data->cp_adm_nama1 = $request->get('cp_adm_nama1');
    $data->cp_adm_jabatan1 = $request->get('cp_adm_jabatan1');
    $data->cp_adm_bagian1 = $request->get('cp_adm_bagian1');
    $data->cp_adm_telp1 = $request->get('cp_adm_telp1');
    $data->cp_adm_email1 = $request->get('cp_adm_email1');
        $data->cp_adm_nama2 = $request->get('cp_adm_nama2');
    $data->cp_adm_jabatan2 = $request->get('cp_adm_jabatan2');
    $data->cp_adm_bagian2 = $request->get('cp_adm_bagian2');
    $data->cp_adm_telp2 = $request->get('cp_adm_telp2');
    $data->cp_adm_email2 = $request->get('cp_adm_email2');
        $data->cp_adm_nama3 = $request->get('cp_adm_nama3');
    $data->cp_adm_jabatan3 = $request->get('cp_adm_jabatan3');
    $data->cp_adm_bagian3 = $request->get('cp_adm_bagian3');
    $data->cp_adm_telp3 = $request->get('cp_adm_telp3');
    $data->cp_adm_email3 = $request->get('cp_adm_email3');
        $data->cp_adm_nama4 = $request->get('cp_adm_nama4');
    $data->cp_adm_jabatan4 = $request->get('cp_adm_jabatan4');
    $data->cp_adm_bagian4 = $request->get('cp_adm_bagian4');
    $data->cp_adm_telp4 = $request->get('cp_adm_telp4');
    $data->cp_adm_email4 = $request->get('cp_adm_email4');
        $data->cp_adm_nama5 = $request->get('cp_adm_nama5');
    $data->cp_adm_jabatan5 = $request->get('cp_adm_jabatan5');
    $data->cp_adm_bagian5 = $request->get('cp_adm_bagian5');
    $data->cp_adm_telp5 = $request->get('cp_adm_telp5');
    $data->cp_adm_email5 = $request->get('cp_adm_email5');
    $data->save();

    \Session::flash('success','Data Klien Berhasil Di Tambahkan');
    return redirect('klien');  
    }

    function show($kd_klien)
    {
    $klien = Klien::where('kd_klien',$kd_klien)->get();
    $cp_ops_bagian = \DB::table('mkt_ops_bagian')->orderBy('nama_bagian', 'asc')->get(); 
    $cp_adm_bagian = \DB::table('mkt_adm_bagian')->orderBy('nama_bagian', 'asc')->get();
       return view('klien/edit',compact('klien','cp_ops_bagian','cp_adm_bagian'));
    }

    function update(Request $request, $kd_klien)
    { 
        $this->validate($request, [
            'file' => 'mimes:pdf',
            'kd_klien' => 'required|max:50', 
            'nama_klien' => 'max:200', 
            'jenis_sektor' => 'max:1000', 
            'jenis_usaha' => 'max:1000',
            'sub_sektor' => 'max:1000', 
            'alamat' => 'max:1000',
            'telp_fax' => 'max:200',
            'email' => 'max:200', 
            'website' => 'max:200',
'npwp' => 'max:200', 
'cp_adm_nama1' => 'max:200', 
'cp_adm_jabatan1' => 'max:200', 
'cp_adm_bagian1' => 'max:200', 
'cp_adm_telp1' => 'max:200', 
'cp_adm_email1' => 'max:200', 
'cp_adm_nama2' => 'max:200', 
'cp_adm_jabatan2' => 'max:200', 
'cp_adm_bagian2' => 'max:200', 
'cp_adm_telp2' => 'max:200', 
'cp_adm_email2' => 'max:200', 
'cp_adm_nama3' => 'max:200', 
'cp_adm_jabatan3' => 'max:200', 
'cp_adm_bagian3' => 'max:200', 
'cp_adm_telp3' => 'max:200', 
'cp_adm_email3' => 'max:200', 
'cp_adm_nama4' => 'max:200', 
'cp_adm_jabatan4' => 'max:200', 
'cp_adm_bagian4' => 'max:200', 
'cp_adm_telp4' => 'max:200', 
'cp_adm_email4' => 'max:200', 
'cp_adm_nama5' => 'max:200', 
'cp_adm_jabatan5' => 'max:200', 
'cp_adm_bagian5' => 'max:200', 
'cp_adm_telp5' => 'max:200', 
'cp_adm_email5' => 'max:200', 
'cp_ops_nama1' => 'max:200', 
'cp_ops_jabatan1' => 'max:200', 
'cp_ops_bagian1' => 'max:200', 
'cp_ops_telp1' => 'max:200', 
'cp_ops_email1' => 'max:200', 
'cp_ops_nama2' => 'max:200', 
'cp_ops_jabatan2' => 'max:200', 
'cp_ops_bagian2' => 'max:200', 
'cp_ops_telp2' => 'max:200', 
'cp_ops_email2' => 'max:200', 
'cp_ops_nama3' => 'max:200', 
'cp_ops_jabatan3' => 'max:200', 
'cp_ops_bagian3' => 'max:200', 
'cp_ops_telp3' => 'max:200', 
'cp_ops_email3' => 'max:200', 
'cp_ops_nama4' => 'max:200',
'cp_ops_nama4' => 'max:200',
'cp_ops_jabatan4' => 'max:200',
'cp_ops_bagian4' => 'max:200',
'cp_ops_telp4' => 'max:200',
'cp_ops_email4' => 'max:200',
'cp_ops_nama5' => 'max:200',
'cp_ops_jabatan5' => 'max:200',
'cp_ops_bagian5' => 'max:200',
'cp_ops_telp5' => 'max:200',
'cp_ops_email5' => 'max:200',
        ]);

    $klien = Klien::find($kd_klien);
    $klien->kd_klien = $request->get('kd_klien');
    $klien->nama_klien = $request->get('nama_klien');
    $klien->jenis_usaha = $request->get('jenis_usaha');
    $klien->jenis_sektor = $request->get('jenis_sektor');
    $klien->sub_sektor = $request->get('sub_sektor');
    $klien->alamat = $request->get('alamat');
    $klien->telp_fax = $request->get('telp_fax');
    $klien->email = $request->get('email');
    $klien->website = $request->get('website');  

        if (empty($request->file('file'))){
        $klien->npwp = $klien->npwp;
        }else{
        $file_path = public_path().'/file/npwp/'.$klien->npwp;
        File::delete($file_path);
        $npwp = "npwp";
        $file = $request->file('file');
        $ext = $file->getClientOriginalExtension();
        $newName = $klien->kd_klien.$npwp.".".$ext;
        $file->move('file/npwp',$newName);
        $klien->npwp = $newName;
        }

    $klien->cp_ops_nama1 = $request->get('cp_ops_nama1');
    $klien->cp_ops_jabatan1 = $request->get('cp_ops_jabatan1');
    $klien->cp_ops_bagian1 = $request->get('cp_ops_bagian1');
    $klien->cp_ops_telp1 = $request->get('cp_ops_telp1');
    $klien->cp_ops_email1 = $request->get('cp_ops_email1');
    $klien->cp_ops_nama2 = $request->get('cp_ops_nama2');
    $klien->cp_ops_jabatan2 = $request->get('cp_ops_jabatan2');
    $klien->cp_ops_bagian2 = $request->get('cp_ops_bagian2');
    $klien->cp_ops_telp2 = $request->get('cp_ops_telp2');
    $klien->cp_ops_email2 = $request->get('cp_ops_email2');
        $klien->cp_ops_nama3 = $request->get('cp_ops_nama3');
    $klien->cp_ops_jabatan3 = $request->get('cp_ops_jabatan3');
    $klien->cp_ops_bagian3 = $request->get('cp_ops_bagian3');
    $klien->cp_ops_telp3 = $request->get('cp_ops_telp3');
    $klien->cp_ops_email3 = $request->get('cp_ops_email3');
        $klien->cp_ops_nama4 = $request->get('cp_ops_nama4');
    $klien->cp_ops_jabatan4 = $request->get('cp_ops_jabatan4');
    $klien->cp_ops_bagian4 = $request->get('cp_ops_bagian4');
    $klien->cp_ops_telp4 = $request->get('cp_ops_telp4');
    $klien->cp_ops_email4 = $request->get('cp_ops_email4');
            $klien->cp_ops_nama5 = $request->get('cp_ops_nama5');
    $klien->cp_ops_jabatan5 = $request->get('cp_ops_jabatan5');
    $klien->cp_ops_bagian5 = $request->get('cp_ops_bagian5');
    $klien->cp_ops_telp5 = $request->get('cp_ops_telp5');
    $klien->cp_ops_email5 = $request->get('cp_ops_email5');

    $klien->cp_adm_nama1 = $request->get('cp_adm_nama1');
    $klien->cp_adm_jabatan1 = $request->get('cp_adm_jabatan1');
    $klien->cp_adm_bagian1 = $request->get('cp_adm_bagian1');
    $klien->cp_adm_telp1 = $request->get('cp_adm_telp1');
    $klien->cp_adm_email1 = $request->get('cp_adm_email1');
        $klien->cp_adm_nama2 = $request->get('cp_adm_nama2');
    $klien->cp_adm_jabatan2 = $request->get('cp_adm_jabatan2');
    $klien->cp_adm_bagian2 = $request->get('cp_adm_bagian2');
    $klien->cp_adm_telp2 = $request->get('cp_adm_telp2');
    $klien->cp_adm_email2 = $request->get('cp_adm_email2');
        $klien->cp_adm_nama3 = $request->get('cp_adm_nama3');
    $klien->cp_adm_jabatan3 = $request->get('cp_adm_jabatan3');
    $klien->cp_adm_bagian3 = $request->get('cp_adm_bagian3');
    $klien->cp_adm_telp3 = $request->get('cp_adm_telp3');
    $klien->cp_adm_email3 = $request->get('cp_adm_email3');
        $klien->cp_adm_nama4 = $request->get('cp_adm_nama4');
    $klien->cp_adm_jabatan4 = $request->get('cp_adm_jabatan4');
    $klien->cp_adm_bagian4 = $request->get('cp_adm_bagian4');
    $klien->cp_adm_telp4 = $request->get('cp_adm_telp4');
    $klien->cp_adm_email4 = $request->get('cp_adm_email4');
        $klien->cp_adm_nama5 = $request->get('cp_adm_nama5');
    $klien->cp_adm_jabatan5 = $request->get('cp_adm_jabatan5');
    $klien->cp_adm_bagian5 = $request->get('cp_adm_bagian5');
    $klien->cp_adm_telp5 = $request->get('cp_adm_telp5');
    $klien->cp_adm_email5 = $request->get('cp_adm_email5');
    $klien->save();
    
    \Session::flash('success','Data Klien Berhasil Di Ubah');
    return redirect('klien/detail/'.$kd_klien);   
    }

    function destroy(Request $request, $kd_klien)
    {
 $penawaran1 = Pem_tender::where('kd_klien',$kd_klien)->count();
  $penawaran2 = Pem_non_tender::where('kd_klien',$kd_klien)->count();
   $pengalaman = Pengalaman::where('kd_klien',$kd_klien)->count();
if (($penawaran1 + $penawaran2 + $pengalaman) > 0){
        \Session::flash('info','Maaf Anda Tidak Dapat Menghapus Data Klien ' . $kd_klien);
        return redirect('klien');
}else{
        $klien = Klien::find($kd_klien);
        $file_path = public_path().'/file/npwp/'.$klien->npwp;
        File::delete($file_path);
        Klien::where('kd_klien', $kd_klien)->delete();
        \Session::flash('success','Data Klien Berhasil Di Hapus');
        return redirect('klien');
}
}

    function detail($kd_klien)
    {
    $pengalaman = Klien::join('mkt_pengalaman', 'mkt_klien.kd_klien', '=', 'mkt_pengalaman.kd_klien')->
    where('mkt_pengalaman.kd_klien',$kd_klien)->paginate(10);

    $his_pem_tender = Klien::join('mkt_his_pem_tender', 'mkt_klien.kd_klien', '=', 'mkt_his_pem_tender.kd_klien')
    ->where('mkt_his_pem_tender.kd_klien',$kd_klien)->paginate(10);

    $his_pem_non_tender = Klien::join('mkt_his_pem_non_tender', 'mkt_klien.kd_klien', '=', 'mkt_his_pem_non_tender.kd_klien')
    ->where('mkt_his_pem_non_tender.kd_klien',$kd_klien)->paginate(10);

    $klien = Klien::where('kd_klien',$kd_klien)->paginate();
       return view('klien/detail',compact('klien','pengalaman','his_pem_tender','his_pem_non_tender'));
    }
}