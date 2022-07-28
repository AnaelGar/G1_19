<?php
   if($_SERVER['REQUEST_METHOD']==='OPTIONS'){
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
        header('Access-Control-Allow-Headers: token, Content-Type');
        header('Access-Control-Allow-Max-Age: 1728000');
        header('Content-Length: 0');
        header('Content-Type: text/plain');
        die();
    }

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    require_once("../config/Conexion.php");
    require_once("../models/Estudiantes.php");
    $asignatur = new asignatura();

    $body=json_decode(file_get_contents("php://input"),true);

    switch($_GET["op"]){
        case "GetAsignaturas":
            $datos=$asignatur->get_asignaturas();
            echo json_encode($datos);
        break;

        case "GetAsignatura":
            $datos=$asignatur->get_asignatura($body["Codigo_Asignatura"]);
            echo json_encode($datos);
        break;

        case "InsertAsignatura":
            $datos=$asignatur->insert_asignatura($body["Codigo_Asignatura"],$body["Nombre_Asignatura"],$body["Carrera"],$body["Fecha_Creacion"],$body["Unidades_Valorativas"],$body["Promedio_Aprobacion"],$body["Numero_Edificio"]);
            echo json_encode("-> ¡Asignatura agregada con éxito!");
        break;

        case "UpdatevAsignatura":
            $datos=$asignatur->update_asignatura($body["Codigo_Asignatura"],$body["Nombre_Asignatura"],$body["Carrera"],$body["Fecha_Creacion"],$body["Unidades_Valorativas"],$body["Promedio_Aprobacion"],$body["Numero_Edificio"]);
            echo json_encode("-> ¡La Asignatuura ha sido actualizada con éxito!");
        break;

        case "DeleteAsignatura":
            $datos=$asignatur->delete_asignatura($body["Codigo_Asignatura"]);
            echo json_encode("-> !La asignatura ha sido eliminada con éxito!");
        break;
    }
?>
