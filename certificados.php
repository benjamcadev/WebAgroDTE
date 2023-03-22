<!DOCTYPE html>
<html>
 <?php include'Componentes/verificar_sesion.php'; ?>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Certificados | AgroDTE</title>
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
    <link href="plugins/jquery-datatable/skin/bootstrap/css/buttons.dataTables.min.css" rel="stylesheet">


    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- PDF JS Css -->
    <link href="css/viewer.css" rel="stylesheet">

    <!-- Print JS Css -->
    <link href="css/print.min.css" rel="stylesheet">

     <!-- Sweetalert Css -->
    <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet">

    <!-- Bootstrap Select Css -->
    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <!-- Bootstrap DatePicker Css -->
    <link href="plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />

    

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
                        <li data-theme="red" >
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
                        <li data-theme="indigo" class="active">
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
                Certficados
                    <small>En este menu encontraras todos las firmas electronicas autorizadas para firmar DTE.</small>
                </h3>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                             Certificados
                                
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i  class="material-icons">more_vert</i>
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
                                <table id="tabla_certificados" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                   
                                   
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
            
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <!-- Large Size -->
            <div class="modal fade" id="certificadoModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                    <h4>CARGAR NUEVO CERTIFICADO</h4>

                        </div>
                     
                        
                 <div class="modal-body" id="certificadoModal_body">

                    <div class="row clearfix"> 
                   
                        <div class="col-md-12">
                            
                        
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <small>Nombre Certificado (*)</small>
                                        <input id="nombre_certificado_modal" type="text" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <small>Proveedor (*)</small>
                                        <input id="proveedor_modal" type="text" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <small>Fecha Expiración (*)</small>
                                        <div class="form-line" id="datepicker_container">
                                            <input id="fecha_expiracion_modal" type="text" class="form-control" placeholder=" - Seleccione una fecha - ">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <small>Contraseña (*)</small>
                                        <input id="pass_modal" type="password" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                            <div class="alert alert-info">
                                <strong>IMPORTANTE!</strong> Debes cargar el certificado el dia que el anterior certificado expire, <strong>tambien debes desactivarlo.</strong>  y ademas debes cargarlo en el SII, si no sabes como <a href="#" onclick="showModalHelp();" class="alert-link"> Haz Click aqui</a>.
                            </div>
                          
                                <div class="form-group">
                                    <div class="form-line">
                                        <small> Estado (*)</small>
                                        <select id="estado_modal" class="form-control show-tick">                                        
                                            <option value="1">Activo</option>
                                            <option value="0">Inactivo</option>                              
                                        </select>
                                    </div>
                                </div>
                             </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-line">
                                         <input class="form-control" type="file" name="file" id="file">
                                    </div>
                                </div>
                            </div>

                  

                        <div class="col-md-12">
                            
                                <div class="form-line">
                                    <button class="btn btn-info waves-effect" onclick="cargarCertificado()" name="submit">Cargar archivo XML</button>
                                </div>
                           
                        </div>
                                
                        </div>
                    </div>
                       
                       
                            
                           
                </div>

                        <div class="modal-footer">                            
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </section> 

      <section class="content">
        <div class="container-fluid">
            <!-- Large Size -->
            <div class="modal fade" id="helpModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                    <h4>¿Como cargar mi firma electrónica en los servidores del SII?</h4>

                        </div>
                     
                        
                 <div class="modal-body" id="helpModal">

                    <div class="row clearfix"> 
                   
                        <div class="col-md-12">
                        <div class="panel-body">
                        El certificado digital, o firma electrónica, se requiere guardar inicialmente y por única vez
                         en los servidores del SII, lo que también se denomina como "centralizar el certificado digital".
                          Esto, junto con la carga de la misma firma en la plataforma OpenFactura, permitirá que usted pueda
                           comenzar a operar a través de nuestra aplicación.
                        </div>

                        <div class="panel-body">
                            <h3>Procedimiento</h3>
                        En el video, se indica como registrar la firma en el servicio de impuestos internos, lo primero es ingresar al siguiente enlace
                        Luego debes seguir los pasos a continuación:<br>
                        1.El sistema solicitará autenticarse, aqui debes ingresar con tu RUT personal, el cual esta asociado a tu firma.<br>
                        2.Luego debe buscar la carpeta donde se encuentra su certificado digital o firma.<br>
                        3.Ingrese la clave del certificado y presione el botón “Enviar”.<br>
                        4.Se mostrará el mensaje “Se guardó archivo OK”; presione “Cerrar” y “Salir”, y con ello ha guardado su certificado digital en los servidores del SII.<br>

                           <video width="640" height="480" controls>
                            <source src="video/video_certificado.mp4" type="video/mp4">
                            </video>
                        </div>


                            </div>
                        

                        <div class="col-md-12">
                            
                                <div class="form-line">
                                    
                                </div>
                           
                        </div>
                                
                        </div>
                    </div>
                       
                       
                            
                           
                </div>

                        <div class="modal-footer">                            
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </section> 

    

      <div style="display: none;" id="main"></div> 

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

<!-- Autosize Plugin Js -->
<script src="plugins/autosize/autosize.js"></script>

<!-- Moment Plugin Js -->
<script src="plugins/momentjs/moment.js"></script>

<!-- Bootstrap Material Datetime Picker Plugin Js -->
<script src="plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

<!-- Bootstrap Datepicker Plugin Js -->
<script src="plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="plugins/bootstrap-datepicker/locales/bootstrap-datepicker.es.min.js"></script>

<!-- Custom Js -->
<script src="js/admin.js"></script>
<script src="js/pages/forms/basic-form-elements.js"></script>

<!-- Demo Js -->
<script src="js/demo.js"></script>
<script src="plugins/sweetalert/sweetalert.min.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/dataTables.fixedHeader.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    

    

    

    <script type="text/javascript">
        window.onload = function() {

            $("#lista_dte_emitidos_menu").addClass("active");

            cargarEmitidosTabla();

        }

         //Tooltip
    $('[data-toggle="tooltip"]').tooltip({
        container: 'body'
    });

    $('#datepicker_container input').datepicker({
        autoclose: true,
        container: '#datepicker_container',
        format: 'yyyy-mm-dd',
        language: 'es'
        
    }).datepicker("setDate",'now');

    

 //VARIABLES GLOBALES
 var pdf_base64 = ""; 
 var xml_base64 = "";
 var folio_global = "";
 var tipo_dte_global = "";
 var monto_global = "";       


    function cargarEmitidosTabla(){
               var parametros = {
                            
                    };     
            $.ajax({
                        type: "POST",
                        data:  parametros,
                        headers: {
                            'apikey':'928e15a2d14d4a6292345f04960f4cc3' 
                        },
                        dataType: "json",
                        url: "Clases/DTE.php?funcion=cargarCertificadosTabla",

                        success: function(data) { 

                        console.log(data);

                      cargarTabla(data);    
                    }
                    });
            }

          
            function cargarTabla(data){
                
                $('#tabla_certificados').DataTable( {

                              data: data,
                               "order": [[ 3, 'desc' ]],
                               //"ordering": false,
                                columns: [
                                    { title: "Nombre Certificado",data: 'nombre_certificado'},
                                    { title: "Proveedor",data: 'proveedor_certifcado' },
                                    { title: "Fecha Expiracion",data: 'fecha_expiracion_certificado' },
                                    { title: "Estado",data: 'estado_certificado',render: function(data,type, row, meta){
                                                                                        if (data == "1") {return "<p class=\"font-bold col-teal\">En uso</p><a role=\"button\" onclick=\"cambiarEstado("+data+","+row['id_certificado']+")\"><i style=\"color: brown;\"  class=\"material-icons\">sync_disabled</i></a>"};
                                                                                        if (data == "0") {return "<p class=\"font-bold col-blue-grey\">Deshuso</p><a role=\"button\" onclick=\"cambiarEstado("+data+","+row['id_certificado']+")\"><i style=\"color: brown;\"  class=\"material-icons\">sync_disabled</i></a>"};
                                                                                        return data;

                                                                                    }},
                                    { title: "Ruta Del Archivo",data: 'archivo_certificado' }



                                ],
                                "oLanguage": {
                                     "sSearch": "Busqueda Rapida",
                                     "sLengthMenu": "Mostrar _MENU_ Registros",
                                 },
                                 dom: 'Blfrtip',
                                 buttons: [
                                    {
                                        extend: 'excel',
                                        title: 'Certificados - AgroDTE',
                                        text: 'Excel',
                                        className: 'btn bg-green btn-sm waves-effect'
                                    },
                                    {
                                        extend: 'csv',
                                        title: 'Certificados - AgroDTE',
                                        text: 'CSV',
                                        className: 'btn bg-teal btn-sm waves-effect'
                                    },
                                    {
                                        extend: 'print',
                                        title: 'Certificados - AgroDTE',
                                        text: 'Imprimir',
                                        className: 'btn bg-blue-grey btn-sm waves-effect'
                                    },
                                    {
                                    text: 'Cargar Certificado',
                                    className: 'btn bg-light-blue btn-sm waves-effect',
                                    action: function ( e, dt, node, config ) {
                                         //abrir modal
                                        $('#certificadoModal').modal('show');
                                        $('#estado_modal').selectpicker('refresh');
                                    }
                                    }
                                    
                                    ]
                            } );

            }
            $('#certificadoModal').on('hidden.bs.modal', function () {
              
                $("#nombre_certificado_modal").val("");
               $("#proveedor_modal").val("");
               $("#fecha_expiracion_modal").val("");
               $("#pass_modal").val("");
               $("#estado_modal").val("");
               $('#estado_modal').selectpicker('refresh');
              
            });

            function showModalHelp(){
                $('#helpModal').modal('show');

            }

         function cambiarEstado(estado_certificado,id_certificado){
            let mensaje = "";
            if (estado_certificado == 1) {
                // Activo
                mensaje = "Quieres Desactivar el Certificado?";
            }else{
                // Inactivo
                mensaje = "Quieres Activar el Certificado?";
            }
            swal({
                title: mensaje,
                text: "Por favor confirma",
                
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "CONFIRMAR",
                cancelButtonText: "CANCELAR",
                closeOnConfirm: false,
                closeOnCancel: false
                },
                function(inputValue){
                //Use the "Strict Equality Comparison" to accept the user's input "false" as string)
                if (inputValue===false) {
                    //BOTON CANCELAR
                    swal.close();
                   
                } else {
                    let mensaje_confirmacion = "";
                    //BOTON CONFIRMAR
                    if (estado_certificado == 1) {
                    // Activo
                    mensaje_confirmacion = "Certificado Desactivado";
                    }else{
                        // Inactivo
                    mensaje_confirmacion = "Certificado Activado";
                    }

                    var data = new FormData();
                    data.append('estado_certificado',estado_certificado);
                    data.append('id_certificado',id_certificado);

                    jQuery.ajax({
                    url: 'Clases/DTE.php?funcion=estadoCertificado',
                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    method: 'POST',
                    headers: {
                                'apikey':'928e15a2d14d4a6292345f04960f4cc3' 
                            },
                    type: 'POST', // For jQuery < 1.9
                    success: function(data){
                        
                        swal({
                                    title: "Listo", 
                                    text: mensaje_confirmacion, 
                                    type: "success"
                                    },
                                function(){ 
                                    location.reload();
                                }
                            );
                        
                    }
                });
                   
                    
                }
                });


         }

           function cargarCertificado(){

            var data = new FormData();
            let file = document.getElementById("file").files[0];
            jQuery.each(jQuery('#file')[0].files, function(i, file) {
                data.append('file-'+i, file);
            });

            data.append('estado_certificado',$('#estado_modal').val());
            data.append('nombre_certificado',$('#nombre_certificado_modal').val());
            data.append('proveedor_certificado',$('#proveedor_modal').val());
            data.append('fecha_expiracion_certificado',$('#fecha_expiracion_modal').val());
            data.append('pass_certificado',$('#pass_modal').val());
            data.append('ruta_certificado',file.name);
            

                jQuery.ajax({
                    url: 'Clases/DTE.php?funcion=cargarCertificado',
                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    method: 'POST',
                    headers: {
                                'apikey':'928e15a2d14d4a6292345f04960f4cc3' 
                            },
                    type: 'POST', // For jQuery < 1.9
                    success: function(data){
                        if (data == "ok") {
                                
                                swal({
                                    title: "Certificado Registrado", 
                                    text: "", 
                                    type: "success"
                                    },
                                function(){ 
                                    location.reload();
                                }
                                );
                               
                            }else{
                               
                                swal({
                                    title: "Hubo un error", 
                                    text: data, 
                                    type: "error"
                                    },
                                function(){ 
                                    location.reload();
                                }
                            );
                            }
                    }
                });

              

            }



</script>
</body>

</html>
