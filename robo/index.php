<?php

//recupera de um post ex: ($.ajax({method: post})) o json enviado para o php
$data = json_decode(file_get_contents("php://input"));
if(is_object($data)){
	$retorno = array(
		'error' => 1,
		'mensagem' => 'Seu json foi encontrado'
	);	
}else{
	$retorno = array(
		'error' => 0,
		'mensagem' => 'Seu json não foi encontrado'
	);
}

//Transforma o resultado array em json
header("Access-Control-Allow-Origin: *");
echo json_encode($retorno);
?>

