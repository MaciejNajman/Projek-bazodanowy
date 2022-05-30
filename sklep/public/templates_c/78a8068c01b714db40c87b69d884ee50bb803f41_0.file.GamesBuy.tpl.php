<?php
/* Smarty version 4.1.0, created on 2022-05-30 16:21:00
  from 'D:\xampp\htdocs\sklep\app\views\GamesBuy.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6294d2cc2a1142_20377955',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '78a8068c01b714db40c87b69d884ee50bb803f41' => 
    array (
      0 => 'D:\\xampp\\htdocs\\sklep\\app\\views\\GamesBuy.tpl',
      1 => 1653920453,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6294d2cc2a1142_20377955 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>
<!DOCTYPE HTML>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9924934406294d2cc265e40_96372555', 'top');
?>

    
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11639407946294d2cc2680e8_36033444', 'bottom');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_9924934406294d2cc265e40_96372555 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_9924934406294d2cc265e40_96372555',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <!--<p style="background-color:#00ffff;font-size:25px;font-family:verdana;text-align:center;">Czy na pewno chcesz kupić tą grę ?</p>-->
<?php
}
}
/* {/block 'top'} */
/* {block 'bottom'} */
class Block_11639407946294d2cc2680e8_36033444 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'bottom' => 
  array (
    0 => 'Block_11639407946294d2cc2680e8_36033444',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    
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

<div class="bottom-margin">
<form class="pure-form">
    <fieldset>
        <legend><b>Czy na pewno chcesz kupić tą grę ?</b></legend>
        <a class="pure-button" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
orderShow">Tak</a>
        <a class="pure-button" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
gamesList">Nie</a>
    </fieldset>
</form>
</div>
<?php
}
}
/* {/block 'bottom'} */
}
