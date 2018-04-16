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
class IndexController extends CommonController {
    public function index() {
        
        $model=M('info');
        
        //找新闻
        $where=[];
        $where['nav_id']='资讯动态';
        $where['super_id']='资讯动态';
        $news=$model->where($where)->order('is_up desc,add_time desc')->limit(6)->select();
        $news=  toTime($news,'Y-m-d');
        $this->assign('news',$news);
        
        
        //关于我们
        $where=[];
        $where['nav_id']='关于我们';
        $where['super_id']='关于我们';
        $about=$model->where($where)->order('add_time desc')->find();
        
        
        $about['info_info']= str_replace(array("\r\n", "\r", "\n"), "</br>", $about['info_info']);
        
        $this->assign('about',$about);
        
        //找服务项目
        $where=[];
        $where['nav_id']='服务项目';
        $where['super_id']='服务项目';
        $service=$model->where($where)->order('is_up desc,add_time desc')->limit(4)->select();
        $service = toTime($service,'Y-m-d');
        $this->assign('service',$service);
        
        //找保健养生
        $where=[];
        $where['nav_id']='健康养生';
        $where['super_id']='健康养生';
        $health=$model->where($where)->order('is_up desc,add_time desc')->limit(4)->select();
        $health=  toTime($health,'Y-m-d');
        $this->assign('health',$health);
        
        //找我们的优势
        $where=[];
        $where['nav_id']='我们的优势';
        $where['super_id']='我们的优势';
        $women=$model->where($where)->order('is_up desc,add_time desc')->limit(4)->select();
        $women=  toTime($women,'Y-m-d');
        $this->assign('women',$women);
        
        
        $model=M('nav');
        $where=[];
        $where['nav_id']='home';
        $nav=$model->find();
        $this->assign('nav',$nav);
        
        $this -> display();
        
    }
    
    
}