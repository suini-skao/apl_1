<?php session_start();
    require_once('his_bd.php');
    require_once('fonction/php/function_p.php');
    deco("page-about.php");
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
            <<nav id="primary-menu" class="navbar navbar-fixed-top">
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
                            <li >
                                <a href="./">Acceuil</a>
                                
                            </li>
                            <!-- li end -->

                            <li>
                                <a href="page-about.php" style="color:orange">A Propos</a>
                                
                            </li>

                            <!-- Properties Menu-->
                            <li >
                                <a href="properties-grid.php">Propriete</a>
                                
                            </li>
                                  
                        
                        

                            <li><a href="page-contact.php">contact</a></li>
                            <li>
                               <?php if(!isset($_SESSION['idprop'])) { ?>
                                <a class="btn-popup" data-toggle="modal" data-target="#signupModule" style="cursor:pointer;">mon compte</a>
                               <?php } else { ?>  <a href="user-profile.php" >mon compte </a>  <?php } ?>
                            </li>
                        </ul>
                        <!-- Module Signup  -->
                        <div class="module module-login pull-left">
                        <?php if(!isset($_SESSION['idprop']) ) { // cas ou nous avons pas de connection en cours ?>
                            <a class="btn-popup" data-toggle="modal" data-target="#signupModule">connexion</a>
                            <?php } 
                        else {?> <a class="btn-popup" data-toggle="modal" href="page-about.php?dec">Déconnection</a><?php }//module de deconnection
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
                                                                <input type="submit" id="sub" class="btn btn--primary btn--block" value="Sign In">
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
                                                            <input type="submit" class="btn btn--primary btn--block" id="sub4" value="S'inscrire'">
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
                                    <h1 style="color:orange">A propos</h1>
                                </div>
                                <ol class="breadcrumb">
                                    <li><a href="#">Acceuil</a></li>
                                    <li class="active">A propos</li>
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

        <!-- about #1
============================================= -->
        <section id="about" class="about bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-5 col-md-5">
                        <div class="about--img"><img class="img-responsive" src="assets/images/us/Apaulo.jpg" alt="about img"></div>
                    </div>
                    <!-- .col-md-5 -->
                    <div class="col-xs-12 col-sm-7 col-md-6 col-md-offset-1">
                        <div class="heading heading-3">
                            <h2 class="heading--title"> Qui somme nous ? </h2>
                        </div>
                        <!-- .heading-title end -->
                        <div class="about--panel">
                            <h3>Notre Vision</h3>
                            <p> Facilité l'accès au particilier au monde de l'immobilié </p>
                        </div>
                        <!-- .about-panel end -->
                        <div class="about--panel">
                            <h3>Notre slogant</h3>
                            <p>Toujours se battre malgré toutes les situations</p>
                        </div>
                        <div class="about--panel">
                            <h3>Apolo studios</h3>
                            <p>Nous sommes une entreprise de génies logiciels, devellopeurs et entrepreneurs autonomes.<br>
                                Nous sommes une entreprise à fort apport grâce à nos plans de travail et nos vastes domaines d'étude.<br>
                                A savoir l'imobilier, le devellopement ,la recherche, l'animation, la publicité .....
                        </p>
                        </div>
                        <!-- .about-panel end -->
                    </div>
                    <!-- .col-md-6 -->
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </section>
        <!-- #about end -->

        <!-- Feature
============================================= -->
        <section id="feature" class="feature feature-left pt-90 pb-30">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="heading heading-2 text-center mb-70">
                            <h2 class="heading--title">Qu'est ce que nous promouvons?</h2>
                            <p class="heading--desc">Cette plateforme a été conçue spécialement pour facilité la location, la vente et l'accès au monde de l'immobilier </p>
                        </div>
                        <!-- .heading-title end -->
                    </div>
                    <!-- .col-md-12 end -->
                </div>
                <!-- .row end -->
                <div class="row">
                    <!-- feature Panel #1 -->
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="feature-panel">
                            <div class="feature--icon">
                                <img src="assets/images/features/icons/1.png" alt="icon img">
                            </div>
                            <div class="feature--content">
                                <h3>Nous présentons vos propriétés</h3>
                                <p>Nous vous assurons un bon suivi constant de votre propriété de sorte à vous trouver le plus vite possible un interèssé</p>
                            </div>
                        </div>
                        <!-- .feature-panel end -->
                    </div>
                    <!-- .col-md-6 end -->
                    <!-- feature Panel #2 -->
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="feature-panel">
                            <div class="feature--icon">
                                <img src="assets/images/features/icons/2.png" alt="icon img">
                            </div>
                            <div class="feature--content">
                                <h3>Louer ou Vendre ou Acheter</h3>
                                <p>Louer , faire Louer ,Vendre ou acheter votre maison n'a jamais été aussi facile, nous vous facilitons la tâche , nous faisons votre promotion.<br> Nous nous occupons de vous trouvez un preneur.</p>
                            </div>
                        </div>
                        <!-- .feature-panel end -->
                    </div>
                    <!-- .col-md-6 end -->
                    <!-- feature Panel #3 -->
                   <!-- <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="feature-panel">
                            <div class="feature--icon">
                                <img src="assets/images/features/icons/3.png" alt="icon img">
                            </div>
                            <div class="feature--content">
                                <h3>Property Exchange</h3>
                                <p>Duis sed odio sit amet nibh vtate cursusa sit amet mauris morbi accum ipsum velit nam nec tellus viele a odio tincidet auctor ornare odio. Sede non mauris vitae erat conquat.</p>
                            </div>
                        </div>
                        -->
                        <!-- .feature-panel end -->
                    </div>
                    
                    <!-- .col-md-6 end -->
                    <!-- feature Panel #4 -->
                    <!--
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="feature-panel">
                            <div class="feature--icon">
                                <img src="assets/images/features/icons/4.png" alt="icon img">
                            </div>
                            <div class="feature--content">
                                <h3>Buying a Property</h3>
                                <p>Duis sed odio sit amet nibh vtate cursusa sit amet mauris morbi accum ipsum velit nam nec tellus viele a odio tincidet auctor ornare odio. Sede non mauris vitae erat conquat.</p>
                            </div>
                        </div> -->
                        <!-- .feature-panel end -->
                    </div>
                        
                    <!-- .col-md-6 end -->
                </div>
                <!-- .row end -->
            </div>
            <!-- .container end -->
        </section>
        <!-- .feature end -->

        
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
        </footer>
    </div>
    <!-- #wrapper end -->

    <!-- Footer Scripts
============================================= -->
    <script src="assets/js/jquery-2.2.4.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/functions.js"></script>
    <script src="fonction/js/fonctionsp.js"></script>
    <script src="fonction/js/jquery.min.js"></script>
    <script>
     $("#prop").click(function(){
      
      let lient="add-property.php";
      conect("#sub1","#sub",lient)
      enregist("#sub3","#sub4",lient)
  });
  </script>
</body>

</html>
