<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'db_rumah_sakit');

class Database{
    public $mysqli;

    function __construct(){
        $this->mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS,DB_NAME); 
    }

    function select($table, $where = null){
        $sql = ("SELECT * FROM $table ");
        if ($where != null) {
            $sql .= "WHERE ";
            $row = null;
            if (count($where) == 1) {
                foreach ($where as $key => $value) {
                    $sql .= $key."='".$value."'";
                }
            } else {
                foreach ($where as $key => $value) {
                    $row .= $key."='".$value."' AND ";
                }
                $sql .= substr($row, 0, -4); 
            }
        }
        $result = $this->mysqli->query($sql) or trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $this->mysqli->error,E_USER_ERROR);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function insert($table, $rows){
        $sql = "INSERT INTO $table";
        $row = null;
        $value = null;
        foreach ($rows as $key => $nilai) {
            $row .= ",".$key;
            $value .= ",'".$nilai."'";
        }
        $sql .= "(". substr($row, 1) .")";
        $sql .= " VALUES (". substr($value, 1) .")";
        $query = $this->mysqli->prepare($sql) or die($this->mysqli->error);
        $query->execute();
        if ($query) {
            echo "<script>alert('Data berhasil disimpan');</script>";
        }
    }

    function update($table, $field, $where)
    {
        $sql = "UPDATE $table SET ";
        $set = null;
        $setWhere = null;
        foreach ($field as $key => $value) {
            $set .= ", ". $key . " = '". $value ."'";
        }
        foreach ($where as $key => $value) {
            $setWhere = $key."='".$value."'";
        }
        $sql .= substr($set, 1). " WHERE $setWhere";
        $query = $this->mysqli->prepare($sql) or die($this->mysqli->error);
        $query->execute();
        if ($query) {
            echo "<script>alert('Data berhasil di-update');</script>";
        }
    }

    function delete($table, $where)
    {
        $setWhere = null;
        foreach ($where as $key => $value) {
            $setWhere = $key."='".$value."'";
        }
        $sql = "DELETE FROM $table WHERE $setWhere";
        $query = $this->mysqli->prepare($sql) or die($this->mysqli->error);
        $query->execute();
        if($query){
            echo "<script>alert('Data berhasil di-hapus');</script>";
        }
    }
}