<?php
session_start();
if (!isset($_SESSION['Username']) || $_SESSION['Recognition'] != "client")
{
    header("location: ../index.html");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Data Reports</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Scripts library-->
    <link href="assets/css/daterangepicker.css" rel="stylesheet">
    <!-- Favicon -->
    <link href="../img/favicon.ico" rel="icon">

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

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <script>
      $(document).ready(function()
          {
          $('#div_refresh').load("HouTempreportsload.php");
          $('#div_refresh2').load("HouHumreportsload.php");
          $('#div_refresh3').load("OutsTempreportsload.php");
          $('#div_refresh4').load("reportsdate.php");
         
              setInterval(function(){
                   $('#div_refresh').load("HouTempreportsload.php");
                   $('#div_refresh2').load("HouHumreportsload.php");
                   $('#div_refresh3').load("OutsTempreportsload.php");
                   $('#div_refresh4').load("reportsdate.php");

                  
              },3600000);
              
          });
      
      </script>

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
                <a href="HomePage.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>SmartHouse</h3>
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
                    <a href="HomePage.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="ToDo.php" class="nav-item nav-link"><i class="fa fa-laptop me-2"></i>Jobs</a>
                    <a href="widget.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Meteo</a>
                    <a href="form.php" class="nav-item nav-link active"><i class="fa fa-keyboard me-2"></i>Data reports</a>
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
                            <a href="myinfo.php" class="dropdown-item">My Profile</a>
                            <a href="Settings.php" class="dropdown-item">Settings</a>
                            <a href="../index.html" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

         <h2 style="text-align: center;"  > Duomenų ataskaita</h2>     
        <div class="row datarow">
                <div class="col-sm-3 " >
               <h2>Namų temperatūros</h2>
             <div id="div_refresh" > </div >
            </div>
  <div class="col-sm-4" >
    <h2>Namų drėgmės ataskaita</h2>
    <div id="div_refresh2" > 
    </div >
  </div>
  <div class="col-sm-5 " >
    <h2>Lauko temperaūros ataskaita</h2>
    <div  id="div_refresh3" > </div >
  </div>
</div>
 <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <form class="form-horizontal">
                                <fieldset>
                                  <div class="input-prepend">
                                    <span class="add-on"><i class="icon-calendar"></i></span><input type="text" name="range" id="range" />
                                  </div>
                                </fieldset>
                              </form>
                            <h6 class="mb-4">Single Line Chart</h6>
                            <canvas id="line-chart"></canvas>
                        </div>
                    </div>
                    <!-- <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Single Bar Chart</h6>
                            <canvas id="bar-chart"></canvas>
                        </div>
                    </div>  -->
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Multiple Bar Chart</h6>
                            <canvas id="worldwide-sales"></canvas>
                        </div>
                    </div>
                    
        </div>
            </div>


        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/chart/chart.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/waypoints/waypoints.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../lib/tempusdominus/js/moment.min.js"></script>
    <script src="../lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Template Javascript -->
    <script src="assets/js/xcharts.min.js"></script>

    <!-- The daterange picker bootstrap plugin -->
    <script src="assets/js/sugar.min.js"></script>
    <script src="assets/js/daterangepicker.js"></script>

    <!-- Our main script file -->
    <script src="assets/js/script.js"></script>
    <script src="../js/main.js"></script>
    <script>
        $(document).ready(function(){
            $.ajax({
                url: "../configs/dbconfigform.php",
                type: "post",
                data:{
                    Name: "2022-16-16"
                  
                },
                success: function(line_graph){
                    $("#line-chart").html(line_graph);
                    $("#graph").chart = new Chart($("#graph"), $("#graph").data("settings"));
                }
            });
            });
        
    </script>

</body>

</html>
