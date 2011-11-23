<?php

class User extends Model {
	protected $temporary = FALSE;
	
	protected $fields = array(
		'id',
		'name',
		'password',
		'status'
	);
	protected $requiredFields = array(
		'name',
		'password'
	);
}