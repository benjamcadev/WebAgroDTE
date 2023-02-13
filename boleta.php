<!DOCTYPE html>
<html>
<?php include'Componentes/verificar_sesion.php'; ?>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Emitir | Boleta</title>
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

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <!-- Bootstrap DatePicker Css -->
    <link href="plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />

    <!-- Wait Me Css -->
    <link href="plugins/waitme/waitMe.css" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />

    <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet">
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
                <h2>EMITIR BOLETA ELECTRÓNICA</h2>
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                IMP COMERCIALIZADORA Y DIST AGROPLASTIC LTDA
                                <small> VENTA AL POR MAYOR NO ESPECIALIZADA</small>
                                <small> VICENTE ZORRILLA 835, LA SERENA</small>
                                <small> FONO 51 2 213485</small>
                            </h2>                          
                        </div>                  
                    </div>
                </div>
            </div>
            <!-- #END# Input -->
            <!-- DATOS GENERALES -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>DATOS GENERALES</h2>
                            <small>(*) Campo obligatorio</small>                           
                        </div>
                        <div class="body">                            
                            <div class="row clearfix">
                                <div class="col-sm-3">
                                    <small> Fecha de emisión (*)</small>
                                    <div class="form-group">
                                        <div class="form-line" id="datepicker_container">
                                            <input id="fecha_emision" type="text" class="form-control" placeholder=" - Seleccione una fecha - ">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <small> Indicador de servicio (*)</small>
                                    <select id="ind_servicio" class="form-control show-tick"> 
                                        <option value="3">Boletas de venta y servicios</option>                                       
                                        <option value="1">Boletas de servicios periódicos</option>
                                        <option value="2">Boletas de servicios periódicos domiciliarios</option>                                        
                                        <option value="4">Boleta de Espectáculo emitida por cuenta de Terceros</option>                                        
                                    </select>
                                </div>                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <!-- #END# DATOS GENERALES -->           
            <!-- DETALLE DEL DOCUMENTO -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>DETALLE DEL DOCUMENTO</h2> 
                            <small>(*) Campo obligatorio</small>  
                            <ul class="header-dropdown">
                                <li>
                                    <a role="button" onclick="AgregarDetalle()">
                                        <i style="font-size:24px;" class="material-icons">add_circle_outline</i>
                                    </a>                                    
                                </li>
                                <li>
                                    <a role="button" onclick="EliminarDetalle()">
                                        <i style="font-size:24px;" class="material-icons" >remove_circle_outline</i>
                                    </a>                                    
                                </li>
                            </ul>                         
                        </div>
                        <div id="div_body_1" class="body">                            
                            <div id="div_fila_detalle_1" class="row clearfix">                                
                                <div class="col-sm-4">
                                    <div class="form-group">
                                         <div class="input-group"> <!-- <div class="form-group"> -->
                                        <div class="form-line">
                                            <small> Item (*)</small>
                                            <input id="item_1" name="1" type="text" class="form-control" placeholder="Item" required />

                                        </div>
                                          <span class="input-group-addon">
                                            <i class="material-icons" id="busqueda_item_1" name="1" onclick="modalBusqueda(this)" style="font-size: 25px;">search</i>
                                        </span>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <small> Cant. (*)</small>
                                            <input id="cantidad_1" name="1" data-tipodte="39" type="number" min="0" class="form-control" placeholder="1" required onchange="calcularSubtotal(this)" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <small> Precio (*)</small>
                                            <input id="precio_1" name="1" data-tipodte="39" type="number" min="0" class="form-control" placeholder="$ 0" required onchange="calcularSubtotal(this)"/>
                                        </div>
                                    </div>
                                </div>                                
                                <div class="col-sm-2">
                                    <div id="div_dscrcg_group_1" name="1" class="form-group">
                                        <div id="div_dscrcg_1" name="1" class="form-line">
                                            <small> Descuento/Recargo</small>
                                            <input id="dscrcg_1" name="1" type="number" class="form-control" aria-invalid="false" placeholder="0" />
                                            <!--<div class="help-info">% Entre -100 y 100</div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <small> Tipo</small>
                                    <div class="demo-radio-button">
                                        <input name="1" type="radio" id="radio_detalle_monto_1" class="radio-col-blue" value="$" onclick="calcularSubtotal(this)"/>
                                        <label for="radio_detalle_monto_1">$</label>
                                        <input name="1" type="radio" id="radio_detalle_porcentaje_1" class="radio-col-blue" value="%" onclick="calcularSubtotal(this)"/>
                                        <label for="radio_detalle_porcentaje_1">%</label>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <small> SubTotal (*)</small>
                                            <input id="subtotal_1" name="1" type="text" class="form-control" placeholder="$ 0" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# DETALLE DEL DOCUMENTO -->
            <div id="div_buttom_referencia" class="header">
                <ul id="ul_button_agregar_referencia" class="header-dropdown m-r--5">                                  
                    <a role="button" onclick="AgregarReferencias()">
                        <i class="material-icons" id="button_agregar_referencias">add_circle_outline</i> 
                        <label for="button_agregar_referencias">AGREGAR REFERENCIA</label>                    
                    </a>                 
                </ul>
            </div>
            <!-- REFERENCIAS DEL DOCUMENTO -->
            <div id="div_referencias">  
                            
            </div>
            <!-- #END# REFERENCIAS DEL DOCUMENTO -->
             <!-- TOTALES -->
            <div class="row clearfix">                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                TOTALES
                            </h2>                           
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <small> SubTotal</small>
                                            <input id="subTotalGlobal" type="text" class="form-control" placeholder="$ 0" disabled/>
                                        </div>
                                    </div>
                                </div> 
                                <div class="col-sm-1">
                                    <small> Tipo</small>
                                    <div class="demo-radio-button">
                                        <input name="radio_global_monto" type="radio" id="radio_global_monto" class="radio-col-blue" value="$" onclick="CalcularMontoNeto()" />
                                        <label for="radio_global_monto">$</label>
                                        <input name="radio_global_monto"type="radio" id="radio_global_porcentaje" class="radio-col-blue" value="%" onclick="CalcularMontoNeto()" />
                                        <label for="radio_global_porcentaje">%</label>
                                    </div>
                                </div>                          
                                <div class="col-sm-2">
                                    <div id="div_dscrcg_group_global" class="form-group">
                                        <div id="div_dscrcg_global" class="form-line">
                                            <small> Descuento / Recargo</small>
                                            <input id="descuento_global" type="number" class="form-control" placeholder="0" onchange="CalcularMontoNeto()"/>
                                        </div>
                                    </div> 
                                </div>

                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">                                 
                                    <div class="form-group">
                                        <div class="form-line">
                                            <small> Monto neto</small>
                                            <input id="monto_neto_global" type="text" class="form-control" placeholder="$ 0" disabled/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <small> IVA</small>
                                            <input id="iva_global" type="text" class="form-control" placeholder="19 %" disabled/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <small> Monto total</small>
                                            <input id="total_global" type="text" class="form-control" placeholder="$ 0" disabled/>
                                        </div>
                                    </div>
                                </div>
                                </div> 
                            <div class="row clearfix m-r--5">                             
                               <div class="col-sm-2">
                                    <button id="btn_enviar" type="button" class="btn btn-primary waves-effect" onclick="EnviarDatos()">EMITIR</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# TOTALES -->  
            <div class="auto" id="tipo_dte" style="display: none">39</div>          
            <!--Bootstrap Date Picker -->
            
            <!--#END# Switch Button -->
        </div>
    </section>

         <section class="content" style="margin-top: 0px;">
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

                             <button type="button" class="close" data-dismiss="modal">&times;</button>
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

     <section class="content" style="margin-top: 0px;">
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

       <div class="modal fade " id="busquedaModal" tabindex="-1" role="dialog" style="display: none;">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title" id="largeModalLabel">Busqueda Producto</h1>
                            <div class="alert bg-teal">
                                Si no encuentras el producto, prueba activando las mayúsculas.
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="form-group form-group-lg">
                                <div class="switch">
                                    <label>Codigo
                                        <input id="checkbox_tipo_busqueda" type="checkbox" >
                                        <span class="lever"></span>
                                    Descripción</label>
                                </div>
                                        <div class="form-line">
                                            <input type="text" id="input_busqueda_producto"  onkeypress="enter(event)" class="form-control" placeholder="Ingresa Codigo o Descripción" />
                                        </div>


                            </div>

                             <div id="lista_busqueda_producto" class="list-group" style="display: none;">
                               
                            </div>

                            <input type="hidden" id="id_input_descripcion" name="">
                           
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect">SAVE CHANGES</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>


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

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/forms/basic-form-elements.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
    <script src="plugins/sweetalert/sweetalert.min.js"></script>

    <!-- carga los datos del receptor y calcula los montos -->
    <script type="text/javascript" src="js/datos.js"></script>

    <script type="text/javascript"> var tipo_dte = "39"; </script>

    <script type="text/javascript"> 

         $("#lista_emitir_dte_boleta_menu").addClass("active");
          $("#lista_emitir_dte_menu").addClass("active");
        $('#datepicker_container input').datepicker({
        autoclose: true,
        container: '#datepicker_container',
        format: 'yyyy-mm-dd',
        language: 'es'
        
    }); </script>

      <!-- captura datos para enviarlos a la api -->
    <script type="text/javascript" src="js/enviardatos_boleta.js"></script>
     <!-- PDF JS Plugin Js -->
    <script src="plugins/pdf-js/pdf.js"></script>

    <!-- PDF JS Plugin Js -->
    <script src="plugins/pdf-js/pdf.worker.js"></script>

    <!-- Print JS Plugin Js -->
    <script src="plugins/print-js/print.min.js"></script>


</body>
</html>
