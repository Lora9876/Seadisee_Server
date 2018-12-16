<?php
require_once APP_ROOT . '/classes/smarty/Smarty.class.php';

class Template {
	private static $tpl_instance;
	private $smarty;
	
	private function __construct() {
		$this->smarty = new Smarty();
		
		$this->smarty->template_dir = './templates/';
		$this->smarty->compile_dir  = './cache/';
		
		$this->smarty->assign('js_files', '');
	}
	
	public static function assign($name, $value) {
		Template::get_instance()->smarty->assign($name, $value);
	}
	
	public static function display($name) {
		Template::get_instance()->smarty->display($name);
	}
	
	public static function add_js($file) {
		$html = '<script type="text/javascript" src="' . Conf::get('site_url') . '/javascript/' . $file . '"></script>';
		
		Template::get_instance()->smarty->tpl_vars['js_files']->value .= "\n" . $html;
	}
	
	public static function get_instance() {
		if (!self::$tpl_instance) {
			self::$tpl_instance = new Template();
		}
		
		return self::$tpl_instance;
	}
}

?>