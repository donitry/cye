<?php /* Smarty version Smarty-3.1.18, created on 2015-01-07 10:56:37
         compiled from "/var/web/html/templates/layout_b/layout_form/NomLogin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:161033444054aca0656fa982-91708360%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '131594644b15193e0ae3f3af38c2557f02a1b57e' => 
    array (
      0 => '/var/web/html/templates/layout_b/layout_form/NomLogin.tpl',
      1 => 1420598621,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '161033444054aca0656fa982-91708360',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'form_submit' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54aca06576abc1_89544390',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54aca06576abc1_89544390')) {function content_54aca06576abc1_89544390($_smarty_tpl) {?><link rel="stylesheet" type="text/css" href="../c5style/v/1.0/sign.css" />
<div class="main p40">
	<div class="main-con">
		<div class="sign-box clearfix th-login">
			<div class="sign-left">
				<form name="loginCye" method="post" action=<?php echo $_smarty_tpl->tpl_vars['form_submit']->value;?>
 onSubmit="return InputCheck(this)">
						<div class="control-group clearfix">
							<label class="control-label" for="inputWarning">帐号：</label>
							<div class="controls ui-form-item" required="" requiredtips="请填写登录帐号" min="1" max="40" noblur="1">
								<input type="text"  required oninvalid="setCustomValidity('必须填写！');" oninput="setCustomValidity('');" id="inputWarning" tabindex="1" name="user_name" placeholder="请填写用户名" />
							</div>
						</div>
						<div class="control-group clearfix">
							<label class="control-label" for="inputWarning">密码：</label>
							<div class="controls ui-form-item" required="" requiredtips="请填写登录密码" min="6" max="30" noblur="1">
								<input type="password" id="inputWarning" tabindex="1" name="user_password" placeholder="请填写登录密码" />
							</div>
						</div>
						<p class="sub-btn">
							<input type="hidden" name="form_id" value="User_Login" />
							<button class="butn max-butn max-butn-orange icons icon-user" type="submit" name="submit"><i></i>登录</button>
							<a class="gray6 ml10 underline" href="/retrieve/index.html?mode=1">忘记密码？</a>
						</p>
				</form>
			</div>
			<div class="sign-right">
				<!--
	            <p><strong class="f14">还没有注册过？</strong><a class="butn" href="/UserRequest.php?User_Request=Register"><i></i>&nbsp; 注册 &nbsp;</a></p>
	            <div class="sign-mobile-entry"><p>身边的猪八戒</p><p><a href="http://m.zhubajie.com" target="_blank">手机客户端下载&gt;&gt;</a></p></div>
	            <div style="margin-top: 15px" class="j_cms_ctn" data-cmstoken="7beadef8643cf319"></div>
				<div style="margin-top: 15px"></div>
				-->
			</div>
		</div>
	</div>
</div><?php }} ?>
