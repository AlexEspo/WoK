<!DOCTYPE html>

<html>
    <head>
        <style>
            .receiptContainer{
                border: 1px dotted black;
                width: 50%;
                margin: 0;
                display:inline-block;
            }
            td{
                float: right;
            }
            
        </style>
    </head>

    <body>


<html>
<head>
 <title>WoK</title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"></head>
 <script src="https://code.jquery.com/jquery-3.2.1.min.js">
        </script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<body>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="home.php">WoK</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="#">Kicks</a>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Account Options
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">Register</a>
            <a class="dropdown-item" href="#">Login</a>
            <a class="dropdown-item" href="#">Logout</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Admin Options
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">Modify products</a>
            <a class="dropdown-item" href="#">Add/Remove users</a> 
        </div>
      </li>
    </div>
  </div>

</nav>
    <h1>Your Receipts!</h1>
        <p>Input The Day You Bought a Product</p>
        <form action = "" method = "POST" name = "form">
            <input type = "date" name = "date" id = "date">
            <button type = "button" id = "button">Search</button>
            <button type = "button" id = "refresh">Get All Receipts</button>
        </form>
    <br>
        <div id = "searchedTable">
            
        </div>
        <br>
        <div id = "oldTable">
            
        </div>
    </body>
     <script src="ajaxRequestSearchTable.js"></script>
</html>