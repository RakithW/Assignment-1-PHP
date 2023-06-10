<?php
class Database{
    private $connection;
    function __construct(){
        $this->connect_db(); // -> referencing the function
    }
    public function connect_db(){
        $this->connection = mysqli_connect('172.31.22.43','Rakith200505619','6ytcd1fPFf','Rakith200505619');
        if(mysqli_connect_error()){
            die("Database is dead" . mysqli_connect_error() . mysqli_connect_error());
        }
    }
    public function create($fname,$lname,$email,$phoneNum,$address,$pizzatype){
        $sql = "INSERT INTO pizzaPerson(fname, lname, email,phoneNum,address,pizzatype) VALUES ('$fname','$lname','$email','$phoneNum','$address','$pizzatype')";
        $res = mysqli_query($this->connection,$sql);
        if ($res) {
            return true;
        }else{
            return false;
        }
    }
    public function read($id=null){
        $sql = "SELECT * FROM pizzaPerson"; // * Means select all basically
        if($id){
            $sql .= " WHERE id=$id";
        }
        $res = mysqli_query($this->connection, $sql);
        return $res;
    }
    public function sanitize($var){
        $return = mysqli_real_escape_string($this->connection,$var);
        return $return;
    }
}
$database = new Database();