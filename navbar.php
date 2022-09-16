<?php  
include_once('config.php');
$sql = "SELECT * FROM tblusers where id='".$_SESSION['uid']."'";
$arr=[];
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
    $arr = $result->fetch_all(MYSQLI_ASSOC);
}
foreach($arr as $row){
    $role = $row['role'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - Vectorart USA</title>
    <?php include '../sources.php' ?>
    
</head>
<body class="sb-nav-fixed">
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <?php if($role == 'admin') { ?>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseclients" aria-expanded="false" aria-controls="collapseclients">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            CLIENTS
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseclients" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="./view_client.php">VIEW CLIENTS</a>
                                    <a class="nav-link" href="./add_client.php">ADD CLIENT</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsemanagers" aria-expanded="false" aria-controls="collapsemanagers">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                MANAGERS
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsemanagers" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="./view_manager.php">VIEW MANAGERS</a>
                                    <a class="nav-link" href="./add_manager.php">ADD MANAGER</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsejobtypes" aria-expanded="false" aria-controls="collapsejobtypes">
                                <div class="sb-nav-link-icon"><i class="fas fa-pen-nib"></i></div>
                                JOB TYPE
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsejobtypes" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="./view_jobtype.php">VIEW JOB TYPES</a>
                                    <a class="nav-link" href="./add_jobtype.php">ADD JOB TYPES</a>
                                </nav>
                            </div>
                            <a class="nav-link" href="./jobs.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-briefcase"></i></div>
                                JOBS
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsereports" aria-expanded="false" aria-controls="collapsereports">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                REPORTS
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsereports" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="#">PAYMENTS</a>
                                    <a class="nav-link" href="#">EXPORT</a>
                                </nav>
                            </div>

                        <?php } elseif($role=='manager'){ ?>
                            <a class="nav-link" href="./view_jobs.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-briefcase"></i></div>
                                JOBS
                            </a>
                        <?php }elseif($role=='client'){ ?>
                        <!-- <div class="sb-sidenav-menu-heading">Core</div> -->
                        <a class="nav-link" href="./dashboard.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            POST A JOB
                        </a>
                        <a class="nav-link" href="./view_jobs.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                            VIEW JOBS  
                        </a>
                        <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-info-circle"></i></div>
                            FAQS
                        </a>
                        <?php } else { 
                            header('location:index.php');
                        }?>
                    </div>
                </div>
            </nav>
    </div>   
