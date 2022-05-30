<?php
/* Smarty version 4.1.0, created on 2022-05-24 21:43:07
  from 'D:\xampp\htdocs\sklep\app\views\GamesEdit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_628d354b2c7702_17971926',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8106ccb43bc508994404e9ec5d77527c956bf953' => 
    array (
      0 => 'D:\\xampp\\htdocs\\sklep\\app\\views\\GamesEdit.tpl',
      1 => 1653406885,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_628d354b2c7702_17971926 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1696028978628d354b2b53d4_98243902', 'top');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_1696028978628d354b2b53d4_98243902 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_1696028978628d354b2b53d4_98243902',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
gamesSave" method="post" class="pure-form pure-form-aligned">
	<fieldset>
		<legend>Dane gry</legend>
		<div class="pure-control-group">
            <label for="nazwa">Nazwa</label>
            <input id="nazwa_gry" type="text" placeholder="Destiny 2" name="nazwa_gry" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->nazwa_gry;?>
">
        </div>
		<div class="pure-control-group">
            <label for="cena">Cena</label>
            <input id="cena" type="text" placeholder="99.99" name="cena" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->cena;?>
">
        </div>
		<div class="pure-control-group">
            <label for="gatunek">Gatunek</label>
            <input id="gatunek" type="text" placeholder="fps" name="gatunek" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->gatunek;?>
">
        </div>
                <div class="pure-control-group">
            <label for="klasyfikacja_wiekowa">Klasyfikacja wiekowa</label>
            <input id="klasyfikacja_wiekowa" type="text" placeholder="16" name="klasyfikacja_wiekowa" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->klasyfikacja_wiekowa;?>
">
        </div>
                <div class="pure-control-group">
            <label for="producent_gry">Producent</label>
            <input id="producent_gry" type="text" placeholder="Bungie" name="producent_gry" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->producent_gry;?>
">
        </div>
		<div class="pure-controls">
			<input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
			<a class="pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
gamesList">Powrót</a>
		</div>
	</fieldset>
    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->id;?>
">
</form>	
</div>

<?php
}
}
/* {/block 'top'} */
}
