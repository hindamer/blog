<?php
class Blog{
    private $dbtype="mysql";
    private $host="localhost";
    private $dbname="blogdb";
    private $user="root";
    private $password="";
    private $pdo;
    public function __construct()
    {
       $this->pdo=new PDO("$this->dbtype:host=$this->host;dbname=$this->dbname",$this->user,$this->password); 
    }
    public function _get(){
        return $this->pdo;
    }
    function insert($table,$cols,$values){
        return $this->pdo->query("insert into $table ($cols) values ($values)");
    }
    function select($cols,$table,$condition=1){
        return $this->pdo->query("select $cols from $table where $condition");
    }
    function delete($table,$condition){
        return $this->pdo->query("delete from $table where $condition");
    }
    function update($table,$cols,$condition){
        return $this->pdo->query("update $table set $cols where $condition");
    }
}