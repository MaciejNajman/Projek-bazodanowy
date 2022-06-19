<?php
/* Smarty version 4.1.0, created on 2022-06-19 22:56:13
  from 'D:\xampp\htdocs\sklep\app\views\przyjacView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_62af8d6dc86ac7_80232381',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0914f9f1d1305daf2c15e48b33828a2945c90907' => 
    array (
      0 => 'D:\\xampp\\htdocs\\sklep\\app\\views\\przyjacView.tpl',
      1 => 1655672166,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62af8d6dc86ac7_80232381 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>
<!DOCTYPE HTML>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_84961518462af8d6dc71646_05944215', 'bottom');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'bottom'} */
class Block_84961518462af8d6dc71646_05944215 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'bottom' => 
  array (
    0 => 'Block_84961518462af8d6dc71646_05944215',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<br/>
<div class="bottom-margin">
<form class="pure-form">
    <fieldset>
        <legend><b>Potwierdź przyjęcie zamówienia</b></legend>
    </fieldset>
</form>
</div>

<table class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>idZamowienia</th>
		<th>Data złożenia zamówienia</th>
		<th>Czy przyjęto zamówienie</th>
                <th>Przyjmij zamówienie</th>
	</tr>
</thead>
<tbody>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['zamowienia']->value, 'za');
$_smarty_tpl->tpl_vars['za']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['za']->value) {
$_smarty_tpl->tpl_vars['za']->do_else = false;
?>
<tr><td><?php echo $_smarty_tpl->tpl_vars['za']->value["idZamowienie"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['za']->value["data_zlozenia_zamowienia"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['za']->value["czy_przyjeto_zamowienie"];?>
</td><td><a class="button-small pure-button" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
przyjacZamowienie/<?php echo $_smarty_tpl->tpl_vars['za']->value['idZamowienie'];?>
">Przyjmij</a></td></tr>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</tbody>
</table>
<br/>

<?php
}
}
/* {/block 'bottom'} */
}
