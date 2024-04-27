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
<!-- .page-section -->

<div class="page-section ">
    <div class="container ">
        <h1 class="text-center wow fadeInUp ">Make an Appointment</h1>

        <form class="main-form ">
            <div class="row mt-5 ">
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft ">
                    <input type="text " class="form-control " placeholder="Full name ">
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInRight ">
                    <input type="text " class="form-control " placeholder="Email address.. ">
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft " data-wow-delay="300ms ">
                    <input type="date " class="form-control ">
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInRight " data-wow-delay="300ms ">
                    <select name="departement " id="departement " class="custom-select ">
                        <option value="general ">General Health</option>
                        <option value="cardiology ">Cardiology</option>
                        <option value="dental ">Dental</option>
                        <option value="neurology ">Neurology</option>
                        <option value="orthopaedics ">Orthopaedics</option>
                    </select>
                </div>
                <div class="col-12 py-2 wow fadeInUp " data-wow-delay="300ms ">
                    <input type="text " class="form-control " placeholder="Number.. ">
                </div>
                <div class="col-12 py-2 wow fadeInUp " data-wow-delay="300ms ">
                    <textarea name="message " id="message " class="form-control " rows="6 "
                        placeholder="Enter message.. "></textarea>
                </div>
            </div>

            <button type="submit " class="btn btn-primary mt-3 wow zoomIn ">Submit Request</button>
        </form>
    </div>
</div>
<!-- .page-section -->

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
<!-- .banner-home -->