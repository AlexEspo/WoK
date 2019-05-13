$(document).ready(function(){
  $("#search").keyup(function(){
        $.ajax({
            type: "POST",
            url: '../Products/products.php',
            data: {'search': $("#search").val()},
            success: function(data){
                $("#Results").html(data);
            },
            error: function(xhr, desc, err) {
                console.log(xhr);
                console.log("Details: " + desc + "\nError:" + err);
            }
        });
    });
});