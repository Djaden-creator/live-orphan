<?php
session_start();
  $dsn = 'mysql:host=localhost;dbname=orphelinat';
  $username = 'root';
  $password = getenv('');

 try{
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if (isset($_POST['action'])){
            $iddemande=$_POST['iddemande'];
           $sql="SELECT * FROM adoption WHERE idAdoption='$iddemande'";
           $stmt = $pdo->query($sql);
           $adoption = $stmt->fetchAll(PDO::FETCH_ASSOC);
           if($adoption){
               foreach($adoption as $rows){
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
<div class="bg-light" style="padding:10px;border-radius:5px;font-size:12px;color:dark;">
    <h1 style="font-size:12px;">demande fait il ya : <?php echo timeAction($create);?></h1>
    <!-- here we are geting the infomation of child -->
    <?php
     $sql="SELECT * FROM children WHERE idChild=".$rows['idchild']."";
     $stmtment = $pdo->query($sql);
     $resultchild =  $stmtment->fetchAll(PDO::FETCH_ASSOC);
     if($resultchild){
         foreach($resultchild as $childrow){
            $dateOfBirth = $childrow['date'];
            $today = date("Y-m-d");
            $diff = date_diff(date_create($dateOfBirth), date_create($today));
          ?>
    <h1 style="font-size:12px;">enfant :<?php echo $childrow['name'];?>,
        <?php echo $diff->format("%y%");?> ans
    </h1>
    <h1 style="font-size:12px;">sex d'enfant: <?php echo $childrow['sex'];?>,pays:<?php echo $childrow['pays'];?></h1>
    <?php
         }
        }
    ?>
    <!-- here we are geting the infomation of child end-->

    <!-- here we are geting the infomation of of the parent foster -->
    <?php
     $sql="SELECT * FROM users WHERE idUser=".$rows['iduser']."";
     $stmuser = $pdo->query($sql);
     $resultuser =$stmuser->fetchAll(PDO::FETCH_ASSOC);
     if($resultuser){
         foreach($resultuser as $userrow){
            $dateOfBirth = $userrow['dbd'];
            $today = date("Y-m-d");
            $diff = date_diff(date_create($dateOfBirth), date_create($today));
          ?>
    <h1 style="font-size:12px;">parent foster :<?php echo $rows['name'];?>,
        <?php echo $diff->format("%y%");?> ans
    </h1>
    <?php
         }
        }
    ?>
    <h1 style="font-size:12px;">compte demandeur :<?php echo $_SESSION['name'];?>,
        <?php echo $diff->format("%y%");?> ans
    </h1>
    <!-- here we are geting the infomation of of the parent foster end -->

    <button id="closethisdetail" value="<?php echo $rows['idAdoption'];?>"
        style="background-color:black;border:none;outline:none; color:white;border-radius:4px; font-size:12px;">close</button>
</div>

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