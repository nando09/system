<?php

namespace controller\admin;

use controller\System;

class Home extends System{

	public function home(){
		$this->view();
		// include 'view/admin/home.phtml';
	}
}
