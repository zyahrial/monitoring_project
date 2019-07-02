<?php
namespace App\Exports;

use App\User;

use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UsersExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        return view('user.export.report', [
            'users' => User::all()
        ]);
    }
}