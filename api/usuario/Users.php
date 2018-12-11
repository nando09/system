<?php

namespace api\usuario;

use model\Model;

class Users extends Model{
	public function get(Usuario $obj){
		$valor = ($obj->codUsuario != '') ? $obj->codUsuario : 0;
		$query = $this->First($this->Select("SELECT * FROM " . get_class($this) . " WHERE id = " . $valor));
		$this->setObject($obj, $query);
		return $query;
	}
}