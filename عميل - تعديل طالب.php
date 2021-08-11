<?php
    require_once 'must.php';
    require_once 'essentials/teacher.php';

    $fileName = "عميل - تعديل طالب.php";
    $ourCurrentDirectory = $ourDirectory . '/' . $fileName;

    $wrongIssue;

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        try{
            if($_POST['firstName'] == "" )
                throw new ErrorException("الأسم الأول فارغ");
            if($_POST['secondName'] == "")
                throw new ErrorException("الأسم الاخير فارغ");
            if($_POST['phoneNumber'] == "")
                throw new ErrorException("موبايل الطالب فارغ");
            if($_POST['password'] == "")
                throw new ErrorException("كلمة السر فارغة");
            if($_POST['website'] == "")        
                throw new ErrorException("الصف الدراسي فارغ");
            


            $entry = new teacher();
            $entry->setFirstName($_POST['firstName']);
            $entry->setSecondName($_POST['secondName']);
            $entry->setPhoneNumber($_POST['phoneNumber']);
            $entry->setPassword($_POST['password']);
            $entry->setWebsite($_POST['website']);
            
            
            teacherFactory::addTeacher($entry);
            header('Location: ' . $ourCurrentDirectory);
            exit;
        } catch(exception $e){
            $wrongIssue = $e->getMessage();
        }
        
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>عميل - تعديل طالب</title>
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
            <img style="float:right;" src="images/backSmall.png" onclick="location.href='عميل - طالب.php'">
            <h1 style="float:right; margin-right:10px;">تعديل طالب</h1>
        </div>
        <div style="padding-right: 30px; padding-top: 10px; margin-top:10px;">
                
                <form style="margin-top:10px; width:100%; text-align:right; float:right; background-color:green;" method="POST">
                    <h1>إضافة محاضر</h1>

                    <label  for="un"><b>الأسم الأول</b></label>
                    <input type="text" placeholder="الأسم الأول" name="firstName" maxlength="30">
                    <br>
                    <label  for="un"><b>الأسم الثاني</b></label>
                    <input type="text" placeholder="الأسم الثاني" name="secondName" maxlength="60">
                    <br>
                    <label style="" for="un"><b>رقم الموبايل</b></label>
                    <input type="text" placeholder="رقم الموبايل" name="phoneNumber" maxlength="11">
                    <br>
                    <label  for="un"><b>كلمة المرور</b></label>
                    <input type="password" placeholder="كلمة المرور" name="password" maxlength="30">
                    <br>
                    <label  for="un"><b>الموقع</b></label>
                    <input type="text" placeholder="موقع" name="website" maxlength="60">
                    <br>
                    
                   
                    <input type="submit" value="تسجيل">
                </form>
            
        </div>

    </body>
</html>