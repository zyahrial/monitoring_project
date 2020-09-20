<?php
namespace App\Http\Controllers;

use App\Legalitas;
use App\Karyawan;
use App\Klien;
use App\Jasa;
use App\Lib_sektor;
use App\Lib_sub_sektor;
use App\Jenis_barang;
use App\Ket_kalah;
use App\Kompetensi;
use App\Bagian_ops;
use App\Bagian_adm;


use Illuminate\Http\Request;

class LookupController extends Controller
{
    public function lookup_klien(Request $request)
    {

        if ($request->has('nama_klien')) 
        {        
            $query = ($request->input('nama_klien'));
            $lookup = Klien::where('nama_klien', 'LIKE', '%' . $query . '%')
                    ->orderBy('nama_klien', 'dsc')
                    ->get();
        }else{ 
            $lookup = Klien::orderBy('nama_klien', 'asc')->get();  
        } 
            return view('rekanan.lookup.lookup_klien', compact('lookup'));   
    }
    
    public function lookup_klien2(Request $request)
    {
        if ($request->has('nama_klien')) 
        {        
            $query = ($request->input('nama_klien'));
            $lookup = Klien::where('nama_klien', 'LIKE', '%' . $query . '%')
                    ->orderBy('nama_klien', 'asc')
                    ->get();
        }else{ 
            $lookup = Klien::orderBy('nama_klien', 'asc')->get();  
        } 
        return view('pem_tender.lookup.lookup_klien', compact('lookup'));   
    }


    public function lookup_karyawan(Request $request)
    {
    if ($request->has('nama')) 
    {        
    $query = ($request->input('nama'));
    $lookup = Karyawan::where('nama', 'LIKE', '%' . $query . '%')
            ->orderBy('nama', 'asc')
            ->get();
    }else{ 
    $lookup = Karyawan::orderBy('nama', 'asc')->get();  
    } 
    return view('pem_tender.lookup.lookup_karyawan', compact('lookup'));   
    }

    public function lookup_jasa(Request $request)
    {
    $lookup = Jasa::orderBy('kelompok_jasa', 'asc')->get();
    return view('pem_tender.lookup.lookup_jasa', compact('lookup'));
    }

        function destroy_jasa(Request $request, $kd_jasa)
    {
        $data = Jasa::find($kd_jasa);
        $data->delete();
        \Session::flash('success','Data Berhasil Di Hapus');
    return redirect('pem_tender/lookup/lookup_jasa');
    }

    function store_jasa(Request $request)
    {
        $jasa = new Jasa();
        $jasa->kelompok_jasa = $request->get('kelompok_jasa');
        $jasa->sub_jasa = $request->get('sub_jasa');
        $jasa->save();
        \Session::flash('success','Data Jasa Berhasil Di Tambahkan');
        return redirect('pem_tender/lookup/lookup_jasa');
    }

        function sektor()
    {
        $lookup = Lib_sektor::orderBy('nama_sektor', 'asc')->get();
        return view('klien.library.sektor', compact('lookup'));
    }
        function store_sektor(Request $request)
    {
        $sektor = new Lib_sektor();
        $sektor->nama_sektor = $request->get('nama_sektor');
        $sektor->save();
        \Session::flash('success','Data Sektor Berhasil Di Tambahkan');
        return redirect('klien/library/sektor');
    }
        function destroy_sektor(Request $request, $id)
    {
        $data = Lib_sektor::find($id);
        $data->delete();
        \Session::flash('success','Data Berhasil Di Hapus');
        return redirect('klien/library/sektor');
    }

        function sub_sektor()
    {
        $lookup = Lib_sub_sektor::orderBy('sub_sektor', 'asc')->get();
        return view('klien.library.sub_sektor', compact('lookup'));
    }
        function store_sub_sektor(Request $request)
    {
        $data = new Lib_sub_sektor ();
        $data->sub_sektor = $request->get('sub_sektor');
        $data->save();
        \Session::flash('success','Data Sub Sektor Berhasil Di Tambahkan');
        return redirect('/klien/library/sub_sektor');
    }
        function destroy_sub_sektor(Request $request, $id)
    {
        $data = Lib_sub_sektor::find($id);
        $data->delete();
        \Session::flash('success','Data Berhasil Di Hapus');
        return redirect('/klien/library/sub_sektor');
    }

        function ops_bagian()
    {       
        $lookup = Bagian_ops::orderBy('id', 'asc')->get();
        return view('klien.library.ops_bagian', compact('lookup'));
    }
        function store_ops_bagian(Request $request)
    {
        $ops = new Bagian_ops();
        $ops->nama_bagian = $request->get('nama_bagian');
        $ops->save();
        \Session::flash('success','Data Bagian Operasional Di Tambahkan');
        return redirect('klien/library/ops_bagian');
    }
        function destroy_ops(Request $request, $id)
    {
        $data = Bagian_ops::find($id);
        $data->delete();
        \Session::flash('success','Data Berhasil Di Hapus');
        return redirect('klien/library/ops_bagian');
    }

        function adm_bagian()
    {
        $lookup = Bagian_adm::orderBy('id', 'asc')->get();
        return view('klien.library.adm_bagian', compact('lookup'));   
    }
        function store_adm_bagian(Request $request)
    {
        $sektor = new Bagian_adm();
        $sektor->nama_bagian = $request->get('nama_bagian');
        $sektor->save();
        \Session::flash('success','Data Bagian Adm Di Tambahkan');
        return redirect('klien/library/adm_bagian');
    }
        function destroy_adm(Request $request, $id)
    {
        $data = Bagian_adm::find($id);
        $data->delete();
        \Session::flash('success','Data Berhasil Di Hapus');
        return redirect('klien/library/adm_bagian');
    }

        function create_ket_kalah()
    {
        $lookup = Ket_kalah::orderBy('keterangan', 'asc')->get();
       return view('pem_tender.lookup.ket_kalah', compact('lookup'));
    }

        function destroy_ket_kalah(Request $request, $id)
    {
        $data = Ket_kalah::find($id);
        $data->delete();
        \Session::flash('success','Data Berhasil Di Hapus');
    return redirect('pem_tender/lookup/ket_kalah');
    }

        function store_ket_kalah(Request $request)
    {
        $data = new Ket_kalah();
        $data->keterangan = $request->get('keterangan');
        $data->save();
        \Session::flash('success','Keterangan Di Tambahkan');
        return redirect('pem_tender/lookup/ket_kalah');
    }

        public function pem_tender_pm(Request $request)
    {
        if ($request->has('nama')) 
        {        
            $query = ($request->input('nama'));
            $lookup = Karyawan::where('nama', 'LIKE', '%' . $query . '%')
                    ->orderBy('nama', 'asc')
                    ->get();
        }else{ 
            $lookup = Karyawan::orderBy('nama', 'asc')->get();  
        } 
        return view('pem_tender.lookup.lookup_pm', compact('lookup'));   
    }
        public function pem_tender_konsultan(Request $request)
    {
        if ($request->has('nama')) 
        {        
            $query = ($request->input('nama'));
            $lookup = Karyawan::where('nama', 'LIKE', '%' . $query . '%')
                    ->orderBy('nama', 'asc')
                    ->get();
        }else{ 
            $lookup = Karyawan::orderBy('nama', 'asc')->get();  
        } 
        return view('pem_tender.lookup.lookup_konsultan', compact('lookup'));   
    }

    public function pem_non_tender_pm(Request $request)
    {
        if ($request->has('nama')) 
        {        
            $query = ($request->input('nama'));
            $lookup = Karyawan::where('nama', 'LIKE', '%' . $query . '%')
                    ->orderBy('nama', 'asc')
                    ->get();
        }else{ 
            $lookup = Karyawan::orderBy('nama', 'asc')->get();  
        } 
    return view('pem_non_tender.lookup.lookup_pm', compact('lookup'));   
    }

    public function pem_non_tender_konsultan(Request $request)
    {
        if ($request->has('nama')) 
        {        
        $query = ($request->input('nama'));
            $lookup = Karyawan::where('nama', 'LIKE', '%' . $query . '%')
                    ->orderBy('nama', 'asc')
                    ->get();
        }else{ 
            $lookup = Karyawan::orderBy('nama', 'asc')->get();  
        } 
        return view('pem_non_tender.lookup.lookup_konsultan', compact('lookup'));   
    }

    public function lookup_kompetensi(Request $request)
    {
        $lookup = Kompetensi::orderBy('kompetensi', 'asc')->get();
        return view('ta/lookup/kompetensi', compact('lookup'));
    }

    function destroy_kompetensi(Request $request, $id)
    {
        $data = Kompetensi::find($id);
        $data->delete();
        \Session::flash('success','Data Berhasil Di Hapus');
        return redirect('ta/lookup/kompetensi');
    }

    function store_kompetensi(Request $request)
    {
        $kompetensi = new Kompetensi();
        $kompetensi->kompetensi = $request->get('kompetensi');
        $kompetensi->save();
        \Session::flash('success','Data Berhasil Di Tambahkan');
        return redirect('ta/lookup/kompetensi');
    }
}
