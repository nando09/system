<?php

namespace controller\site;

use controller\System;
use api\usuario\Usuario;

class Home extends System{

	public function index(){
		// print_r("TESTE");
		// include 'view/site/home/home.phtml';
		$api = new Usuario();

		$this->dados = array(
			'list' => $api->getList()
		);
		// echo "<pre>";
		// print_r($this->dados);
		// echo "</pre>";
		// exit();

		$this->view();
	}
}
