<?php
 $dsn = 'mysql:host=localhost;dbname=orphelinat';
 $username = 'root';
 $password = getenv('');

 try{
     $pdo = new PDO($dsn, $username, $password);
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $id=$_GET['thisthedetail'];
     $data=$_GET['thisthedetail']=base64_decode((urldecode($id)));
     $encrypte_2=($data);
     //getting all data from the database
     $query = "SELECT * FROM children where idChild=$encrypte_2";
     $stmt = $pdo->query($query);
     $child = $stmt->fetchAll(PDO::FETCH_ASSOC);

     if($child){
        foreach($child as $rows){
            $dateOfBirth = $rows['date'];
            $today = date("Y-m-d");
            $diff = date_diff(date_create($dateOfBirth), date_create($today));

             //get time
             $create=$rows['entre'];
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
<br>
<div class="container ">
    <h1 class="text-center wow fadeInUp "><?php echo $rows['name'] ?></h1>
    <div class="row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="card">
                <img src="<?php echo $rows['photos'] ?>" class="img-fluid"
                    style="height: 450px;width: 640%; object-fit: cover;" alt="...">
                <div class="text-center" style="margin: 10px;">
                    <?php
              if($diff->format('%y') <= 6){
                ?>
                    <div class="text-center align-content-center justify-content-center" style="background-color:#d94350;height:60px;width:60px;border-radius:30px;position:
            relative;margin-top:-40px;border:solid 3px white;">
                        <span class="mai-star" title="youngest" style="font-size:20px;color:white;"></span>
                    </div>

                    <?php
              }elseif($diff->format('%y') >6 && $diff->format('%y') <=10 ){
                ?>
                    <div class="text-center align-content-center justify-content-center" style="background-color:#d94350;height:60px;width:60px;border-radius:30px;position:
            relative;margin-top:-40px;border:solid 3px white;">
                        <span class="mai-arrow-up" title="younger" style="font-size:20px;color:white;"></span>
                    </div>

                    <?php
              }elseif($diff->format('%y') >10 && $diff->format('%y') <=18){
                ?>
                    <div class="text-center align-content-center justify-content-center" style="background-color:#d94350;height:60px;width:60px;border-radius:30px;position:
            relative;margin-top:-40px;border:solid 3px white;">
                        <span class="mai-thunderstorm" title="younger" style="font-size:20px;color:white;"></span>
                    </div>
                    <?php
              }else{
                ?>
                    <div class="text-center align-content-center justify-content-center" style="background-color:#d94350;height:60px;width:60px;border-radius:30px;position:
            relative;margin-top:-40px;border:solid 3px white;">
                        <span class="mai-arrow-down" title="younger" style="font-size:20px;color:white;"></span>
                    </div>
                    <?php
              }
            ?>
                    <h5 style="font-size: 12px;font-style: bold;"><?php echo $rows['name'] ?></h5>
                    <h5 style="font-size: 12px;font-style: bold;">
                        <?php echo $diff->format('%y'); ?> ans,<?php echo $rows['pays'] ?></h5>

                    <button class="btn btn-primary" style="font-size:10px;">status:disponible</button>
                </div>
            </div>
        </div>
        <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="d-flex p-1" style="column-gap:8px;">
                <span
                    style="background-color:rgb(101, 100, 100); color: white;padding: 5px;font-size: 15px;border-radius: 10px;">
                    age:<?php echo $diff->format('%y'); ?>
                </span>
                <span
                    style="background-color: rgb(101, 100, 100); color: white;padding: 5px;font-size: 15px;border-radius: 10px;">
                    genre:<?php echo $rows['sex']; ?>
                </span>
                <span
                    style="background-color: rgb(101, 100, 100); color: white;padding: 5px;font-size: 15px;border-radius: 10px;">
                    pays:<?php echo $rows['pays']; ?>
                </span>
            </div>
            <p style="font-size: 13px;color:rgb(78, 77, 77) ; padding: 10px 20px;">n publishing and graphic design,
                Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a
                typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the
                final
                copy is available
            </p>
            <p style="font-size: 13px;color:rgb(78, 77, 77) ; padding: 10px 20px;">Enregistré il
                ya:<?php echo timeAction($create); ?></p>
            <?php
                   $query1 ="SELECT * FROM adoption where idchild=$encrypte_2";
                   $stmt1 = $pdo->query($query1);
                   $child1 = $stmt1->fetchall(PDO::FETCH_ASSOC);
              
                   if($child1){
                    foreach($child1 as $rows1){
                        if($rows1['decision']=='Rejeté'){
                            ?>
            <div class="idchildhere<?php echo $rows['idChild']; ?>">
                <button class="btn btn-danger" id="idchildhere" style="font-size:10px;"
                    title="cet(te) enfant est reprenable" value="<?php echo $rows['idChild']; ?>">Adopter?</button>
            </div>
            <?php
                        }
                        elseif($rows1['decision']=='encours'||$rows1['decision']=='en avance'){
                            ?>
            <small class="alert alert-danger" style="font-size:12px;">impossible de faire une deuxieme demande</small>
            <?php
                        }
                        elseif($rows1['decision']=='Accepté'){
                            ?>
            <small class="alert alert-danger" style="font-size:12px;">cet(te) enfant a été deja adopté</small>
            <?php
                        }
                        
                        else{
                            ?>
            <div class="idchildhere<?php echo $rows['idChild']; ?>">
                <button class="btn btn-primary" id="idchildhere" style="font-size:10px;"
                    value="<?php echo $rows['idChild']; ?>">Adopter?</button>
            </div>
            <?php
                           }
                        ?>

            <?php
                    }
                        }
                           else{
                            ?>
            <div class="idchildhere<?php echo $rows['idChild']; ?>">
                <button class="btn btn-primary" id="idchildhere" style="font-size:10px;"
                    value="<?php echo $rows['idChild']; ?>">Adopter?</button>
            </div>
            <?php
                           }
                ?>


            <!-- here the notification for adoption -->
            <div style="padding: 20px;" id="notificationforadoption<?php echo $rows['idChild']; ?>"></div>
            <!-- here the notification for adoption -->
            <div class="main-form" id="myformtohide<?php echo $rows['idChild']; ?>">
                <!-- here will appear the form  -->
            </div>
        </div>
    </div>
</div>
<?php
            
} 
} else{
    echo "erreur";
}
}
catch(PDOException $e){
echo "error";
}

?>

<!-- .liste of kids -->
<div class="page-section">
    <div class="container">
        <h1 class="text-center wow fadeInUp ">Our Child for you</h1>
        <div class="row page-section">
            <!-- here the children -->
            <?php
               require_once'../functions/childClass.php';
               $child= new babiesClass();
               $child->getChildrenforUser();
            ?>
            <!-- here the children -->
        </div>
    </div>
</div>

<!-- .list of kids -->

<div class="page-section banner-home bg-image " style="background-image: url(../img/banner-pattern.svg); ">
    <div class="container py-5 py-lg-0 ">
        <div class="row align-items-center ">
            <div class="col-lg-4 wow zoomIn ">
                <div class="img-banner d-none d-lg-block ">
                    <img src="../img/mobile_app.png " alt=" ">
                </div>
            </div>
            <div class="col-lg-8 wow fadeInRight ">
                <h1 class="font-weight-normal mb-3 ">Get easy access of all features using One Health Application</h1>
                <a href="#"><img src="assets/img/google_play.svg " alt=" "></a>
                <a href="#" class="ml-2"><img src="../img/app_store.svg" alt=""></a>
            </div>
        </div>
    </div>
</div>
<!-- .banner-home -->