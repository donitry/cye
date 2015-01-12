<?php /* Smarty version Smarty-3.1.18, created on 2015-01-07 11:32:03
         compiled from "/var/web/html/templates/layout_b/layout_state/NomPerson_Info.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14890629054ac97d0602b33-93876500%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '94fc3ede8e1be2f50884a6772575c8e397aa7cdb' => 
    array (
      0 => '/var/web/html/templates/layout_b/layout_state/NomPerson_Info.tpl',
      1 => 1420601522,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14890629054ac97d0602b33-93876500',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54ac97d0610457_59325117',
  'variables' => 
  array (
    'form_submit' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54ac97d0610457_59325117')) {function content_54ac97d0610457_59325117($_smarty_tpl) {?><link rel="stylesheet" type="text/css" href="../c5style/v/1.0/sign.css" />
<div>
<form name="f_s_person" method="post" action=<?php echo $_smarty_tpl->tpl_vars['form_submit']->value;?>
 onSubmit="return InputCheck(this)">
<div class="control-group clearfix">
							
							<div class="controls ui-form-item" required="" requiredtips="请填写登录帐号" min="1" max="40" noblur="1">
								<input type="text"  required oninvalid="setCustomValidity('必须填写！');" oninput="setCustomValidity('');" id="inputWarning" tabindex="1" name="user_name" placeholder="请填写用户名" />
							</div>
						</div>
</form>
</div><?php }} ?>
