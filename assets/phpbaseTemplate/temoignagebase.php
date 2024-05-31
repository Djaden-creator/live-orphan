<div class="p-5">
    <div class="container">
        <div class="p-3">
            <a class="btn btn-primary" style="font-size:12px;" href="listofbabies.php">les enfants
                (<?php require_once'../functions/childClass.php';
                $child= new babiesClass();
                $child->countchildRow();
                ?>)
            </a>
            <a class="btn btn-primary" style="font-size:12px;" href="listofUsers.php">
                Mes utilisateurs(<?php require_once'../functions/userClass.php';
                $user= new User();
                $user->countuserRow();
                ?>)</a>

            <a class="btn btn-primary" style="font-size:12px;" href="team.php">
                Mon Equipe(
                <?php require_once'../functions/teamClass.php';
                  $teamclass= new teamClass();
                  $teamclass->countemployeRow();
                ?>)
            </a>
            <a class="btn btn-primary" style="font-size:12px;" href="service.php">
                Mes services(
                <?php require_once'../functions/serviceClass.php';
                  $serviceclass= new serviceClass();
                  $serviceclass->countserviceRow()
                ?>)
            </a>
            <a class="btn btn-primary" style="font-size:12px;" href="temoignage.php">
                Les temoignages(
                <?php require_once'../functions/reviewClass.php';
                  $reviewclass= new reviewClass();
                  $reviewclass->countreviewRow();
                ?>
                )
            </a>
            <a class="btn btn-primary" style="font-size:12px;" href="demande.php">
                Gerer les demandes(
                <?php require_once'../functions/adoptionClass.php';
                  $adoptionClass= new Adoption();
                  $adoptionClass->countdemandeAll();
                ?>
                )
            </a>
        </div>
    </div>
</div>

<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Manage <b>Reviews</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <form action="" method="post">
                            <button class="btn btn-danger" name="deleteallreview" data-toggle="modal">
                                <i class="material-icons">&#xE15C;</i><span>Delete</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div style="display: flex; justify-content:center;padding:10px;">
                <?php
                   $teamclass= new teamClass();
                   $teamclass->deleteEmploye();
                   $teamclass->deleteallEmploye();
                   $serviceclass= new reviewClass();
                   $serviceclass->deleteallReview();
                   $serviceclass->deleteReviews();
                ?>
            </div>

            <!-- dans cette div apparait la liste de employéd dynamiquement -->
            <div class="gettable">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>

                            <th>N°</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Note</th>
                            <th>Status</th>
                            <th>Action</th>
                            <th>detail</th>
                        </tr>
                    </thead>
                    <!-- get all employe here -->
                    <?php
                  $serviceclass= new reviewClass();
                  $serviceclass->getReview();
                ?>
                </table>
            </div>
            <!-- dans cette div apparait la liste de employéd dynamiquement end-->
            <div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#">Previous</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>