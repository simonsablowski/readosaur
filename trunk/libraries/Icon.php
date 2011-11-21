<?php

class Icon extends Application {
	protected $data;
	protected $type;
	
	public static function find($url) {
		if (!$components = parse_url($url)) return;
		$iconUrl = sprintf('%s://%s/favicon.ico', $components['scheme'], $components['host']);		
		try {
			return file_get_contents($iconUrl);
		} catch (Exception $Exception) {
			return NULL;
		}
	}
	
	public function __construct($data, $type = NULL) {
		$this->setData($data);
		$this->setType($type);
	}
	
	public function display() {
		$this->setConfiguration('header', sprintf('Content-Type: image/%s', $this->getType()));
		$this->setupHeader();
		
		print $this->getData();
	}
}