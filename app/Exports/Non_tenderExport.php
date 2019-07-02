<?php
namespace App\Exports;

use App\KLien;

use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Non_tenderExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        return view('pem_non_tender.export.report', [
            'non_tender' => Klien::join('mkt_pem_non_tender', 'mkt_klien.kd_klien', '=', 'mkt_pem_non_tender.kd_klien')
            ->select('mkt_klien.nama_klien', 'mkt_pem_non_tender.*')->get()
        ]);
    }
}