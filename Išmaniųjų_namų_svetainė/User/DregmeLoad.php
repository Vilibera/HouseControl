<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "Laikrodis4321";
$dbName = "SmartHouse";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

$sql = "SELECT * FROM `CollectedData`";
$result = mysqli_query($conn ,$sql);
$resultCheck = mysqli_num_rows($result);

?>
<h1> Namų drėgmės ataskaita</h1>
<?php
    
    if(!$conn)
    {
        echo"Klaida prisijugiant";
    }
    $query = "SELECT avg(`HumInside`) as `dregmevid`,MAX(`Date`)as `data` FROM `CollectedData`";
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
    $query = "select `HumInside`as `Ddregme`,max(`Date`)as`data` from`CollectedData` where `HumInside`=(select MAX(`HumInside`) from CollectedData)";
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
    $query = "select `HumInside`as `Mdregme`,max(`Date`)as`data` from`CollectedData` where `HumInside`=(select min(`HumInside`) from CollectedData)";
    $res = mysqli_query($conn,$query);
    $data = mysqli_fetch_array($res);
    echo"Maziausia drėgmės koncentracija namuose: " .$data['Mdregme'];
    echo"%";
   ?>
<br>
<?php
    echo"Fiksuota: " .$data['data'];
   
        
        ?>