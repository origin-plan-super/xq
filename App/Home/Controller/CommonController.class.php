<?php
/**
* +----------------------------------------------------------------------
* 创建日期：2017年11月28日
* +----------------------------------------------------------------------
* https：//github.com/ALNY-AC
* +----------------------------------------------------------------------
* 微信：AJS0314
* +----------------------------------------------------------------------
* QQ:1173197065
* +----------------------------------------------------------------------
* #####需要登录权限的继承本控制器#####
* @author 代码狮
*
*/
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller {
    
    
    //ThinkPHP提供的构造方法
    public function _initialize() {
        
        
        $app_name = M('config')->getField('app_name');
        C('TMPL_PARSE_STRING.__APPNAME__',$app_name);
        
        //找栏目
        $model=M('nav');
        $navList = $model->select();
        $this->assign('navList',$navList);
        
        //找轮播
        $model=M('carousel');
        $carousel = $model->order('sort desc')->select();
        $this->assign('carousel',$carousel);
        
        
        //找信息
        
        $model=M('setting');
        $app_setting=$model->where('setting_name = "app_setting"')->find();
        
        
        $app_setting=json_decode($app_setting['setting'],true);
        if(!empty($app_setting)){
            
            $call_me_bottom= $app_setting['call_me_bottom'];
            $call_me_rows=  $app_setting['call_me_rows'];
            $phone=$app_setting['phone'];
            $weixin=$app_setting['weixin'];
            $qq=$app_setting['qq'];
            $call_me_rows = explode("\n",  $call_me_rows);
            
            
            $this->assign('call_me_bottom',$call_me_bottom);
            $this->assign('call_me_rows',$call_me_rows);
            $this->assign('phone',$phone);
            $this->assign('qq',$qq);
            $this->assign('weixin',$weixin);
        }
        
        
        
        //人数统计
        $model=M('count');
        $add=[];
        $add['add_time']=time();
        $add['edit_time']=time();
        $add['ip']=getIp();
        
        $result=    $model->where('ip = "'.$add['ip'].'"')->find();
        if(!$result){
            $model->add($add,null,true);
        }
        
        
    }
    
    //空操作
    public function _empty(){
        $this->error('页面不存在！',U('Index/index'),3);
    }
    
}