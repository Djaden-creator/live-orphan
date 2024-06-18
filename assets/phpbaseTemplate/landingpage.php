<div class="page-hero bg-image overlay-dark" style="background-image: url(assets/img/background.jpg);">
    <div class="hero-section">
        <div class="container text-center wow zoomIn">
            <span class="subhead">Let's put a smile on their faces</span>
            <h1 class="display-4">Help me,i'am an orphan!</h1>
            <?php  
              if(isset($_SESSION['name'])){
                ?>
            <span class="subhead">Bienvenue <?php echo $_SESSION['name'];?> </span>
            <?php
              }else{
                ?>
            <a href="assets/pagesPhp/Signup.php" class="btn btn-primary">create an acount</a>
            <?php
              }
            ?>

        </div>
    </div>
</div>
<div class="bg-light">
    <div class="page-section py-3 mt-md-n5 custom-index">
        <div class="container">
            <div class="row justify-content-center grid gap-1">
                <!--here to fetch services   -->
                <?php
             require_once 'assets/functions/serviceClass.php';
             $services= new serviceClass();
             $services->getServiceuser();
            ?>
            </div>
        </div>
    </div>
    <!-- .page-section -->
    <div class="page-section pb-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 py-3 wow fadeInUp">
                    <h1>Welcome,to live orphan Center</h1>
                    <p class="text-grey mb-4">Le but de cette application ou organisation est de prendre en charge les
                        enfant mineurs abandonnés par leurs parents et de leur donner une visibilité sur notre
                        plateforme enfin qu’ils trouvent des parents adoptifs ou parents nourriciers(foster).</p>
                    <p class="text-grey mb-4">
                        LiveOrphan le numero un de tout le temps
                    </p>
                    <a href="assets/pagesPhp/about.php" class="btn btn-primary">Learn More</a>
                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-delay="400ms">
                    <div class="img-place custom-img-1">
                        <img src="assets/img/africa.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .bg-light -->
</div>
<!-- .bg-light -->

<div class="page-section">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp">Our Experts</h1>
        <div class="row mt-4 align-content-center justify-content-center">
            <?php
             require_once 'assets/functions/teamClass.php';
             $teamclass= new teamClass();
             $teamclass->getTeam();
            ?>
        </div>
    </div>
</div>

<div class="page-section bg-light">
    <div class="container">
        <h1 class="text-center wow fadeInUp">Latest Reviews</h1>
        <div class="row align-content-center justify-content-center">
            <!-- here to fetch the reviews for visitors -->
            <?php
             require_once 'assets/functions/reviewClass.php';
             $review= new reviewClass();
             $review->fetchReviewforvisitor();
            ?>
        </div>
    </div>
</div>
<!-- .page-section -->

<div class="page-section">
    <div class="container">
        <h1 class="text-center wow fadeInUp">Give our Plateforme a Note!</h1>
        <div id="review_notification" style="display:flex;justify-content:center;">

        </div>

        <div class="main-form solo">
            <div class="row mt-5 ">
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                    <input type="text" id="name" class="form-control" placeholder="Full name">
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                    <input type="email" id="email" class="form-control" placeholder="Email address..">
                </div>
                <div class="col-12 py-2 wow fadeInRight" data-wow-delay="300ms">
                    <select id="note" class="custom-select">
                        <option value="0">Note</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                    <textarea id="message" class="form-control" rows="6" placeholder="Enter message.."></textarea>
                </div>
            </div>

            <button class="btn btn-primary mt-3 wow zoomIn sendreview">Submit Request</button>
        </div>
    </div>
</div>
<!-- .page-section -->

<div class="page-section banner-home bg-image" style="background-image: url(../assets/img/banner-pattern.svg);">
    <div class="container py-5 py-lg-0">
        <div class="row align-items-center">
            <div class="col-lg-4 wow zoomIn">
                <div class="img-banner d-none d-lg-block">
                    <img src="assets/img/mobile_app.png" alt="">
                </div>
            </div>
            <div class="col-lg-8 wow fadeInRight">
                <h1 class="font-weight-normal mb-3">Get easy access of all features using One Health Application</h1>
                <a href="#"><img src="assets/img/google_play.svg" alt=""></a>
                <a href="#" class="ml-2"><img src="assets/img/app_store.svg" alt=""></a>
            </div>
        </div>
    </div>
</div>
<!-- .banner-home -->