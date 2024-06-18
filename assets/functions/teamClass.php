<?php
//class of team employee all task
class teamClass{
//adding employee in the database
    public function teamAdd(){
        $dsn = 'mysql:host=localhost;dbname=orphelinat';
        $username = 'root';
        $password = getenv('');
    
        try{
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if(isset($_POST['create'])){
                $name = $_POST['name'];
                $email = $_POST['email'];
                $dob = $_POST['dob'];
                $tel = $_POST['tel'];
                $adresse = $_POST['adresse'];
                $poste = $_POST['poste'];
                $photo = $_FILES['photo'];
                if(empty($name)||empty($email)||empty($dob)||empty($tel)||empty($adresse)||empty($poste)||empty($photo)){
                 echo"<h5 class='alert alert-danger text-center' style='font-size:14px;'>tout les champs doivent etre remplis</h5>";
                }
                else{
                    $photo=$_FILES['photo'];
                    $filename=$_FILES['photo']['name'];
                    $file_size=$_FILES['photo']['size'];
                    $file_error=$_FILES['photo']['error'];
                    $tmp=$_FILES['photo']['tmp_name'];
                    $file_type=$_FILES['photo']['type'];
                    
                    $fileext=explode('.',$filename);
                    $filecheck=strtolower(end($fileext));
                   
                    $destinationfile='../phototeam/'.$name.'/images/';
                    $target_file=$destinationfile.basename($_FILES['photo']['name']);
                     $extensions=array("jpeg","jpg","png","webp","ARW");
                     $max_file_size = 200000000;
                     if (in_array($filecheck,$extensions)==false) {
                        echo"<span class='alert alert-success'>l'image a été ajouté avec succée</span>";
                                }
                                if (!file_exists ($destinationfile)) {
                                 mkdir($destinationfile,0777,true);
                                 }
                               move_uploaded_file($tmp,$target_file);
                              $url=$_SERVER['HTTP_REFERER'];
                              $seg=explode('/',$url);
                              $path=$seg[0].'/'.$seg[1].'/'.$seg[2].'/'.$seg[3].'/'.$seg[4];
                              $full_url=$path.'/'.'phototeam/'.$name.'/images/'.$filename;
                 
                             $sql="INSERT INTO `teams`(`nom`, `email`, `dob`, `portable`,
                              `adresse`, `poste`, `photo`, `entrance`)
                              VALUES (:name, :email, :dob,:tel,:adresse,:poste,:full_url,NOW())";
                             
                               $statement=$pdo->prepare($sql);
                               $statement->bindParam(':name',$name);
                               $statement->bindParam(':email',$email);
                               $statement->bindParam(':dob',$dob);
                               $statement->bindParam(':tel',$tel);
                               $statement->bindParam(':adresse',$adresse);
                               $statement->bindParam(':poste',$poste);
                               $statement->bindParam(':full_url',$full_url);
                              if($statement->execute()){
                                ?>
<h5 class="alert alert-success text-center" style="font-size:14px;">Vous venez d'ajouter un employé</h5>
<?php
                              }
                              else{
                                ?>
<h5 class="alert alert-danger text-center" style="font-size:14px;">oupps l'enregistrement a echoué veuillez recommencer
</h5>
<?php
                }
            }
    }
}
    catch(PDOException $e){
        ?>
<h5 class="alert alert-danger text-center" style="font-size:14px;">notre base de donnée ne pas disponible pour le moment
    reesayez plus tard</h5>
<?php
    }
}

//fetch all employe for the admin
public function getEmploye(){
    $dsn = 'mysql:host=localhost;dbname=orphelinat';
    $username = 'root';
    $password = getenv('');

    try{
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //getting all data from the database
        $query = "SELECT * FROM teams";
        $stmt = $pdo->query($query);
        $team = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        //Afficher les utilisateurs
        if($team){
            foreach($team as $rows){
                $dateOfBirth = $rows['dob'];
                $today = date("Y-m-d");
                $diff = date_diff(date_create($dateOfBirth), date_create($today));
                ?>
<tbody>
    <tr>
        <td><img src="<?php echo $rows['photo']?>" alt="" style="height: 30px;width:30px;object-fit:contain;"></td>
        <td><?php echo $rows['nom']?></td>
        <td><?php echo $diff->format('%y'); ?> ans</td>
        <td><?php echo $rows['email']?></td>
        <td><?php echo $rows['portable']?></td>
        <td><?php echo $rows['poste']?></td>
        <td class="d-flex">
            <?php
              $id=$rows['idTeam'];
              $encrypte_1=(($id));
              $link="editTeam.php?yourskin=".urlencode(base64_encode($encrypte_1));
            ?>
            <a href="<?=$link;?>">
                <button id="edit" style="border: none;background:none;outline:none;"
                    value="<?php echo $rows['idTeam']?>"><i class="material-icons" data-toggle="tooltip"
                        title="Edit">&#xE254;</i></button>
            </a>
            <form action="" method="post">
                <input type="hidden" name="idteam" value="<?php echo $rows['idTeam']?>">
                <button id="delete" style="border: none;background:none;outline:none;" name="delete_one_employe"><i
                        class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></button>
            </form>
        </td>
        <td>
            <!-- here the form -->
            <div class="gap-3 formdelete<?php echo $rows['idTeam']?>">
            </div>
            <!-- here the form -->
        </td>
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


//get all team 
public function getTeam(){
    $dsn ='mysql:host=localhost;dbname=orphelinat';
    $username = 'root';
    $password = getenv('');

    try{
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //getting all data from the database
        $queryone="SELECT * FROM teams ORDER by rand() limit 3";
        $stmtement = $pdo->query($queryone);
        $equipe = $stmtement->fetchAll(PDO::FETCH_ASSOC);
    
        //Afficher les utilisateurs
        if($equipe){
            date_default_timezone_set('Europe/Paris');
            function realtime($timeto){
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
            foreach($equipe as $rows){
                $timeto=$rows['entrance']
                ?>
<div class="col-lg-4 py-2 wow zoomIn">
    <div class="card-blog">
        <div class="header">
            <div class="post-category">
                <a href="#">liveOrphan</a>
            </div>
            <a href="blog-details.html" class="post-thumb">
                <img style="object-fit:contain;" src="<?php echo $rows['photo'];?>" alt="">
            </a>
        </div>
        <div class="body">
            <h5 class="post-title" style="font-size:12px;">
                poste: <?php echo $rows['poste'];?>
            </h5>
            <small>contact: <?php echo $rows['email'];?></small>
            <h5 class="post-title" style="font-size:12px;">
                tel: <?php echo $rows['portable'];?>
            </h5>
            <div class="site-info">
                <div class="avatar mr-2">
                    <div class="avatar-img">
                        <img src="<?php echo $rows['photo'];?>" alt="">
                    </div>
                    <span><?php echo $rows['nom'];?></span>
                </div>
                <span class="mai-time"></span> <?php echo realtime($timeto);?>
            </div>
        </div>
    </div>
</div>

<?php
             }
        }else{
            ?>
<small class="alert alert-dark">Aucun employé n'a été enregistré par l'administrateur</small>
<?php
        }
      
}
catch(PDOException $e){
    echo"error",$e ->getMessage();
}
}   
//edit the detail of a particular employé
public function editEmploye() {
    $dsn = 'mysql:host=localhost;dbname=orphelinat';
    $username = 'root';
    $password = getenv('');

    try{
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //getting all data from the database
                if(isset($_POST['edit'])){
                $iduser = $_POST['iduser'];
                $name = $_POST['name'];
                $email = $_POST['email'];
                $dob = $_POST['dob'];
                $tel = $_POST['tel'];
                $adresse = $_POST['adresse'];
                $poste = $_POST['poste'];

                          $query ="UPDATE teams
                          SET nom =:name, email = :email, dob=:dob,portable=:tel,adresse=:adresse,poste=:poste
                          WHERE idTeam='$iduser'";
                             
                           $statement=$pdo->prepare($query);
                           $statement->bindParam(':name',$name);
                           $statement->bindParam(':email',$email);
                           $statement->bindParam(':dob',$dob);
                           $statement->bindParam(':tel',$tel);
                           $statement->bindParam(':adresse',$adresse);
                           $statement->bindParam(':poste',$poste);
                          if($statement->execute()){
                            ?>
<h5 class="alert alert-success text-center" style="font-size:14px;">modification reussi
</h5>
<?php
                          }
                          else{
                            ?>
<h5 class="alert alert-danger text-center" style="font-size:14px;">oupps modification echoué veuillez recommencer
</h5>
<?php
            }
}
}
catch(PDOException $e){
    ?>
<h5 class="alert alert-danger text-center" style="font-size:14px;">oupps revenez plus tard
</h5>
<?php
}
}

//delete a particular employe in the datebase
public function deleteEmploye(){
    $dsn = 'mysql:host=localhost;dbname=orphelinat';
    $username = 'root';
    $password = getenv('');

    try{
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //delete a singlr employe

        if(isset($_POST['delete_one_employe'])){
          $idteam=$_POST['idteam'];
          if(empty($idteam)){
            echo"<span class='alert alert-danger'>oups revenez plus tard</span>";
        }else{
            $query ="DELETE FROM teams where idTeam='$idteam'";
            $stmt = $pdo->query($query);
            if($stmt){
                echo"<span class='alert alert-success'>vous venez d'effacer un employé</span>";
            }else{
                echo"<span class='alert alert-success'>impossible de supprimer cet employé pour le moment</span>";
            }
    }
        }
        }
catch(PDOException $e){
    echo"<span class='alert alert-success'>impossible de supprimer cet employé pour le moment revenez plus tard</span>";
}
}
//delete all  employe in the datebase
public function deleteallEmploye(){
    $dsn = 'mysql:host=localhost;dbname=orphelinat';
    $username = 'root';
    $password = getenv('');

    try{
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //delete all  employe

        if(isset($_POST['deleteallteam'])){
            $query ="DELETE FROM teams";
            $stmt = $pdo->query($query);
            if($stmt){
                $truncate="TRUNCATE TABLE teams";
                $statment=$pdo->query($truncate);
                if($statment){
                    echo"<span class='alert alert-success'>vous venez d'effacer tout les employés</span>";
                }else{
                    echo"<span class='alert alert-success'>impossible de supprimer cet employé pour le moment</span>";
                }
            }else{
                echo"<span class='alert alert-success'>impossible de supprimer cet employé pour le moment</span>";
            }
    }
}
catch(PDOException $e){
    echo"<span class='alert alert-success'>impossible de supprimer cet employé pour le moment revenez plus tard</span>";
}
}
//function of counting number of employé in the database:
public function countemployeRow(){
    $dsn = 'mysql:host=localhost;dbname=orphelinat';
    $username = 'root';
    $password = getenv('');
       
    try{
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql="SELECT COUNT(*) FROM teams";
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