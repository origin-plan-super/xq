<?php
/**
* +----------------------------------------------------------------------
* 创建日期：2017年12月18日15:08:28
* 最新修改时间：2017年12月18日15:08:28
* +----------------------------------------------------------------------
* https：//github.com/ALNY-AC
* +----------------------------------------------------------------------
* 微信：AJS0314
* +----------------------------------------------------------------------
* QQ:1173197065
* +----------------------------------------------------------------------
* #####文章控制器#####
* @author 代码狮
*
*/
namespace Admin\Controller;
use Think\Controller;
class InfoController extends CommonController{
    
    
    //显示列表
    public function showList(){
        $this->display();
        
    }
    /**
    * 带条件的查询
    */
    public function getListWhere(){
        
        $get = I('get.');
        $table = strtolower($get['table']);
        //创建模型
        $model = M($table);
        
        //定制分页-start
        $page=$get['page'];
        $limit=$get['limit'];
        
        $page=($page-1)* $limit;
        //定制分页-end
        
        $where=$get['where']?$get['where']:[];
        $order=$get['order']?$get['order']:'add_time desc';
        
        if(!empty($get['key'])){
            
            $key=$get['key'];
            
            $key_where= $get['key_where'] ? $get['key_where']: $table.'_id';
            
            $where[$key_where] = array(
            'like',
            "%".$key."%",
            'OR'
            );
        }
        
        
        $result= $model->limit("$page,$limit")->order($order)->where($where)
        ->field('t1.*,t2.nav_title,t2.nav_id')
        ->table('xq_info as t1,xq_nav as t2')
        ->where('t1.nav_id = t2.nav_id')
        ->select();
        $res['count']=count($result);
        
        
        
        $result = toTime($result);
        
        if($result){
            $res['res']=$res['count'];
            $res['code']=1;
            $res['data']= $result;
            $res['msg']= $result;
        }else{
            $res['code']=-1;
            $res['msg']='没有数据！';
        }
        
        echo json_encode($res);
        
    }
    
    //添加
    public function add(){
        $this->display();
    }
    
    
    //修改
    public function edit(){
        
        
        $info_id=I('get.info_id');
        
        $model=M('info');
        $where=[];
        $where['info_id']=$info_id;
        $info=$model->where($where)->find();
        
        
        $this->assign('info',$info);
        
        
        $this->display();
        
    }
    
}