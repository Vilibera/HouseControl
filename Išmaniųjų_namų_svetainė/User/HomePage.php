<?php
session_start();
if(!isset($_SESSION['Username']) || $_SESSION['Recognition']!="client")
{
    header("location: ../index.html");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Home Page</title>
    <!-- <meta http-equiv="refresh" content="10" > -->
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!--Php code includes -->
    <?php
    require_once '../configs/dbconfigcollecteddata.php';
    ?>
    <!-- Favicon -->
    
   
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
    
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>

        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="HomePage.php" class="tittle navbar-brand mx-4 mb-3">
                     <h3 class="text-primary" ><i class="fa fa-user-edit me-2"></i>SmartHouse</h3>

                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                   <div class="position-relative">
                        <img class="rounded-circle" src="../Images/username-icon.png" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?php echo $_SESSION["Name"]; ?></h6>
                        <span>User</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="Devices.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Devices</a>
                    <a href="HomePage.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="ToDo.php" class="nav-item nav-link"><i class="fa fa-laptop me-2"></i>Jobs</a>
                    <a href="widget.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Meteo</a>
                    <a href="form.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Data reports</a>
                    <a href="table.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>About</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="HomePage.php" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control bg-dark border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                      <?php echo date("D/Y/m/d"); ?>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="../Images/username-icon.png" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?php echo $_SESSION["Name"]; ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="myinfo.php" class="dropdown-item active">My Profile</a>
                            <a href="Settings.php" class="dropdown-item">Settings</a>
                            <a href="../index.html" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                  <div class="col-sm-6 col-xl-3">
                      <div class="test justify-content-between p-4">
                            <div class="ms-3">
                                <p class="mb-2">Room temperature</p>
                                <?php	echo '<h6 class="mb-2">'.$data['Tnamai'].'°C' .'</h6>';?>
                                <p class="mb-2">Room humidity</p>
                                <?php echo '<h6 class="mb-2">'.$data['Huminside'].'%' .'</h6>'; ?>
                            </div>
                      </div>
                </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="test justify-content-between p-4">

                            <div class="ms-3">
                                <p class="mb-2">Temperature outside</p>
                                <?php	echo '<h6 class="mb-2">'.$data['TempOutside'].'°C' .'</h6>';?>

								                <p class="mb-2">Humidity outside</p>
                              <?php  echo '<h6 class="mb-2">'. $result['forecastTimestamps'][3]['relativeHumidity'].'%' .'</h6>';?>


                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="test justify-content-between p-4">
                            <div class="ms-3">
                                <p class="mb-2">Wind outside</p>
                                  <?php  echo '<h6 class="mb-2">'. $result['forecastTimestamps'][3]['windSpeed'].'m/s' .'</h6>';?>

                                <p class="mb-2">Pressure</p>
                                    <?php  echo '<h6 class="mb-2">'. $result['forecastTimestamps'][3]['seaLevelPressure'].'mb' .'</h6>';?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="test justify-content-between p-4">

                            <div class="ms-3">
                                <p class="mb-2">Feels like</p>
                                <?php  echo '<h6 class="mb-2">'. $result['forecastTimestamps'][3]['feelsLikeTemperature'].'°C' .'</h6>';?>
                                <p class="mb-2">Condition</p>
                                <?php  echo '<h6 class="mb-2">'. $result['forecastTimestamps'][3]['conditionCode'] .'</h6>';?>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
         <!-- Modal start -->
 
            <div class="modal"  id="studentaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Insert new bill </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
           
                    <form action="InsertBill.php" method="POST">
           
                        <div class="modal-body">
                            <div class="form-group">
                                <label> Bill Name </label>
                                <select class="" name="BillName"  id="BillName">
                                   <option value="Rental" selected="">Rental</option>
                                   <option value="Water" >Water</option>
                                   <option value="Gas" >Gas</option>
                                   <option value="Power" >Power</option>
                               </select>
                            </div>
           
                            <div class="form-group">
                                <label> Month Name </label>
                                <select class="" name="Month"  id="Month">
                                   <option value="January" selected="">January</option>
                                   <option value="February" >February</option>
                                   <option value="March" >March</option>
                                   <option value="April" >April</option>
                                   <option value="May" >May</option>
                                   <option value="June" >June</option>
                                   <option value="July" >July</option>
                                   <option value="August" >August</option>
                                   <option value="September" >September</option>
                                   <option value="October" >October</option>
                                   <option value="November" >November</option>
                                   <option value="December" >December</option>
                               </select>   
                            </div>
                            <div class="form-group">
                               <label> Consumption value </label>
                               <input type="text" name="Value" class="form-control" placeholder="Enter consumption value">
                           </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="insertdata" class="btn btn-primary">Save Data</button>
                        </div>
                    </form>
           
                </div>
            </div>
           </div>
            <!-- Sales Chart Start -->
            <div class="container-fluid ">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-8">

                        <div class="bg-secondary text-center rounded p-4">
                            <button type="button" class="btn btn-primary ms-2" data-toggle="modal" data-target="#studentaddmodal">
                                Add
                            </button>
                    <select class=""  id="selData">
                                <option value="Rental" selected="">Rental</option>
                                <option value="Water" >Water</option>
                                <option value="Gas" >Gas</option>
                                <option value="Power" >Power</option>
                            </select>
                            <select class=""  id="selDate">
                                <option value="2022" selected="">2022</option>
                                <option value="2021" >2021</option>
                                <option value="2023" >2023</option>
                                <option value="2020" >2020</option>
                            </select>          
                        <div id="divGraph"></div>
                    </div>
                </div>
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 bg-secondary rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Calendar</h6>
                                <a href="">Show All</a>
                            </div>
                            <div id="calender"></div>
                        </div> 
                    </div>
                    
                </div>     
            </div>
            <!-- Sales Chart End -->


</div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.0.1/chart.min.js" integrity="sha512-tQYZBKe34uzoeOjY9jr3MX7R/mo7n25vnqbnrkskGr4D6YOoPYSpyafUAzQVjV6xAozAqUFIEFsCO4z8mnVBXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/chart/chart.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/waypoints/waypoints.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../lib/tempusdominus/js/moment.min.js"></script>
    <script src="../lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    
        <!-- Javascript code -->
        <script>
        $(document).ready(function(){
            $.ajax({
                url: "../configs/dbconfigBills.php",
                type: "post",
                data:{
                    Name: "Rental",
                    Year:"2022"
                },
                success: function(bar_graph){
                    $("#divGraph").html(bar_graph);
                    $("#graph").chart = new Chart($("#graph"), $("#graph").data("settings"));
                }
            });
            $("#selData").change(function(){
                $.ajax({
                url: "../configs/dbconfigBills.php",
                type: "post",
                data:{
                    Name: $(this).val(),
                    Year: "2022"
                },
                success: function(bar_graph){
                    $("#divGraph").html(bar_graph);
                    $("#graph").chart = new Chart($("#graph"),$("#graph").data("settings"));
                }
            });
            });
            $("#selDate").change(function(){
                $.ajax({
                url: "../configs/dbconfigBills.php",
                type: "post",
                data:{
                    Name: $('#selData').val(),
                    Year: $(this).val()
                },
                success: function(bar_graph){
                    $("#divGraph").html(bar_graph);
                    $("#graph").chart = new Chart($("#graph"),$("#graph").data("settings"));
                }
            });
            });
            });
        
    </script>

    <!-- Template Javascript -->
    <script src="../js/main.js"></script>
</body>

</html>
