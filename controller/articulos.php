<?php
  header('Content-Type:aplication/json');
  require_once("../config/conexion.php");
  require_once("../models/Articulos.php");
  $articulos = new Articulos(); 

  $body= json_decode(file_get_contents("php://input"),TRUE);

 switch($_GET["op"]){
   case "GetArticulos":
     $datos=$articulos->get_articulos();
     echo json_encode($datos);
   break;

   case "GetUno":
     $datos=$articulos->get_articulo($body["ID"]);
     echo json_encode($datos);
    break;

   case "InsertArticulos":
     $datos=$articulos->insert_articulos($body["ID"],$body["DESCRIPCION"],$body["UNIDAD"],$body["COSTO"],$body["PRECIO"],$body["APLICA_ISV"],$body["PORCENTAJE_ISV"],$body["ESTADO"],$body["ID_SOCIO"]);
     echo json_encode("Aticulos Ingresados");
    break;
 
    case "DeleteArticulo":
      $datos=$articulos->Delete_articulo($body["ID"]);
     break;

     case "UpdateArticulos":
        $datos=$articulos->Update_Articulo($body["ID"],$body["DESCRIPCION"],$body["UNIDAD"],$body["COSTO"],
        $body["PRECIO"],$body["APLICA_ISV"],$body["PORCENTAJE_ISV"],$body["ESTADO"],$body["ID_SOCIO"]);
        echo json_encode("Articulo Actualizado");
      break;
  }



?>