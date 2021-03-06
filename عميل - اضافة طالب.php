<?php
    require_once 'must.php';
    require_once 'essentials/grade.php';
    require_once 'essentials/student.php';


    $allGrades = gradeFactory::getAllGrades();

    $wrongIssue;

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        try{
            if($_POST['firstName'] == "" )
                throw new ErrorException("الأسم الأول فارغ");
            if($_POST['lastName'] == "")
                throw new ErrorException("الأسم الاخير فارغ");
            if($_POST['phoneNumber'] == "")
                throw new ErrorException("موبايل الطالب فارغ");
            if($_POST['password'] == "")
                throw new ErrorException("كلمة السر فارغة");
            if($_POST['telephoneNumber'] == "")
                throw new ErrorException("هاتف البيت فارغ");
            if($_POST['parentOnePhoneNumber'] == "")
                throw new ErrorException("موبايل ولي الامر الطالب الأول فارغ");
            if($_POST['parentTwoPhoneNumber'] == "")
                throw new ErrorException("موبايل ولي الامر الطالب الثاني فارغ");
            if($_POST['grade'] == "")        
                throw new ErrorException("الصف الدراسي فارغ");
            


            $entry = new student();
            $entry->setFirstName($_POST['firstName']);
            $entry->setlastName($_POST['lastName']);
            $entry->setPhoneNumber($_POST['phoneNumber']);
            $entry->setPassword($_POST['password']);
            $entry->setTelephoneNumber($_POST['telephoneNumber']);
            $entry->setParentOnePhoneNumber($_POST['parentOnePhoneNumber']);
            $entry->setParentTwoPhoneNumber($_POST['parentTwoPhoneNumber']);
            $entry->setGradeID($_POST['grade']);
            
            
            studentFactory::addStudent($entry);
            unset($_POST);
        } catch(exception $e){
            $wrongIssue = $e->getMessage();
        }
        
    }



?>

<!DOCTYPE html>
<html>
    <head>
        <title>عميل - اضافة طالب</title>
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
            <h1 style="float:right; margin-right:10px;">اضافة طالب</h1>
        </div>
        <div style="padding-right: 30px; padding-top: 10px; margin-top:10px;">
                
                <form style="margin-top:10px; width:100%; text-align:right; float:right; background-color:green;" method="POST">
                    <h1>إضافة طالب</h1>

                    <label  for="un"><b>الأسم الأول</b></label>
                    <input type="text" placeholder="الأسم الأول" name="firstName" maxlength="30">
                    <br>
                    <label  for="un"><b>الأسم الثاني</b></label>
                    <input type="text" placeholder="الأسم الثاني" name="lastName" maxlength="60">
                    <br>
                    <label style="" for="un"><b>رقم الموبايل</b></label>
                    <input type="text" placeholder="رقم الموبايل" name="phoneNumber" maxlength="11">
                    <br>
                    <label  for="un"><b>كلمة المرور</b></label>
                    <input type="password" placeholder="كلمة المرور" name="password" maxlength="30">
                    <br>
                    <label  for="un"><b>هاتف المنزل</b></label>
                    <input type="text" placeholder="هاتف المنزل" name="telephoneNumber" maxlength="20">
                    <br>
                    <label  for="un"><b>ولي الامر الأول</b></label>
                    <input type="text" placeholder="موبايل" name="parentOnePhoneNumber" maxlength="11">
                    <br>
                    <label  for="un"><b>ولي الامر الثاني</b></label>
                    <input type="text" placeholder="موبايل" name="parentTwoPhoneNumber" maxlength="11">
                    <br>
                    <label  for="un"><b>الصف الدراسي</b></label>
                        
                        <select name="gradeID" style="">
                            <option value="0"></option>
                            <?php
                                for($i = 0; $i < $allGrades->capacity(); $i++){
                                    try{
                                        $current = $allGrades->get($i);
                                        echo "<option value='" . $current->getID() . "'> ";
                                        echo $current->getGradeName() . '</option>';
                                    } catch(Exception $e){
                                        break;
                                    }
                                }
                            ?>
                            <!-- <option value="volvo">Volvo</option> -->
                        </select>
                        <br><br>
                   
                        <input type="submit" value="تسجيل">
                </form>
            
        </div>

    </body>
</html>