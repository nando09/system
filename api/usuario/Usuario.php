<?php

namespace api\usuario;

use model\Model;
use object\usuario\Usuario as UsuarioKey;

class Usuario extends Model{
	public function get(UsuarioKey $obj){
		$valor = ($obj->id != '') ? $obj->id : 0;
		// print_r($valor);
		// exit();
		$query = $this->First($this->Select("SELECT * FROM USUARIO WHERE id = " . $valor));
		$this->setObject($obj, $query);
		return $query;
	}

	public function getList(){
		// return $this->Select("SELECT * FROM usuario");
		return $this->Select("SELECT * FROM USUARIO");
	}

	public function save(UsuarioKey $obj){
		if (empty($obj->id)) {
			return $this->Insert("INSERT INTO USUARIO (NOME, USUARIO, SENHA) VALUES ('". $obj->nome ."', '". $obj->usuario ."', MD5('". $obj->senha ."'))", 'USUARIO');
		}else{
			return $this->Update("UPDATE usuario SET nome = '". $obj->nome ."', usuario = '". $obj->usuario ."', senha = MD5('". $obj->senha ."') WHERE id = ". $obj->id, 'USUARIO');
		}
	}
}