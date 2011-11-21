<?php

class Syndication extends Application {
	protected static function getObject($url) {
		return new SimpleXMLElement($url, LIBXML_NOCDATA, TRUE);
	}
	
	public static function getProperties($node) {
		$properties = array();
		foreach (get_object_vars($node) as $property => $value) {
			if (!is_object($value) && !is_array($value)) {
				$properties[$property] = $value;
			}
		}
		return $properties;
	}
	
	public static function getFeed($url) {
		return self::getProperties(pos(self::getObject($url)->xpath('//channel')));
	}
	
	public static function getFeedItems($url) {
		return array_map(
			create_function('$item', 'return Syndication::getProperties($item);'),
			self::getObject($url)->xpath('//item')
		);
	}
}