<?php
class connection{
    public $conn;
    public function conectar(){
        $this->conn = mysqli_connect("localhost", "root", "", "clientes");
    }
}