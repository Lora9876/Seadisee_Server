{include "header.tpl"}

<div id="container">
	<div class="shell">
		<div id="main">
			<div class="cl">&nbsp;</div>
			<div id="content">
				{if isset($error)}
				<div class="msg msg-error">
					<p>
						<strong>
							{if $error == 1}Niste popunili sva polja.{/if}
							{if $error == 2}Token mora biti sastavljen od 8 cifara.{/if}
							{if $error == 3}Token koji ste uneli već postoji.{/if}
						</strong>
					</p>
				</div>
				{/if}
				<div class="box">
					<div class="box-head">
						<h2>{$form_title}</h2>
					</div>
					
					<form action="{url p=$action}" method="post">
						<div class="form">
							<p>
								<label>Kafic:</label>
								<select name="idk" class="field size4">
								{foreach $products as $product}
									<option value="{$product.id}"{if $product.id == $stolovi.idk} selected="selected"{/if}>{$product.name}</option>
								{/foreach}
								</select>
							</p>
							<p>
								<label>Opis:</label>
								<input type="text" name="description" value="{$stolovi.description}" class="field size4" />
							</p>
							<p>
								<label>Token: <span>8 cifara</span></label>
								<input type="text" name="token" value="{$stolovi.token}" size="8" class="field size4" />
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

{include "footer.tpl"}