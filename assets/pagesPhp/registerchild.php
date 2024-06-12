<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap CRUD Data Table for Database with Modal Form</title>
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
    <!-- forme new way -->
    <div class="page-section">
        <div class="container">
            <h1 class="text-center wow fadeInUp" style="font-size:17px;">
                Add a Child
            </h1>
            <form class="main-form" method="post" enctype="multipart/form-data">
                <?php
                        session_start();
                           require_once '../functions/childClass.php';
                           $child= new babiesClass();
                           $child ->babies();
                        ?>
                <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                    <a href="listofBabies.php" title="close"><button style="color: black;" type="button" class="close"
                            data-dismiss="modal" aria-hidden="true">&times;</button></a>
                </div>
                <div class="row mt-5">
                    <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                        <label>Dob</label>
                        <input type="date" name="date" class="form-control">
                    </div>
                    <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                        <select name="sex" id="departement" class="form-control">
                            <option value="general">sex</option>
                            <option value="Mr">Mr</option>
                            <option value="Mrs">Mrs</option>
                            <option value="bisex">bisex</option>
                        </select>
                    </div>
                    <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                        <label>Pays</label>
                        <input type="text" name="pays" class="form-control">
                    </div>
                    <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                        <label>photo</label>
                        <input type="file" name="photo" class="form-control">
                    </div>
                </div>
                <div class="col-12 py-2 d-flex wow fadeInUp" data-wow-delay="300ms">
                    <input type="submit" name="saveit" class="btn btn-primary" value="Add">
                </div>
            </form>
        </div>
    </div>
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/owl-carousel/js/owl.carousel.min.js"></script>
    <script src="../vendor/wow/wow.min.js"></script>
    <script src="../js/theme.js"></script>
    <script src="../js/passwords.js"></script>
</body>

</html>