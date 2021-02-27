<?php
// php
session_start();

include 'db.php';

    //   $email = $_SESSION["email"];
    //   $dup = mysqli_query($conn,"select * from liste where email = '$email'");
    //   $row = mysqli_fetch_assoc($dup);
    //   $id = $row["id"];


     // $_SESSION["id"]= $row["id"];
     // $_SESSION["name"]= $row["name"];
     //  $_SESSION["password"]= $row["password"];
     //  $_SESSION["email"]= $row["email"];

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dash</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <!-- Insérer le script pour debuter et terminer les cours -->
       
    <!-- Fin du script pour debuter et terminer les cours -->
</head>
<body >
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-primary">
            <a class="navbar-brand" href="index.html">Teacher Board</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <!-- Emplacement du bouton de recherche -->
                <div class="input-group">
                    <!-- <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append"> -->

                        <!-- <button class="btn btn-dark" type="button"><i class="fas fa-search"></i></button> -->
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <form method="post" action=""  >
 <input type="hidden" name="editId" value="<?php echo $_SESSION["id"];?>"/>
 <button type="submit" class="btn btn-primary btn-lg" ><a href="password.php" class="text-light">Change password</a></button><br/>
</form>
                        
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading"></div>
                            
                            <div class="sb-sidenav-menu-heading">Student profil</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa"></i>More</div>
                                
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="darsh.php">board</a>
                                    <a class="nav-link" href="studentprofil.php">Student</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                                Settings
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        More
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="darsh.php">Logout</a>
                                            <a class="nav-link" href="index.php">Home</a>
                                            <a class="nav-link" href="password.php">Change Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Attendance
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                       <!--  <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html"></a>
                                            <a class="nav-link" href="404.html"></a>
                                            <a class="nav-link" href="500.html"></a>
                                        </nav> -->
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading"></div>
                            <a class="nav-link" href="studentprofil.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Student profil
                            </a>
                            <a class="nav-link" href="more_about_student.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                More about student
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small"></div>
                       
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4"></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Welcome to your Teacher Board</li>
                        </ol>
                       

                        <!-- Debut des cards avec debut et fin des cours -->
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">
                            <form action="darsh.php" method="post" name="fr_validation">
                        <input type="text" name="submit" value="" >
                        </form>

                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body"><form action="darsh.php" method="post" name="fin_validation">
                        <input type="text" name="fin_submit" value="" >
                    </form></div>

                    

                                    
                                </div>
                            </div>
                      

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body"></div>
                                    
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body"></div>
                                         
                                </div>
                            </div>
                        </div>
                               
                            </div>
                             <!-- Fin des cards avec debut et fin des cours -->
                            <div class="container-fluid gb-light">
                                 <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                              </ol>
                                <!-- Graphe -->
                               <center>
                                 <?php include "carte.php" ?>  
                               </center>

                                
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; attandance student 2020</div>
                            <div>
                               
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>

    </body>
</html>
