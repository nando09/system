<?php

namespace lib;

class Main{
	private $url;
	private $exploder;
	private $main;
	private $classe;
	private $methods;
	private $params;
	private $road;

	function __construct(){
		$this->setUrl();
		$this->setExploder();
		$this->setMain();		
		$this->setClass();
		$this->setMethods();
		$this->setParams();
	}

	public function setUrl(){
		$this->url = empty($_GET['url']) ? 'site/home' : $_GET['url'];
	}

	public function setExploder(){
		$this->exploder = explode('/',$this->url);
	}

	public function setMain(){
		$this->main = $this->exploder[0];
	}

	public function setClass() {
		$this->classe = (empty($this->exploder[1]) || is_null($this->exploder[1]) || !isset($this->exploder[1]) ? 'site' : $this->exploder[1]);
	}

	public function setMethods() {
		$this->methods = (empty($this->exploder[2]) || is_null($this->exploder[2]) || !isset($this->exploder[2]) ? 'home' : $this->exploder[2]);
	}

	public function setParams(){
		$this->params = (empty($this->exploder[3]) || is_null($this->exploder[3]) || !isset($this->exploder[3]) ? '' : $this->exploder[3]);
	}

	//Ligação se é Class
	public function setCallClass(){
		if (!class_exists($this->road)) {
			header("HTTP/1.0 404 Not Found");
			include_once 'view/error/404.phtml';
			exit();
		}
	}

	//Ligação se é Methods
	public function setCallMethod(){
		if (!method_exists($this->road, $this->methods)){
			header("HTTP/1.0 404 Not Found");
			include_once 'view/error/404.phtml';
			exit();
		}
	}

	//Caminho a percorrer
	public function setRoad(){
		$this->road = 'controller\\' . $this->main . '\\' . $this->classe;
	}

	public function getRoad(){
		return $this->road;
	}

	public function run(){
		$this->setRoad();
		$this->setCallClass();
		$this->setCallMethod();
		$this->call = new $this->road();
		$methods = $this->methods;
		$this->call->$methods();
	}
}
