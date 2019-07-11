<?php 
require_once('../../his_bd.php');
require_once('function_p.php');
$base=$bdd;
if(isset($_POST['needinfo']))
{
    $val=stp($_POST['needinfo']);
    echo comptfa($val,$base);
    
}
if(isset($_POST['idp'])&&isset($_POST['idag'])&&isset($_POST['idm'])&&isset($_POST['mesa']))
{
    $rins=$base->prepare('INSERT INTO p_messagerie (messages,idmaison,idpe,idp) VALUE (:u,:a,:b,:c) ');
    $rins->execute(array(
        "u"=>stp($_POST['mesa']),
        "a"=>stp($_POST['idm']),
        "b"=>stp($_POST['idp']),
        "c"=>stp($_POST['idag'])
    
    ));
    echo "envoyer";
}
?>