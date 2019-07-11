<?php 
 
        require_once('function_p.php');
        require_once('../../his_bd.php');
       if(isset($_GET['lol']))
       {
           echo "autorisation";
       }
    /*addimages($img,$idm,$bdd);// insertion images
    addvideo($vid,$idm,$bdd); //ajout de video maison
    addfile($fil,$idm,$bdd);//titre proprio
    addinfo($idm,$adrs,$vil,$quart,$vois,$bdd);//info addrrs
    preference($a,$b,$c,$d,$e,$f,$g,$h,$i,$idm,$bdd); //pour les infos
           idmaison,balcon,animaux,barbeq,alarm,cuisinem,sauna,gym,ascens,sorti_u
           addall($idmaison,$idp,$titre,$desc,$typappart,$status,$chambres,$douches
           ,$escalier,$garages,$surface,$prix,$prixd,$prixr,$cni,$bdd)//information relative à la description
          
            
       
            */ if(isset($_GET['files'])&&isset($_GET['infog']))
            {
                session_start();
                $isp=Maison_no($bdd);
                $idmaison=Verif_A_idmaison($bdd,Maison_no($bdd,$isp));
                $_SESSION['idmaison_eng']= $idmaison;
                 addall( $idmaison,$isp,$_SESSION['idprop'],$_POST['titre'],$_POST['descipt'],$_POST['typappart'],$_POST['status'],$_POST['chambres'],$_POST['douches'],$_POST['escalier'],$_POST['garages'],$_POST['surface'],$_POST['prix'],$_POST['prixd'],$_POST['prixr'],$_POST['cni'],$_POST['piece'],$bdd);//information relative à la description
              
                        
    	    }
               

            
            if(isset($_GET['files'])&&isset($_GET['addr']))//en cours
            {
                $vil=idvl($bdd,$_POST['vil']);
                addinfo($_POST['idmaison'],$_POST['adrs'],$vil,$_POST['quart'],$_POST['vois'],$bdd); // 1 temps verif 1 ok
            }
            if(isset($_GET['files'])&&isset($_GET['prefe']))//ok terminer
            {
                preference($_POST['balcon'],$_POST['animaux'],$_POST['barbeque'],$_POST['alarm'],$_POST['cuisine'],$_POST['sauna'],$_POST['gym'],$_POST['ascenceur'],$_POST['sortiu'],$_POST['idmaison'],$bdd); // 1 temps
            }
            
            if(isset($_GET['files'])&&isset($_GET['fichier']))
            {
                $liend="../../doc_client/";
               
                   if(move_uploaded_file($_FILES['file']['tmp_name'], $liend))
                   {
                    addfile(basename($_FILES['file']['name']),$_POST['idmaison'],$bdd); // plusieurs temps en cours
                   }
               
            }
            
            if(isset($_GET['files'])&&isset($_GET['img']))
            {
                $file=array();
                $liend="../../doc_client/";
                foreach ($_FILES as $file) 
                {
                   if(move_uploaded_file($file['tmp_name'], $liend .basename($file['name'])))
                   {
                    addimages(basename($file['name']),$_POST['idmaison'],$bdd); // plusieurs temps
                   }
                }
                
            }
      

?>