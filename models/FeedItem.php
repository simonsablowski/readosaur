<?php

class FeedItem extends Model {
	protected $attributes = array(
		'title',
		'link',
		'guid',
		'category',
		'pubDate',
		'description'
	);
	
	public function isField($field) {
		return parent::isField($field) || in_array($field, $this->attributes);
	}
	
	public function getDate() {
		return strtotime($this->getPubDate());
	}
}