<fieldset>
<legend>申请信息管理</legend>
<form name="ApplyForm" method="post" action={$form_submit} onSubmit="return InputCheck(this)">
{if count($Array_DataInfo) > 0}
	<fieldset><legend>{$Array_DataInfo.recruit_name}</legend>
	<dl><dt>{$Array_DataInfo.recruit_des} : 月薪{$Array_DataInfo.recruit_salary}</dt>
	<dd>来自 :{$Array_DataInfo.user_name}:的申请</dd></dl>
<p>
<input type="radio" name="identity" value="0" checked="checked" />确定雇用
<input type="radio" name="identity" value="1" />拒绝申请 
<input type="radio" name="identity" value="2" />加入候选
</p>
<p>
<input type="hidden" name="applicant_id" value='{$applicant_id}' />
<input type="hidden" name="form_id" value='{$form_id}' />
<input type="submit" name="submit" value=" 确 定 " class="left" />
</p>
</form>
{else}
<p>系统内部错误</p>
{/if}