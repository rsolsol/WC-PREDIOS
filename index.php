<?php
include_once 'lib/nusoap.php';
//require 'clases/conexion.php';
require 'constructor/local.php';
$consultalic = new consulta_Predios();

$servicio = new soap_server();
$ns = "urn:Webservice_MDPP_Predios_por_contribuyente";
$servicio->configureWSDL("Webservice Predios Registrado por contribuyente",$ns);
$servicio->schemaTargetNamespace = $ns;
//$consultalic = consulta_Licenia::listar();
$servicio->register('consulta_Predios.listar', array('tipoDoc' => 'xsd:integer', 'nro_documento' => 'xsd:string'), array('return' => 'xsd:string'), $ns );
/*
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$servicio->service($HTTP_RAW_POST_DATA); */
  $servicio->service(file_get_contents("php://input"));
?>