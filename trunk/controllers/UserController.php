<?php

class UserController extends CustomController {
	public function getFields() {
		return array(
			new TextField('name', 'Name', 20),
			new PasswordField('password', 'Password')
		);
	}
	
	public function signUp() {
		$name = $this->getRequest()->getData('name');
		$password = $this->getRequest()->getData('password');
		
		if (!empty($name) && !empty($password)) {
			$password = sha1($password . $this->getConfiguration('passwordSalt'));
			
			try {
				User::findByName($name);
			} catch (Error $Error) {
				$User = new User(array(
					'name' => $name,
					'password' => $password
				));
				$User->create();
				
				$this->getSession()->setData('User', User::findByName($name));
				$this->getMessageHandler()->setMessage('The user account was created successfully.');
				
				return $this->redirect();
			}
		}
		
		return $this->displayView($this->getViewFile('form'), array(
			'Fields' => $this->getFields(),
			'ObjectName' => $this->getObjectName(),
			'mode' => 'signUp',
			'title' => 'Sign up'
		));
	}
}