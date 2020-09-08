/**
 * Created by jorge on 1/15/17.
 */

var app = angular.module('contalapp');
app.controller('menuIndex',function ($scope,kConstant,$http,$window,$filter,$timeout) {
    $scope.formatDate = function(date) {

        var d = new Date(date || Date.now()),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();

        if (month.length < 2) month = '0' + month;
        if (day.length < 2) day = '0' + day;

        return [year,month,day].join('-');
    }

});



