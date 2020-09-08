/**
 * Created by jorge on 1/15/19.
 */

var app = angular.module('contalapp');
app.controller('comprasIndex',function ($scope,kConstant,$http,$window,$filter,$timeout,comprasByTerm) {

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
        }];
    $scope.selected = $scope.estados[0];

    $scope.accion = function (label,id) {
        console.log(label);
        if(label.descripcion=="Pagar"){
            alert("Accion no disponible");
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
                $http.post(kConstant.url+"compras/deleteEntity/"+id).
                then(function(response){
                    console.log(response.data);
                    if(response.data.message=="pendiente"){
                        swal("Atencion!", "No se puede anular la compra. posee una deuda pendiente.", "warning");
                        return;
                    }
                    if(response.data.message=="ok"){
                        swal("Eliminado!", "El registro se elimino correctamente.", "success");
                        $timeout(function () {
                            $window.location.href = kConstant.url+"compras/index/"
                        }, 1000);
                    }
                },function (response) {
                    console.log(response);
                });
            });
        }
    }

    $scope.compra='';
    $scope.compras = function(compraValue){
        console.log(compraValue);
        var futureEmpresas = comprasByTerm.async(compraValue);
        return futureEmpresas.then(function (response){
            return response.data.compras;
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
            $window.location.href = kConstant.url+"compras/view/"+id;
        }

    }

    $("#search").focus();

});



