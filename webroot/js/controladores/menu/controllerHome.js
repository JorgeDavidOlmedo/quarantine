/**
 * Created by jorge on 18/07/2019.
 */

var app = angular.module('contalapp');
app.controller('homeIndex',function ($rootScope,$scope,kConstant,$http,$window,$filter) {
    console.log("COVI-19");
    $scope.ingresar = function(){
        $("#form-change").modal();
        setTimeout(function(){  $("#documento").focus(); }, 500);

    }

    $scope.consultaIngresos = function(){
        $("#form-consulta").modal();
        $scope.nombre_c = null;
        $scope.direccion_c = null;
        $scope.ingreso = null;
        $scope.hora = null;
        $scope.cuarentena = null;
        $scope.color = null;
        $scope.mensaje = null;
        $scope.visible="none";
        setTimeout(function(){  $("#documento_c").focus(); }, 500);

    }

    $scope.q = null;
    $scope.buscarCov = function () {

        if($scope.q==null || $scope.q==""){
            alert("DEBES INGRESAR EL NUMERO DE DOCUMENTO");
            return;
        }
        HoldOn.open({
            theme:'sk-bounce',
            message:"<strong>BUSCANDO NRO. DE DOCUMENTO...</strong>"
        });
        $http.get("https://contalapp.com/cedulas/buscar.php?cedula="+$scope.q).
        then(function(response){
                console.log(response.data);
                HoldOn.close();
                $scope.nombre = response.data[0].nombre+" "+response.data[0].apellido;
                $scope.direccion = response.data[0].direccion;

        });
    }

    $scope.q_c==null;
    $scope.ingreso=null;
    $scope.hora=null;
    $scope.cuarentena=null;
        $scope.mensaje =null;
        $scope.buscarIngreso = function () {
        $scope.mensaje = null;
        if($scope.q_c==null || $scope.q_c==""){
            alert("DEBES INGRESAR EL NUMERO DE DOCUMENTO");
            return;
        }
        HoldOn.open({
            theme:'sk-bounce',
            message:"<strong>BUSCANDO NRO. DE DOCUMENTO...</strong>"
        });
        $scope.nombre_c = null;
        $scope.direccion_c = null;
        $scope.ingreso = null;
        $scope.hora = null;
        $scope.cuarentena = null;
        $scope.color = null;
        console.log(kConstant.url+"ingresosPais/buscarDocu/"+$scope.q_c);
        $http.get(kConstant.url+"ingresosPais/buscarDocu/"+$scope.q_c).
        then(function(response){
            HoldOn.close();
            console.log(response.data);
            if(response.data.encontro==1){
                var personaje = response.data.ingresos[0];
                console.log(personaje);
                $scope.nombre_c = personaje.nombre;
                $scope.direccion_c = personaje.direccion;
                $scope.ingreso = personaje.ingreso;
                $scope.hora = personaje.hora;
                $scope.cuarentena = personaje.cuarentena;
                $scope.mensaje = response.data.mensaje;
                setTimeout(function(){  $scope.visible="block";
                    $scope.color = response.data.color;
                    $scope.$apply();
                    }, 500);
            }else{
                setTimeout(function(){  $scope.visible="none";
                    $scope.color = response.data.color;
                    $scope.mensaje = "NO SE ENCONTRARON REGISTROS!";
                    $scope.$apply();
                    }, 500);
            }


        });
    }

    $scope.informar = function(){
        HoldOn.open({
            theme:'sk-bounce',
            message:"<strong>INFORMANDO A AUTORIDADES...</strong>"
        });
        setTimeout(function(){
            HoldOn.close();
            alert("EL PROCESO SE INFORMO CORRECTAMENTE!");
        }, 2000);
    }


    $scope.ingreso = {
        id:0,
        fecha:null,
        cedula:null,
        nombre:null,
        direccion:null,
        usuario:null,
        estado:1
    }

    $scope.guardar = function () {

        if($scope.q==null || $scope.q==""){
            alert("DEBES INGRESAR EL NUMERO DE DOCUMENTO");
            return;
        }

        if($scope.nombre==null || $scope.nombre==""){
            alert("DEBES INGRESAR EL NOMBRE");
            return;
        }

        $scope.ingreso.cedula = $scope.q;
        $scope.ingreso.nombre = $scope.nombre;
        $scope.ingreso.direccion = $scope.direccion;

        HoldOn.open({
            theme:'sk-bounce',
            message:"<strong>GUARDANDO DATOS...</strong>"
        });
        $http.post(kConstant.url+"ingresosPais/addEntity/",$scope.ingreso).
        then(function(response){
            HoldOn.close();
            $scope.ingreso = {
                id:0,
                fecha:null,
                cedula:null,
                nombre:null,
                direccion:null,
                usuario:null,
                estado:1
            }
            $scope.q = null;
            $scope.nombre = null;
            $scope.documento = null;
            alert("INGRESADO CORRECTAMENTE!");
            $("#form-change").modal('toggle');

            console.log(response.data);
        });

    }

    $scope.visible = "none";
    $scope.salir = function () {
        $scope.ingreso = {
            id:0,
            fecha:null,
            cedula:null,
            nombre:null,
            direccion:null,
            usuario:null,
            estado:1
        }
        $scope.q = null;
        $scope.nombre = null;
        $scope.documento = null;
        $("#form-change").modal('toggle');

    }

    $scope.salirConsulta = function () {
        $scope.q_c = null;
        $scope.nombre_c = null;
        $scope.documento_c = null;
        $("#form-consulta").modal('toggle');

    }

});