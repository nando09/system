<!-- https://webdesign.tutsplus.com/pt/tutorials/a-beginners-guide-to-ajax-with-jquery--cms-25126 -->
<!DOCTYPE html>
<html>
<head>
	<title>Teste concatenação com JS</title>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-growl/1.0.0/jquery.bootstrap-growl.min.js"></script>
<style type="text/css">
	#button{
		margin-top:  50px;
	}
</style>
<body>
	<div class="main text-center">
		<button id="button">TESTAR</button>
	</div>
<script type="text/javascript">
	// var count = 0;
	// while(count < 1000){
	// 	$("#teste").html('<td class="text-success">'+ count +'</td>');
	// 	count++;
	// }

$("#button").click(function(){
	$.ajax({
		url: "teste.php",
		dataType: 'json',
		type: 'POST',
		success: function(dados) {
			// console.log(dados.Status);
			// console.log(dados);
			if (dados.Teste == 'S') {
				$.bootstrapGrowl("Teste é 'S'!", {
					ele: 'body', // which element to append to
					type: 'success', // (null, 'info', 'danger', 'success')
					offset: {from: 'bottom', amount: 20}, // 'top', or 'bottom'
					align: 'right', // ('left', 'right', or 'center')
					width: 'auto', // (integer, or 'auto')
					delay: 4000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
					allow_dismiss: true, // If true then will display a cross to close the popup.
					stackup_spacing: 10 // spacing between consecutively stacked growls.
				});
			}else{
				$.bootstrapGrowl(dados.Teste, {
					ele: 'body', // which element to append to
					type: 'info', // (null, 'info', 'danger', 'success')
					offset: {from: 'bottom', amount: 20}, // 'top', or 'bottom'
					align: 'right', // ('left', 'right', or 'center')
					width: 'auto', // (integer, or 'auto')
					delay: 4000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
					allow_dismiss: true, // If true then will display a cross to close the popup.
					stackup_spacing: 10 // spacing between consecutively stacked growls.
				});
			}
		},
		error: function(){
			$.bootstrapGrowl("Erro!", {
				ele: 'body', // which element to append to
				type: 'danger', // (null, 'info', 'danger', 'success')
				offset: {from: 'bottom', amount: 20}, // 'top', or 'bottom'
				align: 'right', // ('left', 'right', or 'center')
				width: 'auto', // (integer, or 'auto')
				delay: 4000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
				allow_dismiss: true, // If true then will display a cross to close the popup.
				stackup_spacing: 10 // spacing between consecutively stacked growls.
			});
		}
	});
});

	// $.ajax({
	// 	type: "POST",
	// 	url: 'teste.php',
	// 	data: data,
	// 	success: success,
	// 	dataType: dataType
	// });

</script>
</body>
</html>
