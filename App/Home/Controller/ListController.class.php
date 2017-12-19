<?php
/**
* +----------------------------------------------------------------------
* 创建日期：2017年11月17日
* +----------------------------------------------------------------------
* https：//github.com/ALNY-AC
* +----------------------------------------------------------------------
* 微信：AJS0314
* +----------------------------------------------------------------------
* QQ:1173197065
* +----------------------------------------------------------------------
* #####主页控制器#####
* @author 代码狮
*
*/
namespace Home\Controller;
use Think\Controller;
class ListController extends CommonController {
    
    public function index() {
        
        $nav_id=I('get.listname');
        
        //找栏目名
        $model=M('nav');
        $where=[];
        $where['nav_id']=$nav_id;
        $nav=   $model->where($where)->find();
        if($nav['nav_id']=='coop' || $nav['nav_id']=='about'){
            
            $url=U('Info/info','info_id='.$nav['nav_id']);
            echo "<script>top.location.href='$url'</script>";
            return;
        }
        $this->assign('nav',$nav);
        
        //找文章列表
        $model=M('info');
        $where=[];
        $where['nav_id']=$nav_id;
        
        //显示
        //1、查询总的记录数
        $count  =   $model->where($where)->count();
        //2、实例化分页类，传递参数
        $page   =   new \MyPages\Page($count,20);
        $page->setConfig('prev', '上一页'); //第三步：定义提示
        $page->setConfig('next', '下一页'); //第三步：定义提示
        $page->setConfig('last', '末页'); //第三步：定义提示
        $page->setConfig('first', '首页'); //第三步：定义提示
        //3、可选，定制分页按钮的提示文字
        
        //4、通过show输出url连接
        $show   =   $page->show();
        //5、展示数据
        
        $info =  $model->where($where)->limit($page->firstRow,$page->listRows)->order('add_time desc')->select();
        
        
        
        $this->assign('info',$info);
        $this->assign('pages',$show);
        
        
        
        
        
        $this -> display();
    }
    
    
}