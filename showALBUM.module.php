<?php
require("functions/scanMP3.function.php");
require("functions/scanDIRe.function.php");

$musics = scanDIRe($_GET["dir"]);

if(!isset($_GET["album"])){

	echo "<ul>";

	$alreadyGone = array();

	foreach($musics as $music){

		if(isMP3($music) == 0) continue;
		$data = scanMP3($music);

		if(in_array($data->getAlbum(),$alreadyGone))
			continue;

		if($data->getArtist() == "" || $data->getAlbum() == "") continue;

		array_push($alreadyGone,$data->getAlbum());
	?>
	<li data-album="<?=$data->getAlbum()?>">
		<div class="pink-light album">
			<span class="green-light"><?=$data->getArtist()?></span>
			<span class="blue-low">=></span>
			 "<?=$data->getAlbum()?>"
		</div>
	</li>
	<?php
	}

	echo "</ul>";

}
else {

	echo "<ul>";

	$i = 0;

	foreach($musics as $music){

		if(isMP3($music) == 0) continue;
		$data = scanMP3($music);

		if($data->getAlbum() != $_GET["album"]) continue;

		if($data->getArtist() == "") continue;
	?>
	<li data-file="<?=$music?>" data-time="0">
		<div class="pink-light not-playing">
			<span class="green-light"><?=$data->getArtist()?></span>
			<span class="blue-low">=></span>
			 "<?=$data->getTrack()?><span class="gray-white">.</span><?=$data->getTitle()?>"
		</div>
	</li>
	<?php
		$i++;
	}

	echo "</ul>";

}
?>