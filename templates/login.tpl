<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Seadisee - prijavljivanje</title>
	<link rel="stylesheet" href="{$site_url}/templates/css/style.css" type="text/css" media="all" />
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
						{if isset($error)}
							{if $error == 1}Niste uneli korisničko ime i lozinku.{/if}
							{if $error == 2}Korisničko ime i lozinka koje ste uneli su neispravni.{/if}
						{else}
							Morate da se prijavite na sistem da biste nastavili.
						{/if}
						</strong>
					</p>
				</div>
				
				<div class="box">
					<div class="box-head">
						<h2>Prijavljivanje na sistem</h2>
					</div>
					
					<form action="{url p='/user/login2'}" method="post">
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

{include "footer.tpl"}