<!DOCTYPE html>
<html>
 <?php include'Componentes/verificar_sesion.php'; ?>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>DTE Emitidos | AgroDTE</title>
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
    <!-- AQUI COMIENZA LA VISUAL -->
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h3>
                   DOCUMENTOS EMITIDOS
                    <small>En este menu encontraras todos los documentos emitidos por Agroplastic hacia otros contribuyentes, estos pueden ser Facturas, Facturas Exentas, Boletas, Boletas Exentas, Notas de Credito, Nota de Debito y Guia de Despacho</small>
                </h3>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DTE EMITIDOS
                            
                            <!--<div class="alert alert-warning">
                            <strong>IMPORTANTE!</strong> Se estan realizando cambios en esta pagina. Disculpe las molestias
                            </div>-->

                            <div class="alert alert-warning" id="warning_detalle" style="display: none;">
                            <strong>IMPORTANTE!</strong> <p style="font-size: 15px;">La busqueda de detalle por producto solo se realiza en los ultimos 4 meses desde la fecha actual. Debido a la gran carga de datos preguntados al servidor.</p>
                            </div>
                                
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
                            <div class="row clearfix">
                                <!-- Busqueda por filtro dentro de la tabla cargada, max 5000 registros -->
                                <p>
                                    <b>Busqueda Avanzada</b>
                                </p>
                                <div class="col-md-5">                                  
                                    <div class="input-group input-group-lg">                                       
                                        <div class="form-line">
                                            <select id="select_busqueda_avanzada" onchange="selectBusquedaAvanzada(this);" class="form-control ">
                                                <option value="">-- Selecciona Filtro --</option>
                                                <option value="select_folio">Folio</option>
                                                <option value="select_rut">Rut Receptor</option>
                                                <option value="select_fecha">Fecha Emision</option>
                                                <option value="select_monto">Monto Total</option>
                                                <option value="select_tipo">Tipo de Documento</option>
                                                <option value="select_detalle">Detalle Productos</option>
                                            </select>
                                        </div>
                                    </div>                                   
                                </div>
                                <!-- Containers de datos -->
                                <div class="col-md-6">
                                    <div class="input-group input-group-lg">
                                        <div id="container_folio" class="form-line" style="display: none;">
                                            <input id="input_folio" type="text" class="form-control" placeholder="Ingresa Folio">
                                        </div>
                                    <!-- Contenedor con revisión de rut, chequea que sea un rut valido -->
                                        <div id="container_rut" class="form-line" style="display: none;">
                                            <input id="input_rut" onchange="checkRut(this)" type="text" class="form-control" placeholder="Ingresa Rut">
                                        </div>
                                        <div id="container_fecha" class="form-line" style="display: none;">
                                            <input id="input_fecha" type="text" class="form-control" placeholder="Ingresa Fecha">
                                        </div>
                                        <div id="container_monto_total" class="form-line" style="display: none;">
                                            <input id="input_monto_total" type="number" class="form-control" placeholder="Ingresa Monto Total">
                                        </div>
                                        <div id="container_tipo_dte" class="form-line" style="display: none;">
                                            <select id="input_tipo_dte" class="form-control ">
                                                <option value="">-- Selecciona DTE --</option>
                                                <option value="select_factura">Factura</option>
                                                <option value="select_factura_exenta">Factura Exenta</option>
                                                <option value="select_nota_credito">Nota de Credito</option>
                                                <option value="select_nota_debito">Nota de Debito</option>
                                                <option value="select_guia_despacho">Guia de Despacho</option>
                                                <option value="select_boleta">Boleta</option>
                                                <option value="select_boleta_exenta">Boleta Exenta</option>
                                            </select>
                                        </div>
                                        <div id="container_detalle" class="form-line" style="display: none;">
                                            <input id="input_detalle" type="text" class="form-control" placeholder="Ingresa un Producto" multiple>
                                        </div>
                                        <div id="container_detalle2" class="form-line" style="display: none;">
                                            <input id="input_detalle2" type="text" class="form-control" placeholder="Ingresa otro Producto Opcional" multiple>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                     <button onclick="busquedaAvanzada()" type="button" class="btn bg-purple btn-circle-lg waves-effect waves-circle waves-float">
                                    <i class="material-icons">search</i>
                                </button>
                                </div>

                               
                            </div>
                            <div class="row clearfix">
                                    <div class="col-md-2">
                                            <div class="input-group input-group-lg">   
                                                <div class="switch">
                                                    <label><input id="switch_fechas" type="checkbox" onclick="activarFechas()"><span class="lever"></span>FILTRO PERIODOS</label>
                                                </div>
                                            </div>   
                                    </div>
                            
                                    <div class="col-md-5">
                                            <div class="input-group input-group-lg">   
                                                <div id="container_fecha_inicial" class="form-line" style="display: none;">
                                                    <input id="input_fecha_inicial" type="text" class="form-control" placeholder="Ingresa Fecha">
                                                </div>
                                            </div>   
                                    </div>
                           
                                    <div class="col-md-5">
                                            <div class="input-group input-group-lg">   
                                                <div id="container_fecha_final" class="form-line" style="display: none;">
                                                    <input id="input_fecha_final" type="text" class="form-control" placeholder="Ingresa Fecha">
                                                </div>
                                            </div>   
                                    </div>
                            </div>
                            <div class="table-responsive">
                                <table id="tabla_dte_emitidos" class="table table-bordered table-striped table-hover js-basic-example dataTable">                              
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
        </div>
    </section>
    <!-- Modal con opciones para PDF se muestra solo al generar un DTE para su visualización -->
     <section class="content">
        <div class="container-fluid">
            <!-- Large Size -->
            <div class="modal fade" id="pdfModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">                       

                            <button onclick="imprimirPDF();" type="button" style="margin-left: 3%;" class="btn btn-default btn-circle-lg waves-effect waves-circle waves-float" data-toggle="tooltip" data-placement="bottom" title="Imprimir">
                                    <i class="material-icons">print</i>
                            </button>

                             <button onclick="modalCorreo();" type="button" class="btn btn-default btn-circle-lg waves-effect waves-circle waves-float" data-toggle="tooltip" data-placement="bottom" title="Enviar por Email">
                                    <i class="material-icons">email</i>
                            </button>

                             <button onclick="descargarPDF();" type="button" class="btn btn-default btn-circle-lg waves-effect waves-circle waves-float" data-toggle="tooltip" data-placement="bottom" title="Descargar PDF">
                                    <i class="material-icons">file_download</i>
                            </button>

                            <button onclick="descargarXML();" type="button" class="btn btn-default btn-circle-lg waves-effect waves-circle waves-float" data-toggle="tooltip" data-placement="bottom" title="Descargar XML">
                                    <i class="material-icons">settings_ethernet</i>
                            </button>
                            <button onclick="anularDTE();" id="btn_anular" disabled="false" type="button" class="btn btn-default btn-circle-lg waves-effect waves-circle waves-float" data-toggle="tooltip" data-placement="bottom" title="Anular">
                                    <i class="material-icons">do_not_disturb</i>
                            </button>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>                             
                        </div>
                        <div class="modal-header" id="referencia_dte">
                        </div>                        
                        <div class="modal-header" id="acuses_dte">                 
                        </div>                        
                        <div class="modal-body" id="pdfModal_body">                       
                            <canvas style="width: 100%; height: 100%;"  id="canvas-pdf"></canvas>                           
                        </div>
                        <div class="modal-footer">                            
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 

    <!-- Modal para enviar PDF y XML por correo -->
    <section class="content">
        <div class="container-fluid">
             <!-- Default Size -->
            <div class="modal fade" id="correoModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Enviar DTE</h4>
                        </div>
                        <div class="modal-body">
                             <div class="row clearfix">
                               <div class="col-sm-12">
                                   <div class="input-group">
                                        <span class="input-group-addon">Para:</span>
                                        <div class="form-line">
                                            <input type="text" id="email_input"  class="form-control" placeholder="Ingrese Correo">
                                        </div>
                                    </div>
                               </div>
                           </div>
                            <div class="row clearfix">
                               <div class="col-sm-12">
                                   <div class="input-group">
                                        <span class="input-group-addon">Cc:</span>
                                        <div class="form-line">
                                            <input type="text" id="email_cc_input" class="form-control" placeholder="Ingrese Correo Copia">
                                        </div>
                                    </div>
                               </div>
                           </div>
                           <div class="row clearfix">
                               <div class="col-sm-12">
                                  <p>Archivos Adjuntos:</p>
                               </div>
                           </div>
                           <div class="row clearfix">
                               <div class="col-sm-12">
                                  <button type="button" class="btn btn-primary waves-effect">
                                    <i class="material-icons">content_copy</i>
                                    <span id="pdf_nombre">factura.pdf</span>
                                </button>
                                 <button type="button" class="btn btn-primary waves-effect">
                                    <i class="material-icons">content_copy</i>
                                    <span id="xml_nombre">factura.xml</span>
                                </button>
                               </div>
                           </div>
                            <div class="row clearfix">
                               <div class="col-sm-12">
                                 
                               </div>
                           </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-default waves-effect">CERRAR</button>
                            <button type="button" onclick="enviarCorreo();" class="btn btn-primary waves-effect" >ENVIAR</button>
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
    

    <!-- Custom Js -->
    <script src="js/admin.js"></script>

     <!-- Moment Plugin Js -->
    <script src="plugins/momentjs/moment.js"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

    <!-- Bootstrap Datepicker Plugin Js -->
    <script src="plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script charset="UTF-8" src="plugins/bootstrap-datepicker/locales/bootstrap-datepicker.es.min.js"></script>
    
 <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>

    <!-- SweetAlert Plugin Js -->
    <script src="plugins/sweetalert/sweetalert.min.js"></script>

    <!-- PDF JS Plugin Js -->
    <script src="plugins/pdf-js/pdf.js"></script>

    <!-- PDF JS Plugin Js -->
    <script src="plugins/pdf-js/pdf.worker.js"></script>

    <!-- Print JS Plugin Js -->
    <script src="plugins/print-js/print.min.js"></script>

    <!-- Funciones de la pagina -->
    <script type="text/javascript">

        //Primera función se ejecuta al cargar la pagina, carga las tablas de los DTE emitidos 
        window.onload = function() {

            $("#lista_dte_emitidos_menu").addClass("active");

            // Llama a la funcion cargar tabla
            cargarEmitidosTabla();

               //Carga en loscontenedores, los calendarios para seleccionar fechas
            $('#container_fecha input').datepicker({
                autoclose: true,
                container: '#container_fecha',
                format: 'yyyy-mm-dd',
                language: 'es'
            });
               
                $('#container_fecha_inicial input').datepicker({
                autoclose: true,
                container: '#container_fecha_inicial',
                format: 'yyyy-mm-dd',
                language: 'es'
            });
                
                
                $('#container_fecha_final input').datepicker({
                autoclose: true,
                container: '#container_fecha_final',
                format: 'yyyy-mm-dd',
                language: 'es'
            });
        }

         //Tooltip
        $('[data-toggle="tooltip"]').tooltip({
            container: 'body'
        });

    

        //VARIABLES GLOBALES
        var pdf_base64 = ""; 
        var xml_base64 = "";
        var folio_global = "";
        var tipo_dte_global = "";
        var monto_global = "";   
        
        //Función para mostrar u ocultar los contenedores de fechas para los filtros por periodo
        function activarFechas(){            

            if ($('#switch_fechas').prop('checked')) {
                $('#container_fecha_inicial').show();
                $('#container_fecha_final').show();
            }else{
                $('#container_fecha_final').hide();
                $('#container_fecha_inicial').hide();
                $('#input_fecha_inicial').val('');
                $('#input_fecha_final').val('');
            }
        }

        // Funcion que checkea y valida el RUT
        function checkRut(rut) {
            //capturar rut
            // Despejar Puntos
            var valor = rut.value.replace('.','');
            // Despejar Guión
            valor = valor.replace('-','');
            
            // Aislar Cuerpo y Dígito Verificador
            cuerpo = valor.slice(0,-1);
            dv = valor.slice(-1).toUpperCase();
            
            // Formatear RUN
            rut.value = cuerpo + '-'+ dv
            
            // Si no cumple con el mínimo ej. (n.nnn.nnn)
            if(cuerpo.length < 7) { console.log("run incompleto"); rutIncompleto();  $('#input_rut').val(''); return false;}
            
            // Calcular Dígito Verificador
            suma = 0;
            multiplo = 2;
            
            // Para cada dígito del Cuerpo
            for(i=1;i<=cuerpo.length;i++) {
            
                // Obtener su Producto con el Múltiplo Correspondiente
                index = multiplo * valor.charAt(cuerpo.length - i);
                
                // Sumar al Contador General
                suma = suma + index;
                
                // Consolidar Múltiplo dentro del rango [2,7]
                if(multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }
          
            }
            
            // Calcular Dígito Verificador en base al Módulo 11
            dvEsperado = 11 - (suma % 11);
            
            // Casos Especiales (0 y K)
            dv = (dv == 'K')?10:dv;
            dv = (dv == 0)?11:dv;
            
            // Validar que el Cuerpo coincide con su Dígito Verificador
            if(dvEsperado != dv) { console.log("RUT Inválido"); rutInvalido();  $('#input_rut').val(''); return false; }
            
            // Si todo sale bien, eliminar errores (decretar que es válido)
            rut.setCustomValidity('');
        }

        // Micro funciones para mostrar mensajes de error
        function rutInvalido(){
        swal("Error", "Rut invalido", "error");
        }

        function rutIncompleto(){
        swal("Ojo !", "Rut incompleto", "warning");
        }

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
                url: "Clases/DTE.php?funcion=cargarEmitidosTabla",

                success: function(data) { 
                    console.log(data);
                    cargarTabla(data);
                }
            });
        
        }

          
            function cargarTabla(data){
               
                $('#tabla_dte_emitidos').DataTable( {

                              data: data,
                               "order": [[ 7, 'desc' ]],
                               //"ordering": false,
                                columns: [
                                    { title: "Folio",data: 'folio' },
                                     { title: "DTE",data: 'tipo_dte',render: function(data){

                                                                                       

                                                                                        if (data == "33") {return "Factura"};
                                                                                        if (data == "34") {return "Factura Exenta"};
                                                                                        if (data == "39") {return "Boleta"};
                                                                                        if (data == "41") {return "Boleta Exenta"};
                                                                                        if (data == "61") {return "Nota Credito"};
                                                                                        if (data == "56") {return "Nota Debito"};
                                                                                        if (data == "52") {return "Guia Despacho"};
                                                                                        return data;

                                                                                    }},
                                    { title: "Rut",data: 'rut' },
                                    { title: "Razon Social",data: 'razon_social',render: function(data,type, row, meta){

                                                                                            if (row['tipo_dte'] == "39" || row['tipo_dte'] == "41") {
                                                                                                return "Cliente Anonimo";
                                                                                            }
                                                                                            return data;
                                    } },
                                    { title: "Neto",data: 'monto_total',render: function(data,type, row, meta){

                                                                                            let formatter = new Intl.NumberFormat('es-CL', {
                                                                                                style: 'currency',
                                                                                                currency: 'CLP'
                                                                                            });

                                                                                            let neto = 0;

                                                                                            if(row['tipo_dte'] == "34"){
                                                                                                neto = data;
                                                                                            }else{
                                                                                                neto = Math.round(data/1.19);
                                                                                            }                                                                                            
                                                                                            
                                                                                            return formatter.format(neto);
                                    }},
                                    { title: "IVA",data: 'monto_total',render: function(data,type, row, meta){

                                                                                            let formatter = new Intl.NumberFormat('es-CL', {
                                                                                                style: 'currency',
                                                                                                currency: 'CLP'
                                                                                            });

                                                                                            let iva = 0;

                                                                                            if(row['tipo_dte'] == "34"){
                                                                                                iva = 0;
                                                                                            }else{
                                                                                                iva = Math.round(data * (19/119));
                                                                                            }
                                                                                            
                                                                                            return formatter.format(iva);
                                    }},

                                    { title: "Monto Total",data: 'monto_total',render: function(data){
                                                                                        var formatter = new Intl.NumberFormat('es-CL', {
                                                                                      style: 'currency',
                                                                                      currency: 'CLP'
                                                                                    });
                                                                                     return formatter.format(data);  

                                    }  },
                                                                                 
                                    { title: "Fecha",data: 'fecha' },
                                    { title: "Detalle",data: 'folio', render: function(data,type, row, meta){
                                                                                return '<a role="button" onclick="crearPDF('+data+','+row['tipo_dte']+','+row['monto_total']+')"><i style="color: brown;"  class="material-icons">content_paste</i></a>'
                                    } }



                                ],
                                "oLanguage": {
                                     "sSearch": "Busqueda Rapida",
                                     "sLengthMenu": "Mostrar _MENU_ Registros",
                                 },
                                 dom: 'Blprtip',
                                 buttons: [
                                    {
                                        extend: 'excel',
                                        title: 'Dte Emitidos - AgroDTE',
                                        text: 'Excel',
                                        className: 'btn bg-green btn-sm waves-effect',
                                        exportOptions: {
                                            columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
                                        }
                                    },
                                    {
                                        extend: 'csv',
                                        title: 'Dte Emitidos - AgroDTE',
                                        text: 'CSV',
                                        className: 'btn bg-teal btn-sm waves-effect',
                                        exportOptions: {
                                            columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
                                        }
                                    },
                                    {
                                        extend: 'print',
                                        title: 'Dte Emitidos - AgroDTE',
                                        text: 'Imprimir',
                                        className: 'btn bg-blue-grey btn-sm waves-effect'
                                        exportOptions: {
                                            columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
                                        }
                                    }
                                    
                                    ]
                            } );

            }
            $('#pdfModal').on('hidden.bs.modal', function () {
              
               $("#canvas-pdf").removeAttr("width");
               $("#canvas-pdf").removeAttr("height");
              
            });

            $('#correoModal').on('hidden.bs.modal', function () {
              
               $("#email_input").val("");
               $("#email_cc_input").val("");
              
            })

            const b64toBlob = (b64Data, contentType='', sliceSize=512) => {
                  const byteCharacters = atob(b64Data);
                  const byteArrays = [];

                  for (let offset = 0; offset < byteCharacters.length; offset += sliceSize) {
                    const slice = byteCharacters.slice(offset, offset + sliceSize);

                    const byteNumbers = new Array(slice.length);
                    for (let i = 0; i < slice.length; i++) {
                      byteNumbers[i] = slice.charCodeAt(i);
                    }

                    const byteArray = new Uint8Array(byteNumbers);
                    byteArrays.push(byteArray);
                }
                const blob = new Blob(byteArrays, {type: contentType});
                return blob;
            }

            function imprimirPDF(){


                const contentType = 'application/pdf';
                const b64Data = pdf_base64;
                const blob = b64toBlob(b64Data, contentType);
                const blobUrl = URL.createObjectURL(blob);

                var iframe = $('<iframe src="' + blobUrl + '"></iframe>').appendTo($('#main'));

                //PARA EVITAR PROBLEMAS DE IMPRESION DETECTAMOS NAVEGADOR, SI ES CHROME TENDREMOS QUE ABRIR OTRA PAGINA PARA IMPRIMIR
                // E INSTALAR UN ADDON EN CHROME PARA VER PDF

                var isChromium = window.chrome;
                var winNav = window.navigator;
                var vendorName = winNav.vendor;
                var isOpera = typeof window.opr !== "undefined";
                var isIEedge = winNav.userAgent.indexOf("Edg") > -1;
                var isIOSChrome = winNav.userAgent.match("CriOS");
               if (isIOSChrome) {
                       // is Google Chrome on IOS
                    } else if(
                      isChromium !== null &&
                      typeof isChromium !== "undefined" &&
                      vendorName === "Google Inc." &&
                      isOpera === false &&
                      isIEedge === false
                    ) {
                       // is Google Chrome
                        console.log("es chrome");
                        var nombre_archivo = "dte_"+tipo_dte_global+"_"+folio_global+".pdf";
                        var directorio_temporal = "temp/"+nombre_archivo;
                        var data = new FormData();
                        data.append("data" , pdf_base64);
                        data.append("path_archivo" , directorio_temporal);
                        var xhr = (window.XMLHttpRequest) ? new XMLHttpRequest() : new activeXObject("Microsoft.XMLHTTP");
                        xhr.open( 'post', 'save_file.php', true );
                        xhr.send(data);



                        window.open('print.php?directorio='+directorio_temporal, '_blank');
                    

                    } else { 
                       // not Google Chrome 
                       console.log("NO chrome");
                       iframe.on('load', function(){
                    iframe.get(0).contentWindow.print();
                  });
                    }

               
               
               

                  


            }

            function blobToFile(theBlob, fileName){       
                return new File([theBlob], fileName, { lastModified: new Date().getTime(), type: theBlob.type })
            }

             function descargarPDF(){
                const linkSource = 'data:application/pdf;base64,'+pdf_base64;
                const downloadLink = document.createElement("a");
                const fileName = tipo_dte_global + "_"+folio_global+".pdf";
                downloadLink.href = linkSource;
                downloadLink.download = fileName;
                downloadLink.click();
            }
              function descargarXML(){
                const linkSource = 'data:application/xml;base64,'+xml_base64;
                const downloadLink = document.createElement("a");
                const fileName = tipo_dte_global + "_"+folio_global+".xml";
                downloadLink.href = linkSource;
                downloadLink.download = fileName;
                downloadLink.click();
            }

            function modalCorreo(){
                //abrir modal
                $('#correoModal').modal('show');
            }

           function validateEmail(email){
                return email.match(
                        /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                      );
            }
            function enviarCorreo(){
                var email = $('#email_input').val();
                var email_cc = $('#email_cc_input').val();


                if (!email_cc == "") {

                        if(!validateEmail(email)){
                             alert("Correo de Cc invalido");
                            return;
                        }   
                }

                if (!email == "") {

                        if(!validateEmail(email)){
                             alert("Correo invalido");
                            return;
                        }else{
                            //Correo Valido

                            var parametros = {
                                 "xml_base64": xml_base64, 
                                 "pdf_base64": pdf_base64,
                                 "folio": folio_global,
                                 "tipo_dte": tipo_dte_global,
                                 "email": email,
                                 "email_cc": email_cc
                                };

                                $.ajax({
                                    type: 'POST',
                                    data:  parametros,
                                    headers: {
                                                    'apikey':'928e15a2d14d4a6292345f04960f4cc3' 
                                                },
                                    dataType: "json",
                                    url: "Clases/DTE.php?funcion=enviarCorreo",
                                    success:function(data){
                                        data = JSON.parse(data);

                                        if (data["mensaje"] == "ok") {
                                             
                                             swal({
                                                title: "Listo !",
                                                text: "Correo enviado",
                                                type: "success",
                                            }, function() {  
                                                $('#correoModal').modal('hide');
                                                $('#email_input').val('');
                                                $('#email_cc_input').val('');
                                            });
                                        }else{
                                            swal("Hubo un problema", "Hubo error al mandar correo: "+data["mensaje"], "error");
                                        }

                                      


                                    }
                                });
                        }   
                }else{
                    alert("No ha escrito un Correo Valido");
                }   

            }

            function crearPDF(folio,tipo_dte,monto_total){
                folio_global = folio;
                tipo_dte_global = tipo_dte;
                monto_global = monto_total;
                $("#pdf_nombre").text("");
                $("#xml_nombre").text("");
                $("#pdf_nombre").text("DTE_"+tipo_dte+"_"+folio+".pdf");
                $("#xml_nombre").text("DTE_"+tipo_dte+"_"+folio+".xml");



                //BUSCAR SI TIENE DTE RELACIONADO
                let tipo_dte_ref = "";
                let nombre_dte_ref = "";

                if (tipo_dte == "33") {
                    tipo_dte_ref = "61";
                    nombre_dte_ref = "Nota de Credito";
                }
                if (tipo_dte == "34") {
                    tipo_dte_ref = "61";
                    nombre_dte_ref = "Nota de Credito";
                }
                if (tipo_dte == "61") {
                    tipo_dte_ref = "56";
                    nombre_dte_ref = "Nota de Debito";
                }
                if (tipo_dte == "39") {
                    tipo_dte_ref = "61";
                    nombre_dte_ref = "Nota de Credito";
                }
                if (tipo_dte == "52") {
                    tipo_dte_ref = "61";
                    nombre_dte_ref = "Nota de Credito";
                }
                if (tipo_dte == "56") {
                    tipo_dte_ref = "61";
                    nombre_dte_ref = "Nota de Credito";
                }

                var parametros2 = {"folio_referencia": folio, 
                "tipo_dte_referencia": tipo_dte_ref
                }; 
                $.ajax({
                    type: 'POST',
                    data:  parametros2,
                    headers: {
                                    'apikey':'928e15a2d14d4a6292345f04960f4cc3' 
                                },
                    dataType: "json",
                    url: "Clases/DTE.php?funcion=cargarDatosReferenciaEmitidos",
                    success:function(data){
                        console.log(data);

                        if (data.length == 0) {
                            //NO TIENE REFERENCIA
                            //swal("Sin Registros", "No hay datos de DTE", "error");
                            $('#referencia_dte').empty();
                            
                        }
                        if (data.length > 0) {
                            //TIENE REFERENCIA
                            if(data[0].monto < monto_global){

                                $('#referencia_dte').empty();

                                for(let i = 0; i < data.length; i++){
                                    $("#referencia_dte").append("<h4><span class=\"label label-warning\">Anulada PARCIALMENTE con "+nombre_dte_ref+" Folio "+data[i].folio+"</span></h4>");
                                }                               
                                
                                $("#btn_anular").attr('disabled',true);
                                //swal("Sin Registros", "No hay datos de DTE", "error");
                            }
                            if(data[0].monto == monto_global){

                                $('#referencia_dte').empty();
                                for(let i = 0; i < data.length; i++){
                                    $("#referencia_dte").append("<h4><span class=\"label label-danger\">Anulada COMPLETAMENTE Con "+nombre_dte_ref+" Folio "+data[i].folio+"</span></h4>");
                                }
                                $("#btn_anular").attr('disabled',true);
                                //swal("Sin Registros", "No hay datos de DTE", "error");
                            }
                        }else{
                            $("#btn_anular").attr('disabled',false);
                        }
                        
                    }
                });
              // FIN DE BUSQUEDA DTE RELACIONADO
              
              
              //BUSCAMOS LOS ACUSES DE RECIBO
                //LAS BOLETAS NO TIENEN ACUSES
             
                if (tipo_dte == 33 || tipo_dte == 61 || tipo_dte == 56 || tipo_dte == 52 ) {

                    var parametros3 = {"folio": folio, 
                                        "tipo_dte": tipo_dte
                    };
                    

                    $.ajax({
                    type: 'POST',
                    data:  parametros3,
                    headers: {
                                    'apikey':'928e15a2d14d4a6292345f04960f4cc3' 
                                },
                    dataType: "json",
                    url: "Clases/DTE.php?funcion=cargarDatosAcuses",
                    success:function(data){
                        console.log(data);
                        //ARMAMOS LA BASE DEL POPOVER
                        $('#acuses_dte').empty();
                        let popover_acuses = '<a href="#/" tabindex="0" role="button"  data-trigger="focus" data-container="body" data-toggle="popover"'+
                        'data-placement="bottom" title="Acuses DTE" data-content="';
                        
                        //PREGUNTAR SI VIENEN DATOS DE ACUSE RECIBO
                        if (data[0].length > 0) {
                          //hay data
                          let estado_recibo = data[0][0]['estado_recep_acuse_recibo_cliente'];
                          let glosa_recibo = data[0][0]['glosa_estado_acuse_recibo_cliente'];
                          let fecha_recibo = data[0][0]['fecha_acuse_recibo_cliente'];
                          let hora_recibo = data[0][0]['hora_acuse_recibo_cliente'];
                          
                          var icono = "";
                          if (estado_recibo == 0 && glosa_recibo.includes("OK")) {
                            //ESTADO CORRECTO
                            icono = "<i style='color: green;' class='material-icons'>check</i>"
                          }else if(estado_recibo == 0 && glosa_recibo.includes("Sin Reparos")){
                            //ESTADO CORRECTO
                            icono = "<i style='color: green;' class='material-icons'>check</i>"

                          }else if(estado_recibo == 0 && glosa_recibo.includes("Recibido Conforme")){
                            //ESTADO CORRECTO
                            icono = "<i style='color: green;' class='material-icons'>check</i>"
                        }else{
                            icono = "<i style='color: orange;' class='material-icons'>warning</i>"
                        }
                        if (estado_recibo == 4 || estado_recibo == 99) {
                            icono = "<i style='color: red;' class='material-icons'>error</i>"
                        }

                            //AGREGAMOS EL POPOVER AL MODAL
                          popover_acuses = popover_acuses + 'Acuse Recepción DTE: '+icono+' '+glosa_recibo+' <br> ';
                          
                         
                        }else{
                           //no hay data
                           let glosa_recibo = "";
                           icono = "<i style='color: blue;' class='material-icons'>remove</i>"
                           popover_acuses = popover_acuses + 'Acuse Recepción DTE: '+icono+' '+glosa_recibo+' <br> ';

                        }
                         //PREGUNTAR SI VIENEN DATOS DE ACUSE COMERCIAL
                         if (data[1].length > 0) {
                          //hay data
                            let estado_comercial = data[1][0]['estado_dte_acuse_recibo_comercial_dte_cliente'];
                            let glosa_comercial = data[1][0]['glosa_dte_acuse_recibo_comercial_dte_cliente'];
                            let fecha_comercial = data[1][0]['fecha_acuse_recibo_comercial_cliente'];
                            let hora_comercial = data[1][0]['hora_acuse_recibo_comercial_cliente'];

                            var icono = "";
                          if (estado_comercial == 0 ||  estado_comercial == 1) {
                            //ESTADO CORRECTO
                            icono = "<i style='color: green;' class='material-icons'>check</i>"
                          }else if(estado_comercial == 2){
                            icono = "<i style='color: red;' class='material-icons'>error</i>"
                          }else{
                            icono = "<i style='color: yellow;' class='material-icons'>warning</i>"
                        }

                           //AGREGAMOS EL POPOVER AL MODAL
                           popover_acuses = popover_acuses + 'Acuse Comercial: '+icono+' '+glosa_comercial+' <br> ';

                        }else{
                           //no hay data
                            let glosa_comercial = "";
                           icono = "<i style='color: blue;' class='material-icons'>remove</i>"
                           popover_acuses = popover_acuses + 'Acuse Comercial: '+icono+' '+glosa_comercial+' <br> ';
                        }
                         //PREGUNTAR SI VIENEN DATOS DE ACUSE MERCADERIA
                         if (data[2].length > 0) {
                          //hay data
                          let declaracion_mercaderia = data[2][0]['declaracion_acuse_recibo_dte_mercaderia_cliente'];
                          let rutfirma_mercaderia = data[2][0]['rutfirma_acuse_recibo_dte_mercaderia_cliente'];
                          let fecha_mercaderia = data[2][0]['fecha_acuse_recibo_cliente'];
                          let hora_mercaderia = data[2][0]['hora_acuse_recibo_cliente'];

                          var icono = "";
                          
                          if (declaracion_mercaderia.includes("sido recibido(s)")) {
                            //ESTADO CORRECTO
                            icono = "<i style='color: green;' class='material-icons'>check</i>";
                          }else{
                            icono = "<i style='color: red;' class='material-icons'>error</i>";
                            }

                           //AGREGAMOS EL POPOVER AL MODAL
                           popover_acuses = popover_acuses + 'Acuse Mercaderias: '+icono+' Rut Recibe: '+rutfirma_mercaderia;

                          
                           
                        }else{
                            //no hay data
                            let glosa_mercaderia = "";
                           icono = "<i style='color: blue;' class='material-icons'>remove</i>"
                           popover_acuses = popover_acuses + 'Acuse Mercaderias: '+icono+' '+glosa_mercaderia+' <br> ';
                        }

                        //INSERTAMOS EL POPOVER
                        popover_acuses = popover_acuses + '" <i style="color: brown;" class="material-icons">info_outline</i></a>';
                        $("#acuses_dte").append(popover_acuses);

                        
                       
                        
                    }
                });
              }else{
                //NO ES FACTURA, ES UNA BOLETA Y NO TIENEN ACUSES
                $('#acuses_dte').empty();
              }

             
             var parametros = {"folio": folio, 
             "tipo_dte": tipo_dte
            }; 

                $.ajax({
                    type: 'POST',
                    data:  parametros,
                    headers: {
                                    'apikey':'928e15a2d14d4a6292345f04960f4cc3' 
                                },
                    dataType: "json",
                    url: "Clases/DTE.php?funcion=crearPDF",
                    success:function(data){
                        console.log(data);
                        //GUARDAR EL PDF BASE 64
                        pdf_base64 = data["pdf_base64"];
                        xml_base64 = data["xml_base64"];

                        if (data.length == 0) {
                           swal("Hubo un problema", "Hubo error al generar PDF", "error");
                        }else{
                            if (data["statusCode"] == "200") {
                            
                                //abrir modal
                                $('#pdfModal').modal('show');

                                var pdfData = atob(data["pdf_base64"]);

                              var loadingTask = pdfjsLib.getDocument({data: pdfData});
                                
                                loadingTask.promise.then(function(pdf){
                                    console.log('PDF loaded');
                                     // Fetch the first page
                                    var pageNumber = 1;
                                    pdf.getPage(pageNumber).then(function(page) {
                                        console.log('Page loaded');
                                        var scale = 0.1;  
                                         // Prepare canvas using PDF page dimensions
                                         if (tipo_dte == "39" || tipo_dte == "41") {
                                            $("#canvas-pdf").css("width","40%");
                                            $("#canvas-pdf").css("height","40%");
                                            $("#canvas-pdf").css("margin-left","30%");
                                            $("#canvas-pdf").css("box-shadow","0px 0px 12px 1px black");
                                         }else{
                                             $("#canvas-pdf").css("width","100%");
                                            $("#canvas-pdf").css("height","100%");
                                            $("#canvas-pdf").css("margin-left","0%");
                                            $("#canvas-pdf").css("box-shadow","0px 0px 12px 1px black");
                                         }
                                       var canvas = document.getElementById('canvas-pdf');
                                       var unscaledViewport = page.getViewport({scale: scale});
                                       var scale = Math.min((canvas.height / unscaledViewport.height), (canvas.width / unscaledViewport.width));


                                       var viewport = page.getViewport({scale: scale});

                                        var context = canvas.getContext('2d');
                                        canvas.height = viewport.height;
                                        canvas.width = viewport.width;

                                        // Render PDF page into canvas context
                                        var renderContext = {
                                          canvasContext: context,
                                          viewport: viewport
                                        };
                                        var renderTask = page.render(renderContext);
                                        renderTask.promise.then(function () {
                                          console.log('Page rendered');
                                          //Popover
                                         $('[data-toggle="popover"]').popover({html:true});
                                        });

                                    });

                                },function (reason) {
                                  // PDF loading error
                                  console.error(reason);
                                });                  
                            
                            }

                        }                
                    },error: function (xhr, ajaxOptions, thrownError) {
                        if (xhr.responseText.includes("Sin path")) {
                            swal("Hubo un problema","No se encuentra el archivo XML del documento","error");
                        }else{
                            swal("Hubo un problema","Codigo Error Servidor: "+xhr.status +" "+ thrownError +" Detalle: "+ xhr.responseText , "error");
                        }
                        
                    }
                 });
                   
            }

            function selectBusquedaAvanzada(select){
                switch(select.value) {
                    case "select_folio":
                        $('#container_folio').show();
                        $('#container_fecha').hide();
                        $('#container_rut').hide();
                        $('#container_monto_total').hide();
                        $('#container_tipo_dte').hide();
                        $('#container_detalle').hide();
                        $('#container_detalle2').hide();
                        $('#warning_detalle').hide();
                        $('#container_fecha_final').hide();
                        $('#container_fecha_inicial').hide();
                        $('#input_fecha_inicial').val('');
                        $('#input_fecha_final').val('');
                        $('#switch_fechas').prop('checked',false);
                        $('#switch_fechas').attr('disabled',true);
                        break;
                    case "select_rut":
                        $('#container_folio').hide();
                        $('#container_fecha').hide();
                        $('#container_rut').show();
                        $('#container_monto_total').hide();
                        $('#container_tipo_dte').hide();
                        $('#container_detalle').hide();
                        $('#container_detalle2').hide();
                        $('#warning_detalle').hide();
                        $('#switch_fechas').attr('disabled',false);
                        break;
                    case "select_fecha":
                        $('#container_folio').hide();
                        $('#container_fecha').show();
                        $('#container_rut').hide();
                        $('#container_monto_total').hide();
                        $('#container_tipo_dte').hide();
                        $('#container_detalle').hide();
                        $('#container_detalle2').hide();
                        $('#warning_detalle').hide();
                        $('#container_fecha_final').hide();
                        $('#container_fecha_inicial').hide();
                        $('#input_fecha_inicial').val('');
                        $('#input_fecha_final').val('');
                        $('#switch_fechas').prop('checked',false);
                        $('#switch_fechas').attr('disabled',true);
                        break;
                    case "select_monto":
                        $('#container_folio').hide();
                        $('#container_fecha').hide();
                        $('#container_rut').hide();
                        $('#container_monto_total').show();
                        $('#container_tipo_dte').hide();
                        $('#container_detalle').hide();
                        $('#container_detalle2').hide();
                        $('#warning_detalle').hide();
                        $('#switch_fechas').attr('disabled',false);
                        break;
                    case "select_tipo":
                        $('#container_folio').hide();
                        $('#container_fecha').hide();
                        $('#container_rut').hide();
                        $('#container_monto_total').hide();
                        $('#container_tipo_dte').show();
                        $('#container_detalle').hide();
                        $('#container_detalle2').hide();
                        $('#warning_detalle').hide();
                        $('#switch_fechas').attr('disabled',false);
                        break;
                     case "select_detalle":
                        $('#container_folio').hide();
                        $('#container_fecha').hide();
                        $('#container_rut').hide();
                        $('#container_monto_total').hide();
                        $('#container_tipo_dte').hide();
                        $('#container_detalle').show();
                        $('#container_detalle2').show();
                        $('#warning_detalle').show();
                        $('#switch_fechas').attr('disabled',false);
                        break;    
                      default:
                        $('#container_folio').hide();
                        $('#container_fecha').hide();
                        $('#container_rut').hide();
                        $('#container_monto_total').hide();
                        $('#container_tipo_dte').hide();
                        $('#container_detalle').hide();
                        $('#container_detalle2').hide();
                        $('#warning_detalle').hide();
                        $('#switch_fechas').attr('disabled',false);
                        // code block
                        break;
                    }
                   
            }

            function busquedaAvanzada(){
                var caso = "";
                var select_busqueda_avanzada = $('#select_busqueda_avanzada option:selected').val();
                let input_fecha_inicial = $('#input_fecha_inicial').val();
                let input_fecha_final = $('#input_fecha_final').val();
                var parametros = {
                            
                    }; 

                if (select_busqueda_avanzada == "select_folio") {
                    var input_folio = $('#input_folio').val();
                    
                     if (input_folio.length == 0) {
                        alert("No has escrito nada en Folio");
                    }else{
                        caso = "busqueda_folio";
                    parametros = {"caso": caso, "valor": input_folio,"valor2": "", "fecha_inicial": input_fecha_inicial, "fecha_final": input_fecha_final }; 
                    busquedaAvanzadaAjax(parametros);
                    }
                   
                }

                if(select_busqueda_avanzada == "select_rut") {
                    var input_rut = $('#input_rut').val();
                    if (input_rut.length == 0) {
                        alert("No has escrito ingresado un RUT");
                    }else{
                    caso = "busqueda_rut";
                    parametros = {"caso": caso, "valor": input_rut,"valor2": "", "fecha_inicial": input_fecha_inicial, "fecha_final": input_fecha_final}; 
                    busquedaAvanzadaAjax(parametros);
                    }
                    
                }
                if (select_busqueda_avanzada == "select_fecha") {
                    var input_fecha = $('#input_fecha').val();
                    if (input_fecha.length == 0) {
                        alert("No has escrito seleccionado Fecha");
                    }else{
                        caso = "busqueda_fecha";
                    parametros = {"caso": caso, "valor": input_fecha,"valor2": "", "fecha_inicial": input_fecha_inicial, "fecha_final": input_fecha_final}; 
                    busquedaAvanzadaAjax(parametros);
                    }
                   
                }
                if (select_busqueda_avanzada == "select_monto") {
                    var input_monto = $('#input_monto_total').val();
                    if (input_monto.length == 0) {
                        alert("No has ingresado un Monto");
                    }else{
                    caso = "busqueda_monto";
                    parametros = {"caso": caso, "valor": input_monto,"valor2": "", "fecha_inicial": input_fecha_inicial, "fecha_final": input_fecha_final}; 
                    busquedaAvanzadaAjax(parametros);
                    }
                   
                }
               
                 if (select_busqueda_avanzada == "select_tipo") {
                    var input_tipo = $('#input_tipo_dte option:selected').val();
                    if (input_tipo.length == 0) {
                        alert("No has seleccionado un DTE");
                    }else{
                       caso = "busqueda_tipo";
                    parametros = {"caso": caso, "valor": input_tipo,"valor2": "", "fecha_inicial": input_fecha_inicial, "fecha_final": input_fecha_final}; 
                    busquedaAvanzadaAjax(parametros);
                    }
                    
                }

                   if (select_busqueda_avanzada == "select_detalle") {
                    var input_detalle = $('#input_detalle').val();
                    var input_detalle2 = $('#input_detalle2').val();
                    
                     if (input_detalle.length == 0) {
                        alert("No has escrito ningun Producto");
                    }else{
                        caso = "busqueda_detalle";
                    parametros = {"caso": caso, "valor": input_detalle,"valor2": input_detalle2, "fecha_inicial": input_fecha_inicial, "fecha_final": input_fecha_final}; 
                    busquedaAvanzadaAjax(parametros);
                    }
                   
                }

                if (select_busqueda_avanzada == "" && $('#switch_fechas').prop('checked')) {
                   //BUSQUEDA POR PERIODOS
                   if (input_fecha_inicial.length == 0 || input_fecha_final.length == 0) {
                    alert("No has escrito fecha inicial o final");
                   }else{
                    caso = "busqueda_periodos";
                    parametros = {"caso": caso, "valor": "","valor2": "", "fecha_inicial": input_fecha_inicial, "fecha_final": input_fecha_final}; 
                    busquedaAvanzadaAjax(parametros);
                   }
                }else if(select_busqueda_avanzada == ""){
                    alert("No has seleccionado un filtro");
                }

                
                console.log(parametros);

            }

           function busquedaAvanzadaAjax(parametros){

                $.ajax({
                    type: 'POST',
                    data:  parametros,
                    headers: {
                                    'apikey':'928e15a2d14d4a6292345f04960f4cc3' 
                                },
                    dataType: "json",
                    url: "Clases/DTE.php?funcion=busquedaAvanzada",
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
                                showConfirmButton: false,
                                //timer: 1800,
                                html: true           
                            });
                        },
                    success:function(data){
                        swal.close();
                        console.log(data);

                        if (data.length == 0) {
                            swal("Sin Registros", "No hay datos de DTE", "error");
                        }
                        $('#tabla_dte_emitidos').DataTable().destroy();
                        cargarTabla(data);
                    }
                });
            }


            function anularDTE(){

                var documento;
                // nombres para mostrar en el recuadro de exito      
                
                
                var parametros = {"tipo_dte_ref": tipo_dte_global,"folio_ref": folio_global}; 
                var tipo_doc_ref = $("#tipo_doc_ref").val();

                // SI ES ORDEN DE COMPRA NO LA BUSCA, YA QUE NO SE REGISTRAN
                if(tipo_doc_ref != "801"){                    

                     $.ajax({
                        type: "POST",
                        data:  parametros,
                        headers: {
                            'apikey':'928e15a2d14d4a6292345f04960f4cc3' 
                        },
                        dataType: "json",
                        url: "Clases/DTE.php?funcion=buscarXml",
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

                        success: function(path) {                           
                            
                            let json_path = path[0].ubicacion;
                            let parametros = {"ubicacion_xml": json_path};
                            //console.log(json_path);

                            if (path.length == 0) {

                                swal("Error", "No se encuentra el archivo referenciado", "error");

                            }else{


                                swal({
                                    title:"¿Está seguro(a) de anular el Documento?", 
                                    text:"Se anulará el Documento con folio : "+folio_global, 
                                    type:"warning",
                                    showConfirmButton: true,
                                    showCancelButton: true,
                                    confirmButtonText: 'Anular',
                                    cancelButtonText: 'Cerrar',
                                    closeOnConfirm: true,
                                    closeOnCancel: true
                                    },
                                    function(flag){

                                        if(flag){

                                            //DIALOGO DE CARGA MIENTRAS SE ENVIA
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
                                                text: "EMITIENDO DOCUMENTO...",
                                                showConfirmButton: false,
                                                html: true,
                                                showCancelButton: false,
                                                closeOnConfirm: false,
                                                showLoaderOnConfirm: true
                                                //timer: 1800,           
                                            });

                                            $.ajax({
                                                type: "POST",
                                                data:  parametros,
                                                headers: {
                                                    'apikey':'928e15a2d14d4a6292345f04960f4cc3' 
                                                },
                                                dataType: "json",
                                                url: "Clases/DTE.php?funcion=leerXML", // la funcion lee el xml y ahi mismo emite el dte                                               

                                                success: function(data) { 

                                                    console.log(data);
                                                    var dataJson = $.parseJSON(data);
                                                   
                                                    if(dataJson.FOLIO != null) {
                                                        swal({
                                                            title:"¡Documento Anulado!", 
                                                            text:"Se ha generado DTE con folio : "+dataJson.FOLIO, 
                                                            type:"success",
                                                            showConfirmButton: false,
                                                            showCancelButton: true,
                                                            //confirmButtonText: 'Aceptar',
                                                            cancelButtonText: 'Cerrar',
                                                            //closeOnConfirm: true,
                                                            closeOnCancel: true
                                                            },
                                                            /*function(flag){
                                                                if(flag){
                                                                    crearPDF(dataJson.FOLIO,tipo_dte);
                                                                    //location.reload();
                                                                }else{
                                                                    location.reload();
                                                                }
                                        
                                                            }*/
                                                        );
                                                        $("#btn_anular").attr('disabled',true);
                                        
                                                        //console.log(data['FOLIO']); 
                                                    }else{
                                                        swal("Error", "Detalle del error: "+JSON.stringify(dataJson), "error");
                                                        // habilita el boton enviar 
                                                        //$('#btn_enviar').attr('disabled', false);  
                                                    }
                                                }
                                            });
                                            //location.reload();
                                        }else{
                                            location.reload();
                                        }
                
                                    }
                                );


                                

                                //swal.close();
                                //console.log(path);                                
                                                                  
                                
                            }
                        }
                    });

                }
            }


</script>
</body>

</html>
