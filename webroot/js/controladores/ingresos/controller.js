/**
 * Created by jorge on 1/15/19.
 */

var app = angular.module('contalapp');
app.controller('ingresosIndex',function ($scope,kConstant,$http,$window,$filter,$timeout) {

    $scope.ingresos = [];
    $scope.getIngresos = function(){
        $http.get(kConstant.url+"ingresosPais/getIngresos/0").
        then(function(response) {
            $scope.ingresos = response.data.ingresos;
            setTimeout(function(){  $("#search").focus(); }, 500);
        });
    }

    $scope.getIngresosBusqueda = function(){
        var search = $("#search").val();
        if(search==null || search==""){
            search = 0;
        }
        $http.get(kConstant.url+"ingresosPais/getIngresos/"+search).
        then(function(response) {
            $scope.ingresos = response.data.ingresos;
            setTimeout(function(){  $("#search").focus(); }, 500);
        });
    }

    $scope.getIngresos();

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








