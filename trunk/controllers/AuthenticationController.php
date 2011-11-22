<?php

class AuthenticationController extends CustomController {
	public function getFields() {
		return array(
			new TextField('name', 'Name', 20)
		);
	}
	
	protected function redirect($path = NULL) {
		if (is_null($path)) {
			$configuration = $this->getConfiguration('Request');
			$path = isset($configuration['defaultQuery']) ? $configuration['defaultQuery'] : NULL;
		}
		return parent::redirect($path);
	}
	
	public function signIn() {
		$name = $this->getRequest()->getData('name');
		if (!empty($name)) {
			try {
				$User = User::findByName($name);
			} catch (Error $Error) {
				$User = new User(array(
					'name' => $name
				));
				$User->create();
				$User = User::findByName($name);
				$this->getMessageHandler()->setMessage('The user account was created successfully.');
			}
			$this->getSession()->setData('User', $User);
			
			return $this->redirect();
		}
		
		return $this->displayView($this->getViewFile('form'), array(
			'Fields' => $this->getFields(),
			'ObjectName' => $this->getObjectName(),
			'mode' => 'signIn',
			'title' => 'Sign in'
		));
	}
	
	public function signOut() {
		$this->getSession()->setData('User', NULL);
		return $this->redirect();
	}
}