<?php
    class student{
        private $id;
        private $firstName;
        private $secondName;
        private $password;
        private $phoneNumber , $parentOnePhoneNumber , $parentTwoPhoneNumber;
        private $telephoneNumber;
        private $grade;
        private function __construct($id , $firstName , $secondName , $password , $phoneNumber , $grade){
            $this->id = $id;
            $this->firstName = $firstName;
            $this->secondName = $secondName;
            $this->password = $password;
            $this->phoneNumber = $phoneNumber;
            $this->grade = $grade;
        }
        public function __construct1($id , $firstName , $secondName , $password , $phoneNumber , $grade , $parentOnePhoneNumber , $parentTwoPhoneNumber , $telephoneNumber){
           self($id , $firstName , $secondName , $password , $phoneNumber , $grade);
           $this->parentOnePhoneNumber = $parentOnePhoneNumber;
           $this->parentOnePhoneNumber = $parentTwoPhoneNumber;
           $this->telephoneNumber = $telephoneNumber;
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
            return $this->getParentOnePhoneNumber;
        }
        public function setParentOnePhoneNumber($phoneNumber){
            $this->getParentOnePhoneNumber = $phoneNumber;
        }
        public function getParentTwoPhoneNumber(){
            return $this->getParentTwoPhoneNumber;
        }
        public function setParentTwoPhoneNumber($phoneNumber){
            $this->getParentTwoPhoneNumber = $phoneNumber;
        }
    }

?>
