/**
 * Created by jorge on 12/28/16.
 */
var app = angular.module('contalapp');
app.controller('clienteIndex',function ($scope,kConstant,$http,$window,$filter,$timeout,clientesByTerm) {


    $scope.clientes = [];
    $scope.getClientes = function (idEmpresa) {
        $http.get(kConstant.url+"/clientes/getEntityAll/"+idEmpresa)
            .then(function(data){
                $scope.proveedores=data.data.clientes;
                console.log(data.data.clientes);
            });
    }
    $scope.focus_buscar = function(){
        $(".buscador").focus();
    }
    $scope.obtener_entity = function (id) {
        $window.location.href = kConstant.url+"clientes/edit/"+id;
    }
    $scope.agregar_entity = function () {
        $window.location.href = kConstant.url+"clientes/add/";
    }
    $scope.ver_entity = function (id) {
        $window.location.href = kConstant.url+"clientes/view/"+id;
    }
    $scope.listar_entity = function () {
        $window.location.href = kConstant.url+"clientes/index/";
    }
    $scope.borrar_entity = function (id) {
        swal({
            title: "Deseas eliminar el registro # "+id+"?",
            text: "Atencion. al eliminar el registro ya no podras recuperarlo!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Si, eliminar!",
            closeOnConfirm: false
        }, function () {
            $http.post(kConstant.url+"clientes/deleteEntity/"+id).
            then(function(response){
                swal("Eliminado!", "El registro se elimino correctamente.", "success");
                $timeout(function () {
                    $scope.listar_entity();
                }, 2000);

            },function (response) {
                console.log(response);
            });

        });
    }

    $scope.cliente='';
    $scope.clientes = function(clienteValue){
        console.log(clienteValue);
        var futureEmpresas = clientesByTerm.async(clienteValue);
        return futureEmpresas.then(function (response){
            //console.log('datos: '+response.data.clientes);
            return response.data.clientes;
        });
    };

    $scope.onSelect = function ($label) {
        var id = ($label || '').split('-');
        $window.location.href = kConstant.url+"clientes/view/"+id[0];
    }

    $scope.formatDate = function(date) {

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

    $('#desde').val($scope.formatDate(ultimoDia));
    //$('#hasta').val($scope.formatDate(ultimoDia));
    $scope.consultando = "none";
    $("#client").focus();
    $("#cliente").focus();

});

app.controller('clienteAdd',function($scope,kConstant,$http,$window,cuentasByTerm){




    $scope.cuenta='';
    $scope.cuentaedit='';
    $scope.cuentas = function(value){
        //console.log(value);
        var futureCuentas = cuentasByTerm.async(value);
        return futureCuentas.then(function (response){
            return response.data.cuentas;
        });
    };

    $scope.formatDate = function(date) {

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

    $('#desde').val($scope.formatDate(primerDia));
    $('#hasta').val($scope.formatDate(ultimoDia));

    var hoy = new Date();
    $scope.cliente={
        "id": 0,
        "descripcion":"",
        "email":"",
        "documento":"",
        "dv":"",
        "telefono":"",
        "direccion":"",
        "id_plan_cuenta":null,
        "estado":1,
        "id_empresa":0
    }

    $scope.flag = 0;
    $scope.guardar = function (){
        //console.log(idEmpresa)
        if($scope.verificar_campos()){

            $http.get(kConstant.url+"clientes/verificarRepetido/"+$scope.cliente.documento).
            then(function(response) {
                console.log(response.data.estado);

                if (response.data.estado == 1) {
                    toastr.error('El nro de documento ya existe.', 'Notificación!');
                    $("#documento").focus();
                    return false;
                } else {


                    $scope.flag = $scope.flag + 1;
                    $scope.cliente.id_empresa = $('#empresa').val();
                    if($scope.cliente.dv==null || $scope.cliente.dv==""){
                        $scope.cliente.dv = 99;
                    }

                    $scope.cliente.id_plan_cuenta = null;
                    if($scope.cuenta!=null){
                        $scope.cliente.id_plan_cuenta = $scope.cuenta.id;
                    }
                    console.log($scope.cliente);

                    if($scope.flag<=1){
                        $http.post(kConstant.url+"clientes/addEntity",$scope.cliente).
                        then(function(response){
                            if(response.data.mensaje="ok") {
                                $window.location.href = kConstant.url+"clientes/index";
                            }else{
                                toastr.error('No se puedieron guardar los datos.','Notificación!');
                            }

                        },function (response) {

                        });
                    }else{
                        HoldOn.open({
                            theme:'sk-circle',
                            message:"<strong>Esperando respuesta de contalapp.com...</strong>"
                        });
                    }

                }
            });


        }
    }
    $scope.verificar_campos = function () {
        console.log($scope.cliente);
        if($scope.cliente==null || $scope.cliente==""){
            toastr.error('Debes completar correctamente los datos.','Notificación!');
            $( "#email" ).focus();
            return false;
        };
        if($scope.cliente.descripcion==null || $scope.cliente.descripcion==""){
            toastr.error('El campo descripcion no puede estar vacio.','Notificación!');
            $( "#descripcion" ).focus();
            return false;
        };
        if($scope.cliente.documento==null || $scope.cliente.documento==""){
            toastr.error('El campo Documento no puede estar vacio.','Notificación!');
            $( "#documento" ).focus();
            return false;
        };

        return true;
    }

    $("#codigo-interno").focus();
});


app.controller('reporteVenta',function($scope,kConstant,$http,$window,clientesByTerm){


    $scope.formatDate = function(date) {

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

    $('#desde').val($scope.formatDate(primerDia));
    $('#hasta').val($scope.formatDate(ultimoDia));

    var hoy = new Date();
    $scope.cliente={
        "id": 0,
        "descripcion":"",
        "email":"",
        "documento":"",
        "dv":0,
        "telefono":"",
        "direccion":"",
        "estado":1,
        "id_empresa":0
    }

    $scope.flag = 0;
    $scope.guardar = function (){
        //console.log(idEmpresa)
        if($scope.verificar_campos()){
            $scope.flag = $scope.flag + 1;
            $scope.cliente.id_empresa = $('#empresa').val();
            $scope.cliente.id_plan_cuenta = null;
            if($scope.cuenta!=null){
                $scope.cliente.id_plan_cuenta = $scope.cuenta.id;
            }
            console.log($scope.cliente);
            HoldOn.open({
                theme:'sk-circle',
                message:"<strong>Esperando respuesta de contalapp.com...</strong>"
            });

            if($scope.flag<=1){
                $http.post(kConstant.url+"clientes/addEntity",$scope.cliente).
                then(function(response){
                    if(response.data.mensaje="ok") {
                        $window.location.href = kConstant.url+"clientes/index";
                    }else{
                        toastr.error('No se puedieron guardar los datos.','Notificación!');
                    }

                },function (response) {

                });
            }else{
                HoldOn.open({
                    theme:'sk-circle',
                    message:"<strong>Esperando respuesta de contalapp.com...</strong>"
                });
            }

        }
    }
    $scope.verificar_campos = function () {
        console.log($scope.cliente);
        if($scope.cliente==null || $scope.cliente==""){
            toastr.error('Debes completar correctamente los datos.','Notificación!');
            $( "#email" ).focus();
            return false;
        };
        if($scope.cliente.descripcion==null || $scope.cliente.descripcion==""){
            toastr.error('El campo descripcion no puede estar vacio.','Notificación!');
            $( "#descripcion" ).focus();
            return false;
        };
        if($scope.cliente.documento==null || $scope.cliente.documento==""){
            toastr.error('El campo Documento no puede estar vacio.','Notificación!');
            $( "#documento" ).focus();
            return false;
        };

        return true;
    }

    $scope.cliente='';
    $scope.clientes = function(clienteValue){
        //console.log(clienteValue);
        var futureEmpresas = clientesByTerm.async(clienteValue);
        return futureEmpresas.then(function (response){
            //console.log('datos: '+response.data.clientes);
            return response.data.clientes;
        });
    };

    $scope.onSelect = function ($label) {
        var id = ($label || '').split('-');
        $window.location.href = kConstant.url+"clientes/view/"+id[0];
    }

    $scope.formatDate = function(date) {

        var d = new Date(date || Date.now()),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();

        if (month.length < 2) month = '0' + month;
        if (day.length < 2) day = '0' + day;

        return [day,month,year].join('/');
    }


    $("#cliente").focus();
});

app.controller('clienteEdit',function ($scope,$http,kConstant,$window,cuentasByTerm) {

    $scope.cuenta='';
    $scope.cuentaedit='';
    $scope.cuentas = function(value){
        console.log(value);
        var futureCuentas = cuentasByTerm.async(value);
        return futureCuentas.then(function (response){
            return response.data.cuentas;
        });
    };

    $scope.cargar_datos = function (id,idEmpresa) {
        $scope.cliente = [];
        $http.get(kConstant.url+"/clientes/getEntity/empresa/"+idEmpresa+"/cliente/"+id)
            .then(function(data){
                console.log(data.data);
                $scope.cliente=data.data.cliente[0];
                if(data.data.cuentas[0]!=null){
                    $scope.cuenta = data.data.cuentas[0];
                }
            });
    }

    $scope.flag = 0;
    $scope.modificar = function (id) {
        console.log("ID: "+id);
        delete $scope.cliente.created;
        delete $scope.cliente.modified;

        $http.get(kConstant.url+"clientes/verificarRepetidoEdit/"+$scope.cliente.documento+"/"+id).
        then(function(response) {
            console.log(response.data.estado);

            if (response.data.estado == 1) {
                toastr.error('El nro de documento ya existe.', 'Notificación!');
                $("#documento").focus();
                return false;
            } else {

                $scope.cliente.id_plan_cuenta = null;
                if($scope.cuenta!=null){
                    $scope.cliente.id_plan_cuenta = $scope.cuenta.id;
                }
                console.log($scope.cliente);

                if($scope.verificar_campos()){
                    $scope.flag = $scope.flag + 1;

                    if($scope.cliente.dv==null || $scope.cliente.dv==""){
                        $scope.cliente.dv = 99;
                    }


                    if($scope.flag<=1){
                        $http.post(kConstant.url+"clientes/editEntity/"+id,$scope.cliente).
                        then(function(response){
                            $window.location.href = kConstant.url+"clientes/index";
                        },function (response) {

                        });
                    }else{
                        HoldOn.open({
                            theme:'sk-circle',
                            message:"<strong>Esperando respuesta de contalapp.com...</strong>"
                        });
                    }

                }

            }

        });


    }
    $scope.verificar_campos = function () {
        if($scope.cliente==null || $scope.cliente==""){
            toastr.error('Debes completar correctamente los datos.','Notificación!');
            $( "#email" ).focus();
            return false;
        };
        if($scope.cliente.descripcion==null || $scope.cliente.descripcion==""){
            toastr.error('El campo descripcion no puede estar vacio.','Notificación!');
            $( "#descripcion" ).focus();
            return false;
        };
        if($scope.cliente.documento==null || $scope.cliente.documento==""){
            toastr.error('El campo Documento no puede estar vacio.','Notificación!');
            $( "#documento" ).focus();
            return false;
        };

        return true;
    }

    $("#codigo-interno").focus();
});
