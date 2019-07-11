<?php //recherche les informations
 if(isset($_GET['select-location'])&&isset($_GET['select-type'])&&isset($_GET['select-status'])&&isset($_GET['select-beds'])&&isset($_GET['select-baths']))
{
    $vil=stp($_GET['select-location']);
    $typ=stp($_GET['select-type']);
    $sta=stp($_GET['select-status']);
    $lit=stp($_GET['select-beds']);
    $douche=stp($_GET['select-baths']);
    $bas=stp($_GET['bas']);
    $haut=stp($_GET['haut']);
    if($vil=="Villes")
    {
        $vil="vide";
    }
    if($typ=="Types")
    {
        $typ="vide";
    }
    if($sta=="Options")
    {
        $sta="vide";
    }
    if($lit=="Chambres")
    {
        $lit="vide";
    }
    if($douche=="Douches")
    {
        $douche="vide";
    }
   
    if($typ=="vide" && $sta=="vide" && $lit=="vide" && $douche=="vide"&& $vil<>"vide") // par ville
    {
        $ok=rtv($base,$vil);
        $reqc=$base->prepare('SELECT* FROM infosup WHERE ville=:pl ');
        $reqc->execute(array("pl"=>$ok));
       $oku=1;
    }
    if($typ=="vide" && $sta<>"vide" && $lit=="vide" && $douche=="vide"&& $vil=="vide") // par option (location vente)
    {
        if($sta=="Acheter")
        {
            $pl="A vendre";
        } 
        if($sta=="Louer")
        { 
            $pl="A louer"; 
        }
        if($sta=="Colocation")
        {
            $pl="Colocation"; 
        }
        $req=$base->prepare('SELECT* FROM maison WHERE (statu=:ple AND prix>=:bas AND prix<=:haut)');
        $req->execute(array("ple"=>$pl,
                            "bas"=>$bas,
                            "haut"=>$haut
    ));
    }
    if($typ=="vide" && $sta=="vide" && $lit<>"vide" && $douche=="vide"&& $vil=="vide") // par nombre de lits
    {
       
        $req=$base->prepare('SELECT* FROM maison WHERE ( lits=:ple AND prix>=:bas AND prix<=:haut)');
        $req->execute(array("ple"=>$lit,
                            "bas"=>$bas,
                            "haut"=>$haut
    ));
    }
    if($typ=="vide" && $sta=="vide" && $lit=="vide" && $douche<>"vide"&& $vil=="vide") // par nombre de douche
    {
       
        $req=$base->prepare('SELECT* FROM maison WHERE (douches=:ple AND prix>=:bas AND prix<=:haut)');
        $req->execute(array("ple"=>$douche,
                            "bas"=>$bas,
                            "haut"=>$haut
                        ));
    }
    if($typ<>"vide" && $sta=="vide" && $lit=="vide" && $douche=="vide"&& $vil=="vide") // par type de maison
    {
       
        $req=$base->prepare('SELECT* FROM maison WHERE (typappart=:ple AND prix>=:bas AND prix<=:haut)');
        $req->execute(array("ple"=>$typ,
                            "bas"=>$bas,
                            "haut"=>$haut));
    }
    if($typ<>"vide" && $sta<>"vide" && $lit=="vide" && $douche=="vide"&& $vil<>"vide") // par ville+typ+option
    {
        $ok=rtv($base,$vil);
        $reqc=$base->prepare('SELECT* FROM infosup WHERE ville=:pl ' );
        $reqc->execute(array("pl"=>$ok));
        if($sta=="Acheter")
        {
            $sta="A vendre";
        } else { $sta="A louer"; }
        $oku=1;
        $recap=1;
    }
    if($typ=="vide" && $sta=="vide" && $lit=="vide" && $douche=="vide" && $vil=="vide")
    {
        $req=$base->prepare('SELECT* FROM maison WHERE  (prix>=:bas AND prix<=:haut)');
        $req->execute(array(
            "bas"=>$bas,
            "haut"=>$haut
        ));
        
    }

} else { $req=$base->query('SELECT* FROM maison'); }
 ?>