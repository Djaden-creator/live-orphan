<?php
 $dsn = 'mysql:host=localhost;dbname=orphelinat';
 $username = 'root';
 $password = getenv('');

 try{
     $pdo = new PDO($dsn, $username, $password);
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $id=$_GET['thisdetail'];
     $data=$_GET['thisdetail']=base64_decode((urldecode($id)));
     $encrypte_2=($data);
     //getting all data from the database
     $query ="SELECT * FROM adoption where idAdoption='$encrypte_2'";
     $stmt = $pdo->query($query);
     $review = $stmt->fetchAll(PDO::FETCH_ASSOC);

     if($review){
        foreach($review as $rows){
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
<div class="page-section pb-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 lg-6 py-3 wow fadeInUp">
                <h1>Demande effectuée par,<?php echo $rows['name'];?>
                    <span style="font-size:12px;">
                        <?php echo timeAction($create)?>
                    </span>
                </h1>
                <span style="font-size:12px;">Email:<?php echo $rows['email'];?>,
                    <?php echo $rows['number'];?></span>
                <p class="text-grey mb-4"><?php echo $rows['message'];?></p>
                <h3>
                    <?php
                      if($rows['status']=="encours"){
                        echo"cette demande n'est pas encore traiteé ";
                      }elseif($rows['status']=="en progress"){
                        echo"traitement en progression 50%";
                      }elseif($rows['status']=="Accepté"){
                        echo"Felicitation votre demande a été validé et Accepté";
                      }
                      else{
                        echo"Desolé votre demande a été banni et Rejeté";
                      }
                    ?>
                </h3>
                <?php
                 $sql="SELECT * FROM  users WHERE idUser=".$rows['iduser']."";
                 $stmt = $pdo->query($sql);
                 $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
                     foreach($users  as $rowsuser){
                    ?>
                <span style="font-size:12px;">Type de compte:<?php echo $rowsuser['objectif'];?></span>
                <?php
                                     }
                               ?>

                <br><br>
                <h3>N° de reference,<mark style="background-color:aquamarine">
                        <?php echo $rows['reference'];?></mark>
                </h3>
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
        <h1 class="text-center wow fadeInUp ">Latest News</h1>
        <div class="row page-section">
            <div class="col-sm-2 mb-3 mb-sm-0">
                <div class="card">
                    <img src="../img/doctors/doctor_1.jpg" class="img-fluid"
                        style="height: 150px;width: 100%; object-fit: cover;" alt="...">
                    <div class="text-center" style="margin: 10px;">
                        <h5 style="font-size: 12px;font-style: bold;">Sandra,kiloko bolie</h5>
                        <h5 style="font-size: 12px;font-style: bold;">age:10 ans,congo</h5>

                        <a href="detail.html" class="btn btn-primary">disponible</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-2 mb-3 mb-sm-0">
                <div class="card">
                    <img src="../img/afrca.jpg" class="img-fluid" style="height: 150px;width: 100%; object-fit: cover;">
                    <div class="text-center" style="margin: 10px;">
                        <h5 style="font-size: 12px;font-style: bold;">Sandra,kiloko bolie</h5>
                        <h5 style="font-size: 12px;font-style: bold;">age:10 ans,congo</h5>

                        <a href="#" class="btn btn-primary">indisponible</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-2 mb-3 mb-sm-0">
                <div class="card">
                    <img src="../img/doctors/doctor_1.jpg" class="img-fluid"
                        style="height: 150px;width: 100%; object-fit: cover;" alt="...">
                    <div class="text-center" style="margin: 10px;">
                        <h5 style="font-size: 12px;font-style: bold;">Sandra,kiloko bolie</h5>
                        <h5 style="font-size: 12px;font-style: bold;">age:10 ans,congo</h5>

                        <a href="#" class="btn btn-primary">disponible</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-2 mb-3 mb-sm-0">
                <div class="card">
                    <img src="../img/afrca.jpg" class="img-fluid" style="height: 150px;width: 100%; object-fit: cover;">
                    <div class="text-center" style="margin: 10px;">
                        <h5 style="font-size: 12px;font-style: bold;">Sandra,kiloko bolie</h5>
                        <h5 style="font-size: 12px;font-style: bold;">age:10 ans,congo</h5>

                        <a href="#" class="btn btn-primary">indisponible</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-2 mb-3 mb-sm-0">
                <div class="card">
                    <img src="../img/doctors/doctor_1.jpg" class="img-fluid"
                        style="height: 150px;width: 100%; object-fit: cover;" alt="...">
                    <div class="text-center" style="margin: 10px;">
                        <h5 style="font-size: 12px;font-style: bold;">Sandra,kiloko bolie</h5>
                        <h5 style="font-size: 12px;font-style: bold;">age:10 ans,congo</h5>

                        <a href="#" class="btn btn-primary">disponible</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-2 mb-3 mb-sm-0">
                <div class="card">
                    <img src="../img/afrca.jpg" class="img-fluid" style="height: 150px;width: 100%; object-fit: cover;">
                    <div class="text-center" style="margin: 10px;">
                        <h5 style="font-size: 12px;font-style: bold;">Sandra,kiloko bolie</h5>
                        <h5 style="font-size: 12px;font-style: bold;">age:10 ans,congo</h5>

                        <a href="#" class="btn btn-primary">indisponible</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- .list of kids -->

<div class="page-section banner-home bg-image " style="background-image: url(../assets/img/banner-pattern.svg); ">
    <div class="container py-5 py-lg-0 ">
        <div class="row align-items-center ">
            <div class="col-lg-4 wow zoomIn ">
                <div class="img-banner d-none d-lg-block ">
                    <img src="assets/img/mobile_app.png " alt=" ">
                </div>
            </div>
            <div class="col-lg-8 wow fadeInRight ">
                <h1 class="font-weight-normal mb-3 ">Get easy access of all features using One Health Application</h1>
                <a href="# "><img src="assets/img/google_play.svg " alt=" "></a>
                <a href="# " class="ml-2 "><img src="assets/img/app_store.svg " alt=" "></a>
            </div>
        </div>
    </div>
</div>
<!-- .banner-home -->