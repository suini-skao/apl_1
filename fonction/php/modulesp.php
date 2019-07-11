<?php  // recupération des images de la maison

    $rep=$bdd->prepare('SELECT* FROM image_m WHERE idmaison=:ifd');
    $rep->execute(array("ifd"=>$idm));
    $rep1=$bdd->prepare('SELECT* FROM image_m WHERE idmaison=:ifd');
    $rep1->execute(array("ifd"=>$idm));
    $rep2=$bdd->prepare('SELECT* FROM commentaire WHERE idmaison=:ifd');
    $rep2->execute(array("ifd"=>$idm));
    if(isset($_SESSION['idprop']))
    {
        
        if(isset($_POST['commentaire'])&&isset($_POST['notation']))//insertion des commentaires au cas ou connecté
        { 
            $comment=$bdd->prepare('INSERT INTO commentaire (idmaison,nom,rang,commentaire,dates,idp) VALUES (:a,:b,:c,:d,:e,:f)');
            $comment->execute(array("a"=>stp($idm),
                                "b"=>me_user($_SESSION['idprop'],$bdd).' '.pre_user($_SESSION['idprop'],$bdd),
                                "c"=>stp($_POST['notation']),
                                "d"=>stp($_POST['commentaire']),
                                "e"=>date('Y-m-d'),
                                "f"=>$_SESSION['idprop']
                                
                                ));
            header('location:property-single-gallery.php?init='.$idm);
        }
        if(isset($_POST['contact-message']))// enregidtrement du messaga en l'endroi de l'agent (si l'user est déjà connecté)
        {
            messagep($_POST['contact-message'],$idm,$_SESSION['idprop'],$bdd);
            header('location:property-single-gallery.php?init='.$idm.'&bg=ok');
        }
    } else {

        if(isset($_POST['commentaire'])&&isset($_POST['notation'])&&isset($_POST['name'])&&isset($_POST['email']))//insertion des commentaires au cas ou non connecté
        {
            $comment=$bdd->prepare('INSERT INTO commentaire (idmaison,nom,email,rang,commentaire,dates) VALUES (:a,:b,:c,:d,:e,:f)');
            $comment->execute(array("a"=>stp($idm),
                                "b"=>stp($_POST['name']),
                                "c"=>stp($_POST['email']),
                                "d"=>stp($_POST['notation']),
                                "e"=>stp($_POST['commentaire']),
                                "f"=>date('Y-d-m')
                                
                                ));
            header('location:property-single-gallery.php?init='.$idm);
        }
       if(isset($_POST['contact-message'])&&isset($_POST['contact-name'])&&isset($_POST['contact-email'])&&isset($_POST['contact-phone']))
       {
        messageinc($_POST['contact-name'],$_POST['contact-email'],$_POST['contact-phone'],$_POST['contact-message'],$idm,$bdd);
        header('location:property-single-gallery.php?init='.$idm.'&bg=ok');
       }



    }
    $pn=prix($idm,$bdd);
    $prixb=($pn-(($pn*10)/100));
    $prixh=($pn+(($pn*10)/100));
    $simil=$bdd->prepare('SELECT* FROM maison WHERE (typappart=:apt AND statu=:stat AND prix>=:prx AND prix<=:prxn )');//propriété similaire
    $simil->execute(array("apt"=>appart($idm,$bdd),
                          "stat"=>statu($idm,$bdd),
                          "prx"=>$prixb,
                          "prxn"=>$prixh


));
//gestion des maison favorite


 ?>