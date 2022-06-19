<?php
/* Smarty version 4.1.0, created on 2022-06-19 21:10:03
  from 'D:\xampp\htdocs\sklep\app\views\GamesBuy.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_62af748b190a34_71291142',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '78a8068c01b714db40c87b69d884ee50bb803f41' => 
    array (
      0 => 'D:\\xampp\\htdocs\\sklep\\app\\views\\GamesBuy.tpl',
      1 => 1655652157,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62af748b190a34_71291142 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>
<!DOCTYPE HTML>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_201969825662af748b170ea2_17606135', 'top');
?>

    
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_121673582062af748b1732e4_88955770', 'bottom');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_201969825662af748b170ea2_17606135 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_201969825662af748b170ea2_17606135',
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
class Block_121673582062af748b1732e4_88955770 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'bottom' => 
  array (
    0 => 'Block_121673582062af748b1732e4_88955770',
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
        <a class="pure-button" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
order/<?php echo $_smarty_tpl->tpl_vars['g']->value['idGra'];?>
">Tak</a> <!--orderShow daje pusty formularz,ale akcja order daje (dobry?) z bledami nie wpisano imienia-->
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
