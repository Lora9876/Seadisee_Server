{include "header.tpl"}

<div id="container">
	<div class="shell">
		
		{if isset($success)}
		<div class="msg msg-ok">
			<p><strong>
				{if $success == 1}Novi kafić je uspešno dodat.{/if}
				{if $success == 2}Kafić je uspešno izmenjen.{/if}
				{if $success == 3}Kafić je uspešno obrisan.{/if}
			</strong></p>
		</div>
		{/if}
		
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
					{if count($companies) > 0}
					{foreach $companies as $company}
							<tr class="{cycle values=',odd'}">
								<td><h3><a href="{url p="/sto/show/{$company.id}"}" title="Prikaži stolove">{$company.name}</a></h3></td>
								<td>{$company.address}</td>
								<td style="text-align: center;">{$company.num_s}</a></td>
								<td>
									<a href="{url p="/seadisee/delete/{$company.id}"}" class="ico del" onclick="return confirm('Da li ste sigurni da želite da obrišete ovaj kafić?');">Obriši</a><a href="{url p="/seadisee/edit/{$company.id}"}" class="ico edit">Izmeni</a>
								</td>
							</tr>
					{/foreach}
					{else}
							<tr>
								<td colspan="4">
									Trenutno nema unetih kafića.
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
						<a href="{url p='/seadisee/add'}" class="add-button"><span>Novi kafić</span></a>
						<div class="cl">&nbsp;</div>
						{if count($companies) > 0}
						<br />
						<a href="{url p='/sto/add'}" class="add-button"><span>Novi sto</span></a>
						<div class="cl">&nbsp;</div>
						{/if}
					</div>
				</div>
			</div>
			
			<div class="cl">&nbsp;</div>			
		</div>
	</div>
</div>

{include "footer.tpl"}