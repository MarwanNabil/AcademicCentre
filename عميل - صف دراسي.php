<?php
    require_once 'must.php';
    require_once 'essentials/grade.php';


    $fileName = "عميل - صف دراسي.php";
    $ourCurrentDirectory = $ourDirectory . '/' . $fileName;
    
    //to get all grades from the database.
    $allGrades = gradeFactory::getAllGrades();

    $wrongAdding;

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        try{
            if(isset($_POST['gradeNumber'])){
                if($_POST['gradeNumber'] != "" && $_POST['gradeName'] != "" && gradeFactory::countNumberOfGradeNumber($_POST['gradeNumber']) == 0){
                    //make sure you have only one grade number (uniqe)
                    $grade = new grade(-1 , $_POST['gradeNumber'] , $_POST['gradeName']);
                    gradeFactory::addNewGrade($grade);
                    header("Location : " . $ourCurrentDirectory);
                } else {
                    throw new ErrorException("رجاء مليء معلومات الصف الدراسي بشكل صحيح");
                }
            } else if(isset($_POST['gradeOptions'])) {
                echo $_POST['gradeOptions'];
                gradeFactory::deleteGrade($_POST['gradeOptions']);
                header("Location : " . $ourCurrentDirectory);
            }
        } catch(exception $e){

        }
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>عميل - صف دراسي</title>
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
            <img style="float:right;" src="images/backSmall.png" onclick="location.href='عميل - الصفحة الرئيسية.php'">
            <h1 style="float:right; margin-right:10px;">الصفوف الدراسية</h1>
        </div>
        <div style="margin-top:-30px;">
            <table style="margin-bottom:40px;">
                <tr>
                    <th>الرقم المعبر</th>
                    <th>أسم الصف الدراسي</th>
                    <th>الرقم الخاص</th>
                </tr>
                <?php
                    for($i = 0; $i < $allGrades->capacity(); $i++){
                        try{
                            $current = $allGrades->get($i);
                            echo '<tr>';
                                echo '<td>' . $current->getGradeNumber() . '</td>';
                                echo '<td>' . $current->getGradeName() . '</td>';
                                echo '<td>' . $current->getID() . '</td>';
                            echo '</tr>';
                        } catch(Exception $e){
                            break;
                        }
                    }
                ?>
            </table>
            <div style="float:right; width:49%; background-color:#0170c1; height:500px; border-radius:5px;">
                    <h1 style="padding-right:20px;">إضافة صف دراسي</h1>
                    <form style="text-align:right; float:right; width=100%;" method="POST">
                        <label  for="un"><b>الرقم المعبر</b></label>
                        <input type="text" placeholder="الرقم المعبر" name="gradeNumber" maxlength="2">
                        <label  for="un"><b>اسم الصف الدراسي</b></label>
                        <input type="text" placeholder="اسم الصف الدراسي" name="gradeName" maxlength="30">
                        <input type="submit" value="تسجيل">
                    </form>
                </div>
                <div style="background-color:#0170c1; height:500px; width:49%; border-radius:5px; float:left;">
                    <h1 style="padding-right:15px; padding-top:10px;">حذف صف دراسي بجميع ما يتعلق</h1>
                    <form method="POST">
                        <label>أختار صف دراسي للحذف</label>
                        <select name="gradeOptions" style="text-align:right;">
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
                        <input type="submit" value="حذف">
                    </form>
                </div>
        </div>
    </body>
</html>