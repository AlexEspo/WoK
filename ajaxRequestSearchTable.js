
$(document).ready(function(){
  $("#button").click(function(){
        $.ajax({
            type: "POST",
            url: 'searchedReceiptsTable.php',
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
                url: 'allReceiptsTable.php',
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