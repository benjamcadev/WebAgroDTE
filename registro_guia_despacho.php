<!DOCTYPE html>
<html>
<?php include'Componentes/verificar_sesion.php'; ?>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Registro de Guia Despacho | AgroDTE</title>
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
                   REGISTRO DE GUIAS DE DESPACHO
                    <small>En este menu encontraras las guia de despacho emitidas, y anuladas</small>
                </h3>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div id="contenedor_cards" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div id="card_periodo" class="card">

                        <div class="header">
                            <h2>Periodo</h2>
                        </div>
                        

                        <div id="card_periodo_body" class="body">
                            <div class="row clearfix">
                                <div class="col-md-5">
                                    <div class="form-line">
                                    <select id="select_month" class="form-control ">
                                        <option value="">-- Selecciona Mes --</option>
                                        <option  value="01">Enero</option>
                                        <option value="02">Febrero</option>
                                        <option value="03">Marzo</option>
                                        <option value="04">Abril</option>
                                        <option value="05">Mayo</option>
                                        <option value="06">Junio</option>
                                        <option value="07">Julio</option>
                                        <option value="08">Agosto</option>
                                        <option value="09">Septiembre</option>
                                        <option value="10">Octubre</option>
                                        <option value="11">Noviembre</option>
                                        <option value="12">Diciembre</option>
                                    </select>
                                        </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-line">
                                    <select id="select_year" class="form-control ">
                                        <option value="">-- Selecciona Año --</option>
                                        
                                        
                                    </select>
                                        </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-line">
                                         <button onclick="busquedaGD()" type="button" class="btn bg-purple btn-circle-lg waves-effect waves-circle waves-float">
                                    <i class="material-icons">search</i>
                                </button>
                                    </div>
                                </div>
                            </div>

                            <div id="contenedor_tabla" class="table-responsive">

                                <ul class="nav nav-tabs" role="tablist">
                                    <li class=" nav active">
                                        <a href="#tab-table1" data-toggle="tab">Emitidas</a>
                                    </li>
                                    <li class="nav">
                                        <a id="tab_anuladas"  href="#tab-table2"  data-toggle="tab">Anuladas</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab-table1">
                                        <table id="tabla_guia_despacho_emitidas" style="width:100%" class="table table-striped table-bordered">                              
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="tab-table2">
                                        <table id="tabla_guia_despacho_anuladas" style="width:100%" class="table table-striped table-bordered">                              
                                        </table>
                                    </div>
                                </div>
                               
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
             <!-- Default Size -->
            <div class="modal fade" id="descargasModal" tabindex="-1" role="dialog">
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

    <script type="text/javascript">
        window.onload = function() {
             $("#lista_registro_guia_despacho_menu").addClass("active");
             cargarFechasRegistro();

             
            $('#tabla_guia_despacho_emitidas').DataTable( {
                paging: false,
                "order": []
             } );

            $('#tabla_guia_despacho_anuladas').DataTable( {
                paging: false,
                "order": []
            } );

            
        }

      

        // $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        //         $.fn.dataTable.tables({ visible: true, api: true }).columns.adjust();
        //         });

  


    function cargarFechasRegistro(){
        $.ajax({
            type: 'POST',
            data: {"tipo": "guia_despacho"},
            headers: {
                            'apikey':'928e15a2d14d4a6292345f04960f4cc3' 
                        },
            dataType: "json",
            url: "Clases/Registros.php?funcion=cargarFechasRegistro",
            success:function(data){
                
                var d = new Date(data[Object.keys(data)[0]]); //obtiene el numero del primer key del array si es 0 o 1
                let min_year = d.getFullYear();
                let max_year = new Date().getFullYear();

                for (let index = min_year; index <= max_year; index++) {
                    $('#select_year').append($('<option>', {
                    value: index,
                    text: index
                    }));
                    
                }
                $('#select_year').selectpicker('refresh');
               
               
            }


        }); 

    }

         //Tooltip
    $('[data-toggle="tooltip"]').tooltip({
        container: 'body'
    });

   


          
         function busquedaGD(){

                 var mes = $('#select_month option:selected').val();
                    if (mes.length == 0) {
                        alert("No has seleccionado un mes");
                        return;
                    }

                     var year = $('#select_year option:selected').val();
                    if (year.length == 0) {
                        alert("No has seleccionado un año");
                        return;
                    }
                
                    

                 var parametros = {
                    "month": mes,
                    "year": year
                            
                    };



                //TRAER DATOS DESDE EL SII
                   $.ajax({
                    type: 'POST',
                    data:  parametros,
                    headers: {
                            'apikey':'928e15a2d14d4a6292345f04960f4cc3' 
                        },
            dataType: "json",
            url: "Clases/Registros.php?funcion=consultarGDRegistro",
            success:function(data){
                console.log(JSON.parse(data));

               
                cargarTabla(JSON.parse(data));


        }
        });   

        }

        function cargarTabla(data){

            $('#tabla_guia_despacho_emitidas').DataTable().destroy();
            $('#tabla_guia_despacho_anuladas').DataTable().destroy();
          

                $('#tabla_guia_despacho_emitidas').DataTable( {
                    data: data['vigentes'][0],
                    columns: [
                    { title: "Folio",data: 'folio_guia_despacho' },
                    { title: "Rut",data: 'rutrecep_guia_despacho' },
                    { title: "Razon Social",data: 'rznsocrecep_guia_despacho' },
                    { title: "Monto Total",data: 'mnttotal_guia_despacho',render: function(data){
                                                                                        var formatter = new Intl.NumberFormat('es-CL', {
                                                                                      style: 'currency',
                                                                                      currency: 'CLP'
                                                                                    });
                                                                                     return formatter.format(data);  

                                    }  },
                    { title: "Fecha",data: 'fchemis_guia_despacho' },
                    { title: "DTE Referencia",data: 'folio_referencia',render: function(data,type, row, meta){
                                                                                let folio = ''; let tipo_dte = '';
                                                                                if (row['folio_referencia'] == null) {
                                                                                    folio = ''
                                                                                }else{
                                                                                    folio = row['folio_referencia'];
                                                                                }
                                                                                if (row['dte_referencia'] == null) {
                                                                                    tipo_dte = 'No hay referencia';
                                                                                }else{
                                                                                    switch (row['dte_referencia']) {
                                                                                        case '33':
                                                                                            tipo_dte = 'Factura';
                                                                                            break;
                                                                                        case '61':
                                                                                        tipo_dte = 'Nota Credito';
                                                                                        break;
                                                                                        case '39':
                                                                                        tipo_dte = 'Boleta';
                                                                                        break;  
                                                                                        case '34':
                                                                                        tipo_dte = 'Factura Exenta';
                                                                                        break;     
                                                                                        case '56':
                                                                                        tipo_dte = 'Nota Debito';
                                                                                        break;   
                                                                                    
                                                                                        default:
                                                                                            break;
                                                                                    }
                                                                                }

                                                                                return folio + ' '+ tipo_dte;
                                    } },
                    { title: "DTE",data: 'anulado_guia_despacho',render: function(data){
                         if (data == 0) {
                            return '<p class="font-bold col-teal">Vigente</p>';
                        }else if (data == 1) {
                            return '<p class="font-bold col-pink">Anulada</p>';
                        }
                    }}

                    ],
                    "oLanguage": {
                                     "sSearch": "Busqueda Rapida",
                                     "sLengthMenu": "Mostrar _MENU_ Registros",
                    },
                    dom: 'Blprtip',
                    buttons: [
                                    {
                                        extend: 'excel',
                                        title: 'REGISTRO DE GUIAS DE DESPACHO EMITIDAS - AgroDTE',
                                        text: 'Excel',
                                        className: 'btn bg-green btn-sm waves-effect'
                                        
                                    },
                                    {
                                        extend: 'csv',
                                        title: 'REGISTRO DE GUIAS DE DESPACHO EMITIDAS - AgroDTE',
                                        text: 'CSV',
                                        className: 'btn bg-teal btn-sm waves-effect'
                                       
                                    },
                                    {
                                        extend: 'print',
                                        title: 'REGISTRO DE GUIAS DE DESPACHO EMITIDAS - AgroDTE',
                                        text: 'Imprimir',
                                        className: 'btn bg-blue-grey btn-sm waves-effect'
                                        
                                    }
                                    
                                    ]
                   

                });


                
               $('#tabla_guia_despacho_anuladas').DataTable( {
                    responsive: true,
                    data: data['anuladas'][0],
                    columns: [
                    { title: "Folio",data: 'folio_guia_despacho' },
                    { title: "Rut",data: 'rutrecep_guia_despacho' },
                    { title: "Razon Social",data: 'rznsocrecep_guia_despacho' },
                    { title: "Monto Total",data: 'mnttotal_guia_despacho',render: function(data){
                                                                                        var formatter = new Intl.NumberFormat('es-CL', {
                                                                                      style: 'currency',
                                                                                      currency: 'CLP'
                                                                                    });
                                                                                     return formatter.format(data);  

                                    }  },
                    { title: "Fecha",data: 'fchemis_guia_despacho' },
                    { title: "DTE Referencia",data: 'folio_referencia',render: function(data,type, row, meta){
                                                                                let folio = ''; let tipo_dte = '';
                                                                                if (row['folio_referencia'] == null) {
                                                                                    folio = ''
                                                                                }else{
                                                                                    folio = row['folio_referencia'];
                                                                                }
                                                                                if (row['dte_referencia'] == null) {
                                                                                    tipo_dte = 'No hay referencia';
                                                                                }else{
                                                                                    switch (row['dte_referencia']) {
                                                                                        case '33':
                                                                                            tipo_dte = 'Factura';
                                                                                            break;
                                                                                        case '61':
                                                                                        tipo_dte = 'Nota Credito';
                                                                                        break;
                                                                                        case '39':
                                                                                        tipo_dte = 'Boleta';
                                                                                        break;  
                                                                                        case '34':
                                                                                        tipo_dte = 'Factura Exenta';
                                                                                        break;     
                                                                                        case '56':
                                                                                        tipo_dte = 'Nota Debito';
                                                                                        break;   
                                                                                    
                                                                                        default:
                                                                                            break;
                                                                                    }
                                                                                }

                                                                                return folio + ' '+ tipo_dte;
                                    } },
                    { title: "DTE",data: 'anulado_guia_despacho',render: function(data){
                         if (data == 0) {
                            return '<p class="font-bold col-teal">Vigente</p>';
                        }else if (data == 1) {
                            return '<p class="font-bold col-pink">Anulada</p>';
                        }
                    }}

                    ],
                    "oLanguage": {
                                     "sSearch": "Busqueda Rapida",
                                     "sLengthMenu": "Mostrar _MENU_ Registros",
                    },
                   
                    dom: 'Blprtip',
                    buttons: [
                                    {
                                        extend: 'excel',
                                        title: 'REGISTRO DE GUIAS DE DESPACHO ANULADAS - AgroDTE',
                                        text: 'Excel',
                                        className: 'btn bg-green btn-sm waves-effect'
                                        
                                    },
                                    {
                                        extend: 'csv',
                                        title: 'REGISTRO DE GUIAS DE DESPACHO ANULADAS - AgroDTE',
                                        text: 'CSV',
                                        className: 'btn bg-teal btn-sm waves-effect'
                                       
                                    },
                                    {
                                        extend: 'print',
                                        title: 'REGISTRO DE GUIAS DE DESPACHO ANULADAS - AgroDTE',
                                        text: 'Imprimir',
                                        className: 'btn bg-blue-grey btn-sm waves-effect'
                                        
                                    }
                                    
                                    ],
                    "language": {
                        "zeroRecords": "No records to display"
                    },
                   

                });

             

                

        }

            

      function fnExcelReport(){
    var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
    var textRange; var j=0;
    tab = document.getElementById('tabla_ventas'); // id of table

    for(j = 0 ; j < tab.rows.length ; j++) 
    {     
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        //tab_text=tab_text+"</tr>";
    }

    tab_text=tab_text+"</table>";
    tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE "); 

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
    {
        txtArea1.document.open("txt/html","replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus(); 
        sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xls");
    }  
    else                 //other browser not tested on IE 11
        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

    return (sa);
}   


           
           

            


        


    </script>
</body>

</html>
