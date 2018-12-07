<?php

namespace controller\site;

use controller\System;

class Home extends System{

	public function home(){
		// print_r("TESTE");
		include 'view/site/home.phtml';
	}
}
