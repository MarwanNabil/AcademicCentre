<?php

    require_once 'database.php';

    class student{
        private $id;
        private $firstName;
        private $lastName;
        private $password;
        private $phoneNumber , $parentOnePhoneNumber , $parentTwoPhoneNumber;
        private $telephoneNumber;
        private $grade;
        public function __construct(){}
        public function __construct1($id , $firstName , $lastName , $password , $phoneNumber , $grade , $parentOnePhoneNumber , $parentTwoPhoneNumber , $telephoneNumber){
            $this->id = $id;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->password = $password;
            $this->phoneNumber = $phoneNumber;
            $this->grade = $grade;
            $this->parentOnePhoneNumber = $parentOnePhoneNumber;
            $this->parentTwoPhoneNumber = $parentTwoPhoneNumber;
            $this->telephoneNumber = $telephoneNumber;
        }
        public function getID(){
            return $this->id();
        }
        public function setID($id){
            $this->id = $id;
        }
        public function getFirstName(){
            return $this->firstName;
        }
        public function setFirstName($firstName){
            $this->firstName = $firstName;
        }
        public function getlastName(){
            return $this->lastName;
        }
        public function setlastName($lastName){
            $this->lastName = $lastName;
        }
        public function getFullName(){
            return getFirstName() . ' ' . getlastName();
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
        public function getTelephoneNumber(){
            return $this->telephoneNumber;
        }
        public function setTelephoneNumber($telephoneNumber){
            $this->telephoneNumber = $telephoneNumber;
        }
        public function getGrade(){
            return $this->grade;
        }
        public function setGrade($grade){
            $this->grade = $grade;
        }
        public function getParentOnePhoneNumber(){
            return $this->parentOnePhoneNumber;
        }
        public function setParentOnePhoneNumber($phoneNumber){
            $this->parentTwoPhoneNumber = $phoneNumber;
        }
        public function getParentTwoPhoneNumber(){
            return $this->parentTwoPhoneNumber;
        }
        public function setParentTwoPhoneNumber($phoneNumber){
            $this->parentTwoPhoneNumber = $phoneNumber;
        }
    }

    final class studentFactory{
        public function addStudent($newStudent){
            
            //make sure that every point of data doesn't vaiolate our database conditions.
            
            $query = database::getInstance()->prepare("INSERT INTO student (id, firstName, lastName, password, phoneNumber, grade, firstParentPhoneNumber, secondParentPhoneNumber, telephoneNumber) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?)");
            $query->execute(array($newStudent->getFirstName(), $newStudent->getlastName(), $newStudent->getPassword(), $newStudent->getPhoneNumber(), $newStudent->getGrade(), $newStudent->getParentOnePhoneNumber(), $newStudent->getParentTwoPhoneNumber(), $newStudent->getTelephoneNumber()));
        }
        public function deleteStudentViaID($targetStudentID){
            $query = database::getInstance()->prepare("DELETE FROM student WHERE id = ?");
            $query->execute(array($targetStudentID));
        }

        public function deleteStudentViaObject($targetStudent) {
            self::deleteStudentViaID($targetStudentID->getID());
        }

        private function rowIntializerToStudent($row) : student{
            $foundStudent = new student();
            $foundStudent->setID($row['id']);
            $foundStudent->setFirstName($row['firstName']);
            $foundStudent->setlastName($row['lastName']);
            $foundStudent->setPassword($row['password']);
            $foundStudent->setPhoneNumber($row['phoneNumber']);
            $foundStudent->setTelephoneNumber($row['telephoneNumber']);
            $foundStudent->setParentOnePhoneNumber($row['firstParentPhoneNumber']);
            $foundStudent->setParentTwoPhoneNumber($row['secondParentPhoneNumber']);
            $foundStudent->setGrade($row['grade']);
            return $foundStudent;
        }

        public function searchViaID($targetStudentID) : student {
            $query = database::getInstance()->prepare("SELECT * FROM student WHERE id = ?");
            $query->execute(array($targetStudentID));
            
            //will return null if not found , otherwise will return an object
            if($query->rowCount() == 0)
                return null;

            $row = $query->fetch();

            return studentFactory::rowIntializerToStudent($row);
        }
        
        public function searchViaFirstName($targetFirstName) : \DS\Vector {
            $query = database::getInstance()->prepare("SELECT * FROM student WHERE firstName = ?");
            $query->execute(array($targetFirstName));
            
            //will return null if not found , otherwise will return an object
            if($query->rowCount() == 0)
                return null;

            $validStudents = new \DS\Vector();
            while($row = $query->fetch()){    
                $validStudents->push( studentFactory::rowIntializerToStudent($row) );
            }
            return $validStudents;
        }
    }


    //queries
    /*
    $x = new student(1 , "Marwan" , "Nabil ElDeep" , "M1234567890" , "01022882661" , "12" , "01006485035" , "01122882661" , "22555521");
    studentFactory::addStudent($x);
    
    studentFactory::deleteStudentViaID(3);
    */

    print_r(studentFactory::searchViaFirstName("Marwan"));
?>
