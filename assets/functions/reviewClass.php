<?php
//class of review  all task
class reviewClass{
//fetch all temoignages for the admin
public function getReview(){
    $dsn = 'mysql:host=localhost;dbname=orphelinat';
    $username = 'root';
    $password = getenv('');

    try{
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //getting all data from the database
        $query = "SELECT * FROM reviews";
        $stmt = $pdo->query($query);
        $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        //Afficher les utilisateurs
        if($reviews){
            foreach($reviews as $rows){
                ?>
<?php
    $id=$rows['idreview'];
    $encrypte_1=(($id));
    $link="review_detail.php?itsmyraview=".urlencode(base64_encode($encrypte_1));
?>
<tbody>
    <tr>
        <td><?php echo $rows['idreview']?></td>
        <td><?php echo $rows['name']?></td>
        <td><?php echo $rows['email']?></td>
        <td><?php echo $rows['note']?></td>
        <?php
              if($rows['status']=='nonactive'){
            ?>
        <td><button value="<?php echo $rows['idreview']?>" class="btn-danger nonactive">nonactive</button></td>
        <?php
              }else{
                ?>
        <td><button class="btn-success activerreview" value="<?php echo $rows['idreview']?>">active</button>
        </td>
        <?php
              }
            ?>

        <td class="d-flex">
            <form action="" method="post">
                <input type="hidden" name="idreview" value="<?php echo $rows['idreview']?>">
                <button id="delete" style="border: none;background:none;outline:none;" name="delete_one_review"><i
                        class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></button>
            </form>
        </td>
        <td><a href="<?=$link;?>"><u>detail</u></a></td>
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

public function getReviewall(){
    $dsn = 'mysql:host=localhost;dbname=orphelinat';
    $username = 'root';
    $password = getenv('');

    try{
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //getting all data from the database
        $query = "SELECT * FROM reviews order by idreview desc";
        $stmt = $pdo->query($query);
        $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        //Afficher les utilisateurs
        if($reviews){
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
            foreach($reviews as $rows){
                $timeto=$rows['create_at'];
                $string=strip_tags($rows['description']);
                if(strlen($string)>55):
                $stringcut=substr($string,0,100);
                $endpoint=strrpos($stringcut,' ');
                $string=$endpoint?substr($stringcut,0,$endpoint):substr($stringcut,0);
                $string.='...';
                endif;
                ?>
<?php
    $id=$rows['idreview'];
    $encrypte_1=(($id));
    $link="review_detail.php?itsmyraview=".urlencode(base64_encode($encrypte_1));
?>
<div class="col-sm-4 mb-3 mb-sm-0">
    <div class="card text-bg-dark mb-3" style="max-width: 18rem;">
        <div class="card-header"><small>temoignage il ya : <?php echo timetoget($timeto); ?></small></div>
        <div class="card-body">
            <small class="card-title" style="font-size:12px;">Par: <?php echo $rows['name']; ?></small>
            <?php
            if($rows['note']==1){
                ?>
            <span>
                <small class="btn btn-danger" style="font-size:10px;">note: <?php echo $rows['note']; ?>/5</small>
                <span>Motion: 20% fake opinion</span>
            </span>
            <?php
               }elseif($rows['note']==2){
                ?>
            <span>
                <small class="btn btn-danger" style="font-size:10px;">note: <?php echo $rows['note']; ?>/5</small>
                <span>Motion: 40% bad</span>
            </span>
            <?php
               }elseif($rows['note']==3){
                ?>
            <span>
                <small class="btn btn-success" style="font-size:10px;">note: <?php echo $rows['note']; ?>/5</small>
                <span>Motion: 60% good</span>
            </span>
            <?php
               }elseif($rows['note']==4){
                ?>
            <span>
                <small class="btn btn-success" style="font-size:10px;">note: <?php echo $rows['note']; ?>/5</small>
                <span>Motion: 80% very good</span>
            </span>
            <?php
               }else{
                ?>
            <span>
                <small class="btn btn-success" style="font-size:10px;">note: <?php echo $rows['note']; ?>/5</small>
                <span>Motion: 100% excellent</span>
            </span>
            <?php
               }
               ?>
            <p class="card-text" style="font-size:14px;">
                <?php echo $string;?>
            </p>
        </div>
        <div class="card-footer">
            <a href="<?php echo $link; ?>" class="btn btn-info" style="font-size:12px;">lire more</a>
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


public function fetchReviewforvisitor(){
    $dsn = 'mysql:host=localhost;dbname=orphelinat';
    $username = 'root';
    $password = getenv('');

    try{
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //getting all data from the database
        $query = "SELECT * FROM reviews where status='active' order by idreview desc limit 3";
        $stmt = $pdo->query($query);
        $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        //Afficher les utilisateurs
        if($reviews){
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
            foreach($reviews as $rows){
                $timeto=$rows['create_at'];
                $string=strip_tags($rows['description']);
                if(strlen($string)>55):
                $stringcut=substr($string,0,100);
                $endpoint=strrpos($stringcut,' ');
                $string=$endpoint?substr($stringcut,0,$endpoint):substr($stringcut,0);
                $string.='...';
                endif;
                ?>
<?php
    $id=$rows['idreview'];
    $encrypte_1=(($id));
    $link="review_detail.php?itsmyraview=".urlencode(base64_encode($encrypte_1));
?>
<div class="col-sm-4 mb-3 mb-sm-0">
    <div class="card text-bg-dark mb-3" style="max-width: 18rem;">
        <div class="card-header">
            <small>posté il ya : <?php echo timetoget($timeto); ?></small>
            <?php
            if($rows['note']==1){
                ?>
            <span>
                <small class="btn btn-danger" style="font-size:10px;">note: <?php echo $rows['note']; ?>/5</small>
                <span style="font-size:12px;">fake opinion</span>
            </span>
            <?php
               }elseif($rows['note']==2){
                ?>
            <span>
                <small class="btn btn-danger" style="font-size:10px;">note: <?php echo $rows['note']; ?>/5</small>
                <span style="font-size:12px;">bad</span>
            </span>
            <?php
               }elseif($rows['note']==3){
                ?>
            <span>
                <small class="btn btn-success" style="font-size:10px;">note: <?php echo $rows['note']; ?>/5</small>
                <span style="font-size:12px;">good</span>
            </span>
            <?php
               }elseif($rows['note']==4){
                ?>
            <span>
                <small class="btn btn-success" style="font-size:10px;">note: <?php echo $rows['note']; ?>/5</small>
                <span style="font-size:12px;">very good</span>
            </span>
            <?php
               }else{
                ?>
            <span>
                <small class="btn btn-success" style="font-size:10px;">note: <?php echo $rows['note']; ?>/5</small>
                <span style="font-size:12px;">excellent</span>
            </span>
            <?php
               }
               ?>
        </div>
        <div class="card-body" style="height:200px;">
            <p class="card-text" style="font-size:14px;">
                " <?php echo $string;?> "
            </p>
        </div>
        <div class="card-footer">
            <small class="card-title" style="font-size:12px;">Par: <?php echo $rows['name']; ?></small>
        </div>
    </div>
</div>
<?php
             }
        }else{
           ?>
<small class="alert alert-dark">Aucun avis n'a été aprouvé par l'administrateur</small>
<?php
        }
      
}
catch(PDOException $e){
    ?>
<small class="alert alert-dark">oups veuillez patientez</small>
<?php
}
}
//delete a particular temoignage in the datebase
public function deleteReviews(){
    $dsn = 'mysql:host=localhost;dbname=orphelinat';
    $username = 'root';
    $password = getenv('');

    try{
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //delete a singlr employe

        if(isset($_POST['delete_one_review'])){
          $idreview=$_POST['idreview'];
          if(empty($idreview)){
            echo"<span class='alert alert-danger'>oups revenez plus tard</span>";
        }else{
            $query ="DELETE FROM reviews where idreview='$idreview'";
            $stmt = $pdo->query($query);
            if($stmt){
                echo"<span class='alert alert-success'>vous venez d'effacer un temoignage</span>";
            }else{
                echo"<span class='alert alert-success'>impossible de supprimer cet  temoignage pour le moment</span>";
            }
    }
        }
        }
catch(PDOException $e){
    echo"<span class='alert alert-success'>impossible de supprimer cet  temoignage pour le moment revenez plus tard</span>";
}
}
//delete all temoignages in the datebase
public function deleteallReview(){
    $dsn = 'mysql:host=localhost;dbname=orphelinat';
    $username = 'root';
    $password = getenv('');

    try{
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //delete all  employe

        if(isset($_POST['deleteallreview'])){
            $query ="DELETE FROM reviews";
            $stmt = $pdo->query($query);
            if($stmt){
                $truncate="TRUNCATE TABLE reviews";
                $statment=$pdo->query($truncate);
                if($statment){
                    echo"<span class='alert alert-success'>vous venez d'effacer tout les temoignages</span>";
                }else{
                    echo"<span class='alert alert-success'>impossible de supprimer tout les temoignages pour le moment</span>";
                }
            }else{
                echo"<span class='alert alert-success'>impossible de supprimer tout les temoignages pour le moment</span>";
            }
    }
}
catch(PDOException $e){
    echo"<span class='alert alert-success'>impossible de supprimer les temoignages pour le moment revenez plus tard</span>";
}
}
//function of counting number of employé in the database:
public function countreviewRow(){
    $dsn = 'mysql:host=localhost;dbname=orphelinat';
    $username = 'root';
    $password = getenv('');
       
    try{
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql="SELECT COUNT(*) FROM reviews";
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