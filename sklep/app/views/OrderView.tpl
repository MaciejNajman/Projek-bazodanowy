<!DOCTYPE HTML>
{extends file="main.tpl"}

{block name=bottom}
<br/>
<div class="bottom-margin">
<form class="pure-form">
    <fieldset>
        <legend><b>Podaj dane do zamówienia</b></legend>
    </fieldset>
</form>
</div>

<form action="{$conf->action_root}gamesList" method="post" class="pure-form pure-form-aligned"><!--Tutaj gdy akcja to order to nie działa-->
    <fieldset>
        <div class="pure-control-group">
            <label for="aligned-name">Imie</label>
            <input type="text" id="aligned-name" placeholder="Imie" name="imie"/>
        </div>
        <div class="pure-control-group">
            <label for="aligned-surname">Nazwisko</label>
            <input type="text" id="aligned-surname" placeholder="Nazwisko" name="nazwisko"/>
        </div>
        <div class="pure-control-group">
            <label for="aligned-email">Email</label>
            <input type="email" id="aligned-email" placeholder="Email" name="email"/>
        </div>
        <div class="pure-control-group">
            <label for="aligned-nr-tel">Numer telefonu</label>
            <input type="tel" id="aligned-nr-tel" placeholder="Numer telefonu" name="nr_tel"/>
        </div>
        <div class="pure-controls-group">
            <label for="aligned-quantity">Ilość sztuk (pomiędzy 1 i 20)</label>
            <input type="number" id="aligned-quantity" placeholder="Ilość" name="ilosc_sztuk" min="1" max="20"/>
        </div>
        <div class="pure-controls">
            <input type="submit" class="pure-button pure-button-primary" onclick="alert('Dziekujemy za zlozenie zamowienia');" value="Potwierdz"/>
            <input type="reset"class="pure-button pure-button-primary">
        </div>
    </fieldset>
</form>

{/block}

