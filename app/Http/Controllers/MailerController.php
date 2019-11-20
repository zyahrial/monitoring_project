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

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//use PHPMailer\PHPMailer\SMTP;
//require '../vendor/autoload.php';

class MailerController extends Controller
{ 

function mail_rekanan(Request $request){
 
$today = date("Y-m-d");
  
$count = Rekanan::where('tanggal_berakhir', '>', $today)->count();
$mail = MailRekanan::orderBy('primary_mail', 'asc')->get();
$query = Rekanan::orderBy('tanggal_berakhir', 'asc')->get();

foreach($mail as $mails){
$primary =  $mails->primary_mail;
$second =  $mails->secondary_mail;

foreach($query as $data){

//$i1 = (7 * 1);
//$i2 = (7 * 2);
//$i3 = (7 * 3);
//$i4 = (7 * 4);
if (empty($data->tanggal_berakhir)){
}elseif ($today > $data->tanggal_berakhir) {

try {
$mail = new PHPMailer(true);
{
$body ="
<!DOCTYPE html>
<html>
<head>
  <title>Notif Data Rekanan </title>
</head>
<body>

     <div class='main' style='background: #fafafa; max-width: 500px; border-top: solid 3px #f55422; box-shadow: 0 0 25px rgba(0,0,0,0.05); margin:auto;''>
        
        <div class='header' style='padding: 30px; background: #f2f2f2;'> 
<img src='https://sprint.co.id/wp-content/uploads/2018/09/Sprint-Consultant-Member-of-Sucofindo.png' style='display: block; margin: auto; height : 50px; width : auto;'>
        </div>
        
<div class='content' style='padding: 30px; padding-bottom: 40px;'>
<h4> Hi Tim Marketing, </h4>
<h3> Harap lakukan pembaruan data rekanan :</h3>
<table >
       <tr><td style='padding : 5px;'><strong>NAMA KLIEN</td><td style='padding : 5px;'>".$data->nama_klien."</td></tr>
       <tr><td style='padding : 5px;'><strong>ALAMAT URL</strong></td><td style='padding : 5px;'>".$data->url."</td></tr>
       <tr><td style='padding : 5px;'><strong>EXPIRED</strong></td><td style='padding : 5px;'>".$data->tanggal_berakhir."</td></tr>
</td>
    </tr>  
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

$mail->AddAddress($primary);

if (empty($second)){
}else{
  $mail->AddCC($second);
}

$mail->Subject = '[Reminder] Rekanan';

$mail->MsgHTML($body);

$mail->IsHTML(true); // send as HTML

$mail->Send();

}

echo 'Message Has Success.';
} catch (phpmailerException $e) {
echo $e->errorMessage();

}

}

else {

echo "tidak ada warning"; 
}
}
}
}

function mail_tender(Request $request){

$today = date("Y-m-d");
    $query = Klien::join('mkt_pem_tender', 'mkt_klien.kd_klien', '=', 'mkt_pem_tender.kd_klien')
    ->select('mkt_klien.*', 'mkt_pem_tender.*')->get();

foreach($query as $data){

$end = new DateTime($data->tgl_kak);
 $today = date("Y-m-d");
 $start = date_create($today);
 $diff = date_diff($end,$start);

 $d = ( $diff->format("%R%a"));

if ($start < $end){

try {
$mail = new PHPMailer(true);
{
$body ="
<head>
  <title>Notif update data tender</title>
</head>
<body>

     <div class='main' style='background: #fafafa; max-width: 500px; border-top: solid 3px #f55422; box-shadow: 0 0 25px rgba(0,0,0,0.05); margin:auto;''>
        
        <div class='header' style='padding: 30px; background: #f2f2f2;'> 
<img src='https://sprint.co.id/wp-content/uploads/2018/09/Sprint-Consultant-Member-of-Sucofindo.png' style='display: block; margin: auto; height : 50px; width : auto;'>
        </div>
        
        <div class='content' style='padding: 30px; padding-bottom: 40px;'>
        <h4> Hi ".$data->cp_internal.", </h4>
        <h3> harap lakukan update data tender :</h3>
        
<table >
      <tr><td style='padding : 5px;'><strong>NAMA KLIEN</strong></td> <td style='padding : 5px;'>".$data->nama_klien."</td></tr>
      <tr><td style='padding : 5px;'><strong>KELOMPOK JASA</strong></td><td style='padding : 5px;'>".$data->kelompok_jasa."</td></tr>
      <tr><td style='padding : 5px;'><strong>GRUP JASA</strong></td><td style='padding : 5px;'>".$data->sub_jasa."</td></tr>
      <tr><td style='padding : 5px;'><strong>NAMA PEKERJAAN</strong></td> <td style='padding : 5px;'>".$data->nama_pekerjaan."</tr>
      <tr><td style='padding : 5px;'><strong>TGL.KAK</strong></td><td style='padding : 5px;'>".$data->tgl_kak."</strong></td></tr>
      <tr><td style='padding : 5px;'><strong>ESTIMASI</strong></td><td style='padding : 5px;'>".$d." Hari Lagi</td></tr>      
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

$to = $data->cp_internal_email;

$mail->AddAddress($to);

$mail->Subject = '[Reminder] Penjualan (Tender)';

$mail->MsgHTML($body);

$mail->IsHTML(true); // send as HTML

$mail->Send();

}

echo 'Message Has Success.';
} catch (phpmailerException $e) {
echo $e->errorMessage();

}

}else{

echo "tidak ada warning"; 
echo "'.$d.'";
}
}
}

function mail_non_tender(Request $request){

$today = date("Y-m-d");
    $query = Klien::join('mkt_pem_non_tender', 'mkt_klien.kd_klien', '=', 'mkt_pem_non_tender.kd_klien')
    ->select('mkt_klien.*', 'mkt_pem_non_tender.*')->get();

foreach($query as $data){

if ((empty($data->tgl_followup)) or ($today > $data->tgl_followup)) {

try {
$mail = new PHPMailer(true);
{
$body ="
<!DOCTYPE html>
<html>
<head>
  <title>Notif followup (Non Tender): </title>
</head>
<body>

     <div class='main' style='background: #fafafa; max-width: 500px; border-top: solid 3px #f55422; box-shadow: 0 0 25px rgba(0,0,0,0.05); margin:auto;''>
        
        <div class='header' style='padding: 30px; background: #f2f2f2;'> 
<img src='https://sprint.co.id/wp-content/uploads/2018/09/Sprint-Consultant-Member-of-Sucofindo.png' style='display: block; margin: auto; height : 50px; width : auto;'>
        </div>
        
<div class='content' style='padding: 30px; padding-bottom: 40px;'>
<h4> Hi Tim Marketing, </h4>
<h3> Harap lakukan followup penjualan (Non Tender) :</h3>
<table>
    <tr><td style='color : #696969;'><strong>NAMA KLIEN</td><td>".$data->nama_klien."</strong></td></tr>
    <tr><td style='color : #696969;'><strong>KELOMPOK JASA</strong></td><td>".$data->kelompok_jasa."</td></tr>
    <tr><td style='color : #696969;'><strong>GRUP JASA</strong></td><td>".$data->sub_jasa."</td></tr>
    <tr><td style='color : #696969;'><strong>NAMA PEKERJAAN</strong></td><td>".$data->nama_pekerjaan."</td></tr>
    <tr><td style='color : #696969;'><strong>TANGGAL PROPOSAL</strong></td><td>".$data->tgl_proposal."</td></tr>
    <tr><td style='color : #696969;'><strong>TANGGAL FOLLOWUP</strong></td><td>".$data->tgl_followup."</td></tr>
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

$to = $data->cp_internal_email;

$mail->AddAddress($to);

$mail->Subject = '[Reminder] Penjualan Non-Tender';

$mail->MsgHTML($body);

$mail->IsHTML(true); // send as HTML

$mail->Send();

}

echo 'Message Has Success.';
} catch (phpmailerException $e) {
echo $e->errorMessage();

}

}else{

echo "tidak ada warning"; 
}
}
}

function mail_pengalaman(Request $request){

$today = date("Y-m-d");
    $pengalaman = Klien::join('mkt_pengalaman', 'mkt_klien.kd_klien', '=', 'mkt_pengalaman.kd_klien')
    ->select('mkt_klien.*', 'mkt_pengalaman.*')
    ->WhereNull('no_kontrak')->get();

foreach($pengalaman as $data){

 $end = new DateTime($data->kontrak_mulai);
 $today = date("Y-m-d");
 $start = date_create($today);
 $diff = date_diff($end,$start);

 $d = ( $diff->format("%R%a"));
 $i = (7 * 2);

if ($d > $i){

try {
$mail = new PHPMailer(true);
{
$body ="
<!DOCTYPE html>
<html>
<head>
  <title>Notif kontrak pengalaman</title>
</head>
<body>

     <div class='main' style='background: #fafafa; max-width: 500px; border-top: solid 3px #f55422; box-shadow: 0 0 25px rgba(0,0,0,0.05); margin:auto;''>
        
        <div class='header' style='padding: 30px; background: #f2f2f2;'> 
<img src='https://sprint.co.id/wp-content/uploads/2018/09/Sprint-Consultant-Member-of-Sucofindo.png' style='display: block; margin: auto; height : 50px; width : auto;'>
        </div>
        
<div class='content' style='padding: 30px; padding-bottom: 40px;'>
<h4> Hi ".$data->cp_internal.", </h4>
<h3> lengkapi kontrak pengalaman :</h3>
<table>
 <tr><td style='padding : 5px;'><strong>NAMA KLIEN</strong></td><td style='padding : 5px;'>".$data->nama_klien."</strong></td></tr>
 <tr><td style='color : #696969;><strong>KELOMPOK JASA</strong></td><td><strong>".$data->kelompok_jasa."</strong></td></tr>
 <tr><td style='color : #696969;><strong>GRUP JASA</strong></td><td><strong>".$data->sub_jasa."</strong></td></tr>
<tr><td style='color : #696969;><strong>NAMA PEKERJAAN</strong></td><td><strong>".$data->nama_pekerjaan."</strong></td></tr>  
      </table>       
      </div>      
        <div class='footer' style='background: black; padding: 30px; color: grey; line-height: 18px; font-size: 12px; text-align: center;'>Graha Sucofindo, 12th Floor, JL Raya Pasar Minggu, Kavling 34, RT.3/RW.4, Pancoran, Kec. Pancoran, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12780</div>
        
      </div>

 </body>

</html>";

$mail->isSMTP();

$mail->SMTPDebug = 2;

$mail->Debugoutput = 'html';

$mail->Host = 'mail.sprint.co.id';

$mail->Port = 587;

$mail->SMTPSecure = 'auto';

$mail->SMTPAuth = true;
$mail->SMTPAutoTLS = true;

$mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => false
    )
); 
$mail->Username = "reminder@sprint.co.id";

$mail->Password = "q1w2e3r4";

$mail->setFrom('reminder@sprint.co.id', 'Sprint Auto Reminder');

$mail->addReplyTo('reminder@sprint.co.id', 'Sprint Auto Reminder');

if ($data->cp_internal_email > 0) {
  $to = $data->cp_internal_email;
}else{
  $to = "test@test.com";
}

$mail->AddAddress($to);

$mail->Subject = '[Reminder] Kontrak';

$mail->MsgHTML($body);

$mail->IsHTML(true); // send as HTML

$mail->Send();

}

echo 'Message Has Success.';
} catch (phpmailerException $e) {
echo $e->errorMessage();

}

}else{

echo "tidak ada warning"; 
echo "'.$d.'";
}
}
}

function mail_proyek_prt_uudp(Request $request){

$data_prt = Prj_uudp::get();

$pertanggungjawaban = "pertanggungjawaban";

$prt = Prj_notif::where('notif',$pertanggungjawaban)->get();
foreach($prt as $data){
$interval = $data->interval;
$status_notif = $data->status;

}

foreach($data_prt as $data){

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

if ( $data->status_uudp == "open" AND $diff->format("%R%a") > $interval AND $status_notif = "enable" ){
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
<img src='https://sprint.co.id/wp-content/uploads/2018/09/Sprint-Consultant-Member-of-Sucofindo.png' style='display: block; margin: auto; height : 30px; width : auto;'>
        </div>
        
        <div class='content' style='padding: 30px; padding-bottom: 40px;'>
        <h4> Hi ".$nama.", </h4>
        <p> You get new leads from your campaign: </p>
        
<table>
 <tr><td style='padding : 5px';><strong>NOMOR UUDP</strong></td><td style='padding : 5px';><strong>".$no_uudp."</strong></td></tr>
 <tr><td style='padding : 5px';><strong>NILAI UUDP</strong></td><td style='padding : 5px';><strong>Rp. ".$fnilai_uudp."</strong></td>
      </table>          
      </div>
        
        <div class='footer' style='background: black; padding: 30px; color: grey; line-height: 18px; font-size: 12px; text-align: center;'>Graha Sucofindo, 12th Floor, JL Raya Pasar Minggu, Kavling 34, RT.3/RW.4, Pancoran, Kec. Pancoran, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12780</div>
        
      </div>

 </body>

</html>";

$mail->isSMTP();

$mail->SMTPDebug = 2;

$mail->Debugoutput = 'html';

$mail->Host = 'smtp.mail.yahoo.com';

$mail->Port = 465;

$mail->SMTPSecure = 'tls';

$mail->SMTPAuth = true;

$mail->SMTPAutoTLS = true;

$mail->Username = "sprintkonsultan@yahoo.com";

$mail->Password = "sucofindo2019";

$mail->setFrom('sprintkonsultan@yahoo.com', 'Sprint Auto Reminder');

$mail->addReplyTo('sprintkonsultan@yahoo.com', 'Sprint Auto Reminder');

$mail->AddAddress($to);

$mail->Subject = 'Notif Pertanggungjawaban UUDP';

$mail->MsgHTML($body);

$mail->IsHTML(true); // send as HTML

$mail->Send();

}

echo 'Message Has Success.';
} catch (phpmailerException $e) {
echo $e->errorMessage();

}

}else{

echo "tidak ada warning"; 
}
}
}

//mailer sppd
function mail_rekanan(Request $request){
 
$today = date("Y-m-d");
  
$count = Rekanan::where('tanggal_berakhir', '>', $today)->count();
$mail = MailRekanan::orderBy('primary_mail', 'asc')->get();
$query = Rekanan::orderBy('tanggal_berakhir', 'asc')->get();

foreach($mail as $mails){
$primary =  $mails->primary_mail;
$second =  $mails->secondary_mail;

foreach($query as $data){

//$i1 = (7 * 1);
//$i2 = (7 * 2);
//$i3 = (7 * 3);
//$i4 = (7 * 4);
if (empty($data->tanggal_berakhir)){
}elseif ($today > $data->tanggal_berakhir) {

try {
$mail = new PHPMailer(true);
{
$body ="
<head>
<style>
table, td, th {  
  border: 1px solid #ddd;
  text-align: left;
}

table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 15px;
}
</style>
<h3>Hallo Team Marketing,</h3>
</head>
<body>
  <text><i >Mohon untuk melakukan pembaruan data rekanan :<i/></text>
  <br><br>
<table >
       <tr><td style='color : #696969;'><strong>NAMA KLIEN</td><td >".$data->nama_klien."</strong></td></tr>
       <tr><td style='color : #696969;'><strong>ALAMAT URL</strong></td><td >".$data->url."</strong></td></tr>
       <tr><td style='color : #696969;'><strong>EXPIRED</strong></td><td >".$data->tanggal_berakhir."</strong></td></tr>
</td>
    </tr>  
    </table>
<br> <br> <br> <br> <br>

</body>
<p>This email was generated automatically. Do not reply to this email as it is not monitored.</p> 
  
<p>PT. Sucofindo Prima Internasional Konsultan | Graha Sucofindo Lt.12 Jl. Raya Pasar Minggu Kav. 34, Jakarta 12780 | Phone: (021) 7983666 | Fax: (021) 7986883 |  Fax: 7986894<p>
</html>";

$mail->isSMTP();

$mail->SMTPDebug = 2;

$mail->Debugoutput = 'html';

$mail->Host = 'mail.sprint.co.id';

$mail->Port = 587;

$mail->SMTPSecure = 'auto';

$mail->SMTPAuth = true;
$mail->SMTPAutoTLS = true;

$mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => false
    )
); 
$mail->Username = "reminder@sprint.co.id";

$mail->Password = "q1w2e3r4";

$mail->setFrom('reminder@sprint.co.id', 'Sprint Server');

$mail->addReplyTo('reminder@sprint.co.id', 'Sprint Server');

$mail->AddAddress($primary);

if (empty($second)){
}else{
  $mail->AddBCC($second);
}

$mail->Subject = '[Reminder] Rekanan';

$mail->MsgHTML($body);

$mail->IsHTML(true); // send as HTML

$mail->Send();

}

echo 'Message Has Success.';
} catch (phpmailerException $e) {
echo $e->errorMessage();

}

}

else {

echo "tidak ada warning"; 
}
}
}
}




}
