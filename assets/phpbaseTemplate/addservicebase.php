<div class="page-section">
    <div class="container">
        <h1 class="text-center wow fadeInUp">Add a New service</h1>
        <div style="display:flex;justify-content:center">
            <?php
            require_once '../functions/serviceClass.php';
               $serviceclass= new serviceClass();
               $serviceclass->serviceAdd();
            ?>
        </div>

        <form method="post" class="main-form">
            <div class="row mt-5 ">
                <div class="col-12 py-2 wow fadeInLeft">
                    <input type="text" name="type" class="form-control" placeholder="nom du service">
                </div>
                <div class="col-12 py-2 wow fadeInRight">
                    <textarea type="text" name="description" class="form-control" placeholder="description"></textarea>
                </div>
            </div>
            <button type="submit" name="service" class="btn btn-primary mt-3 wow zoomIn">Add now</button>
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