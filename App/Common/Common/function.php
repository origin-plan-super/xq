<?php

/**
* 将时间戳转换为能看的懂的
* 传入数组型
*/
function toTime($arr,$code='Y-m-d H:i:s'){
    
    
    foreach ($arr as $key => $value) {
        
        if(!empty($value['add_time'])){
            $arr[$key]['add_time']=date($code,$value['add_time']);
        }
        if(!empty($value['edit_time'])){
            $arr[$key]['edit_time']=date($code,$value['edit_time']);
        }
    }
    
    return $arr;
    
}

//设置网络请求配置
function _request($curl,$https=true,$method='GET',$data=null){
    // 创建一个新cURL资源
    $ch = curl_init();
    
    // 设置URL和相应的选项
    curl_setopt($ch, CURLOPT_URL, $curl);    //要访问的网站
    curl_setopt($ch, CURLOPT_HEADER, false);    //启用时会将头文件的信息作为数据流输出。
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  //将curl_exec()获取的信息以字符串返回，而不是直接输出。
    
    if($https){
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  //false 禁止 cURL 验证对等证书（peer's certificate）。
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, true);  //验证主机
    }
    if($method == 'POST'){
        curl_setopt($ch, CURLOPT_POST, true);  //发送 POST 请求
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);  //全部数据使用HTTP协议中的 "POST" 操作来发送。
    }
    
    
    // 抓取URL并把它传递给浏览器
    $content = curl_exec($ch);
    if ($content  === false) {
        return "网络请求出错: " . curl_error($ch);
        exit();
    }
    //关闭cURL资源，并且释放系统资源
    curl_close($ch);
    // http://127.0.0.1:12138/wShop/index.php/home/test/index
    return $content;
}




/**
* 获取用户的openid
* @param  string $openid [description]
* @return [type]         [description]
*/
function baseAuth($redirect_url){
    
    $appid='wx9b7ab18e61268efb';
    $appsecret='bcd46807674b9448617438256db6cada';
    //===
    // $appid='wxc5919bd34da8b695';
    // $appsecret='87e678bca54b92f8c7213e1ba9f12963';
    
    
    //1.准备scope为 snsapi_base 网页授权页面 snsapi_userinfo
    
    $baseurl = urlencode($redirect_url);
    $snsapi_base_url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$appid.'&redirect_uri='.$baseurl.'&response_type=code&scope=snsapi_userinfo&state=YQJ#wechat_redirect';
    
    //2.静默授权,获取code
    //页面跳转至redirect_uri/?code=CODE&state=STATE
    $code = $_GET['code'];
    if( !isset($code) ){
        header('Location:'.$snsapi_base_url);
    }
    
    
    //3.通过code换取网页授权access_token和openid
    $curl = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$appid.'&secret='.$appsecret.'&code='.$code.'&grant_type=authorization_code';
    $content =_request($curl);
    $result = json_decode($content,true);
    
    return $result;
}

/**
* +-----------------------------------------------------------------------------------------
* 删除目录及目录下所有文件或删除指定文件
* +-----------------------------------------------------------------------------------------
* @param str $path   待删除目录路径
* @param int $delDir 是否删除目录，1或true删除目录，0或false则只删除文件保留目录（包含子目录）
* +-----------------------------------------------------------------------------------------
* @return bool 返回删除状态
* +-----------------------------------------------------------------------------------------
*/
function delFile($path, $delDir = false) {
    if (is_array($path)) {
        foreach ($path as $subPath)
        delFile($subPath, $delDir);
    }
    if (is_dir($path)) {
        $handle = opendir($path);
        if ($handle) {
            while (false !== ( $item = readdir($handle) )) {
                if ($item != "." && $item != "..")
                    is_dir("$path/$item") ? delFile("$path/$item", $delDir) : unlink("$path/$item");
            }
            closedir($handle);
            if ($delDir)
                return rmdir($path);
        }
    } else {
        if (file_exists($path)) {
            return unlink($path);
        } else {
            return false;
        }
    }
    clearstatcache();
}


//判断字符串的开头
function startwith($str,$pattern) {
    if(strpos($str,$pattern) === 0)
    return true;
    else
        return false;
}


/**
* 设置重复提交的验证码
* Discount
* =================================
* 创建日期：2017年11月30日16:57:28
* 作者：代码狮
* github：https://github.com/ALNY-AC
* 微信:AJS0314
* QQ:1173197065
* 留言：后来者想了解详细情况的请联系作者。
* =================================
* 不需要传任何参数，调用就行
* @return String $_code 返回生成的唯一验证码
*/
function setRepeat(){
    
    //表单唯一提交验证码
    $_code=md5(rand().__KEY__);
    session('_repeat_code',$_code);
    //表单唯一提交验证码end
    
    return $_code;
}


/**
* 验证是否重复提交
* Discount
* =================================
* 创建日期：2017年11月30日16:57:28
* 作者：代码狮
* github：https://github.com/ALNY-AC
* 微信:AJS0314
* QQ:1173197065
* 留言：后来者想了解详细情况的请联系作者。
* =================================
*不传参数，自动获取session，当判断重复提交后，直接退出php脚本
*/
function isRepeat(){
    
    $_user_code=I('post._repeat_code');
    if(empty($_user_code)){
        //如果没有这个玩意，就直接退出
        // echo '缺少关键参数！请返回重试！';
        return false;
    }else{
        //有表单提交唯一验证码
        $_code=session('_repeat_code');
        if($_code !== $_user_code){
            //这里不相等，所以需要重新提交
            // echo '重复提交数据！请返回重试！';
            return false;
        }
    }
    session('_repeat_code',null);
    return true;
    
}

/**
* 创建目录
* set_mkdir
* =================================
* 创建日期：2017年12月16日11:31:58
* 作者：代码狮
* github：https://github.com/ALNY-AC
* 微信:AJS0314
* QQ:1173197065
* 留言：后来者想了解详细情况的请联系作者。
* =================================
*可以创建多级目录
*/
function set_mkdir($src) {
    //创建目录
    if (is_dir($src)) {
        //存在不创建
        return true;
    } else {
        //第三个参数是“true”表示能创建多级目录，iconv防止中文目录乱码
        $res = mkdir(iconv("UTF-8", "GBK", $src), 0777, true);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }
}

function getIp() {
    if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
        $ip = getenv("HTTP_CLIENT_IP");
    else
        if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
            $ip = getenv("HTTP_X_FORWARDED_FOR");
        else
            if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
                $ip = getenv("REMOTE_ADDR");
            else
                if (isset ($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
                    $ip = $_SERVER['REMOTE_ADDR'];
                else
                    $ip = "unknown";
                return ($ip);
            }