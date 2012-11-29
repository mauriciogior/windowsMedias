$(document).ready(function(){

	var DIR = "C:/Users/Mauricio/Music/MUSICAS";

    $.post("showMUS.module.php", function(data){

        $("#playlist-content").html(data);

    });

	var path = $(".playing").closest("li").attr("data-file");

	$.each($("source"),function(){

		$(this).attr("src",path);

	});

	$(".not-playing").live("click",function(){

		var path = $(this).closest("li").attr("data-file");
		var player = $(".player audio");
		var time = player[0].currentTime;

		$(".playing").closest("li").attr("data-time",time);
		$(".playing").removeClass("playing").addClass("not-playing");
		$(this).removeClass("not-playing").addClass("playing");

		player[0].src = path;

		player.bind('canplay', function(){
			$(this)[0].currentTime = $(".playing").closest("li").attr("data-time");
		});

	});

	$(".menu ul li .purple").live("click",function(){

		var file;

		$(".active").toggleClass("active");
		$(this).toggleClass("active");

		if($(this).html() == "artist")
			file = "showARTISTER.module.php?dir="+DIR;
		else if($(this).html() == "music")
			file = "showMUS.module.php?dir="+DIR;
		else
			file = "showALBUM.module.php?dir="+DIR;

	    $.post(file, function(data){

	        $("#playlist-content").html(data);

	    });

	});

	$(".album").live("click",function(){

		var album = $(this).parent("li").attr("data-album");

	    $.post("showALBUM.module.php?dir="+DIR+"&album="+album, function(data){

	        $("#playlist-content").html(data);

	    });

	});

});