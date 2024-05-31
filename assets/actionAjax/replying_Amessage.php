<?php
$dsn = 'mysql:host=localhost;dbname=orphelinat';
$username = 'root';
$password = getenv('');

try{
$pdo = new PDO($dsn, $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if(isset($_POST['save'])){
$idmessage = $_POST['idmessage'];
$usersender = $_POST['usersender'];
$ecrire = $_POST['ecrire'];
if(empty($ecrire)){
   echo "ce champ ne doit pas etre vide" ;
}else{
    $sqlinsert="INSERT INTO `messageback`(`idmessage`, `message`, `createdAt`, `idUser`, `user_check`) VALUES (:idmessage,:ecrire,NOW(),:usersender,'non')";

    $statement=$pdo->prepare($sqlinsert);
    $statement->bindParam(':idmessage',$idmessage);
    $statement->bindParam(':ecrire',$ecrire);
    $statement->bindParam(':usersender',$usersender);
    if($statement->execute()){
        $updatemessage="UPDATE message SET status='read' WHERE idmessage=:idmessage";
        $state=$pdo->prepare($updatemessage);
        $state->bindParam(':idmessage',$idmessage);
        if($state->execute()){

            $sql="SELECT * FROM message WHERE idmessage='$idmessage'";
           $stmt = $pdo->query($sql);
           $child = $stmt->fetchAll(PDO::FETCH_ASSOC);
           if($child){
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
<strong class="mb-1" style="font-size:13px;"><?php echo $rows['email']; ?></u></strong>,
<strong class="mb-1" style="font-size:13px;">
    reference du demande:<u><?php echo $rows['reference_number']; ?></u>
</strong>,
<strong class="mb-1" style="font-size:13px;">
    numero du compte:<u><?php echo $rows['idUser']; ?></u>
</strong>
<strong class="mb-1 bg-success" style="font-size:10px;padding:4px;color:white;border-radius:4px;">
    Nb:ce message e été repondu avec success
</strong>

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
    <?php echo getTime($gettime);?>
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
    
        }
                    }
                }
}

    }}}
    catch(PDOException $e){
        ?>
<small class="alert alert-danger">le systeme ne repond pas pour le moment</small>
<?php

    }