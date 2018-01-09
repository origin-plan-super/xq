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
        
        
        
        $result= $model->field('info_id,nav_id,info_title,add_time,edit_time')->limit("$page,$limit")->order($order)->where($where)->select();
        
        $res['count']=$model->order($order)->where($where)->count();
        
        $nav_model=M('nav');
        
        $field='nav_id,nav_title,super_id';
        foreach($result as $key=>$value){
            
            $nav_id=$value['nav_id'];
            $where=[];
            $where['nav_id']=$nav_id;
            $nav=$nav_model->field($field)->where($where)->find();
            
            if(!$nav){
                $nav=[];
                $nav['nav_title']='未配置栏目';
            }
            if($nav['super_id']){
                
                //有上级
                $super_id=$nav['super_id'];
                $where=[];
                $where['nav_id']=$super_id;
                $super_nav=$nav_model->field('nav_id,nav_title')->where($where)->find();
                $nav['nav_title']=$super_nav['nav_title'].' \\ '.$nav['nav_title'];
                
            }
            $result[$key] = array_merge($result[$key],$nav);
            
        }
        
        
        
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
    public function getNavList(){
        
        
        $model=M('nav');
        
        $nav=$model->select();
        
        foreach($nav as $key=>$value){
            
            
            if($value['super_id']){
                $id=$value['super_id'];
                $where=[];
                $where['nav_id']=$id;
                $super_nav=$model->where($where)->find();
                $nav[$key]['nav_title']=$super_nav['nav_title']. ' \\ '.$nav[$key]['nav_title'];
                
            }
            
        }
        $res['msg']=$nav;
        
        
        //=========判断end=========
        
        //=========输出json=========
        echo json_encode($res);
        //=========输出json=========
        
        
        
    }
    
}