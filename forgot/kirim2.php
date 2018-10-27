<?php

$nama= $_POST['nama'];
$hp= $_POST['hp'];
$alamat= $_POST['alamat'];
$usermail= $_POST['usermail'];
$body= "
Nama : $nama <br/>
HP : $hp <br/>
Alamat: $alamat <br/>
Email: $usermail <br/>
";

function Send_Mail($to,$subject,$body)
{
require 'PHPmailer/class.phpmailer.php';
$usermail= $_POST['usermail'];
echo $usermail;
$mail = new PHPMailer();
$mail->IsSMTP(true); // SMTP
$mail->SMTPAuth   = true;  // SMTP authentication
$mail->Host= "smtp.gmail.com";
$mail->SMTPSecure = 'tls';
$mail->Port = 587; 
$mail->SetFrom("reviewhotelteam@gmail.com","email sender");
$mail->Username = "reviewhotelteam@gmail.com";  // username gmail yang akan digunakan untuk mengirim email
$mail->Password = "irzal@123";  // Password email
$mail->SetFrom($usermail, 'user');
$mail->AddReplyTo($usermail,'user');
$mail->Subject = $subject;
$mail->MsgHTML($body);
$address = $to;
$mail->AddAddress($address, $to);
$mail->AddAddress($usermail);
if($mail->Send())
{
	echo"<br/><br/><center><h3>email telah benar xx terkirim</h3></center>"; 
	return false;
}
else
{
	echo"<br/><br/><center><h3>email tidak terkirim</h3></center>"; 
    return true;
}
}

$to = "irzal.ahmad.s@gmail.com"; //email tujuan
$subject = "bismillah  123"; // subject email
echo"<br/><br/><center><h3>coba kirim</h3></center>"; 
Send_Mail($to,$subject,$body);
?>