<div class="page-section">
    <div class="container">
        <h1 class="text-center wow fadeInUp">Edit this Service</h1>
        <?php
            require_once '../functions/serviceClass.php';
               $serviceclass= new serviceClass();
               $serviceclass->editService();
            ?>
        <form method="post" class="main-form">
            <?php
              $id=$_GET['yourservices'];
               $data=$_GET['yourservices']=base64_decode((urldecode($id)));
               $encrypte_2=($data);
               $query = "SELECT * FROM services where idService=$encrypte_2";
               $stmt = $pdo->query($query);
               $services = $stmt->fetchAll(PDO::FETCH_ASSOC);
          
                  foreach($services as $rows){
                    ?>
            <div class="row mt-5">
                <input type="hidden" name="idservice" value="<?php echo $rows['idService']?>">
                <div class="col-12 py-2 wow fadeInLeft">
                    <input type="text" name="type" class="form-control" value="<?php echo $rows['type']?>">
                </div>
                <div class="col-12 py-2 wow fadeInRight">
                    <textarea type="text" name="description"
                        class="form-control"><?php echo $rows['description']?></textarea>
                </div>
            </div>
            <button type="submit" name="editservice" class="btn btn-primary mt-3 wow zoomIn">Edit</button>
            <?php
                  }
           ?>
        </form>
    </div>
</div>
<div class="page-section banner-home bg-image" style="background-image: url(../img/banner-pattern.svg);">
    <div class="container py-5 py-lg-0">
        <div class="row align-items-center">
            <div class="col-lg-4 wow zoomIn">
                <div class="img-banner d-none d-lg-block">
                    <img src="../img/mobile_app.png" alt="">
                </div>
            </div>
            <div class="col-lg-8 wow fadeInRight">
                <h1 class="font-weight-normal mb-3">Get easy access of all features using One Health Application</h1>
                <a href="#"><img src="../img/google_play.svg" alt=""></a>
                <a href="#" class="ml-2"><img src="../img/app_store.svg" alt=""></a>
            </div>
        </div>
    </div>
</div>