<?php

function smarty_function_url($params, $template)
{
	global $conf;
	
	return $conf['site_url'] . $params['p'];
} 

?>