


<?php

//Include config file
require_once "../configs/dbconfigData.php"; 
    if(!$conn)
    {
        echo"Klaida prisijugiant";
    }
    $query = " SELECT AVG(`TempOutside`)as `Vidlaukas`,MAX(`Date`)as`data` FROM `collecteddata`";
    $res = mysqli_query($conn,$query);
    $data = mysqli_fetch_array($res);
    
    
    echo"Temperatūrų vidurkis lauke: " ;
    echo round($data['Vidlaukas'],2,PHP_ROUND_HALF_UP);
    echo"°C";
  ?>
<br>
<?php
    echo"Fiksuota:  " .$data['data'];
?>
<br><br>
<?php
    
    if(!$conn)
    {
        echo"Klaida prisijugiant";
    }
    $query = "select `TempOutside`as `Mlaukas`,Date as`data` from`CollectedData` where `TempOutside`=(select MIN(`TempOutside`) from CollectedData)";
    $res = mysqli_query($conn,$query);
    $data = mysqli_fetch_array($res);
    echo"Mažiausia temperatūra lauke: " .$data['Mlaukas'];
    echo"°C";
?>
<br>
<?php
    echo"Fiksuota:  " .$data['data'];
   
        
        ?>
<br><br>
 <?php
    
    if(!$conn)
    {
        echo"Klaida prisijugiant";
    }
    $query = "select `TempOutside`as `Dlaukas`,Date as`data` from`CollectedData` where `TempOutside`=(select MAX(`TempOutside`) from CollectedData)";
    $res = mysqli_query($conn,$query);
    $data = mysqli_fetch_array($res);
    echo"Didžiausia temperatūra lauke: " .$data['Dlaukas'];
    echo"°C";
?>
<br>
<?php
    echo"Fiksuota:  " .$data['data'];
   
        
        ?>