<?php
$image_name = $path.$_POST['nrp'];

//if (!file_exists($image_name)) {
//         return ["msg" => "no data to train"];
//    }
//$fi = new FilesystemIterator($image_name, FilesystemIterator::SKIP_DOTS);
//$fileCount = iterator_count($fi);   	
//if ($fileCount < 10)) {
//         return ["msg" => "data (".$fileCount.") < 10, too few to train"];
//    }
//$fileCount=1
//$output1 = "ok1";
//$command = escapeshellcmd("python doTrainToCSV.py ".$fullName);
//$output1 = shell_exec($command);	 
//$command = escapeshellcmd("python doTrainToModel.py");
//$output2 = shell_exec($command);	 
//$output2 = "ok2";
$tennisArray = array('msg' => 'ok');
//$tennisArray = array('msg' => $output1." total(".$fileCount.") has been trained" .$output2);
echo json_encode($tennisArray);
?>
