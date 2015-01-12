{extends file='./layout_s/layout_main.tpl'}
{block name=layout_css}
<link rel="stylesheet" type="text/css" href="/c5style/layout.css" />
<link rel="stylesheet" type="text/css" href="/c5style/button.css" />
{/block}
{block name=layout_body}
<div class="ui-body">
	<div class="ui-body-left">
		 
		<div class="ui-user-menu f16">
			<ul>
				<li><a href="#">信息管理</a></li>
				<li><a href="#">收益管理</a></li>
			</ul>
		</div>
	</div>
	<div class="ui-body-right border3">
		{ShowPlat}
	</div>
	
</div>

<script type="text/javascript" src="../cyejs/main.js"></script>

{/block}