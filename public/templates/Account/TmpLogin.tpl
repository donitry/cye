<fieldset>
<legend>用户登录</legend>
<form name="LoginForm" method="post" action={$form_submit} onSubmit="return InputCheck(this)">
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
</fieldset>