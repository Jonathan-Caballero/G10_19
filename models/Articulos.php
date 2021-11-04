<?php
class Articulos extends Conectar{

    public function get_articulos(){
        $conectar = parent::Conexion();
        parent::set_names();
        $sql = "SELECT * FROM ma_articulos WHERE ESTADO = 'A'";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_articulo($ID){
        $conectar = parent::Conexion();
        parent::set_names();
        $sql = "SELECT * FROM ma_articulos WHERE ESTADO = 'A' AND ID = ?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $ID);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_articulo($ID,$ID_SOCIO,$DESCRIPCION,
        $UNIDAD,$COSTO,$PRECIO,$APLICA_ISV,$PORCENTAJE_ISV){
        $conectar = parent::Conexion();
        parent::set_names();
        $sql="INSERT INTO ma_articulos(ID,ID_SOCIO,DESCRIPCION,
        UNIDAD,COSTO,PRECIO,APLICA_ISV,PORCENTAJE_ISV,ESTADO) 
        VALUES(?,?,?,?,?,?,?,?,'A');";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$ID);
        $sql->bindValue(2,$ID_SOCIO);
        $sql->bindValue(3,$DESCRIPCION);
        $sql->bindValue(4,$UNIDAD);
        $sql->bindValue(5,$COSTO);
        $sql->bindValue(6,$PRECIO);
        $sql->bindValue(7,$APLICA_ISV);
        $sql->bindValue(8,$PORCENTAJE_ISV);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete_articulo($ID){
        $conectar=parent :: conexion();
        parent::set_names();
        $sql="DELETE FROM ma_articulos WHERE (ID = ?);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$ID);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_articulo($ID,$ID_SOCIO,$DESCRIPCION,
    $UNIDAD,$COSTO,$PRECIO,$APLICA_ISV,$PORCENTAJE_ISV,$ESTADO){
        $conectar=parent :: conexion();
        parent::set_names();
        $sql="UPDATE ma_articulos SET
        ID_SOCIO= ?,
        DESCRIPCION = ?,
        UNIDAD = ?,
        COSTO = ?,
        PRECIO = ?,
        APLICA_ISV = ?,
        PORCENTAJE_ISV = ?,
        ESTADO = ?
        WHERE (`ID` = ?);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$ID_SOCIO);
        $sql->bindValue(2,$DESCRIPCION);
        $sql->bindValue(3,$UNIDAD);
        $sql->bindValue(4,$COSTO);
        $sql->bindValue(5,$PRECIO);
        $sql->bindValue(6,$APLICA_ISV);
        $sql->bindValue(7,$PORCENTAJE_ISV);
        $sql->bindValue(8,$ESTADO);
        $sql->bindValue(9,$ID);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>