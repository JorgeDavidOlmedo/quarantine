/**
 * Created by jorge on 1/15/19.
 */

var app = angular.module('contalapp');
app.controller('ingresosIndex',function ($scope,kConstant,$http,$window,$filter,$timeout) {

    $scope.ingresos = [];
    $scope.getIngresos = function(){
        $scope.datos = {
            libro:null
        }
        $http.post(kConstant.url+"ingresosPais/getIngresos",$scope.datos).
        then(function(response) {
            console.log(response.data);
            $scope.ingresos = response.data.ingresos;
            setTimeout(function(){  $("#search").focus(); }, 500);
        });
    }

    $scope.agregarBasutismo = function(){
        $window.location.href = kConstant.url+"bautismos2/add";
    }
    $scope.getIngresosBusqueda = function(){

        var libro = $("#libro").val();
        if(libro==null || libro==""){
            libro=null;
        }

        var folio = $("#folio").val();
        if(folio==null || folio==""){
            folio=null;
        }

        var numero = $("#numero").val();
        if(numero==null || numero==""){
            numero=null;
        }

        var de_don = $("#don").val();
        if(de_don==null || de_don==""){
            de_don=null;
        }

        var donha = $("#donha").val();
        if(donha==null || donha==""){
            donha=null;
        }


        $scope.datos = {
            libro:libro,
            folio:folio,
            numero:numero,
            de_don:de_don,
            donha:donha

        }
        $http.post(kConstant.url+"ingresosPais/getIngresos/",$scope.datos).
        then(function(response) {
            //console.log(response.data);
            $scope.ingresos = response.data.ingresos;
            //setTimeout(function(){  $("#libro").focus(); }, 500);
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








