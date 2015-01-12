<fieldset>
<legend>详细招募信息</legend>
<form name="ProjectForm" method="post" action={$form_submit} onSubmit="return InputCheck(this)">
{if count($Array_DataInfo) > 0}
	<fieldset><legend>{$Array_DataInfo.recruit_name}</legend>
	<dl><dt>{$Array_DataInfo.recruit_des} : 月薪{$Array_DataInfo.recruit_salary}</dt>
	<dd>来自:{$Array_DataInfo.user_name}</dd></dl>
<p>
<input type="hidden" name="model_id" value='{$model_id}' />
<input type="hidden" name="form_id" value='{$form_id}' />
<input type="submit" name="submit" value=" 申请这份工作" class="left" />
</p>
</form>
{else}
<p>系统内部错误</p>
{/if}