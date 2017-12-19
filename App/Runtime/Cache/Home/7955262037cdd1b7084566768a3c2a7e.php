<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title><?php echo ($nav["nav_title"]); ?></title>
	<link rel="stylesheet" type="text/css" href="/xq/Public/vendor/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/xq/Public/vendor/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="/xq/Public/Home/dist/app/app.css" />
	<link rel="stylesheet" type="text/css" href="/xq/Public/Home/dist/list/list.css" />
</head>

<body>
	<div id="app-list">

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


		<!--首页>新闻中心开始  ===联系我们  开始-->
		<div class="container">
			<div class="row">
				<div class="col-xs-8">
					<ol class="breadcrumb">
						当前位置：
						<li>
							<a href="<?php echo U('Index/index');?>">首页</a>
						</li>
						<li class="active"><?php echo ($nav["nav_title"]); ?></li>
					</ol>
					<div class="panel panel-default app-panel-default">

						<div class="panel-body app-list-body">
							<ul>

								<?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "没有文章！" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><li>
										<div class="row">
											<div class="col-xs-3">
												<img src="/xq/<?php echo ($vol["info_head"]); ?>" />
											</div>
											<div class="col-xs-9 app-list-10">
												<a href="/xq/index.php/Home/Info/info/info_id/<?php echo ($vol["info_id"]); ?>">
													<p class="app-sm-title"><?php echo ($vol["info_title"]); ?></p>
													<p class="app-sm-test-list"><?php echo ($vol["info_info"]); ?>
														<span class="fr text">
															<span class="cursor">查看全文>></span>
														</span>
													</p>

												</a>
											</div>
										</div>
									</li><?php endforeach; endif; else: echo "没有文章！" ;endif; ?>

							</ul>
						</div>
					</div>



					<!--分页开始-->
					<div class="page-all">
						<?php echo ($pages); ?>
					</div>
					<!--分页结束-->
				</div>
				<div class="col-xs-4">

					<ol class="breadcrumb">
						<li>
							<a href="../about/about.html">
								<span class="green">联系我们</span>
							</a>
						</li>

					</ol>
					<div class="panel panel-default app-panel-default">
						<div class="panel-body app-list-body app-list-contact app-list-body app-info-body">
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
</body>

</html>