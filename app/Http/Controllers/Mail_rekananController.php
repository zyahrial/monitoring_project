<?php
namespace App\Http\Controllers;
use App\MailRekanan;

use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mail_rekananController extends Controller
{	
    function index(Request $request)
    {       
        $datas = MailRekanan::orderBy('primary_mail', 'asc')->paginate(10);
        return view('reminder/rekanan/index',compact('datas'));
    }

    function update(Request $request, $id)
    { 
        $this->validate($request, [
            'primary_mail' => 'required',
        ]);

        $mail = MailRekanan::find($id);
        $mail->primary_mail = $request->get('primary_mail');
        $mail->secondary_mail = $request->get('secondary_mail');
        $mail->save();
        
        \Session::flash('success','Data Berhasil Di Ubah');
        return redirect('mail');   
    }

        function store(Request $request)
    
    {
         $validatedData = $request->validate([
        'primary_mail' => 'required|max:255',
        ]);

        $mail = new MailRekanan();
        $mail->primary_mail = $request->get('primary_mail');
        $mail->secondary_mail = $request->get('secondary_mail');
        $mail->save();

        \Session::flash('success','Data Berhasil Di Tambahkan');
        return redirect('mail');
    
    }

    function destroy(Request $request, $id)
    {
        $data = MailRekanan::find($id);
        $data->delete();
        \Session::flash('success','Data Berhasil Di Hapus');
        return redirect('mail');
    }
}