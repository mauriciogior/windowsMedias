<?php

function scanDIRe($path){

	if(!is_dir($path))
		return 0;

	$musics = array();

	$di = new RecursiveDirectoryIterator($path);

	foreach (new RecursiveIteratorIterator($di) as $filename => $file) {

		$filename = str_replace("\\","/",$filename);
		if(substr($filename,-3) == "mp3")
			array_push($musics,$filename);
	}

	return $musics;

}

?>