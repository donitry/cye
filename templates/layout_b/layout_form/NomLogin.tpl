<link rel="stylesheet" type="text/css" href="../c5style/v/1.0/sign.css" />
<div class="main p40">
	<div class="main-con">
		<div class="sign-box clearfix th-login">
			<div class="sign-left">
				<form name="loginCye" method="post" action={$form_submit} onSubmit="return InputCheck(this)">
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
</div>