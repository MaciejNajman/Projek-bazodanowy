<?php
/* Smarty version 4.1.0, created on 2022-06-19 20:16:16
  from 'D:\xampp\htdocs\sklep\app\views\GamesListFullPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_62af67f0d1bf51_41060947',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '13230904b38bf7fad5f9e6b141f2a64899aeaf2b' => 
    array (
      0 => 'D:\\xampp\\htdocs\\sklep\\app\\views\\GamesListFullPage.tpl',
      1 => 1653307884,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:GamesListTable.tpl' => 1,
  ),
),false)) {
function content_62af67f0d1bf51_41060947 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_56537556162af67f0d07a61_06593441', 'top');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_36787748762af67f0d109b7_34621465', 'bottom');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_56537556162af67f0d07a61_06593441 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_56537556162af67f0d07a61_06593441',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
<form id="search-form" class="pure-form pure-form-stacked" onsubmit="ajaxPostForm('search-form','<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
gamesListPart','table'); return false;">
	<legend>Opcje wyszukiwania</legend>
	<fieldset>
		<input type="text" placeholder="nazwa gry" name="sf_game" value="<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->game;?>
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
class Block_36787748762af67f0d109b7_34621465 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'bottom' => 
  array (
    0 => 'Block_36787748762af67f0d109b7_34621465',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
<a class="pure-button button-success" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
gamesNew">+ Nowa gra</a>
</div>	

<div id="table">
<?php $_smarty_tpl->_subTemplateRender("file:GamesListTable.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>

<?php
}
}
/* {/block 'bottom'} */
}
