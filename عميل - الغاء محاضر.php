<?php
    require_once 'essentials/teacher.php';

    $wrongIssue;

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        try{
            if($_POST['id'] == "" )
                throw new ErrorException("الرقم الخاص فارغ");
            
            teacherFactory::deleteTeacherID($_POST['id']);
            unset($_POST);
        } catch(exception $e){
            $wrongIssue = $e->getMessage();
        }
        
    }



?>

<!DOCTYPE html>
<html>
    <head>
        <title>عميل - الغاء محاضر</title>
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
        <div style="display:inline-block; width:100%; margin-top:5px;">
            <img style="float:right;" src="images/backSmall.png" onclick="location.href='عميل - محاضر.php'">
            <h1 style="float:right; margin-right:10px;">الغاء محاضر</h1>
        </div>
        <div style="padding-right: 30px; padding-top: 10px; margin-top:10px;">
            
                
                <form style="margin-top:10px; width:1000px; text-align:right; float:right; background-color:#900c3e;" method="POST">
                    <h1>الغاء محاضر</h1>
                    
                    <label  for="un"><b>الرقم الخاص</b></label>
                    <input type="text" placeholder="الرقم الخاص" name="id" maxlength="10">
                    <p style="color:red;"><?php 
                        if(isset($wrongIssue))
                            echo $wrongIssue; 
                    ?></p>
                    <input style="background-color:#ef374c;" type="submit" value="مسح">
                   
                </form>
            
        </div>

    </body>
</html>