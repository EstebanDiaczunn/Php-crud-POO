<?php
include_once "connection.php";

class cliente extends connection
{

    public $correo;
    public $nombre;
    public $edad;

    //Create
    public function create()
    {
        $this->conectar();
        $pre = mysqli_prepare($this->conn, "INSERT INTO clientes (correo,nombre,edad) VALUES (?,?,?)");
        $pre->bind_param("ssi", $this->correo, $this->nombre, $this->edad);
        $pre->execute();
        $pre = $pre->get_result();
    }

    //Update
    public function update()
    {
        $this->conectar();
        $pre = mysqli_prepare($this->conn, "UPDATE clientes SET nombre=?, edad=? WHERE correo=?");
        $pre->bind_param("sis", $this->nombre, $this->edad, $this->correo);
        $pre->execute();
    }

    //Delete
    public function delete()
    {
        $this->conectar();
        $pre = mysqli_prepare($this->conn, "DELETE FROM clientes WHERE correo = ?");
        $pre->bind_param("s", $this->correo);
        $pre->execute();
    }

    //READ
    public static function ReadAll()
    {
        $connn = new connection();
        $connn->conectar();
        $pre = mysqli_prepare($connn->conn, "SELECT * FROM clientes");
        $pre->execute();
        $res = $pre->get_result();

        $clientes = [];
        while ($cliente = $res->fetch_object(cliente::class))
            array_push($clientes, $cliente);

        return $clientes;
    }














    //Obtener cliente por mail (PK)
    public static function getByEmail($correo)
    {
        $conexion = new connection();
        $conexion->conectar();
        $pre = mysqli_prepare($conexion->conn, "SELECT * FROM clientes WHERE correo = ?");
        $pre->bind_param("s", $correo);
        $pre->execute();
        $res = $pre->get_result();

        return $res->fetch_object(cliente::class);

    }

}