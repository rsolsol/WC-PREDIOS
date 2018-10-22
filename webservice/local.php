<?php 
 
 require_once '../constructor/local.php';
 
  
 $codigo = $_GET['codigo'];
 $solicitud   = $_GET['solicitud'];
 $consulta   = $_GET['consulta']; 
 
 $respuesta = consulta_JNE::listar($codigo,$solicitud,$consulta);

 $datos = array();
 if($respuesta){   
	foreach ($respuesta as $fila) 
		$datos[]= $fila;
	
 echo json_encode($datos);
	
 } 
?>