<?php 
 class Conexion extends PDO { 
   private $tipo_de_base = 'XXX';
   private $host = 'XXX';
   private $nombre_de_base = 'XXX';
   /*
   private $usuario = 'jhuaman';
   private $contrasena = '2016.*mdpp'; 
   */
   private $usuario = 'XXX';
   private $contrasena = 'XXX'; 
   public function __construct() {
      //Sobreescribo el m�todo constructor de la clase PDO.
	  
      try{
         parent::__construct($this->tipo_de_base.':host='.$this->host.';dbname='.$this->nombre_de_base, $this->usuario, $this->contrasena);
		 
      }catch(PDOException $e){
         echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
         exit;
      }
   } 
 } 
?>