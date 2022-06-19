{extends file="main.tpl"}
{block name=top}
    
<html>
    <body>
        <form action="{$conf->action_root}registration" method="post" class="pure-form pure-form-aligned bottom-margin">
            <legend>Dodaj nowego uzytkownika</legend>
            <fieldset>
            <div class="pure-control-group">
                    <label for="id_login">Login: </label>
                    <input id="id_login" type="text" name="login" value=""/>
            </div>
            <div class="pure-control-group">
                    <label for="id_pass">Haslo: </label>
                    <input id="id_pass" type="password" name="password" value=""/><br />
            </div>
            <div class="pure-control-group">
                    <label for="id_pass2">Potwierdz haslo: </label>
                    <input id="id_pass2" type="password" name="password2" value=""/><br />
            </div>
            <div class="pure-control-group">
                    <label for="id_name">Imie: </label>
                    <input id="id_name" type="text" name="name" value=""/><br />
            </div>
            <div class="pure-control-group">
                    <label for="id_surname">Nazwisko: </label>
                    <input id="id_surname" type="text" name="surname" value=""/><br />
            </div>
            <div class="pure-control-group">
                    <label for="id_email">Email: </label>
                    <input id="id_email" type="email" name="email" value=""/><br />
            </div>
            <div class="pure-control-group">
                    <label for="id_tel">Numer telefonu: </label>
                    <input id="id_tel" type="tel" name="tel" value=""/><br />
            </div>
            <div class="pure-controls">
                    <input type="submit" value="Zarejestruj" class="pure-button pure-button-primary"/>
            </div>
            </fieldset>
        </form>	
    </body>
</html>
{/block}