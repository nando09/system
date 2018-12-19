<?php

namespace Model;

use helper\Connect;

class Model extends Connect{
	protected $connect;

	public function __construct(){
		try{
			// $query = "SELECT * FROM usuario WHERE codUsuario = 1";
			// $resultado = $conexao->query($query);
			// $lista = $resultado->fetchAll();

			// echo "<pre>";
			// print_r($lista);
			// echo "<pre>";
			// exit();

			// $this->connect = new \PDO("mysql:host=" . self::srvMyhost . ";dbname=" . self::srvMyname . "; '" . self::srvMyuser . "', '" . self::srvMypass . "'");
			// die(self::srvMyhost ."\n" . self::srvMyname ."\n" . self::srvMyuser ."\n" . self::srvMypass);
			// die("mysql:host=" . self::srvMyhost . ";dbname=" . self::srvMyname . ";" . self::srvMyuser, self::srvMypass);
			$this->connect = new \PDO('pgsql:host='. self::srvMyhost .';port='. self::srvMyport .';dbname='. self::srvMyname, self::srvMyuser, self::srvMypass);
			// $this->connect = new \PDO('pgsql:host=localhost;port=5432;dbname=system', 'postgres', 'fer7660nando');
			$this->connect->exec("set names " . self::charset);
			$this->connect->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
			// exit();

		}catch (\PDOException $ex){
			print_r("Teste<br>");
			die($ex->getMessage());
		}
	}

	public function Select($sql){
		try{
			$state = $this->connect->prepare($sql);
			$state->execute();
		}catch(\PDOException $ex){
			die($ex->getMessage() . " " . $sql);
		}

		$array = array();
		while ($row = $state->fetchObject()) {
			$array[] = $row;
		}

		return $array;
	}

	public function Insert($sql){
		try{
			$state = $this->connect->prepare($sql);
			$state->execute(array('widgets'));
		}catch(\PDOException $ex){
			die($ex->getMessage() . " " . $sql);
		}

		return array(
			'sucess'=>true,
			'feedback'=>'',
			'codigo'=>$this->Last($table)
		);
	}

	public function Update($sql){
		try{
			$state = $this->connect->prepare($sql);
			$state->execute(array('widgets'));
		}catch(\PDOException $ex){
			die($ex->getMessage() . " " . $sql);
		}

		return array('sucess'=>true, 'feedback'=>'');
	}

	public function Delete($sql){
		try{
			$state = $this->connect->prepare($sql);
			$state->execute(array('widgets'));
		}catch(\PDOException $ex){
			die($ex->getMessage() . " " . $sql);
		}

		return array('sucess'=>true, 'feedback'=>'');		
	}
}
