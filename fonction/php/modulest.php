<?php 
if(isset($_GET['quart'])&&isset($_GET['select-city'])&&isset($_GET['select-type'])&&isset($_GET['select-status'])&&isset($_GET['select-bedrooms'])&&isset($_GET['select-bathrooms'])&&isset($_GET['bass'])&&isset($_GET['hauts'])&&isset($_GET['bas'])&&isset($_GET['haut']) )
{
$quart=stp($_GET['quart']);
$ville=stp($_GET['select-city']);
$type=stp($_GET['select-type']);
$option=stp($_GET['select-status']);
$chambre=stp($_GET['select-bedrooms']);
$douche=stp($_GET['select-bathrooms']);
$surfacep=stp($_GET['bass']);
$surfaceg=stp($_GET['hauts']);
$prixp=stp($_GET['bas']);
$prixg=stp($_GET['haut']);
$env1="<>";
$env2="<>";
$env3="<>";
$env4="<>";
$env5="<>";
$env6="<>";
$env7="<>";
$env8="<>";
$env9="<>";
$envo1="<>";
$envo2="<>";
$envo3="<>";
$envo4="<>";
$envo5="<>";
$envo6="<>";
if($quart!="")
{
        $envo1="==";
}
if($ville!="Villes")
{
        $envo2="=";
}
if($type!="Types")
{
        $envo3="=";
}
if($option!="Options")
{
    if($option=="Acheter")
    {
        $option="A vendre";
    }
    if($option=="Colocation")
    {
        $option="Colocation";
    }
    if($option=="Louer")
    {
        $option="A louer";
    }
        $envo4="=";
}
if($chambre!="Chambres")
{
        $envo5="=";
}

if($douche!="Douches")
{
        $envo6="=";
}
if(isset($_GET['bal']))
{
    $inf1=stp($_GET['bal']);
    if($inf1=="on")
    {
        $env1="=";
    }
}
if(isset($_GET['anim']))
{
    $inf2=stp($_GET['anim']);
    if($inf2=="on")
    {
        $env2="=";
    }
}
if(isset($_GET['barb']))
{  $inf3=stp($_GET['barb']);
    if($inf3=="on")
    {
        $env3="=";
    }
    
}
if(isset($_GET['alarm']))
{
    $inf4=stp($_GET['alarm']);
    if($inf4=="on")
    {
        $env4="=";
    }
}
if(isset($_GET['cusine']))
{
    $inf5=stp($_GET['cusine']);
    if($inf5=="on")
    {
        $env5="=";
    }
}
if(isset($_GET['sauna']))
{
    $inf6=stp($_GET['sauna']);
    if($inf6=="on")
    {
        $env6="=";
    }
}
if(isset($_GET['gym']))
{
    $inf7=stp($_GET['gym']);
    if($inf7=="on")
    {
        $env7="=";
    }
}
if(isset($_GET['asc']))
{
    $inf8=stp($_GET['asc']);
    if($inf8=="on")
    {
        $env8="=";
    }
}
if(isset($_GET['sortiu']))
{
    $inf9=stp($_GET['sortiu']);
    if($inf9=="on")
    {
        $env9="=";
    }
}

$reqd=$base->prepare('SELECT* FROM maison WHERE ( typappart '.$envo3.':oka AND statu'.$envo4.':okb AND lits '.$envo5.':okc AND douches'.$envo6.':okd AND surface<=:oke AND surface>=:okf AND prix<=:okg AND prix>=:okh)');
$reqd->execute(array( "oka"=>$type,
                      "okb"=>$option,
                      "okc"=>$chambre,
                      "okd"=>$douche,
                      "oke"=>$surfaceg,
                      "okf"=>$surfacep,
                      "okg"=>$prixg,
                      "okh"=>$prixp


));

}
else {
    
    $reqd=$base->query('SELECT* FROM maison WHERE idp=0');//mise en déroute du serveur

}

?>