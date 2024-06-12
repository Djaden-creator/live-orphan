<?php
if(!isset($_SESSION['idUser'])){
header('location:login.php');
}else{
    ?>
<div class="page-section">
    <div class="container">
        <h1 class="text-center wow fadeInUp">Add a New Employee</h1>
        <?php
            require_once '../functions/teamClass.php';
               $teamclass= new teamClass();
               $teamclass->teamAdd();
            ?>
        <form method="post" class="main-form" enctype="multipart/form-data">
            <div class="row mt-5 ">
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                    <input type="text" name="name" class="form-control" placeholder="Full name">
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                    <input type="email" name="email" class="form-control" placeholder="Email address..">
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                    <input type="date" name="dob" class="form-control" placeholder="birthday..">
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                    <input type="text" name="tel" class="form-control" placeholder="Portable">
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                    <input type="text" name="adresse" class="form-control" placeholder="Adresse">
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                    <select name="poste" id="departement" class="custom-select">
                        <option>poste occuper</option>
                        <option value="managere">managere</option>
                        <option value="directeur adjoint">directeur adjoint </option>
                        <option value="charger de communication">charger de communication</option>
                        <option value="financier">financier</option>
                    </select>
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                    <input type="file" name="photo" class="form-control myInput">
                </div>
            </div>
            <button type="submit" name="create" class="btn btn-primary mt-3 wow zoomIn">Add now</button>
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
<?php
}