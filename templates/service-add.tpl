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
							{if $error == 2}Token mora biti sastavljen od 16 znakova.{/if}
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
								<label>Naziv:</label>
								<input type="text" name="name" value="{$data.name}" class="field size4" />
							</p>
							<p>
								<label>Adresa:</label>
								<input type="text" name="address" value="{$data.address}" class="field size1" />
							</p>
							<p>
								<span class="req">16 alfanumeričkih znakova</span>
								<label>Token:</label>
								<input type="text" name="token" value="{$data.token}" size="16" class="field size1" />
							</p>
							<p>
								<label>Telefon:</label>
								<input type="text" name="phone" value="{$data.phone}" class="field size1" />
							</p>
							<p>
								<label>Meni:</label>
								<input type="text" name="menu" value="{$data.menu}" class="field size1" />
							</p>
							<p>
								<label>Opis:</label>
								<input type="text" name="description" value="{$data.description}" class="field size1" />
							</p>
							<p>
								<label>Lozinka:</label>
								<input type="text" name="password" value="{$data.password}" class="field size1" />
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

{include "footer.tpl"}