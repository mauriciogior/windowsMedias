<?php
require("functions/scanMP3.function.php");
require("functions/scanDIRe.function.php");

$musics = scanDIRe($_GET["dir"]);

echo "<ul>";

$alreadyGone = array();

foreach($musics as $music){

	if(isMP3($music) == 0) continue;
	$data = scanMP3($music);

	if($data->getArtist() == "") continue;

	if(in_array($data->getArtist(),$alreadyGone))
		continue;

	array_push($alreadyGone,$data->getArtist());
?>
<li>
	<div class="pink-light">
		<span class="green-light"><?=$data->getArtist()?></span>
	</div>
</li>
<?php
}

echo "</ul>";
?>