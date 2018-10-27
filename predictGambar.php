<?php
$path = "PREDICT_";  
$base64_string =$_POST['image'];
$image_name =  $path.$_POST['nrp'];

$ok=1;
if (!file_exists($image_name)) {
            if (!mkdir($image_name)) {
                $tennisArray = array('msg' => "cant cretate folder");
                $ok=0;
            }

        }
if ($ok==1)
{
	$fi = new FilesystemIterator($image_name, FilesystemIterator::SKIP_DOTS);
	$fileCount = iterator_count($fi)+1;   
	$data = explode(',', $base64_string);
	$fullName = $image_name."/".$fileCount.".png";
	$ifp = fopen($fullName, "wb");
	fwrite($ifp, base64_decode($data[1]));
	fclose($ifp);
	if ($ifp)
	{
	$command = escapeshellcmd("python doPredict.py " .$_POST['nrp']." " .$fullName);
	$output = shell_exec($command);	 		
	$tennisArray = array('msg' => "result = " .$output);
	
	}
	else{
		$tennisArray = array('msg' => $fullName."not saved");
	}

}

echo json_encode($tennisArray);
?>
