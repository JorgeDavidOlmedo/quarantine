/**
 * Created by jorge on 1/15/19.
 */

var app = angular.module('contalapp');
app.controller('cajasIndex',function ($scope,kConstant,$http,$window,$filter,$timeout,ventasByTerm,cuentaCajaByTerm,clientesByTerm,proveedoresByTerm) {

    String.prototype.replaceAll = function(str1, str2, ignore)
    {
        return this.replace(new RegExp(str1.replace(/([\/\,\!\\\^\$\{\}\[\]\(\)\.\*\+\?\|\<\>\-\&])/g,"\\$&"),(ignore?"gi":"g")),(typeof(str2)=="string")?str2.replace(/\$/g,"$$$$"):str2);
    }


    $scope.cliente='';
    $scope.clientes = function(usuarioValue){

        if($scope.tipoPersona=="Cliente"){
            var futureUsuarios = clientesByTerm.async(usuarioValue);
            return futureUsuarios.then(function (response){
                // console.log(response.data.usuarios);
                return response.data.clientes;
            });
        }else{
            var futureUsuarios = proveedoresByTerm.async(usuarioValue);
            return futureUsuarios.then(function (response){
                // console.log(response.data.usuarios);
                return response.data.proveedores;
            });
        }

    };

    $scope.cuenta='';
    $scope.cuentas = function(value){
        var future = cuentaCajaByTerm.async(value);
        return future.then(function (response){
            return response.data.cuenta;
        });
    };

    $scope.tipoPersona="Cliente";
    $scope.onSelectCaja = function ($item,$model,$label) {
        console.log($model);
        if($model.tipo=="debe"){
            $scope.tipoPersona = "Cliente";
            /*if($model.descripcion=="Cobranzas"){
                $scope.buscarVentasPendientes();
            }*/

        }else{
            $scope.tipoPersona = "Proveedor";
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
    $('#fecha').val($scope.formatDateDMY(date));
    $('#desde').val($scope.formatDateDMY(date));
    $('#hasta').val($scope.formatDateDMY(date));

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
            descripcion:"Modificar"
        },
        {
            id:3,
            descripcion:"Cerrar"
        }
    ];
    $scope.selected = $scope.estados[0];


    $scope.estadosCajas = [{
        id:0,
        descripcion:"Acciones"
    },
    {
        id:1,
        descripcion:"Anular"
    }
    ];
    $scope.selectedCaja = $scope.estadosCajas[0];

    $scope.verCaja = function(id){
        $window.location.href = kConstant.url+"cajas/view/"+id;
    }

    $scope.accionCaja = function (label,id) {
        console.log(label);
        //alert("24409"+" - "+id);
        $scope.selectedCaja[id] = $scope.estadosCajas[0];
        if (label.descripcion == "Anular") {
            swal({
                title: "Deseas Anular el registro # "+id+"?",
                text: "Atencion. al anular el registro ya no podras recuperarlo!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Si, anular!",
                closeOnConfirm: true
            }, function () {
                $http.post(kConstant.url+"cajas/deleteEntity/"+id).
                then(function(response){
                    console.log(response.data);
                    if(response.data.message=="ok"){
                        toastr.success('El registro se anulo correctamente.', 'Notificación!');
                        $scope.getCajas();
                    }
                },function (response) {
                    console.log(response);
                });
            });
        }

    }

        $scope.accion = function (label,id,estado_caja,id_cajero,fecha) {
        console.log(label);
            //alert("24409"+" - "+id);
            $scope.selected[id] = $scope.estados[0];
        if(label.descripcion=="Pagar"){
            alert("Accion no disponible");
        }

        if(label.descripcion=="Modificar"){

            if(estado_caja=="cerrado"){
                toastr.error('La Caja ya esta cerrada.','Notificación!');
                return false;
            }

            $window.location.href = kConstant.url+"aperturasCajas/edit/"+id;
        }

        if(label.descripcion=="Anular"){
            swal({
                title: "Deseas Anular el registro # "+id+"?",
                text: "Atencion. al anular el registro ya no podras recuperarlo!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Si, anular!",
                closeOnConfirm: false
            }, function () {
                $http.post(kConstant.url+"aperturasCajas/deleteEntity/"+id).
                then(function(response){
                    console.log(response.data);
                    if(response.data.message=="ok"){
                        swal("Eliminado!", "El registro se elimino correctamente.", "success");
                        $timeout(function () {
                            $window.location.href = kConstant.url+"aperturasCajas/index/"
                        }, 1000);
                    }
                },function (response) {
                    console.log(response);
                });
            });
        }

        if(label.descripcion=="Cerrar"){

            if(estado_caja=="cerrado"){
                toastr.error('La Caja ya esta cerrada.','Notificación!');
                return false;
            }
            swal({
                title: "Deseas cerrar la caja # "+id+"?",
                text: "Atencion!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Si, Cerrar!",
                closeOnConfirm: true
            }, function () {
                HoldOn.open({
                    theme: 'sk-circle',
                    message: "<strong>Esperando respuesta del servidor...</strong>"
                });
                //alert(id_cajero);
                console.log("#######");
                console.log(kConstant.url+"aperturasCajas/cerrarCaja/"+id+"/"+id_cajero+"/"+fecha);
                $http.get(kConstant.url+"aperturasCajas/cerrarCaja/"+id+"/"+id_cajero+"/"+fecha).
                then(function(response){
                    HoldOn.close();
                    console.log(response.data);
                    $window.location.href = kConstant.url+"aperturasCajas/index/"
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

    $("#monto").focus();

    $scope.AperturarCaja = function () {
        $window.location.href = kConstant.url+"aperturasCajas/add";
    }

    $scope.registrarCaja = function () {
        $window.location.href = kConstant.url+"cajas/add";
    }


    $scope.entity = {
        id:0,
        fecha:null,
        id_empresa:null,
        id_cajero:null,
        monto:0,
        estado:1
    }
    $scope.guardarCaja = function () {

        if($("#monto").val()==null || $("#monto").val()=="" || $("#monto").val()==0){
            toastr.error('Debes ingresar el monto.','Notificación!');
            $( "#monto" ).focus();
            return false;
        }

        var fecha = $("#fecha").val();
        fecha = fecha.split("/");
        fecha = fecha[2]+'-'+fecha[1]+'-'+fecha[0];
        $scope.entity.fecha = fecha;

        var monto = $("#monto").val();
        monto = monto.replaceAll(".","",monto);

        $scope.entity.monto = monto;
        console.log($scope.entity);
        HoldOn.open({
            theme: 'sk-circle',
            message: "<strong>Esperando respuesta del servidor...</strong>"
        });

        $http.post(kConstant.url+"aperturasCajas/addEntity",$scope.entity).
        then(function(response){
            HoldOn.close();
            console.log(response.data);
            if(response.data.existe==1){
                toastr.error('La caja del dia ya esta aperturada.','Notificación!');
                $( "#monto" ).focus();
                return false;
            }
            $window.location.href = kConstant.url+"aperturasCajas/index";
        },function (error) {
            console.log(error);
        });
    }


    $scope.modificarCaja = function (id) {

        if($("#monto").val()==null || $("#monto").val()=="" || $("#monto").val()==0){
            toastr.error('Debes ingresar el monto.','Notificación!');
            $( "#monto" ).focus();
            return false;
        }

        var fecha = $("#fecha").val();
        fecha = fecha.split("/");
        fecha = fecha[2]+'-'+fecha[1]+'-'+fecha[0];
        $scope.entity.fecha = fecha;

        var monto = $("#monto").val();
        monto = monto.replaceAll(".","",monto);

        $scope.entity.monto = monto;
        console.log($scope.entity);
        HoldOn.open({
            theme: 'sk-circle',
            message: "<strong>Esperando respuesta del servidor...</strong>"
        });

        $http.post(kConstant.url+"aperturasCajas/editEntity/"+id,$scope.entity).
        then(function(response){
            HoldOn.close();
            console.log(response.data);
            $window.location.href = kConstant.url+"aperturasCajas/index";
        },function (error) {
            console.log(error);
        });
    }


    $scope.cargar_datos = function (id) {
        $http.get(kConstant.url+"aperturasCajas/getEntity/"+id).
        then(function(response){
            console.log(response.data);
            $scope.entity = response.data.apertura[0];
            var fecha = $scope.entity.fecha;
            fecha = fecha.substring(0, 10);
            fecha = fecha.split('-');
            $("#fecha").val(fecha[2] + "/" + fecha[1] + "/" + fecha[0]);

            var monto = numeral($scope.entity.monto).format('0,0.[00]');
            monto = monto.replaceAll(".","_");
            monto = monto.replaceAll(",",".");
            monto = monto.replaceAll("_",",");
            $("#monto").val(monto);
        });
    }

    $scope.id_select = 0;
    $scope.hasChangedCaja = function(){
        if( $scope.id_select ==1){
            $scope.getCajas();
        }

    }

    $('#desde').on('dp.change', function(e){
        if( $scope.id_select ==1){
            $scope.getCajas();
        }
    });

    $('#hasta').on('dp.change', function(e){
        if( $scope.id_select ==1){
            $scope.getCajas();
        }
    });


    $scope.cajeros = [];
    $scope.getCajeros = function(){
        $http.get(kConstant.url+"Cajas/getCajeros").
        then(function(response){
            console.log(response.data.cajeros);
            $scope.cajeros = response.data.cajeros;
            var x = {
                usuario:{
                    id:0,
                    nombre:"Todos"
                }
            }
            $scope.cajeros.push(x);
            $scope.selectedCaj = $scope.cajeros[($scope.cajeros.length-1)];
            $scope.id_select = 1;
            $scope.getCajas();
        });
    }

    $scope.getCajeros();

    $scope.cajas = [];
    $scope.getCajas = function () {

        var id_cajero = $scope.selectedCaj.usuario.id;
        var desde = $("#desde").val();
        desde = desde.split("/");
        desde = desde[2]+'-'+desde[1]+'-'+desde[0];

        var hasta = $("#hasta").val();
        hasta = hasta.split("/");
        hasta = hasta[2]+'-'+hasta[1]+'-'+hasta[0];

        $http.get(kConstant.url+"cajas/getEntityCaja/"+desde+"/"+hasta+"/"+id_cajero).
        then(function(response){
            console.log(response.data);
            $scope.cajas = response.data.cajas;
        });
    }


});


app.controller('cajasAdd',function ($scope,kConstant,$http,$window,$filter,$timeout,ventasByTerm,cuentaCajaByTerm,clientesByTerm,proveedoresByTerm) {

    String.prototype.replaceAll = function(str1, str2, ignore)
    {
        return this.replace(new RegExp(str1.replace(/([\/\,\!\\\^\$\{\}\[\]\(\)\.\*\+\?\|\<\>\-\&])/g,"\\$&"),(ignore?"gi":"g")),(typeof(str2)=="string")?str2.replace(/\$/g,"$$$$"):str2);
    }


    $scope.openCuenta = function(){
        $("#form-cuenta").modal();
        setTimeout(function(){ $( "#cuentad" ).focus(); }, 500);
    }

    $scope.cuentaAdd = {
        id:0,
        id_empresa:0,
        tipo:"",
        descripcion:"",
        estado:1
    }
    $scope.guardarCuenta = function(){
        if($("#cuentad").val()==""){
            toastr.error('Debes ingresar la descripcion.','Notificación!');
            $( "#cuentad" ).focus();
            return false;
        }

        $scope.cuentaAdd.id_empresa = $('#empresa').val();
        $scope.cuentaAdd.tipo = $("#tipo").val();
        $scope.cuentaAdd.descripcion = $("#cuentad").val();
        $http.post(kConstant.url+"cajas/addEntityFromCaja",$scope.cuentaAdd).
        then(function(response){
            if(response.data.mensaje="ok"){
                console.log(response.data.cuenta);
                $scope.cuenta = response.data.cuenta;
                toastr.success('Se guardo correctamente la Cuenta Caja.','Notificación!');
                $("#form-cuenta").modal('hide');
                $("#cuentad").val("");
                if($scope.cuenta.tipo=="debe"){
                    $scope.tipoPersona = "Cliente";

                }else{
                    $scope.tipoPersona = "Proveedor";
                }
                setTimeout(function(){ $( "#cliente" ).focus(); }, 500);
            }else{
                toastr.error('No se puedieron guardar los datos.','Notificación!');
            }
        },function (error) {
            console.log(error);
        });
    }


    $scope.cliente='';
    $scope.clientes = function(usuarioValue){

        if($scope.tipoPersona=="Cliente"){
            var futureUsuarios = clientesByTerm.async(usuarioValue);
            return futureUsuarios.then(function (response){
                // console.log(response.data.usuarios);
                return response.data.clientes;
            });
        }else{
            var futureUsuarios = proveedoresByTerm.async(usuarioValue);
            return futureUsuarios.then(function (response){
                // console.log(response.data.usuarios);
                return response.data.proveedores;
            });
        }

    };

    $scope.cuenta='';
    $scope.cuentas = function(value){
        var future = cuentaCajaByTerm.async(value);
        return future.then(function (response){
            return response.data.cuenta;
        });
    };

    $scope.tipoPersona="Cliente";
    $scope.onSelectCaja = function ($item,$model,$label) {
        console.log($model);
        if($model.tipo=="debe"){
            $scope.tipoPersona = "Cliente";
            /*if($model.descripcion=="Cobranzas"){
                $scope.buscarVentasPendientes();
            }*/

        }else{
            $scope.tipoPersona = "Proveedor";
        }

        if($model.tipo=="00"){
            $scope.openCuenta();
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
            descripcion:"Modificar"
        },
        {
            id:3,
            descripcion:"Cerrar"
        }
    ];
    $scope.selected = $scope.estados[0];

    $scope.accion = function (label,id,estado_caja) {
        console.log(label);

        $scope.selected[id] = $scope.estados[0];
        if(label.descripcion=="Pagar"){
            alert("Accion no disponible");
        }

        if(label.descripcion=="Modificar"){
            $window.location.href = kConstant.url+"aperturasCajas/edit/"+id;
        }

        if(label.descripcion=="Anular"){
            swal({
                title: "Deseas Anular el registro # "+id+"?",
                text: "Atencion. al anular el registro ya no podras recuperarlo!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Si, eliminar!",
                closeOnConfirm: false
            }, function () {
                $http.post(kConstant.url+"aperturasCajas/deleteEntity/"+id).
                then(function(response){
                    console.log(response.data);
                    if(response.data.message=="ok"){
                        swal("Eliminado!", "El registro se elimino correctamente.", "success");
                        $timeout(function () {
                            $window.location.href = kConstant.url+"aperturasCajas/index/"
                        }, 1000);
                    }
                },function (response) {
                    console.log(response);
                });
            });
        }

        if(label.descripcion=="Cerrar"){

            if(estado_caja=="cerrado"){
                toastr.error('La Caja ya esta cerrada.','Notificación!');
                return false;
            }

            swal({
                title: "Deseas cerrar la caja # "+id+"?",
                text: "Atencion!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Si, Cerrar!",
                closeOnConfirm: false
            }, function () {
                /*$http.post(kConstant.url+"aperturasCajas/deleteEntity/"+id).
                then(function(response){
                    console.log(response.data);
                    if(response.data.message=="ok"){
                        swal("Eliminado!", "El registro se elimino correctamente.", "success");
                        $timeout(function () {
                            $window.location.href = kConstant.url+"aperturasCajas/index/"
                        }, 1000);
                    }
                },function (response) {
                    console.log(response);
                });*/
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

    $scope.AperturarCaja = function () {
        $window.location.href = kConstant.url+"aperturasCajas/add";
    }


    $scope.entity = {
        id:0,
        fecha:null,
        id_empresa:null,
        id_cajero:null,
        documento:null,
        id_cuenta_caja:null,
        id_cliente:null,
        id_proveedor:null,
        id_moneda:5,
        monto:0,
        observacion:null,
        estado:1
    }

    $scope.cuenta = "";
    $scope.movimientoCuentasFondos=[];
    $scope.formasPagos = [];
    $scope.guardarCaja = function () {

        if($("#documento").val()==null || $("#documento").val()=="" || $("#documento").val()==0){
            toastr.error('Debes ingresar el documento.','Notificación!');
            $( "#documento" ).focus();
            return false;
        }

        if($scope.cuenta==""){
            toastr.error('Debes ingresar la cuenta de caja.','Notificación!');
            $( "#cuenta" ).focus();
            return false;
        }

        if($scope.cuenta.descripcion==null){
            toastr.error('Debes ingresar la cuenta de caja.','Notificación!');
            $( "#cuenta" ).focus();
            return false;
        }

        if($scope.cuenta.id===undefined){
            toastr.error('Debes ingresar la cuenta de caja.','Notificación!');
            $( "#cuenta" ).focus();
            return false;
        }

        if($scope.cuenta.id=="00"){
            toastr.error('Debes ingresar la cuenta de caja.','Notificación!');
            $( "#cuenta" ).focus();
            return false;
        }


        if($scope.cliente==""){
            toastr.error('Debes ingresar el Nombre.','Notificación!');
            $( "#cliente" ).focus();
            return false;
        }

        if($scope.cliente.descripcion==null){
            toastr.error('Debes ingresar el Nombre.','Notificación!');
            $( "#cliente" ).focus();
            return false;
        }

        if($scope.cliente.id=="00"){
            toastr.error('Debes ingresar el Nombre.','Notificación!');
            $( "#cliente" ).focus();
            return false;
        }

        if($("#monto-caja").val()==null || $("#monto-caja").val()=="" || $("#monto-caja").val()==0){
            toastr.error('Debes ingresar el monto.','Notificación!');
            $( "#monto-caja" ).focus();
            return false;
        }


        var fecha = $("#fecha").val();
        fecha = fecha.split("/");
        fecha = fecha[2]+'-'+fecha[1]+'-'+fecha[0];
        $scope.entity.fecha = fecha;

        var monto = $("#monto-caja").val();
        monto = monto.replaceAll(".","",monto);
        $scope.entity.monto = monto;

        $scope.entity.documento = $("#documento").val();
        $scope.entity.id_cuenta_caja = $scope.cuenta.id;
        if($scope.cuenta.tipo=="debe"){
            $scope.entity.id_cliente=$scope.cliente.id;
            $scope.entity.id_proveedor = null;
        }else{
            $scope.entity.id_cliente = null;
            $scope.entity.id_proveedor=$scope.cliente.id;
        }

        var x = {
            id:0,
            fecha:fecha,
            forma:"efectivo",
            documento:"00",
            monto:monto
        }
        $scope.formasPagos.push(x);

        var debe = 0;
        var haber=0;
        if($scope.cuenta.tipo=="debe"){
            debe=monto;
        }else{
            debe=0;
        }

        if($scope.cuenta.tipo=="haber"){
            haber=monto;
        }else{
            haber=0;
        }

        var m={
            id:0,
            id_empresa:$("#empresa").val(),
            id_cuenta_fondo:$("#cuenta-fondo").val(),
            documento:"00",
            fecha:fecha,
            debe:debe,
            haber:haber,
            monto:monto,
            estado:1
        }
        $scope.movimientoCuentasFondos.push(m);
        $scope.entity.id_apertura = $("#apertura").val();
        $scope.entity.observacion = $("#obs").val();
        $scope.entity.movimiento_cuentas_fondos=$scope.movimientoCuentasFondos;
        $scope.entity.formas_pagos=$scope.formasPagos;
        console.log($scope.entity);
        HoldOn.open({
            theme: 'sk-circle',
            message: "<strong>Esperando respuesta del servidor...</strong>"
        });

        $http.post(kConstant.url+"cajas/addEntityNormal",$scope.entity).
        then(function(response){
            HoldOn.close();
            console.log(response.data);
            $window.location.href = kConstant.url+"cajas/index";
        },function (error) {
            console.log(error);
        });
    }


    $scope.modificarCaja = function (id) {

        if($("#monto").val()==null || $("#monto").val()=="" || $("#monto").val()==0){
            toastr.error('Debes ingresar el monto.','Notificación!');
            $( "#monto" ).focus();
            return false;
        }

        var fecha = $("#fecha").val();
        fecha = fecha.split("/");
        fecha = fecha[2]+'-'+fecha[1]+'-'+fecha[0];
        $scope.entity.fecha = fecha;

        var monto = $("#monto").val();
        monto = monto.replaceAll(".","",monto);

        $scope.entity.monto = monto;
        console.log($scope.entity);
        HoldOn.open({
            theme: 'sk-circle',
            message: "<strong>Esperando respuesta del servidor...</strong>"
        });

        $http.post(kConstant.url+"aperturasCajas/editEntity/"+id,$scope.entity).
        then(function(response){
            HoldOn.close();
            console.log(response.data);
            $window.location.href = kConstant.url+"aperturasCajas/index";
        },function (error) {
            console.log(error);
        });
    }


    $scope.cargar_datos = function (id) {
        $http.get(kConstant.url+"aperturasCajas/getEntity/"+id).
        then(function(response){
            console.log(response.data);
            $scope.entity = response.data.apertura[0];
            var fecha = $scope.entity.fecha;
            fecha = fecha.substring(0, 10);
            fecha = fecha.split('-');
            $("#fecha").val(fecha[2] + "/" + fecha[1] + "/" + fecha[0]);

            var monto = numeral($scope.entity.monto).format('0,0.[00]');
            monto = monto.replaceAll(".","_");
            monto = monto.replaceAll(",",".");
            monto = monto.replaceAll("_",",");
            $("#monto").val(monto);
        });
    }


    $("#documento").focus();

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








