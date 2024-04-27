<div class="p-5">
    <div class="container">
        <div class="d-flex justify-content-center">
            <form action="" class="d-flex" style="width: 100%;">
                <input type="search" class="form-control" id="servicesearch"
                    placeholder="search user by  the age or name" style="border-radius: 30px;">
            </form>
        </div>
        <!-- count data fund in the database start-->
        <div id="countservice" style="padding: 10px 20px; font-size: 15px;"></div>
        <!-- count data fund in the database end -->
        <div class="p-3">
            <a class="btn btn-primary" href="listofbabies.php">les enfants
                (<?php require_once'../functions/childClass.php';
                $child= new babiesClass();
                $child->countchildRow();
                ?>)
            </a>
            <a class="btn btn-primary" href="listofUsers.php">
                Mes utilisateurs(<?php require_once'../functions/userClass.php';
                $user= new User();
                $user->countuserRow();
                ?>)</a>

            <a class="btn btn-primary" href="team.php">
                Mon Equipe(
                <?php require_once'../functions/teamClass.php';
                  $teamclass= new teamClass();
                  $teamclass->countemployeRow();
                ?>)
            </a>
            <a class="btn btn-primary" href="service.php">
                Mes services(
                <?php require_once'../functions/serviceClass.php';
                  $serviceclass= new serviceClass();
                  $serviceclass->countserviceRow()
                ?>)
            </a>
            <a class="btn btn-primary" href="temoignage.php">
                Les temoignages(
                <?php require_once'../functions/reviewClass.php';
                  $reviewclass= new reviewClass();
                  $reviewclass->countreviewRow();
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
                        <h2>Manage <b>Services</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="addservice.php" class="btn btn-success"><i class="material-icons">&#xE147;</i>
                            <span>Add
                                New Service</span>
                        </a>
                        <form action="" method="post">
                            <button class="btn btn-danger" name="deleteallservice" data-toggle="modal">
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
                   $serviceclass= new serviceClass();
                   $serviceclass->deleteallservices();
                   $serviceclass->deleteService();
                ?>
            </div>

            <!-- dans cette div apparait la liste de employéd dynamiquement -->
            <div class="gettable">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="selectAll">
                                    <label for="selectAll"></label>
                                </span>
                            </th>
                            <th>N° de service</th>
                            <th>type de service</th>
                            <th>Actions</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <!-- get all employe here -->
                    <?php
                  $serviceclass= new serviceClass();
                  $serviceclass->getService()
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