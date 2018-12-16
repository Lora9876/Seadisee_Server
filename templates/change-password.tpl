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
							{if $error == 2}Stara lozinka koju ste uneli nije ispravna.{/if}
							{if $error == 3}Nove lozinke se ne poklapaju.{/if}
						</strong>
					</p>
				</div>
				{/if}
				{if isset($success)}
				<div class="msg msg-ok">
					<p><strong>Lozinka je uspešno promenjena.</strong></p>
				</div>
				{/if}
				
				<div class="box">
					<div class="box-head">
						<h2>Promena lozinke</h2>
					</div>
					
					<form action="{url p='/user/password2'}" method="post">
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

{include "footer.tpl"}