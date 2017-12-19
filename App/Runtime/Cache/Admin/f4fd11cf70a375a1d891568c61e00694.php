<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>账户配置</title>
    <!-- css -->
<link href="/xq/Public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="/xq/Public/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="/xq/Public/vendor/animate/animate.css" rel="stylesheet" type="text/css">
<link href="/xq/Public/vendor/spinkit/spinkit.css" rel="stylesheet" type="text/css">
<link href="/xq/Public/vendor/layui/css/layui.css" rel="stylesheet" type="text/css">


<!-- js -->
<script src="/xq/Public/vendor/jquery/jquery.js" type="text/javascript" charset="utf-8"></script>
<script src="/xq/Public/vendor/vue/vue.js"></script>
<script src="/xq/Public/vendor/layer/layer.js"></script>
<script src="/xq/Public/vendor/layui/layui.js"></script>

<script src="/xq/Public/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--  -->
<script src='/xq/Public/vendor/mTips/mTips.js'></script>

<script src="/xq/Public/Admin/dist/tool/tool.js"></script>

<style>
    /* .save-tool {
        position: fixed;
        right: 10px;
        bottom: 80px;
    }

    .save-tool .layui-btn {
        background-color: rgba(0, 0, 0, 0.8);
        height: 50px;
        line-height: 50px;
        text-align: center;
        color: #eee;
    } */

    body {}

    .layui-black {
        /* border-radius: 1px; */
        color: #fff;
        text-align: center;
        background-color: #41464b;
        background-color: #666;
        transition: all 0.2s;
    }


    .layui-black:hover {
        background-color: #41464b;
        background-color: #666;
        opacity: 1;
        box-shadow: 0 2px 6px 0 rgba(0, 0, 0, .5);
    }

    .layui-btn-danger {
        background-color: rgb(253, 51, 51);
    }

    .layui-btn-danger:hover {
        background-color: rgb(253, 51, 51);
        box-shadow: 0 2px 6px 0 rgba(253, 51, 51, .5);
    }

    .form-black .layui-laypage .layui-laypage-curr .layui-laypage-em {
        background-color: #41464b;
        background-color: #666;
        box-shadow: 0 2px 6px 0 rgba(0, 0, 0, .5);
    }

    .form-black .layui-laypage a:hover {
        color: #777;
        text-shadow: 0 0 2px rgba(0, 0, 0, .2);
    }

    .layui-link {
        background-color: transparent;
        color: #333333;
    }

    .tooltip {
        z-index: 99999;
    }

    .layui-form-checked[lay-skin=primary] i {
        border-color: #41464b;
        border-color: #666;
        background-color: #41464b;
        background-color: #666;
        color: #fff;
    }

    .layui-form-checkbox[lay-skin=primary]:hover i {
        border-color: #41464b;
        border-color: #666;
        color: #fff;
    }

    .layui-ss {
        text-align: right;
    }

    .layui-input-sm {
        height: 30px;
        line-height: 30px;
        padding: 0 10px;
        font-size: 12px;
    }
</style>

<script>

    function getLocalTime(nS) {
        return new Date(parseInt(nS) * 1000).toLocaleString().replace(/:\d{1,2}$/, ' ');
    }

    function saveInfo(save, f) {
        (function () {
            var url = '/xq/index.php/Admin/Use/saveField';
            var obj = save;
            var fun = function (res) {

                try {
                    res = JSON.parse(res);
                } catch (error) {
                    //转换错误
                    layer.msg('异步接口出错！', {
                        anim: 6
                    });
                    return
                }


                if (f != null) {
                    f(res);
                    return;
                }
                if (res.res > 0) {
                    layer.msg('修改成功！');
                } else {
                    layer.msg('修改失败：' + res.msg, {
                        anim: 6
                    });
                }


            };
            $.post(url, obj, fun);

        }());

    }
    function del(delObj, f) {

        (function () {

            var url = '/xq/index.php/Admin/Use/del';
            var obj = delObj;
            var fun = function (res) {

                try {
                    res = JSON.parse(res);
                } catch (error) {
                    //转换错误
                    layer.msg('异步接口出错！', {
                        anim: 6
                    });
                    return
                }
                if (res.res > 0) {
                    layer.msg('删除成功！');
                    if (f != null) {
                        f(res);
                    }

                } else {
                    layer.msg('删除失败：' + res.msg, {
                        anim: 6
                    });
                }
            };
            $.post(url, obj, fun);

        }());
    }

    function delAll(obj, f) {

        (function () {

            var url = '/xq/index.php/Admin/Use/delAll';
            var fun = function (res) {

                try {
                    res = JSON.parse(res);
                } catch (error) {
                    //转换错误
                    layer.msg('异步接口出错！', {
                        anim: 6
                    });
                    return
                }

                if (res.res > 0) {
                    layer.msg('删除成功！');
                    if (f != null) {
                        f(res);
                    }


                } else {
                    layer.msg('删除失败：' + res.msg, {
                        anim: 6
                    });
                }
            };
            $.post(url, obj, fun);

        })();

    }
    //将字符串按照格式转化成数组或者json
    function strToArr(str, code, f) {

        var array = str.split(code);
        var arr = [];

        for (var i = 0; i < array.length; i++) {
            var element = array[i];
            if (f != null) {

                if (typeof (f) == 'string') {
                    arr[i] = {};
                    arr[i][f] = element;

                } else {
                    arr[i] = f(i, arr, element);
                }


            } else {
                arr[i] = element;
            }
        }
        return arr;

    }


    //回调控制
    var callback = function () {
        this._no;
        this._yes;
        this.yes = function (f) {
            this._yes = f;
            return this;
        };
        this.no = function (f) {
            this._no = f;
            return this;
        };
    }

    function addAll(obj) {

        var _callback = new callback();

        (function () {

            var url = '/xq/index.php/Admin/Use/addAll';
            var fun = function (res) {

                try {
                    res = JSON.parse(res);
                    _callback._yes(res);
                } catch (error) {
                    //异步接口出错！
                    e(error);
                    _callback._no(res);
                }

            };
            $.post(url, obj, fun);

        }());

        return _callback;

    }

    var HtmlUtil = {
        /*1.用浏览器内部转换器实现html转码*/
        htmlEncode: function (html) {
            //1.首先动态创建一个容器标签元素，如DIV
            var temp = document.createElement("div");
            //2.然后将要转换的字符串设置为这个元素的innerText(ie支持)或者textContent(火狐，google支持)
            (temp.textContent != undefined) ? (temp.textContent = html) : (temp.innerText = html);
            //3.最后返回这个元素的innerHTML，即得到经过HTML编码转换的字符串了
            var output = temp.innerHTML;
            temp = null;
            return output;
        },
        /*2.用浏览器内部转换器实现html解码*/
        htmlDecode: function (text) {
            //1.首先动态创建一个容器标签元素，如DIV
            var temp = document.createElement("div");
            //2.然后将要转换的字符串设置为这个元素的innerHTML(ie，火狐，google都支持)
            temp.innerHTML = text;
            //3.最后返回这个元素的innerText(ie支持)或者textContent(火狐，google支持)，即得到经过HTML解码的字符串了。
            var output = temp.innerText || temp.textContent;
            temp = null;
            return output;
        }
    };



    function Base64() {

        // private property  
        _keyStr = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
        // public method for encoding  
        this.encode = function (input) {
            var output = "";
            var chr1, chr2, chr3, enc1, enc2, enc3, enc4;
            var i = 0;
            input = _utf8_encode(input);
            while (i < input.length) {
                chr1 = input.charCodeAt(i++);
                chr2 = input.charCodeAt(i++);
                chr3 = input.charCodeAt(i++);
                enc1 = chr1 >> 2;
                enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
                enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
                enc4 = chr3 & 63;
                if (isNaN(chr2)) {
                    enc3 = enc4 = 64;
                } else if (isNaN(chr3)) {
                    enc4 = 64;
                }
                output = output +
                    _keyStr.charAt(enc1) + _keyStr.charAt(enc2) +
                    _keyStr.charAt(enc3) + _keyStr.charAt(enc4);
            }
            return output;
        }

        // public method for decoding  
        this.decode = function (input) {
            var output = "";
            var chr1, chr2, chr3;
            var enc1, enc2, enc3, enc4;
            var i = 0;
            input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");
            while (i < input.length) {
                enc1 = _keyStr.indexOf(input.charAt(i++));
                enc2 = _keyStr.indexOf(input.charAt(i++));
                enc3 = _keyStr.indexOf(input.charAt(i++));
                enc4 = _keyStr.indexOf(input.charAt(i++));
                chr1 = (enc1 << 2) | (enc2 >> 4);
                chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
                chr3 = ((enc3 & 3) << 6) | enc4;
                output = output + String.fromCharCode(chr1);
                if (enc3 != 64) {
                    output = output + String.fromCharCode(chr2);
                }
                if (enc4 != 64) {
                    output = output + String.fromCharCode(chr3);
                }
            }
            output = _utf8_decode(output);
            return output;
        }

        // private method for UTF-8 encoding  
        _utf8_encode = function (string) {
            string = string.replace(/\r\n/g, "\n");
            var utftext = "";
            for (var n = 0; n < string.length; n++) {
                var c = string.charCodeAt(n);
                if (c < 128) {
                    utftext += String.fromCharCode(c);
                } else if ((c > 127) && (c < 2048)) {
                    utftext += String.fromCharCode((c >> 6) | 192);
                    utftext += String.fromCharCode((c & 63) | 128);
                } else {
                    utftext += String.fromCharCode((c >> 12) | 224);
                    utftext += String.fromCharCode(((c >> 6) & 63) | 128);
                    utftext += String.fromCharCode((c & 63) | 128);
                }

            }
            return utftext;
        }

        // private method for UTF-8 decoding  
        _utf8_decode = function (utftext) {
            var string = "";
            var i = 0;
            var c = c1 = c2 = 0;
            while (i < utftext.length) {
                c = utftext.charCodeAt(i);
                if (c < 128) {
                    string += String.fromCharCode(c);
                    i++;
                } else if ((c > 191) && (c < 224)) {
                    c2 = utftext.charCodeAt(i + 1);
                    string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
                    i += 2;
                } else {
                    c2 = utftext.charCodeAt(i + 1);
                    c3 = utftext.charCodeAt(i + 2);
                    string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
                    i += 3;
                }
            }
            return string;
        }
    }
    $(function () {

        $(document).on('mouseenter', '[title]', function (params) {

            var tips = $(this).attr('data-tips') ? $(this).attr('data-tips') : '3';
            var color = $(this).attr('data-color') ? $(this).attr('data-color') : '#666';

            layer.tips(this.title, this, {
                tips: [tips, color]
            });

        });
        $(document).on('mouseleave', '[title]', function (params) {
            layer.closeAll('tips')
        });

    })


</script>
    <link href="/xq/Public/Admin/dist/ctos/ctos.css" rel="stylesheet" type="text/css">

    <style>
        body {
            background-color: #f9f9f9;
        }

        .admin-head-img {
            display: block;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin: 20px auto;
            box-shadow: 0 1px 5px 1px rgba(0, 0, 0, 0.1);
            cursor: pointer;
        }

        .o-panel {
            box-shadow: 0 1px 5px 1px rgba(0, 0, 0, 0.1);
        }

        #admin_name {
            text-align: center;
            font-size: 20px;
            margin: 15px 0;
            color: #777;
        }
    </style>


</head>

<body>

    <div class="o-body-pt">


        <div class="head-img-box">
            <img src="/xq<?php echo (session('admin_head_img')); ?>" class="admin-head-img" id="admin-head-img" alt="">
            <div id='admin_name'><?php echo (session('admin_name')); ?></div>
        </div>



        <div class="o-panel">
            <div class="o-panel-head">
                <div class="o-panel-title">
                    个人信息
                </div>
            </div>
            <div class="o-panel-body">

                <form class="layui-form">
                    <input type="hidden" name="admin_id" value="<?php echo (session('admin_id')); ?>">
                    <div class="form-group">
                        <label for="admin_id">登录账户</label>

                        <input type="text" disabled value="<?php echo (session('admin_id')); ?>" autocomplete="off" class="o-form-control" name="admin_name"
                            placeholder="昵称">
                    </div>

                    <div class="form-group">
                        <label for="admin_name">昵称</label>
                        <input type="text" lay-verify='required' value="<?php echo (session('admin_name')); ?>" autocomplete="off" class="o-form-control" name="admin_name"
                            placeholder="昵称">
                    </div>

                    <div class="text-right">
                        <button type="button" class="btn btn-default o-btn" lay-submit lay-filter="admin_name">保存</button>
                    </div>
                </form>

            </div>
            <div class="o-panel-footer">
            </div>
        </div>
        <div class="o-panel">
            <div class="o-panel-head">
                <div class="o-panel-title">
                    管理密码
                </div>
            </div>
            <div class="o-panel-body">

                <form class="layui-form">
                    <input type="hidden" name="admin_id" value="<?php echo (session('admin_id')); ?>">
                    <div class="form-group">
                        <label for="admin_pwd">新的密码</label>
                        <input type="password" lay-verify='required' autocomplete="off" class="o-form-control" name="admin_pwd" placeholder="新的密码">
                    </div>
                    <div class="form-group">
                        <label for="admin_pwd_2">确认密码</label>
                        <input type="password" lay-verify='required' autocomplete="off" class="o-form-control" name="admin_pwd_2" placeholder="确认密码">
                    </div>
                    <div class="text-right">
                        <button type="button" class="btn btn-default o-btn" lay-submit lay-filter="admin_pwd">保存</button>
                    </div>
                </form>

            </div>
            <div class="o-panel-footer">
            </div>
        </div>
    </div>

    <script>
        var upload;

        layui.use(['form', 'upload'], function () {
            var form = layui.form;
            upload = layui.upload;

            form.on('submit(admin_pwd)', function (data) {
                // console.log(data.elem) //被执行事件的元素DOM对象，一般为button对象
                // console.log(data.form) //被执行提交的form对象，一般在存在form标签时才会返回
                // console.log(data.field); //当前容器的全部表单字段，名值对形式：{name: value}

                if (data.field.admin_pwd !== data.field.admin_pwd_2) {

                    layer.msg('两次输入的密码不一样！', {
                        anim: 6
                    });
                    return;
                }



                (function () {

                    var url = '/xq/index.php/Admin/Config/userConfig';
                    var obj = data.field;
                    var fun = function (res) {
                        w(res);
                        try {
                            res = JSON.parse(res);
                        } catch (error) {
                            //转换错误
                            layer.msg('接口错误！', {
                                amin: 6
                            });
                            return
                        }

                        if (res.res >= 0) {
                            layer.msg('保存成功~');

                        } else {
                            layer.msg('保存失败~', {
                                amin: 6
                            });
                        }

                    };
                    $.post(url, obj, fun);

                }());


                return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
            });
            form.on('submit(admin_name)', function (data) {
                // console.log(data.elem) //被执行事件的元素DOM对象，一般为button对象
                // console.log(data.form) //被执行提交的form对象，一般在存在form标签时才会返回
                // console.log(data.field); //当前容器的全部表单字段，名值对形式：{name: value}


                (function () {

                    var url = '/xq/index.php/Admin/Config/saveName';
                    var obj = data.field;
                    var fun = function (res) {
                        w(res);
                        try {
                            res = JSON.parse(res);
                        } catch (error) {
                            //转换错误
                            layer.msg('接口错误！', {
                                amin: 6
                            });
                            return
                        }

                        if (res.res >= 0) {
                            layer.msg('保存成功~');
                            $('#admin_name').text(data.field.admin_name);
                            top.location.href = top.location.href;

                        } else {
                            layer.msg('保存失败~', {
                                amin: 6
                            });
                        }

                    };
                    $.post(url, obj, fun);

                }());


                return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
            });



            //执行实例
            var uploadInst = upload.render({
                elem: '#admin-head-img' //绑定元素
                , url: '/xq/index.php/Admin/Use/upFile' //上传接口
                // , accept: 'file' //允许上传的文件类型
                // , exts: 'csv'
                // , auto: false
                , data: {
                    src: '/admin/admin_head_img/',
                    del_src: '<?php echo (session('admin_head_img')); ?>'
                }
                , drag: true
                , done: function (res) {
                    //上传完毕回调
                    if (res.code == 0) {
                        //成功
                        (function () {
                            var admin_head_img = res.data.src;
                            var url = '/xq/index.php/Admin/Config/saveHeadImg';
                            var obj = {
                                admin_id: '<?php echo (session('admin_id')); ?>',
                                admin_head_img: admin_head_img
                            };
                            var fun = function (res) {
                                try {
                                    res = JSON.parse(res);
                                } catch (error) {
                                    //转换错误
                                    layer.msg('异步接口出错！', {
                                        anim: 6
                                    });
                                    return
                                }
                                if (res.res > 0) {
                                    layer.msg('上传成功！');
                                    top.location.href = top.location.href;


                                } else {
                                    layer.msg('上传失败！', {
                                        anim: 6
                                    });
                                }

                            };
                            $.post(url, obj, fun);

                        }());


                    }
                }
                , error: function () {
                    //请求异常回调
                    layer.msg('异步接口出错！', {
                        anim: 6
                    });
                }
            });


        });






    </script>


</body>

</html>