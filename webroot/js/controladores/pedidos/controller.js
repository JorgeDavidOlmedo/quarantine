/**
 * Created by jorge on 1/15/19.
 */

var app = angular.module('contalapp');
app.controller('pedidosIndex',function ($scope,kConstant,$http,$window,$filter,$timeout,pedidosByTerm,facturasByTerm) {

    $scope.agregarPedido = function(){
        $window.location.href = kConstant.url+"pedido-ventas/add/"
    }

    $scope.abrirLugar = function(entidad){
        window.open(
            entidad.lugar_entrega,
            '_blank' // <- This is what makes it open in a new window.
        );
    }

    $scope.verFactura = function(entidad){
        $http.post(kConstant.url+"Ventas/getVentaForDocumento/"+entidad.factura).
        then(function(response){
            console.log(response.data.ventas[0].id);
            $window.location.href = kConstant.url+"ventas/view/"+response.data.ventas[0].id;
        });
    }
    $scope.factura='';
    $scope.facturas = function(value) {
       // console.log(value);
        var futureClientes = facturasByTerm.async(value);
        return futureClientes.then(function (response) {
            return response.data.pedidos;
        });
    }

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
            descripcion:"Generar Venta"
        },
        {
            id:4,
            descripcion:"Modificar"
        },
        {
            id:5,
            descripcion:"Copiar"
        },
        {
            id:6,
            descripcion:"Imprimir"
        }
    ];
    $scope.selected = $scope.estados[0];

    $scope.estadoPedidos = [
        {
        field: "confirmado",
        title: "Confirmado"
        },
        {
        field: "en_camino",
        title: "En Camino"
    }, {
        field: "entregado",
        title: "Entregado"
    }, {
        field: "retirado",
        title: "Retirado"
    },
    {
        field: "maquina_limpia",
        title: "Maquina Limpia"
    }];
    $scope.selectedPedido = $scope.estadoPedidos[0];


    $scope.hasChanged = function() {

        console.log($scope.setIdPedido);

    }


    $scope.factura = null;

    $scope.confirmarCambio2 = function(){

        if($scope.selectedPedido.field=="retirado"){

           // if($("#consignacion").val()=="si"){

                console.log($scope.factura2);

            var factura = 0;
            console.log($scope.factura2);
            if($scope.factura2==null || $scope.factura==""){
                factura = $("#consignacion").val();
            }else{
                if($scope.factura2.id===undefined){
                    factura = 0;
                }else{
                    factura = $scope.factura2.documento;
                }
            }

            if(factura=="si"){
                if($scope.factura==null || $scope.factura==""){
                    alert("Debes ingresar el Nro. de Factura.");
                    $scope.factura=null;
                    $("#factura2").focus();
                    return;
                }

                if($scope.factura===undefined){
                    alert("Debes ingresar el Nro. de Factura.");
                    $scope.factura=null;
                    $("#factura2").focus();
                    return;
                }
                if($scope.factura.id===undefined){
                    alert("Debes ingresar el Nro. de Factura.");
                    $scope.factura=null;
                    $("#factura2").focus();
                    return;
                }
            }
                swal({
                    title: "Estas seguro que deseas cambiar el estado del registro # "+$scope.setIdPedido+"?",
                    text: "Atencion!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Si, cambiar!",
                    closeOnConfirm: true
                }, function () {
                    HoldOn.open({
                        theme: 'sk-circle',
                        message: "<strong>Esperando respuesta del servidor...</strong>"
                    });

                    //alert($scope.factura);

                    $http.post(kConstant.url+"PedidoVentas/cambiarEstado2/"+$scope.setIdPedido+"/"+$scope.selectedPedido.field+"/"+factura).
                    then(function(response){
                        console.log(response.data);
                        HoldOn.close();
                        $window.location.href = kConstant.url+"PedidoVentas/view/"+$scope.setIdPedido;
                    },function (response) {
                        console.log(response);
                    });
                });


           /* }else{
                $scope.confirmarCambio();
            }*/

        }

    }

    $scope.confirmarCambio = function(){

        if($scope.selectedPedido.field=="entregado"){
            if($scope.factura==null || $scope.factura==""){
                alert("Debes ingresar el Nro. de Factura.");
                $scope.factura=null;
                $("#factura").focus();
                return;
            }

            if($scope.factura===undefined){
                alert("Debes ingresar el Nro. de Factura.");
                $scope.factura=null;
                $("#factura").focus();
                return;
            }
            if($scope.factura.id===undefined){
                alert("Debes ingresar el Nro. de Factura.");
                $scope.factura=null;
                $("#factura").focus();
                return;
            }
            console.log($scope.factura.documento);
        }
        swal({
            title: "Estas seguro que deseas cambiar el estado del registro # "+$scope.setIdPedido+"?",
            text: "Atencion!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Si, cambiar!",
            closeOnConfirm: true
        }, function () {
            HoldOn.open({
                theme: 'sk-circle',
                message: "<strong>Esperando respuesta del servidor...</strong>"
            });

            //alert($scope.factura);
            var factura = 0;
            console.log($scope.factura);
            if($scope.factura==null || $scope.factura==""){
                factura = 0;
            }else{
                if($scope.factura.id===undefined){
                    factura = 0;
                }else{
                    factura = $scope.factura.documento;
                }
            }


            $http.post(kConstant.url+"PedidoVentas/cambiarEstado/"+$scope.setIdPedido+"/"+$scope.selectedPedido.field+"/"+factura).
            then(function(response){
                console.log(response.data);
                HoldOn.close();
                $window.location.href = kConstant.url+"PedidoVentas/view/"+$scope.setIdPedido;
            },function (response) {
                console.log(response);
            });
        });
    }

    $scope.visibleconsig = "none";
    $( "#consignacion" ).change(function() {
        var cons = $( "#consignacion" ).val();
        setTimeout(function(){

            $scope.$apply(function (){
                if(cons=="no"){
                    $scope.visibleconsig = "none";
                }else{
                    if(cons=="no_consumio"){
                        $scope.visibleconsig = "none";
                    }else{
                        $scope.visibleconsig = "block";

                        setTimeout(function(){

                            $("#factura2").focus();
                        }, 500);
                    }



                }

            });
        }, 500);


    });

    $scope.hasChangedView = function() {
        console.log($scope.selectedPedido.field+" - "+$scope.setIdPedido);
        if($scope.selectedPedido.field=="entregado"){
               $("#form-factura").modal();
            setTimeout(function(){ $( "#factura" ).focus(); }, 500);
        }else{

            if($scope.selectedPedido.field=="retirado"){
                $("#form-retirado").modal();
                setTimeout(function(){
                    $("#consignacion").val("no");
                    $scope.visibleconsig = "none";
                    $( "#factura" ).focus();
                    }, 500);
            }else{
                $scope.confirmarCambio();
            }

        }

    }

    $scope.setEstado = function(estado_pedido,id){
        $scope.setIdPedido = id;
        //alert(estado_pedido);
        if(estado_pedido=="confirmado"){
            $scope.selectedPedido = $scope.estadoPedidos[0];
        }

        if(estado_pedido=="en_camino"){
            $scope.selectedPedido = $scope.estadoPedidos[1];
        }

        if(estado_pedido=="entregado"){
            $scope.selectedPedido = $scope.estadoPedidos[2];
        }

        if(estado_pedido=="retirado"){
            $scope.selectedPedido = $scope.estadoPedidos[3];
        }

        if(estado_pedido=="maquina_limpia"){
            $scope.selectedPedido = $scope.estadoPedidos[4];
        }
    }

    $scope.cambiarEstado = function(){
        console.log($scope.selectedPedido.field+" - "+$scope.setIdPedido);
        HoldOn.open({
            theme: 'sk-circle',
            message: "<strong>Esperando respuesta del servidor...</strong>"
        });
        $http.get(kConstant.url+"PedidoVentas/cambiarEstado/"+$scope.setIdPedido+"/"+$scope.selectedPedido.field).
        then(function(response){
            console.log(response.data);
            HoldOn.close();
            $window.location.href = kConstant.url+"PedidoVentas/index/";
        });
    }

    $scope.setIdPedido = null;
    $scope.accion = function (label,id,estado_pedido) {
        console.log(label);
       // $scope.selected[id] = $scope.estados[0];
        if(label.id==2){
            alert("Accion no disponible");
        }

        if(label.id==6){
            window.open(
                kConstant.url+"ventas/ticketPedidoPDF/"+id,
                '_blank' // <- This is what makes it open in a new window.
            );
        }

        if(label.id==4){
            $window.location.href = kConstant.url+"PedidoVentas/edit/"+id;
        }

        if(label.id==3){
            $scope.setIdPedido = id;
            console.log(estado_pedido);
            if(estado_pedido=="confirmado"){
                $scope.selectedPedido = $scope.estadoPedidos[0];
            }

            if(estado_pedido=="en_camino"){
                $scope.selectedPedido = $scope.estadoPedidos[1];
            }

            if(estado_pedido=="entregado"){
                $scope.selectedPedido = $scope.estadoPedidos[2];
            }

            if(estado_pedido=="retirado"){
                $scope.selectedPedido = $scope.estadoPedidos[3];
            }

            if(estado_pedido=="maquina_limpia"){
                $scope.selectedPedido = $scope.estadoPedidos[4];
            }

            $("#form-cambio").modal();
        }

        if(label.descripcion=="Anular"){

            swal({
                title: "Deseas Anular el registro # "+id+"?",
                text: "Atencion. al anular el registro ya no podras recuperarlo!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Si, eliminar!",
                closeOnConfirm: true
            }, function () {
                $http.post(kConstant.url+"PedidoVentas/deleteEntity/"+id).
                then(function(response){
                    console.log(response.data);
                    if(response.data.message=="ok"){
                        swal("Eliminado!", "El registro se elimino correctamente.", "success");
                        $timeout(function () {
                            $window.location.href = kConstant.url+"PedidoVentas/index/"
                        }, 1000);
                    }else{
                        swal("Info!", response.data.message, "warning");
                    }
                },function (response) {
                    console.log(response);
                });
            });
        }

        if(label.descripcion=="Copiar"){
            $window.location.href = kConstant.url+"PedidoVentas/copy/"+id;
        }
    }

    $scope.pedido='';
    $scope.pedidos = function(value){
        var futureEmpresas = pedidosByTerm.async(value);
        return futureEmpresas.then(function (response){
            console.log(response.data);
            return response.data.pedidos;
        });
    };
    $scope.onSelect = function ($model) {
        var id = $model.id

        if($model.id=="00"){

        }else{
            $window.location.href = kConstant.url+"pedido-ventas/view/"+id;
        }

    }

    $("#search").focus();

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
    $('#fecha_a_retirar').val($scope.formatDateDMY(date));
    $('#desde').val($scope.formatDateDMY(primerDia));
    $('#hasta').val($scope.formatDateDMY(ultimoDia));


    $('#confirmado').change(function() {
        setTimeout(function(){ $scope.getPedidos(); }, 500);
    });

    $('#entregado').change(function() {
        setTimeout(function(){ $scope.getPedidos(); }, 500);
    });

    $('#retirado').change(function() {
        setTimeout(function(){ $scope.getPedidos(); }, 500);
    });

    $('#hoy').change(function() {
        if ($('#hoy').is(":checked"))
        {
            $('#desde').val($scope.formatDateDMY(date));
            $('#hasta').val($scope.formatDateDMY(date));
            setTimeout(function(){ $scope.getPedidos(); }, 500);
        }else{
            $('#desde').val($scope.formatDateDMY(primerDia));
            $('#hasta').val($scope.formatDateDMY(ultimoDia));
            setTimeout(function(){ $scope.getPedidos(); }, 500);
        }
    });

    $scope.pedidos_ventas = [];
    $scope.getPedidos = function () {
        var confirmado = 0;
        if ($('#confirmado').is(":checked"))
        {
            confirmado=1
        }

        var entregado = 0;
        if ($('#entregado').is(":checked"))
        {
            entregado=1
        }

        var retirado = 0;
        if ($('#retirado').is(":checked"))
        {
            retirado=1
        }

        //console.log(confirmado+" - "+entregado+" - "+retirado);
        var desde = $("#desde").val();
        desde = desde.split("/");
        desde = desde[2]+'-'+desde[1]+'-'+desde[0];

        var hasta = $("#hasta").val();
        hasta = hasta.split("/");
        hasta = hasta[2]+'-'+hasta[1]+'-'+hasta[0];

        var cliente = $("#buscador").val();
        //console.log("CLIENTE 1: "+cliente);
        if(cliente=="" || cliente===undefined || cliente==null){
            cliente=0;
        }
        //console.log( "PedidoVentas/getPedidos/"+desde+"/"+hasta+"/"+cliente+"/"+confirmado+"/"+entregado+"/"+retirado);
        $http.get(kConstant.url+"PedidoVentas/getPedidos/"+desde+"/"+hasta+"/"+cliente+"/"+confirmado+"/"+entregado+"/"+retirado).
        then(function(response){
            //console.log(response.data);
            $scope.pedidos_ventas = response.data.pedidos;
        });
    }

    $scope.getPedidos();
    
    $scope.verPedido = function (id) {
        $window.location.href = kConstant.url+"PedidoVentas/view/"+id;
    }


    $('#desde').on('dp.change', function(e){
        $scope.getPedidos();
    });

    $('#hasta').on('dp.change', function(e){
        $scope.getPedidos();
    });

});
app.controller('pedidosAdd',function ($scope,kConstant,$http,$window,$filter,$timeout,pedidosByTerm,clientesByTerm) {

    String.prototype.replaceAll = function(str1, str2, ignore)
    {
        return this.replace(new RegExp(str1.replace(/([\/\,\!\\\^\$\{\}\[\]\(\)\.\*\+\?\|\<\>\-\&])/g,"\\$&"),(ignore?"gi":"g")),(typeof(str2)=="string")?str2.replace(/\$/g,"$$$$"):str2);
    }


    $scope.abrirLugar = function(){
        window.open(
            $("#lugar-entrega").val(),
            '_blank' // <- This is what makes it open in a new window.
        );
    }
    $scope.cliente='';
    $scope.clientes = function(clienteValue){

        var futureClientes = clientesByTerm.async(clienteValue);
        return futureClientes.then(function (response){
            return response.data.clientes;
        });
    };

    $scope.onSelectCliente = function($item,$model){
        if($model.id=="00"){
            $("#form-cliente").modal();
            var nombre  = $( "#facturar-a" ).val();
            $( "#descripcion" ).val(nombre.trim() );
            setTimeout(function(){ $( "#documento" ).focus(); }, 500);
        }
        console.log("######");
        console.log($model);
        if($model.descripcion=="" || $model.descripcion==null){
            $( "#cliente" ).val("Ocasional");
        }else{
            $( "#cliente" ).val($model.descripcion);
        }

        if($model.email=="" || $model.email==null){
            $( "#correo" ).val("Sin datos");
        }else{
            $( "#correo" ).val($model.email);
        }

        if($model.telefono=="" || $model.telefono==null){
            $( "#telefono" ).val("Sin datos");
        }else{
            $( "#telefono" ).val($model.telefono);
        }

        if($model.lugar_entrega=="" || $model.lugar_entrega==null){
            $( "#lugar-entrega" ).val("Sin datos");
        }else{
            $( "#lugar-entrega" ).val($model.lugar_entrega);
        }
        setTimeout(function(){ $( "#senha" ).focus(); }, 500);
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

                    if($scope.clienteAdd.dv==null || $scope.clienteAdd.dv==""){
                        $scope.clienteAdd.dv = 99;
                    }

                    if($("#fecha-nacimiento").val()==null || $("#fecha-nacimiento").val()==""){
                        $scope.clienteAdd.fecha_nacimiento = null;
                    }else{
                        var fecha_nacimiento = $("#fecha-nacimiento").val();
                        fecha_nacimiento = fecha_nacimiento.split("/");
                        fecha_nacimiento = fecha_nacimiento[2]+'-'+fecha_nacimiento[1]+'-'+fecha_nacimiento[0];
                        $scope.clienteAdd.fecha_nacimiento = fecha_nacimiento;
                    }

                    console.log("###############");
                    console.log($scope.clienteAdd);
                    console.log("###############");
                    $http.post(kConstant.url+"clientes/addEntityModel",$scope.clienteAdd).
                    then(function(response){
                        console.log(response.data);
                        if(response.data.mensaje="ok"){
                            toastr.success('Se guardo correctamente el Cliente.','Notificación!');
                            $("#form-cliente").modal('hide');
                            $scope.cleanClienteAdd();
                            $scope.cliente = response.data.cliente;
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
    $('#fecha_a_retirar').val($scope.formatDateDMY(date));
    $("#facturar-a").focus();

    $scope.estadoPedidos = [
        {
        field: "confirmado",
        title: "Confirmado"
        },{
        field: "en_camino",
        title: "En Camino"
    }, {
        field: "entregado",
        title: "Entregado"
    }, {
        field: "retirado",
        title: "Retirado"
    },
    {
        field: "maquina_limpia",
        title: "Maquina Limpia"
    }];
    $scope.selectedPedido = $scope.estadoPedidos[0];


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

    $scope.setIdFila = null;
    $scope.accion = function (label,id,producto,index) {
        console.log(producto);
        $scope.setIdFila = index;
        //$scope.selected[producto.id] = $scope.estados[0];
        if(label.descripcion=="Modificar"){
            $("#producto-descripcion").val(producto.descripcion);

            var precio = numeral(producto.precio).format('0,0.[00]');
            precio = precio.replaceAll(".","_");
            precio = precio.replaceAll(",",".");
            precio = precio.replaceAll("_",",");
            $("#precio-producto").val(precio);
            $("#cantidad-producto").val(producto.cantidad);
            $("#form-change").modal();
            setTimeout(function(){ $( "#precio-producto" ).focus(); }, 500);
        }
        if(label.descripcion=="Quitar"){
            $scope.removeRow(id);
        }

    }


    $scope.accionConsig = function (label,id,producto,index) {
        console.log(producto);
        //alert(index);
        $scope.setIdFila = index;
        if(label.descripcion=="Modificar"){
            $("#producto-descripcion2").val(producto.descripcion);

            var precio = numeral(producto.precio).format('0,0.[00]');
            precio = precio.replaceAll(".","_");
            precio = precio.replaceAll(",",".");
            precio = precio.replaceAll("_",",");
            $("#precio-producto2").val(precio);
            $("#cantidad-producto2").val(producto.cantidad);
            $("#form-changeConsig").modal();
            setTimeout(function(){ $( "#precio-producto" ).focus(); }, 500);
        }
        if(label.descripcion=="Quitar"){
            $scope.removeRowConsig(id);
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
        $scope.addProductos[$scope.setIdFila].precio = precio;
        $scope.addProductos[$scope.setIdFila].cantidad = $("#cantidad-producto").val();
        $scope.sumatoria();
        $("#form-change").modal('hide');

    }


    $scope.cambiarPrecioConsig =function(){
        if($("#precio-producto2").val()=="" || $("#precio-producto2").val()==null){
            toastr.error('Debes ingresar el precio.','Notificación!');
            $( "#precio-producto2" ).focus();
            return;
        }

        var precio = $("#precio-producto2").val();
        precio = precio.replaceAll(".","",precio);
        $scope.addProductosConsig[$scope.setIdFila].precio = precio;
        $scope.addProductosConsig[$scope.setIdFila].cantidad = $("#cantidad-producto2").val();
        $scope.sumatoriaConsig();
        $("#form-changeConsig").modal('hide');

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

                    if($scope.clienteAdd.dv==null || $scope.clienteAdd.dv==""){
                        $scope.clienteAdd.dv = 99;
                    }

                    if($("#fecha-nacimiento").val()==null || $("#fecha-nacimiento").val()==""){
                        $scope.clienteAdd.fecha_nacimiento = null;
                    }else{
                        var fecha_nacimiento = $("#fecha-nacimiento").val();
                        fecha_nacimiento = fecha_nacimiento.split("/");
                        fecha_nacimiento = fecha_nacimiento[2]+'-'+fecha_nacimiento[1]+'-'+fecha_nacimiento[0];
                        $scope.clienteAdd.fecha_nacimiento = fecha_nacimiento;
                    }

                    console.log("###############");
                    console.log($scope.clienteAdd);
                    console.log("###############");


                    $http.post(kConstant.url+"clientes/addEntityModel",$scope.clienteAdd).
                    then(function(response){
                        console.log(response.data);
                        if(response.data.mensaje="ok"){
                            toastr.success('Se guardo correctamente el Cliente.','Notificación!');
                            $("#form-cliente").modal('hide');
                            $scope.cleanClienteAdd();
                            $scope.cliente = response.data.cliente;
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
    $scope.addProductosConsig = [];
    $scope.addProductosEdit = [];
    $scope.addProductosEditConsig = [];
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
        //setTimeout(function(){ $( "#buscar" ).focus(); }, 500);
    }

    $scope.openConsignacion = function(){
        $("#form-consignacion").modal();
        //setTimeout(function(){ $( "#buscar" ).focus(); }, 500);
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
        $scope.sumatoria();
    };

    $scope.removeRowConsig = function(producto){
        var index = -1;
        var comArr = eval( $scope.addProductosConsig);
        for( var i = 0; i < comArr.length; i++ ) {
            //console.log(eval(producto)+' - '+eval(comArr[i].producto.id));
            if( eval(comArr[i].id_producto) === eval(producto)) {
                //console.log('ID: '+i);
                index = i;
                break;
            }
        }

        $scope.addProductosConsig.splice( index, 1 );
        $scope.sumatoriaConsig();
    };

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

    $scope.setProductoConsig = function(producto){
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
        $scope.addProductosConsig.push(p);
        $("#form-consignacion").modal('hide');
        $scope.sumatoriaConsig();
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


    $scope.totalSumaConsig = 0;
    $scope.sumatoriaConsig = function () {
        var index = -1;
        var comArr = eval( $scope.addProductosConsig);
        var total = 0;
        for( var i = 0; i < comArr.length; i++ ) {
            total = total + new Number(comArr[i].precio*comArr[i].cantidad);
        }
        total = Math.round(total);
        $scope.totalSumaConsig = total;

    };


    $scope.entidad = {
        id:0,
        fecha:null,
        hora:null,
        correo:null,
        telefono:null,
        lugar_entrega:null,
        senha:0,
        productos:null,
        consignacion_treinta:0,
        consignacion_cincuenta:0,
        manijas:0,
        mesadas:null,
        nro_maquina:null,
        acople:0,
        id_cliente:null,
        nombre_cliente:null,
        observacion:null,
        ruc:null,
        estado_pedido:null,
        estado:1,
        detalles_pedidos_ventas:null

    }
    $scope.verificar = function(){

        if($("#cliente").val()=="" || $("#cliente").val()==null){
            toastr.error('Debes ingresar el cliente.','Notificación!');
            $( "#cliente" ).focus();
            return false;
        }

        if($scope.cliente==null){
            toastr.error('Debes ingresar el cliente.','Notificación!');
            $( "#facturar-a" ).focus();
            return false;
        }

        if($scope.cliente.id===undefined){
            toastr.error('Debes ingresar el cliente.','Notificación!');
            $( "#facturar-a" ).focus();
            return false;
        }

        if($scope.cliente.id=="00"){
            toastr.error('Debes ingresar el cliente.','Notificación!');
            $( "#facturar-a" ).focus();
            return false;
        }

        if($scope.addProductos.length<=0){
            toastr.error('Debes ingresar al menos un producto.','Notificación!');
            return false;
        }

        return true;
    }
    $scope.guardarPedido = function () {
        if($scope.verificar()){
            HoldOn.open({
                theme: 'sk-circle',
                message: "<strong>Esperando respuesta del servidor...</strong>"
            });

            var fecha = $("#fecha").val();
            fecha = fecha.split("/");
            fecha = fecha[2]+'-'+fecha[1]+'-'+fecha[0];
            $scope.entidad.fecha = fecha;

            var fecha_a_retirar = $("#fecha_a_retirar").val();
            fecha_a_retirar = fecha_a_retirar.split("/");
            fecha_a_retirar = fecha_a_retirar[2]+'-'+fecha_a_retirar[1]+'-'+fecha_a_retirar[0];
            $scope.entidad.fecha_a_retirar = fecha_a_retirar;

            $scope.entidad.correo = $("#correo").val();
            $scope.entidad.telefono = $("#telefono").val();
            $scope.entidad.lugar_entrega = $("#lugar-entrega").val();
            $scope.entidad.coordenadas = $("#coordenadas").val();
            var senha = $("#senha").val();
            senha = senha.replaceAll(".","",senha);
            $scope.entidad.senha = senha;
            $scope.entidad.consignacion_treinta = $("#consignacion-treinta").val();
            $scope.entidad.consignacion_cincuenta = $("#consignacion-cincuenta").val();
            $scope.entidad.manijas = $("#manijas").val();
            $scope.entidad.mesada = $("#mesadas").val();
            $scope.entidad.nro_maquina = $("#nro-maquina").val();
            $scope.entidad.acople = $("#acople").val();
            $scope.entidad.facturar_a = $scope.cliente.descripcion;
            $scope.entidad.id_cliente = $scope.cliente.id;
            $scope.entidad.ruc = $scope.cliente.documento;
            $scope.entidad.nombre_cliente = $("#cliente").val();
            $scope.entidad.estado_pedido = $scope.selectedPedido.field;
            $scope.entidad.observacion = $("#obs").val();
            $scope.entidad.total = $scope.totalSuma;
            $scope.entidad.detalles_pedidos_ventas = $scope.addProductos;
            $scope.entidad.detalles_pedidos_consignacion = $scope.addProductosConsig;
            console.log($scope.entidad);
            $http.post(kConstant.url + "PedidoVentas/addEntity", $scope.entidad).
            then(function (response) {
                //HoldOn.close();
                console.log(response);
                $window.location.href = kConstant.url+"PedidoVentas/index";
            });
        }
    }


    $scope.modificarPedido = function (id) {
        if($scope.verificar()){
            HoldOn.open({
                theme: 'sk-circle',
                message: "<strong>Esperando respuesta del servidor...</strong>"
            });

            var fecha = $("#fecha").val();
            fecha = fecha.split("/");
            fecha = fecha[2]+'-'+fecha[1]+'-'+fecha[0];
            $scope.entidad.fecha = fecha;

            if($("#fecha_a_retirar").val()=="" || $("#fecha_a_retirar").val()==null){
                $scope.entidad.fecha_a_retirar = null;
            }else{
                var fecha_a_retirar = $("#fecha_a_retirar").val();
                fecha_a_retirar = fecha_a_retirar.split("/");
                fecha_a_retirar = fecha_a_retirar[2]+'-'+fecha_a_retirar[1]+'-'+fecha_a_retirar[0];
                $scope.entidad.fecha_a_retirar = fecha_a_retirar;
            }


            $scope.entidad.correo = $("#correo").val();
            $scope.entidad.telefono = $("#telefono").val();
            $scope.entidad.lugar_entrega = $("#lugar-entrega").val();
            $scope.entidad.coordenadas = $("#coordenadas").val();
            var senha = $("#senha").val();
            senha = senha.replaceAll(".","",senha);
            $scope.entidad.senha = senha;
            $scope.entidad.consignacion_treinta = $("#consignacion-treinta").val();
            $scope.entidad.consignacion_cincuenta = $("#consignacion-cincuenta").val();
            $scope.entidad.manijas = $("#manijas").val();
            $scope.entidad.mesada = $("#mesadas").val();
            $scope.entidad.nro_maquina = $("#nro-maquina").val();
            $scope.entidad.acople = $("#acople").val();
            $scope.entidad.facturar_a = $scope.cliente.descripcion;
            $scope.entidad.id_cliente = $scope.cliente.id;
            $scope.entidad.ruc = $scope.cliente.documento;
            $scope.entidad.nombre_cliente = $("#cliente").val();
            $scope.entidad.estado_pedido = $scope.selectedPedido.field;
            $scope.entidad.observacion = $("#obs").val();
            $scope.entidad.total = $scope.totalSuma;
            $scope.entidad.detalles_pedidos_ventas = $scope.addProductos;
            $scope.entidad.detalles_pedidos_consignacion = $scope.addProductosConsig;
            console.log($scope.entidad);
            $http.post(kConstant.url + "PedidoVentas/editEntity/"+id, $scope.entidad).
            then(function (response) {
                HoldOn.close();
                console.log(response);
                $window.location.href = kConstant.url+"PedidoVentas/index";
            });
        }
    }

    $scope.cargar_datos = function(id){
        $http.get(kConstant.url+"PedidoVentas/getEntity/"+id).
        then(function(response) {
            $scope.addProductos = [];
            $scope.entidad = response.data.pedido[0];
            console.log($scope.entidad);
            var fecha = $scope.entidad.fecha;
            fecha = fecha.substring(0, 10);
            fecha = fecha.split('-');
            $("#fecha").val(fecha[2] + "/" + fecha[1] + "/" + fecha[0]);

            if($scope.entidad.fecha_a_retirar==null){
                $("#fecha_a_retirar").val(null);
            }else{
                var fecha_a_retirar = $scope.entidad.fecha_a_retirar;
                fecha_a_retirar = fecha_a_retirar.substring(0, 10);
                fecha_a_retirar = fecha_a_retirar.split('-');
                $("#fecha_a_retirar").val(fecha_a_retirar[2] + "/" + fecha_a_retirar[1] + "/" + fecha_a_retirar[0]);
            }



            $("#cliente").val($scope.entidad.nombre_cliente);
            $("#correo").val($scope.entidad.correo);
            $("#telefono").val($scope.entidad.telefono);
            $("#lugar-entrega").val($scope.entidad.lugar_entrega);
            $("#coordenadas").val($scope.entidad.coordenadas);
            $("#senha").val($scope.entidad.senha);
            $("#consignacion-treinta").val($scope.entidad.consignacion_treinta);
            $("#consignacion-cincuenta").val($scope.entidad.consignacion_cincuenta);
            $("#manijas").val($scope.entidad.manijas);
            $("#mesadas").val($scope.entidad.mesada);
            $("#acople").val($scope.entidad.acople);
            $("#nro-maquina").val($scope.entidad.nro_maquina);
            $("#obs").val($scope.entidad.observacion);
            $scope.cliente = $scope.entidad.cliente;

            if($scope.entidad.estado_pedido=="pendiente"){
                $scope.selectedPedido = $scope.estadoPedidos[0];
            }

            if($scope.entidad.estado_pedido=="en_camino"){
                $scope.selectedPedido = $scope.estadoPedidos[1];
            }

            if($scope.entidad.estado_pedido=="entregado"){
                $scope.selectedPedido = $scope.estadoPedidos[2];
            }

            if($scope.entidad.estado_pedido=="retirado"){
                $scope.selectedPedido = $scope.estadoPedidos[3];
            }

            if($scope.entidad.estado_pedido=="maquina_limpia"){
                $scope.selectedPedido = $scope.estadoPedidos[4];
            }

            console.log("#####################");
            console.log($scope.entidad.detalles_pedidos_ventas);
            for(var i =0; i<$scope.entidad.detalles_pedidos_ventas.length;i++){
                    var a = {
                        id_producto:$scope.entidad.detalles_pedidos_ventas[i].producto.id,
                        descripcion:$scope.entidad.detalles_pedidos_ventas[i].producto.descripcion,
                        cantidad:$scope.entidad.detalles_pedidos_ventas[i].cantidad,
                        precio:$scope.entidad.detalles_pedidos_ventas[i].precio
                    }
                   $scope.addProductos.push(a);
            }
            $scope.sumatoria();
            delete $scope.entidad.cliente;
            delete $scope.entidad.detalles_pedidos_ventas;
            console.log($scope.entidad);
            for(var i =0; i<$scope.entidad.detalles_pedidos_consignacion.length;i++){
                var a = {
                    id_producto:$scope.entidad.detalles_pedidos_consignacion[i].producto.id,
                    descripcion:$scope.entidad.detalles_pedidos_consignacion[i].producto.descripcion,
                    cantidad:$scope.entidad.detalles_pedidos_consignacion[i].cantidad,
                    precio:$scope.entidad.detalles_pedidos_consignacion[i].precio
                }
                $scope.addProductosConsig.push(a);
            }
            $scope.sumatoriaConsig();


        });
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


