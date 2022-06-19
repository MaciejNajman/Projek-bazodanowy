<?php
/* Smarty version 4.1.0, created on 2022-06-19 21:10:04
  from 'D:\xampp\htdocs\sklep\app\views\OrderView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_62af748c400083_58277009',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0b3ffb2c4d0dfffbffd11144a2a7763f508f0b3c' => 
    array (
      0 => 'D:\\xampp\\htdocs\\sklep\\app\\views\\OrderView.tpl',
      1 => 1655655400,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62af748c400083_58277009 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>
<!DOCTYPE HTML>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_40703345762af748c3ee722_80288292', 'bottom');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'bottom'} */
class Block_40703345762af748c3ee722_80288292 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'bottom' => 
  array (
    0 => 'Block_40703345762af748c3ee722_80288292',
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

<form method="post" class="pure-form pure-form-aligned">
    <fieldset>
        <div class="pure-control-group">
            <label for="aligned-name">Imie</label>
            <input type="text" id="aligned-name" placeholder="Imie" name="imie" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->imie;?>
"/>
        </div>
        <div class="pure-control-group">
            <label for="aligned-surname">Nazwisko</label>
            <input type="text" id="aligned-surname" placeholder="Nazwisko" name="nazwisko" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->nazwisko;?>
"/>
        </div>
        <div class="pure-control-group">
            <label for="aligned-email">Email</label>
            <input type="email" id="aligned-email" placeholder="Email" name="email" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->email;?>
"/>
        </div>
        <div class="pure-control-group">
            <label for="aligned-nr-tel">Numer telefonu</label>
            <input type="tel" id="aligned-nr-tel" placeholder="Numer telefonu" name="nr_tel" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->nr_tel;?>
"/>
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

<?php
}
}
/* {/block 'bottom'} */
}
