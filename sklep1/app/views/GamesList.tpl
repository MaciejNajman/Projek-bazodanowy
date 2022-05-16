{extends file="main.tpl"}

{block name=top}

<div class="bottom-margin">
<form class="pure-form pure-form-stacked" action="{$conf->action_url}gameList">
	<legend>Opcje wyszukiwania</legend>
	<fieldset>
		<input type="text" placeholder="Nazwa gry" name="sf_game" value="{$searchForm->game}" /><br />
		<button type="submit" class="pure-button pure-button-primary">Filtruj</button>
	</fieldset>
</form>
</div>	

{/block}

{block name=bottom}

<div class="bottom-margin">
<a class="pure-button button-success" href="{$conf->action_root}gamesNew">+ Nowa gra</a>
</div>	

<table id="tab_games" class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>Nazwa gry</th>
		<th>Cena</th>
		<th>Gatunek</th>
		<th>Klasyfikacja wiekowa</th>
                <th>Producent gry</th>
                <th>Opcje</th>
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
		<td>
			<a class="button-small pure-button button-secondary" href="{$conf->action_url}gamesEdit&id={$g['idGra']}">Edytuj</a>
			&nbsp;
			<a class="button-small pure-button button-warning" href="{$conf->action_url}gamesDelete&id={$g['idGra']}">Usun</a>
		</td>
	</tr>
{/strip}
{/foreach}
</tbody>
</table>

{/block}
