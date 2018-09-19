var main_fun={
    INICIO:function () {
        main_fun.EVENTS();
    },
    EVENTS:function () {
        $("#select_cli").on("change", main_fun.LOGIC.data);
    },
    LOGIC:{
        data:function (){
            $data = {};
            $("#total_limit").html("");
            $("#cant_clientes").html("");
            $data.id = $(this).val();
            $data._csrf = $("#form-token").val();
            $.post(URL_AJAX+'employees/credit-limi-for-employe', $data, function (res){
                val = JSON.parse(res);
                console.log(val);
                $("#total_limit").html(val[0].creditLimit);
            });
            
            $.post(URL_AJAX+'suma-clientes', $data, function (){
                
            });
        }
    }
}
$(document).ready(main_fun.INICIO);