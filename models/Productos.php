<?php //Didier 21-06-22-> :O
//Archivo que contiene los querys necesarios para realizar las transacciones en las tablas

//Clase general para los productos
class Inicios extends Conectar{

    /*Metodo  que recupera TODOS los productos de la tabla Producto
    donde su estado es 1.*/
    public function get_producto(){
        $conectar = parent::Conexion();
        parent::set_names();
        $sql =  "SELECT id, hoyText, enterateImg, carruselImg, carruselImg2, carruselImg3, hoyImg FROM inicios";
        $sql = $conectar -> prepare($sql);
        $sql ->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    
    //Insertar un nuevo producto
    public function insert_producto($hoyText, $enterateImg, $carruselImg, $carruselImg2, $carruselImg3, $hoyImg) {
        $conectar = parent::Conexion();
        parent::set_names();
        $sql =  "INSERT INTO inicios (id, hoyText, enterateImg, carruselImg, carruselImg2, carruselImg3, hoyImg) 
        VALUES (NULL, ?, ?, ?, ?, ?, ?)";
        $sql = $conectar -> prepare ($sql);
        $sql->bindValue(1,$hoyText);
        $sql->bindValue(2,$enterateImg);
        $sql->bindValue(3,$carruselImg);
        $sql->bindValue(4,$carruselImg2);
        $sql->bindValue(5,$carruselImg3);
        $sql->bindValue(6,$hoyImg);
        $sql ->execute();
        return $resultado = $sql ->fetchAll(PDO::FETCH_ASSOC);
    }

    //Actualizar los datso de un producto
    public function update_producto($id, $hoyText, $enterateImg, $carruselImg, $carruselImg2, $carruselImg3, $hoyImg){
        $conectar = parent::Conexion();
        parent::set_names();
        $sql =  "UPDATE inicios SET hoyText = ?, enterateImg = ?, carruselImg = ?, carruselImg2 = ?, 
        carruselImg3 = ?, hoyImg = ? WHERE id = ?";
        $sql = $conectar -> prepare ($sql);
        $sql->bindValue(1,$hoyText);
        $sql->bindValue(2,$enterateImg);
        $sql->bindValue(3,$carruselImg);
        $sql->bindValue(4,$carruselImg2);
        $sql->bindValue(5,$carruselImg3);
        $sql->bindValue(6,$hoyImg);
        $sql->bindValue(7,$id);
        $sql ->execute();
        return $resultado = $sql ->fetchAll(PDO::FETCH_ASSOC);
    }

    //Borrado fisico
    public function kill_producto($id){
        $conectar = parent::Conexion();
        parent::set_names();
        $sql =  "DELETE FROM inicios WHERE id = ?";
        $sql = $conectar -> prepare ($sql);
        $sql->bindValue(1,$id);
        $sql ->execute();
        return $resultado = $sql ->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>