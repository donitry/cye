<fieldset>
<legend>用户登录</legend>
<form name="LoginForm" method="post" action="./account/FunLogin.php" onSubmit="return InputCheck(this)">
<p>
<label for="username" class="label">用户名A:</label>
<input id="username" name="username" type="text" class="input" />
<p/>
<p>
<label for="password" class="label">密 码:</label>
<input id="password" name="password" type="password" class="input" />
<p/>
<p>
<input type="submit" name="submit" value="  确 定  " class="left" />
<a href="./UserAccount.php?cmd=reg"  >注册</a>
</p>
</form>
</fieldset>