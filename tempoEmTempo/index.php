<!DOCTYPE html>
<html>
<body>

<marquee> Seja bem-vindo ao curso HTML Progressivo - Apostila completa, online e grátis de HTML <br></marquee>
<p>Click the button to wait 3 seconds, then alert "Hello".</p>
<p>After clicking away the alert box, an new alert box will appear in 3 seconds. This goes on forever...</p>
<button onclick="myFunction()">Try it</button>

<audio id="audio">
   <source src="som.mp3" type="audio/mp3" />
</audio>

<script>
	function myFunction() {
		setInterval(function(){ 
			play();
			alert(new Date());
		}, 5000);
	}

	audio = document.getElementById('audio');

	function play(){
		audio.play();
	}
</script>
</body>
</html>

