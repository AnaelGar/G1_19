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
    require_once("../models/Docente.php");

    $docen = new docente();

    $body = json_decode(file_get_contents("php://input"),true);

    switch($_GET["op"]){
        case "GetDocentes":
            $datos= $docen->get_docentes();
            echo json_encode($datos); 
        break;

        case "GetDocente":
            $datos= $docen->get_docente($body["NUMERO_DOCENTE"]);
            echo json_encode($datos); 
        break;

        case "InsertDocente":
            $datos= $docen->insert_docente($body["NUMERO_DOCENTE"],$body["NOMBRE"],$body["APELLIDOS"],$body["FECHA_CONTRATACION"],$body["DIRECCION"],$body["SALARIO"],$body["PROFESION"]);
            echo json_encode("Docente Agregado"); 
        break;

        case "UpdateDocente":
            $datos= $docen->update_docente($body["NUMERO_DOCENTE"],$body["NOMBRE"],$body["APELLIDOS"],$body["FECHA_CONTRATACION"],$body["DIRECCION"],$body["SALARIO"],$body["PROFESION"]);
            echo json_encode("Docente Actualizado"); 
        break;

        case "DeleteDocente":
            $datos= $docen->delete_docente($body["NUMERO_DOCENTE"]);
            echo json_encode("Docente Eliminado"); 
        break;

    }
    
?>