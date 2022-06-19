<?php
/* Smarty version 4.1.0, created on 2022-06-19 21:10:09
  from 'D:\xampp\htdocs\sklep\app\views\OrderConfirmView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_62af749113d2f6_66354598',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a53f5154f84bc4a7295530b0ffe5080c6de724d2' => 
    array (
      0 => 'D:\\xampp\\htdocs\\sklep\\app\\views\\OrderConfirmView.tpl',
      1 => 1655655982,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62af749113d2f6_66354598 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>
<!DOCTYPE HTML>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_89082523462af749111b288_24623959', 'bottom');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'bottom'} */
class Block_89082523462af749111b288_24623959 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'bottom' => 
  array (
    0 => 'Block_89082523462af749111b288_24623959',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<br/>
<div class="bottom-margin">
<form class="pure-form">
    <fieldset>
        <legend><b>Twoje zamówienie oczekuje na przyjęcie przez pracownika</b></legend>
    </fieldset>
</form>
</div>

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
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['games']->value, 'g');
$_smarty_tpl->tpl_vars['g']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['g']->value) {
$_smarty_tpl->tpl_vars['g']->do_else = false;
?>
<tr><td><?php echo $_smarty_tpl->tpl_vars['g']->value["nazwa_gry"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['g']->value["cena"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['g']->value["gatunek"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['g']->value["klasyfikacja_wiekowa"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['g']->value["producent_gry"];?>
</td></tr>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</tbody>
</table>
<br/>

<table class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>Czy przyjęto zamówienie</th>
		<th>Data złożenia zamówienia</th>
	</tr>
</thead>
<tbody>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['zamowienia']->value, 'z');
$_smarty_tpl->tpl_vars['z']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['z']->value) {
$_smarty_tpl->tpl_vars['z']->do_else = false;
?>
<tr><td><?php echo $_smarty_tpl->tpl_vars['z']->value["czy_przyjeto_zamowienie"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['z']->value["data_zlozenia_zamowienia"];?>
</td></tr>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</tbody>
</table>
<br/>
<div class="bottom-margin">
<form class="pure-form">
    <fieldset>
        <b>Jeśli po odświeżeniu strony wartość w kolumnie "Czy przyjęto zamówienie" to 1, nasz pracownik przyjął zamówienie i jest ono przygotowywane.</b>
    </fieldset>
</form>
</div>

<?php
}
}
/* {/block 'bottom'} */
}
