<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"/var/www/html/Unkonwn/public/../application/admin/view/appdownloadlink/index.html";i:1541563427;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title; ?></title>
    <link href="__CSS__/CssReset.css" rel="stylesheet">
    <link href="__CSS__/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="__CSS__/font-awesome.min.css?v=4.7.0" rel="stylesheet">
    <link href="__CSS__/animate.min.css" rel="stylesheet">
    <link href="__CSS__/style.min.css?v=4.1.0" rel="stylesheet">
    <!-- 字体图标 -->
    <link rel="stylesheet" href="//at.alicdn.com/t/font_763769_a96vmyycnll.css">
    <style>
        .title {display: block; width: 800px; margin: 50px auto;text-align: left; font-size: 30px;}
        .Nav {width: 800px; margin: 0 auto; font-size: 20px;}
        .Nav .p1 {float: left; width: 30%; position: relative;}
        .Nav .p1 i {float: left; position: absolute; top: -3px;}
        .Nav .p1 span {margin: 0 0 0 25px;}
        .Nav input {float: left; width: 69.9%; padding: 0 5%; border: 1px solid #878787; border-radius: 4px;}
        .SaveBt {
            text-align: center; width: 100%; padding: 10px 0; margin: 50px 0; 
            background: #37bf13; color: #fff; 
            border: 1px solid #37bf13;
        }
        .SaveBt:hover {background: #fff; color: #37bf13; border: 1px solid #37bf13;}
    </style>
</head>
<body>
    <h3 class="title"><?php echo $title; ?></h3>
    <div class="Nav clearfix">
        <p class="Pbox clearfix">
            <div class="p1 clearfix">
                <i class="iconfont icon-android-fill" style="color:#37bf13; font-size: 25px;"></i>
                <span>优孕宝安卓版下载地址:</span>
            </div>
            <input id="Android_url" type="text" placeholder="安卓版下载地址" value="<?php echo $urldata[0]['url']; ?>">
        </p>
        <p class="Pbox clearfix">
            <div class="p1 clearfix">
                <i class="iconfont icon-apple-fill" style="color:#2d2d2d; font-size: 25px;"></i>
                <span>优孕宝IOS版下载地址:</span>
            </div>
            <input id="Ios_url" type="text" placeholder="IOS版下载地址" value="<?php echo $urldata[1]['url']; ?>">
        </p>
        <button class="SaveBt" onclick="Save();">保存修改</button>
    </div>
</body>
<script src="__JS__/jquery.min.js?v=2.1.4"></script>
<script src="__JS__/bootstrap.min.js?v=3.3.6"></script>
<script>
    function Save() {
        $.ajax({
            type: 'post',
            url: 'http://unkonwn.uyihui.cn/appapi/adminapi/appdownloadlink_alter',
            data: {
                'operator': 'alter',
                'Android_url': $('#Android_url').val(),
                'Ios_url': $('#Ios_url').val(),
            },
            dataType: 'json',
            success: function(e) { alert('数据保存成功!'); },
            error: function(e) { alert('网络错误,数据保存失败!'); }
        });
    }

</script>
</html>