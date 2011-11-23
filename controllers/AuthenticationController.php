<?php

class AuthenticationController extends CustomController {
	public function getFields() {
		return array(
			new TextField('name', 'Name', 20),
			new PasswordField('password', 'Password')
		);
	}
	
	public function signIn() {
		$name = $this->getRequest()->getData('name');
		$password = $this->getRequest()->getData('password');
		
		if (!empty($name) && !empty($password)) {
			$password = sha1($password . $this->getConfiguration('passwordSalt'));
			
			try {
				$this->getSession()->setData('User', User::findByNameAndPassword($name, $password));
				
				return $this->redirect();
			} catch (Error $Error) {
				try {
					$combinationWrong = FALSE;
					User::findByName($name);
					$combinationWrong = TRUE;
				} catch (Error $Error) {
					if (!$combinationWrong) {
						return $this->redirect('User/signUp');
					}
					
					$this->getMessageHandler()->setMessage('The combination of user name and password you have entered is invalid.');
					
					return $this->redirect('Authentication/signIn');
				}
			}
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