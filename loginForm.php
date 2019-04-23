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
</head>
<body>
    <ul>
        <li><a href = "index.php">Home</a></li>
    </ul>
    <h1>Welcome Back!</h1>
    
    <div class = "loginBox">
        <h3>Login!</h3>
        <form action = "login.php" method = "POST">
                <input type = "text" placeholder="Username" name = "username" required>
                <input type = "password" placeholder="Password" name  = "password" required>
                <button type = "submit">LOGIN!</button>
        </form>
    </div>
</body>
</html>