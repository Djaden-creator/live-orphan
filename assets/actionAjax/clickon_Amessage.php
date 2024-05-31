<?php
session_start();
  $dsn = 'mysql:host=localhost;dbname=orphelinat';
  $username = 'root';
  $password = getenv('');

 try{
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if (isset($_POST['save'])){
      
           $idmessage=$_POST['idmessage'];
           $user_id=$_POST['user_id'];
           $sql="SELECT * FROM message WHERE idUser='$user_id' order by idmessage desc";
           $stmt = $pdo->query($sql);
           $child = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
<label class="list-group-item rounded-3 mt-2" id="tall<?php echo $rows['idmessage']; ?>">
    <strong class="mb-1" style="font-size:13px;"><?php echo $rows['email']; ?></u></strong>,
    <strong class="mb-1" style="font-size:13px;">
        reference du demande:<u><?php echo $rows['reference_number']; ?></u>
    </strong>,
    <strong class="mb-1" style="font-size:13px;">
        numero du compte:<u><?php echo $rows['idUser']; ?></u>
    </strong>
    <?php
     if($rows['status']=='unread'){
?>
    <strong class="mb-1" style="font-size:10px; background-color:brown;padding:4px;color:white;border-radius:4px;">
        Nb:vous devez repondre a cet message
    </strong>
    <?php
     }else{
        ?>
    <strong class="mb-1 bg-success" style="font-size:10px;padding:4px;color:white;border-radius:4px;">
        Nb:ce message e été repondu avec success
    </strong>
    <?php 
     }
    
    ?>

    <span class="d-block small opacity-50 mt-1">
        <?php echo $rows['description']; ?>
    </span>
    <?php
    if($rows['status']!=='read'){
    ?>
    <button class="btn btn-primary btn-sm mt-1" id="satisfaction" value="<?php echo $rows['idmessage']; ?>"
        style="font-size:10px;">reply</button>
    <div id="showformreplyuser<?php echo $rows['idmessage']; ?>" style="padding:5px;">
        <!-- here to show the form of user replying -->
    </div>
    <?php
    }else{
        $sql="SELECT * FROM messageback WHERE idmessage=".$rows['idmessage']."";
        $stmt = $pdo->query($sql);
        $child = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($child){
            date_default_timezone_set('Europe/Paris');
            
            foreach($child as $ro){
                $gettime=$ro['createdAt'];
                ?>
    <small class="bg-dark p-1" style="border-radius:2px;color:white;">ce message a été repondu il ya
        <?php echo getTime($gettime); ?>
    </small>
    <br>
    <button class="btn-info mt-2 voirmareponse" style="font-size:10px;" value="<?php echo $ro['id'] ?>">voir ma
        reponse</button>
    <div>
        <div id="voirreponse<?php echo $ro['id'] ?>">
            <!-- ici apparait la reponse de l admin sur une message particulier -->
            <!-- ici apparait la reponse de l admin sur une message particulier -->
        </div>
    </div>

    <?php
            }
        }
    }
    ?>

</label>
<?php
               }
           }else{
               echo"vous ne pouvez pas faire une demane pour le moment";
           }
       }else{
           echo'ouppps revenez plus tard';
       }
    }
 catch(PDOException){
echo"erreur data base";
 }