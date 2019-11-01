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
        $this-> connection = mysqli_connect($this->host,$this->user,$this->password,$this->database);
        mysqli_set_charset($this-> connection,"utf-8");
    }

    public function  select($sql){
        $result = $this->connection->query($sql);
        if (!$result){
            die($this->errno().':'.$this->error().'<br />出错语句为'.$this->sql.'<br />');
        }

        return $result;

    }

    public function insert($sql){
        try {
            $this->connection->query($sql);
        } catch (Exception $e) {
            //echo $e->getMessage();
            // die(); // 终止异常
        }

    }

    public function delete($sql){
        $this->connection->query($sql);
    }

    public function update($sql){
        $this->connection->query($sql);
    }

    public function queryOne($sql){
        $result = $this->connection->query($sql);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
    /**
     * 关闭数据库连接
     */
    public function closeConnection(){
        mysqli_close($this-> connection);
    }

    /**
     * 获取错误号
     * @access private
     * @return 错误号
     */
    public function errno(){
        return mysqli_errno($this->conn);
    }

    /**
     * 获取错误信息
     * @access private
     * @return 错误private信息
     */
    public function error(){
        return mysqli_error($this->conn);
    }

}