<?php /* Smarty version Smarty-3.1.10, created on 2012-12-12 00:54:18
         compiled from "D:\Documents\WebDev\Thymely\data\templates\system\error.tpl" */ ?>
<?php /*%%SmartyHeaderCode:971950c7c7aaabe573-74210729%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e980582157630c6b8992b31b526f95e2885639cf' => 
    array (
      0 => 'D:\\Documents\\WebDev\\Thymely\\data\\templates\\system\\error.tpl',
      1 => 1342302013,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '971950c7c7aaabe573-74210729',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'publicMessage' => 0,
    'devMode' => 0,
    'devMessage' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_50c7c7aaca20f7_34910026',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50c7c7aaca20f7_34910026')) {function content_50c7c7aaca20f7_34910026($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("include/top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<p>
	An error occured.
</p>
<?php if ($_smarty_tpl->tpl_vars['publicMessage']->value){?>
	<p>
		<b>Public Message:</b> <?php echo $_smarty_tpl->tpl_vars['publicMessage']->value;?>

	</p>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['devMode']->value&&$_smarty_tpl->tpl_vars['devMessage']->value){?>
	<p>
		<b>Dev Message:</b>
	</p>
	
	<pre>
<?php echo $_smarty_tpl->tpl_vars['devMessage']->value;?>

	</pre>
<?php }?>

<?php echo $_smarty_tpl->getSubTemplate ("include/bottom.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>