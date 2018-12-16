<?php /* Smarty version Smarty-3.0.8, created on 2016-07-02 15:28:26
         compiled from "./templates/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:41315777c17ae604a5-43683309%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '97c13ae6868bbc459509c9f1b968154acd23eecc' => 
    array (
      0 => './templates/header.tpl',
      1 => 1467466104,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '41315777c17ae604a5-43683309',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_url')) include 'C:\xampp\htdocs\classes\smarty\plugins\function.url.php';
?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Seadisee - <?php echo $_smarty_tpl->getVariable('page_title')->value;?>
</title>
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->getVariable('site_url')->value;?>
/templates/css/style.css" type="text/css" media="all" />
	<script src="<?php echo $_smarty_tpl->getVariable('site_url')->value;?>
/javascript/jquery-1.7.2.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		var site_url = "<?php echo $_smarty_tpl->getVariable('site_url')->value;?>
";
	</script>
	<script src="<?php echo $_smarty_tpl->getVariable('site_url')->value;?>
/javascript/common.js" type="text/javascript"></script>
</head>
<body>
<div id="header">
	<div class="shell">
		<div id="top">
			<h1>Seadisee</h1>
			<div id="top-navigation">
				Dobrodošli, <strong><?php echo $_smarty_tpl->getVariable('username')->value;?>
</strong>
				<span>|</span>
				<a href="<?php echo smarty_function_url(array('p'=>'/user/password'),$_smarty_tpl);?>
">Promeni lozinku</a>
				<span>|</span>
				<a href="<?php echo smarty_function_url(array('p'=>'/user/logout'),$_smarty_tpl);?>
">Odjavi se</a>
			</div>
		</div>
		
		<div id="navigation">
			<ul>
			    <li><a href="<?php echo smarty_function_url(array('p'=>'/seadisee'),$_smarty_tpl);?>
"<?php if (($_smarty_tpl->getVariable('selected')->value=="seadisee")){?>class="active"<?php }?>><span>Kafići</span></a></li>
			  
			    <li><a href="<?php echo smarty_function_url(array('p'=>'/about'),$_smarty_tpl);?>
"<?php if (($_smarty_tpl->getVariable('selected')->value=="about")){?>class="active"<?php }?>><span>O aplikaciji</span></a></li>
			</ul>
		</div>
	</div>
</div>