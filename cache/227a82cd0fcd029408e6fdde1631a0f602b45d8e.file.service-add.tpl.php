<?php /* Smarty version Smarty-3.0.8, created on 2016-07-02 15:01:50
         compiled from "./templates/service-add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:302185777bb3e798a91-19098021%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '227a82cd0fcd029408e6fdde1631a0f602b45d8e' => 
    array (
      0 => './templates/service-add.tpl',
      1 => 1467464507,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '302185777bb3e798a91-19098021',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_url')) include 'C:\xampp\htdocs\classes\smarty\plugins\function.url.php';
?>﻿<?php $_template = new Smarty_Internal_Template("header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>

<div id="container">
	<div class="shell">
		<div id="main">
			<div class="cl">&nbsp;</div>
			<div id="content">
				<?php if (isset($_smarty_tpl->getVariable('error',null,true,false)->value)){?>
				<div class="msg msg-error">
					<p>
						<strong>
							<?php if ($_smarty_tpl->getVariable('error')->value==1){?>Niste popunili sva polja.<?php }?>
							<?php if ($_smarty_tpl->getVariable('error')->value==2){?>Token mora biti sastavljen od 16 znakova.<?php }?>
							<?php if ($_smarty_tpl->getVariable('error')->value==3){?>Token koji ste uneli već postoji.<?php }?>
						</strong>
					</p>
				</div>
				<?php }?>
				<div class="box">
					<div class="box-head">
						<h2><?php echo $_smarty_tpl->getVariable('form_title')->value;?>
</h2>
					</div>
					
					<form action="<?php echo smarty_function_url(array('p'=>$_smarty_tpl->getVariable('action')->value),$_smarty_tpl);?>
" method="post">
						<div class="form">
							<p>
								<label>Naziv:</label>
								<input type="text" name="name" value="<?php echo $_smarty_tpl->getVariable('data')->value['name'];?>
" class="field size4" />
							</p>
							<p>
								<label>Adresa:</label>
								<input type="text" name="address" value="<?php echo $_smarty_tpl->getVariable('data')->value['address'];?>
" class="field size1" />
							</p>
							<p>
								<span class="req">16 alfanumeričkih znakova</span>
								<label>Token:</label>
								<input type="text" name="token" value="<?php echo $_smarty_tpl->getVariable('data')->value['token'];?>
" size="16" class="field size1" />
							</p>
							<p>
								<label>Telefon:</label>
								<input type="text" name="phone" value="<?php echo $_smarty_tpl->getVariable('data')->value['phone'];?>
" class="field size1" />
							</p>
							<p>
								<label>Meni:</label>
								<input type="text" name="menu" value="<?php echo $_smarty_tpl->getVariable('data')->value['menu'];?>
" class="field size1" />
							</p>
							<p>
								<label>Opis:</label>
								<input type="text" name="description" value="<?php echo $_smarty_tpl->getVariable('data')->value['description'];?>
" class="field size1" />
							</p>
							<p>
								<label>Lozinka:</label>
								<input type="text" name="password" value="<?php echo $_smarty_tpl->getVariable('data')->value['password'];?>
" class="field size1" />
							</p>
							
							</div>
							<br /><br />
							
						
						
						<div class="buttons">
							<input type="submit" class="button" value="Snimi" />
							<input type="button" class="button" name="cancel" value="Otkaži" />
						</div>
					</form>
				</div>
			</div>
			
			<div id="sidebar">

				<div class="box">
					<div class="box-head">
						<h2>Opcije</h2>
					</div>
					<div class="box-content">
						<a href="#" class="add-button" onclick="new_token_s(); return false;"><span>Generiši novi token</span></a>
						<div class="cl">&nbsp;</div>
						<br />
						<input type="text" name="gen-new-token" class="field" onclick="$(this).select()" />
						<div class="cl">&nbsp;</div>
						<p>Token je kombinacija 16 alfanumeričkih znakova koji na jedinstven način identifikuju kafić.</p>
						<p>Vrednost koju unesete ovde morate uneti i u podešavanjima desktop aplikacije.</p>
						<div class="cl">&nbsp;</div>
					</div>
				</div>
			</div>
			
			<div class="cl">&nbsp;</div>			
		</div>
	</div>
</div>

<?php $_template = new Smarty_Internal_Template("footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>