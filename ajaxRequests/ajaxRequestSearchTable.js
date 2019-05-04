$(document).ready(function(){
  $("#button").click(function(){
        $.ajax({
            type: "POST",
            url: '../Receipts/searchedReceiptsTable.php',
            data: {'date': $("#date").val()},
            success: function(data){
                $("#searchedTable").html(data);
            },
            error: function(xhr, desc, err) {
                console.log(xhr);
                console.log("Details: " + desc + "\nError:" + err);
            }
        });
    });
    $("#refresh").click(function(){
            $.ajax({
                type: "POST",
                url: '../Receipts/allReceiptsTable.php',
                success: function(data){
                    $("#searchedTable").html(data);
                },
                error: function(xhr, desc, err) {
                    console.log(xhr);
                    console.log("Details: " + desc + "\nError:" + err);
                }
            });
        });
});