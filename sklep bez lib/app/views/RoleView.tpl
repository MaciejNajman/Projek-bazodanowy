<!DOCTYPE HTML>
{extends file="main.tpl"}

{block name=top}

<form action="{$conf->action_root}roleAdd" method="post" class="pure-form pure-form-aligned bottom-margin">
    <legend><b>Dodawanie roli użytkownikom sklepu</b></legend>
	<fieldset>
        <div class="pure-control-group">
			<label for="id_uzytkownik">Id użytkownika: </label>
			<input id="id_uzytkownik" type="text" name="id_uzyt"/>
		</div>
        <div class="pure-control-group">
			<label for="id_rola">Id roli: </label>
			<input id="id_rola" type="text" name="id_roli" /><br/>
		</div>
		<div class="pure-controls">
			<input type="submit" value="Dodaj" class="pure-button pure-button-primary"/>
		</div>
	</fieldset>
</form>	
{/block}
    
{block name=bottom}
    
<table class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>idUzytkownik</th>
		<th>Imie</th>
                <th>Nazwisko</th>
                <th>Email</th>
                <th>Numer telefonu</th>
	</tr>
</thead>
<tbody>
{foreach $users as $u}
{strip}
	<tr>
		<td>{$u["idUzytkownik"]}</td>
                <td>{$u["imie"]}</td>
                <td>{$u["nazwisko"]}</td>
                <td>{$u["email"]}</td>
                <td>{$u["nr_tel"]}</td>
	</tr>
{/strip}
{/foreach}
</tbody>
</table>
<br/>

<table class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>idRola</th>
		<th>Nazwa roli</th>
		<th>Czy aktywna w systemie</th>
		<th>Od kiedy istnieje</th>
	</tr>
</thead>
<tbody>
{foreach $rola as $r}
{strip}
	<tr>
		<td>{$r["idRola"]}</td>
		<td>{$r["nazwa_roli"]}</td>
		<td>{$r["czy_aktywna_w_systemie"]}</td>
                <td>{$r["od_kiedy_istnieje"]}</td>
	</tr>
{/strip}
{/foreach}
</tbody>
</table>
<br/>

<table class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>idUzytkownik</th>
		<th>idRola</th>
	</tr>
</thead>
<tbody>
{foreach $usersRola as $ur}
{strip}
	<tr>
		<td>{$ur["idUzytkownik"]}</td>
		<td>{$ur["idRola"]}</td>
	</tr>
{/strip}
{/foreach}
</tbody>
</table>
<br/>

{/block}
