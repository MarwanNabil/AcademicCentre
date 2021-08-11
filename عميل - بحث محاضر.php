<?php
    require_once 'must.php';
    require_once 'essentials/teacher.php';

    $fileName = "عميل - بحث محاضر.php";
    $ourCurrentDirectory = $ourDirectory . '/' . $fileName;

    $toBeInTable;
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        try{

            $entry = new teacher();
            $entry->setID($_POST['id']);
            $entry->setFirstName($_POST['firstName']);
            $entry->setSecondName($_POST['secondName']);
            $entry->setPhoneNumber($_POST['phoneNumber']);
            $entry->setPassword($_POST['password']);
            $entry->setWebsite($_POST['website']);
            
            $toBeInTable = teacherFactory::searchAny($entry);
        } catch(exception $e){
            $wrongIssue = $e->getMessage();
        }
    }




?>

<!DOCTYPE html>
<html>
    <head>
        <title>عميل - بحث محاضر</title>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="styles/main.css"/>
        <link rel="stylesheet" type="text/css" href="styles/toolbar.css"/>
        <link rel="stylesheet" type="text/css" href="styles/form.css"/>
        <link rel="stylesheet" type="text/css" href="styles/table.css"/>
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
            <h1 style="float:right; margin-right:10px;">بحث محاضر</h1>
        </div>
        <div style="margin-top:10px;">
                <div style="float:right; width:54%; background-color:#0170c1; height:900px;">
                    <h1 style="padding-right:20px; padding-top:10px;">أعرض محاضر</h1>
                    <form style="margin-top:10px; width:100%; text-align:right; float:right;" method="POST">

                        <label  for="un"><b>الرقم الخاص</b></label>
                        <input type="text" placeholder="الرقم الخاص" name="id" maxlength="5">
                        <br>
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

                        <input type="submit" value="بحث">
                </div>
                </form>
                <div style="background-color:#0170c1; height:900px; width:45%; border-radius:5px">
                    <h1 style="padding-right:15px; padding-top:10px;">جدول النتائج</h1>
                    <table>
                        <tr>
                            <th>الموقع</th>
                            <th>كلمة السر</th>
                            <th>رقم الموبايل</th>
                            <th>الأسم الاخير</th>
                            <th>الأسم الأول</th>
                            <th>الرقم الخاص</th>
                        </tr>
                        <?php
                            if(isset($toBeInTable)){
                            
                                for($i = 0; $i < $toBeInTable->capacity(); $i++){
                                    try{
                                        $toBeInTable->get($i);
                                    } catch(exception $e){
                                        break;
                                    }
                                    echo '<tr>';
                                        echo '<td>' . $toBeInTable->get($i)->getWebsite() . '</td>';
                                        echo '<td>' . $toBeInTable->get($i)->getPassword() . '</td>';
                                        echo '<td>' . $toBeInTable->get($i)->getPhoneNumber() . '</td>';
                                        echo '<td>' . $toBeInTable->get($i)->getSecondName() . '</td>';
                                        echo '<td>' . $toBeInTable->get($i)->getFirstName() . '</td>';
                                        echo '<td>' . $toBeInTable->get($i)->getID() . '</td>';
                                    echo '</tr>';
                                }
                            }
                        
                        ?>
                    </table>
                </div>
        </div>

    </body>
</html>