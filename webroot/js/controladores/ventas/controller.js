/**
 * Created by jorge on 1/15/19.
 */

var app = angular.module('contalapp');
app.controller('ventasIndex',function ($scope,kConstant,$http,$window,$filter,$timeout,ventasByTerm) {
    $scope.estados = [{
        id:0,
           descripcion:"Acciones"
        },
        {
            id:1,
            descripcion:"Anular"
        },
        {
            id:2,
            descripcion:"Pagar"
        },
        {
            id:3,
            descripcion:"Imprimir"
        },
    ];
    $scope.selected = $scope.estados[0];

    $scope.accion = function (label,id,nro_factura,id_cliente,estado,id_usuario) {

        //alert("30374"+" - "+id);
        $scope.selected[id] = $scope.estados[0];
        if(label.descripcion=="Pagar"){
            if(estado=='Credito' || estado=='Parcial'){
                $window.location.href = kConstant.url+"cobros/add/"+nro_factura+"/"+id_cliente;
            }else{
                alert("Acción no valida");
                return;
            }
        }

        if(label.descripcion=="Imprimir"){
           $scope.imprimir_ticket(id);
        }

        if(label.descripcion=="Anular"){

           // alert(id_usuario);
            if(id_usuario==53 || id_usuario==56){
                console.log("ok");
            }else{
                swal("Info!", "No tienes permiso para devolver la consignación.", "warning");
                return;
            }

            swal({
                title: "Deseas Anular el registro # "+id+"?",
                text: "Atencion. al anular el registro ya no podras recuperarlo!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Si, eliminar!",
                closeOnConfirm: false
            }, function () {
                $http.post(kConstant.url+"ventas/deleteEntity/"+id).
                then(function(response){
                    console.log(response.data);
                    if(response.data.message=="pendiente"){
                        swal("Atencion!", "No se puede anular la compra. posee una deuda pendiente.", "warning");
                        return;
                    }
                    if(response.data.message=="ok"){
                        swal("Eliminado!", "El registro se elimino correctamente.", "success");
                        $timeout(function () {
                            $window.location.href = kConstant.url+"ventas/index/"
                        }, 1000);
                    }
                },function (response) {
                    console.log(response);
                });
            });
        }
    }

    $scope.venta='';
    $scope.ventas = function(compraValue){
        console.log(compraValue);
        var futureEmpresas = ventasByTerm.async(compraValue);
        return futureEmpresas.then(function (response){
            return response.data.ventas;
        });
    };
    $scope.onSelect = function ($model) {
        var id = $model.id

        if($model.id=="00"){
            $("#buscar").modal();
            $timeout(function () {
                $("#filtrar").focus();
            }, 500);
        }else{
            $window.location.href = kConstant.url+"ventas/view/"+id;
        }

    }

    $("#search").focus();

});

app.controller('ventasIndex',function ($scope,kConstant,$http,$window,$filter,$timeout,ventasByTerm) {
    $scope.estados = [{
        id:0,
        descripcion:"Acciones"
         },
        {
            id:1,
            descripcion:"Anular"
        },
        {
            id:2,
            descripcion:"Pagar"
        },
        {
            id:3,
            descripcion:"Imprimir"
        }];
    $scope.selected = $scope.estados[0];

    $scope.accion = function (label,id,nro_factura,id_cliente,estado,id_usuario) {
        console.log(label);
        $scope.selected[id] = $scope.estados[0];
        if(label.descripcion=="Pagar"){
            if(estado=='Credito' || estado=='Parcial'){
                $window.location.href = kConstant.url+"cobros/add/"+nro_factura+"/"+id_cliente;
            }else{
                alert("Acción no valida");
                return;
            }

        }

        if(label.descripcion=="Imprimir"){
            $scope.imprimir_ticket(id);
        }

        if(label.descripcion=="Anular"){

            if(id_usuario==53 || id_usuario==56){
                console.log("ok");
            }else{
                swal("Info!", "No tienes permiso para anular la venta.", "warning");
                return;
            }

            swal({
                title: "Deseas Anular el registro # "+id+"?",
                text: "Atencion. al anular el registro ya no podras recuperarlo!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Si, eliminar!",
                closeOnConfirm: false
            }, function () {
                $http.post(kConstant.url+"ventas/deleteEntity/"+id).
                then(function(response){
                    console.log(response.data);
                    if(response.data.message=="pendiente"){
                        swal("Atencion!", "No se puede anular la compra. posee una deuda pendiente.", "warning");
                        return;
                    }
                    if(response.data.message=="ok"){
                        swal("Eliminado!", "El registro se elimino correctamente.", "success");
                        $timeout(function () {
                            $window.location.href = kConstant.url+"ventas/index/"
                        }, 1000);
                    }
                },function (response) {
                    console.log(response);
                });
            });
        }
    }

    $scope.imprimir_ticket = function (idVenta) {
        var id_venta = idVenta;
        window.open(
            kConstant.url+"ventas/ticketInterno/"+id_venta,
            '_blank' // <- This is what makes it open in a new window.
        );
    }

    $scope.venta='';
    $scope.ventas = function(compraValue){
        console.log(compraValue);
        var futureEmpresas = ventasByTerm.async(compraValue);
        return futureEmpresas.then(function (response){
            return response.data.ventas;
        });
    };

    $scope.digitoVerificador = function (ruc) {
        var baseMax = 11;
        ruc = typeof ruc === 'string' ? ruc : ruc.toString()
        var resultado = 0
        var index = 0;
        for (var rucIndex = ruc.length - 1; rucIndex >= 0; rucIndex--) {
            resultado += parseInt(ruc[rucIndex]) * (index + 2);
            var r = resultado % baseMax
            index++;
        };
        var verificador = r > 1 ? baseMax - r : 0
        return verificador
    }

    $scope.onSelect = function ($model) {
        var id = $model.id

        if($model.id=="00"){
            $("#buscar").modal();
            $timeout(function () {
                $("#filtrar").focus();
            }, 500);
        }else{
            $window.location.href = kConstant.url+"ventas/view/"+id;
        }


    }

    $("#search").focus();

});
app.controller('ventasPos',function ($scope,kConstant,$http,$window,$filter,$timeout,ventasByTerm,clientesByTerm) {

    String.prototype.replaceAll = function(str1, str2, ignore)
    {
        return this.replace(new RegExp(str1.replace(/([\/\,\!\\\^\$\{\}\[\]\(\)\.\*\+\?\|\<\>\-\&])/g,"\\$&"),(ignore?"gi":"g")),(typeof(str2)=="string")?str2.replace(/\$/g,"$$$$"):str2);
    }


        $scope.visible = "none";
        $scope.visibleCheque = "none";
        $scope.set_tipo_pago = null;

    $scope.getCuentasCorrientes = function(){

        var id_cuenta  = $("#cuenta").val();
        $http.get(kConstant.url+"CuentasFondos/getEntityById/"+id_cuenta).
        then(function(response){
            var valor = response.data.cuentas[0];
            console.log(valor);
            $("#ctacte").val(valor.id_cuenta_corriente);
            $scope.set_tipo_pago = valor.tipo;
            if(valor.tipo=="efectivo"){
                $scope.visible = "none";
                $scope.visibleCheque = "none";
            }else{
                if(valor.tipo=="cheque"){
                    $scope.visible = "block";
                    $scope.visibleCheque = "block";
                }else{
                    $scope.visible = "block";
                    $scope.visibleCheque = "none";
                }
            }

        });

    }
    $( "#cuenta" ).change(function() {
        $scope.getCuentasCorrientes();
    });

    $scope.getCuentasCorrientes();

    $scope.estados = [
        {
        id:0,
        descripcion:"Acciones"
         },
        {
            id:1,
            descripcion:"Modificar"
        },

        {
            id:2,
            descripcion:"Quitar"
        }
    ];
    $scope.selectedEstado = $scope.estados[0];

    $scope.estadoPago = [
        {
            id:0,
            descripcion:"Acciones"
        },
        {
            id:0,
            descripcion:"Quitar"
        }
    ];
    $scope.selectedEstado = $scope.estadoPago[0];


    $scope.setIdFila = null;
    $scope.accion = function (label,id,producto,index) {
        console.log(producto);
        $scope.setIdFila = index;
        if(label.descripcion=="Modificar"){
            $("#producto-descripcion").val(producto.descripcion);

            var cantidad = producto.cantidad;
            var precio = numeral(producto.precio).format('0,0.[00]');
            precio = precio.replaceAll(".","_");
            precio = precio.replaceAll(",",".");
            precio = precio.replaceAll("_",",");
            $("#precio-producto").val(precio);
            $("#cantidad-producto").val(cantidad);
            $("#form-change").modal();
            setTimeout(function(){ $( "#precio-producto" ).focus(); }, 500);
        }
        if(label.descripcion=="Quitar"){
            $scope.removeRow(id);
        }

    }

    $scope.cambiarPrecio =function(){
        if($("#precio-producto").val()=="" || $("#precio-producto").val()==null){
            toastr.error('Debes ingresar el precio.','Notificación!');
            $( "#precio-producto" ).focus();
            return;
        }

        var precio = $("#precio-producto").val();
        precio = precio.replaceAll(".","",precio);
        var cantidad = $("#cantidad-producto").val();

        $scope.addProductos[$scope.setIdFila].precio = precio;
        $scope.addProductos[$scope.setIdFila].cantidad = cantidad;
        $scope.sumatoria();
        $("#form-change").modal('hide');

    }

    $scope.accionEstado = function (label,id) {
        console.log(label);
        if(label.descripcion=="Quitar"){
            $scope.removeRowCuentaFondo(id);
        }

    }

    $scope.removeRowCuentaFondo = function(id){
        $scope.formas.splice( id, 1 );
        $scope.sumatoriaForma();
    }

    $scope.formatDate = function(date) {

        var d = new Date(date || Date.now()),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();

        if (month.length < 2) month = '0' + month;
        if (day.length < 2) day = '0' + day;

        return [year,month,day].join('-');
    }

    $scope.formatDateDMY = function(date) {
        var d = new Date(date || Date.now()),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();

        if (month.length < 2) month = '0' + month;
        if (day.length < 2) day = '0' + day;

        return [day,month,year].join('/');
    }


    var date = new Date();
    var primerDia = new Date(date.getFullYear(), date.getMonth(), 1);
    var ultimoDia = new Date(date.getFullYear(), date.getMonth() + 1, 0);

    $('#fecha').val($scope.formatDateDMY(date));
    $('#vencimiento').val($scope.formatDateDMY(date));

    $scope.termino = [{
        field: "contado",
        title: "contado"
    }, {
        field: "credito",
        title: "credito"
    }];
    $scope.selected = $scope.termino[0];

    $scope.cliente='';
    $scope.clientes = function(clienteValue){

        var futureClientes = clientesByTerm.async(clienteValue);
        return futureClientes.then(function (response){
            return response.data.clientes;
        });
    };

    $scope.digitoVerificador = function (ruc) {
        var baseMax = 11;
        ruc = typeof ruc === 'string' ? ruc : ruc.toString()
        var resultado = 0
        var index = 0;
        for (var rucIndex = ruc.length - 1; rucIndex >= 0; rucIndex--) {
            resultado += parseInt(ruc[rucIndex]) * (index + 2);
            var r = resultado % baseMax
            index++;
        };
        var verificador = r > 1 ? baseMax - r : 0
        return verificador
    }

    $scope.onSelectCliente = function($item,$model){
       
        if($model.id=="00"){

            $scope.detalles = [];
            $scope.q = null;
            $scope.q = $( "#cliente" ).val();

            if(isNaN($scope.q)){

                $("#form-cliente").modal();
                var nombre  = $( "#cliente" ).val();
                $( "#descripcion" ).val(nombre.trim() );
                setTimeout(function(){ $( "#documento" ).focus(); }, 500);

                }else{
                 HoldOn.open({
                    theme:'sk-circle',
                    message:"<strong>Esperando respuesta de integralix.com...</strong>"
                });
                /*console.log("###################");
                console.log("https://app.integralix.net/cedulas/buscar.php?cedula="+$scope.q);
                console.log("###################");*/
                $http.get("https://app.integralix.net/cedulas/buscar.php?cedula="+$scope.q).
                then(function(response){
                    HoldOn.close();
                    console.log(response.data[0]);
                    var cliente = response.data[0];
                    //$scope.detalles = response.data;
                    $("#form-cliente").modal();
                    console.log("@@@@@@@@@@@@@@@@");
                    console.log(cliente);
                    if(cliente==null){
                        $scope.clienteAdd.descripcion = "";
                        $scope.clienteAdd.documento = $scope.q;
                        $scope.clienteAdd.dv = $scope.digitoVerificador($scope.q);
                        $scope.clienteAdd.email = "";
                        $scope.clienteAdd.telefono = "";
                        $scope.clienteAdd.direccion = "";
                        setTimeout(function(){ $( "#descripcion" ).focus(); }, 500);
                    }else {
                        var nombre  = cliente.nombre+" "+cliente.apellido;
                        //$( "#descripcion" ).val(nombre.trim() );
                        $scope.clienteAdd.descripcion = nombre.trim();
                        $scope.clienteAdd.documento = $scope.q;
                        $scope.clienteAdd.dv = $scope.digitoVerificador($scope.q);
                        $scope.clienteAdd.email = "";
                        $scope.clienteAdd.telefono = "";
                        $scope.clienteAdd.direccion = cliente.direccion;
                        setTimeout(function(){ $( "#documento" ).focus(); }, 500);
                    }
                });
            }
        }
    }


    $scope.verificarCliente = function(){

        if($("#descripcion").val()==""){
            toastr.error('Debes ingresar la descripcion.','Notificación!');
            $( "#descripcion" ).focus();
            return false;
        }

        if($("#documento").val()==""){
            toastr.error('Debes ingresar el Documento.','Notificación!');
            $( "#documento" ).focus();
            return false;
        }

        return true;
    }

    $scope.guardarCliente = function(){
        if($scope.verificarCliente()){


            $http.get(kConstant.url+"clientes/verificarRepetido/"+$scope.clienteAdd.documento).
            then(function(response) {
                console.log(response.data.estado);
                if (response.data.estado == 1) {
                    toastr.error('El nro de documento ya existe.', 'Notificación!');
                    $("#documento").focus();
                    return false;
                } else {


                    $scope.clienteAdd.id_empresa = $('#empresa').val();
                    $scope.clienteAdd.descripcion = $("#descripcion").val();
                    if($("#fecha-nacimiento").val()==null || $("#fecha-nacimiento").val()==""){
                        $scope.clienteAdd.fecha_nacimiento = null;
                    }else{
                        var fecha_nacimiento = $("#fecha-nacimiento").val();
                        fecha_nacimiento = fecha_nacimiento.split("/");
                        fecha_nacimiento = fecha_nacimiento[2]+'-'+fecha_nacimiento[1]+'-'+fecha_nacimiento[0];

                        $scope.clienteAdd.fecha_nacimiento = fecha_nacimiento;
                    }


                    if($scope.clienteAdd.dv==null || $scope.clienteAdd.dv==""){
                        $scope.clienteAdd.dv = 99;
                    }

                    console.log("##############");
                    console.log($scope.clienteAdd);
                    console.log("##############");
                    $http.post(kConstant.url+"clientes/addEntityModel",$scope.clienteAdd).
                    then(function(response){
                          console.log(response.data);
                        if(response.data.mensaje="ok"){
                            $http.get("https://app.integralix.net/codigoQR/generar_codigo.php?dato="+response.data.cliente.id).
                            then(function(response2){
                                    console.log(response2.data);
                                    console.log("@@@@@@@");
                                    toastr.success('Se guardo correctamente el Cliente.','Notificación!');
                                    $("#form-cliente").modal('hide');
                                    $scope.cleanClienteAdd();
                                    $scope.cliente = response.data.cliente;
                            });


                        }else{
                            toastr.error('No se puedieron guardar los datos.','Notificación!');
                        }
                    },function (error) {
                        console.log(error);
                    });
                }

            });

        }

    }

    $scope.productos = [];
    $scope.addProductos = [];
    $scope.getProductos = function(){
        $http.get(kConstant.url+"productos/getAll").
        then(function(response){
            //console.log(response.data);
            $scope.productos = response.data.productos;
        })
    };
    $scope.getProductos();

    $scope.openProducto = function(){
        $("#form-producto").modal();
        setTimeout(function(){ $( "#buscar" ).focus(); }, 500);
    }

    $scope.openForma = function(){
        $("#form-forma").modal();
        setTimeout(function(){ $( "#monto" ).focus(); }, 500);
    }

    $scope.removeRow = function(producto){
        var index = -1;
        var comArr = eval( $scope.addProductos);
        for( var i = 0; i < comArr.length; i++ ) {
            //console.log(eval(producto)+' - '+eval(comArr[i].producto.id));
            if( eval(comArr[i].id_producto) === eval(producto)) {
                //console.log('ID: '+i);
                index = i;
                break;
            }
        }

        $scope.addProductos.splice( index, 1 );
        $scope.stock.splice( index, 1 );
        $scope.sumatoria();
    };

    $scope.clienteAdd ={
        id:0,
        id_empresa:0,
        descripcion:"",
        email:"",
        documento:"",
        dv:"",
        telefono:"",
        direccion:"",
        estado:1
    }

    $scope.cleanClienteAdd = function(){
        $scope.clienteAdd ={
            id:0,
            id_empresa:0,
            descripcion:"",
            email:"",
            documento:"",
            dv:"",
            telefono:"",
            direccion:"",
            fecha_nacimiento:"",
            lugar_entrega:"",
            estado:1
        }
    }

    $scope.buscarProducto = function(){
        var producto = $("#buscar").val();
        $http.get(kConstant.url+"productos/buscarProductos/"+producto).
        then(function(response){
            //console.log(response.data);
            $scope.productos = response.data.productos;
        })
    }
    $scope.setProducto = function(producto){
        console.log(producto);
        var p = {
            id:0,
            id_producto:producto.id,
            descripcion:producto.descripcion,
            cantidad:1,
            precio:producto.precio_venta,
            estado:1,
            ticket:0,
            nro_block:0,
            id_iva:producto.iva
        }
        $scope.addProductos.push(p);
        $("#form-producto").modal('hide');
        $scope.sumatoria();
        $("#buscar").val("");
    }

    $scope.totalSuma = 0;
    $scope.sumatoria = function () {
        var index = -1;
        var comArr = eval( $scope.addProductos);
        var total = 0;
        for( var i = 0; i < comArr.length; i++ ) {
            total = total + new Number(comArr[i].precio*comArr[i].cantidad);
        }
        total = Math.round(total);
        $scope.totalSuma = total;

    };

    $scope.totalForma = 0;
    $scope.formas = [];
    $scope.sumatoriaForma = function () {
        var index = -1;
        var comArr = eval( $scope.formas);
        var total = 0;
        for( var i = 0; i < comArr.length; i++ ) {
            total = total + new Number(comArr[i].debe);
        }
        total = Math.round(total);
        $scope.totalForma = total;

    };

    $scope.agregarForma = function(){

        if($scope.set_tipo_pago!="efectivo"){
            if($("#nro-comprobante").val()==null || $("#nro-comprobante").val()=="" ||  $("#nro-comprobante").val()==0){
                toastr.error('Debes ingresar nro. de Comprobante.','Notificación!');
                $( "#nro-comprobante" ).focus();
                return false;
            }
        }

        if($("#monto").val()==null || $("#monto").val()=="" ||  $("#monto").val()==0){
            toastr.error('Debes ingresar el monto.','Notificación!');
            $( "#monto" ).focus();
            return false;
        }
        if($scope.totalSuma<=0){
            toastr.error('Debes ingresar al menos un producto.','Notificación!');
            $( "#monto" ).focus();
            return false;
        }

        var select = $("#cuenta").val();
        var descrip = $( "#cuenta option:selected" ).text();

        var fecha = $("#vencimiento").val();
        fecha = fecha.split("/");
        fecha = fecha[2]+'-'+fecha[1]+'-'+fecha[0];


        var fecha_hoy = $("#fecha").val();
        fecha_hoy = fecha_hoy.split("/");
        fecha_hoy = fecha_hoy[2]+'-'+fecha_hoy[1]+'-'+fecha_hoy[0];

        var monto = $("#monto").val();
        monto = monto.replaceAll(".","",monto);
        var documento = null;

        var cuenta_corriente = null;
        if($scope.set_tipo_pago=="efectivo"){
            cuenta_corriente = null;
            fecha = null;
            documento = "00";
        }else{
            cuenta_corriente = $("#ctacte").val();
            documento = $("#nro-comprobante").val();
        }

        var c = {

            id_cuenta_fondo :select,
            descripcion: descrip,
            nro_cheque:documento,
            id_banco:14,
            descrip_banco:"sin datos",
            nro_vaucher:"sin datos",
            cuenta_bancaria:"sin datos",
            id_cuenta_corriente:cuenta_corriente,
            documento:documento,
            fecha : fecha,
            debe:monto,
            haber:0,
            id_empresa: $('#empresa').val(),
            estado:1
        }
        $scope.formas.push(c);

        var forma_string = descrip;
        forma_string = forma_string.toLowerCase();
        var x = {
            id:0,
            fecha:fecha_hoy,
            descripcion:descrip,
            forma:forma_string,
            documento:"00",
            monto:monto
        }
        $scope.formasPagos.push(x);

        $("#monto").val("");
        $("#nro-comprobante").val("");
        $scope.visible="none";
        $scope.visibleCheque="none";
        $("#cuenta").val($("#cuenta option:first").val());
        $scope.sumatoriaForma();
        $("#form-forma").modal('hide');

    }

    $("#cliente").focus();


    $scope.venta = {
        id:0,
        fecha:null,
        id_empresa:0,
        id_costo:0,
        documento:"",
        id_moneda:5,
        id_local:null,
        id_deposito:null,
        timbrado:0,
        tipo_cambio:1,
        condicion:"",
        clasificacion:"mercaderias",
        pago:"pagado",
        tipo_venta:"venta",
        regimen:"no",
        sector:"privado",
        total:0,
        imponible5:0,
        iva_5:0,
        imponible10:0,
        iva_10:0,
        exenta:0,
        estado:1,
        detalles_ventas:$scope.addProductos

    }

    $scope.stock = [];
    $scope.formasPagos = [];
    $scope.cajas = [];
    $scope.vencimientoVenta = [];
    $scope.guardarVenta = function () {
        $scope.stock = [];
        $scope.cajas = [];
        $scope.vencimientoVenta = [];
        if($scope.cliente==null){
            toastr.error('Debes ingresar el cliente.','Notificación!');
            $( "#cliente" ).focus();
            return false;
        }

        if($scope.cliente.id===undefined){
            toastr.error('Debes ingresar el cliente.','Notificación!');
            $( "#cliente" ).focus();
            return false;
        }

        if($scope.cliente.id=="00"){
            toastr.error('Debes ingresar el cliente.','Notificación!');
            $( "#cliente" ).focus();
            return false;
        }

        if($scope.totalSuma<=0){
            toastr.error('Debes ingresar al menos un producto.','Notificación!');
            $( "#monto" ).focus();
            return false;
        }

        if($scope.selected.field=="contado"){
            if($scope.totalForma<=0){
                toastr.error('Debes ingresar al menos una forma de pago.','Notificación!');
                $("#form-forma").modal();
                setTimeout(function(){ $( "#monto" ).focus(); }, 500);
                return false;
            }

            if($scope.totalSuma!=$scope.totalForma){
                toastr.error('El monto del pago debe ser igual a la venta.','Notificación!');
                $( "#monto" ).focus();
                return false;
            }

        }




        var fecha = $("#fecha").val();
        fecha = fecha.split("/");
        fecha = fecha[2]+'-'+fecha[1]+'-'+fecha[0];

        for(var i=0; i < $scope.addProductos.length;i++){
            //console.log($scope.addProductos[i].precio);
            var precio = $scope.addProductos[i].precio;
            var id_producto = $scope.addProductos[i].id_producto;
            var id_iva = $scope.addProductos[i].id_iva;
            var salida = $scope.addProductos[i].cantidad;

            var s = {
                fecha:fecha,
                id_empresa:$('#empresa').val(),
                precio_venta: precio,
                id_cliente:$scope.cliente.id,
                id_producto:id_producto,
                iva:id_iva,
                id_costo:26,
                id_deposito:$('#deposito').val(),
                id_local:$('#local').val(),
                id_moneda:$('#monedas').val(),
                tipo_cambio:1,
                entrada:0,
                salida:salida,
                confirmado:"no",
                estado:1
            };
            $scope.stock.push(s);
        }

        var cuenta = null;
        var total_venta = 0;
        if ($scope.selected.field == "contado") {
            cuenta = $('#cuentacajacontado').val();
            total_venta = $scope.totalSuma;
        } else {
            total_venta = 0;
            cuenta = $('#cuentacajacredito').val();

            var c ={
                idDetalleCredito:1,
                fecha:fecha,
                entrega:0,
                nro_cuota:1,
                vencimiento : fecha,
                id_cliente:$scope.cliente.id,
                tipo_credito:"meses",
                plazo:1,
                total:$scope.totalSuma,
                pago_monto:0,
                id_empresa:$('#empresa').val(),
                tipo_vencimiento:"ventas",
                tipo_cambio:1,
                estado:1,
                monto : $scope.totalSuma,
                total:$scope.totalSuma
            };
            $scope.vencimientoVenta.push(c);

        }

        var caj = {
            fecha: fecha,
            documento: $('#factura-nro').val(),
            id_cliente: $scope.cliente.id,
            id_cajero: $('#id-usuario').val(),
            id_venta: null,
            id_empresa: $('#empresa').val(),
            id_moneda: $('#monedas').val(),
            id_apertura:$('#apertura').val(),
            estado: 1,
            id_cuenta_caja: cuenta,
            monto: total_venta,
            movimiento_cuentas_fondos: $scope.formas,
            formas_pagos: $scope.formasPagos
        }

        $scope.cajas.push(caj);
        $scope.venta.cajas = $scope.cajas;
        $scope.venta.id_empresa = $('#empresa').val();
        $scope.venta.id_costo = 26;
        $scope.venta.fecha = fecha;
        $scope.venta.documento = $('#factura-nro').val();
        $scope.venta.id_moneda = $('#monedas').val();
        $scope.venta.id_cliente = $scope.cliente.id;
        $scope.venta.id_local = $('#local').val();
        $scope.venta.id_deposito = $('#deposito').val();
        $scope.venta.timbrado = $('#timbrado').val();
        $scope.venta.tipo_cambio = 1;
        $scope.venta.regimen = "no";
        $scope.venta.sector = "privado";
        $scope.venta.descripcion_factura = "ninguna";
        $scope.venta.vuelto= ($scope.totalForma - $scope.totalSuma);
        $scope.venta.tipo_venta = 'venta';
        $scope.venta.tipo_asiento = "directa";
        $scope.venta.tipo_documento = "factura";
        $scope.venta.condicion = $scope.selected.field;
        $scope.venta.total = $scope.totalSuma;
        $scope.venta.movimiento_cuentas_fondos = $scope.formas;
        $scope.venta.stock = $scope.stock;
        $scope.venta.vencimientos_ventas = $scope.vencimientoVenta;

        HoldOn.open({
            theme: 'sk-circle',
            message: "<strong>Esperando respuesta del servidor...</strong>"
        });

        console.log($scope.venta);
        $http.post(kConstant.url + "ventas/addEntityRapida", $scope.venta).
        then(function (response) {
           HoldOn.close();
            console.log(response.data);
            if(response.data=="" || response.data==null){
                toastr.error('No se puede guardar esta venta. Verifique su Stock.','Notificación!');
                $( "#cliente" ).focus();
                return false;
            }

            if(response.data.mensaje=="ok"){
                console.log("############");
                console.log(response.data.venta);
                window.open(
                    kConstant.url+"ventas/ticketInterno/"+response.data.venta.id,
                    '_blank' // <- This is what makes it open in a new window.
                );
                $window.location.href = kConstant.url+"ventas/index";
            }else{
                toastr.error('No se puede guardar esta venta.','Notificación!');
                $( "#cliente" ).focus();
                return false;
            }
        });

    }

    $scope.imprimir_ticket = function (idVenta) {
        var id_venta = idVenta;
        window.open(
            kConstant.url+"ventas/ticketInterno/"+id_venta,
            '_blank' // <- This is what makes it open in a new window.
        );
    }

});

function format(input)
{
    var num = input.value.replace(/\./g,'');
    if(!isNaN(num)){
        num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
        num = num.split('').reverse().join('').replace(/^[\.]/,'');
        input.value = num;
    }
    else{
        input.value = input.value.replace(/[^\d\.]*/g,'');
    }

}








