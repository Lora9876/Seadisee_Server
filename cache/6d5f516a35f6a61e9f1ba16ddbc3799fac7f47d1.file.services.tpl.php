<?php /* Smarty version Smarty-3.0.8, created on 2016-07-03 02:53:16
         compiled from "./templates/services.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15231577861fc998a52-20194050%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d5f516a35f6a61e9f1ba16ddbc3799fac7f47d1' => 
    array (
      0 => './templates/services.tpl',
      1 => 1467507194,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15231577861fc998a52-20194050',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_cycle')) include 'C:\xampp\htdocs\classes\smarty\plugins\function.cycle.php';
if (!is_callable('smarty_function_url')) include 'C:\xampp\htdocs\classes\smarty\plugins\function.url.php';
?>﻿<?php $_template = new Smarty_Internal_Template("header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>

<div id="container">
	<div class="shell">
		
		<?php if (isset($_smarty_tpl->getVariable('success',null,true,false)->value)){?>
		<div class="msg msg-ok">
			<p><strong>
				<?php if ($_smarty_tpl->getVariable('success')->value==1){?>Novi kafić je uspešno dodat.<?php }?>
				<?php if ($_smarty_tpl->getVariable('success')->value==2){?>Kafić je uspešno izmenjen.<?php }?>
				<?php if ($_smarty_tpl->getVariable('success')->value==3){?>Kafić je uspešno obrisan.<?php }?>
			</strong></p>
		</div>
		<?php }?>
		
		<div id="main">
			<div class="cl">&nbsp;</div>
			
			<div id="content">
				<div class="box">
					<div class="box-head">
						<h2 class="left">Lista kafića</h2>
					</div>
					
					<div class="table">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<th>Naziv</th>
								<th>Adresa</th>
								 <th>Broj stolova</th>
								
								<th width="110" class="ac">Opcije</th>
							</tr>
					<?php if (count($_smarty_tpl->getVariable('companies')->value)>0){?>
					<?php  $_smarty_tpl->tpl_vars['company'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('companies')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['company']->key => $_smarty_tpl->tpl_vars['company']->value){
?>
							<tr class="<?php echo smarty_function_cycle(array('values'=>',odd'),$_smarty_tpl);?>
">
								<td><h3><a href="<?php echo smarty_function_url(array('p'=>"/sto/show/".($_smarty_tpl->tpl_vars['company']->value['id'])),$_smarty_tpl);?>
" title="Prikaži stolove"><?php echo $_smarty_tpl->tpl_vars['company']->value['name'];?>
</a></h3></td>
								<td><?php echo $_smarty_tpl->tpl_vars['company']->value['address'];?>
</td>
								<td style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['company']->value['num_s'];?>
</a></td>
								<td>
									<a href="<?php echo smarty_function_url(array('p'=>"/seadisee/delete/".($_smarty_tpl->tpl_vars['company']->value['id'])),$_smarty_tpl);?>
" class="ico del" onclick="return confirm('Da li ste sigurni da želite da obrišete ovaj kafić?');">Obriši</a><a href="<?php echo smarty_function_url(array('p'=>"/seadisee/edit/".($_smarty_tpl->tpl_vars['company']->value['id'])),$_smarty_tpl);?>
" class="ico edit">Izmeni</a>
								</td>
							</tr>
					<?php }} ?>
					<?php }else{ ?>
							<tr>
								<td colspan="4">
									Trenutno nema unetih kafića.
								</td>
							</tr>
					<?php }?>
						</table>
					</div>
					
				</div>
			</div>
			
			<div id="sidebar">
				<div class="box">
					
					<div class="box-head">
						<h2>Opcije</h2>
					</div>
					
					<div class="box-content">
						<a href="<?php echo smarty_function_url(array('p'=>'/seadisee/add'),$_smarty_tpl);?>
" class="add-button"><span>Novi kafić</span></a>
						<div class="cl">&nbsp;</div>
						<?php if (count($_smarty_tpl->getVariable('companies')->value)>0){?>
						<br />
						<a href="<?php echo smarty_function_url(array('p'=>'/sto/add'),$_smarty_tpl);?>
" class="add-button"><span>Novi sto</span></a>
						<div class="cl">&nbsp;</div>
						<?php }?>
					</div>
				</div>
			</div>
			
			<div class="cl">&nbsp;</div>			
		</div>
	</div>
</div>

<?php $_template = new Smarty_Internal_Template("footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>