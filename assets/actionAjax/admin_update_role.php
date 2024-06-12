<?php
 $dsn = 'mysql:host=localhost;dbname=orphelinat';
 $username = 'root';
 $password = getenv('');
 try{
     $pdo = new PDO($dsn, $username, $password);
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
     //Récupérer les données du formulaire de connexion
     if(isset($_POST['modifier'])){
         $idsession=$_POST['idsession'];
         $myrole=$_POST['myrole'];
         
              $sql="UPDATE users SET role=:myrole WHERE idUser=:idsession";
              
                $statement=$pdo->prepare($sql);
                $statement->bindParam(':myrole',$myrole);
                $statement->bindParam(':idsession',$idsession);
               if($statement->execute()){
                 ?>
<div class="alert alert-success" style="display:flex;justify-content:center; align-items:center;
                       border-radius:5px;padding:2px;">
    <h5 style="color: black;font-size:12px">votre role est à jour</h5>
</div>
<?php
               }else{
               ?>
<div class="alert alert-danger" style="display:flex;justify-content:center;
                  align-items:center;
                       border-radius:5px;padding:2px;">
    <h5 style="color: #f2f2f2;font-size:12px">modification echouée</h5>
</div>
<?php


            }
        }
}
 catch (PDOException $e){
     echo "pas de connection revenez plus tard:";
;
 }