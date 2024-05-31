<?php
 $dsn = 'mysql:host=localhost;dbname=orphelinat';
 $username = 'root';
 $password = getenv('');

 try{
     $pdo = new PDO($dsn, $username, $password);
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $id=$_GET['itsmyraview'];
     $data=$_GET['itsmyraview']=base64_decode((urldecode($id)));
     $encrypte_2=($data);
     //getting all data from the database
     $query ="SELECT * FROM reviews where idreview='$encrypte_2'";
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
                <h1>Poster par,<?php echo $rows['name'];?>
                    <span style="font-size:12px;">
                        <?php echo timeAction($create)?>
                    </span>
                </h1>
                <span style="font-size:12px;"><?php echo $rows['email'];?></span>
                <p class="text-grey mb-4"><?php echo $rows['description'];?></p>
                <?php
                   if($rows['note']==1){
                    ?>
                <span>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <span>20% a very very fake opinion</span>
                </span>
                <?php
                   }elseif($rows['note']==2){
                    ?>
                <span>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <span>40% fake point opinion</span>
                </span>
                <?php
                   }elseif($rows['note']==3){
                    ?>
                <span>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <span>60% good point</span>
                </span>
                <?php
                   }elseif($rows['note']==4){
                    ?>
                <span>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <span>80% very good</span>
                </span>
                <?php
                   }else{
                    ?>
                <span>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <span>100% excellent, much good point</span>
                </span>
                <?php
                   }
                ?>
                <br><br>
                <?php
              if($rows['status']=='nonactive'){
            ?>
                <button value="<?php echo $rows['idreview']?>" class="btn btn-danger nonactive">nonactive</button>
                <?php
              }else{
                ?>
                <button class="btn btn-success activerreview" value="<?php echo $rows['idreview']?>">active</button>
                <?php
              }
            ?>
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
        <h1 class="text-center wow fadeInUp ">Latest Reviews</h1>
        <div class="row page-section">
            <!-- here to fetch all the reviews -->
            <?php
             require_once '../functions/reviewClass.php';
             $review= new reviewClass();
             $review->getReviewall();
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