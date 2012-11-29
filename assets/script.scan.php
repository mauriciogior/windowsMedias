<?php
session_start();
header('Content-type: text/javascript');
?>
$(document).ready(function(){

    $.post("scan.php?dir=<?=urlencode($_SESSION['dir'])?>", function(data){

        window.location="view.php";

    });

});