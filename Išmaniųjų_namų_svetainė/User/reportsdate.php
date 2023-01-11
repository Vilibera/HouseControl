<?php

//Include config file
require_once "../configs/dbconfigData.php";  
    if(!$conn)
    {
        echo"Klaida prisijugiant";
    }
    $query = "select MAX(`Date`) as `data` FROM collecteddata";
    $res = mysqli_query($conn,$query);
    $data = mysqli_fetch_array($res);
    ?>

<?php echo "Paskutinį karta skanuota: " .$data['data']; ?>