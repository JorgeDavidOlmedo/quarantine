/**
 * Created by jorge on 1/15/19.
 */
var app = angular.module('contalapp');
app.controller('cobrosIndex',function ($scope,kConstant,$http,$window,$filter,$timeout,cobrosByTerm,clientesByTerm) {

    $scope.agregarCobro = function(){
        $window.location.href = kConstant.url+"cobros/add/";
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
            descripcion:"Imprimir"
        }
    ];
    $scope.selected = $scope.estados[0];


    $scope.imprimir_ticket = function (id) {
        window.open(
            kConstant.url+"cobros/printComprobante/"+id,
            '_blank' // <- This is what makes it open in a new window.
        );
    }

    $scope.accion = function (label,id) {
        console.log(label);

        if(label.descripcion=="Imprimir"){
            $scope.imprimir_ticket(id);
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
                $http.post(kConstant.url+"cobros/deleteEntity/"+id).
                then(function(response){
                    console.log(response.data);
                    if(response.data.message=="pendiente"){
                        swal("Atencion!", "No se puede anular la compra. posee una deuda pendiente.", "warning");
                        return;
                    }
                    if(response.data.message=="ok"){
                        swal("Eliminado!", "El registro se elimino correctamente.", "success");
                        $timeout(function () {
                            $window.location.href = kConstant.url+"cobros/index/"
                        }, 1000);
                    }
                },function (response) {
                    console.log(response);
                });
            });
        }
    }

    $scope.cobro='';
    $scope.cobros = function(compraValue){
        console.log(compraValue);
        var futureEmpresas = cobrosByTerm.async(compraValue);
        return futureEmpresas.then(function (response){
            return response.data.cobros;
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
            $window.location.href = kConstant.url+"cobros/view/"+id;
        }

    }

    $("#search").focus();

});

app.controller('cobrosAdd',function ($scope,kConstant,$http,$window,$filter,$timeout,clientesByTerm) {

    String.prototype.replaceAll = function(str1, str2, ignore)
    {
        return this.replace(new RegExp(str1.replace(/([\/\,\!\\\^\$\{\}\[\]\(\)\.\*\+\?\|\<\>\-\&])/g,"\\$&"),(ignore?"gi":"g")),(typeof(str2)=="string")?str2.replace(/\$/g,"$$$$"):str2);
    }


    $scope.visible = "none";
    $scope.visibleCheque = "none";
    $scope.set_tipo_pago = null;
    $scope.totalForma = 0;

    $scope.getCuentasCorrientes = function(){

        var id_cuenta  = $("#cuenta").val();
        $http.get(kConstant.url+"CuentasFondos/getEntityById/"+id_cuenta).
        then(function(response){
            var valor = response.data.cuentas[0];
            console.log(valor);
            $("#ctacte").val(valor.id_cuenta_corriente);
            $scope.set_tipo_pago = valor.tipo;
            if(valor.tipo=="efectivo"){
                $scope.visible = "none";
                $scope.visibleCheque = "none";
            }else{
                if(valor.tipo=="cheque"){
                    $scope.visible = "block";
                    $scope.visibleCheque = "block";
                }else{
                    $scope.visible = "block";
                    $scope.visibleCheque = "none";
                }
            }

        });

    }
    $( "#cuenta" ).change(function() {
        $scope.getCuentasCorrientes();
    });

    $scope.getCuentasCorrientes();

    var hoy = new Date();
    $scope.inicializarCobro = function () {
        $scope.detalleCliente=[];
        $scope.anticipoClientes=[];
        $scope.movimientoCuentaFondo=[];
        $scope.cuentaAnticipos=[];
        $scope.updateAnticipo=[];
        $scope.sumTotal = 0;
        $scope.totalFactura = 0;
        $scope.totalDeuda = 0;
        $scope.visible = "none";
        $scope.cobro = {
            id:0,
            fecha:hoy,
            id_empresa:0,
            documento:"",
            id_moneda:0,
            id_local:0,
            id_cliente:0,
            tipo_cambio:1,
            total:0,
            estado:1,
            detalles_cobros:$scope.detalleCobro,
            movimiento_cuentas_fondos : $scope.movimientoCuentaFondo,
            anticipo_clientes:[],
            update_ancitipo:[]
        }
        $("#documento").focus();
        // console.log($scope.pago);
    }
    $scope.inicializarCobro();
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
            var nombre  = $( "#cliente" ).val();
            $( "#descripcion" ).val(nombre.trim() );
            setTimeout(function(){ $( "#documento" ).focus(); }, 500);
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
    $('#vencimiento').val($scope.formatDateDMY(date));
    $("#cliente").focus();

    $scope.estadoPago = [
        {
            id:0,
            descripcion:"Acciones"
        },
        {
            id:0,
            descripcion:"Quitar"
        }
    ];
    $scope.selectedEstado = $scope.estadoPago[0];


    $scope.accionEstado = function (label,id) {
        console.log(label);
        if(label.descripcion=="Quitar"){
            $scope.removeRowCuentaFondo(id);
        }

    }

    $scope.removeRowCuentaFondo = function(id){
        $scope.formas.splice( id, 1 );
        $scope.sumatoriaForma();
    }


    $scope.sumatoria = function () {
        var index = -1;
        var comArr = eval( $scope.detalleCobro);
        var monto = 0;
        var deuda = 0;


        for( var i = 0; i < comArr.length; i++ ) {
            var m = comArr[i].payment;
            var d = comArr[i].monto;

            if(m!="0"){
                m = m.replaceAll(".","");
                m = m.replaceAll(",",".");
            }

            if(d!="0"){
                d = d.replaceAll(".","");
                d = d.replaceAll(",",".");
            }
            //m = m.replaceAll(".","");
            //m = m.replaceAll(",",".");
            //d = d.replaceAll(".","");
            //d = d.replaceAll(",",".");
            //.log(m+" - "+d);
            m = new Number(m);
            d = new Number(d);

            monto = monto + (m);
            deuda = deuda + + (d);
        }
        if(monto == null || monto == "" || isNaN(monto)){
            $scope.totalFactura = 0;
            $scope.totalDeuda = 0;
        }else{
            $scope.totalFactura = monto;
            $scope.totalDeuda = deuda;
        }

    };

    $scope.detalleCobro = [];
    $scope.consultarDeuda = function(){

        $scope.detalleCobro = [];
        var cantidad_cuota = $("#cant_cuota").val();
        if(cantidad_cuota==""){
            cantidad_cuota = 0;
        }

        if($scope.cliente==null || $scope.cliente==""){
            toastr.error('Debes ingresar un cliente valido.','Notificación!');
            $( "#proveedor" ).focus();
            return false;
        }
        if($scope.cliente.descripcion==null || $scope.cliente.descripcion==""){
            toastr.error('Debes ingresar un cliente valido.','Notificación!');
            $( "#proveedor" ).focus();
            return false;
        }
        if($('#moneda').val()==null ||$('#moneda').val()==""){
            toastr.error('Debes seleccionar la moneda.','Notificación!');
            $( "#moneda" ).focus();
            return false;
        }
        var id_moneda = $('#moneda').val();
        var nro_factura = $('#nro-factura').val();
        if(nro_factura==""){
            nro_factura = 0;
        }

        HoldOn.open({
            theme:'sk-circle',
            message:"<strong>Esperando respuesta de contalapp.com...</strong>"
        });

        $http.get(kConstant.url+"cobros/getDeudasClientes/"+$scope.cliente.id+"/"+id_moneda+"/"+nro_factura+"/"+cantidad_cuota).
        then(function(response){

            HoldOn.close();

            console.log(response.data);
            if(response.data.detalleCobro==null || response.data.detalleCobro==""){
                $scope.deudaPendiente = "block";
            }else{
                $scope.deudaPendiente = "none";
                // console.log(response.data.detalleCobro);
                $scope.detalleCobro = response.data.detalleCobro;
                // console.log($scope.detalleCobro);
                $.each(response.data.detalleCobro, function(i,items){
                    //   console.log(items.monto_pagar);
                    $scope.detalleCobro[i].payment = items.monto_pagar;
                    $scope.detalleCobro[i].index = i;
                });
                $scope.sumatoria();
                $scope.cobro.detalles_cobros = $scope.detalleCobro;
                if(response.data.cuentaAnticipo==null || response.data.cuentaAnticipo==""){
                    $scope.estadoAnticipo="none";
                }else{
                    $scope.cuentaAnticipos = response.data.cuentaAnticipo;
                    // console.log($scope.cuentaAnticipos);

                    $.each(response.data.cuentaAnticipo, function(i,items){
                        $scope.cuentaAnticipos[i].index = i;
                    });
                    $scope.estadoAnticipo="block";
                }

                $scope.monto_inicial();
            }
        },function (response) {
            //console.log(response.data);
        });
    };

    $scope.removeRow = function(id){
        var index = -1;
        var comArr = eval( $scope.detalleCobro);
        for( var i = 0; i < comArr.length; i++ ) {
            if( eval(comArr[i].index) === eval(id)) {
                index = i;
                break;
            }
        }
        $scope.detalleCobro.splice( index, 1 );
        $scope.formas = [];
        $scope.sumatoria();
        $scope.totalCuentaFondo = 0;
        $scope.monto_inicial();
    };

    $scope.monto_inicial = function(){
        var totalCuenta = numeral($scope.totalFactura).format('0,0.[00]');
        //iva5 = (iva5 || '').split(',').join('.');
        totalCuenta = totalCuenta.replaceAll(".","_");
        totalCuenta = totalCuenta.replaceAll(",",".");
        totalCuenta = totalCuenta.replaceAll("_",",");
        $("#monto_cuenta").val(totalCuenta);
    }

    $scope.verificar = function(index){

        var monto = $scope.detalleCobro[index].monto;
        monto = monto.replaceAll(".","");
        monto = monto.replaceAll(",",".");
        var payment = $scope.detalleCobro[index].payment;
        if(payment!="0"){
            payment = payment.replaceAll(".","");
            payment = payment.replaceAll(",",".");
        }
        monto = new Number(monto);
        payment = new Number(payment);


        $scope.sumatoria();
        if((payment)>(monto)){
            toastr.error('El monto a pagar no puede superar el monto de la dueda.','Notificación!');
            $scope.detalleCobro[index].payment = $scope.detalleCobro[index].monto;
            $scope.sumatoria();
            return false;
        }
        $scope.monto_inicial();
    };

    $scope.openForma = function(){
        $("#form-forma").modal();
        setTimeout(function(){ $( "#monto" ).focus(); }, 500);
    }

    $scope.formas = [];
    $scope.sumatoriaForma = function () {
        var index = -1;
        var comArr = eval( $scope.formas);
        var total = 0;
        for( var i = 0; i < comArr.length; i++ ) {
            total = total + new Number(comArr[i].debe);
        }
        total = Math.round(total);
        $scope.totalForma = total;

    };

    $scope.formasPagos = [];
    $scope.agregarForma = function(){
        if($("#monto").val()==null || $("#monto").val()=="" ||  $("#monto").val()==0){
            toastr.error('Debes ingresar el monto.','Notificación!');
            $( "#monto" ).focus();
            return false;
        }
        if($scope.totalFactura<=0){
            toastr.error('Debes ingresar al menos un cobro.','Notificación!');
            $( "#monto" ).focus();
            return false;
        }

        var select = $("#cuenta").val();
        var descrip = $( "#cuenta option:selected" ).text();


        var fecha = $("#vencimiento").val();
        fecha = fecha.split("/");
        fecha = fecha[2]+'-'+fecha[1]+'-'+fecha[0];


        var fecha_hoy = $("#fecha").val();
        fecha_hoy = fecha_hoy.split("/");
        fecha_hoy = fecha_hoy[2]+'-'+fecha_hoy[1]+'-'+fecha_hoy[0];

        var monto = $("#monto").val();
        monto = monto.replaceAll(".","",monto);
        var documento = null;

        var cuenta_corriente = null;
        if($scope.set_tipo_pago=="efectivo"){
            cuenta_corriente = null;
            fecha = null;
            documento = "00";
        }else{
            cuenta_corriente = $("#ctacte").val();
            documento = $("#nro-comprobante").val();
        }



        var c = {

            id_cuenta_fondo :select,
            descripcion: descrip,
            nro_cheque:documento,
            id_banco:14,
            descrip_banco:"sin datos",
            nro_vaucher:"sin datos",
            cuenta_bancaria:"sin datos",
            id_cuenta_corriente:cuenta_corriente,
            documento:documento,
            fecha : fecha,
            debe:monto,
            haber:0,
            id_empresa: $('#empresa').val(),
            estado:1
        }
        $scope.formas.push(c);

        var forma_string = descrip;
        forma_string = forma_string.toLowerCase();
        var x = {
            id:0,
            fecha:fecha_hoy,
            descripcion:descrip,
            forma:forma_string,
            documento:"00",
            monto:monto
        }
        $scope.formasPagos.push(x);

        $("#monto").val("");
        $("#nro-comprobante").val("");
        $scope.visible="none";
        $scope.visibleCheque="none";
        $("#cuenta").val($("#cuenta option:first").val());
        $scope.sumatoriaForma();
        $("#form-forma").modal('hide');

    }

    $scope.verificar_campos = function () {

        if($('#moneda').val()==null ||$('#moneda').val()==""){
            toastr.error('Debes seleccionar la moneda.','Notificación!');
            $( "#moneda" ).focus();
            return false;
        }

        if($scope.cliente==null || $scope.cliente==""){
            toastr.error('Debes ingresar un cliente valido.','Notificación!');
            $( "#cliente" ).focus();
            return false;
        }
        if($scope.cliente.descripcion==null || $scope.cliente.descripcion==""){
            toastr.error('Debes ingresar un cliente valido.','Notificación!');
            $( "#cliente" ).focus();
            return false;
        }

        if($scope.detalleCobro.length<=0){
            toastr.error('Debes ingresar al menos un cobro.','Notificación!');
            $( "#cliente" ).focus();
            return false;
        }

        if($scope.formas.length<=0){
            toastr.error('Debes ingresar la cuenta de fondo.','Notificación!');
            $( "#nro-factura" ).focus();
            return false;
        }


        if( $scope.totalForma < $scope.totalFactura){
            toastr.error('El monto de la cuenta de fondo no puede ser menor al total de la factura.','Notificación!');
            $( "#nro-factura" ).focus();
            return false;
        }

        if( $scope.totalForma > $scope.totalFactura){
            toastr.error('El monto de la cuenta de fondo no puede ser menor al total de la factura.','Notificación!');
            $( "#nro-factura" ).focus();
            return false;
        }

        return true;
    }

    $scope.dti=  new Date();
    $scope.dtf = new Date();

    $scope.guardar = function (){
        if($scope.verificar_campos()){
            var fecha = $("#fecha").val();
            fecha = fecha.split("/");
            fecha = fecha[2]+'-'+fecha[1]+'-'+fecha[0];
            $scope.cobro.fecha = fecha;
            $scope.cobro.id_empresa = $('#empresa').val();
            $scope.cobro.documento = $('#documento').val();
            $scope.cobro.id_moneda= $('#moneda').val();
            $scope.cobro.id_local=$('#local').val();
            $scope.cobro.id_cliente = $scope.cliente.id;
            $scope.cobro.tipo_cambio = 1;
            $scope.cobro.detalles_cobros = $scope.detalleCobro;
            if($scope.formas.length>0){
                $scope.cobro.movimiento_cuentas_fondos = $scope.formas;
            }
            $scope.cobro.es_anticipo = "no";
            $scope.cobro.total = $scope.totalFactura;
            var payment = 0;
            for(var ii = 0;ii<$scope.cobro.detalles_cobros.length;ii++){
                payment =$scope.cobro.detalles_cobros[ii].payment;
                payment = payment.replaceAll(",","_");
                payment = payment.replaceAll(".","");
                payment = payment.replaceAll("_",".");
                $scope.cobro.detalles_cobros[ii].monto = payment;
                $scope.cobro.detalles_cobros[ii].monto_pagar = payment;
                $scope.cobro.detalles_cobros[ii].payment = payment;
            }
            var monto_cuenta = 0;
            for(var ii = 0;ii<$scope.cobro.movimiento_cuentas_fondos.length;ii++){
                monto_cuenta = $scope.cobro.movimiento_cuentas_fondos[ii].debe;
                monto_cuenta = monto_cuenta.replaceAll(",","_");
                monto_cuenta = monto_cuenta.replaceAll(".","");
                monto_cuenta = monto_cuenta .replaceAll("_",".");
                $scope.cobro.movimiento_cuentas_fondos[ii].debe = monto_cuenta;

            }
            console.log($scope.cobro);

            HoldOn.open({
                theme: 'sk-circle',
                message: "<strong>Esperando respuesta del servidor...</strong>"
            });

            var id_apertura = $("#apertura").val();
            $http.post(kConstant.url+"cobros/addEntity/"+$scope.formatDate($scope.dtf)+"/"+id_apertura,$scope.cobro).
            then(function(response){
                // console.log(response);
                if(response.data.mensaje="ok"){
                    $window.location.href = kConstant.url+"cobros/index";
                }else{
                    toastr.error('No se pudo guardar el cobro.','Notificación!');
                    $( "#documento" ).focus();
                }

            },function (response) {
                //console.log(response);
            });

        }
    }

    $scope.buscar_deuda = function (nro_factura,id_cliente) {

        if(id_cliente>0){
            $http.get(kConstant.url+"cobros/getCliente/"+id_cliente).
            then(function(response){
                    console.log(response.data);
                    $scope.cliente = response.data.cliente[0];
                    $("#nro-factura").val(nro_factura);
                    setTimeout(function(){ $('#buscar').trigger('click'); }, 500);

            });
        }

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
        //input.value = input.value.replace(/[^\d\.]*/g,'');
    }
}



