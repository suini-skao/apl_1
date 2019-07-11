<?php try{$bdd=new pdo('mysql:host=localhost;dbname=bd_apl_lm','root','');
   }
   catch(Exeption $e)
   {die('Erreur:'.$e->getMessage());
   }
   $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>