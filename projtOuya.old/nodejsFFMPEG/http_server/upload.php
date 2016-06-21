<?php
error_reporting(E_ALL);
$supportedFormat = Array('aiff','ac3','avi','flv','h264','m4v','mp3','mpeg','ogg','wav');
$folder = 'uploads/';

// remove old files
$fsize = 0;
$folderMaxSize = 5000; // size in Mb
$fileList = Array();

if($dir = opendir($folder)){
	while($file = readdir($dir)) {
		if($file != "." && $file != ".." && is_file($folder.$file)){
			array_push($fileList, $file);
			$fsize += (filesize($folder.$file) / (1024 * 1024));
	}

	
	if($fsize > $folderMaxSize){
		foreach($fileList as $k=>$i){
			if(strpos($i, date('dmy')) !== 0){
				unlink($folder.$i);
			}
		}
	}
}
	
  closedir($dir);
}

// upload new file
if(isset($_FILES['inputFile'])){ 
	$fileSplit = explode('.',$_FILES['inputFile']['name']);
	$fileExt = $fileSplit[count($fileSplit) - 1];

	if(in_array($fileExt, $supportedFormat)){
		$fichier = date('dmyHis').'_'.rand(1,100000).".".$fileExt;
		if(move_uploaded_file($_FILES['inputFile']['tmp_name'], $folder.$fichier))
		{
			echo $fichier;
		}
		else
		{
			echo 'false';
		}
	}else{
		echo 'false';
	}
}
?>