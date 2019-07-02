<?php
namespace App\Exports;

use App\Rekanan;

use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RekananExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        return view('rekanan.export.report', [
            'rekanan' => Rekanan::all()
        ]);
    }
}