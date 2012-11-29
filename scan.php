<?php
require("functions/scanMP3.function.php");
require("functions/scanDIRe.function.php");

function set (&$array,$key) { 
    reset ($array); 
    while (key($array) !== $key) { 
        if (next($array) === false) throw new Exception('Invalid key'); 
    } 
}

$musics = scanDIRe($_GET["dir"]);

$i = 0;

$handle = fopen("music.dat", "w+");

$dirPath = explode("\\",__DIR__);
end($dirPath);

foreach($musics as $music){

	if(isMP3($music) == 0) continue;
	$data = scanMP3($music);

	$path = explode("/",$music);

	$key = key($dirPath);

	$finalPath = "";

	$key++;

	while(@$path[$key]){
		$finalPath .= $path[$key]."/";
		$key++;
	}

	$finalPath = substr($finalPath, 0, -1);

	if($data->getArtist() == "") continue;

	$conteudo = str_replace(" ","+",$finalPath)."\t";
	$conteudo .= str_replace(" ","+",$data->getArtist())."\t";
	$conteudo .= str_replace(" ","+",$data->getAlbum())."\t";
	$conteudo .= str_replace(" ","+",$data->getTrack())."\t";
	$conteudo .= str_replace(" ","+",$data->getTitle())."\n";

	fwrite($handle,$conteudo);

	$i++;
}

fclose ($handle);

?>