<?php

class User {
	private static $user_instance;
	
	private $user_id;
	private $data = array();
	
	private function __construct() {
		$checked = false;
		
		if (isset($_SESSION['gof_login']) && isset($_SESSION['gof_id'])) {
			// We already know this user :).
			$checked = true;
			$user_id = (int)$_SESSION['gof_id'];
			
		} elseif (isset($_COOKIE['gof-taxi'])) {
			// So, you've decided to come back?
			list($user_id, $password) = @unserialize($_COOKIE['gof-taxi']);
			$user_id = (int)$user_id;
			
		} else {
			// Guest, huh? No problem ;).
			$user_id = 0;
		}
		
		if ($user_id > 0) {
			$request = DB::query(
				'SELECT username, last_login 
				FROM {db_prefix}administratori
				WHERE user_id = :user_id', 
				array(
					'user_id' => $user_id
				)
			);
			
			$this->data = $request->fetch();
		}
		
		// Final touch :D
		$this->user_id = $user_id;
	}
	
	public static function logged_in() {
		return (User::get_instance()->user_id > 0);
	}
	
	public static function get_id() {
		return User::get_instance()->user_id;
	}
	
	public static function get_data($key = '') {
		if (!User::logged_in())
			return array();
		else {
			if ($key == '')
				return User::get_instance()->data;
			else
				return User::get_instance()->data[$key];
		}
	}
	
	public static function login($user_id, $data = array()) {
		$_SESSION['gof_login'] = true;
		$_SESSION['gof_id'] = $user_id;
		$_SESSION['gof_data'] = serialize($data);
		
		DB::query(
			'UPDATE {db_prefix}administratori SET last_login = :time 
			WHERE user_id = :user_id',
			array(
				'time' => time(), 
				'user_id' => $user_id
			)
		);
	}
	
	public static function logout() {
		unset($_SESSION['gof_login']);
		unset($_SESSION['gof_id']);
		unset($_SESSION['gof_data']);
		
		if (isset($_COOKIE['gof-taxi']))
			User::login_cookie('', '', time() - 60);
	}
	
	public static function login_cookie($user_id, $password, $time = '') {
		if ($time == '')
			$time = time() + 5184000; // 5184000 = 60 days
			
		setcookie('gof-taxi', serialize(array($user_id, $password)), $time, '/');
	}
	
	public static function check_login($data) {
		$request = DB::query(
			'SELECT user_id  
			FROM {db_prefix}administratori
			WHERE email = :email 
				AND password = :password', 
			array(
				'email' => $data['email'], 
				'password' => ($data['password'])
			)
		);
		
		if ($request->countRows() > 0) {
			list($user_id) = $request->fetch(FETCH_ROW);
			
			return $user_id;
		} else
			return 0;
	}
	
	public static function get_instance() {
		if (!self::$user_instance) {
			self::$user_instance = new User();
		}
		
		return self::$user_instance;
	}
}

?>