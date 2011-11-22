<?php

class TemporaryUser extends User {
	protected $temporary = TRUE;
	
	public function __construct() {
		$this->setId(0);
		$this->setName('Temporary');
	}
}