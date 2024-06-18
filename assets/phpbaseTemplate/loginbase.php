<div class="page-section">
    <div class="container">
        <h1 class="text-center wow fadeInUp">Make a Connection</h1>

        <form class="main-form" method="POST">
            <?php
             require_once '../functions/login.php';
            ?>
            <div class="row mt-5">
                <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                    <input name="email" class="form-control" placeholder="Email">
                    <?php if(isset($pregmail)) echo  $pregmail;?>
                    <?php if(isset($lengsmail)) echo  $lengsmail;?>
                    <?php if(isset($maxmail)) echo $maxmail;?>
                </div>
                <div class="col-12 py-2 wow fadeInUp d-flex" data-wow-delay="300ms">
                    <input type="password" name="password" class="form-control myInput" placeholder="Password">
                </div>
                <?php if(isset($validpass)) echo  $validpass;?>
                <?php if(isset($invalipass)) echo  $invalipass;?>
                <?php if(isset($longpass)) echo $longpass;?>
                <?php if(isset($maxpass)) echo $maxpass;?>
                <div class="col-12 py-2 wow fadeInUp d-flex" data-wow-delay="300ms">
                    <input type="checkbox" onclick="myFunction()">Show Password
                </div>
            </div>
            <button type="submit" name="login" class="btn btn-primary mt-3 wow zoomIn">Connect</button>
            <a href="../pagesPhp/signup.php" style="font-size: 12px;">create an account now</a>
            <br>
            <button class="text-center wow fadeInUp startforgot"
                style="font-size: 12px;outline:none;border:none;background:none;" href="oublier.php">mot de passe
                oublié?</button>
        </form>
        <div class="main-form motdepass">
            <!-- here to get the email form for modification -->
        </div>
        <div class="main-form updatepassword">
            <!-- here to get the email form for modification -->
        </div>
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