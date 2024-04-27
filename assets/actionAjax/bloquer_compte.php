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
        
              $sql="UPDATE users SET niveau_du_compte='bloqué' WHERE idUser=:iduser";
              
                $statement=$pdo->prepare($sql);
                $statement->bindParam(':iduser',$iduser);
               if($statement->execute()){
                 ?>
<button class="btn-primary" id="bloquer" value="<?php echo  $iduser;?>">
    Bloqué</button>
<?php
               }else{
               ?>
<span class="alert alert-danger">modification echoué</span>
<?php
            }
        }
}
 catch (PDOException $e){
     echo "<span class='alert alert-danger'>pas de connection revenez plus tard:</span>";
 }