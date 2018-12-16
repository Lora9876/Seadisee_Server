<?php /* Smarty version Smarty-3.0.8, created on 2016-07-02 16:30:40
         compiled from "./templates/change-password.tpl" */ ?>
<?php /*%%SmartyHeaderCode:102805777d01006d2a1-93001990%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '89ac6611cfbaec274a439977cd4886333ccfdcff' => 
    array (
      0 => './templates/change-password.tpl',
      1 => 1339942900,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '102805777d01006d2a1-93001990',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_url')) include 'C:\xampp\htdocs\classes\smarty\plugins\function.url.php';
?><?php $_template = new Smarty_Internal_Template("header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
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
							<?php if ($_smarty_tpl->getVariable('error')->value==2){?>Stara lozinka koju ste uneli nije ispravna.<?php }?>
							<?php if ($_smarty_tpl->getVariable('error')->value==3){?>Nove lozinke se ne poklapaju.<?php }?>
						</strong>
					</p>
				</div>
				<?php }?>
				<?php if (isset($_smarty_tpl->getVariable('success',null,true,false)->value)){?>
				<div class="msg msg-ok">
					<p><strong>Lozinka je uspešno promenjena.</strong></p>
				</div>
				<?php }?>
				
				<div class="box">
					<div class="box-head">
						<h2>Promena lozinke</h2>
					</div>
					
					<form action="<?php echo smarty_function_url(array('p'=>'/user/password2'),$_smarty_tpl);?>
" method="post">
						<div class="form">
							<p>
								<label>Stara lozinka:</label>
								<input type="password" name="old_password" class="field size4" />
							</p>
							<br />
							<p>
								<label>Nova lozinka:</label>
								<input type="password" name="new_password1" class="field size4" />
							</p>
							<p>
								<label>Ponovite novu lozinku:</label>
								<input type="password" name="new_password2" class="field size4" />
							</p>
						</div>
						<div class="buttons">
							<input type="submit" class="button" value="Promeni lozinku" />
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