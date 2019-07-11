<?php
require_once('../../his_bd.php');
require_once('function_p.php');
$base=$bdd;
if(isset($_POST['idm'])&&isset($_POST['autor']))
{
    if($_POST['autor']=="aut")
    {
        sup_maison($_POST['idm'],$base);
    }
}
if(isset($_POST['idmaison'])&&isset($_POST['autori'])&&isset($_POST['user']))
{
    if($_POST['autori']=="aut")
    {
        brise ($_POST['idmaison'],$_POST['user'],$base);
    }
    
}
?>