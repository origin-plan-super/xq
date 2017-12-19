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
namespace Origin\Controller;
use Think\Controller;
class IndexController extends CommonController {
    
    public function index() {
        
    }
    
    public function getNewsList(){
        
        $newsModel = M('info');
        
        $where=[];
        $where['nav_id']='news';
        $news = $newsModel->where($where)->order('is_up desc,add_time desc')->limit(6)->select();
        
        $news=  toTime($news,'Y-m-d');
        
        
        if($news){
            
            $res=[];
            $res['res']=count($news);
            $res['msg']=$news;
            $res['count']=count($news);
            
        }else{
            
            $res=[];
            $res['res']=-1;
            $res['msg']=$news;
            $res['count']=count($news);
            
        }
        
        //=========输出json=========
        echo json_encode($res);
        //=========输出json=========
        
    }
    public function getInfo(){
        
        
        $info_id=I('get.info_id');
        
        $infoModel = M('info');
        $where = [];
        $where['info_id'] = $info_id;
        $info = $infoModel->where($where)->find();
        $info['info_content']=  htmlspecialchars_decode($info['info_content']);
        $info['add_time']=  date('Y-m-d H:i:s',$info['add_time']);
        
        $navModel=M('nav');
        $where=[];
        $where['nav_id']=$info['nav_id'];
        $page=$navModel->where($where)->find();
        
        //=========判断=========
        
        if($info){
            $res['res']=1;
            $res['msg']=$info;
            $res['page']=$page;
        }else{
            $res['res']=-1;
            $res['msg']=$info;
        }
        //=========判断end=========
        
        //=========输出json=========
        echo json_encode($res);
        //=========输出json=========
        
        
    }
    
}