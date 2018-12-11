<?php

namespace controller;
use lib\Main;

class System extends Main{
	public $dados;
	private $path;
	private $pathRender;
	private $title;	
	private $description;
	private $keywords;

	public function __construct(){
		parent::__construct();
	}

	private function setPath($render){
		// $this->pathRender = is_null($render) ? $this->getMethods() : $render;
		$this->path = 'view/' . $this->getMain() . '/' . $this->getClass() . '.phtml';
		$this->fileExists($this->path);
		// print_r($this->path);
		// exit();
	}

	private function fileExists($file){
		if (!file_exists($file)) {
			die('Erro, não foi encontrado o arquivo!!! ' . $file);
		}
		// else{
		// 	print_r($this->path);
		// 	exit();
		// }
	}

	public function view($render = null){
		$this->title = is_null($this->title) ? 'System Web' : $this->title;
		$this->description = is_null($this->description) ? 'Sistem de estoque, lojas, metalurgica, empresas grandes, sistema para pequeno porte' : $this->description;
		$this->keywords = is_null($this->keywords) ? 'Sistema de estoque, system stock, trabalhe menos para sua empresa, deixa que o sistema trabalhe por você!' : $this->keywords;
		$this->setPath($render);
		$this->render();
	}

	public function render($file = null){
		if (is_array($this->dados) && count($this->dados) > 0) {
			extract($this->dados, EXTR_PREFIX_ALL, 'view');
			extract(array(
				'controller'=>(is_null($this->captionController) ? '' : $this->captionController),
				'action'=>(is_null($this->captionAction) ? '' : $this->captionAction),
				'params'=>(is_null($this->captionParams) ? '' : $this->captionParams),
			), EXTR_PREFIX_ALL, 'caption');
		}

		if (!is_null($file) && is_array($file)) {
			foreach ($file as $li) {
				include($li);
			}
		}else if (is_null($file) && is_array($this->path)) {
			foreach ($this->path  as $l) {
				include($l);
			}
		}else{
			$file = is_null($file) ? $this->path : $file;
			file_exists($file);
		}
	}
}
