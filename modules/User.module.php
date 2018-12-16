<?php

class UserModule {
	public function __construct() {
		Template::assign('selected', '');
	}
	
	public function main() {
	
	}
	
	public function login() {
		if (User::logged_in())
			redirect('/');
		
		if (isset($_GET['error']))
			Template::assign('error', (int)$_GET['error']);
		
		Template::display('login.tpl');
	}
	
	public function login2() {
		if (User::logged_in())
			redirect('/');
		
		if (empty($_POST['username']) || empty($_POST['password'])) {
			redirect('/user/login?error=1');
		}
		
		$request = DB::query(
			'SELECT user_id FROM {db_prefix}administratori
			WHERE username = :username 
				AND password = :password', 
			array(
				'username' => $_POST['username'], 
				'password' => ($_POST['password'])
			)
		);
		
		if ($request->rowCount() < 1)
			redirect('/user/login?error=2');
		
		list($member_id) = $request->fetch(FETCH_ROW);
		
		User::login($member_id);
		
		if (isset($_POST['remember_me']) && $_POST['remember_me'] == 1)
			User::login_cookie($member_id, ($_POST['password']));
		
		$redirect_to = $_SESSION['previous_url'];
		unset($_SESSION['previous_url']);
		
		redirect($redirect_to);
	}
	
	public function logout() {
		User::logout();
		redirect('/');
	}
	
	public function password() {
		if (isset($_GET['success']))
			Template::assign('success', true);
		
		Template::assign('page_title', 'Promena lozinke');
		Template::display('change-password.tpl');
	}
	
	public function password2() {
		if (empty($_POST['old_password']) || empty($_POST['new_password1']) || empty($_POST['new_password2'])) {
			Template::assign('error', 1);
			$this->password();
			exit;
		}
		
		$request = DB::query(
			'SELECT password FROM {db_prefix}administratori
			WHERE user_id = :user_id', 
			array(
				'user_id' => User::get_id()
			)
		);
		
		list($db_password) = $request->fetch(FETCH_ROW);
		
		if ($db_password != ($_POST['old_password'])) {
			Template::assign('error', 2);
			$this->password();
			exit;
		}
		
		if ($_POST['new_password1'] != $_POST['new_password2']) {
			Template::assign('error', 3);
			$this->password();
			exit;
		}
		
		// Everything is good, let's change it.
		
		DB::query(
			'UPDATE {db_prefix}administratori SET
			password = :password 
			WHERE user_id = :user_id',
			array(
				'password' => ($_POST['new_password1']),
				'user_id' => User::get_id()
			)
		);
		
		redirect('/user/password?success');
	}
	
	public static function actions() {
		return array(
			'main', 
			'login',
			'login2',
			'logout',
			'password', 
			'password2'
		);
	}
}

?>