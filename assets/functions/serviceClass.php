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
                 echo"<h5 class='alert alert-danger text-center' style='font-size:14px;'>tout les champs doivent etre remplis
                 </h5>";
                }
                else{
                                    
                  $sql="INSERT INTO `services`(`type`, `description`, `creer`)
                   VALUES (:type, :description,NOW())";
                  
                    $statement=$pdo->prepare($sql);
                    $statement->bindParam(':type',$type);
                    $statement->bindParam(':description',$description);
                   if($statement->execute()){
                     ?>
<h5 class='alert alert-success text-center' style='font-size:14px;'>vous venez d'ajouter un nouveau service</h5>
<?php
                              }
                              else{
                                ?>
<h5 class='alert alert-danger text-center' style='font-size:14px;'>oupps l'enregistrement a echoué veuillez recommencer
</h5>
<?php
                }
            }
    }
}
    catch(PDOException $e){
        ?>
<h5 class='alert alert-danger text-center' style='font-size:14px;'>notre base de donnée ne pas disponible pour le moment
    reesayez plus tard</span>
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

//fetch all services for the admin in the detail pages
public function getServiceforadmin(){
    $dsn = 'mysql:host=localhost;dbname=orphelinat';
    $username = 'root';
    $password = getenv('');

    try{
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //getting all data from the database
        $query = "SELECT * FROM services order by idService desc";
        $stmt = $pdo->query($query);
        $services = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        //Afficher les utilisateurs
        if($services){
            date_default_timezone_set('Europe/Paris');
            function timetoget($timeto){
                $time_ago=strtotime($timeto);
                $current_time=time();
                $time_difference=$current_time -$time_ago;
                $seconds=$time_difference;
                $minutes=round($seconds /60); // value 60 is seconds
                $hours=round($seconds /3600); // value 3600 is 60 mi
                $days=round($seconds /86400);// 86400=24*60*60
                $weeks=round($seconds /604800);//7*24*60*60;
                $months=round($seconds /2629440); //(365+365+365+365)/5/12
                $years=round($seconds /31553280);
                  if($seconds <=60){
                      return "just now";
                  }
                else if($minutes <=60){
                  if($minutes==1){
                      return "one minute ago";
                  }else{
                      return "$minutes minutes a go";
              
                  }
                }
                else if($hours <=24){
                  if($hours==1){
                      return "an hour ago";
                  }else{
                      return "$hours hours ago";
              
                  }
                }
                else if($days <=7){
                  if($days==1){
                      return "yesterday";
                  }else{
                      return "$days days ago";
              
                  }
                }
                //4.3 ==52/12 
                else if($weeks <=4.3){
                  if($weeks==1){
                      return "a week ago";
                  }else{
                      return "$weeks weeks ago";
              
                  }
                }
                else if($months <=12){
                  if($months==1){
                      return "a month ago";
                  }else{
                      return "$months months ago";
              
                  }
                }
                else{
                  if($years==1){
                      return "one year ago";
                  }else{
                      return "$years years ago";
                  }
                } 
            }
            foreach($services as $rows){
                $timeto=$rows['creer'];
                $string=strip_tags($rows['description']);
                if(strlen($string)>55):
                $stringcut=substr($string,0,100);
                $endpoint=strrpos($stringcut,' ');
                $string=$endpoint?substr($stringcut,0,$endpoint):substr($stringcut,0);
                $string.='...';
                endif;
                ?>
    <?php
    $id=$rows['idService'];
    $encrypte_1=(($id));
    $link2="service_detail.php?itsmyservice=".urlencode(base64_encode($encrypte_1));
?>
    <div class="col-sm-4 mb-3 mb-sm-0">
        <div class="card text-bg-dark mb-3" style="max-width: 18rem;">
            <div class="card-header"><small>Service ajouté il ya : <?php echo timetoget($timeto); ?></small></div>
            <div class="card-body">
                <h5 class="card-title" style="font-size:16px;"><?php echo $rows['type']; ?></h5>
                <p class="card-text" style="font-size:14px;">
                    <?php echo $string;?>
                </p>
            </div>
            <div class="card-footer">
                <a href="<?php echo $link2; ?>" class="btn btn-info" style="font-size:12px;">lire more</a>
            </div>
        </div>
    </div>

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


public function getServiceuser(){
    $dsn = 'mysql:host=localhost;dbname=orphelinat';
    $username = 'root';
    $password = getenv('');

    try{
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //getting all data from the database
        $query = "SELECT * FROM services order by idService desc limit 3";
        $stmt = $pdo->query($query);
        $services = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        //Afficher les utilisateurs
        if($services){
            date_default_timezone_set('Europe/Paris');
            function timemo($timeto){
                $time_ago=strtotime($timeto);
                $current_time=time();
                $time_difference=$current_time -$time_ago;
                $seconds=$time_difference;
                $minutes=round($seconds /60); // value 60 is seconds
                $hours=round($seconds /3600); // value 3600 is 60 mi
                $days=round($seconds /86400);// 86400=24*60*60
                $weeks=round($seconds /604800);//7*24*60*60;
                $months=round($seconds /2629440); //(365+365+365+365)/5/12
                $years=round($seconds /31553280);
                  if($seconds <=60){
                      return "just now";
                  }
                else if($minutes <=60){
                  if($minutes==1){
                      return "one minute ago";
                  }else{
                      return "$minutes minutes a go";
              
                  }
                }
                else if($hours <=24){
                  if($hours==1){
                      return "an hour ago";
                  }else{
                      return "$hours hours ago";
              
                  }
                }
                else if($days <=7){
                  if($days==1){
                      return "yesterday";
                  }else{
                      return "$days days ago";
              
                  }
                }
                //4.3 ==52/12 
                else if($weeks <=4.3){
                  if($weeks==1){
                      return "a week ago";
                  }else{
                      return "$weeks weeks ago";
              
                  }
                }
                else if($months <=12){
                  if($months==1){
                      return "a month ago";
                  }else{
                      return "$months months ago";
              
                  }
                }
                else{
                  if($years==1){
                      return "one year ago";
                  }else{
                      return "$years years ago";
                  }
                } 
            }
            foreach($services as $rows){
                $timeto=$rows['creer'];
                $string=strip_tags($rows['description']);
                if(strlen($string)>55):
                $stringcut=substr($string,0,100);
                $endpoint=strrpos($stringcut,' ');
                $string=$endpoint?substr($stringcut,0,$endpoint):substr($stringcut,0);
                $string.='...';
                endif;
                ?>
    <?php
    $id=$rows['idService'];
    $encrypte_1=(($id));
    $link2="assets/pagesPhp/service_detail.php?itsmyservice=".urlencode(base64_encode($encrypte_1));
?>
    <div class="col-md-4 py-3 py-md-0 mt-2 ">
        <div class="card-service d-flex">
            <div class="circle-shape bg-secondary text-white">
                <span class="mai-settings"></span>
            </div>
            <p style="font-size:15px;"><?php echo $rows['type'] ?></p>
            <a href="<?php echo $link2;?>"><span class="mai-arrow-forward"></span></a>
        </div>
    </div>
    <?php
             }
        }else{
            ?>
    <div class="col-md-4 py-3 py-md-0 mt-2 ">
        <div class="card-service d-flex">
            <p style="font-size:15px;">Aucun service n'est disponible pour le moment</p>
        </div>
    </div>
    <?php
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
    <h5 class="alert alert-success text-center" style="font-size:14px;">modification reussi
    </h5>
    <?php
                          }
                          else{
                            ?>
    <span class="alert alert-success text-center" style="font-size:14px;">
        oupss veuillez recommencer!!
    </span>
    <?php
            }
}
}
catch(PDOException $e){
    ?>
    <span class="alert alert-success text-center" style="font-size:14px;">
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