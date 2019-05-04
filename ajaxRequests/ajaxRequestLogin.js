$(document).ready(function(){
    $("#login").click(function(){
            $.ajax({
                type: "POST",
                url: '../Login/login.php',
                data: {
                    'username': $("#username").val(), 
                    'password': $("#password").val()
                },
                success: function(data){
                    console.log(data);
                    $("#errorLogin").html(data);
                },
                error: function(xhr, desc, err) {
                    console.log(xhr);
                    console.log("Details: " + desc + "\nError:" + err);
                }
            });
        });
});