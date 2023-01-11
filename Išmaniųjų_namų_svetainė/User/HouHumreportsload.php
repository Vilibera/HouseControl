



<?php

//Include config file
require_once "../configs/dbconfigData.php";   
    if(!$conn)
    {
        echo"Klaida prisijugiant";
    }
    $query = "SELECT AVG(`HumInside`)as `dregmevid`,MAX(`Date`)as`data` FROM `collecteddata`";
    $res = mysqli_query($conn,$query);
    $data = mysqli_fetch_array($res);
    echo"Drėgmės koncentracijos vidurkis: " ;
    echo round($data['dregmevid'],2,PHP_ROUND_HALF_UP);
    echo"%";
    ?>
<br>
<?php
    echo"Fiksuota: " .$data['data'];
   
        
        ?>
<br><br>
<?php
    
    if(!$conn)
    {
        echo"Klaida prisijugiant";
    }
    $query = "select `HumInside`as `Ddregme`,Date as`data` from`CollectedData` where `HumInside`=(select MAX(`HumInside`) from CollectedData)";
    $res = mysqli_query($conn,$query);
    $data = mysqli_fetch_array($res);
    echo"Max drėgmės koncentracija namuose: " .$data['Ddregme'];
    echo"%";
    ?>
<br>
<?php
    echo"Fiksuota: " .$data['data'];
   
        
        ?>
<br><br>
<?php
    
    if(!$conn)
    {
        echo"Klaida prisijugiant";
    }
    $query = "select `HumInside`as `Mdregme`,Date as`data` from`CollectedData` where `HumInside`=(select min(`HumInside`) from CollectedData)";
    $res = mysqli_query($conn,$query);
    $data = mysqli_fetch_array($res);
    echo"Maziausia drėgmės koncentracija namuose: " .$data['Mdregme'];
    echo"%";
   ?>
<br>
<?php
    echo"Fiksuota: " .$data['data'];
   
        
        ?>
