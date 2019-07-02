<?php
namespace App\Http\Controllers;

use App\Legalitas;
use App\Karyawan;
use App\Inventaris_it;
use App\Peminjaman;
use App\Jenis_barang;

use Illuminate\Http\Request;

class CetakController extends Controller
{

    public function report_legalitas(Request $request)
    {
         $legalitas = Legalitas::orderBy('tgl_expired', 'asc')->get();
         
        if($request->view_type === 'download') {
            $pdf = PDF::loadView('legalitas.cetak.report', ['legalitas' => $legalitas]);
            return $pdf->download('users.pdf');
            
        } else {
            $view = View('legalitas.cetak.report', ['legalitas' => $legalitas]);
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($view->render());
            return $pdf->stream();
        }
    }

        public function report_karyawan(Request $request)
    {
         $karyawan = Karyawan::orderBy('nama', 'asc')->get();
         
        if($request->view_type === 'download') {
            $pdf = PDF::loadView('karyawan.cetak.report', ['karyawan' => $karyawan]);
            return $pdf->download('users.pdf');           
        } else {
            $view = View('karyawan.cetak.report', ['karyawan' => $karyawan]);
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($view->render());
            return $pdf->stream();
        }
    }

            public function report_inventaris_it(Request $request)
    {
         $inventaris_it = Inventaris_it::orderBy('jenis_barang', 'asc')->get();
         
        if($request->view_type === 'download') {
            $pdf = PDF::loadView('inventaris_it.cetak.report', ['inventaris_it' => $inventaris_it]);
            return $pdf->download('users.pdf');           
        } else {
            $view = View('inventaris_it.cetak.report', ['inventaris_it' => $inventaris_it]);
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($view->render());
            return $pdf->stream();
        }
    }
}
