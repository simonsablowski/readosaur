<?php

class User extends Model {
	protected $temporary = FALSE;
	
	protected $fields = array(
		'id',
		'name',
		'status'
	);
	protected $requiredFields = array(
		'name'
	);
}