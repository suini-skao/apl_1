<?php 
session_start();
require_once('his_bd.php');
require_once('fonction/php/function_p.php');
deco("./");
$base=$bdd; 
$req1=$base->query('SELECT* FROM ville');
if(isset($_SESSION['idprop']))
{
    $id=$_SESSION['idprop'];
}
verifh("./");
require_once('fonction/php/modulest.php');
$nombre=0;
$haut=50000000;
$bas=0;
$hauts=2000;
$bass=0;
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
        <header id="navbar-spy" class="header header-1 header-transparent header-fixed">
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
                            <li class="has-dropdown active">
                                    <li><a href="index.php">Acceuil</a></li>    
                            </li>
                            <!-- li end -->

                            <!-- Pages Menu-->
                            <li class="has-dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle menu-item">Utile</a>
                                <ul class="dropdown-menu">
                                     <!--
                                    <li class="dropdown-submenu">
                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">agents</a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="agents.html">Nos Agents</a>
                                            </li>
                                            <li>
                                                <a href="agent-profile.html">Profile Agents</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Agences</a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="agency-list.html">Nos agences</a>
                                            </li>
                                            <li>
                                                <a href="agency-profile.html">Profile Agences</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">blog</a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="blog.html">blog Grid</a>
                                            </li>
                                            <li>
                                                <a href="blog-sidebar-right.html">blog Grid Right </a>
                                            </li>
                                            <li>
                                                <a href="blog-sidebar-left.html">blog Grid Left </a>
                                            </li>
                                            <li>
                                                <a href="blog-single.html">blog single</a>
                                            </li> 
                                        </ul>
                                    </li>-->
                                     <li><a href="page-about.php">A propos</a></li>
                                    <li><a href="page-contact.php">Contact</a></li>
                                    <!--<li><a href="page-faq.html">page FAQ</a></li>
                                    <li><a href="page-404.html">page 404</a></li> -->
                                </ul>
                            </li>
                            <!-- li end -->

                            <!-- Profile Menu-->
                            <li class="has-dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle menu-item" >Profile</a>
                                <ul class="dropdown-menu">
                                    <li><a href="user-profile.php">Mon profile</a></li>
                                    <li><a href="social-profile.php">profile Sociaux</a></li>
                                    <li><a href="my-properties.php">Mes propertés</a></li>
                                    <li><a href="favourite-properties.php">Propertés Favories</a></li>
                                    <li><a href="add-property.php">Ajout propriétés</a></li>
                                </ul>
                            </li>
                            <!-- li end -->

                            <!-- Properties Menu-->
                            <li class="has-dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle menu-item" style="color:orange">Propriétés</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="properties-grid-split.php" >Recherche Avancée</a>
                                        <!-- <ul class="dropdown-menu">
                                            <li>
                                                <a href="properties-grid.html">properties grid</a>
                                            </li>
                                            <li>
                                                <a href="properties-grid-split.html">properties grid split</a>
                                            </li>
                                        </ul>
                                        -->
                                    </li>
                                    <li>
                                        <a href="properties-grid.php" >Recherche standart</a>

                                    </li>
                                    <!--
                                    <li class="dropdown-submenu">
                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">properties single</a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="property-single-gallery.html">single gallery</a>
                                            </li>
                                            <li>
                                                <a href="property-single-slider.html">single slider</a>
                                            </li>
                                        </ul>
                                    </li>
                                    -->
                                </ul>
                            </li>
                            <!-- li end -->

                            <li><a href="page-contact.php">contact</a></li>
                        </ul>
                        <!-- Module Signup  -->
                        <div class="module module-login pull-left">
                        <?php if(!isset($_SESSION['idprop']) ) { // cas ou nous avons pas de connection en cours ?>
                            <a class="btn-popup" data-toggle="modal" data-target="#signupModule">Login</a>
                            <?php } 
                        else {?> <a class="btn-popup" data-toggle="modal" href="index.php?dec">Déconnection</a> <?php }//module de deconnection
                        ?>
                            <div class="modal register-login-modal fade" tabindex="-1" role="dialog" id="signupModule">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="row">

                                                <!-- Nav tabs -->
                                                <ul class="nav nav-tabs">
                                                    <li class="active"><a href="#login" data-toggle="tab">login</a>
                                                    </li>
                                                    <li><a href="#signup" data-toggle="tab">signup</a>
                                                    </li>
                                                </ul>
                                                <!-- Tab panes -->
                                                <div class="tab-content">
                                                    <div class="tab-pane fade in active" id="login">
                                                        <div class="signup-form-container text-center">
                                                            <form class="mb-0">
                                                                <a href="#" class="btn btn--facebook btn--block"><i class="fa fa-facebook-square"></i>Login with Facebook</a>
                                                                <div class="or-text">
                                                                    <span>or</span>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="email" class="form-control" name="login-email" id="login-email" placeholder="Email Address">
                                                                </div>
                                                                <!-- .form-group end -->
                                                                <div class="form-group">
                                                                    <input type="password" class="form-control" name="login-password" id="login-password" placeholder="Password">
                                                                </div>
                                                                <!-- .form-group end -->
                                                                <div class="input-checkbox">
                                                                    <label class="label-checkbox">
                                <span>Remember Me</span>
                                <input type="checkbox">
                                <span class="check-indicator"></span>
                            </label>
                                                                </div>
                                                                <input type="submit" class="btn btn--primary btn--block" value="Sign In">
                                                                <a href="#" class="forget-password">Forget your password?</a>
                                                            </form>
                                                            <!-- form  end -->
                                                        </div>
                                                        <!-- .signup-form end -->
                                                    </div>
                                                    <div class="tab-pane" id="signup">
                                                        <form class="mb-0">
                                                            <a href="#" class="btn btn--facebook btn--block"><i class="fa fa-facebook-square"></i>Register with Facebook</a>
                                                            <div class="or-text">
                                                                <span>or</span>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" name="full-name" id="full-name" placeholder="Full Name">
                                                            </div>
                                                            <!-- .form-group end -->
                                                            <div class="form-group">
                                                                <input type="email" class="form-control" name="register-email" id="register-email" placeholder="Email Address">
                                                            </div>
                                                            <!-- .form-group end -->
                                                            <div class="form-group">
                                                                <input type="password" class="form-control" name="register-password" id="register-password" placeholder="Password">
                                                            </div>
                                                            <!-- .form-group end -->
                                                            <div class="input-checkbox">
                                                                <label class="label-checkbox">
                                <span>I agree with all <a href="#">Terms & Conditions</a></span>
                                <input type="checkbox">
                                <span class="check-indicator"></span>
                            </label>
                                                            </div>
                                                            <input type="submit" class="btn btn--primary btn--block" value="Register">
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

        <!-- Page Title #1
============================================ -->
        <section id="page-title" class="page-title bg-overlay bg-overlay-dark2">
            <div class="bg-section">
                <img src="assets/images/page-titles/1.jpg" alt="Background" />
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
                        <div class="title title-1 text-center">
                            <div class="title--content">
                                <div class="title--heading">
                                    <h1 style="color:orange">Recherche</h1>
                                </div>
                                <ol class="breadcrumb">
                                    <li><a href="#">Acceuil</a></li>
                                    <li class="active">Recherche Avancée</li>
                                </ol>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!-- .title end -->
                    </div>
                    <!-- .col-md-12 end -->
                </div>
                <!-- .row end -->
            </div>
            <!-- .container end -->
        </section>
        <!-- properties-split
============================================ -->
        <section id="properties-split" class="properties-split pt-0 pb-0 bg-white">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-7">
                        <form class="from-split">
                            <div class="form-box search-properties static pr-0 pl-0">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group input-icon">
                                            <i class="fa fa-map-marker"></i>
                                            <input type="text" class="form-control" id="location" name="quart" placeholder="Quartier">
                                        </div>
                                    </div>
                                    <!-- .col-md-12 end -->
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <div class="select--box">
                                                <i class="fa fa-angle-down"></i>
                                                <select name="select-city" id="select-city">
								<option>Villes</option>
                                <?php while($don=$req1->fetch()) {?>
                                        <option><?php echo $don['nom']; ?></option>
                                        <?php } ?>
							</select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- .col-md-4 end -->
                                    <div class="col-xs-12 col-sm-4 col-md-4">
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
                                    <!-- .col-md-4 end -->
                                    <div class="col-xs-12 col-sm-4 col-md-4">
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
                                    <!-- .col-md-12 end -->

                                    <div class="col-xs-12 col-sm-4 col-md-4 option-hide">
                                        <div class="form-group">
                                            <div class="select--box">
                                                <i class="fa fa-angle-down"></i>
                                                <select name="select-bedrooms" id="select-bedrooms">
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
                                    <div class="col-xs-12 col-sm-4 col-md-4 option-hide">
                                        <div class="form-group">
                                            <div class="select--box">
                                                <i class="fa fa-angle-down"></i>
                                                <select name="select-bathrooms" id="select-bathrooms">
                                        <option>Douches</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
							</select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- .col-md-4 end -->
                                    <div class="col-xs-12 col-sm-4 col-md-4 option-hide">
                                        <div class="filter mb-30 filtre" >
                                            <p>
                                                <label for="area">Surface:</label>
                                                <input id="area" type="text" class="amount2" readonly>
                                                <input  type="hidden" name="hauts" id="hauts" value="<?php echo $hauts;?>">
                                                <input  type="hidden" name="bass" id="bass" value="<?php echo $bass;?>">
                                            </p>
                                            <div class="slider-range2"></div>
                                        </div>
                                    </div>
                                    <!-- .col-md-4 end -->
                                    <div class="col-xs-12 col-sm-12 col-md-12 option-hide">
                                        <div class="filter mb-30">
                                            <p>
                                                <label for="amount">Option Prix:</label>
                                                <input id="amount" type="text" class="amount" readonly>
                                                <input  type="hidden" name="haut" id="haut" value="<?php echo $haut;?>">
                                                <input  type="hidden" name="bas" id="bas" value="<?php echo $bas;?>">
                                            </p>
                                            <div class="slider-range"></div>
                                        </div>
                                    </div>
                                   <!--  .col-md-4 end -->
                                   <!-- <div class="col-xs-12 col-sm-12 col-md-12">
                                        <a href="#" class="less--options mt-0 mb-25 block">- options</a>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
							<span>Balcon</span>
							<input type="checkbox" name="bal">
							<span class="check-indicator"></span>
						</label>
                                        </div>
                                    </div> -->
                                    <!-- .col-md-3 end -->
                                   <!-- <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
							<span>Animaux de companie</span>
							<input type="checkbox" name="anim">
							<span class="check-indicator"></span>
						</label>
                                        </div>
                                    </div>
                                     .col-md-3 end 
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
							<span>Barbeque</span>
							<input type="checkbox" name="barb">
							<span class="check-indicator"></span>
						</label>
                                        </div>
                                    </div>
                                    .col-md-3 end 
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
							<span>Alarm D'incendie</span>
							<input type="checkbox" name="alarm">
							<span class="check-indicator"></span>
						</label>
                                        </div>
                                    </div>
                                     .col-md-3 end 
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
							<span>Cuisine moderne</span>
							<input type="checkbox" name="cusine">
							<span class="check-indicator"></span>
						</label>
                                        </div>
                                    </div>
                                     .col-md-3 end 
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
							<span>Sauna</span>
							<input type="checkbox" name="sauna">
							<span class="check-indicator"></span>
						</label>
                                        </div>
                                    </div>
                                    < .col-md-3 end 
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
							<span>Gym</span>
							<input type="checkbox" name="gym">
							<span class="check-indicator"></span>
						</label>
                                        </div>
                                    </div>
                                     .col-md-3 end 
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
							<span>Ascensseur</span>
							<input type="checkbox" name="asc">
							<span class="check-indicator"></span>
						</label>
                                        </div>
                                    </div>
                                    .col-md-3 end 
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
							<span>Sortie d'urgence</span>
							<input type="checkbox" name="sortiu">
							<span class="check-indicator"></span>
						</label>
                                        </div>
                                    </div>
                                    
                                     .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <input type="submit" value="Rechercher"  class="btn btn--primary btn--block mb-30">
                                    </div>
                                    <!-- .col-md-12 end -->
                                </div>
                                <!-- .row end -->
                            </div>
                            <!-- .form-box end -->
                        </form>
                        <div class="row wrapper-bg pt-45">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="properties-filter clearfix">
                                    <div class="select--box pull-left">
                                        <label> Resultats Trouvés</label>
                                    </div>
                                    <!-- .select-box -->
                                    <div class="view--type pull-right">
                                        <a id="switch-list" href="#" class=""><i class="fa fa-th-list"></i></a>
                                        <a id="switch-grid" href="#" class="active"><i class="fa fa-th-large"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="properties properties-grid">
                                <?php 
                                
                                while($info=$reqd->fetch()) {
                                    $ok="lol";
                                    if((cville($info['idmaison'],$base)<>$ville)&&(req($info['idmaison'],$base)<>$quart)&&$ville=="Villes" &&$quart==""){
                                ?>
                                <!-- .property-item #1 -->
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="property-item">
                                        <div class="property--img">
                                            <a href="<?php verif($id,$info['idmaison']); ?>">
                                <img src="doc_client/img_maison/<?php echo $info['imgp'];?>" alt="property image" class="img-responsive">
								</a>
                                            <span class="property--status"><?php echo $info['statu'];?></span>
                                        </div>
                                        <div class="property--content">
                                            <div class="property--info">
                                                <h5 class="property--title"><a href="<?php verif($id,$info['idmaison']); ?>"><?php echo $info['titre'];?></a></h5>
                                                <p class="property--location"><?php echo req($info['idmaison'],$base).', '.read($info['idmaison'],$base).', '; ?> Type :<i style="color:red"><?php echo $info['typappart'] ; ?></i></p>
                                                <p class="property--price"><?php echo $info['prix'];?> fcfa</p>
                                            </div>
                                            <!-- .property-info end -->
                                        </div>
                                    </div>
                                </div>
                               
                                <?php 
                                } elseif((cville($info['idmaison'],$base)==$ville)&&(req($info['idmaison'],$base)<>$quart)&&$ville<>"Villes" &&$quart=="") {?>

                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="property-item">
                                        <div class="property--img">
                                            <a href="<?php verif($id,$info['idmaison']); ?>">
                                <img src="doc_client/img_maison/<?php echo $info['imgp'];?>" alt="property image" class="img-responsive">
								</a>
                                            <span class="property--status"><?php echo $info['statu'];?></span>
                                        </div>
                                        <div class="property--content">
                                            <div class="property--info">
                                                <h5 class="property--title"><a href="<?php verif($id,$info['idmaison']); ?>"><?php echo $info['titre'];?></a></h5>
                                                <p class="property--location"><?php echo req($info['idmaison'],$base).', '.read($info['idmaison'],$base).', '; ?> Type :<i style="color:red"><?php echo $info['typappart'] ; ?></i></p>
                                                <p class="property--price"><?php echo $info['prix'];?> fcfa</p>
                                            </div>
                                            <!-- .property-info end -->
                                        </div>
                                    </div>
                                </div>

                                <?php }
                           elseif((cville($info['idmaison'],$base)==$ville)&&(req($info['idmaison'],$base)==$quart)&&$ville<>"Villes" &&$quart<>"") {?>

                                <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="property-item">
                                    <div class="property--img">
                                        <a href="<?php verif($id,$info['idmaison']); ?>">
                            <img src="doc_client/img_maison/<?php echo $info['imgp'];?>" alt="property image" class="img-responsive">
                            </a>
                                        <span class="property--status"><?php echo $info['statu'];?></span>
                                    </div>
                                    <div class="property--content">
                                        <div class="property--info">
                                            <h5 class="property--title"><a href="<?php verif($id,$info['idmaison']); ?>"><?php echo $info['titre'];?></a></h5>
                                            <p class="property--location"><?php echo req($info['idmaison'],$base).', '.read($info['idmaison'],$base).', '; ?> Type :<i style="color:red"><?php echo $info['typappart'] ; ?></i></p>
                                            <p class="property--price"><?php echo $info['prix'];?> fcfa</p>
                                        </div>
                                        <!-- .property-info end -->
                                    </div>
                                </div>
                            </div>

                            <?php } 
                            
                            
                            }
                                if(!isset($ok))
                                {?>
                                 <h3>  Auccun Resultat trouvé</h3>
                                <?php }
                                
                                ?>
                                <!-- .property item end -->
                        
                            </div>
                        </div>
                        <!-- .row -->
                    </div>
                    <!-- .col-md-7 end -->
                    <div class="col-xs-12 col-sm-12 col-md-5 col-map">
                        <div class="map-horizontal">
                            <div style="width:100%;height:100vh;"> Zone de selection et Recherche pub</div>
                        </div>
                    </div>
                    <!-- .col-md-5 end -->
                </div>
                <!-- .row end -->
            </div>
            <!-- .container end -->

        </section>
        <!-- #properties-split  end -->

    </div>
    <!-- #wrapper end -->

    <!-- Footer Scripts
============================================= -->
    <script src="assets/js/jquery-2.2.4.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/functions.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=true&amp;key=AIzaSyCiRALrXFl5vovX0hAkccXXBFh7zP8AOW8"></script>
    <script src="assets/js/plugins/jquery.gmap.min.js"></script>
    <script src="assets/js/map-addresses.js"></script>
    <script src="assets/js/map-custom.js"></script>
</body>

</html>
