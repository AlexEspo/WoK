<?php
 
    $db = "wingmat_WoK";
    $local = "localhost";
    $dbuser = "wingmat_Matt";
    $dbpass = "Matthewwing98";
    
    $link = new mysqli($local, $dbuser, $dbpass, $db);
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $searchKey = "%{$_POST['search']}%";
    
    $sql = "SELECT * FROM Sneaker_Type WHERE SneakerName LIKE ?";
    // $result = mysqli_query($link, $sql);
    $query = $link->prepare($sql);
    $query->bind_param('s', $searchKey);
    $query->execute();
    $result = $query->get_result();
    if(mysqli_num_rows($result) == 0){
        echo "<h3>There are no shoes like that</h3>";
    }else{
        while($row = mysqli_fetch_assoc($result)){
            echo "<div class='card' style='width: 35rem; margin: 0 auto;'>
            <img class='card-img-top' src= ../pics/" . $row['image_path'] . " alt='Card image cap' style = 'height: 30rem; width: 32rem;'>
            <div class='card-body>
                <h5 class='card-title'>" . $row['SneakerName'] . "</h5>
                <p class='card-text'>" . '<span>Price:</span>'. ' ' . '$' .$row['Price'] . "</p>
                <p class='card-text'>" . '<span>Size:</span>'. ' ' .$row['Size'] . "</p>
                <p class='card-text'>" . '<span>Quantity:</span>'. ' '. $row['Quantity']. "</p>
                <a href='#' class='btn btn-primary'>Add to Cart</a>
            </div>
            </div>";
        }    
    }
    
?>