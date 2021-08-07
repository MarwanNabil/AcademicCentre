<?php
    class teacher{
        private $id;
        private $firstName;
        private $secondName;
        private $password;
        private $phoneNumber;
        private $website;
        public function __construct($id , $firstName , $secondName , $password , $phoneNumber , $website){
            $this->id = $id;
            $this->firstName = $firstName;
            $this->secondName = $secondName;
            $this->password = $password;
            $this->phoneNumber = $phoneNumber;
            $this->website = $website;
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

?>
