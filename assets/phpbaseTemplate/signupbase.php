<div class="page-section">
    <div class="container">
        <h1 class="text-center wow fadeInUp">Make a Registration</h1>

        <form method="post" class="main-form">
            <?php
               include_once'../functions/register.php';
            ?>
            <div class="row mt-2 ">
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                    <input type="text" name="name" class="form-control" placeholder="full name ex:kibelisa kife eden">
                    <?php if(isset($pregname)) echo  $pregname;?>
                    <?php if(isset($lengstring)) echo  $lengstring;?>
                    <?php if(isset($maxlength)) echo  $maxlength;?>
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                    <input name="email" class="form-control" placeholder=" ex:eden@demo.com">
                    <?php if(isset($pregmail)) echo  $pregmail;?>
                    <?php if(isset($lengsmail)) echo  $lengsmail;?>
                    <?php if(isset($maxmail)) echo  $maxmail;?>
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                    <input type="date" name="dob" class="form-control" placeholder="birthday..">
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                    <select name="sex" id="departement" class="custom-select">
                        <option value="general">sex</option>
                        <option value="Mr">Mr</option>
                        <option value="Mrs">Mrs</option>
                        <option value="bisex">bisex</option>
                    </select>
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                    <input type="text" name="tel" class="form-control" placeholder=" ex : +33 8 14 52 63 96">
                    <?php if(isset($pretel)) echo  $pretel;?>
                    <?php if(isset($lentel)) echo  $lentel;?>
                    <?php if(isset($maxtel)) echo  $maxtel;?>
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                    <input type="text" name="adresse" class="form-control"
                        placeholder="ex : 96 rue andre bollier 69007">
                    <?php if(isset($preadress)) echo  $preadress;?>
                    <?php if(isset($lenadress)) echo  $lenadress;?>
                    <?php if(isset($maxadress)) echo  $maxadress;?>
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                    <select name="objectif" id="departement" class="custom-select">
                        <option value="general">Objectif du compte</option>
                        <option value="adopter">je veux adopter</option>
                        <option value="financer">je veux financer</option>
                        <option value="plaisir">juste pour me familiariser</option>
                    </select>
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                    <input type="password" name="password" class="form-control myInput"
                        placeholder="your password ex : Djaden@2352">
                    <?php if(isset($validpass)) echo  $validpass;?>
                    <?php if(isset($invalipass)) echo  $invalipass;?>
                    <?php if(isset($longpass)) echo $longpass;?>
                    <?php if(isset($maxpass)) echo $maxpass;?>
                </div>
                <div class="col-12 py-2 wow fadeInUp d-flex" data-wow-delay="300ms">
                    <input type="checkbox" onclick="myFunction()">Show Password
                </div>
            </div>

            <button type="submit" name="create" class="btn btn-primary mt-3 wow zoomIn">Creat now</button>
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