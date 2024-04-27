<div class="page-section">
    <div class="container">
        <h1 class="text-center wow fadeInUp">Edit Employee</h1>
        <form method="post" class="main-form">
            <?php
             require_once '../functions/teamClass.php';
             $teamclass= new teamClass();
             $teamclass->editEmploye();
             ?>
            <?php
               $id=$_GET['yourskin'];
               $data=$_GET['yourskin']=base64_decode((urldecode($id)));
               $encrypte_2=($data);
               $query = "SELECT * FROM teams where idTeam=$encrypte_2";
               $stmt = $pdo->query($query);
               $teams = $stmt->fetchAll(PDO::FETCH_ASSOC);
          
                  foreach($teams as $rows){
                      ?>
            <div class="row mt-5 ">
                <input type="hidden" name="iduser" value="<?php echo $encrypte_2;?>">
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                    <input type="text" name="name" class="form-control" value="<?php echo $rows['nom']?>">
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                    <input type="email" name="email" class="form-control" value="<?php echo $rows['email']?>">
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                    <input type="date" name="dob" class="form-control" value="<?php echo $rows['dob']?>">
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                    <input type="text" name="tel" class="form-control" value="<?php echo $rows['portable']?>">
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                    <input type="text" name="adresse" class="form-control" value="<?php echo $rows['adresse']?>">
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                    <select name="poste" id="departement" class="custom-select">
                        <option value="<?php echo $rows['poste']?>"><?php echo $rows['poste']?></option>
                        <option value="managere">managere</option>
                        <option value="directeur adjoint">directeur adjoint </option>
                        <option value="charger de communication">charger de communication</option>
                        <option value="financier">financier</option>
                    </select>
                </div>
            </div>
            <button type="submit" name="edit" class="btn btn-primary mt-3 wow zoomIn">Edit now</button>
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