<?php /* Smarty version Smarty-3.0.8, created on 2016-07-02 20:46:05
         compiled from "./templates/dodaj-sto.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2301957780beda131f5-22285871%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7235289507184cfff09d98d6a0e740f4c7b0106b' => 
    array (
      0 => './templates/dodaj-sto.tpl',
      1 => 1467485163,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2301957780beda131f5-22285871',
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
							<?php if ($_smarty_tpl->getVariable('error')->value==2){?>Token mora biti sastavljen od 8 cifara.<?php }?>
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
								<label>Kafic:</label>
								<select name="idk" class="field size4">
								<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('products')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
"<?php if ($_smarty_tpl->tpl_vars['product']->value['id']==$_smarty_tpl->getVariable('stolovi')->value['idk']){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</option>
								<?php }} ?>
								</select>
							</p>
							<p>
								<label>Opis:</label>
								<input type="text" name="description" value="<?php echo $_smarty_tpl->getVariable('stolovi')->value['description'];?>
" class="field size4" />
							</p>
							<p>
								<label>Token: <span>8 cifara</span></label>
								<input type="text" name="token" value="<?php echo $_smarty_tpl->getVariable('stolovi')->value['token'];?>
" size="8" class="field size4" />
							</p>
						</div>
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
						<a href="#" class="add-button" onclick="new_token_v(); return false;"><span>Generiši novi token</span></a>
						<div class="cl">&nbsp;</div>
						<br />
						<input type="text" name="gen-new-token" class="field size3" onclick="$(this).select()" />
						<div class="cl">&nbsp;</div>
						<p>Token je kombinacija 8 cifara koja na jedinstven način identifikuje sto.</p>
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