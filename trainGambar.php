<?php
$image_name = $_POST['nrp'];
if (!file_exists($image_name)) {
	$tennisArray = array('msg' => "no data to train");
         
    }
else{
	$fi = new FilesystemIterator($image_name, FilesystemIterator::SKIP_DOTS);
	$fileCount = iterator_count($fi);   		
	$command1 = escapeshellcmd("python doTrainToCSV.py ".$image_name);
	$output1 = shell_exec($command1);	 
	$command2 = escapeshellcmd("python doTrainToModel.py");
	$output2 = shell_exec($command2);	 	
	$tennisArray = array('msg' => $output1." total(".$fileCount. ") has been trained ".$output2);
}
echo json_encode($tennisArray);
?>
