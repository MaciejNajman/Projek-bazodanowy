<!DOCTYPE HTML>
{extends file="main.tpl"}

{block name=bottom}
<br/>
<div class="bottom-margin">
<form class="pure-form">
    <fieldset>
        <legend><b>Twoje zamówienie oczekuje na przyjęcie przez pracownika</b></legend>
    </fieldset>
</form>
</div>

<table class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>Nazwa</th>
		<th>Cena</th>
		<th>Gatunek</th>
		<th>Klasyfikacja wiekowa</th>
                <th>Producent</th>
	</tr>
</thead>
<tbody>
{foreach $games as $g}
{strip}
	<tr>
		<td>{$g["nazwa_gry"]}</td>
		<td>{$g["cena"]}</td>
		<td>{$g["gatunek"]}</td>
                <td>{$g["klasyfikacja_wiekowa"]}</td>
                <td>{$g["producent_gry"]}</td>
	</tr>
{/strip}
{/foreach}
</tbody>
</table>
<br/>

<table class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>Czy przyjęto zamówienie</th>
		<th>Data złożenia zamówienia</th>
	</tr>
</thead>
<tbody>
{foreach $zamowienia as $z}
{strip}
	<tr>
		<td>{$z["czy_przyjeto_zamowienie"]}</td>
		<td>{$z["data_zlozenia_zamowienia"]}</td>
	</tr>
{/strip}
{/foreach}
</tbody>
</table>
<br/>
<div class="bottom-margin">
<form class="pure-form">
    <fieldset>
        <b>Jeśli po odświeżeniu strony wartość w kolumnie "Czy przyjęto zamówienie" to 1, nasz pracownik przyjął zamówienie i jest ono przygotowywane.</b>
    </fieldset>
</form>
</div>

{/block}
