


<fieldset>
<legend>项目管理</legend>
<p><a href='./UserRequest.php?User_Request=CreateProject'>创建项目</a>-------<a href='./DataRequest.php?Data_Request=JobList'>找工作</a></p>
{if count($Pro_Array) > 0}
	{foreach $Pro_Array as $t_project}
		<fieldset>
			<legend>{$t_project['projects']['project_name']}  :  {$t_project['projects']['project_des']} </legend>
			<p><a href='./UserRequest.php?User_Request=CreateModel&ProjectId={$t_project.projects.idcy_project}'>创建新模块</a></p>
			{if count($t_project['models']) > 0}
				{foreach $t_project['models'] as $r_model}
					<dl>
					<dt>{$r_model.model_name} == {$r_model.model_des} +++ 
					{if $r_model.model_state_employee === 'open'} 开放人员招募中 --- <a href='#'>关闭招募</a>
					{else if $r_model.model_state_employee === 'noset'} 
						<a href='./UserRequest.php?User_Request=ModelRecruit&ModelId={$r_model.idcy_project_model}'>招募员工</a>
					{else} 目前招募关闭中 --- <a href='#'>开放招募</a>{/if}
					
					{if array_key_exists($r_model.idcy_project_model,$t_project['employees']) && count($t_project['employees'][$r_model.idcy_project_model]) gt 0}
						<dd>雇员:
						{foreach $t_project['employees'][$r_model.idcy_project_model] as $r_employee}
							{if $r_employee.employee_ifget === '1'}
								<a href='./UserRequest.php?User_Request=ApplyManager&AppId={$r_employee.idcy_employee}'>{$r_employee['head_info'].user_name}</a> |
							{/if}
						{/foreach}</dd>
						
						<dd>申请加入:
						{foreach $t_project['employees'][$r_model.idcy_project_model] as $r_employee}
							{if $r_employee.employee_ifget === '0'}
								<a href='./UserRequest.php?User_Request=ApplyManager&AppId={$r_employee.idcy_employee}'>{$r_employee['head_info'].user_name}</a> |
							{/if}
						{/foreach}</dd>
					{else}
						<dd>还没有任何雇员 
								{if $r_model.model_state_employee === 'open'}
									目前开放招募中，没有雇员应聘是不是应该改变一下条件?  
									<a href='./UserRequest.php?User_Request=ModelRecruit&ModelId={$r_model.idcy_project_model}'>改变招募条件</a>  
								{else}
									应该立刻  <a href='#'>开始招募</a>
								{/if}</dd>
					{/if}
				{/foreach}
			{else}
				<p>还没有任何的模块 <a href='./UserRequest.php?User_Request=CreateModel&ProjectId={$t_project.projects.idcy_project}'>创建模块</a></p>
			{/if}</fieldset>
	{foreachelse}
			...no result...
	{/foreach}
{else}
	<p><a href='./UserRequest.php?User_Request=CreateProject'>立刻创建项目开始职业生涯</a></p>
{/if}
</dt>
</fieldset>
					

 