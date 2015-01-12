<link rel="stylesheet" type="text/css" href="../c5style/v/1.0/sign.css" />
<div class="main p40">
	<div class="main-con">
		<div class="sign-box clearfix">
				<div class="sign-left">
					<h3 class="tit">新用户注册</h3>
					<form id="RegisterForm" method="post" action={$form_submit} onSubmit="return InputCheck(this)">
						<div class="control-group clearfix">
							 <label class="control-label" for="inputWarning">用户名：</label>
							 <div class="controls ui-form-item" required="" ajaxurl="/register/ChkUn-type-5.html" type="tel" data-index="0">
								<input type="text" required oninvalid="setCustomValidity('必须填写！');" oninput="setCustomValidity('');" 
								name="user_name" tabindex="1" class="error">
								<span class="help-inline lin9" data-title="用以在多个终端登录和找回密码">该字段为必选项！</span>
							</div>
						</div>
						<div class="control-group clearfix">
				  			<label class="control-label" for="inputWarning">登录密码：</label>
				  			<div class="controls ui-form-item" required="" min="6" max="16" data-index="1">
								<input type="password" maxlength="16" name="user_password" tabindex="2">
								<span class="help-inline lin9">6～16个数字、字母或特殊符号组成</span>	  
				  			</div>
						</div>
						<div class="control-group clearfix">
				  			<label class="control-label" for="inputWarning">确认密码：</label>
				  			<div class="controls ui-form-item" required="" data-index="2">
								<input type="password" maxlength="16" name="cpassword" tabindex="3">
								<span class="help-inline lin9"></span>	  
				  			</div>
						</div>
						<div class="control-group clearfix">
				  			<label class="control-label" for="inputWarning">邮箱：</label>
				  			<div class="controls ui-form-item" required="" data-index="2">
								<input type="email" maxlength="16" name="user_email" tabindex="3">
								<span class="help-inline lin9"></span>	  
				  			</div>
						</div>
						<input type="hidden" name="form_id" value="User_Reg" />
						<p class="sub-btn"><button class="butn max-butn max-butn-orange" type="submit" name="submit"><i></i>注册</button></p>
					</div>
				</form>
				<div class="sign-right">
					<p><strong class="f14">已经注册过？</strong><a class="butn" href="/UserRequest.php?User_Request=Login"><i></i>&nbsp; 登录 &nbsp;</a></p>
				</div>
			</div>
	</div>
</div>


<!--

<form name="RegisterForm" method="post" action={$form_submit} onSubmit="return InputCheck(this)">
<p>
<label for="user_name" class="label">用户名:</label>
<input id="user_name" name="user_name" type="text" class="input" />
<p/>
<p>
<label for="user_password" class="label">密 码:</label>
<input id="user_password" name="user_password" type="password" class="input" />
<p/>
<p>
<label for="user_email" class="label">邮箱:</label>
<input id="user_email" name="user_email" type="email" class="input" />
<p/>
<p>
<label for="user_phone" class="label">电话:</label>
<input id="user_phone" name="user_phone" type="number" class="input" />
<p/>
<p>
<label for="user_idcard" class="label">身份证:</label>
<input id="user_idcard" name="user_idcard" type="text" class="input" />
<p/>
<p>
<input type="hidden" name="form_id" value="User_Reg" />
<input type="submit" name="submit" value="  确 定  " class="left" />
<a href="./UserRequest.php?User_Request=Login"  >已有账号，直接登录</a>
</p>
</form>
-->