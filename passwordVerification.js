$(index.html).ready(function(){
  $('#password, #passwordVerify').on('keyup', function () {
    if ($('#password').val() == $('#passwordVerify').val()) {
      $('#message').html('Matching').css('color', 'green');
    } else 
      $('#message').html('Not Matching').css('color', 'red');
  });

});

$(ademployeeform.php).ready(function(){
  $('#password, #passwordVerify').on('keyup', function () {
    if ($('#password').val() == $('#passwordVerify').val()) {
      $('#message').html('Matching').css('color', 'green');
    } else 
      $('#message').html('Not Matching').css('color', 'red');
  });

});