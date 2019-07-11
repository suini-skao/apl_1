<?php
require_once('../../his_bd.php');
require_once('function_p.php');
$base=$bdd;
if(isset($_POST['idp']))
{
    $idp=stp($_POST['idp']);
        if(isset($_POST['facebook']) )
        {
            $face=stp($_POST['facebook']);
            $req1 = $base->prepare('UPDATE  lien_social SET facebook = :book WHERE idp = :id');
            $req1->execute(array(
        'book' => $face,
        'id'  => $idp
                ));
                echo "ok";
        }
        if(isset($_POST['twitter']) )
        {
            $tw=stp($_POST['twitter']);
            $req2 = $base->prepare('UPDATE  lien_social SET twitter = :twi WHERE idp = :id');
            $req2->execute(array(
        'twi' => $tw,
        'id'  => $idp
                ));
                echo "ok";
        }
        if(isset($_POST['google']) )
        {
            $goo=stp($_POST['google']);
            $req3 = $base->prepare('UPDATE  lien_social SET google = :goo WHERE idp = :id');
            $req3->execute(array(
        'goo' => $goo,
        'id'  => $idp
                ));
                echo "ok";
        }
        if(isset($_POST['linkedIn']) )
        {
            $lin=stp($_POST['linkedIn']);
            $req4 = $base->prepare('UPDATE  lien_social SET linkedln = :lin WHERE idp = :id');
            $req4->execute(array(
        'lin' => $lin,
        'id'  => $idp
                ));
                echo "ok";
        }
        if(isset($_POST['instagram']) )
        {
            $inst=stp($_POST['instagram']);
            $req5 = $base->prepare('UPDATE  lien_social SET instagram = :inst WHERE idp = :id');
            $req5->execute(array(
        'inst' => $inst,
        'id'  => $idp
                ));
                echo "ok";
        }
        if(isset($_POST['printerest']) )
        {
            $print=stp($_POST['printerest']);
            $req6 = $base->prepare('UPDATE  lien_social SET printerest = :inst WHERE idp = :id');
            $req6->execute(array(
        'inst' => $print,
        'id'  => $idp
                ));
                echo "ok";
        }
}
















?>