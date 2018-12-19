<?php

namespace api\usuario;

use model\Model;

class Usuario extends Model{
	public function get(Usuario $obj){
		$valor = ($obj->codUsuario != '') ? $obj->codUsuario : 0;
		$query = $this->First($this->Select("SELECT * FROM " . get_class($this) . " WHERE id = " . $valor));
		$this->setObject($obj, $query);
		return $query;
	}

	public function getList(){
		// return $this->Select("SELECT * FROM usuario");
		return $this->Select("SELECT * FROM USUARIO");
	}

	public function save(Usuario $obj){
		if (empty($obj->codUsuario)) {
			return $this->Insert($obj, 'usuario');
		}else{
			return $this->Update($obj, array('codUsuario' => $obj->codUsuario), 'usuario');
		}
	}
}