<?php
session_start();
if (!isset($_SESSION['Username']) || $_SESSION['Recognition'] != "client") {
    header("location: ../index.html");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>myinfo</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

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
  
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');

    *{
        box-sizing: border-box;
    }

    .container{
        display: flex;
        padding: 20px 20px;
    }
    .box{
        flex: 30%;
        display: table;
        align-items: center;
        text-align: center;
        font-size: 20px;
        background-color: #0d1425;
        color: #fff;
        padding: 30px 30px;
        border-radius: 20px;
    }

    .box img{
        border-radius: 50%;
        border: 2px solid #fff;
        height: 250px;
        width: 250px;
    }

    .box ul{
        margin-top: 30px;
        font-size: 30px;
        text-align: center;
    }
    .box ul li{
        list-style: none;
        margin-top: 50px;
        font-weight: 100;
    }

    .box ul li i{
        cursor: pointer;
        margin: 10px;
        font-size: 40px;
    }

    .box ul li i:hover{
        opacity: 0.6;
    }

    .About{
        width: 100%;
        margin-left: 20px;
        flex: 50%;
        display: table;
        font-size: 20px;
        background-color: #fff;
        border-radius: 20px;
        padding: 30px 30px;
    }
    .column {
    width:50%;
    padding: 10px;
    height: auto; /* Should be removed. Only for demonstration */
    }
    .About h1{
        text-transform: uppercase;
        letter-spacing: 3px;
        font-size: 50px;
        font-weight: 500;
    }

    .About ul li{
        list-style: none;
    }
    .row:after {
    content: "";
    display: table;
    clear: both;
    }
    .About ul{
        margin-top: 20px;
    }

    @media screen and (max-width: 1068px) {
        .container{
            display: table;
        }

        .box{
            width: 100%;
        }

        .About{
            width: 100%;
            margin: 0;
            margin-top: 20px;
        }

        .About h1{
            text-align: center;
        }
    }
</style>
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
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>SmartHosue</h3>
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
<!-- Job list Modal -->    
<div class="modal"  id="Editdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit personal information </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="editpersonalinfo.php" method="POST">

                    <div class="modal-body">
                        <div class="form-group">
                            <label> First Name </label>
                            <input type="text" name="Fname" class="form-control" placeholder="<?php echo $_SESSION["Name"]; ?>">
                        </div>

                        <div class="form-group">
                            <label> Second Name </label>
                            <input type="text" name="Sname" class="form-control" placeholder="<?php echo $_SESSION["Surname"]; ?>">
                        </div>
                        <div class="form-group">
                            <label> Username </label>
                            <input type="text" name="username" class="form-control" placeholder="<?php echo $_SESSION["Surname"]; ?>">
                        </div>
                        <div class="form-group">
                            <label> Email </label>
                            <input type="text" name="email" class="form-control" placeholder="<?php echo $_SESSION["Email"]; ?>">
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" name="phonenumber" class="form-control" placeholder="<?php echo $_SESSION["Phone"]; ?>">
                        </div>
                        <div class="form-group">
                            <label> Password</label>
                            <input type="text" name="password" class="form-control" placeholder="<?php echo $_SESSION["password"]; ?>">
                            </br>
                            <input type="text" name="rpassword" class="form-control" placeholder=" Repeate password">
                        </div>
                    </div>
                    <div class="modal-footer">
                      
                        <button type="submit" name="insertinfo" class="btn btn-primary">Save Data</button>
                        <?php
                         require_once("editpersonalinfo.php");
                            if($INFO !=''){
                               
                             echo '<script> alert("Data Not Saved"); </script>';
                            }
                        ?>
                    </div>
                </form>

            </div>
        </div>
    </div>

            <div class="container">
        <div class="box">
            <img src="../Images/username-icon.png" alt="">
            <ul>
                <li><?php echo $_SESSION["Name"]; ?></li>
                <li>Change image</li>
                <li><i style="font-size:24px" class="fa">&#xf230;</i>
                <li><i style="font-size:24px" class="fa">&#xf230;</i>
            </ul>
        </div>
        <div class="About">
        <h1 style="text-align:center;">User profile Information</h1>
        <div class="row">
                <div class="column" >First Name: <?php echo $_SESSION["Name"]; ?></div>
                <div class="column" >Second Name: <?php echo $_SESSION["Surname"]; ?></div>
            </div>
            <div class="row">
            <div class="column">Username: <?php echo $_SESSION["Username"]; ?></div>
            <div class="column">Phone Number:<?php echo $_SESSION["Phone"]; ?></div>
            </div>
            
            <div>Email Adrress: <?php echo $_SESSION["Email"]; ?></div>
            <button type="button" class="btn btn-primary ms-2" data-toggle="modal" data-target="#Editdata">
                        Edit Personal Info
                    </button>
            </div>
            

           
</div>
        <!-- Content End -->
  

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <!-- Template Javascript -->
    <script src="../js/main.js"></script>
</body>

</html>
