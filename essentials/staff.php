<?php
    class staff{
        private $id;
        private $firstName;
        private $secondName;
        private $password;
        function __construct($id , $firstName , $secondName , $password){
            $this->id = $id;
            $this->firstName = $firstName;
            $this->secondName = $secondName;
            $this->password = $password;
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
    }
?>
