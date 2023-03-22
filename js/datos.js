//------------------------------------------------------------------------------------------------------------------------------------------------------------------
//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< VARIABLES GLOBALES >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//------------------------------------------------------------------------------------------------------------------------------------------------------------------

var dataValue;
var tipo_dte;
var tipo_doc_ref = "";
var dte_referencia_exento;
var filaDetalle = 1; 
//var direccion_receptor;
var formatter = new Intl.NumberFormat('es-CL', {style: 'currency',currency: 'CLP'});

//al final no supe como obtener desde el input el atributo creado, asi que hice este webeo, AMEN
$("#cantidad_1").change(function(){ tipo_dte = $(this).data("tipodte"); });
$("#precio_1").change(function(){ tipo_dte = $(this).data("tipodte"); });
//$("#direccion_receptor").onClick(function(){ direccion_receptor = $("#direccion_receptor option:selected").data("value"); });

$("#tipo_doc_ref").change(function(){ tipo_doc_ref = $("#tipo_doc_ref").val(); calcularSubTotalGlobal(); });

//------------------------------------------------------------------------------------------------------------------------------------------------------------------
//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< CHECKEAR RUT >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//------------------------------------------------------------------------------------------------------------------------------------------------------------------

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

    cargarDatosReceptor();
}

function rutInvalido(){
    swal("Error", "Rut invalido", "error");
}

function rutIncompleto(){
    swal("Ojo !", "Rut incompleto", "warning");
}

//------------------------------------------------------------------------------------------------------------------------------------------------------------------
//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< CARGAR DATOS DEL RECEPTOR >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//------------------------------------------------------------------------------------------------------------------------------------------------------------------

function cargarDatosReceptor(){

    var rut_receptor = $('#rut_receptor').val();      
    var parametros = {'rut_receptor': rut_receptor};

    //limpiamos todos los campos antes de buscar datos nuevos

    $('#giro_receptor').find('option').remove().end();
    $('#direccion_receptor').find('option').remove().end();
    $('#razon_social_receptor').val('');
    $('#comuna_receptor').val('');

    $('#giro_receptor').selectpicker('refresh');
    $('#direccion_receptor').selectpicker('refresh');

   

    $.ajax({
        type: "POST",
        data:  parametros,
        headers: {
            'apikey':'928e15a2d14d4a6292345f04960f4cc3' 
        },
        dataType: "json",
        url: "Clases/DTE.php?funcion=cargarDatosReceptor",
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
        success: function(data) {        
            
            console.log(data);
            if (data.acteco.length == 0) {
                //|| data.direccion.length == 0

                swal("Error", "No se encuentra el cliente en la BD", "error");

            }else{

                swal.close();

                $('#razon_social_receptor').val(data.acteco[0].razon_social);

                for (var i = 0; i < data.acteco.length; i++) {
                     $("#giro_receptor").append(new Option(data.acteco[i].des_actividad_economica,data.acteco[i].des_actividad_economica)); 
                }

                for (var i = 0; i < data.direccion.length; i++) {
                    var direccion_receptor = data.direccion[i].calle+" "+data.direccion[i].numero+", "+data.direccion[i].ciudad;

                    //$("#direccion_receptor").append(new Option(direccion_receptor,i));  
                    $('#direccion_receptor').append($('<option>', {
                        "value": direccion_receptor,
                        "data-value": i
                    }));
                   

                }
                $('#comuna_receptor').val(data.direccion[0].comuna); 
                                     
                $('#giro_receptor').selectpicker('refresh');
                $('#direccion_receptor').selectpicker('refresh');

                 dataValue = data;
            }
        }
    });
}

function cargarComuna(){

    var posicion_direccion = $('#direccion_receptor').val();
    var value = $('#input_direccion_receptor').val();
    var posicion_direccion = $('#direccion_receptor [value="' + value + '"]').data('value');

       
   
    for (var i = 0; i < dataValue.direccion.length; i++) {
        //var direccion_provisioria = dataValue.direccion[i].calle+" "+dataValue.direccion[i].numero+", "+dataValue.direccion[i].ciudad;

        if (posicion_direccion == i) {

            $('#comuna_receptor').val(dataValue.direccion[i].comuna);

        }
    }
}


//------------------------------------------------------------------------------------------------------------------------------------------------------------------
//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< BUSCAR REFERENCIA EXISTENTE >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//------------------------------------------------------------------------------------------------------------------------------------------------------------------
function cargarReferencia(){
    tipo_doc_ref = $("#tipo_doc_ref").val();
    var folio_ref = $('#folio_ref').val();
    var parametros = {"tipo_dte_referencia": tipo_doc_ref,"folio_referencia": folio_ref}; 

    // SI ES ORDEN DE COMPRA NO LA BUSCA, YA QUE NO SE REGISTRAN
    if(tipo_doc_ref != "801"){

         $.ajax({
            type: "POST",
            data:  parametros,
            headers: {
                'apikey':'928e15a2d14d4a6292345f04960f4cc3' 
            },
            dataType: "json",
            url: "Clases/DTE.php?funcion=cargarDatosReferencia",
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
            success: function(data) {        
                
                console.log(data.length);
                if (data.length == 0) {

                    swal("Error", "No se encuentra el folio de referencia", "error");

                }else{

                    swal.close();
                    //console.log(data.fchemis_factura);
                    $('#fecha_ref').val(data[0].fecha);

                    if(data[0].tipo == "34" || data[0].tipo == "41"){
                        dte_referencia_exento = true;
                    }
                    if(document.getElementById("subtotal_1") != null){
                        calcularSubTotalGlobal();   
                    }

                    //buscar nc a la factura
                    var parametros2 = {"folio_referencia": $('#folio_ref').val()};
                    $.ajax({
                        type: "POST",
                        data:  parametros2,
                        headers: {
                            'apikey':'928e15a2d14d4a6292345f04960f4cc3' 
                        },
                        dataType: "json",
                        url: "Clases/DTE.php?funcion=cargarDatosNC",

                        success: function(data2) { 
                            if (data2.length > 0) {
                                //tiene refe
                                console.log("tiene rref");
                                $('#div_referencia').append('<span id="span_referencia" class="label bg-deep-orange">Tiene Nota Credito Folio: '+data2[0].folio+' Monto: '+data2[0].monto+'</span>');
                                //swal("Advertencia", "Factura tiene una nota de credito Folio: "+data2[0].folio+" Monto: "+data2[0].monto, "warning");
                                
                            }else{
                                $('#div_referencia').find('span').remove();
                            }
                        }
                    });
                                                      
                    
                }
            }
        });

    }
}


//------------------------------------------------------------------------------------------------------------------------------------------------------------------
//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< CALCULO DE DATOS >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//------------------------------------------------------------------------------------------------------------------------------------------------------------------
function calcularSubtotal(input){     

    var cantidad = 0;
    var precio = 0;
    var subtotal = 0;
    var descuento = 0;
    var recargo = 0;
    var porcentaje = 0;
    var dscrcg;
    var tipo;
    var signo;


    //Obtenemos los valores de cada input
    cantidad = $('#cantidad_'+input.name).val();
    precio = $('#precio_'+input.name).val();
    rut = $('#rut_receptor').val();

    //precio = Number(precio.replace(/[$,]+/g,""));

    //Hacemos el primer calculo basico
    subtotal = Math.round(cantidad * precio);        

    //Obtenemos los descuentos o recargos si existen, si no se calcula con 0
    dscrcg = $('#dscrcg_'+input.name).val(); 
    signo = dscrcg.slice(0, 1); // extraemos el primer caracter para saber si es negativo o un numero normal
    tipo = $("input[type='radio'][name='"+input.name+"']:checked").val(); //depende del radio seleccionado $ o %
        
    if(dscrcg == 0){
        //si el input de descuentos o recargos está en 0, no deja seleccionar el radio button y limpia errores
        $('#'+input.id).attr('checked', false);
        $("#div_dscrcg_"+input.name).removeClass("error");                    
        $("#dscrcg_"+input.name).attr('aria-invalid','false');
        $("#label_porcentaje_error_"+input.name).remove();

    }else{

        //$('#'+input.id).attr('checked', true);
        if(tipo == "$" && dscrcg != 0){

            $("#div_dscrcg_"+input.name).removeClass("error");                    
            $("#dscrcg_"+input.name).attr('aria-invalid','false');
            $("#label_porcentaje_error_"+input.name).remove();

            if(signo == "-"){
                descuento = parseInt(dscrcg.slice(1));
                subtotal = subtotal - descuento;
            }else{
                recargo = parseInt(dscrcg);
                subtotal = subtotal + recargo;
            }

        }else{

            $("#div_dscrcg_"+input.name).removeClass("error");                    
            $("#dscrcg_"+input.name).attr('aria-invalid','false');
            $("#label_porcentaje_error_"+input.name).remove();
        }

        if(tipo == "%" && dscrcg != 0){

            if(dscrcg > -101 && dscrcg < 101){

                porcentaje = subtotal * (parseInt(dscrcg) / 100);       
                subtotal = subtotal + porcentaje;
                $("#div_dscrcg_"+input.name).removeClass("error");                    
                $("#dscrcg_"+input.name).attr('aria-invalid','false');
                $("#label_porcentaje_error_"+input.name).remove();

            }else{
                if(document.getElementById("label_porcentaje_error_"+input.name) == null){

                    $("#div_dscrcg_"+input.name).addClass("error");                    
                    $("#dscrcg_"+input.name).attr('aria-invalid','true');
                    $("#div_dscrcg_group_"+input.name).append('<div><label id="label_porcentaje_error_'+input.name+'" class="error" for="dscrcg_'+input.name+'" style="display: block;">Fuera de rango</label></div>');
                }
            }
        }
    }
    //formatter.format();
    $('#subtotal_'+input.name).val(formatter.format(subtotal));
    calcularSubTotalGlobal();
} 

function calcularSubTotalGlobal(){   

    var sub = 0;
    var arraySubTotales = [];
    rut = $('#rut_receptor').val();        

    //loop throgh all the elements whose id starts with price-
    
     $('[id^=subtotal_]').each(function(){
         var subtotal = this.value;
         subtotal = Number(subtotal.replace(/[$.]+/g,""));
         arraySubTotales[sub] = subtotal;
         sub++;
     });         

     var sumaSubTotales = 0;

      for (var i = 0; i < arraySubTotales.length; i++) {
          sumaSubTotales += arraySubTotales[i]
      }

     $('#subTotalGlobal').val(formatter.format(sumaSubTotales));


     CalcularMontoNeto();     
}  

function CalcularMontoNeto(){

    var sub = 0;
    var dscrcg_global = 0; 
    var descuento = 0;
    var porcentaje = 0;
    var recargo = 0;
    var arraySubTotales = []; 
    rut = $('#rut_receptor').val();

    var monto_neto_global = $('#subTotalGlobal').val();

    monto_neto_global = Number(monto_neto_global.replace(/[$.]+/g,"")); 

    if(rut == "66666666-6"){

        monto_neto_global = (monto_neto_global / 1.19); 

    }   

     //Obtenemos los descuentos o recargos si existen, si no se calcula con 0
    dscrcg_global = $('#descuento_global').val(); 
    signo = dscrcg_global.slice(0, 1); // extraemos el primer caracter para saber si es negativo o un numero normal
    tipo = $("input[type='radio'][name='radio_global_monto']:checked").val(); //depende del radio seleccionado $ o %
        
    if(dscrcg_global == 0){
        //si el input de descuentos o recargos está en 0, no deja seleccionar el radio button y limpia errores
        $('#radio_global_monto').attr('checked', false);
        $('#radio_global_porcentaje').attr('checked', false);
        $("#div_dscrcg_global").removeClass("error");                    
        $("#descuento_global").attr('aria-invalid','false');
        $("#label_porcentaje_error_global").remove();

    }else{

        //$('#'+input.id).attr('checked', true);
        if(tipo == "$" && dscrcg_global != 0){

            $("#div_dscrcg_global").removeClass("error");                    
            $("#descuento_global").attr('aria-invalid','false');
            $("#label_porcentaje_error_global").remove();

            if(signo == "-"){
                descuento = parseInt(dscrcg_global.slice(1));
                monto_neto_global = monto_neto_global - descuento;
            }else{
                recargo = parseInt(dscrcg_global);
                monto_neto_global = monto_neto_global + recargo;
            }

        }else{

            $("#div_dscrcg_global").removeClass("error");                    
            $("#descuento_global").attr('aria-invalid','false');
            $("#label_porcentaje_error_global").remove();
        }

        if(tipo == "%" && dscrcg_global != 0){

            if(dscrcg_global > -101 && dscrcg_global < 101){

                porcentaje = monto_neto_global * (parseInt(dscrcg_global) / 100);       
                monto_neto_global = monto_neto_global + porcentaje;
                $("#div_dscrcg_global").removeClass("error");                    
                $("#descuento_global").attr('aria-invalid','false');
                $("#label_porcentaje_error_global").remove();

            }else{
                if(document.getElementById("label_porcentaje_error_global") == null){

                    $("#div_dscrcg_global").addClass("error");                    
                    $("#descuento_global").attr('aria-invalid','true');
                    $("#div_dscrcg_group_global").append('<div><label id="label_porcentaje_error_global" class="error" for="descuento_global" style="display: block;">Fuera de rango</label></div>');
                }
            }
        }
    }

    //monto_neto_global = Math.round(monto_neto_global);

    if(tipo_dte == "39"){
        monto_neto_global = monto_neto_global / 1.19;
    }

    $('#monto_neto_global').val(formatter.format(monto_neto_global));

    
        CalcularIVAyTotal(monto_neto_global);
    
}

function CalcularIVAyTotal(monto_neto_global){
   
    var iva = 0.19;
    var monto_iva = 0;
    var total = monto_neto_global;

    if(tipo_dte == "34" || tipo_doc_ref == "34" || tipo_dte == "41" || tipo_doc_ref == "41" || dte_referencia_exento == true){
         $('#iva_global').val("$0");       
    }
    // else if(tipo_dte == "39"){
    //     monto_iva = (monto_neto_global * iva) / ( 1 + iva );
    //     total = monto_neto_global;

    //     $('#iva_global').val(formatter.format(monto_iva));
    // }
    else{
        monto_iva = monto_neto_global * iva;
        total = monto_iva + monto_neto_global;

        $('#iva_global').val(formatter.format(monto_iva));
    }
    
    $('#total_global').val(formatter.format(total));
}

//------------------------------------------------------------------------------------------------------------------------------------------------------------------
//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< AGREGAR CAMPOS EXTRA >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//------------------------------------------------------------------------------------------------------------------------------------------------------------------

function AgregarDetalle(){

    filaDetalle = filaDetalle + 1;
    //console.log(filaDetalle);

     
            var detalle ='<div id="div_fila_detalle_'+filaDetalle+'" class="row clearfix">';
    
    if(tipo_dte == "39" || tipo_dte == "41"){}else{
         detalle = detalle +'<div class="col-sm-1">'+
                                '<div class="form-group">'+
                                   ' <div class="form-line">'+
                                        '<small> Código</small>'+
                                        '<input id="codigo_'+filaDetalle+'" name="'+filaDetalle+'" type="text" class="form-control" placeholder="--" />'+
                                    '</div>'+
                                '</div>'+
                            '</div>';
                        }
    if(tipo_dte == "39" || tipo_dte == "41"){
        detalle = detalle + '<div class="col-sm-4">'+
                                '<div class="input-group">'+
                                    '<div class="form-line">'+
                                        '<small> Item</small>'+
                                        '<input id="item_'+filaDetalle+'" name="'+filaDetalle+'" type="text" class="form-control" placeholder="Item" maxlength="79" required />'+
                                    '</div>'+
                                    '<span class="input-group-addon">'+
                                        '<i class="material-icons" id="busqueda_item_'+ filaDetalle +'" name="'+ filaDetalle +'" onclick="modalBusqueda(this)" style="font-size: 25px;">search</i>'+
                                    '</span>'+
                                '</div>'+
                            '</div>';
    }else{
        detalle = detalle + '<div class="col-sm-3">'+
                                '<div class="input-group">'+
                                    '<div class="form-line">'+
                                        '<small> Item</small>'+
                                        '<input id="item_'+filaDetalle+'" name="'+filaDetalle+'" type="text" class="form-control" placeholder="Item" maxlength="79" required />'+
                                    '</div>'+
                                    '<span class="input-group-addon">'+
                                        '<i class="material-icons" id="busqueda_item_'+ filaDetalle +'" name="'+ filaDetalle +'" onclick="modalBusqueda(this)" style="font-size: 25px;">search</i>'+
                                    '</span>'+
                                '</div>'+
                            '</div>';
    }
        detalle = detalle + '<div class="col-sm-1">'+
                                '<div class="form-group">'+
                                    '<div class="form-line">'+
                                        '<small> Cantidad</small>'+
                                        '<input id="cantidad_'+filaDetalle+'" name="'+filaDetalle+'" type="number" min="0" class="form-control" placeholder="1" required onchange="calcularSubtotal(this)" />'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                            '<div class="col-sm-2">'+
                                '<div class="form-group">'+
                                    '<div class="form-line">'+
                                        '<small> Precio</small>'+
                                        '<input id="precio_'+filaDetalle+'" name="'+filaDetalle+'" type="number" min="0" class="form-control" placeholder="$ 0" required onchange="calcularSubtotal(this)"/>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+                              
                            '<div class="col-sm-2">'+
                                '<div id="div_dscrcg_group_'+filaDetalle+'" name="'+filaDetalle+'" class="form-group">'+
                                    '<div id="div_dscrcg_'+filaDetalle+'" name="'+filaDetalle+'" class="form-line">'+
                                        '<small> Descuento/Recargo</small>'+
                                        '<input id="dscrcg_'+filaDetalle+'" name="'+filaDetalle+'" type="number" class="form-control" aria-invalid="false" placeholder="0" />'+
                                        '<!--<div class="help-info">% Entre -100 y 100</div>-->'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                            '<div class="col-sm-1">'+
                                '<small> Tipo</small>'+
                                '<div class="demo-radio-button">'+
                                    '<input name="'+filaDetalle+'" type="radio" id="radio_detalle_monto_'+filaDetalle+'" class="radio-col-blue" value="$" onclick="calcularSubtotal(this)"/>'+
                                    '<label for="radio_detalle_monto_'+filaDetalle+'">$</label>'+
                                    '<input name="'+filaDetalle+'" type="radio" id="radio_detalle_porcentaje_'+filaDetalle+'" class="radio-col-blue" value="%" onclick="calcularSubtotal(this)"/>'+
                                    '<label for="radio_detalle_porcentaje_'+filaDetalle+'">%</label>'+
                                '</div>'+
                            '</div>'+
                            '<div class="col-sm-2">'+
                                '<div class="form-group">'+
                                    '<div class="form-line">'+
                                        '<small> SubTotal</small>'+
                                        '<input id="subtotal_'+filaDetalle+'" name="'+filaDetalle+'" type="text" class="form-control" placeholder="$ 0" onchange="calcularSubTotalGlobal(this)" />'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>';

                        $("#div_body_1").append(detalle);
} 

function EliminarDetalle(){
    if(filaDetalle > 1){
        $("#div_fila_detalle_"+filaDetalle).remove();
        filaDetalle = filaDetalle - 1;
     }else{
        swal("Error", "Debe haber almenos un Item", "error");

     }
} 

//------------------------------------------------------------------------------------------------------------------------------------------------------------------
//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< AGREGAR REGERENCIAS >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//------------------------------------------------------------------------------------------------------------------------------------------------------------------

function AgregarReferencias(){

    var referencia_add;

    $("#ul_button_agregar_referencia").remove();

    $("#div_buttom_referencia").append(''+
        '<ul id="ul_button_eliminar_referencia" class="header-dropdown m-r--5">'+                                  
            '<a role="button" onclick="EliminarReferencias()">'+
                '<i class="material-icons" id="button_agregar_referencias">remove_circle_outline</i>'+
                    '<label for="button_agregar_referencias">ELIMINAR REFERENCIA</label>'+                
            '</a>'+                 
        '</ul>');

    if(tipo_dte == "39"){
        referencia_add = '<div id="div_fila_referencia" class="row clearfix">'+
                            '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">'+
                                '<div class="card">'+
                                    '<div class="header">'+
                                        '<h2>REFERENCIAS DEL DOCUMENTO</h2>'+                                             
                                    '</div>'+
                                    '<div class="body">'+                                                           
                                        '<div class="row clearfix">'+
                                            '<div class="col-sm-3">'+
                                                '<div class="form-line">'+ 
                                                    '<small> Tipo de documento</small>'+                                       
                                                    '<select id="tipo_doc_ref" class="form-control show-tick">'+                                                        
                                                        '<option value="801"> Orden de compra </option>'+
                                                        '<option value="52"> Guia de Despacho Electrónica </option>'+
                                                        '<option value="39"> Boleta Electrónica </option>'+
                                                        '<option value="41"> Boleta Exenta Electrónica </option>'+
                                                    '</select>'+                                       
                                                '</div>'+
                                            '</div>'+
                                            '<div class="col-sm-2">'+
                                                '<div class="form-group">'+
                                                    '<div class="form-line">'+
                                                        '<small> Folio</small>'+
                                                        '<input id="folio_ref" type="text" class="form-control" placeholder="00000"/>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+                                            
                                            '<div class="col-sm-6">'+
                                                '<div class="form-group">'+
                                                    '<div class="form-line">'+
                                                        '<small> Razón referencia</small>'+
                                                        '<input id="razon_ref" type="text" class="form-control" placeholder="Ejemplo: Trazabilidad" />'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+                               
                                        '</div>'+                          
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>';

    } else{

        referencia_add = '<div id="div_fila_referencia" class="row clearfix">'+
                        '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">'+
                            '<div class="card">'+
                                '<div class="header">'+
                                    '<h2>REFERENCIAS DEL DOCUMENTO</h2>'+                                             
                                '</div>'+
                                '<div class="body">'+                            
                                    '<div class="row clearfix">'+
                                         '<div class="col-sm-3">'+
                                            '<div class="form-line">'+ 
                                                '<small> Tipo de documento</small>'+                                       
                                                    '<select id="tipo_doc_ref" class="form-control show-tick">';
                                                        
        if(tipo_dte == "33" || tipo_dte == "34"){
            referencia_add = referencia_add + '<option value="801"> Orden de compra </option>';
        }
        else{
            referencia_add = referencia_add + '<option value="33"> Factura Electrónica </option>'+
                                              '<option value="34"> Factura Exenta Electrónica </option>'+
                                              '<option value="39"> Boleta Electrónica </option>';
        }
                                                                                                                                                 
        referencia_add = referencia_add + '</select>'+                                       
                                        '</div>'+
                                    '</div>'+
                                '<div class="col-sm-2">'+
                                    '<div class="form-group">'+
                                        '<div class="form-line">'+
                                            '<small> Folio</small>'+
                                            '<input id="folio_ref" type="text" class="form-control" placeholder="00000" onchange="cargarReferencia()" />'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-sm-2">'+
                                     '<small> Fecha de emisión</small>'+
                                    '<div class="form-group">'+
                                        '<div class="form-line" id="container_fecha_ref">'+
                                            '<input id="fecha_ref" type="text" class="form-control" placeholder="AAAA-MM-DD"/>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-sm-5">'+
                                    '<div class="form-group">'+
                                        '<div class="form-line">'+
                                            '<small> Observaciones</small>'+
                                            '<input id="observacion_ref" type="text" class="form-control" placeholder="" />'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+                               
                            '</div>'+                          
                        '</div>'+
                    '</div>'+
                '</div>'+
            '</div>';

    }

    $("#div_referencias").append(referencia_add);

    $('#container_fecha_ref input').datepicker({
        autoclose: true,
        container: '#container_fecha_ref',
        format: 'yyyy-mm-dd',
        language: 'es'
        
    });

    $('#tipo_doc_ref').selectpicker('refresh');

}

function EliminarReferencias(){    
        $("#div_fila_referencia").remove();
        $("#ul_button_eliminar_referencia").remove();

         $("#div_buttom_referencia").append(''+
        '<ul id="ul_button_agregar_referencia" class="header-dropdown m-r--5">'+                                  
            '<a role="button" onclick="AgregarReferencias()">'+
                '<i class="material-icons" id="button_agregar_referencias">add_circle_outline</i>'+
                    '<label for="button_agregar_referencias">AGREGAR REFERENCIA</label>'+                
            '</a>'+                 
        '</ul>');        
}

//------------------------------------------------------------------------------------------------------------------------------------------------------------------
//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< BUSQUEDA PRODUCTOS >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//------------------------------------------------------------------------------------------------------------------------------------------------------------------

function modalBusqueda(input){
                //abrir modal
                $('#busquedaModal').modal('show');

                var id_input = input.id;
                var id_input_busqueda = id_input.substring(9);
                $('#id_input_descripcion').val(id_input_busqueda);
                



}

 function enter(e){
     
    //See notes about 'which' and 'key'
    if (e.keyCode == 13) {
        //DEFINIR TIPO DE BUSQUEDA
        
        var texto_busqueda =  $('#input_busqueda_producto').val();

        if (texto_busqueda.length != 0 ) {

            var id_input_busqueda = $('#id_input_descripcion').val(); // id del input donde se debe escribir la descripcion

            if( $('#checkbox_tipo_busqueda').prop('checked') ) {


            //BUSQUEDA POR DESCRIPCION
                 var parametros = {
                    "descripcion": texto_busqueda
                            
                    };     
            $.ajax({
                        type: "POST",
                        data:  parametros,
                        headers: {
                            'apikey':'928e15a2d14d4a6292345f04960f4cc3' 
                        },
                        dataType: "json",
                        url: "Clases/DTE.php?funcion=consultarProductoDescripcionPSQL",

                        success: function(data) {  
                        console.log(data);    
                        $("#lista_busqueda_producto").empty(); 

                       
                        //mostrar descripcion en la lista
                        
                        if (data.length != 0) {
                            for (var i = 0; i < data.length; i++) {
                              $("#lista_busqueda_producto").append('<button type="button" value="'+data[i]+'" onclick="seleccionarBusqueda(this)" class="list-group-item">'+data[i]+'</button>');
                            }

                            //Mostrar lista
                            $("#lista_busqueda_producto").css("display", "block");
                        }else{
                        
                         swal("Error !", "No se encontraron resultados", "warning");
                        $("#lista_busqueda_producto").empty(); 
                        }
                      
                        //$('#'+id_input_descripcion).val(data[0]);

                    }
                    });

            }else{
            //BUSQUEDA POR CODIGO
            var parametros = {
                    "codigo": texto_busqueda
                            
                    };     
            $.ajax({
                        type: "POST",
                        data:  parametros,
                        headers: {
                            'apikey':'928e15a2d14d4a6292345f04960f4cc3' 
                        },
                        dataType: "json",
                        url: "Clases/DTE.php?funcion=consultarProductoCodigoPSQL",

                        success: function(data) { 
                        console.log(data);
                        $("#lista_busqueda_producto").empty(); 

                        var id_input_descripcion = $('#id_input_descripcion').val();
                        //mostrar descripcion en la lista
                        
                        if (data.length != 0) {
                            for (var i = 0; i < data.length; i++) {
                              $("#lista_busqueda_producto").append('<button type="button" value="'+data[i]+'" onclick="seleccionarBusqueda(this)" class="list-group-item">'+data[i]+'</button>');
                            }

                            //Mostrar lista
                            $("#lista_busqueda_producto").css("display", "block");
                        }else{
                         swal("Error !", "No se encontraron resultados", "warning");
                        $("#lista_busqueda_producto").empty(); 
                        }


                    }
                    });

                
            }
        }else{
            alert("No ha ingresado texto para busqueda");
        }
       

        
        
        
       //iniciarSesion();
       
    }
}

function seleccionarBusqueda(input_seleccionado){
    //insertar descripcion seleccionada en el input del item
    var id_input_descripcion = $('#id_input_descripcion').val();
    $("#"+id_input_descripcion).val(input_seleccionado.value);
     $('#busquedaModal').modal('hide');
     $("#lista_busqueda_producto").empty();
     $('#input_busqueda_producto').val('');    

}  

//------------------------------------------------------------------------------------------------------------------------------------------------------------------
//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< RELLENAR NC BOLETA >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//------------------------------------------------------------------------------------------------------------------------------------------------------------------

function cargarDatosBoleta(){

    //var switch_boleta =$('#switch_boleta').val();

    if($('#switch_boleta').prop('checked') ){
        
        $('#rut_receptor').val('66666666-6');
        $('#razon_social_receptor').val('Contacto Anonimo');
        $('#input_giro_receptor').val('Sin Datos');
        $('#input_direccion_receptor').val('Sin Datos');
        $('#comuna_receptor').val('Sin Datos');

        $('#rut_receptor').attr('disabled',true);
        $('#razon_social_receptor').attr('disabled',true);
        $('#input_giro_receptor').attr('disabled',true);
        $('#input_direccion_receptor').attr('disabled',true);
        $('#comuna_receptor').attr('disabled',true);


    }else{

        $('#rut_receptor').val('');
        $('#razon_social_receptor').val('');
        $('#input_giro_receptor').val('');
        $('#input_direccion_receptor').val('');
        $('#comuna_receptor').val('');

        $('#rut_receptor').attr('disabled',false);
        $('#razon_social_receptor').attr('disabled',false);
        $('#input_giro_receptor').attr('disabled',false);
        $('#input_direccion_receptor').attr('disabled',false);
        $('#comuna_receptor').attr('disabled',false);
    }
    
}





