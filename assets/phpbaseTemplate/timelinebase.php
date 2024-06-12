<?php
if(!isset($_SESSION['idUser'])){
header('location:login.php');
}else{
    ?>

<div class="page-section">
    <div class="container">
        <div class="d-flex justify-content-center">
            <form action="" class="d-flex" style="width: 100%;">
                <input type="search" class="form-control mesearch" id="searchfiled"
                    placeholder="search by  the age or name" style="border-radius: 30px;">
            </form>
        </div>
        <div>
            <span style="padding: 10px 20px; font-size: 15px;" id="countrows"></span>
        </div>
    </div>
</div>
<div class="container ">
    <h1 class=" text-center display-4">Help me,i'am an orphan! choose me</h1>
    <div class="row" id="fetchere">
        <!-- get all children here  -->
        <?php
          require_once '../functions/childClass.php';
          $child= new babiesClass();
          $child ->getChildrenforUser();
        ?>
        <!-- get all children here  -->
    </div>
</div>
<div class="page-section banner-home bg-image mt-5" style="background-image: url(../img/banner-pattern.svg);">
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
<!-- .banner-home -->

<?php
}

?>