<fieldset>
<legend>模块雇员招募</legend>
<form name="RecruitForm" method="post" action={$form_submit} onSubmit="return InputCheck(this)">
<p>
<label for="recruit_name" class="label">岗位名称:</label>
<input id="recruit_name" name="recruit_name" type="text" class="input" />
<p/>
<p>
<label for="recruit_des" class="label">简单的描述:</label>
<input id="recruit_des" name="recruit_des" type="text" class="input" />
<p/>
<p>
<label for="recruit_type" class="label">工作类型:</label>
<select name="recruit_type">
<option value="fulltime">全职</option>
<option value="parttime">兼职</option>
</select>
<p/>
<p>
<label for="recruit_request" class="label">招募要求:</label>
<input type="checkbox" name="recruit_request[]" value="upload_photo" />上传生活照<br />
<input type="checkbox" name="recruit_request[]" value="upload_resume" />上传工作简历<br />
<input type="checkbox" name="recruit_request[]" value="upload_release" />上传作品<br />
<input type="checkbox" name="recruit_request[]" value="online_audition" />视频面试<br />
<input type="checkbox" name="recruit_request[]" value="online_exam" />在线笔试<br />
<p/>
<p>
<label for="recruit_salary" class="label">承诺月薪:</label>
<input id="recruit_salary" name="recruit_salary" type="text" class="input" />
<p/>
<p>
<label for="recruit_reward" class="label">其他收入:</label>
<input type="checkbox" name="recruit_reward[]" value="business" />业务提成<br />
<input type="checkbox" name="recruit_reward[]" value="performance" />绩效奖金<br />
<input type="checkbox" name="recruit_reward[]" value="income" />收益分成<br />
<p/>
<p>
<label for="recruit_reward_des" class="label">其他收入简单描述:</label>
<input id="recruit_reward_des" name="recruit_reward_des" type="text" class="input" />
<p/>
<p>
<input type="hidden" name="model_id" value='{$model_id}' />
<input type="hidden" name="form_id" value='{$form_id}' />
<input type="submit" name="submit" value="发布招募" class="left" />
</p>
</form>
</fieldset>