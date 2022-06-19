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

<form method="post" class="pure-form pure-form-aligned">
    <fieldset>
        <div class="pure-control-group">
            <label for="aligned-name">Imie</label>
            <input type="text" id="aligned-name" placeholder="Imie" name="imie" value="{$form->imie}"/>
        </div>
        <div class="pure-control-group">
            <label for="aligned-surname">Nazwisko</label>
            <input type="text" id="aligned-surname" placeholder="Nazwisko" name="nazwisko" value="{$form->nazwisko}"/>
        </div>
        <div class="pure-control-group">
            <label for="aligned-email">Email</label>
            <input type="email" id="aligned-email" placeholder="Email" name="email" value="{$form->email}"/>
        </div>
        <div class="pure-control-group">
            <label for="aligned-nr-tel">Numer telefonu</label>
            <input type="tel" id="aligned-nr-tel" placeholder="Numer telefonu" name="nr_tel" value="{$form->nr_tel}"/>
        </div>
        <div class="pure-controls-group">
            <label for="aligned-quantity">Ilość sztuk (pomiędzy 1 i 50)</label>
            <input type="number" id="aligned-quantity" placeholder="Ilość" name="ilosc_sztuk" min="1" max="50"/>
        </div>
        <div class="pure-controls">
            <input type="submit" class="pure-button pure-button-primary" onclick="alert('Dziekujemy za zlozenie zamowienia');" value="Potwierdz"/>
        </div>
    </fieldset>
</form>

{/block}