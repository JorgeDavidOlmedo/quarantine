/**
 * Created by jorge on 1/15/19.
 */

var app = angular.module('contalapp');
app.controller('pedidosIndex',function ($scope,kConstant,$http,$window,$filter,$timeout) {

    $scope.agregarPedido = function(){
        $window.location.href = kConstant.url+"pedido-ventas/add/"
    }

    $scope.guardarBaustismo = function(){
        var libro = $("#libro").val();
        var folio = $("#folio").val();
        var numero = $("#numero").val();
        var bautizado = $("#bautizado").val();
        var fecha_bautismo = $("#fecha-bautismo").val();
        var presbitero = $("#presbitero").val();
        var nacido_en = $("#nacido-en").val();
        var fecha_nac = $("#fecha-nac").val();
        var hijo_don = $("#hijo-don").val();
        var hijo_donha = $("#hijo-donha").val();
        var padrino = $("#padrino").val();
        var madrina = $("#madrina").val();
        var nota_marginal = $("#obs").val();

        if(libro==null || libro==""){
            alert("Debes agregar el Libro");
            return;
        }

        if(folio==null || folio==""){
            alert("Debes agregar el Folio");
            return;
        }

        if(numero==null || numero==""){
            alert("Debes agregar el Numero");
            return;
        }

        if(bautizado==null || bautizado==""){
            alert("Debes agregar al Bautizado/a");
            return;
        }

        if(fecha_bautismo==null || fecha_bautismo==""){
            alert("Debes agregar la fecha del Bautismo");
            return;
        }

        if(presbitero==null || presbitero==""){
            alert("Debes agregar el presbitero");
            return;
        }

        if(nacido_en==null || nacido_en==""){
            alert("Debes agregar el lubar de Nacimiento");
            return;
        }

        if(fecha_nac==null || fecha_nac==""){
            alert("Debes agregar la fecha de Nac.");
            return;
        }

        fecha_bautismo = fecha_bautismo.split("/");
        fecha_bautismo = fecha_bautismo[2]+'-'+fecha_bautismo[1]+'-'+fecha_bautismo[0];

        fecha_nac = fecha_nac.split("/");
        fecha_nac = fecha_nac[2]+'-'+fecha_nac[1]+'-'+fecha_nac[0];

        var agregar = {
            id:0,
            libro:libro,
            folio:folio,
            numero:numero,
            dia_bautismo:fecha_bautismo,
            presbitero:presbitero,
            bautizo_a:bautizado,
            nacio_en:nacido_en,
            el_dia:fecha_nac,
            hijo:'lejitimo',
            de_don:hijo_don,
            donha:hijo_donha,
            padrino:padrino,
            madrina:madrina,
            nota_marginal:nota_marginal,
            estado:1

        }

        console.log(agregar);
        HoldOn.open({
            theme: 'sk-circle',
            message: "<strong>Esperando respuesta del servidor...</strong>"
        });

        $http.post(kConstant.url + "bautismos2/addEntity", agregar).
        then(function (response) {
            console.log(response.data);
            $window.location.href = kConstant.url+"bautismos2/index"
        });
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


