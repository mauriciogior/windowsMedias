<?php

if(file_exists('classes/infomp3.class.errors.php'))
	require('classes/infomp3.class.errors.php');
else
	require('../classes/infomp3.class.errors.php');

if(file_exists('classes/infomp3.class.php'))
	require('classes/infomp3.class.php');
else
	require('../classes/infomp3.class.php');

function isMP3($file){

  $myId3 = new ID3($file);

  if ($myId3->getInfo()){

    return 1;

  }
  else { 

    return 0;

  }

}

function scanMP3($file){
  
  $myId3 = new ID3($file);

  if ($myId3->getInfo()){

    return $myId3;

  }
  else { 

    return 0;

  }

}
?> 