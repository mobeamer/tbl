
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Super Care</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="description" content="Developed By M Abdur Rokib Promy">
    <meta name="keywords" content="Admin, Bootstrap 3, Template, Theme, Responsive">
    
    <link href="css/lib/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="css/lib/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="css/lib/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="css/lib/morris/morris.css" rel="stylesheet" type="text/css" />
    <link href="css/lib/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <link href="css/lib/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <link href="css/lib/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href="css/lib/director-template-style.css" rel="stylesheet" type="text/css" />
    <link href="css/base.css" rel="stylesheet" type="text/css" />

      </head>
      <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.html" class="logo">
                Super-Care
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope"></i>
                                <span class="label label-success">0</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 0 messages</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li><!-- start message -->
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="img/26115.jpg" class="img-circle" alt="User Image"/>
                                                </div>
                                                <h4>
                                                    Welcome
                                                </h4>
                                                <p>Thanks for checking us out</p>
                                                <small class="pull-right"><i class="fa fa-clock-o"></i> 5 mins</small>
                                            </a>
                                        </li><!-- end message -->
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">See All Messages</a></li>
                            </ul>
                        </li>
                        <li class="dropdown tasks-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-tasks"></i>
                                <span class="label label-danger">0</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 0 saved stocks</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    MSFT
                                                    <small class="pull-right">$3.25</small>
                                                </h3>
                                                <div class="progress progress-striped xs">
                                                    <div class="progress-bar progress-bar-success" style="width: 100%" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">100% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li><!-- end task item -->
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="#">View all stocks</a>
                                </li>
                            </ul>
                        </li>
                        
                        
                        
                        
                        
                        
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-user"></i>
                                <span><?=$user->username?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                                <li class="dropdown-header text-center">Account</li>

                                <li>
                                    <a href="#">
                                    <i class="fa fa-envelope-o fa-fw pull-right"></i>
                                        Security Class: <?=$user->securityLevel?></a>
                                </li>

                                <li class="divider"></li>


                                        <li>
                                            <a href="logout.php"><i class="fa fa-ban fa-fw pull-right"></i> Logout</a>
                                        </li>
                                
                                        <li>
                                            <a href="logout.php"><i class="fa fa-ban fa-fw pull-right"></i> Login as Another User</a>
                                        </li>
                                    </ul>
                                </li>
                        
                        
                        
                        
                            </ul>
                    
                    
                    
                    
                        </div>
                    </nav>
                </header>
          
          
          
          
          
          
          
          
                <div class="wrapper row-offcanvas row-offcanvas-left">
                    <!-- Left side column. contains the logo and sidebar -->
                    <aside class="left-side sidebar-offcanvas">
                        <!-- sidebar: style can be found in sidebar.less -->
                        <section class="sidebar">
                            <!-- Sidebar user panel -->
                            <div class="user-panel">
                                <div class="pull-left image">
                                    <img src="img/avatar.png" class="img-circle" alt="User Image" />
                                </div>
                                <div class="pull-left info">
                                    <p id="pUserName">Hello, <?=$user->username?></p>

                                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                                </div>
                            </div>
                            <!-- search form -->
                            <form action="dashboard.php" method="get" class="sidebar-form">
                                <div class="input-group">
                                    <input type="text" name="q" class="form-control" placeholder="Search..."/>
                                    <span class="input-group-btn">
                                        <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                                    </span>
                                </div>
                            </form>
                            <!-- /.search form -->
                            <!-- sidebar menu: : style can be found in sidebar.less -->
                            <ul class="sidebar-menu">
                                    <?php
                                        if($user->securityLevel == 'admin')
                                        {
                                        ?>
                                            <li class="active">
                                                <a href="dashboard.php">
                                                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="import.php">
                                                    <i class="fa fa-globe"></i> <span>Import Data</span>
                                                </a>
                                            </li>
                                    
                                        <?php
                                        }
                                    ?>

                                <li>
                                   <a href="edit-personal-info.php"><i class="fa fa-glass"></i> <span>Personal Info</span></a>
                                </li>       
                              
                                <li>
                                    <a href="edit-survey-answers.php"><i class="fa fa-glass"></i> <span>Medical Background</span></a>
                                </li>   
                              
                                <li>
                                    <a href="edit-location-avail.php"><i class="fa fa-glass"></i> <span>Location Availability</span></a>
                                </li>                                 



                            </ul>
                        </section>
                        <!-- /.sidebar -->
                    </aside>

                    <aside class="right-side">

                    
                    <section class="panel">
                        <header class="panel-heading">
                            Notifications
                        </header>
                            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; "><div class="panel-body" id="noti-box" style="overflow: hidden; width: auto; ">
                                <div id="div-general-notification" class="alert alert-success">
                                   Alerts and Notificatons
                                </div>



                            </div>
                    </section>



                <!-- Main content -->
                <section class="content">






