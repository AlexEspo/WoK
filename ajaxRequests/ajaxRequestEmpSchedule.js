$(document).ready(function(){
    $("#empSchedule").click(function(){
            $.ajax({
                type: "POST",
                url: '../Schedule/viewEmployeeSchedule.php',
                success: function(data){
                    $("#schedule").html(data);
                },
                error: function(xhr, desc, err) {
                    console.log(xhr);
                    console.log("Details: " + desc + "\nError:" + err);
                }
            });
        });
});