<?php


 
  class conexionPSQL{



    /*private $server;
    private $user; 
    private $password; 
    private $database;
    private $port;
    private $conexion;*/

  	private $host;
	private $port;
	private $dbname;
	private $credentials;
	private $conexion;



    function __construct(){ 

    /*$this->server = "192.168.1.4"; //192.168.1.9
    $this->database = "dte_agroplastic";
    $this->user = "remoto"; //root
    $this->password = "agro1113$"; //agrodte1113
    $this->port = 3306; //3307*/

     $this->host        = "host=agroplastic.erp.master.innlab.cl";
	 $this->port        = "port=5432";
	 $this->dbname      = "dbname=erp_db";
	 $this->credentials = "user=readonly password=emezvYN87ySZKW";


        
    // Create connection
    //$this->conexion = mysqli_connect($this->server, $this->user, $this->password, $this->database,$this->port);
	 $this->conexion = pg_connect("$this->host $this->port $this->dbname $this->credentials");

     // Check connection
    if (!$this->conexion) {
       die("Could not connect: " . pg_last_error());
    }else{
        //echo "Connected successfully";
    }

    }




    public function obtenerDatos($consulta){
    //$resultados = $this->conexion->query($consulta);

    $result = pg_query($this->conexion,$consulta);

    if (!$result)
	{
	echo "no results ";
	}

    $resultadosArray = array();
     while ($row = pg_fetch_row($result)) {
         $resultadosArray[] = $row;
    }

   /* foreach ($result as $key) {
        $resultadosArray[] = $key;
    }*/
   
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

    }

 


   
?>