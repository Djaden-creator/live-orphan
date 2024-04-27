<?php
        $dsn = 'mysql:host=localhost;dbname=orphelinat';
        $username = 'root';
        $password = getenv('');
    
        try{
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           if(isset($_POST['action'])){
            $idadoption=$_POST['idadoption'];
            $selectme=$_POST['selectme'];
            if(empty($idadoption)||empty($selectme)){
              echo"this cant be empty";
            }else{
              $sqlone="UPDATE adoption SET decision=:selectme WHERE idAdoption=:idadoption";
              $statement=$pdo->prepare($sqlone);
              $statement->bindParam(':selectme',$selectme);
              $statement->bindParam(':idadoption',$idadoption);
             if($statement->execute()){
               $sql="SELECT * FROM  adoption WHERE idAdoption='$idadoption'";
               $stmt = $pdo->query($sql);
               $adoption = $stmt->fetchAll(PDO::FETCH_ASSOC);
                   foreach($adoption  as $rows){
                    if($rows['decision']=='en avance'){
                       $sqlmodification="UPDATE adoption SET status='en progress' WHERE idAdoption=:idadoption";
                       $modification=$pdo->prepare($sqlmodification);
                       $modification->bindParam(':idadoption',$idadoption);
                      if($modification->execute()){
                       $rowstatus=$rows['decision'];
                        echo $rowstatus;
                      }
                      else{
                       echo"error";
                      }
                    }elseif($rows['decision']=='Accepté'){
                       $sqlaccepte="UPDATE adoption SET status='Accepté' WHERE idAdoption=:idadoption";
                       $sqlaccepter=$pdo->prepare($sqlaccepte);
                       $sqlaccepter->bindParam(':idadoption',$idadoption);
                      if($sqlaccepter->execute()){
                       $rowstatus=$rows['decision'];
                        echo $rowstatus;
                      }
                    }
                    elseif($rows['decision']=='Rejeté'){
                       $sqlrejet="UPDATE adoption SET status='Rejeté' WHERE idAdoption=:idadoption";
                       $sqlrejeter=$pdo->prepare($sqlrejet);
                       $sqlrejeter->bindParam(':idadoption',$idadoption);
                      if($sqlrejeter->execute()){
                       $rowstatus=$rows['decision'];
                        echo $rowstatus;
                      }
                    }else{
                       if($rows['decision']=='encours'){
                           $sqlencours="UPDATE adoption SET status='encours' WHERE idAdoption=:idadoption";
                           $sqlenc=$pdo->prepare($sqlencours);
                           $sqlenc->bindParam(':idadoption',$idadoption);
                          if($sqlenc->execute()){
                           $rowstatus=$rows['decision'];
                            echo $rowstatus;
                          }
                        }
                    }
             }
           }
            }
                               
        }
    }
      catch(PDOException $e){
         echo"echec" .$e->getMessage();
}