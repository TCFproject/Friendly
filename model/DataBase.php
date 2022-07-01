<?php
require_once ("IDataBase.php");

class DataBase implements IDataBase {
    private $server = 'localhost:3308';
    private $username = 'root';
    private $password = '';
    private $database = 'mangaAma';

    public function getBDDConn(){
        // TODO: Implement getBDDConn() method.
        $BDDConn = null;
        try{
            $BDDConn = new PDO("mysql:host=$this->server;dbname=$this->database;", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
            $BDDConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
            echo 'Connection Error: ' . $e->getMessage();
        }
        return $BDDConn;
    }

    public function __construct()
    {
        $BDDConn = null;
        try{
            $BDDConn = new PDO("mysql:host=$this->server;dbname=$this->database;", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
            $BDDConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
            echo 'Connection Error: ' . $e->getMessage();
        }
        return $BDDConn;
    }
}
?>
