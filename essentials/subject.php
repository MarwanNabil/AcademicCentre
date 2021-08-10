<?php
    require_once 'database.php';

    class subject{
        private $id;
        private $gradeID;
        private $subjectName;
        public function __construct($id , $gradeID , $subjectName){
            $this->id = $id;
            $this->gradeID = $gradeID;
            $this->subjectName = $subjectName;
        }
        public function getID(){
            return $this->id;
        }
        public function getGradeID(){
            return $this->gradeID;
        }
        public function setGradeID($gradeID){
            $this->gradeID = $gradeID;
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
            
        }
    }
?>