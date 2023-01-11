



<?php

//Include config file
require_once "../configs/dbconfigData.php";
    
    if(!$conn)
    {
        echo"Klaida prisijugiant";
    }
    $query = "SELECT AVG(`TempInside`)as `VidNamai`,MAX(`Date`)as`data` FROM `collecteddata`";
    $res = mysqli_query($conn,$query);
    $data = mysqli_fetch_array($res);
    
    
    echo"Temperatūrų vidurkis namuose: " ;
    echo round($data['VidNamai'],2,PHP_ROUND_HALF_UP);
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
    $query = "select `TempInside`as `Mnamai`,Date as`data` from`collecteddata` where `TempInside`=(select min(`TempInside`) from collecteddata)";
    $res = mysqli_query($conn,$query);
    $data = mysqli_fetch_array($res);
    echo"Mažiausia temperatūra namuose: " .$data['Mnamai'];
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
    $query = "select `TempInside`as `Dnamai`,Date as`data` from`CollectedData` where `TempInside`=(select MAX(`TempInside`) from CollectedData)";
    $res = mysqli_query($conn,$query);
    $data = mysqli_fetch_array($res);
    echo"Didžiausia temperatūra namuose: " .$data['Dnamai'];
    echo"°C";
?>
<br>
<?php
    echo"Fiksuota:  " .$data['data'];
   
        
        ?>
