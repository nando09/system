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

			// $this->con = new \PDO("mysql:host=" . self::srvMyhost . ";dbname=" . self::srvMyname . "; '" . self::srvMyuser . "', '" . self::srvMypass . "'");
			// die(self::srvMyhost ."\n" . self::srvMyname ."\n" . self::srvMyuser ."\n" . self::srvMypass);
			// die("mysql:host=" . self::srvMyhost . ";dbname=" . self::srvMyname . ";" . self::srvMyuser, self::srvMypass);
			$this->con = new \PDO('mysql:host='. self::srvMyhost .';dbname='. self::srvMyname .';', self::srvMyuser, self::srvMypass);
			$this->con->exec("set names " . self::charset);
			$this->con->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
			// exit();

		}catch (\PDOException $ex){
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
			$state = $this->con->prepare($sql);
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
			$state = $this->con->prepare($sql);
			$state->execute(array('widgets'));
		}catch(\PDOException $ex){
			die($ex->getMessage() . " " . $sql);
		}

		return array('sucess'=>true, 'feedback'=>'');
	}

	public function Delete($sql){
		try{
			$state = $this->con->prepare($sql);
			$state->execute(array('widgets'));
		}catch(\PDOException $ex){
			die($ex->getMessage() . " " . $sql);
		}

		return array('sucess'=>true, 'feedback'=>'');		
	}
}
