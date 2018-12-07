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

	public function view($render = null){
		$this->title = is_null($this->title) ? 'Meu titulo' : $this->title;
		$this->description = is_null($this->description) ? 'Minha descrição' : $this->description;
		$this->keywords = is_null($this->keywords) ? 'Minha palavra chave' : $this->keywords;
		print_r($this->getRoad());

		// $this->setPath($render);
		// $this->render();
	}
}
