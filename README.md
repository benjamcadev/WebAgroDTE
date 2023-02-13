Web AgroDTE 
=======================


FrontEnd el cual sirve se comunica con el proyecto de Backend ApiAgroDTE, para poder generar documentos DTE, Tambien poder visualizarlos, descargarlos y enviarlos.

Tambien se visualizan documentos DTE de compra el cual llegan a un correo de intercambio de XML

Enlaces a cambiar para produccion
----------------
Clases\Conexion.php 
**CAMBIAR CREDENCIALES SERVIDOR**

Clases\Envio_dte.php 
```
    86 - $url = 'http://192.168.1.9:90/api_agrodte/api/dte/document/envioboleta';
    137 - $response_xml = file_get_contents('http://192.168.1.9:90/WebServiceEnvioDTE/EnvioSobreDTE.asmx/enviarSobreSII?archivo='.$datos[0]['rutaxml_envio_dte'].'&rutEmisor=6402678-k&rutEmpresa=76958430-7');
```  





