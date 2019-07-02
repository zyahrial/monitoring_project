<?php
define('DOC_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/');
?>
<?PHP 
require DOC_ROOT_PATH . "inventaris/koneksi.php";
if ($con->connect_error){
echo 'Gagal koneksi ke database';
} else {
//koneksi berhsil
}

$result = mysqli_query($con, "SELECT email1,email2,email3 FROM perizinan_email ORDER BY kode ASC"); 
				
$row = mysqli_fetch_array($result);
$cek = mysqli_num_rows($result);

if(mysqli_connect_errno()){
	echo 'Gagal melakukan con ke Database : '.mysqli_connect_error();
}else{
	echo $todayDate;
}
?>