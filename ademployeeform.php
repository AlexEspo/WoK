<?php
  session_start();
  require 'addemployee.php';

  if($_SESSION['access'] == 'C'){
    require 'header.php';
  }
  else if($_SESSION['access'] == 'E'){
    require 'employeeheader.php';
  }
  else if($_SESSION['access'] == 'M'){
    require 'managerheader.php';
  }
  else if($_SESSION['access'] == 'A'){
    require 'adminheader.php';
  }

?>

<script type="text/javascript">
        var check = function() {
          if (document.getElementById('password').value ==
            document.getElementById('passwordVerify').value) {
            document.getElementById('message').style.color = 'green';
            document.getElementById('message').innerHTML = 'matching';
          } else {
            document.getElementById('message').style.color = 'red';
            document.getElementById('message').innerHTML = 'not matching';
          }
        }
        function checkAfterSubmit() {
            var emailfilter=/^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,4}|\d+)$/i;
            var email = document.getElementById('email').value;
            var validate = emailfilter.test(email);
            console.log("hello");
            if(validate){
                if(document.getElementById('password').value != document.getElementById('passwordVerify').value){
                    document.getElementById('errorLogin').innerHTML = 'Passwords need to match';
                    console.log("Hello World");
                 }
                else{
                    document.getElementById('addemployeeForm').submit();
                }
            }
            else{
                document.getElementById('errorLogin').style.color = 'red';
                document.getElementById('errorLogin').innerHTML = 'Put in valid information';
            }
        }
    </script>



<body> 
<form id = "addemployeeForm" action="addemployee.php" method="POST">
<div class="container"><br><br>
  <div class="row"> 
    <div class="col-auto" style = "float: none; margin: 0 auto;">
    <h1>Add Employee</h1> <p></p><p></p>
    <label for = "name">Name:</label><br> 
    <input type = "text" placeholder="Name" name = "Name" required>
    <p></p><p></p>
    <label>Birthdate:</label>
    <br>
    <input type ="date" name = "dob" required>    
    <p></p><p></p>
    <label for = "SSN">Social Security Number:</label><br>
    <input type = "text" placeholder="SSN" name = "SSN" id = "SSN" required>
    <p></p><p></p>
    <input onclick = "checkAfterSubmit()" class = "btn btn-primary btn-outline-success" type = "submit" value = "Add">
    </div>
    <div class="col-auto"style = "float: none; margin: 0 auto;"><br><br><br>
     <label for = "address">Address:</label>
    <br>
    <input type = "text" placeholder="Address" name = "Address" required>
    <br>
    <p></p><p></p>
    <label>Start Date:</label>
    <br>
    <input type ="date" name = "sd" required> 
    <br>
    <p></p><p></p>
    <label for = "Hourly_Pay">Hourly Pay:</label><br>
    <input type = "text" placeholder="$" name = "Hourly_Pay" id = "Hourly_Pay" required>
    <p></p><p></p>
    </div>
    <div class="col-auto"style = "float: none; margin: 0 auto;"><br><br><br>
    <label for = "username">Employee ID:</label><br>
    <input type = "text" placeholder="EMPID" name  = "empid" required>
    <br>
    <br>
    <label for="password">Password:</label><br>
    <input type = "password" placeholder="Password" name = "password" id = "password" onkeyup = "check()" required> 
    <p></p><p></p>
    <input type = "password" placeholder = "Enter Password again" name = "passwordVerify" id = "passwordVerify" onkeyup = "check()" required>
    <span id='message'></span>

     <span id = 'errorLog in'></span>

    </div>
  </div>
</div>
<br><br>

</form>


<form id = "deleteEmployee" action = "deleteemployee.php" method = "POST">
<div class="container" style = "margin-left: 28em;">
    <div class="col" style = "float: none; margin: 0 auto;">
    <h1>Delete Employee</h1> <p></p><p></p>
      <input type="text" class="col-xs-3" placeholder="EMPID" name = "dempid" >
      <br><br>
      <input class = "btn btn-primary btn-outline-danger" type = "submit" value = "Delete">
    </div>
  </div>
</form>



