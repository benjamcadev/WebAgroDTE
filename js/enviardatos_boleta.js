var tipo_dte;
var tipo_doc_ref;

//al final no supe como obtener desde el input el atributo creado, asi que hice este webeo, AMEN
$("#cantidad_1").change(function(){ tipo_dte = $(this).data("tipodte"); });
$("#precio_1").change(function(){ tipo_dte = $(this).data("tipodte"); });
$("#tipo_doc_ref").change(function(){ tipo_doc_ref = $("#tipo_doc_ref").val();});


function EnviarDatos(){

//------------------------------------------------------------------------------------------------------------------------------------------------------------------
//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< RESCATAR DATOS >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//------------------------------------------------------------------------------------------------------------------------------------------------------------------
    

	//venta    
    var ind_servicio =$('#ind_servicio').val();
    var fecha_emision =$('#fecha_emision').val();    

	//receptor
	var rut_receptor ="66666666-6";	    
    
    //detalle
    //inicializar variables
    var numero_codigo = 0;
    var numero_item = 0;
    var numero_cantidad = 0;
    var numero_precio = 0;
    var numero_dscrcg = 0;
    var numero_radio_dscrcg = 1;
    var numero_subtotal = 0;
    var array_codigo = []; 
    var array_item = [];
    var array_cantidad = [];
    var array_precio = [];
    var array_dscrcg_pct = [];
    var array_dscrcg_monto = [];
    var array_radio_dscrcg = [];
    var array_tipo_dscrcg = [];
    var array_subtotal = [];
    var array_signo_dscrcg = [];

    //llenado por ciclos por detalle
    $('[id^=codigo_]').each(function(){
         var codigo_detalle = this.value;
         array_codigo[numero_codigo] = codigo_detalle;
         numero_codigo++;
     });

    $('[id^=item_]').each(function(){
         var item_detalle = this.value;
         array_item[numero_item] = item_detalle;
         numero_item++;
     });

    $('[id^=cantidad_]').each(function(){
         var cantidad_detalle = this.value;
         array_cantidad[numero_cantidad] = cantidad_detalle;
         numero_cantidad++;
     });

    $('[id^=precio_]').each(function(){
         var precio_detalle = this.value;
         array_precio[numero_precio] = precio_detalle;
         numero_precio++;
     });

     $('[id^=radio_detalle_]').each(function(){
         var dscrcg_radio_detalle = $("input[type='radio'][name='"+numero_radio_dscrcg+"']:checked").val();
         if (dscrcg_radio_detalle == undefined){
            dscrcg_radio_detalle = "";
         }
         array_radio_dscrcg[numero_radio_dscrcg - 1] = dscrcg_radio_detalle;
         numero_radio_dscrcg++;
     });

//caso por si descuentos viene en $ o %
    $('[id^=dscrcg_]').each(function(){

        var dscrcg_detalle = this.value;
        array_signo_dscrcg[numero_dscrcg] = dscrcg_detalle.slice(0, 1);

        if(array_radio_dscrcg[numero_dscrcg] == "$"){
            // si vien en $ solo se agrega al array montos, y pct queda en vacio, para mantener los lugares ordenados
            array_dscrcg_monto[numero_dscrcg] = dscrcg_detalle;
            array_dscrcg_pct[numero_dscrcg] = "";

        }else{
            // si viene en % convertir el pct en monto para tener ambos datos y se meten a sus array correspondientes
            var dscrcg_pct = array_subtotal[numero_dscrcg] * (dscrcg_detalle / 100);
            array_dscrcg_monto[numero_dscrcg] = dscrcg_pct;
            array_dscrcg_pct[numero_dscrcg] = dscrcg_detalle;
        }         
         numero_dscrcg++;
     });   

    $('[id^=subtotal_]').each(function(){
         var subtotal_detalle = this.value;
         subtotal_detalle = Number(subtotal_detalle.replace(/[$.]+/g,""));
         array_subtotal[numero_subtotal] = subtotal_detalle;
         numero_subtotal++;
     });

    //Referencias

    var folio_ref;
    var observacion_ref;
    var tipo_doc_ref;

    if(document.getElementById("div_fila_referencia") != null){

        tipo_doc_ref = $("#tipo_doc_ref option:selected").val();
        folio_ref = $("#folio_ref").val();               
        observacion_ref = $("#razon_ref").val();
        
    }

    //Totales

    var subTotalGlobal = 0;
    var monto_neto_global = 0;
    var total_global = 0;
    var descuento_global = 0;
    var iva_global = 0;

    subTotalGlobal = $("#subTotalGlobal").val();
    monto_neto_global = $("#monto_neto_global").val();   
    total_global = $("#total_global").val();
    descuento_global = $("#descuento_global").val();    

    var radio_dscrcg_global = $("input[type='radio'][name='radio_global_monto']:checked").val(); 
    var signo_dscrcg_global = descuento_global.slice(0, 1); 

    subTotalGlobal = Number(subTotalGlobal.replace(/[$.]+/g,""));
    monto_neto_global = Number(monto_neto_global.replace(/[$.]+/g,""));    
    total_global = Number(total_global.replace(/[$.]+/g,""));

    if($('#iva_global').val() == "$0"){
        iva_global = 0;
    }else{
        iva_global = $('#iva_global').val();
        iva_global = Number(iva_global.replace(/[$.]+/g,""));
    }
      

    //if (radio_dscrcg_global == "%"){ descuento_global = subTotalGlobal * (descuento_global / 100); } 

    //iniciar variables del string
    var tipo_monto;
    var tipo_tasa;

//------------------------------------------------------------------------------------------------------------------------------------------------------------------
//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< REVISAR DATOS VACIOS >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//------------------------------------------------------------------------------------------------------------------------------------------------------------------

    var flag_item_true =0;
    var flag_item_false =0;
    var referencia = true;
    var venta = false;
    var compra = false;
    var transporte = false;   

    for (var x = 0; x < array_item.length; x++) {
        if(array_item[x] == "" || array_cantidad[x] == 0 || array_precio[x] == 0 || array_subtotal[x] == 0){
            flag_item_false ++ ;
        }      
    }
   
    if(tipo_doc_ref != 0 && folio_ref != "" && observacion_ref != ""){
        referencia = true;
    }else{
        referencia = false;
    }
    
    if(ind_servicio != "0"){
        venta = true;
    }


//------------------------------------------------------------------------------------------------------------------------------------------------------------------
//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< ARMAR ENVIO >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//------------------------------------------------------------------------------------------------------------------------------------------------------------------

    // ingresa solo si los campos principales están con datos
    if(fecha_emision != "" && venta == true && flag_item_false == 0 && referencia == true){
        
        // deshabilita el boton enviar 
        $('#btn_enviar').attr('disabled', true);        

         // Comezar a armar variable
        var parametros ='{'+
    '        "response":["FOLIO"],'+
    '        "dte":{'+
    '            "Encabezado": {'+
    '                "IdDoc": {'+
    '                    "TipoDTE": '+tipo_dte+','+
    '                    "Folio": 0,'+
    '                    "FchEmis": "'+fecha_emision+'",'+
    '                    "IndServicio": '+ind_servicio+''+
    '                },'+
    '                "Emisor": {'+
    '                    "RUTEmisor": "76958430-7",'+
    '                    "RznSocEmisor": "IMP COMERCIALIZADORA Y DIST AGROPLASTIC LTDA",'+
    '                    "GiroEmisor": "VENTA AL POR MAYOR NO ESPECIALIZADA",'+
    '                    "DirOrigen": "VICENTE ZORRILLA 835",'+
    '                    "CmnaOrigen": "La Serena",'+
    '                    "CdgSIISucur": "74236823"'+
    '                },'+
    '                "Receptor": {'+
    '                    "RUTRecep": "'+rut_receptor+'"'+
    '                },';                      
                     

        parametros = parametros + ' "Totales": {';

        //SI IVA SE ENCUENTRA CON MONTO 0, ENTONCES ES UN DTE EXENTO
        // SE CAMBIA MONTO NETO POR MONTO EXENTO
        if($('#iva_global').val() == "$0"){
            tipo_monto = "MntExe";
            iva_global = 0;            

        }else{ 
            tipo_monto = "MntNeto";            

        }       

        if(monto_neto_global != ""){ parametros = parametros + '"'+ tipo_monto +'": '+ monto_neto_global+',';}        
        if (iva_global != 0){parametros = parametros + '"IVA": '+ iva_global+',';}
        if(total_global != ""){ parametros = parametros + '"MntTotal": '+ total_global+'';}

        parametros = parametros + '}},';

        //detalle

        parametros = parametros + '"Detalle": [';

        //CICLO PARA RELLENAR EL DETALLE 
        for (var i = 0; i < array_item.length; i++) {

            parametros = parametros + '{'+
'                    "NroLinDet": ' + (i+1) + ',';
           
// console.log(i);
//             if(document.getElementById("codigo_"+(i+1)) != null){
//                 parametros = parametros + '"CdgItem":{'+ 
// '                    "TpoCodigo":"INT1",'+
// '                    "VlrCodigo": "'+ array_codigo[i] +'"},' ;
//             }
             if(tipo_dte == "41"){
                parametros = parametros +'"IndExe": '+ (i+1) + ',';
            }

            parametros = parametros +
'                    "NmbItem": "' + array_item[i] + '",'+
'                    "QtyItem": "' + array_cantidad[i] + '",'+
'                    "PrcItem": "' + array_precio[i] + '",';

            if(array_radio_dscrcg[i] != ""){

                if(array_signo_dscrcg[i] == "-"){                    
                    if(array_radio_dscrcg[i] == "%"){
                        var descuento = array_dscrcg_pct[i];
                        descuento = descuento.slice(1);
                        parametros = parametros + '"DescuentoPct": "' + descuento + '",';
                    }
                    if(array_radio_dscrcg[i] == "$"){
                        var descuento = array_dscrcg_monto[i];
                        descuento = descuento.slice(1);
                        parametros = parametros + '"DescuentoMonto": "' + descuento + '",';
                    }
                }else{
                    if(array_radio_dscrcg[i] == "%"){
                        parametros = parametros + '"RecargoPct": "' + array_dscrcg_pct[i] + '",';
                    }
                    if(array_radio_dscrcg[i] == "$"){
                        parametros = parametros + '"RecargoMonto": "' + array_dscrcg_monto[i] + '",';
                    }
                }
            }
                   
            parametros = parametros +'"MontoItem": ' + array_subtotal[i] + '},';            
        }

        parametros = parametros.slice(0,-1);
        parametros = parametros +'],';
        

        if(document.getElementById("div_fila_referencia") != null){

            parametros = parametros +'"Referencia": {'+
    '                "NroLinRef": 1,'+
    '                "TpoDocRef": '+ tipo_doc_ref +','+
    '                "FolioRef": "'+ folio_ref +'",'+        
                    '"RazonRef": "'+ observacion_ref +'"},';
        }

        if(radio_dscrcg_global != undefined){

            var tipo_mov = "";
            if(signo_dscrcg_global == "-"){
                descuento_global = descuento_global.slice(1); 
                tipo_mov = "D"; 
            }else{ 
                tipo_mov = "R"; 
            }

            parametros = parametros +'"DscRcgGlobal": {'+
    '                "NroLinDR": 1,'+
    '                "TpoMov": "'+ tipo_mov +'",'+
    '                "TpoValor": "'+ radio_dscrcg_global +'",'+
    '                "ValorDR": "'+ descuento_global +'"},';

        }
        parametros = parametros.slice(0,-1);
        parametros = parametros +'}}';


        parametros = JSON.parse(parametros);

        console.log(parametros);

//------------------------------------------------------------------------------------------------------------------------------------------------------------------
//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< REALIZAR ENVIO >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//------------------------------------------------------------------------------------------------------------------------------------------------------------------

        var documento;
        
        if(tipo_dte == "39"){ documento = "BOLETA ELECTRÓNICA" }
        if(tipo_dte == "41"){ documento = "BOLETA EXENTA ELECTRÓNICA" }        

        $.ajax({
            type: "POST",
            data:  parametros,
            headers: {
                'apikey':'928e15a2d14d4a6292345f04960f4cc3' 
            },
            dataType: "json",
            url: "Clases/DTE.php?funcion=emitirDTE",

            beforeSend: function(){
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
            },

            success: function(data) {  

                swal({
                    title:"¡Documento Emitido!", 
                    text:"Se ha generado "+documento+" con folio : "+data['FOLIO'], 
                    type:"success",
                    showConfirmButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Ver',
                    cancelButtonText: 'Cerrar',
                    closeOnConfirm: true,
                    closeOnCancel: true
                    },
                    function(flag){
                        if(flag){
                            crearPDF(data['FOLIO'],tipo_dte);
                            //location.reload();
                        }else{
                            location.reload();
                        }

                    }
                );

                console.log(data['FOLIO']);   
            }
        });

//------------------------------------------------------------------------------------------------------------------------------------------------------------------
//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< ERRORES >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    }       
    else if(venta == false){
         swal("Error", "Seleccione tipo de venta", "error");
    } 
    else if(fecha_emision == ""){
         swal("Error", "Seleccione fecha de emision", "error");
    }  
     else if(flag_item_false > 0){
         swal("Error", "Faltan datos importantes del item", "error");
    }
     else if(referencia == false){
        swal("Error", "Complete el recuadro de referencias", "error");
    }
    else{
        swal("Error", "Faltan datos importantes", "error");
    } 
}

//------------------------------------------------------------------------------------------------------------------------------------------------------------------
//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< CARGAR PDF >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//------------------------------------------------------------------------------------------------------------------------------------------------------------------
function crearPDF(folio,tipo_dte){
    folio_global = folio;
    tipo_dte_global = tipo_dte;
    $("#pdf_nombre").text("");
    $("#xml_nombre").text("");
    $("#pdf_nombre").text("DTE_"+tipo_dte+"_"+folio+".pdf");
    $("#xml_nombre").text("DTE_"+tipo_dte+"_"+folio+".xml");


    var parametros = {
        "folio": folio, 
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
                            }else{
                                $("#canvas-pdf").css("width","100%");
                                $("#canvas-pdf").css("height","100%");
                                $("#canvas-pdf").css("margin-left","0%");
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
                            });
                        });
                    },
                    function (reason) {
                        // PDF loading error
                        console.error(reason);
                    });                   
                }
            }        
        }
    });
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
                                     beforeSend: function(){
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
                                            text: "Enviando correo ...",
                                            showConfirmButton: false,
                                            html: true,
                                            showCancelButton: false,
                                            closeOnConfirm: false,
                                            showLoaderOnConfirm: true
                                            //timer: 1800,           
                                        });
                                    },
                                    success:function(data){

                                        //swal.close();
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


      $('#pdfModal').on('hidden.bs.modal', function () {
        location.reload();
    });
