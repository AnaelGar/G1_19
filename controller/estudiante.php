<?php 
//Realizado POr Anael Ivanov Garcia Lagos
//Entidad Docente

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
    require_once("../models/Estudiante.php");

    $estudia = new estudiante();

    $body = json_decode(file_get_contents("php://input"),true);

    switch($_GET["op"]){
        case "GetEstudiantes":
            $datos= $estudia->get_estudiantes();
            echo json_encode($datos); 
        break;

        case "GetEstudiante":
            $datos= $estudia->get_estudiante($body["NUMERO_ALUMNO"]);
            echo json_encode($datos); 
        break;

        case "InsertEstudiante":
            $datos= $estudia->insert_estudiante($body["NUMERO_ALUMNO"],$body["NOMBRE"],$body["APELLIDOS"],$body["FECHA_NACIMIENTO"],$body["DIRECCION"],$body["ALTURA"],$body["CARRERA"]);
            echo json_encode("Estudiante Agregado"); 
        break;

        case "UpdateEstudiante":
            $datos= $estudia->update_estudiante($body["NUMERO_ALUMNO"],$body["NOMBRE"],$body["APELLIDOS"],$body["FECHA_NACIMIENTO"],$body["DIRECCION"],$body["ALTURA"],$body["CARRERA"]);
            echo json_encode("Estudiante Actualizado"); 
        break;

        case "DeleteEstudiante":
            $datos= $estudia->delete_estudiante($body["NUMERO_ALUMNO"]);
            echo json_encode("Estudiante Eliminado"); 
        break;

    }
    
?>	