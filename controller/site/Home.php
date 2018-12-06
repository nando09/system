<?php

namespace controller\site;

use lib\Main;

class Home extends Main{

	public function home(){
		// print_r("TESTE");
		include 'view/site/home.phtml';
	}
}
