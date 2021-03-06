<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"/var/www/html/Unkonwn/public/../application/admin/view/statement/editor.html";i:1536373414;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $title; ?></title>
<link href="__CSS__/CssReset.css" rel="stylesheet">
<link href="__CSS__/bootstrap.min.css?v=3.3.6" rel="stylesheet">
<link href="__CSS__/font-awesome.min.css?v=4.7.0" rel="stylesheet">
<link href="__CSS__/animate.min.css" rel="stylesheet">
<link href="__CSS__/style.min.css?v=4.1.0" rel="stylesheet">
<link href="__CSS__/statement/statement.css" rel="stylesheet">
</head>
<body>
    <div id="Body">
        <h2 style="text-align:center; font-weight:bold;"><?php echo $title; ?></h2>
        <input name="STitle" type="text" value="<?php echo $title; ?>" placeholder="请输入App中显示的TabTitle">
        <!-- 富文本编辑器 -->
        <div id="KinBox">
            <!-- 加载编辑器的容器 -->
            <script id="container" name="content" type="text/plain"></script>
            <button class="bt1" onclick="Submit()">提交修改</button>
            <button class="bt1" onclick="javascript:window.history.back(-1);">取消返回</button>
        </div>
    </div>
</body>
<script src="__JS__/jquery.min.js?v=2.1.4"></script>
<script src="__JS__/plugins/layer/laydate/laydate.js"></script>
<script src="__JS__/plugins/layer/layer.min.js"></script>
<script src="__JS__/selectFilter.js"></script>
<!-- 富文本编辑器 -->
<script type="text/javascript" src="__COMPONENT__/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="__COMPONENT__/ueditor/ueditor.all.js"></script>
<!--  -->
<script src="__COMPONENT__/Fm/Fm.js"></script>
<script>
    //Fm插件
    Popups = new Popups;
    //实例化富文本编辑器
    var html,txt;
    var ue = UE.getEditor('container',{
        //富文本编辑器参数
        //设置外框高度
        //initialFrameHeight: 400
        //关闭远程抓取图片功能
        catchRemoteImageEnable: false,
    });
    ue.ready(function() {
        //富文本编辑器构造函数
        //设置最大高度
        ue.setHeight(400);
        //设置默认内容
        ue.setContent('<?php echo $data[0]["content"]; ?>');
        //获取纯文本内容，返回: hello
        txt = ue.getContentTxt();
    });
    //设置文件上传模块提交图片地址:
    UE.Editor.prototype.QnUpImg = UE.Editor.prototype.getActionUrl;
    UE.Editor.prototype.getActionUrl = function(action) {
        if (action == 'uploadimage') {
            return '/admin/statement/ueditor';
        } else {
            return this.QnUpImg.call(this, action);
        }
    }
    //数据提交
    function Submit() {
        //获取html内容
        html = {};
        html['type'] = $("input[name='STitle']").val();
        html['title'] = $("input[name='STitle']").val();
        html['content'] = ue.getContent();
        $.ajax({
            url: "getData",
            type: 'post',
            data: html,
            success: function(data) {
                console.log(data);
                alert('修改成功');
                //window.location.href = "index";
            }
        })
    }
</script>



</html>