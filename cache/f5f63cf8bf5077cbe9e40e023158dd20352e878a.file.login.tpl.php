<?php /* Smarty version Smarty-3.0.8, created on 2016-07-02 16:30:44
         compiled from "./templates/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:310415777d0144a5ff4-49766379%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5f63cf8bf5077cbe9e40e023158dd20352e878a' => 
    array (
      0 => './templates/login.tpl',
      1 => 1459608904,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '310415777d0144a5ff4-49766379',
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
	<title>Seadisee - prijavljivanje</title>
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->getVariable('site_url')->value;?>
/templates/css/style.css" type="text/css" media="all" />
</head>
<body>
<div id="header">
	<div class="shell">
		<div id="top">
			<h1>Seadisee</h1>
			<div id="top-navigation">
				Molimo, prijavite se na sistem.
			</div>
		</div>
		<div id="navigation">
			<ul>
				<li><a href="#" class="active"><span>Prijavljivanje</span></a></li>
			</ul>
		</div>
	</div>
</div>

<div id="container">
	<div class="shell">
		<div id="main">
			<div class="cl">&nbsp;</div>
			
			<div id="content">
				<div class="msg msg-error">
					<p>
						<strong>
						<?php if (isset($_smarty_tpl->getVariable('error',null,true,false)->value)){?>
							<?php if ($_smarty_tpl->getVariable('error')->value==1){?>Niste uneli korisničko ime i lozinku.<?php }?>
							<?php if ($_smarty_tpl->getVariable('error')->value==2){?>Korisničko ime i lozinka koje ste uneli su neispravni.<?php }?>
						<?php }else{ ?>
							Morate da se prijavite na sistem da biste nastavili.
						<?php }?>
						</strong>
					</p>
				</div>
				
				<div class="box">
					<div class="box-head">
						<h2>Prijavljivanje na sistem</h2>
					</div>
					
					<form action="<?php echo smarty_function_url(array('p'=>'/user/login2'),$_smarty_tpl);?>
" method="post">
						<div class="form">
							<p>
								<label>Korisničko ime:</label>
								<input type="text" name="username" class="field size4" />
							</p>
							<p>
								<label>Lozinka:</label>
								<input type="password" name="password" class="field size4" />
							</p>
						</div>
						<div class="buttons">
							<input type="submit" class="button" value="Prijavi se" />
						</div>
					</form>
				</div>
			</div>
			
			<div class="cl">&nbsp;</div>			
		</div>
	</div>
</div>

<?php $_template = new Smarty_Internal_Template("footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>