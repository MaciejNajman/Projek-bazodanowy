<!DOCTYPE HTML>
{extends file="main.tpl"}

{block name=top}
    <!--<p style="background-color:#00ffff;font-size:25px;font-family:verdana;text-align:center;">Czy na pewno chcesz kupić tą grę ?</p>-->
{/block}
    
{block name=bottom}
    
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

<div class="bottom-margin">
<form class="pure-form">
    <fieldset>
        <legend><b>Czy na pewno chcesz kupić tą grę ?</b></legend>
        <a class="pure-button" href="{$conf->action_root}orderShow">Tak</a>
        <a class="pure-button" href="{$conf->action_root}gamesList">Nie</a>
    </fieldset>
</form>
</div>
{/block}