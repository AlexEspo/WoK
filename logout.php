<?php
session_start();
session_unset();
session_destroy();
?>

<body onload="logout()">
  <script>
    function logout() {
        alert("Successfully logged out!");
        
        window.location.href = "loginForm.php";
  }
  </script>

</body>
