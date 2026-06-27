<?php
class DataBase{

    public static function connection(){

        $hostname = "localhost";
        $port = "3306";
        $database = "db";          // Nombre de tu base de datos
        $username = "root";        // Usuario de XAMPP
        $password = "";            // Contraseña de XAMPP (vacía por defecto)

        try{
            $pdo = new PDO(
                "mysql:host=$hostname;port=$port;dbname=$database;charset=utf8",
                $username,
                $password
            );

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $pdo;

        }catch(PDOException $e){

            die("Error de conexión: ".$e->getMessage());

        }

    }

}
?>