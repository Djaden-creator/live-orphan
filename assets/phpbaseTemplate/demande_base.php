<?php
if(!isset($_SESSION['idUser'])){
header('location:login.php');
}else{
    ?>
<div class="p-5">
    <div class="container">
        <div class="d-flex justify-content-center">
            <form action="" class="d-flex" style="width: 100%;">
                <input type="search" class="form-control" id="demandesearch" placeholder="search by  reference number"
                    style="border-radius: 30px;">
            </form>
        </div>
        <div>
            <span style="padding: 10px 20px; font-size: 15px;" id="countitnow"></span>
        </div>
        <div class="p-3" style="display:flex;column-gap:5px;font-size:12px;">
            <?php
        $dsn = 'mysql:host=localhost;dbname=orphelinat';
        $username = 'root';
        $password = getenv('');
    try{
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         if(isset($_SESSION['idUser'])){
           
            $sql="SELECT * FROM users WHERE idUser=".$_SESSION['idUser']."";
            $stmt = $pdo->query($sql);
            $child = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach($child as $rows){
                    if($rows['role']=='administrateur'){
                        ?>
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
            <a class="btn btn-primary" style="font-size:12px;"
                href="temoignage.php?itsme=<?php echo $rows['name'];?>/<?php echo md5($rows['name']);?>">
                Les temoignages(
                <?php require_once'../functions/reviewClass.php';
                  $reviewclass= new reviewClass();
                  $reviewclass->countreviewRow();
                ?>
                )
            </a>
            <a class="btn btn-primary" style="font-size:12px;"
                href="demande.php?itsme=<?php echo $rows['name'];?>/<?php echo md5($rows['name']);?>">
                Gerer les demandes(
                <?php require_once'../functions/adoptionClass.php';
                  $adoptionClass= new Adoption();
                  $adoptionClass->countdemandeAll();
                ?>
                )
            </a>
            <a class="btn btn-primary" style="font-size:12px;"
                href="statistique.php?itsme=<?php echo $rows['name'];?>/<?php echo md5($rows['name']);?>">
                stats des dmds
            </a>
            <?php

                    }elseif($rows['role']=='moderateur'){
              ?>
            <a class="btn btn-primary" style="font-size:12px;" href="listofbabies.php">les enfants
                (<?php require_once'../functions/childClass.php';
                $child= new babiesClass();
                $child->countchildRow();
                ?>)
            </a>

            <a class="btn btn-primary" style="font-size:12px;"
                href="demande.php?itsme=<?php echo $rows['name'];?>/<?php echo md5($rows['name']);?>">
                Gerer les demandes(
                <?php require_once'../functions/adoptionClass.php';
                  $adoptionClass= new Adoption();
                  $adoptionClass->countdemandeAll();
                ?>
                )
            </a>

            <?php
                    }
                    ?>

            <?php
                }}} catch(PDOException $e){
                    echo"no connection from the database";
               }
        ?>
        </div>
    </div>

</div>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Manage <b>demandes</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <form action="" method="post">
                            <button type="submit" class="btn btn-danger" name="deteledemande" data-toggle="modal"><i
                                    class="material-icons">&#xE15C;</i>
                                <span>Delete all demandes?</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- forme hide delete all children -->
            <div class="text-danger" style="display: flex;justify-content:center;" id="notificationout"></div>
            <div id="allclose"></div>
            <!-- forme hide delete all children -->
            <div class="gettable">
                <div style="padding:10px 5px;">
                    <?php 
                      $adoption= new Adoption();
                      $adoption->deletealldemande();
                    ?>
                </div>
                <table class="table table-striped table-hover" id="alltable">
                    <span class="text-danger notification"></span>
                    <thead>
                        <tr>
                            <th>N° de Reference</th>
                            <th>Demandeur</th>
                            <th>Type</th>
                            <th>status</th>
                            <th>Decision</th>
                            <th>Consulter</th>

                        </tr>
                    </thead>
                    <!-- table here  -->
                    <?php 
                      $adoption= new Adoption();
                      $adoption->getAlldemande();
                    ?>
                    <!-- table here end -->
                </table>
            </div>
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
<?php
}