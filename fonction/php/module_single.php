<?php 
$rep=$base->prepare('SELECT* FROM image_m WHERE idmaison=:mais');
$rep->execute(array("mais"=>$idm));
$rep1=$base->prepare('SELECT* FROM image_m WHERE idmaison=:mais');
$rep1->execute(array("mais"=>$idm));
$rep2=$base->prepare('SELECT* FROM commentaire WHERE idmaison=:mais');
$rep2->execute(array("mais"=>$idm));
$simil=$base->prepare('SELECT* FROM maison WHERE (statu=:sts)');
$simil->execute(array("sts"=>statu($idm,$base) ));
//recupération des posts de type message
if(isset($_POST['commentaire'])&&isset($_POST['notation']))
{
$rins=$base->prepare('INSERT INTO commentaire (nom,idmaison,rang,commentaire,dates,idp) VALUE (:u,:a,:b,:c,:d,:e) ');
$rins->execute(array(
    "u"=>u_nom($_SESSION['idprop'],$base).' '.u_prenom($_SESSION['idprop'],$base),
    "a"=>$idm,
    "b"=>stp($_POST['notation']),
    "c"=>stp($_POST['commentaire']),
    "d"=>date('Y-m-d'),
    "e"=>$_SESSION['idprop']

));
header('location:property-single-gallery.php?init='.$idm);
}






?>