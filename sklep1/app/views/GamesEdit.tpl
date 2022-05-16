{extends file="main.tpl"}

{block name=top}

<div class="bottom-margin">
<form action="{$conf->action_root}gamesSave" method="post" class="pure-form pure-form-aligned">
	<fieldset>
		<legend>Dane gry</legend>
		<div class="pure-control-group">
            <label for="nazwa">Nazwa</label>
            <input id="nazwa_gry" type="text" placeholder="Destiny 2" name="nazwa_gry" value="{$form->nazwa_gry}">
        </div>
		<div class="pure-control-group">
            <label for="cena">Cena</label>
            <input id="cena" type="text" placeholder="99,99" name="cena" value="{$form->cena}">
        </div>
		<div class="pure-control-group">
            <label for="gatunek">Gatunek</label>
            <input id="gatunek" type="text" placeholder="fps" name="gatunek" value="{$form->gatunek}">
        </div>
                <div class="pure-control-group">
            <label for="klasyfikacja_wiekowa">Klasyfikacja wiekowa</label>
            <input id="klasyfikacja_wiekowa" type="text" placeholder="16" name="klasyfikacja_wiekowa" value="{$form->klasyfikacja_wiekowa}">
        </div>
                <div class="pure-control-group">
            <label for="producent_gry">Producent</label>
            <input id="producent_gry" type="text" placeholder="Bungie" name="producent_gry" value="{$form->producent_gry}">
        </div>
		<div class="pure-controls">
			<input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
			<a class="pure-button button-secondary" href="{$conf->action_root}gamesList">Powrót</a>
		</div>
	</fieldset>
    <input type="hidden" name="id" value="{$form->id}">
</form>	
</div>

{/block}
