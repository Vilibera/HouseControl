
<?php
require_once "../../configs/dbconfigData.php";
    
    if(!$conn)
    {
        echo"Klaida prisijugiant";
    }
    $query = "select Date, TempInside as 'Tnamai' from collecteddata.collecteddata where Date = (select max(Date) from collecteddata.collecteddata)";
    $res = mysqli_query($conn,$query);
    $data = mysqli_fetch_array($res);
    
    
    echo"Temperatūra namuose: " ;
    ?>
    <br><br>
   <?php
echo  $data['Tnamai']."°C";
   
  ?>
<!--<h1 style="color:#751aff;"> Viduje  </h1> -->
<!--<h1 style="color:#751aff;"> < ?php echo $data['Tnamai'] ?> °C  </h1> -->
<br>