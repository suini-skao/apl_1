<?php 
    function stp($a)
    {
        return htmlspecialchars($a);
    }
    function cont_pro($bdd,$idville)//retourne nombre de propriétés par ville (A)
    {
        $rf=$bdd->prepare('SELECT* FROM infosup WHERE ville=:info');
        $rf->execute(array("info"=>$idville));
        $count=0;
        while($don=$rf->fetch())
        {
            $count=$count+1;
        }
        return $count;
    }
    function rtv($bdd,$dv) //retourne identifiant d'une ville (B)
    {
        $rv=$bdd->prepare('SELECT* FROM ville WHERE nom=:vls');
        $rv->execute(array("vls"=>$dv));
        if($don2=$rv->fetch())
        {
            return $don2['idville'];
        }
    }
    function prop_v($bdd,$ville) //Association de A et B pour retourner le nbr de propriete
    {
        $idvl=rtv($bdd,$ville);
       return cont_pro($bdd,$idvl);
    }
    function prop_stat($bdd,$stat) //compte le nombre de propriétés à vendre/louer
    {
        $sat=stp($stat);
        $rf=$bdd->prepare('SELECT* FROM maison WHERE statu=:info');
        $rf->execute(array("info"=>$sat));
        $count=0;
        while($don=$rf->fetch())
        {
            $count=$count+1;
        }
        return $count;
    }
    function prop_typ($bdd,$stat) //compte le nombre de propriétés en fonction du type (Maison...)
    {
        $sat=stp($stat);
        $rf=$bdd->prepare('SELECT* FROM maison WHERE typappart=:info');
        $rf->execute(array("info"=>$sat));
        $count=0;
        while($don=$rf->fetch())
        {
            $count=$count+1;
        }
        return $count;
    }
    function iduser($bdd,$login)
    {
        $cnd=$bdd->prepare('SELECT* FROM user WHERE logins=:logt');
        $cnd->execute(array("logt"=>$login));
        if($fr=$cnd->fetch())
        {
            return $fr['idu'];
        }
    }
    function idprop($bdd,$login) //recup id proprio
    {
        $cnd=$bdd->prepare('SELECT* FROM proprio WHERE email=:logt');
        $cnd->execute(array("logt"=>$login));
        if($fr=$cnd->fetch())
        {
            return $fr['idp'];
        }
    }

    function idvl($bdd,$vl) //recup id ville
    {
        $cnds=$bdd->prepare('SELECT* FROM ville WHERE nom=:pl');
        $cnds->execute(array("pl"=>$vl));
        if($frs=$cnds->fetch())
        {
            return $frs['idville'];
        }
    }
    function connec_u($bdd,$login,$mdp) //verification et connection utilisateur
    {
        $ent=htmlspecialchars($login);
        $mt=htmlspecialchars($mdp);
        $cn=$bdd->prepare('SELECT* FROM user WHERE logins=:logt');
        $cn->execute(array("logt"=>$ent));
        if($rep=$cn->fetch())
        {
            $cn2=$bbd->perpare('SELECT* FROM mp_user WHERE idu=:pm');
            $cn2->execute(array("pm"=>$rep['idu']));
                if($repu=$cn2->fetch())
                {
                        if($repu['mdp']==$mt)
                            {
                                //envoi vers le zone de connection;
                                session_start();
                                $_SESSION['iduser']=$rep['idu'];
                                 header('location:');
                            }
                        
                }
        }
    }
    function me_user($id,$bdd)//nom utilisateur
{
    $ident=stp($id);
    $req=$bdd->prepare('SELECT* FROM proprio WHERE idp=:msd');
    $req->execute(array("msd"=>$ident));
    if($info=$req->fetch())
    {
        return $info['nom'];
    }
}
function pre_user($id,$bdd)//nom utilisateur
{
    $ident=stp($id);
    $req=$bdd->prepare('SELECT* FROM proprio WHERE idp=:msd');
    $req->execute(array("msd"=>$ident));
    if($info=$req->fetch())
    {
        return $info['prenom'];
    }
}
    function module_social($idp,$bdd)// gère la création du module social de l'user
    {               $idpv=stp($idp);
                    $insert=$bdd->prepare('INSERT INTO lien_social (idp) VALUES (:idv)');
                    $insert->execute(array("idv"=>$idpv));
    }
    function connec_pro($bdd,$login,$mdp)// verification et connection proprietaire
    {
        $ent=htmlspecialchars($login);
        $mt=htmlspecialchars($mdp);
        $cn=$bdd->prepare('SELECT* FROM proprio WHERE email=:logt');
        $cn->execute(array("logt"=>$ent));
        if($rep=$cn->fetch())
        {
            if($rep['statu']!="bloc")
            {
            $cn2=$bdd->prepare('SELECT* FROM mdp_prop WHERE idp=:pm');
            $cn2->execute(array("pm"=>$rep['idp']));
                if($repu=$cn2->fetch())
                {
                        if($repu['mdp']==$mt)
                            {
                                //envoi vers le zone de connection;
                                session_start();
                                $_SESSION['idprop']=$rep['idp'];
                                 echo "marche";
                            }
                            else echo "bug";
                        
                }
                else echo "bug";
            }
            else {  echo "bug2";}
        }
        else echo "bug";
    }
    function insc($bdd,$nom,$email,$mdp)//incription utilisateur
    {
        
            $log=htmlspecialchars($nom);
            $mdep=htmlspecialchars($mdp);
            $mail=htmlspecialchars($email);
            $a="ok";
            if($a=="ok"){
                $verif=$bdd->prepare('SELECT* FROM proprio WHERE email=:pml'); //verification d'un même login
                $verif->execute(array("pml"=>$mail));
                if($vef=$verif->fetch())
                {
                    echo "bugs";
                }
                else {
                    $insert=$bdd->prepare('INSERT INTO proprio (nom,email) VALUES (:ml,:mail)');
                    $insert->execute(array("ml"=>$log,
                                         "mail"=>$mail));
                    $idp=idprop($bdd,$mail); //recuperation iduser
                    $ins=$bdd->prepare('INSERT INTO mdp_prop (idp,mdp) VALUES (:us,:mot)');
                    $ins->execute(array("us"=>$idp,
                                        "mot"=>$mdep
                                    ));
                    session_start();
                    echo "passe";
                    $_SESSION['idprop']=$idp;
                    module_social($idp,$bdd); 
                    mkdir("../../doc_client/c".$idp);
                    mkdir("../../doc_client/c".$idp."/user");
                     //redirection
                }
            } else echo "court";
       
    }
   function deco($lien) //deconnection
   {
        if(isset($_GET['dec']))
        {
            session_destroy();
            header('location:'.$lien);
        }
   }
   function verifh($p) //redirection au cas ou le proprio non conect
   {
        if(!isset($_SESSION['idprop']))
        {
            header('location:'.$p.'');
        }
   }
   function verif($a,$b) // redirection des liens pour l'affichage complet de la maison
   {
       if($a=="#")
       {
           echo "?infoer";
       }
       else { echo "property-single-gallery.php?init=".$b; }
   }
   function addimage($img,$idm,$bdd)//ajout de image maison
   {
        $imv=htmlspecialchars($img);
        $idmaison=htmlspecialchars($idm);
        $ints=$bdd->prepare('INSERT INTO image_m (img,idmaison) VALUES (:im,:ma)');
        $ints->execute(array("im"=>$imv,
                             "ma"=>$idmaison
                                    ));

   }
   function adduserpt($img,$idu,$bdd)//ajout de image user
   {
        $imv=htmlspecialchars($img);
        $idps=htmlspecialchars($idm);
        $ints=$bdd->prepare('INSERT INTO proprio (idp,p_photo) VALUES (:im,:ma)');
        $ints->execute(array("im"=>$idps,
                             "ma"=>$imv
                                    ));

   }
   function addimagep($img,$idm,$bdd)//ajout de l'image principale
   {
        $imv=htmlspecialchars($img);
        $idmaison=htmlspecialchars($idm);
        $ints=$bdd->prepare('UPDATE maison SET imgp =:imgs WHERE idmaison=:idm');
        $ints->execute(array("imgs"=>$imv,
                             "idm"=>$idmaison
                                    ));

   }
   function addvideo($vid,$idm,$bdd) //ajout de video maison
   {
        	$iv=htmlspecialchars($vid);
            $idm=htmlspecialchars($idm);
            $in=$bdd->prepare('INSERT INTO video_m (video,idmaison) VALUES (:il,:ml)');
            $in->execute(array("il"=>$iv,
                             "ml"=>$idm
                                    ));

   }
   function addfile($fil,$idm,$bdd) //ajout de fichier de verification maison
   {
    $fil=htmlspecialchars($fil);
    $is=htmlspecialchars($idm);
    $inf=$bdd->prepare('INSERT INTO titrep (nom,idmaison) VALUES (:ol,:om)');
    $inf->execute(array("ol"=>$fil,
                     "om"=>$is
                            ));

   }
   function addinfo($idm,$adrs,$vil,$quart,$vois,$bdd) //ajout d'info sup
   {
        $addrs=htmlspecialchars($adrs);
        $ville=htmlspecialchars($vil);
        $quartier=htmlspecialchars($quart);
        $voisin=htmlspecialchars($vois);
        $inp=$bdd->prepare('INSERT INTO infosup (idmaison,adress,ville,quartier,voisin) VALUES (:al,:bl,:cl,:dl,:el)');
        $inp->execute(array("al"=>$idm,
                            "bl"=>$addrs,
                            "cl"=>$ville,
                            "dl"=>$quartier,
                            "el"=>$voisin
                            ));
   }
   function preference($a,$b,$c,$d,$e,$f,$g,$h,$i,$idm,$bdd) //prerence de l'user avec les offres
   {
            $as=htmlspecialchars($a);// verifier
            $bs=htmlspecialchars($b);
            $cs= htmlspecialchars($c);
            $ds=htmlspecialchars($d);
            $es=htmlspecialchars($e);
            $fs=htmlspecialchars($f);
            $gs=htmlspecialchars($g);
            $hs=htmlspecialchars($h);
            $is=htmlspecialchars($i);
            $ih=$bdd->prepare('INSERT INTO propo_m (idmaison,balcon,animaux,barbeq,alarm,cuisinem,sauna,gym,ascens,sorti_u) VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:i,:j)');
            $ih->execute(array("a"=>$idm,
                                "b"=>$as,
                                "c"=>$bs,
                                "d"=>$cs,
                                "e"=>$ds,
                                "f"=>$es,
                                "g"=>$fs,
                                "h"=>$gs,
                                "i"=>$hs,
                                "j"=>$is

                                ));
   }
   function addall($idmaison,$idsp,$idp,$titre,$desc,$typappart,$status,$chambres,$douches,$escalier,$garages,$surface,$prix,$prixd,$prixr,$cni,$piece,$bdd)//information relative à la description
   {
        $a=stp($idmaison);
        $b=stp($idp);
        $c=stp($titre);
        $d=stp($desc);
        $e=stp($typappart);
        $f=stp($status);
        $g=stp($chambres);
        $h=stp($douches); 
        $i=stp($escalier);
        $j=stp($garages);
        $k=stp($surface); 
        $l=stp($prix); 
        $m=stp($prixd); 
        $n=stp($prixr); 
        $o=stp($cni); 
        $p=stp($piece);
        $q=stp($idsp);
        $oh=$bdd->prepare('INSERT INTO maison (idmaison,idsm,idp,titre,descipt,typappart,statu,chambres,douches,escalier,garages,surface,prix,prixd,prixr,cni,pieces) VALUES (:a,:q,:b,:c,:d,:e,:f,:g,:h,:i,:j,:k,:l,:m,:n,:o,:p)');
            $oh->execute(array("a"=>$a,
                                "q"=>$q,
                                "b"=>$b,
                                "c"=>$c,
                                "d"=>$d,
                                "e"=>$e,
                                "f"=>$f,
                                "g"=>$g,
                                "h"=>$h,
                                "i"=>$i,
                                "j"=>$j,
                                "k"=>$k,
                                "l"=>$l,
                                "m"=>$m,
                                "n"=>$n,
                                "o"=>$o,
                                "p"=>$p
                                ));
        
   }
   function Addregroup($bdd)//regroupe toutes les fonctionalités à entrer
   {
    addimages($img,$idm,$bdd);// insertion images
    addvideo($vid,$idm,$bdd); //ajout de video maison
    addfile($fil,$idm,$bdd);//titre proprio
    addinfo($idm,$adrs,$vil,$quart,$vois,$bdd);//info addrrs
    preference($a,$b,$c,$d,$e,$f,$g,$h,$i,$idm,$bdd); //pour les infos
    
   } 
   function messag($nom,$email,$num,$mess,$bdd)
   {


    $nomp=stp($nom);
    $emailp=stp($email);
    $nump=stp($num);
    $messp=stp($mess);
    $inh=$bdd->prepare('INSERT INTO g_messagerie (nom,mail,notel,msg) VALUES (:a,:b,:c,:d)');
    $inh->execute(array("a"=>$nomp,
                        "b"=>$emailp,
                        "c"=>$nump,
                        "d"=>$messp
                        ));
   }
   function messag2($mess,$idpo,$bdd) // message encoyer par l'user connecté à admin
   {

    $idp=stp($idpo);
    $messp=stp($mess);
    $inh=$bdd->prepare('INSERT INTO g_messagerie (msg,idp) VALUES (:a,:b)');
    $inh->execute(array("a"=>$messp,
                        "b"=>$idp
                        ));
   }
function read($a,$bdd)// recuperation des infos d'une maison addresse
{
    $b=htmlspecialchars($a);
    $ret=$bdd->prepare('SELECT *FROM infosup WHERE idmaison=:pm');
    $ret->execute(array("pm"=>$b));
    if($gt=$ret->fetch())
    {
        return $gt['adress'];
    }
}
function req($a,$bdd)// recup quartier
{
    $b=htmlspecialchars($a);
    $rets=$bdd->prepare('SELECT *FROM infosup WHERE idmaison=:pm');
    $rets->execute(array("pm"=>$b));
    if($gts=$rets->fetch())
    {
        return $gts['quartier'];
    }
}
function prix($us,$bdd) // retourne prix maison
{
    $as=htmlspecialchars($us);
    $prix=$bdd->prepare('SELECT* FROM maison WHERE idmaison=:pr');
    $prix->execute(array("pr"=>$as));
    if($pri=$prix->fetch())
    {
        return $pri['prix'];
    }
}
function statu($di,$bdd) // stutu de la masion exp vendre acheter
{
    $id=stp($di);
    $vef=$bdd->prepare('SELECT* FROM maison WHERE idmaison=:id');
    $vef->execute(array("id"=>$id));
    if($rec=$vef->fetch())
    {
        return $rec['statu'];
    }
}
function cville($di,$bdd)// donne le nom de la ville en fonction de l'id de la maison
{
    $id=stp($di);
    $req1=$bdd->prepare('SELECT* FROM infosup WHERE idmaison=:idm');
    $req1->execute(array("idm"=>$id));
    if($resp1=$req1->fetch())
    {
        $req2=$bdd->prepare('SELECT* FROM ville WHERE idville=:vil');
        $req2->execute(array("vil"=>$resp1['ville']));
        if($resp2=$req2->fetch())
        {
            return $resp2['nom'];
        }
    }
}
function titrem($di,$bdd) // titre lier à la maison
{
    $id=stp($di);
    $vef=$bdd->prepare('SELECT* FROM maison WHERE idmaison=:id');
    $vef->execute(array("id"=>$id));
    if($rec=$vef->fetch())
    {
        return $rec['titre'];
    }
}
function descript($di,$bdd) // description de la maison
{
    $id=stp($di);
    $vef=$bdd->prepare('SELECT* FROM maison WHERE idmaison=:id');
    $vef->execute(array("id"=>$id));
    if($rec=$vef->fetch())
    {
        return $rec['descipt'];
    }
}
function garages($di,$bdd)// nombre de garage
{
    $id=stp($di);
    $vef=$bdd->prepare('SELECT* FROM maison WHERE idmaison=:id');
    $vef->execute(array("id"=>$id));
    if($rec=$vef->fetch())
    {
        return $rec['garages'];
    }
}
function douches($di,$bdd)// nombre de douche
{
    $id=stp($di);
    $vef=$bdd->prepare('SELECT* FROM maison WHERE idmaison=:id');
    $vef->execute(array("id"=>$id));
    if($rec=$vef->fetch())
    {
        return $rec['douches'];
    }
}
function lits($di,$bdd)// nombre de lits (voir chambre)
{
    $id=stp($di);
    $vef=$bdd->prepare('SELECT* FROM maison WHERE idmaison=:id');
    $vef->execute(array("id"=>$id));
    if($rec=$vef->fetch())
    {
        return $rec['lits'];
    }
}
function escaliers($di,$bdd)// nombre d'étage
{
    $id=stp($di);
    $vef=$bdd->prepare('SELECT* FROM maison WHERE idmaison=:id');
    $vef->execute(array("id"=>$id));
    if($rec=$vef->fetch())
    {
        return $rec['escalier'];
    }
}
function surface($di,$bdd)// surface de la maison
{
    $id=stp($di);
    $vef=$bdd->prepare('SELECT* FROM maison WHERE idmaison=:id');
    $vef->execute(array("id"=>$id));
    if($rec=$vef->fetch())
    {
        return $rec['surface'];
    }
}
function imagesp($di,$bdd)// image principale
{
    $id=stp($di);
    $vef=$bdd->prepare('SELECT* FROM maison WHERE idmaison=:id');
    $vef->execute(array("id"=>$id));
    if($rec=$vef->fetch())
    {
        return $rec['imgp'];
    }
}
function pieces($di,$bdd)// nombre de pièce
{
    $id=stp($di);
    $vef=$bdd->prepare('SELECT* FROM maison WHERE idmaison=:id');
    $vef->execute(array("id"=>$id));
    if($rec=$vef->fetch())
    {
        return $rec['pieces'];
    }
}
function appart($di,$bdd)// Appart type
{
    $id=stp($di);
    $vef=$bdd->prepare('SELECT* FROM maison WHERE idmaison=:id');
    $vef->execute(array("id"=>$id));
    if($rec=$vef->fetch())
    {
        return $rec['typappart'];
    }
}
function autc($di,$info,$bdd) //permet d'avoir les suppléments dur la maison
{
    $id=stp($di);
    $req=$bdd->prepare('SELECT* FROM propo_m WHERE idmaison=:mais');
    $req->execute(array("mais"=>$id));
    if($resl=$req->fetch())
    {
        if($resl[$info]=="oui")
        {
            return "auto";
        }
    }
}
function retvideo($di,$bdd)//recupération de la vidéo de l'user
{
$id=stp($di);
$req=$bdd->prepare('SELECT* FROM video_m WHERE idmaison=:mai');
$req->execute(array("mai"=>$id));
    if($video=$req->fetch())
    {
        return $video['video'];
    }

}
function comptcom($di,$bdd) //compte les commentaires
{
$id=stp($di);
$compt=0;
$req=$bdd->prepare('SELECT* FROM commentaire WHERE idmaison=:mai');
$req->execute(array("mai"=>$id));
    while($comp=$req->fetch())
    {
        $compt=$compt+1;
    }
    return $compt;
}
function messagep($msg,$idm,$usere,$bdd) // lien message pour un utiisateur connect
{
    $ms=stp($msg);
    $inter=stp($usere);
    $recu=iduserm($idm,$bdd);
    $message=$bdd->prepare('INSERT INTO p_messagerie (messages,idmaison,idpe,idp) VALUES (:a,:b,:c,:d)');
    $message->execute(array("a"=>$ms,
                        "b"=>$idm,
                        "c"=>$inter,
                        "d"=>$recu 
                    ));
}
function messageinc($nom,$mail,$tel,$msg,$idm,$bdd) // lien message pour un utilisateur non connecté
{
    $ms=stp($msg);
    $tl=stp($tel);
    $ml=stp($mail);
    $no=stp($nom);
    $recu=iduserm($idm,$bdd);
    $message=$bdd->prepare('INSERT INTO p_messagerie (nom,email,tel,messages,idmaison,idp) VALUES (:a,:b,:c,:d,:e,:f)');
    $message->execute(array("a"=>$no,
                        "b"=>$ml,
                        "c"=>$tl,
                        "d"=>$ms,
                        "e"=>$idm,
                        "f"=>$recu
                    ));
}
function iduserm($idm,$bdd)//renvois l'id de celui qui à poster l'annonce
{
    $red=$bdd->prepare('SELECT* FROM maison WHERE idmaison=:mais');
    $red->execute(array("mais"=>$idm));
    if($info=$red->fetch())
    {
        return $info['idp'];
    }
}
function u_nom($idp,$bdd)// information sur l'utilisateur ( nom )
{
    $user=$bdd->prepare('SELECT* FROM proprio WHERE idp=:user');
    $user->execute(array("user"=>$idp));
    if($info=$user->fetch())
    {
        return $info['nom'];
    }
}
function u_prenom($idp,$bdd)// information sur l'utilisateur ( prenom )
{
    $user=$bdd->prepare('SELECT* FROM proprio WHERE idp=:user');
    $user->execute(array("user"=>$idp));
    if($info=$user->fetch())
    {
        return $info['prenom'];
    }
}
function u_email($idp,$bdd)// information sur l'utilisateur ( email )
{
    $user=$bdd->prepare('SELECT* FROM proprio WHERE idp=:user');
    $user->execute(array("user"=>$idp));
    if($info=$user->fetch())
    {
        return $info['email'];
    }
}
function u_contact($idp,$bdd)// information sur l'utilisateur ( contact )
{
    $user=$bdd->prepare('SELECT* FROM proprio WHERE idp=:user');
    $user->execute(array("user"=>$idp));
    if($info=$user->fetch())
    {
        return $info['contact'];
    }
}
function u_info($idp,$bdd)// information sur l'utilisateur ( infouser )
{
    $user=$bdd->prepare('SELECT* FROM proprio WHERE idp=:user');
    $user->execute(array("user"=>$idp));
    if($info=$user->fetch())
    {
        return $info['aprop'];
    }
}
function p_image($idp,$bdd) // information sur l'utilisateur ( image )
{
    $user=$bdd->prepare('SELECT* FROM proprio WHERE idp=:user');
    $user->execute(array("user"=>$idp));
    if($info=$user->fetch())
    {
        return $info['p_photo'];
    }
}
function p_id($idm,$bdd)// id de l'utilisateur en fonction de la maison (celui qui à poster l'offre)
{
    $user=$bdd->prepare('SELECT* FROM maison WHERE idmaison=:mai');
    $user->execute(array("mai"=>$idm));
    if($info=$user->fetch())
    {
        return $info['idp'];
    }
}
function adore($idmaison,$user,$bdd)// insertion d'une maison favoite dans la bdd
{
    $prop=stp($user);
    $maison=stp($idmaison);
    $message=$bdd->prepare('INSERT INTO favorie (idmaison,idp) VALUES (:a,:b)');
    $message->execute(array("a"=>$maison,
                            "b"=>$prop,
                       
                    ));
}
function brise ($idmaison,$user,$bdd)// retire la maison comme favorie
{
    $prop=stp($user);
    $maison=stp($idmaison);
    $message=$bdd->prepare('DELETE FROM favorie WHERE idmaison=:a AND idp=:b');
    $message->execute(array("a"=>$maison,
                            "b"=>$prop,
                       
                    ));
    echo "briser";
}
function comptfa($id,$bdd) // compte le nombre de favorie de la maison
{
    $favorie=0;
    $maison=stp($id);
    $user=$bdd->prepare('SELECT* FROM favorie WHERE idmaison=:mais');
    $user->execute(array("mais"=>$maison));
    while($rep=$user->fetch())
    {
        $favorie=$favorie+1;
    }
    return $favorie ;
}
function revel($idm,$idp,$bdd)//rappel si un utilisateur à déjà cocher la case j'aime
{
    $mais=stp($idm);
    $idr=stp($idp);
    $user=$bdd->prepare('SELECT* FROM favorie WHERE (idmaison=:mais AND idp=:perso)');
    $user->execute(array("mais"=>$mais,
                         "perso"=>$idr));
    if($verif=$user->fetch())
    {
        return "rempli";

    } else { return "vide"; }
}
function activer($a,$b)// ctive la paginarion
{
    if($a==$b)
    {
        echo "active";
    }
}
function urls($a,$b,$c)// retourne l'url de la page en question
{
   return "http://".$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"].$c."pagep=".$a."&pagen=".$b;
}
function nula($a) // verifie si une varible est null et retour ""
{
    if($a=="")
    {
        return "";
    } else { return $a;}
}
function lien_info($idp,$lien,$bdd)// return le lien social
{
    $lienv=stp($lien);
    $idr=stp($idp);
    $req=$bdd->prepare('SELECT* FROM lien_social WHERE idp=:idprop');
    $req->execute(array("idprop"=>$idr));
    if($info=$req->fetch())
    {
        return $info[$lienv];
    }
}
function sup_maison($idme,$bdd)//permet la supression de tous les composants de la maison !! a revoir pour les fichiers à supprimer
{
    $idm=stp($idme);
    $sup1=$bdd->prepare('DELETE FROM maison WHERE idmaison=:idma');
    $sup1->execute(array("idma"=>$idm));
    $sup2=$bdd->prepare('DELETE FROM commentaire WHERE idmaison=:idm');
    $sup2->execute(array("idm"=>$idm));
    $sup3=$bdd->prepare('DELETE FROM image_m WHERE idmaison=:idmc');// recuperation et suppression images en memoire
    $sup3->execute(array("idmc"=>$idm));
    $sup4=$bdd->prepare('DELETE FROM infosup WHERE idmaison=:idmd');
    $sup4->execute(array("idmd"=>$idm));
    $sup5=$bdd->prepare('DELETE FROM propo_m WHERE idmaison=:idme');
    $sup5->execute(array("idme"=>$idm));
    $sup6=$bdd->prepare('DELETE FROM video_m WHERE idmaison=:idmf');// recuperation et suppression video en memoire
    $sup6->execute(array("idmf"=>$idm));
    $sup7=$bdd->prepare('DELETE FROM favorie WHERE idmaison=:idmb');
    $sup7->execute(array("idmb"=>$idm));
    echo "terminer";
    
}
function img_no($bdd)// no spécial de l'image
{
    $req=$bdd->query('SELECT* FROM image_m');
    $info=0;
    while($donne=$req->fetch())
    {
        
        if($info!=$donne['idsp'])
        {
            if($info<$donne['idsp'])
            {
                $ident=$donne['idsp'];
                $info=$donne['idsp'];
            } else {   $ident=$info; }
        }
       
    }
   $new=$ident+1;
   return $new;
}
function Maison_no($bdd)// no spécial de la maison
{
    $req=$bdd->query('SELECT* FROM maison');
    $info=0;
    while($donne=$req->fetch())
    {
        
        if($info!=$donne['idsm'])
        {
            if($info<$donne['idsm'])
            {
                $ident=$donne['idsm'];
                $info=$donne['idsm'];
            } else {   $ident=$info; }
        }
       
    }
   $new=$ident+1;
   return $new;
}
function Verif_A_idmaison($bdd,$info) // verification de l'inexistance de l'id
{
    $newid="Mais".$info.date('Y');
    $req=$bdd->prepare('SELECT* FROM maison WHERE idmaison=:id');
    $req->execute(array('id'=> $newid));
    if($rep=$req->fetch())
    {
        Verif_A_idmaison($bdd,$info+1);
    }
    else { return $newid; }
}
?>