<?php
	$fullName = "555/2.png";
	$command = escapeshellcmd("python checkImg.py ".$fullName);
	$output = shell_exec($command);	  
	echo $output;  
?>