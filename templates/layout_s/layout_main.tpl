<!DOCTYPE html>
<html>
  	<HEAD>
		<meta http-equiv="Content-Type" content="text/html; charset=GBK">
  		<title>{block name=layout_title}默认页面标题{/block}</title>
		<link rel="dns-prefetch" href="http://192.168.1.106" />  
  		<link rel="stylesheet" type="text/css" href="../c5style/def.css" />
		<link rel="stylesheet" type="text/css" href="../c5style/base.css" />
		<link rel="stylesheet" type="text/css" href="../c5style/layout.css" />
		<script src="/ajaxjs/libs/jquery.min.js" type="text/javascript"></script>
<!--
		<link rel="stylesheet" type="text/css" href="../cystyle/v/1.0/head.css" />
		<link rel="stylesheet" type="text/css" href="../cystyle/v/1.0/main.css" />
		<link rel="stylesheet" type="text/css" href="../cystyle/v/1.0/footer.css" />
		<link rel="stylesheet" type="text/css" href="../cystyle/v/1.0/module/tips.css" />
		<link rel="stylesheet" type="text/css" href="../cystyle/v/1.0/edit.css" />
		<link rel="stylesheet" href="../cystyle/v/1.0/module/window.css" />
		<link rel="stylesheet" type="text/css" href="../cystyle/v/1.0/sign.css" />
-->
		
		{block name=layout_css}{/block}
  		{block name=layout_head}{include file='./layout_head.tpl'}{/block}
  	</head>
  	<body>
  		{block name=layout_body}{/block}
		{block name=layout_foot}{include file='./layout_foot.tpl'}{/block}
  	</body>
</html>