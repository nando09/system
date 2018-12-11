<?php

namespace controller\site;

use controller\System;

class Home extends System{

	public function index(){
		// print_r("TESTE");
		include 'view/site/home/home.phtml';
	}
}
