<?php

namespace controller\admin;

use lib\Main;

class Home extends Main{
	
	function __construct()
	{
		include 'view/admin/home.phtml';
	}

}

