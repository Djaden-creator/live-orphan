<?php
 $dsn = 'mysql:host=localhost;dbname=orphelinat';
 $username = 'root';
 $password = getenv('');

 try{
     $pdo = new PDO($dsn, $username, $password);
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $id=$_GET['itsmyservice'];
     $data=$_GET['itsmyservice']=base64_decode((urldecode($id)));
     $encrypte_2=($data);
     //getting all data from the database
     $query ="SELECT * FROM services where idService='$encrypte_2'";
     $stmt = $pdo->query($query);
     $review = $stmt->fetchAll(PDO::FETCH_ASSOC);

     if($review){
        foreach($review as $rows){
            //get time
            $create=$rows['creer'];
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
                <h1><?php echo $rows['type'];?>
                    <span style="font-size:12px;">
                        <?php echo timeAction($create)?>
                    </span>
                </h1>
                <p class="text-grey mb-4"><?php echo $rows['description'];?></p>
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
            <!-- here to fetch all services -->
            <?php
             require_once '../functions/serviceClass.php';
             $service= new serviceClass();
             $service->getServiceforadmin();
            ?>
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
                <a href="# "><img src="../img/google_play.svg " alt=" "></a>
                <a href="# " class="ml-2 "><img src="../img/app_store.svg " alt=" "></a>
            </div>
        </div>
    </div>
</div>
<!-- .banner-home -->