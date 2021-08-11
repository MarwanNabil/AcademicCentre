<?php
    require_once 'database.php';

    class teacher{
        private $id;
        private $firstName;
        private $secondName;
        private $password;
        private $phoneNumber;
        private $website;
        public function __construct(){}
        public function __construct1($id , $firstName , $secondName , $password , $phoneNumber , $website){
            $this->id = $id;
            $this->firstName = $firstName;
            $this->secondName = $secondName;
            $this->password = $password;
            $this->phoneNumber = $phoneNumber;
            $this->website = $website;
        }
        public function setID($id){
            $this->id = $id;
        }
        public function getID(){
            return $this->id;
        }
        public function getFirstName(){
            return $this->firstName;
        }
        public function setFirstName($firstName){
            $this->firstName = $firstName;
        }
        public function getSecondName(){
            return $this->secondName;
        }
        public function setSecondName($secondName){
            $this->secondName = $secondName;
        }
        public function getFullName(){
            return getFirstName() . ' ' . getSecondName();
        }
        public function getPassword(){
            return $this->password;
        }
        public function setPassword($password){
            $this->password = $password;
        }
        public function getPhoneNumber(){
            return $this->phoneNumber;
        }
        public function setPhoneNumber($phoneNumber){
            $this->phoneNumber = $phoneNumber;
        }
        public function getWebsite(){
            return $this->website;
        }
        public function setWebsite($website){
            $this->website = $website;
        }
    }

    final class teacherFactory{
        private function rowIntializerToTeacher($row) : teacher{
            $foundTeacher = new teacher();
            $foundTeacher->setID($row['id']);
            $foundTeacher->setFirstName($row['firstName']);
            $foundTeacher->setSecondName($row['secondName']);
            $foundTeacher->setPassword($row['password']);
            $foundTeacher->setPhoneNumber($row['phoneNumber']);
            $foundTeacher->setWebsite($row['website']);
            return $foundTeacher;
        }
        public function getAllTeachers() : \Ds\Vector {
            $allTeachers = new \Ds\Vector();


            $query = database::getInstance()->prepare("SELECT * FROM teacher");
            $query->execute();
            while($row = $query->fetch()){
                $newTeacher = self::rowIntializerToTeacher($row);
                $allTeachers->push($newTeacher);
            }

            return $allTeachers;
        }
        public function addTeacher($entry) {
            $query = database::getInstance()->prepare("INSERT INTO teacher (id , firstName, secondName, phoneNumber, teacherWebsite, password) VALUES (NULL, ?, ?, ?, ?, ?) ");
            $query->execute(array($entry->getFirstName(), $entry->getSecondName(), $entry->getPhoneNumber(), $entry->getWebsite(), $entry->getPassword()));
        }
        public function deleteTeacherID($targetTeacherID){
            $query = database::getInstance()->prepare("DELETE FROM teacher WHERE id = ?");
            $query->execute(array($targetTeacherID));
        }
        public function deleteTeacherViaObject($targetTeacher) {
            self::deleteStudentViaID($targetTeacher->getID());
        }
        public function getTeacherViaID($teacherID){
            $query = database::getInstance()->prepare("SELECT * FROM teacher WHERE id = ?");
            $query->execute(array($teacherID));
            $row = $query->fetch();
            return self::rowIntializerToTeacher($row);
        }
        public function editTeacherViaID($teacherID , $teacherObject){
            $query = database::getInstance()->prepare("UPDATE teacher SET firstName = ?, secondName = ?, phoneNumber = ?, website = ? WHERE id = ?");
            $query->execute(array($teacherObject->getFirstName(), $teacherObject->getSecondName(), $teacherObject->getPhoneNumber(), $teacherObject->getWebsite(), $teacherID));
        }
        public function searchAny($target) : \DS\Vector {
            $will = 'SELECT * from teacher ';
            $adder = '';
            $array = [];
            
            if($target->getID() == 0){
                $adder .= "WHERE id LIKE '%' ";
            } else {
                $adder .= 'WHERE id = ? ';
                array_push($array , $target->getID());
            }

            if($target->getFirstName() == ""){
                $adder .= "AND firstName LIKE '%' ";
            } else {
                $adder .= 'AND firstName = ? ';
                array_push($array , $target->getFirstName());
            }

            if($target->getSecondName() == ""){
                $adder .= "AND secondName LIKE '%' ";
            } else {
                $adder .= 'AND secondName = ? ';
                array_push($array , $target->getSecondName());
            }
            
            if($target->getPhoneNumber() == ""){
                $adder .= "AND phoneNumber LIKE '%' ";
            } else {
                $adder .= 'AND phoneNumber = ? ';
                array_push($array , $target->getPhoneNumber());
            }
            
            if($target->getPassword() == ""){
                $adder .= "AND password LIKE '%' ";
            } else {
                $adder .= 'AND password = ? ';
                array_push($array , $target->getPassword());
            }

            if($target->getWebsite() == ""){
                $adder .= "AND website LIKE '%' ";
            } else {
                $adder .= 'AND website = ? ';
                array_push($array , $target->getWebsite());
            }
            
            $will .= $adder;

            $query = database::getInstance()->prepare($will);
            $query->execute($array);
            
            $validTeachers = new \DS\Vector();
            while($row = $query->fetch()){    
                $validTeachers->push( teacherFactory::rowIntializerToTeacher($row) );
            }
            return $validTeachers;
        }
    }

?>
