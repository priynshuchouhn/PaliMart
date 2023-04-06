$(document).ready(function(){
    // Check Current Password
    $("#current_password").keyup(function(){
        var current_password = $("#current_password").val();
        // alert(current_password);

        $.ajax({
            type:'post',
            url:'/admin/check-admin-password',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data:{current_password : current_password},
            success:function(resp){
               if(resp == "true"){
                $("#password_error").html("<font color='green'>Looks good!</font>")
            }else {
                $("#password_error").html("<font color='red'>Password is incorrect</font>")
               }
            },error:function(){
                console.log('error');
            }
        });

    });

});