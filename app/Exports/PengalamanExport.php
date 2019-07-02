<?php
namespace App\Exports;

use App\Klien;

use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class PengalamanExport implements ShouldAutoSize, FromView
{
    public function __construct(string $mulai, string $selesai)
{
        $this->mulai = $mulai;
        $this->selesai = $selesai;
}
    public function view(): View
    {   
    return view('pengalaman.export.report', [
    'pengalaman' => Klien::join('mkt_pengalaman', 'mkt_klien.kd_klien', '=', 'mkt_pengalaman.kd_klien')
    ->whereBetween('kontrak_mulai', array($this->mulai, $this->selesai))->get()
        ]); 

    }
}