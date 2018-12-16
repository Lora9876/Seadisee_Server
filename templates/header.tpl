<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Seadisee - {$page_title}</title>
	<link rel="stylesheet" href="{$site_url}/templates/css/style.css" type="text/css" media="all" />
	<script src="{$site_url}/javascript/jquery-1.7.2.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		var site_url = "{$site_url}";
	</script>
	<script src="{$site_url}/javascript/common.js" type="text/javascript"></script>
</head>
<body>
<div id="header">
	<div class="shell">
		<div id="top">
			<h1>Seadisee</h1>
			<div id="top-navigation">
				Dobrodošli, <strong>{$username}</strong>
				<span>|</span>
				<a href="{url p='/user/password'}">Promeni lozinku</a>
				<span>|</span>
				<a href="{url p='/user/logout'}">Odjavi se</a>
			</div>
		</div>
		
		<div id="navigation">
			<ul>
			    <li><a href="{url p='/seadisee'}"{if ($selected == "seadisee")}class="active"{/if}><span>Kafići</span></a></li>
			  
			    <li><a href="{url p='/about'}"{if ($selected == "about")}class="active"{/if}><span>O aplikaciji</span></a></li>
			</ul>
		</div>
	</div>
</div>