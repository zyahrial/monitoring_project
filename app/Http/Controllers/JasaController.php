<?php
namespace App\Http\Controllers;

use App\Jasa;

use Illuminate\Http\Request;

class JasaController extends Controller
{
    public function index(Request $request)
    {
    $data = Jasa::orderBy('kelompok_jasa', 'asc')->paginate(50);
    return view('jasa.index', compact('data'));
    }

        function destroy(Request $request, $kd_jasa)
    {
        $data = Jasa::find($kd_jasa);
        $data->delete();
        \Session::flash('success','Data Berhasil Di Hapus');
    return redirect('jasa');
    }

    function store(Request $request)
    {
    $jasa = new Jasa();
    $jasa->kelompok_jasa = $request->get('kelompok_jasa');
    $jasa->sub_jasa = $request->get('sub_jasa');
    $jasa->save();
    \Session::flash('success','Data Jasa Berhasil Di Tambahkan');
    return redirect('jasa');
    }
    
    function show($kd_jasa)
    {
        $data = Jasa::orderBy('kelompok_jasa', 'asc')->paginate(50);  
        $dt = Jasa::where('kd_jasa',$kd_jasa)->get();
        return view('jasa.edit',compact('data','dt'));
    }

        function update(Request $request, $kd_jasa) 
{
    $data = Jasa::find($kd_jasa);
    $data->kelompok_jasa = $request->get('kelompok_jasa');
    $data->sub_jasa = $request->get('sub_jasa');
    $data->save();  
    \Session::flash('success','Data Jasa Berhasil Di Ubah');
    return redirect('jasa');   
    }
}