<?php
namespace App\Exports;

use App\Klien;

use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class KlienExport implements ShouldAutoSize, FromView
{
    public function __construct(string $jenis_sektor)
{
    if ($jenis_sektor == '-')
    {
        $this->jenis_sektor = '';
    }else{
        $this->jenis_sektor = $jenis_sektor;
    }
}
    public function view(): View
    {   
        return view('klien.export.report', [
            'klien' => Klien::where('jenis_sektor', 'like', '%'. $this->jenis_sektor .'%')->get()
        ]); 
    }
}