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
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index() {
        
        $this -> display();
        
    }
    public function home(){
        
        // session_start();//定义session，同一IP登录不累加
        // echo $session_id;
        
        // $peonle_count
        $ip= getIp();
        // $session_id =  session_id();
        
        echo $_SERVER['REMOTE_ADDR'];
        
        
        $this -> display();
    }
    
}