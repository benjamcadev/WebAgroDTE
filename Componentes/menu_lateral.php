

<aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="images/logo_sin_piramides_AgroDTE.png" width="260" height="100" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION["nombre_usuario"]; ?></div>
                    <div class="email"><?php echo $_SESSION["correo_usuario"]; ?></div>
                    <!-- <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div> -->
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MENU DE NAVEGACION</li>
                    <!-- <li>
                        <a href="../../index.html">
                            <i class="material-icons">home</i>
                            <span>INICIO</span>
                        </a>
                    </li> -->
                     <li id="lista_emitir_dte_menu">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">note_add</i>
                            <span>EMITIR DTE</span>
                        </a>
                        <ul class="ml-menu">
                            <li id="lista_emitir_dte_factura_menu">
                                <a href="factura.php">Factura</a>
                            </li>
                            <li id="lista_emitir_dte_factura_exenta_menu">
                                <a href="factura_exenta.php">Factura Exenta</a>
                            </li>
                            <li id="lista_emitir_dte_nota_credito_menu">
                                <a href="nota_credito.php">Nota de Crédito</a>
                            </li>
                            <li id="lista_emitir_dte_nota_debito_menu">
                                <a href="nota_debito.php">Nota de Débito</a>
                            </li>
                            <li id="lista_emitir_dte_guia_despacho_menu">
                                <a href="guia_despacho.php">Guia de Despacho</a>
                            </li>
                            <li id="lista_emitir_dte_boleta_menu">
                                <a href="boleta.php">Boleta</a>
                            </li>
                            <li id="lista_emitir_dte_boleta_exdenta_menu">
                                <a href="boleta_exenta.php">Boleta Exenta</a>
                            </li>
                        </ul>
                    </li>                   
                    <li id="lista_dte_emitidos_menu" >
                        <a href="dte_emitidos.php">
                            <i class="material-icons">unarchive</i>
                            <span>DOCUMENTOS EMITIDOS</span>
                        </a>
                    </li>
                    <li id="lista_dte_recibidos_menu">
                        <a href="dte_recibidos.php">
                            <i class="material-icons">archive</i>
                            <span>DOCUMENTOS RECIBIDOS</span>
                        </a>
                    </li>
                    <li id="lista_registro_ventas_menu">
                        <a href="registro_ventas.php">
                            <i class="material-icons">description</i>
                            <span>REGISTRO VENTAS</span>
                        </a>
                    </li>
                    <li id="lista_registro_compras_menu">
                        <a href="registro_compras.php">
                            <i class="material-icons">description</i>
                            <span>REGISTRO COMPRAS</span>
                        </a>
                    </li>
                     <li id="lista_registro_envios_menu" >
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">view_list</i>
                            <span>REGISTRO DE ENVIOS</span>
                        </a>
                        <ul class="ml-menu">
                            <li id="lista_envio_dte_menu" >
                                 <a href="envio_dte.php">Registro Envio DTE Completo</a>
                            </li>
                            <li id="lista_registro_diarias_boleta_menu">
                                <a href="registro_diarias_boleta.php">Registro Envio Boleta (RVD)</a>
                            </li>
                            
                        </ul>
                    </li>
                     <!-- <li id="lista_configuracion_menu">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">settings</i>
                            <span>CONFIGURACIÓN</span>
                        </a>
                        <ul class="ml-menu">
                            <li id="cargar_xml" >
                                <a href="cargar_xml.php">Cargar XML</a>
                            </li>
                            <li>
                                <a href="../../pages/ui/alerts.html">Certificado</a>
                            </li>
                            <li>
                                <a href="../../pages/ui/animations.html">Caf</a>
                            </li>
                            <li>
                                <a href="../../pages/ui/badges.html">Usuarios</a>
                            </li>

                            <li>
                                <a href="../../pages/ui/breadcrumbs.html">TI</a>
                            </li>                           
                        </ul>
                    </li> -->
                    <!--
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">widgets</i>
                            <span>Widgets</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Cards</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="../../pages/widgets/cards/basic.html">Basic</a>
                                    </li>
                                    <li>
                                        <a href="../../pages/widgets/cards/colored.html">Colored</a>
                                    </li>
                                    <li>
                                        <a href="../../pages/widgets/cards/no-header.html">No Header</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Infobox</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="../../pages/widgets/infobox/infobox-1.html">Infobox-1</a>
                                    </li>
                                    <li>
                                        <a href="../../pages/widgets/infobox/infobox-2.html">Infobox-2</a>
                                    </li>
                                    <li>
                                        <a href="../../pages/widgets/infobox/infobox-3.html">Infobox-3</a>
                                    </li>
                                    <li>
                                        <a href="../../pages/widgets/infobox/infobox-4.html">Infobox-4</a>
                                    </li>
                                    <li>
                                        <a href="../../pages/widgets/infobox/infobox-5.html">Infobox-5</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                   
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">assignment</i>
                            <span>Forms</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="../../pages/forms/basic-form-elements.html">Basic Form Elements</a>
                            </li>
                            <li>
                                <a href="../../pages/forms/advanced-form-elements.html">Advanced Form Elements</a>
                            </li>
                            <li>
                                <a href="../../pages/forms/form-examples.html">Form Examples</a>
                            </li>
                            <li>
                                <a href="../../pages/forms/form-validation.html">Form Validation</a>
                            </li>
                            <li>
                                <a href="../../pages/forms/form-wizard.html">Form Wizard</a>
                            </li>
                            <li>
                                <a href="../../pages/forms/editors.html">Editors</a>
                            </li>
                        </ul>
                    </li>
                   
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">perm_media</i>
                            <span>Medias</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="../../pages/medias/image-gallery.html">Image Gallery</a>
                            </li>
                            <li>
                                <a href="../../pages/medias/carousel.html">Carousel</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">pie_chart</i>
                            <span>Charts</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="../../pages/charts/morris.html">Morris</a>
                            </li>
                            <li>
                                <a href="../../pages/charts/flot.html">Flot</a>
                            </li>
                            <li>
                                <a href="../../pages/charts/chartjs.html">ChartJS</a>
                            </li>
                            <li>
                                <a href="../../pages/charts/sparkline.html">Sparkline</a>
                            </li>
                            <li>
                                <a href="../../pages/charts/jquery-knob.html">Jquery Knob</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">content_copy</i>
                            <span>Example Pages</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="../../pages/examples/profile.html">Profile</a>
                            </li>
                            <li>
                                <a href="../../pages/examples/sign-in.html">Sign In</a>
                            </li>
                            <li>
                                <a href="../../pages/examples/sign-up.html">Sign Up</a>
                            </li>
                            <li>
                                <a href="../../pages/examples/forgot-password.html">Forgot Password</a>
                            </li>
                            <li>
                                <a href="../../pages/examples/blank.html">Blank Page</a>
                            </li>
                            <li>
                                <a href="../../pages/examples/404.html">404 - Not Found</a>
                            </li>
                            <li>
                                <a href="../../pages/examples/500.html">500 - Server Error</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">map</i>
                            <span>Maps</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="../../pages/maps/google.html">Google Map</a>
                            </li>
                            <li>
                                <a href="../../pages/maps/yandex.html">YandexMap</a>
                            </li>
                            <li>
                                <a href="../../pages/maps/jvectormap.html">jVectorMap</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">trending_down</i>
                            <span>Multi Level Menu</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="javascript:void(0);">
                                    <span>Menu Item</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <span>Menu Item - 2</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Level - 2</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <span>Menu Item</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="menu-toggle">
                                            <span>Level - 3</span>
                                        </a>
                                        <ul class="ml-menu">
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <span>Level - 4</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="../changelogs.html">
                            <i class="material-icons">update</i>
                            <span>Changelogs</span>
                        </a>
                    </li>
                    <li class="header">LABELS</li>
                    <li>
                        <a href="javascript:void(0);">
                            <i class="material-icons col-red">donut_large</i>
                            <span>Important</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <i class="material-icons col-amber">donut_large</i>
                            <span>Warning</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <i class="material-icons col-light-blue">donut_large</i>
                            <span>Information</span>
                        </a>
                    </li>
                -->
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                  <a href="javascript:void(0);">Creado por Informatica Agroplastic</a>. 2022 
                </div>
                <div class="version">
                    <b>Version: </b> 1.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>

        <script type="text/javascript">
            
        </script>
