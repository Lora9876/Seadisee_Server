<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'settings.php';

require_once APP_ROOT . '/functions.php';
require_once APP_ROOT . '/classes/Conf.class.php';
require_once APP_ROOT . '/classes/Router.class.php';
require_once APP_ROOT . '/classes/Template.class.php';
require_once APP_ROOT . '/classes/DB.class.php';
require_once APP_ROOT . '/classes/User.class.php';

Template::assign('site_url', Conf::get('site_url'));

$router = Router::get_instance();


if (!User::logged_in() && $router->get_module() != 'update') {
	if ($router->get_module() != 'user') {
		if (!$router->is_ajax()) {
			$_SESSION['previous_url'] = $router->get_request();
			redirect('/user/login');
		} else {
			output_json(array('status' => 'not_logged_in'));
		}
	}
} else {
	Template::assign('username', User::get_data('username'));
}

$router->call_action();

?>