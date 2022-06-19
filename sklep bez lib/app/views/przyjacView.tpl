<!DOCTYPE HTML>
{extends file="main.tpl"}

{block name=bottom}
<br/>
<div class="bottom-margin">
<form class="pure-form">
    <fieldset>
        <legend><b>Potwierdź przyjęcie zamówienia</b></legend>
    </fieldset>
</form>
</div>

<table class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>idZamowienia</th>
		<th>Data złożenia zamówienia</th>
		<th>Czy przyjęto zamówienie</th>
                <th>Przyjmij zamówienie</th>
	</tr>
</thead>
<tbody>
{foreach $zamowienia as $za}
{strip}
	<tr>
		<td>{$za["idZamowienie"]}</td>
		<td>{$za["data_zlozenia_zamowienia"]}</td>
		<td>{$za["czy_przyjeto_zamowienie"]}</td>
                <td>
                    <a class="button-small pure-button" href="{$conf->action_url}przyjacZamowienie/{$za['idZamowienie']}">Przyjmij</a>
                </td>
	</tr>
{/strip}
{/foreach}
</tbody>
</table>
<br/>

{/block}
