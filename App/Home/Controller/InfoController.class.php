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
class InfoController extends CommonController {
    public function info() {
        
        
        
        
        $info_id=I('get.info_id');
        
        $model=M('info');
        $where=[];
        
        if($info_id=='about'||$info_id=='coop'){
            
            $where['nav_id']=$info_id;
            
        }else{
            
            $where['info_id']=$info_id;
            
        }
        
        
        $info=$model->where($where)->find();
        
        $info['info_content']=  htmlspecialchars_decode($info['info_content']);
        $info['add_time']=  date('Y-m-d H:i:s',$info['add_time']);
        
        //找栏目
        $navModel=M('nav');
        $where=[];
        $where['nav_id']=$info['nav_id'];
        $nav=$navModel->where($where)->find();
        
        $this->assign('info',$info);
        $this->assign('nav',$nav);
        
        $this -> display();
    }
    
    
}