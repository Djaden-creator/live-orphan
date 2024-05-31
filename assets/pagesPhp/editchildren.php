<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>edit children</title>
    <link rel="stylesheet" href="../css/tableBabies.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../css/maicons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link rel="stylesheet" href="../css/bootstrap.css">

    <link rel="stylesheet" href="../vendor/owl-carousel/css/owl.carousel.css">

    <link rel="stylesheet" href="../vendor/animate/animate.css">

    <link rel="stylesheet" href="../css/theme.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>

<body>
    <?php
    $dsn = 'mysql:host=localhost;dbname=orphelinat';
     $username = 'root';
     $password = getenv('');
    try{
        //Récupérer les utilisateurs 
        $id=$_GET['id'];
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "SELECT * FROM children where  idChild='$id'";
        $stmt = $pdo->query($query);
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($users){
            foreach($users as $rows){
                        ?>
    <div class="page-section">
        <div class="container">
            <h1 class="text-center wow fadeInUp" style="font-size:17px;">Vous allez modifier <?php echo $rows['name']?>
            </h1>
            <form class="main-form" method="post" enctype="multipart/form-data">
                <?php
                        session_start();
                           require_once '../functions/childClass.php';
                           $child= new babiesClass();
                           $child ->editChild();
                           $child ->editChildpicture();
                        ?>
                <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                    <a href="listofBabies.php" title="close"><button style="color: black;" type="button" class="close"
                            data-dismiss="modal" aria-hidden="true">&times;</button></a>
                </div>
                <div class="row mt-5">
                    <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                        <input type="hidden" name="getme" value="<?php echo $id;?>">

                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $rows['name']?>">

                    </div>
                    <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">

                        <label>Dob</label>
                        <input type="date" name="date" class="form-control" value="<?php echo $rows['date']?>">

                    </div>
                    <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">

                        <select name="sex" id="departement" class="form-control">
                            <option value="general"><?php echo $rows['sex'];?></option>
                            <option value="Mr">Mr</option>
                            <option value="Mrs">Mrs</option>
                            <option value="bisex">bisex</option>
                        </select>

                    </div>
                    <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">

                        <label>Pays</label>
                        <input type="text" name="pays" class="form-control" value="<?php echo $rows['pays']?>">

                    </div>
                </div>
                <div class="col-12 py-2 d-flex wow fadeInUp" data-wow-delay="300ms">
                    <input type="submit" name="editit" class="btn-primary" style="font-size: 12px;border-radius:4px;"
                        value="Edit">&nbsp;
                    <input type="hidden" id="childid" value="<?php echo $id;?>">
                    <small class="btn-primary childpicture"
                        style="font-size: 12px;border-radius:4px;padding:3px;">modifier sa
                        photo?</small>
                </div>
            </form>
            <div id="showpictureformchild<?php echo $id;?>">
                <!-- here the form of update picture -->
            </div>

        </div>
    </div>
    <?php
            }
        }
    }catch(PDOException $e){
        echo "error";
    }
   ?>
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/owl-carousel/js/owl.carousel.min.js"></script>
    <script src="../vendor/wow/wow.min.js"></script>
    <script src="../js/theme.js"></script>
    <script src="../js/passwords.js"></script>
    <script>
    //here to edit a child picture form opener
    $(document).on('click', '.childpicture', function childpictureedit() {
        let childid = $('#childid').val();
        $.ajax({
            method: 'POST',
            url: "../actionAjax/formedit_child_pciture.php",
            data: {
                childid: childid,
                save: 1
            },
            success: function(response) {
                $('#showpictureformchild' + childid).html(response);
            }
        })
    })

    //here to close the edit a child picture form close
    $(document).on('click', '#closepictureform', function closepictureform() {
        event.preventDefault();
        let childid = $('#childid').val();
        $.ajax({
            method: 'POST',
            url: "../actionAjax/formedit_child_pciture.php",
            data: {
                childid: childid,
                save: 1
            },
            success: function(response) {
                $('#showpictureformchild' + childid).html("");
            }
        })
    })
    </script>
</body>

</html>