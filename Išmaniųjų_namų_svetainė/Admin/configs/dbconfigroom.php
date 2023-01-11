
<?php
require "dbconfigData.php";
$query = "select Date, TempInside as 'Tnamai', HumInside as 'Huminside' from collecteddata.collecteddata where Date = (select max(Date) from collecteddata.collecteddata)";
$res = mysqli_query($conn,$query);
$data = mysqli_fetch_array($res);

?>
