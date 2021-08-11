<?php
    require_once 'must.php';
    require_once 'essentials/subject.php';
    
    $fileName = "عميل - مادة.php";
    $ourCurrentDirectory = $ourDirectory . '/' . $fileName;



    
    //to get all grades from the database.
    $allGrades = gradeFactory::getAllGrades();
    $allSubjects = subjectFactory::getAllSubjects();

    $wrongAdding;

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        try{
            
            if( isset($_POST['gradeOptionsAdding']) || isset($_POST['subjectNameAdding']) ){
                
                if($_POST['gradeOptionsAdding'] != 0 && $_POST['gradeOptionsAdding'] != ""){

                    //we only do this for gradeID
                    $newGrade = new grade($_POST['gradeOptionsAdding'] , -1 , "Don't Worry Will Not Be Added");
                    $newSubject = new subject($newGrade , -1 , $_POST['subjectNameAdding']);

                    subjectFactory::addSubject($newSubject);
                    header('Location: ' . $ourCurrentDirectory);
                    exit;
                } else {
                    throw new ErrorException("يرجي ادخال البيانات المادة الجديدة بشكل صحيح");
                }
            } else if( isset($_POST['gradeOptionsRemoving']) ){
                if($_POST['gradeOptionsRemoving'] != 0){
                    subjectFactory::removeSubject($_POST['gradeOptionsRemoving']);
                    header('Location: ' . $ourCurrentDirectory);
                    exit;
                } else {
                    throw new ErrorException("يرجي اختيار حقل من الأرقام الخاصة");
                }
            }            

        } catch(exception $e){
            
        }
        unset($_POST);
        $_POST = array();
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>عميل - مادة</title>
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
            <h1 style="float:right; margin-right:10px;">مادة</h1>
        </div>
        <div style="margin-top:-30px;">
            <table style="margin-bottom:40px;">
                <tr>
                    <th>الرقم الخاص</th>
                    <th>اسم المادة</th>
                    <th>الرقم المعبر</th>
                    <th>الصف الدراسي</th>
                </tr>
                <?php
                    for($i = 0; $i < $allSubjects->capacity(); $i++){
                        try{
                            $current = $allSubjects->get($i);
                            echo '<tr>';
                                echo '<td>' . $current->getID() . '</td>';
                                echo '<td>' . $current->getSubjectName() . '</td>';
                                echo '<td>' . $current->getGrade()->getGradeNumber() . '</td>';
                                echo '<td>' . $current->getGrade()->getGradeName() . '</td>';
                            echo '</tr>';
                        } catch(Exception $e){
                            break;
                        }
                    }
                ?>
            </table>
            <div style="float:right; width:49%; background-color:#0170c1; height:500px; border-radius:5px;">
                    <h1 style="padding-right:20px;">إضافة مادة</h1>
                    <form style="margin-top:10px; width:100%; text-align:right; float:right;" method="POST">


                        <label  for="un"><b>الصف الدراسي</b></label>
                        <select name="gradeOptionsAdding" style="text-align:right;">
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
                        <label  for="un"><b>اسم المادة</b></label>
                        <input type="text" placeholder="اسم المادة" name="subjectNameAdding" maxlength="30">
                        <br>
                        <input type="submit" value="تسجيل">
                    </form>
                </div>
                <div style="background-color:#0170c1; height:500px; width:49%; border-radius:5px; float:left;">
                    <h1 style="padding-right:15px; padding-top:10px;">حذف مادة بجميع ما يتعلق</h1>
                    <form method="POST">
                        <label>أختار الرقم الخاص للمادة للحذف</label>
                        <select name="gradeOptionsRemoving" style="text-align:right;">
                            <option value="0"></option>
                            <?php
                                for($i = 0; $i < $allSubjects->capacity(); $i++){
                                    try{
                                        $current = $allSubjects->get($i);
                                        echo "<option value='" . $current->getID() . "'> ";
                                        echo $current->getID() . '</option>';
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