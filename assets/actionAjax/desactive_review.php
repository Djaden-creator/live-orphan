<?php
 $dsn = 'mysql:host=localhost;dbname=orphelinat';
 $username = 'root';
 $password = getenv('');
 try{
     $pdo = new PDO($dsn, $username, $password);
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
     //activer un review
    
     if(isset($_POST['active'])){
         $reviewid=$_POST['reviewid'];
              $sql="UPDATE reviews SET status='nonactive' WHERE idreview=:reviewid";
                $statement=$pdo->prepare($sql);
                $statement->bindParam(':reviewid',$reviewid);
               $statement->execute();
        }
}
 catch (PDOException $e){
     echo "pas de connection revenez plus tard:";
 }