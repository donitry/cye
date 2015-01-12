<fieldset>
<legend>创建项目组</legend>
<form name="ProjectForm" method="post" action={$form_submit} onSubmit="return InputCheck(this)">
<p>
<label for="project_name" class="label">项目组名:</label>
<input id="project_name" name="project_name" placeholder="例如:Olei项目组" type="text" class="input" required />
<p/>
<p>
<label for="project_des" class="label">简单的描述:</label>
<input id="project_des" name="project_des" type="text" class="input" />
<p/>
<p>
<input type="hidden" name="form_id" value="Create_Project" />
<input type="submit" name="submit" value="  确 定  " class="left" />
</p>
</form>
</fieldset>