<?php
        $dsn = 'mysql:host=localhost;dbname=orphelinat';
        $username = 'root';
        $password = getenv('');
    
        try{
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           if(isset($_POST['action'])){
            $iduser=$_POST['iduser'];
            $selectrole=$_POST['selectrole'];

              $sqlone="UPDATE users SET role=:selectrole WHERE idUser=:iduser";
              $statement=$pdo->prepare($sqlone);
              $statement->bindParam(':selectrole',$selectrole);
              $statement->bindParam(':iduser',$iduser);
             if($statement->execute()){
                $sql="SELECT * FROM  users WHERE idUser='$iduser'";
                $stmt = $pdo->query($sql);
                $adoption = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach($adoption  as $rows){
                     $role=$rows['role'];
                     echo $role;
           }
            }
         }
        }
      catch(PDOException $e){
         echo"echec" .$e->getMessage();
}