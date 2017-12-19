<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>首页</title>
	<link rel="stylesheet" type="text/css" href="/xq/Public/vendor/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/xq/Public/vendor/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="/xq/Public/Home/dist/app/app.css" />
	<link rel="stylesheet" type="text/css" href="/xq/Public/Home/dist/index/index.css" />
</head>

<body>
	<div id="app-index">


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

                        <!-- <a title="点击这里给我发消息" href="tencent://message/?uin=<?php echo ($qq); ?>&Site=&Menu=yes" target="_blank"> -->
                        <a title="点击这里给我发消息" href="tencent://Message/?Uin=<?php echo ($qq); ?>&websiteName=q-zone.qq.com&Menu=yes" target="_blank">

                            <img src="http://wpa.qq.com/pa?p=2:<?php echo ($qq); ?>:41">
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


		<!--新闻动态和关于我们开始-->
		<div class="container" id="newsApp">
			<div class="row">
				<div class="col-xs-8">
					<div class="panel panel-default">
						<div class="panel-heading">
							<a href="/xq/index.php/Home/List/index/listname/news">
								<h3 class="panel-title">新闻动态</h3>
							</a>
							<a href="/xq/index.php/Home/List/index/listname/news">
								<span class="gray fr">更多>></span>
							</a>
						</div>
						<div class="panel-body app-panel-body">
							<!--面板里边左边的图片-->
							<div class="row">
								<div class="col-xs-4">
									<a href="/xq/index.php/Home/Info/info/info_id/<?php echo ($news[0]["info_id"]); ?>">
										<img src="/xq/<?php echo ($news[0]["info_head"]); ?>" />
									</a>
								</div>
								<div class="col-xs-8 app-8">
									<?php if(is_array($news)): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "没有新闻" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><div class="list">
											<div class="list-head app-line">
												<a href='/xq/index.php/Home/Info/info/info_id/<?php echo ($vol["info_id"]); ?>'><?php echo ($vol["info_title"]); ?></a>
											</div>
											<div class="list-body"><?php echo ($vol["info_info"]); ?></div>
											<div class="list-footer fr"><?php echo ($vol["add_time"]); ?></div>
										</div><?php endforeach; endif; else: echo "没有新闻" ;endif; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<a href="/xq/index.php/Home/Info/info/info_id/about">
								<h3 class="panel-title">关于我们</h3>
							</a>
						</div>
						<div class="panel-body app-panel-body">
							<?php echo ($about["info_info"]); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--新闻动态和关于我们结束-->
		<!--服务项目开始-->
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="panel panel-default">
						<a href="/xq/index.php/Home/List/index/listname/service">
							<div class="panel-heading panel-green">
								<span class="panel-title panel-center-title">服务项目</span>
							</div>
						</a>
						<div class="panel-body app-panel-body-service">
							<div class="row">
								<?php if(is_array($service)): $i = 0; $__LIST__ = $service;if( count($__LIST__)==0 ) : echo "没有服务项目" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><div class="col-xs-3 app-col-xs-3">
										<a href="/xq/index.php/Home/Info/info/info_id/<?php echo ($vol["info_id"]); ?>">
											<div class="server-img-test">
												<img src="/xq<?php echo ($vol["info_head"]); ?>" />
												<span class="green"><?php echo ($vol["info_title"]); ?></span>
											</div>
										</a>

										<div class="info-content">
											<?php echo (htmlspecialchars_decode($vol["info_content"])); ?>
										</div>

									</div><?php endforeach; endif; else: echo "没有服务项目" ;endif; ?>


							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--服务项目结束-->
		<!--保健养生开始-->
		<div class="container">
			<div class="row">
				<div class="col-xs-6">
					<!--保健专题开始-->
					<div class="panel panel-default">
						<div class="panel-heading">
							<a href="/xq/index.php/Home/List/index/listname/health">
								<h3 class="panel-title">保健专题</h3>
							</a>
							<a href="/xq/index.php/Home/List/index/listname/health">
								<span class="gray fr">更多>></span>
							</a>
						</div>
						<div class="panel-body app-panel-body-health">
							<div class="row">
								<div class="col-xs-5">
									<a href="/xq/index.php/Home/Info/info/info_id/<?php echo ($health[0]["info_id"]); ?>">
										<img src="/xq/<?php echo ($health[0]["info_head"]); ?>" />
									</a>
								</div>
								<div class="col-xs-7 app-7">

									<?php if(is_array($health)): $i = 0; $__LIST__ = $health;if( count($__LIST__)==0 ) : echo "没有文章！" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><a href="/xq/index.php/Home/Info/info/info_id/<?php echo ($vol["info_id"]); ?>">
											<p class="app-line"><?php echo ($vol["info_title"]); ?></p>
										</a><?php endforeach; endif; else: echo "没有文章！" ;endif; ?>

								</div>
							</div>
						</div>
					</div>
					<!--保健专题结束-->
				</div>
				<div class="col-xs-6">
					<!--养生专题开始-->
					<div class="panel panel-default">
						<div class="panel-heading">
							<a href="/xq/index.php/Home/List/index/listname/health">
								<h3 class="panel-title">养生专题</h3>
							</a>
							<a href="/xq/index.php/Home/List/index/listname/health">
								<span class="gray fr">更多>></span>
							</a>
						</div>
						<div class="panel-body app-panel-body-health">
							<div class="row">
								<div class="col-xs-5">
									<a href="/xq/index.php/Home/Info/info/info_id/<?php echo ($health[0]["info_id"]); ?>">
										<img src="/xq/<?php echo ($health[0]["info_head"]); ?>" />
									</a>
								</div>
								<div class="col-xs-7 app-7">
									<?php if(is_array($health)): $i = 0; $__LIST__ = $health;if( count($__LIST__)==0 ) : echo "没有文章！" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><a href="/xq/index.php/Home/Info/info/info_id/<?php echo ($vol["info_id"]); ?>">
											<p class="app-line"><?php echo ($vol["info_title"]); ?></p>
										</a><?php endforeach; endif; else: echo "没有文章！" ;endif; ?>
								</div>
							</div>
						</div>
					</div>
					<!--养生专题结束-->
				</div>
			</div>
		</div>
		<!--保健养生结束-->

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
	<script src="/xq/Public/Home/dist/index/index.js" type="text/javascript" charset="utf-8"></script>
</body>

</html>