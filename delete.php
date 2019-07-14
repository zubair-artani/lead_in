<?php 

        $data=$_POST['allimg'];
        $dir = "uploads";
        $dirHandle = opendir($dir);
        while ($file = readdir($dirHandle)) {
        	for($i = 0; $i < sizeof($data) - 1; $i++){
        		 if($file==$data[$i]) {
	                unlink($file);
	            }	
        	}
           
        }

        closedir($dirHandle);



	// $data="one.html";
    // $dir = "items";
    // while ($file = readdir($dirHandle)) {
         // if($file==$data) {
            // unlink($dir.'/'.$file);
         // }
    // }
 ?>