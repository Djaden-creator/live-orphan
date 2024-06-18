<?php
session_start();
  $dsn = 'mysql:host=localhost;dbname=orphelinat';
  $username = 'root';
  $password = getenv('');

 try{
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if (isset($_POST['action'])){         
            $sql="SELECT * FROM adoption WHERE  decision='Rejeté'";
            $stmt = $pdo->query($sql);
            $child = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($child){
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
                ?>
<div class="d-flex p-1 grid gap-1">
    <h6 class="border-bottom pb-2 mb-0">Toute les demandes encours</h6>
    <button class="btn btn-danger deleteallrejet" style="position: relative;margin:auto;">vider la liste</button>
</div>

<?php
                foreach($child as $rows){
                    $timeto=$rows['create_at'];
                   ?>
<div class="d-flex text-body-secondary pt-3">
    <span class="mai-download"></span>
    <p class="pb-3 mb-0 small lh-sm border-bottom">
        <strong class="d-block text-gray-dark">
            N° de reference: <?php  echo $rows['reference']?> <small class="text-dark-emphasis font-size-sm"> il ya:
                <?php  echo timetoget($timeto)?> </small><small class="bg-black"
                style="padding:2px;border-radius:3px;color:whitesmoke"><?php  echo ($rows['decision'])?></small>
        </strong>
        <span><?php  echo ($rows['message'])?></span>
    </p>
</div>

<?php
               }
           }else{
               echo"la liste des demandes rejetées est vide...";
           }
       }else{
           echo'ouppps revenez plus tard';
       }
    }
 catch(PDOException){
echo"erreur data base";
 }