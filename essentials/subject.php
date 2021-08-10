<?php
    require_once 'database.php';
    require_once 'grade.php';

    class subject{
        private $grade;

        private $id;
        private $subjectName;
        public function __construct($grade , $id , $subjectName){
            $this->grade = $grade;
            $this->id = $id;
            $this->subjectName = $subjectName;
        }
        public function getGrade(){
            return $this->grade;
        }
        public function setGrade($grade){
            $this->grade = $grade;
        }
        public function getID(){
            return $this->id;
        }
        public function setID($id){
            $this->id = $id;
        }
        public function getSubjectName(){
            return $this->subjectName;
        }
        public function setSubjectName($subjectName){
            $this->subjectName = $subjectName;
        }
    }

    final class subjectFactory{
        public function getAllSubjects() : \Ds\Vector {
            $allSubjects = new \Ds\Vector();
            
            $query1 = database::getInstance()->prepare("SELECT * FROM grade ORDER BY gradeNumber");
            $query1->execute();
            while($row1 = $query1->fetch()){
                $nwGrade = new grade($row1['id'] , $row1['gradeNumber'] , $row1['gradeName']);
                
                $query2 = database::getInstance()->prepare("SELECT * FROM subject WHERE gradeID = ?");
                $query2->execute(array($nwGrade->getID()));
                while($row2 = $query2->fetch()){
                    $subject = new subject($nwGrade , $row2['id'] , $row2['subjectName']);

                    $allSubjects->push($subject);
                }
            }
            
            return $allSubjects;
        }
        public function addSubject($subject) {
            $query = database::getInstance()->prepare("INSERT INTO subject (subjectName, gradeID) VALUES (?, ?)");
            $query->execute(array($subject->getSubjectName() , $subject->getGrade()->getID()));
        }
        public function removeSubject($subjectID){
            $query = database::getInstance()->prepare("DELETE FROM subject WHERE id = ?");
            $query->execute(array($subjectID));
        }
    }
?>