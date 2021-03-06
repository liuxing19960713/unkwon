<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"/var/www/html/Unkonwn/public/../application/activity/view/727/ForPassword.html";i:1535538472;}*/ ?>
<!-- 忘记密码页面 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $Title; ?></title>
    <link href="__CSS__/CssReset.css" rel="stylesheet">
    <link href="__COMPONENT__/Fm/Fm.css" rel="stylesheet">
    <link rel="stylesheet" href="//at.alicdn.com/t/font_760616_amuthn0b2rf.css">
    <style>
        .Bg {
            position: fixed;
            top: 0; left: 0;
            width: 100%;
            background: url("__IMG__/bg1.jpg");
            z-index: -9999;
        }
        #Logo {
            width: 4.75rem;
            margin: 3.14rem 7.6rem 1.5rem;
        }
        .buttonBox {
            color: #fff;
            width: 6rem;
            margin: 0 auto;
        }
        .buttonBox button{
            float: left;
            width: 3rem;
            line-height: 1.2rem;
        }
        .ForPassword,.ForPassword2 {
            width: 14.35rem;
            margin: 0 auto;
        }
        .inpBox {
            width: 14.35rem;
            position: relative;
            border-bottom: 0.027rem solid #fff;
        }
        .inpBox input,.inpBox select {
            color: #fff;
            padding: 0 15%;
            margin-top: 0.8rem;
            width: 70%;
            font-size: 0.8rem;
            line-height: 1.8rem;
            background: none;
        }
        .inpBox .CodeBt {
            border: 0.027rem solid #fff;
            color: #fff;
            font-size: 0.6rem;
            padding: 0.3rem 0.5rem;
            /* border-radius: 0.5rem; */
            position: absolute;
            top: 1rem; right: 0rem;
        }
        .inpBox select {
            position: absolute;
            top: 0; left: 2rem;
            border: none;
        }
        .ForPassword i, .ForPassword2 i {
            color: #fff;
            position: absolute;
            top: 0.8rem;
            font-size: 1.6rem;
        }
        .codebt {
            color: #fff;
            border: 0.025rem solid #fff;
            border-radius: 0.3rem;
            padding: 0 0.5rem;
            position: absolute;
            bottom: 0; right: 0;
            font-size: 0.6rem;
            line-height: 1.8rem;
        }
        .codebt:active {
            color: rgb(132, 88, 138);
            background: #fff;
        }
    </style>
</head>
<body>
    <div class="Bg"></div>
    <img id="Logo" src="__IMG__/Logo.png" alt="Logo">
    <!-- 获取验证码 -->
    <div class="ForPassword">
        <div class="inpBox">
            <i class="iconfont icon-phone-"></i>
            <input type="text" name="phone" placeholder="请输入您的手机号码" maxlength="11" onkeyup="this.value=this.value.replace(/\D/g,'')">
        </div>
        <div class="inpBox" style="margin-bottom: 1rem;">
            <i class="iconfont icon-verification-"></i>
            <input type="text" name="code" maxlength="4" placeholder="请输入验证码">
            <div class="codebt" onclick="Code1()">获取验证码</div>
        </div>
        <button id="OK" style="width:100%; color:#ab80f1; display:block; margin:1rem auto; background:#fff; padding:0.5rem 0;">前&nbsp;往&nbsp;修&nbsp;改</button>
    </div>
    <!-- 修改密码 -->
    <div class="ForPassword2" style="display:none;">
        <div class="inpBox">
            <i class="iconfont icon-password-"></i>
            <input type="text" name="password" placeholder="请设置您的新密码" maxlength="12">
        </div>
        <div class="inpBox" style="margin-bottom: 1rem;">
            <i class="iconfont icon-password-"></i>
            <input type="text" name="password2" placeholder="请再次输入您的新密码" maxlength="12">
        </div>
        <button id="OK2" style="width:100%; color:#ab80f1; display:block; margin:1rem auto; background:#fff; padding:0.5rem 0;">确认修改</button>
    </div>
</body>
<script src="__JS__/jquery.min.js"></script>
<script src="__COMPONENT__/vue/vue.min.js"></script><script src="__COMPONENT__/vue/vue.min.js"></script>
<script src="__COMPONENT__/Fm/Fm.js"></script>
<script>
    var FmTool = new Tool;
    FmTool.Rem();
    //获取验证码
    function Code1() {
        if($('input[name=phone]').val()){
            //手机格式验证
            var myreg=/^[1][3,4,5,7,8][0-9]{9}$/;
            if(!myreg.test($('input[name=phone]').val())){
                alert('手机号码格式错误~请检查');
                return
            }
            $.ajax({
                url: "/activity/Actindex727/code1",
                type: 'post',
                data: {
                    "mobile":$('input[name=phone]').val(),
                },
                success: function(data) {
                    if(!data) {
                        alert("获取验证码失败");
                    }
                    if(data=='0') {
                        alert("获取验证码失败");
                    }
                    if(data=='1') {
                        alert('验证码发送成功，请留意您的短信');
                    }
                    if(data=='2') {
                        alert("60秒内只能获取一次验证码");
                    }
                }
            });
        } else {
            alert('请先填写手机号码~');
        }
        //显示获取验证码按钮
        setTimeout("$('.CodeBt').fadeIn(0)",60000);
    }
    //数据验证规则
    function CheckPassWord(password) {
        //必须为字母加数字且长度不小于8位
        var str = password;
        if (str == null || str.length <8) {
            return false;
        }
        var reg1 = new RegExp(/^[0-9A-Za-z]+$/);
        if (!reg1.test(str)) {
            return false;
        }
        var reg = new RegExp(/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/);
        if (reg.test(str)) {
            return true;
        } else {
            return false;
        }
    }
    //获取页面高度并赋值给父级元素
    $('.Bg').height($(window).height());
    //验证验证码
    $('#OK').click(function() {
        var data = {
            phone: $('input[name=phone]').val(),
            code: $('input[name=code]').val()
        }
        //手机格式验证
        var myreg=/^[1][3,4,5,7,8][0-9]{9}$/;
        if(!myreg.test($('input[name=phone]').val())){
            alert('手机号码格式错误~请检查');
            return
        }
        //提交验证码数据
        $.ajax({
            url: "/activity/Actindex727/DxCode2",
            type: 'post',
            data: data,
            success: function(data) {
                if(data==="0"){
                    alert('验证码错误');
                } else if(data==="1"){
                    //验证码正确
                    $('.ForPassword').fadeOut(0);
                    $('.ForPassword2').fadeIn(0);
                } else if(data==="2"){
                    alert('验证码过期');
                }
            }
        });
    });

    //提交修改密码请求
    $('#OK2').click(function() {
        //password验证
        if($('input[name=password]').val() == $('input[name=password2]').val()) {
            if(!CheckPassWord($('input[name=password]').val())) {
                alert('密码必须为字母加数字且长度不小于8位！');
                return
            } else {
                var data = {
                    phone: $('input[name=phone]').val(),
                    password: $('input[name=password]').val()
                }
                $.ajax({
                    url: "/activity/Actindex727/updatapasswprd",
                    type: 'post',
                    data: data,
                    success: function(data) {
                        if(data=='0') {
                            alert('该手机号还未被注册无法修改密码，请确认手机号是否正确');
                            window.location.href = "/activity/Actindex727/doctorlogin";
                            return
                        }
                        if(data=='1') {
                            alert('密码修改成功！');
                            window.location.href = "/activity/Actindex727/doctorlogin";
                            return
                        }
                    }
                });
            }
        } else {
            alert('两次输入的密码不一致！');
        }
    });
</script>
</html>