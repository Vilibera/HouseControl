<?php
require "dbconfigDevices.php";
if(isset($_POST['StatusLock']))
{
    $Status = $_POST['StatusLock'];
    if($Status == 'Lockon'){
        $SQL = "INSERT INTO lights(DeviceName,status) VALUES('Lock','on')";
        $result = mysqli_query($conn ,$SQL);
    }
    else if ($Status == 'Lockoff'){
        $SQL = "INSERT INTO lights(DeviceName,status) VALUES('Lock','off')";
        $result = mysqli_query($conn ,$SQL);    
    }
}
if(isset($_POST['StatusFan']))
{
    $Status = $_POST['StatusFan'];
    if($Status == 'Fanon'){
        $SQL = "INSERT INTO lights(DeviceName,status) VALUES('Fan','on')";
        $result = mysqli_query($conn ,$SQL);
    }
    else if ($Status == 'Fanoff'){
        $SQL = "INSERT INTO lights(DeviceName,status) VALUES('Fan','off')";
        $result = mysqli_query($conn ,$SQL);    
    }
}
if(isset($_POST['StatusLedW']))
{
    $Status = $_POST['StatusLedW'];
    if($Status == 'LedWon'){
        $SQL = "INSERT INTO lights(DeviceName,status) VALUES('LedW','on')";
        $result = mysqli_query($conn ,$SQL);
    }
    else if ($Status == 'LedWoff'){
        $SQL = "INSERT INTO lights(DeviceName,status) VALUES('LedW','off')";
        $result = mysqli_query($conn ,$SQL);    
    }
}
if(isset($_POST['StatusLedB']))
{
    $Status = $_POST['StatusLedB'];
    if($Status == 'LedBon'){
        $SQL = "INSERT INTO lights(DeviceName,status) VALUES('LedB','on')";
        $result = mysqli_query($conn ,$SQL);
    }
    else if ($Status == 'LedBoff'){
        $SQL = "INSERT INTO lights(DeviceName,status) VALUES('LedB','off')";
        $result = mysqli_query($conn ,$SQL);    
    }
}
if(isset($_POST['StatusLedR']))
{
    $Status = $_POST['StatusLedR'];
    if($Status == 'LedRon'){
        $SQL = "INSERT INTO lights(DeviceName,status) VALUES('LedR','on')";
        $result = mysqli_query($conn ,$SQL);
    }
    else if ($Status == 'LedRoff'){
        $SQL = "INSERT INTO lights(DeviceName,status) VALUES('LedR','off')";
        $result = mysqli_query($conn ,$SQL);    
    }
}
if(isset($_POST['Statusrelay1']))
{
    $Status = $_POST['Statusrelay1'];
    if($Status == 'Relay1on'){
        $SQL = "INSERT INTO lights(DeviceName,status) VALUES('Relay1','on')";
        $result = mysqli_query($conn ,$SQL);
    }
    else if ($Status == 'Relay1off'){
        $SQL = "INSERT INTO lights(DeviceName,status) VALUES('Relay1','off')";
        $result = mysqli_query($conn ,$SQL);    
    }
}
if(isset($_POST['Statusrelay2']))
{
    $Status = $_POST['Statusrelay2'];
    if($Status == 'relay2on'){
        $SQL = "INSERT INTO lights(DeviceName,status) VALUES('Relay2','on')";
        $result = mysqli_query($conn ,$SQL);
    }
    else if ($Status == 'relay2off'){
        $SQL = "INSERT INTO lights(DeviceName,status) VALUES('Relay2','off')";
        $result = mysqli_query($conn ,$SQL);    
    }
}
if(isset($_POST['StatusLedG']))
{
    $Status = $_POST['StatusLedG'];
    if($Status == 'LedGon'){
        $SQL = "INSERT INTO lights(DeviceName,status) VALUES('LedG','on')";
        $result = mysqli_query($conn ,$SQL);
    }
    else if ($Status == 'LedGoff'){
        $SQL = "INSERT INTO lights(DeviceName,status) VALUES('LedG','off')";
        $result = mysqli_query($conn ,$SQL);    
    }
}       
?>
