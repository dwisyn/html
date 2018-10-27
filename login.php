<?php
$conn = mysqli_connect("localhost", "root", "tehmanis" ,"login");
mysqli_query($conn, "SET NAMES 'utf8'");



$username = $_POST['user'];
$password = $_POST["password"];
$jarak = $_POST["jarak"];
$rumah = $_POST["rumah"];		

$query = 'select a.iduser as ID,b.uuid as UUID ,b.mac as MAC, a.pro as PRO from akun_pelanggan a, rumah b where a.idrumah_fk = b.idrumah and a.user= "'.$username.'" and a.password = "'.$password.'" and b.idrumah="'.$rumah.'"';
$result = mysqli_query($conn, $query) or die ('error: ' .mysql_error());
$status = "";
if (mysqli_num_rows($result) > 0) 
{
	$row = mysqli_fetch_assoc($result);
	if ($row['PRO']=='1'){		
		$base64_string = $_POST['image'];
		$path = "PREDICT_" . $username;  		
		$ok=1;
		if (!file_exists($path)) {
            if (!mkdir($path)) {$status = $path." cant cretate folder";$ok=0;}
        }

     	if($ok==1)
		{
			$fi = new FilesystemIterator($path, FilesystemIterator::SKIP_DOTS);
			$fileCount = iterator_count($fi)+1;   
			$data = explode(',', $base64_string);
			$fullName = $path."/".$fileCount.".png";
			$ifp = fopen($fullName, "wb");
			fwrite($ifp, base64_decode($data[1]));
			fclose($ifp);
			if ($ifp){
				$command = escapeshellcmd("python doPredict.py " .$username." " .$fullName);
				$status = shell_exec($command);	}
			else{$status =  $fullName."not saved";	}   
		}		

	}
	else
	{$status = "ACCEPTED,PRO=0";}

	
    
    $query = 'UPDATE akun_pelanggan SET JARAK = "'.$jarak.'" where user = "'.$username.'" and password = "'.$password.'" and idrumah_fk = "'.$rumah.'"';
	$result = mysqli_query($conn, $query) or die ('error: ' .mysql_error());	
	$tennisArray = array('msg' => $status.",".$row['ID'].",".$row['UUID'].",".$row['MAC'].",".$row['PRO']);	
   
			# code...
} else
{$tennisArray = array('msg' => "not found");}


echo json_encode($tennisArray);
?>
