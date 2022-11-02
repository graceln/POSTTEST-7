$(document).ready(function(){
    $("#live-search").keyup(function(){

        var input = $(this).val();
        // alert(input);
        if(input != ""){
            $.ajax({

                url:"dashboard2.php",
                method:"POST",
                data:{input:input},

                success:function(data){
                    $("#hasil").html(data);
                }
            });
        } else {
            $("#hasil").css("display", "none");
        }
    });
});