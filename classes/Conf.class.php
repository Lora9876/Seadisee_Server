<?php

class Conf {
	private static $init = false;
	private static $data = array();
	
	private static function init() {
		global $conf;
		
		self::$data = $conf;
	}
	
	public static function get($key, $default = '') {
		if (!self::$init) {
			self::init();
			self::$init = true;
		}
		
		return (isset(self::$data[$key])) ? self::$data[$key] : $default;
	}
	
	public static function set($key, $value) {
		$request = DB::query(
			'SELECT value FROM {db_prefix}settings WHERE variable = :variable', 
			array('variable' => $key)
		);
		
		if ($request->rowCount() > 0)
			DB::query(
				'UPDATE {db_prefix}settings SET value = :value 
				WHERE variable = :variable',
				array(
					'variable' => $key,
					'value' => $value
				)
			);
		else
			DB::query(
				'INSERT INTO {db_prefix}settings SET 
					variable = :variable,
					value = :value',
				array(
					'variable' => $key,
					'value' => $value
				)
			);
	}
}

?>