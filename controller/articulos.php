<?php
     if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
        header('Access-Control-Allow-Headers: token, Content-Type');
        header('Access-Control-Max-Age: 1728000');
        header('Content-Length: 0');
        header('Content-Type: text/plain');
        die();
      }
        header('Access-Control-Allow-Origin: *');  
        header('Content-Type: application/json');

    require_once("../config/conexion.php");
    require_once("../models/Articulos.php");
    $articulos = new Articulos();

    $body = json_decode(file_get_contents("php://input"), true);

    switch($_GET["op"]){
        case "GetArticulos":
            $datos = $articulos->get_articulos();
            echo json_encode($datos);
        break;

        case "GetUno":
            $datos = $articulos->get_articulo($body["ID"]);
            echo json_encode($datos);
        break;

        case "InsertArtuculos":
            $datos=$articulos->insert_articulo($body["ID"],$body["ID_SOCIO"],$body["DESCRIPCION"],
            $body["UNIDAD"],$body["COSTO"],$body["PRECIO"],$body["APLICA_ISV"],$body["PORCENTAJE_ISV"]);
            echo json_encode("Articulo Insertado");
        break;

        case "EliminarArticulos":
            $datos=$articulos->delete_articulo($body["ID"]);
            echo json_encode("Articulo Eliminado");
        break;

        case "UpdateArticulos":
            $datos=$articulos->update_articulo($body["ID"],$body["ID_SOCIO"],$body["DESCRIPCION"],
            $body["UNIDAD"],$body["COSTO"],$body["PRECIO"],$body["APLICA_ISV"],$body["PORCENTAJE_ISV"],$body["ESTADO"]);
            echo json_encode("Articulo Actualizado");
          break;
    }
?>