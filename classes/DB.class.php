<?php
define('FETCH_ROW', PDO::FETCH_NUM);

class DB {
	private static $db_instance;
	public $pdo;
	
	private function __construct() {
		try {
			$this->pdo = new PDO('mysql:host=' . Conf::get('db_server') . ';dbname=' . Conf::get('db_name'), Conf::get('db_user'), Conf::get('db_password'));
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
			
			$this->pdo->exec('SET NAMES utf8');
			
		} catch(PDOException $e) {
			show_error('Изгледа да је база података отказала послушност.<br /> Покушајте поново мало касније.');
		}
	}
	
	public static function query($sql, $params = array()) {
		$db = DB::get_instance();
		
		$sql = str_replace('{db_prefix}', Conf::get('db_prefix'), $sql);
		
		/*$time_start = microtime(true);
		echo '<pre>' . $sql . '</pre>';*/
		
		//echo '<pre>' . $sql . '</pre>';
		
		try {
			$statement = $db->pdo->prepare($sql);
			
			if (count($params) > 0) {
				foreach ($params as $key => $value) {
					$param = (is_numeric($value)) ? PDO::PARAM_INT : PDO::PARAM_STR;
					$statement->bindValue(':' . $key, $value, $param);
				}
			}
			
			$statement->execute();
		} catch(PDOException $e) {
			if (defined('DEBUG')) {
				$trace = $e->getTrace();
				
				$msg = '<blockqoute>There was an error executing query in <strong>' . $trace[1]['file'] . '</strong> on line <strong>' . $trace[1]['line'] . '</strong>.<br /><br />';
				$msg .= $e->getMessage() . '</blockquote>';
				
				/*$msg .= '<pre>' . $sql . '</pre>';
				
				echo '<pre>';
				print_r($params);
				echo '</pre>';*/
				
				die($msg);
			} else {
				show_error('Изгледа да је база података отказала послушност.<br /> Покушајте поново мало касније.');
			}
		}
		
		/*$time_end = microtime(true);
		$time = $time_end - $time_start;
		
		echo 'Time is: ' . $time . '<br />';*/
		
		return $statement;
	}
	
	public static function lastInsertId() {
		$db = DB::get_instance();
		
		return $db->pdo->lastInsertId();
	}
	
	private function __clone() {
	
	}
	
	public static function get_instance() {
		if (!self::$db_instance) {
			self::$db_instance = new DB();
		}
		
		return self::$db_instance;
	}
}

?>