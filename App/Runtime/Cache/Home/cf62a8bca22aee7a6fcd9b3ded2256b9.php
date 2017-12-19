<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title><?php echo ($nav["nav_title"]); ?> | <?php echo ($info["info_title"]); ?></title>
	<link rel="stylesheet" type="text/css" href="/xq/Public/vendor/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/xq/Public/vendor/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="/xq/Public/Home/dist/app/app.css" />
	<link rel="stylesheet" type="text/css" href="/xq/Public/Home/dist/info/info.css" />

</head>

<body>
	<div id="app-info">

		<!--顶部图片开始-->
<div class="container">
    <div class="row">
        <div class="col-xs-6">
            <img class="brid" src="/xq/Public/assets/img/xiaoniao.png" />
            <img class="xinque" src="/xq/Public/assets/img/xinque.png" />
        </div>
        <div class="col-xs-6">
            <h3 class="telphone fr">咨询电话:&nbsp;&nbsp;<?php echo ($phone); ?></h3>
        </div>
    </div>
</div>
<!--顶部图片结束-->



<div class="top-nav" id="app">
    <ul class="container">

        <?php if(is_array($navList)): $i = 0; $__LIST__ = $navList;if( count($__LIST__)==0 ) : echo "没有栏目！" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><li class="top-nav-list">

                <?php if($i == 1): if($nav["nav_title"] == $vol["nav_title"]): ?><a href="<?php echo U('Index/index');?>" class='active'><?php echo ($vol["nav_title"]); ?></a>
                        <?php else: ?>
                        <a href="<?php echo U('Index/index');?>"><?php echo ($vol["nav_title"]); ?></a><?php endif; ?>

                    <?php else: ?>

                    <?php if($nav["nav_title"] == $vol["nav_title"]): ?><a href="/xq/index.php/Home/List/index/listname/<?php echo ($vol["nav_id"]); ?>" class="active"><?php echo ($vol["nav_title"]); ?></a>
                        <?php else: ?>
                        <a href="/xq/index.php/Home/List/index/listname/<?php echo ($vol["nav_id"]); ?>" class=""><?php echo ($vol["nav_title"]); ?></a><?php endif; endif; ?>

            </li><?php endforeach; endif; else: echo "没有栏目！" ;endif; ?>
    </ul>
</div>

<!--轮播开始-->
<div class="container ">
    <div id="myCarousel" class="carousel slide ">
        <!-- 轮播（Carousel）指标 -->
        <ol class="carousel-indicators">

            <?php if(is_array($carousel)): $i = 0; $__LIST__ = $carousel;if( count($__LIST__)==0 ) : echo "没有轮播图" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i; if($i-1 == 0): ?><li data-target="#myCarousel" data-slide-to="<?php echo ($i-1); ?>" class="active"></li>
                    <?php else: ?>
                    <li data-target="#myCarousel" data-slide-to="<?php echo ($i-1); ?>"></li><?php endif; endforeach; endif; else: echo "没有轮播图" ;endif; ?>

        </ol>
        <!-- 轮播（Carousel）项目 -->
        <div class="carousel-inner ">

            <?php if(is_array($carousel)): $i = 0; $__LIST__ = $carousel;if( count($__LIST__)==0 ) : echo "没有轮播图" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i; if($i == 1): ?><div class="item active ">
                        <img src="/xq/<?php echo ($vol["carousel_url"]); ?>" style="margin: 0 auto">
                    </div>
                    <?php else: ?>
                    <div class="item ">
                        <img src="/xq/<?php echo ($vol["carousel_url"]); ?>" style="margin: 0 auto">
                    </div><?php endif; endforeach; endif; else: echo "没有轮播图" ;endif; ?>

        </div>
        <!-- 轮播（Carousel）导航 -->

    </div>
</div>
<!--轮播结束-->

<!-- 客服 -->
<link rel="stylesheet" type="text/css" href="/xq/Public/vendor/kefu/css/kefu.css">
<div class="scrollsidebar" id="scrollsidebar">
    <div class="side_content">
        <div class="side_list">
            <div class="side_title">
                <a title="隐藏" class="close_btn">
                    <span>关闭</span>
                </a>
            </div>
            <div class="side_center">
                <div class="custom_service">
                    <p>

                        <a title="点击这里给我发消息" href="tencent://message/?uin=<?php echo ($qq); ?>&Site=&Menu=yes" target="_blank">
                            <img src="http://wpa.qq.com/pa?p=2:8983659:41">
                        </a>
                    </p>
                </div>
                <div class="other">
                    <p>
                        <!-- <img src="/xq/Public/vendor/kefu/images/qrcode.png" width="120" /> -->
                    </p>
                    <p>客户服务热线</p>
                    <p><?php echo ($phone); ?></p>
                </div>
                <div class="msgserver">
                    <p>
                        <a href="/xq/index.php/Home/List/index/listname/about">联系我们</a>
                    </p>
                </div>
            </div>
            <div class="side_bottom"></div>
        </div>
    </div>
    <div class="show_btn">
        <span>在线客服</span>
    </div>
</div>
<script type="text/javascript" src="/xq/Public/vendor/kefu/js/kefu.js"></script>



		<!--首页>新闻中心开始  ===联系我们  开始-->
		<div class="container">
			<div class="row">
				<div class="col-xs-8">
					<div class="panel panel-default app-panel-default">
						<ol class="breadcrumb">
							当前位置：
							<li>
								<a href="<?php echo U('Index/index');?>">首页</a>
							</li>
							<li>
								<a href="/xq/index.php/Home/List/index/listname/<?php echo ($nav["nav_id"]); ?>" id="level_1"><?php echo ($nav["nav_title"]); ?></a>
							</li>
							<li class="active" id="">
								<span id="level_2"><?php echo ($info["info_title"]); ?></span>
							</li>
						</ol>
						<div class="panel-body app-info-body">
							<div class="info-title">
								<div id="info_title">
									<?php echo ($info["info_title"]); ?>
								</div>
							</div>
							<div id="info_time">
								发布时间：<?php echo ($info["add_time"]); ?>
							</div>
							<div id="info_info">
								<?php echo ($info["info_info"]); ?>
							</div>
							<div id="info_content">
								<?php echo ($info["info_content"]); ?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-4">
					<div class="panel panel-default app-panel-default">
						<ol class="breadcrumb">
							<li>
								<span class="panel-title green">联系我们</span>
							</li>
						</ol>

						<div class="panel-body app-list-body app-list-contact app-info-body">
							<img src="/xq/Public/assets/img/lianxiwomen.png" />
							<div class="company-info">

								<?php if(is_array($call_me_rows)): $i = 0; $__LIST__ = $call_me_rows;if( count($__LIST__)==0 ) : echo "联系我们" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><p><?php echo ($vol); ?></p><?php endforeach; endif; else: echo "联系我们" ;endif; ?>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--首页>新闻中心结束  ===联系我们  结束-->

		<!--底部开始-->
		<div class="container-fluid app-bottom-nav">
			<div class="row">
				<div class="col-xs-7 app-bottom-7">
					<p>版权所有&nbsp;2015-2017@上海信雀健康管理有限公司&nbsp;保留所有权利</p>
					<p>沪ICP备15048359号</p>
					<p><?php echo ($call_me_bottom); ?></p>
				</div>
				<div class="col-xs-5 app-bottom-5">
					<img src="/xq/<?php echo ($weixin); ?>" />
					<p>扫描二维码&nbsp;关注我们</p>
				</div>
			</div>
		</div>
		<!--底部结束-->
	</div>

	<script src="/xq/Public/vendor/jquery/jquery.js" type="text/javascript" charset="utf-8"></script>
	<script src="/xq/Public/vendor/bootstrap/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="/xq/Public/vendor/vue/vue.js" type="text/javascript" charset="utf-8"></script>
	<script src="/xq/Public/Home/dist/app/app.js" type="text/javascript" charset="utf-8"></script>
	<script src="/xq/Public/Home/dist/info/info.js" type="text/javascript" charset="utf-8"></script>
	<script>
		$("#info_content *").each(function () {
			$(this).css("white-space", "normal")
		});
	</script>

</body>

</html>