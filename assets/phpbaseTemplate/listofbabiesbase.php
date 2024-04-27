<div class="p-5">
    <div class="container">
        <div class="d-flex justify-content-center">
            <form action="" class="d-flex" style="width: 100%;">
                <input type="search" class="form-control" id="searcher" placeholder="search by  the age or name"
                    style="border-radius: 30px;">
            </form>
        </div>
        <div>
            <span style="padding: 10px 20px; font-size: 15px;" id="countrows"></span>
        </div>
        <div class="p-3" style="display:flex;column-gap:5px;font-size:12px;">
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
                        <h2>Manage <b>children</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="registerchild.php" class="btn btn-success"><i class="material-icons">&#xE147;</i>
                            <span>Add New child</span></a>
                        <button class="btn btn-danger" id="deleteallchild" data-toggle="modal"><i
                                class="material-icons">&#xE15C;</i>
                            <span>Delete</span></a>
                    </div>
                </div>
            </div>
            <!-- forme hide delete all children -->
            <div class="text-danger" style="display: flex;justify-content:center;" id="notificationout"></div>
            <div id="allclose"></div>
            <!-- forme hide delete all children -->
            <div class="gettable">
                <table class="table table-striped table-hover" id="alltable">
                    <span class="text-danger notification"></span>
                    <thead>
                        <tr>
                            <th>
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="selectAll">
                                    <label for="selectAll"></label>
                                </span>
                            </th>
                            <th>photo</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Sex</th>
                            <th>pays</th>
                            <th>Actions</th>
                            <th>Decision</th>
                        </tr>
                    </thead>
                    <!-- table here  -->
                    <?php
                     require_once '../functions/childClass.php';
                     $child= new babiesClass();
                     $child ->getChildren();
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
<!-- Edit Modal HTML -->
<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h4 class="modal-title">Edit Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post">

                <div class="modal-header">
                    <h4 class="modal-title">Delete Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete these Records?</p>
                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-danger" value="Delete">
                </div>
            </form>
        </div>
    </div>
</div>