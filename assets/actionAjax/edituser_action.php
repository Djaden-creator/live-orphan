<?php
        $dsn = 'mysql:host=localhost;dbname=orphelinat';
        $username = 'root';
        $password = getenv('');
    
        try{
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           if(isset($_POST['action'])){
            $iduser=$_POST['iduser'];
           $name=$_POST['name'];
           $email=$_POST['email'];
           $dob=$_POST['dob'];
           $tel=$_POST['tel'];
           $sex=$_POST['sex'];
           $objectif=$_POST['objectif'];
           $addresse=$_POST['addresse'];
        
                     $sql="UPDATE users SET name=:name,email=:email,dbd=:dob,sex=:sex,portable=:tel,
                     adresse=:addresse,objectif=:objectif WHERE idUser=:iduser";
                     
                       $statement=$pdo->prepare($sql);
                       $statement->bindParam(':name',$name);
                       $statement->bindParam(':email',$email);
                       $statement->bindParam(':dob',$dob);
                       $statement->bindParam(':sex',$sex);
                       $statement->bindParam(':tel',$tel);
                       $statement->bindParam(':addresse',$addresse);
                       $statement->bindParam(':objectif',$objectif);
                       $statement->bindParam(':iduser',$iduser);
                      if($statement->execute()){
                        ?>
<div class="btn btn-primary" style="display:flex;justify-content:center; align-items:center;
                              border-radius:5px;padding:5px;">
    <h5 style="color: #f2f2f2;font-size:18px">l'enregistrement reussi avec succée</h5>
</div>
<?php
                      }else{
                      ?>
<div class="btn btn-danger" style="display:flex;justify-content:center;
                         align-items:center;
                              border-radius:5px;padding:5px;">
    <h5 style="color: #f2f2f2;font-size:18px">l'enregistrement a echoué</h5>
</div>
<?php
                      }
                    }
        }
      catch(PDOException $e){
         echo"echec" .$e->getMessage();
}