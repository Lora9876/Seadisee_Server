<?php

class AboutModule {
	public function __construct() {
		Template::assign('selected', 'about');
		Template::assign('page_title', 'O aplikaciji');
	}
	
	public function main() {
		Template::display('about.tpl');
	}
	
	public static function actions() {
		return array(
			'main'
		);
	}
}

?>