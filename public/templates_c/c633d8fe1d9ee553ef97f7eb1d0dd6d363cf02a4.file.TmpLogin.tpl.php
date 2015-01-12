<?php /* Smarty version Smarty-3.1.18, created on 2015-01-09 10:12:16
         compiled from "/var/web/html/public/templates/Account/TmpLogin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:100952222054ace87b532f27-97439042%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c633d8fe1d9ee553ef97f7eb1d0dd6d363cf02a4' => 
    array (
      0 => '/var/web/html/public/templates/Account/TmpLogin.tpl',
      1 => 1420769504,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '100952222054ace87b532f27-97439042',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54ace87b583cd2_07306689',
  'variables' => 
  array (
    'form_submit' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54ace87b583cd2_07306689')) {function content_54ace87b583cd2_07306689($_smarty_tpl) {?><fieldset>
<legend>用户登录</legend>
<form name="LoginForm" method="post" action=<?php echo $_smarty_tpl->tpl_vars['form_submit']->value;?>
 onSubmit="return InputCheck(this)">
<p>
<label for="username" class="label">用户名:</label>
<input id="username" name="user_name" type="text" class="input" />
<p/>
<p>
<label for="password" class="label">密 码:</label>
<input id="password" name="user_password" type="password" class="input" />
<p/>
<p>
<input type="hidden" name="form_id" value="User_Login" />
<input type="submit" name="submit" value="  确 定  " class="left" />
</p>
</form>
</fieldset><?php }} ?>
