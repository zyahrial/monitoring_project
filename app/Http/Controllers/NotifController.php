<?php
namespace App\Http\Controllers;
use App\Notif_penjualan;

use Illuminate\Http\Request;

    class NotifController extends Controller
{

    function destroy_notif(Request $request)
    {
        Notif_penjualan::truncate();
        return redirect('home');
    }

}
    
