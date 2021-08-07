<?php

class database {
    private static $instance;

    public static function getInstance() : PDO 
    {
        if( !isset(self::$instance) ){
            
            $dsn = 'mysql:host=localhost;dbname=academiccentre;'; //Data Source Name

            $user = 'root'; //the user to connect
            $pass = ''; //password for this user
            $options = array(
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', //make the intial
            );

            try{
                self::$instance = new PDO($dsn , $user , $pass , $options); //this made for enabling to to put arabic strings in the database
                (self::$instance)->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                return self::$instance;

            } catch (PDOException $e){
                
                echo $e::getMessage();
                return null;
            }
        }
        return self::$instance;
    }
}

?>