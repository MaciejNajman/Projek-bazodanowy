<?php
/* Smarty version 4.1.0, created on 2022-05-30 22:01:32
  from 'D:\xampp\htdocs\sklep\app\views\OrderView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6295229c844946_14530051',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0b3ffb2c4d0dfffbffd11144a2a7763f508f0b3c' => 
    array (
      0 => 'D:\\xampp\\htdocs\\sklep\\app\\views\\OrderView.tpl',
      1 => 1653940884,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6295229c844946_14530051 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>
<!DOCTYPE HTML>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18538897756295229c83e005_00469240', 'bottom');
?>


<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'bottom'} */
class Block_18538897756295229c83e005_00469240 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'bottom' => 
  array (
    0 => 'Block_18538897756295229c83e005_00469240',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<br/>
<div class="bottom-margin">
<form class="pure-form">
    <fieldset>
        <legend><b>Podaj dane do zamówienia</b></legend>
    </fieldset>
</form>
</div>

<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
gamesList" method="post" class="pure-form pure-form-aligned"><!--Tutaj gdy akcja to order to nie działa-->
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

<?php
}
}
/* {/block 'bottom'} */
}
