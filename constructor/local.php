<?php
require_once 'clases/conexion.php';
 class consulta_Predios {
	private $codigo_proceso;
	private $nro_solicitud;
	private $dni_consulta; 
	
   public function getCodigo_proceso() {
      return $this->idlocal;
   }
   public function getNro_solicitud() {
      return $this->nro_solicitud;
   } 
   public function getDni_consulta() {
      return $this->dni_consulta;
   }   
   
   public function setCodigo_proceso($codigo_proceso) {
      $this->idlocal = $idlocal;
   }
   public function setNro_solicitud($nro_solicitud) {
      $this->nro_solicitud=$nro_solicitud;
   } 
   public function setDni_consulta($dni_consulta) {
      $this->dni_consulta=$dni_consulta;
   } 
   
   public function __construct($codigo_proceso=null, $nro_solicitud=null,$dni_consulta=null) {
      
	  $this->codigo_proceso = $codigo_proceso; 
      $this->nro_solicitud = $nro_solicitud;
      $this->dni_consulta = $dni_consulta; 
	  
   } 
   
	public static function listar($tipoDoc, $nro_documento){
	   $conexion = new Conexion();
	  
	  if($tipoDoc == 1){
	  	$consulta = $conexion->prepare(
		"select *
		from webservice_predios_contribuyente('".$nro_documento."',
		'1000000529');");	
	  }
	  else if($tipoDoc == 2){
	  	$consulta = $conexion->prepare(
		"select *
		from webservice_predios_contribuyente('".$nro_documento."',
		'1000000530');");		
	  }
	   
	   /*
	   $consulta = $conexion->prepare(
		"select vdescri,deuda,cperanio 
		from recaudacion.consultaWebService_JNE('".$this->codigo_proceso."',
		'".$this->nro_solicitud."',
		'".$this->dni_consulta."'");*/ 
		
	   $consulta->execute();
	   $registro = $consulta->fetchAll(PDO::FETCH_ASSOC); 
	   return json_encode($registro);
	}   
 } 
 ?>