<?php

	// Primeiro em php.ini temos que descomentar line pdo_psql
	try{
		// $user = 'postgres';
		// $pass = 'fer7660nando';
		// $db = new PDO('pgsql:host=localhost;port=5432;dbname=system', $user, $pass);

		$user = 'postgres';
		$pass = 'Sof@1502';
		$db = new PDO('pgsql:host=localhost;port=5432;dbname=system', $user, $pass);

		// PDO('pgsql:host=localhost;port=5432;dbname=system', 'postgres', 'fer7660nando');
		print_r("Conexão ligada com sucesso!");
		$query = $db->query("SELECT * FROM USUARIO");

		foreach ($query as $dado) {
			echo "<br>";
			echo "<br>";
			echo "ID: " . $dado['id'];
			echo "<br>";
			echo "NOME: " . $dado['nome'];
			echo "<br>";
			echo "EMAIL: " . $dado['usuario'];
			echo "<br>";
			echo "USUARIO: " . $dado['senha'];
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
