<?php /* Smarty version Smarty-3.1.10, created on 2012-07-14 23:40:35
         compiled from "D:\Documents\WebDev\danielmason2\httpdocs\templates\system\error.tpl" */ ?>
<?php /*%%SmartyHeaderCode:319414fe0f611ce0d13-93668407%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c778ecdf306fe0b2adcf2a57935efa185fa5a123' => 
    array (
      0 => 'D:\\Documents\\WebDev\\danielmason2\\httpdocs\\templates\\system\\error.tpl',
      1 => 1342302013,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '319414fe0f611ce0d13-93668407',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_4fe0f611dcbc72_09921153',
  'variables' => 
  array (
    'publicMessage' => 0,
    'devMode' => 0,
    'devMessage' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fe0f611dcbc72_09921153')) {function content_4fe0f611dcbc72_09921153($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("include/top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


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