<?php
use core\Utils;
use core\RoleUtils;
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
	<meta charset="utf-8"/>
	<title>Sklep z grami</title>
	<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css"
		integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
	<link rel="stylesheet" href="{$conf->app_url}/css/style.css">
        <script type="text/javascript" src="{$conf->app_url}/js/functions.js"></script>    
</head>

<body style="margin: 20px;">

<div class="pure-menu pure-menu-horizontal bottom-margin">
	<a href="{$conf->action_root}gamesList" class="pure-menu-heading pure-menu-link">Lista gier</a>
        <a href="{$conf->action_root}registrationShow" class="pure-menu-heading pure-menu-link">Rejestracja</a>
        <?php if(RoleUtils::inRole('admin')) : ?>
            <a href="{$conf->action_root}roleAdd" class="pure-menu-heading pure-menu-link">Panel administratora</a>
        <?php endif; ?>
        <?php if(RoleUtils::inRole('employee')) : ?>
            <a href="{$conf->action_root}przyjacZamowienie" class="pure-menu-heading pure-menu-link">Panel pracownika</a>
        <?php endif; ?>
{if count($conf->roles)>0}
	<a href="{$conf->action_root}logout" class="pure-menu-heading pure-menu-link">Wyloguj</a>
{else}	
	<a href="{$conf->action_root}loginShow" class="pure-menu-heading pure-menu-link">Zaloguj</a>
{/if}
</div>

{block name=top} {/block}

{block name=messages}

{if $msgs->isMessage()}
<div class="messages bottom-margin">
	<ul>
	{foreach $msgs->getMessages() as $msg}
	{strip}
		<li class="msg {if $msg->isError()}error{/if} {if $msg->isWarning()}warning{/if} {if $msg->isInfo()}info{/if}">{$msg->text}</li>
	{/strip}
	{/foreach}
	</ul>
</div>
{/if}

{/block}

{block name=bottom} {/block}

</body>

</html>