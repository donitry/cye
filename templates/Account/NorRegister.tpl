<fieldset>
<legend>用户注册</legend>
<form name="RegisterForm" method="post" action="./account/FunRegister.php" onSubmit="return InputCheck(this)">
<p>
<label for="username" class="label">用户名:</label>
<input id="username" name="username" type="text" class="input" />
<p/>
<p>
<label for="password" class="label">密 码:</label>
<input id="password" name="password" type="password" class="input" />
<p/>
<p>
<label for="email" class="label">邮箱:</label>
<input id="email" name="email" type="text" class="input" />
<p/>
<p>
<label for="phone" class="label">电话:</label>
<input id="phone" name="phone" type="text" class="input" />
<p/>
<p>
<label for="idcard" class="label">身份证:</label>
<input id="idcard" name="idcard" type="text" class="input" />
<p/>
<p>
<input type="submit" name="submit" value="  确 定  " class="left" />
<a href="./account/register.php"  >已有账号，直接登录</a>
</p>
</form>
</fieldset>