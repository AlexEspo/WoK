<!DOCTYPE html>
<html>
<head>
 <title>Welcome to WoK</title>

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"></head>
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

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
                    document.getElementById('registerForm').submit();
                }
            }
            else{
                document.getElementById('errorLogin').style.color = 'red';
                document.getElementById('errorLogin').innerHTML = 'Put in valid information';
            }
        }
    </script>
</head>


<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="#">WoK</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="loginForm.php">Login</a>
      </li>
    </ul>
  </div>
</nav>


<br>
<br>



<form id = "registerForm" action="register.php" method="POST">
<div class="container">
  <div class="row"> 
    <div class="col-auto" style = "float: none; margin: 0 auto;">
    <h1>Register</h1><br>
    <label for = "name">Name:</label><br> 
    <input type = "text" placeholder="Name" name = "Name" required>
    <p></p><p></p>    
    <label for = "username">Username:</label><br>
    <input type = "text" placeholder="Username" name  = "username" required>
    <p></p><p></p>
    <label for = "email">Email address:</label><br>
    <input type = "email" placeholder="Email" name = "email" id = "email" required>
    <p></p><p></p>
    </div>
    <div class="col-auto"style = "float: none; margin: 0 auto;"><br><br><br>
    <label for="password">Password:</label><br>
    <input type = "password" placeholder="Password" name = "password" id = "password" onkeyup = "check()" required>
    <input type = "password" placeholder = "Enter Password again" name = "passwordVerify" id = "passwordVerify" onkeyup = "check()" required>
    <span id='message'></span>
    <br>
    <br>
    <label>Birthdate:</label>
    <br>
    <input type ="date" name = "dob" required>
    <br>
    <p></p>
    <label for = "address">Address:</label>
    <br>
    <input type = "text" placeholder="Address" name = "Address" required>
    <br>
    <p></p>
    <br>
     <span id = 'errorLogin'></span>
    </div>
  </div>
  <input onclick = "checkAfterSubmit()" class = "btn btn-primary" type = "submit" value = "Register">
</div>

</form>

</body>
</html>