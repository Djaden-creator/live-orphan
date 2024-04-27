<?php
//class of team employee all task
class serviceClass{
//adding new services  in the database
    public function serviceAdd(){
        $dsn = 'mysql:host=localhost;dbname=orphelinat';
        $username = 'root';
        $password = getenv('');
    
        try{
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if(isset($_POST['service'])){
                $type = $_POST['type'];
                $description = $_POST['description'];
                if(empty($type)||empty($description)){
                 echo"<span class='alert alert-danger'>tout les champs doivent etre remplis</span>";
                }
                else{
                                    
                  $sql="INSERT INTO `services`(`type`, `description`, `creer`)
                   VALUES (:type, :description,NOW())";
                  
                    $statement=$pdo->prepare($sql);
                    $statement->bindParam(':type',$type);
                    $statement->bindParam(':description',$description);
                   if($statement->execute()){
                     ?>
<span class='alert alert-success'>vous venez d'ajouter un nouveau service</span>
<?php
                              }
                              else{
                                ?>
<span class='alert alert-danger'>oupps l'enregistrement a echoué veuillez recommencer</span>
<?php
                }
            }
    }
}
    catch(PDOException $e){
        ?>
<span class='alert alert-danger'>notre base de donnée ne pas disponible pour le moment reesayez plus tard</span>
<?php
    }
}

//fetch all services for the admin
public function getService(){
    $dsn = 'mysql:host=localhost;dbname=orphelinat';
    $username = 'root';
    $password = getenv('');

    try{
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //getting all data from the database
        $query = "SELECT * FROM services";
        $stmt = $pdo->query($query);
        $services = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        //Afficher les utilisateurs
        if($services){
            foreach($services as $rows){
                ?>
<?php
    $id=$rows['idService'];
    $encrypte_1=(($id));
    $link2="service_detail.php?itsmyservice=".urlencode(base64_encode($encrypte_1));
?>
<tbody>
    <tr>
        <td>
            <span class="custom-checkbox">
                <input type="checkbox" id="checkbox1" name="options[]" value="1">
                <label for="checkbox1"></label>
            </span>
        </td>
        <td><?php echo $rows['idService']?></td>
        <td><?php echo $rows['type']?></td>
        <td class="d-flex">
            <?php
              $id=$rows['idService'];
              $encrypte_1=(($id));
              $link="editservice.php?yourservices=".urlencode(base64_encode($encrypte_1));
            ?>
            <a href="<?=$link;?>">
                <button id="edit" style="border: none;background:none;outline:none;"
                    value="<?php echo $rows['idService']?>"><i class="material-icons" data-toggle="tooltip"
                        title="Edit">&#xE254;</i></button>
            </a>
            <form action="" method="post">
                <input type="hidden" name="idservice" value="<?php echo $rows['idService']?>">
                <button id="delete" style="border: none;background:none;outline:none;" name="delete_one_service"><i
                        class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></button>
            </form>
        </td>
        <td><a href="<?=$link2;?>"><u>detail</u></a></td>
    </tr>

</tbody>

<?php
             }
        }else{
            echo"no data found in the system";
        }
      
}
catch(PDOException $e){
    echo"error",$e ->getMessage();
}
}

//edit the detail of a particular employé
public function editService() {
    $dsn = 'mysql:host=localhost;dbname=orphelinat';
    $username = 'root';
    $password = getenv('');

    try{
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //getting all data from the database
                if(isset($_POST['editservice'])){
                $idservice= $_POST['idservice'];
                $type= $_POST['type'];
                $description= $_POST['description'];
            
                $query ="UPDATE services SET type=:type, description= :description WHERE idService='$idservice'";
                   
                 $statement=$pdo->prepare($query);
                 $statement->bindParam(':type',$type);
                 $statement->bindParam(':description',$description);
                if($statement->execute()){
                  ?>
<span class="alert alert-success">
    modification reussi avec succée
</span>
<?php
                          }
                          else{
                            ?>
<span class="alert alert-danger">
    oupss veuillez recommencer!!
</span>
<?php
            }
}
}
catch(PDOException $e){
    ?>
<span class="alert alert-danger">
    impossible d'effectuer cette operation pour le moment veuillez ressayer plus tard
</span>
<?php
}
}

//delete a particular service in the datebase
public function deleteService(){
    $dsn = 'mysql:host=localhost;dbname=orphelinat';
    $username = 'root';
    $password = getenv('');

    try{
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //delete a singlr employe

        if(isset($_POST['delete_one_service'])){
          $idservice=$_POST['idservice'];
          if(empty($idservice)){
            echo"<span class='alert alert-danger'>oups revenez plus tard</span>";
        }else{
            $query ="DELETE FROM services where idService='$idservice'";
            $stmt = $pdo->query($query);
            if($stmt){
                echo"<span class='alert alert-success'>vous venez d'effacer un service</span>";
            }else{
                echo"<span class='alert alert-success'>impossible de supprimer cet service pour le moment</span>";
            }
    }
        }
        }
catch(PDOException $e){
    echo"<span class='alert alert-success'>impossible de supprimer cet service pour le moment revenez plus tard</span>";
}
}
//delete all services in the datebase
public function deleteallservices(){
    $dsn = 'mysql:host=localhost;dbname=orphelinat';
    $username = 'root';
    $password = getenv('');

    try{
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //delete all  employe

        if(isset($_POST['deleteallservice'])){
            $query ="DELETE FROM services";
            $stmt = $pdo->query($query);
            if($stmt){
                $truncate="TRUNCATE TABLE services";
                $statment=$pdo->query($truncate);
                if($statment){
                    echo"<span class='alert alert-success'>vous venez d'effacer tout les services</span>";
                }else{
                    echo"<span class='alert alert-success'>impossible de supprimer tout les services pour le moment</span>";
                }
            }else{
                echo"<span class='alert alert-success'>impossible de supprimer tout les services pour le moment</span>";
            }
    }
}
catch(PDOException $e){
    echo"<span class='alert alert-success'>impossible de supprimer cet employé pour le moment revenez plus tard</span>";
}
}
//function of counting number of employé in the database:
public function countserviceRow(){
    $dsn = 'mysql:host=localhost;dbname=orphelinat';
    $username = 'root';
    $password = getenv('');
       
    try{
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql="SELECT COUNT(*) FROM services";
        $res = $pdo->query($sql);
        $count = $res->fetchColumn();
        echo $count;
    }catch(PDOException $e){
        ?>
<div style="background-color:#d94350;display:flex;justify-content:center; align-items:center;
            border-radius:5px;padding:10px 20px;">
    <h5 style="color: #f2f2f2;font-size:18px">
        ouff nous ne pouvons pas compter vos produit pour le moment
    </h5>
</div>
<?php
    }
   }
}