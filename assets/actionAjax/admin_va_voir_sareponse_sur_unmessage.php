<?php
 $dsn = 'mysql:host=localhost;dbname=orphelinat';
 $username = 'root';
 $password = getenv('');
 try{
     $pdo = new PDO($dsn, $username, $password);
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
     //Récupérer les données du formulaire de connexion
     if(isset($_POST['save'])){
         $idmessage=$_POST['idmessage'];
         $sql="SELECT * FROM messageback WHERE id='$idmessage'";
         $stmt = $pdo->query($sql);
         $child = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
                $gettime=$rows['createdAt']
                 ?>
<label class="list-group-item rounded-3 mt-2">
    <small class="mb-1" style="font-size:10px;">
        Admin il ya:<?php echo getTime($gettime); ?>
    </small>
    <br>
    <small>" <?php echo $rows['message']; ?> "</small>
    <br>
    <button class="btn-danger mt-2 closemareponse" style="font-size:10px;" value="<?php echo $rows['id'] ?>">close me
    </button>
</label>

<?php
 }}}
 catch (PDOException $e){
     echo "error:".$e->getMessage()
;
 }