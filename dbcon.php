<?php
class Conn
{
    private $conn;

    public function getConnection()
    {
        $this->conn = null;
        $conn = mysqli_connect('localhost', 'root', '', 'dblearn');
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }

        $this->conn = $conn;
    }
    public function insert($query)
    {
        $ret = mysqli_query($this->conn, $query);
        return $ret;
    }
    public function update($query)
    {
        $ret = mysqli_query($this->conn, $query);
        return $ret;
    }
    public function SelectQuery($query)
    {
        $ret = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_array($ret);
        return $row;
    }
    public function getData($query)
    {
        $result = mysqli_query($this->conn, $query);
        return $result;
    }
    public function getRows($query)
    {
        $ret = mysqli_query($this->conn, $query);
        $count = mysqli_num_rows($ret);
        return $count;
    }
}
