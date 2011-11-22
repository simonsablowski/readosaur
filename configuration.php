<?php

$configuration = array();

$configuration['pathApplication'] = dirname(__FILE__) . '/';

$configuration['baseUrl'] = '/readosaur/';

$configuration['includeDirectories'] = array(
	$configuration['pathApplication'],
	$configuration['pathApplication'] . '../cheese/',
	$configuration['pathApplication'] . '../nacho/'
);

$configuration['Database'] = array(
	'type' => 'MySql',
	'host' => 'localhost',
	'name' => 'readosaur',
	'user' => 'root',
	'password' => ''
);

$configuration['Request'] = array(
	'segmentSeparator' => '/',
	'defaultQuery' => 'Feed/index',
	'aliasQueries' => array(
		'((Feed|Icon|Authentication)/)(.+)' => '$1$3',
		'(sign)-in' => 'Authentication/$1In',
		'(sign)-out' => 'Authentication/$1Out',
		'random(-feed)?' => 'Feed/show/',
		'(\w+)-feed(.*)' => 'Feed/$1$2',
		'([^/]+)' => 'Feed/show/$1'
	)
);

$configuration['iconType'] = 'png';