<?php

namespace lib;

class Object{
	
	public function __construct($method = null, $all = true){
		if ($method == 'POST') {
			foreach ($_POST as $key => $value) {
				$this->$key = $value; 
			}
		}

		if (isset($_FILES)) {
			foreach ($_FILES as $key => $value) {
				if ($all || isset($this->$ind)) {
					$this->$ind = $val;
				}
			}
		}
	}
}
