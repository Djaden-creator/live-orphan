<div class="page-section">
    <div class="container">
        <?php
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
                    <?php if(isset($lengstring)) echo  $lengstring;?>
                    <?php if(isset($maxlength)) echo  $maxlength;?>
                </div>
                <div class="col-sm-6 py-2 wow fadeInRight">
                    <label for="emailAddress">Email</label>
                    <input type="text" id="emailAddress" name="email" class="form-control"
                        placeholder="Email address..">
                    <?php if(isset($validpass)) echo  $validpass;?>
                    <?php if(isset($pregmail)) echo  $pregmail;?>
                    <?php if(isset($lengsmail)) echo  $lengsmail;?>
                    <?php if(isset($maxmail)) echo $maxmail;?>
                </div>
                <div class="col-12 py-2 wow fadeInUp">
                    <label for="subject">N° de reference</label>
                    <input type="text" name="reference" class="form-control" placeholder="numero de reference">
                    <?php if(isset($preref)) echo  $preref;?>
                    <?php if(isset($lenref)) echo  $lenref;?>
                    <?php if(isset($maxref)) echo  $maxref;?>
                </div>
                <div class="col-12 py-2 wow fadeInUp">
                    <label for="message">Message</label>
                    <textarea name="message" class="form-control" rows="8" placeholder="Enter Message.."></textarea>
                    <?php if(isset($validpass)) echo  $validpass;?>
                    <?php if(isset($invalipass)) echo  $invalipass;?>
                    <?php if(isset($longpass)) echo $longpass;?>
                    <?php if(isset($maxpass)) echo $maxpass;?>
                </div>
            </div>
            <button type="submit" name="send" class="btn btn-primary wow zoomIn">Send Message</button>
        </form>
    </div>
</div>