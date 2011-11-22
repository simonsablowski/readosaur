<?php

class Feed extends Model {
	protected static $primaryKey = 'key';
	protected static $defaultSorting = array(
		'name' => 'ascending'
	);
	protected $fields = array(
		'key',
		'url',
		'name',
		'icon',
		'status',
		'created',
		'modified'
	);
	protected $requiredFields = array(
		'key',
		'url'
	);
	protected $attributes = array(
		'generator',
		'title',
		'link',
		'language',
		'webMaster',
		'copyright',
		'pubDate',
		'lastBuildDate',
		'description'
	);
	protected $Items;
	
	public function isField($field) {
		return parent::isField($field) || in_array($field, $this->attributes);
	}
	
	public function getData($field = NULL, $hideFields = TRUE) {
		$data = parent::getData($field, $hideFields);
		
		if (is_null($field)) {
			foreach ($data as $field => $value) {
				if (!parent::isField($field)) unset($data[$field]);
			}
		}
		
		return $data;
	}
	
	public function loadData() {
		$this->setData(Syndication::getFeed($this->getUrl()));
		
		$this->setItems(array_map(
			create_function('$item', 'return new FeedItem($item);'),
			Syndication::getFeedItems($this->getUrl())
		));
	}
}