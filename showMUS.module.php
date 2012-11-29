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
}
else {

	$handle = fopen("music.dat", "r");

	echo "<ul>";
	$i = 0;

	while($content = fscanf($handle, "%s\t%s\t%s\t%d\t%s\n")){
		list($path,$artist,$album,$track,$title) = $content;

		$path = str_replace("+"," ",$path);
		$artist = str_replace("+"," ",$artist);
		$album = str_replace("+"," ",$album);
		$title = str_replace("+"," ",$title);
?>
	<li data-file="<?=$path?>" data-time="0">
		<div class="pink-light <?php echo ($i==0 ? "playing" : "not-playing"); ?>">
			<span class="green-light"><?=$artist?></span>
			<span class="blue-low">=></span>
			 "<?=$track?><span class="gray-white">.</span><?=$title?>"
		</div>
	</li>
<?php
		$i++;
	}

	fclose($handle);

	echo "</ul>";

}
?>