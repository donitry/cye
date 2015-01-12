<fieldset>
<legend>详细项目信息</legend>
{if count($Array_DataInfo) > 0}
	<fieldset><legend>{$Array_DataInfo['orgize'].orgize_name}</legend>
	<p>{$Array_DataInfo['orgize'].orgize_des}</p>
	{if count($Array_DataInfo['project']) > 0}
		{foreach $Array_DataInfo['project'] as $index=>$row}	
			{if count($Array_DataInfo['models'][$index]) > 0}
				{foreach $Array_DataInfo['models'][$index] as $indexx=>$roww}	
					<dl><dt>工作#{$roww.recruit_name} : {$roww.recruit_des}</dt></dl>
					<dd>月薪 {$roww.recruit_salary}</dd>
					</dl>
				{/foreach}
			{/if}
		{/foreach}
	{/if}
{else}
<p>没有工作</p>
{/if}
</fieldset>