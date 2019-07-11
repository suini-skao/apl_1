<?php 
session_start();
require_once('his_bd.php');
require_once('fonction/php/function_p.php');
deco("./");
$base=$bdd; 
if(isset($_SESSION['idprop']))
{
    $id=$_SESSION['idprop'];
}
verifh("./");
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
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle menu-item" style="color:orange">Profile</a>
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
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle menu-item">Propriétés</a>
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
                                    <h1 style="color:orange">Pofil Utilisateur</h1>
                                </div>
                                <ol class="breadcrumb">
                                    <li><a href="#">Menu</a></li>
                                    <li class="active">Profil Utilisateur</li>
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

        <!-- #user-profile
============================================= -->
        <section id="user-profile" class="user-profile">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-4">
                        <div class="edit--profile-area">
                            <ul class="edit--profile-links list-unstyled mb-0">
                                <li><a href="user-profile.php" class="active">Modifier Profil</a></li>
                                <li><a href="social-profile.php">Profil social</a></li>
                                <li><a href="my-properties.php">Mes Propriété</a></li>
                                <li><a href="favourite-properties.php">Propriétés Favorite </a></li>
                                <li><a href="add-property.php">Ajout Maison</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- .col-md-4 -->
                    <div class="col-xs-12 col-sm-12 col-md-8">
                        <form class="mb-0" id="form1" enctype="multipart/form-data">
                            <div class="form-box">
                                <h4 class="form--title">Image Profil</h4>
                                <div class="upload--img-area">
                                    <div class="preview--img">
                                        <img src="doc_client/img_user/<?php echo p_image($id,$base); ?>" id="output--img" class="output--img">
                                    </div>
                                    <a class="btn btn--primary btn-file ml-30" >Selectionner
                                <input type="file" hidden  name="user-img2">
                                <input type="file" accept="image/*" name="user-img1" onchange="loadFile(event)" > 
                            </a>
                                    <a href="#" class="btn delete--img" id="sup"><i class="fa fa-times" ></i>Supprimer</a>
                                    <script>
                                        var loadFile = function(event) {
                                            var reader = new FileReader();
                                            reader.onload = function() {
                                                var output = document.getElementById('output--img');
                                                output.src = reader.result;
                                            };
                                            reader.readAsDataURL(event.target.files[0]);
                                        };

                                    </script>
                                </div>
                            </div>
                            <div class="form-box">
                                <h4 class="form--title">Information Personnelle</h4>
                                <div class="form-group">
                                    <label for="first-name">Nom</label>
                                    <input type="text" class="form-control" name="first-name" id="first-name" value="<?php echo u_nom($id,$base); ?>" >
                                </div>
                                <!-- .form-group end -->
                                <div class="form-group">
                                    <label for="last-name">Prenom</label>
                                    <input type="text" class="form-control" name="last-name" id="last-name" value="<?php echo u_prenom($id,$base); ?>">
                                </div>
                                <!-- .form-group end -->
                                <div class="form-group">
                                    <label for="email-address">Email</label>
                                    <input type="email" class="form-control" name="email-address" id="email-address" value="<?php echo u_email($id,$base); ?>">
                                </div>
                                <!-- .form-group end -->
                                <div class="form-group">
                                    <label for="phone-number">Numero de Téléphone</label>
                                    <input type="text" class="form-control" name="phone-number" id="phone-number" value="<?php echo u_contact($id,$base); ?>"">
                                </div>
                                <!-- .form-group end -->
                                <div class="form-group">
                                    <label for="about-me">A propos de moi</label>
                                    <textarea class="form-control" name="about-me" id="about-me" rows="2"><?php echo u_info($id,$base)?></textarea>
                                </div>
                                <!-- .form-group end -->
                            </div>
                            <!-- .form-box end -->
                            <div class="form-box">
                                <h4 class="form--title">Changer votre mot de passe</h4>
                                <div class="form-group">
                                    <label for="password">mot de passe</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="nouveau">
                                </div>
                                <!-- .form-group end -->
                                <div class="form-group">
                                    <label for="confirm-password">confirmer mot de passe</label>
                                    <input type="password" class="form-control" name="confirm-password" id="confirm-password" placeholder="confirmer">
                                </div>
                                <div class="form-group">
                                    <p id="erinfo"> </p>
                                </div>
                                <!-- .form-group end -->
                            </div>
                            <!-- .form-box end -->
                            <input type="hidden" id="moi" name="moi" value="<?php echo $id; ?>">
                            <input type="submit" value="Sauvegarder" name="submit" class="btn btn--primary" id="form2">
                        </form>
                    </div>
                    <!-- .col-md-8 end -->
                </div>
                <!-- .row end -->
            </div>
        </section>
        <!-- #user-profile  end -->

        <!-- cta #1
============================================= -->
        <section id="cta" class="cta cta-1 text-center bg-overlay bg-overlay-dark pt-90">
            <div class="bg-section"><img src="assets/images/cta/bg-1.jpg" alt="Background"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
                        <h3>Rejoingner notre réseau d'agent & commencer vos affaires!!!</h3>
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
        </footer>
    </div>
    <!-- #wrapper end -->

    <!-- Footer Scripts
============================================= -->
<script src="assets/js/jquery-2.2.4.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/dropzone.js"></script>
    <script src="assets/js/functions.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=true&amp;key=AIzaSyCiRALrXFl5vovX0hAkccXXBFh7zP8AOW8"></script>
    <script src="assets/js/plugins/jquery.gmap.min.js"></script>
    <script src="fonction/js/fonctionsp.js"></script>
    <script src="fonction/js/jquery.min.js"></script>
    
    <script> u_update("#form1","#form2","#sup")</script>
</body>

</html>