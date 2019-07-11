<?php 
session_start();
require_once('his_bd.php');
require_once('fonction/php/function_p.php');

if(isset($_GET['init']))
{
$idm=stp($_GET['init']);
}else { header('location:properties-grid.php'); }
$base=$bdd;
require_once('fonction/php/modulesp.php');
deco("./");
//verifh("./");
$idagent=p_id($idm,$base);
if(isset($_SESSION['idprop'])){
$revel=revel($idm,$_SESSION['idprop'],$base);

}
$valchoix=0;
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
                            <li>
                                <a href="./" >Acceuil</a>
                            </li>
                            <!-- li end -->

                            <!-- Pages Menu-->
                            <li class="has-dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle menu-item">Utile</a>
                                <ul class="dropdown-menu">
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
                                    <!-- <li class="dropdown-submenu">
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
                                     <li><a href="page-about.html">A propos</a></li>
                                    <li><a href="page-contact.php">Contact</a></li>
                                    <!--<li><a href="page-faq.html">page FAQ</a></li>
                                    <li><a href="page-404.html">page 404</a></li> -->
                                </ul>
                            </li>
                            <!-- li end -->

                            <!-- Profile Menu-->
                            <li class="has-dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle menu-item">Profile</a>
                                <ul class="dropdown-menu">
                                    <li><a href="user-profile.php">Mon profile</a></li>
                                    <li><a href="social-profile.php">profile Sociaux</a></li>
                                    <li><a href="my-properties.php">Mes propertés</a></li>
                                    <li><a href="favourite-properties.php">Propertés Favorite</a></li>
                                    <li><a href="add-property.php">Ajout propriétés</a></li>
                                </ul>
                            </li>
                            <!-- li end -->

                            <!-- Properties Menu-->
                            <li class="has-dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle menu-item">Propriétés</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="properties-grid-split.html" >Recherche Avancée</a>
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
                                        <a href="properties-list.html" >Recherche standart</a>

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

                            <li><a href="page-contact.html">contact</a></li>
                        </ul>
                        <!-- Module Signup  -->
                        <div class="module module-login pull-left">
                        <?php if(!isset($_SESSION['idprop']) ) { // cas ou nous avons pas de connection en cours ?>
                            <a class="btn-popup" data-toggle="modal" data-target="#signupModule" id="go">connexion</a>
                            <?php } 
                        else {?> <a class="btn-popup" data-toggle="modal" href="index.php?dec" id="go">Déconnection</a><?php }//module de deconnection
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
                                    <h1>Caractéristique de la propriété</h1>
                                </div>
                                <ol class="breadcrumb">
                                    <li><a href="#">Maison</a></li>
                                    <li class="active">Caractéristique de la propriété</li>
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
        <!-- #page-title end -->

        <!-- property single gallery
============================================= -->
        <section id="property-single-gallery" class="property-single-gallery">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="property-single-gallery-info">
                            <div class="property--info clearfix">
                                <div class="pull-left">
                                    <h5 class="property--title"><?php echo titrem($idm,$bdd); ?></h5>
                                    <p class="property--location"><i class="fa fa-map-marker"></i><?php echo cville($idm,$base).' , '.req($idm,$base).' - '.read($idm,$base); ?></p>
                                </div>
                                <div class="pull-right">
                                    <span class="property--status"><?php echo statu($idm,$base) ;?></span>
                                    <p class="property--price"><?php echo prix($idm,$base); ?>$</p>
                                </div>
                            </div>
                            <!-- .property-info end -->
                            <div class="property--meta clearfix">
                                <div class="pull-left">
                                    <ul class="list-unstyled list-inline mb-0">
                                        <li>
                                            Identifiant Maison:<span class="value"><?php echo $idm; ?> </span>
                                        </li>
                                        <?php if(isset($_SESSION['idprop'])) {?>
                                        <li>
                                            J'adore:<span class="value" id="aime" value="<?php echo $revel; ?>" > <i id="coeur" class="fa fa-heart-o" style="color:red; cursor:pointer"></i></span>
                                        </li>
                                        <li>
                                        <i id="actul"></i> <i class="fa fa-heart" style="color:red"> </i>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                                <div class="pull-right">
                                    <div class="property--meta-share">
                                        <span class="share--title">voir</span>
                                        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                                        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                                        <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                                        <a href="#" class="pinterest"><i class="fa fa-pinterest-p"></i></a>
                                    </div>
                                    <!-- .property-meta-share end -->
                                </div>
                            </div>
                            <!-- .property-info end -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-8">
                        <div class="property-single-carousel inner-box">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="heading">
                                        <h2 class="heading--title">Galerie</h2>
                                    </div>
                                </div>
                                <!-- .col-md-12 end -->
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="property-single-carousel-content">
                                        <div class="carousel carousel-thumbs slider-navs" data-slide="1" data-slide-res="1" data-autoplay="true" data-thumbs="true" data-nav="true" data-dots="false" data-space="30" data-loop="true" data-speed="800" data-slider-id="1">
                                            <img style="" class="img_tailles" src="doc_client/img_maison/<?php echo imagesp($idm,$bdd); ?>" alt="Property Image">
                                            <?php while ($images=$rep->fetch()) {?> 
                                            <img style="" class="img_tailles" src="doc_client/img_maison/<?php echo $images['img']; ?>" alt="Property Image">
                                            <?php }?>
                                        </div>
                                        <!-- .carousel end -->
                                    <div class="owl-thumbs thumbs-bg" data-slider-id="1">
                                            <button class="owl-thumb-item">
								<img style="" src="doc_client/img_maison/<?php echo imagesp($idm,$bdd);?>" alt="">
                            </button>
                            <?php while ($image=$rep1->fetch()) {?>
                                            <button class="owl-thumb-item">
						   		<img style="" src="doc_client/img_maison/<?php echo $image['img']; ?>" alt="">
                           </button>
                            <?php }?>
                                    </div>
                                </div>
                                    <!-- .col-md-12 end -->
                                </div>
                            </div>
                            <!-- .row end -->
                        </div>
                        <!-- .property-single-desc end -->
                        <div class="property-single-desc inner-box">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="heading">
                                        <h2 class="heading--title">Description</h2>
                                    </div>
                                </div>
                                <!-- feature-panel #1 -->
                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-panel">
                                        <div class="feature--img">
                                            <img src="assets/images/property-single/features/1.png" alt="icon">
                                        </div>
                                        <div class="feature--content">
                                            <h5>Surface:</h5>
                                            <p><?php echo surface($idm,$base); ?> m2</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- feature-panel end -->
                                <!-- feature-panel #2 -->
                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-panel">
                                        <div class="feature--img">
                                            <img src="assets/images/property-single/features/2.png" alt="icon">
                                        </div>
                                        <div class="feature--content">
                                            <h5>Pieces:</h5>
                                            <p><?php echo pieces($idm,$base); ?> Pieces</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- feature-panel end -->
                                <!-- feature-panel #3 -->
                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-panel">
                                        <div class="feature--img">
                                            <img src="assets/images/property-single/features/3.png" alt="icon">
                                        </div>
                                        <div class="feature--content">
                                            <h5>Douches:</h5>
                                            <p><?php echo douches($idm,$base); ?> Douches</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- feature-panel end -->
                                <!-- feature-panel #4 -->
                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-panel">
                                        <div class="feature--img">
                                            <img src="assets/images/property-single/features/4.png" alt="icon">
                                        </div>
                                        <div class="feature--content">
                                            <h5>Chambres:</h5>
                                            <p><?php echo lits($idm,$base); ?> Chambres</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- feature-panel end -->
                                <!-- feature-panel #5 -->
                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-panel">
                                        <div class="feature--img">
                                            <img src="assets/images/property-single/features/5.png" alt="icon">
                                        </div>
                                        <div class="feature--content">
                                            <h5>Etages:</h5>
                                            <p> <?php echo escaliers($idm,$base); ?> Etages</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- feature-panel end -->
                                <!-- feature-panel #6 -->
                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-panel">
                                        <div class="feature--img">
                                            <img src="assets/images/property-single/features/6.png" alt="icon">
                                        </div>
                                        <div class="feature--content">
                                            <h5>Garages:</h5>
                                            <p><?php echo garages($idm,$base); ?> Garages</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- feature-panel end -->
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="property--details">
                                        <p> <?php echo descript($idm,$base); ?> </p>
                                    </div>
                                    <!-- .property-details end -->
                                </div>
                                <!-- .col-md-12 end -->
                            </div>
                            <!-- .row end -->
                        </div>
                        <!-- .property-single-desc end -->


                        <div class="property-single-features inner-box">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="heading">
                                        <h2 class="heading--title">Suppléments</h2>
                                    </div>
                                </div>
                                <!-- feature-item #1 -->
                                <?php if(autc($idm,"barbeq",$base)=="auto") { ?>
                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-item">
                                        <p>Barbeque</p>
                                    </div>
                                </div>
                                <?php } ?>
                                <!-- feature-item end -->
                                <!-- feature-item #2 -->
                                <?php if(autc($idm,"balcon",$base)=="auto") { ?>
                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-item">
                                        <p>Balcon</p>
                                    </div>
                                </div>
                                <?php } ?>
                                <!-- feature-item end -->
                                <!-- feature-item #3 -->
                                <?php if(autc($idm,"animaux",$base)=="auto") { ?>
                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-item">
                                        <p>Animal de compagnie</p>
                                    </div>
                                </div>
                                <?php } ?>
                                <!-- feature-item end -->
                                <!-- feature-item #4 -->
                                <?php if(autc($idm,"alarm",$base)=="auto") { ?>
                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-item">
                                        <p>Alarm à incendie</p>
                                    </div>
                                </div>
                                <?php } ?>
                                <!-- feature-item end -->
                                <!-- feature-item #5 -->
                                <?php if(autc($idm,"cuisinem",$base)=="auto") { ?>
                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-item">
                                        <p>Cuisine Moderne</p>
                                    </div>
                                </div>
                                <?php } ?>
                                <!-- feature-item end -->
                                <!-- feature-item #6 -->
                                <?php if(autc($idm,"sauna",$base)=="auto") { ?>
                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-item">
                                        <p>Sauna</p>
                                    </div>
                                </div>
                                <?php } ?>
                                <!-- feature-item end -->
                                <!-- feature-item #7 -->
                                <?php if(autc($idm,"gym",$base)=="auto") { ?>
                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-item">
                                        <p>Salle de gym</p>
                                    </div>
                                </div>
                                <?php }?>
                                <!-- feature-item end -->
                                <!-- feature-item #8 -->
                                <?php if(autc($idm,"ascens",$base)=="auto") { ?>
                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-item">
                                        <p>Ascenceur</p>
                                    </div>
                                </div>
                                <?php } ?>
                                <!-- feature-item end -->
                                <!-- feature-item #9 -->
                                <?php if(autc($idm,"sorti_u",$base)=="auto") { ?>
                                <div class="col-xs-6 col-sm-4 col-md-4">
                                    <div class="feature-item">
                                        <p>Sortie D'urgence</p>
                                    </div>
                                </div>
                                <?php } ?>
                                <!-- feature-item end -->
                                
                            </div>
                            <!-- .row end -->
                        </div>
                        <!-- .property-single-features end -->

                        <div class="property-single-location inner-box">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="heading">
                                        <h2 class="heading--title">Localisation</h2>
                                    </div>
                                </div>
                                <!-- .col-md-12 end -->
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <ul class="list-unstyled mb-20">
                                        <li><span>Addresse:</span><?php echo read($idm,$base)?></li>
                                        <li><span>Quartier:</span><?php echo req($idm,$base)?></li>
                                        <li><span>Ville:</span> <?php echo cville($idm,$base)?></li>
                                    </ul>
                                </div>
                                <!-- .col-md-12 end -->

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div id="googleMap" style="width:100%;height:380px;"></div>
                                </div>
                                <!-- .col-md-12 end -->
                            </div>
                            <!-- .row end -->
                        </div>
                        <!-- .property-single-location end -->

                        <div class="property-single-video inner-box">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="heading">
                                        <h2 class="heading--title">Video</h2>
                                    </div>
                                </div>
                                <!-- .col-md-12 end -->
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="video--content text-center">
                                        <div class="bg-section">
                                            <img src="assets/images/video/1.jpg" alt="Background" />
                                        </div>
                                        <div class="video--button">
                                            <div class="video-overlay">
                                                <div class="pos-vertical-center">
                                                    <a class="popup-video" href="doc_client/ok1/video_m/<?php echo retvideo($idm,$base); ?>">
                                            <i class="fa fa-youtube-play"></i>  
                                        </a>
                                                </div>
                                            </div>
                                            <!-- .video-player end -->
                                        </div>
                                    </div>
                                    <!-- .video-content end -->
                                </div>
                                <!-- .col-md-12 end -->
                            </div>
                            <!-- .row end -->
                        </div>
                        <!-- .property-single-video end -->

                        <div class="property-single-reviews inner-box">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="heading">
                                        <h2 class="heading--title"><?php echo comptcom($idm,$bdd);  ?> Commentaires</h2>
                                    </div>
                                </div>
                                <!-- .col-md-12 end -->
                                
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <ul class="property-review">
                                    <?php while ($com=$rep2->fetch()) { ?>
                                        <li class="review-comment">
                                            <div class="avatar"><?php echo substr($com['nom'],0,1);?></div>
                                            <div class="comment">
                                                <h6><?php echo $com['nom']; ?></h6>
                                                <div class="date"><?php echo $com['dates']; ?></div>
                                                <div class="property-rating">
                                                    <?php 
                                                    $i1=1;
                                                    $i2=1;
                                                    $star=$com['rang'];
                                                    $nostar=5-$star;
                                                    while($i1<=$star) { ?>
                                                    <i class="fa fa-star"></i>
                                                    <?php $i1=$i1+1; }
                                                    while($i2<=$nostar) {?>
                                                    <i class="fa fa-star-o"></i>
                                                    <?php $i2=$i2+1; }?>
                                                </div>
                                                <p><?php echo $com['commentaire']; ?></p>
                                            </div>
                                        </li>
                                <?php }?>
                                       
                                    </ul>
                                    <!-- .comments-list end -->
                                </div>
                                <!-- .col-md-12 end -->
                            </div>
                            <!-- .row end -->
                        </div>
                        <!-- .property-single-reviews end -->

                        <div class="property-single-leave-review inner-box">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="heading">
                                        <h2 class="heading--title">Laisser un commentaire</h2>
                                    </div>
                                </div>
                                <!-- .col-md-12 end -->
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <form id="post-comment" class="mb-0" method="post">
                                        <div class="row">
                                        <?php if(!isset($_SESSION['idprop'])) {?>
                                            <div class="col-xs-12 col-sm-4 col-md-4">
                                                <div class="form-group">
                                                    <label for="review-name">Votre Nom*</label>
                                                    <input type="text" class="form-control" name="name" id="review-name" required>
                                                </div>
                                            </div>
                                            <!-- .col-md-4 end -->
                                            
                                            <div class="col-xs-12 col-sm-4 col-md-4">
                                                <div class="form-group">
                                                    <label for="review-email">Vote Email*</label>
                                                    <input type="email" class="form-control" name="email" id="review-email" required>
                                                </div>
                                            </div>
                                            <?php } ?>
                                            <!-- .col-md-4 end -->
                                            <!-- .col-md-4 end -->
                                            <div class="col-xs-12 col-sm-4 col-md-4">
                                                <div class="form-group">
                                                    <label>Notation*</label>
                                                    <div class="property-rating">
                                                        <i class="fa fa-star-o" id="s1" style="cursor:pointer; color:orange"></i>
                                                        <i class="fa fa-star-o" id="s2" style="cursor:pointer; color:orange" ></i>
                                                        <i class="fa fa-star-o" id="s3" style="cursor:pointer; color:orange"></i>
                                                        <i class="fa fa-star-o" id="s4" style="cursor:pointer; color:orange"></i>
                                                        <i class="fa fa-star-o" id="s5" style="cursor:pointer; color:orange"></i>
                                                    </div>
                                                    <input type="hidden" name="notation" value="" id="notation">
                                                </div>
                                            </div>
                                
                                            <!-- .col-md-4 end -->

                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="review-comment">Commentaire*</label>
                                                    <textarea class="form-control" id="review-comment" rows="2" name="commentaire" required></textarea>
                                                </div>
                                            </div>
                                            <!-- .col-md-12 -->
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <button type="submit" class="btn btn--primary">Commenter</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- .col-md-12 end -->
                            </div>
                            <!-- .row end -->
                        </div>
                        <!-- .property-single-leave-review end -->
                    </div>
                    <!-- .col-md-8 -->
                    <div class="col-xs-12 col-sm-12 col-md-4">
                        <!-- widget property agent
=============================-->
                        <div class="widget widget-property-agent">
                            <div class="widget--title">
                                <h5>A propos de l'Agent</h5>
                            </div>
                           
                            <div class="widget--content">
                            <?php if(isset($_SESSION['idprop'])) {?>
                                <a href="#">
                                    <div class="agent--img">
                                        <img src="doc_client/img_user/<?php echo p_image($idagent,$base); ?>" alt="agent" class="img-responsive">
                                    </div>
                                    <div class="agent--info">
                                        <h5 class="agent--title"><?php echo u_nom($idagent,$base)." ".u_prenom($idagent,$base) ; ?></h5>
                                    </div>
                                </a>
                                <!-- .agent-profile-details end -->
                                <div class="agent--contact">
                                    <ul class="list-unstyled">
                                        <li><i class="fa fa-phone"></i>(+225) <?php echo u_contact($idagent,$base) ; ?> </li>
                                        <li><i class="fa fa-envelope-o"></i><?php echo u_email($idagent,$base); ?> </li>
                                        <li><i class="fa fa-link"></i>modernhouse.com</li>
                                    </ul>
                                </div>
                                <!-- .agent-contact end -->
                                <div class="agent--social-links">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                </div>
                                <!-- .agent-social-links -->
                                <?php } else { echo "Veillez-vous connecter pour voir les informations sur l'Agent";} ?>
                            </div>
                           
                        </div>
                        <!-- . widget property agent end -->

                        <!-- widget request
=============================-->
                        <div class="widget widget-request">
                            <div class="widget--title">
                                <h5>Rentrer en contact avec l'agent</h5>
                            </div>
                            <div class="widget--content">
                                <form class="mb-0" method="post" id="mess_u">
                                   <!--  <?php if(!isset($_SESSION['idprop'])) { ?>
                                    <div class="form-group">
                                        <label for="contact-name">Votre Nom*</label>
                                        <input type="text" class="form-control" name="contact-name" id="contact-name" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="contact-email">Addresse Email*</label>
                                        <input type="email" class="form-control" name="contact-email" id="contact-email" required>
                                    </div>
                                   
                                    <div class="form-group">
                                        <label for="contact-phone">Numero de Téléphone</label>
                                        <input type="text" class="form-control" name="contact-phone" id="contact-phone" placeholder="(optional)">
                                    </div>
                                    <?php } ?>
                                    -->
                                    <?php if(isset($_SESSION['idprop'])) { ?>
                                    <div class="form-group">
                                        <label for="message">Message*</label>
                                        <textarea class="form-control" name="contact-message" id="message" rows="2" placeholder=""></textarea>
                                    </div>
                                    <!-- .form-group end -->
                                    <input type="hidden" id="mois" value="<?php echo $_SESSION['idprop']; ?>">
                                    <input type="hidden" id="maison" value="<?php echo $idm; ?>">
                                    <input type="hidden" id="agent" value="<?php echo $idagent; ?>">
                                    <input type="submit" value="Envoyer" name="submit" id="go" class="btn btn--primary btn--block">
                                    <?php }else { echo "Veillez-vous connecter pour pouvoir contacter l'Agent"; } ?>
                                </form>
                            </div>
                        </div>
                        <!-- . widget request end -->

                        <!-- widget featured property
=============================-->
                        <div class="widget widget-featured-property">
                            <div class="widget--title">
                                <h5>Propriétés en Vedette</h5>
                            </div>
                            <div class="widget--content">
                                <div class="carousel carousel-dots" data-slide="1" data-slide-rs="1" data-autoplay="true" data-nav="false" data-dots="true" data-space="25" data-loop="true" data-speed="800">
                                <?php 
                                $reqg=$base->query('SELECT* FROM maison');
                                while($favo=$reqg->fetch()) {
                                    $nombre=comptfa($favo['idmaison'],$base);
                                    if($nombre>=$valchoix) {
                                ?>
                                    <!-- .property-item #1 -->
                                    <div class="property-item">
                                        <div class="property--img">
                                            
                                            <a href="property-single-gallery.php?init=<?php echo $favo['idmaison']; ?>">
                                            <img src="doc_client/img_maison/<?php echo $favo['imgp']; ?>" alt="property image" class="img-responsive">
                                            <span class="property--status"><?php echo $favo['statu']; ?></span>
                                        </div>
                                        <div class="property--content">
                                            <div class="property--info">
                                                <h5 class="property--title"><a href="property-single-gallery.php?init=<?php echo $favo['idmaison']; ?>"><?php echo $favo['titre']; ?></a></h5>
                                                <p class="property--location"><?php echo req($favo['idmaison'],$base).', '.read($favo['idmaison'],$base) ; ?></p>
                                                <p class="property--price"><?php echo $favo['prix'].' $' ; if($favo['statu']=="A louer"){ ?><span class="time">Mois</span> <?php } ?></p>
                                            </div>
                                            <!-- .property-info end -->
                                        </div>
                                    </div>
                                    <!-- .property item end -->
                                <?php } } ?>
                                    
                                    <!-- .property item end -->
                                </div>
                                <!-- .carousel end -->
                            </div>
                        </div>
                        <!-- . widget featured property end -->

                        <!-- widget mortgage calculator
=============================-->
                        <div class="widget widget-mortgage-calculator">
                            <div class="widget--title">
                                <h5>Annonces</h5>
                            </div>
                            <div class="widget--content">
                                
                            </div>
                        </div>
                        <!-- . widget mortgage calculator end -->
                    </div>
                    <!-- .col-md-4 -->
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </section>
        <!-- #property-single end -->


        <!-- properties-carousel
============================================= -->
        <section id="properties-carousel" class="properties-carousel pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="heading heading-2  mb-70">
                            <h2 class="heading--title">Propriétés Similaires</h2>
                        </div>
                        <!-- .heading-title end -->
                    </div>
                    <!-- .col-md-12 end -->
                </div>
                <!-- .row end -->
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="carousel carousel-dots" data-slide="3" data-slide-rs="1" data-autoplay="true" data-nav="false" data-dots="true" data-space="25" data-loop="true" data-speed="800">
                            <!-- .property-item #1 -->
                            <?php while($sim=$simil->fetch()) {?>
                            <div class="property-item">
                                <div class="property--img">
                                <a href="property-single-gallery.php?init=<?php echo $sim['idmaison']; ?>">
                            <img src="doc_client/img_maison/<?php echo $sim['imgp']; ?>" alt="property image" class="img-responsive">
                            <span class="property--status"><?php echo $sim['statu']; ?></span>
</a>
                                </div>
                                <div class="property--content">
                                    <div class="property--info">
                                        <h5 class="property--title"> <a href="property-single-gallery.php?init=<?php echo $sim['idmaison']; ?>"><?php echo $sim['titre']; ?></a></h5>
                                        <p class="property--location"><?php echo req($sim['idmaison'],$base).', '.read($sim['idmaison'],$base) ; ?></p>
                                        <p class="property--price"><?php echo $sim['prix'].' fcfa' ; if($sim['statu']=="A louer"){ ?><span class="time">Mois</span> <?php } ?></p>
                                    </div>
                                    <!-- .property-info end -->
                                    <div class="property--features">
                                        <ul class="list-unstyled mb-0">
                                            <li><span class="feature">Chambres:</span><span class="feature-num"><?php echo $sim['lits']; ?></span></li>
                                            <li><span class="feature">Douches:</span><span class="feature-num"><?php echo $sim['douches']; ?></span></li>
                                            <li><span class="feature">Surfaces:</span><span class="feature-num"><?php echo $sim['surface']; ?> m2</span></li>
                                        </ul>
                                    </div>
                                    <!-- .property-features end -->
                                </div>
                            </div>
                            <?php } ?>
                            <!-- .property item end -->
                            <!-- .property item end -->

                        </div>
                        <!-- .carousel end -->
                    </div>
                    <!-- .col-md-12 -->
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </section>
        <!-- #properties-carousel  end  -->

        <!-- cta #1
============================================= -->
        <section id="cta" class="cta cta-1 text-center bg-overlay bg-overlay-dark pt-90">
            <div class="bg-section"><img src="assets/images/cta/bg-1.jpg" alt="Background"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
                        <h3>Rejoigner notre réseau de proffessionnel & commencer vos affaires !!!!</h3>
                        <a href="page-contact.php" class="btn btn--primary">Contact</a>
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
                            <?php 
                            if(isset($_GET['bg']))
                                {
                                    $prop=$_GET['bg'];
                                    if($prop)
                                    {?>
                                    <script> alert("Message Envoyer!! ")</script>
                                    <?php }
                                }
                            ?>
                        </div>

                    </div>
                    <!-- .row end -->
                </div>
                <!-- .container end -->
            </div>
            <!-- .footer-copyright end -->
        </footer>
    </div>
    <!-- #wrapper end -->

    <!-- Footer Scripts
============================================= -->
<script src="assets/js/jquery-2.2.4.min.js"></script>
<script src="fonction/js/fonctionsp.js"></script>
    <script src="fonction/js/rangcontol.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/functions.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=true&amp;key=AIzaSyCiRALrXFl5vovX0hAkccXXBFh7zP8AOW8"></script>
    <script src="assets/js/plugins/jquery.gmap.min.js"></script>
    <script>
        $('#googleMap').gMap({
            address: "121 King St,Melbourne, Australia",
            zoom: 12,
            maptype: 'ROADMAP',
            markers: [{
                address: "Melbourne, Australia",
                maptype: 'ROADMAP',
                icon: {
                    image: "assets/images/gmap/marker1.png",
                    iconsize: [52, 75],
                    iconanchor: [52, 75]
                }
            }]
        });

    </script>
    <script>   rating("#s1","#s2","#s3","#s4","#s5") ;
                aime("#aime","#coeur");
                actu("#actul");
                gm("#aime","#coeur");
                a_message("#mess_u","#go");
        $("#go").click(function(){
      
         let liens="property-single-gallery.php?init=<?php echo $_GET['init']?>";
         conect("#sub1","#sub",liens)
        enregist("#sub3","#sub4",liens)
                });
                
    </script>
    <script src="assets/js/map-custom.js"></script>
    
</body>

</html>
