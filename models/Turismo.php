<?php //Didier 21-06-22-> :O
//Archivo que contiene los querys necesarios para realizar las transacciones en las tablas

//Clase general para los productos
class Turistas extends Conectar{

    /*Metodo  que recupera TODOS los productos de la tabla Producto
    donde su estado es 1.*/
    public function get_producto(){
        $conectar = parent::Conexion();
        parent::set_names();
        $sql =  "SELECT id, ano, mes, visitas FROM turistas";
        $sql = $conectar -> prepare($sql);
        $sql ->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    
    //Insertar un nuevo producto
    public function insert_producto( $ano, $mes, $visitas) {
        $conectar = parent::Conexion();
        parent::set_names();
        $sql =  "INSERT INTO inicios (id, ano, mes, visitas) 
        VALUES (NULL, ?, ?, ?, ?)";
        $sql = $conectar -> prepare ($sql);
        $sql->bindValue(1,$ano);
        $sql->bindValue(2,$mes);
        $sql->bindValue(3,$visitas);
        $sql ->execute();
        return $resultado = $sql ->fetchAll(PDO::FETCH_ASSOC);
    }

    //Actualizar los datso de un producto
    public function update_producto($id,$ano, $mes, $visitas ){
        $conectar = parent::Conexion();
        parent::set_names();
        $sql =  "UPDATE turistas SET ano = ?, mes = ?, visitas = ? WHERE id = ?";
        $sql = $conectar -> prepare ($sql);
        $sql->bindValue(1,$ano);
        $sql->bindValue(2,$mes);
        $sql->bindValue(3,$visitas);
        $sql->bindValue(4,$id);
        $sql ->execute();
        return $resultado = $sql ->fetchAll(PDO::FETCH_ASSOC);
    }

    //Borrado fisico
    public function kill_producto($id){
        $conectar = parent::Conexion();
        parent::set_names();
        $sql =  "DELETE FROM turistas WHERE id = ?";
        $sql = $conectar -> prepare ($sql);
        $sql->bindValue(1,$id);
        $sql ->execute();
        return $resultado = $sql ->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>