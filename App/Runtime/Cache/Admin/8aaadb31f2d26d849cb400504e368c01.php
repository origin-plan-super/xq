<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>后台</title>
    <!-- css -->
<link href="/xq/Public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="/xq/Public/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="/xq/Public/vendor/animate/animate.css" rel="stylesheet" type="text/css">
<link href="/xq/Public/vendor/spinkit/spinkit.css" rel="stylesheet" type="text/css">
<link href="/xq/Public/vendor/layui/css/layui.css" rel="stylesheet" type="text/css">


<!-- js -->
<script src="/xq/Public/vendor/jquery/jquery.js" type="text/javascript" charset="utf-8"></script>
<script src="/xq/Public/vendor/jqueryUI/jqueryUI.js" type="text/javascript" charset="utf-8"></script>
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

    .layui-form-select dl dd.layui-this {
        background-color: #666;
        color: #fff;
    }

    /* a:focus,
    a:active,
    a:visited {} */
</style>

<script>

    function getLocalTime(nS) {
        return new Date(parseInt(nS) * 1000).toLocaleString().replace(/:\d{1,2}$/, ' ');
    }

    function saveInfo(save, f) {
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

    }
    function del(delObj, f) {
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
    }

    function delAll(obj, f) {


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

    }



    /**
     * 创建时间：2017年9月15日 18:31:36
     * 修改时间：2017年9月15日 18:31:36
     * ===========================================
     * 作者：代码狮
     * ===========================================
     * QQ：1173197065
     * 微信：ajs0314
     * GitHub：https://github.com/ALNY-AC
     * ===========================================
     * 如发现有bug，请速联系作者。
     * 后来者不懂的地方，请联系作者。
     * ===========================================
     * 因为客户浏览器不统一，所以不实用es6语法
     * ===========================================
     * @author 代码狮
     * @param str string 必须，要转换的字符串，比如：1,2,3 或者1 2 3 或者 1|2|3|，分隔符自定。
     * @param code string 必须，要当做分隔符的字符串，自定。
     * @param f function|string 必须，当为string的时候，为指定键名，当为function的时候，则为调用函数
     */
    function strToArr(str, code, f) {

        // 将字符串按照code分割成数组
        var array = str.split(code);
        // 创建一个空数组，用于返回
        var arr = [];

        // 开始str分割后的数组
        for (var i = 0; i < array.length; i++) {
            // 获得每个元素
            var item = array[i];
            // 当f函数 不为空的时候
            if (f != null) {

                // 判断是不是字符串
                if (typeof (f) == 'string') {
                    //如果是字符串
                    arr[i] = {};        //创建一个json
                    arr[i][f] = item;   //让f当做键名，直接将item赋值给他
                }
                //判断是不是函数
                if (typeof (f) == 'function') {
                    //当f为function的时候
                    //调用这个函数，并且传值进去
                    /**
                    //  * @param i int 当前循环的索引值
                    //  * @param arr array 当前的这个数组
                    //  * @param item string str分割后的数组的元素
                     */
                    arr[i] = f(i, arr, item);
                }


            } else {
                arr[i] = item;
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
            return false;

        });
        $(document).on('mouseleave', '[title]', function (params) {
            layer.closeAll('tips');
            return false;
        });

    })


</script>
    <style>
        body {
            padding: 15px;
            padding-top: 0;
        }
    </style>

</head>

<body>


    <div class="page-header">
        <h1>
            <small>
                [信雀]后台管理系统
            </small>
        </h1>
    </div>
    前端访问人数统计：<?php echo ($peonle_count); ?> 人



</body>

</html>