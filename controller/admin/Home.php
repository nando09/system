<?php

namespace controller\admin;

use lib\Main;

class Home extends Main{

	public function home(){
		include 'view/admin/home.phtml';
	}
}
