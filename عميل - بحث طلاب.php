<?php
    require_once 'essentials/student.php';

    $toBeInTable;

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        try{

            $entry = new student();
            $entry->setID($_POST['id']);
            $entry->setFirstName($_POST['firstName']);
            $entry->setlastName($_POST['lastName']);
            $entry->setPhoneNumber($_POST['phoneNumber']);
            $entry->setPassword($_POST['password']);
            $entry->setTelephoneNumber($_POST['telephoneNumber']);
            $entry->setParentOnePhoneNumber($_POST['parentOnePhoneNumber']);
            $entry->setParentTwoPhoneNumber($_POST['parentTwoPhoneNumber']);
            $entry->setGrade($_POST['grade']);
            
            $toBeInTable = studentFactory::searchAny($entry);
            unset($_POST);
        } catch(exception $e){
            $wrongIssue = $e->getMessage();
        }
        
    }



?>

<!DOCTYPE html>
<html>
    <head>
        <title>عميل - عرض طالب</title>
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
        <div style="margin-top:10px;">
                <div style="float:right; width:54%; background-color:#0170c1; height:900px;">
                    <h1 style="padding-right:20px; padding-top:10px;">أعرض طالب</h1>
                    <form style="text-align:right; float:right; width=100%;" method="POST">

                        <label  for="un"><b>الرقم الخاص</b></label>
                        <input type="text" placeholder="الرقم الخاص" name="id" maxlength="5">

                        <label  for="un"><b>الأسم الأول</b></label>
                        <input type="text" placeholder="الأسم الأول" name="firstName" maxlength="30">

                        <label  for="un"><b>الأسم الثاني</b></label>
                        <input type="text" placeholder="الأسم الثاني" name="lastName" maxlength="60">

                        <label style="" for="un"><b>رقم الموبايل</b></label>
                        <input type="text" placeholder="رقم الموبايل" name="phoneNumber" maxlength="11">
                        
                        <label  for="un"><b>كلمة المرور</b></label>
                        <input type="password" placeholder="كلمة المرور" name="password" maxlength="30">

                        <label  for="un"><b>هاتف المنزل</b></label>
                        <input type="text" placeholder="هاتف المنزل" name="telephoneNumber" maxlength="20">
                        
                        <label  for="un"><b>ولي الامر الأول</b></label>
                        <input type="text" placeholder="موبايل" name="parentOnePhoneNumber" maxlength="11">
                        
                        <label  for="un"><b>ولي الامر الثاني</b></label>
                        <input type="text" placeholder="موبايل" name="parentTwoPhoneNumber" maxlength="11">

                        <label  for="un"><b>الصف الدراسي</b></label>
                        <input type="text" placeholder="الصف الدراسي" name="grade" maxlength="2">
                        <input type="submit" value="بحث">
                </div>
                </form>
                <div style="background-color:#0170c1; height:900px; width:45%; border-radius:5px">
                    <h1 style="padding-right:15px; padding-top:10px;">جدول النتائج</h1>
                    <table>
                        <tr>
                            <th>الصف الدراسي</th>
                            <th>الهاتف</th>
                            <th>ولي ثاني</th>
                            <th>ولي أول</th>
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
                                        echo '<td>' . $toBeInTable->get($i)->getGrade() . '</td>';
                                        echo '<td>' . $toBeInTable->get($i)->getTelephoneNumber() . '</td>';
                                        echo '<td>' . $toBeInTable->get($i)->getParentTwoPhoneNumber() . '</td>';
                                        echo '<td>' . $toBeInTable->get($i)->getParentOnePhoneNumber() . '</td>';
                                        echo '<td>' . $toBeInTable->get($i)->getPassword() . '</td>';
                                        echo '<td>' . $toBeInTable->get($i)->getPhoneNumber() . '</td>';
                                        echo '<td>' . $toBeInTable->get($i)->getLastName() . '</td>';
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