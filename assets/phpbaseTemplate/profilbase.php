<div class="page-section">
    <div class="container">
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <?php
                            if(isset($_SESSION['idUser'])){
                                $sql="SELECT * FROM users WHERE idUser=".$_SESSION['idUser']."";
                                $stmt = $pdo->query($sql);
                                $child = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($child as $rows){
                                        $dateOfBirth = $rows['dbd'];
                                $today = date("Y-m-d");
                                $diff = date_diff(date_create($dateOfBirth), date_create($today));
                                ?>
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin"
                                    class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4><?php echo $rows['name'] ?></h4>
                                    <p class="text-secondary mb-1">objectif du
                                        compte:<u><?php echo $rows['objectif'] ?></u>
                                    </p>
                                    <p class="text-muted font-size-sm"><?php echo $diff->format('%y%');?> ans,
                                        <?php echo $rows['adresse'] ?></p>
                                    <?php
                                            if($rows['role']=='moderateur'){
                                                ?>
                                    <button class="btn btn-primary">Moderateur</button>
                                    <?php
                                            }
                                            elseif($rows['role']=='administrateur'){
                                                ?>
                                    <button class="btn btn-primary">Administrateur</button>
                                    <?php
                                            }
                                            elseif($rows['role']=='secretaire'){
                                                ?>
                                    <button class="btn btn-primary">Secretaire</button>
                                    <?php
                                            }
                                            
                                            else{
                                                ?>
                                    <a href="contact.php?itsme=<?php echo $rows['name'];?>/<?php echo md5($rows['name']);?>"
                                        class="btn btn-outline-primary">Need some help?</a>
                                    <?php
                                            }
                                        ?>


                                </div>
                            </div>
                        </div>
                        <?php
                            }
                          }
                        ?>
                    </div>
                    <div class="card mt-3">
                        <ul class="list-group list-group-flush">
                            <?php
                               if($_SESSION['idUser']==1){
                                ?>
                            <li class="list-group-item justify-content-between align-items-center flex-wrap">
                                <small class="flushmessage<?php echo $_SESSION['idUser'];?>"></small>
                                <button class="btn-primary changerole" style="font-size: 12px;"
                                    value="<?php echo $_SESSION['idUser'];?>">Modifier mon
                                    role
                                </button>
                                <div class="mt-1" id="formrole<?php echo $_SESSION['idUser'];?>">
                                    <!-- here to fetch the form of modifier role for the admin -->
                                </div>
                            </li>
                            <?php
 }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <div id="movement">
                    </div>
                    <!-- here the details of user -->
                    <?php
                       require_once '../functions/userClass.php';
                       $user= new User();
                       $user->userdatail();
                      ?>
                    <!-- here the details of user -->
                    <div class="row gutters-sm">
                        <div class="col-sm-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="d-flex align-items-center mb-3 showcountdelete" style="font-size:12px;">
                                        Vous avez <?php
                                          require_once'../functions/adoptionClass.php';
                                          $adoption= new Adoption();
                                          $adoption->countEncoursdemande();
                                        ?> dmd(s) encours et <?php
                                        $adoption= new Adoption();
                                        $adoption->countEnavancedemande();
                                      ?> dmd(s) mis en avance
                                    </h6>
                                    <!-- show detail -->
                                    <div>
                                        <?php
                                          $adoption= new Adoption();
                                          $adoption->getEncours();
                                          $adoption->getEnavance();
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <!-- here les demandes termineés all fetch -->
                                    <h6 class="d-flex align-items-center mb-3 showthecountofaccepted"
                                        style="font-size:12px;">Vous avez <?php
                                          $adoption= new Adoption();
                                          $adoption->countrejetdemande();
                                        ?> dms rejeté(es) et <?php
                                        $adoption= new Adoption();
                                        $adoption->countAcceptédemande();
                                      ?> dms accepté(es)
                                    </h6>
                                    <?php
                                          $adoption= new Adoption();
                                          $adoption->getaccepter();
                                          $adoption->getrejeter();
                                        ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>