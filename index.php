<!DOCTYPE html>
<html>

<head>
    <title>Welcome to WoK</title>
    <style>
            body{
                margin: 0
            }
            ul {
              list-style-type: none;
              margin: 0;
              padding: 0;
              overflow: hidden;
              background-color: #034f84;
            }
            
            li {
              float: left;
            }
            
            li a {
              display: block;
              color: white;
              text-align: center;
              padding: 14px 16px;
              text-decoration: none;
            }
            
            li a:hover:not(.active) {
              background-color:#92a8d1;
            }
            
    </style>
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
    <ul>
        <li><a href = "index.php">Home</a></li>
        <li><a href = "loginForm.php">Login</a></li>
    </ul>
    <h1>Welcome to World of Kicks or W.O.K.</h1>
    
    <div class = "registerBox">
        <h3>Register Here!</h3>
        <form id = "registerForm"action = "register.php" method = "POST">
                <input type = "text" placeholder="Name" name = "Name" required>
                <br>
                <input type = "text" placeholder="Username" name  = "username" required>
                <br>
                <input type = "password" placeholder="Password" name = "password" id = "password" onkeyup = "check()" required>
                <input type = "password" placeholder = "Enter Password again" name = "passwordVerify" id = "passwordVerify" onkeyup = "check()" required>
                <span id='message'></span>
                <br>
                <input type = "email" placeholder="Email" name = "email" id = "email" required>
                <p>BirthDate: <input type ="date" name = "dob" required></p>
                <input type = "text" placeholder="Address" name = "Address" required>
                <input onclick = "checkAfterSubmit()" type = "submit" value = "Register">
                <br>
                <span id = 'errorLogin'></span>
        </form>
    </div>
    
</body>
</html>