<link rel="stylesheet" type="text/css" href="../c5style/v/1.0/sign.css" />
<div>
<form name="f_s_person" method="post" action={$form_submit} onSubmit="return InputCheck(this)">
<div class="control-group clearfix">
							
							<div class="controls ui-form-item" required="" requiredtips="请填写登录帐号" min="1" max="40" noblur="1">
								<input type="text"  required oninvalid="setCustomValidity('必须填写！');" oninput="setCustomValidity('');" id="inputWarning" tabindex="1" name="user_name" placeholder="请填写用户名" />
							</div>
						</div>
</form>
</div>