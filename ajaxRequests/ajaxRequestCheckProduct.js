$(document).ready(function(){
  $("#check").click(function(){
        $.ajax({
            type: "POST",
            url: '../AddDeleteProducts/delete_product.php',
            data: {'productID': $("#product_ID").val()},
            success: function(data){
                $("#checkproduct").html(data);
            },
            error: function(xhr, desc, err) {
                console.log(xhr);
                console.log("Details: " + desc + "\nError:" + err);
            }
        });
    });
});