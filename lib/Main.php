<?php

namespace lib;

class Main{
	private $url;
	private $exploder;
	private $main;
	private $road;
	private $call;

	function __construct(){
		$this->setUrl();
		$this->setExploder();
		$this->setRoad();
		$this->setCall();
	}

	public function setUrl(){
		$this->url = empty($_GET['url']) ? 'site/index' : $_GET['url'];
	}

	public function setExploder(){
		$this->exploder = explode('/',$this->url);
	}

	public function setCall(){
		if (!class_exists($this->road)) {
			$this->url = 'error/erro';
			$this->setRoad();
		}
	}

	public function setRoad(){
		$this->road = 'controller\\' . str_replace('/', '\\', $this->url);
	}

	public function getUrl(){
		return $this->url;
	}

	public function run(){
		$this->call = new $this->road();
	}
}
