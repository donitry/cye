<fieldset>
<legend>{$Array_ModelRecruit.project.project_name} : {$Array_ModelRecruit.model.model_name} </legend>
<form name="RecruitForm" method="post" action={$form_submit} onSubmit="return InputCheck(this)">
<p>
<label for="recruit_name" class="label">岗位名称:</label>
<input id="recruit_name" name="recruit_name" value='{$Array_ModelRecruit.recruit.recruit_name}' type="text" class="input" />
<p/>
<p>
<label for="recruit_des" class="label">简单的描述:</label>
<input id="recruit_des" name="recruit_des" value='{$Array_ModelRecruit.recruit.recruit_des}' type="text" class="input" />
<p/>
<p>
<label for="recruit_type" class="label">工作类型:</label>
<select name="recruit_type">
<option value="fulltime" {if $Array_ModelRecruit.recruit.recruit_type eq 'fulltime'} selected {/if}>全职</option>
<option value="parttime" {if $Array_ModelRecruit.recruit.recruit_type eq 'parttime'} selected {/if}>兼职</option>
</select>
<p/>
<p>
<label for="recruit_request" class="label">招募要求:</label>
<input type="checkbox" name="recruit_request[]" value="upload_photo" 
{if strpos($Array_ModelRecruit.recruit.recruit_request, 'upload_photo') !== false} checked {/if} />上传生活照<br />
<input type="checkbox" name="recruit_request[]" value="upload_resume" 
{if strpos($Array_ModelRecruit.recruit.recruit_request, 'upload_resume') !== false} checked {/if}/>上传工作简历<br />
<input type="checkbox" name="recruit_request[]" value="upload_release" 
{if strpos($Array_ModelRecruit.recruit.recruit_request, 'upload_release') !== false} checked {/if}/>上传作品<br />
<input type="checkbox" name="recruit_request[]" value="online_audition" 
{if strpos($Array_ModelRecruit.recruit.recruit_request, 'online_audition') !== false} checked {/if}/>视频面试<br />
<input type="checkbox" name="recruit_request[]" value="online_exam" 
{if strpos($Array_ModelRecruit.recruit.recruit_request, 'online_exam') !== false} checked {/if}/>在线笔试<br />
<p/>
<p>
<label for="recruit_salary" class="label">承诺月薪:</label>
<input id="recruit_salary" name="recruit_salary" value='{$Array_ModelRecruit.recruit.recruit_salary}' type="text" class="input" />
<p/>
<p>
<label for="recruit_reward" class="label">其他收入:</label>
<input type="checkbox" name="recruit_reward[]" value="business" 
{if strpos($Array_ModelRecruit.recruit.recruit_reward, 'business') !== false} checked {/if}/>业务提成<br />
<input type="checkbox" name="recruit_reward[]" value="performance" 
{if strpos($Array_ModelRecruit.recruit.recruit_reward, 'performance') !== false} checked {/if}/>绩效奖金<br />
<input type="checkbox" name="recruit_reward[]" value="income" 
{if strpos($Array_ModelRecruit.recruit.recruit_reward, 'income') !== false} checked {/if}/>收益分成<br />
<p/>
<p>
<label for="recruit_reward_des" class="label">其他收入简单描述:</label>
<input id="recruit_reward_des" name="recruit_reward_des" value='{$Array_ModelRecruit.recruit.recruit_reward_des}' type="text" class="input" />
<p/>
<p>
<input type="hidden" name="model_id" value='{$model_id}' />
<input type="hidden" name="form_id" value='{$form_id}' />
<input type="submit" name="submit" value="修改招募" class="left" />
</p>
</form>
</fieldset>