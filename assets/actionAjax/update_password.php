<?php
 $dsn = 'mysql:host=localhost;dbname=orphelinat';
 $username = 'root';
 $password = getenv('');
 try{
     $pdo = new PDO($dsn, $username, $password);
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
     //Récupérer les données du formulaire de connexion
     if(isset($_POST['action'])){
         $iduser=$_POST['iduser'];
         $password=$_POST['password'];
         $confirmer=$_POST['confirmer'];
         
         if(empty($password)||empty($confirmer)){
            ?>
<div class="btn btn-danger" style="display:flex;justify-content:center;
                                          align-items:center;
                                               border-radius:5px;padding:5px;">
    <h5 style="color: #f2f2f2;font-size:18px">ces champs ne doit pas etre vide</h5>
</div>
<?php
         }
         elseif(strlen($password) < 8){
            ?>
<div class="btn btn-danger" style="display:flex;justify-content:center;
                              align-items:center;
                                   border-radius:5px;padding:5px;">
    <h5 style="color: #f2f2f2;font-size:18px">le mot de passe doit avoir au minimun 8 caracteurs</h5>
</div>
<?php
        }
        else{
            if ($password ==$confirmer) {
              $password_hash = md5($password);

              $sql="UPDATE users SET password=:password_hash WHERE idUser=:iduser";
              
                $statement=$pdo->prepare($sql);
                $statement->bindParam(':password_hash',$password_hash);
                $statement->bindParam(':iduser',$iduser);
               if($statement->execute()){
                 ?>
<div class="btn btn-primary" style="display:flex;justify-content:center; align-items:center;
                       border-radius:5px;padding:5px;">
    <h5 style="color: #f2f2f2;font-size:18px">votre mot de passe a été modifié</h5>
</div>
<?php
               }else{
               ?>
<div class="btn btn-danger" style="display:flex;justify-content:center;
                  align-items:center;
                       border-radius:5px;padding:5px;">
    <h5 style="color: #f2f2f2;font-size:18px">modification echoué</h5>
</div>
<?php


            }
        }else{
            ?>
<div class="btn btn-danger" style="display:flex;justify-content:center;
                              align-items:center;
                                   border-radius:5px;padding:5px;">
    <h5 style="color: #f2f2f2;font-size:18px">les deux mot de passe ne sont pas identique</h5>
</div>
<?php
        }
}
}}
 catch (PDOException $e){
     echo "pas de connection revenez plus tard:";
;
 }