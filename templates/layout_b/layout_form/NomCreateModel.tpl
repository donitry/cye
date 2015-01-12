<fieldset>
<legend>创建项目项目模块</legend>
<form name="ProjectForm" method="post" action={$form_submit} onSubmit="return InputCheck(this)">
<p>
<label for="model_name" class="label">模块名:</label>
<input id="model_name" name="model_name" type="text" class="input" />
<p/>
<p>
<label for="model_des" class="label">简单的描述:</label>
<input id="model_des" name="model_des" type="text" class="input" />
<p/>
<p>
<input type="hidden" name="project_id" value='{$project_id}' />
<input type="hidden" name="form_id" value="Create_Model" />
<input type="submit" name="submit" value="创建并开始招募雇员" class="left" />
</p>
</form>
</fieldset>