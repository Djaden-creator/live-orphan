<div class="page-section">
    <div class="container">
        <?php
                            
                    $dsn = 'mysql:host=localhost;dbname=orphelinat';
                    $username = 'root';
                    $password = getenv('');
                try{
                    $pdo = new PDO($dsn, $username, $password);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                     if(isset($_SESSION['idUser'])){
                        include_once '../functions/contact_us.php';
                        ?>
        <h1 class="text-center wow fadeInUp">Do you need some help? fill the form </h1>
        <form class="contact-form mt-5" action="" method="post">
            <div class="row mb-3">
                <div class="col-sm-6 py-2 wow fadeInLeft">
                    <label for="fullName">Name</label>
                    <input type="text" id="fullName" name="name" class="form-control" placeholder="Full name..">
                    <input type="hidden" name="idUser" value="<?php echo $_SESSION['idUser'];?>">
                    <?php if(isset($pregname)) echo  $pregname;?>
                    <?php if(isset($lengname)) echo  $lengname;?>
                </div>
                <div class="col-sm-6 py-2 wow fadeInRight">
                    <label for="emailAddress">Email</label>
                    <input type="text" id="emailAddress" name="email" class="form-control"
                        placeholder="Email address..">
                    <?php if(isset($pregmail)) echo  $pregmail;?>
                    <?php if(isset($lengsmail)) echo  $lengsmail;?>
                </div>
                <div class="col-12 py-2 wow fadeInUp">
                    <label for="subject">N° de reference</label>
                    <input type="text" name="reference" class="form-control" placeholder="numero de reference">
                    <?php if(isset($preref)) echo  $preref;?>
                    <?php if(isset($longpass)) echo  $longpass;?>
                </div>
                <div class="col-12 py-2 wow fadeInUp">
                    <label for="message">Message</label>
                    <textarea name="message" class="form-control" rows="3" placeholder="Enter Message.."></textarea>
                    <?php if(isset($premess)) echo  $premess;?>
                    <?php if(isset($lenmess)) echo  $lenmess;?>
                </div>
            </div>
            <button type="submit" name="send" class="btn btn-primary wow zoomIn">Send Message</button>
        </form>

        <?php
                         }else{
                            ?>
        <div class="container my-5">
            <div class="p-5 text-center bg-body-tertiary rounded-3">
                <h1 class="text-body-emphasis">Important</h1>
                <p class="col-lg-8 mx-auto fs-5 text-muted">
                    vous pouvez nous contacter seulement si vous avez un compte active sur LiveOrphan et d'en avoir une
                    demande
                    d'adoption en cours,parceque nous vous demanderons le numero de reference de votre demande.
                </p>
                <div class="d-inline-flex gap-2 mb-5">
                    <a href="../pagesPhp/signup.php"
                        class="d-inline-flex align-items-center btn btn-primary btn-lg px-4 rounded-pill">
                        créer un compte
                    </a>
                </div>
            </div>
        </div>
        <?php
                         }
                        }
                         catch(PDOException $e){
                              echo"no connection from the database";
                         }
                    ?>
    </div>
</div>