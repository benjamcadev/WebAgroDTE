<!DOCTYPE html>
<html>
<?php include'Componentes/verificar_sesion.php'; ?>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Envio DTE | AgroDTE</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

     <!-- Sweetalert Css -->
    <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-indigo">
    <?php include'Componentes/pantalla_cargando.php'; ?>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
     <?php include'Componentes/menu_superior.php'; ?>
    <section>
        <!-- Left Sidebar -->

        <?php include'Componentes/menu_lateral.php'; ?>

        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
                <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                    <ul class="demo-choose-skin">
                        <li data-theme="red" class="active">
                            <div class="red"></div>
                            <span>Red</span>
                        </li>
                        <li data-theme="pink">
                            <div class="pink"></div>
                            <span>Pink</span>
                        </li>
                        <li data-theme="purple">
                            <div class="purple"></div>
                            <span>Purple</span>
                        </li>
                        <li data-theme="deep-purple">
                            <div class="deep-purple"></div>
                            <span>Deep Purple</span>
                        </li>
                        <li data-theme="indigo">
                            <div class="indigo"></div>
                            <span>Indigo</span>
                        </li>
                        <li data-theme="blue">
                            <div class="blue"></div>
                            <span>Blue</span>
                        </li>
                        <li data-theme="light-blue">
                            <div class="light-blue"></div>
                            <span>Light Blue</span>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                            <span>Cyan</span>
                        </li>
                        <li data-theme="teal">
                            <div class="teal"></div>
                            <span>Teal</span>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                            <span>Green</span>
                        </li>
                        <li data-theme="light-green">
                            <div class="light-green"></div>
                            <span>Light Green</span>
                        </li>
                        <li data-theme="lime">
                            <div class="lime"></div>
                            <span>Lime</span>
                        </li>
                        <li data-theme="yellow">
                            <div class="yellow"></div>
                            <span>Yellow</span>
                        </li>
                        <li data-theme="amber">
                            <div class="amber"></div>
                            <span>Amber</span>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                            <span>Orange</span>
                        </li>
                        <li data-theme="deep-orange">
                            <div class="deep-orange"></div>
                            <span>Deep Orange</span>
                        </li>
                        <li data-theme="brown">
                            <div class="brown"></div>
                            <span>Brown</span>
                        </li>
                        <li data-theme="grey">
                            <div class="grey"></div>
                            <span>Grey</span>
                        </li>
                        <li data-theme="blue-grey">
                            <div class="blue-grey"></div>
                            <span>Blue Grey</span>
                        </li>
                        <li data-theme="black">
                            <div class="black"></div>
                            <span>Black</span>
                        </li>
                    </ul>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="settings">
                    <div class="demo-settings">
                        <p>GENERAL SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Report Panel Usage</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Email Redirect</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>SYSTEM SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Notifications</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Auto Updates</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>ACCOUNT SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Offline</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Location Permission</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h3>
                    REGISTRO ENVIO DTE COMPLETO
                    <small>En este menu podras encontrar el registro completo de los envio de XML a los servidores de SII, tambien podras ver el estado de recepcion y el envio al cliente</small>
                </h3>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               REGISTRO ENVIO DTE
                            </h2>
                            <br>
                            <small>Activar/Desactivar envio inmediato al SII</small>
                            <div class="switch">
                                <label><input id="switch_fechas" type="checkbox" onclick="activarEnvioInmediato()">DESFASADO<span class="lever"></span>INMEDIATO</label>
                            </div>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table id="tabla_sobres" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                   
                                   
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
            
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    

    <!-- Demo Js -->
    <script src="js/demo.js"></script>

    <!-- SweetAlert Plugin Js -->
    <script src="plugins/sweetalert/sweetalert.min.js"></script>

    <script type="text/javascript">
         $("#lista_registro_envios_menu").addClass("active");
         $("#lista_envio_dte_menu").addClass("active");
        window.onload = function() {
            //$("#lista_envio_dte_menu").addClass("active");
            //$("#lista_registro_envios_menu").addClass("active");
             
            cargarSobresTabla();
        }

            function activarEnvioInmediato(){

                let flag_envio;
                    
            if ($('#switch_fechas').prop('checked')) {
               flag_envio ="Inmediato";
            }else{
               flag_envio ="Desfasado";
            }       

               var parametros = {
                 "flag_envio": flag_envio                            
                    };  

            $.ajax({
                        type: "POST",
                        data:  parametros,
                        headers: {
                            'apikey':'928e15a2d14d4a6292345f04960f4cc3' 
                        },
                        dataType: "json",
                        url: "Clases/Envio_dte.php?funcion=cargarSobresTabla",
                        beforeSend: function() {

                            //mensaje temporal de busqueda de datos
                            swal({
                                title: '<div class="preloader pl-size-xl">'+
                                          '     <div class="spinner-layer pl-light-blue">'+
                                          '         <div class="circle-clipper left">'+
                                          '             <div class="circle"></div>'+
                                          '         </div>'+
                                          '         <div class="circle-clipper right">'+
                                          '             <div class="circle"></div>'+
                                          '         </div>'+
                                          '     </div>'+
                                          ' </div>', 
                                text: "Cargando datos ...",
                                showConfirmButton: true,
                                //timer: 1800,
                                html: true           
                            });
                        },
                        success: function(data) { 

                            if(data == "Inmediato"){
                                $('#switch_fechas').prop('checked',true)
                            }else{
                                $('#switch_fechas').prop('checked',false)
                            }
                        }
                    });

            }

            function cargarSobresTabla(){
                
            var rut_emisor = String("6402678-k");
            var rut_empresa = String("76958430-7");

           

               var parametros = {
                            
                    };     
            $.ajax({
                        type: "POST",
                        data:  parametros,
                        headers: {
                            'apikey':'928e15a2d14d4a6292345f04960f4cc3' 
                        },
                        dataType: "json",
                        url: "Clases/Envio_dte.php?funcion=cargarSobresTabla",

                        success: function(data) {  

                        console.log(data[1].detalle_envio_dte);      

                        $('#tabla_sobres').DataTable( {
                              data: data,
                               "order": [[ 0, 'desc' ]],
                                columns: [
                                    { title: "Id",data: 'id_envio_dte' },
                                    { title: "Track Id (SII)",data: 'trackid_envio_dte' },
                                    { title: "Estado",data: 'estado_envio_dte',render: function(data,type, row, meta){ 
                                                                                        if (data == 'No Enviado'){
                                                                                            return data+'<a onclick="enviarSobre('+row['id_envio_dte']+',\''+rut_emisor+'\',\''+rut_empresa+'\')" class="material-icons" href="#">compare_arrows</a>'; 
                                                                                        }else{
                                                                                            return data;
                                                                                        } 
                                                                                    } },
                                    { title: "DTE",data: 'tipo_dte_envio_dte',render: function(data){
                                                                                        if (data == "33") {return "Factura"};
                                                                                        if (data == "34") {return "Factura Exenta"};
                                                                                        if (data == "39") {return "Boleta"};
                                                                                        if (data == "41") {return "Boleta Exenta"};
                                                                                        if (data == "61") {return "Nota Credito"};
                                                                                        if (data == "56") {return "Nota Debito"};
                                                                                        if (data == "52") {return "Guia Despacho"};
                                                                                        if (data == "0") {return "Consumo Folios"};
                                                                                        return data;

                                                                                    }},                                                
                                    { title: "Informados",data: 'informados_envio_dte',render: function(data){
                                                                                                 if (data  == "0") {return '<i class="material-icons">remove</i>'}
                                                                                                if (data  == "1") {return '<i style="color: limegreen;" class="material-icons">done</i>'}  
                                                                                                    return data;
                                                                                        } },
                                    { title: "Rechazos",data: 'rechazos_envio_dte', render: function(data){
                                                                                                 if (data  == "0") {return '<i class="material-icons">remove</i>'}
                                                                                                if (data  == "1") {return '<i style="color: red;" class="material-icons">error</i>'}  
                                                                                                    return data;
                                                                                        } },
                                    { title: "Reparos",data: 'reparos_envio_dte', render: function(data){
                                                                                                 if (data  == "0") {return '<i class="material-icons">remove</i>'}
                                                                                                if (data  == "1") {return '<i style="color: orange;" class="material-icons">warning</i>'}  
                                                                                                    return data;
                                                                                        } },
                                    { title: "Aceptados",data: 'aceptados_envio_dte',render: function(data){
                                                                                                 if (data  == "0") {return '<i class="material-icons">remove</i>'}
                                                                                                if (data  == "1") {return '<i style="color: limegreen;" class="material-icons">done</i>'}  
                                                                                                    return data;
                                                                                        } },
                                    { title: "Fecha",data: 'fecha_envio_dte' },
                                    { title: "Revision SII",data: 'revision_envio_dte',render: function(data){
                                                                                            if (data == '1') {
                                                                                                return '<i style="color: limegreen;"  class="material-icons">done</i>'
                                                                                            }else{
                                                                                               return '<i class="material-icons">schedule</i>' 
                                                                                            }
                                                                                            }},
                                    { title: "Envio Cliente",data: 'envio_cliente_envio_dte',render: function(data){
                                                                                                        if (data == '0') {
                                                                                                            return '<i class="material-icons">schedule</i>'
                                                                                                        }else if(data == '1'){
                                                                                                            return '<i style="color: limegreen;"  class="material-icons">done</i>'
                                                                                                        }else if(data == '2') {
                                                                                                            return '<i class="material-icons">remove</i>'
                                                                                                        }
                                                                                            }},
                                    { title: "Detalle",data: 'detalle_envio_dte', render: function(data){return '<textarea>'+data+'</textarea>'} }



                                ]
                            } );

                         
                    }
                    });
            }

            function enviarSobre(id,rutEmisor,rutEmpresa){

             
         $.ajax({
            type: 'GET',
            headers: {
                            'apikey':'928e15a2d14d4a6292345f04960f4cc3' 
                        },
            url: "Clases/Envio_dte.php?funcion=enviarSobre&id_sobre="+id+"&rut_emisor="+rutEmisor+"&rut_empresa="+rutEmpresa,
            success:function(data){

               const json_data = JSON.parse(data);
               const json_respuesta = JSON.parse(json_data);

             if (json_respuesta.respuesta == "ok") {

                swal("Correcto", "Sobre enviado a SII", "success");
                $('#tabla_sobres').DataTable().destroy();
                cargarSobresTabla();

             }else if(json_respuesta.respuesta == "ok boleta"){

                 swal("Correcto", "Sobre de boleta enviado a SII", "success");
                  $('#tabla_sobres').DataTable().destroy();
                cargarSobresTabla();

             }else if(json_respuesta.respuesta == "error boleta"){

                 swal("Error", "Sobre de boleta problemas: Detalle: "+json_respuesta.detalle,"error");
                  //$('#tabla_sobres').DataTable().destroy();
                //cargarSobresTabla();

             }else
             {
                swal("Ups", json_respuesta.Error, "error"); 
             }
            }
        });


            }

            


    </script>
</body>

</html>
