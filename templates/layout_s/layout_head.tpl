{literal}
<style type="text/css">

</style>
<script type="text/javascript">
$(document).ready(function(){
	var topMain=$("#head_top").height()+20//是头部的高度加头部与nav导航之间的距离
	var nav=$(".ui_head_nav");
	$(window).scroll(function(){
		if ($(window).scrollTop()>topMain){//如果滚动条顶部的距离大于topMain则就nav导航就添加类.nav_scroll，否则就移除
			nav.addClass("ui_head_nav_scroll");
		}else{
			nav.removeClass("ui_head_nav_scroll");
		}
	});
})
{/literal}
</script>
<div id="head_top" class="ui_head_nav center clearfix">
	<!--
	<div class="ui_head_nav_scroll clearfix">
	    <ul>
	        <li><a>测试</a></li>
	        <li><a>测试</a></li>
	    </ul>
		<div class="ui_head_nav_serch clearfix">
			<form name="loginCye" method="post" action={$form_submit} onSubmit="return InputCheck(this)">
					<div class="controls-s ui-form-item">
						<b class="ico ico-serch"></b>
						<input type="text" tabindex="1" name="user_name" placeholder="搜索..." class="bg-translucentb3" required />
					</div>
			</form>
		</div>
	</div>
	-->
</div>