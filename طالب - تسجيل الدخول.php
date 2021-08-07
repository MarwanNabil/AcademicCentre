<?php
?>
<!DOCTYPE html>
<html>
    <head>
        <title>تسجيل الدخول - عميل</title>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="styles/main.css"/>
        <link rel="stylesheet" type="text/css" href="styles/toolbar.css"/>
        <link rel="stylesheet" type="text/css" href="styles/login.css"/>
        <style>
            h1{
                color: #FFB833;
                font-size: 72px;
            } h2{
                color: white;
                font-size: 50px;
            }p{
                color: white;
            }
        </style>
    </head>
    <body>
        
        <ul>
            <li><a class="right active" href="تسجيل الدخول - طالب.php">طالب</a></li>
            <li><a class="right" href="تسجيل الدخول - عميل.php">عميل</a></li>
            <li><a class="right" href="تسجيل الدخول - محاضر.php">محاضر</a></li>
        </ul>
        <div style="background-color: #201c1c; width:70%; height:800px; margin-right:auto; margin-left:auto; margin-top:1%; text-align:right; padding:5px; border-radius:5px;">
            
            <img style="margin-left: auto; margin-right: auto; display: block;" src="images/logoBig.png">
            <h2 style="text-align:center;"> يرجي تسجيل البيانات الخاصة بالطالب </h1>

            <form style="margin-top:10px; width:80%;" method="POST">
                <label style="color: white; " for="un"><b>الرقم الخاص</b></label><br>
                <input type="text" placeholder="الرقم الخاص" name="username"><br><br>
                <label style="color: white;" for="fname"><b>كلمة المرور</b></label><br>
                <input type="password"  placeholder="كلمة المرور" name="password"><br><br>
                <h4 style="color:red;"> خطأ في الرقم الخاص أو كلمة المرور </h4>
                <input type="submit" value="تسجيل">
                <p>.في حالة نسيان اي من البيانات الأتية, يرجي ايجاد رسالة البدء معنا علي هاتفك أو هاتف ولي الامر ان لم تجدها يرجي التحدث لنا</p>
			</form>

        </div>

    </body>
</html>