<?php /* Smarty version Smarty-3.1.18, created on 2015-01-07 10:56:36
         compiled from "/var/web/html/templates/layout_b/layout_state/MinUserInfo_Index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:198980124954aca06408f7b4-36047834%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e110b3225c5a0a74d14230f3a5acd87aa2216c31' => 
    array (
      0 => '/var/web/html/templates/layout_b/layout_state/MinUserInfo_Index.tpl',
      1 => 1421011028,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '198980124954aca06408f7b4-36047834',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'username' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54aca0640ca540_00488354',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54aca0640ca540_00488354')) {function content_54aca0640ca540_00488354($_smarty_tpl) {?><div id='MinUserInfo'>
<p>welcome <?php echo $_smarty_tpl->tpl_vars['username']->value;?>
, Your had loged.<a href="/UserPlatform.php" >go to my plat</a></p>
<a href="/UserPlatform.php?User_Request=LoginOut" >loginOut</a>
</div><?php }} ?>
