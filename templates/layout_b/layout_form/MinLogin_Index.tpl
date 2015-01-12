<div class="center pt10 mt100">
	<form name="loginCye" method="post" action={$form_submit} onSubmit="return InputCheck(this)">
		<div class="loginFormIpt">
			<div class="controls-s ui-form-item">
				<b class="ico ico-uid"></b>
				<input type="text" tabindex="1" name="user_name" placeholder="请您输入登录账号" class="bg-translucentb1" required />
			</div>
		</div>
		<div class="loginFormIpt">
			<div class="controls-s ui-form-item">
				<b class="ico ico-pwd"></b>
				<input tabindex="1" name="user_password" placeholder="请您输入登录密码" class="bg-translucentb1" type="password" required />
			</div>
		</div>
		<div class="pl20">
			<input type="hidden" name="form_id" value="User_Login" />
	    	<input name="submit" class="btn-sign bg-translucentw3" type="submit" value=" 登 录 " />
		</div>
		<p><strong class="f14">还没有注册过？</strong><a class=" butn " href="/UserRequest.php?User_Request=Register"><i></i>&nbsp; 注册 &nbsp;</a></p>
	</form>
</div>