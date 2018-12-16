<?php

class Router {
	private static $router_instance;
	
	private $request;
	private $is_ajax = false;
	private $data = array();
	
	public $modules = array();
	public $actions = array();
	
	private $module;
	private $action;
	
	private $params = array();
	
	private function __construct() {
		$this->request = (isset($_GET['params'])) ? $_GET['params'] : '/';
		$this->is_ajax = substr($this->request, -5) == '.ajax';
		
		if ($this->is_ajax)
			$this->request = str_replace('.ajax', '', $this->request);
		
		$this->data = explode('/', $this->request);
		
		$this->setup_modules();
		$this->module = (isset($this->data[0]) && in_array($this->data[0], $this->modules)) ? $this->data[0] : 'seadisee';
		
		$this->setup_actions();
		$this->action = 'main';
		if (isset($this->data[1])) {
			$action = str_replace('-', '_', $this->data[1]);
			if (in_array($action, $this->actions))
				$this->action = $action;
		}
		
		$count = count($this->data);
		for ($i = 2; $i < $count; $i++)
			$this->params[] = $this->data[$i];
	}
	
	public function setup_modules() {
		$this->modules = array(
			'user',
			'seadisee',
			'sto',
			'update', 
			'about'
		);
	}
	
	public function setup_actions() {
		$module_name = ucwords($this->module);
		
		include_once APP_ROOT . '/modules/' . $module_name . '.module.php';
		
		$this->actions = call_user_func($module_name . 'Module::actions');
	}
	
	public function get_module() {
		return $this->module;
	}
	
	public function get_action() {
		return $this->action;
	}
	
	public function get_params() {
		return $this->params;
	}
	
	public static function get_param($index, $default = '') {
		$router = Router::get_instance();
		
		if (isset($router->params[$index]))
			return $router->params[$index];
		else
			return $default;
	}
	
	public function get_request() {
		if ($this->request == '/')
			return '/';
		else
			return '/' . $this->request;
	}
	
	public static function is_ajax() {
		return Router::get_instance()->is_ajax;
	}
	
	public function call_action() {
		$class = ucwords($this->module) . 'Module';
		
		$module = new $class();
		
		call_user_func(array($module, $this->action));
	}
	
	private function __clone() {
	
	}
	
	public static function get_instance() {
		if (!self::$router_instance) {
			self::$router_instance = new Router();
		}
		
		return self::$router_instance;
	}
}

?>