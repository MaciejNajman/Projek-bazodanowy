<?php
/* Smarty version 4.1.0, created on 2022-05-16 19:08:29
  from 'D:\xampp\htdocs\sklep\app\views\GameList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6282850dbed521_68012139',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '59fdd0c5494d7d6f23af9393ec0b730562425463' => 
    array (
      0 => 'D:\\xampp\\htdocs\\sklep\\app\\views\\GameList.tpl',
      1 => 1652720890,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6282850dbed521_68012139 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5001126946282850daa5fa2_92054093', 'top');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16721363216282850db216e3_34615144', 'bottom');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_5001126946282850daa5fa2_92054093 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_5001126946282850daa5fa2_92054093',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
gameList">
	<legend>Opcje wyszukiwania</legend>
	<fieldset>
		<input type="text" placeholder="gra" name="sf_game" value="<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->game;?>
" /><br />
		<button type="submit" class="pure-button pure-button-primary">Filtruj</button>
	</fieldset>
</form>
</div>	

<?php
}
}
/* {/block 'top'} */
/* {block 'bottom'} */
class Block_16721363216282850db216e3_34615144 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'bottom' => 
  array (
    0 => 'Block_16721363216282850db216e3_34615144',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
<a class="pure-button button-success" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
gamesNew">+ Nowa gra</a>
</div>	

<table id="tab_games" class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>Nazwa gry</th>
		<th>Cena</th>
		<th>Gatunek</th>
		<th>Klasyfikacja wiekowa</th>
                <th>Producent gry</th>
                <th>Opcje</th>
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
</td><td><a class="button-small pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
gamesEdit&id=<?php echo $_smarty_tpl->tpl_vars['g']->value['idGra'];?>
">Edytuj</a>&nbsp;<a class="button-small pure-button button-warning" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
gamesDelete&id=<?php echo $_smarty_tpl->tpl_vars['g']->value['idGra'];?>
">Usun</a></td></tr>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</tbody>
</table>

<?php
}
}
/* {/block 'bottom'} */
}
