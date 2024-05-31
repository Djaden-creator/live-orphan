<?php
ob_start();
class Message{
//function of counting number of messages in the database for the admi,only:
public function countMess(){
    $dsn = 'mysql:host=localhost;dbname=orphelinat';
    $username = 'root';
    $password = getenv('');
       
    try{
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql="SELECT COUNT(*) FROM message where status='unread'";
        $res = $pdo->query($sql);
        $count = $res->fetchColumn();
        if($count){
            ?>
<span class="mai-chatbubble"
    style="background-color:brown;padding:5px 5px;border-radius: 15px;font-size:12px;color:white;">
    <?php echo $count; ?>
</span>
<?php
           
        }
    }catch(PDOException $e){
        ?>
<div style="background-color:#d94350;display:flex;justify-content:center; align-items:center;
            border-radius:5px;padding:10px 20px;">
    <h5 style="color: #f2f2f2;font-size:18px">
        ouff nous ne pouvons pas compter le messages non lus
    </h5>
</div>
<?php
    }
}

//function of counting number of messages in the database for the particular user:
    public function countMessforUser(){
        $dsn = 'mysql:host=localhost;dbname=orphelinat';
        $username = 'root';
        $password = getenv('');
           
        try{
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            $sql="SELECT COUNT(*) FROM messageback where idUser=".$_SESSION['idUser']." AND user_check='non'";
            $res = $pdo->query($sql);
            $count = $res->fetchColumn();
            if($count){
                ?>
<span class="mai-chatbubble"
    style="background-color:brown;padding:5px 5px;border-radius: 15px;font-size:12px;color:white;">
    <?php echo $count;?>
</span>

<?php
            }
           
        }catch(PDOException $e){
            ?>
<div style="background-color:#d94350;display:flex;justify-content:center; align-items:center;
                border-radius:5px;padding:10px 20px;">
    <h5 style="color: #f2f2f2;font-size:18px">
        ouff nous ne pouvons pas compter le messages non lus
    </h5>
</div>
<?php
        }
    }
//function of counting number of messages in the database for a particular user:
    public function countMessageUser(){
        $dsn = 'mysql:host=localhost;dbname=orphelinat';
        $username = 'root';
        $password = getenv('');
           
        try{
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            $sql="SELECT COUNT(*) FROM message where status='read' and idUser=".$_SESSION['idUser']."";
            $res = $pdo->query($sql);
            $count = $res->fetchColumn();
            echo $count;
        }catch(PDOException $e){
            ?>
<div style="background-color:#d94350;display:flex;justify-content:center; align-items:center;
                border-radius:5px;padding:10px 20px;">
    <h5 style="color: #f2f2f2;font-size:18px">
        ouff nous ne pouvons pas compter le messages non lus
    </h5>
</div>
<?php
        }
    }
//fetch the new message unread one
public function getMessage(){
    $dsn = 'mysql:host=localhost;dbname=orphelinat';
    $username = 'root';
    $password = getenv('');

    try{
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //getting all data from the database
        $query = "SELECT DISTINCT idUser from `message` order by idmessage desc";
        $stmt = $pdo->query($query);
        $child = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        //Afficher les message
        if($child){
            date_default_timezone_set('Europe/Paris');
            function getTime($gettime){
                $time_ago=strtotime($gettime);
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
foreach($child as $rows){
?>
<button class="list-group-item list-group-item-action py-3 lh-sm clickonAmessage" style="border:none;outline:1px;"
    value="<?php echo $rows['idUser']; ?>">
    <?php
     $query1 = "SELECT DISTINCT idmessage FROM `message` WHERE idUser=".$rows['idUser']." ORDER BY idmessage desc limit 1";
     $stmt1 = $pdo->query($query1);
     $child1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
     if($child1){
        foreach($child1 as $row1){
            ?>
    <input type="hidden" id="idmessage" value="<?php echo $row1['idmessage']; ?>">
    <?php
        }
     }
    ?>
    <input type="hidden" id="idmessage" value="">
    <div class="d-flex w-100 align-items-center justify-content-between">
        <?php
     $query2 = "SELECT DISTINCT name,reference_number,create_at from `message` WHERE idUser=".$rows['idUser']." order by idmessage desc limit 1";
     $stmt2 = $pdo->query($query2);
     $child2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
     if($child2){
        foreach($child2 as $row2){
            $gettime=$row2['create_at'];
            ?>
        <strong class="mb-1" style="font-size:13px;">
            Name:<?php echo $row2['name']; ?>, N° ref:<u><?php echo $row2['reference_number']; ?></u>
        </strong>
        <small style="font-size:10px;"><?php echo getTime($gettime) ?></small>
        <?php
        }
     }
    ?>
    </div>
    <div class="d-flex">
        <?php
     $query3 = "SELECT DISTINCT description from `message` WHERE idUser=".$rows['idUser']." order by idmessage desc limit 1";
     $stmt3 = $pdo->query($query3);
     $child3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
     if($child3){
        foreach($child3 as $row3){

        $string=strip_tags($row3['description']);
        if(strlen($string)>55):
        $stringcut=substr($string,0,80);
        $endpoint=strrpos($stringcut,' ');
        $string=$endpoint?substr($stringcut,0,$endpoint):substr($stringcut,0);
        $string.='...';
        endif;
        ?>
        <div class="col-10 mb-1 small">
            <?php echo $string; ?>
        </div>

        <small id="numbermessage<?php echo $rows['idUser']; ?>">
            <?php
         $sql="SELECT COUNT(*) FROM message where status='unread' and idUser=".$rows['idUser']."";
         $res = $pdo->query($sql);
         $count = $res->fetchColumn();
         if($count > 0){
            ?>
            <span class="mai-chatbubble" style="background-color:#d94350;color:white;padding:6px;border-radius:5px;">
                <?php
                  echo $count;
                ?>
            </span>
            <?php
            }else{
                ?>
            <span class="mai-trophy" style="background-color:#d94350;color:white;padding:6px;border-radius:5px;">
            </span>
            <?php
                }
                ?>
        </small>

        <?php
        }
     }
    ?>
    </div>
</button>
<?php
            }
          
             }
        else{
            echo"no data found in the system";
        }
      
}
catch(PDOException $e){
    echo"error",$e ->getMessage();
}
}

//fetch the new message unread one
public function getMessageinuserSpace(){
    $dsn = 'mysql:host=localhost;dbname=orphelinat';
    $username = 'root';
    $password = getenv('');

    try{
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //getting all data from the database
        $query = "SELECT *from `messageback` where idUser=".$_SESSION['idUser']." ORDER BY id  desc";
        $stmt = $pdo->query($query);
        $child = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        //Afficher les message
        if($child){
            date_default_timezone_set('Europe/Paris');
            function getTime($create){
                $time_ago=strtotime($create);
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
            foreach($child as $rows){
                 //get time
             $create=$rows['createdAt'];
                ?>
<label class="list-group-item rounded-3 py-3" for="listGroupCheckableRadios1">

    <?php
     $querymessage = "SELECT * FROM `message` where idUser=".$_SESSION['idUser']." AND idmessage=". $rows['idmessage'] ." AND status='read' order by idmessage desc";
     $stmtmessage = $pdo->query($querymessage);
     $usermessage = $stmtmessage->fetchAll(PDO::FETCH_ASSOC);
     if($usermessage){
        date_default_timezone_set('Europe/Paris');
        foreach($usermessage as $rowuser){
            $getit=$rowuser['create_at'];
            ?>
    <span class="d-block small opacity-50 mt-1 bg-info p-2" style="border-radius:4px; color:whitesmoke;">
        <small>Me:recap <?php echo getTime($getit) ?></small>
        <p><?php echo $rowuser['description']; ?></p>
    </span>
    <?php
        }
    }
             //get time
            ?>
    <span class="d-block small opacity-50 bg-light p-2" style="border-radius:4px; color:black;">
        <button class="btn btn-primary" id="userview" style="font-size: 10px;" value="<?php echo $rows['id']; ?>">Voir
            la reponse de Team
            LiveOrphan:<?php echo getTime($create) ?></button>
        <p id="fetchreply<?php echo $rows['id']; ?>">
            <!-- here to fetch the reply of the message -->
        </p>
    </span>
    <small style="font-size:15px;padding:2px;">
        pour créé une autre question suivez ce lien <a href="../pagesPhp/contact.php">Contact us</a>
    </small>
</label>
<?php
             }
        }else{
            ?>
<small style="background-color:#d94350;padding:4px;color:whitesmoke;">
    vous avez aucune reponse de la part de Team LiveOrphan</small>
<?php
        }
      
}
catch(PDOException $e){
    echo"error",$e ->getMessage();
}
}
//modifier unread to lus

public function readTolus(){
    $dsn = 'mysql:host=localhost;dbname=orphelinat';
    $username = 'root';
    $password = getenv('');
       
    try{
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if(isset($_POST['submitit'])){
            $idmess = $_POST['idmess'];
            
            $sql="UPDATE `message` SET `status`='lu' WHERE idmessage='$idmess'";
            
            $statement=$pdo->prepare($sql);
                $statement->bindParam(':iduser',$iduser);
               if($statement->execute()){
                 ?>
<div class="btn btn-primary" style="display:flex;justify-content:center; align-items:center;
                       border-radius:5px;padding:5px;">
    <h5 style="color: #f2f2f2;font-size:18px">votre mot de passe a été modifié</h5>
</div>
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
catch(PDOException $e){
    echo"error",$e ->getMessage();
}
}
}