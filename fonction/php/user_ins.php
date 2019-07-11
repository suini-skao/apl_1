<?php 
session_start();
require_once('../../his_bd.php');
require_once('function_p.php');
$base=$bdd;

// module de mise à jour de la zone utilisateur
if(isset($_POST['idu'])) {
    $id=stp($_POST['idu']);
    if(isset($_POST['motd'])&&isset($_POST['motf']))
    {
        $motd=stp($_POST['motd']);
        $motf=stp($_POST['motf']);
        if(($motd==$motf)&& ($motd!=""&& $motf!="") )
        {
        $requ = $base->prepare('UPDATE mdp_prop SET mdp = :nom WHERE idp = :id');
        $requ->execute(array(
        'nom' => $motf,
        'id'  => $id
                        ));
                       
        echo"ok";                   
        } else { $in=stp($_POST['motd']) ; $fin=stp($_POST['motf']); if(($in!="" && $fin!="") && $in!=$fin) {$er="eur1"; echo $er; } } 
    }
    if(isset($_POST['nom']) && !isset($er))
    {
        $nom=stp($_POST['nom']);
        $req1 = $base->prepare('UPDATE proprio SET nom = :nom WHERE idp = :id');
        $req1->execute(array(
        'nom' => $nom,
        'id'  => $id
                        ));
                        echo"ok";  
    }
    if(isset($_POST['prenom']) && !isset($er) )
    {
        $prenom=stp($_POST['prenom']);
        $req2 = $base->prepare('UPDATE proprio SET prenom = :nom WHERE idp = :id');
        $req2->execute(array(
        'nom' => $prenom,
        'id'  => $id
                        ));
                        echo"ok";  
    }
    if(isset($_POST['mail']) && !isset($er))
    {
        $mail=stp($_POST['mail']);
        $req3 = $base->prepare('UPDATE proprio SET email = :nom WHERE idp = :id');
        $req3->execute(array(
        'nom' => $mail,
        'id'  => $id
                        ));
                        echo"ok";  
    }
    if(isset($_POST['tel']) && !isset($er))
    {
        $tel=stp($_POST['tel']);
        $req4 = $base->prepare('UPDATE proprio SET contact = :nom WHERE idp = :id');
        $req4->execute(array(
        'nom' => $tel,
        'id'  => $id
                        ));
                        echo"ok";  
    }
    if(isset($_POST['aprop']) && !isset($er))
    {
        $pp=stp($_POST['aprop']);
        $req5 = $base->prepare('UPDATE proprio SET aprop = :nom WHERE idp = :id');
        $req5->execute(array(
        'nom' => $pp,
        'id'  => $id
                        ));
                        echo"ok";  
    }
    

}

if(isset($_POST['ison'])&&isset($_POST['idp']))
{
    adore($_POST['ison'],$_POST['idp'],$base);
}
if(isset($_POST['ison2'])&&isset($_POST['idp2']))
{
    brise($_POST['ison2'],$_POST['idp2'],$base);
}

if(isset($_FILES['user-img2'])) 
            
            {   $file=$_FILES['user-img2'];
                $filename=$file['name'];
                $ext=pathinfo($filename,PATHINFO_EXTENSION);
                $filenamtot=$filename.'.'.$ext;
                $req->prepare('SELECT* FROM proprio WHERE idp=:id');
                $req->execute(array("id"=>$_SESSION['iduser']));
                if($rep=$req->fetch()){
                    if($rep['p_photo']!=$filenamtot)
                    {
                        $img_nom=uniqid().'.'.$ext;
                        $uploadfile='../../doc_client/img_user/'.$img_nom;
                        if(move_uploaded_file($file['tmp_name'], $uploadfile))
                        {
                        adduserpt($img_nom,$_SESSION['iduser'],$bdd) ;
                        }   
                    }
                } 
            }
?>