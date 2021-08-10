<?php
    require_once 'database.php';

    class grade{
        private $id;
        private $gradeNumber; //7
        private $gradeName; //الصف الأول الاعدادي
        public function __construct($id , $gradeNumber , $gradeName){
            $this->id = $id;
            $this->gradeNumber = $gradeNumber;
            $this->gradeName = $gradeName;
        }
        public function getID(){
            return $this->id;
        }
        public function setID($id){
            $this->id = $id;
        }
        public function getGradeNumber(){
            return $this->gradeNumber;
        }
        public function setGradeNumber($gradeNumber){
            $this->gradeNumber = $gradeNumber;
        }
        public function getGradeName(){
            return $this->gradeName;
        }
        public function setGradeName($gradeName){
            $this->gradeName = $gradeName;
        }
    }

    final class gradeFactory{
        public function getAllGrades() : \Ds\Vector {
            $query = database::getInstance()->prepare("SELECT * from grade ORDER BY gradeNumber");
            $query->execute();

            $allGrade = new \DS\Vector();
            while($row = $query->fetch()){
                $allGrade->push(new grade($row['id'] , $row['gradeNumber'] , $row['gradeName']));
            }

            return $allGrade;
        }
        public function addNewGrade($newGrade) {
            $query = database::getInstance()->prepare("INSERT INTO grade (gradeNumber , gradeName) VALUES (?, ?)");
            $query->execute(array($newGrade->getGradeNumber() , $newGrade->getGradeName()));
        }
        public function editGrade($gradeID , $newGrade){
            $query = database::getInstance()->prepare("UPDATE grade SET gradeNumber = ?, gradeName = ? WHERE id = ?");
            $query = $query->execute(array($newGrade->getGradeNumber() , $newGrade->getGradeName() , $gradeID));
        }
        public function deleteGrade($gradeID){
            $query = database::getInstance()->prepare("DELETE FROM grade WHERE id = ?");
            $query = $query->execute(array($gradeID));
        }
        public function countNumberOfGradeNumber($gradeNumber){
            $query = database::getInstance()->prepare("SELECT * from grade WHERE gradeNumber = ?");
            $query->execute(array($gradeNumber));
            return $query->rowCount();
        }
    }
    /*
    gradeFactory::addNewGrade(new grade(12 , 12 , "الصف الثالث الثانوي"));
    */
?>

