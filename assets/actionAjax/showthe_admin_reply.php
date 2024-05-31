<?php
session_start();
  $dsn = 'mysql:host=localhost;dbname=orphelinat';
  $username = 'root';
  $password = getenv('');

 try{
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if (isset($_POST['action'])){
            
           $idmessageback=$_POST['idmessageback'];

           $sql="UPDATE messageback SET user_check='oui' WHERE id=:idmessageback";
              
           $statement=$pdo->prepare($sql);
           $statement->bindParam(':idmessageback',$idmessageback);
          if($statement->execute()){

            $sql="SELECT * FROM messageback WHERE id='$idmessageback'";
            $stmt = $pdo->query($sql);
            $child = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($child){
                foreach($child as $rows){
                    $message=$rows['message'];
                    echo "<small style='padding:5px;font-size:13px;'>$message</small>";
                    echo" <br/>
                       <button class='btn btn-danger' id='closethis' style='font-size:10px;' value='".$idmessageback."'>close</button>
                    ";
               }
           }else{
               echo"pas de reponse disponible";
           }
       }else{
           echo'ouppps revenez plus tard';
       }
    }
}
 catch(PDOException){
echo"erreur data base";
 }