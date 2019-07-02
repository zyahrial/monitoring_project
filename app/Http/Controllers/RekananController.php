<?php
namespace App\Http\Controllers;

use App\Rekanan;
use Illuminate\Http\Request;
use App\Exports\RekananExport;
use Excel;

class RekananController extends Controller
    {	
       function index(Request $request)
    {       
    if ($request->has('nama_klien')) 
    {        
    $query = ($request->input('nama_klien'));
    //$rekanan = rekanan::where('nama', $request->input('nama'))->get();
    $rekanan = Rekanan::where('nama_klien', 'LIKE', '%' . $query . '%')
            ->orderBy('nama_klien', 'asc')
            ->paginate();
    }else{ 
    $rekanan = Rekanan::orderBy('kd_rekanan')->paginate(10);  
    } 
    return view('rekanan.index',['rekanan' => $rekanan]);
    }

        public function export() 
    {
        return Excel::download(new RekananExport, 'Rekanan.xlsx');
    }
    
    function create()
    {
       return view('rekanan/insert',compact('posts'));
    } 
  
    function store(Request $request)
    
    {
         $validatedData = $request->validate([
        'nama_klien' => 'required|max:255',
        'kd_klien' => 'required|max:25',
    ]);

    $posts = \DB::table('mkt_rekanan')->where('kd_rekanan', \DB::raw("(select max(kd_rekanan) from mkt_rekanan)"))->get();

if (count($posts)) {
foreach ($posts as $data)
{
    $d = ((int)substr($data->kd_rekanan,2)+1);
    $kd = "RK".sprintf("%03s",$d);
}
}else{
    $kd = "RK001";
}

    $rekanan = new Rekanan();
    $rekanan->kd_rekanan =  $kd;
    $rekanan->kd_klien = $request->get('kd_klien');
    $rekanan->nama_klien = $request->get('nama_klien');
    $rekanan->url = $request->get('url');
    $rekanan->username = $request->get('username');
    $rekanan->password = $request->get('password');
    $rekanan->email = $request->get('email');
    $rekanan->tanggal_mulai = $request->get('tanggal_mulai');
    $rekanan->tanggal_berakhir = $request->get('tanggal_berakhir');   
    $rekanan->cp_nama = $request->get('cp_nama');
    $rekanan->cp_jabatan = $request->get('cp_jabatan');
    $rekanan->cp_bagian = $request->get('cp_bagian');
    $rekanan->cp_telp = $request->get('cp_telp');
    $rekanan->cp_email = $request->get('cp_email');
    $rekanan->keterangan = $request->get('keterangan');
    $rekanan->save();

    \Session::flash('success','Data Rekanan Berhasil Di Tambahkan');
    return redirect('rekanan');
    
    }
	
    function show($kd_rekanan)
    {
        $data = Rekanan::where('kd_rekanan',$kd_rekanan)->get();

        return view('rekanan/edit',compact('data'));
    }
 
    function update(Request $request, $kd_rekanan)
    { 
         $validatedData = $request->validate([
        'nama_klien' => 'required|max:255',
        'kd_klien' => 'required|max:25',
    ]);;

    $rekanan = rekanan::find($kd_rekanan);
    $rekanan->kd_rekanan = $request->get('kd_rekanan');
    $rekanan->kd_klien = $request->get('kd_klien');
    $rekanan->nama_klien = $request->get('nama_klien');
    $rekanan->url = $request->get('url');
    $rekanan->username = $request->get('username');
    $rekanan->password = $request->get('password');
    $rekanan->email = $request->get('email');
    $rekanan->tanggal_mulai = $request->get('tanggal_mulai');
    $rekanan->tanggal_berakhir = $request->get('tanggal_berakhir');   
    $rekanan->cp_nama = $request->get('cp_nama');
    $rekanan->cp_jabatan = $request->get('cp_jabatan');
    $rekanan->cp_bagian = $request->get('cp_bagian');
    $rekanan->cp_telp = $request->get('cp_telp');
    $rekanan->cp_email = $request->get('cp_email');
    $rekanan->keterangan = $request->get('keterangan');
    $rekanan->save();
    
    \Session::flash('success','Data rekanan Berhasil Di Ubah');
    return redirect('rekanan');   
    }
    
    function destroy(Request $request, $kd_rekanan)
    {
        $data = Rekanan::find($kd_rekanan);
        $data->delete();
        \Session::flash('success','Data Rekanan Berhasil Di Hapus');
        return redirect('rekanan');
    }

}