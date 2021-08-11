<?php
    

?>
<!DOCTYPE html>
<html>
    <head>
        <title>عميل  - محاضر</title>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="styles/main.css"/>
        <link rel="stylesheet" type="text/css" href="styles/toolbar.css"/>
        <link rel="stylesheet" type="text/css" href="styles/form.css"/>
    </head>
    <body>
        <ul>
            <li><img class="right image" src="images/logoSmall.png" ></li>
            <li><a class="right" href="تسجيل الدخول - طالب.php">طالب</a></li>
            <li><a class="active right" href="تسجيل الدخول - عميل.php">عميل</a></li>
            <li><a class="right" href="تسجيل الدخول - محاضر.php">محاضر</a></li>
            <li><a class="left" href="تسجيل الدخول - محاضر.php">تسجيل الخروج</a></li>
        </ul>
        <div style="height: 555px; padding-right: 30px; padding-top: 10px; margin-top:10px;">
            <div style="float:right;">
                <img style="float:right;" src="images/backSmall.png" onclick="location.href='عميل - الصفحة الرئيسية.php'">
                <h1 style="float:left; margin-right:10px;">قسم المحاضر</h1>
            </div>
            
            <div style="float:right;">
                <div class="borderContent" style="background-color:#900c3e;" onclick="location.href='عميل - اضافة محاضر.php'" >
                    <img src="images/registerBig.png">
                    <h2>إضافة محاضر</h2>
                </div>
                <div class="borderContent" style="background-color:#571845;" onclick="location.href='عميل - بحث محاضر.php'" >
                    <img src="images/searchBig.png">    
                    <h2>بحث</h2>    
                </div> 
                <div class="borderContent" style="background-color:#0170c1;" onclick="location.href='عميل - الغاء محاضر.php'">
                    <img src="images/trashBig.png"> 
                    <h2>مسح</h2>
                </div>
                <div class="borderContent" style="background-color:#ff5733;" onclick="location.href='عميل - تعديل محاضر.php'">
                    <img src="images/editBig.png">    
                    <h2>تعديل بيانات</h2>    
                </div> 
            </div>
            
        </div>

    </body>
</html>