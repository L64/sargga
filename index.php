<?php
    error_reporting(E_ALL ^ E_NOTICE);
    session_start();
    if(isset($_SESSION['Username'])){
        header("location: home");
    }
    $getLang = trim(filter_var(htmlentities($_GET['lang']),FILTER_SANITIZE_STRING));
    if (!empty($getLang)) {
        $_SESSION['language'] = $getLang;
    }
// ========================= config the languages ================================
    error_reporting(E_NOTICE ^ E_ALL);
    if (is_file('home.php')){
        $path = "";
    }elseif (is_file('../home.php')){
        $path =  "../";
    }elseif (is_file('../../home.php')){
        $path =  "../../";
    }
    include_once $path."langs/set_lang.php";
?>
<html dir="<? echo lang('html_dir'); ?>">
    <head>
        <title><? echo lang('welcome'); ?> | Lcibr</title>
        <meta charset="UTF-8">
        <meta name="description" content="Lcibr is an irani-latinoamerican social network platform oriented to technology, but open to all, for now the registers are only for the people of our Discord.">
        <meta name="keywords" content="homepage,main,login,social network,social media,Wallstant,meet,free platform,Sargga,Lciber">
        <meta name="author" content="Munaf Aqeel Mahdi,Lucas64,Ciber Team">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php include "includes/head_imports_main.php";?>
    </head>
    <body class="login_signup_body">
    <!--============[ Nav bar ]============-->
        <div class="login_signup_navbar">
                <a href="index" class="login_signup_navbarLinks">ʟ𝗰𝗶𝗯𝗿</a>
                <a href="https://titanembeds.com/embed/741660184228921386" class="login_signup_navbarLinks"><? echo lang('help'); ?></a>
                <a href="terms" class="login_signup_navbarLinks"><? echo lang('terms'); ?></a>
                <a href="privacy" class="login_signup_navbarLinks"><? echo lang('privacyPolicy'); ?></a>
                <div style="float: <? echo lang('float2'); ?>;">
                    <a href="login" class="login_signup_btn1"><? echo lang('login'); ?></a>
                    <a href="signup" class="login_signup_btn2"><? echo lang('signup'); ?></a>
                </div>
        </div>
        <!--============[ main contains ]============-->
        <div class="login_signup_box">
        <h3 align="center"><? echo lang('welcome_to'); ?> ʟ𝗰𝗶𝗯𝗿 ᴘʀᴇᴀᴘʟʜᴀ</h3>
        <p align="center" style="color: #999; margin-bottom: 25px;"><? echo lang('wallstant_main_string'); ?>.</p>
            <div style="display: flex;">
                <div style="width: 100%;">
                    <br><h4><? echo lang('login_now'); ?></h4>
                    <p><input type="text" name="login_username" id="un" class="login_signup_textfield" placeholder="<? echo lang('email_or_username'); ?>"/></p>
                    <p><input type="password" name="login_password" id="pd" class="login_signup_textfield" placeholder="<? echo lang('password'); ?>"/></p>
                    <p><a href="#" style="color: #a2a2a2; font-size: 11px; float: <? echo lang('float2'); ?>;"> <? echo lang('forgot_password'); ?></a></p>
                    <button type="submit" class="login_signup_btn1" id="loginFunCode"><? echo lang('login'); ?></button>
                    <p id="login_wait" style="margin: 0px;"></p>
                </div>
                <div style="width: 100%;text-align: center;">
                    <img src="imgs/main_icons/pc_main.png" alt="Wallstant" style="width: 300px;" />
                </div>
            </div>
        </div>
        <div style="background: #fff; border-radius: 3px; max-width: 800px; padding: 15px; margin:auto;margin-top: 15px;color: #7b7b7b;" align="center">
            <? echo lang('dont_have_an_account'); ?> <a href="signup"><? echo lang('signup'); ?></a> <? echo lang('for_free'); ?>.<hr style="margin: 8px;">
                <a href="?lang=english">English</a> &bull; <a href="?lang=العربية">العربية</a>
        </div>

        <script type="text/javascript">
            function loginUser(){
                var username = document.getElementById("un").value;
                var password = document.getElementById("pd").value;
                $.ajax({
                    type:'POST',
                    url:'includes/login_signup_codes.php',
                    data:{'req':'login_code','un':username,'pd':password},
                    beforeSend:function(){
                        $('.login_signup_btn1').hide();
                        $('#login_wait').html("<? echo lang('loading'); ?>...");
                    },
                    success:function(data){
                        $('#login_wait').html(data);
                        if (data == "Welcome...") {
                            $('#login_wait').html("<p class='alertGreen'><? echo lang('welcome'); ?>..</p>");
                            setTimeout(' window.location.href = "home"; ',2000);
                    }else{
                        $('.login_signup_btn1').show();
                    }
         },
            error:function(err){
                alert(err);
         }
         });
        }
        $('#loginFunCode').click(function(){
        loginUser();
        });
        $(".login_signup_textfield").keypress( function (e) {
            if (e.keyCode == 13) {
                loginUser();
            }
        });
        </script>
        <?php include "includes/footer.php" ?>
    </body>
</html>
