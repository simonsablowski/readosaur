<?php

class IconController extends Controller {
	public function getFields() {
		return array();
	}
	
	public function show($key) {
		$Feed = Feed::findByKey($key);
		
		if (!$data = $Feed->getIcon()) {
			throw new FatalError('No image data available');
		}
		
		$Icon = new Icon($data, $this->getConfiguration('iconType'));
		$Icon->display();
	}
}