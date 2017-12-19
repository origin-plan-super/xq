<?php
/**
* +----------------------------------------------------------------------
* 创建日期：2017年12月19日14:06:16
* 最新修改时间：2017年12月19日14:06:16
* +----------------------------------------------------------------------
* https：//github.com/ALNY-AC
* +----------------------------------------------------------------------
* 微信：AJS0314
* +----------------------------------------------------------------------
* QQ:1173197065
* +----------------------------------------------------------------------
* #####配置其他信息控制器#####
* @author 代码狮
*
*/
namespace Admin\Controller;
use Think\Controller;
class SettingsController extends CommonController{
    
    //主
    public function index(){
        
        $call_me_bottom= F('call_me_bottom');
        $call_me_rows=  F('call_me_rows');
        $phone=F('phone');
        $weixin=F('weixin');
        $qq=F('qq');
        
        
        $this->assign('call_me_bottom',$call_me_bottom);
        $this->assign('call_me_rows',$call_me_rows);
        $this->assign('phone',$phone);
        $this->assign('qq',$qq);
        $this->assign('weixin',$weixin);
        $this->display();
    }
    
    public function save(){
        
        
        $post=I('post.save');
        
        
        $call_me_bottom=$post['call_me_bottom'];
        $call_me_rows=$post['call_me_rows'];
        $phone=$post['phone'];
        $weixin=$post['weixin'];
        $qq=$post['qq'];
        
        F('call_me_bottom',$call_me_bottom);
        F('call_me_rows',$call_me_rows);
        F('phone',$phone);
        F('qq',$qq);
        F('weixin',$weixin);
        
        
        $res=[];
        $res['res']=1;
        $res['msg']=F();
        //=========输出json=========
        echo json_encode($res);
        //=========输出json=========
        
    }
    
}