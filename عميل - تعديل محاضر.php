<?php
    require_once 'must.php';
    require_once 'essentials/teacher.php';

    $fileName = "عميل - تعديل محاضر.php";
    $ourCurrentDirectory = $ourDirectory . '/' . $fileName;

    $wrongIssue;
    $targetTeacher = null;
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        try{
            if($_POST['searchID'] != ""){
                $targetTeacher = teacherFactory::getTeacherViaID($_POST['searchID']);
                unset($_POST['searchID']); 
            }
            echo "!!!!";
            if(isset($_POST['id']) && $_POST['id'] != "") {
                $entry = new teacher();
                $entry->setFirstName($_POST['firstName']);
                $entry->setSecondName($_POST['secondName']);
                $entry->setPhoneNumber($_POST['phoneNumber']);
                $entry->setWebsite($_POST['website']);
                echo "!!!!";
                teacherFactory::editTeacherViaID($targetTeacher->getID() , $entry);    
            }
        } catch(exception $e){
            $wrongIssue = $e->getMessage();
        }
        
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>عميل - تعديل محاضر</title>
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
            <h1 style="float:right; margin-right:10px;">تعديل محاضر</h1>
        </div>
        <div style="padding-right: 30px; padding-top: 10px; margin-top:10px;">
                <div style="margin-top:10px; width:100%; text-align:right; float:right; background-color:green;">
                    <form method="POST">
                        <h1>أختار محاضر</h1>

                        <label  for="un"><b>أكتب الرقم الخاص لدي المحاضر</b></label>
                        <input type="text" placeholder="الرقم الخاص" name="searchID" maxlength="30">
                        <br>
                    
                        <input type="submit" value="فحص">
                    </form>

                    <form>
                        <h1>عدل البيانات</h1>

                        <label  for="un"><b>الرقم الخاص</b></label>
                        <input type="text" name="id" placeholder="<?php 
                            if($targetTeacher != null){
                                echo $targetTeacher->getID();
                            } else {
                                echo 'الرقم الخاص';
                            }?>" name="id" maxlength="2" readonly>
                        <br>
                        <label  for="un"><b>الأسم الأول</b></label>
                        <input type="text" name="firstName" value="<?php 
                            if($targetTeacher != null){
                                echo $targetTeacher->getFirstName();
                            }?>" placeholder="الأسم الأول" name="id" maxlength="30">
                        <br>
                        <label  for="un"><b>الأسم الثاني</b></label>
                        <input type="text" name="secondName" value="<?php 
                            if($targetTeacher != null){
                                echo $targetTeacher->getSecondName();
                            }?>" placeholder="الأسم الثاني" name="id" maxlength="60">
                        <br>
                        <label  for="un"><b>رقم الموبايل</b></label>
                        <input type="text" name="phoneNumber" value="<?php 
                            if($targetTeacher != null){
                                echo $targetTeacher->getPhoneNumber();
                            }?>" placeholder="رقم الموبايل" name="id" maxlength="11">
                        <br>
                        <label  for="un"><b>الموقع</b></label>
                        <input type="text" name="website" value="<?php 
                            if($targetTeacher != null){
                                echo $targetTeacher->getWebsite();
                            }?>" placeholder="الموقع" name="id" maxlength="60">
                        <br>
                    
                        <input type="submit" value="تعديل">
                    </form>
                </div>
            
        </div>

    </body>
</html>