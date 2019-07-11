<?php 
 require_once('function_p.php');
 require_once('../../his_bd.php');
 session_start();
    if(isset($_GET['lol']))
    {
         echo "autorisation";
    }
    if(isset($_GET['files'])&&isset($_GET['img']))
    {
        if(!empty($_FILES))
        {
            if(isset($_FILES['file'])) 
            {
                $file=$_FILES['file'];
                $filename=$file['name'];
                $ext=pathinfo($filename,PATHINFO_EXTENSION);
                $img_nom=uniqid().'.'.$ext;
                $uploadfile='../../doc_client/img_maison/'.$img_nom;
                if(move_uploaded_file($file['tmp_name'], $uploadfile))
                {
               
                addimagep($img_nom, $_SESSION['idmaison_eng'],$bdd);
                }

            }
            if(isset($_FILES['file2']))
            {
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
                            addimage($img_nom2,$_SESSION['idmaison_eng'],$bdd);
    				    }
    	 	        $variant=$variant+1;
	            }
            }
            
        
        }
        
        
    }



?>