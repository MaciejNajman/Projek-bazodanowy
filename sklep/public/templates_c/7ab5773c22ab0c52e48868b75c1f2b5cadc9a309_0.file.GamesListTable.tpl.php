<?php
/* Smarty version 4.1.0, created on 2022-05-24 21:21:59
  from 'D:\xampp\htdocs\sklep\app\views\GamesListTable.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_628d30573cb4b0_61636994',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7ab5773c22ab0c52e48868b75c1f2b5cadc9a309' => 
    array (
      0 => 'D:\\xampp\\htdocs\\sklep\\app\\views\\GamesListTable.tpl',
      1 => 1653407664,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_628d30573cb4b0_61636994 (Smarty_Internal_Template $_smarty_tpl) {
?><table class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>Nazwa</th>
		<th>Cena</th>
		<th>Gatunek</th>
		<th>Klasyfikacja wiekowa</th>
                <th>Producent</th>
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
gamesEdit/<?php echo $_smarty_tpl->tpl_vars['g']->value['idGra'];?>
">Edytuj</a>&nbsp;<a class="button-small pure-button button-warning" onclick="confirmLink('<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
gamesDelete/<?php echo $_smarty_tpl->tpl_vars['g']->value['idGra'];?>
','Czy na pewno usunąć rekord ?')">Usuń</a>&nbsp;<a class="button-small pure-button button-error" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
gamesBuy/<?php echo $_smarty_tpl->tpl_vars['g']->value['idGra'];?>
">KUP</a></td></tr>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</tbody>
</table><?php }
}
