{include "header.tpl"}

<div id="container">
	<div class="shell">
		
		{if isset($success)}
		<div class="msg msg-ok">
			<p><strong>
				{if $success == 1}Novi sto je uspešno dodat.{/if}
				{if $success == 2}Sto je uspešno izmenjen.{/if}
				{if $success == 3}Sto je uspešno obrisan.{/if}
			</strong></p>
		</div>
		{/if}
		
		<div id="main">
			<div class="cl">&nbsp;</div>
			
			<div id="content">
				<div class="box">
					<div class="box-head">
						<h2 class="left">Stolovi kafića</h2>
					</div>
					
					<div class="table">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<th>Opis</th>
								<th>Token</th>
								<th width="110" class="ac">Opcije</th>
							</tr>
					{if count($stolovi) > 0}
					{foreach $stolovi as $stolovi1}
							<tr class="{cycle values=',odd'}">
								<td><h3>{$stolovi1.description}</h3></td>
								<td>{$stolovi1.token}</td>
								<td>
									<a href="{url p="/sto/delete/{$stolovi1_id}"}" class="ico del" onclick="return confirm('Da li ste sigurni da želite da obrišete ovaj sto?');">Obriši</a><a href="{url p="/sto/edit/{$stolovi1_id}"}" class="ico edit">Izmeni</a>
								</td>
							</tr>
					{/foreach}
					{else}
							<tr>
								<td colspan="4">
									Trenutno nema unetih stolova za ovaj kafić.
								</td>
							</tr>
					{/if}
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
						<a href="{url p="/sto/add/"}" class="add-button"><span>Novi sto</span></a>
						<div class="cl">&nbsp;</div>
					</div>
				</div>
			</div>
			
			<div class="cl">&nbsp;</div>			
		</div>
	</div>
</div>

{include "footer.tpl"}