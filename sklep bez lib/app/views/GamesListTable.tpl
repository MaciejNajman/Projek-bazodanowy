<table class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>Nazwa</th>
		<th>Cena</th>
		<th>Gatunek</th>
		<th>Klasyfikacja wiekowa</th>
                <th>Producent</th>
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
			<a class="button-small pure-button button-secondary" href="{$conf->action_url}gamesEdit/{$g['idGra']}">Edytuj</a>
			&nbsp;
			<a class="button-small pure-button button-warning"
			  onclick="confirmLink('{$conf->action_url}gamesDelete/{$g['idGra']}','Czy na pewno usunąć rekord ?')">Usuń</a>
                        &nbsp;
                        <a class="button-small pure-button button-error" href="{$conf->action_url}gamesBuy/{$g['idGra']}">KUP</a>
		</td>
	</tr>
{/strip}
{/foreach}
</tbody>
</table>