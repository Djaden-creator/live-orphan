<div class="page-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 wow fadeInUp">
                <h1 class="text-center mb-3">Welcome to LiveOrphan Center</h1>
                <div class="text-lg">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt neque sit, explicabo vero nulla
                        animi nemo quae cumque, eaque pariatur eum ut maxime! Tenetur aperiam maxime iure explicabo aut
                        consequuntur. Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt neque sit,
                        explicabo vero nulla animi nemo quae cumque, eaque pariatur eum ut maxime! Tenetur aperiam
                        maxime iure explicabo aut consequuntur.</p>
                    <p>Expedita iusto sunt beatae esse id nihil voluptates magni, excepturi distinctio impedit illo,
                        incidunt iure facilis atque, inventore reprehenderit quidem aliquid recusandae. Lorem ipsum
                        dolor sit amet consectetur adipisicing elit. Laudantium quod ad sequi atque accusamus deleniti
                        placeat dignissimos illum nulla voluptatibus vel optio, molestiae dolore velit iste maxime,
                        nobis odio molestias!</p>
                </div>
            </div>
            <div class="col-lg-10 mt-5">
                <h1 class="text-center mb-5 wow fadeInUp">Our Leaders</h1>
                <div class="row justify-content-center">
                    <!-- here the liste of employes -->
                    <?php
             require_once '../functions/teamClass.php';
             $teamclass= new teamClass();
             $teamclass->getTeam();
            ?>

                </div>
            </div>
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
</div> <!-- .banner-home -->