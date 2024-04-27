<?php
ob_start();
class Message{
//function of counting number of messages in the database:
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

//fetch messages

public function getMessage(){
    $dsn = 'mysql:host=localhost;dbname=orphelinat';
    $username = 'root';
    $password = getenv('');

    try{
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //getting all data from the database
        $query = "SELECT * FROM message where status='unread'";
        $stmt = $pdo->query($query);
        $child = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        //Afficher les message
        if($child){
            foreach($child as $rows){
                 //get time
             $create=$rows['create_at'];
             date_default_timezone_set('Europe/Paris');
  function timeAction($create){
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
                ?>
<div class="card">
    <div class="card-header">
        <span class="text-danger">new</span> <small style="font-size:10px;"> il
            ya:<?php echo timeAction($create); ?></small>
    </div>
    <div class="card-body">
        <h5 class="card-title" style="font-size:12px;"><?php echo $rows['email']?></h5>
        <p class="card-text"><?php echo $rows['description']?></p>
        <form action="" method="post">
            <input type="hidden" name="idmess" value="<?php  echo $rows['idmessage']?>">
            <button class="btn btn-info" name="submitit">repondu?</button>
        </form>

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