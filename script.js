$(document).ready(function(){
    $("#live_search").keyup(function(){

        var input = $(this).val();
        //alert(input);

        if(input != ""){
            $.ajax({

                url:"livesearch.php",
                method:"POST",
                data:{input:input},

                sucess:function(data){
                    $("#searchresult").html(data);
                }
            });
        }else{
            $("#searchresult").css("display","none");
        }
    });
});