<?php
session_start();
require_once('dbconnection.php');
require_once('index.php');
function Send_Mail()
{
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

// Check connection
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

	
$row1=mysqli_query($con,"select email,password from users where email='".$_POST['usermail']."'");
$row2=mysqli_fetch_array($row1);


try{
if($row2>0)
{
	$nama=$row2['email'];
	$password=$row2['password'];
	$usermail= $_POST['usermail'];		
	$body= "
			Nama 		: $nama <br/>
			Password	: $password <br/>
			*Pastikan password anda tidak diketahui orang lain. Dan lakukan pembaruan password secara berkala
			agar keamanan rumah anda terjaga.<br/>
			E-kunci membantu anda untuk menjaga keamanan rumah anda. <br/>
			E-kunci ,Big choice for high safety.<br/>
			<br/>
			Regards ,Irzal <br/>
			Develope E-kunci. 
			";
	// Import PHPMailer classes into the global namespace
	// These must be at the top of your script, not inside a function
	//use PHPMailer\PHPMailer\PHPMailer;
	//use PHPMailer\PHPMailer\Exception;

	//Load Composer's autoloader
	//require 'vendor/autoload.php';
	require '/var/www/html/forgot/PHPmailer/class.phpmailer.php';
	//$mail = new PHPMailer(true); 
	//try {
	//set_time_limit(0); 
	
	


	$mail = new PHPMailer();
	$mail->IsSMTP(true); // SMTP
	$mail->SMTPDebug = 1;
	$mail->SMTPAuth   = true;  // SMTP authentication
	$mail->Host= "smtp.gmail.com";
	$mail->SMTPSecure = 'tls';
	$mail->Port = 587;
	//$mail->Timeout = 120; 

	$mail->Priority    = 1; // Highest priority - Email priority (1 = High, 3 = Normal, 5 = low)
  $mail->CharSet     = 'UTF-8';
  $mail->Encoding    = '8bit';
  $mail->Subject     = 'Test Email Using Gmail';
  $mail->ContentType = 'text/html; charset=utf-8\r\n';
  $mail->From        = 'reviewhotelteam@gmail.com';
  $mail->FromName    = 'GMail Test';
  $mail->WordWrap    = 900;

	//$mail->SetFrom("reviewhotelteam@gmail.com","email sender");
	$mail->Username = "reviewhotelteam@gmail.com";  // username gmail yang akan digunakan untuk mengirim email
	$mail->Password = "irzal@123";  // Password email
	//$mail->SetFrom($usermail, ' E-kunci');
	//$mail->AddReplyTo($usermail,' E-kunci');
	$mail->Subject = "Password E-kunci";
	$mail->MsgHTML($body);
	$address = $usermail;
	$mail->AddAddress($address, 'Hello');
	//$mail->AddAddress($usermail);
	try{
	if($mail->Send())
	      {
		echo $body;	
		echo"<br/><br/><center><h3>email $nama berhasil terkirim</h3></center>"; 
	       }
	else
	       {
		echo"<br/><br/><center><h3>email $nama tidak berhasil terkirim</h3></center>"; }
	}catch(Exception $e)
{
	var_dump($e);
	die();
}
	//}
	// catch (Exception $e) {
    	//	echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
	//}
}
else
{
	echo"gagal query";
	
}
}catch(Exception $e)
{
	var_dump($e);
	die();
}

mysqli_close($con);
}

//$to = "irzal.ahmad.s@gmail.com"; //email tujuan
//$subject = "Password E-kunci"; // subject email
echo"<br/><br/><center><h3>coba kirim</h3></center>"; 
Send_Mail();
?>