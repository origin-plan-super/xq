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
        
        
        $peonle_count=M('count')->count();
        $this->assign('peonle_count',$peonle_count);
        
        $this -> display();
    }
    
}