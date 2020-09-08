/**
 * Created by jorge on 1/15/19.
 */

var app = angular.module('contalapp');
app.controller('pedidosIndex',function ($scope,kConstant,$http,$window,$filter,$timeout,pedidosByTerm,facturasByTerm) {


    $scope.initMap = function(locations){

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 11,
            center: new google.maps.LatLng(-25.2968361,-57.6681296,12),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var infowindow = new google.maps.InfoWindow();

        var marker, i;

        for (i = 0; i < locations.length; i++) {
            console.log(locations[i][4]);
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                icon: {
                    url: locations[i][4]
                },
                map: map
            });

            var infowindow = new google.maps.InfoWindow();
            infowindow.setContent(locations[i][0]);
            infowindow.open(map, marker);

            //infowindow.setContent(locations[i][0]);
            //infowindow.open(map, marker);

            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infowindow.setContent(locations[i][0]);
                    infowindow.open(map, marker);
                }
                //infowindow.open(map,marker);
            })(marker, i));

        }


        //google.maps.event.addDomListener(window, 'load', initialize);
        //google.maps.event.addDomListener(window, 'load', map);
    }

    $scope.getValores = function(){

        var fecha = $("#hasta").val();
        fecha = fecha.split("/");
        fecha = fecha[2]+"-"+fecha[1]+"-"+fecha[0];
        console.log(kConstant.url+"Pedido-ventas/getValores/"+fecha);
        $http.get(kConstant.url+"Pedido-ventas/getValores/"+fecha).
        then(function(response){
            console.log(response.data.resultado);
            /*var locations = [
                ['Bondi Beach', -25.369309,-57.512656, 4],
                ['<strong>Facturar A:</strong> Juan Velazquez<br>' +
                '<strong>Telefono:</strong>0961 244-066<br>' +
                '<strong>Fecha:</strong>08/02/2020<br>' +
                '<strong>Producto: </strong>1 X BARRIL DE 50 MUNICH', -25.3566472,-57.6235281, 5],
                ['Cronulla Beach', -25.341017, -57.611149, 3]
            ];*/
            var locations = response.data.resultado;
            $scope.initMap(locations);
        });
    }

    $('#hasta').on('dp.change', function(e){
        $scope.getValores();
    });

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

    $scope.getValores();

});



