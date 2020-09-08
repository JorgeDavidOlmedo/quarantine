
$(function(){

    $('.myDate').datetimepicker({
        format: 'YYYY-MM-DD'
       //format: 'HH-mm-ss'
    });

    $('.fechaOnly').datetimepicker({
        format: 'DD/MM/YYYY'
        //format: 'HH-mm-ss'
    });

    $('.myTime').datetimepicker({
        format: 'HH:mm'
       //format: 'HH-mm-ss'
    });
});