<?php 
    session_start();
    require_once('function_p.php');
    require_once('../../his_bd.php');
    if(isset($_POST['idp']))
    {
        if(empty($_FILES)&& !isset($_POST['address']))
        {
            echo "manque";
        }
        else { 
            $isp=Maison_no($bdd);
            $idmaison=Verif_A_idmaison($bdd,Maison_no($bdd,$isp));
            $_SESSION['idmaison_eng']= $idmaison;
             addall( $idmaison,$isp,$_SESSION['idprop'],$_POST['property-title'],$_POST['property-description'],$_POST['select-type'],$_POST['select-status'],$_POST['Bedrooms'],$_POST['Bathrooms'],$_POST['Floors'],$_POST['Garages'],$_POST['Area'],$_POST['Sale-Rent-Price'],$_POST['Before-Price-Label'],$_POST['After-Price-Label'],$_POST['Property-ID'],$_POST['Pieces'],$bdd);//information relative à la description
            $vil=idvl($bdd,$_POST['vil']);
             addinfo($idmaison,$_POST['address'],$vil,$_POST['state'],$_POST['neighborhood'],$bdd); // 1 temps verif 1 ok
             preference($_POST['balcon'],$_POST['animaux'],$_POST['barbeque'],$_POST['alarm'],$_POST['cuisine'],$_POST['sauna'],$_POST['gym'],$_POST['ascenceur'],$_POST['sortiu'],$idmaison,$bdd); // 1 temps
                // image principale
                
                $file=$_FILES['file'];
                $filename=$file['name'];
                $ext=pathinfo($filename,PATHINFO_EXTENSION);
                $img_nom=uniqid().'.'.$ext;
                $uploadfile='../../doc_client/img_maison/'.$img_nom;
                if(move_uploaded_file($file['tmp_name'], $uploadfile))
                {
               
                addimagep($img_nom, $idmaison,$bdd);
                }
                // image secondaire

                $taille=count($_FILES['file2']['name']);
	            $variant=0;
                while($taille>$variant)
                {
			        $filesec=$_FILES['file2'];
                    $filenamesec=$filesec['name'][$variant];
                    $ext2=pathinfo($filenamesec,PATHINFO_EXTENSION);
                    $img_nom2=uniqid().'.'.$ext2;
    		        $uploadfile2='../../doc_client/img_maison/'.$img_nom2;
    			    if(move_uploaded_file($filesec['tmp_name'][$variant], $uploadfile2))
    				    {
                            addimage($img_nom2,$idmaison,$bdd);
    				    }
    	 	        $variant=$variant+1;
	            }
                echo "succès";
        }
    }
?>