<?php

	// Primeiro em php.ini temos que descomentar line pdo_psql
	try{
		$user = 'postgres';
		$pass = 'Sof@1502';
		$db = new PDO('pgsql:host=localhost;port=5432;dbname=Teste', $user, $pass);
		print_r("Conexão ligada com sucesso!");
		$query = $db->query("SELECT * FROM usuario");

		foreach ($query as $dado) {
			echo "<br>";
			echo "<br>";
			echo "ID: " . $dado['id'];
			echo "<br>";
			echo "NOME: " . $dado['nome'];
			echo "<br>";
			echo "EMAIL: " . $dado['email'];
			echo "<br>";
			echo "USUARIO: " . $dado['usuario'];
		}
		// var_dump($query);
	}catch(Exception $e){
		print_r("ERRO: ". $e->getMessage() ."<br>");
		die();
	}


	// $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// $db->beginTransaction();
	// $stmt = $db->prepare("select * from Usuario");
	// $stmt->execute(array($some_id));

	// $stmt->bindColumn('oid', $oid, PDO::PARAM_STR);
	// $stmt->fetch(PDO::FETCH_BOUND);
	// $stream = $db->pgsqlLOBOpen($oid, 'r');
	// header("Content-type: application/octet-stream");
	// fpassthru($stream);
