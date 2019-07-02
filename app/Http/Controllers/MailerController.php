<?php
namespace App\Http\Controllers;

use DateTime;
use App\Rekanan;
use App\MailRekanan;
use App\Pem_tender;
use App\Klien;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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

function mail_tender(Request $request){

$today = date("Y-m-d");
    $query = Klien::join('mkt_pem_tender', 'mkt_klien.kd_klien', '=', 'mkt_pem_tender.kd_klien')
    ->select('mkt_klien.*', 'mkt_pem_tender.*')->get();

foreach($query as $data){
 $end = new DateTime($data->tgl_kak);
 $start = new DateTime();
 $diff = $end->diff($start);
 $d = ($diff->d);

if ($start < $end){

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
        <h3>Hallo ".$data->cp_internal.",</h3>
        </head>
<body>
<text><i >Mohon untuk melakukan update data tender :<i></text>
<br><br>
<table >
      <tr><td style='color : #696969;'><strong>NAMA KLIEN</td> <td >".$data->nama_klien."</strong></td></tr>
      <tr><td style='color : #696969;'><strong>KELOMPOK JASA</strong></td><td >".$data->kelompok_jasa."</td></tr>
      <tr><td style='color : #696969;'><strong>GRUP JASA</strong></td><td >".$data->sub_jasa."</strong></td></tr>
      <tr><td style='color : #696969;'><strong>NAMA PEKERJAAN</strong></td> <td >".$data->nama_pekerjaan."</strong></tr>
      <tr><td style='color : #696969;'><strong>TGL.KAK</strong></td><td >".$data->tgl_kak."</strong></td></tr>
      <tr><td style='color : #696969;'><strong>ESTIMASI</strong></td><td >".$d." Hari Lagi</strong></td></tr>      
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

$mail->setFrom('reminder@sprint.co.id', 'Sprint Auto Reminder');

$mail->addReplyTo('reminder@sprint.co.id', 'Sprint Auto Reminder');

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
<h3>Hallo ".$data->cp_internal.",</h3>
</head>
<body>
    <text><i>Mohon untuk melakukan followup penjualan (Non Tender):</i></text>
<br><br>
<table>
    <tr><td style='color : #696969;'><strong>NAMA KLIEN</td><td>".$data->nama_klien."</strong></td></tr>
    <tr><td style='color : #696969;'><strong>KELOMPOK JASA</strong></td><td>".$data->kelompok_jasa."</td></tr>
    <tr><td style='color : #696969;'><strong>GRUP JASA</strong></td><td>".$data->sub_jasa."</td></tr>
    <tr><td style='color : #696969;'><strong>NAMA PEKERJAAN</strong></td><td>".$data->nama_pekerjaan."</td></tr>
    <tr><td style='color : #696969;'><strong>TANGGAL PROPOSAL</strong></td><td>".$data->tgl_proposal."</td></tr>
    <tr><td style='color : #696969;'><strong>TANGGAL FOLLOWUP</strong></td><td>".$data->tgl_followup."</td></tr>
</table>
<br><br><br><br><br>
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

$mail->setFrom('reminder@sprint.co.id', 'Sprint Auto Reminder');

$mail->addReplyTo('reminder@sprint.co.id', 'Sprint Auto Reminder');

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
 $start = new DateTime();
 $diff = $start->diff($end);
 $d = ($diff->d);
 $i = (7 * 2);

if ($d > $i){

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
        <h3>Hallo ".$data->cp_internal.",</h3>
<body>
<text><i>Mohon untuk melengkapi kontrak pengalaman :</i></text>
<br><br>
<table>
 <tr><td style='color : #696969;><strong>NAMA KLIEN</strong></td><td><strong>".$data->nama_klien."</strong></td></tr>
 <tr><td style='color : #696969;><strong>KELOMPOK JASA</strong></td><td><strong>".$data->kelompok_jasa."</strong></td></tr>
 <tr><td style='color : #696969;><strong>GRUP JASA</strong></td><td><strong>".$data->sub_jasa."</strong></td></tr>
<tr><td style='color : #696969;><strong>NAMA PEKERJAAN</strong></td><td><strong>".$data->nama_pekerjaan."</strong></td></tr>  
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

$mail->setFrom('reminder@sprint.co.id', 'Sprint Auto Reminder');

$mail->addReplyTo('reminder@sprint.co.id', 'Sprint Auto Reminder');

$to = $data->cp_internal_email;

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
}