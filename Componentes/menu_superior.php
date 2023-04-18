<!-- Search Bar -->
   <!--  <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div> -->
    <!-- #END# Search Bar -->

    <!-- Top Bar -->

    <script type="text/javascript">
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();

        today = dd + '/' + mm + '/' + yyyy;
    </script>
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="#"><?php echo $_SESSION["nombre_usuario"]; ?></a>
                <a class="navbar-brand" href="#"><?php echo $_SESSION["correo_usuario"]; ?></a>
               
                
                
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <!-- <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li> -->
                    <!-- #END# Call Search -->
                    <!-- Notifications -->

                    <li class="dropdown">
                        <a class="dropdown-toggle" href="#"><script type="text/javascript">document.write(today);</script> </a>
                    </li>
                    <li class="pull-right">
                        <a href="javascript:void(0);" onclick="cerrarSesion();" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">exit_to_app</i>
                        </a>
                    </li>

                    <!-- #END# Tasks -->
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->

    <script type="text/javascript">
        function cerrarSesion(){

             var parametros = {
                "funcion": 'cerrarSesion'
        }; 

              $.ajax({
                                    type: 'POST',
                                    data:  parametros,
                                    headers: {
                                                    'apikey':'928e15a2d14d4a6292345f04960f4cc3' 
                                                },
                                    dataType: "json",
                                    url: "Clases/Login.php",
                                    success:function(data){
                                        data = JSON.parse(data);

                                        if (data["mensaje"] == "ok") {
                                             
                                             swal({
                                                title: "Hasta Pronto !",
                                                text: "Estamos cerrando sesión",
                                                type: "success",
                                                showConfirmButton: false,
                                                timer: 3000
                                            },
                                            function () {
                                                 window.location.href = "login.html";
                                                 tr.hide();
                                            }
                                            );
                                        }else{
                                            swal("Hubo un problema", "Hubo error al cerrar sesion", "error");
                                        }

                                      


                                    }
                                });
        }
       
    </script>