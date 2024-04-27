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
    <div id="addEmployeeModal" class="fadeOut">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" enctype="multipart/form-data">
                    <div class="modal-header bg-dark">
                        <h4 class="modal-title" style="color:white;">Edit this Child</h4>
                        <a href="listofBabies.php"><button style="color: white;" type="button" class="close"
                                data-dismiss="modal" aria-hidden="true">&times;</button></a>
                    </div>
                    <span>
                        <?php
                        session_start();
                           require_once '../functions/childClass.php';
                           $child= new babiesClass();
                           $child ->editChild();
                        ?>
                    </span>
                    <div class="modal-body">
                        <input type="hidden" name="getme" value="<?php echo $id;?>">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $rows['name']?>">
                        </div>
                        <div class="form-group">
                            <label>Dob</label>
                            <input type="date" name="date" class="form-control" value="<?php echo $rows['date']?>">
                        </div>
                        <div class="form-group">
                            <select name="sex" id="departement" class="form-control">
                                <option value="general">sex</option>
                                <option value="Mr">Mr</option>
                                <option value="Mrs">Mrs</option>
                                <option value="bisex">bisex</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Pays</label>
                            <input type="text" name="pays" class="form-control" value="<?php echo $rows['pays']?>">
                        </div>
                        <div class="form-group">
                            <label>photo</label>
                            <input type="file" name="photo" class="form-control" value="<?php echo $rows['photos']?>">
                        </div>
                    </div>
                    <div class="modal-footer bg-dark">
                        <input type="submit" name="editit" class="btn btn-primary" value="Edit">
                    </div>
                </form>
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
</body>

</html>