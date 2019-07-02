<?php
namespace App\Exports;

use App\Ta;

use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class TaExport implements ShouldAutoSize, FromView
{
    public function __construct(string $keahlian)
{
    if ($keahlian == '-')
    {
        $this->keahlian = '';
    }else{
        $this->keahlian = $keahlian;
    }
}
    public function view(): View
    {   
        return view('ta.export.report', [
            'ta' => Ta::where('keahlian', 'like', '%'. $this->keahlian .'%')->get()
        ]); 
    }
}