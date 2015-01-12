<fieldset>
<legend>找工作</legend>
{if count($Array_DataInfo) > 0}
	{foreach $Array_DataInfo as $row}
		<fieldset><legend><a href='./UserRequest.php?User_Request=ApplyJob&ModelId={$row.idcy_project_model}'>{$row.recruit_name}</a></legend>
			<dl><dt>工作#  :  {$row.recruit_des}</dt>
			<dd>月薪 {$row.recruit_salary}</dd>
			<dd>来自# : <a href='./DataRequest.php?Data_Request=ProjectInfo&ProjectId={$row.idcy_project}'>{$row.project_name}</a>: {$row.model_name}</dd>
		 	</dl>
	{/foreach}
{else}
<p>没有工作</p>
{/if}
</fieldset>