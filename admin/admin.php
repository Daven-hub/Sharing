
<?php 
 session_start();
 require_once 'config.php';

 if(!isset($_SESSION['admin'])){
    header('location :login.php');
 }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
     

        <!-- MENU SIDEBAR-->
        <?php
        require_once "aside.php";
        ?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Rechercher une information" />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-comment-more"></i>
                                        <span class="quantity">1</span>
                                        <div class="mess-dropdown js-dropdown">
                                            <div class="mess__title">
                                                <p>You have 2 news message</p>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                   
                                                </div>
                                                <div class="content">
                                                    
                                                </div>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                   
                                                </div>
                                                <div class="content">
                                                    
                                                    
                                                </div>
                                            </div>
                                            <div class="mess__footer">
                                                <a href="#">View all messages</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-email"></i>
                                        <span class="quantity">1</span>
                                        <div class="email-dropdown js-dropdown">
                                            <div class="email__title">
                                               
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    
                                                </div>
                                                <div class="content">
                                                    
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    
                                                </div>
                                                <div class="content">
                                                   
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    
                                                </div>
                                                <div class="content">
                                                    
                                                </div>
                                            </div>
                                            <div class="email__footer">
                                                <a href="#">See all emails</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity">1</span>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="zmdi zmdi-email-open"></i>
                                                </div>
                                                <div class="content">
                                                    
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c2 img-cir img-40">
                                                    <i class="zmdi zmdi-account-box"></i>
                                                </div>
                                                <div class="content">
                                                    
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c3 img-cir img-40">
                                                    <i class="zmdi zmdi-file-text"></i>
                                                </div>
                                                <div class="content">
                                                   
                                                </div>
                                            </div>
                                            <div class="notifi__footer">
                                                <a href="#">All notifications</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="images/icon/avatar-01.JPG" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php echo $_SESSION['admin']['ADMIN_NAME']; ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="images/icon/avatar-01.JPG" alt="Admin" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?php echo $_SESSION['admin']['ADMIN_NAME']; ?></a>
                                                    </h5>
                                                    <span class="email"><?php echo $_SESSION['admin']['EMAIL']; ?></span>
                                                </div>
                                            </div>

                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Compte</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Paramètres</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="deconnect.php">
                                                    <i class="zmdi zmdi-power"></i>Déconnexion</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Vue Globale</h2>
                                    <a href="ajout.php"><button class="au-btn au-btn-icon au-btn--blue">
                                        <i class="zmdi zmdi-plus"></i>Ajouter des livres</button></a>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                            <?php
                                            $query="SELECT COUNT(*) as statut FROM `utilisateurs` WHERE STATUT=true";
                                            $select=$bdd->query($query)->fetch();
                                            ?>
                                                <h2><?php echo $select['statut']; ?></h2>
                                                <span>Membres En Ligne</span>
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-shopping-cart"></i>
                                            </div>
                                            <div class="text">
                                            <?php
                                            $query="SELECT COUNT(*) as cmd FROM `commande`";
                                            $select=$bdd->query($query)->fetch();
                                            ?>
                                                <h2><?php echo $select['cmd']; ?></h2>
                                                <span>Ventes</span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            <div class="text">
                                                <h2>5</h2>
                                                <span>Ajouts du Jours</span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            <div class="text">
                                                <h2>26</h2>
                                                <span>Total Livre</span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <div class="row">
                            <div class="col-lg-9">
                                <h2 class="title-1 m-b-25">Ajouts Recent</h2>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Date Ajout</th>
                                                <th>N° ISBN</th>
                                                <th>Titre du Livre</th>
                                                <th class="text-right">Prix</th>
                                                <th class="text-right">Quantité</th>
                                                <th class="text-right">Total</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                             $query = "SELECT * FROM livre";
                                             $select = $bdd->query($query)->fetchAll();
                                             foreach($select As $row){
                                                 echo "<tr>
                                                 <td>".$row['DATE_AJOUT']."</td>
                                                 <td>".$row['ISBN']."</td>
                                                 <td>".$row['TITRE']."</td>
                                                 <td class=\"text-right\">".$row['PRIX']." Fcfa</td>
                                                 <td class=\"text-right\">1</td>
                                                 <td class=\"text-right\">".$row['PRIX']." Fcfa</td>
                                                 <td><div class=\"table-data-feature\">
                                                     <button class=\"item\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Edi\">
                                                         <i class=\"zmdi zmdi-edit\"></i>
                                                     </button>
                                                     <a href=\"?ISBN=".$row['ISBN']."\">
                                                     <button class=\"item\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Delete\">
                                                      <i class=\"zmdi zmdi-delete\"></i>
                                                     </button>
                                                     </a>
                                                 </div>
                                             </td> 
                                             </tr> ";
                                             }
                                            ?>
                                        
                                    
                                        <?php
                                        if (isset($_GET['ISBN'])) {
                                            $query = "DELETE FROM `livre` WHERE `livre`.ISBN='" . $_GET['ISBN'] . "'";
                                            if ($bdd->query($query)) {
                                               echo "  <script>window.location.assign(\"admin.php?reg_err=succes\")</script>";
                                            }
                                        }
                                    ?>
                                  
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <h2 class="title-1 m-b-25">Meilleurs Zones</h2>
                                <div class="au-card au-card--bg-blue au-card-top-countries m-b-40">
                                    <div class="au-card-inner">
                                        <div class="table-responsive">
                                        <?php
                                            $query="SELECT COUNT(*) as bnr FROM `commande` WHERE  ADRESS_LIV = 'Bonaberie' ";
                                            $select=$bdd->query($query)->fetch();
                                            ?>
                                            <table class="table table-top-countries">
                                                <tbody>
                                                    <tr>
                                                        <td>Bonaberie</td>
                                                        <td class="text-right"><?php echo $select['bnr'] ;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Logbessou</td>
                                                        <td class="text-right">57</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Akwa</td>
                                                        <td class="text-right">55</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Bepanda</td>
                                                        <td class="text-right">35</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Bonamoussadi</td>
                                                        <td class="text-right">24</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Logpom</td>
                                                        <td class="text-right">36</td>
                                                    </tr>
                                                    <tr>
                                                        <td>PK 14</td>
                                                        <td class="text-right">16</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Makepe</td>
                                                        <td class="text-right">9</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Commande -->
                                <h3 class="title-5 m-b-35">Commandes</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <div class="rs-select2--light rs-select2--md">
                                            <select class="js-select2" name="property">
                                                <option selected="selected">Toutes </option>
                                                <option value="">Accepté</option>
                                                <option value="">Refusé</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="rs-select2--light rs-select2--sm">
                                            <select class="js-select2" name="time">
                                                <option selected="selected">24 h</option>
                                                <option value="">3 Jours</option>
                                                <option value="">1 Semaine</option>
                                                <option value="">1 Moi</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <button class="au-btn-filter">
                                            <i class="zmdi zmdi-filter-list"></i>Filter</button>
                                    </div>
                                    <div class="table-data__tool-right">
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>add item</button>
                                        <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                            <select class="js-select2" name="type">
                                                <option selected="selected">Exporter</option>
                                                <option value="">PDF</option>
                                                <option value="">TEXTE</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                        <style>
                                        .table-data2{
                                            overflow-y: scroll;
                                        }
                                        </style>
                                            <tr>
                                               
                                                <th>Numéro Commande</th>
                                                <th>Utilisateur</th>
                                                <th>Date</th>
                                                <th>Adresse de Livraison</th>
                                                <th>Option Commande</th>
                                                <th>Date Livraison</th>
                                                <th>Statut</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                             $query = "SELECT * FROM commande";
                                             $select = $bdd->query($query)->fetchAll();
                                             foreach($select As $row){
                                                 echo " <tr class=\"tr-shadow\">
                                                 <td>
                                                     <span class=\"block-email\">".$row['ID_CMD']."</span>
                                                 </td>
                                                 <td class=\"desc\">".$row['ID_USER']."</td>
                                                 <td>".$row['DATE_CMD']."</td>
                                                 <td>
                                                     <span class=\"status--process\">".$row['ADRESS_LIV']."</span>
                                                 </td>
                                                 <td>
                                                     <span class=\"status--process\">".$row['OPTION_CMD']."</span>
                                                 </td>
                                                 <td>
                                                     <span class=\"status--process\">".$row['DATE_LIV']."</span>
                                                 </td>
                                                 <td>
                                                     <div class=\"table-data-feature\">
                                                         <button class=\"item\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Send\">
                                                             <i class=\"zmdi zmdi-mail-send\"></i>
                                                         </button>
                                                         <a href=\"?ID_CMD=".$row['ID_CMD']."\">
                                                         <button class=\"item\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Delete\">
                                                             <i class=\"zmdi zmdi-delete\"></i>
                                                         </button>
                                                         </a>
                                                     </div>
                                                 </td>
                                             </tr>
                                             <tr class=\"spacer\"></tr> ";

                                             }
                                             ?>

                                   <?php
                                        if (isset($_GET['ID_CMD'])) {
                                            $query = "DELETE FROM `commande` WHERE `commande`.ID_CMD='" . $_GET['ID_CMD'] . "'";
                                            if ($bdd->query($query)) {
                                               echo "  <script>window.location.assign(\"admin.php?reg_err=succes\")</script>";
                                            }
                                        }
                                    ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> 
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2021 RDCT All rights reserved</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
