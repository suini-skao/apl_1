<?php 
 require_once('../../his_bd.php');
 require_once('function_p.php');
 $base=$bdd;
    if(isset($_POST['logine'])&&isset($_POST['loginp']))
    {
        connec_pro($base,$_POST['logine'],$_POST['loginp']);
    }
    if(isset($_POST['nom'])&&isset($_POST['mail'])&&isset($_POST['motd']))
    {
        insc($base,$_POST['nom'],$_POST['mail'],$_POST['motd']);// enregistrement base de données
        
    }
?>