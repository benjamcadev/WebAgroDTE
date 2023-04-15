<!DOCTYPE html>
<html>
 <?php include'Componentes/verificar_sesion.php'; ?>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Usuarios | AgroDTE</title>
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
                Usuarios
                    <small>En este menu encontraras todos los usuarios registrados en el sistema.</small>
                </h3>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                             Usuarios
                                
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
                                <table id="tabla_usuarios" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                   
                                   
                                    
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
            <div class="modal fade" id="usuarioModal" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>CARGAR NUEVO USUARIO</h4>
                        </div>

                        <div class="modal-body">
                            <div class="row clearfix">

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <small>Rut (*)</small>
                                            <input id="rut_usuario_modal" onchange="checkRut(this)" type="text" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <small>Nombre (*)</small>
                                            <input id="nombre_usuario_modal" type="text" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <small>Apellido (*)</small>
                                            <input id="apellido_usuario_modal" type="text" class="form-control" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <small>Contraseña (*)</small>
                                            <input id="pass_usuario_modal" type="password" class="form-control" />
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <small>Email (*)</small>
                                            <input id="email_usuario_modal" type="email" class="form-control" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <small> Rol (*)</small>
                                            <select id="rol_usuario_modal" class="form-control show-tick">  
                                                <option value="default">--Seleccione Opción--</option>                                      
                                                <option value="Administrador">Administrador</option>
                                                <option value="Lector">Lector</option>                              
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-line">
                                        <button class="btn btn-info waves-effect" onclick="cargarUsuario()" name="submit">Registrar Usuario</button>
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
    if(cuerpo.length < 7) { console.log("run incompleto"); rutIncompleto();  return false;}
    
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
    if(dvEsperado != dv) { console.log("RUT Inválido"); rutInvalido(); return false; }
    
    // Si todo sale bien, eliminar errores (decretar que es válido)
    rut.setCustomValidity('');

   
}

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
                        url: "Clases/Config.php?funcion=cargarUsuariosTabla",

                        success: function(data) { 

                        console.log(data);

                      cargarTabla(data);    
                    }
                    });
            }

          
            function cargarTabla(data){
                
                $('#tabla_usuarios').DataTable( {

                              data: data,
                               "order": [[ 3, 'desc' ]],
                               //"ordering": false,
                                columns: [
                                    { title: "Rut",data: 'rut_usuario'},
                                    { title: "Nombre",data: 'nombre_usuario'},
                                    { title: "Apellido",data: 'apellido_usuario' },
                                    { title: "Correo",data: 'correo_usuario' },
                                    { title: "Rol",data: 'rol_usuario' },
                                    { title: "Ultimo Log",data: 'ultimo_login_usuario' },
                                    { title: "Opciones",data: 'rut_usuario',render: function(data,type, row, meta){
                                                                        return '<button onclick="eliminarUsuario(\''+data+'\',\''+row["nombre_usuario"]+'\',\''+row["apellido_usuario"]+'\')" type="button" class="btn bg-red btn-block btn-sm waves-effect">Eliminar</button>'
                                    } },



                                ],
                                "oLanguage": {
                                     "sSearch": "Busqueda Rapida",
                                     "sLengthMenu": "Mostrar _MENU_ Registros",
                                 },
                                 dom: 'Blfrtip',
                                 buttons: [
                                    {
                                        extend: 'excel',
                                        title: 'Usuarios - AgroDTE',
                                        text: 'Excel',
                                        className: 'btn bg-green btn-sm waves-effect'
                                    },
                                    {
                                        extend: 'csv',
                                        title: 'Usuarios - AgroDTE',
                                        text: 'CSV',
                                        className: 'btn bg-teal btn-sm waves-effect'
                                    },
                                    {
                                        extend: 'print',
                                        title: 'Usuarios - AgroDTE',
                                        text: 'Imprimir',
                                        className: 'btn bg-blue-grey btn-sm waves-effect'
                                    },
                                    {
                                    text: 'Registar Nuevo Usuario',
                                    className: 'btn bg-light-blue btn-sm waves-effect',
                                    action: function ( e, dt, node, config ) {
                                         //abrir modal
                                        $('#usuarioModal').modal('show');
                                        $('#rol_usuario_modal').selectpicker('refresh');
                                    }
                                    }
                                    
                                    ]
                            } );

            }
            $('#usuarioModal').on('hidden.bs.modal', function () {
              
                $("#nombre_usuario_modal").val("");
               $("#apellido_usuario_modal").val("");
               $("#fecha_expiracion_modal").val("");
               $("#pass_modal").val("");
               $("#estado_modal").val("");
               $('#estado_modal').selectpicker('refresh');
              
            });

           
     

           function cargarUsuario(){

                if ($('#nombre_usuario_modal').val() == '' || $('#apellido_usuario_modal').val() == '' || $('#pass_usuario_modal').val() == ''
                || $('#email_usuario_modal').val() == '' || $('#rol_usuario_modal').val() == 'default' || $('#rut_usuario_modal').val() == '') {
                    swal("Ojo !", "Faltan datos por ingresar", "warning");
                    return;
                }

                var data = new FormData();
                data.append('rut_usuario_modal',$('#rut_usuario_modal').val());
                data.append('nombre_usuario_modal',$('#nombre_usuario_modal').val());
                data.append('apellido_usuario_modal',$('#apellido_usuario_modal').val());
                data.append('pass_usuario_modal',$('#pass_usuario_modal').val());
                data.append('email_usuario_modal',$('#email_usuario_modal').val());
                data.append('rol_usuario_modal',$('#rol_usuario_modal').val());
           
            

                jQuery.ajax({
                    url: 'Clases/Config.php?funcion=registrarUsuario',
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
                                    title: "Usuario Registrado", 
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

        function eliminarUsuario(rut,nombre,apellido) {

            swal({
                title: "Desea eliminar al usuario: "+nombre+" "+apellido,
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
                    
                    var data = new FormData();
                    data.append('rut_usuario',rut);
                   

                    jQuery.ajax({
                    url: 'Clases/Config.php?funcion=eliminarUsuario',
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

                        if (data == 'ok') {
                            swal({
                                    title: "Listo", 
                                    text: "Usuario eliminado con exito", 
                                    type: "success"
                                    },
                                function(){ 
                                    location.reload();
                                }
                            );
                        }else{
                            swal({
                                    title: "Error", 
                                    text: "Hubo un error", 
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
                });
        }



</script>
</body>

</html>
