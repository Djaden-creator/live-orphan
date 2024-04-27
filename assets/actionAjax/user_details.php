<?php
 $dsn = 'mysql:host=localhost;dbname=orphelinat';
 $username = 'root';
 $password = getenv('');
 try{
     $pdo = new PDO($dsn, $username, $password);
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
     //Récupérer les données du formulaire de connexion
     if(isset($_POST['action'])){
         $iduser=$_POST['iduser'];
         $sql="SELECT * FROM users WHERE idUser='$iduser'";
         $stmt = $pdo->query($sql);
         $child = $stmt->fetchAll(PDO::FETCH_ASSOC);
             foreach($child as $rows){
                 $dateOfBirth = $rows['dbd'];
         $today = date("Y-m-d");
         $diff = date_diff(date_create($dateOfBirth), date_create($today));
                 ?>
<div class="card mb-3">
    <div class="card-body details">
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Full Name</h6>
            </div>
            <div class="col-sm-9 text-dark">
                <?php echo $rows['name'];?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Email</h6>
            </div>
            <div class="col-sm-9 text-dark">
                <?php echo $rows['email'];?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3 text-dark">
                <h6 class="mb-0">Phone</h6>
            </div>
            <div class="col-sm-9 text-dark">
                <?php echo $rows['portable'];?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3 ">
                <h6 class="mb-0">sex</h6>
            </div>
            <div class="col-sm-9 text-dark">
                <?php echo $rows['sex'];?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">age</h6>
            </div>
            <div class="col-sm-9 text-dark">
                <?php echo $diff->format('%y%');?> ans
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-12 d-flex" style="column-gap: 6px;">
                <button class="btn btn-primary detailedit" value="<?php echo $rows['idUser'];?>">Edit</button>
                <button class="btn btn-primary passwordchange" value="<?php echo $rows['idUser'];?>">changer mot de
                    passe</button>
            </div>
        </div>
    </div>
</div>

<?php
 }}}
 catch (PDOException $e){
     echo "error:".$e->getMessage()
;    
 }