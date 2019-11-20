<?php
namespace App\Http\Controllers;

use DateTime;
use App\Rekanan;
use App\MailRekanan;
use App\Pem_tender;
use App\Klien;
use App\Prj_sppd;
use App\Prj_uudp;
use App\Prj_notif;
use App\Karyawan; 
use App\Prj_ib; 
use App\Prj_activity;
use App\Prj;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\SMTP;
//require '../vendor/autoload.php';

class Mailer_projectController extends Controller
{  

function mail_prt_uudp(Request $request){

$data_manager = Karyawan::where('jabatan',"Manajer")->where('divisi',"DKO")->get(); 
foreach($data_manager as $data){
$cc_1 = $data->email;
}
$data_gm = Karyawan::where('jabatan',"General Manajer")->where('divisi',"DKO")->get(); 
foreach($data_gm as $data){
$cc_2 = $data->email;
}

$data_prt_uudp = Prj_uudp::get();

$pertanggungjawaban = "pertanggungjawaban";

$prt = Prj_notif::where('notif',$pertanggungjawaban)->get();
foreach($prt as $data){
$interval = $data->interval;
$status_notif = $data->status;

}

foreach($data_prt_uudp as $data){

 $pemohon = $data->pemohon;
 $no_uudp = $data->no_uudp;
 $nilai_uudp = $data->nilai_uudp;

 $date1 = new DateTime($data->date);
 $today = date("Y-m-d");
 $date2 = date_create($today);
 $diff = date_diff($date1,$date2);


$karyawan = Karyawan::where('kode',$pemohon)->get();
foreach($karyawan as $datas){
$to = $datas->email;
$nama = $datas->nama;

}

$fnilai_uudp = (number_format($nilai_uudp,0,",",".")."");

if ( $data->status_uudp == "open" AND $diff->format("%R%a") > $interval AND $status_notif == "enable" ){
try {
$mail = new PHPMailer(true);
{
$body ="
<!DOCTYPE html>
<html>
<head>
  <title>Notif pertanggungjawaban UUDP</title>
</head>
<body>

     <div class='main' style='background: #fafafa; max-width: 500px; border-top: solid 3px #f55422; box-shadow: 0 0 25px rgba(0,0,0,0.05); margin:auto;''>
        
        <div class='header' style='padding: 30px; background: #f2f2f2;'> 
<img src='https://sprint.co.id/wp-content/uploads/2018/09/Sprint-Consultant-Member-of-Sucofindo.png' style='display: block; margin: auto; height : 50px; width : auto;'>
        </div>
        
        <div class='content' style='padding: 30px; padding-bottom: 40px;'>
        <h4> Hi ".$nama.", </h4>
        <h3> Anda belum melakukan pertanggungjawaban UUDP :</h3>
        
<table>
 <tr><td style='padding : 5px';><strong>Tanggal </strong></td><td style='padding : 5px';><td>:</td>".$data->date."</td></tr>
 <tr><td style='padding : 5px';><strong>Nomor </strong></td><td style='padding : 5px';><td>:</td>".$no_uudp."</td></tr>
 <tr><td style='padding : 5px';><strong>Nilai </strong></td><td style='padding : 5px';><td>:</td> Rp. ".$fnilai_uudp."</strong></td>
      </table>          
      </div>
        
        <div class='footer' style='background: black; padding: 30px; color: grey; line-height: 18px; font-size: 12px; text-align: center;'>Graha Sucofindo, 12th Floor, JL Raya Pasar Minggu, Kavling 34, RT.3/RW.4, Pancoran, Kec. Pancoran, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12780</div>
        
      </div>

 </body>

</html>";

$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
$mail->SMTPAutoTLS = true;

$mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => false
      )
   );

$mail->Username = 'sprint.idapps@gmail.com';

$mail->Password = 'sprint==19';

$mail->setFrom('sprint.idapps@gmail.com', 'Sprint Server');

$mail->addReplyTo('sprint.idapps@gmail.com', 'Sprint Server');

$mail->AddAddress($to);

$mail->AddCC($cc_1);
$mail->AddCC($cc_2);

$mail->Subject = "Notif Pertanggungjawaban UUDP";

$mail->MsgHTML($body);

$mail->IsHTML(true); // send as HTML

$mail->Send();

}

echo 'Message Has Success.';
echo $to;
} catch (phpmailerException $e) {
echo $e->errorMessage();

}

}else{

echo "false"; 
}
}
}

//mailer sppd
function mail_prt_sppd(Request $request){

$data_manager = Karyawan::where('jabatan',"Manajer")->where('divisi',"DKO")->get(); 
foreach($data_manager as $data){
$cc_1 = $data->email;
}
$data_gm = Karyawan::where('jabatan',"General Manajer")->where('divisi',"DKO")->get(); 
foreach($data_gm as $data){
$cc_2 = $data->email;
}

$data_prt_sppd = Prj_sppd::get();

$pertanggungjawaban = "pertanggungjawaban";

$prt = Prj_notif::where('notif',$pertanggungjawaban)->get();
foreach($prt as $data){
$interval = $data->interval;
$status_notif = $data->status;

}

foreach($data_prt_sppd as $data){

 $pemohon = $data->pemohon;
 $no_sppd = $data->no_sppd;
 $nilai_sppd = $data->nilai_sppd;

 $date1 = new DateTime($data->date);
 $today = date("Y-m-d");
 $date2 = date_create($today);
 $diff = date_diff($date1,$date2);


$karyawan = Karyawan::where('kode',$pemohon)->get();
foreach($karyawan as $datas){
$to = $datas->email;
$nama = $datas->nama;

}

$fnilai_sppd = (number_format($nilai_sppd,0,",",".")."");

if ( $data->status_sppd == "open" AND $diff->format("%R%a") > $interval AND $status_notif == "enable" ){
try {
$mail = new PHPMailer(true);
{
$body ="
<!DOCTYPE html>
<html>
<head>
  <title>Notif pertanggungjawaban SPPD</title>
</head>
<body>

     <div class='main' style='background: #fafafa; max-width: 500px; border-top: solid 3px #f55422; box-shadow: 0 0 25px rgba(0,0,0,0.05); margin:auto;''>
        
        <div class='header' style='padding: 30px; background: #f2f2f2;'> 
<img src='https://sprint.co.id/wp-content/uploads/2018/09/Sprint-Consultant-Member-of-Sucofindo.png' style='display: block; margin: auto; height : 50px; width : auto;'>
        </div>
        
        <div class='content' style='padding: 30px; padding-bottom: 40px;'>
        <h4> Hi ".$nama.", </h4>
        <h3> Anda belum melakukan pertanggungjawaban SPPD :</h3>
        
<table>
 <tr><td style='padding : 5px';><strong>Tanggal </strong></td><td style='padding : 5px';><td>:</td> ".$data->date."</td></tr>
 <tr><td style='padding : 5px';><strong>Nomor </strong></td><td style='padding : 5px';><td>:</td>".$no_sppd."</td></tr>
 <tr><td style='padding : 5px';><strong>Nilai </strong></td><td style='padding : 5px';><td>:</td> Rp. ".$fnilai_sppd."</td>
  <tr><td style='padding : 5px';><strong>Tujuan</strong></td><td style='padding : 5px';><td>:</td> ".$data->tujuan."</td>
  <tr><td style='padding : 5px';><strong>Keperluan</strong></td><td style='padding : 5px';><td>:</td> ".$data->keperluan."</td>
      </table>          
      </div>      
        <div class='footer' style='background: black; padding: 30px; color: grey; line-height: 18px; font-size: 12px; text-align: center;'>Graha Sucofindo, 12th Floor, JL Raya Pasar Minggu, Kavling 34, RT.3/RW.4, Pancoran, Kec. Pancoran, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12780</div>
        
      </div>

 </body>

</html>";

$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
$mail->SMTPAutoTLS = true;

$mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => false
      )
   );

$mail->Username = 'sprint.idapps@gmail.com';

$mail->Password = 'sprint==19';

$mail->setFrom('sprint.idapps@gmail.com', 'Sprint Server');

$mail->addReplyTo('sprint.idapps@gmail.com', 'Sprint Server');

$mail->AddAddress($to);
$mail->AddCC($cc_1);
$mail->AddCC($cc_2);

$mail->Subject = "Notif Pertanggungjawaban SPPD";

$mail->MsgHTML($body);

$mail->IsHTML(true); // send as HTML

$mail->Send();

}

echo 'Message Has Success.';
echo $to;
} catch (phpmailerException $e) {
echo $e->errorMessage();

}

}else{

echo "false"; 
}
}
}

//mailer Activity Project
function mail_activity(Request $request){
$data_manager = Karyawan::where('jabatan',"Manajer")->where('divisi',"DKO")->get(); 
foreach($data_manager as $data){
$cc_1 = $data->email;
}
$data_gm = Karyawan::where('jabatan',"General Manajer")->where('divisi',"DKO")->get(); 
foreach($data_gm as $data){
$cc_2 = $data->email;
}
$activity = "activity";

$act = Prj_notif::where('notif',$activity)->get();
foreach($act as $data_act){
$interval_act = $data_act->interval;
$status_notif_act = $data_act->status;
}

$data_ib = Prj_ib::get();

foreach($data_ib as $ib){

  $kd_proyek = $ib->kd_proyek;
  $kd_activity = $ib->kd_activity;
  $status = $ib->status;

 $date1 = new DateTime($ib->date);
 $today = date("Y-m-d");
 $date2 = date_create($today);
 $diff = date_diff($date1,$date2);

 $proyek = Prj::join('mkt_pengalaman', 'prj.kd_pengalaman', '=', 'mkt_pengalaman.kd_pengalaman')
    ->join('mkt_klien', 'mkt_klien.kd_klien', '=', 'mkt_pengalaman.kd_klien')
    ->select('mkt_klien.nama_klien', 'mkt_pengalaman.*','prj.*')->where('kd_proyek',$kd_proyek)->get();

    $data_activity = Prj_activity::where('kd_activity',$kd_activity)->get();
foreach($data_activity as $datas){
$kegiatan = $datas->activity;
$sub_kegiatan = $datas->sub_activity;
}

 foreach ($proyek as $data) {
  $nama_klien = $data->nama_klien;
  $pm = $data->pm;
  $pm = $data->pm;
  $proyek_status = $data->proyek_status;
  $konsultan1 = $data->konsultan1;
  $konsultan2 = $data->konsultan2;
  $konsultan3 = $data->konsultan3;
  $konsultan4 = $data->konsultan4;
  $konsultan5 = $data->konsultan5;
  $ta1 = $data->ta1;
  $ta2 = $data->ta2;
  $ta3 = $data->ta3;
  $ta4 = $data->ta4;
  $ta4 = $data->ta4;
  }  

$data_pm = Karyawan::where('kode',$pm)->get();
foreach($data_pm as $datas){
$to = $datas->email;
$nama_pm = $datas->nama;
}

$data_activity = Prj_activity::where('kd_activity',$kd_activity)->get();
foreach($data_activity as $datas){
$kegiatan = $datas->activity;
$sub_kegiatan = $datas->sub_activity;
}
if (($ib->status == "berjalan") OR ($ib->status == "persiapan")){
if (($diff->format("%R%a") > $interval_act) AND  ($status_notif_act == "enable") AND ($proyek_status == "open")){
try {
$mail = new PHPMailer(true);
{
$body ="
<!DOCTYPE html>
<html>
<head>
  <title>Notif Due Date Kegiatan </title>
</head>
<body>

     <div class='main' style='background: #fafafa; max-width: 500px; border-top: solid 3px #f55422; box-shadow: 0 0 25px rgba(0,0,0,0.05); margin:auto;''>
        
        <div class='header' style='padding: 30px; background: #f2f2f2;'> 
<img src='https://sprint.co.id/wp-content/uploads/2018/09/Sprint-Consultant-Member-of-Sucofindo.png' style='display: block; margin: auto; height : 50px; width : auto;'>
        </div>
        
<div class='content' style='padding: 30px; padding-bottom: 40px;'>
<h4> Hi ".@$nama_pm." Dan Tim, </h4>
<h3> Kegiatan / Pekerjaan belum dilaksanakan :</h3>
<table>
 <tr><td style='padding : 5px';><strong>Kode Project</strong></td><td style='padding : 5px';><td>:</td> ".@$kd_proyek."</td></tr>
 <tr><td style='padding : 5px';><strong>Nama Klien</strong></td><td style='padding : 5px';><td>:</td> ".@$nama_klien."</td></tr>
 <tr><td style='padding : 5px';><strong>Kegiatan</strong></td><td style='padding : 5px';><td>:</td>".@$sub_kegiatan."</td></tr>
 <tr><td style='padding : 5px';><strong>Due Date</strong></td><td style='padding : 5px';><td>:</td>".@$ib->date."</td>
  <tr><td style='padding : 5px';><strong>Status</strong></td><td style='padding : 5px';><td>:</td> "
  .@$ib->status."</td>
      </table>          
      </div>      
        <div class='footer' style='background: black; padding: 30px; color: grey; line-height: 18px; font-size: 12px; text-align: center;'>Graha Sucofindo, 12th Floor, JL Raya Pasar Minggu, Kavling 34, RT.3/RW.4, Pancoran, Kec. Pancoran, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12780</div>
        
      </div>

 </body>

</html>";

$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
$mail->SMTPAutoTLS = true;

$mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => false
      )
   );

$mail->Username = 'sprint.idapps@gmail.com';

$mail->Password = 'sprint==19';

$mail->setFrom('sprint.idapps@gmail.com', 'Sprint Server');

$mail->addReplyTo('sprint.idapps@gmail.com', 'Sprint Server');

if (empty($to)){
  $mail->AddAddress($to);
}else{
  $mail->AddAddress("false@test.com");
}

$mail->AddCC($cc_1);
$mail->AddCC($cc_2);

$mail->Subject = "Notif Pelaksanaan Pekerjaan / Kegiatan Project";

$mail->MsgHTML($body);

$mail->IsHTML(true); // send as HTML

$mail->Send();

}

echo 'Message Has Success.';
echo @$to;
} catch (phpmailerException $e) {
echo $e->errorMessage();

}
}else{

echo $diff->format("%R%a") ; 
echo $status; 
echo $proyek_status; 
}
}else{
  echo "False";
}
}
}

}