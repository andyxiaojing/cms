<?php

class DbOperation{
    private $connection;
    private $host = "localhost:3306";
    private $user = "root";
    private $password = "root";
    private $database = "cms";


    public static function  getDb(){
        return new DbOperation();
    }

    public function __construct(){
        $this->connection = new PDO("mysql:host=".$this->host.";dbname=".$this->database,$this->user,$this->password);
    }

    public function  select($sql){
        return $result = $this->connection->query($sql);
    }

    public function insert($sql){
        try {
            $this->connection->exec($sql);
        } catch (Exception $e) {
            //echo $e->getMessage();
            // die(); // 终止异常
        }

    }

    public function delete($sql){
        $this->connection->exec($sql);
    }

    public function update($sql){
        $this->connection->exec($sql);
    }

    public function queryOne($sql){
        $result = $this->connection->query($sql);
       return $result->fetch(\PDO::FETCH_ASSOC);
    }
    /**
     * 关闭数据库连接
     */
    public function closeConnection(){
        $this-> connection =null;
    }


}