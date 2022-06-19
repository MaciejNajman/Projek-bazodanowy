<?php
/* Smarty version 4.1.0, created on 2022-06-19 20:55:31
  from 'D:\xampp\htdocs\sklep\app\views\RoleView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_62af7123d79b90_13196443',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd04d8cc8a9aa93716c75fbdd9fafebefde2b9387' => 
    array (
      0 => 'D:\\xampp\\htdocs\\sklep\\app\\views\\RoleView.tpl',
      1 => 1655664929,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62af7123d79b90_13196443 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>
<!DOCTYPE HTML>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_163104379662af7123d393c0_95976878', 'top');
?>

    
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_147394934062af7123d47ce5_87971631', 'bottom');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_163104379662af7123d393c0_95976878 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_163104379662af7123d393c0_95976878',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
roleAdd" method="post" class="pure-form pure-form-aligned bottom-margin">
    <legend><b>Dodawanie roli użytkownikom sklepu</b></legend>
	<fieldset>
        <div class="pure-control-group">
			<label for="id_uzytkownik">Id użytkownika: </label>
			<input id="id_uzytkownik" type="text" name="id_uzyt"/>
		</div>
        <div class="pure-control-group">
			<label for="id_rola">Id roli: </label>
			<input id="id_rola" type="text" name="id_roli" /><br/>
		</div>
		<div class="pure-controls">
			<input type="submit" value="Dodaj" class="pure-button pure-button-primary"/>
		</div>
	</fieldset>
</form>	
<?php
}
}
/* {/block 'top'} */
/* {block 'bottom'} */
class Block_147394934062af7123d47ce5_87971631 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'bottom' => 
  array (
    0 => 'Block_147394934062af7123d47ce5_87971631',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    
<table class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>idUzytkownik</th>
		<th>Imie</th>
                <th>Nazwisko</th>
                <th>Email</th>
                <th>Numer telefonu</th>
	</tr>
</thead>
<tbody>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'u');
$_smarty_tpl->tpl_vars['u']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['u']->value) {
$_smarty_tpl->tpl_vars['u']->do_else = false;
?>
<tr><td><?php echo $_smarty_tpl->tpl_vars['u']->value["idUzytkownik"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['u']->value["imie"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['u']->value["nazwisko"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['u']->value["email"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['u']->value["nr_tel"];?>
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
		<th>idRola</th>
		<th>Nazwa roli</th>
		<th>Czy aktywna w systemie</th>
		<th>Od kiedy istnieje</th>
	</tr>
</thead>
<tbody>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rola']->value, 'r');
$_smarty_tpl->tpl_vars['r']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['r']->value) {
$_smarty_tpl->tpl_vars['r']->do_else = false;
?>
<tr><td><?php echo $_smarty_tpl->tpl_vars['r']->value["idRola"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['r']->value["nazwa_roli"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['r']->value["czy_aktywna_w_systemie"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['r']->value["od_kiedy_istnieje"];?>
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
		<th>idUzytkownik</th>
		<th>idRola</th>
	</tr>
</thead>
<tbody>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['usersRola']->value, 'ur');
$_smarty_tpl->tpl_vars['ur']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ur']->value) {
$_smarty_tpl->tpl_vars['ur']->do_else = false;
?>
<tr><td><?php echo $_smarty_tpl->tpl_vars['ur']->value["idUzytkownik"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['ur']->value["idRola"];?>
</td></tr>
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
