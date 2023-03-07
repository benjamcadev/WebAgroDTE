<?php

    class conexion2{

    private $server;
    private $user; 
    private $password; 
    private $database;
    private $port;
    private $conexion;

  


    function __construct(){ 

    $this->server = "192.168.1.4"; //192.168.1.9
    $this->database = "dte_agroplastic";
    $this->user = "remoto"; //root
    $this->password = "agro1113$"; //agrodte1113
    $this->port = 3306; //3307

    /*$this->server = "192.168.1.4"; //192.168.1.9
    $this->database = "dte_agroplastic";
    $this->user = "remoto"; //root
    $this->password = "agro1113$"; //agrodte1113
    $this->port = 3306; //3307*/
        
    // Create connection
    $this->conexion = mysqli_connect($this->server, $this->user, $this->password, $this->database,$this->port);

     // Check connection
    if (!$this->conexion) {
        die("Connection failed: " . mysqli_connect_error());
    }else{
        //echo "Connected successfully";
    }

    }


    public function obtenerDatos($consulta){
    $resultados = $this->conexion->query($consulta);

    $resultadosArray = array();
    foreach ($resultados as $key) {
        $resultadosArray[] = $key;
    }
   
    return $this->convertirUTF8($resultadosArray);
    }

    private function convertirUTF8($array){
    array_walk_recursive($array, function(&$item,$key){
        if (!mb_detect_encoding($item,'utf-8',true)){
            $item = utf8_encode($item);
        }
    });

    return $array;
    } 

    //FUNCION PARA INSERTAR DATOS
    public function ejecutarQuery($consulta){
    $resultados = $this->conexion->query($consulta);
    $filas_afectadas = $this->conexion->affected_rows;
   
    return $filas_afectadas;
    }  



    }
?>