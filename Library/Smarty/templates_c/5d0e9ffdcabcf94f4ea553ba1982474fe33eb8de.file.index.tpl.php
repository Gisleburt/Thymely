<?php /* Smarty version Smarty-3.1.10, created on 2012-10-06 16:38:04
         compiled from "D:\Documents\WebDev\danielmason2\httpdocs\templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:141404fe0dcd3010636-20539924%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5d0e9ffdcabcf94f4ea553ba1982474fe33eb8de' => 
    array (
      0 => 'D:\\Documents\\WebDev\\danielmason2\\httpdocs\\templates\\index.tpl',
      1 => 1349534235,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '141404fe0dcd3010636-20539924',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_4fe0dcd31393e1_71755475',
  'variables' => 
  array (
    'tweets' => 0,
    'tweet' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fe0dcd31393e1_71755475')) {function content_4fe0dcd31393e1_71755475($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("include/top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <?php  $_smarty_tpl->tpl_vars['tweet'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tweet']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tweets']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tweet']->key => $_smarty_tpl->tpl_vars['tweet']->value){
$_smarty_tpl->tpl_vars['tweet']->_loop = true;
?>
    
    	<article class="tweet">
    		<header>
    			<a href="http://twitter.com/<?php echo $_smarty_tpl->tpl_vars['tweet']->value->username;?>
">
    				<img alt="<?php echo $_smarty_tpl->tpl_vars['tweet']->value->username;?>
" src="<?php echo $_smarty_tpl->tpl_vars['tweet']->value->profilepic;?>
">
    				<?php echo $_smarty_tpl->tpl_vars['tweet']->value->author;?>

    			</a>
    		</header>
    			<?php echo $_smarty_tpl->tpl_vars['tweet']->value->content;?>

    		<footer>
    			<a href="<?php echo $_smarty_tpl->tpl_vars['tweet']->value->permalink;?>
">
    				<?php echo $_smarty_tpl->tpl_vars['tweet']->value->published;?>

    			</a>
    		</footer>
    	
    	
    	</article>
    	
    	<?php echo $_smarty_tpl->tpl_vars['tweet']->value->author;?>

    
    <?php } ?>
<?php echo $_smarty_tpl->getSubTemplate ("include/bottom.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>