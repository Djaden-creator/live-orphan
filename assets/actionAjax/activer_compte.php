<?php
 $dsn = 'mysql:host=localhost;dbname=orphelinat';
 $username = 'root';
 $password = getenv('');
 try{
     $pdo = new PDO($dsn, $username, $password);
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
     //Récupérer les données du formulaire de connexion
     if(isset($_POST['actionactive'])){
         $iduser=$_POST['iduser'];
              $sql="UPDATE users SET niveau_du_compte='active' WHERE idUser=:iduser";
                $statement=$pdo->prepare($sql);
                $statement->bindParam(':iduser',$iduser);
               if($statement->execute()){
                 ?>
<button class="btn-primary" id="activer" value="<?php echo $iduser;?>">
    Active</button>
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
        }
}
 catch (PDOException $e){
     echo "pas de connection revenez plus tard:";
 }