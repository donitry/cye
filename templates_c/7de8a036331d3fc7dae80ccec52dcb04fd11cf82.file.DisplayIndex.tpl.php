<?php /* Smarty version Smarty-3.1.18, created on 2015-01-07 11:06:38
         compiled from "/var/web/html/templates/DisplayIndex.tpl" */ ?>
<?php /*%%SmartyHeaderCode:209682187954aca063c455a9-97908349%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7de8a036331d3fc7dae80ccec52dcb04fd11cf82' => 
    array (
      0 => '/var/web/html/templates/DisplayIndex.tpl',
      1 => 1420511611,
      2 => 'file',
    ),
    '0ca44525ef4eef05b483eb95a9611482aa206ba3' => 
    array (
      0 => '/var/web/html/templates/layout_s/layout_main.tpl',
      1 => 1420599673,
      2 => 'file',
    ),
    '3b0b5c01be42e1e55f6e52bc46e9c21dd34179fb' => 
    array (
      0 => '/var/web/html/templates/layout_s/layout_head.tpl',
      1 => 1420511804,
      2 => 'file',
    ),
    '54b0ed6a075f0646d92cc305cc64d20a61195ea4' => 
    array (
      0 => '/var/web/html/templates/layout_s/layout_foot.tpl',
      1 => 1420511716,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '209682187954aca063c455a9-97908349',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54aca06407d025_56046250',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54aca06407d025_56046250')) {function content_54aca06407d025_56046250($_smarty_tpl) {?><!DOCTYPE html>
<html>
  	<HEAD>
		<meta http-equiv="Content-Type" content="text/html; charset=GBK">
  		<title>默认页面标题</title>
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
		
		
  		<?php /*  Call merged included template "./layout_head.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('./layout_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '209682187954aca063c455a9-97908349');
content_54aca2bed0cb81_97751382($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "./layout_head.tpl" */?>
  	</head>
  	<body>
  		<?php echo CheckUserInfo(array(),$_smarty_tpl);?>

		<?php /*  Call merged included template "./layout_foot.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('./layout_foot.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '209682187954aca063c455a9-97908349');
content_54aca2beeb9e02_07823499($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "./layout_foot.tpl" */?>
  	</body>
</html><?php }} ?>
<?php /* Smarty version Smarty-3.1.18, created on 2015-01-07 11:06:38
         compiled from "/var/web/html/templates/layout_s/layout_head.tpl" */ ?>
<?php if ($_valid && !is_callable('content_54aca2bed0cb81_97751382')) {function content_54aca2bed0cb81_97751382($_smarty_tpl) {?>
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

</script>
<div id="head_top" class="ui_head_nav center clearfix">
	<!--
	<div class="ui_head_nav_scroll clearfix">
	    <ul>
	        <li><a>测试</a></li>
	        <li><a>测试</a></li>
	    </ul>
		<div class="ui_head_nav_serch clearfix">
			<form name="loginCye" method="post" action=<?php echo $_smarty_tpl->tpl_vars['form_submit']->value;?>
 onSubmit="return InputCheck(this)">
					<div class="controls-s ui-form-item">
						<b class="ico ico-serch"></b>
						<input type="text" tabindex="1" name="user_name" placeholder="搜索..." class="bg-translucentb3" required />
					</div>
			</form>
		</div>
	</div>
	-->
</div><?php }} ?>
<?php /* Smarty version Smarty-3.1.18, created on 2015-01-07 11:06:38
         compiled from "/var/web/html/templates/layout_s/layout_foot.tpl" */ ?>
<?php if ($_valid && !is_callable('content_54aca2beeb9e02_07823499')) {function content_54aca2beeb9e02_07823499($_smarty_tpl) {?><link rel="stylesheet" type="text/css" href="../c5style/v/1.0/footer.css" />
<div class="ui-footer" >
    <div class="ui-footer-hd clearfix">
        <div class="grid zbj-grid">
        	<!--
            <dl class="item-new">
                <dt>新手指南</dt>
                <dd><a rel="nofollow" target="_blank" href="https://login.zhubajie.com/register/">注册新用户</a></dd>
                <dd><a rel="nofollow" target="_blank" href="http://www.zhubajie.com/main/guide/">雇主入门</a></dd>
                <dd><a rel="nofollow" target="_blank" href="http://fws.zhubajie.com/">服务商入门</a></dd>
                <dd><a rel="nofollow" target="_blank" href="http://chengxin.zhubajie.com/report/rule-g-2317">规则中心</a></dd>
            </dl>
            <dl class="item-buyer">
                <dt>我是雇主</dt>
                <dd><a rel="nofollow" target="_blank" href="http://task.zhubajie.com/pub/?from_cid=10001">发布需求</a></dd>
                <dd><a target="_blank" href="http://home.zhubajie.com/">挑选服务商</a></dd>
                <dd><a target="_blank" href="http://sj.zhubajie.com/">购买设计作品</a></dd>
                <dd><a target="_blank" href="http://kuaiyin.zhubajie.com/">成品印刷</a></dd>
            </dl>
            <dl class="item-safe">
                <dt>交易保障</dt>
                <dd><a rel="nofollow" target="_blank" href="http://task.zhubajie.com/xiaobao/intro">猪八戒担保交易</a></dd>
                <dd><a rel="nofollow" target="_blank" href="http://chengxin.zhubajie.com/">争议仲裁</a></dd>
                <dd><a rel="nofollow" target="_blank" href="http://quanzi.zhubajie.com/main/topic-qid-7908-tid-382641">雇主防骗</a></dd>
                <dd><a rel="nofollow" target="_blank" href="http://quanzi.zhubajie.com/main/topic-qid-1134-tid-382782">服务商防骗</a></dd>
            </dl>
            <dl class="item-saler">
                <dt>我是服务商</dt>
                <dd><a rel="nofollow" target="_blank" href="http://www.zhubajie.com/active/wikeyentrance">免费开店</a></dd>
                <dd><a target="_blank" href="http://www.zhubajie.com/vip/club/">加入签约服务商</a></dd>
                <dd><a target="_blank" href="http://edu.zhubajie.com/">猪八戒大学</a></dd>
                <dd><a rel="nofollow" target="_blank" href="http://fws.zhubajie.com/">服务商指南</a></dd>
            </dl>
            <dl class="item-app">
                <dt>放心交易</dt>
                <dd>
                    <a rel="nofollow" href="http://u.zhubajie.com/newsecurity/intro/" target="_blank" title="放心交易">
                        <img src="/v5style/t5s/uc/images/xb-safe.png" alt="放心交易">
                    </a>
                </dd>
            </dl>
            <dl class="item-contact">
                <dt>400-188-6666</dt>
                <dd class="item-time">周一至周日9:00 - 23:00</dd>
                <dd class="item-chat"><a rel="nofollow" target="_blank" href="http://livechat.zhubajie.com/LR/Chatpre.aspx?id=PCF83427900&skid=24&sk=%u6211%u8981%u53d1%u9700%u6c42&e=%u6211%u8981%u53d1%u9700%u6c42&p=&r=&e=%e5%8f%91%e5%b8%83%e9%9c%80%e6%b1%82%e6%a1%86%e5%92%a8%e8%af%a2"><i class="ui-ico ui-ico-cs-h"></i></a></dd>
                <dd class="item-sns">
                    <a rel="nofollow" target="_blank" href="http://weibo.com/zhubajiewang"><i class="ui-ico ui-ico-sina"></i></a>
                    <a rel="nofollow" target="_blank" href="http://t.qq.com/zhubajie"><i class="ui-ico ui-ico-qq"></i></a>
                    <a rel="nofollow" target="_blank" href="http://t.sohu.com/u/108262596"><i class="ui-ico ui-ico-sohu"></i></a>
                </dd>
            </dl>
            -->
        </div>
    </div>
    <!--
    <div class="grid zbj-grid ui-footer-bd">
        <div class="ui-footer-sitelink">
            <a rel="nofollow" href="http://www.zhubajie.com/about/index.html" target="_blank">关于我们</a><span class="split">|</span>
            <a rel="nofollow" href="http://www.zhubajie.com/about/contactus.html" target="_blank">联系方式</a><span class="split">|</span>
            <a rel="nofollow" href="http://zt.zhubajie.com/ztold/adhelp/" target="_blank">广告服务</a><span class="split">|</span>
            <a href="http://news.zhubajie.com" target="_blank">新闻中心</a><span class="split">|</span>
            <a href="http://www.zhubajie.com/main/map/" target="_blank">网站地图</a><span class="split">|</span>
            <a rel="nofollow" href="http://www.zhubajie.com/zizhi/gszz.html" target="_blank">公司资质</a><span class="split">|</span>
            <a rel="nofollow" href="http://job.zhubajie.com/" target="_blank">加入我们</a><span class="split">|</span>
            <a rel="nofollow" href="http://www.zhubajie.com/about/payment.html" target="_blank">支付方式</a><span class="split">|</span>
            <a rel="nofollow" href="http://zt.zhubajie.com/ztold/zbjhezuo/" target="_blank">我也要与猪八戒网合作</a><span class="split">|</span>
            <a href="http://www.zhubajie.com/abc123/index.html" target="_blank">简版猪八戒</a><span class="split">|</span>
            <a target="_blank" href="http://search.zhubajie.com/charlist/index.html">热门服务</a>
        </div>
                <p class="gray ui-footer-copyright">
            Copyright 2005-2014 zhubajie.com  版权所有  <a rel="nofollow" href="http://www.miitbeian.gov.cn" target="_blank" rel="nofollow">渝ICP备10202274-1号</a> <a rel="nofollow" href="http://www.cqca.gov.cn/" target="_blank" rel="nofollow">渝B2-20080005</a>
        </p>
        <div class="ui-footer-gov">
            <a href="http://www.cqgseb.cn/ztgsgl/WebMonitor/GUILayer/eImgMana/dztbInfo.aspx?sfdm=120090611153726046127" target="_blank" rel="nofollow">
                <img src="/v5style/r/page/ebs.png" alt="市场监督管理局企业主体身份公示"><span class="item-txt">工商网监电子标识</span>
            </a>
            <a rel="nofollow" href="http://www.cqgseb.cn/ztgsgl/WebSiteMonitoring/WebUI/XFWQ/Index.aspx?xh=19" target="_blank" rel="nofollow">
                <img src="/v5style/r/page/xfz.jpg" alt="消费维权服务"><span class="item-txt">消费者维权服务站</span>
            </a>
            <a rel="nofollow" href="http://kxlogo.knet.cn/verifyseal.dll?sn=e13091311010042477ead0000000" target="_blank" rel="nofollow">
                <img src="/v5style/t5s/lib/img/time_cnnic.jpg" width="128" height="47" alt="可信网站身份验证"><span class="item-txt">可信网站身份验证</span>
            </a>
        </div>
    </div>
    -->
</div><?php }} ?>
