<?php
namespace lib\database;
use PDO;
class dbConnection
{
    private $dsn 	= "mysql:host=localhost;dbname=quemest_gallery;";
    private $user	= "quemest_gallery";
    private $pass	= "z(9C(MuixiXW";
    private $option = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    );
    public function __construct()
    {
        try{
            global $con;
            $con = new PDO($this->dsn,$this->user,$this->pass,$this->option);
            $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e){
            echo "Failed TO Connected :".$e->getMessage();
        }
    }
}