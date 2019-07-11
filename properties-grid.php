<?php 
session_start();
require_once('his_bd.php');
require_once('fonction/php/function_p.php');
$base=$bdd;
deco("properties-grid.php");
include_once('fonction/php/modulesp_complet.php'); 
$req1=$base->query('SELECT* FROM ville');
$prixh=50000000;
$prixb=0;
if(isset($_SESSION['idprop']))
    {
        $en=$_SESSION['idprop'];
    }
if(!isset($_SESSION['idprop'])) 
{ $en="#" ;}
$vals=1;
$deb=0;
$fin=6;
if(isset($_GET['select-location']))
    {
        $sens="&";
    } else {   $sens="?";  }
?>


<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <!-- Document Meta
    ============================================= -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--IE Compatibility Meta-->
    <meta name="author" content="zytheme" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Real Estate html5 template">
    <link href="assets/images/favicon/favicon.png" rel="icon">

    <!-- Fonts
    ============================================= -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i%7CPoppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Stylesheets
    ============================================= -->
    <link href="assets/css/external.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet"> 
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->

    <!-- Document Title
    ============================================= -->
    <title>LandPro | Real Estate Html5 Template - SHARED ON THEMELOCK.COM</title>
</head>

<body>
    <!-- Document Wrapper
	============================================= -->
    <div id="wrapper" class="wrapper clearfix">
        <header id="navbar-spy" class="header header-1 header-light header-fixed">
            <nav id="primary-menu" class="navbar navbar-fixed-top">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
                        <a class="logo" href="index.html">
					<img class="logo-light" src="assets/images/logo/logo-light.png" alt="Land Logo">
					<img class="logo-dark" src="assets/images/logo/logo-dark.png" alt="Land Logo">
				</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse pull-right" id="navbar-collapse-1">
                        <ul class="nav navbar-nav nav-pos-center navbar-left">
                            <!-- Home Menu -->
                            <li>
                                <a href="index.php">Acceuil</a>
                                
                            </li>
                            <li>
                                <a href="page-about.php">A Propos</a>
                                
                            </li>
                            <!-- Properties Menu-->
                            <li class="active">
                                <a href="properties-grid.php" style="color:orange">Proprietes</a>
                               
                            </li>                           
                            <li><a href="page-contact.php">contact</a></li>
                            <li>
                               <?php if(!isset($_SESSION['idprop'])) { ?>
                                <a class="btn-popup" data-toggle="modal" data-target="#signupModule" style="cursor:pointer;" id="compte">mon compte</a>
                               <?php } else { ?>  <a href="user-profile.php" id="compte">mon compte </a>  <?php } ?>
                               </li>
                        </ul>
                        <!-- Module Signup  -->
                        <div class="module module-login pull-left">
                        <?php if(!isset($_SESSION['idprop']) ) { // cas ou nous avons pas de connection en cours ?>
                            <a class="btn-popup" data-toggle="modal" data-target="#signupModule" id="go">connexion</a>
                            <?php } 
                        else {?> <a class="btn-popup" data-toggle="modal" href="properties-grid.php?dec" id="go">Déconnection</a><?php }//module de deconnection
                        ?>
                            <div class="modal register-login-modal fade" tabindex="-1" role="dialog" id="signupModule">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="row">

                                                <!-- Nav tabs -->
                                                <ul class="nav nav-tabs">
                                                    <li class="active"><a href="#login" data-toggle="tab">Connexion</a>
                                                    </li>
                                                    <li><a href="#signup" data-toggle="tab">S'inscrire</a>
                                                    </li>
                                                </ul>
                                                <!-- Tab panes -->
                                                <div class="tab-content">
                                                    <div class="tab-pane fade in active" id="login">
                                                        <div class="signup-form-container text-center">
                                                            <form id="sub1" class="mb-0" method="post" action="fonction/php/login.php">
                                                                <a href="#" class="btn btn--facebook btn--block"><i class="fa fa-facebook-square"></i>Se connecter avec Facebook</a>
                                                                <div class="or-text">
                                                                    <span>ou</span>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="email" class="form-control" name="logine" id="login-email" placeholder="Adresse Email">
                                                                </div>
                                                                <!-- .form-group end -->
                                                                <div class="form-group">
                                                                    <input type="password" class="form-control" name="loginp" id="login-password" placeholder="Mot de passe">
                                                                </div>
                                                                <!-- .form-group end -->
                                                                <div class="input-checkbox">
                                                                    <label class="label-checkbox">
                                <span>Se souvenir de moi</span>
                                <input type="checkbox">
                                <span class="check-indicator"></span>
                            </label>
                                                                </div>
                                                                <p id="info"> </p>
                                                                <input type="submit" id="sub" class="btn btn--primary btn--block" value="Se connecter">
                                                                <a href="#" class="forget-password">Mot de passe oublié?</a>
                                                            </form>
                                                            <!-- form  end -->
                                                        </div>
                                                        <!-- .signup-form end -->
                                                    </div>
                                                    <div class="tab-pane" id="signup">
                                                        <form class="mb-0" id="sub3">
                                                            <a href="#" class="btn btn--facebook btn--block"><i class="fa fa-facebook-square"></i>s'enregister avec Facebook</a>
                                                            <div class="or-text">
                                                                <span>ou</span>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" name="full-name" id="full-name" placeholder="Nom complet">
                                                            </div>
                                                            <!-- .form-group end -->
                                                            <div class="form-group">
                                                                <input type="email" class="form-control" name="register-email" id="register-email" placeholder="Adresse Email">
                                                            </div>
                                                            <!-- .form-group end -->
                                                            <div class="form-group">
                                                                <input type="password" class="form-control" name="register-password" id="register-password" placeholder="Mot de Passe">
                                                            </div>
                                                            <!-- .form-group end -->
                                                            <div class="input-checkbox">
                                                               
                                                            </div>
                                                            <div class="input-checkbox">
                                                                <label class="label-checkbox">
                                <span style="color:green;">En vous inscrivant vous êtes d'accord avec <a href="#" style="color:orange;">les termes & conditions</a></span>
                                                                </label>
                                                            </div>
                                                            <input type="submit" class="btn btn--primary btn--block" id="sub4" value="s'inscrire">
                                                            <p id="info2"></p>
                                                        </form>
                                                        <!-- form  end -->
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
                            </div>
                        </div>
                       
                        <!-- Module Consultation  -->
                        <div class="module module-property pull-left">
                        <?php if(!isset($_SESSION['idprop']) ) { // cas ou nous avons pas de connection en cours ?>
                            <a data-toggle="modal" data-target="#signupModule"  class="btn"  id="prop" ><i class="fa fa-plus"></i> Maison</a>
                            <?php } 
                        else {?> <a href="add-property.php" target="_blank" class="btn"  id="prop"><i class="fa fa-plus"></i> Maison</a><?php }//module de deconnection
                        ?>
                        </div>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </nav>

        </header>
        <!-- map
============================================ -->
        <section id="map" class="hero-map pt-0 pb-0">
            <div class="container-fluid pr-0 pl-0">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div id="googleMap"></div>
                    </div>
                    <!-- .col-md-12 end -->
                </div>
                <!-- .row end -->
            </div>
            <!-- .container end -->
            <div class="search-properties">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <form class="mb-0"  action="">
                                <div class="form-box ">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <div class="form-group">
                                                <div class="select--box">
                                                    <i class="fa fa-angle-down"></i>
                                                    <select name="select-location" id="select-location">
                                                    <option>Villes</option>
                                        <?php while($don=$req1->fetch()) {?>
                                        <option><?php echo $don['nom']; ?></option>
                                        <?php } ?>
                                        </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- .col-md-3 end -->
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <div class="form-group">
                                                <div class="select--box">
                                                    <i class="fa fa-angle-down"></i>
                                                    <select name="select-type" id="select-type">
                                                    <option>Types</option>
                                                    <option>Appartement</option>
                                                    <option>Bureau</option>
                                                    <option>Chambre</option>
                                                    <option>Maison</option>
                                                    <option>Studio</option>
                                                    <option>Terre</option>
                                                    <option>Villa</option>
                                                    
                                        </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- .col-md-3 end -->
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <div class="form-group">
                                                <div class="select--box">
                                                    <i class="fa fa-angle-down"></i>
                                                    <select name="select-status" id="select-status">
                                           <option>Options</option>
                                            <option>Acheter</option>
                                            <option>Colocation</option>
                                            <option>Louer</option>
                                        </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- .col-md-3 end -->
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <input type="submit" value="Recherche" class="btn btn--primary btn--block mb-30">
                                        </div>
                                        <!-- .col-md-3 end -->
                                        <div class="col-xs-12 col-sm-6 col-md-3 option-hide">
                                            <div class="form-group">
                                                <div class="select--box">
                                                    <i class="fa fa-angle-down"></i>
                                                    <select name="select-beds" id="select-beds">
                                                    <option>Chambres</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- .col-md-3 end -->
                                        <div class="col-xs-12 col-sm-6 col-md-3 option-hide">
                                            <div class="form-group">
                                                <div class="select--box">
                                                    <i class="fa fa-angle-down"></i>
                                                    <select name="select-baths" id="select-baths">
                                                    <option>Douches</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- .col-md-3 end -->
                                        <div class="col-xs-12 col-sm-6 col-md-6 option-hide">
                                            <div class="filter mb-30">
                                                <p>
                                                    <label for="amount">Option Prix: </label>
                                                    <input id="amount" type="text" class="amount"  readonly>
                                                    <input  type="hidden" name="haut" id="haut" value="<?php echo $prixh;?>">
                                                    <input  type="hidden" name="bas" id="bas" value="<?php echo $prixb;?>">
                                                </p>
                                                <div class="slider-range"></div>
                                            </div>
                                        </div>
                                        <!-- .col-md-3 end -->
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <a href="#" class="less--options">Options</a>
                                        </div>
                                    </div>
                                    <!-- .row end -->
                                </div>
                                <!-- .form-box end -->
                            </form>
                        </div>
                        <!-- .col-md-12 end -->
                    </div>
                    <!-- .row end -->
                </div>
                <!-- .container end -->
            </div>
        </section>
        <!-- #map end -->

        <!-- properties-grid
============================================= -->
        <section id="properties-grid">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-4">
                        <!-- widget property type
=============================-->

                        <div class="widget widget-property">
                            <div class="widget--title">
                                <h5>Type de Propriété</h5>
                            </div>
                            <div class="widget--content">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="properties-grid.php?select-location=Villes&select-type=Appartement&select-status=Options&select-beds=Chambres&select-baths=Douches&haut=<?php echo $prixh;?>&bas=<?php echo $prixb;?>">Appartements <span>(<?php echo prop_typ($base,"Appartement"); ?>)</span></a>
                                    </li>
                                    <li>
                                        <a href="properties-grid.php?select-location=Villes&select-type=Maison&select-status=Options&select-beds=Chambres&select-baths=Douches&haut=<?php echo $prixh;?>&bas=<?php echo $prixb;?>">Maison <span>(<?php echo prop_typ($base,"Maison"); ?>)</span></a>
                                    </li>
                                    <li>
                                        <a href="properties-grid.php?select-location=Villes&select-type=Bureau&select-status=Options&select-beds=Chambres&select-baths=Douches&haut=<?php echo $prixh;?>&bas=<?php echo $prixb;?>">Brureaux <span>(<?php echo prop_typ($base,"Bureau"); ?>)</span></a>
                                    </li>
                                    <li>
                                        <a href="properties-grid.php?select-location=Villes&select-type=Villa&select-status=Options&select-beds=Chambres&select-baths=Douches&haut=<?php echo $prixh;?>&bas=<?php echo $prixb;?>">Villas <span>(<?php echo prop_typ($base,"Villa"); ?>)</span></a>
                                    </li>
                                    <li>
                                        <a href="properties-grid.php?select-location=Villes&select-type=Terre&select-status=Options&select-beds=Chambres&select-baths=Douches&haut=<?php echo $prixh;?>&bas=<?php echo $prixb;?>">Terres<span>(<?php echo prop_typ($base,"Terre"); ?>)</span></a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                        <!-- . widget property type end -->

                        <!-- widget property status
=============================-->
                        <div class="widget widget-property">
                            <div class="widget--title">
                                <h5>Status des Propriétés</h5>
                            </div>
                            <div class="widget--content">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="properties-grid.php?select-location=Villes&select-type=Types&select-status=Louer&select-beds=Chambres&select-baths=Douches&haut=<?php echo $prixh;?>&bas=<?php echo $prixb;?>">A Louer <span>(<?php echo prop_stat($base,"A louer"); ?>)</span></a>
                                    </li>
                                    <li>
                                        <a href="properties-grid.php?select-location=Villes&select-type=Types&select-status=Acheter&select-beds=Chambres&select-baths=Douches&haut=<?php echo $prixh;?>&bas=<?php echo $prixb;?>">A Vendre <span>(<?php echo prop_stat($base,"A Vendre"); ?>)</span></a>
                                    </li>
                                    <li>
                                        <a href="properties-grid.php?select-location=Villes&select-type=Types&select-status=Colocation&select-beds=Chambres&select-baths=Douches&haut=<?php echo $prixh;?>&bas=<?php echo $prixb;?>">Colocation <span>(<?php echo prop_stat($base,"Colocation"); ?>)</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- . widget property status end -->


                        <!-- widget property city
=============================-->
                        <div class="widget widget-property">
                            <div class="widget--title">
                                <h5>Propriété des villes principales</h5>
                            </div>
                            <div class="widget--content">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="properties-grid.php?select-location=Abidjan&select-type=Types&select-status=Options&select-beds=Chambres&select-baths=Douches&haut=<?php echo $prixh;?>&bas=<?php echo $prixb;?>">Abidjan <span>(<?php echo prop_v($base,"Abidjan"); ?>)</span></a>
                                    </li>
                                    <li>
                                        <a href="properties-grid.php?select-location=Bouake&select-type=Types&select-status=Options&select-beds=Chambres&select-baths=Douches&haut=<?php echo $prixh;?>&bas=<?php echo $prixb;?>">Bouaké <span>(<?php echo prop_v($base,"Bouake"); ?>)</span></a>
                                    </li>
                                    <li>
                                        <a href="properties-grid.php?select-location=Korhogo&select-type=Types&select-status=Options&select-beds=Chambres&select-baths=Douches&haut=<?php echo $prixh;?>&bas=<?php echo $prixb;?>">Korhogo <span>(<?php echo prop_v($base,"Korhogo"); ?>)</span></a>
                                    </li>
                                    <li>
                                        <a href="properties-grid.php?select-location=Yamoussoukro&select-type=Types&select-status=Options&select-beds=Chambres&select-baths=Douches&haut=100000&bas=0">Yamoussoukro <span>(<?php echo prop_v($base,"Yamoussoukro"); ?>)</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- . widget property city end -->


                        <!-- widget featured property
=============================-->
                        <div class="widget widget-featured-property">
                            <div class="widget--title">
                                <h5>Propriété vedettes</h5>
                            </div>
                            <div class="widget--content">
                                <div class="carousel carousel-dots" data-slide="1" data-slide-rs="1" data-autoplay="false" data-nav="false" data-dots="true" data-space="0" data-loop="true" data-speed="800">
                                    <!-- .property-item #1 -->
                                    <div class="property-item">
                                        <div class="property--img">
                                            <img src="assets/images/properties//13.jpg" alt="property image" class="img-responsive">
                                            <span class="property--status">A louer</span>
                                        </div>
                                        <div class="property--content">
                                            <div class="property--info">
                                                <h5 class="property--title"><a href="property-single-gallery.html">House in Chicago</a></h5>
                                                <p class="property--location">1445 N State Pkwy, Chicago, IL 60610</p>
                                                <p class="property--price">1200 fcfa<span class="time">Mois</span></p>
                                            </div>
                                            <!-- .property-info end -->
                                        </div>
                                    </div>
                                    <!-- .property item end -->
                                    <!-- .property-item #2 -->
                                    <div class="property-item">
                                        <div class="property--img">
                                            <img src="assets/images/properties/2.jpg" alt="property image" class="img-responsive">
                                            <span class="property--status">A louer</span>
                                        </div>
                                        <div class="property--content">
                                            <div class="property--info">
                                                <h5 class="property--title"><a href="property-single-gallery.html">Villa in Oglesby Ave</a></h5>
                                                <p class="property--location">1035 Oglesby Ave, Chicago, IL 60617</p>
                                                <p class="property--price">130000 fcfa<span class="time">mois</span></p>
                                            </div>
                                            <!-- .property-info end -->
                                        </div>
                                    </div>
                                    <!-- .property item end -->
                                    <!-- .property-item #3 -->
                                    <div class="property-item">
                                        <div class="property--img">
                                            <img src="assets/images/properties/3.jpg" alt="property image" class="img-responsive">
                                            <span class="property--status">A vendre</span>
                                        </div>
                                        <div class="property--content">
                                            <div class="property--info">
                                                <h5 class="property--title"><a href="property-single-gallery.html">Apartment in Long St.</a></h5>
                                                <p class="property--location">34 Long St, Jersey City, NJ 07305</p>
                                                <p class="property--price">70000 fcfa</p>
                                            </div>
                                            <!-- .property-info end -->
                                        </div>
                                    </div>
                                    <!-- .property item end -->
                                </div>
                                <!-- .carousel end -->
                            </div>
                        </div>
                        <!-- . widget featured property end -->
                    </div>
                    <!-- .col-md-4 end -->
                    <div class="col-xs-12 col-sm-12 col-md-8">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="properties-filter clearfix">
                                    <div class="select--box pull-left">
                                        <label>Choisir par:</label>
                                        <select>
								<option selected="" value="Default">Affichage</option>
								<option value="Small">Prix le plus élévé</option>
								<option value="Medium">Prix le moins élévé</option>
							</select>
                                    </div>
                                    <!-- .select-box -->
                                    <div class="view--type pull-right">
                                        <a id="switch-list" href="#" class=""><i class="fa fa-th-list"></i></a>
                                        <a id="switch-grid" href="#" class="active"><i class="fa fa-th-large"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="properties properties-grid">
                                <!-- .col-md-12 end -->
                               
                                            <?php while ($lop=$reqd->fetch()) {  $aut="ok";
                                                if((cville($lop['idmaison'],$base)<>$ville)&& $ville=="Villes") { ?>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <!-- .property-item #1 -->
                                    <div class="property-item">
                                        <div class="property--img">
                                            <a href="property-single-gallery.php?init=<?php echo $lop['idmaison']; ?>">
                                <img src="doc_client/img_maison/<?php echo $lop['imgp'];?>" alt="property image" class="img-responsive">
								</a>
                                            <span class="property--status"><?php echo $lop['statu'];?></span>
                                        </div>
                                        <div class="property--content">
                                            <div class="property--info">
                                                <h5 class="property--title"><a href="property-single-gallery.php?init=<?php echo $lop['idmaison']; ?>"><?php echo $lop['titre'];?></a></h5>
                                                <p class="property--location"><?php echo req($lop['idmaison'],$base).', '.read($lop['idmaison'],$base) ; ?>, Type: <i style="color:red"><?php echo $lop['typappart'];?></i></p>
                                                <p class="property--price"><?php echo $lop['prix'];?> fcfa</p>
                                            </div>
                                            <!-- .property-info end -->
                                            <div class="property--features">
                                                <ul class="list-unstyled mb-0">
                                                    <li><span class="feature">Chambres:</span><span class="feature-num"><?php echo $lop['lits'];?></span></li>
                                                    <li><span class="feature">Douches:</span><span class="feature-num"><?php echo $lop['douches'];?></span></li>
                                                    <li><span class="feature">Surface:</span><span class="feature-num"><?php echo $lop['surface'];?> m2</span></li>
                                                </ul>
                                            </div>
                                            <!-- .property-features end -->
                                        </div>
                                    </div>
                                </div>
                                        <?php } elseif ((cville($lop['idmaison'],$base)==$ville)&& $ville<>"Villes") {?>

                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                    <!-- .property-item #1 -->
                                    <div class="property-item">
                                        <div class="property--img">
                                        <a href="property-single-gallery.php?init=<?php echo $lop['idmaison']; ?>">
                                <img src="doc_client/img_maison/<?php echo $lop['imgp'];?>" alt="property image" class="img-responsive">
								</a>
                                            <span class="property--status"><?php echo $lop['statu'];?></span>
                                        </div>
                                        <div class="property--content">
                                            <div class="property--info">
                                                <h5 class="property--title"><a href="property-single-gallery.php?init=<?php echo $lop['idmaison']; ?>"><?php echo $lop['titre'];?></a></h5>
                                                <p class="property--location"><?php echo req($lop['idmaison'],$base).', '.read($lop['idmaison'],$base) ; ?>, Type: <i style="color:red"><?php echo $lop['typappart'];?></i></p>
                                                <p class="property--price"><?php echo $lop['prix'];?> fcfa</p>
                                            </div>
                                            <!-- .property-info end -->
                                            <div class="property--features">
                                                <ul class="list-unstyled mb-0">
                                                    <li><span class="feature">Chambres:</span><span class="feature-num"><?php echo $lop['lits'];?></span></li>
                                                    <li><span class="feature">Douches:</span><span class="feature-num"><?php echo $lop['douches'];?></span></li>
                                                    <li><span class="feature">Surface:</span><span class="feature-num"><?php echo $lop['surface'];?> m2</span></li>
                                                </ul>
                                            </div>
                                            <!-- .property-features end -->
                                        </div>
                                    </div>
                                </div>

                                   <?php } }
                                    ?>
                                <!-- .property item end -->

                               
                                <!-- .property item end -->
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-50">
                                <ul class="pagination">
                                <?php if(!isset($aut)){?> <h2> Aucun resultat </h2> <?php }?>
                                    <li class="" id="margd"><a href="<?php echo urls($fin-7,$fin-1,$sens);?>"><</a></li>       
                                    <li class="<?php activer($vals,1); ?>" ><a id="marga" style="cursor:pointer" href="<?php echo urls($deb,$fin,$sens);?>">1</a></li>
                                    <li class="<?php activer($vals,2); ?>" ><a id="margb" style="cursor:pointer" href="<?php echo urls($deb+7,$fin+13,$sens);?>">2</a></li>
                                    <li class="<?php activer($vals,3); ?>" ><a id="margc" style="cursor:pointer" href="<?php echo urls($deb+14,$fin+20,$sens);?>">3</a></li>
                                    <li class="" id="margd"><a href="<?php echo urls($fin+1,$fin+7,$sens);?>">></a></li>
                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- .col-md-12 end -->
                        </div>
                        <!-- .row -->
                    </div>
                    <!-- .col-md-8 end -->
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </section>
        <!-- #properties-grid  end  -->

        <!-- cta #1
============================================= -->
        <section id="cta" class="cta cta-1 text-center bg-overlay bg-overlay-dark pt-90">
            <div class="bg-section"><img src="assets/images/cta/bg-1.jpg" alt="Background"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
                        <h3>Rejoigner notre réseau de proffessionel & commencer vos affaires !!!</h3>
                        <a href="#" class="btn btn--primary">Contact</a>
                    </div>
                    <!-- .col-md-6 -->
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </section>
        <!-- #cta1 end -->
        <!-- Footer #1
============================================= -->
        <footer id="footer" class="footer footer-1 bg-white">
            <!-- Widget Section
	============================================= -->
            <div class="footer-widget">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-3 widget--about">
                            <div class="widget--content">
                                <div class="footer--logo">
                                    <img src="assets/images/logo/logo-dark2.png" alt="logo">
                                </div>
                                <p>APL studio Abidjan 01</p>
                                <div class="footer--contact">
                                    <ul class="list-unstyled mb-0">
                                        <li>+225 00 00 00 00</li>
                                        <li><a href="mailto:apl@studio.com">apl@studio.com</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- .col-md-2 end -->
                        <div class="col-xs-12 col-sm-3 col-md-2 col-md-offset-1 widget--links">
                            <div class="widget--title">
                                <h5>Compagnie</h5>
                            </div>
                            <div class="widget--content">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="#">A propos de nous</a></li><li><a href="#">Nos Services</a></li><li><a href="#">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- .col-md-2 end -->
                        <div class="col-xs-12 col-sm-3 col-md-2 widget--links">
                            <div class="widget--title">
                                <h5>plus d'info</h5>
                            </div>
                            <div class="widget--content">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="#">Termes & Conditions</a></li><li><a href="#">FAQ</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- .col-md-2 end -->
                        <div class="col-xs-12 col-sm-12 col-md-4 widget--newsletter">
                            <div class="widget--title">
                                <h5>newsletter</h5>
                            </div>
                            <div class="widget--content">
                                <form class="newsletter--form mb-40">
                                    <input type="email" class="form-control" id="newsletter-email" placeholder="Adresse Email">
                                    <button type="submit"><i class="fa fa-arrow-right"></i></button>
                                </form>
                                <h6>Restons en contact</h6>
                                <div class="social-icons">
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-vimeo"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- .col-md-4 end -->

                    </div>
                </div>
                <!-- .container end -->
            </div>
            <!-- .footer-widget end -->

            <!-- Copyrights
	============================================= -->
            <div class="footer--copyright text-center">
                <div class="container">
                    <div class="row footer--bar">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <span>© 2019 <a href="#">Apaulo_Studio</a>, Tous droitts réservés.</span>
                        </div>

                    </div>
                    <!-- .row end -->
                </div>
                <!-- .container end -->
            </div>
            <!-- .footer-copyright end -->
            <?php 
                if(isset($_GET['infoer']))
                {?>
            <script> alert("Veillez-vous connecter") </script>
               <?php }
            
            
            ?>
        </footer>
    </div>
    <!-- #wrapper end -->

    <!-- Footer Scripts
============================================= -->
    <script src="assets/js/jquery-2.2.4.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/functions.js"></script>
    <script src="assets/js/plugins/jquery.gmap.min.js"></script>
    <script src="assets/js/map-addresses.js"></script>
    <script src="assets/js/map-custom.js"></script>
    <script src="fonction/js/fonctionsp.js"></script>
    <script src="fonction/js/jquery.min.js"></script>
    <script>
    $("#go").click(function(){
      
      let liens="properties-grid.php";
      conect("#sub1","#sub",liens)
    enregist("#sub3","#sub4",liens)
   });
   $("#prop").click(function(){
      
      let lient="add-property.php";
      conect("#sub1","#sub",lient)
      enregist("#sub3","#sub4",lient)
  });
  $("#compte").click(function(){
      
      let lien="user-profile.php";
      conect("#sub1","#sub",lien)
      enregist("#sub3","#sub4",lien)
  });
    </script>
</body>

</html>
