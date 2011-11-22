<?php

class FeedController extends Controller {
	public function __construct() {
		$this->setVariables(array(
			'Feeds' => Feed::findAll()
		));
	}
	
	public function getFields() {
		return array(
			new TextField('url', 'URL', 255),
			new TextField('name', 'Name', 100)
		);
	}
	
	public function show($key) {
		if (empty($key)) {
			$Feeds = Feed::findAll();
			$RandomFeed = $Feeds[rand(0, count($Feeds) - 1)];
			$key = $RandomFeed->getKey();
		}
		
		$Feed = Feed::findByKey($key);
		$Feed->loadData();
		
		$this->displayView('Feed.show.php', array(
			'Feed' => $Feed
		));
	}
	
	public function add() {
		if ($this->getRequest()->isSubmitted()) {
			try {
				$Feed = new Feed(array(
					'name' => ($name = $this->getRequest()->getData('name')),
					'url' => ($url = $this->getRequest()->getData('url')),
					'key' => ($key = $this->getRequest()->getData('key'))
				));
				$Feed->loadData();
				
				if (empty($name)) {
					$Feed->setName($Feed->getTitle());
				}
				if (empty($key)) {
					$Feed->setKey($this->generateKey($Feed->getName()));
				}
				$Feed->setIcon($this->getIcon($url));
				
				$Feed->create();
				
				$this->getMessageHandler()->setMessage('The feed was created successfully.');
			} catch (Exception $Exception) {
				$this->getMessageHandler()->setMessage('The feed could not be created, please check your input.');
			}
			
			return $this->redirect();
		}
		
		return $this->displayView($this->getViewFile('form'), array(
			'Fields' => $this->getFields(),
			'ObjectName' => 'Feed',
			'mode' => 'add'
		));
	}
	
	protected function generateKey($name, $increment = 0) {
		$separator = '-';
		
		$key = strtolower(preg_replace('/\W/', $separator, $name));
		try {
			Feed::findByKey($key);
			
			$increment++;
			$appendix = sprintf('%s%d', $separator, $increment);
			
			if ($increment > 1) {
				$name = substr($name, 0, strstr($name, $separator) - 1);
			}
			
			return $this->generateKey($name . $appendix, $increment);
		} catch (Error $Error) {
			return $key;
		}
	}
	
	protected function getIcon($url) {
		return Icon::find($url);
	}
}