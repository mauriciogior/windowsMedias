<?php

if(isset($_POST["dir"])){
	include("scan.view.php");
}
else if(!file_exists("music.dat")){
?>
<ul>
	<li>
		<div class="pink-light">
			<form name="analizar" action="showMUS.module.php" method="POST">
				<input type="text" name="dir" placeholder="pasta das músicas"/>
				<input type="submit" value="analizar"/>
			</form>
		</div>
	</li>
</ul>
<?php
/*
	$musics = scanDIRe($_GET["dir"]);

	echo "<ul>";
	$i = 0;

	foreach($musics as $music){

		if(isMP3($music) == 0) continue;
		$data = scanMP3($music);

		if($data->getArtist() == "") continue;
	?>
	<li data-file="<?=$music?>" data-time="0">
		<div class="pink-light <?php echo ($i==0 ? "playing" : "not-playing"); ?>">
			<span class="green-light"><?=$data->getArtist()?></span>
			<span class="blue-low">=></span>
			 "<?=$data->getTrack()?><span class="gray-white">.</span><?=$data->getTitle()?>"
		</div>
	</li>
	<?php
		$i++;
	}

	echo "</ul>";
*/
}
?>