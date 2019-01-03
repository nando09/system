<?php

namespace controller\site;

use controller\System;
use api\usuario\Usuario as apiUsuario;
use object\usuario\Usuario;


class Home extends System{

	public function index(){
		// print_r("TESTE");
		// include 'view/site/home/home.phtml';
		$api = new apiUsuario();

		$this->dados = array(
			'list' => $api->getList()
		);
		// echo "<pre>";
		// print_r($this->dados);
		// echo "</pre>";
		// exit();

		$this->view();
	}

	public function form(){
		// print_r("TESTE");
		// include 'view/site/home/home.phtml';
		$usuario = new Usuario();
		$usuario->id = $this->getParams();

		// echo "<pre>";
		// print_r($usuario);
		// echo "</pre>";
		// exit();

		$api = new apiUsuario();
		$api->get($usuario);

		$this->dados = array(
			'dados' => $usuario
		);
		// echo "<pre>";
		// print_r($this->dados);
		// echo "</pre>";
		// exit();

		$this->view();
	}

	public function delete(){
		$usuario = new Usuario();
		$cod = $usuario->id = $this->getParams();

		$api = new apiUsuario();
		$api->Delete("DELETE FROM USUARIO WHERE id = ". $cod, 'USUARIO');
		header('location: /System/system');
		// print_r($api->Delete("DELETE FROM USUARIO WHERE id = ". $cod, 'USUARIO'));
		// exit();
	}

	public function save(){
		$api = new apiUsuario();
		$api->save(new Usuario('POST'));
		header('location: /System/system');
		// print_r($api->save(new Usuario('POST')));
	}
}
