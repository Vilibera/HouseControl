



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
<hr>
<br><br>
<h1> Namų temperatūros </h1>
<?php
    
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
<br><br><br>
<h1> Namų drėgmės ataskaita</h1>
<?php
    
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
<h1> Lauko temperaūros ataskaita</h1>
    <?php
    
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